@extends('layouts.app')

@section('title', config('app.name') . ' -- Log Aktifitas Admin')

@section('content')

<style> /* ========================================================= LOG AKTIFITAS - MOUNTAIN THEME ========================================================= */
.log-page {
min-height: calc(100vh - 80px);

background:
    radial-gradient(
        circle at 85% 5%,
        color-mix(in srgb, var(--bs-success) 10%, transparent),
        transparent 32%
    ),
    color-mix(
        in srgb,
        var(--bs-success) 3%,
        var(--bs-body-bg)
    );

}

/* =========================================================
HEADER
========================================================= */

.log-header {
position: relative;
overflow: hidden;

padding: 45px 30px;

border-radius: 0 0 32px 32px;

background:
    linear-gradient(
        135deg,
        color-mix(in srgb, var(--bs-success) 88%, var(--bs-dark)),
        color-mix(in srgb, var(--bs-success) 65%, var(--bs-body-bg))
    );

color: var(--bs-light);

box-shadow:
    0 12px 35px
    color-mix(in srgb, var(--bs-dark) 13%, transparent);

}

.log-header::before {
content: "";

position: absolute;

width: 480px;
height: 480px;

border-radius: 50%;

background:
    color-mix(
        in srgb,
        var(--bs-light) 9%,
        transparent
    );

filter: blur(75px);

top: -300px;
right: -100px;

}

.log-header::after {
content: "";

position: absolute;

width: 350px;
height: 350px;

border-radius: 50%;

background:
    color-mix(
        in srgb,
        var(--bs-light) 7%,
        transparent
    );

filter: blur(70px);

bottom: -260px;
left: 15%;

}

.log-header-content {
position: relative;
z-index: 3;
}

/* =========================================================
BADGE
========================================================= */

.log-badge {
display: inline-flex;
align-items: center;
gap: 8px;

padding: 8px 16px;

margin-bottom: 15px;

border-radius: 50px;

background:
    color-mix(
        in srgb,
        var(--bs-light) 14%,
        transparent
    );

border:
    1px solid
    color-mix(
        in srgb,
        var(--bs-light) 27%,
        transparent
    );

color: var(--bs-light);

backdrop-filter: blur(10px);

font-size: .75rem;
font-weight: 700;

letter-spacing: 1px;

}

/* =========================================================
TITLE
========================================================= */

.log-title {
font-size: clamp(2.2rem, 5vw, 3.5rem);

line-height: 1.05;

letter-spacing: -1.5px;

text-shadow:
    0 7px 20px
    color-mix(
        in srgb,
        var(--bs-dark) 22%,
        transparent
    );

}

.log-description {
max-width: 680px;

color:
    color-mix(
        in srgb,
        var(--bs-light) 82%,
        transparent
    );

line-height: 1.7;

}

/* =========================================================
MOUNTAIN
========================================================= */

.log-mountain {
position: absolute;

z-index: 1;

bottom: -20px;
right: 90px;

width: 0;
height: 0;

border-left: 155px solid transparent;
border-right: 155px solid transparent;

border-bottom: 170px solid
    color-mix(
        in srgb,
        var(--bs-dark) 28%,
        var(--bs-success)
    );

opacity: .75;

}

.log-mountain::after {
content: "";

position: absolute;

top: 55px;
left: -42px;

width: 0;
height: 0;

border-left: 42px solid transparent;
border-right: 42px solid transparent;

border-bottom: 58px solid
    color-mix(
        in srgb,
        var(--bs-light) 45%,
        transparent
    );

}

/* =========================================================
CONTENT
========================================================= */

.log-content {
padding: 40px 20px 70px;
}

/* =========================================================
LOG CARD
========================================================= */

.log-card {
background: var(--bs-body-bg);

border:
    1px solid
    var(--bs-border-color);

border-radius: 25px;

overflow: hidden;

box-shadow:
    0 15px 45px
    color-mix(
        in srgb,
        var(--bs-dark) 8%,
        transparent
    );

transition: all .3s ease;

}

.log-card:hover {
box-shadow:
0 20px 50px
color-mix(
in srgb,
var(--bs-dark) 12%,
transparent
);
}

/* =========================================================
CARD HEADER
========================================================= */

.log-card-header {
padding: 23px 27px;

border-bottom:
    1px solid
    var(--bs-border-color);

background:
    color-mix(
        in srgb,
        var(--bs-success) 4%,
        var(--bs-body-bg)
    );

}

.log-heading-icon {
width: 50px;
height: 50px;

display: inline-flex;

align-items: center;
justify-content: center;

border-radius: 15px;

background:
    color-mix(
        in srgb,
        var(--bs-success) 12%,
        var(--bs-body-bg)
    );

color: var(--bs-success);

font-size: 23px;

}

/* =========================================================
TABLE
========================================================= */

.log-table {
min-width: 800px;
}

.log-table thead th {
padding: 16px 14px;

background:
    color-mix(
        in srgb,
        var(--bs-success) 5%,
        var(--bs-body-bg)
    );

color: var(--bs-secondary-color);

border-bottom:
    1px solid
    var(--bs-border-color);

font-size: .7rem;

font-weight: 700;

letter-spacing: .7px;

text-transform: uppercase;

white-space: nowrap;

}

.log-table tbody td {
padding: 17px 14px;

border-color:
    var(--bs-border-color);

color: var(--bs-body-color);

}

.log-table tbody tr {
transition:
background .2s ease,
transform .2s ease;
}

.log-table tbody tr:hover {
background:
color-mix(
in srgb,
var(--bs-success) 4%,
var(--bs-body-bg)
);
}

/* =========================================================
NUMBER
========================================================= */

.log-number {
color: var(--bs-secondary-color);

font-size: .8rem;

font-weight: 700;

}

/* =========================================================
USER
========================================================= */

.log-user-wrapper {
display: flex;

align-items: center;

gap: 11px;

}

.log-user-icon {
width: 40px;
height: 40px;

display: inline-flex;

align-items: center;
justify-content: center;

flex-shrink: 0;

border-radius: 12px;

background:
    color-mix(
        in srgb,
        var(--bs-success) 11%,
        var(--bs-body-bg)
    );

color: var(--bs-success);

font-size: 17px;

}

.log-user-name {
color: var(--bs-body-color);

font-size: .88rem;

font-weight: 700;

}

/* =========================================================
ACTIVITY
========================================================= */

.log-activity {
display: flex;

align-items: flex-start;

gap: 9px;

color: var(--bs-body-color);

font-size: .85rem;

line-height: 1.6;

}

.log-activity-icon {
color: var(--bs-success);

margin-top: 2px;

}

/* =========================================================
TIMESTAMP
========================================================= */

.log-time {
display: inline-flex;

align-items: center;
gap: 7px;

padding: 8px 11px;

border-radius: 10px;

background:
    color-mix(
        in srgb,
        var(--bs-success) 5%,
        var(--bs-body-bg)
    );

border:
    1px solid
    var(--bs-border-color);

color: var(--bs-secondary-color);

font-family: var(--bs-font-monospace);

font-size: .72rem;

font-weight: 600;

white-space: nowrap;

}

.log-time i {
color: var(--bs-success);
}

/* =========================================================
EMPTY STATE
========================================================= */

.log-empty {
padding: 70px 20px;
}

.log-empty-icon {
width: 70px;
height: 70px;

display: flex;

align-items: center;
justify-content: center;

margin: 0 auto 18px;

border-radius: 22px;

background:
    color-mix(
        in srgb,
        var(--bs-success) 10%,
        var(--bs-body-bg)
    );

color: var(--bs-success);

font-size: 30px;

}

/* =========================================================
PAGINATION
========================================================= */

.log-pagination {
padding: 18px 25px;

border-top:
    1px solid
    var(--bs-border-color);

background:
    color-mix(
        in srgb,
        var(--bs-success) 2%,
        var(--bs-body-bg)
    );

}

/* =========================================================
DARK MODE
========================================================= */

[data-bs-theme="dark"] .log-header {
background:
linear-gradient(
135deg,
color-mix(
in srgb,
var(--bs-success) 42%,
var(--bs-body-bg)
),
color-mix(
in srgb,
var(--bs-success) 20%,
var(--bs-body-bg)
)
);
}

[data-bs-theme="dark"] .log-card {
box-shadow:
0 18px 50px
color-mix(
in srgb,
var(--bs-dark) 25%,
transparent
);
}

/* =========================================================
RESPONSIVE
========================================================= */

@media (max-width: 768px) {

.log-header {
    padding: 35px 22px;

    border-radius: 0 0 25px 25px;
}

.log-title {
    font-size: 2.35rem;
}

.log-mountain {
    right: -70px;

    transform: scale(.75);

    transform-origin: bottom right;

    opacity: .45;
}

.log-content {
    padding:
        28px 15px 50px;
}

.log-card {
    border-radius: 20px;
}

.log-card-header {
    padding: 20px;
}

.log-table {
    min-width: 800px;
}

.log-pagination {
    padding: 15px;
}

}
</style>

<div class="log-page">
{{-- =====================================================
     HEADER
====================================================== --}}

<section class="log-header">

    <div class="container-fluid px-4">

        <div class="log-header-content">

            <span class="log-badge">
                📋
                LOG AKTIFITAS SISTEM
            </span>

            <h1 class="log-title fw-bold mb-3">
                Log Aktifitas Admin
            </h1>

            <p class="log-description mb-0">
                Pantau riwayat aktifitas dan tindakan yang dilakukan
                oleh admin, peminjam, maupun petugas dalam sistem.
            </p>

        </div>

    </div>

    <div class="log-mountain"></div>

</section>

{{-- =====================================================
     CONTENT
====================================================== --}}

<div class="container-fluid">

    <section class="log-content">

        <div class="log-card">

            {{-- CARD HEADER --}}

            <div class="log-card-header">

                <div class="d-flex align-items-center gap-3">

                    <div class="log-heading-icon">
                        📋
                    </div>

                    <div>

                        <h5 class="fw-bold mb-1">
                            Riwayat Aktifitas
                        </h5>

                        <p class="text-body-secondary small mb-0">
                            Catatan seluruh aktifitas yang terekam dalam sistem.
                        </p>

                    </div>

                </div>

            </div>

            {{-- =================================================
                 TABLE
            ================================================== --}}

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0 log-table">

                    <thead>

                        <tr>

                            <th
                                class="text-center"
                                style="width: 60px;"
                            >
                                No
                            </th>

                            <th>
                                Admin / Peminjam / Petugas
                            </th>

                            <th>
                                Aktifitas / Keterangan
                            </th>

                            <th style="width: 270px;">
                                Waktu Kejadian
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @php $no = 1; @endphp

                        @forelse ($datap as $log)

                            @php

                                // Mengambil nama user secara aman berdasarkan id_user
                                $userIdVal = $log->id_user ?? null;

                                $userObj =
                                    $userIdVal
                                    ? \App\Models\User::find($userIdVal)
                                    : null;

                                $namaUser =
                                    $userObj->name
                                    ?? $userObj->nama
                                    ?? $userObj->username
                                    ?? ('User ID: ' . ($userIdVal ?? 'Sistem'));

                            @endphp

                            <tr>

                                {{-- NO --}}

                                <td class="text-center">

                                    <span class="log-number">
                                        {{ $no++ }}
                                    </span>

                                </td>

                                {{-- USER --}}

                                <td>

                                    <div class="log-user-wrapper">

                                        <span class="log-user-icon">

                                            <i class="bi bi-person-badge"></i>

                                        </span>

                                        <span class="log-user-name">

                                            {{ $namaUser }}

                                        </span>

                                    </div>

                                </td>

                                {{-- AKTIFITAS --}}

                                <td>

                                    <div class="log-activity">

                                        <i class="bi bi-activity log-activity-icon"></i>

                                        <span>
                                            {{ $log->aktifitas ?? '-' }}
                                        </span>

                                    </div>

                                </td>

                                {{-- WAKTU --}}

                                <td>

                                    <span class="log-time">

                                        <i class="bi bi-clock"></i>

                                        {{ $log->created_at ?? '-' }}

                                    </span>

                                </td>

                            </tr>

                        @empty

                            {{-- EMPTY STATE --}}

                            <tr>

                                <td
                                    colspan="4"
                                    class="text-center"
                                >

                                    <div class="log-empty">

                                        <div class="log-empty-icon">

                                            <i class="bi bi-journal-x"></i>

                                        </div>

                                        <h5 class="fw-bold mb-2">
                                            Belum Ada Aktifitas
                                        </h5>

                                        <p class="text-body-secondary small mb-0">
                                            Belum ada catatan log aktifitas yang terekam.
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- =================================================
                 PAGINATION
            ================================================== --}}

            @if(method_exists($datap, 'hasPages') && $datap->hasPages())

                <div class="log-pagination d-flex justify-content-end">

                    {!! $datap->links() !!}

                </div>

            @endif

        </div>

    </section>

</div>

</div>
@endsection


ChatGPT