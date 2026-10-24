@extends('layouts.app')

@section('title', 'Verifikasi Peminjaman - PINVERA')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,400;12..96,600;12..96,800&display=swap" rel="stylesheet">

<style>
    .pj-wrap {
        --pj-bg: #eaf3fc;
        --pj-soft: #cfe4f8;
        --pj-mid: #8dbceb;
        --pj-deep: #3f7fc4;
        --pj-ink: #1f4e85;
        --pj-paper: #ffffff;
        --pj-accent: #f6d88b;
        --pj-text-soft: #4d79a8;
        --pj-stub: #3f7fc4;
        --pj-shadow: rgba(31, 78, 133, .35);
        --pj-line: #d6e6f6;
        --pj-hover: #f3f8fe;
        --pj-head: #f0f6fd;
        --pj-on-deep: #ffffff;
        --pj-danger: #b83a54;
        --pj-danger-bg: #fde6ea;
        --pj-ok: #1d7650;
        --pj-ok-bg: #dcf4e8;
        --pj-warn: #86600f;
        --pj-warn-bg: #fdf0cc;
        --pj-close: none;

        position: relative;
        overflow: hidden;
        min-height: calc(100vh - 80px);
        padding: 2rem 1.25rem 2.5rem;
        font-family: 'Bricolage Grotesque', system-ui, sans-serif;
        color: var(--pj-ink);
        background-color: var(--pj-bg);
        background-image: radial-gradient(var(--pj-soft) 2px, transparent 2.5px);
        background-size: 26px 26px;
    }
    @media (min-width: 768px) { .pj-wrap { padding: 2.75rem 2.5rem 3rem; } }

    /* ---------- mode gelap: ikuti perangkat, kecuali situs dipaksa terang ---------- */
    @media (prefers-color-scheme: dark) {
        html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .pj-wrap {
            --pj-bg: #0f1b2b;
            --pj-soft: #1d3552;
            --pj-mid: #3d6a9e;
            --pj-deep: #7ab8f5;
            --pj-ink: #e3eefb;
            --pj-paper: #162a43;
            --pj-accent: #e8c870;
            --pj-text-soft: #9db9d8;
            --pj-stub: #2f5f98;
            --pj-shadow: rgba(0, 0, 0, .55);
            --pj-line: #24415f;
            --pj-hover: #1b3350;
            --pj-head: #1a3049;
            --pj-on-deep: #0f1b2b;
            --pj-danger: #ff9bad;
            --pj-danger-bg: #3a1f2b;
            --pj-ok: #7fe0b0;
            --pj-ok-bg: #16352b;
            --pj-warn: #f0cf7a;
            --pj-warn-bg: #3a3014;
            --pj-close: invert(1) grayscale(100%) brightness(200%);
        }
        html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .pj-wrap .pj-blob { opacity: .45; }
        html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .pj-wrap .pj-deco { opacity: .4; }
    }
    /* ---------- mode gelap: dipilih lewat toggle di situs ---------- */
    html[data-theme="dark"] .pj-wrap,
    html[data-bs-theme="dark"] .pj-wrap,
    html.dark .pj-wrap,
    body.dark .pj-wrap,
    [data-bs-theme="dark"] .pj-wrap {
        --pj-bg: #0f1b2b;
        --pj-soft: #1d3552;
        --pj-mid: #3d6a9e;
        --pj-deep: #7ab8f5;
        --pj-ink: #e3eefb;
        --pj-paper: #162a43;
        --pj-accent: #e8c870;
        --pj-text-soft: #9db9d8;
        --pj-stub: #2f5f98;
        --pj-shadow: rgba(0, 0, 0, .55);
        --pj-line: #24415f;
        --pj-hover: #1b3350;
        --pj-head: #1a3049;
        --pj-on-deep: #0f1b2b;
        --pj-danger: #ff9bad;
        --pj-danger-bg: #3a1f2b;
        --pj-ok: #7fe0b0;
        --pj-ok-bg: #16352b;
        --pj-warn: #f0cf7a;
        --pj-warn-bg: #3a3014;
        --pj-close: invert(1) grayscale(100%) brightness(200%);
    }
    html[data-theme="dark"] .pj-wrap .pj-blob, html[data-bs-theme="dark"] .pj-wrap .pj-blob,
    html.dark .pj-wrap .pj-blob, body.dark .pj-wrap .pj-blob, [data-bs-theme="dark"] .pj-wrap .pj-blob { opacity: .45; }
    html[data-theme="dark"] .pj-wrap .pj-deco, html[data-bs-theme="dark"] .pj-wrap .pj-deco,
    html.dark .pj-wrap .pj-deco, body.dark .pj-wrap .pj-deco, [data-bs-theme="dark"] .pj-wrap .pj-deco { opacity: .4; }

    /* ---------- hiasan ---------- */
    .pj-deco { position: absolute; pointer-events: none; color: var(--pj-mid); opacity: .55; }
    .pj-deco svg { width: 100%; height: 100%; display: block; }
    .pj-deco.d1 { width: 92px; height: 92px; top: -18px; right: 6%; transform: rotate(18deg); }
    .pj-deco.d2 { width: 70px; height: 70px; bottom: 14px; left: 3%; transform: rotate(-20deg); }
    .pj-deco.d3 { width: 56px; height: 56px; bottom: 36px; right: 5%; transform: rotate(10deg); }
    .pj-blob { position: absolute; border-radius: 50%; background: var(--pj-soft); opacity: .7; pointer-events: none; }
    .pj-blob.b1 { width: 220px; height: 220px; top: -90px; left: -70px; }
    .pj-blob.b2 { width: 160px; height: 160px; bottom: -60px; right: 22%; }
    .pj-inner { position: relative; z-index: 1; }

    @keyframes pj-float { 0%, 100% { translate: 0 0; } 50% { translate: 0 -12px; } }
    .pj-deco.d1 { animation: pj-float 6s ease-in-out infinite; }
    .pj-deco.d2 { animation: pj-float 7s ease-in-out -2s infinite; }
    .pj-deco.d3 { animation: pj-float 5.5s ease-in-out -4s infinite; }
    @media (prefers-reduced-motion: reduce) { .pj-deco { animation: none !important; } }

    /* ---------- slip judul ---------- */
    .pj-slip {
        display: flex;
        background: var(--pj-paper);
        border-radius: 1.25rem;
        box-shadow: 0 10px 28px -12px var(--pj-shadow);
        margin-bottom: 1.5rem;
        overflow: hidden;
    }
    .pj-stub {
        flex: 0 0 auto;
        width: 96px;
        background: var(--pj-stub);
        color: #fff;
        display: flex; flex-direction: column; align-items: center; justify-content: center;
        gap: .6rem;
        padding: 1rem .5rem;
        border-right: 3px dashed rgba(255, 255, 255, .55);
    }
    .pj-stub .hole {
        width: 16px; height: 16px; border-radius: 50%;
        background: var(--pj-bg);
        box-shadow: inset 0 2px 3px rgba(31, 78, 133, .35);
    }
    .pj-stub svg { width: 38px; height: 38px; }
    .pj-slip-body { padding: 1.5rem; flex: 1; min-width: 0; }
    .pj-badge {
        display: inline-flex; align-items: center; gap: .4rem;
        background: var(--pj-soft);
        color: var(--pj-ink);
        font-weight: 600; font-size: .85rem;
        padding: .3rem .9rem;
        border-radius: 999px;
        margin-bottom: .8rem;
    }
    .pj-title {
        font-weight: 800;
        font-size: clamp(1.5rem, 4vw, 2.1rem);
        line-height: 1.1;
        letter-spacing: -.02em;
        margin: 0 0 .5rem;
        color: var(--pj-ink);
    }
    .pj-lead { margin: 0; color: var(--pj-text-soft); max-width: 56ch; line-height: 1.55; }

    /* ---------- notifikasi ---------- */
    .pj-alert {
        display: flex; align-items: center; gap: .75rem;
        border-radius: 1rem;
        padding: .8rem 1rem;
        margin-bottom: 1.25rem;
        font-weight: 600; font-size: .92rem;
    }
    .pj-alert i { font-size: 1.2rem; }
    .pj-alert .btn-close { margin-left: auto; filter: var(--pj-close); box-shadow: none; }
    .pj-alert.ok { background: var(--pj-ok-bg); color: var(--pj-ok); border: 2px dashed var(--pj-ok); }
    .pj-alert.bad { background: var(--pj-danger-bg); color: var(--pj-danger); border: 2px dashed var(--pj-danger); }

    /* ---------- buku catatan ---------- */
    .pj-book {
        position: relative;
        background: var(--pj-paper);
        border-radius: .6rem 1.5rem 1.5rem 1.5rem;
        box-shadow: 0 8px 22px -12px var(--pj-shadow);
        padding-top: 1.6rem;
        overflow: hidden;
    }
    .pj-book::before {
        content: '';
        position: absolute;
        top: 9px; left: 0; right: 0;
        height: 14px;
        background-image: radial-gradient(circle at center, var(--pj-bg) 0 6px, transparent 6.5px);
        background-size: 44px 14px;
        background-position: 14px 0;
        background-repeat: repeat-x;
    }

    /* ---------- tabel ---------- */
    .pj-table {
        --bs-table-bg: transparent;
        --bs-table-color: var(--pj-ink);
        --bs-table-border-color: var(--pj-line);
        --bs-table-hover-bg: var(--pj-hover);
        --bs-table-hover-color: var(--pj-ink);
        --bs-table-striped-bg: transparent;
        min-width: 850px;
        margin: 0;
        color: var(--pj-ink);
    }
    .pj-table thead th {
        padding: .9rem 1rem;
        background: var(--pj-head);
        color: var(--pj-text-soft);
        font-size: .85rem; font-weight: 600;
        border-bottom: 2px dashed var(--pj-line);
        white-space: nowrap;
    }
    .pj-table tbody td {
        padding: 1rem;
        border-bottom: 1px dashed var(--pj-line);
        color: var(--pj-ink);
        font-size: .9rem;
    }
    .pj-table tbody tr:last-child td { border-bottom: 0; }
    .pj-no { color: var(--pj-text-soft); font-weight: 700; font-size: .85rem; }

    .pj-id {
        display: inline-flex; align-items: center; gap: .45rem;
        padding: .3rem .75rem .3rem .55rem;
        border-radius: .3rem .8rem .8rem .3rem;
        background: var(--pj-head);
        border: 1px solid var(--pj-line);
        color: var(--pj-ink);
        font-weight: 700; font-size: .8rem;
        white-space: nowrap;
    }
    .pj-id::before {
        content: '';
        width: 8px; height: 8px; border-radius: 50%;
        background: var(--pj-bg);
        box-shadow: inset 0 1px 2px rgba(31, 78, 133, .35);
    }

    .pj-alat { display: flex; align-items: center; gap: .75rem; }
    .pj-ico {
        width: 40px; height: 40px; flex: 0 0 auto;
        border-radius: .8rem;
        background: var(--pj-soft); color: var(--pj-deep);
        display: grid; place-items: center;
        font-size: 1rem;
    }
    .pj-alat-name { font-weight: 700; }
    .pj-alat-user { font-size: .8rem; color: var(--pj-text-soft); }

    .pj-chip {
        display: inline-flex; align-items: center; gap: .4rem;
        padding: .25rem .8rem;
        border-radius: 999px;
        font-weight: 600; font-size: .8rem;
        white-space: nowrap;
    }
    .pj-chip.pending { background: var(--pj-warn-bg); color: var(--pj-warn); }
    .pj-chip.approved { background: var(--pj-ok-bg); color: var(--pj-ok); }
    .pj-chip.other { background: var(--pj-soft); color: var(--pj-ink); }

    /* ---------- tombol ---------- */
    .pj-btn {
        display: inline-flex; align-items: center; justify-content: center; gap: .4rem;
        padding: .4rem 1rem;
        border-radius: .7rem;
        border: 2px solid var(--pj-deep);
        background: var(--pj-deep);
        color: var(--pj-on-deep);
        font-family: inherit; font-weight: 700; font-size: .85rem;
        cursor: pointer;
    }
    .pj-btn:hover { filter: brightness(1.07); color: var(--pj-on-deep); }
    .pj-btn:focus-visible { outline: 3px solid var(--pj-deep); outline-offset: 3px; }
    .pj-done { display: inline-flex; align-items: center; gap: .4rem; font-weight: 700; font-size: .85rem; color: var(--pj-ok); }

    /* ---------- kosong ---------- */
    .pj-empty { padding: 3.5rem 1rem; text-align: center; }
    .pj-empty .pj-ico { width: 64px; height: 64px; margin: 0 auto 1rem; border-radius: 1.2rem; font-size: 1.9rem; }
    .pj-empty h2 { font-size: 1.15rem; font-weight: 800; margin: 0 0 .3rem; color: var(--pj-ink); }
    .pj-empty p { margin: 0; font-size: .92rem; color: var(--pj-text-soft); }

    @media (max-width: 479px) {
        .pj-stub { width: 64px; }
        .pj-stub svg { width: 30px; height: 30px; }
        .pj-slip-body { padding: 1.1rem; }
    }
</style>

<div class="pj-wrap">
    <span class="pj-blob b1"></span>
    <span class="pj-blob b2"></span>

    {{-- hiasan: kunci inggris, kamera, obeng --}}
    <span class="pj-deco d1" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a4 4 0 0 0 5 5L21 12.6a1 1 0 0 1 0 1.4l-7 7a1 1 0 0 1-1.4 0L3 11.4a1 1 0 0 1 0-1.4l7-7a1 1 0 0 1 1.4 0l3.3 3.3z"/></svg>
    </span>
    <span class="pj-deco d2" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 8h3l2-3h6l2 3h3a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/><circle cx="12" cy="13.5" r="3.5"/></svg>
    </span>
    <span class="pj-deco d3" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14 4l6 6-3 3-6-6 3-3z"/><path d="M11 7l-8 8v4h4l8-8"/></svg>
    </span>

    <div class="pj-inner">

        {{-- slip judul --}}
        <div class="pj-slip">
            <div class="pj-stub" aria-hidden="true">
                <span class="hole"></span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l8 3v6c0 4.5-3.2 8-8 9-4.8-1-8-4.5-8-9V6l8-3z"/><path d="M9 12l2 2 4-4"/></svg>
            </div>
            <div class="pj-slip-body">
                <span class="pj-badge">
                    <i class="bi bi-person-badge"></i>
                    Panel Petugas
                </span>
                <h1 class="pj-title">Persetujuan Peminjaman Alat</h1>
                <p class="pj-lead">
                    Daftar pengajuan peminjaman dari peminjam
                    yang menunggu proses verifikasi petugas.
                </p>
            </div>
        </div>

        {{-- notifikasi sukses --}}
        @if(session('success'))
            <div class="pj-alert ok alert alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill"></i>
                <div>{{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- notifikasi error --}}
        @if(session('error'))
            <div class="pj-alert bad alert alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill"></i>
                <div>{{ session('error') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- buku catatan --}}
        <div class="pj-book">

            <div class="table-responsive">
                <table class="table table-hover align-middle pj-table">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 70px;">No</th>
                            <th>ID Peminjaman</th>
                            <th>Nama Alat &amp; Peminjam</th>
                            <th>Status</th>
                            <th class="text-center" style="width: 190px;">Aksi Petugas</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($datap as $index => $item)

                            <tr>

                                {{-- NOMOR --}}
                                <td class="text-center">
                                    <span class="pj-no">{{ $datap->firstItem() + $index }}</span>
                                </td>

                                {{-- ID PEMINJAMAN --}}
                                <td>
                                    <span class="pj-id">#{{ $item->id_peminjaman }}</span>
                                </td>

                                {{-- ALAT & PEMINJAM --}}
                                <td>
                                    <div class="pj-alat">

                                        <span class="pj-ico" aria-hidden="true"><i class="bi bi-box-seam"></i></span>

                                        <div>

                                            <div class="pj-alat-name">
                                                {{ $item->data_alat->nama_alat
                                                    ?? (
                                                        $item->data_alat->nama
                                                        ?? 'Alat ID: ' . $item->id_alat
                                                    )
                                                }}
                                            </div>

                                            <div class="pj-alat-user">
                                                <i class="bi bi-person"></i>
                                                {{ $item->data_user->username
                                                    ?? (
                                                        $item->data_user->name
                                                        ?? 'User ID: ' . $item->id_user
                                                    )
                                                }}
                                            </div>

                                        </div>

                                    </div>
                                </td>

                                {{-- STATUS --}}
                                <td>

                                    @if(
                                        strtolower($item->status) == 'pending'
                                        ||
                                        strtolower($item->status) == 'menunggu'
                                    )

                                        <span class="pj-chip pending">
                                            <i class="bi bi-hourglass-split"></i>
                                            Pending
                                        </span>

                                    @elseif(
                                        strtolower($item->status) == 'disetujui'
                                    )

                                        <span class="pj-chip approved">
                                            <i class="bi bi-check-circle"></i>
                                            Disetujui
                                        </span>

                                    @else

                                        <span class="pj-chip other">
                                            <i class="bi bi-info-circle"></i>
                                            {{ $item->status }}
                                        </span>

                                    @endif

                                </td>

                                {{-- AKSI --}}
                                <td class="text-center">

                                    @if(
                                        strtolower($item->status) == 'pending'
                                        ||
                                        strtolower($item->status) == 'menunggu'
                                    )

                                        <form
                                            action="/petugas/peminjaman/{{ $item->id_peminjaman }}/setujui"
                                            method="POST"
                                            class="d-inline"
                                        >

                                            @csrf

                                            <button type="submit" class="pj-btn">
                                                <i class="bi bi-check2"></i>
                                                Setujui
                                            </button>

                                        </form>

                                    @else

                                        <span class="pj-done">
                                            <i class="bi bi-check-all"></i>
                                            Telah Disetujui
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5">
                                    <div class="pj-empty">
                                        <div class="pj-ico" aria-hidden="true"><i class="bi bi-inbox"></i></div>
                                        <h2>Belum Ada Pengajuan</h2>
                                        <p>
                                            Belum ada data pengajuan
                                            peminjaman yang perlu diverifikasi.
                                        </p>
                                    </div>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>

@endsection