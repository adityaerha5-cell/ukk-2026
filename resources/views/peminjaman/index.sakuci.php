@extends('layouts.app')

@section('title', config('app.name') . ' -- Daftar Peminjaman')

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

    /* Table Custom Styling */
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
        padding: 0.6rem 1.25rem;
        border-radius: 0.6rem;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        border: none;
        transition: opacity 0.2s;
        font-size: 0.9rem;
    }
    .sch-btn-primary:hover {
        color: #ffffff;
        opacity: 0.9;
    }

    .sch-btn-warning {
        background: #f59e0b;
        color: #ffffff;
        border: none;
        font-weight: 600;
        border-radius: 0.5rem;
        padding: 0.4rem 0.75rem;
        font-size: 0.85rem;
    }
    .sch-btn-warning:hover {
        background: #d97706;
        color: #ffffff;
    }

    .sch-btn-danger {
        background: #ef4444;
        color: #ffffff;
        border: none;
        font-weight: 600;
        border-radius: 0.5rem;
        padding: 0.4rem 0.75rem;
        font-size: 0.85rem;
    }
    .sch-btn-danger:hover {
        background: #dc2626;
        color: #ffffff;
    }
</style>

<div class="school-theme">
    
    {{-- Hero Section Header Halaman --}}
    <div class="sch-board mb-4">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <span class="sch-badge">
                    🎒 Layanan Peminjaman Alat
                </span>
                <h1 class="fw-bold display-6 mb-2">
                    Daftar Peminjaman <span class="text-primary">Sardit</span>
                </h1>
                <p class="text-muted mb-0">
                    Kelola data peminjaman dan pengembalian alat inventaris sekolah dengan cepat dan terstruktur.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <a href="{{ route('peminjaman.create') }}" class="sch-btn-primary">
                    <i class="bi bi-plus-lg"></i> Tambah Peminjaman Baru
                </a>
            </div>
        </div>
    </div>

    {{-- Notifikasi Sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4 border-0 shadow-sm" role="alert" style="border-radius: 0.75rem;">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Main Content Table Container --}}
    <div class="sch-box">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4 pb-3 border-bottom" style="border-color: var(--sch-border) !important;">
            <div class="d-flex align-items-center gap-3">
                <div class="sch-icon mb-0" style="width: 50px; height: 50px; background: rgba(37, 99, 235, 0.1); display: flex; align-items: center; justify-content: center; border-radius: 0.6rem; font-size: 1.35rem;">
                    📋
                </div>
                <div>
                    <h5 class="fw-bold mb-1">Riwayat Data Peminjaman</h5>
                    <div class="text-muted small">Berikut adalah daftar seluruh status peminjaman alat inventaris.</div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table sch-table align-middle mb-0">
                <thead>
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th>Peminjam</th>
                        <th>Nama Alat</th>
                        <th>Jumlah</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Status</th>
                        <th>Denda</th>
                        <th class="text-center" style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @forelse ($datap as $peminjaman)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td class="fw-bold">{{ $peminjaman->user->nama ?? 'User ID: ' . $peminjaman->id_user }}</td>
                        <td>{{ $peminjaman->alat->nama_alat ?? 'Alat ID: ' . $peminjaman->id_alat }}</td>
                        <td>
                            <span class="badge bg-secondary bg-opacity-10 text-secondary border px-2 py-1" style="border-color: var(--sch-border) !important;">
                                {{ $peminjaman->jumlah }} Unit
                            </span>
                        </td>
                        <td><span class="text-muted">{{ $peminjaman->tanggal_pinjam }}</span></td>
                        <td><span class="text-muted">{{ $peminjaman->tanggal_kembali ?? '-' }}</span></td>
                        <td>
                            @if($peminjaman->status == 'Pending')
                                <span class="badge bg-warning text-dark px-2 py-1">Pending</span>
                            @elseif($peminjaman->status == 'Disetujui')
                                <span class="badge bg-info text-dark px-2 py-1">Disetujui</span>
                            @elseif($peminjaman->status == 'Ditolak')
                                <span class="badge bg-danger px-2 py-1">Ditolak</span>
                            @elseif($peminjaman->status == 'Dipinjam')
                                <span class="badge bg-primary px-2 py-1">Dipinjam</span>
                            @else
                                <span class="badge bg-success px-2 py-1">Dikembalikan</span>
                            @endif
                        </td>
                        <td><span class="fw-bold text-danger">Rp {{ number_format($peminjaman->denda ?? 0, 0, ',', '.') }}</span></td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('peminjaman.edit', ['id_peminjaman' => $peminjaman->id_peminjaman]) }}" class="sch-btn-warning">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>
                                <form action="{{ route('peminjaman.delete', ['id_peminjaman' => $peminjaman->id_peminjaman]) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data peminjaman ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="sch-btn-danger">
                                        <i class="bi bi-trash me-1"></i> Hapus
                                    </button>
                                </form> 
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center py-5 text-muted">
                            <div class="fs-1 mb-2">📂</div>
                            <div class="fw-bold">Belum ada data peminjaman alat.</div>
                            <div class="small mt-1">Silakan tambahkan data peminjaman baru melalui tombol di atas.</div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- PAGINATION --}}
        @if (method_exists($datap, 'links'))
            <div class="mt-4 d-flex justify-content-end">
                {!! $datap->links() !!}
            </div>
        @endif
    </div>

</div>

@endsection