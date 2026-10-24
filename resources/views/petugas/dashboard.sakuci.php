@extends('layouts.app')

@section('title', config('app.name') . ' — Dashboard Petugas')

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
        --pj-head: #f0f6fd;
        --pj-on-deep: #ffffff;
        --pj-ok: #1d7650;
        --pj-ok-bg: #dcf4e8;
        --pj-warn: #86600f;
        --pj-warn-bg: #fdf0cc;

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
            --pj-head: #1a3049;
            --pj-on-deep: #0f1b2b;
            --pj-ok: #7fe0b0;
            --pj-ok-bg: #16352b;
            --pj-warn: #f0cf7a;
            --pj-warn-bg: #3a3014;
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
        --pj-head: #1a3049;
        --pj-on-deep: #0f1b2b;
        --pj-ok: #7fe0b0;
        --pj-ok-bg: #16352b;
        --pj-warn: #f0cf7a;
        --pj-warn-bg: #3a3014;
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

    /* ---------- slip sapaan ---------- */
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
        width: 104px;
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
    .pj-stub svg { width: 42px; height: 42px; }
    .pj-slip-body { padding: 1.6rem 1.5rem; flex: 1; min-width: 0; }
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
        font-size: clamp(1.6rem, 4.5vw, 2.5rem);
        line-height: 1.1;
        letter-spacing: -.02em;
        margin: 0 0 .6rem;
        color: var(--pj-ink);
        word-break: break-word;
    }
    .pj-lead { margin: 0 0 1.1rem; color: var(--pj-text-soft); max-width: 58ch; line-height: 1.6; }

    /* ---------- tombol ---------- */
    .pj-btn {
        display: inline-flex; align-items: center; justify-content: center; gap: .5rem;
        padding: .6rem 1.2rem;
        border-radius: .8rem;
        border: 2px solid var(--pj-deep);
        background: var(--pj-deep);
        color: var(--pj-on-deep);
        font-family: inherit; font-weight: 600; font-size: .92rem;
        text-decoration: none;
        cursor: pointer;
    }
    .pj-btn:hover { filter: brightness(1.07); color: var(--pj-on-deep); }
    .pj-btn:focus-visible { outline: 3px solid var(--pj-deep); outline-offset: 3px; }

    /* ---------- judul bagian ---------- */
    .pj-h2 { display: flex; align-items: center; gap: .6rem; font-size: 1.2rem; font-weight: 800; margin: 0 0 .4rem; color: var(--pj-ink); }
    .pj-h2 i { color: var(--pj-deep); }
    .pj-sec { margin-bottom: 1.5rem; }

    /* ---------- label gantung ---------- */
    .pj-tags { padding-top: 1.4rem; }
    .pj-tag {
        position: relative;
        display: block;
        height: 100%;
        background: var(--pj-paper);
        color: var(--pj-ink);
        text-decoration: none;
        border-radius: .5rem 1.5rem 1.5rem 1.5rem;
        padding: 2.3rem 1.3rem 1.3rem;
        box-shadow: 0 8px 22px -12px var(--pj-shadow);
        transform-origin: 50% 0;
    }
    .pj-tag::before {
        content: '';
        position: absolute;
        top: 14px; left: 50%;
        width: 16px; height: 16px; margin-left: -8px;
        border-radius: 50%;
        background: var(--pj-bg);
        box-shadow: inset 0 2px 3px rgba(31, 78, 133, .3);
        z-index: 2;
    }
    .pj-tag::after {
        content: '';
        position: absolute;
        top: -22px; left: 50%;
        width: 30px; height: 40px; margin-left: -15px;
        border: 3px solid var(--pj-accent);
        border-bottom: 0;
        border-radius: 30px 30px 0 0;
        z-index: 1;
    }
    .pj-tag:hover, .pj-tag:focus-visible { color: var(--pj-ink); animation: pj-swing .9s ease-out; }
    .pj-tag:focus-visible { outline: 3px solid var(--pj-deep); outline-offset: 4px; }
    @keyframes pj-swing {
        20% { transform: rotate(3.5deg); }
        45% { transform: rotate(-2.5deg); }
        70% { transform: rotate(1.2deg); }
        100% { transform: rotate(0); }
    }
    @media (prefers-reduced-motion: reduce) {
        .pj-deco { animation: none !important; }
        .pj-tag:hover, .pj-tag:focus-visible { animation: none; }
    }

    .pj-ico {
        width: 48px; height: 48px; flex: 0 0 auto;
        border-radius: .9rem;
        background: var(--pj-soft); color: var(--pj-deep);
        display: grid; place-items: center;
        font-size: 1.25rem;
    }
    .pj-ico.warn { background: var(--pj-warn-bg); color: var(--pj-warn); }
    .pj-ico.ok { background: var(--pj-ok-bg); color: var(--pj-ok); }

    /* statistik */
    .pj-stat { display: flex; align-items: center; gap: .9rem; }
    .pj-stat .lbl { font-size: .85rem; font-weight: 600; color: var(--pj-text-soft); margin-bottom: .1rem; }
    .pj-stat .num { font-size: 2rem; font-weight: 800; line-height: 1.1; letter-spacing: -.02em; }
    .pj-stat .num.warn { color: var(--pj-warn); }
    .pj-stat .num.deep { color: var(--pj-deep); }
    .pj-stat .num.ok { color: var(--pj-ok); }

    /* menu cepat */
    .pj-menu-top { display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 1rem; }
    .pj-menu-top .go { color: var(--pj-text-soft); font-size: 1.1rem; }
    .pj-menu-title { font-size: 1.1rem; font-weight: 800; margin: 0 0 .15rem; color: var(--pj-ink); }
    .pj-menu-sub { display: block; font-size: .85rem; font-weight: 700; color: var(--pj-deep); margin-bottom: .5rem; }
    .pj-menu-desc { font-size: .9rem; line-height: 1.55; color: var(--pj-text-soft); }

    @media (max-width: 479px) {
        .pj-stub { width: 64px; }
        .pj-stub svg { width: 30px; height: 30px; }
        .pj-slip-body { padding: 1.1rem; }
        .pj-btn { width: 100%; }
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

        {{-- slip sapaan + tombol cetak --}}
        <div class="pj-slip">
            <div class="pj-stub" aria-hidden="true">
                <span class="hole"></span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l8 3v6c0 4.5-3.2 8-8 9-4.8-1-8-4.5-8-9V6l8-3z"/><path d="M9 12l2 2 4-4"/></svg>
            </div>
            <div class="pj-slip-body">

                <span class="pj-badge">
                    <i class="bi bi-shield-check"></i>
                    Panel Petugas Operasional
                </span>

                <h1 class="pj-title">
                    Selamat Datang,
                    {{ $user->username ?? 'Petugas' }}! 👋
                </h1>

                <p class="pj-lead">
                    Pusat kendali operasional peminjaman.
                    Pantau antrean verifikasi, status barang
                    yang sedang dipinjam, dan laporan inventaris.
                </p>

                <a
                    href="{{ route('petugas.pengembalian.cetak') }}"
                    target="_blank"
                    class="pj-btn"
                >
                    <i class="bi bi-printer"></i>
                    Cetak Laporan
                </a>

            </div>
        </div>

        {{-- statistik --}}
        <div class="row g-3 pj-tags pj-sec">

            <div class="col-6 col-md-4">
                <div class="pj-tag">
                    <div class="pj-stat">
                        <span class="pj-ico warn" aria-hidden="true"><i class="bi bi-hourglass-split"></i></span>
                        <div>
                            <div class="lbl">Menunggu Verifikasi</div>
                            <div class="num warn">{{ $totalPending ?? 0 }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4">
                <div class="pj-tag">
                    <div class="pj-stat">
                        <span class="pj-ico" aria-hidden="true"><i class="bi bi-box-seam-fill"></i></span>
                        <div>
                            <div class="lbl">Barang Dipinjam</div>
                            <div class="num deep">{{ $totalDipinjam ?? 0 }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="pj-tag">
                    <div class="pj-stat">
                        <span class="pj-ico ok" aria-hidden="true"><i class="bi bi-database-check"></i></span>
                        <div>
                            <div class="lbl">Total Selesai</div>
                            <div class="num ok">{{ $totalSelesai ?? 0 }}</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- menu akses cepat --}}
        <h2 class="pj-h2">
            <i class="bi bi-grid-fill"></i>
            Menu Akses Cepat
        </h2>

        <div class="row g-3 pj-tags">

            <div class="col-md-6">
                <a href="{{ route('petugas.peminjaman.index') }}" class="pj-tag">

                    <div class="pj-menu-top">
                        <span class="pj-ico" aria-hidden="true"><i class="bi bi-check-circle"></i></span>
                        <i class="bi bi-arrow-up-right go" aria-hidden="true"></i>
                    </div>

                    <div class="pj-menu-title">Persetujuan Peminjaman</div>
                    <span class="pj-menu-sub">Verifikasi pengajuan siswa</span>
                    <div class="pj-menu-desc">
                        Proses persetujuan atau penolakan
                        pengajuan peminjaman alat olahraga
                        dari siswa.
                    </div>

                </a>
            </div>

            <div class="col-md-6">
                <a href="{{ route('petugas.pengembalian.index') }}" class="pj-tag">

                    <div class="pj-menu-top">
                        <span class="pj-ico" aria-hidden="true"><i class="bi bi-arrow-return-left"></i></span>
                        <i class="bi bi-arrow-up-right go" aria-hidden="true"></i>
                    </div>

                    <div class="pj-menu-title">Pantau Pengembalian</div>
                    <span class="pj-menu-sub">Pencatatan barang &amp; denda</span>
                    <div class="pj-menu-desc">
                        Konfirmasi pengembalian alat,
                        periksa tenggat waktu, dan kalkulasi
                        denda keterlambatan.
                    </div>

                </a>
            </div>

        </div>

    </div>
</div>

@endsection