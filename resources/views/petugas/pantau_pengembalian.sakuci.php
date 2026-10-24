@extends('layouts.app')

@section('title', 'Pantau Pengembalian - PINVERA')

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

    /* Table Styling */
    .sch-table {
        color: var(--sch-dark) !important;
        vertical-align: middle;
    }
    .sch-table th {
        background-color: var(--sch-bg) !important;
        color: var(--sch-dark) !important;
        font-weight: 700;
        border-bottom: 2px solid var(--sch-border) !important;
        padding: 1rem;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .sch-table td {
        padding: 1rem;
        border-bottom: 1px solid var(--sch-border) !important;
        color: var(--sch-dark) !important;
        background-color: var(--sch-card) !important;
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
</style>

<div class="school-theme">
    
    {{-- Hero Section Header Pantau Pengembalian --}}
    <div class="sch-board mb-4">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="d-flex gap-2 mb-2">
                    <span class="sch-badge">
                        📦 Inventaris Sistem
                    </span>
                    <span class="badge bg-primary bg-opacity-10 text-primary border px-2 py-1 align-self-start" style="border-color: var(--sch-border) !important; font-size: 0.75rem; font-weight: 700; border-radius: 2rem;">
                        <i class="bi bi-person-check me-1"></i> Akses Petugas
                    </span>
                </div>
                <h1 class="fw-bold display-6 mb-2">
                    Pantau Pengembalian <span class="text-primary">Alat</span>
                </h1>
                <p class="text-muted mb-4">
                    Memantau riwayat alat yang telah dikembalikan oleh customer dengan lebih terstruktur dan mudah dipantau.
                </p>
                <div>
                    <a
                        href="{{ route('petugas.pengembalian.cetak') }}"
                        target="_blank"
                        class="sch-btn-primary"
                    >
                        <i class="bi bi-printer"></i> Cetak Laporan
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center mt-4 mt-lg-0">
                <div class="p-4 rounded-3 border bg-light text-dark" style="border-color: var(--sch-border) !important;">
                    <div class="fs-1 mb-2">📑🔄</div>
                    <div class="fw-bold">Riwayat Pengembalian</div>
                    <div class="small text-muted mt-1">Rekapitulasi kondisi barang dan status pengembalian lengkap.</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Content Table Container --}}
    <div class="sch-box">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4 pb-3 border-bottom" style="border-color: var(--sch-border) !important;">
            <div class="d-flex align-items-center gap-3">
                <div class="sch-icon mb-0" style="width: 50px; height: 50px; background: rgba(37, 99, 235, 0.1); display: flex; align-items: center; justify-content: center; border-radius: 0.6rem; font-size: 1.35rem;">
                    📋
                </div>
                <div>
                    <h5 class="fw-bold mb-1">Daftar Pengembalian Alat</h5>
                    <div class="text-muted small">Berikut adalah daftar seluruh peralatan yang telah dikembalikan.</div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table sch-table align-middle mb-0">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 5%;">No</th>
                        <th style="width: 15%;">Tgl Kembali</th>
                        <th style="width: 20%;">Nama Peminjam</th>
                        <th style="width: 25%;">Nama Alat</th>
                        <th style="width: 15%;">Kondisi</th>
                        <th class="text-end" style="width: 20%;">Status</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($datap as $index => $item)

                        @php
                            $peminjaman = $peminjamanList[$item->id_peminjaman] ?? null;

                            $namaUser = $peminjaman
                                ? ($userList[$peminjaman->id_user] ?? 'Tidak diketahui')
                                : 'Tidak diketahui';

                            $namaAlat = $peminjaman
                                ? ($alatList[$peminjaman->id_alat] ?? 'Alat dihapus')
                                : 'Alat dihapus';
                        @endphp

                        <tr>
                            {{-- NOMOR --}}
                            <td class="text-center">
                                <span class="fw-bold text-muted">{{ $datap->firstItem() + $index }}</span>
                            </td>

                            {{-- TANGGAL --}}
                            <td>
                                <span class="text-muted">
                                    {{ date('d M Y', strtotime($item->tanggal_pengembalian)) }}
                                </span>
                            </td>

                            {{-- PEMINJAM --}}
                            <td>
                                <span class="fw-bold text-primary">{{ $namaUser }}</span>
                            </td>

                            {{-- ALAT --}}
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-2 bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                        <i class="bi bi-box-seam"></i>
                                    </div>
                                    <span class="fw-semibold">{{ $namaAlat }}</span>
                                </div>
                            </td>

                            {{-- KONDISI --}}
                            <td>
                                @if(strtolower($item->kondisi_barang) == 'baik')
                                    <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-2 py-1">
                                        <i class="bi bi-check-circle me-1"></i> Baik
                                    </span>
                                @elseif(strtolower($item->kondisi_barang) == 'ringan rusak' || strtolower($item->kondisi_barang) == 'rusak ringan')
                                    <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-2 py-1">
                                        <i class="bi bi-exclamation-circle me-1"></i> Rusak Ringan
                                    </span>
                                @else
                                    <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
                                        <i class="bi bi-x-circle me-1"></i> {{ $item->kondisi_barang ?? 'Rusak' }}
                                    </span>
                                @endif
                            </td>

                            {{-- STATUS --}}
                            <td class="text-end">
                                <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-2 py-1">
                                    <i class="bi bi-check2-all me-1"></i> Selesai
                                </span>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <div class="fs-1 mb-2">📂</div>
                                <div class="fw-bold">Belum Ada Data Pengembalian</div>
                                <div class="small mt-1">Belum terdapat data alat yang telah dikembalikan.</div>
                            </td>
                        </tr>

                    @endforelse

                </tbody>
            </table>
        </div>

        {{-- PAGINATION --}}
        @if($datap->hasPages())
            <div class="mt-4 d-flex justify-content-end">
                {!! $datap->links() !!}
            </div>
        @endif
    </div>

</div>

@endsection