@extends('layouts.app')

@section('title', config('app.name') . ' — Peminjaman Alat Sekolah Sardit')

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

    /* Card Papan/Buku */
    .sch-box {
        background: var(--sch-card);
        border: 1px solid var(--sch-border);
        border-radius: 1rem;
        padding: 1.5rem;
        height: 100%;
        transition: transform 0.2s ease;
    }
    .sch-box:hover {
        transform: translateY(-3px);
    }

    /* Item Alat Sekolah */
    .sch-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 0.85rem 1rem;
        border: 1px solid var(--sch-border);
        border-radius: 0.75rem;
        background: var(--sch-card);
        margin-bottom: 0.75rem;
    }
    .sch-icon {
        width: 45px;
        height: 45px;
        border-radius: 0.6rem;
        background: rgba(37, 99, 235, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.35rem;
        flex-shrink: 0;
    }

    .sch-btn {
        background: var(--sch-blue);
        color: #ffffff;
        padding: 0.75rem 1.5rem;
        border-radius: 0.6rem;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    .sch-btn:hover {
        color: #ffffff;
        opacity: 0.9;
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
</style>

<div class="school-theme">
    
    {{-- Hero Section Sekolah --}}
    <div class="sch-board mb-4">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <span class="sch-badge">
                    🎒 Inventaris & Peralatan Praktikum Sekolah
                </span>
                <h1 class="fw-bold display-5 mb-2">
                    Layanan Alat Sekolah <br>
                    <span class="text-primary">Sardit</span>
                </h1>
                <p class="text-muted mb-4">
                    Peminjaman alat laboratorium, media praktikum, hingga peralatan kegiatan siswa dapat dilakukan secara online dengan mudah dan cepat.
                </p>
                <div class="d-flex gap-3">
                    <a href="login" class="sch-btn">
                        <i class="bi bi-box-arrow-in-right"></i> Masuk Akun Siswa / Petugas
                    </a>
                </div>
            </div>
            
            <div class="col-lg-5 mt-4 mt-lg-0 text-center">
                <div class="p-4 rounded-3 border bg-light text-dark">
                    <div class="fs-1 mb-2">📐 🔬 💻</div>
                    <div class="fw-bold">Pinjam Praktis & Terdata</div>
                    <div class="small text-muted mt-1">Pastikan selalu memeriksa kondisi alat sebelum dan sesudah kegiatan praktikum.</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Grid Utama Alat Sekolah --}}
    <div class="row g-4 mb-4">
        
        {{-- Kategori Alat Sekolah --}}
        <div class="col-lg-7">
            <div class="sch-box">
                <h5 class="fw-bold mb-3"><i class="bi bi-tools text-primary"></i> Kategori Alat Sekolah</h5>
                
                <div class="sch-item">
                    <div class="sch-icon">🔬</div>
                    <div>
                        <div class="fw-bold small">Alat Laboratorium & IPA</div>
                        <div class="text-muted extra-small">Mikroskop, tabung reaksi, neraca, jangka sorong</div>
                    </div>
                </div>

                <div class="sch-item">
                    <div class="sch-icon">💻</div>
                    <div>
                        <div class="fw-bold small">Media Praktikum & IT</div>
                        <div class="text-muted extra-small">Proyektor, laptop lab, kabel HDMI, pointer presenter</div>
                    </div>
                </div>

                <div class="sch-item">
                    <div class="sch-icon">🛠️</div>
                    <div>
                        <div class="fw-bold small">Peralatan Bengkel & Praktik</div>
                        <div class="text-muted extra-small">Obeng set, solder, multitester, tang potong</div>
                    </div>
                </div>

                <div class="sch-item">
                    <div class="sch-icon">🎨</div>
                    <div>
                        <div class="fw-bold small">Kesenian & Dokumentasi</div>
                        <div class="text-muted extra-small">Kamera sekolah, mic sound system, alat lukis, tripod</div>
                    </div>
                </div>

                <div class="sch-item mb-0">
                    <div class="sch-icon">🏀</div>
                    <div>
                        <div class="fw-bold small">Alat Olahraga & Ekstrakurikuler</div>
                        <div class="text-muted extra-small">Bola basket, bola futsal, raket badminton, matras</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Alur Peminjaman Alat --}}
        <div class="col-lg-5">
            <div class="sch-box">
                <h5 class="fw-bold mb-3"><i class="bi bi-journal-bookmark text-primary"></i> Prosedur Pinjam Alat</h5>
                
                <ol class="list-group list-group-numbered list-group-flush bg-transparent">
                    <li class="list-group-item bg-transparent text-dark border-bottom px-0 py-2">
                        <strong>Login ke Akun</strong>
                        <div class="text-muted extra-small ms-3">Gunakan akun NIS/NIP terdaftar.</div>
                    </li>
                    <li class="list-group-item bg-transparent text-dark border-bottom px-0 py-2">
                        <strong>Cari Alat</strong>
                        <div class="text-muted extra-small ms-3">Cek stok alat yang siap dipinjam.</div>
                    </li>
                    <li class="list-group-item bg-transparent text-dark border-bottom px-0 py-2">
                        <strong>Isi Form Peminjaman</strong>
                        <div class="text-muted extra-small ms-3">Tentukan tanggal dan durasi penggunaan alat.</div>
                    </li>
                    <li class="list-group-item bg-transparent text-dark px-0 py-2">
                        <strong>Konfirmasi Petugas</strong>
                        <div class="text-muted extra-small ms-3">Tunjukkan bukti peminjaman ke petugas alat.</div>
                    </li>
                </ol>
            </div>
        </div>

    </div>

    {{-- Tata Tertib Peminjaman Alat --}}
    <div class="sch-box">
        <h5 class="fw-bold mb-3"><i class="bi bi-clipboard-check text-primary"></i> Tata Tertib Peminjaman Alat</h5>
        <div class="row g-3">
            <div class="col-md-3">
                <div class="p-3 border rounded-3 h-100 bg-light text-dark">
                    <div class="fw-bold small mb-1">📌 Menjaga Kondisi Alat</div>
                    <div class="text-muted extra-small">Pastikan alat digunakan dengan hati-hati dan dikembalikan dalam keadaan bersih.</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3 border rounded-3 h-100 bg-light text-dark">
                    <div class="fw-bold small mb-1">⏱️ Pengembalian Tepat Waktu</div>
                    <div class="text-muted extra-small">Kembalikan alat sesuai dengan batas waktu peminjaman yang telah ditentukan.</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3 border rounded-3 h-100 bg-light text-dark">
                    <div class="fw-bold small mb-1">⚠️ Lapor Kerusakan</div>
                    <div class="text-muted extra-small">Segera laporkan kepada petugas jika alat mengalami masalah atau kerusakan.</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3 border rounded-3 h-100 bg-light text-dark">
                    <div class="fw-bold small mb-1">🤝 Pengecekan Alat</div>
                    <div class="text-muted extra-small">Periksa kelengkapan alat bersama petugas sebelum dan sesudah digunakan.</div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection