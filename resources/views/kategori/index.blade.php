@extends('layouts.app', ['header' => 'Kategori', 'title' => 'Kategori - Inventory'])
@section('content')
<div class="hero">
    <div class="hero-text">
        <span class="eyebrow">Master Data</span>
        <h1 class="hero-title">Kategori</h1>
        <p class="hero-sub">Kelola kategori barang inventaris.</p>
    </div>
    <div class="hero-actions">
        <a href="{{ route('kategori.create') }}" class="btn btn--primary"><svg viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg> Tambah Kategori</a>
    </div>
</div>
<div class="card">
    <div class="table-scroll" style="height:475px;overflow-y:auto">
        <table class="table">
            <thead style="position:sticky;top:0;background:var(--bg-card);z-index:1"><tr><th>#</th><th>Nama</th><th>Deskripsi</th><th>Jumlah Barang</th><th style="text-align:right">Aksi</th></tr></thead>
            <tbody>
                @forelse($kategori as $i => $k)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td style="font-weight:600;color:var(--t-base)">{{ $k->nama }}</td>
                    <td style="color:var(--t-muted);max-width:240px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">{{ $k->deskripsi ?? '-' }}</td>
                    <td><span class="badge primary">{{ $k->barang_count }} barang</span></td>
                    <td style="text-align:right">
                        <a href="{{ route('kategori.edit', $k) }}" class="btn btn--sm btn--ghost">Edit</a>
                        <form action="{{ route('kategori.destroy', $k) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin hapus?')">@csrf @method('DELETE')<button class="btn btn--sm btn--outline-danger">Hapus</button></form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" style="text-align:center;padding:32px;color:var(--t-muted)">Belum ada kategori. <a href="{{ route('kategori.create') }}" style="color:var(--primary);font-weight:600">Tambah sekarang</a></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
