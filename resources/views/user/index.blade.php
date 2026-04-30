@extends('layouts.app', ['header' => 'Manajemen User', 'title' => 'Manajemen User - Inventory'])
@section('content')
<div class="hero">
    <div class="hero-text">
        <span class="eyebrow">Pengaturan</span>
        <h1 class="hero-title">Manajemen User</h1>
        <p class="hero-sub">Kelola akun pengguna sistem.</p>
    </div>
    <div class="hero-actions">
        <a href="{{ route('user.create') }}" class="btn btn--primary"><svg viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg> Tambah User</a>
    </div>
</div>
<div class="card">
    <div class="table-scroll">
        <table class="table">
            <thead><tr><th>#</th><th>Username</th><th>Role</th><th>Peminjaman</th><th style="text-align:right">Aksi</th></tr></thead>
            <tbody>
                @forelse($users as $i => $u)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px">
                            <div class="avatar" style="width:28px;height:28px;font-size:11px;margin:0;{{ $u->role==='admin' ? 'background:linear-gradient(135deg,var(--warning),var(--orange))' : '' }}">{{ strtoupper(substr($u->username,0,1)) }}</div>
                            <span style="font-weight:600;color:var(--t-base)">{{ $u->username }}</span>
                        </div>
                    </td>
                    <td><span class="badge {{ $u->role==='admin' ? 'warning' : 'primary' }} dot">{{ ucfirst($u->role) }}</span></td>
                    <td style="color:var(--t-muted)">{{ $u->peminjaman_count }}</td>
                    <td style="text-align:right">
                        <a href="{{ route('user.edit', $u) }}" class="btn btn--sm btn--ghost">Edit</a>
                        @if($u->id !== auth()->id())
                        <form action="{{ route('user.destroy', $u) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin hapus?')">@csrf @method('DELETE')<button class="btn btn--sm btn--outline-danger">Hapus</button></form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" style="text-align:center;padding:32px;color:var(--t-muted)">Belum ada user.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
