<!-- resources/views/layouts/main.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Obecity Check - Pantau kesehatan dan berat badan Anda dengan mudah">
    <title>@yield('title', 'Obecity Check')</title>

    <!-- Bootstrap dan custom CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('assets/web_user/css/custom.css') }}">
    
    @stack('styles') <!-- Tambahan CSS dari halaman anak -->
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <div class="logo-container">
                    <img src="{{ asset('assets/web_user/images/LogoObes.png') }}" alt="Logo" class="logo-img">
                </div>
                <span class="brand-text">Obecity Check</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') || Request::is('beranda') ? 'active' : '' }}" href="/">
                            <i class="bi bi-house-door me-1"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('kalkulator') ? 'active' : '' }}" href="/kalkulator">
                            <i class="bi bi-calculator me-1"></i> Kalkulator
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('rekomendasi') ? 'active' : '' }}" href="/rekomendasi">
                            <i class="bi bi-clipboard2-heart me-1"></i> Rekomendasi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('history') ? 'active' : '' }}" href="/history">
                            <i class="bi bi-clock-history me-1"></i> History
                        </a>
                    </li>
                </ul>
                <div class="navbar-text">
                    <i class="bi bi-person-circle me-1"></i> John Doe
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content') <!-- Konten dari halaman anak -->
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-links">
                    <a href="#">Tentang Kami</a>
                    <a href="#">Kebijakan Privasi</a>
                    <a href="#">Bantuan</a>
                    <a href="#">Kontak