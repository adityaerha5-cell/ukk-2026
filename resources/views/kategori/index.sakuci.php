@extends('layouts.app')

@section('title', config('app.name') . ' -- Data Kategori Alat')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

<style>
/* =========================================================
   TEMA ALAT SEKOLAH SARDIT (MATCHING BERANDA)
========================================================= */
.kategori-page {
    font-family: 'Plus Jakarta Sans', sans-serif;
    min-height: calc(100vh - 80px);
    background-color: #f4f6f9;
    padding-bottom: 40px;
    transition: background-color 0.3s ease;
}

/* Header Board Bergaya Sekolah */
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

/* Card Utama */
.kategori-form-card {
    max-width: 1000px;
    margin: 0 auto;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 1rem;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
    overflow: hidden;
    transition: background-color 0.3s ease, border-color 0.3s ease;
}

.form-card-header {
    padding: 20px 25px;
    border-bottom: 1px solid #e2e8f0;
    background: #ffffff;
}

.form-card-body {
    padding: 25px;
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

/* CUSTOM TABLE STYLING */
.table-custom {
    color: #1e293b;
    vertical-align: middle;
}

.table-custom th {
    background-color: #f8fafc;
    color: #475569;
    font-weight: 700;
    font-size: 0.8rem;
    letter-spacing: 0.03em;
    border-bottom: 2px solid #e2e8f0;
    padding: 14px 16px;
}

.table-custom td {
    padding: 14px 16px;
    border-bottom: 1px solid #f1f5f9;
}

/* =========================================================
   DARK MODE OVERRIDES
========================================================= */
@media (prefers-color-scheme: dark) {
    html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .kategori-page { background-color: #0f172a; }
    html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .kategori-header-board { background-color: #1e293b; border-color: #334155; }
    html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .kategori-title { color: #f8fafc; }
    html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .kategori-description { color: #94a3b8; }
    html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .kategori-form-card { background: #1e293b; border-color: #334155; }
    html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .form-card-header { background: #1e293b; border-bottom-color: #334155; }
    html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .table-custom { color: #f8fafc; }
    html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .table-custom th { background-color: #0f172a; color: #cbd5e1; border-bottom-color: #334155; }
    html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .table-custom td { border-bottom-color: #334155; }
}

html[data-theme="dark"] .kategori-page, html[data-bs-theme="dark"] .kategori-page, html.dark .kategori-page { background-color: #0f172a; }
html[data-theme="dark"] .kategori-header-board, html[data-bs-theme="dark"] .kategori-header-board, html.dark .kategori-header-board { background-color: #1e293b; border-color: #334155; }
html[data-theme="dark"] .kategori-title, html[data-bs-theme="dark"] .kategori-title, html.dark .kategori-title { color: #f8fafc; }
html[data-theme="dark"] .kategori-description, html[data-bs-theme="dark"] .kategori-description, html.dark .kategori-description { color: #94a3b8; }
html[data-theme="dark"] .kategori-form-card, html[data-bs-theme="dark"] .kategori-form-card, html.dark .kategori-form-card { background: #1e293b; border-color: #334155; }
html[data-theme="dark"] .form-card-header, html[data-bs-theme="dark"] .form-card-header, html.dark .form-card-header { background: #1e293b; border-bottom-color: #334155; }
html[data-theme="dark"] .table-custom, html[data-bs-theme="dark"] .table-custom, html.dark .table-custom { color: #f8fafc; }
html[data-theme="dark"] .table-custom th, html[data-bs-theme="dark"] .table-custom th, html.dark .table-custom th { background-color: #0f172a; color: #cbd5e1; border-bottom-color: #334155; }
html[data-theme="dark"] .table-custom td, html[data-bs-theme="dark"] .table-custom td, html.dark .table-custom td { border-bottom-color: #334155; }
</style>

<div class="kategori-page">
    <div class="container-fluid px-4 pt-4">

        {{-- HEADER BOARD SAMAKAN BENTUK BERANDA --}}
        <section class="kategori-header-board">
            <span class="kategori-badge">
                🎒 INVENTARIS ALAT SEKOLAH
            </span>
            <h1 class="kategori-title mb-2">
                Data Kategori Alat
            </h1>
            <p class="kategori-description mb-0">
                Kelola seluruh daftar kategori dan kelompok peralatan praktikum sekolah di sini.
            </p>
        </section>

        {{-- CONTENT CARD & TABEL --}}
        <section class="kategori-content">
            <div class="kategori-form-card">

                {{-- CARD HEADER --}}
                <div class="form-card-header d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="p-2 rounded-3" style="background: rgba(37, 99, 235, 0.1); color: #2563eb; font-size: 1.5rem;">
                            📦
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">
                                Daftar Kategori Alat
                            </h5>
                            <p class="text-muted small mb-0">
                                Total kategori alat yang sudah terdaftar di sistem.
                            </p>
                        </div>
                    </div>

                    <a href="{{ route('kategori.create') }}" class="btn btn-sch-blue btn-sm px-3 py-2">
                        <i class="bi bi-plus-lg me-1"></i> Tambah Kategori
                    </a>
                </div>

                {{-- CARD BODY & TABEL --}}
                <div class="form-card-body">
                    <div class="table-responsive">
                        <table class="table table-custom align-middle mb-0">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="20%">Kode Kategori</th>
                                    <th width="25%">Nama Kategori</th>
                                    <th width="30%">Keterangan</th>
                                    <th width="20%" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @forelse ($data as $d)
                                    <tr>
                                        <td class="fw-bold text-muted">{{ $no++ }}</td>
                                        <td>
                                            <span class="badge border px-2 py-1" style="background: rgba(37, 99, 235, 0.1); color: #2563eb; font-weight: 600;">
                                                {{ $d->kode_kategori }}
                                            </span>
                                        </td>
                                        <td class="fw-bold">{{ $d->nama_kategori }}</td>
                                        <td class="text-muted small">{{ $d->keterangan ?? '-' }}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('kategori.edit', ['kategori' => $d->id_kategori]) }}" class="btn btn-warning btn-sm px-2 py-1 text-white fw-semibold">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                                <form action="{{ route('kategori.destroy', ['id' => $d->id_kategori]) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah anda yakin ingin menghapus kategori ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm px-2 py-1 fw-semibold">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted">
                                            Belum ada data kategori alat yang terdaftar.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- PAGINATION --}}
                    @if (method_exists($data, 'links'))
                        <div class="mt-4 d-flex justify-content-end">
                            {!! $data->links() !!}
                        </div>
                    @endif
                </div>

            </div>
        </section>
    </div>
</div>
@endsection