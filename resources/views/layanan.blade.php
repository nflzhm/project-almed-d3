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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

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


<style>
@font-face {
    font-family: 'Gotham';
    src: url('{{ asset("fonts/Gotham-Black.otf") }}') format('opentype');
    font-weight: 900;
    font-style: normal;
    font-display: swap;
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

body {
    padding-top: 100px;
    background: #ffffff !important;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    overflow-x: hidden;
    color: #1C145C;
}

/* ============================================================
   PAGE SWITCHING
============================================================ */
#page-list   { display: block; }
#page-detail { display: none; }

/* ============================================================
   HERO (LIST PAGE)
============================================================ */
.layanan-hero {
    padding: 60px 0 50px;
    text-align: center;
    position: relative;
}
.layanan-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 70% 60% at 50% 0%, rgba(83,74,183,0.07) 0%, transparent 70%);
    pointer-events: none;
}
.layanan-heading {
    font-family: 'Gotham', -apple-system, sans-serif;
    font-weight: 900;
    font-size: clamp(26px, 4vw, 42px);
    line-height: 1.2;
    margin: 0 0 14px;
    letter-spacing: -0.5px;
    background: linear-gradient(135deg, #1C145C 0%, #534AB7 50%, #1C145C 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.layanan-desc {
    font-size: 14px;
    color: #7a738f;
    max-width: 520px;
    margin: 0 auto;
    line-height: 1.75;
}
.stats-bar {
    display: inline-flex;
    margin: 32px auto 0;
    background: #fff;
    border-radius: 14px;
    border: 1px solid #EAE7F5;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(28,20,92,0.06);
}
.stat-item {
    padding: 13px 24px;
    text-align: center;
    border-right: 1px solid #F0EDF8;
}
.stat-item:last-child { border-right: none; }
.stat-num {
    font-family: 'Gotham', sans-serif;
    font-weight: 900;
    font-size: 20px;
    color: #1C145C;
    display: block;
}
.stat-label { font-size: 10px; color: #a09bbf; margin-top: 3px; }

/* ============================================================
   GRID & CARD
============================================================ */
.layanan-grid { padding: 28px 0 70px; }

/* MOBILE */
@media (max-width: 768px) {

    .layanan-grid {
        padding: 20px 14px 60px;
    }

    /* kasih jarak antar card */
    .layanan-grid .row {
        --bs-gutter-x: 14px;
        --bs-gutter-y: 14px;
        margin-left: 0;
        margin-right: 0;
    }

    /* biar card tidak nabrak kanan kiri */
    .layanan-grid .col-md-6,
    .layanan-grid .col-6 {
        padding-left: 7px;
        padding-right: 7px;
    }

    .lcard {
        width: 100%;
        max-width: 100%;
    }
}

.lcard {
    background: #fff;
    border-radius: 16px;
    border: 1px solid #EAE7F5;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    cursor: pointer;
    transition: transform 0.25s cubic-bezier(.22,.68,0,1.2), box-shadow 0.25s, border-color 0.25s;
    height: 100%;
}
.lcard:hover {
    transform: translateY(-5px);
    box-shadow: 0 14px 36px rgba(28,20,92,0.10);
    border-color: #AFA9EC;
}
.lcard-img-wrap {
    position: relative;
    background: #F5F3FF;
    overflow: hidden;
    line-height: 0;
    flex-shrink: 0;
}
.lcard-img {
    width: 100%;
    height: auto;
    display: block;
    object-fit: contain;
    transition: transform 0.4s;
}
.lcard:hover .lcard-img { transform: scale(1.04); }
.lcard-img-placeholder {
    height: 120px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #EEEDFE 0%, #E6F1FB 100%);
}
.lcard-img-placeholder i { font-size: 34px; color: #CECBF6; }


.lcard-body {
    padding: 14px 15px 16px;
    flex: 1;
    display: flex;
    flex-direction: column;
}
.lcard-poli {
    font-family: 'Gotham', sans-serif;
    font-weight: 900;
    font-size: 12.5px;
    color: #1C145C;
    margin-bottom: 5px;
    line-height: 1.35;
}
.lcard-desc {
    font-size: 11.5px;
    color: #9590b0;
    line-height: 1.6;
    flex: 1;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.lcard-detail-link {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    margin-top: 9px;
    font-size: 11px;
    font-weight: 600;
    color: #1C145C;
    transition: gap 0.2s, color 0.2s;
}
.lcard-detail-link:hover { color: #7F77DD; gap: 8px; }
.lcard-detail-link i { font-size: 11px; }

.lcard-divider { height: 1px; background: #F0EDF8; margin: 12px 0 10px; }

.lcard-contacts { display: flex; flex-direction: column; gap: 6px; }
.lcard-contact-row {
    display: flex; align-items: center; gap: 7px;
    font-size: 11px; color: #a09bbf;
}
.lcard-contact-row i { font-size: 12px; color: #7F77DD; flex-shrink: 0; }
.lcard-contact-row span { color: #3a3260; font-weight: 600; }

.lcard-wa-btn {
    display: inline-flex; align-items: center; gap: 5px;
    margin-top: 9px; padding: 6px 11px;
    border-radius: 8px; font-size: 11px; font-weight: 600;
    background: #E1F5EE; color: #0F6E56;
    text-decoration: none; border: 1px solid #9FE1CB;
    transition: background 0.2s, transform 0.15s; width: fit-content;
}
.lcard-wa-btn:hover { background: #9FE1CB; color: #085041; transform: scale(1.02); text-decoration: none; }
.lcard-wa-btn i { font-size: 13px; }

/* ============================================================
   DETAIL PAGE
============================================================ */
.detail-page {
    min-height: 80vh;
    padding-bottom: 80px;
    animation: fadeUp 0.35s cubic-bezier(.22,.68,0,1.2);
}
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* BACK BUTTON */
.detail-back {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 28px 0 0;
    font-size: 13px;
    font-weight: 600;
    color: #534AB7;
    cursor: pointer;
    border: none;
    background: none;
    transition: gap 0.2s, color 0.2s;
    font-family: inherit;
}
.detail-back:hover { color: #1C145C; gap: 12px; }
.detail-back i { font-size: 14px; }

/* HERO IMAGE */
.detail-hero-img {
    width: 100%;
    height: auto;
    display: block;
    border-radius: 20px;
    margin: 24px 0 0;
    border: 1px solid #EAE7F5;
    background: #F5F3FF;
}
.detail-hero-placeholder {
    width: 100%;
    height: 260px;
    border-radius: 20px;
    margin: 24px 0 0;
    background: linear-gradient(135deg, #EEEDFE 0%, #E6F1FB 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #EAE7F5;
}
.detail-hero-placeholder i { font-size: 64px; color: #CECBF6; }

/* META BAR */
.detail-meta {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
    margin: 22px 0 18px;
}
.detail-badge {
    display: inline-block;
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    padding: 5px 13px;
    border-radius: 999px;
    background: #EEEDFE;
    color: #534AB7;
    border: 1px solid #CECBF6;
}
.detail-badge.aktif    { background: #E1F5EE; color: #0F6E56; border-color: #9FE1CB; }
.detail-badge.nonaktif { background: #F1EFE8; color: #888;    border-color: #D3D1C7; }
.detail-meta-item {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 12px;
    color: #a09bbf;
}
.detail-meta-item i { font-size: 13px; }

/* TITLE */
.detail-title {
    font-family: 'Gotham', sans-serif;
    font-weight: 900;
    font-size: clamp(22px, 3.5vw, 34px);
    color: #1C145C;
    line-height: 1.2;
    letter-spacing: -0.5px;
    margin-bottom: 6px;
}

/* DIVIDER LINE */
.detail-line {
    height: 3px;
    width: 52px;
    background: linear-gradient(90deg, #534AB7, #AFA9EC);
    border-radius: 999px;
    margin: 18px 0 24px;
}

/* BODY TEXT */
.detail-body {
    font-size: 15.5px;
    color: #3a3260;
    line-height: 1.85;
    max-width: 700px;
}
.detail-body p { margin-bottom: 1em; }

/* SIDEBAR INFO BOX */
.detail-sidebar {
    position: sticky;
    top: 120px;
}
.detail-infobox {
    background: #fff;
    border: 1px solid #EAE7F5;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 6px 24px rgba(28,20,92,0.06);
}
.detail-infobox-header {
    background: linear-gradient(135deg, #1C145C 0%, #534AB7 100%);
    padding: 18px 20px;
}
.detail-infobox-header h3 {
    font-family: 'Gotham', sans-serif;
    font-weight: 900;
    font-size: 13px;
    color: #fff;
    letter-spacing: 0.3px;
}
.detail-infobox-header p {
    font-size: 11px;
    color: rgba(255,255,255,0.65);
    margin-top: 3px;
}
.detail-infobox-body { padding: 18px 20px; }

.info-row {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 10px 0;
    border-bottom: 1px solid #F0EDF8;
}
.info-row:last-child { border-bottom: none; padding-bottom: 0; }
.info-icon {
    width: 34px; height: 34px;
    border-radius: 9px;
    background: #EEEDFE;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}
.info-icon i { font-size: 15px; color: #534AB7; }
.info-icon.green { background: #E1F5EE; }
.info-icon.green i { color: #0F6E56; }
.info-text-label { font-size: 10px; color: #a09bbf; font-weight: 600; letter-spacing: 0.3px; text-transform: uppercase; }
.info-text-val   { font-size: 13px; color: #1C145C; font-weight: 600; margin-top: 1px; }

.detail-wa-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    margin-top: 16px;
    padding: 13px 20px;
    border-radius: 12px;
    font-size: 13.5px;
    font-weight: 700;
    background: #1D9E75;
    color: #fff;
    text-decoration: none;
    border: none;
    transition: background 0.2s, transform 0.15s;
    width: 100%;
    font-family: inherit;
}
.detail-wa-btn:hover { background: #0F6E56; color: #fff; text-decoration: none; transform: scale(1.02); }
.detail-wa-btn i { font-size: 18px; }

.detail-tel-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    margin-top: 10px;
    padding: 11px 20px;
    border-radius: 12px;
    font-size: 13px;
    font-weight: 600;
    background: #ce0000;
    color: #ffffff;
    text-decoration: none;
    border: 1px solid #ff0000;
    transition: background 0.2s;
    width: 100%;
    font-family: inherit;
    cursor: pointer;
}
.detail-tel-btn:hover { background: #ff0000; text-decoration: none; }
.detail-tel-btn i { font-size: 15px; }

/* OTHER LAYANAN */
.other-section { margin-top: 52px; }
.other-section-title {
    font-family: 'Gotham', sans-serif;
    font-weight: 900;
    font-size: 16px;
    color: #1C145C;
    margin-bottom: 16px;
    padding-bottom: 12px;
    border-bottom: 1px solid #EAE7F5;
    display: flex;
    align-items: center;
    gap: 8px;
}
.other-section-title::before {
    content: '';
    width: 4px; height: 18px;
    background: linear-gradient(180deg, #534AB7, #AFA9EC);
    border-radius: 999px;
    display: inline-block;
}

.other-card {
    display: flex;
    gap: 12px;
    align-items: flex-start;
    padding: 12px;
    background: #fff;
    border: 1px solid #EAE7F5;
    border-radius: 12px;
    cursor: pointer;
    transition: border-color 0.2s, transform 0.2s;
    text-decoration: none;
    color: inherit;
}
.other-card:hover { border-color: #AFA9EC; transform: translateX(4px); }
.other-card-img {
    width: 60px; height: 60px;
    border-radius: 8px;
    object-fit: cover;
    background: #F5F3FF;
    flex-shrink: 0;
    border: 1px solid #EAE7F5;
}
.other-card-placeholder {
    width: 60px; height: 60px;
    border-radius: 8px;
    background: linear-gradient(135deg, #EEEDFE, #E6F1FB);
    flex-shrink: 0;
    display: flex; align-items: center; justify-content: center;
    border: 1px solid #EAE7F5;
}
.other-card-placeholder i { font-size: 22px; color: #CECBF6; }
.other-card-name {
    font-family: 'Gotham', sans-serif;
    font-weight: 900;
    font-size: 12px;
    color: #1C145C;
    line-height: 1.35;
    margin-bottom: 4px;
}
.other-card-desc {
    font-size: 11px;
    color: #9590b0;
    line-height: 1.5;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* ============================================================
   EMPTY & RESPONSIVE
============================================================ */
.empty-state {
    text-align: center;
    padding: 80px 20px;
    color: #aaa;
}

.empty-state i {
    font-size: 48px;
    display: block;
    margin-bottom: 14px;
    color: #AFA9EC;
}

/* ============================================================
   MOBILE
============================================================ */
@media (max-width: 768px) {

    body {
        padding-top: 85px;
    }

    .layanan-hero {
        padding: 42px 0 34px;
    }

    /* ===== STATS BAR ===== */
    .stats-bar {
        display: flex;
        align-items: stretch;
        justify-content: center;
        flex-wrap: nowrap;

        width: 100%;
        max-width: calc(100% - 28px);

        margin: 24px auto 0;

        background: #fff;
        border: 1px solid #EEEDFE;
        border-radius: 16px;

        overflow: hidden;

        box-shadow: 0 8px 24px rgba(83,74,183,0.08);
    }

    .stat-item {
        flex: 1;
        padding: 14px 10px;
        border-right: 1px solid #EEEDFE;
    }

    .stat-item:last-child {
        border-right: none;
    }

    .stat-num {
        font-size: 18px;
    }

    .stat-label {
        font-size: 10px;
        line-height: 1.4;
    }

    /* ===== DETAIL SIDEBAR ===== */
    .detail-sidebar {
        position: static;
        margin-top: 28px;
    }
}
</style>

{{-- ============================================================
     PAGE: LIST
============================================================ --}}
<div id="page-list">

    <!-- HERO -->
    <section class="layanan-hero">
        <div class="container">

            <h1 class="layanan-heading">
                Poliklinik &amp; Layanan<br>RSU Allam Medica
            </h1>
            <p class="layanan-desc">
                Kami menyediakan layanan kesehatan lengkap dengan dokter spesialis berpengalaman.
                Pilih poliklinik yang Anda butuhkan dan buat janji temu dengan mudah.
            </p>

            @php
                $aktifCount = $layanan->where('status', 'aktif')->count();
                $totalCount = $layanan->count();
            @endphp

            <div class="stats-bar">
                <div class="stat-item">
                    <span class="stat-num">{{ $totalCount }}</span>
                    <div class="stat-label">Total Layanan</div>
                </div>
                <div class="stat-item">
                    <span class="stat-num">{{ $aktifCount }}</span>
                    <div class="stat-label">Layanan Aktif</div>
                </div>
                <div class="stat-item">
                    <span class="stat-num">24<small style="font-size:12px">/7</small></span>
                    <div class="stat-label">IGD Siaga</div>
                </div>
            </div>

        </div>
    </section>

    <!-- GRID -->
    <div class="container layanan-grid">

        @if($layanan->isEmpty())
            <div class="empty-state">
                <i class="bi bi-hospital"></i>
                <p>Belum ada layanan yang tersedia.</p>
            </div>
        @else

            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3 justify-content-center">

                @foreach($layanan as $item)
                @if($item->status === 'aktif')

                @php
                    $imgUrl  = $item->gambar ? asset('storage/' . $item->gambar) : '';
                    $noWa    = preg_replace('/[^0-9]/', '', $item->no_wa ?? '');
                    $waLink  = $noWa ? 'https://wa.me/' . $noWa : '';
                @endphp

                <div class="col d-flex">
                    <div class="lcard w-100"
                         onclick="showDetail({{ $item->id }})">

                        <div class="lcard-img-wrap">
                            @if($item->gambar)
                                <img src="{{ $imgUrl }}" alt="{{ $item->poli }}" class="lcard-img" loading="lazy">
                            @else
                                <div class="lcard-img-placeholder">
                                    <i class="bi bi-hospital"></i>
                                </div>
                            @endif
                            <span class="lcard-status aktif">Aktif</span>
                        </div>

                        <div class="lcard-body">
                            <div class="lcard-poli">{{ $item->poli }}</div>
                            @if($item->deskripsi)
                                <p class="lcard-desc">{{ $item->deskripsi }}</p>
                            @endif
                            <span class="lcard-detail-link">
                                Lihat Detail <i class="bi bi-arrow-right"></i>
                            </span>
                            @if($item->no_hp || $item->no_wa)
                                <div class="lcard-divider"></div>
                                <div class="lcard-contacts">
                                    @if($item->no_hp)
                                    <div class="lcard-contact-row">
                                        <i class="bi bi-telephone-fill"></i>
                                        <span>{{ $item->no_hp }}</span>
                                    </div>
                                    @endif
                                    @if($waLink)
                                    <a href="{{ $waLink }}" target="_blank" rel="noopener"
                                       class="lcard-wa-btn" onclick="event.stopPropagation()">
                                        <i class="bi bi-whatsapp"></i> WhatsApp
                                    </a>
                                    @endif
                                </div>
                            @endif
                        </div>

                    </div>
                </div>

                @endif
                @endforeach

            </div>
        @endif

    </div>
</div>


{{-- ============================================================
     PAGE: DETAIL (hidden, filled by JS)
============================================================ --}}
<div id="page-detail">
    <div class="container">
        <button class="detail-back" onclick="showList()">
            <i class="bi bi-arrow-left"></i> Kembali ke Semua Layanan
        </button>
    </div>

    <div class="container detail-page">
        <div class="row g-5">

            {{-- MAIN CONTENT --}}
            <div class="col-lg-8">

                <div id="det-img-wrap"></div>

                <div class="detail-meta">
                    <span class="detail-badge" id="det-badge">Poliklinik</span>
                    <span class="detail-meta-item">
                        <i class="bi bi-circle-fill" style="font-size:6px;color:#9FE1CB"></i>
                        <span id="det-status-text"></span>
                    </span>
                    <span class="detail-meta-item">
                        <i class="bi bi-clock"></i>
                        <span>RSU Allam Medica</span>
                    </span>
                </div>

                <h2 class="detail-title" id="det-title"></h2>
                <div class="detail-line"></div>

                <div class="detail-body" id="det-body"></div>

                {{-- LAYANAN LAINNYA --}}
                <div class="other-section">
                    <div class="other-section-title">Layanan Lainnya</div>
                    <div class="row g-2" id="det-others"></div>
                </div>

            </div>

            {{-- SIDEBAR --}}
            <div class="col-lg-4">
                <div class="detail-sidebar">
                    <div class="detail-infobox">
                        <div class="detail-infobox-header">
                            <h3>Informasi Kontak</h3>
                            <p>Hubungi kami untuk janji temu</p>
                        </div>
                        <div class="detail-infobox-body" id="det-infobox-body">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


{{-- DATA LAYANAN (JSON untuk JS) --}}
<script>
@php
$layananJson = $layanan->where('status', 'aktif')->map(function($item) {

    $wa = preg_replace('/\D/', '', $item->no_wa ?? '');

    return [
        'id'         => $item->id,
        'poli'       => $item->poli,
        'deskripsi'  => $item->deskripsi ?? '',
        'no_hp'      => $item->no_hp ?? '',
        'no_wa'      => $wa,
        'gambar'     => $item->gambar
                            ? asset('storage/' . $item->gambar)
                            : '',
        'status'     => $item->status,
    ];
})->values();
@endphp


const layananData = @json($layananJson);

function showDetail(id) {

}
function showDetail(id) {
    const item = layananData.find(d => d.id == id);
    if (!item) return;

    // IMAGE
    const imgWrap = document.getElementById('det-img-wrap');
    imgWrap.innerHTML = item.gambar
        ? `<img src="${item.gambar}" alt="${item.poli}" class="detail-hero-img">`
        : `<div class="detail-hero-placeholder"><i class="bi bi-hospital"></i></div>`;

    // META
    document.getElementById('det-title').textContent       = item.poli;
    document.getElementById('det-status-text').textContent = item.status === 'aktif' ? 'Layanan Aktif' : 'Tidak Aktif';

    const badge = document.getElementById('det-badge');
    badge.textContent  = 'Poliklinik';
    badge.className    = 'detail-badge';

    // BODY
    const bodyEl = document.getElementById('det-body');
    if (item.deskripsi) {
        const paragraphs = item.deskripsi.split(/\n+/).filter(p => p.trim());
        bodyEl.innerHTML = paragraphs.length > 1
            ? paragraphs.map(p => `<p>${p}</p>`).join('')
            : `<p>${item.deskripsi}</p>`;
    } else {
        bodyEl.innerHTML = '<p style="color:#a09bbf">Deskripsi layanan belum tersedia.</p>';
    }

    // INFOBOX SIDEBAR
    let infoHtml = '';

    infoHtml += `
        <div class="info-row">
            <div class="info-icon">
                <i class="bi bi-building-cross"></i>
            </div>
            <div>
                <div class="info-text-label">Layanan</div>
                <div class="info-text-val">${item.poli}</div>
            </div>
        </div>`;

    if (item.no_hp) {
        infoHtml += `
        <div class="info-row">
            <div class="info-icon">
                <i class="bi bi-telephone-fill"></i>
            </div>
            <div>
                <div class="info-text-label">Telepon</div>
                <div class="info-text-val">${item.no_hp}</div>
            </div>
        </div>`;
    }

    if (item.no_wa) {
        infoHtml += `
        <div class="info-row">
            <div class="info-icon green">
                <i class="bi bi-whatsapp"></i>
            </div>
            <div>
                <div class="info-text-label">WhatsApp</div>
                <div class="info-text-val">+${item.no_wa}</div>
            </div>
        </div>`;
    }

    document.getElementById('det-infobox-body').innerHTML = infoHtml;

    // ACTION BUTTONS
    let btnHtml = '';
    if (item.no_wa) {
        btnHtml += `<a href="https://wa.me/${item.no_wa}" target="_blank" rel="noopener" class="detail-wa-btn">
            <i class="bi bi-whatsapp"></i> Chat WhatsApp
        </a>`;
    }
    if (item.no_hp) {
        btnHtml += `<a href="tel:${item.no_hp}" class="detail-tel-btn">
            <i class="bi bi-telephone-fill"></i> Hubungi via Telepon
        </a>`;
    }
    document.getElementById('det-infobox-body').innerHTML += btnHtml;

    // LAYANAN LAINNYA
    const others = layananData.filter(d => d.id != id).slice(0, 6);
    const othersEl = document.getElementById('det-others');
    othersEl.innerHTML = others.map(o => `
        <div class="col-12 col-sm-6" onclick="showDetail(${o.id})" style="cursor:pointer">
            <div class="other-card">
                ${o.gambar
                    ? `<img src="${o.gambar}" class="other-card-img" alt="${o.poli}">`
                    : `<div class="other-card-placeholder"><i class="bi bi-hospital"></i></div>`}
                <div>
                    <div class="other-card-name">${o.poli}</div>
                    <div class="other-card-desc">${o.deskripsi || 'Tidak ada deskripsi.'}</div>
                </div>
            </div>
        </div>
    `).join('');

    // SWITCH PAGE
    document.getElementById('page-list').style.display   = 'none';
    document.getElementById('page-detail').style.display = 'block';
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function showList() {
    document.getElementById('page-detail').style.display = 'none';
    document.getElementById('page-list').style.display   = 'block';
    window.scrollTo({ top: 0, behavior: 'smooth' });
}
</script>



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

</body>
</html>