@extends('layouts.app')

@section('title', config('app.name') . ' — Edit Alat Sardit')

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
        padding: 2rem;
        box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02);
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

    /* Form Styling Konsisten */
    .form-label {
        font-weight: 700;
        font-size: 0.85rem;
        color: var(--sch-dark);
        margin-bottom: 0.5rem;
    }

    .sch-input, .sch-select {
        background-color: var(--sch-card) !important;
        border: 1px solid var(--sch-border) !important;
        color: var(--sch-dark) !important;
        padding: 0.75rem 1rem;
        border-radius: 0.75rem;
        font-size: 0.95rem;
        transition: all 0.2s ease;
    }

    .sch-input:focus, .sch-select:focus {
        border-color: var(--sch-blue) !important;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15) !important;
    }

    .input-group-text {
        background-color: var(--sch-bg) !important;
        border: 1px solid var(--sch-border) !important;
        color: var(--sch-muted) !important;
        border-top-left-radius: 0.75rem;
        border-bottom-left-radius: 0.75rem;
    }

    .sch-input.border-start-0 {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    /* Info Box */
    .sch-info-box {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        padding: 1rem;
        border-radius: 0.75rem;
        background: rgba(37, 99, 235, 0.08);
        border: 1px solid rgba(37, 99, 235, 0.2);
        font-size: 0.85rem;
        color: var(--sch-blue);
    }
    .sch-info-box i {
        font-size: 1.1rem;
        margin-top: 0.1rem;
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
    }
    .sch-btn-primary:hover {
        color: #ffffff;
        opacity: 0.9;
    }

    .sch-btn-secondary {
        background: transparent;
        border: 1px solid var(--sch-border);
        color: var(--sch-muted);
        padding: 0.75rem 1.5rem;
        border-radius: 0.6rem;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.2s;
    }
    .sch-btn-secondary:hover {
        background: var(--sch-border);
        color: var(--sch-dark);
    }
</style>

<div class="school-theme">
    
    {{-- Hero Section Header Halaman --}}
    <div class="sch-board mb-4">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <span class="sch-badge">
                    🎒 Kelola Inventaris
                </span>
                <h1 class="fw-bold display-6 mb-2">
                    Edit Data Alat <span class="text-primary">Sardit</span>
                </h1>
                <p class="text-muted mb-0">
                    Perbarui informasi peralatan inventaris agar data yang tersimpan di dalam sistem tetap akurat.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <a href="{{ route('alat.index') }}" class="sch-btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali ke Daftar Alat
                </a>
            </div>
        </div>
    </div>

    {{-- Form Card Container --}}
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="sch-box">
                <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom" style="border-color: var(--sch-border) !important;">
                    <div class="sch-icon mb-0" style="width: 50px; height: 50px; background: rgba(37, 99, 235, 0.1); display: flex; align-items: center; justify-content: center; border-radius: 0.6rem; font-size: 1.35rem;">
                        ✏️
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Form Perbarui Informasi Alat</h5>
                        <div class="text-muted small">Sesuaikan nama, kode, atau kategori alat di bawah ini.</div>
                    </div>
                </div>

                <form action="{{ route('alat.update', ['id_alat' => $datal->id_alat]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Nama Alat --}}
                    <div class="mb-4">
                        <label for="nama_alat" class="form-label">
                            Nama Alat <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-tag-fill"></i></span>
                            <input
                                type="text"
                                name="nama_alat"
                                id="nama_alat"
                                class="form-control sch-input border-start-0 @error('nama_alat') is-invalid @enderror"
                                value="{{ old('nama_alat', $datal->nama_alat) }}"
                                placeholder="Contoh: Mikroskop Digital"
                                required
                            >
                        </div>
                        @error('nama_alat')
                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Kode Alat --}}
                    <div class="mb-4">
                        <label for="kode_alat" class="form-label">
                            Kode Alat <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-upc-scan"></i></span>
                            <input
                                type="text"
                                name="kode_alat"
                                id="kode_alat"
                                class="form-control sch-input border-start-0 @error('kode_alat') is-invalid @enderror"
                                value="{{ old('kode_alat', $datal->kode_alat) }}"
                                placeholder="Contoh: LAB-IPA-001"
                                required
                            >
                        </div>
                        @error('kode_alat')
                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Kategori --}}
                    <div class="mb-4">
                        <label for="id_kategori" class="form-label">
                            Kategori Alat <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-tags-fill"></i></span>
                            <select
                                name="id_kategori"
                                id="id_kategori"
                                class="form-select sch-select border-start-0 @error('id_kategori') is-invalid @enderror"
                                required
                            >
                                <option value="">-- Pilih Kategori Alat --</option>
                                @foreach ($kategori as $k)
                                    <option
                                        value="{{ $k->id_kategori }}"
                                        {{ old('id_kategori', $datal->id_kategori) == $k->id_kategori ? 'selected' : '' }}
                                    >
                                        {{ $k->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('id_kategori')
                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Info Box --}}
                    <div class="sch-info-box mb-4">
                        <i class="bi bi-info-circle-fill"></i>
                        <div>
                            <strong>Perhatian:</strong> Pastikan data yang diperbarui sudah benar sebelum mengklik tombol simpan perubahan.
                        </div>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="d-flex justify-content-between align-items-center pt-3 border-top" style="border-color: var(--sch-border) !important;">
                        <a href="{{ route('alat.index') }}" class="sch-btn-secondary">
                            <i class="bi bi-x-circle"></i> Batal
                        </a>
                        <button type="submit" class="sch-btn-primary">
                            <i class="bi bi-check-circle-fill"></i> Simpan Perubahan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>

@endsection