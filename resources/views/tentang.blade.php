<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>RSU Allam Medica - Beranda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


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
    background: linear-gradient(90deg, #1C145C 0%, #34258d 50%, #1C145C 100%);
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 38px;
    z-index: 10000;
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
    background: linear-gradient(180deg, rgba(255, 255, 255, .20), rgba(255, 255, 255, .02));
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
   NAV LINKS (Desktop)
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
   DROPDOWN (Desktop)
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
    z-index: 2;
}

.nav-burger span {
    width: 22px;
    height: 2px;
    background: #1C145C;
    border-radius: 2px;
    display: block;
    transition: .3s;
}

.nav-burger.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
.nav-burger.open span:nth-child(2) { opacity: 0; }
.nav-burger.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

/* ========================================
   OVERLAY
======================================== */
.nav-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(15, 23, 42, 0);
    z-index: 9999990;
    transition: background .3s ease;
}

.nav-overlay.show {
    display: block;
    background: rgba(15, 23, 42, 0.42);
}

/* ========================================
   SIDE DRAWER (Mobile)
======================================== */
.nav-drawer {
    position: fixed;
    top: 0;
    right: 0;
    width: 62%;
    max-width: 280px;
    height: 100dvh;
    z-index: 9999995;
    transform: translateX(100%);
    transition: transform .32s cubic-bezier(.4, 0, .2, 1);

    background: rgba(255, 255, 255, 0.88);
    backdrop-filter: blur(24px) saturate(180%);
    -webkit-backdrop-filter: blur(24px) saturate(180%);
    border-left: 1px solid rgba(255, 255, 255, 0.45);
    box-shadow: -8px 0 32px rgba(15, 23, 42, .12);

    display: flex;
    flex-direction: column;
    overflow-y: auto;
    overscroll-behavior: contain;
}

.nav-drawer.open {
    transform: translateX(0);
}

/* DRAWER HEADER */
.drawer-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 16px 14px;
    border-bottom: 1px solid rgba(0, 0, 0, .07);
    flex-shrink: 0;
}

.drawer-label {
    font-size: 11px;
    font-weight: 700;
    color: #94a3b8;
    letter-spacing: .8px;
    text-transform: uppercase;
}

.drawer-close-btn {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: rgba(28, 20, 92, .08);
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #1C145C;
    cursor: pointer;
    font-size: 14px;
    transition: .2s;
}

.drawer-close-btn:hover {
    background: rgba(28, 20, 92, .14);
}

/* DRAWER NAV */
.drawer-nav {
    flex: 1;
    padding: 10px;
    display: flex;
    flex-direction: column;
    gap: 2px;
    overflow-y: auto;
}

.d-link {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 12px;
    border-radius: 12px;
    font-size: 14px;
    font-weight: 500;
    color: #1e293b;
    text-decoration: none;
    transition: .16s;
}

.d-link:hover {
    background: rgba(28, 20, 92, .06);
    color: #1C145C;
    text-decoration: none;
}

.d-link.active {
    background: rgba(28, 20, 92, .09);
    color: #1C145C;
    font-weight: 600;
}

.d-icon {
    width: 22px;
    height: 22px;
    border-radius: 7px;
    background: rgba(28, 20, 92, .08);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    color: #1C145C;
    flex-shrink: 0;
    transition: .16s;
}

.d-link.active .d-icon {
    background: #1C145C;
    color: #fff;
}

.d-group-label {
    font-size: 10px;
    font-weight: 700;
    color: #94a3b8;
    letter-spacing: .7px;
    text-transform: uppercase;
    padding: 12px 12px 4px;
}

.d-sub {
    padding-left: 6px;
}

.d-divider {
    height: 1px;
    background: rgba(0, 0, 0, .07);
    margin: 6px 2px;
}

/* DRAWER FOOTER */
.drawer-footer {
    padding: 12px 14px 24px;
    border-top: 1px solid rgba(0, 0, 0, .07);
    flex-shrink: 0;
}

.drawer-footer .btn-kontak {
    border-radius: 14px;
    display: block;
    text-align: center;
    padding: 12px 22px;
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
            <a href="https://www.tiktok.com/@rsuallammedicabumiayu?_t=8fLMQk9idhI&_r=1" target="_blank">
                <i class="bi bi-tiktok"></i>
            </a>
            <a href="https://www.facebook.com/allam.medicabmy?mibextid=LQQJ4d" target="_blank">
                <i class="bi bi-facebook"></i>
            </a>
            <a href="https://www.instagram.com/allam.medica/" target="_blank">
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

            <a href="/" class="nav-link-pill {{ request()->is('/') ? 'active' : '' }}">
                Beranda
            </a>

            <div class="drop-wrap">
                <a href="#" class="nav-link-pill {{ request()->is('karir*','berita*','video*') ? 'active' : '' }}">
                    Menu
                    <i class="bi bi-chevron-down chevron"></i>
                </a>
                <div class="drop-menu">
                    <a href="{{ url('/karir') }}" class="drop-item">
                        <i class="bi bi-briefcase"></i> Karir
                    </a>
                    <a href="{{ url('/berita') }}" class="drop-item">
                        <i class="bi bi-newspaper"></i> Berita
                    </a>
                    <a href="{{ url('/video') }}" class="drop-item">
                        <i class="bi bi-play-circle"></i> Video
                    </a>
                </div>
            </div>

            <a href="/layanan" class="nav-link-pill {{ request()->is('layanan*') ? 'active' : '' }}">
                Layanan
            </a>

            <a href="/artikel" class="nav-link-pill {{ request()->is('artikel*') ? 'active' : '' }}">
                Artikel
            </a>

            <a href="/download" class="nav-link-pill {{ request()->is('download*') ? 'active' : '' }}">
                Download
            </a>

            <a href="/tentang" class="nav-link-pill {{ request()->is('tentang*') ? 'active' : '' }}">
                Tentang Kami
            </a>

            <a href="/mutu" class="nav-link-pill {{ request()->is('mutu*') ? 'active' : '' }}">
                Mutu
            </a>

        </div>

        <!-- CTA -->
        <div class="nav-cta">
            <a href="/kontak" class="btn-kontak">Kontak</a>
        </div>

        <!-- BURGER -->
        <button class="nav-burger" id="navBurger" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </button>

    </nav>

</div>


<!-- ========================================
     OVERLAY
======================================== -->
<div class="nav-overlay" id="navOverlay"></div>


<!-- ========================================
     SIDE DRAWER (Mobile)
======================================== -->
<aside class="nav-drawer" id="navDrawer" aria-label="Mobile navigation">

    <div class="drawer-header">
        <span class="drawer-label">Menu</span>
        <button class="drawer-close-btn" id="drawerClose" aria-label="Tutup menu">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <nav class="drawer-nav">

        <a href="/" class="d-link {{ request()->is('/') ? 'active' : '' }}">
            <span class="d-icon"><i class="bi bi-house"></i></span>
            Beranda
        </a>

        <div class="d-group-label">Konten</div>
        <div class="d-sub">
            <a href="{{ url('/karir') }}" class="d-link {{ request()->is('karir*') ? 'active' : '' }}">
                <span class="d-icon"><i class="bi bi-briefcase"></i></span> Karir
            </a>
            <a href="{{ url('/berita') }}" class="d-link {{ request()->is('berita*') ? 'active' : '' }}">
                <span class="d-icon"><i class="bi bi-newspaper"></i></span> Berita
            </a>
            <a href="{{ url('/video') }}" class="d-link {{ request()->is('video*') ? 'active' : '' }}">
                <span class="d-icon"><i class="bi bi-play-circle"></i></span> Video
            </a>
        </div>

        <div class="d-divider"></div>

        <a href="/layanan" class="d-link {{ request()->is('layanan*') ? 'active' : '' }}">
            <span class="d-icon"><i class="bi bi-hospital"></i></span> Layanan
        </a>
        <a href="/artikel" class="d-link {{ request()->is('artikel*') ? 'active' : '' }}">
            <span class="d-icon"><i class="bi bi-journal-text"></i></span> Artikel
        </a>
        <a href="/download" class="d-link {{ request()->is('download*') ? 'active' : '' }}">
            <span class="d-icon"><i class="bi bi-download"></i></span> Download
        </a>
        <a href="/tentang" class="d-link {{ request()->is('tentang*') ? 'active' : '' }}">
            <span class="d-icon"><i class="bi bi-info-circle"></i></span> Tentang Kami
        </a>
        <a href="/mutu" class="d-link {{ request()->is('mutu*') ? 'active' : '' }}">
            <span class="d-icon"><i class="bi bi-patch-check"></i></span> Mutu
        </a>

    </nav>

    <div class="drawer-footer">
        <a href="/kontak" class="btn-kontak">Kontak</a>
    </div>

</aside>


<!-- ========================================
     SCRIPT
======================================== -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    const burger     = document.getElementById('navBurger');
    const drawer     = document.getElementById('navDrawer');
    const overlay    = document.getElementById('navOverlay');
    const closeBtn   = document.getElementById('drawerClose');
    const navbar     = document.getElementById('mainNavbar');
    const floatingBar = document.querySelector('.floating-bar');

    function openDrawer() {
        burger.classList.add('open');
        drawer.classList.add('open');
        overlay.classList.add('show');
        document.body.style.overflow = 'hidden';
        if (floatingBar) floatingBar.style.display = 'none';
    }

    function closeDrawer() {
        burger.classList.remove('open');
        drawer.classList.remove('open');
        overlay.classList.remove('show');
        document.body.style.overflow = '';
        if (floatingBar) floatingBar.style.display = '';
    }

    burger.addEventListener('click', function (e) {
        e.stopPropagation();
        drawer.classList.contains('open') ? closeDrawer() : openDrawer();
    });

    closeBtn.addEventListener('click', closeDrawer);
    overlay.addEventListener('click', closeDrawer);

    // Tutup drawer saat link diklik
    drawer.querySelectorAll('.d-link').forEach(function (link) {
        link.addEventListener('click', closeDrawer);
    });

    // Scroll effect navbar
    window.addEventListener('scroll', function () {
        navbar.classList.toggle('scrolled', window.scrollY > 10);
    }, { passive: true });

});
</script>


<!-- sub Hero Section -->
<style>
body {
    margin: 0;
    padding: 0;
    background: #fff !important;
}
</style>

<!-- HERO -->
<section style="
    position: relative;
    background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
    url('{{ asset('images/beranda/soretentangkami.png') }}') center/cover no-repeat;
    height: 80vh;
    color: white;
    overflow: hidden;
">

    <div class="container d-flex align-items-center h-100">
        <div class="row w-100">
            <div class="col-md-6 text-start">
                <h1 class="fw-bold">RSU Allam Medica Bumiayu</h1>
                <p>Rumah Sakit Umum terpercaya di Kabupaten Brebes yang telah melayani masyarakat sejak 2012. Berkomitmen menghadirkan layanan kesehatan yang inovatif, handal, dan terpercaya.</p>
            </div>
        </div>
    </div>

    <!-- CURVE (TRANSPARAN - POTONG GAMBAR) -->
    <div style="position:absolute; bottom:-1px; left:0; width:100%; line-height:0;">
        <svg viewBox="0 0 1440 120" xmlns="http://www.w3.org/2000/svg">
            <path fill="#ffffff"
                d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L0,120Z">
            </path>
        </svg>
    </div>

</section>


<style>
/* PROFIL */
.profile-section{
    background:#fff;
    padding:60px 0;
}

.profile-text{
    font-size:15px;
    color:#555;
    line-height:1.7;
    text-align: justify;
    text-justify: inter-word;
}

/* CARD */
.info-card{
    background:#fff;
    border-radius:12px;
    padding:14px;
    box-shadow:0 5px 15px rgba(0,0,0,0.05);
    transition:0.3s;
    display:flex;
    gap:10px;
    align-items:flex-start;
}

.info-card:hover{
    transform:translateY(-4px);
    box-shadow:0 10px 20px rgba(0,0,0,0.08);
}

/* TEXT */
.info-card small{
    font-size:11px;
    color:#888;
}

.info-card b{
    font-size:12.5px;
    font-weight:600;
    color:#333;
    line-height:1.5;
}

/* ICON */
.icon-box{
    width:34px;
    height:34px;
    border-radius:8px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:14px;
}

/* ICON COLOR */
.icon-primary{ background:rgba(28,20,92,0.1); color:#1C145C; }
.icon-success{ background:rgba(40,167,69,0.1); color:#28a745; }
.icon-warning{ background:rgba(255,152,0,0.1); color:#ff9800; }
.icon-danger{ background:rgba(220,53,69,0.1); color:#dc3545; }

/* ================= NILAI MEDICA ================= */
.medica-section{
    padding:60px 0;
    background:#fff;
}

.medica-label{
    font-size:11px;
    color:#888;
    font-weight:600;
    letter-spacing:1.5px;
    text-transform:uppercase;
    display:block;
    margin-bottom:4px;
}

.medica-heading{
    font-size:26px;
    font-weight:800;
    letter-spacing:3px;
    margin-bottom:30px;
}

.medica-card{
    border-radius:14px;
    padding:18px 10px;
    border:2px solid;
    height:100%;
    transition:0.3s;
}

.medica-card:hover{
    transform:translateY(-5px);
    box-shadow:0 10px 20px rgba(0,0,0,0.08);
}

.medica-letter{
    font-size:48px;
    font-weight:900;
    font-style:italic;
    margin-bottom:10px;
}

.medica-name{
    font-size:12px;
    font-weight:700;
    margin-bottom:5px;
}

.medica-desc{
    font-size:11px;
    color:#777;
}

/* WARNA */
.medica-m{ background:#FCEBEB; border-color:#F09595; color:#A32D2D; }
.medica-e{ background:#EEEDFE; border-color:#AFA9EC; color:#3C3489; }
.medica-d{ background:#F1EFE8; border-color:#B4B2A9; color:#444; }
.medica-i{ background:#EAF3DE; border-color:#97C459; color:#27500A; }
.medica-c{ background:#F1EFE8; border-color:#B4B2A9; color:#5F5E5A; }
.medica-a{ background:#FBEAF0; border-color:#ED93B1; color:#72243E; }

/* ================= VISI MISI ================= */
.visi-misi-section { padding: 60px 0; background: #fff; }

.visi-block {
    position: relative;
    border-radius: 16px;
    overflow: hidden;
    margin-bottom: 20px;
    background: #1C145C;
}
.visi-inner {
    display: flex;
    align-items: center;
    gap: 28px;
    padding: 28px 32px;
    position: relative;
    z-index: 1;
}
.visi-icon-box {
    width: 52px; height: 52px;
    border-radius: 14px;
    background: rgba(255,255,255,0.15);
    border: 1px solid rgba(255,255,255,0.2);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    font-size: 22px;
    color: #fff;
}
.visi-label {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: rgba(255,255,255,0.55);
    margin-bottom: 6px;
}
.visi-text {
    font-size: 15px;
    font-weight: 600;
    color: #fff;
    line-height: 1.7;
    margin: 0;
}
.visi-deco {
    position: absolute;
    right: 24px; top: 50%;
    transform: translateY(-50%);
    font-size: 80px;
    font-weight: 900;
    color: rgba(255,255,255,0.05);
    font-family: 'GothamBlack', 'Arial Black', sans-serif;
    pointer-events: none;
    line-height: 1;
    user-select: none;
    z-index: 0;
}

.misi-block {
    border-radius: 16px;
    overflow: hidden;
    border: 1.5px solid #e9ecef;
    background: #fff;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
}
.misi-head {
    display: flex; align-items: center; gap: 14px;
    padding: 18px 28px;
    background: #f8f7fb;
    border-bottom: 1.5px solid #e9ecef;
}
.misi-head-icon {
    width: 40px; height: 40px;
    border-radius: 10px;
    background: rgba(28,20,92,0.10);
    display: flex; align-items: center; justify-content: center;
    font-size: 18px;
    color: #1C145C;
    flex-shrink: 0;
}
.misi-head-title { font-size: 15px; font-weight: 700; color: #1C145C; }
.misi-head-sub   { font-size: 12px; color: #888; margin-top: 1px; }
.misi-count {
    margin-left: auto;
    font-size: 11px; font-weight: 600;
    letter-spacing: 0.06em;
    background: rgba(28,20,92,0.08);
    color: #1C145C;
    padding: 4px 12px;
    border-radius: 999px;
}
.misi-body { padding: 8px 28px 20px; }
.misi-item {
    display: flex; gap: 16px;
    padding: 16px 0;
    border-bottom: 1px solid #f0f0f0;
    align-items: flex-start;
}
.misi-item:last-child { border-bottom: none; }
.misi-num {
    flex-shrink: 0;
    width: 30px; height: 30px;
    border-radius: 8px;
    background: #1C145C;
    color: #fff;
    display: flex; align-items: center; justify-content: center;
    font-size: 12px; font-weight: 700;
    margin-top: 2px;
}
.misi-txt {
    font-size: 14px;
    color: #444;
    line-height: 1.72;
    margin: 0;
    padding-top: 5px;
}

</style>


<!-- ================= PROFIL ================= -->
<section class="profile-section">
<div class="container">

    <div class="row">

        <!-- KIRI -->
        <div class="col-md-7">
            <h4 class="fw-bold mb-3">Profil Rumah Sakit</h4>

            <p class="profile-text">
                RSU Allam Medica Rumah Sakit Umum "Allam Medica" berdiri sejak tahun 2012, didirikan oleh Yayasan Allam Medica Bumiayu. Pada mulanya merupakan klinik pelayanan kesehatan umum dan kebidanan dengan nama Balai Pengobatan dan Rumah Bersalin Allam Medica. Penyelenggaraan rumah sakit sejak tahun 2008 dengan surat izin Bupati Brebes nomor 503.IO/KPT/005/IV/2008 sebagai "Rumah Bersalin" dan surat izin Bupati Brebes nomor 503.IO/KPT/008/IV/2008 sebagai "Balai Pengobatan Allam Medica".
   Sejak 2015 menjadi Rumah Sakit Umum Allam Medica dengan Ijin Operasional tetap dari Bupati Brebes, dan pada 2023 resmi menjadi Rumah Sakit Tipe C.
Didukung sistem keamanan aktif yang ramah bagi pengunjung, dengan pendekatan tenaga keamanan yang profesional dan sistem pemantauan area sepanjang waktu, dilengkapi 38 unit CCTV di setiap sudut strategis.
            </p>

        </div>

        <!-- KANAN -->
        <div class="col-md-5">

            <div class="mb-3 info-card">
                <div class="icon-box icon-primary">
                    <i class="bi bi-file-earmark-text"></i>
                </div>
                <div>
                    <small>Izin Operasional</small><br>
                    <b>503.IO/KPT/02787/IX/2015 Bupati Brebes — Tetap</b>
                </div>
            </div>

            <div class="mb-3 info-card">
                <div class="icon-box icon-success">
                    <i class="bi bi-hospital"></i>
                </div>
                <div>
                    <small>Kelas Rumah Sakit</small><br>
                    <b>Rumah Sakit Umum Tipe C SK 91/2008/02/7/2001</b>
                </div>
            </div>

            <div class="mb-3 info-card">
                <div class="icon-box icon-warning">
                    <i class="bi bi-geo-alt-fill"></i>
                </div>
                <div>
                    <small>Alamat</small><br>
                    <b>Jl. Pangeran Diponegoro No. 609 Jatisawit, Bumiayu, Kab. Brebes, 52273</b>
                </div>
            </div>

            <div class="info-card">
                <div class="icon-box icon-danger">
                    <i class="bi bi-telephone-fill"></i>
                </div>
                <div>
                    <small>Kontak</small><br>
                    <b>(0289) 430822</b>
                </div>
            </div>

        </div>

    </div>

</div>
</section>


<!-- ================= NILAI KEUTAMAAN ================= -->
<section class="medica-section">
<div class="container">

    <h4 class="fw-bold mb-3">Nilai Keutamaan</h4>
    <h1 class="medica-heading">M-E-D-I-C-A</h1>

    <div class="row g-3">

        <div class="col-6 col-md-4 col-lg-2">
            <div class="medica-card medica-m text-center">
                <div class="medica-letter">M</div>
                <div class="medica-name">Melayani Sepenuh Hati</div>
                <p class="medica-desc">Sepenuh hati melayani setiap pasien</p>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
            <div class="medica-card medica-e text-center">
                <div class="medica-letter">E</div>
                <div class="medica-name">Empati</div>
                <p class="medica-desc">Memahami dan merasakan kondisi pasien</p>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
            <div class="medica-card medica-d text-center">
                <div class="medica-letter">D</div>
                <div class="medica-name">Disiplin</div>
                <p class="medica-desc">Disiplin dalam bekerja dan pelayanan</p>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
            <div class="medica-card medica-i text-center">
                <div class="medica-letter">I</div>
                <div class="medica-name">Ikhlas</div>
                <p class="medica-desc">Ikhlas dalam memberikan layanan terbaik</p>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
            <div class="medica-card medica-c text-center">
                <div class="medica-letter">C</div>
                <div class="medica-name">Cepat</div>
                <p class="medica-desc">Respons cepat dan tindakan yang tepat</p>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
            <div class="medica-card medica-a text-center">
                <div class="medica-letter">A</div>
                <div class="medica-name">Antusias</div>
                <p class="medica-desc">Bertanggung jawab dan dapat dipercaya</p>
            </div>
        </div>

    </div>

</div>
</section>


<section class="visi-misi-section">
<div class="container">

    <h4 class="fw-bold mb-4">Visi &amp; Misi</h4>

    {{-- VISI --}}
    <div class="visi-block">
        <div class="visi-deco">VISI</div>
        <div class="visi-inner">
            <div class="visi-icon-box">
                <i class="bi bi-eye-fill"></i>
            </div>
            <div>
                <div class="visi-label">Visi</div>
                <p class="visi-text">
                    Menjadi Rujukan Utama Pelayanan Kesehatan yang Inovatif, Handal dan Terpercaya di Kabupaten Brebes
                </p>
            </div>
        </div>
    </div>

    {{-- MISI --}}
    <div class="misi-block">
        <div class="misi-head">
            <div class="misi-head-icon">
                <i class="bi bi-bullseye"></i>
            </div>
            <div>
                <div class="misi-head-title">Misi</div>
                <div class="misi-head-sub">Langkah strategis pencapaian visi</div>
            </div>
            <span class="misi-count">4 Poin</span>
        </div>
        <div class="misi-body">
            <div class="misi-item">
                <div class="misi-num">1</div>
                <p class="misi-txt">Melaksanakan upaya pelayanan Kesehatan secara profesional dan inovatif melalui adopsi teknologi terbarukan selaras dengan perkembangan zaman.</p>
            </div>
            <div class="misi-item">
                <div class="misi-num">2</div>
                <p class="misi-txt">Mewujudkan layanan Kesehatan yang modern dan berorientasi kepada kepuasan pelanggan sesuai dengan kebutuhan Masyarakat.</p>
            </div>
            <div class="misi-item">
                <div class="misi-num">3</div>
                <p class="misi-txt">Menjalankan prinsip tatakelola perusahaan yang baik guna menciptakan nilai tambah bagi stakeholders (pelanggan, pekerja, mitrakerja, pemilik, dan masyarakat) dan berdampak positif terhadap lingkungan.</p>
            </div>
            <div class="misi-item">
                <div class="misi-num">4</div>
                <p class="misi-txt">Mengembangkan infrastruktur modern dan tatakelola sumberdaya manusia berkualitas guna mencapai SDM yang Unggul, Kompeten dan berdaya saing.</p>
            </div>
        </div>
    </div>

</div>
</section>

<!-- AOS (WAJIB kalau mau animasi) -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<style>
.timeline-section{
    padding:100px 0;
    position: relative;
    overflow: hidden;

    background: linear-gradient(
        to bottom,
        #ffffff 0%,
        #faf8ee 25%,
        #ede9d9 50%,
        #faf8ee 75%,
        #ffffff 100%
    );
}

/* GARIS TENGAH */
.timeline{
    position:relative;
    max-width:1100px;
    margin:auto;
}

.timeline::before{
    content:'';
    position:absolute;
    left:50%;
    top:0;
    bottom:0;
    width:3px;
    background:linear-gradient(to bottom,#1C145C,#6c63ff);
    transform:translateX(-50%);
}

/* ITEM */
.timeline-item{
    position:relative;
    width:50%;
    padding:40px 60px;
    display:flex;
}

/* POSISI */
.timeline-item.left{
    left:0;
    justify-content:flex-end;
    text-align:right;
}

.timeline-item.right{
    left:50%;
    justify-content:flex-start;
}

/* ICON BULAT */
.timeline-icon{
    position:absolute;
    top:35px;
    width:50px;
    height:50px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:20px;
    color:#fff;
    z-index:3;
    box-shadow:0 5px 15px rgba(0,0,0,0.2);
}

/* POSISI ICON */
.timeline-item.left .timeline-icon{
    right:-25px;
}
.timeline-item.right .timeline-icon{
    left:-25px;
}

/* WARNA ICON */
.icon-1{ background:#1C145C; }
.icon-2{ background:#28a745; }
.icon-3{ background:#ff9800; }
.icon-4{ background:#dc3545; }

/* CARD */
.timeline-card{
    background:#fff;
    padding:25px 30px;
    border-radius:18px;
    box-shadow:0 12px 35px rgba(0,0,0,0.08);
    transition:0.3s;
    width:100%;
    max-width:420px;

    min-height:150px;
    display:flex;
    flex-direction:column;
    justify-content:center;
}

.timeline-card:hover{
    transform:translateY(-8px) scale(1.02);
    box-shadow:0 20px 45px rgba(0,0,0,0.15);
}

/* TEXT */
.timeline-year{
    font-weight:800;
    color:#1C145C;
    font-size:20px;
}

.timeline-text{
    font-size:14px;
    color:#555;
    margin-top:6px;
    line-height:1.6;
}

/* RESPONSIVE */
@media(max-width:768px){

    .timeline::before{
        left:25px;
    }

    .timeline-item{
        width:100%;
        padding-left:80px;
        padding-right:20px;
    }

    .timeline-item.left,
    .timeline-item.right{
        left:0;
        text-align:left;
        justify-content:flex-start;
    }

    .timeline-icon{
        left:0 !important;
    }
}
</style>

<section class="timeline-section">
<div class="container">

    <h4 class="fw-bold mb-5 text-center">Tonggak Sejarah</h4>

    <div class="timeline">

        <!-- 2008 -->
        <div class="timeline-item left" data-aos="fade-right">
            <div class="timeline-icon icon-1">
                <i class="bi bi-house-heart-fill"></i>
            </div>
            <div class="timeline-card">
                <div class="timeline-year">2008</div>
                <div class="timeline-text">
                    503.10/KPT/007/IV/2008 Rumah Bersalin dan Balai Pengobatan Allam Medica Bumiayu.
                </div>
            </div>
        </div>

        <!-- 2011 -->
        <div class="timeline-item right" data-aos="fade-left">
            <div class="timeline-icon icon-2">
                <i class="bi bi-file-earmark-check-fill"></i>
            </div>
            <div class="timeline-card">
                <div class="timeline-year">2011</div>
                <div class="timeline-text">
                    Mendapat izin resmi sebagai Rumah Sakit.
                </div>
            </div>
        </div>

        <!-- 2015 -->
        <div class="timeline-item left" data-aos="fade-right">
            <div class="timeline-icon icon-3">
                <i class="bi bi-hospital-fill"></i>
            </div>
            <div class="timeline-card">
                <div class="timeline-year">2015</div>
                <div class="timeline-text">
                    503.10/KPPT/02797/IX/2015 Ijin Operasional Tetap RSU Allam Medica Bumiayu.
                </div>
            </div>
        </div>

        <!-- 2023 -->
        <div class="timeline-item right" data-aos="fade-left">
            <div class="timeline-icon icon-4">
                <i class="bi bi-award-fill"></i>
            </div>
            <div class="timeline-card">
                <div class="timeline-year">2023</div>
                <div class="timeline-text">
                    RSU Allam Medica resmi menjadi Rumah Sakit Tipe C.
                </div>
            </div>
        </div>

    </div>

</div>
</section>

<script>
AOS.init({
    duration:800,
    once:true
});
</script>


<style>
.filosofi-section{
    padding:80px 0;
    background:#fffff;
}

.filosofi-card{
    border-radius:16px;
    padding:30px;
    position:relative;
    overflow:hidden;
    height:100%;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
    transition:0.3s;
}

.filosofi-card:hover{
    transform:translateY(-6px);
    box-shadow:0 15px 40px rgba(0,0,0,0.12);
}

/* CARD PUTIH */
.card-filosofi{
    background:#fff;
}

/* CARD BIRU */
.card-semboyan{
    background:#1C145C;
    color:#fff;
}

/* HEADER */
.filosofi-header{
    display:flex;
    align-items:center;
    gap:12px;
    margin-bottom:15px;
}

.filosofi-icon{
    width:42px;
    height:42px;
    border-radius:10px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:18px;
}

/* ICON WARNA */
.icon-filosofi{
    background:rgba(28,20,92,0.1);
    color:#1C145C;
}

.icon-semboyan{
    background:rgba(255,255,255,0.2);
    color:#fff;
}

/* JUDUL */
.filosofi-title{
    font-size:16px;
    font-weight:700;
}

/* TEXT */
.filosofi-text{
    font-size:14px;
    line-height:1.7;
    color:#555;
}

.card-semboyan .filosofi-text{
    color:#e0e0e0;
}

/* BACKGROUND TEXT (EFEK VISI MISI) */
.bg-label{
    position:absolute;
    top:20px;
    right:20px;
    font-size:60px;
    font-weight:800;
    opacity:0.05;
    pointer-events:none;
}
</style>

<section class="filosofi-section">
<div class="container">

    <div class="row g-4">

        <!-- FILOSOFI -->
        <div class="col-md-6">
            <div class="filosofi-card card-filosofi">

                <div class="bg-label">F</div>

                <div class="filosofi-header">
                    <div class="filosofi-icon icon-filosofi">
                        <i class="bi bi-lightbulb-fill"></i>
                    </div>
                    <div class="filosofi-title">Filosofi RSU Allam Medica</div>
                </div>

                <p class="filosofi-text">
                    Rumah Sakit yang memberikan pelayanan medis, rujukan medis yang terintegrasi dalam pelayanan, dengan menjunjung tinggi rasa kemanusiaan sehingga tercapai derajat kesehatan yang optimal bagi masyarakat
                </p>

            </div>
        </div>

        <!-- SEMBOYAN -->
        <div class="col-md-6">
            <div class="filosofi-card card-semboyan">

                <div class="bg-label">S</div>

                <div class="filosofi-header">
                    <div class="filosofi-icon icon-semboyan">
                        <i class="bi bi-chat-heart-fill"></i>
                    </div>
                    <div class="filosofi-title">Makna Semboyan</div>
                </div>

                <p class="filosofi-text">
                    "Kesehatan Anda, Tujuan Kami"
                </p>
                <p class="filosofi-text">
                    Setiap langkah pelayanan kami selalu berorientasi pada kesembuhan dan kepuasan pasien. Kesehatan Anda adalah prioritas utama yang menjadi alasan kami hadir.
                </p>

            </div>
        </div>

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