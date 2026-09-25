@extends('layouts.app')

@section('title', 'Peminjaman Alat -- ' . config('app.name'))

@section('content')

    {{-- Hero Section --}}
    <section class="text-center py-4 py-lg-5">
        <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-3 py-2 mb-3">
            Sistem Inventaris & Peminjaman Alat
        </span>

        <h1 class="display-5 fw-bold mb-3">
            Pinjam Alat Sekolah Jadi<br class="d-none d-md-inline">
            <span class="text-success">Lebih Cepat & Terdata</span>
        </h1>

        <p class="lead text-secondary mx-auto mb-4" style="max-width: 650px;">
            Layanan peminjaman alat praktikum, peralatan teknik, dan sarana prasarana sekolah secara online. Pantau ketersediaan stok alat secara real-time.
        </p>

        <div class="d-flex flex-wrap gap-2 justify-content-center">
            
                <a class="btn btn-success btn-lg px-4" href="{{ route('alat.index') }}">
                    <i class="bi bi-box-seam me-1"></i> Lihat Katalog Alat
                </a>
                <a class="btn btn-outline-success btn-lg px-4" href="{{ route('kategori.index') }}">
                    <i class="bi bi-tags me-1"></i> Kategori Alat
                </a>
            

            
                <a class="btn btn-success btn-lg px-4" href="{{ route('login') }}">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Login untuk Memulai
                </a>
            
        </div>
    </section>

    <hr class="my-5">

    {{-- Fitur / Alur Kerja --}}
    <div class="row g-4 py-3">
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 bg-body-tertiary">
                <div class="card-body text-center p-4">
                    <div class="fs-1 text-success mb-3">
                        <i class="bi bi-tags"></i>
                    </div>
                    <h5 class="card-title fw-bold">1. Pilih Kategori</h5>
                    <p class="card-text text-secondary">Cari peralatan berdasarkan kelompok atau kategori jenis alat yang dibutuhkan.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 bg-body-tertiary">
                <div class="card-body text-center p-4">
                    <div class="fs-1 text-success mb-3">
                        <i class="bi bi-search"></i>
                    </div>
                    <h5 class="card-title fw-bold">2. Cek Stok Alat</h5>
                    <p class="card-text text-secondary">Pastikan ketersediaan, jumlah, dan kondisi alat siap untuk dipinjam.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 bg-body-tertiary">
                <div class="card-body text-center p-4">
                    <div class="fs-1 text-success mb-3">
                        <i class="bi bi-arrow-return-left"></i>
                    </div>
                    <h5 class="card-title fw-bold">3. Kembalikan Tepat Waktu</h5>
                    <p class="card-text text-secondary">Gunakan alat sebaik-baiknya dan kembalikan sesuai batas waktu yang ditentukan.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Akses Cepat Menu Dashboard (Hanya Muncul Jika Sudah Login) --}}
    
        <div class="mt-5 p-4 bg-success-subtle rounded-3 text-center border border-success-subtle">
            <h4 class="fw-bold text-success mb-2">Panel Manajemen Inventaris</h4>
            <p class="text-secondary mb-3">Kelola data alat dan kategori langsung melalui tombol di bawah ini:</p>
            <div class="d-flex justify-content-center gap-2 flex-wrap">
                <a href="{{ route('kategori.index') }}" class="btn btn-outline-success">Kategori Alat</a>
                <a href="{{ route('alat.index') }}" class="btn btn-success">Daftar Alat</a>
            </div>
        </div>
    

@endsection