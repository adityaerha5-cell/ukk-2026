@extends('layouts.app')

@section('title', 'Kembalikan Alat')

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
        --pj-danger: #b83a54;

        color-scheme: light;
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
            --pj-danger: #ff9bad;
            color-scheme: dark;
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
        --pj-danger: #ff9bad;
        color-scheme: dark;
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
        margin-bottom: 1.75rem;
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
        font-size: clamp(1.6rem, 4vw, 2.3rem);
        line-height: 1.1;
        letter-spacing: -.02em;
        margin: 0 0 .5rem;
        color: var(--pj-ink);
    }
    .pj-lead { margin: 0; color: var(--pj-text-soft); max-width: 56ch; line-height: 1.55; }

    /* ---------- kartu formulir ---------- */
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
    .pj-book-head { display: flex; align-items: center; gap: .9rem; padding: .6rem 1.5rem 1.1rem; border-bottom: 2px dashed var(--pj-line); }
    .pj-ico {
        width: 44px; height: 44px; flex: 0 0 auto;
        border-radius: .9rem;
        background: var(--pj-soft); color: var(--pj-deep);
        display: grid; place-items: center;
        font-size: 1.15rem;
    }
    .pj-book-head h2 { font-size: 1.15rem; font-weight: 800; margin: 0 0 .15rem; color: var(--pj-ink); }
    .pj-book-head p { margin: 0; font-size: .9rem; color: var(--pj-text-soft); }
    .pj-book-body { padding: 1.6rem 1.5rem 1.5rem; }

    /* ---------- field ---------- */
    .pj-field { margin-bottom: 1.4rem; }
    .pj-label { display: block; margin-bottom: .45rem; font-weight: 700; font-size: .9rem; color: var(--pj-ink); }
    .pj-label .req { color: var(--pj-danger); }
    .pj-label .opt { color: var(--pj-text-soft); font-weight: 400; }
    .pj-control {
        width: 100%;
        min-height: 48px;
        padding: .65rem 1rem;
        border-radius: .8rem;
        border: 2px solid var(--pj-line);
        background: var(--pj-head);
        color: var(--pj-ink);
        font-family: inherit; font-size: .95rem;
    }
    .pj-control::placeholder { color: var(--pj-text-soft); opacity: .8; }
    .pj-control:focus { outline: 3px solid var(--pj-deep); outline-offset: 2px; border-color: var(--pj-deep); }
    select.pj-control { cursor: pointer; }
    textarea.pj-control { min-height: 110px; resize: vertical; line-height: 1.5; }
    .pj-control.is-invalid { border-color: var(--pj-danger); }
    .pj-control.is-invalid:focus { outline-color: var(--pj-danger); border-color: var(--pj-danger); }
    .pj-wrap .invalid-feedback { color: var(--pj-danger); font-size: .85rem; font-weight: 600; margin-top: .4rem; }

    /* ---------- info: tidak ada pinjaman aktif ---------- */
    .pj-info {
        display: flex; align-items: flex-start; gap: .9rem;
        padding: 1.1rem 1.2rem;
        border: 2px dashed var(--pj-deep);
        border-radius: 1rem;
        background: var(--pj-head);
        color: var(--pj-ink);
    }
    .pj-info .txt { font-size: .92rem; line-height: 1.6; color: var(--pj-text-soft); }
    .pj-info .txt strong { color: var(--pj-ink); }

    /* ---------- aksi ---------- */
    .pj-actions {
        display: flex; justify-content: flex-end; align-items: center; gap: .75rem; flex-wrap: wrap;
        margin-top: 1.6rem; padding-top: 1.3rem;
        border-top: 2px dashed var(--pj-line);
    }
    .pj-btn {
        display: inline-flex; align-items: center; justify-content: center; gap: .5rem;
        padding: .65rem 1.4rem;
        border-radius: .8rem;
        border: 2px solid var(--pj-deep);
        background: var(--pj-deep);
        color: var(--pj-on-deep);
        font-family: inherit; font-weight: 700; font-size: .92rem;
        text-decoration: none;
        cursor: pointer;
    }
    .pj-btn:hover { filter: brightness(1.07); color: var(--pj-on-deep); }
    .pj-btn:focus-visible { outline: 3px solid var(--pj-deep); outline-offset: 3px; }
    .pj-btn.line { background: transparent; color: var(--pj-deep); }
    .pj-btn.line:hover { background: var(--pj-soft); color: var(--pj-ink); filter: none; }

    @media (max-width: 575px) {
        .pj-actions { flex-direction: column-reverse; align-items: stretch; }
        .pj-actions .pj-btn { width: 100%; }
    }
    @media (max-width: 479px) {
        .pj-stub { width: 64px; }
        .pj-stub svg { width: 30px; height: 30px; }
        .pj-slip-body { padding: 1.1rem; }
        .pj-book-head { padding: .6rem 1.1rem 1rem; }
        .pj-book-body { padding: 1.3rem 1.1rem; }
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
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M21 8l-9-5-9 5 9 5 9-5z"/><path d="M3 8v8l9 5 9-5V8"/><path d="M9 14l-3-3 3-3"/><path d="M6 11h7"/></svg>
            </div>
            <div class="pj-slip-body">
                <span class="pj-badge">
                    <i class="bi bi-arrow-return-left"></i>
                    Inventaris Sistem
                </span>
                <h1 class="pj-title">Kembalikan Alat</h1>
                <p class="pj-lead">
                    Silakan isi formulir berikut untuk mengembalikan
                    alat inventaris yang telah selesai digunakan.
                </p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-xl-8">

                <div class="pj-book">

                    <div class="pj-book-head">
                        <span class="pj-ico" aria-hidden="true"><i class="bi bi-box-arrow-in-left"></i></span>
                        <div>
                            <h2>Form Pengembalian</h2>
                            <p>Lengkapi data pengembalian alat di bawah ini.</p>
                        </div>
                    </div>

                    <div class="pj-book-body">

                        {{-- JIKA TIDAK ADA PEMINJAMAN AKTIF --}}

                        @if(empty($peminjamanAktif) || count($peminjamanAktif) === 0)

                            <div class="pj-info">

                                <span class="pj-ico" aria-hidden="true">
                                    <i class="bi bi-info-circle-fill"></i>
                                </span>

                                <div class="txt">
                                    Kamu tidak memiliki alat yang berstatus
                                    <strong>Sedang Dipinjam</strong> saat ini.
                                    Pastikan peminjamanmu sudah disetujui
                                    oleh admin/petugas.
                                </div>

                            </div>

                        @else

                            {{-- FORM PENGEMBALIAN --}}

                            <form action="{{ route('peminjam.pengembalian.store') }}" method="POST">

                                @csrf

                                {{-- PILIH ALAT --}}
                                <div class="pj-field">

                                    <label for="id_peminjaman" class="pj-label">
                                        Pilih Alat yang Ingin Dikembalikan
                                        <span class="req">*</span>
                                    </label>

                                    <select
                                        name="id_peminjaman"
                                        id="id_peminjaman"
                                        class="pj-control @error('id_peminjaman') is-invalid @enderror"
                                        required
                                    >

                                        <option value="">
                                            -- Pilih Alat dari Daftar Pinjaman --
                                        </option>

                                        @foreach($peminjamanAktif as $p)

                                            <option value="{{ $p->id_peminjaman ?? $p->id }}">

                                                📦
                                                {{ $p->alat->nama_alat
                                                    ?? ($p->alat->nama
                                                    ?? ($p->nama_alat
                                                    ?? 'Alat ID: ' . $p->id_alat)) }}

                                                (Status: {{ ucfirst($p->status) }})

                                            </option>

                                        @endforeach

                                    </select>

                                    @error('id_peminjaman')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                {{-- TANGGAL PENGEMBALIAN --}}
                                <div class="pj-field">

                                    <label for="tanggal_pengembalian" class="pj-label">
                                        Tanggal Pengembalian
                                        <span class="req">*</span>
                                    </label>

                                    <input
                                        type="date"
                                        name="tanggal_pengembalian"
                                        id="tanggal_pengembalian"
                                        class="pj-control"
                                        value="{{ date('Y-m-d') }}"
                                        required
                                    >

                                </div>

                                {{-- KONDISI BARANG --}}
                                <div class="pj-field">

                                    <label for="kondisi_barang" class="pj-label">
                                        Kondisi Barang Saat Dikembalikan
                                    </label>

                                    <select
                                        name="kondisi_barang"
                                        id="kondisi_barang"
                                        class="pj-control"
                                    >

                                        <option value="Baik">
                                            Baik (Normal)
                                        </option>

                                        <option value="Ringan Rusak">
                                            Ada Kerusakan Ringan
                                        </option>

                                        <option value="Rusak">
                                            Rusak / Tidak Berfungsi
                                        </option>

                                    </select>

                                </div>

                                {{-- CATATAN --}}
                                <div class="pj-field">

                                    <label for="catatan" class="pj-label">
                                        Catatan Tambahan
                                        <span class="opt">(Opsional)</span>
                                    </label>

                                    <textarea
                                        name="catatan"
                                        id="catatan"
                                        rows="3"
                                        class="pj-control"
                                        placeholder="Tuliskan keterangan tambahan jika diperlukan..."
                                    ></textarea>

                                </div>

                                {{-- AKSI --}}
                                <div class="pj-actions">

                                    <a href="{{ route('peminjam.dashboard') }}" class="pj-btn line">
                                        <i class="bi bi-arrow-left"></i>
                                        Batal
                                    </a>

                                    <button type="submit" class="pj-btn">
                                        <i class="bi bi-arrow-return-left"></i>
                                        Kirim Pengembalian
                                    </button>

                                </div>

                            </form>

                        @endif

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection