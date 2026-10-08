@php
    // 1. Cek Koneksi Database
    $dbConnected = false;
    try {
        \Sakuci\Database\Connection::pdo();
        $dbConnected = true;
    } catch (\Throwable $e) {
        $dbConnected = false;
    }

    // 2. Data Pengguna Saat Ini
    $currentUser = \App\Models\User::current();

    // 3. Cek Status Pendaftaran
    $canRegister = false;
    if (!$currentUser && $dbConnected) {
        try {
            $canRegister = \App\Models\Role::where('can_register', 1)->exists();
        } catch (\Throwable $e) {
            $canRegister = false;
        }
    }
@endphp

<!-- Wrapper Utama Layout Flexbox -->
<div class="d-flex min-vh-100 w-100" id="wrapper">

    <!-- Latar gelap saat sidebar terbuka di ponsel -->
    <div id="sidebarBackdrop"></div>

    <!-- SIDEBAR (menempel di layar, tidak ikut ter-scroll) -->
    <aside class="bg-body border-end d-flex flex-column flex-shrink-0 p-3 shadow-sm" id="sidebar">

        <!-- Header Sidebar: Status DB/Tema & Nama Aplikasi -->
        <div class="d-flex align-items-center justify-content-between pb-3 mb-3 border-bottom">
            <div class="d-flex align-items-center gap-2 overflow-hidden">
                <button id="themeToggle" type="button" class="logo-toggle"
                        aria-label="Ganti tema terang/gelap (status database: {{ $dbConnected ? 'terhubung' : 'tidak terhubung' }})"
                        title="Status Database: {{ $dbConnected ? 'Terhubung' : 'Tidak Terhubung' }}">
                    <svg width="28" height="28" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" class="d-block">
                        <circle class="logo-ring" cx="16" cy="16" r="15" fill="none" stroke="currentColor" stroke-width="2"/>
                        <circle cx="16" cy="16" r="9" fill="{{ $dbConnected ? '#28a745' : '#dc3545' }}"/>
                    </svg>
                </button>

                <a class="sidebar-brand fw-semibold m-0 text-decoration-none text-body text-truncate" href="{{ route('home') }}">
                    {{ config('app.name', 'Peminjaman Alat') }}
                </a>
            </div>

            <!-- Tombol tutup (hanya di ponsel) -->
            <button class="btn-close d-md-none" type="button" id="sidebarToggle" aria-label="Tutup Menu"></button>
        </div>

        <!-- Menu Navigasi Utama.
             Menu tetap menyala di halaman turunannya: tambahkan nama route
             halaman create/edit/show ke is_route() sesuai route aplikasimu. -->
        <nav class="flex-grow-1 overflow-auto" id="sidebarNav">
            <ul class="nav nav-pills flex-column mb-auto gap-1">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ is_route('home') ? 'active' : '' }}"
                       href="{{ route('home') }}" @if (is_route('home')) aria-current="page" @endif>
                        <i class="bi bi-house-door fs-5"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ is_route('kategori.index', 'kategori.create', 'kategori.show', 'kategori.edit') ? 'active' : '' }}"
                       href="{{ route('kategori.index') }}" @if (is_route('kategori.index', 'kategori.create', 'kategori.show', 'kategori.edit')) aria-current="page" @endif>
                        <i class="bi bi-tags fs-5"></i>
                        <span>Kategori</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ is_route('alat.index', 'alat.create', 'alat.show', 'alat.edit') ? 'active' : '' }}"
                       href="{{ route('alat.index') }}" @if (is_route('alat.index', 'alat.create', 'alat.show', 'alat.edit')) aria-current="page" @endif>
                        <i class="bi bi-tools fs-5"></i>
                        <span>Alat</span>
                    </a>
                </li>

                <!-- Menu Khusus User Login -->
                @if ($currentUser)
                    <li class="nav-item mt-3 pt-2 border-top">
                        <a class="nav-link d-flex align-items-center gap-2 {{ is_route('admin.dashboard', 'dashboard') ? 'active' : '' }}"
                           href="{{ $currentUser->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}"
                           @if (is_route('admin.dashboard', 'dashboard')) aria-current="page" @endif>
                            <i class="bi bi-speedometer2 fs-5"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>

        <!-- Footer Sidebar (User / Action Auth) -->
        <div class="pt-3 mt-auto border-top">
            @if ($currentUser)
                <div class="mb-2 small text-muted text-truncate">
                    Login sebagai: <strong class="text-body">{{ $currentUser->username }}</strong>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger w-100 d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </button>
                </form>
            @else
                <div class="d-flex flex-column gap-2">
                    @if ($canRegister)
                        <a class="btn btn-sm btn-outline-primary w-100 {{ is_route('register') ? 'active' : '' }}" href="{{ route('register') }}">
                            Daftar
                        </a>
                    @endif
                    <a class="btn btn-sm btn-brand rounded-pill px-3 d-flex align-items-center justify-content-center gap-2 w-100" href="{{ route('login') }}">
                        <svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="8" cy="5" r="3" fill="currentColor" stroke="none"/>
                            <path d="M2.5 14c0-3.6 2.9-5.8 5.5-5.8s5.5 2.2 5.5 5.8"/>
                        </svg>
                        <span>Masuk</span>
                    </a>
                </div>
            @endif
        </div>

    </aside>

    <!-- AREA KONTEN UTAMA -->
    <main class="flex-grow-1 p-4 bg-body-tertiary" style="min-width: 0;">

        <!-- Tombol buka menu (hanya di ponsel) -->
        <div class="d-md-none mb-3">
            <button class="btn btn-sm btn-outline-secondary d-inline-flex align-items-center gap-2" type="button" id="sidebarOpen">
                <i class="bi bi-list fs-5"></i>
                <span>Menu</span>
            </button>
        </div>

        @yield('content')
    </main>

</div>

<script>
(function () {
    var body = document.body;
    var nav  = document.getElementById('sidebarNav');

    function bukaMenu()  { body.classList.add('sidebar-open'); }
    function tutupMenu() { body.classList.remove('sidebar-open'); }

    var btnBuka = document.getElementById('sidebarOpen');
    if (btnBuka) btnBuka.addEventListener('click', bukaMenu);
    document.getElementById('sidebarToggle').addEventListener('click', tutupMenu);
    document.getElementById('sidebarBackdrop').addEventListener('click', tutupMenu);
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') tutupMenu(); });

    // Pertahankan posisi scroll menu antar halaman, lalu pastikan menu aktif terlihat.
    try {
        var y = sessionStorage.getItem('sidebar-scroll');
        if (y !== null && nav) nav.scrollTop = parseInt(y, 10) || 0;
        window.addEventListener('pagehide', function () {
            sessionStorage.setItem('sidebar-scroll', nav.scrollTop);
        });
    } catch (e) {}

    var aktif = nav && nav.querySelector('.nav-link.active');
    if (aktif) aktif.scrollIntoView({ block: 'nearest' });
})();
</script>s