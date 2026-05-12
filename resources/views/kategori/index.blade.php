@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold mb-0">Daftar Kategori</h5>
    <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm">+ Tambah Kategori</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form method="GET" class="mb-3">
            <input type="text" name="search" class="form-control form-control-sm"
                placeholder="Cari kategori..." value="{{ request('search') }}"
                onchange="this.form.submit()">
        </form>
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Nama kategori</th>
                    <th>Jumlah barang</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kategoris as $k)
                <tr>
                    <td>{{ $k->nama }}</td>
                    <td>{{ $k->barangs_count }} barang</td>
                    <td>{{ \Carbon\Carbon::parse($k->created_at)->format('j M Y') }}</td>
                    <td class="d-flex gap-1">
                        <a href="{{ route('kategori.edit', $k->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                        <button class="btn btn-outline-danger btn-sm"
                            onclick="konfirmasiHapus({{ $k->id }}, '{{ addslashes($k->nama) }}')">Hapus</button>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center text-muted">Tidak ada kategori.</td></tr>
                @endforelse
            </tbody>
        </table>
        <small class="text-muted">{{ $kategoris->count() }} kategori terdaftar</small>
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
                        <div class="fw-bold fs-5">Hapus kategori?</div>
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
    document.getElementById('pesanHapus').innerText = 'Kategori ' + nama + ' akan dihapus secara permanen.';
    document.getElementById('formHapus').action = '/kategori/' + id;
    new bootstrap.Modal(document.getElementById('modalHapus')).show();
}
</script>
@endsection
