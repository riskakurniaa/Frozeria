@extends('layouts.app')

@section('content')
<div class="card shadow-sm p-4">
    <h6 class="fw-bold mb-4">Panduan Penggunaan Sistem</h6>

    {{-- Cara menambah barang baru --}}
    <div class="border rounded p-3 mb-3">
        <div class="fw-semibold mb-2">Cara menambah barang baru</div>
        <div class="d-flex align-items-start gap-2 mb-2">
            <span class="border rounded px-2 py-0 text-muted small" style="flex-shrink:0">1</span>
            <span>Buka halaman <strong>Dashboard</strong>, klik tombol <strong>+ Tambah Barang</strong> di kanan atas.</span>
        </div>
        <div class="d-flex align-items-start gap-2 mb-2">
            <span class="border rounded px-2 py-0 text-muted small" style="flex-shrink:0">2</span>
            <span>Unggah foto barang (opsional), lalu isi formulir: nama, kategori, satuan, jumlah stok, harga, dan lainnya.</span>
        </div>
        <div class="d-flex align-items-start gap-2">
            <span class="border rounded px-2 py-0 text-muted small" style="flex-shrink:0">3</span>
            <span>Klik <strong>Simpan Barang</strong>. Barang akan muncul di daftar dashboard.</span>
        </div>
    </div>

    {{-- Cara update stok --}}
    <div class="border rounded p-3 mb-3">
        <div class="fw-semibold mb-2">Cara update stok barang masuk</div>
        <div class="d-flex align-items-start gap-2 mb-2">
            <span class="border rounded px-2 py-0 text-muted small" style="flex-shrink:0">1</span>
            <span>Temukan barang di dashboard menggunakan kolom pencarian atau filter kategori.</span>
        </div>
        <div class="d-flex align-items-start gap-2 mb-2">
            <span class="border rounded px-2 py-0 text-muted small" style="flex-shrink:0">2</span>
            <span>Klik tombol <strong>Edit</strong> pada baris barang tersebut.</span>
        </div>
        <div class="d-flex align-items-start gap-2">
            <span class="border rounded px-2 py-0 text-muted small" style="flex-shrink:0">3</span>
            <span>Ubah nilai <strong>Jumlah stok</strong> sesuai kondisi saat ini, lalu klik <strong>Simpan Barang</strong>.</span>
        </div>
    </div>

    {{-- Cara mengelola kategori --}}
    <div class="border rounded p-3 mb-3">
        <div class="fw-semibold mb-2">Cara mengelola kategori</div>
        <div class="d-flex align-items-start gap-2 mb-2">
            <span class="border rounded px-2 py-0 text-muted small" style="flex-shrink:0">1</span>
            <span>Buka halaman <strong>Kategori</strong> dari navigasi atas.</span>
        </div>
        <div class="d-flex align-items-start gap-2 mb-2">
            <span class="border rounded px-2 py-0 text-muted small" style="flex-shrink:0">2</span>
            <span>Tambah, edit, atau hapus kategori sesuai kebutuhan toko.</span>
        </div>
        <div class="d-flex align-items-start gap-2">
            <span class="border rounded px-2 py-0 text-muted small" style="flex-shrink:0">3</span>
            <span>Menghapus kategori tidak akan menghapus barang — barang akan menjadi tidak berkategori.</span>
        </div>
    </div>

    {{-- Catatan satuan --}}
    <div class="border rounded p-3 mb-3 d-flex align-items-start gap-2">
        <i class="bi bi-info-circle text-muted mt-1" style="flex-shrink:0"></i>
        <span>Satuan barang diisi bebas sesuai kebutuhan — misalnya: <strong>pcs</strong>, <strong>pack</strong>, <strong>box</strong>, <strong>kg</strong>, <strong>liter</strong>, dan lain-lain.</span>
    </div>

    <hr>

    {{-- Informasi Developer --}}
    <div class="mt-3">
        <h6 class="fw-bold mb-3 text-muted">Informasi Developer</h6>
        <table class="table table-sm table-borderless mb-0" style="max-width:420px;">
            <tr>
                <td class="text-muted" style="width:130px;">Nama</td>
                <td><strong>Riska Kurnia Triwulandari</strong></td>
            </tr>
            <tr>
                <td class="text-muted">NIM</td>
                <td><strong>2241720039</strong></td>
            </tr>
            <tr>
                <td class="text-muted">Kelas</td>
                <td><strong>TI-4H</strong></td>
            </tr>
            <tr>
                <td class="text-muted">Alamat</td>
                <td>Jl. Remujung No. 30</td>
            </tr>
            <tr>
                <td class="text-muted">No. Telepon</td>
                <td>085607178754</td>
            </tr>
            <tr>
                <td class="text-muted">Email</td>
                <td>riskakurniatriwulandari@gmail.com</td>
            </tr>
        </table>
    </div>
</div>
@endsection
