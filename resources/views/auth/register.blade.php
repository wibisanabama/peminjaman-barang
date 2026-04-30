@extends('layouts.guest')
@section('content')
<h2>Buat Akun Baru</h2>
<p class="sub">Daftarkan akun untuk mulai menggunakan sistem peminjaman.</p>
<form action="{{ url('/register') }}" method="POST" class="auth-form">
    @csrf
    <div class="field">
        <label class="field-label">Username</label>
        <input type="text" name="username" value="{{ old('username') }}" class="input" placeholder="Minimal 3 karakter" required autofocus>
    </div>
    <div class="field">
        <label class="field-label">Password</label>
        <input type="password" name="password" class="input" placeholder="Minimal 6 karakter" required>
    </div>
    <div class="field">
        <label class="field-label">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="input" placeholder="Ulangi password" required>
    </div>
    <button type="submit" class="btn btn--primary btn--lg auth-submit">Daftar</button>
</form>
@endsection
