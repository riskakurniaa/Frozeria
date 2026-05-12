<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frozeria Stok</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #f4f6f9; }
        .navbar-brand { font-weight: 700; color: #1a73e8 !important; }
        .nav-link { font-weight: 500; }
        .nav-link.active { color: #1a73e8 !important; border-bottom: 2px solid #1a73e8; }
        .card-stat { border-left: 4px solid #1a73e8; }
        .badge-kategori { background: #e8f0fe; color: #1a73e8; padding: 3px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 600; }
        .btn-hapus { color: #dc3545; }
        .stok-habis { color: #dc3545; font-weight: 600; }
        .stok-menipis { color: #fd7e14; font-weight: 600; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg mb-4" style="background:#1a1a2e;">
    <div class="container-fluid px-4">

        {{-- Logo + Menu sejajar di kiri --}}
        <div class="d-flex align-items-center gap-3">

            {{-- Logo --}}
            <div class="d-flex align-items-center gap-1">
                <span class="fw-bold text-white">Frozeria</span>
                <span class="text-white-50">Stok</span>
            </div>

            {{-- Menu --}}
            <div class="d-flex gap-1">
                <a class="nav-link px-3 py-1 rounded-1
                    {{ request()->routeIs('dashboard') ? 'text-white' : 'text-white-50' }}"
                    style="{{ request()->routeIs('dashboard') ? 'background:rgba(255,255,255,0.15);' : '' }}"
                    href="{{ route('dashboard') }}">Dashboard</a>

                <a class="nav-link px-3 py-1 rounded-1
                    {{ request()->routeIs('kategori.*') ? 'text-white' : 'text-white-50' }}"
                    style="{{ request()->routeIs('kategori.*') ? 'background:rgba(255,255,255,0.15);' : '' }}"
                    href="{{ route('kategori.index') }}">Kategori</a>

                <a class="nav-link px-3 py-1 rounded-1
                    {{ request()->routeIs('bantuan') ? 'text-white' : 'text-white-50' }}"
                    style="{{ request()->routeIs('bantuan') ? 'background:rgba(255,255,255,0.15);' : '' }}"
                    href="{{ route('bantuan') }}">Bantuan</a>
            </div>

        </div>
    </div>
</nav>
<div class="container-fluid px-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')
</body>
</html>
