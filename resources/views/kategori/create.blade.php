@extends('layouts.app', ['header' => 'Tambah Kategori', 'title' => 'Tambah Kategori - Inventory'])
@section('content')
<div style="max-width:640px">
    <a href="{{ route('kategori.index') }}" class="btn btn--ghost btn--sm" style="margin-bottom:20px">← Kembali</a>
    <div class="card">
        <div class="card-head"><div class="card-title-wrap"><h3 class="card-title">Tambah Kategori</h3></div></div>
        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf
            <div class="form-grid">
                <div class="field span-2">
                    <label class="field-label">Nama Kategori <span class="req">*</span></label>
                    <input type="text" name="nama" value="{{ old('nama') }}" class="input" placeholder="Contoh: Elektronik" required>
                </div>
                <div class="field span-2">
                    <label class="field-label">Deskripsi</label>
                    <textarea name="deskripsi" class="textarea" placeholder="Deskripsi singkat...">{{ old('deskripsi') }}</textarea>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn--primary">Simpan</button>
                <a href="{{ route('kategori.index') }}" class="btn btn--ghost">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
