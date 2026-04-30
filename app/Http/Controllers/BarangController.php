<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::with('kategori')->get();
        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('barang.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:150',
            'stok' => 'required|integer|min:0',
            'id_kat' => 'required|exists:kategori,id',
        ]);

        $data = $request->only('nama', 'stok', 'id_kat');
        $data['status'] = $data['stok'] > 0 ? 'tersedia' : 'habis';

        Barang::create($data);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit(Barang $barang)
    {
        $kategori = Kategori::all();
        return view('barang.edit', compact('barang', 'kategori'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama' => 'required|max:150',
            'stok' => 'required|integer|min:0',
            'id_kat' => 'required|exists:kategori,id',
        ]);

        $data = $request->only('nama', 'stok', 'id_kat');
        $data['status'] = $data['stok'] > 0 ? 'tersedia' : 'habis';

        $barang->update($data);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy(Barang $barang)
    {
        $activeBorrows = $barang->detailPeminjaman()->where('status', 'dipinjam')->count();
        if ($activeBorrows > 0) {
            return redirect()->route('barang.index')->with('error', 'Barang tidak bisa dihapus karena sedang dipinjam.');
        }

        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
