@extends('layouts.app', ['header' => 'Buat Peminjaman', 'title' => 'Buat Peminjaman - InvenTrack'])
@section('content')
<div class="max-w-2xl">
    <a href="{{ route('peminjaman.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-slate-200 transition-colors mb-6">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Kembali ke Daftar
    </a>

    <div class="rounded-2xl bg-slate-900/60 backdrop-blur border border-slate-800/50 p-6 sm:p-8">
        <form action="{{ route('peminjaman.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="nama_peminjam" class="block text-sm font-medium text-slate-400 mb-2">Nama Peminjam <span class="text-red-400">*</span></label>
                <input type="text" id="nama_peminjam" name="nama_peminjam" value="{{ old('nama_peminjam') }}" required
                    class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700/50 text-slate-100 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500/50 transition-all text-sm"
                    placeholder="Nama lengkap peminjam">
            </div>
            <div>
                <label for="tgl_pinjam" class="block text-sm font-medium text-slate-400 mb-2">Tanggal Pinjam <span class="text-red-400">*</span></label>
                <input type="date" id="tgl_pinjam" name="tgl_pinjam" value="{{ old('tgl_pinjam', date('Y-m-d')) }}" required
                    class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700/50 text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500/50 transition-all text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-400 mb-3">Pilih Barang <span class="text-red-400">*</span></label>
                @if($barang->count() > 0)
                <div class="space-y-2 max-h-64 overflow-y-auto pr-2 custom-scrollbar">
                    @foreach($barang as $b)
                    <label class="flex items-center gap-4 px-4 py-3 rounded-xl bg-slate-800/30 border border-slate-700/30 hover:border-indigo-500/30 cursor-pointer transition-all group">
                        <input type="checkbox" name="barang_ids[]" value="{{ $b->id }}"
                            {{ in_array($b->id, old('barang_ids', [])) ? 'checked' : '' }}
                            class="w-4 h-4 rounded border-slate-600 bg-slate-700 text-indigo-500 focus:ring-indigo-500/50 focus:ring-offset-0">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-slate-200 group-hover:text-slate-100">{{ $b->nama }}</p>
                            <p class="text-xs text-slate-500">{{ $b->kategori->nama ?? 'Tanpa Kategori' }}</p>
                        </div>
                        <span class="text-xs font-medium {{ $b->stok > 5 ? 'text-emerald-400' : 'text-amber-400' }}">
                            Stok: {{ $b->stok }}
                        </span>
                    </label>
                    @endforeach
                </div>
                @else
                <div class="text-center py-6 text-slate-500 text-sm">
                    Tidak ada barang yang tersedia untuk dipinjam.
                </div>
                @endif
            </div>
            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="px-6 py-3 rounded-xl bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold text-sm hover:from-indigo-600 hover:to-purple-700 shadow-lg shadow-indigo-500/25 transition-all duration-200 active:scale-[0.98]">
                    Buat Peminjaman
                </button>
                <a href="{{ route('peminjaman.index') }}" class="px-6 py-3 rounded-xl border border-slate-700/50 text-slate-400 hover:text-slate-200 hover:border-slate-600 text-sm font-medium transition-all">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
