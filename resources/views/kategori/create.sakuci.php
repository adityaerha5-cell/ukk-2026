@extends('layouts.app')

@section('title', config('app.name') . ' -- Tambah Kategori Alat')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

<style>
/* =========================================================
   TEMA ALAT SEKOLAH SARDIT (CREATE KATEGORI)
========================================================= */
.kategori-page {
    font-family: 'Plus Jakarta Sans', sans-serif;
    min-height: calc(100vh - 80px);
    background-color: #f4f6f9;
    padding-bottom: 40px;
}

.kategori-header-board {
    background: #ffffff;
    border: 2px solid #e2e8f0;
    border-radius: 1.25rem;
    padding: 2rem;
    margin-bottom: 2rem;
    position: relative;
    box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05);
}
.kategori-header-board::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0; height: 6px;
    background: linear-gradient(90deg, #f59e0b, #2563eb, #10b981);
    border-radius: 1.25rem 1.25rem 0 0;
}

.kategori-badge {
    background: rgba(245, 158, 11, 0.15);
    color: #f59e0b;
    font-weight: 700;
    font-size: 0.8rem;
    padding: 0.35rem 0.8rem;
    border-radius: 2rem;
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    margin-bottom: 0.75rem;
}

.kategori-title {
    font-size: 1.8rem;
    font-weight: 800;
    color: #1e293b;
}

.kategori-description {
    font-size: 0.95rem;
    color: #64748b;
}

.kategori-form-card {
    max-width: 800px;
    margin: 0 auto;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 1rem;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
    overflow: hidden;
}

.form-card-header {
    padding: 20px 25px;
    border-bottom: 1px solid #e2e8f0;
    background: #ffffff;
}

.form-card-body {
    padding: 25px;
}

.form-control:focus, .form-select:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.15);
}

.btn-sch-blue {
    background-color: #2563eb;
    border: 1px solid #2563eb;
    color: #ffffff;
    font-weight: 700;
    border-radius: 0.6rem;
    padding: 8px 18px;
    transition: all 0.2s;
}

.btn-sch-blue:hover {
    background-color: #1d4ed8;
    border-color: #1d4ed8;
    color: #ffffff;
    opacity: 0.95;
}

/* DARK MODE */
@media (prefers-color-scheme: dark) {
    html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .kategori-page { background-color: #0f172a; }
    html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .kategori-header-board { background-color: #1e293b; border-color: #334155; }
    html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .kategori-title { color: #f8fafc; }
    html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .kategori-description { color: #94a3b8; }
    html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .kategori-form-card { background: #1e293b; border-color: #334155; }
    html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .form-card-header { background: #1e293b; border-bottom-color: #334155; }
    html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .form-control { background-color: #0f172a; border-color: #334155; color: #f8fafc; }
}
</style>

<div class="kategori-page">
    <div class="container-fluid px-4 pt-4">

        {{-- HEADER BOARD --}}
        <section class="kategori-header-board">
            <span class="kategori-badge">
                🎒 FORM TAMBAH KATEGORI
            </span>
            <h1 class="kategori-title mb-2">
                Tambah Kategori Alat
            </h1>
            <p class="kategori-description mb-0">
                Daftarkan kelompok kategori inventaris baru untuk peralatan sekolah.
            </p>
        </section>

        {{-- CONTENT CARD FORM --}}
        <section class="kategori-content">
            <div class="kategori-form-card">

                <div class="form-card-header d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-3">
                        <div class="p-2 rounded-3" style="background: rgba(37, 99, 235, 0.1); color: #2563eb; font-size: 1.5rem;">
                            ➕
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Formulir Input Kategori</h5>
                            <p class="text-muted small mb-0">Isi data di bawah dengan lengkap dan benar.</p>
                        </div>
                    </div>
                    <a href="{{ route('kategori.index') }}" class="btn btn-outline-secondary btn-sm fw-semibold">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>

                <div class="form-card-body">
                    <form action="{{ route('kategori.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="kode_kategori" class="form-label fw-bold small">Kode Kategori</label>
                            <input type="text" class="form-control" id="kode_kategori" name="kode_kategori" placeholder="Contoh: KAT-001" required>
                        </div>

                        <div class="mb-3">
                            <label for="nama_kategori" class="form-label fw-bold small">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Contoh: Alat Laboratorium & IPA" required>
                        </div>

                        <div class="mb-4">
                            <label for="keterangan" class="form-label fw-bold small">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="4" placeholder="Tuliskan keterangan singkat terkait kategori ini..."></textarea>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('kategori.index') }}" class="btn btn-light fw-bold px-4">Batal</a>
                            <button type="submit" class="btn btn-sch-blue px-4">
                                <i class="bi bi-save me-1"></i> Simpan Kategori
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
</div>
@endsection