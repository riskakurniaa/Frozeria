@extends('layouts.app')
@section('content')
<div class="mb-3">
    <a href="{{ route('kategori.index') }}" class="btn btn-outline-secondary btn-sm me-2">‹ Kembali</a>
    <strong>{{ isset($kategori) ? 'Edit Kategori' : 'Tambah Kategori' }}</strong>
</div>
<div class="card shadow-sm p-4" style="max-width:500px">
    <form method="POST"
        action="{{ isset($kategori) ? route('kategori.update', $kategori->id) : route('kategori.store') }}">
        @csrf
        @if(isset($kategori)) @method('PUT') @endif

        <div class="mb-3">
            <label class="form-label">Nama kategori <span class="text-danger">*</span></label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $kategori->nama ?? '') }}" required>
        </div>
        <div class="mb-4">
            <label class="form-label">Deskripsi (opsional)</label>
            <textarea name="deskripsi" class="form-control" rows="3"
                placeholder="Produk berbahan dasar ayam beku...">{{ old('deskripsi', $kategori->deskripsi ?? '') }}</textarea>
        </div>
        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan Kategori</button>
        </div>
    </form>
</div>
@endsection
