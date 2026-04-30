@extends('layouts.guest')
@section('content')
<h2 class="text-xl font-semibold text-slate-100 mb-6">Buat Akun Baru</h2>
<form action="{{ url('/register') }}" method="POST" class="space-y-5">
    @csrf
    <div>
        <label for="username" class="block text-sm font-medium text-slate-400 mb-2">Username</label>
        <input type="text" id="username" name="username" value="{{ old('username') }}" required autofocus
            class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700/50 text-slate-100 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500/50 transition-all text-sm">
    </div>
    <div>
        <label for="password" class="block text-sm font-medium text-slate-400 mb-2">Password</label>
        <input type="password" id="password" name="password" required
            class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700/50 text-slate-100 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500/50 transition-all text-sm">
    </div>
    <div>
        <label for="password_confirmation" class="block text-sm font-medium text-slate-400 mb-2">Konfirmasi Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required
            class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700/50 text-slate-100 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500/50 transition-all text-sm">
    </div>
    <button type="submit"
        class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold text-sm hover:from-indigo-600 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 shadow-lg shadow-indigo-500/25 transition-all duration-200 hover:shadow-xl hover:shadow-indigo-500/30 active:scale-[0.98]">
        Daftar
    </button>
</form>
<p class="text-center text-sm text-slate-500 mt-6">
    Sudah punya akun? <a href="{{ route('login') }}" class="text-indigo-400 hover:text-indigo-300 font-medium transition-colors">Masuk di sini</a>
</p>
@endsection
