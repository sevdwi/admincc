<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Registrasi Ormas | Pemkab Cilacap')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- GOOGLE FONT --}}
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    {{-- FONT AWESOME CDN --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- ADMIN LTE CSS CDN --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css" 
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs/build/css/themes/default.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs/build/alertify.min.js"></script>


    {{-- EXTRA CSS --}}
    @stack('styles')
</head>

<body class="hold-transition layout-top-nav">
<div class="wrapper">

    {{-- NAVBAR --}}
    <nav class="main-header navbar navbar-expand-md navbar-success navbar-dark">
        <div class="container">
            <a href="#" class="navbar-brand">
                <img src="{{ asset('images/Logo-Cilacap.png') }}"
                     alt="Logo Pemkab Cilacap"
                     class="brand-image img-circle elevation-3"
                     style="opacity: .8">
                <span class="brand-text font-weight-light">
                    SIM ORMAS CILACAP
                </span>
            </a>
        </div>
    </nav>

    {{-- CONTENT --}}
    <div class="content-wrapper">
        <div class="content pt-4">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>

    {{-- FOOTER --}}
    <footer class="main-footer text-center small">
        © {{ date('Y') }} Pemerintah Kabupaten Cilacap |
        Badan Kesatuan Bangsa dan Politik
    </footer>

</div>

{{-- REQUIRED JS --}}
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

{{-- EXTRA JS --}}
@stack('scripts')
</body>
</html>
