@extends('layouts.app', ['header' => 'Tambah Barang', 'title' => 'Tambah Barang - Inventory'])
@section('content')
<div>
    <a href="{{ route('barang.index') }}" class="btn btn--ghost btn--sm" style="margin-bottom:20px">← Kembali</a>
    <div class="card">
        <div class="card-head"><div class="card-title-wrap"><h3 class="card-title">Tambah Barang</h3></div></div>
        <form action="{{ route('barang.store') }}" method="POST">
            @csrf
            <div class="form-grid">
                <div class="field span-2">
                    <label class="field-label">Nama Barang <span class="req">*</span></label>
                    <input type="text" name="nama" value="{{ old('nama') }}" class="input" placeholder="Contoh: Laptop ASUS" required>
                </div>
                <div class="field">
                    <label class="field-label">Stok <span class="req">*</span></label>
                    <input type="number" name="stok" value="{{ old('stok', 0) }}" min="0" class="input" required>
                </div>
                <div class="field">
                    <label class="field-label">Kategori <span class="req">*</span></label>
                    <select name="id_kat" class="select" required>
                        <option value="">Pilih Kategori</option>
                        @foreach($kategori as $k)
                        <option value="{{ $k->id }}" {{ old('id_kat')==$k->id?'selected':'' }}>{{ $k->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn--primary">Simpan</button>
                <a href="{{ route('barang.index') }}" class="btn btn--ghost">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
