# Sistem Peminjaman Barang

Aplikasi web untuk mengelola inventaris dan transaksi peminjaman barang. Aplikasi menyediakan autentikasi, pembatasan akses berdasarkan peran, pengelolaan data master, pencatatan peminjaman, pengembalian, dan pembaruan stok.

## Teknologi

- PHP 8.2 atau lebih baru
- Laravel 12
- MySQL
- Blade
- Vite dan Node.js

## Fitur

### Admin

- Melihat ringkasan data pada dashboard
- Mengelola kategori
- Mengelola barang dan stok
- Mengelola pengguna
- Melihat seluruh transaksi peminjaman
- Memproses pengembalian barang

### User

- Melihat dashboard
- Membuat transaksi peminjaman
- Melihat transaksi milik sendiri
- Mengembalikan barang yang dipinjam

## Persyaratan

Pastikan perangkat telah memiliki:

- PHP 8.2 atau lebih baru
- Composer
- Node.js dan npm
- MySQL

Ekstensi PHP yang dibutuhkan mengikuti persyaratan Laravel 12 dan driver MySQL.

## Instalasi

1. Clone repository dan masuk ke direktori proyek.

   ```bash
   git clone https://github.com/wibisanabama/peminjaman-barang.git
   cd peminjaman-barang
   ```

2. Instal dependency PHP dan JavaScript.

   ```bash
   composer install
   npm install
   ```

3. Buat file konfigurasi lingkungan.

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

   Pada Windows PowerShell, gunakan:

   ```powershell
   Copy-Item .env.example .env
   php artisan key:generate
   ```

4. Buat database MySQL bernama `peminjaman_barang`.

5. Sesuaikan konfigurasi database pada `.env`.

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=peminjaman_barang
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. Jalankan migrasi dan seeder.

   ```bash
   php artisan migrate --seed
   ```

7. Jalankan aplikasi untuk pengembangan.

   ```bash
   composer run dev
   ```

Aplikasi tersedia di `http://localhost:8000`.

## Akun Hasil Seeder

Perintah `php artisan migrate --seed` membuat akun berikut:

| Peran | Username | Password |
|---|---|---|
| Admin | `admin` | `admin123` |
| User | `user1` | `user123` |

Ganti kredensial bawaan sebelum menggunakan aplikasi di lingkungan selain pengembangan.

## Menjalankan Pengujian

```bash
composer test
```

## Build Aset

Build aset untuk deployment:

```bash
npm run build
```

Jalankan Vite development server secara terpisah jika tidak menggunakan `composer run dev`:

```bash
npm run dev
```

## Struktur Utama

```text
app/Http/Controllers/   Controller autentikasi, data master, dan transaksi
app/Http/Middleware/    Middleware pembatasan peran
app/Models/             Model dan relasi Eloquent
database/migrations/    Definisi skema database
database/seeders/       Data awal aplikasi
resources/views/        Tampilan Blade
routes/web.php          Route aplikasi web
public/css/             Stylesheet antarmuka
tests/                  Pengujian otomatis
```

## Aturan Akses

- Semua halaman operasional memerlukan autentikasi.
- Route kategori, barang, dan pengguna hanya dapat diakses oleh admin.
- User hanya dapat melihat dan memproses transaksi peminjamannya sendiri.
- Admin dapat melihat dan memproses semua transaksi.

## Catatan Database

- Pembuatan dan pengembalian peminjaman dijalankan dalam transaksi database.
- Stok barang berkurang saat peminjaman dibuat.
- Stok barang bertambah saat peminjaman dikembalikan.
- Status barang berubah menjadi `habis` ketika stok mencapai nol.
