<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Login - Inventory' }}</title>
    <link rel="stylesheet" href="{{ asset('css/adminator.css') }}">
</head>
<body>
    <div class="auth-shell">
        <div class="auth-aside">
            <div class="auth-brand">
                <div class="logo">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </div>
                <span class="name">Inventory</span>
            </div>
            <div class="auth-aside-body">
                <span class="eyebrow" style="display:block;margin-bottom:14px;color:rgba(255,255,255,.7)">SISTEM INVENTARIS</span>
                <h1>Kelola peminjaman barang dengan mudah dan efisien.</h1>
                <p>Pantau stok barang, catat peminjaman, dan lacak pengembalian dalam satu platform terintegrasi.</p>
            </div>
        </div>
        <div class="auth-main">
            <div class="auth-main-top">
                @if(request()->routeIs('login'))
                <div></div>
                <div class="switch-link">Belum punya akun?<a href="{{ route('register') }}">Daftar</a></div>
                @else
                <div></div>
                <div class="switch-link">Sudah punya akun?<a href="{{ route('login') }}">Masuk</a></div>
                @endif
            </div>
            <div class="auth-card">
                @if($errors->any())
                <div class="alert danger" style="margin-bottom:18px">
                    <div>
                        @foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach
                    </div>
                </div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
