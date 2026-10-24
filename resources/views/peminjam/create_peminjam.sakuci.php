@extends('layouts.app')

@section('title', config('app.name') . ' — Ajukan Peminjaman Alat')

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

    /* Card Kotak Utama */
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

    .sch-input.border-start-0, .sch-select.border-start-0 {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
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
        cursor: pointer;
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
        font-size: 0.95rem;
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
                    📝 Form Pengajuan Sistem
                </span>
                <h1 class="fw-bold display-6 mb-2">
                    Ajukan Peminjaman Alat <span class="text-primary">Sardit</span>
                </h1>
                <p class="text-muted mb-0">
                    Isi formulir berikut untuk mengajukan peminjaman alat inventaris sesuai dengan kebutuhan Anda.
                </p>
            </div>
            @php
                $currentUser = \App\Models\User::current();
                $isPengguna = $currentUser && ($currentUser->role == 'pengguna');
                $indexRoute = $isPengguna ? route('peminjam.indexPeminjam.pengguna') : route('peminjam.indexPeminjam');
            @endphp
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <a href="{{ $indexRoute }}" class="sch-btn-secondary">
                    <i class="bi bi-arrow-left"></i> Batal / Kembali
                </a>
            </div>
        </div>
    </div>

    {{-- Form Container --}}
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="sch-box">
                <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom" style="border-color: var(--sch-border) !important;">
                    <div class="sch-icon mb-0" style="width: 50px; height: 50px; background: rgba(37, 99, 235, 0.1); display: flex; align-items: center; justify-content: center; border-radius: 0.6rem; font-size: 1.35rem;">
                        📋
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Form Pengajuan</h5>
                        <div class="text-muted small">Lengkapi data peminjaman alat di bawah ini.</div>
                    </div>
                </div>

                @php
                    $storeRoute = $isPengguna ? route('peminjam.storePeminjam.pengguna') : route('peminjam.storePeminjam');
                    $selectedAlatId = $_GET['id_alat'] ?? request('id_alat') ?? '';
                    $daftarAlat = $alat ?? $alats ?? \App\Models\Alat::all();
                    
                    $namaAlatTerpilih = '';
                    if (!empty($selectedAlatId)) {
                        foreach($daftarAlat as $item) {
                            $aId = $item->id_alat ?? $item->id;
                            if ($aId == $selectedAlatId) {
                                $namaAlatTerpilih = $item->nama_alat ?? $item->nama ?? 'Alat #' . $aId;
                                break;
                            }
                        }
                    }
                @endphp

                <form action="{{ $storeRoute }}" method="POST">
                    @csrf

                    {{-- PILIH ALAT --}}
                    <div class="mb-4">
                        <label for="id_alat" class="form-label">
                            Pilih Alat <span class="text-danger">*</span>
                        </label>

                        @if(!empty($selectedAlatId))
                            <div class="p-3 border rounded-3 bg-light text-dark d-flex align-items-center gap-3" style="border-color: var(--sch-border) !important;">
                                <i class="bi bi-tools text-primary fs-4"></i>
                                <span class="fw-bold">{{ $namaAlatTerpilih ?: 'Alat #' . $selectedAlatId }}</span>
                            </div>
                            <input type="hidden" name="id_alat" value="{{ $selectedAlatId }}">
                        @else
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-tools"></i></span>
                                <select
                                    name="id_alat"
                                    id="id_alat"
                                    class="form-select sch-select border-start-0"
                                    required
                                >
                                    <option value="">-- Pilih Alat Inventaris --</option>
                                    @foreach($daftarAlat as $item)
                                        @php
                                            $aId = $item->id_alat ?? $item->id;
                                            $aName = $item->nama_alat ?? $item->nama ?? 'Alat #' . $aId;
                                        @endphp
                                        <option value="{{ $aId }}">
                                            {{ $aName }}
                                            @if(isset($item->stok))
                                                (Stok: {{ $item->stok }})
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>

                    {{-- JUMLAH UNIT --}}
                    <div class="mb-4">
                        <label for="jumlah" class="form-label">
                            Jumlah Unit <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-123"></i></span>
                            <input
                                type="number"
                                name="jumlah"
                                id="jumlah"
                                class="form-control sch-input border-start-0"
                                min="1"
                                value="1"
                                required
                                placeholder="Masukkan jumlah unit yang dipinjam"
                            >
                        </div>
                        <small class="text-muted d-block mt-1" style="font-size: 0.8rem;">
                            Masukkan jumlah unit alat yang ingin dipinjam.
                        </small>
                    </div>

                    {{-- TANGGAL PINJAM --}}
                    <div class="mb-4">
                        <label for="tanggal_pinjam" class="form-label">
                            Tanggal Pinjam <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                            <input
                                type="date"
                                name="tanggal_pinjam"
                                id="tanggal_pinjam"
                                class="form-control sch-input border-start-0"
                                value="{{ date('Y-m-d') }}"
                                required
                            >
                        </div>
                    </div>

                    {{-- TANGGAL KEMBALI --}}
                    <div class="mb-4">
                        <label for="tanggal_kembali" class="form-label">
                            Rencana Tanggal Kembali <span class="text-muted fw-normal">(Opsional)</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-calendar-check"></i></span>
                            <input
                                type="date"
                                name="tanggal_kembali"
                                id="tanggal_kembali"
                                class="form-control sch-input border-start-0"
                            >
                        </div>
                        <small class="text-muted d-block mt-1" style="font-size: 0.8rem;">
                            Kosongkan jika belum menentukan tanggal pengembalian.
                        </small>
                    </div>

                    {{-- TOMBOL AKSI --}}
                    <div class="d-flex justify-content-between align-items-center pt-3 border-top" style="border-color: var(--sch-border) !important;">
                        <a href="{{ $indexRoute }}" class="sch-btn-secondary">
                            <i class="bi bi-arrow-left"></i> Batal
                        </a>
                        <button type="submit" class="sch-btn-primary">
                            <i class="bi bi-send-fill"></i> Kirim Pengajuan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>

@endsection