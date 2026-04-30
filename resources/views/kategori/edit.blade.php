@extends('layouts.app', ['header' => 'Edit Kategori', 'title' => 'Edit Kategori - Inventory'])
@section('content')
<div style="max-width:640px">
    <a href="{{ route('kategori.index') }}" class="btn btn--ghost btn--sm" style="margin-bottom:20px">← Kembali</a>
    <div class="card">
        <div class="card-head"><div class="card-title-wrap"><h3 class="card-title">Edit Kategori</h3></div></div>
        <form action="{{ route('kategori.update', $kategori) }}" method="POST">
            @csrf @method('PUT')
            <div class="form-grid">
                <div class="field span-2">
                    <label class="field-label">Nama Kategori <span class="req">*</span></label>
                    <input type="text" name="nama" value="{{ old('nama', $kategori->nama) }}" class="input" required>
                </div>
                <div class="field span-2">
                    <label class="field-label">Deskripsi</label>
                    <textarea name="deskripsi" class="textarea">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn--primary">Perbarui</button>
                <a href="{{ route('kategori.index') }}" class="btn btn--ghost">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
