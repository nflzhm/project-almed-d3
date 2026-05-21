<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>RSU Allam Medica - Beranda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>


<style>
@font-face {
    font-family: 'GothamBlack';
    src: url('{{ asset('fonts/Gotham-Black.otf') }}') format('opentype');
    font-weight: 900;
    font-style: normal;
}

h1, h2, h3, h4, h5 {
    font-family: 'GothamBlack', sans-serif !important;
}

/* ========================================
   BASE
======================================== */
body {
    font-family: 'Segoe UI', sans-serif;
    background: #f5f7fb;
    overflow-x: hidden;
    padding-top: calc(38px + 70px);
}

/* ========================================
   TOPBAR
======================================== */
.topbar {
    background: linear-gradient(
        90deg,
        #1C145C 0%,
        #34258d 50%,
        #1C145C 100%
    );
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 38px;
    z-index: 9999;
    display: flex;
    align-items: center;
}

.topbar .container {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.topbar-info {
    display: flex;
    align-items: center;
    gap: 14px;
    flex-wrap: nowrap;
}

.topbar-info span {
    color: rgba(255, 255, 255, .88);
    font-size: 12px;
    display: flex;
    align-items: center;
    gap: 6px;
    white-space: nowrap;
}

.topbar-info i {
    font-size: 11px;
    opacity: .8;
}

.topbar-social {
    display: flex;
    align-items: center;
    gap: 12px;
}

.topbar-social a {
    color: rgba(255, 255, 255, .75);
    font-size: 14px;
    text-decoration: none;
    display: flex;
    align-items: center;
    transition: .2s;
}

.topbar-social a:hover {
    color: #fff;
    transform: translateY(-1px);
}

/* ========================================
   FLOAT WRAP
======================================== */
.navbar-float-wrap {
    position: fixed;
    top: 38px;
    left: 0;
    width: 100%;
    z-index: 9998;
    padding: 12px 20px;
}

/* ========================================
   NAVBAR FLOAT — GLASS
======================================== */
.navbar-float {
    max-width: 1200px;
    margin: 0 auto;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    padding: 10px 14px 10px 22px;
    border-radius: 60px;

    background: rgba(255, 255, 255, 0.07);
    backdrop-filter: blur(22px) saturate(180%);
    -webkit-backdrop-filter: blur(22px) saturate(180%);
    border: 1px solid rgba(255, 255, 255, 0.16);
    box-shadow:
        0 8px 32px rgba(15, 23, 42, .08),
        inset 0 1px 0 rgba(255, 255, 255, .22);

    transition: background .3s ease, border .3s ease, box-shadow .3s ease;
}

.navbar-float.scrolled {
    background: rgba(255, 255, 255, .14);
    backdrop-filter: blur(26px) saturate(200%);
    -webkit-backdrop-filter: blur(26px) saturate(200%);
    border: 1px solid rgba(255, 255, 255, .22);
    box-shadow:
        0 10px 40px rgba(15, 23, 42, .10),
        inset 0 1px 0 rgba(255, 255, 255, .28);
}

.navbar-float::before {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: inherit;
    background: linear-gradient(
        180deg,
        rgba(255, 255, 255, .20),
        rgba(255, 255, 255, .02)
    );
    pointer-events: none;
}

/* ========================================
   LOGO
======================================== */
.nav-logo {
    position: relative;
    z-index: 2;
}

.navbar-float .nav-logo img {
    height: 38px;
    object-fit: contain;
    display: block;
}

/* ========================================
   NAV LINKS
======================================== */
.nav-links {
    display: flex;
    align-items: center;
    justify-content: center;
    flex: 1;
    gap: 2px;
    position: relative;
    z-index: 2;
}

.nav-link-pill {
    padding: 8px 15px;
    border-radius: 50px;
    font-size: 14px;
    font-weight: 500;
    color: #0f172a;
    text-decoration: none;
    white-space: nowrap;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    transition: background .2s, color .2s, transform .2s;
}

.nav-link-pill:hover {
    background: rgba(255, 255, 255, .25);
    color: #1C145C;
    transform: translateY(-1px);
}

.nav-link-pill.active {
    background: rgba(255, 255, 255, .35);
    color: #1C145C;
    font-weight: 600;
    box-shadow:
        inset 0 1px 0 rgba(255, 255, 255, .4),
        0 4px 10px rgba(255, 255, 255, .12);
}

/* ========================================
   DROPDOWN
======================================== */
.drop-wrap {
    position: relative;
}

.drop-menu {
    position: absolute;
    top: calc(100% + 12px);
    left: 50%;
    transform: translateX(-50%) translateY(8px);
    min-width: 180px;
    padding: 8px;
    border-radius: 22px;
    background: rgba(255, 255, 255, .70);
    backdrop-filter: blur(24px);
    -webkit-backdrop-filter: blur(24px);
    border: 1px solid rgba(255, 255, 255, .35);
    box-shadow: 0 12px 35px rgba(15, 23, 42, .12);
    opacity: 0;
    visibility: hidden;
    transition: .22s ease;
    z-index: 100;
}

.drop-wrap:hover .drop-menu {
    opacity: 1;
    visibility: visible;
    transform: translateX(-50%) translateY(0);
}

.drop-item {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 14px;
    border-radius: 14px;
    font-size: 14px;
    color: #334155;
    text-decoration: none;
    transition: .18s;
}

.drop-item:hover {
    background: rgba(255, 255, 255, .55);
    color: #1C145C;
}

.chevron {
    font-size: 11px;
    opacity: .6;
    transition: .25s;
}

.drop-wrap:hover .chevron {
    transform: rotate(180deg);
}

/* ========================================
   CTA BUTTON
======================================== */
.nav-cta {
    position: relative;
    z-index: 2;
}

.btn-kontak {
    padding: 10px 22px;
    border-radius: 50px;
    background: #1C145C;
    color: #fff !important;
    text-decoration: none !important;
    font-size: 14px;
    font-weight: 600;
    display: inline-block;
    border: none;
    box-shadow: 0 8px 20px rgba(28, 20, 92, .25);
    transition: .2s;
}

.btn-kontak:hover {
    background: #2a1e8a;
    transform: translateY(-1px);
}

/* ========================================
   BURGER
======================================== */
.nav-burger {
    display: none;
    flex-direction: column;
    gap: 5px;
    cursor: pointer;
    border: none;
    background: transparent;
    padding: 6px;
    position: relative;
    z-index: 1000;
}

.nav-burger span {
    width: 22px;
    height: 2px;
    background: #1C145C;
    border-radius: 2px;
    display: block;
    transition: .3s;
}

.nav-burger.open span:nth-child(1) {
    transform: translateY(7px) rotate(45deg);
}

.nav-burger.open span:nth-child(2) {
    opacity: 0;
}

.nav-burger.open span:nth-child(3) {
    transform: translateY(-7px) rotate(-45deg);
}

/* ========================================
   MOBILE MENU — SOLID GLASS
======================================== */
.mobile-menu {
    display: none;
    position: absolute;
    top: calc(100% + 12px);
    left: 0;
    right: 0;
    padding: 10px;
    border-radius: 26px;

    /* SOLID — nav link terbaca jelas */
    background: rgba(255, 255, 255, 0.92);
    backdrop-filter: blur(24px);
    -webkit-backdrop-filter: blur(24px);
    border: 1px solid rgba(255, 255, 255, 0.5);
    box-shadow: 0 14px 40px rgba(15, 23, 42, .15);

    z-index: 999;
}

.mobile-menu.open {
    display: block;
}

.m-link {
    display: block;
    padding: 13px 16px;
    border-radius: 14px;
    color: #1e293b;
    text-decoration: none;
    font-size: 15px;
    font-weight: 500;
    transition: .18s;
}

.m-link:hover,
.m-link.active {
    background: rgba(28, 20, 92, 0.07);
    color: #1C145C;
}

.m-group-label {
    font-size: 11px;
    font-weight: 700;
    color: #94a3b8;
    letter-spacing: .8px;
    text-transform: uppercase;
    padding: 12px 16px 6px;
}

.m-sub {
    padding-left: 6px;
}

.mobile-menu .btn-kontak {
    display: block;
    width: 100%;
    text-align: center;
    margin-top: 10px;
    border-radius: 16px;
    box-sizing: border-box;
}

/* ========================================
   RESPONSIVE
======================================== */
@media (max-width: 1100px) {
    .nav-link-pill {
        padding: 7px 11px;
        font-size: 13px;
    }
}

@media (max-width: 991px) {
    body {
        padding-top: calc(38px + 64px);
    }

    .navbar-float-wrap {
        padding: 10px 12px;
    }

    .navbar-float {
        border-radius: 26px;
        padding: 10px 14px;
    }

    .nav-links,
    .nav-cta {
        display: none;
    }

    .nav-burger {
        display: flex;
    }

    .topbar-info span {
        font-size: 10px;
    }

    .topbar-social {
        gap: 10px;
    }
}

@media (max-width: 480px) {
    .topbar .container {
        gap: 8px;
    }

    .topbar-info {
        gap: 8px;
    }

    .topbar-info span {
        font-size: 9px;
    }

    .topbar-social a {
        font-size: 12px;
    }

    .navbar-float {
        border-radius: 22px;
    }
}
</style>


<!-- ========================================
     TOPBAR
======================================== -->
<div class="topbar">
    <div class="container">

        <div class="topbar-info">
            <span>
                <i class="bi bi-telephone-fill"></i>
                0834325542
            </span>

            <span>
                <i class="bi bi-envelope-fill"></i>
                allam.medica@yahoo.co.id
            </span>
        </div>

        <div class="topbar-social">
            <a href="https://www.tiktok.com/@rsuallammedicabumiayu?_t=8fLMQk9idhI&_r=1"
               target="_blank">
                <i class="bi bi-tiktok"></i>
            </a>

            <a href="https://www.facebook.com/allam.medicabmy?mibextid=LQQJ4d"
               target="_blank">
                <i class="bi bi-facebook"></i>
            </a>

            <a href="https://www.instagram.com/allam.medica/"
               target="_blank">
                <i class="bi bi-instagram"></i>
            </a>
        </div>

    </div>
</div>


<!-- ========================================
     FLOATING NAVBAR
======================================== -->
<div class="navbar-float-wrap">

    <nav class="navbar-float" id="mainNavbar">

        <!-- LOGO -->
        <a href="/" class="nav-logo">
            <img src="{{ asset('images/beranda/logo-almed.png') }}" alt="RSU Allam Medica">
        </a>

        <!-- DESKTOP MENU -->
        <div class="nav-links">

            <a href="/"
               class="nav-link-pill {{ request()->is('/') ? 'active' : '' }}">
                Beranda
            </a>

            <div class="drop-wrap">

                <a href="#"
                   class="nav-link-pill {{ request()->is('karir*','berita*','video*') ? 'active' : '' }}">
                    Menu
                    <i class="bi bi-chevron-down chevron"></i>
                </a>

                <div class="drop-menu">

                    <a href="{{ url('/karir') }}" class="drop-item">
                        <i class="bi bi-briefcase"></i>
                        Karir
                    </a>

                    <a href="{{ url('/berita') }}" class="drop-item">
                        <i class="bi bi-newspaper"></i>
                        Berita
                    </a>

                    <a href="{{ url('/video') }}" class="drop-item">
                        <i class="bi bi-play-circle"></i>
                        Video
                    </a>

                </div>
            </div>

            <a href="/layanan"
               class="nav-link-pill {{ request()->is('layanan*') ? 'active' : '' }}">
                Layanan
            </a>

            <a href="/artikel"
               class="nav-link-pill {{ request()->is('artikel*') ? 'active' : '' }}">
                Artikel
            </a>

            <a href="/download"
               class="nav-link-pill {{ request()->is('download*') ? 'active' : '' }}">
                Download
            </a>

            <a href="/tentang"
               class="nav-link-pill {{ request()->is('tentang*') ? 'active' : '' }}">
                Tentang Kami
            </a>

            <a href="/mutu"
               class="nav-link-pill {{ request()->is('mutu*') ? 'active' : '' }}">
                Mutu
            </a>

        </div>

        <!-- CTA -->
        <div class="nav-cta">
            <a href="/kontak" class="btn-kontak">
                Kontak
            </a>
        </div>

        <!-- BURGER -->
        <button class="nav-burger"
                id="navBurger"
                aria-label="Toggle menu">

            <span></span>
            <span></span>
            <span></span>

        </button>

        <!-- MOBILE MENU -->
        <div class="mobile-menu" id="mobileMenu">

            <a href="/"
               class="m-link {{ request()->is('/') ? 'active' : '' }}">
                Beranda
            </a>

            <div class="m-group-label">
                Menu
            </div>

            <div class="m-sub">

                <a href="{{ url('/karir') }}"
                   class="m-link {{ request()->is('karir*') ? 'active' : '' }}">
                    Karir
                </a>

                <a href="{{ url('/berita') }}"
                   class="m-link {{ request()->is('berita*') ? 'active' : '' }}">
                    Berita
                </a>

                <a href="{{ url('/video') }}"
                   class="m-link {{ request()->is('video*') ? 'active' : '' }}">
                    Video
                </a>

            </div>

            <a href="/layanan"
               class="m-link {{ request()->is('layanan*') ? 'active' : '' }}">
                Layanan
            </a>

            <a href="/artikel"
               class="m-link {{ request()->is('artikel*') ? 'active' : '' }}">
                Artikel
            </a>

            <a href="/download"
               class="m-link {{ request()->is('download*') ? 'active' : '' }}">
                Download
            </a>

            <a href="/tentang"
               class="m-link {{ request()->is('tentang*') ? 'active' : '' }}">
                Tentang Kami
            </a>

            <a href="/mutu"
               class="m-link {{ request()->is('mutu*') ? 'active' : '' }}">
                Mutu
            </a>

            <a href="/kontak" class="btn-kontak">
                Kontak
            </a>

        </div>

    </nav>

</div>


<!-- ========================================
     SCRIPT
======================================== -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    const burger = document.getElementById('navBurger');
    const menu   = document.getElementById('mobileMenu');
    const navbar = document.getElementById('mainNavbar');

    // Toggle mobile menu
    burger.addEventListener('click', function (e) {

        e.stopPropagation();

        burger.classList.toggle('open');
        menu.classList.toggle('open');

    });

    // Klik di luar navbar = tutup menu
    document.addEventListener('click', function (e) {

        if (!navbar.contains(e.target)) {

            burger.classList.remove('open');
            menu.classList.remove('open');

        }

    });

    // Efek scroll navbar
    window.addEventListener('scroll', function () {

        if (window.scrollY > 10) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }

    }, { passive: true });

});
</script>

</body>

<style>
body{
    padding-top: 37px;
}

.loker-section{
    padding:85px 0 10px;
    background:#fff;
}

.loker-wrap{
    max-width: 900px;
}

.loker-label{
    font-size:12px;
    font-weight:600;
    color:#888;
    letter-spacing:2px;
    text-transform:uppercase;
}

.loker-heading{
    font-size:32px;
    font-weight:800;
    color:#1C145C;
    margin:10px 0;
}

.loker-desc{
    font-size:14px;
    color:#444;
    line-height:1.6;
}

/* ================= CARD FIX ================= */
.loker-card{
    border:1px solid #eee;
    border-radius:20px;
    overflow:hidden;
    background:#fff;
    height:100%;
    display:flex;
    flex-direction:column;
}

/* IMAGE WRAPPER (INI YANG BENER) */
.loker-img{
    width:100%;
    height:180px;
    overflow:hidden;
    background:#f5f5f5;
}

.loker-img img{
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
}

/* BODY */
.loker-body{
    padding:15px;
    text-align:center;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
    flex:1;
}

/* BUTTON */
.btn-loker{
    display:inline-block;
    margin-top:10px;
    padding:6px 12px;
    background:#1C145C;
    color:#fff;
    text-decoration:none;
    border-radius:20px;
    font-size:12px;
}
</style>

<section class="loker-section">
    <div class="container">
        <div class="loker-wrap">

            <span class="loker-label">Karir RSU Allam Medica</span>

            <h2 class="loker-heading">
                Lowongan Kerja Terbaru
            </h2>

            <p class="loker-desc">
                Temukan peluang karir terbaik dan bergabunglah bersama tim profesional kami.
            </p>

        </div>
    </div>
</section>

<section style="background:#fff; padding:50px 0;">
    <div class="container">
        <div class="row g-4">

        @foreach($lokers as $item)

        <div class="col-md-3 col-12">
            <div style="
                border:1px solid #eee;
                border-radius:20px;
                overflow:hidden;
                background:#fff;
                height:100%;
            ">

                <img src="{{ asset('storage/'.$item->gambar) }}"
                     style="width:100%; height:auto; display:block;">

                <div style="padding:15px; text-align:center;">

                    <h6 class="fw-bold">
                        {{ $item->judul }}
                    </h6>

                    <p style="font-size:13px; color:#666;">
                        {{ \Illuminate\Support\Str::limit($item->deskripsi, 90) }}
                    </p>

                    <!-- FIXED ROUTE -->
                    <a href="{{ route('karir.detail', $item->id) }}"
                    style="
                            display:inline-block;
                            margin-top:8px;
                            padding:6px 12px;
                            background:#1C145C;
                            color:white;
                            text-decoration:none;
                            border-radius:20px;
                            font-size:12px;
                    ">
                        Lihat Detail
                    </a>

                </div>
            </div>
        </div>

        @endforeach

        </div>
    </div>
</section>

<style>
/* ================= FONT GOTHAM BLACK ================= */
@font-face {
    font-family: 'Gotham';
    src: url('{{ asset('fonts/Gotham-Black.otf') }}') format('opentype');
    font-weight: 900;
    font-style: normal;
    font-display: swap;
}

/* ================= FADE BAWAH SECTION SLIDER KE FOOTER ================= */
.section-partner {
    position: relative;
    background: #ffffff;
    padding-bottom: 0;
}

.section-partner::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 80px;
    background: linear-gradient(to bottom, rgba(255,255,255,0), #ffffff);
    pointer-events: none;
    z-index: 1;
}

/* ================= FOOTER RSU ALLAM MEDICA ================= */
.footer-rsu {
    background: linear-gradient(
        to bottom,
        #ffffff  0%,
        #fefefd  3%,
        #fdfcf6  8%,
        #fcfbf3  13%,
        #faf8ee  20%,
        #f7f5e8  30%,
        #f3f0e1  45%,
        #ede9d9  65%,
        #e8e3d2  85%,
        #e3deca  100%
    );
    color: #1C145C;
    padding: 56px 0 0;
    position: relative;
    overflow: hidden;
}

.footer-rsu .footer-ornament {
    position: absolute;
    right: -80px;
    bottom: -150px; /* diturunkan */
    width: 420px;
    height: 420px;
    opacity: 0.07;
    background-image: url('{{ asset('images/beranda/ornamen.png') }}');
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    pointer-events: none;
    z-index: 0;
}

.footer-rsu .footer-ornament2 {
    position: absolute;
    left: -100px;
    top: 40px; /* sebelumnya -80px */
    width: 340px;
    height: 340px;
    opacity: 0.04;
    background-image: url('{{ asset('images/beranda/ornamen.png') }}');
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    pointer-events: none;
    z-index: 0;
}

.footer-rsu .container-fluid {
    max-width: 1100px;
    position: relative;
    z-index: 1;
}

/* ================= LOGO ================= */
.footer-rsu .footer-logo {
    height: 50px;
    display: block;
    margin-bottom: 16px;
}

/* ================= BRAND ================= */
.footer-rsu .footer-title {
    font-size: 16px;
    font-weight: 700;
    color: #1C145C;
    margin-bottom: 8px;
}

.footer-rsu .footer-desc {
    font-size: 13px;
    line-height: 1.8;
    color: #5a5480;
    margin-bottom: 20px;
    max-width: 290px;
}

/* ================= SOSIAL ================= */
.footer-rsu .footer-social {
    display: flex;
    gap: 10px;
    margin-bottom: 22px;
}

.footer-rsu .footer-social a {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: rgba(28, 20, 92, 0.07);
    border: 1px solid rgba(28, 20, 92, 0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #1C145C;
    text-decoration: none;
    font-size: 15px;
    transition: .2s ease;
}

.footer-rsu .footer-social a:hover {
    background: #1C145C;
    color: #FEFCF1;
    transform: translateY(-2px);
}

/* ================= MITRA ================= */
.footer-rsu .footer-mitra-label {
    font-size: 11px;
    color: #9994bb;
    text-transform: uppercase;
    letter-spacing: .08em;
    margin-bottom: 10px;
}

.footer-rsu .footer-mitra {
    display: flex;
    gap: 10px;
    align-items: center;
    flex-wrap: wrap;
}

.footer-rsu .footer-mitra img:nth-child(1) { height: 35px; }
.footer-rsu .footer-mitra img:nth-child(2) { height: 26px; }

/* ================= HEADING KOLOM ================= */
.footer-rsu .footer-heading {
    font-family: 'Gotham', 'Arial Black', sans-serif;
    font-weight: 900;
    font-size: 12px;
    color: #1C145C;
    text-transform: uppercase;
    letter-spacing: .14em;
    margin-bottom: 16px;
    padding-bottom: 10px;
    border-bottom: 1.5px solid rgba(28, 20, 92, 0.12);
}

/* ================= LINKS ================= */
.footer-rsu ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-rsu ul li {
    margin-bottom: 9px;
}

.footer-rsu a {
    color: #5a5480;
    text-decoration: none;
    font-size: 13.5px;
    transition: .2s ease;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

.footer-rsu ul li a::before {
    content: '›';
    color: #1C145C;
    opacity: .4;
    font-size: 15px;
    line-height: 1;
}

.footer-rsu a:hover {
    color: #1C145C;
    padding-left: 3px;
}

/* ================= KONTAK ================= */
.footer-rsu .footer-contact-row {
    display: flex;
    align-items: flex-start;
    gap: 11px;
    margin-bottom: 13px;
}

.footer-rsu .footer-contact-icon {
    width: 33px;
    height: 33px;
    border-radius: 8px;
    background: rgba(28, 20, 92, 0.07);
    border: 1px solid rgba(28, 20, 92, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    color: #1C145C;
    flex-shrink: 0;
}

.footer-rsu .footer-contact-text {
    font-size: 13px;
    color: #5a5480;
    line-height: 1.65;
    padding-top: 4px;
}

/* ================= DIVIDER ================= */
.footer-rsu hr {
    height: 1px;
    background: linear-gradient(90deg,
        rgba(28,20,92,0) 0%,
        rgba(28,20,92,0.12) 30%,
        rgba(28,20,92,0.12) 70%,
        rgba(28,20,92,0) 100%
    );
    border: none;
    margin: 36px 0 0;
}

/* ================= BOTTOM BAR ================= */
.footer-rsu .footer-bottom {
    background: rgba(28, 20, 92, 0.05);
    padding: 15px 36px;
    position: relative;
    z-index: 1;
}

.footer-rsu .footer-copy {
    font-size: 12.5px;
    color: #9994bb;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
}

.footer-rsu .footer-copy-badge {
    background: rgba(28, 20, 92, 0.06);
    border: 1px solid rgba(28, 20, 92, 0.12);
    border-radius: 20px;
    padding: 4px 14px;
    font-size: 11.5px;
    color: #7a74a0;
    white-space: nowrap;
}

.footer-rsu .footer-accent-dot {
    display: inline-block;
    width: 3px;
    height: 3px;
    border-radius: 50%;
    background: #1C145C;
    opacity: .25;
    margin: 0 8px;
    vertical-align: middle;
}

/* ================= TABLET ================= */
@media (max-width: 991px) {
    .footer-rsu {
        padding: 45px 0 0;
    }

    .footer-rsu .row > div {
        margin-bottom: 28px;
    }

    .footer-rsu .footer-desc {
        max-width: 100%;
    }
}

/* ================= MOBILE ================= */
@media (max-width: 767px) {
    .footer-rsu {
        padding: 40px 0 0;
    }

    .footer-rsu .container-fluid {
        padding-left: 20px !important;
        padding-right: 20px !important;
    }

    .footer-rsu .footer-social,
    .footer-rsu .footer-mitra {
        justify-content: flex-start;
    }

    .footer-rsu .footer-copy {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }

    .footer-rsu .footer-bottom {
        padding: 15px 20px;
    }

    .footer-rsu a:hover {
        padding-left: 0;
    }
}
</style>

<!-- FOOTER -->
<footer class="footer-rsu">

    {{-- Ornamen watermark --}}
    <div class="footer-ornament"></div>
    <div class="footer-ornament2"></div>

    <div class="container-fluid px-lg-5 px-4">

        <div class="row justify-content-between">

            <!-- BRAND / LOGO -->
            <div class="col-lg-4 col-md-6">

                <img src="{{ asset('images/beranda/logo-almed.png') }}"
                     class="footer-logo" alt="Logo RSU Allam Medica">

                <h5 class="footer-title">RSU Allam Medica Bumiayu</h5>

                <p class="footer-desc">
                    Jl. Pangeran Diponegoro No. 609, Jatisawit, Bumiayu,
                    Kabupaten Brebes, Jawa Tengah 52273
                </p>

                <!-- SOSIAL -->
                <div class="footer-social">
                    <a href="https://www.tiktok.com/@rsuallammedicabumiayu?_t=8fLMQk9idhI&_r=1" target="_blank" title="TikTok">
                        <i class="bi bi-tiktok"></i>
                    </a>
                    <a href="https://www.facebook.com/allam.medicabmy?mibextid=LQQJ4d" target="_blank" title="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://www.instagram.com/allam.medica/" target="_blank" title="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                </div>

                <!-- MITRA -->
                <div class="footer-mitra-label">Akreditasi & Mitra</div>
                <div class="footer-mitra">
                    <img src="{{ asset('images/beranda/paripurna.png') }}" alt="Akreditasi Paripurna">
                    <img src="{{ asset('images/beranda/bpjs.png') }}" alt="BPJS Kesehatan">
                </div>

            </div>

            <!-- TAUTAN CEPAT -->
            <div class="col-lg-2 col-md-6">

                <h6 class="footer-heading">Tautan Cepat</h6>

                <ul>
                    <li><a href="{{ route('beranda') }}">Beranda</a></li>
                    <li><a href="layanan">Layanan</a></li>
                    <li><a href="artikel">Artikel</a></li>
                    <li><a href="download">Download</a></li>
                    <li><a href="tentang">Tentang Kami</a></li>
                    <li><a href="kontak">Kontak</a></li>
                </ul>

            </div>

            <!-- MENU -->
            <div class="col-lg-2 col-md-6">

                <h6 class="footer-heading">Menu</h6>

                <ul>
                    <li><a href="video">Video</a></li>
                    <li><a href="karir">Karir</a></li>
                    <li><a href="berita">Berita</a></li>
                </ul>

            </div>

            <!-- HUBUNGI KAMI -->
            <div class="col-lg-3 col-md-12">

                <h6 class="footer-heading">Hubungi Kami</h6>

                <div class="footer-contact-row">
                    <div class="footer-contact-icon">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <div class="footer-contact-text">(0289) 430822</div>
                </div>

                <div class="footer-contact-row">
                    <div class="footer-contact-icon">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <div class="footer-contact-text">allam.medica@yahoo.co.id</div>
                </div>

                <div class="footer-contact-row">
                    <div class="footer-contact-icon">
                        <i class="bi bi-clock-fill"></i>
                    </div>
                    <div class="footer-contact-text">
                        IGD: 24 Jam<br>
                        Rawat Jalan: Sen – Sab 07.00 – 21.00
                    </div>
                </div>

                <div class="footer-contact-row">
                    <div class="footer-contact-icon">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <div class="footer-contact-text">
                        Jl. Pangeran Diponegoro No.609,<br>
                        Bumiayu, Brebes
                    </div>
                </div>

            </div>

        </div>

        <hr>

    </div>

    <!-- BOTTOM BAR -->
    <div class="footer-bottom">
        <div class="container-fluid px-lg-5 px-4">
            <div class="footer-copy">
                <span>
                    © 2026 RSU Allam Medica
                    <span class="footer-accent-dot"></span>
                    Hak Cipta Dilindungi
                </span>
                <span class="footer-copy-badge">Melayani dengan Sepenuh Hati</span>
            </div>
        </div>
    </div>

</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</html>