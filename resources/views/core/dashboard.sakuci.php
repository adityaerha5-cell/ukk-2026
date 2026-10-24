@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <span class="badge rounded-pill badge-brand px-3 py-2 mb-3">Role: {{ $user->role }}</span>
            <h1 class="h4 mb-2">Halo, {{ $user->username }}</h1>
            <p class="text-secondary mb-0">Ini halaman dashboard umum, bisa diakses semua role yang sudah login.</p>
        </div>
    </div>

@endsection

@extends('layouts.app')

@section('title', 'Dashboard')

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

            position: relative;
            overflow: hidden;
            padding: 2rem 1.25rem 2.5rem;
            border-radius: 1.5rem;
            font-family: 'Bricolage Grotesque', system-ui, sans-serif;
            color: var(--pj-ink);
            background-color: var(--pj-bg);
            background-image: radial-gradient(var(--pj-soft) 2px, transparent 2.5px);
            background-size: 26px 26px;
        }
        @media (min-width: 768px) { .pj-wrap { padding: 2.75rem 2.5rem 3rem; } }

        /* mode gelap: ikuti perangkat, kecuali situs dipaksa terang */
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
            }
            html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .pj-wrap .pj-blob { opacity: .45; }
            html:not([data-theme="light"]):not([data-bs-theme="light"]):not(.light) .pj-wrap .pj-deco { opacity: .4; }
        }
        /* mode gelap: dipilih lewat toggle di situs */
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
        }
        html[data-theme="dark"] .pj-wrap .pj-blob, html[data-bs-theme="dark"] .pj-wrap .pj-blob,
        html.dark .pj-wrap .pj-blob, body.dark .pj-wrap .pj-blob, [data-bs-theme="dark"] .pj-wrap .pj-blob { opacity: .45; }
        html[data-theme="dark"] .pj-wrap .pj-deco, html[data-bs-theme="dark"] .pj-wrap .pj-deco,
        html.dark .pj-wrap .pj-deco, body.dark .pj-wrap .pj-deco, [data-bs-theme="dark"] .pj-wrap .pj-deco { opacity: .4; }

        /* hiasan */
        .pj-deco { position: absolute; pointer-events: none; color: var(--pj-mid); opacity: .55; }
        .pj-deco svg { width: 100%; height: 100%; display: block; }
        .pj-deco.d1 { width: 92px; height: 92px; top: -18px; right: 6%; transform: rotate(18deg); }
        .pj-deco.d2 { width: 70px; height: 70px; bottom: 14px; left: 3%; transform: rotate(-20deg); }
        .pj-deco.d3 { width: 56px; height: 56px; bottom: 36px; right: 5%; transform: rotate(10deg); }
        .pj-blob { position: absolute; border-radius: 50%; background: var(--pj-soft); opacity: .7; pointer-events: none; }
        .pj-blob.b1 { width: 220px; height: 220px; top: -90px; left: -70px; }
        .pj-blob.b2 { width: 160px; height: 160px; bottom: -60px; right: 22%; }
        .pj-inner { position: relative; z-index: 1; }

        /* slip sapaan */
        .pj-slip {
            display: flex;
            background: var(--pj-paper);
            border-radius: 1.25rem;
            box-shadow: 0 10px 28px -12px var(--pj-shadow);
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
        .pj-slip-body { padding: 1.6rem 1.5rem 1.5rem; flex: 1; min-width: 0; }
        .pj-badge {
            display: inline-block;
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
            word-break: break-word;
        }
        .pj-lead { margin: 0; color: var(--pj-text-soft); max-width: 52ch; line-height: 1.55; }

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
            <div class="pj-slip">
                <div class="pj-stub" aria-hidden="true">
                    <span class="hole"></span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M21 8l-9-5-9 5 9 5 9-5z"/><path d="M3 8v8l9 5 9-5V8"/><path d="M12 13v8"/></svg>
                </div>
                <div class="pj-slip-body">
                    <span class="pj-badge">Role: {{ $user->role }}</span>
                    <h1 class="pj-title">Halo, {{ $user->username }}</h1>
                    <p class="pj-lead">Ini halaman dashboard umum, bisa diakses semua role yang sudah login.</p>
                </div>
            </div>
        </div>
    </div>

@endsection