<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'pass' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'username' => 'user1',
            'pass' => Hash::make('user123'),
            'role' => 'user',
        ]);

        $elektronik = Kategori::create(['nama' => 'Elektronik', 'deskripsi' => 'Perangkat elektronik seperti laptop, proyektor, dll.']);
        $furniture = Kategori::create(['nama' => 'Furniture', 'deskripsi' => 'Meja, kursi, lemari, dan perlengkapan kantor.']);
        $alat = Kategori::create(['nama' => 'Alat Tulis', 'deskripsi' => 'Spidol, penghapus, dan perlengkapan tulis lainnya.']);
        $olahraga = Kategori::create(['nama' => 'Olahraga', 'deskripsi' => 'Peralatan olahraga.']);

        Barang::create(['nama' => 'Laptop ASUS', 'stok' => 5, 'id_kat' => $elektronik->id, 'status' => 'tersedia']);
        Barang::create(['nama' => 'Proyektor Epson', 'stok' => 3, 'id_kat' => $elektronik->id, 'status' => 'tersedia']);
        Barang::create(['nama' => 'Kabel HDMI', 'stok' => 10, 'id_kat' => $elektronik->id, 'status' => 'tersedia']);
        Barang::create(['nama' => 'Meja Lipat', 'stok' => 8, 'id_kat' => $furniture->id, 'status' => 'tersedia']);
        Barang::create(['nama' => 'Kursi Plastik', 'stok' => 20, 'id_kat' => $furniture->id, 'status' => 'tersedia']);
        Barang::create(['nama' => 'Spidol Whiteboard', 'stok' => 15, 'id_kat' => $alat->id, 'status' => 'tersedia']);
        Barang::create(['nama' => 'Penghapus Papan', 'stok' => 5, 'id_kat' => $alat->id, 'status' => 'tersedia']);
        Barang::create(['nama' => 'Bola Basket', 'stok' => 4, 'id_kat' => $olahraga->id, 'status' => 'tersedia']);
        Barang::create(['nama' => 'Raket Badminton', 'stok' => 6, 'id_kat' => $olahraga->id, 'status' => 'tersedia']);
    }
}
