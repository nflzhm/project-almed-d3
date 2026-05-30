<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Layanan — RSU Allam Medica</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">
</head>

<style>

body {
    font-family: 'Segoe UI', sans-serif;
    background: #ffffff;
    overflow-x: hidden;
}

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

.topbar-info i { font-size: 11px; opacity: .8; }

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

.topbar-social a:hover { color: #fff; transform: translateY(-1px); }

.navbar-float-wrap {
    position: fixed;
    top: 38px;
    left: 0;
    width: 100%;
    z-index: 9998;
    padding: 12px 20px;
}

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
    box-shadow: 0 8px 32px rgba(15, 23, 42, .08), inset 0 1px 0 rgba(255, 255, 255, .22);
    transition: background .3s ease, border .3s ease, box-shadow .3s ease;
}

.navbar-float.scrolled {
    background: rgba(255, 255, 255, .14);
    backdrop-filter: blur(26px) saturate(200%);
    -webkit-backdrop-filter: blur(26px) saturate(200%);
    border: 1px solid rgba(255, 255, 255, .22);
    box-shadow: 0 10px 40px rgba(15, 23, 42, .10), inset 0 1px 0 rgba(255, 255, 255, .28);
}

.navbar-float::before {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: inherit;
    background: linear-gradient(180deg, rgba(255, 255, 255, .20), rgba(255, 255, 255, .02));
    pointer-events: none;
}

.nav-logo { position: relative; z-index: 2; }
.navbar-float .nav-logo img { height: 38px; object-fit: contain; display: block; }

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

.nav-link-pill:hover { background: rgba(255, 255, 255, .25); color: #1C145C; transform: translateY(-1px); }

.nav-link-pill.active {
    background: rgba(255, 255, 255, .35);
    color: #1C145C;
    font-weight: 600;
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, .4), 0 4px 10px rgba(255, 255, 255, .12);
}

.drop-wrap { position: relative; }

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

.drop-item:hover { background: rgba(255, 255, 255, .55); color: #1C145C; }

.chevron { font-size: 11px; opacity: .6; transition: .25s; }
.drop-wrap:hover .chevron { transform: rotate(180deg); }

.nav-cta { position: relative; z-index: 2; }

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

.btn-kontak:hover { background: #2a1e8a; transform: translateY(-1px); }

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

.nav-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(15, 23, 42, 0);
    z-index: 9999990;
    transition: background .3s ease;
}

.nav-overlay.show { display: block; background: rgba(15, 23, 42, 0.42); }

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

.nav-drawer.open { transform: translateX(0); }

.drawer-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 16px 14px;
    border-bottom: 1px solid rgba(0, 0, 0, .07);
    flex-shrink: 0;
}

.drawer-label { font-size: 11px; font-weight: 700; color: #94a3b8; letter-spacing: .8px; text-transform: uppercase; }

.drawer-close-btn {
    width: 30px; height: 30px; border-radius: 50%;
    background: rgba(28, 20, 92, .08); border: none;
    display: flex; align-items: center; justify-content: center;
    color: #1C145C; cursor: pointer; font-size: 14px; transition: .2s;
}

.drawer-close-btn:hover { background: rgba(28, 20, 92, .14); }

.drawer-nav {
    flex: 1; padding: 10px;
    display: flex; flex-direction: column; gap: 2px;
    overflow-y: auto;
}

.d-link {
    display: flex; align-items: center; gap: 10px;
    padding: 10px 12px; border-radius: 12px;
    font-size: 14px; font-weight: 500; color: #1e293b;
    text-decoration: none; transition: .16s;
}

.d-link:hover { background: rgba(28, 20, 92, .06); color: #1C145C; text-decoration: none; }
.d-link.active { background: rgba(28, 20, 92, .09); color: #1C145C; font-weight: 600; }

.d-icon {
    width: 22px; height: 22px; border-radius: 7px;
    background: rgba(28, 20, 92, .08);
    display: flex; align-items: center; justify-content: center;
    font-size: 12px; color: #1C145C; flex-shrink: 0; transition: .16s;
}

.d-link.active .d-icon { background: #1C145C; color: #fff; }

.d-group-label {
    font-size: 10px; font-weight: 700; color: #94a3b8;
    letter-spacing: .7px; text-transform: uppercase;
    padding: 12px 12px 4px;
}

.d-sub { padding-left: 6px; }
.d-divider { height: 1px; background: rgba(0, 0, 0, .07); margin: 6px 2px; }

.drawer-footer { padding: 12px 14px 24px; border-top: 1px solid rgba(0, 0, 0, .07); flex-shrink: 0; }
.drawer-footer .btn-kontak { border-radius: 14px; display: block; text-align: center; padding: 12px 22px; }

@media (max-width: 1100px) { .nav-link-pill { padding: 7px 11px; font-size: 13px; } }

@media (max-width: 991px) {
    body { padding-top: calc(38px + 64px); }
    .navbar-float-wrap { padding: 10px 12px; }
    .navbar-float { border-radius: 26px; padding: 10px 14px; }
    .nav-links, .nav-cta { display: none; }
    .nav-burger { display: flex; }
    .topbar-info span { font-size: 10px; }
    .topbar-social { gap: 10px; }
}

@media (max-width: 480px) {
    .topbar .container { gap: 8px; }
    .topbar-info { gap: 8px; }
    .topbar-info span { font-size: 9px; }
    .topbar-social a { font-size: 12px; }
    .navbar-float { border-radius: 22px; }
}
</style>


<!-- TOPBAR -->
<div class="topbar">
    <div class="container">
        <div class="topbar-info">
            <span><i class="bi bi-telephone-fill"></i> 085292224886</span>
            <span><i class="bi bi-envelope-fill"></i> allam.medica@yahoo.co.id</span>
        </div>
        <div class="topbar-social">
            <a href="https://www.tiktok.com/@rsuallammedicabumiayu?_t=8fLMQk9idhI&_r=1" target="_blank"><i class="bi bi-tiktok"></i></a>
            <a href="https://www.facebook.com/allam.medicabmy?mibextid=LQQJ4d" target="_blank"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/allam.medica/" target="_blank"><i class="bi bi-instagram"></i></a>
        </div>
    </div>
</div>


<!-- FLOATING NAVBAR -->
<div class="navbar-float-wrap">
    <nav class="navbar-float" id="mainNavbar">
        <a href="/" class="nav-logo">
            <img src="{{ asset('images/beranda/logo-almed.png') }}" alt="RSU Allam Medica">
        </a>
        <div class="nav-links">
            <a href="/" class="nav-link-pill {{ request()->is('/') ? 'active' : '' }}">Beranda</a>
            <div class="drop-wrap">
                <a href="#" class="nav-link-pill {{ request()->is('karir*','berita*','video*') ? 'active' : '' }}">
                    Menu <i class="bi bi-chevron-down chevron"></i>
                </a>
                <div class="drop-menu">
                    <a href="{{ url('/karir') }}" class="drop-item"><i class="bi bi-briefcase"></i> Karir</a>
                    <a href="{{ url('/berita') }}" class="drop-item"><i class="bi bi-newspaper"></i> Berita</a>
                    <a href="{{ url('/video') }}" class="drop-item"><i class="bi bi-play-circle"></i> Video</a>
                </div>
            </div>
            <a href="/layanan"  class="nav-link-pill {{ request()->is('layanan*')  ? 'active' : '' }}">Layanan</a>
            <a href="/artikel"  class="nav-link-pill {{ request()->is('artikel*')  ? 'active' : '' }}">Artikel</a>
            <a href="/download" class="nav-link-pill {{ request()->is('download*') ? 'active' : '' }}">Download</a>
            <a href="/tentang"  class="nav-link-pill {{ request()->is('tentang*')  ? 'active' : '' }}">Tentang Kami</a>
            <a href="/mutu"     class="nav-link-pill {{ request()->is('mutu*')     ? 'active' : '' }}">Mutu</a>
        </div>
        <div class="nav-cta">
            <a href="/kontak" class="btn-kontak">Kontak</a>
        </div>
        <button class="nav-burger" id="navBurger" aria-label="Toggle menu">
            <span></span><span></span><span></span>
        </button>
    </nav>
</div>


<!-- OVERLAY -->
<div class="nav-overlay" id="navOverlay"></div>


<!-- SIDE DRAWER Mobile -->
<aside class="nav-drawer" id="navDrawer" aria-label="Mobile navigation">
    <div class="drawer-header">
        <span class="drawer-label">Menu</span>
        <button class="drawer-close-btn" id="drawerClose" aria-label="Tutup menu">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>
    <nav class="drawer-nav">
        <a href="/" class="d-link {{ request()->is('/') ? 'active' : '' }}">
            <span class="d-icon"><i class="bi bi-house"></i></span> Beranda
        </a>
        <div class="d-group-label">Konten</div>
        <div class="d-sub">
            <a href="{{ url('/karir') }}"  class="d-link {{ request()->is('karir*')  ? 'active' : '' }}"><span class="d-icon"><i class="bi bi-briefcase"></i></span> Karir</a>
            <a href="{{ url('/berita') }}" class="d-link {{ request()->is('berita*') ? 'active' : '' }}"><span class="d-icon"><i class="bi bi-newspaper"></i></span> Berita</a>
            <a href="{{ url('/video') }}"  class="d-link {{ request()->is('video*')  ? 'active' : '' }}"><span class="d-icon"><i class="bi bi-play-circle"></i></span> Video</a>
        </div>
        <div class="d-divider"></div>
        <a href="/layanan"  class="d-link {{ request()->is('layanan*')  ? 'active' : '' }}"><span class="d-icon"><i class="bi bi-hospital"></i></span> Layanan</a>
        <a href="/artikel"  class="d-link {{ request()->is('artikel*')  ? 'active' : '' }}"><span class="d-icon"><i class="bi bi-journal-text"></i></span> Artikel</a>
        <a href="/download" class="d-link {{ request()->is('download*') ? 'active' : '' }}"><span class="d-icon"><i class="bi bi-download"></i></span> Download</a>
        <a href="/tentang"  class="d-link {{ request()->is('tentang*')  ? 'active' : '' }}"><span class="d-icon"><i class="bi bi-info-circle"></i></span> Tentang Kami</a>
        <a href="/mutu"     class="d-link {{ request()->is('mutu*')     ? 'active' : '' }}"><span class="d-icon"><i class="bi bi-patch-check"></i></span> Mutu</a>
    </nav>
    <div class="drawer-footer">
        <a href="/kontak" class="btn-kontak">Kontak</a>
    </div>
</aside>


<!-- SCRIPT NAVBAR -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const burger      = document.getElementById('navBurger');
    const drawer      = document.getElementById('navDrawer');
    const overlay     = document.getElementById('navOverlay');
    const closeBtn    = document.getElementById('drawerClose');
    const navbar      = document.getElementById('mainNavbar');
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
    drawer.querySelectorAll('.d-link').forEach(function (link) { link.addEventListener('click', closeDrawer); });
    window.addEventListener('scroll', function () { navbar.classList.toggle('scrolled', window.scrollY > 10); }, { passive: true });
});
</script>


<style>
/* ============================
   HERO
============================ */
.layanan-hero {
    background: linear-gradient(150deg, #1C145C 0%, #231a72 40%, #0ea5e9 100%);
    padding: 80px 0 72px;
    position: relative;
    overflow: hidden;
}

@media (max-width: 768px) {
    .layanan-hero { margin-top: -70px; padding-top: 100px; }
}

.layanan-hero::before {
    content: '';
    position: absolute; right: -80px; top: -80px;
    width: 420px; height: 420px; border-radius: 50%;
    background: radial-gradient(circle, rgba(255,255,255,.06), transparent 65%);
    pointer-events: none;
}

.layanan-hero::after {
    content: '';
    position: absolute; left: -40px; bottom: -100px;
    width: 300px; height: 300px; border-radius: 50%;
    background: radial-gradient(circle, rgba(14,165,233,.12), transparent 65%);
    pointer-events: none;
}

.hero-dots {
    position: absolute; inset: 0; pointer-events: none;
    background-image: radial-gradient(rgba(255,255,255,.05) 1px, transparent 1px);
    background-size: 26px 26px;
}

.hero-inner { position: relative; z-index: 2; padding-top: 40px; }

.hero-bc { display: flex; align-items: center; gap: 8px; margin-bottom: 20px; }
.hero-bc a { color: rgba(255,255,255,.6); font-size: 13px; font-weight: 500; text-decoration: none; transition: color .2s; display: flex; align-items: center; gap: 5px; }
.hero-bc a:hover { color: #fff; }
.hero-bc .sep { color: rgba(255,255,255,.25); font-size: 11px; }
.hero-bc .cur { color: rgba(255,255,255,.8); font-size: 13px; font-weight: 600; }

.hero-kat {
    display: inline-flex; align-items: center; gap: 6px;
    background: rgba(14,165,233,.85); color: #fff;
    font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 1px;
    padding: 5px 14px; border-radius: 20px; margin-bottom: 18px;
    box-shadow: 0 3px 12px rgba(14,165,233,.35);
}

.hero-title {
    font-family: 'DM Serif Display', serif;
    font-size: clamp(28px, 4.5vw, 46px);
    color: #fff; line-height: 1.2; letter-spacing: -.3px; margin-bottom: 18px; font-weight: 400;
}

.hero-meta { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
.hero-meta-pill {
    display: inline-flex; align-items: center; gap: 6px;
    background: rgba(255,255,255,.1); border: 1px solid rgba(255,255,255,.15);
    color: rgba(255,255,255,.8); font-size: 12px; font-weight: 600;
    padding: 5px 13px; border-radius: 20px; backdrop-filter: blur(6px);
}
.hero-meta-pill i { font-size: 10px; color: #7dd3fc; }

.hero-stats {
    display: flex; gap: 0; margin-top: 32px;
    background: rgba(255,255,255,.08); border: 1px solid rgba(255,255,255,.14);
    border-radius: 16px; overflow: hidden; backdrop-filter: blur(12px); width: fit-content;
}

.hero-stat-item { padding: 14px 28px; text-align: center; border-right: 1px solid rgba(255,255,255,.1); }
.hero-stat-item:last-child { border-right: none; }
.hero-stat-num { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 900; font-size: 22px; color: #fff; display: block; line-height: 1; }
.hero-stat-label { font-size: 10px; color: rgba(255,255,255,.6); margin-top: 5px; letter-spacing: .3px; }

/* ============================
   BODY LIST
============================ */
.layanan-body { padding: 52px 0 80px; background: #ffffff; }

.filter-bar {
    background: #fff; border-radius: 14px; border: 1px solid #e8edf5;
    padding: 16px 20px; display: flex; align-items: center; gap: 12px;
    margin-bottom: 28px; flex-wrap: wrap;
    box-shadow: 0 2px 10px rgba(28,20,92,.06);
}

.filter-search-wrap { position: relative; flex: 1; min-width: 200px; }
.filter-search-wrap i { position: absolute; left: 13px; top: 50%; transform: translateY(-50%); color: #94a3b8; font-size: 13px; pointer-events: none; }
.filter-search {
    width: 100%; padding: 9px 13px 9px 36px;
    border: 1.5px solid #e2e8f0; border-radius: 10px;
    font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13.5px; color: #1e293b;
    outline: none; background: #f8faff; transition: border-color .2s, box-shadow .2s;
}
.filter-search::placeholder { color: #b0bec5; }
.filter-search:focus { border-color: #0ea5e9; box-shadow: 0 0 0 3px rgba(14,165,233,.12); background: #fff; }

.filter-select {
    padding: 9px 28px 9px 12px; border: 1.5px solid #e2e8f0; border-radius: 10px;
    font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13px; color: #1e293b;
    outline: none; background: #f8faff; appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%2364748b' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
    background-repeat: no-repeat; background-position: right 10px center; cursor: pointer;
}
.filter-select:focus { border-color: #0ea5e9; outline: none; }

.section-heading { font-family: 'DM Serif Display', serif; font-size: 28px; font-weight: 400; color: #1C145C; margin-bottom: 6px; letter-spacing: -.3px; }
.section-sub { font-size: 14px; color: #64748b; margin-bottom: 24px; }
.section-divider { display: flex; align-items: center; gap: 12px; margin-bottom: 24px; }
.section-divider::after { content: ''; flex: 1; height: 1.5px; background: linear-gradient(to right, #e2e8f0, transparent); }

/* ============================
   CARD LIST
============================ */
.layanan-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
    gap: 22px;
    padding: 20px 0 32px;
}

.lcard {
    background: #fff; border-radius: 18px; border: 1px solid #e8edf5;
    overflow: hidden; display: flex; flex-direction: column; cursor: default;
    transition: transform .28s cubic-bezier(.22,.68,0,1.2), box-shadow .28s, border-color .28s;
    animation: fadeUpCard .45s cubic-bezier(.22,.68,0,1.2) both;
}

@keyframes fadeUpCard { from { opacity: 0; transform: translateY(22px); } to { opacity: 1; transform: translateY(0); } }

.lcard:hover { transform: translateY(-6px); box-shadow: 0 16px 40px rgba(28,20,92,.11); border-color: #AFA9EC; }

/* ── CARD THUMBNAIL: fixed height, cover ── */
.lcard-thumb {
    position: relative;
    background: #f0eeff;
    flex-shrink: 0;
}

.lcard-thumb img {
    width: 100%;
    height: auto;
    display: block;
    transition: transform .4s ease;
}

.lcard:hover .lcard-thumb img { transform: scale(1.04); }

.lcard-thumb-placeholder {
    height: 200px; display: flex; align-items: center; justify-content: center;
    background: linear-gradient(135deg, #EEEDFE 0%, #E6F1FB 100%);
}
.lcard-thumb-placeholder i { font-size: 48px; color: #CECBF6; }

.lcard-kat {
    position: absolute; top: 10px; left: 10px;
    background: rgba(28,20,92,.82); backdrop-filter: blur(6px);
    color: #fff; font-size: 10px; font-weight: 800; text-transform: uppercase;
    letter-spacing: .7px; padding: 3px 10px; border-radius: 20px;
}

.lcard-status-badge {
    position: absolute; top: 10px; right: 10px;
    font-size: 9px; font-weight: 800; padding: 4px 10px;
    border-radius: 20px; text-transform: uppercase; letter-spacing: .5px;
}
.lcard-status-badge.aktif    { background: #E1F5EE; color: #0F6E56; border: 1px solid #9FE1CB; }
.lcard-status-badge.nonaktif { background: #F1EFE8; color: #888; border: 1px solid #D3D1C7; }

.lcard-body { padding: 18px 20px; flex: 1; display: flex; flex-direction: column; }
.lcard-title { font-family: 'DM Serif Display', serif; font-size: 17px; font-weight: 400; color: #1C145C; line-height: 1.35; margin-bottom: 8px; }
.lcard-desc {
    font-size: 13px; color: #64748b; line-height: 1.65; flex: 1;
    display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;
    overflow: hidden; margin-bottom: 16px;
}
.lcard-divider { height: 1px; background: #f0edf8; margin: 12px 0 10px; }
.lcard-contacts { display: flex; flex-direction: column; gap: 6px; }
.lcard-contact-row { display: flex; align-items: center; gap: 7px; font-size: 11.5px; color: #a09bbf; }
.lcard-contact-row i { font-size: 12px; color: #7F77DD; flex-shrink: 0; }
.lcard-contact-row span { color: #3a3260; font-weight: 600; }

.lcard-footer {
    display: flex; align-items: center; justify-content: space-between;
    margin-top: 4px; padding: 14px 20px 18px; border-top: 1px solid #eef2f7;
    gap: 8px; flex-wrap: wrap;
}

.lcard-wa-btn {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 7px 13px; border-radius: 9px; font-size: 12px; font-weight: 700;
    background: #E1F5EE; color: #0F6E56; text-decoration: none;
    border: 1px solid #9FE1CB; transition: background .2s, transform .15s;
}
.lcard-wa-btn:hover { background: #9FE1CB; color: #085041; transform: scale(1.02); text-decoration: none; }
.lcard-wa-btn i { font-size: 14px; }

.lcard-read-btn {
    display: inline-flex; align-items: center; justify-content: center; gap: 8px;
    padding: 9px 18px; border-radius: 12px; background: #1C145C; color: #fff;
    font-size: 13px; font-weight: 700; text-decoration: none; border: none; cursor: pointer;
    font-family: 'Plus Jakarta Sans', sans-serif; transition: all .25s ease;
}
.lcard-read-btn i { font-size: 12px; transition: transform .25s ease; }
.lcard-read-btn:hover { background: #2a1f7a; transform: translateY(-2px); color: #fff; }
.lcard-read-btn:hover i { transform: translateX(3px); }

.empty-state { grid-column: 1 / -1; padding: 80px 24px; text-align: center; color: #64748b; }
.empty-state .es-icon { width: 72px; height: 72px; border-radius: 20px; background: #e0f2fe; color: #0ea5e9; display: flex; align-items: center; justify-content: center; font-size: 28px; margin: 0 auto 16px; }
.empty-state .es-title { font-family: 'DM Serif Display', serif; font-size: 20px; font-weight: 400; color: #1e293b; margin-bottom: 6px; }
.empty-state .es-sub { font-size: 13.5px; }

/* ============================
   DETAIL PAGE
============================ */
#page-list   { display: block; }
#page-detail { display: none; }

.detail-page-wrap { background: #f8faff; min-height: 80vh; padding-bottom: 80px; animation: fadeUpDetail .38s cubic-bezier(.22,.68,0,1.2); }
@keyframes fadeUpDetail { from { opacity: 0; transform: translateY(18px); } to { opacity: 1; transform: translateY(0); } }

.detail-back-mobile {
    display: none; align-items: center; gap: 8px; padding: 20px 0 0;
    font-size: 13px; font-weight: 700; color: #534AB7; cursor: pointer;
    border: none; background: none; transition: gap .2s, color .2s;
    font-family: 'Plus Jakarta Sans', sans-serif;
}
.detail-back-mobile:hover { color: #1C145C; gap: 12px; }
.detail-back-mobile i { font-size: 14px; }
@media (max-width: 991px) { .detail-back-mobile { display: inline-flex; } }

.detail-hero-strip {
    background: linear-gradient(135deg, #1C145C 0%, #2d2080 55%, #3b5bdb 100%);
    margin-top: -110px;
    padding: 250px 0 80px;
    position: relative; overflow: hidden;
}
@media (max-width: 991px) { .detail-hero-strip { margin-top: -90px; padding: 170px 0 60px; } }
@media (max-width: 768px)  { .detail-hero-strip { margin-top: -90px; padding: 120px 0 60px; } }

.detail-hero-strip::before {
    content: ''; position: absolute; right: -60px; top: -60px;
    width: 360px; height: 360px; border-radius: 50%;
    background: radial-gradient(circle, rgba(255,255,255,.05), transparent 65%); pointer-events: none;
}
.detail-hero-strip::after {
    content: ''; position: absolute; left: -30px; bottom: -80px;
    width: 260px; height: 260px; border-radius: 50%;
    background: radial-gradient(circle, rgba(59,91,219,.15), transparent 65%); pointer-events: none;
}

.detail-hero-dots { position: absolute; inset: 0; background-image: radial-gradient(rgba(255,255,255,.04) 1px, transparent 1px); background-size: 20px 24px; pointer-events: none; }
.detail-hero-inner { position: relative; z-index: 2; }

.detail-hero-kat-pill {
    display: inline-flex; align-items: center; gap: 7px;
    background: rgba(255,255,255,.12); border: 1px solid rgba(255,255,255,.22);
    color: rgba(255,255,255,.9); font-size: 11px; font-weight: 800;
    text-transform: uppercase; letter-spacing: 1px; padding: 5px 14px;
    border-radius: 20px; backdrop-filter: blur(6px); margin-bottom: 16px;
}

.detail-hero-title {
    font-family: 'DM Serif Display', serif; font-weight: 400;
    font-size: clamp(26px, 3.8vw, 44px); color: #fff;
    line-height: 1.18; letter-spacing: -.4px; margin-bottom: 20px;
}

.detail-hero-chips { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
.detail-hero-chip {
    display: inline-flex; align-items: center; gap: 5px;
    background: rgba(255,255,255,.09); border: 1px solid rgba(255,255,255,.16);
    color: rgba(255,255,255,.82); font-size: 12px; font-weight: 600;
    padding: 5px 13px; border-radius: 20px; backdrop-filter: blur(6px);
}
.detail-hero-chip i { font-size: 11px; color: #7dd3fc; }
.detail-hero-chip.aktif { background: rgba(16,185,129,.18); border-color: rgba(16,185,129,.35); color: #6ee7b7; }
.detail-hero-chip.aktif i { color: #6ee7b7; }

.detail-content-area { margin-top: 36px; position: relative; z-index: 5; padding-bottom: 40px; }

.detail-main-card {
    background: #fff; border-radius: 20px; border: 1px solid #e8edf5;
    box-shadow: 0 8px 32px rgba(28,20,92,.07);
    /* PENTING: tidak ada overflow:hidden di sini supaya gambar bebas */
}

/* ============================
   FIX UTAMA: GAMBAR DETAIL
   Tidak ada height, tidak ada overflow hidden
   Biarkan gambar menentukan tingginya sendiri
============================ */
.detail-img-wrap {
    position: relative;
    width: 100%;
    background: #f5f3ff;
    border-radius: 20px 20px 0 0;
    overflow: hidden;
}

.detail-img-wrap img {
    width: 100%;
    height: auto;
    display: block;
}
/* ============================
   END FIX GAMBAR
============================ */

.detail-img-placeholder {
    height: 240px; display: flex; align-items: center; justify-content: center;
    background: linear-gradient(135deg, #EEEDFE 0%, #E6F1FB 100%);
    border-radius: 20px 20px 0 0;
}
.detail-img-placeholder i { font-size: 80px; color: #CECBF6; }

.detail-img-overlay-badge {
    position: absolute; bottom: 16px; left: 16px;
    background: rgba(28,20,92,.75); backdrop-filter: blur(10px);
    color: #fff; font-size: 11px; font-weight: 700;
    padding: 6px 14px; border-radius: 20px; letter-spacing: .5px;
}

.detail-body-pad { padding: 32px 36px; }
@media (max-width: 768px) { .detail-body-pad { padding: 24px 20px; } }

.detail-section-label {
    font-size: 10px; font-weight: 800; letter-spacing: 1.5px; text-transform: uppercase;
    color: #0ea5e9; margin-bottom: 8px; display: flex; align-items: center; gap: 6px;
}
.detail-section-label::before { content: ''; width: 16px; height: 2px; background: #0ea5e9; border-radius: 2px; display: inline-block; }

.detail-body-text { font-size: 15.5px; color: #374151; line-height: 1.9; }
.detail-body-text p { margin-bottom: 1em; }
.detail-body-text p:last-child { margin-bottom: 0; }

.detail-card-divider { height: 1px; background: #f0edf8; margin: 28px 36px; }
@media (max-width: 768px) { .detail-card-divider { margin: 20px; } }

.detail-share-bar {
    display: flex; align-items: center; justify-content: space-between;
    margin: 28px 36px 0; padding: 16px 20px;
    background: #f8faff; border: 1px solid #e8edf5; border-radius: 14px;
    flex-wrap: wrap; gap: 12px;
}
@media (max-width: 768px) { .detail-share-bar { margin: 20px 20px 0; } }

.share-label { font-size: 13px; font-weight: 700; color: #64748b; display: flex; align-items: center; gap: 6px; }
.share-btns { display: flex; gap: 8px; }
.share-btn {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 7px 16px; border-radius: 8px; border: none;
    font-family: 'Plus Jakarta Sans', sans-serif; font-size: 12.5px; font-weight: 700;
    cursor: pointer; text-decoration: none; transition: transform .2s, box-shadow .2s;
}
.share-btn:hover { transform: translateY(-2px); }
.btn-wa   { background: #25D366; color: #fff; box-shadow: 0 3px 10px rgba(37,211,102,.3); }
.btn-wa:hover   { color: #fff; }
.btn-copy { background: #f1f5f9; color: #475569; border: 1.5px solid #e2e8f0; }
.btn-copy.copied { background: #10b981; color: #fff; border-color: #10b981; }

.other-section { padding: 28px 36px 0; }
@media (max-width: 768px) { .other-section { padding: 20px 20px 0; } }

.other-section-title {
    font-family: 'DM Serif Display', serif; font-weight: 400; font-size: 20px; color: #1C145C;
    margin-bottom: 16px; padding-bottom: 12px; border-bottom: 1px solid #EAE7F5;
    display: flex; align-items: center; gap: 10px;
}
.other-section-title::before { content: ''; width: 4px; height: 20px; background: linear-gradient(180deg, #534AB7, #AFA9EC); border-radius: 999px; display: inline-block; }

.other-card {
    display: flex; gap: 12px; align-items: flex-start;
    padding: 12px; background: #fff; border: 1px solid #EAE7F5;
    border-radius: 14px; cursor: pointer;
    transition: border-color .2s, transform .2s, box-shadow .2s;
    text-decoration: none; color: inherit;
}
.other-card:hover { border-color: #AFA9EC; transform: translateX(4px); box-shadow: 0 4px 14px rgba(28,20,92,.07); }

.other-card-img { width: 64px; height: 64px; border-radius: 10px; object-fit: cover; background: #F5F3FF; flex-shrink: 0; border: 1px solid #EAE7F5; }
.other-card-placeholder { width: 64px; height: 64px; border-radius: 10px; background: linear-gradient(135deg, #EEEDFE, #E6F1FB); flex-shrink: 0; display: flex; align-items: center; justify-content: center; border: 1px solid #EAE7F5; }
.other-card-placeholder i { font-size: 24px; color: #CECBF6; }
.other-card-name { font-family: 'DM Serif Display', serif; font-weight: 400; font-size: 13px; color: #1C145C; line-height: 1.35; margin-bottom: 4px; }
.other-card-desc { font-size: 11.5px; color: #9590b0; line-height: 1.5; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }

.detail-sidebar { position: static; }
@media (min-width: 992px) { .detail-sidebar { position: static; } }

.detail-infobox { background: #fff; border: 1px solid #EAE7F5; border-radius: 20px; overflow: hidden; box-shadow: 0 6px 24px rgba(28,20,92,.07); }
.detail-infobox-header { background: linear-gradient(135deg, #1C145C 0%, #534AB7 100%); padding: 20px 22px; position: relative; overflow: hidden; }
.detail-infobox-header::after { content: ''; position: absolute; right: -20px; top: -20px; width: 100px; height: 100px; border-radius: 50%; background: rgba(255,255,255,.06); pointer-events: none; }
.detail-infobox-header h3 { font-family: 'DM Serif Display', serif; font-weight: 400; font-size: 17px; color: #fff; letter-spacing: .3px; margin-bottom: 3px; position: relative; z-index: 1; }
.detail-infobox-header p { font-size: 11.5px; color: rgba(255,255,255,.6); margin: 0; position: relative; z-index: 1; }
.detail-infobox-body { padding: 18px 20px; }

.info-row { display: flex; align-items: flex-start; gap: 12px; padding: 10px 0; border-bottom: 1px solid #F0EDF8; }
.info-row:last-child { border-bottom: none; padding-bottom: 0; }
.info-icon { width: 36px; height: 36px; border-radius: 10px; background: #EEEDFE; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.info-icon i { font-size: 15px; color: #534AB7; }
.info-icon.green { background: #E1F5EE; }
.info-icon.green i { color: #0F6E56; }
.info-icon.red { background: #FCEAEA; }
.info-icon.red i { color: #c0392b; }
.info-text-label { font-size: 10px; color: #a09bbf; font-weight: 700; letter-spacing: .3px; text-transform: uppercase; }
.info-text-val { font-size: 13.5px; color: #1C145C; font-weight: 700; margin-top: 2px; }

.detail-wa-btn {
    display: flex; align-items: center; justify-content: center; gap: 9px;
    margin-top: 16px; padding: 13px 20px; border-radius: 13px;
    font-size: 13.5px; font-weight: 700; background: #1D9E75; color: #fff;
    text-decoration: none; border: none; transition: background .2s, transform .15s;
    width: 100%; font-family: 'Plus Jakarta Sans', sans-serif; cursor: pointer;
}
.detail-wa-btn:hover { background: #0F6E56; color: #fff; text-decoration: none; transform: scale(1.02); }
.detail-wa-btn i { font-size: 18px; }

.detail-tel-btn {
    display: flex; align-items: center; justify-content: center; gap: 9px;
    margin-top: 10px; padding: 11px 20px; border-radius: 13px;
    font-size: 13px; font-weight: 700; background: #FCEAEA; color: #c0392b;
    text-decoration: none; border: 1px solid #F09595;
    transition: background .2s, transform .15s;
    width: 100%; font-family: 'Plus Jakarta Sans', sans-serif; cursor: pointer;
}
.detail-tel-btn:hover { background: #F09595; color: #791F1F; text-decoration: none; transform: scale(1.01); }
.detail-tel-btn i { font-size: 15px; }

.detail-jadwal-btn {
    display: block; margin-top: 16px; text-decoration: none; border-radius: 20px; overflow: hidden;
    border: 1.5px solid #070058;
    background: linear-gradient(135deg, #EEEDFE 0%, #E6F1FB 100%);
    transition: transform .2s, box-shadow .2s, border-color .2s;
    box-shadow: 0 4px 16px rgba(83,74,183,.10);
}
.detail-jadwal-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(8,0,99,.51); border-color: #1C145C; text-decoration: none; }
.detail-jadwal-btn-inner { display: flex; align-items: center; gap: 14px; padding: 18px 20px; }
.detail-jadwal-icon { width: 46px; height: 46px; border-radius: 14px; background: #fff; border: 1px solid #08006363; display: flex; align-items: center; justify-content: center; font-size: 22px; color: #1C145C; flex-shrink: 0; }
.detail-jadwal-text { flex: 1; }
.detail-jadwal-label { font-size: 14px; font-weight: 800; color: #1C145C; line-height: 1.2; }
.detail-jadwal-sub { font-size: 11.5px; color: #1C145C; margin-top: 3px; font-weight: 500; }
.detail-jadwal-arrow { font-size: 22px; color: #1C145C; flex-shrink: 0; transition: transform .2s; }
.detail-jadwal-btn:hover .detail-jadwal-arrow { transform: translateX(4px); }

/* ============================
   FOOTER
============================ */
.footer-rsu {
    background: linear-gradient(to bottom, #ffffff 0%, #fefefd 3%, #fdfcf6 8%, #fcfbf3 13%, #faf8ee 20%, #f7f5e8 30%, #f3f0e1 45%, #ede9d9 65%, #e8e3d2 85%, #e3deca 100%);
    color: #1C145C; padding: 56px 0 0; position: relative; overflow: hidden;
}
.footer-rsu .footer-ornament { position: absolute; right: -80px; bottom: -150px; width: 420px; height: 420px; opacity: 0.07; background-image: url('{{ asset("images/beranda/ornamen.png") }}'); background-size: contain; background-repeat: no-repeat; background-position: center; pointer-events: none; z-index: 0; }
.footer-rsu .footer-ornament2 { position: absolute; left: -100px; top: 40px; width: 340px; height: 340px; opacity: 0.04; background-image: url('{{ asset("images/beranda/ornamen.png") }}'); background-size: contain; background-repeat: no-repeat; background-position: center; pointer-events: none; z-index: 0; }
.footer-rsu .container-fluid { max-width: 1100px; position: relative; z-index: 1; }
.footer-rsu .footer-logo { height: 50px; display: block; margin-bottom: 16px; }
.footer-rsu .footer-title { font-size: 16px; font-weight: 700; color: #1C145C; margin-bottom: 8px; }
.footer-rsu .footer-desc { font-size: 13px; line-height: 1.8; color: #5a5480; margin-bottom: 20px; max-width: 290px; }
.footer-rsu .footer-social { display: flex; gap: 10px; margin-bottom: 22px; }
.footer-rsu .footer-social a { width: 36px; height: 36px; border-radius: 50%; background: rgba(28,20,92,.07); border: 1px solid rgba(28,20,92,.15); display: flex; align-items: center; justify-content: center; color: #1C145C; text-decoration: none; font-size: 15px; transition: .2s ease; }
.footer-rsu .footer-social a:hover { background: #1C145C; color: #FEFCF1; transform: translateY(-2px); }
.footer-rsu .footer-mitra-label { font-size: 11px; color: #9994bb; text-transform: uppercase; letter-spacing: .08em; margin-bottom: 10px; }
.footer-rsu .footer-mitra { display: flex; gap: 10px; align-items: center; flex-wrap: wrap; }
.footer-rsu .footer-mitra img:nth-child(1) { height: 35px; }
.footer-rsu .footer-mitra img:nth-child(2) { height: 26px; }
.footer-rsu .footer-heading { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 900; font-size: 12px; color: #1C145C; text-transform: uppercase; letter-spacing: .14em; margin-bottom: 16px; padding-bottom: 10px; border-bottom: 1.5px solid rgba(28,20,92,.12); }
.footer-rsu ul { list-style: none; padding: 0; margin: 0; }
.footer-rsu ul li { margin-bottom: 9px; }
.footer-rsu a { color: #5a5480; text-decoration: none; font-size: 13.5px; transition: .2s ease; display: inline-flex; align-items: center; gap: 5px; }
.footer-rsu ul li a::before { content: '›'; color: #1C145C; opacity: .4; font-size: 15px; line-height: 1; }
.footer-rsu a:hover { color: #1C145C; padding-left: 3px; }
.footer-rsu .footer-contact-row { display: flex; align-items: flex-start; gap: 11px; margin-bottom: 13px; }
.footer-rsu .footer-contact-icon { width: 33px; height: 33px; border-radius: 8px; background: rgba(28,20,92,.07); border: 1px solid rgba(28,20,92,.1); display: flex; align-items: center; justify-content: center; font-size: 14px; color: #1C145C; flex-shrink: 0; }
.footer-rsu .footer-contact-text { font-size: 13px; color: #5a5480; line-height: 1.65; padding-top: 4px; }
.footer-rsu hr { height: 1px; background: linear-gradient(90deg, rgba(28,20,92,0) 0%, rgba(28,20,92,.12) 30%, rgba(28,20,92,.12) 70%, rgba(28,20,92,0) 100%); border: none; margin: 36px 0 0; }
.footer-rsu .footer-bottom { background: rgba(28,20,92,.05); padding: 15px 36px; position: relative; z-index: 1; }
.footer-rsu .footer-copy { font-size: 12.5px; color: #9994bb; display: flex; justify-content: space-between; align-items: center; gap: 12px; }
.footer-rsu .footer-copy-badge { background: rgba(28,20,92,.06); border: 1px solid rgba(28,20,92,.12); border-radius: 20px; padding: 4px 14px; font-size: 11.5px; color: #7a74a0; white-space: nowrap; }
.footer-rsu .footer-accent-dot { display: inline-block; width: 3px; height: 3px; border-radius: 50%; background: #1C145C; opacity: .25; margin: 0 8px; vertical-align: middle; }

/* ============================
   RESPONSIVE
============================ */
@media (max-width: 991px) {
    .footer-rsu { padding: 45px 0 0; }
    .footer-rsu .row > div { margin-bottom: 28px; }
    .footer-rsu .footer-desc { max-width: 100%; }
    .detail-sidebar { position: static; margin-top: 28px; }
}

@media (max-width: 768px) {
    body { padding-top: 102px; }
    .layanan-hero { padding: 85px 0 72px; }
    .hero-stats { width: 100%; max-width: calc(100% - 28px); }
    .hero-stat-item { padding: 12px 16px; }
    .hero-stat-num  { font-size: 18px; }
    .layanan-body { padding: 36px 0 60px; }
    .layanan-grid { grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 14px; }
    .footer-rsu { padding: 40px 0 0; }
    .footer-rsu .container-fluid { padding-left: 20px !important; padding-right: 20px !important; }
    .footer-rsu .footer-copy { flex-direction: column; align-items: flex-start; gap: 8px; }
    .footer-rsu .footer-bottom { padding: 15px 20px; }
    .footer-rsu a:hover { padding-left: 0; }
}

@media (max-width: 480px) {
    .layanan-grid { grid-template-columns: 1fr; }
    .filter-bar { flex-direction: column; align-items: stretch; }
    .filter-search-wrap { min-width: unset; }
    .lcard-footer { flex-direction: column; align-items: stretch; }
    .lcard-read-btn { width: 100%; justify-content: center; }
}
</style>


{{-- PAGE: LIST --}}
<div id="page-list">

    <section class="layanan-hero">
        <div class="hero-dots"></div>
        <div class="container hero-inner">

            <div class="hero-bc">
                <a href="/"><i class="bi bi-house-fill"></i> Beranda</a>
                <span class="sep"><i class="bi bi-chevron-right"></i></span>
                <span class="cur">Layanan</span>
            </div>

            <div class="hero-kat">
                <i class="fa-solid fa-hospital-user" style="font-size:10px;"></i>
                Poliklinik &amp; Layanan Medis
            </div>

            <h1 class="hero-title">
                Layanan<br>
                <em>RSU Allam Medica</em>
            </h1>

            <div class="hero-meta">
                <span class="hero-meta-pill">
                    <i class="fa-solid fa-hospital"></i>
                    RSU Allam Medica Bumiayu
                </span>
                <span class="hero-meta-pill" id="hero-count">
                    <i class="fa-solid fa-stethoscope"></i>
                    12 Layanan Aktif
                </span>
                <span class="hero-meta-pill">
                    <i class="fa-solid fa-clock"></i>
                    IGD 24 Jam
                </span>
            </div>

            <div class="hero-stats">
                <div class="hero-stat-item">
                    <span class="hero-stat-num" id="stat-total">12</span>
                    <div class="hero-stat-label">Total Layanan</div>
                </div>
                <div class="hero-stat-item">
                    <span class="hero-stat-num" id="stat-aktif">12</span>
                    <div class="hero-stat-label">Layanan Aktif</div>
                </div>
                <div class="hero-stat-item">
                    <span class="hero-stat-num">24<small style="font-size:13px">/7</small></span>
                    <div class="hero-stat-label">IGD Siaga</div>
                </div>
                <div class="hero-stat-item">
                    <span class="hero-stat-num">BPJS</span>
                    <div class="hero-stat-label">Menerima BPJS</div>
                </div>
            </div>

        </div>
    </section>

    <section class="layanan-body">
        <div class="container">

            <div class="filter-bar">
                <div class="filter-search-wrap">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="search" class="filter-search" id="searchLayanan"
                           placeholder="Cari nama layanan atau poliklinik...">
                </div>
                <select class="filter-select" id="filterKat">
                    <option value="">Semua Kategori</option>
                    <option value="poli">Poliklinik</option>
                    <option value="igd">IGD</option>
                    <option value="rawat">Rawat Inap</option>
                    <option value="penunjang">Penunjang</option>
                </select>
                <select class="filter-select" id="filterSort">
                    <option value="default">Urutan Default</option>
                    <option value="az">A — Z</option>
                    <option value="za">Z — A</option>
                </select>
            </div>

            <div class="section-divider">
                <div>
                    <div class="section-heading">Semua Layanan</div>
                    <div class="section-sub">Pilih poliklinik yang Anda butuhkan dan buat janji temu dengan mudah</div>
                </div>
            </div>

            <div class="layanan-grid" id="layananGrid"></div>

        </div>
    </section>

</div>


{{-- PAGE: DETAIL --}}
<div id="page-detail">

    <div class="detail-hero-strip" id="det-hero-strip">
        <div class="detail-hero-dots"></div>
        <div class="container detail-hero-inner">
            <div class="detail-hero-kat-pill" id="det-hero-kat-pill">
                <i class="fa-solid fa-stethoscope" style="font-size:10px;"></i>
                <span id="det-hero-kat-label">Poliklinik</span>
            </div>
            <h1 class="detail-hero-title" id="det-hero-title">Nama Layanan</h1>
            <div class="detail-hero-chips" id="det-hero-chips"></div>
        </div>
    </div>

    <div class="detail-content-area">
        <div class="container">
            <div class="row g-4">

                <div class="col-lg-8">
                    <div class="detail-main-card">

                        <!-- Image — diisi JS -->
                        <div id="det-img-wrap"></div>

                        <!-- Body -->
                        <div class="detail-body-pad">
                            <div class="detail-section-label">Tentang Layanan Ini</div>
                            <div class="detail-body-text" id="det-body"></div>
                        </div>

                        <div class="detail-card-divider"></div>

                        <!-- Share -->
                        <div class="detail-share-bar">
                            <div class="share-label">
                                <i class="fa-solid fa-share-nodes" style="color:#0ea5e9;"></i>
                                Bagikan layanan ini
                            </div>
                            <div class="share-btns">
                                <a id="det-wa-share" href="#" target="_blank" class="share-btn btn-wa">
                                    <i class="fa-brands fa-whatsapp"></i> WhatsApp
                                </a>
                                <button class="share-btn btn-copy" id="copyBtn" onclick="copyLink()">
                                    <i class="fa-solid fa-link"></i> Salin Link
                                </button>
                            </div>
                        </div>

                        <!-- Layanan lainnya -->
                        <div class="other-section">
                            <div class="other-section-title">Layanan Lainnya</div>
                            <div class="row g-2" id="det-others"></div>
                        </div>

                        <div style="height:32px;"></div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="detail-sidebar">

                        <div class="detail-infobox">
                            <div class="detail-infobox-header">
                                <h3>Informasi Kontak</h3>
                                <p>Hubungi kami untuk janji temu</p>
                            </div>
                            <div class="detail-infobox-body" id="det-infobox-body"></div>
                        </div>

                        <a href="{{ route('jadwaldokter') }}" class="detail-jadwal-btn" id="det-jadwal-btn">
                            <div class="detail-jadwal-btn-inner">
                                <div class="detail-jadwal-icon">
                                    <i class="bi bi-calendar2-week-fill"></i>
                                </div>
                                <div class="detail-jadwal-text">
                                    <div class="detail-jadwal-label">Lihat Jadwal Dokter</div>
                                    <div class="detail-jadwal-sub">Cek jadwal & ketersediaan dokter</div>
                                </div>
                                <i class="bi bi-arrow-right-circle-fill detail-jadwal-arrow"></i>
                            </div>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </div>

</div>


{{-- DATA LAYANAN --}}
<script>
    const jadwalDokterUrl = "{{ route('jadwaldokter') }}";
</script>

<script>
const layananData = {!! json_encode($layananData) !!};

const katIcons = {
    poli:      'fa-stethoscope',
    igd:       'fa-truck-medical',
    rawat:     'fa-bed',
    penunjang: 'fa-flask',
};

const katLabel = {
    poli:      'Poliklinik',
    igd:       'IGD',
    rawat:     'Rawat Inap',
    penunjang: 'Penunjang',
};

/* ── RENDER CARD ── */
function cardHtml(item, idx) {
    const icon  = katIcons[item.kategori] || 'fa-hospital';
    const label = katLabel[item.kategori] || item.kategori;
    const delay = Math.min(idx * 0.06, 0.5);
    const noWa  = item.no_wa ? item.no_wa.replace(/\D/g, '') : '';
    const waLink = noWa ? 'https://wa.me/' + noWa : '';

    return `
    <div class="lcard" style="animation-delay:${delay}s">
        <div class="lcard-thumb">
            ${item.gambar
                ? `<img src="${item.gambar}" alt="${item.poli}" loading="lazy">`
                : `<div class="lcard-thumb-placeholder"><i class="fa-solid ${icon}"></i></div>`}
            <span class="lcard-kat">${label}</span>
            <span class="lcard-status-badge ${item.status}">${item.status === 'aktif' ? 'Aktif' : 'Nonaktif'}</span>
        </div>
        <div class="lcard-body">
            <div class="lcard-title">${item.poli}</div>
            <div class="lcard-desc">${item.deskripsi}</div>
            ${item.no_hp || waLink ? `
            <div class="lcard-divider"></div>
            <div class="lcard-contacts">
                ${item.no_hp ? `<div class="lcard-contact-row"><i class="bi bi-telephone-fill"></i><span>${item.no_hp}</span></div>` : ''}
            </div>` : ''}
        </div>
        <div class="lcard-footer">
            ${waLink ? `<a href="${waLink}" target="_blank" rel="noopener" class="lcard-wa-btn"><i class="bi bi-whatsapp"></i> WhatsApp</a>` : `<div></div>`}
            <button class="lcard-read-btn" onclick="showDetail(${item.id})">
                Detail <i class="bi bi-arrow-right"></i>
            </button>
        </div>
    </div>`;
}

/* ── RENDER GRID ── */
function renderCards(data) {
    const grid = document.getElementById('layananGrid');
    if (!data.length) {
        grid.innerHTML = `
        <div class="empty-state">
            <div class="es-icon"><i class="fa-solid fa-hospital-slash"></i></div>
            <div class="es-title">Layanan Tidak Ditemukan</div>
            <div class="es-sub">Coba kata kunci atau filter yang berbeda.</div>
        </div>`;
        return;
    }
    grid.innerHTML = data.map((item, i) => cardHtml(item, i)).join('');
    const aktifCount = data.filter(d => d.status === 'aktif').length;
    const heroCount  = document.getElementById('hero-count');
    if (heroCount) heroCount.innerHTML = `<i class="fa-solid fa-stethoscope"></i> ${aktifCount} Layanan Aktif`;
}

/* ── FILTER & SORT ── */
function applyFilter() {
    const q   = document.getElementById('searchLayanan').value.toLowerCase().trim();
    const kat = document.getElementById('filterKat').value;
    const srt = document.getElementById('filterSort').value;

    let filtered = layananData.filter(function(item) {
        const matchQ = !q || item.poli.toLowerCase().includes(q) || item.deskripsi.toLowerCase().includes(q);
        const matchK = !kat || item.kategori === kat;
        return matchQ && matchK;
    });

    if (srt === 'az') filtered.sort((a, b) => a.poli.localeCompare(b.poli, 'id'));
    if (srt === 'za') filtered.sort((a, b) => b.poli.localeCompare(a.poli, 'id'));

    renderCards(filtered);
}

document.getElementById('searchLayanan').addEventListener('input', applyFilter);
document.getElementById('filterKat').addEventListener('change', applyFilter);
document.getElementById('filterSort').addEventListener('change', applyFilter);

renderCards(layananData);

(function() {
    const total = layananData.length;
    const aktif = layananData.filter(d => d.status === 'aktif').length;
    const elTotal = document.getElementById('stat-total');
    const elAktif = document.getElementById('stat-aktif');
    if (elTotal) elTotal.textContent = total;
    if (elAktif) elAktif.textContent = aktif;
})();


/* ── DETAIL ── */
function showDetail(id) {
    const item = layananData.find(function(d) { return d.id == id; });
    if (!item) return;

    const icon  = katIcons[item.kategori] || 'fa-hospital';
    const label = katLabel[item.kategori] || item.kategori;
    const noWa  = item.no_wa ? item.no_wa.replace(/\D/g, '') : '';
    const waLink = noWa ? 'https://wa.me/' + noWa : '';

    /* HERO */
    document.getElementById('det-hero-kat-label').textContent = label;
    document.getElementById('det-hero-title').textContent     = item.poli;

    const chips = document.getElementById('det-hero-chips');
    chips.innerHTML = `
        <span class="detail-hero-chip ${item.status === 'aktif' ? 'aktif' : ''}">
            <i class="bi bi-${item.status === 'aktif' ? 'check-circle-fill' : 'x-circle-fill'}"></i>
            ${item.status === 'aktif' ? 'Layanan Aktif' : 'Tidak Aktif'}
        </span>
        <span class="detail-hero-chip">
            <i class="bi bi-building-cross"></i> RSU Allam Medica
        </span>
        ${item.no_hp ? `<span class="detail-hero-chip"><i class="bi bi-telephone-fill"></i>${item.no_hp}</span>` : ''}
    `;

    /* ============================================================
       FIX UTAMA: GAMBAR DETAIL
       - Tidak ada height fixed
       - Tidak ada object-fit
       - width:100% + height:auto = gambar tampil penuh sesuai aslinya
    ============================================================ */
    const imgWrap = document.getElementById('det-img-wrap');

    // Reset dulu semua style di wrapper
    imgWrap.removeAttribute('style');
    imgWrap.className = 'detail-img-wrap';

    if (item.gambar) {
        imgWrap.innerHTML = `
            <img src="${item.gambar}"
                 alt="${item.poli}"
                 style="width:100%;height:auto;display:block;">
            <div class="detail-img-overlay-badge">
                <i class="fa-solid ${icon}" style="margin-right:5px;"></i>${label}
            </div>`;
    } else {
        imgWrap.innerHTML = `
            <div class="detail-img-placeholder">
                <i class="fa-solid ${icon}"></i>
            </div>`;
    }
    /* ============================================================ */

    /* BODY TEXT */
    const bodyEl = document.getElementById('det-body');
    if (item.deskripsi) {
        const paragraphs = item.deskripsi.split(/\n+/).filter(function(p) { return p.trim(); });
        bodyEl.innerHTML = paragraphs.map(function(p) { return '<p>' + p + '</p>'; }).join('');
    } else {
        bodyEl.innerHTML = '<p style="color:#a09bbf">Deskripsi layanan belum tersedia.</p>';
    }

    /* SHARE */
    const waShare = document.getElementById('det-wa-share');
    if (waShare) {
        const shareText = encodeURIComponent(item.poli + ' — RSU Allam Medica\n' + window.location.href);
        waShare.href = 'https://wa.me/?text=' + shareText;
    }

    /* INFOBOX */
    let infoHtml = '';
    infoHtml += `
    <div class="info-row">
        <div class="info-icon"><i class="bi bi-hospital"></i></div>
        <div><div class="info-text-label">Layanan</div><div class="info-text-val">${item.poli}</div></div>
    </div>
    <div class="info-row">
        <div class="info-icon"><i class="fa-solid ${icon}" style="font-size:14px;color:#534AB7;"></i></div>
        <div><div class="info-text-label">Kategori</div><div class="info-text-val">${label}</div></div>
    </div>`;
    if (item.no_hp) {
        infoHtml += `
    <div class="info-row">
        <div class="info-icon red"><i class="bi bi-telephone-fill"></i></div>
        <div><div class="info-text-label">Telepon</div><div class="info-text-val">${item.no_hp}</div></div>
    </div>`;
    }
    if (noWa) {
        infoHtml += `
    <div class="info-row">
        <div class="info-icon green"><i class="bi bi-whatsapp"></i></div>
        <div><div class="info-text-label">WhatsApp</div><div class="info-text-val">+${noWa}</div></div>
    </div>`;
    }

    let btnHtml = '';
    if (noWa) btnHtml += `<a href="https://wa.me/${noWa}" target="_blank" rel="noopener" class="detail-wa-btn"><i class="bi bi-whatsapp"></i> Chat WhatsApp</a>`;
    if (item.no_hp) btnHtml += `<a href="tel:${item.no_hp}" class="detail-tel-btn"><i class="bi bi-telephone-fill"></i> Hubungi via Telepon</a>`;

    document.getElementById('det-infobox-body').innerHTML = infoHtml + btnHtml;

    /* OTHERS */
    const others = layananData.filter(function(d) { return d.id != id; }).slice(0, 6);
    document.getElementById('det-others').innerHTML = others.map(function(o) {
        const oIcon = katIcons[o.kategori] || 'fa-hospital';
        return `
        <div class="col-12 col-sm-6" onclick="showDetail(${o.id})" style="cursor:pointer">
            <div class="other-card">
                ${o.gambar
                    ? `<img src="${o.gambar}" class="other-card-img" alt="${o.poli}">`
                    : `<div class="other-card-placeholder"><i class="fa-solid ${oIcon}"></i></div>`}
                <div>
                    <div class="other-card-name">${o.poli}</div>
                    <div class="other-card-desc">${o.deskripsi || 'Tidak ada deskripsi.'}</div>
                </div>
            </div>
        </div>`;
    }).join('');

    /* JADWAL LINK */
    const jadwalBtn = document.getElementById('det-jadwal-btn');
    if (jadwalBtn) jadwalBtn.href = jadwalDokterUrl + '?poli=' + encodeURIComponent(item.kategori);

    /* SWITCH PAGE */
    document.getElementById('page-list').style.display   = 'none';
    document.getElementById('page-detail').style.display = 'block';
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function showList() {
    document.getElementById('page-detail').style.display = 'none';
    document.getElementById('page-list').style.display   = 'block';
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

/* ── COPY LINK ── */
function copyLink() {
    const btn = document.getElementById('copyBtn');
    if (!btn) return;
    navigator.clipboard.writeText(window.location.href).then(function() {
        btn.classList.add('copied');
        btn.innerHTML = '<i class="fa-solid fa-check"></i> Tersalin!';
        setTimeout(function() { btn.classList.remove('copied'); btn.innerHTML = '<i class="fa-solid fa-link"></i> Salin Link'; }, 2500);
    }).catch(function() {
        const ta = document.createElement('textarea');
        ta.value = window.location.href;
        document.body.appendChild(ta); ta.select(); document.execCommand('copy'); document.body.removeChild(ta);
        btn.classList.add('copied'); btn.innerHTML = '<i class="fa-solid fa-check"></i> Tersalin!';
        setTimeout(function() { btn.classList.remove('copied'); btn.innerHTML = '<i class="fa-solid fa-link"></i> Salin Link'; }, 2500);
    });
}
</script>


<!-- FOOTER -->
<footer class="footer-rsu">
    <div class="footer-ornament"></div>
    <div class="footer-ornament2"></div>
    <div class="container-fluid px-lg-5 px-4">
        <div class="row justify-content-between">
            <div class="col-lg-4 col-md-6">
                <img src="{{ asset('images/beranda/logo-almed.png') }}" class="footer-logo" alt="Logo RSU Allam Medica">
                <h5 class="footer-title">RSU Allam Medica Bumiayu</h5>
                <p class="footer-desc">Jl. Pangeran Diponegoro No. 609, Jatisawit, Bumiayu, Kabupaten Brebes, Jawa Tengah 52273</p>
                <div class="footer-social">
                    <a href="https://www.tiktok.com/@rsuallammedicabumiayu?_t=8fLMQk9idhI&_r=1" target="_blank" title="TikTok"><i class="bi bi-tiktok"></i></a>
                    <a href="https://www.facebook.com/allam.medicabmy?mibextid=LQQJ4d" target="_blank" title="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/allam.medica/" target="_blank" title="Instagram"><i class="bi bi-instagram"></i></a>
                </div>
                <div class="footer-mitra-label">Akreditasi &amp; Mitra</div>
                <div class="footer-mitra">
                    <img src="{{ asset('images/beranda/paripurna.png') }}" alt="Akreditasi Paripurna">
                    <img src="{{ asset('images/beranda/bpjs.png') }}" alt="BPJS Kesehatan">
                </div>
            </div>
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
            <div class="col-lg-2 col-md-6">
                <h6 class="footer-heading">Menu</h6>
                <ul>
                    <li><a href="video">Video</a></li>
                    <li><a href="karir">Karir</a></li>
                    <li><a href="berita">Berita</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-12">
                <h6 class="footer-heading">Hubungi Kami</h6>
                <div class="footer-contact-row"><div class="footer-contact-icon"><i class="bi bi-telephone-fill"></i></div><div class="footer-contact-text">(0289) 430822</div></div>
                <div class="footer-contact-row"><div class="footer-contact-icon"><i class="bi bi-envelope-fill"></i></div><div class="footer-contact-text">allam.medica@yahoo.co.id</div></div>
                <div class="footer-contact-row"><div class="footer-contact-icon"><i class="bi bi-clock-fill"></i></div><div class="footer-contact-text">IGD: 24 Jam<br>Rawat Jalan: Sen – Sab 07.00 – 21.00</div></div>
                <div class="footer-contact-row"><div class="footer-contact-icon"><i class="bi bi-geo-alt-fill"></i></div><div class="footer-contact-text">Jl. Pangeran Diponegoro No.609,<br>Bumiayu, Brebes</div></div>
            </div>
        </div>
        <hr>
    </div>
    <div class="footer-bottom">
        <div class="container-fluid px-lg-5 px-4">
            <div class="footer-copy">
                <span>© 2026 RSU Allam Medica <span class="footer-accent-dot"></span> Hak Cipta Dilindungi</span>
                <span class="footer-copy-badge">Melayani dengan Sepenuh Hati</span>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>