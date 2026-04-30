@extends('layouts.app', ['header' => 'Dashboard', 'title' => 'Dashboard - Inventory'])
@section('content')
<div class="hero">
    <div class="hero-text">
        <span class="eyebrow">Overview</span>
        <h1 class="hero-title">Selamat datang, <span class="accent">{{ auth()->user()->username }}</span></h1>
        <p class="hero-sub">Ringkasan data inventaris dan peminjaman barang Anda.</p>
    </div>
    <div class="hero-actions">
        <a href="{{ route('peminjaman.create') }}" class="btn btn--primary">
            <svg viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg>
            Buat Peminjaman
        </a>
    </div>
</div>

<div class="grid" style="margin-bottom:24px">
    <div class="col-3"><div class="card stat-card" style="flex-direction:column;align-items:flex-start;gap:12px">
        <div class="stat-icon primary"><svg viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg></div>
        <div><div class="stat-value">{{ $totalBarang }}</div><div class="stat-label">Total Barang</div></div>
    </div></div>
    <div class="col-3"><div class="card stat-card" style="flex-direction:column;align-items:flex-start;gap:12px">
        <div class="stat-icon success"><svg viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div>
        <div><div class="stat-value">{{ $barangTersedia }}</div><div class="stat-label">Barang Tersedia</div></div>
    </div></div>
    <div class="col-3"><div class="card stat-card" style="flex-direction:column;align-items:flex-start;gap:12px">
        <div class="stat-icon warning"><svg viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div>
        <div><div class="stat-value">{{ $peminjamanAktif }}</div><div class="stat-label">Peminjaman Aktif</div></div>
    </div></div>
    <div class="col-3"><div class="card stat-card" style="flex-direction:column;align-items:flex-start;gap:12px">
        <div class="stat-icon purple"><svg viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div>
        <div><div class="stat-value">{{ $totalUser }}</div><div class="stat-label">Total User</div></div>
    </div></div>
</div>

<div class="grid" style="align-items:stretch">
    <div class="col-6" style="display:flex;flex-direction:column">
        <div class="card" style="flex:1">
            <div class="card-head">
                <div class="card-title-wrap"><h3 class="card-title">Peminjaman Terbaru</h3></div>
                <a href="{{ route('peminjaman.index') }}" class="card-action">Lihat Semua →</a>
            </div>
            @forelse($peminjamanTerbaru as $p)
            <div class="item-row">
                <div class="item-icon" style="background:{{ $p->tgl_kembali ? 'var(--success-soft)' : 'var(--warning-soft)' }};color:{{ $p->tgl_kembali ? 'var(--success)' : 'var(--warning)' }}">
                    @if($p->tgl_kembali)
                    <svg viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
                    @else
                    <svg viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    @endif
                </div>
                <div class="item-info">
                    <div class="item-name">{{ $p->nama_peminjam }}</div>
                    <div class="item-meta">{{ $p->jumlah_item }} item · {{ $p->tgl_pinjam->format('d M Y') }}</div>
                </div>
                <span class="badge {{ $p->tgl_kembali ? 'success' : 'warning' }} dot">{{ $p->tgl_kembali ? 'Kembali' : 'Dipinjam' }}</span>
            </div>
            @empty
            <div style="text-align:center;padding:32px 0;color:var(--t-muted);font-size:13px">Belum ada data peminjaman.</div>
            @endforelse
        </div>
    </div>
    <div class="col-6" style="display:flex;flex-direction:column">
        <div class="card" style="flex:1">
            <div class="card-head">
                <div class="card-title-wrap"><h3 class="card-title">Ringkasan</h3></div>
            </div>
            <div style="display:flex;flex-direction:column;gap:18px">
                <div>
                    <div style="display:flex;justify-content:space-between;font-size:12px;margin-bottom:6px">
                        <span style="color:var(--t-muted)">Barang Tersedia</span>
                        <span style="color:var(--t-base);font-weight:600">{{ $totalBarang > 0 ? round($barangTersedia/$totalBarang*100) : 0 }}%</span>
                    </div>
                    <div class="progress"><div class="progress-fill success" style="width:{{ $totalBarang > 0 ? round($barangTersedia/$totalBarang*100) : 0 }}%"></div></div>
                </div>
                <div>
                    <div style="display:flex;justify-content:space-between;font-size:12px;margin-bottom:6px">
                        <span style="color:var(--t-muted)">Kategori</span>
                        <span style="color:var(--t-base);font-weight:600">{{ $totalKategori }}</span>
                    </div>
                    <div class="progress"><div class="progress-fill gradient" style="width:{{ min($totalKategori*10,100) }}%"></div></div>
                </div>
                <div>
                    <div style="display:flex;justify-content:space-between;font-size:12px;margin-bottom:6px">
                        <span style="color:var(--t-muted)">Total Peminjaman</span>
                        <span style="color:var(--t-base);font-weight:600">{{ $totalPeminjaman }}</span>
                    </div>
                    <div class="progress"><div class="progress-fill warning" style="width:{{ min($totalPeminjaman*5,100) }}%"></div></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
