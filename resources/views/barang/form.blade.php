@extends('layouts.app')
@section('content')
<div class="mb-3">
    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm me-2">‹ Kembali</a>
    <strong>{{ isset($barang) ? 'Edit Barang' : 'Tambah Barang Baru' }}</strong>
</div>

<div class="card shadow-sm p-4">
    <form method="POST"
        action="{{ isset($barang) ? route('barang.update', $barang->id) : route('barang.store') }}"
        enctype="multipart/form-data">
        @csrf
        @if(isset($barang)) @method('PUT') @endif

        {{-- Upload Foto --}}
        <div class="mb-4">
            <label class="form-label fw-semibold">Foto barang</label>
            <div class="border rounded p-4 text-center bg-light" style="border-style:dashed!important">
                <div class="mb-2">
                    @if(isset($barang) && $barang->foto)
                        <img src="{{ asset('storage/'.$barang->foto) }}" id="previewFoto" style="max-height:100px">
                    @else
                        <i class="bi bi-image text-muted fs-1" id="iconFoto"></i>
                        <img src="" id="previewFoto" style="max-height:100px;display:none">
                    @endif
                </div>
                <p class="text-muted small mb-2">Klik untuk memilih foto, atau seret file ke sini<br>Format: JPG, PNG — Maks. 2 MB</p>
                <label class="btn btn-outline-secondary btn-sm" for="foto">Pilih Foto</label>
                <input type="file" id="foto" name="foto" class="d-none" accept="image/jpg,image/jpeg,image/png"
                    onchange="previewImage(this)">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama barang <span class="text-danger">*</span></label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $barang->nama ?? '') }}" required>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label">Kategori <span class="text-danger">*</span></label>
                <select name="kategori_id" class="form-select" required>
                    <option value="">Pilih kategori</option>
                    @foreach($kategoris as $k)
                        <option value="{{ $k->id }}" {{ old('kategori_id', $barang->kategori_id ?? '') == $k->id ? 'selected' : '' }}>
                            {{ $k->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Satuan <span class="text-danger">*</span></label>
                <input type="text" name="satuan" class="form-control" value="{{ old('satuan', $barang->satuan ?? '') }}" required>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label">Jumlah stok <span class="text-danger">*</span></label>
                <input type="number" name="jumlah_stok" class="form-control" min="0" value="{{ old('jumlah_stok', $barang->jumlah_stok ?? 0) }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Stok minimum</label>
                <input type="number" name="stok_minimum" class="form-control" min="0" value="{{ old('stok_minimum', $barang->stok_minimum ?? '') }}">
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label">Harga jual (Rp)</label>
                <input type="number" name="harga_jual" class="form-control" min="0" value="{{ old('harga_jual', $barang->harga_jual ?? '') }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Harga beli (Rp)</label>
                <input type="number" name="harga_beli" class="form-control" min="0" value="{{ old('harga_beli', $barang->harga_beli ?? '') }}">
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label">Berat / ukuran</label>
                <input type="text" name="berat_ukuran" class="form-control" value="{{ old('berat_ukuran', $barang->berat_ukuran ?? '') }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Lokasi simpan</label>
                <input type="text" name="lokasi_simpan" class="form-control" value="{{ old('lokasi_simpan', $barang->lokasi_simpan ?? '') }}">
            </div>
        </div>
        <div class="mb-4">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $barang->deskripsi ?? '') }}</textarea>
        </div>

        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan Barang</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('previewFoto').src = e.target.result;
            document.getElementById('previewFoto').style.display = 'block';
            const icon = document.getElementById('iconFoto');
            if (icon) icon.style.display = 'none';
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
