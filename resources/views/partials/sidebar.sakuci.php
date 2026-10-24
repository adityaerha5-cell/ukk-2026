@php
    $currentUri = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);

    $currentUser = $user ?? \App\Models\User::current();
    $role = $currentUser->role ?? 'siswa';

    $logoUrl = route('dashboard');

    if ($currentUser) {
        if ($role === 'admin') {
            $logoUrl = route('admin.dashboard');
        } elseif ($role === 'petugas') {
            $logoUrl = route('petugas.dashboard');
        } elseif ($role === 'peminjam') {
            $logoUrl = route('peminjam.dashboard');
        }
    } else {
        $logoUrl = route('home');
    }

    $isActive = function (...$paths) use ($currentUri) {
        foreach ($paths as $path) {
            if (empty($path)) continue;

            if (
                $path === '/' &&
                ($currentUri === '/' || str_ends_with($currentUri, '/public/'))
            ) {
                return true;
            }

            if ($path !== '/' && str_contains($currentUri, $path)) {
                return true;
            }
        }

        return false;
    };
@endphp

<style>
/* =====================================================
   SAKUCI SIDEBAR — MINIMALIST CHARCOAL
   ===================================================== */

#appSidebar {
    --side-accent: #343A40;
    --side-accent-hover: #495057;
    --side-border: var(--bs-border-color);

    width: 260px;
    min-width: 260px;

    background: var(--bs-body-bg) !important;
    border-right: 1px solid var(--side-border) !important;
    box-shadow: 4px 0 18px rgba(0, 0, 0, .035);

    z-index: 1050;
    transition: transform .25s ease;
}

/* BRAND */

.sakuci-brand {
    padding: 8px;
    border-radius: 12px;
    color: var(--bs-body-color);
    text-decoration: none;
    transition: background .2s ease;
}

.sakuci-brand:hover {
    background: var(--bs-tertiary-bg);
    color: var(--bs-body-color);
}

.sakuci-logo-icon {
    width: 42px;
    height: 42px;
    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 12px;
    color: #fff;
    background: var(--side-accent);
    font-size: 1.25rem;
}

/* BRAND TEXT */

.sakuci-brand-title {
    font-size: .9rem;
    font-weight: 800;
    letter-spacing: .06em;
}

.sakuci-brand-subtitle {
    font-size: .7rem;
    color: var(--bs-secondary-color);
}

/* THEME BUTTON */

#themeToggle {
    width: 36px;
    height: 36px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 10px;
    color: var(--bs-body-color);
    background: transparent;

    transition: background .2s ease, color .2s ease;
}

#themeToggle:hover {
    color: var(--side-accent);
    background: var(--bs-tertiary-bg);
}

/* SCROLLBAR */

.sakuci-sidebar-scroll {
    scrollbar-width: thin;
    scrollbar-color: var(--side-border) transparent;
}

/* SECTION HEADING */

.sidebar-heading {
    display: block;
    margin-top: 16px !important;
    margin-bottom: 8px !important;

    color: var(--bs-secondary-color) !important;
    font-size: .65rem !important;
    font-weight: 700;
    letter-spacing: .09em;
    text-transform: uppercase;
}

/* MENU LINKS */

.sidebar-link {
    display: flex;
    align-items: center;
    gap: 12px;

    width: 100%;
    padding: 10px 12px;
    margin-bottom: 3px;

    border-radius: 10px;
    color: var(--bs-body-color);
    text-decoration: none;

    font-size: .86rem;
    font-weight: 500;

    transition: background .2s ease, color .2s ease;
}

.sidebar-link i {
    width: 21px;
    flex-shrink: 0;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    font-size: 1rem;
    color: var(--bs-secondary-color);

    transition: color .2s ease;
}

/* HOVER */

.sidebar-link:hover {
    color: var(--side-accent);
    background: rgba(52, 58, 64, .08);
}

.sidebar-link:hover i {
    color: var(--side-accent);
}

/* ACTIVE MENU */

.sidebar-link.active {
    color: var(--side-accent);
    background: rgba(52, 58, 64, .12);
    font-weight: 700;
}

.sidebar-link.active i {
    color: var(--side-accent);
}

/* DIVIDER */

.sakuci-divider {
    opacity: .15;
}

/* USER PROFILE */

.sakuci-user-card {
    padding: 11px;
    border: 1px solid var(--side-border);
    border-radius: 12px;
    background: var(--bs-tertiary-bg);

    transition: border-color .2s ease;
}

.sakuci-user-card:hover {
    border-color: rgba(52, 58, 64, .4);
}

.sakuci-user-avatar {
    width: 38px;
    height: 38px;
    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 11px;
    color: #fff;
    background: var(--side-accent);
    font-size: 1.05rem;
}

/* ROLE BADGE */

.sakuci-role {
    display: inline-flex;
    align-items: center;

    margin-top: 4px;
    padding: 3px 8px;

    border-radius: 6px;
    color: var(--side-accent);
    background: rgba(52, 58, 64, .10);

    font-size: .62rem;
    font-weight: 700;
    letter-spacing: .04em;
    text-transform: uppercase;
}

/* BUTTONS */

.sakuci-logout,
.sakuci-auth-btn {
    padding: 9px !important;
    border-radius: 10px !important;
    font-size: .84rem;
    font-weight: 600 !important;

    transition: background .2s ease, color .2s ease;
}

.sakuci-logout:hover,
.sakuci-auth-btn:hover {
    transform: none;
}

/* LOGIN BUTTON */

.sakuci-auth-btn.btn-outline-success {
    --bs-btn-color: var(--side-accent);
    --bs-btn-border-color: var(--side-accent);
    --bs-btn-hover-color: #fff;
    --bs-btn-hover-bg: var(--side-accent);
    --bs-btn-hover-border-color: var(--side-accent);
    --bs-btn-active-bg: var(--side-accent);
    --bs-btn-active-border-color: var(--side-accent);
}

.sakuci-auth-btn.btn-success {
    --bs-btn-bg: var(--side-accent);
    --bs-btn-border-color: var(--side-accent);
    --bs-btn-hover-bg: var(--side-accent-hover);
    --bs-btn-hover-border-color: var(--side-accent-hover);
    --bs-btn-active-bg: var(--side-accent-hover);
    --bs-btn-active-border-color: var(--side-accent-hover);
}

/* MOUNTAIN DECORATION */

.sakuci-mountain {
    display: none;
}

/* DARK MODE */

[data-bs-theme="dark"] #appSidebar {
    box-shadow: 4px 0 18px rgba(0, 0, 0, .12);
}

[data-bs-theme="dark"] .sidebar-link:hover {
    color: #f1f3f5;
    background: rgba(255, 255, 255, .08);
}

[data-bs-theme="dark"] .sidebar-link:hover i {
    color: #f1f3f5;
}

[data-bs-theme="dark"] .sidebar-link.active {
    color: #f1f3f5;
    background: rgba(255, 255, 255, .12);
}

[data-bs-theme="dark"] .sidebar-link.active i {
    color: #f1f3f5;
}

[data-bs-theme="dark"] .sakuci-role {
    color: #e9ecef;
    background: rgba(255, 255, 255, .10);
}

[data-bs-theme="dark"] .sakuci-auth-btn.btn-outline-success {
    --bs-btn-color: #e9ecef;
    --bs-btn-border-color: #adb5bd;
    --bs-btn-hover-color: #212529;
    --bs-btn-hover-bg: #dee2e6;
    --bs-btn-hover-border-color: #dee2e6;
}

[data-bs-theme="dark"] .sakuci-auth-btn.btn-success {
    --bs-btn-color: #fff;
    --bs-btn-bg: var(--side-accent);
    --bs-btn-border-color: var(--side-accent);
}

/* THEME ICONS */

#themeToggle .icon-sun {
    display: none;
}

#themeToggle .icon-moon {
    display: inline-block;
}

[data-bs-theme="light"] #themeToggle .icon-sun {
    display: inline-block;
}

[data-bs-theme="light"] #themeToggle .icon-moon {
    display: none;
}

/* MOBILE */

@media (max-width: 991.98px) {
    #appSidebar {
        position: fixed !important;
        top: 0;
        bottom: 0;
        left: 0;

        transform: translateX(-105%);
        box-shadow: 8px 0 28px rgba(0, 0, 0, .12);
    }

    #appSidebar.show {
        transform: translateX(0);
    }
}

/* ACCESSIBILITY */

@media (prefers-reduced-motion: reduce) {
    #appSidebar,
    .sakuci-brand,
    .sidebar-link,
    .sidebar-link i,
    #themeToggle {
        transition: none;
    }
}
</style>

<!-- SIDEBAR -->

<div
    id="appSidebar"
    class="app-sidebar d-flex flex-column p-3 vh-100 position-sticky top-0"
>
    <!-- HEADER / BRAND -->

    <div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom flex-shrink-0">

        <a
            href="{{ $logoUrl }}"
            class="sakuci-brand d-flex align-items-center gap-2 overflow-hidden"
        >
            <div class="sakuci-logo-icon">
                <i class="bi bi-mountains"></i>
            </div>

            <div class="overflow-hidden">
                <div class="sakuci-brand-title text-truncate">
                    {{ config('app.name', 'SAKUCI') }}
                </div>

                <div class="sakuci-brand-subtitle">
                    Sistem Peminjaman Alat
                </div>
            </div>
        </a>

        <div class="d-flex align-items-center gap-1">

            <!-- THEME TOGGLE -->

            <button
                id="themeToggle"
                type="button"
                class="btn border-0 p-0"
                aria-label="Ganti tema terang/gelap"
                title="Ganti tema terang/gelap"
            >
                <svg
                    class="icon-moon"
                    width="19"
                    height="19"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                </svg>

                <svg
                    class="icon-sun"
                    width="19"
                    height="19"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <circle cx="12" cy="12" r="5"></circle>
                    <line x1="12" y1="1" x2="12" y2="3"></line>
                    <line x1="12" y1="21" x2="12" y2="23"></line>
                    <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                    <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                    <line x1="1" y1="12" x2="3" y2="12"></line>
                    <line x1="21" y1="12" x2="23" y2="12"></line>
                    <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                    <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                </svg>
            </button>

            <!-- CLOSE MOBILE -->

            <button
                id="sidebarToggleClose"
                type="button"
                class="btn btn-sm btn-link text-body p-0 d-lg-none"
                aria-label="Tutup Menu"
            >
                <i class="bi bi-x-lg fs-5"></i>
            </button>

        </div>
    </div>

    <!-- NAVIGATION -->

    <div class="flex-grow-1 overflow-y-auto pe-1 sakuci-sidebar-scroll">

        <ul class="nav flex-column gap-1 mb-3">

            <!-- BERANDA -->

            <li>
                @php
                    $active =
                        (function_exists('is_route') && is_route('home'))
                        || $currentUri === '/'
                        || str_ends_with($currentUri, '/public/');
                @endphp

                <a
                    href="{{ route('home') }}"
                    class="sidebar-link {{ $active ? 'active' : '' }}"
                >
                    <i class="bi bi-house-door-fill"></i>
                    <span>Beranda</span>
                </a>
            </li>

            <!-- ADMIN -->

            @if($role === 'admin')

                <li>
                    <small class="sidebar-heading px-2 my-2 d-block">
                        Utama
                    </small>
                </li>

                <li>
                    @php
                        $active =
                            $isActive('/admin/dashboard')
                            || $currentUri === '/admin'
                            || $currentUri === '/admin/';
                    @endphp

                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="sidebar-link {{ $active ? 'active' : '' }}"
                    >
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <small class="sidebar-heading px-2 my-2 d-block">
                        Pengguna
                    </small>
                </li>

                <li>
                    @php $active = $isActive('/admin/users'); @endphp

                    <a
                        href="{{ route('admin.users.index') }}"
                        class="sidebar-link {{ $active ? 'active' : '' }}"
                    >
                        <i class="bi bi-people-fill"></i>
                        <span>Manage User</span>
                    </a>
                </li>

                <li>
                    @php $active = $isActive('/admin/roles'); @endphp

                    <a
                        href="{{ route('admin.roles.index') }}"
                        class="sidebar-link {{ $active ? 'active' : '' }}"
                    >
                        <i class="bi bi-shield-check"></i>
                        <span>Manage Role</span>
                    </a>
                </li>

                <li>
                    <small class="sidebar-heading px-2 my-2 d-block">
                        Inventaris
                    </small>
                </li>

                <li>
                    @php $active = $isActive('/admin/kategori'); @endphp

                    <a
                        href="{{ route('kategori.index') }}"
                        class="sidebar-link {{ $active ? 'active' : '' }}"
                    >
                        <i class="bi bi-tags-fill"></i>
                        <span>Kategori Alat</span>
                    </a>
                </li>

                <li>
                    @php $active = $isActive('/admin/alat'); @endphp

                    <a
                        href="{{ route('alat.index') }}"
                        class="sidebar-link {{ $active ? 'active' : '' }}"
                    >
                        <i class="bi bi-box-seam-fill"></i>
                        <span>Data Alat</span>
                    </a>
                </li>

                <li>
                    <small class="sidebar-heading px-2 my-2 d-block">
                        Transaksi
                    </small>
                </li>

                <li>
                    @php $active = $isActive('/admin/peminjaman'); @endphp

                    <a
                        href="{{ route('peminjaman.index') }}"
                        class="sidebar-link {{ $active ? 'active' : '' }}"
                    >
                        <i class="bi bi-arrow-up-right-circle-fill"></i>
                        <span>Peminjaman</span>
                    </a>
                </li>

                <li>
                    @php $active = $isActive('/admin/pengembalian'); @endphp

                    <a
                        href="{{ route('pengembalian.index') }}"
                        class="sidebar-link {{ $active ? 'active' : '' }}"
                    >
                        <i class="bi bi-arrow-down-left-circle-fill"></i>
                        <span>Pengembalian</span>
                    </a>
                </li>

                <li>
                    <small class="sidebar-heading px-2 my-2 d-block">
                        Sistem
                    </small>
                </li>

                <li>
                    @php $active = $isActive('/admin/log-aktifitas'); @endphp

                    <a
                        href="{{ route('admin.log.index') }}"
                        class="sidebar-link {{ $active ? 'active' : '' }}"
                    >
                        <i class="bi bi-journal-text"></i>
                        <span>Log Aktifitas</span>
                    </a>
                </li>

                <li>
                    @php $active = $isActive('/admin/database/export'); @endphp

                    <a
                        href="{{ route('admin.database.export') }}"
                        class="sidebar-link {{ $active ? 'active' : '' }}"
                    >
                        <i class="bi bi-database-fill-down"></i>
                        <span>Backup Database</span>
                    </a>
                </li>

            <!-- PEMINJAM -->

            @elseif($role === 'peminjam')

                <li>
                    <small class="sidebar-heading px-2 my-2 d-block">
                        Menu Peminjam
                    </small>
                </li>

                <li>
                    @php
                        $active =
                            $currentUri === '/peminjam'
                            || $currentUri === '/peminjam/'
                            || $isActive('/peminjam/dashboard');
                    @endphp

                    <a
                        href="{{ route('peminjam.dashboard') }}"
                        class="sidebar-link {{ $active ? 'active' : '' }}"
                    >
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    @php
                        $active = $isActive(
                            '/peminjam/daftar-alat',
                            '/peminjam/alat'
                        );
                    @endphp

                    <a
                        href="{{ route('peminjam.alat') }}"
                        class="sidebar-link {{ $active ? 'active' : '' }}"
                    >
                        <i class="bi bi-box-seam-fill"></i>
                        <span>Daftar Alat</span>
                    </a>
                </li>

                <li>
                    @php
                        $active = $isActive(
                            '/peminjam/ajukan',
                            '/peminjam/create',
                            '/peminjam/peminjam/ajukan'
                        );
                    @endphp

                    <a
                        href="{{ route('peminjam.createPeminjam') }}"
                        class="sidebar-link {{ $active ? 'active' : '' }}"
                    >
                        <i class="bi bi-plus-circle-fill"></i>
                        <span>Ajukan Peminjaman</span>
                    </a>
                </li>

                <li>
                    @php
                        $active = $isActive('/peminjam/pengembalian');
                    @endphp

                    <a
                        href="{{ route('peminjam.pengembalian.create') }}"
                        class="sidebar-link {{ $active ? 'active' : '' }}"
                    >
                        <i class="bi bi-arrow-down-left-circle-fill"></i>
                        <span>Kembalikan Alat</span>
                    </a>
                </li>

                <li>
                    @php
                        $active = $isActive('/riwayat-peminjaman');
                    @endphp

                    <a
                        href="{{ route('peminjam.riwayat') }}"
                        class="sidebar-link {{ $active ? 'active' : '' }}"
                    >
                        <i class="bi bi-clock-history"></i>
                        <span>Riwayat Peminjaman</span>
                    </a>
                </li>

            <!-- PETUGAS -->

            @elseif($role === 'petugas')

                <li>
                    <small class="sidebar-heading px-2 my-2 d-block">
                        Menu Petugas
                    </small>
                </li>

                <li>
                    @php
                        $active =
                            $currentUri === '/petugas'
                            || $currentUri === '/petugas/'
                            || $isActive('/petugas/dashboard');
                    @endphp

                    <a
                        href="{{ route('petugas.dashboard') }}"
                        class="sidebar-link {{ $active ? 'active' : '' }}"
                    >
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    @php
                        $active = $isActive('/petugas/peminjaman');
                    @endphp

                    <a
                        href="{{ route('petugas.peminjaman.index') }}"
                        class="sidebar-link {{ $active ? 'active' : '' }}"
                    >
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Persetujuan Peminjaman</span>
                    </a>
                </li>

                <li>
                    @php
                        $active = $isActive('/petugas/pengembalian');
                    @endphp

                    <a
                        href="{{ route('petugas.pengembalian.index') }}"
                        class="sidebar-link {{ $active ? 'active' : '' }}"
                    >
                        <i class="bi bi-arrow-return-left"></i>
                        <span>Pantau Pengembalian</span>
                    </a>
                </li>

            @endif

        </ul>
    </div>

    <!-- BOTTOM AREA -->

    <hr class="sakuci-divider my-2 flex-shrink-0">

    @if($currentUser)

        <!-- USER LOGIN -->

        <div class="d-flex flex-column gap-2 px-1 flex-shrink-0 pt-1">

            <div class="sakuci-user-card">
                <div class="d-flex align-items-center gap-2">

                    <div class="sakuci-user-avatar">
                        <i class="bi bi-person-fill"></i>
                    </div>

                    <div class="overflow-hidden">
                        <h6
                            class="mb-0 text-truncate fw-bold"
                            style="font-size:.82rem;"
                        >
                            {{ $currentUser->username ?? 'User' }}
                        </h6>

                        <span class="sakuci-role">
                            {{ $role }}
                        </span>
                    </div>

                </div>
            </div>

            <form
                method="POST"
                action="{{ route('logout') }}"
                class="m-0 w-100"
            >
                @csrf

                <button
                    type="submit"
                    class="btn btn-outline-danger w-100 sakuci-logout d-flex align-items-center justify-content-center gap-2"
                >
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </button>
            </form>

        </div>

    @else

        <!-- GUEST -->

        <div class="d-flex flex-column gap-2 px-1 flex-shrink-0 pt-1">

            <a
                href="{{ route('login') }}"
                class="btn btn-outline-success w-100 sakuci-auth-btn d-flex align-items-center justify-content-center gap-2"
            >
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Masuk</span>
            </a>

            <a
                href="{{ route('register') }}"
                class="btn btn-success w-100 sakuci-auth-btn d-flex align-items-center justify-content-center gap-2 shadow-sm"
            >
                <i class="bi bi-person-plus"></i>
                <span>Daftar Akun</span>
            </a>

        </div>

    @endif

    <!-- DECORATION -->

    <div class="sakuci-mountain"></div>
</div>