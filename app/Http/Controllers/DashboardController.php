<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = Barang::count();
        $barangTersedia = Barang::where('status', 'tersedia')->count();
        $totalKategori = Kategori::count();
        $totalUser = User::count();
        $peminjamanAktif = Peminjaman::whereNull('tgl_kembali')->count();
        $totalPeminjaman = Peminjaman::count();

        $peminjamanTerbaru = Peminjaman::with('user')
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard.index', compact(
            'totalBarang',
            'barangTersedia',
            'totalKategori',
            'totalUser',
            'peminjamanAktif',
            'totalPeminjaman',
            'peminjamanTerbaru'
        ));
    }
}
