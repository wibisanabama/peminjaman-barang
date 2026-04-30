<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index()
    {
        $query = Peminjaman::with('user', 'detailPeminjaman.barang');

        if (!Auth::user()->isAdmin()) {
            $query->where('id_user', Auth::id());
        }

        $peminjaman = $query->orderBy('id', 'desc')->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $barang = Barang::where('status', 'tersedia')->where('stok', '>', 0)->get();
        return view('peminjaman.create', compact('barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_peminjam' => 'required|max:150',
            'tgl_pinjam' => 'required|date',
            'barang_ids' => 'required|array|min:1',
            'barang_ids.*' => 'exists:barang,id',
        ]);

        DB::beginTransaction();
        try {
            $peminjaman = Peminjaman::create([
                'id_user' => Auth::id(),
                'nama_peminjam' => $request->nama_peminjam,
                'jumlah_item' => count($request->barang_ids),
                'tgl_pinjam' => $request->tgl_pinjam,
            ]);

            foreach ($request->barang_ids as $barangId) {
                DetailPeminjaman::create([
                    'id_pinjam' => $peminjaman->id,
                    'id_barang' => $barangId,
                    'status' => 'dipinjam',
                ]);

                $barang = Barang::find($barangId);
                $barang->stok -= 1;
                $barang->status = $barang->stok > 0 ? 'tersedia' : 'habis';
                $barang->save();
            }

            DB::commit();
            return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dibuat.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function show(Peminjaman $peminjaman)
    {
        if (!Auth::user()->isAdmin() && $peminjaman->id_user !== Auth::id()) {
            abort(403);
        }

        $peminjaman->load('user', 'detailPeminjaman.barang');
        return view('peminjaman.show', compact('peminjaman'));
    }

    public function kembalikan(Peminjaman $peminjaman)
    {
        if (!Auth::user()->isAdmin() && $peminjaman->id_user !== Auth::id()) {
            abort(403);
        }

        DB::beginTransaction();
        try {
            foreach ($peminjaman->detailPeminjaman as $detail) {
                if ($detail->status === 'dipinjam') {
                    $detail->status = 'dikembalikan';
                    $detail->save();

                    $barang = $detail->barang;
                    $barang->stok += 1;
                    $barang->status = 'tersedia';
                    $barang->save();
                }
            }

            $peminjaman->tgl_kembali = now()->toDateString();
            $peminjaman->save();

            DB::commit();
            return redirect()->route('peminjaman.show', $peminjaman)->with('success', 'Barang berhasil dikembalikan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
