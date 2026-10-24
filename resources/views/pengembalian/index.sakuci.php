@extends('layouts.app')

@section('title', config('app.name') . ' -- Data Pengembalian')

@section('content')

<style> /* ========================================================= PENGEMBALIAN PAGE - MOUNTAIN THEME ========================================================= */
.pengembalian-page {
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

.pengembalian-header {
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

.pengembalian-header::before {
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

.pengembalian-header::after {
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

.pengembalian-header-content {
position: relative;
z-index: 3;
}

/* =========================================================
BADGE
========================================================= */

.pengembalian-badge {
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

.pengembalian-title {
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

.pengembalian-description {
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
MOUNTAIN DECORATION
========================================================= */

.pengembalian-mountain {
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

.pengembalian-mountain::after {
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

.pengembalian-content {
padding: 40px 20px 70px;
}

/* =========================================================
ALERT
========================================================= */

.pengembalian-alert {
border: 0;

border-radius: 16px;

background:
    color-mix(
        in srgb,
        var(--bs-success) 10%,
        var(--bs-body-bg)
    );

color: var(--bs-body-color);

box-shadow:
    0 8px 25px
    color-mix(
        in srgb,
        var(--bs-dark) 6%,
        transparent
    );

}

/* =========================================================
DATA CARD
========================================================= */

.pengembalian-card {
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

.pengembalian-card:hover {
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

.pengembalian-card-header {
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

.card-heading-icon {
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
BUTTON TAMBAH
========================================================= */

.btn-mountain {
background: var(--bs-warning);

border:
    1px solid
    var(--bs-warning);

color: var(--bs-dark);

font-weight: 700;

border-radius: 13px;

transition: all .3s ease;

box-shadow:
    0 8px 20px
    color-mix(
        in srgb,
        var(--bs-dark) 15%,
        transparent
    );

}

.btn-mountain:hover {
background: var(--bs-warning);
border-color: var(--bs-warning);
color: var(--bs-dark);

transform: translateY(-3px);

box-shadow:
    0 13px 28px
    color-mix(
        in srgb,
        var(--bs-dark) 22%,
        transparent
    );

}

/* =========================================================
TABLE
========================================================= */

.pengembalian-table {
min-width: 1050px;
}

.pengembalian-table thead th {
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

.pengembalian-table tbody td {
padding: 17px 14px;

border-color:
    var(--bs-border-color);

color: var(--bs-body-color);

}

.pengembalian-table tbody tr {
transition: background .2s ease;
}

.pengembalian-table tbody tr:hover {
background:
color-mix(
in srgb,
var(--bs-success) 4%,
var(--bs-body-bg)
);
}

/* =========================================================
PEMINJAM
========================================================= */

.borrower-wrapper {
display: flex;
align-items: center;
gap: 10px;
}

.borrower-icon {
width: 38px;
height: 38px;

display: inline-flex;

align-items: center;
justify-content: center;

flex-shrink: 0;

border-radius: 11px;

background:
    color-mix(
        in srgb,
        var(--bs-success) 11%,
        var(--bs-body-bg)
    );

color: var(--bs-success);

}

.borrower-name {
font-weight: 700;

color: var(--bs-body-color);

}

.tool-name {
color: var(--bs-secondary-color);

font-size: .8rem;

}

.loan-id {
display: inline-flex;

align-items: center;

padding: 3px 8px;

margin-left: 4px;

border-radius: 50px;

background:
    color-mix(
        in srgb,
        var(--bs-secondary) 9%,
        var(--bs-body-bg)
    );

color: var(--bs-secondary-color);

font-size: .68rem;

}

/* =========================================================
STATUS BADGE
========================================================= */

.return-badge {
display: inline-flex;

align-items: center;
gap: 6px;

padding: 7px 11px;

border-radius: 10px;

font-size: .72rem;

font-weight: 700;

white-space: nowrap;

}

.status-dot {
width: 7px;
height: 7px;

border-radius: 50%;

background: currentColor;

}

/* =========================================================
DENDA
========================================================= */

.denda-value {
color: var(--bs-danger);

font-weight: 700;

white-space: nowrap;

}

/* =========================================================
ACTION BUTTON
========================================================= */

.btn-action {
border-radius: 10px;

font-weight: 700;

transition: all .25s ease;

}

.btn-action:hover {
transform: translateY(-2px);
}

/* =========================================================
EMPTY STATE
========================================================= */

.empty-state {
padding: 70px 20px;
}

.empty-icon {
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
DARK MODE
========================================================= */

[data-bs-theme="dark"] .pengembalian-header {
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

[data-bs-theme="dark"] .pengembalian-card {
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

.pengembalian-header {
    padding: 35px 22px;

    border-radius: 0 0 25px 25px;
}

.pengembalian-title {
    font-size: 2.35rem;
}

.pengembalian-mountain {
    right: -70px;

    transform: scale(.75);

    transform-origin: bottom right;

    opacity: .45;
}

.pengembalian-content {
    padding:
        28px 15px 50px;
}

.pengembalian-card {
    border-radius: 20px;
}

.pengembalian-card-header {
    padding: 20px;
}

.pengembalian-table {
    min-width: 1000px;
}

}
</style>

<div class="pengembalian-page">
{{-- =====================================================
     HEADER
====================================================== --}}

<section class="pengembalian-header">

    <div class="container-fluid px-4">

        <div class="pengembalian-header-content">

            <span class="pengembalian-badge">
                🔄
                PENGELOLAAN PENGEMBALIAN
            </span>

            <h1 class="pengembalian-title fw-bold mb-3">
                Data Pengembalian
            </h1>

            <p class="pengembalian-description mb-0">
                Kelola riwayat pengembalian peralatan camping,
                kondisi barang, serta denda keterlambatan dengan mudah.
            </p>

        </div>

    </div>

    <div class="pengembalian-mountain"></div>

</section>

{{-- =====================================================
     CONTENT
====================================================== --}}

<div class="container-fluid">

    <section class="pengembalian-content">

        {{-- FLASH ALERT --}}

        @if(session('success'))

            <div
                class="alert pengembalian-alert alert-dismissible fade show d-flex align-items-center mb-4"
                role="alert"
            >

                <i class="bi bi-check-circle-fill me-3 fs-5 text-success"></i>

                <div class="flex-grow-1">
                    {{ session('success') }}
                </div>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>

            </div>

        @endif

        {{-- =================================================
             DATA CARD
        ================================================== --}}

        <div class="pengembalian-card">

            {{-- CARD HEADER --}}

            <div class="pengembalian-card-header">

                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">

                    <div class="d-flex align-items-center gap-3">

                        <div class="card-heading-icon">
                            🔄
                        </div>

                        <div>

                            <h5 class="fw-bold mb-1">
                                Riwayat Pengembalian
                            </h5>

                            <p class="text-body-secondary small mb-0">
                                Daftar barang yang telah dikembalikan oleh peminjam.
                            </p>

                        </div>

                    </div>

                    <a
                        href="{{ route('pengembalian.create') }}"
                        class="btn btn-mountain px-4 py-2 d-inline-flex align-items-center gap-2"
                    >

                        <i class="bi bi-plus-lg"></i>

                        <span>
                            Tambah Pengembalian
                        </span>

                    </a>

                </div>

            </div>

            {{-- =================================================
                 TABLE
            ================================================== --}}

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0 pengembalian-table">

                    <thead>

                        <tr>

                            <th
                                class="text-center"
                                style="width: 55px;"
                            >
                                No
                            </th>

                            <th>
                                Peminjam & Alat
                            </th>

                            <th>
                                Tgl Pengembalian
                            </th>

                            <th>
                                Terlambat
                            </th>

                            <th>
                                Denda
                            </th>

                            <th>
                                Kondisi Barang
                            </th>

                            <th>
                                Catatan
                            </th>

                            <th
                                class="text-center"
                                style="width: 190px;"
                            >
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($datap as $index => $d)

                            @php

                                $p =
                                    $peminjamanList[$d->id_peminjaman]
                                    ?? null;

                                $uname =
                                    $p
                                    ? ($userList[$p->id_user] ?? '-')
                                    : '-';

                                $alatName =
                                    $p
                                    ? ($alatList[$p->id_alat] ?? '-')
                                    : '-';

                                $kondisi =
                                    $d->kondisi_barang
                                    ?? 'Baik';

                                $badgeKondisi = match($kondisi) {

                                    'Baik' =>
                                        'bg-success-subtle text-success-emphasis border border-success-subtle',

                                    'Rusak Ringan' =>
                                        'bg-warning-subtle text-warning-emphasis border border-warning-subtle',

                                    'Rusak Berat',
                                    'Hilang' =>
                                        'bg-danger-subtle text-danger-emphasis border border-danger-subtle',

                                    default =>
                                        'bg-secondary-subtle text-secondary-emphasis border border-secondary-subtle'

                                };

                            @endphp

                            <tr>

                                {{-- NO --}}

                                <td class="text-center">

                                    <span class="text-body-secondary fw-semibold small">
                                        {{ $index + 1 }}
                                    </span>

                                </td>

                                {{-- PEMINJAM & ALAT --}}

                                <td>

                                    <div class="borrower-wrapper">

                                        <span class="borrower-icon">
                                            <i class="bi bi-person-check"></i>
                                        </span>

                                        <div>

                                            <div class="borrower-name">
                                                {{ $uname }}
                                            </div>

                                            <div class="tool-name">

                                                <i class="bi bi-box-seam me-1"></i>

                                                {{ $alatName }}

                                                <span class="loan-id">
                                                    #{{ $d->id_peminjaman }}
                                                </span>

                                            </div>

                                        </div>

                                    </div>

                                </td>

                                {{-- TANGGAL --}}

                                <td>

                                    <span class="text-body-secondary small">

                                        <i class="bi bi-calendar-check me-1"></i>

                                        {{ $d->tanggal_pengembalian }}

                                    </span>

                                </td>

                                {{-- TERLAMBAT --}}

                                <td>

                                    @if($d->terlambat_hari > 0)

                                        <span class="return-badge bg-danger-subtle text-danger-emphasis border border-danger-subtle">

                                            <span class="status-dot"></span>

                                            {{ $d->terlambat_hari }}
                                            Hari

                                        </span>

                                    @else

                                        <span class="return-badge bg-success-subtle text-success-emphasis border border-success-subtle">

                                            <span class="status-dot"></span>

                                            Tepat Waktu

                                        </span>

                                    @endif

                                </td>

                                {{-- DENDA --}}

                                <td>

                                    <span class="denda-value">

                                        Rp
                                        {{ number_format($d->denda, 0, ',', '.') }}

                                    </span>

                                </td>

                                {{-- KONDISI --}}

                                <td>

                                    <span class="return-badge {{ $badgeKondisi }}">

                                        <span class="status-dot"></span>

                                        {{ $kondisi }}

                                    </span>

                                </td>

                                {{-- CATATAN --}}

                                <td>

                                    <span class="text-body-secondary small">

                                        {{ $d->catatan ?? '-' }}

                                    </span>

                                </td>

                                {{-- AKSI --}}

                                <td class="text-center">

                                    <div class="d-inline-flex align-items-center justify-content-center gap-2">

                                        {{-- EDIT --}}

                                        <a
                                            href="{{ route('pengembalian.edit', [$d->id_pengembalian]) }}"
                                            class="btn btn-sm btn-outline-warning btn-action px-3 py-2 d-inline-flex align-items-center gap-1"
                                            title="Edit"
                                        >

                                            <i class="bi bi-pencil-square"></i>

                                            Edit

                                        </a>

                                        {{-- HAPUS --}}

                                        <form
                                            action="{{ route('pengembalian.delete', [$d->id_pengembalian]) }}"
                                            method="POST"
                                            class="d-inline m-0"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                                        >

                                            @csrf

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-outline-danger btn-action px-3 py-2 d-inline-flex align-items-center gap-1"
                                                title="Hapus"
                                            >

                                                <i class="bi bi-trash"></i>

                                                Hapus

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            {{-- EMPTY STATE --}}

                            <tr>

                                <td
                                    colspan="8"
                                    class="text-center"
                                >

                                    <div class="empty-state">

                                        <div class="empty-icon">
                                            🏕️
                                        </div>

                                        <h5 class="fw-bold mb-2">
                                            Belum Ada Pengembalian
                                        </h5>

                                        <p class="text-body-secondary small mb-0">
                                            Belum ada data pengembalian alat camping.
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>

</div>
@endsection