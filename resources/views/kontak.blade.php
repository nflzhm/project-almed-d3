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

h1, h2, h3, h4 {
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
                085292224886
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
body { 
    padding-top: 35px; 
}

/* ===== HERO ===== */
.contact-section {
    background:
        linear-gradient(
            to bottom,
            #120d4f 0%,
            #1C145C 20%,
            #2a1f7a 45%,
            #4f46b8 65%,
            #9e9ad6 82%,
            #e8e8f4 93%,
            #ffffff 100%
        );

    padding: 120px 20px 120px;

    text-align: center;
    color: #fff;

    position: relative;
    overflow: hidden;
}

/* glow kiri atas */
.contact-section::before {
    content: '';
    position: absolute;
    top: -120px;
    left: -120px;

    width: 400px;
    height: 400px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(254,252,241,.08) 0%,
            transparent 70%
        );

    pointer-events: none;
}

/* glow kanan bawah */
.contact-section::after {
    content: '';
    position: absolute;

    left: 50%;
    bottom: -180px;

    transform: translateX(-50%);

    width: 120%;
    height: 320px;

    background:
        radial-gradient(
            ellipse at center,
            rgba(255,255,255,0.55) 0%,
            rgba(255,255,255,0.18) 45%,
            transparent 75%
        );

    filter: blur(30px);

    pointer-events: none;
}
/* shimmer */
.contact-section .contact-shimmer {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;

    height: 3px;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(254,252,241,.55) 50%,
            transparent
        );
}

.contact-section .contact-inner {
    position: relative;
    z-index: 1;
}

.contact-section .contact-breadcrumb {
    font-size: 12px;
    color: rgba(254,252,241,.45);
    margin-bottom: 14px;
    letter-spacing: .04em;
}

.contact-section .contact-breadcrumb span {
    color: rgba(254,252,241,.7);
}

.contact-section .contact-title {
    font-size: 38px;
    font-weight: 800;
    color: #FEFCF1;
    letter-spacing: -.02em;
}

/* ===== BODY ===== */
.contact-wrapper { 
    background: #ffffff; 
    padding: 50px 0 60px; 
}

.contact-layout {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 28px;
    align-items: start;
}

/* FORM CARD (kiri — dark) */
.contact-form-card {
    background: #1C145C;
    border-radius: 16px;
    padding: 32px 28px;
    color: #fff;
}
.contact-form-sublabel {
    font-size: 11px;
    font-weight: 700;
    color: rgba(254,252,241,.5);
    text-transform: uppercase;
    letter-spacing: .12em;
    margin-bottom: 6px;
}
.contact-form-card .contact-title {
    font-size: 26px;
    font-weight: 800;
    color: #FEFCF1;
    margin-bottom: 24px;
    line-height: 1.2;
    letter-spacing: normal;
}
.contact-form-card .contact-title span {
    background: linear-gradient(90deg, #a89eff, #FEFCF1);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.ck-field { margin-bottom: 14px; }
.ck-field label {
    display: block;
    font-size: 11.5px;
    color: rgba(254,252,241,.6);
    margin-bottom: 5px;
    letter-spacing: .04em;
}
.ck-field input, .ck-field textarea {
    width: 100%;
    background: rgba(255,255,255,.1);
    border: 1px solid rgba(254,252,241,.2);
    border-radius: 8px;
    padding: 10px 13px;
    font-size: 13.5px;
    color: #FEFCF1;
    outline: none;
    transition: .2s;
    font-family: inherit;
    box-sizing: border-box;
}
.ck-field input::placeholder, .ck-field textarea::placeholder {
    color: rgba(254,252,241,.4);
}
.ck-field input:focus, .ck-field textarea:focus {
    border-color: rgba(254,252,241,.5);
    background: rgba(255,255,255,.15);
}
.ck-field textarea { resize: vertical; min-height: 110px; }

.btn-send {
    margin-top: 18px;
    width: 100%;
    padding: 12px;
    background: #FEFCF1;
    color: #1C145C;
    border: none;
    border-radius: 50px;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    transition: .2s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-family: inherit;
}
.btn-send:hover {
    background: #fff;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0,0,0,.2);
}

/* KANAN */
.contact-right { display: flex; flex-direction: column; gap: 20px; }
.contact-right-desc { font-size: 13.5px; color: #5a5480; line-height: 1.75; }

.info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
}
.info-card {
    background: #fff;
    border-radius: 12px;
    padding: 16px;
    text-align: center;
    border: 1px solid #e8e4d8;
}
.info-icon {
    width: 44px; height: 44px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    margin: 0 auto 10px;
}
.icon-phone  { background: rgba(25,135,84,.12);  color: #198754; }
.icon-email  { background: rgba(220,53,69,.1);   color: #dc3545; }
.icon-igd    { background: rgba(245,158,11,.12); color: #d97706; }
.icon-map    { background: rgba(28,20,92,.1);    color: #1C145C; }

.info-title { font-size: 12px; font-weight: 700; color: #1C145C; margin-bottom: 3px; }
.info-val   { font-size: 12.5px; color: #5a5480; line-height: 1.5; }

.map-box { border-radius: 12px; overflow: hidden; border: 1px solid #e8e4d8; }
.map-box iframe { width: 100%; height: 200px; display: block; border: 0; }

/* Responsive */
@media (max-width: 767px) {
    .contact-layout { grid-template-columns: 1fr; }
    .contact-section .contact-title { font-size: 28px; }
}
</style>

<!-- HERO -->
<section class="contact-section">
    <div class="contact-shimmer"></div>

    <div class="contact-inner">

        <!-- MINI LABEL -->
        <div class="contact-badge">
            <i class="bi bi-heart-pulse-fill"></i>
            Layanan Informasi RSU Allam Medica
        </div>

        <!-- TITLE -->
        <div class="contact-title">
            Hubungi Tim Kami
        </div>

        <!-- DESC -->
        <p class="contact-desc">
            Kami siap membantu kebutuhan informasi, layanan kesehatan,
            konsultasi, hingga pelayanan darurat dengan respon cepat
            dan pelayanan terbaik untuk Anda.
        </p>

    </div>
</section>

<!-- BODY -->
<div class="contact-wrapper">
<div class="container">
<div class="contact-layout">

    <!-- KIRI: FORM -->
    <div class="contact-form-card">
        <div class="contact-form-sublabel">Kontak Kami</div>
        <div class="contact-title">Get In <span>Touch</span></div>

        <form action="https://formspree.io/f/mvzljdje" method="POST">
            <div class="ck-field">
                <label>Nama</label>
                <input type="text" name="nama" placeholder="Nama lengkap" required>
            </div>
            <div class="ck-field">
                <label>Telepon</label>
                <input type="text" name="telepon" placeholder="No. telepon" required>
            </div>
            <div class="ck-field">
                <label>Email</label>
                <input type="email" name="email" placeholder="Email Anda" required>
            </div>
            <div class="ck-field">
                <label>Subject</label>
                <input type="text" name="subject" placeholder="Perihal" required>
            </div>
            <div class="ck-field">
                <label>Pesan</label>
                <textarea name="pesan" placeholder="Tulis pesan Anda..." required></textarea>
            </div>
            <button type="submit" class="btn-send">
                <i class="bi bi-send-fill"></i>
                Kirim Pesan
            </button>
        </form>
    </div>

    <!-- KANAN: INFO + MAP -->
    <div class="contact-right">
        

        <div class="info-grid">
            <div class="info-card">
                <div class="info-icon icon-phone"><i class="bi bi-telephone-fill"></i></div>
                <div class="info-title">Telepon</div>
                <div class="info-val">(0289) 430822</div>
            </div>
            <div class="info-card">
                <div class="info-icon icon-email"><i class="bi bi-envelope-fill"></i></div>
                <div class="info-title">Email</div>
                <div class="info-val">allam.medica@yahoo.co.id</div>
            </div>
            <div class="info-card">
                <div class="info-icon icon-igd"><i class="bi bi-clock-fill"></i></div>
                <div class="info-title">IGD</div>
                <div class="info-val">24 Jam</div>
            </div>
            <div class="info-card">
                <div class="info-icon icon-map"><i class="bi bi-geo-alt-fill"></i></div>
                <div class="info-title">Alamat</div>
                <div class="info-val">Jl. P. Diponegoro No.609, Bumiayu, Brebes</div>
            </div>
        </div>

        <div class="map-box">
            <iframe
                src="https://www.google.com/maps?q=RSU+Allam+Medica+Bumiayu&output=embed"
                loading="lazy">
            </iframe>
        </div>
    </div>

</div>
</div>
</div>


<!-- ============================================================
     FOOTER
============================================================ -->
<style>
.footer-rsu{
    background:linear-gradient(
        to bottom,
        #ffffff 0%,
        #fefefd 3%,
        #fdfcf6 8%,
        #fcfbf3 13%,
        #faf8ee 20%,
        #f7f5e8 30%,
        #f3f0e1 45%,
        #ede9d9 65%,
        #e8e3d2 85%,
        #e3deca 100%
    );
    color:#1C145C;
    padding:56px 0 0;
    position:relative;
    overflow:hidden;
}

/* ORNAMEN */
.footer-rsu .footer-ornament{
    position:absolute;
    right:-80px;
    bottom:-150px;
    width:420px;
    height:420px;
    opacity:.07;
    background-image:url('{{ asset("images/beranda/ornamen.png") }}');
    background-size:contain;
    background-repeat:no-repeat;
    background-position:center;
    pointer-events:none;
    z-index:0;
}

.footer-rsu .footer-ornament2{
    position:absolute;
    left:-100px;
    top:40px;
    width:340px;
    height:340px;
    opacity:.04;
    background-image:url('{{ asset("images/beranda/ornamen.png") }}');
    background-size:contain;
    background-repeat:no-repeat;
    background-position:center;
    pointer-events:none;
    z-index:0;
}

/* CONTAINER */
.footer-rsu .container-fluid{
    max-width:1550px;
    position:relative;
    z-index:1;
}

/* GRID */
.footer-rsu .row{
    --bs-gutter-x:3.5rem;
}

/* LOGO */
.footer-rsu .footer-logo{
    height:40px;
    width:auto;
    display:block;
    margin-bottom:14px;
}

/* TITLE */
.footer-rsu .footer-title{
    font-size:16px;
    font-weight:700;
    color:#1C145C;
    margin-bottom:8px;
}

.footer-rsu .footer-desc{
    font-size:13px;
    line-height:1.8;
    color:#5a5480;
    margin-bottom:20px;
    max-width:340px;
}

/* SOCIAL */
.footer-rsu .footer-social{
    display:flex;
    gap:10px;
    margin-bottom:22px;
}

.footer-rsu .footer-social a{
    width:36px;
    height:36px;
    border-radius:50%;
    background:rgba(28,20,92,.07);
    border:1px solid rgba(28,20,92,.15);
    display:flex;
    align-items:center;
    justify-content:center;
    color:#1C145C;
    text-decoration:none;
    font-size:15px;
    transition:.25s;
}

.footer-rsu .footer-social a:hover{
    background:#1C145C;
    color:#fff;
    transform:translateY(-2px);
}

/* MITRA */
.footer-rsu .footer-mitra-label{
    font-size:11px;
    color:#9994bb;
    text-transform:uppercase;
    letter-spacing:.08em;
    margin-bottom:10px;
}

.footer-rsu .footer-mitra{
    display:flex;
    gap:10px;
    align-items:center;
    flex-wrap:wrap;
}

.footer-rsu .footer-mitra img:nth-child(1){
    height:33px;
}

.footer-rsu .footer-mitra img:nth-child(2){
    height:23px;
}

/* HEADING */
.footer-rsu .footer-heading{
    font-weight:900;
    font-size:12px;
    color:#1C145C;
    text-transform:uppercase;
    letter-spacing:.14em;
    margin-bottom:18px;
    padding-bottom:10px;
    border-bottom:1.5px solid rgba(28,20,92,.12);
    white-space:nowrap;
}

/* LIST */
.footer-rsu ul{
    list-style:none;
    padding:0;
    margin:0;
}

.footer-rsu ul li{
    margin-bottom:10px;
}

.footer-rsu a{
    color:#5a5480;
    text-decoration:none;
    font-size:13.5px;
    transition:.2s;
    display:inline-flex;
    align-items:center;
    gap:5px;
}

.footer-rsu ul li a::before{
    content:'›';
    color:#1C145C;
    opacity:.4;
    font-size:15px;
}

.footer-rsu a:hover{
    color:#1C145C;
    padding-left:3px;
}

/* CONTACT */
.footer-rsu .footer-contact-row{
    display:flex;
    align-items:flex-start;
    gap:11px;
    margin-bottom:16px;
}

.footer-rsu .footer-contact-icon{
    width:34px;
    height:34px;
    border-radius:8px;
    background:rgba(28,20,92,.07);
    border:1px solid rgba(28,20,92,.1);
    display:flex;
    align-items:center;
    justify-content:center;
    color:#1C145C;
    flex-shrink:0;
}

.footer-rsu .footer-contact-text{
    font-size:13px;
    color:#5a5480;
    line-height:1.7;
    word-break:normal;
}

/* HR */
.footer-rsu hr{
    height:1px;
    background:linear-gradient(
        90deg,
        rgba(28,20,92,0) 0%,
        rgba(28,20,92,.12) 30%,
        rgba(28,20,92,.12) 70%,
        rgba(28,20,92,0) 100%
    );
    border:none;
    margin:36px 0 0;
}

/* BOTTOM */
.footer-rsu .footer-bottom{
    background:rgba(28,20,92,.05);
    padding:15px 36px;
}

.footer-rsu .footer-copy{
    font-size:12.5px;
    color:#9994bb;
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:12px;
}

.footer-rsu .footer-copy-badge{
    background:rgba(28,20,92,.06);
    border:1px solid rgba(28,20,92,.12);
    border-radius:20px;
    padding:4px 14px;
    font-size:11.5px;
    color:#7a74a0;
    white-space:nowrap;
}

.footer-rsu .footer-accent-dot{
    display:inline-block;
    width:3px;
    height:3px;
    border-radius:50%;
    background:#1C145C;
    opacity:.25;
    margin:0 8px;
}

/* TABLET */
@media(max-width:991px){

    .footer-rsu{
        padding:45px 0 0;
    }

    .footer-rsu .row > div{
        margin-bottom:24px;
    }

    .footer-rsu .footer-desc{
        max-width:100%;
    }
}

/* MOBILE */
@media(max-width:768px){

    .footer-rsu{
        padding:40px 0 0;
    }

    .footer-rsu .container-fluid{
        padding-left:20px !important;
        padding-right:20px !important;
    }

    .footer-rsu .footer-copy{
        flex-direction:column;
        align-items:flex-start;
        gap:8px;
    }

    .footer-rsu .footer-bottom{
        padding:15px 20px;
    }

    .footer-rsu a:hover{
        padding-left:0;
    }

    .footer-rsu .footer-logo{
        height:34px;
    }
}
</style>

<footer class="footer-rsu">

    <div class="footer-ornament"></div>
    <div class="footer-ornament2"></div>

    <div class="container-fluid px-lg-5 px-4">

        <div class="row g-5 justify-content-between">

            <!-- BRAND -->
            <div class="col-lg-3 col-md-12">

                <img src="{{ asset('images/beranda/logo-almed.png') }}"
                     class="footer-logo"
                     alt="Logo RSU Allam Medica">

                <h5 class="footer-title">
                    RSU Allam Medica Bumiayu
                </h5>

                <p class="footer-desc">
                    Jl. Pangeran Diponegoro No. 609,
                    Jatisawit, Bumiayu, Kabupaten Brebes,
                    Jawa Tengah 52273
                </p>

                <div class="footer-social">
                    <a href="https://www.tiktok.com/@rsuallammedicabumiayu" target="_blank">
                        <i class="bi bi-tiktok"></i>
                    </a>
                    <a href="https://www.facebook.com/allam.medicabmy" target="_blank">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://www.instagram.com/allam.medica/" target="_blank">
                        <i class="bi bi-instagram"></i>
                    </a>
                </div>

                <div class="footer-mitra-label">
                    Akreditasi & Mitra
                </div>

                <div class="footer-mitra">
                    <img src="{{ asset('images/beranda/paripurna.png') }}" alt="">
                    <img src="{{ asset('images/beranda/bpjs.png') }}" alt="">
                </div>

            </div>

            <!-- TAUTAN CEPAT -->
            <div class="col-lg-2 col-md-4 col-6">

                <h6 class="footer-heading">Tautan Cepat</h6>

                <ul>
                    <li><a href="{{ route('beranda') }}">Beranda</a></li>
                    <li><a href="{{ url('/artikel') }}">Artikel</a></li>
                    <li><a href="{{ url('/download') }}">Download</a></li>
                    <li><a href="{{ url('/tentang') }}">Tentang Kami</a></li>
                    <li><a href="{{ url('/mutu') }}">Mutu</a></li>
                    <li><a href="{{ url('/kontak') }}">Kontak</a></li>
                </ul>

            </div>

            <!-- MENU -->
            <div class="col-lg-2 col-md-4 col-6">

                <h6 class="footer-heading">Menu</h6>

                <ul>
                    <li><a href="{{ url('/karir') }}">Karir</a></li>
                    <li><a href="{{ url('/berita') }}">Berita</a></li>
                    <li><a href="{{ url('/video') }}">Video</a></li>
                </ul>

            </div>

            <!-- LAYANAN -->
            <div class="col-lg-2 col-md-4 col-6">

                <h6 class="footer-heading">Layanan</h6>

                <ul>
                    <li><a href="{{ url('/layanan#igd') }}">IGD 24 Jam</a></li>
                    <li><a href="{{ url('/layanan#rawatjalan') }}">Rawat Jalan</a></li>
                    <li><a href="{{ url('/layanan#rawatinap') }}">Rawat Inap</a></li>
                    <li><a href="{{ url('/layanan#ambulans') }}">Ambulans</a></li>
                    <li><a href="{{ url('/layanan#laboratorium') }}">Laboratorium</a></li>
                    <li><a href="{{ url('/layanan#radiologi') }}">Radiologi</a></li>
                    <li><a href="{{ url('/layanan#farmasi') }}">Farmasi</a></li>
                    <li><a href="{{ url('/layanan#mcu') }}">Medical Check Up</a></li>
                </ul>

            </div>

            <!-- KONTAK -->
            <div class="col-lg-3 col-md-12">

                <h6 class="footer-heading">Hubungi Kami</h6>

                <div class="footer-contact-row">
                    <div class="footer-contact-icon">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <div class="footer-contact-text">
                        (0289) 430822
                    </div>
                </div>

                <div class="footer-contact-row">
                    <div class="footer-contact-icon">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <div class="footer-contact-text">
                        allam.medica@yahoo.co.id
                    </div>
                </div>

                <div class="footer-contact-row">
                    <div class="footer-contact-icon">
                        <i class="bi bi-clock-fill"></i>
                    </div>
                    <div class="footer-contact-text">
                        IGD, Lab & Farmasi : 24 Jam<br>
                        Rawat Jalan : Sen – Sab 07.00 – 21.00
                    </div>
                </div>

                <div class="footer-contact-row">
                    <div class="footer-contact-icon">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <div class="footer-contact-text">
                        Jl. Pangeran Diponegoro No. 609,<br>
                        Bumiayu, Brebes
                    </div>
                </div>

            </div>

        </div>

        <hr>

    </div>

    <div class="footer-bottom">

        <div class="container-fluid px-lg-5 px-4">

            <div class="footer-copy">
                <span>
                    © 2026 RSU Allam Medica
                    <span class="footer-accent-dot"></span>
                    Hak Cipta Dilindungi
                </span>

                <span class="footer-copy-badge">
                    Melayani dengan Sepenuh Hati
                </span>
            </div>

        </div>

    </div>

</footer>
<!-- END FOOTER -->

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>