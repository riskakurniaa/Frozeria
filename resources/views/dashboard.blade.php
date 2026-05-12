@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold mb-0">Dashboard</h5>
    <a href="{{ route('barang.create') }}" class="btn btn-primary btn-sm">
        <i class="bi bi-plus"></i> Tambah Barang
    </a>
</div>

{{-- Cards --}}
<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="card h-100 p-3 shadow-sm">
            <div class="text-muted small">Total barang</div>
            <div class="fs-3 fw-bold">{{ $totalBarang }}</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card h-100 p-3 shadow-sm">
            <div class="text-muted small">Total kategori</div>
            <div class="fs-3 fw-bold">{{ $totalKategori }}</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card h-100 p-3 shadow-sm">
            <div class="text-muted small">Stok menipis</div>
            <div class="fs-3 fw-bold text-warning">{{ $stokMenipis }}</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card h-100 p-3 shadow-sm">
            <div class="text-muted small">Stok habis</div>
            <div class="fs-3 fw-bold text-danger">{{ $stokHabis }}</div>
        </div>
    </div>
</div>

{{-- Filter --}}
<form method="GET" action="{{ route('dashboard') }}" class="d-flex gap-3 mb-3 align-items-center">
    <div class="input-group flex-grow-1">
        <input type="text" name="search" class="form-control form-control-sm"
            placeholder="Cari nama barang..." value="{{ request('search') }}">
        <button class="btn btn-primary btn-sm px-4" type="submit">Cari</button>
    </div>
    <select name="kategori_id" class="form-select form-select-sm" style="width:200px;flex-shrink:0" onchange="this.form.submit()">
        <option value="">Semua kategori</option>
        @foreach($kategoris as $k)
            <option value="{{ $k->id }}" {{ request('kategori_id') == $k->id ? 'selected' : '' }}>
                {{ $k->nama }}
            </option>
        @endforeach
    </select>
</form>

{{-- Tabel --}}
<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Nama barang</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Harga jual</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($barangs as $b)
                <tr>
                    <td>{{ $b->nama }}</td>
                    <td>
                        @if($b->kategori)
                            <span class="badge-kategori">{{ $b->kategori->nama }}</span>
                        @else <span class="text-muted">-</span> @endif
                    </td>
                    <td class="{{ $b->jumlah_stok == 0 ? 'stok-habis' : ($b->jumlah_stok < 20 ? 'stok-menipis' : '') }}">
                        {{ $b->jumlah_stok }}
                    </td>
                    <td>{{ $b->satuan }}</td>
                    <td>Rp {{ number_format($b->harga_jual, 0, ',', '.') }}</td>
                    <td class="d-flex gap-1">
                        <a href="{{ route('barang.show', $b->id) }}" class="btn btn-outline-secondary btn-sm">Detail</a>
                        <a href="{{ route('barang.edit', $b->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                        <button class="btn btn-outline-danger btn-sm"
                            onclick="konfirmasiHapus({{ $b->id }}, '{{ addslashes($b->nama) }}')">Hapus</button>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-4">Tidak ada barang ditemukan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="card-footer d-flex justify-content-between align-items-center">
        <small class="text-muted">Menampilkan {{ $barangs->firstItem() }}–{{ $barangs->lastItem() }} dari {{ $barangs->total() }} barang</small>
        <nav>
            <ul class="pagination pagination-sm mb-0">
                {{-- Prev --}}
                @if($barangs->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">‹ Prev</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $barangs->previousPageUrl() }}">‹ Prev</a></li>
                @endif

                {{-- Nomor halaman --}}
                @for($i = 1; $i <= $barangs->lastPage(); $i++)
                    <li class="page-item {{ $barangs->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" href="{{ $barangs->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                {{-- Next --}}
                @if($barangs->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $barangs->nextPageUrl() }}">Next ›</a></li>
                @else
                    <li class="page-item disabled"><span class="page-link">Next ›</span></li>
                @endif
            </ul>
        </nav>
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
