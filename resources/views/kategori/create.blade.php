@extends('layouts.app', ['header' => 'Tambah Kategori', 'title' => 'Tambah Kategori - InvenTrack'])
@section('content')
<div class="max-w-2xl">
    <a href="{{ route('kategori.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-slate-200 transition-colors mb-6">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Kembali ke Daftar
    </a>

    <div class="rounded-2xl bg-slate-900/60 backdrop-blur border border-slate-800/50 p-6 sm:p-8">
        <form action="{{ route('kategori.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="nama" class="block text-sm font-medium text-slate-400 mb-2">Nama Kategori <span class="text-red-400">*</span></label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required
                    class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700/50 text-slate-100 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500/50 transition-all text-sm"
                    placeholder="Contoh: Elektronik">
            </div>
            <div>
                <label for="deskripsi" class="block text-sm font-medium text-slate-400 mb-2">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="3"
                    class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700/50 text-slate-100 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500/50 transition-all text-sm resize-none"
                    placeholder="Deskripsi singkat kategori...">{{ old('deskripsi') }}</textarea>
            </div>
            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="px-6 py-3 rounded-xl bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold text-sm hover:from-indigo-600 hover:to-purple-700 shadow-lg shadow-indigo-500/25 transition-all duration-200 active:scale-[0.98]">
                    Simpan
                </button>
                <a href="{{ route('kategori.index') }}" class="px-6 py-3 rounded-xl border border-slate-700/50 text-slate-400 hover:text-slate-200 hover:border-slate-600 text-sm font-medium transition-all">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
