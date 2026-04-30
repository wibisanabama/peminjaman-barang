@extends('layouts.app', ['header' => 'Barang', 'title' => 'Barang - Inventory'])
@section('content')
<div class="hero">
    <div class="hero-text">
        <span class="eyebrow">Master Data</span>
        <h1 class="hero-title">Barang</h1>
        <p class="hero-sub">Kelola data barang inventaris.</p>
    </div>
    <div class="hero-actions">
        <a href="{{ route('barang.create') }}" class="btn btn--primary"><svg viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg> Tambah Barang</a>
    </div>
</div>
<div class="card">
    <div class="table-scroll">
        <table class="table">
            <thead><tr><th>#</th><th>Nama Barang</th><th>Kategori</th><th>Stok</th><th>Status</th><th style="text-align:right">Aksi</th></tr></thead>
            <tbody>
                @forelse($barang as $i => $b)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td style="font-weight:600;color:var(--t-base)">{{ $b->nama }}</td>
                    <td style="color:var(--t-muted)">{{ $b->kategori->nama ?? '-' }}</td>
                    <td><span style="font-weight:700;color:{{ $b->stok > 5 ? 'var(--success)' : ($b->stok > 0 ? 'var(--warning)' : 'var(--danger)') }}">{{ $b->stok }}</span></td>
                    <td><span class="badge {{ $b->status === 'tersedia' ? 'success' : 'danger' }} dot">{{ ucfirst($b->status) }}</span></td>
                    <td style="text-align:right">
                        <a href="{{ route('barang.edit', $b) }}" class="btn btn--sm btn--ghost">Edit</a>
                        <form action="{{ route('barang.destroy', $b) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin hapus?')">@csrf @method('DELETE')<button class="btn btn--sm btn--outline-danger">Hapus</button></form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" style="text-align:center;padding:32px;color:var(--t-muted)">Belum ada barang. <a href="{{ route('barang.create') }}" style="color:var(--primary);font-weight:600">Tambah sekarang</a></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
