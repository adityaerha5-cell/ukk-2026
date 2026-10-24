@extends('layouts.app')

@section('title', config('app.name') . ' — Daftar Alat Tersedia')

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

    /* ---------- mode gelap ---------- */
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
        }
    }
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
    }

    /* ---------- hiasan ---------- */
    .pj-deco { position: absolute; pointer-events: none; color: var(--pj-mid); opacity: .55; }
    .pj-deco svg { width: 100%; height: 100%; display: block; }
    .pj-deco.d1 { width: 92px; height: 92px; top: -18px; right: 6%; transform: rotate(18deg); }
    .pj-deco.d2 { width: 70px; height: 70px; bottom: 14px; left: 3%; transform: rotate(-20deg); }
    .pj-blob { position: absolute; border-radius: 50%; background: var(--pj-soft); opacity: .7; pointer-events: none; }
    .pj-blob.b1 { width: 220px; height: 220px; top: -90px; left: -70px; }
    .pj-blob.b2 { width: 160px; height: 160px; bottom: -60px; right: 22%; }
    .pj-inner { position: relative; z-index: 1; }

    @keyframes pj-float { 0%, 100% { translate: 0 0; } 50% { translate: 0 -12px; } }
    .pj-deco.d1 { animation: pj-float 6s ease-in-out infinite; }
    .pj-deco.d2 { animation: pj-float 7s ease-in-out -2s infinite; }

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
        width: 110px;
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
    .pj-stub svg { width: 44px; height: 44px; }
    .pj-slip-body { padding: 1.6rem 1.5rem; flex: 1; min-width: 0; }
    .pj-badge {
        display: inline-flex; align-items: center; gap: .4rem;
        background: var(--pj-soft);
        color: var(--pj-ink);
        font-weight: 600; font-size: .85rem;
        padding: .3rem .9rem;
        border-radius: 999px;
    }
    .pj-badges { display: flex; flex-wrap: wrap; gap: .5rem; }
    .pj-title {
        font-weight: 800;
        font-size: clamp(1.8rem, 4.8vw, 2.9rem);
        line-height: 1.07;
        letter-spacing: -.025em;
        margin: .9rem 0 .6rem;
        color: var(--pj-ink);
    }
    .pj-title span { color: var(--pj-deep); }
    .pj-lead { margin: 0 0 1.1rem; color: var(--pj-text-soft); max-width: 58ch; line-height: 1.6; }

    /* ---------- pencarian ---------- */
    .pj-search {
        background: var(--pj-paper);
        border: 2px dashed var(--pj-line);
        border-radius: 1.25rem;
        padding: 1.1rem 1.25rem;
        margin-bottom: 1.5rem;
    }
    .pj-search label {
        display: flex; align-items: center; gap: .4rem;
        font-weight: 700; font-size: .85rem;
        color: var(--pj-text-soft);
        margin-bottom: .55rem;
    }
    .pj-search-row { display: flex; gap: .6rem; flex-wrap: wrap; }
    .pj-input {
        flex: 1 1 220px;
        min-width: 0;
        padding: .65rem 1rem;
        border-radius: .8rem;
        border: 2px solid var(--pj-line);
        background: var(--pj-head);
        color: var(--pj-ink);
        font-family: inherit; font-size: .95rem;
    }
    .pj-input::placeholder { color: var(--pj-text-soft); opacity: .8; }
    .pj-input:focus { outline: 3px solid var(--pj-deep); outline-offset: 2px; border-color: var(--pj-deep); }
    .pj-search-state {
        display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: .5rem;
        margin-top: .85rem; padding-top: .85rem;
        border-top: 2px dashed var(--pj-line);
        font-size: .9rem; color: var(--pj-text-soft);
    }
    .pj-search-state a { color: var(--pj-deep); font-weight: 700; }

    /* ---------- tombol ---------- */
    .pj-btn {
        display: inline-flex; align-items: center; justify-content: center; gap: .5rem;
        padding: .65rem 1.3rem;
        border-radius: .8rem;
        border: 2px solid var(--pj-deep);
        background: var(--pj-deep);
        color: var(--pj-on-deep);
        font-family: inherit; font-weight: 700; font-size: .92rem;
        text-decoration: none;
        cursor: pointer;
    }
    .pj-btn:hover { filter: brightness(1.07); color: var(--pj-on-deep); }
    .pj-btn.line { background: transparent; color: var(--pj-deep); }
    .pj-btn.line:hover { background: var(--pj-soft); color: var(--pj-ink); }
    .pj-btn.block { width: 100%; }

    /* ---------- info hasil ---------- */
    .pj-result {
        display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: .6rem;
        margin-bottom: .4rem;
        color: var(--pj-text-soft);
        font-size: .92rem;
    }
    .pj-result strong { color: var(--pj-ink); }
    .pj-result i { color: var(--pj-deep); }
    .pj-chip {
        display: inline-flex; align-items: center; gap: .35rem;
        padding: .25rem .8rem;
        border-radius: 999px;
        background: var(--pj-ok-bg); color: var(--pj-ok);
        font-weight: 600; font-size: .8rem;
    }

    /* ---------- label alat (digantung) ---------- */
    .pj-grid { padding-top: 1.4rem; }
    .pj-tag {
        position: relative;
        height: 100%;
        display: flex; flex-direction: column; justify-content: space-between;
        background: var(--pj-paper);
        border-radius: .5rem 1.5rem 1.5rem 1.5rem;
        padding: 2.4rem 1.3rem 1.3rem;
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
    .pj-tag:hover { animation: pj-swing .9s ease-out; }
    @keyframes pj-swing {
        20% { transform: rotate(3deg); }
        45% { transform: rotate(-2deg); }
        70% { transform: rotate(1deg); }
        100% { transform: rotate(0); }
    }

    .pj-tag-top { display: flex; justify-content: space-between; align-items: center; gap: .5rem; flex-wrap: wrap; margin-bottom: 1rem; }
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
    .pj-cat {
        padding: .25rem .8rem;
        border-radius: 999px;
        background: var(--pj-soft); color: var(--pj-ink);
        font-weight: 600; font-size: .78rem;
    }
    .pj-tag-main { display: flex; align-items: flex-start; gap: .9rem; }
    .pj-ico {
        width: 48px; height: 48px; flex: 0 0 auto;
        display: grid; place-items: center;
        border-radius: .9rem;
        background: var(--pj-soft); color: var(--pj-deep);
        font-size: 1.3rem;
    }
    .pj-name {
        font-size: 1.05rem; font-weight: 800; line-height: 1.25;
        margin: 0 0 .3rem; color: var(--pj-ink);
        display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
    }
    .pj-stock { font-size: .82rem; color: var(--pj-text-soft); }
    .pj-stock strong, .pj-ready { color: var(--pj-ok); font-weight: 700; }
    .pj-tag-foot { margin-top: 1.1rem; padding-top: 1rem; border-top: 2px dashed var(--pj-line); }

    /* ---------- kosong ---------- */
    .pj-empty {
        text-align: center;
        background: var(--pj-paper);
        border-radius: .6rem 1.5rem 1.5rem 1.5rem;
        box-shadow: 0 8px 22px -12px var(--pj-shadow);
        padding: 3rem 1.5rem;
    }
    .pj-empty .pj-ico { width: 64px; height: 64px; margin: 0 auto 1rem; border-radius: 1.2rem; font-size: 1.9rem; }
    .pj-empty h2 { font-size: 1.2rem; font-weight: 800; margin: 0 0 .4rem; color: var(--pj-ink); }
    .pj-empty p { margin: 0 0 1.3rem; font-size: .92rem; color: var(--pj-text-soft); }
</style>

<div class="pj-wrap">
    <span class="pj-blob b1"></span>
    <span class="pj-blob b2"></span>

    {{-- hiasan dekoratif --}}
    <span class="pj-deco d1" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a4 4 0 0 0 5 5L21 12.6a1 1 0 0 1 0 1.4l-7 7a1 1 0 0 1-1.4 0L3 11.4a1 1 0 0 1 0-1.4l7-7a1 1 0 0 1 1.4 0l3.3 3.3z"/></svg>
    </span>
    <span class="pj-deco d2" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 8h3l2-3h6l2 3h3a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/><circle cx="12" cy="13.5" r="3.5"/></svg>
    </span>

    <div class="pj-inner">

        {{-- slip judul katalog --}}
        <div class="pj-slip">
            <div class="pj-stub" aria-hidden="true">
                <span class="hole"></span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M21 8l-9-5-9 5 9 5 9-5z"/><path d="M3 8v8l9 5 9-5V8"/><path d="M12 13v8"/></svg>
            </div>
            <div class="pj-slip-body">

                <span class="pj-badge">
                    <i class="bi bi-box-seam-fill"></i>
                    Inventaris Alat 
                </span>

                <h1 class="pj-title">
                    Katalog Alat<br>
                    <span>Elektronik, Peralatan &amp; Multimedia</span>
                </h1>

                <p class="pj-lead">
                    Jelajahi berbagai alat elektronik, peralatan, dan multimedia yang tersedia. Pilih alat yang kamu butuhkan dan ajukan peminjaman dengan mudah.
                </p>

                <div class="pj-badges">
                    <span class="pj-badge">
                        <i class="bi bi-check-circle-fill"></i>
                        Siap Dipinjam
                    </span>
                    <span class="pj-badge">
                        <i class="bi bi-shield-check"></i>
                        Terverifikasi
                    </span>
                </div>

            </div>
        </div>

        {{-- form pencarian --}}
        <form action="{{ route('peminjam.alat') }}" method="GET" class="pj-search">
            <label for="pj-q">
                <i class="bi bi-search"></i>
                Cari Peralatan
            </label>

            <div class="pj-search-row">
                <input
                    id="pj-q"
                    type="text"
                    name="q"
                    class="pj-input"
                    placeholder="Nama atau kode alat..."
                    value="{{ request('q') }}"
                >

                <button class="pj-btn" type="submit">
                    <i class="bi bi-search"></i>
                    Cari
                </button>
            </div>

            @if(request('q'))
                <div class="pj-search-state">
                    <span>
                        Hasil pencarian untuk: <strong>"{{ request('q') }}"</strong>
                    </span>
                    <a href="{{ route('peminjam.alat') }}">Reset Pencarian</a>
                </div>
            @endif
        </form>

        @php
            $rawAlats = $alats ?? $alat ?? [];
            $searchQuery = trim(request('q') ?? '');
            $filteredAlats = [];

            foreach ($rawAlats as $item) {
                $namaAlat = $item->nama_alat ?? $item->nama ?? $item->name ?? '';
                $kodeAlat = $item->kode_alat ?? $item->kode ?? '';

                if (!empty($searchQuery)) {
                    if (stripos($namaAlat, $searchQuery) !== false || stripos($kodeAlat, $searchQuery) !== false) {
                        $filteredAlats[] = $item;
                    }
                } else {
                    $filteredAlats[] = $item;
                }
            }
        @endphp

        {{-- info jumlah hasil --}}
        <div class="pj-result">
            <span>
                <i class="bi bi-grid-3x3-gap-fill"></i>
                Menampilkan
                <strong>{{ count($filteredAlats) }}</strong>
                alat yang siap dipinjam
            </span>

            @if(request('q'))
                <span class="pj-chip">
                    <i class="bi bi-funnel-fill"></i>
                    Filter aktif
                </span>
            @endif
        </div>

        {{-- grid daftar alat (stiker gantung) --}}
        <div class="row g-4 pj-grid">

            @forelse($filteredAlats as $item)

                @php
                    $namaKategori = $kategoriMap[$item->id_kategori] ?? 'Umum';
                    $alatId = $item->id_alat ?? $item->id;
                    $namaAlat = $item->nama_alat ?? $item->nama ?? $item->name ?? 'Alat #' . $alatId;
                    $kodeAlat = $item->kode_alat ?? $item->kode ?? 'ALT';
                    $stokAlat = $item->stok ?? $item->jumlah ?? null;
                @endphp

                <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                    <div class="pj-tag">
                        <div>
                            <div class="pj-tag-top">
                                <span class="pj-id">{{ $kodeAlat }}</span>
                                <span class="pj-cat">{{ $namaKategori }}</span>
                            </div>

                            <div class="pj-tag-main">
                                <span class="pj-ico" aria-hidden="true">
                                    <i class="bi bi-tools"></i>
                                </span>

                                <div style="min-width: 0;">
                                    <h2 class="pj-name">{{ $namaAlat }}</h2>

                                    @if(isset($stokAlat))
                                        <div class="pj-stock">
                                            <i class="bi bi-box-seam"></i>
                                            Stok: <strong>{{ $stokAlat }} unit</strong>
                                        </div>
                                    @else
                                        <div class="pj-stock pj-ready">
                                            <i class="bi bi-check-circle-fill"></i>
                                            Status: Ready
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="pj-tag-foot">
                            <a href="{{ route('peminjam.createPeminjam') . '?id_alat=' . $alatId }}" class="pj-btn block">
                                <i class="bi bi-handbag-fill"></i>
                                Ajukan Pinjam
                            </a>
                        </div>
                    </div>
                </div>

            @empty
                <div class="col-12">
                    <div class="pj-empty">
                        <div class="pj-ico" aria-hidden="true">
                            <i class="bi bi-search"></i>
                        </div>
                        <h2>Peralatan Tidak Ditemukan</h2>
                        <p>Maaf, alat yang kamu cari dengan kata kunci <strong>"{{ request('q') }}"</strong> tidak tersedia.</p>
                        <a href="{{ route('peminjam.alat') }}" class="pj-btn line">
                            <i class="bi bi-grid"></i>
                            Lihat Semua Alat
                        </a>
                    </div>
                </div>
            @endforelse

        </div>

    </div>
</div>

@endsection