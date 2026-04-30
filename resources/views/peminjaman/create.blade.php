@extends('layouts.app', ['header' => 'Buat Peminjaman', 'title' => 'Buat Peminjaman - Inventory'])
@section('content')
<div style="max-width:640px">
    <a href="{{ route('peminjaman.index') }}" class="btn btn--ghost btn--sm" style="margin-bottom:20px">← Kembali</a>
    <div class="card">
        <div class="card-head"><div class="card-title-wrap"><h3 class="card-title">Buat Peminjaman Baru</h3></div></div>
        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf
            <div class="form-grid">
                <div class="field">
                    <label class="field-label">Nama Peminjam <span class="req">*</span></label>
                    <input type="text" name="nama_peminjam" value="{{ old('nama_peminjam') }}" class="input" placeholder="Nama lengkap" required>
                </div>
                <div class="field">
                    <label class="field-label">Tanggal Pinjam <span class="req">*</span></label>
                    <input type="date" name="tgl_pinjam" value="{{ old('tgl_pinjam', date('Y-m-d')) }}" class="input" required>
                </div>
                <div class="field span-2">
                    <label class="field-label">Pilih Barang <span class="req">*</span></label>
                    @if($barang->count() > 0)
                    <div style="max-height:260px;overflow-y:auto;display:flex;flex-direction:column;gap:6px;padding:4px 0">
                        @foreach($barang as $b)
                        <label class="check" style="padding:10px 14px;background:var(--bg-muted);border-radius:8px;display:flex;gap:12px;cursor:pointer;transition:background 160ms">
                            <input type="checkbox" name="barang_ids[]" value="{{ $b->id }}" {{ in_array($b->id, old('barang_ids', [])) ? 'checked' : '' }}>
                            <div style="flex:1">
                                <div style="font-weight:600;font-size:13px;color:var(--t-base)">{{ $b->nama }}</div>
                                <div style="font-size:11px;color:var(--t-muted)">{{ $b->kategori->nama ?? '-' }}</div>
                            </div>
                            <span class="badge {{ $b->stok > 5 ? 'success' : 'warning' }}">Stok: {{ $b->stok }}</span>
                        </label>
                        @endforeach
                    </div>
                    @else
                    <div style="text-align:center;padding:24px;color:var(--t-muted);font-size:13px">Tidak ada barang tersedia.</div>
                    @endif
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn--primary">Buat Peminjaman</button>
                <a href="{{ route('peminjaman.index') }}" class="btn btn--ghost">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
