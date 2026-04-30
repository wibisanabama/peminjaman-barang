@extends('layouts.guest')
@section('content')
<h2>Masuk ke Akun</h2>
<p class="sub">Masukkan username dan password untuk melanjutkan.</p>
<form action="{{ url('/login') }}" method="POST" class="auth-form">
    @csrf
    <div class="field">
        <label class="field-label">Username</label>
        <input type="text" name="username" value="{{ old('username') }}" class="input" placeholder="Username" required autofocus>
    </div>
    <div class="field">
        <div class="field-row">
            <label class="field-label">Password</label>
        </div>
        <input type="password" name="password" class="input" placeholder="Password" required>
    </div>
    <button type="submit" class="btn btn--primary btn--lg auth-submit">Masuk</button>
</form>
@endsection
