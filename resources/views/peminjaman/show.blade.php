@extends('layouts.app', ['header' => 'Detail Peminjaman', 'title' => 'Detail Peminjaman - InvenTrack'])
@section('content')
<div class="max-w-3xl">
    <a href="{{ route('peminjaman.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-slate-200 transition-colors mb-6">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Kembali ke Daftar
    </a>

    <div class="rounded-2xl bg-slate-900/60 backdrop-blur border border-slate-800/50 overflow-hidden mb-6">
        <div class="px-6 py-4 border-b border-slate-800/50 flex items-center justify-between">
            <h3 class="font-semibold text-slate-200">Informasi Peminjaman</h3>
            @if($peminjaman->tgl_kembali)
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg text-xs font-medium bg-emerald-500/15 text-emerald-400 ring-1 ring-emerald-500/20">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                Dikembalikan
            </span>
            @else
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg text-xs font-medium bg-amber-500/15 text-amber-400 ring-1 ring-amber-500/20">
                <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                Dipinjam
            </span>
            @endif
        </div>
        <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <p class="text-xs text-slate-500 mb-1">Nama Peminjam</p>
                <p class="text-sm font-medium text-slate-200">{{ $peminjaman->nama_peminjam }}</p>
            </div>
            <div>
                <p class="text-xs text-slate-500 mb-1">User</p>
                <p class="text-sm font-medium text-slate-200">{{ $peminjaman->user->username }}</p>
            </div>
            <div>
                <p class="text-xs text-slate-500 mb-1">Tanggal Pinjam</p>
                <p class="text-sm font-medium text-slate-200">{{ $peminjaman->tgl_pinjam->format('d M Y') }}</p>
            </div>
            <div>
                <p class="text-xs text-slate-500 mb-1">Tanggal Kembali</p>
                <p class="text-sm font-medium text-slate-200">{{ $peminjaman->tgl_kembali ? $peminjaman->tgl_kembali->format('d M Y') : '-' }}</p>
            </div>
            <div>
                <p class="text-xs text-slate-500 mb-1">Jumlah Item</p>
                <p class="text-sm font-medium text-slate-200">{{ $peminjaman->jumlah_item }} item</p>
            </div>
        </div>
    </div>

    <div class="rounded-2xl bg-slate-900/60 backdrop-blur border border-slate-800/50 overflow-hidden mb-6">
        <div class="px-6 py-4 border-b border-slate-800/50">
            <h3 class="font-semibold text-slate-200">Daftar Barang</h3>
        </div>
        <div class="divide-y divide-slate-800/50">
            @foreach($peminjaman->detailPeminjaman as $detail)
            <div class="px-6 py-4 flex items-center gap-4 hover:bg-slate-800/20 transition-colors">
                <div class="w-10 h-10 rounded-xl {{ $detail->status === 'dikembalikan' ? 'bg-emerald-500/15' : 'bg-amber-500/15' }} flex items-center justify-center shrink-0">
                    @if($detail->status === 'dikembalikan')
                    <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    @else
                    <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    @endif
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-slate-200">{{ $detail->barang->nama }}</p>
                    <p class="text-xs text-slate-500">{{ $detail->barang->kategori->nama ?? '-' }}</p>
                </div>
                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium {{ $detail->status === 'dikembalikan' ? 'bg-emerald-500/15 text-emerald-400' : 'bg-amber-500/15 text-amber-400' }}">
                    {{ ucfirst($detail->status) }}
                </span>
            </div>
            @endforeach
        </div>
    </div>

    @if(!$peminjaman->tgl_kembali)
    <form action="{{ route('peminjaman.kembalikan', $peminjaman) }}" method="POST" onsubmit="return confirm('Yakin ingin mengembalikan semua barang?')">
        @csrf
        <button type="submit" class="w-full sm:w-auto flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-600 text-white font-semibold text-sm hover:from-emerald-600 hover:to-teal-700 shadow-lg shadow-emerald-500/25 transition-all duration-200 hover:shadow-xl active:scale-[0.98]">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/></svg>
            Kembalikan Semua Barang
        </button>
    </form>
    @endif
</div>
@endsection
