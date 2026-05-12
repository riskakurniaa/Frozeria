@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm me-2">‹ Kembali</a>
        <strong>Detail Barang</strong>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-primary btn-sm">Edit Barang</a>
        <button class="btn btn-danger btn-sm"
            onclick="konfirmasiHapus({{ $barang->id }}, '{{ addslashes($barang->nama) }}')">Hapus</button>
    </div>
</div>

<div class="card shadow-sm p-4">
    <div class="d-flex gap-4 mb-4 align-items-start">
        <div class="border rounded d-flex align-items-center justify-content-center bg-light"
            style="width:100px;height:100px;flex-shrink:0">
            @if($barang->foto)
                <img src="{{ asset('storage/' . $barang->foto) }}" alt="foto" style="max-width:100%;max-height:100%;object-fit:cover;border-radius:6px;">
            @else
                <i class="bi bi-image text-muted fs-1"></i>
            @endif
        </div>
        <div>
            <h5 class="fw-bold mb-1">{{ $barang->nama }}</h5>
            @if($barang->kategori)
                <span class="badge-kategori">{{ $barang->kategori->nama }}</span>
            @endif
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-6">
            <div class="border rounded p-3">
                <small class="text-muted d-block">Jumlah stok</small>
                <strong>{{ $barang->jumlah_stok }} {{ $barang->satuan }}</strong>
            </div>
        </div>
        <div class="col-md-6">
            <div class="border rounded p-3">
                <small class="text-muted d-block">Stok minimum</small>
                <strong>{{ $barang->stok_minimum ?? '-' }} {{ $barang->satuan }}</strong>
            </div>
        </div>
        <div class="col-md-6">
            <div class="border rounded p-3">
                <small class="text-muted d-block">Harga jual</small>
                <strong>Rp {{ number_format($barang->harga_jual, 0, ',', '.') }}</strong>
            </div>
        </div>
        <div class="col-md-6">
            <div class="border rounded p-3">
                <small class="text-muted d-block">Harga beli</small>
                <strong>Rp {{ number_format($barang->harga_beli, 0, ',', '.') }}</strong>
            </div>
        </div>
        <div class="col-md-6">
            <div class="border rounded p-3">
                <small class="text-muted d-block">Berat / ukuran</small>
                <strong>{{ $barang->berat_ukuran ?? '-' }}</strong>
            </div>
        </div>
        <div class="col-md-6">
            <div class="border rounded p-3">
                <small class="text-muted d-block">Lokasi simpan</small>
                <strong>{{ $barang->lokasi_simpan ?? '-' }}</strong>
            </div>
        </div>
        <div class="col-12">
            <div class="border rounded p-3">
                <small class="text-muted d-block">Deskripsi</small>
                <span>{{ $barang->deskripsi ?? '-' }}</span>
            </div>
        </div>
    </div>
</div>

{{-- Modal Hapus --}}
<div class="modal fade" id="modalHapus" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" style="max-width:380px">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="d-flex gap-3 align-items-start mb-3">
                    <i class="bi bi-exclamation-triangle text-warning fs-3"></i>
                    <div>
                        <div class="fw-bold fs-5">Hapus barang?</div>
                        <p class="text-muted mb-0" id="pesanHapus"></p>
                    </div>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="formHapus" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function konfirmasiHapus(id, nama) {
    document.getElementById('pesanHapus').innerText = 'Data ' + nama + ' akan dihapus secara permanen dari sistem. Tindakan ini tidak dapat dibatalkan.';
    document.getElementById('formHapus').action = '/barang/' + id;
    new bootstrap.Modal(document.getElementById('modalHapus')).show();
}
</script>
@endsection
