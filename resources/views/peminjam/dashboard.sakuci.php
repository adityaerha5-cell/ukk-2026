@extends('layouts.app')

@section('title', config('app.name') . ' — Dashboard Peminjam')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

<style>
    .school-theme {
        --sch-bg: #f4f6f9;
        --sch-card: #ffffff;
        --sch-yellow: #f59e0b;
        --sch-blue: #2563eb;
        --sch-green: #10b981;
        --sch-dark: #1e293b;
        --sch-muted: #64748b;
        --sch-border: #e2e8f0;
        
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: var(--sch-dark);
        background-color: var(--sch-bg);
        padding: 1.5rem;
        border-radius: 1.5rem;
    }

    /* Mode Gelap */
    @media (prefers-color-scheme: dark) {
        html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .school-theme {
            --sch-bg: #0f172a;
            --sch-card: #1e293b;
            --sch-dark: #f8fafc;
            --sch-muted: #94a3b8;
            --sch-border: #334155;
        }
    }
    html[data-theme="dark"] .school-theme,
    html[data-bs-theme="dark"] .school-theme,
    html.dark .school-theme,
    body.dark .school-theme {
        --sch-bg: #0f172a;
        --sch-card: #1e293b;
        --sch-dark: #f8fafc;
        --sch-muted: #94a3b8;
        --sch-border: #334155;
    }

    /* Hero Banner Sekolah */
    .sch-board {
        background: var(--sch-card);
        border: 2px solid var(--sch-border);
        border-radius: 1.25rem;
        padding: 2.5rem 2rem;
        position: relative;
        box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05);
    }
    .sch-board::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; height: 6px;
        background: linear-gradient(90deg, var(--sch-yellow), var(--sch-blue), var(--sch-green));
        border-radius: 1.25rem 1.25rem 0 0;
    }

    /* Card Kotak Ringkasan */
    .sch-box {
        background: var(--sch-card);
        border: 1px solid var(--sch-border);
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02);
        height: 100%;
    }

    .sch-badge {
        background: rgba(245, 158, 11, 0.15);
        color: var(--sch-yellow);
        font-weight: 700;
        font-size: 0.8rem;
        padding: 0.35rem 0.8rem;
        border-radius: 2rem;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        margin-bottom: 1rem;
    }

    /* Statistik Kotak Kecil */
    .stat-card {
        background: var(--sch-card);
        border: 1px solid var(--sch-border);
        border-radius: 1rem;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1.25rem;
        box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02);
    }
    .stat-icon {
        width: 55px;
        height: 55px;
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    /* Buttons */
    .sch-btn-primary {
        background: var(--sch-blue);
        color: #ffffff;
        padding: 0.75rem 1.5rem;
        border-radius: 0.6rem;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        border: none;
        transition: opacity 0.2s;
        font-size: 0.95rem;
    }
    .sch-btn-primary:hover {
        color: #ffffff;
        opacity: 0.9;
    }

    .sch-btn-outline {
        background: transparent;
        border: 1px solid var(--sch-border);
        color: var(--sch-dark);
        padding: 0.75rem 1.5rem;
        border-radius: 0.6rem;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.2s;
        font-size: 0.95rem;
    }
    .sch-btn-outline:hover {
        background: var(--sch-border);
        color: var(--sch-blue);
    }
</style>

<div class="school-theme">
    
    {{-- Hero Section Header Dashboard Peminjam --}}
    <div class="sch-board mb-4">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="d-flex gap-2 mb-2">
                    <span class="sch-badge">
                        🎒 Dashboard Peminjam
                    </span>
                    <span class="badge bg-primary bg-opacity-10 text-primary border px-2 py-1 align-self-start" style="border-color: var(--sch-border) !important; font-size: 0.75rem; font-weight: 700; border-radius: 2rem;">
                        <i class="bi bi-person-badge me-1"></i> Akun Aktif
                    </span>
                </div>
                <h1 class="fw-bold display-6 mb-2">
                    Halo, Peminjam! 👋
                </h1>
                <p class="text-muted mb-4">
                    Selamat datang di sistem Peminjaman Alat Sardit. Pantau status peminjaman, tenggat waktu pengembalian, serta tagihan denda Anda dengan mudah.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    {{-- Sesuaikan route ajukan peminjaman jika ada --}}
                    <a href="#" class="sch-btn-primary">
                        <i class="bi bi-plus-circle-fill"></i> Ajukan Peminjaman
                    </a>
                    <a href="#" class="sch-btn-outline">
                        <i class="bi bi-clock-history"></i> Cek Aktivitas
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center mt-4 mt-lg-0">
                <div class="p-4 rounded-3 border bg-light text-dark" style="border-color: var(--sch-border) !important;">
                    <div class="fs-1 mb-2">⛺🛠️</div>
                    <div class="fw-bold">Peralatan Sekolah & Praktikum</div>
                    <div class="small text-muted mt-1">Lengkapi kebutuhan kegiatan dan persiapkan praktikummu dengan baik.</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistik Ringkasan Peminjam (Pending, Dipinjam, Selesai, Denda) --}}
    <div class="row g-4 mb-4">
        
        {{-- Pending / Menunggu --}}
        <div class="col-md-3 col-sm-6">
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(245, 158, 11, 0.15); color: var(--sch-yellow);">
                    ⏳
                </div>
                <div>
                    <div class="text-muted small fw-bold text-uppercase">Pending</div>
                    <div class="fs-4 fw-bold mb-0">0</div>
                    <div class="extra-small text-muted" style="font-size: 0.75rem;">Menunggu persetujuan</div>
                </div>
            </div>
        </div>

        {{-- Dipinjam / Aktif --}}
        <div class="col-md-3 col-sm-6">
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(37, 99, 235, 0.15); color: var(--sch-blue);">
                    📦
                </div>
                <div>
                    <div class="text-muted small fw-bold text-uppercase">Dipinjam</div>
                    <div class="fs-4 fw-bold mb-0">0</div>
                    <div class="extra-small text-muted" style="font-size: 0.75rem;">Alat di tangan Anda</div>
                </div>
            </div>
        </div>

        {{-- Selesai --}}
        <div class="col-md-3 col-sm-6">
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(16, 185, 129, 0.15); color: var(--sch-green);">
                    ✅
                </div>
                <div>
                    <div class="text-muted small fw-bold text-uppercase">Selesai</div>
                    <div class="fs-4 fw-bold mb-0">0</div>
                    <div class="extra-small text-muted" style="font-size: 0.75rem;">Riwayat peminjaman</div>
                </div>
            </div>
        </div>

        {{-- Denda --}}
        <div class="col-md-3 col-sm-6">
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(239, 68, 68, 0.15); color: #ef4444;">
                    ⚠️
                </div>
                <div>
                    <div class="text-muted small fw-bold text-uppercase">Total Denda</div>
                    <div class="fs-5 fw-bold mb-0 text-danger">Rp 0</div>
                    <div class="extra-small text-muted" style="font-size: 0.75rem;">Keterlambatan alat</div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection