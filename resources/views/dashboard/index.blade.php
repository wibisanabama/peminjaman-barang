@extends('layouts.app', ['header' => 'Dashboard', 'title' => 'Dashboard - InvenTrack'])
@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 sm:gap-6 mb-8">
    <div class="group relative overflow-hidden rounded-2xl bg-slate-900/60 backdrop-blur border border-slate-800/50 p-6 hover:border-indigo-500/30 transition-all duration-300">
        <div class="absolute top-0 right-0 w-24 h-24 bg-indigo-500/10 rounded-full blur-2xl -translate-y-6 translate-x-6 group-hover:bg-indigo-500/20 transition-colors"></div>
        <div class="relative">
            <div class="w-11 h-11 rounded-xl bg-indigo-500/15 flex items-center justify-center mb-4">
                <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            </div>
            <p class="text-3xl font-bold text-slate-100">{{ $totalBarang }}</p>
            <p class="text-sm text-slate-500 mt-1">Total Barang</p>
        </div>
    </div>

    <div class="group relative overflow-hidden rounded-2xl bg-slate-900/60 backdrop-blur border border-slate-800/50 p-6 hover:border-emerald-500/30 transition-all duration-300">
        <div class="absolute top-0 right-0 w-24 h-24 bg-emerald-500/10 rounded-full blur-2xl -translate-y-6 translate-x-6 group-hover:bg-emerald-500/20 transition-colors"></div>
        <div class="relative">
            <div class="w-11 h-11 rounded-xl bg-emerald-500/15 flex items-center justify-center mb-4">
                <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <p class="text-3xl font-bold text-slate-100">{{ $barangTersedia }}</p>
            <p class="text-sm text-slate-500 mt-1">Barang Tersedia</p>
        </div>
    </div>

    <div class="group relative overflow-hidden rounded-2xl bg-slate-900/60 backdrop-blur border border-slate-800/50 p-6 hover:border-amber-500/30 transition-all duration-300">
        <div class="absolute top-0 right-0 w-24 h-24 bg-amber-500/10 rounded-full blur-2xl -translate-y-6 translate-x-6 group-hover:bg-amber-500/20 transition-colors"></div>
        <div class="relative">
            <div class="w-11 h-11 rounded-xl bg-amber-500/15 flex items-center justify-center mb-4">
                <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <p class="text-3xl font-bold text-slate-100">{{ $peminjamanAktif }}</p>
            <p class="text-sm text-slate-500 mt-1">Peminjaman Aktif</p>
        </div>
    </div>

    <div class="group relative overflow-hidden rounded-2xl bg-slate-900/60 backdrop-blur border border-slate-800/50 p-6 hover:border-purple-500/30 transition-all duration-300">
        <div class="absolute top-0 right-0 w-24 h-24 bg-purple-500/10 rounded-full blur-2xl -translate-y-6 translate-x-6 group-hover:bg-purple-500/20 transition-colors"></div>
        <div class="relative">
            <div class="w-11 h-11 rounded-xl bg-purple-500/15 flex items-center justify-center mb-4">
                <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </div>
            <p class="text-3xl font-bold text-slate-100">{{ $totalUser }}</p>
            <p class="text-sm text-slate-500 mt-1">Total User</p>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
    <div class="rounded-2xl bg-slate-900/60 backdrop-blur border border-slate-800/50 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-800/50 flex items-center justify-between">
            <h3 class="font-semibold text-slate-200">Peminjaman Terbaru</h3>
            <a href="{{ route('peminjaman.index') }}" class="text-xs text-indigo-400 hover:text-indigo-300 transition-colors">Lihat Semua →</a>
        </div>
        <div class="divide-y divide-slate-800/50">
            @forelse($peminjamanTerbaru as $p)
            <div class="px-6 py-4 flex items-center gap-4 hover:bg-slate-800/20 transition-colors">
                <div class="w-10 h-10 rounded-xl {{ $p->tgl_kembali ? 'bg-emerald-500/15' : 'bg-amber-500/15' }} flex items-center justify-center shrink-0">
                    @if($p->tgl_kembali)
                    <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    @else
                    <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    @endif
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-slate-200 truncate">{{ $p->nama_peminjam }}</p>
                    <p class="text-xs text-slate-500">{{ $p->jumlah_item }} item · {{ $p->tgl_pinjam->format('d M Y') }}</p>
                </div>
                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium {{ $p->tgl_kembali ? 'bg-emerald-500/15 text-emerald-400' : 'bg-amber-500/15 text-amber-400' }}">
                    {{ $p->tgl_kembali ? 'Dikembalikan' : 'Dipinjam' }}
                </span>
            </div>
            @empty
            <div class="px-6 py-10 text-center text-slate-500 text-sm">
                <svg class="w-10 h-10 mx-auto mb-3 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                Belum ada data peminjaman.
            </div>
            @endforelse
        </div>
    </div>

    <div class="rounded-2xl bg-slate-900/60 backdrop-blur border border-slate-800/50 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-800/50">
            <h3 class="font-semibold text-slate-200">Ringkasan</h3>
        </div>
        <div class="p-6 space-y-5">
            <div>
                <div class="flex items-center justify-between text-sm mb-2">
                    <span class="text-slate-400">Barang Tersedia</span>
                    <span class="text-slate-200 font-medium">{{ $totalBarang > 0 ? round($barangTersedia / $totalBarang * 100) : 0 }}%</span>
                </div>
                <div class="h-2 rounded-full bg-slate-800">
                    <div class="h-2 rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 transition-all duration-500" style="width: {{ $totalBarang > 0 ? round($barangTersedia / $totalBarang * 100) : 0 }}%"></div>
                </div>
            </div>
            <div>
                <div class="flex items-center justify-between text-sm mb-2">
                    <span class="text-slate-400">Kategori</span>
                    <span class="text-slate-200 font-medium">{{ $totalKategori }}</span>
                </div>
                <div class="h-2 rounded-full bg-slate-800">
                    <div class="h-2 rounded-full bg-gradient-to-r from-indigo-500 to-purple-400" style="width: {{ min($totalKategori * 10, 100) }}%"></div>
                </div>
            </div>
            <div>
                <div class="flex items-center justify-between text-sm mb-2">
                    <span class="text-slate-400">Total Peminjaman</span>
                    <span class="text-slate-200 font-medium">{{ $totalPeminjaman }}</span>
                </div>
                <div class="h-2 rounded-full bg-slate-800">
                    <div class="h-2 rounded-full bg-gradient-to-r from-amber-500 to-orange-400" style="width: {{ min($totalPeminjaman * 5, 100) }}%"></div>
                </div>
            </div>

            <div class="pt-4 border-t border-slate-800/50">
                <a href="{{ route('peminjaman.create') }}" class="flex items-center justify-center gap-2 w-full py-3 px-4 rounded-xl bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold text-sm hover:from-indigo-600 hover:to-purple-700 shadow-lg shadow-indigo-500/25 transition-all duration-200 hover:shadow-xl hover:shadow-indigo-500/30 active:scale-[0.98]">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Buat Peminjaman Baru
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
