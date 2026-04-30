@extends('layouts.app', ['header' => 'Edit User', 'title' => 'Edit User - Inventory'])
@section('content')
<div>
    <a href="{{ route('user.index') }}" class="btn btn--ghost btn--sm" style="margin-bottom:20px">← Kembali</a>
    <div class="card">
        <div class="card-head"><div class="card-title-wrap"><h3 class="card-title">Edit User</h3></div></div>
        <form action="{{ route('user.update', $user) }}" method="POST">
            @csrf @method('PUT')
            <div class="form-grid">
                <div class="field span-2">
                    <label class="field-label">Username <span class="req">*</span></label>
                    <input type="text" name="username" value="{{ old('username', $user->username) }}" class="input" required>
                </div>
                <div class="field">
                    <label class="field-label">Password <span class="field-help">(kosongkan jika tidak ubah)</span></label>
                    <input type="password" name="password" class="input" placeholder="Minimal 6 karakter">
                </div>
                <div class="field">
                    <label class="field-label">Role <span class="req">*</span></label>
                    <select name="role" class="select" required>
                        <option value="user" {{ old('role',$user->role)==='user'?'selected':'' }}>User</option>
                        <option value="admin" {{ old('role',$user->role)==='admin'?'selected':'' }}>Admin</option>
                    </select>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn--primary">Perbarui</button>
                <a href="{{ route('user.index') }}" class="btn btn--ghost">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
