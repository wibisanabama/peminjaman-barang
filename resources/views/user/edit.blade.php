@extends('layouts.app', ['header' => 'Edit User', 'title' => 'Edit User - InvenTrack'])
@section('content')
<div class="max-w-2xl">
    <a href="{{ route('user.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-slate-200 transition-colors mb-6">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Kembali ke Daftar
    </a>

    <div class="rounded-2xl bg-slate-900/60 backdrop-blur border border-slate-800/50 p-6 sm:p-8">
        <form action="{{ route('user.update', $user) }}" method="POST" class="space-y-6">
            @csrf @method('PUT')
            <div>
                <label for="username" class="block text-sm font-medium text-slate-400 mb-2">Username <span class="text-red-400">*</span></label>
                <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" required
                    class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700/50 text-slate-100 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500/50 transition-all text-sm">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-slate-400 mb-2">Password <span class="text-slate-600 text-xs">(Kosongkan jika tidak ingin mengubah)</span></label>
                <input type="password" id="password" name="password"
                    class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700/50 text-slate-100 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500/50 transition-all text-sm"
                    placeholder="Minimal 6 karakter">
            </div>
            <div>
                <label for="role" class="block text-sm font-medium text-slate-400 mb-2">Role <span class="text-red-400">*</span></label>
                <select id="role" name="role" required
                    class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700/50 text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500/50 transition-all text-sm">
                    <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>
            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="px-6 py-3 rounded-xl bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold text-sm hover:from-indigo-600 hover:to-purple-700 shadow-lg shadow-indigo-500/25 transition-all duration-200 active:scale-[0.98]">
                    Perbarui
                </button>
                <a href="{{ route('user.index') }}" class="px-6 py-3 rounded-xl border border-slate-700/50 text-slate-400 hover:text-slate-200 hover:border-slate-600 text-sm font-medium transition-all">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
