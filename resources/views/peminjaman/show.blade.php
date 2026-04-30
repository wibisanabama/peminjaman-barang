@extends('layouts.app', ['header' => 'Detail Peminjaman', 'title' => 'Detail Peminjaman - Inventory'])
@section('content')
<div>
    <a href="{{ route('peminjaman.index') }}" class="btn btn--ghost btn--sm" style="margin-bottom:20px">← Kembali</a>

    <div class="card" style="margin-bottom:20px">
        <div class="card-head">
            <div class="card-title-wrap"><h3 class="card-title">Informasi Peminjaman</h3></div>
            <span class="badge {{ $peminjaman->tgl_kembali ? 'success' : 'warning' }} dot">{{ $peminjaman->tgl_kembali ? 'Dikembalikan' : 'Dipinjam' }}</span>
        </div>
        <div class="detail-grid">
            <div class="detail-item"><div class="detail-label">Peminjam</div><div class="detail-value">{{ $peminjaman->nama_peminjam }}</div></div>
            <div class="detail-item"><div class="detail-label">User</div><div class="detail-value">{{ $peminjaman->user->username }}</div></div>
            <div class="detail-item"><div class="detail-label">Tgl Pinjam</div><div class="detail-value">{{ $peminjaman->tgl_pinjam->format('d M Y') }}</div></div>
            <div class="detail-item"><div class="detail-label">Tgl Kembali</div><div class="detail-value">{{ $peminjaman->tgl_kembali ? $peminjaman->tgl_kembali->format('d M Y') : '-' }}</div></div>
            <div class="detail-item"><div class="detail-label">Jumlah Item</div><div class="detail-value">{{ $peminjaman->jumlah_item }} item</div></div>
        </div>
    </div>

    <div class="card" style="margin-bottom:20px">
        <div class="card-head"><div class="card-title-wrap"><h3 class="card-title">Daftar Barang</h3></div></div>
        <div style="height:175px;overflow-y:auto">
        @foreach($peminjaman->detailPeminjaman as $d)
        <div class="item-row">
            <div class="item-icon" style="background:{{ $d->status==='dikembalikan' ? 'var(--success-soft)' : 'var(--warning-soft)' }};color:{{ $d->status==='dikembalikan' ? 'var(--success)' : 'var(--warning)' }}">
                @if($d->status==='dikembalikan')
                <svg viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
                @else
                <svg viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                @endif
            </div>
            <div class="item-info">
                <div class="item-name">{{ $d->barang->nama }}</div>
                <div class="item-meta">{{ $d->barang->kategori->nama ?? '-' }}</div>
            </div>
            <span class="badge {{ $d->status==='dikembalikan' ? 'success' : 'warning' }}">{{ ucfirst($d->status) }}</span>
        </div>
        @endforeach
        </div>
    </div>

    @if(!$peminjaman->tgl_kembali)
    <form action="{{ route('peminjaman.kembalikan', $peminjaman) }}" method="POST" onsubmit="return confirm('Yakin kembalikan semua barang?')">
        @csrf
        <button type="submit" class="btn btn--success btn--lg" style="width:100%;justify-content:center">
            <svg viewBox="0 0 24 24" style="width:16px;height:16px"><path d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/></svg>
            Kembalikan Semua Barang
        </button>
    </form>
    @endif
</div>
@endsection
