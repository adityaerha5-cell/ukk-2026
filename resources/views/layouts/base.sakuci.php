<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>

    {{-- Bootstrap 5.3.8 -- file lokal, tidak butuh internet --}}
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    {{-- Bootstrap Icons (dipakai ikon bi-* di sidebar) --}}
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="min-vh-100 bg-body-tertiary">

{{-- Sidebar dipasang SATU KALI di sini.
     File sidebar sudah berisi <main> dan @yield('content'),
     jadi jangan panggil @yield('content') lagi di layout ini. --}}
@include('partials.sidebar')

<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
@yield('scripts')

</body>
</html>