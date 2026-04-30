@extends('layouts.app', ['header' => 'Peminjaman', 'title' => 'Peminjaman - Inventory'])
@section('content')
<div class="hero">
    <div class="hero-text">
        <span class="eyebrow">Transaksi</span>
        <h1 class="hero-title">Peminjaman</h1>
        <p class="hero-sub">Daftar semua peminjaman barang.</p>
    </div>
    <div class="hero-actions">
        <a href="{{ route('peminjaman.create') }}" class="btn btn--primary"><svg viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg> Buat Peminjaman</a>
    </div>
</div>
<div class="card">
    <div class="table-scroll">
        <table class="table">
            <thead><tr>
                <th>#</th><th>Peminjam</th>
                @if(auth()->user()->isAdmin())<th>User</th>@endif
                <th>Jumlah</th><th>Tgl Pinjam</th><th>Tgl Kembali</th><th>Status</th><th style="text-align:right">Aksi</th>
            </tr></thead>
            <tbody>
                @forelse($peminjaman as $i => $p)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td style="font-weight:600;color:var(--t-base)">{{ $p->nama_peminjam }}</td>
                    @if(auth()->user()->isAdmin())<td style="color:var(--t-muted)">{{ $p->user->username ?? '-' }}</td>@endif
                    <td>{{ $p->jumlah_item }} item</td>
                    <td style="color:var(--t-muted)">{{ $p->tgl_pinjam->format('d M Y') }}</td>
                    <td style="color:var(--t-muted)">{{ $p->tgl_kembali ? $p->tgl_kembali->format('d M Y') : '-' }}</td>
                    <td><span class="badge {{ $p->tgl_kembali ? 'success' : 'warning' }} dot">{{ $p->tgl_kembali ? 'Dikembalikan' : 'Dipinjam' }}</span></td>
                    <td style="text-align:right">
                        <a href="{{ route('peminjaman.show', $p) }}" class="btn btn--sm btn--ghost">Detail</a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="{{ auth()->user()->isAdmin() ? 8 : 7 }}" style="text-align:center;padding:32px;color:var(--t-muted)">Belum ada peminjaman. <a href="{{ route('peminjaman.create') }}" style="color:var(--primary);font-weight:600">Buat sekarang</a></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
