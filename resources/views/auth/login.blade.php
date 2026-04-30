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
    <div style="position:relative">
        <button type="submit" class="btn btn--primary btn--lg auth-submit">Masuk</button>
        @if($errors->any())
        <div style="position:absolute;top:calc(100% + 8px);left:0;right:0;background:var(--danger-soft);color:var(--danger);border-radius:8px;padding:12px 14px;font-size:13px;z-index:10">
            @foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach
        </div>
        @endif
    </div>
</form>
@endsection
