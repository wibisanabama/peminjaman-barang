<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Inventory' }}</title>
    <link rel="stylesheet" href="{{ asset('css/adminator.css') }}">
</head>
<body>
    <div class="drawer-backdrop" onclick="toggleSidebar()"></div>
    <div class="shell">
        <aside class="d-sidebar">
            <div class="brand">
                <div class="brand-logo">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </div>
                <div class="brand-text">
                    <div class="brand-name">Inventory</div>
                    <div class="brand-tag">PEMINJAMAN BARANG</div>
                </div>
            </div>

            <nav class="nav-section">
                <div class="nav-label">Menu Utama</div>
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'is-active' : '' }}">
                    <svg viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('peminjaman.index') }}" class="nav-link {{ request()->routeIs('peminjaman.*') ? 'is-active' : '' }}">
                    <svg viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    <span>Peminjaman</span>
                </a>
                @if(auth()->user()->isAdmin())
                <div class="nav-label" style="margin-top:14px">Master Data</div>
                <a href="{{ route('kategori.index') }}" class="nav-link {{ request()->routeIs('kategori.*') ? 'is-active' : '' }}">
                    <svg viewBox="0 0 24 24"><path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                    <span>Kategori</span>
                </a>
                <a href="{{ route('barang.index') }}" class="nav-link {{ request()->routeIs('barang.*') ? 'is-active' : '' }}">
                    <svg viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    <span>Barang</span>
                </a>
                <div class="nav-label" style="margin-top:14px">Pengaturan</div>
                <a href="{{ route('user.index') }}" class="nav-link {{ request()->routeIs('user.*') ? 'is-active' : '' }}">
                    <svg viewBox="0 0 24 24"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <span>Manajemen User</span>
                </a>
                @endif
            </nav>

            <div class="sidebar-footer">
                <div class="workspace">
                    <div class="workspace-avatar">{{ strtoupper(substr(auth()->user()->username, 0, 1)) }}</div>
                    <div class="workspace-text">
                        <div class="workspace-name">{{ auth()->user()->username }}</div>
                        <div class="workspace-role">{{ ucfirst(auth()->user()->role) }}</div>
                    </div>
                    <form action="{{ route('logout') }}" method="POST" style="margin-left:auto">
                        @csrf
                        <button type="submit" class="icon-btn" title="Logout">
                            <svg viewBox="0 0 24 24"><path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <div class="main">
            <header class="d-topbar">
                <div class="crumbs">
                    <button class="hamburger" onclick="toggleSidebar()">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                    <span>Inventory</span>
                    <span class="sep">›</span>
                    <span class="current">{{ $header ?? 'Dashboard' }}</span>
                </div>
                <div class="topbar-actions"></div>
            </header>

            <main class="content">
                @yield('content')
            </main>

            <footer class="d-footer" style="border-top:1px solid var(--border)">
                <span>© 2026 Inventory - All rights reserved</span>
            </footer>
        </div>
    </div>

    <!-- Toast Notifications -->
    <div id="toast-container" style="position:fixed;top:148px;right:32px;z-index:9999;display:flex;flex-direction:column;gap:10px;pointer-events:none">
        @if(session('success'))
        <div class="toast toast-success" id="toast-s" style="pointer-events:all">
            <svg style="width:16px;height:16px;flex-shrink:0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span>{{ session('success') }}</span>
            <button onclick="this.closest('.toast').remove()" style="background:none;border:none;cursor:pointer;color:inherit;font-size:14px;padding:0 0 0 8px;opacity:.7">✕</button>
        </div>
        @endif
        @if(session('error'))
        <div class="toast toast-danger" id="toast-e" style="pointer-events:all">
            <svg style="width:16px;height:16px;flex-shrink:0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span>{{ session('error') }}</span>
            <button onclick="this.closest('.toast').remove()" style="background:none;border:none;cursor:pointer;color:inherit;font-size:14px;padding:0 0 0 8px;opacity:.7">✕</button>
        </div>
        @endif
        @if($errors->any())
        <div class="toast toast-danger" id="toast-err" style="pointer-events:all">
            <svg style="width:16px;height:16px;flex-shrink:0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <div>@foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach</div>
        </div>
        @endif
    </div>
    <script>
    function toggleSidebar(){document.body.classList.toggle('has-drawer-open')}
    function positionToast(){
        const btn = document.querySelector('.hero-actions');
        const tc = document.getElementById('toast-container');
        if(!tc) return;
        if(btn){
            const r = btn.getBoundingClientRect();
            tc.style.top = (r.top - tc.offsetHeight - 15) + 'px';
        } else {
            tc.style.top = '148px';
        }
    }
    positionToast();
    window.addEventListener('resize', positionToast);
    setTimeout(()=>{
        document.querySelectorAll('#toast-s,#toast-e').forEach(t=>{
            t.style.transition='opacity .5s,transform .5s';
            t.style.opacity='0';
            t.style.transform='translateY(-12px)';
            setTimeout(()=>t.remove(),500);
        });
    },4000);
    </script>
</body>
</html>
