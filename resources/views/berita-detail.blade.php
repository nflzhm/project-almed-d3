@php
use Illuminate\Support\Str;
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $berita->judul }} - RSU Allam Medica</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="{{ asset('assets/logoalmed.png') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
/* ================= BREADCRUMB ================= */
        section {
            position: relative;
            z-index: 1;
        }

        .breadcrumb-wrap {
            background: transparent;
            border-bottom: none;
            padding: 30px 0 5px;
            margin-top: 15px;
            position: relative;
            z-index: 1;
        }

        /* Container breadcrumb */
        .breadcrumb {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            margin-bottom: 0;
        }

        /* Item breadcrumb */
        .breadcrumb-item {
            display: flex;
            align-items: center;
            font-size: 13px;
            line-height: 1.5;
        }

        /* Link & active disamakan */
        .breadcrumb-item a,
        .breadcrumb-item.active {
            display: inline-flex;
            align-items: center;
            font-size: 13px;
            line-height: 1.5;
        }

        /* Warna */
        .breadcrumb-item a {
            color: #1C145C;
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: #888;
        }

        /* Separator "/" */
        .breadcrumb-item + .breadcrumb-item::before {
            display: inline-flex;
            align-items: center;
            color: #aaa;
            margin: 0 6px;
        }
        /* ================= HERO IMAGE ================= */
        .detail-hero {
            width: 100%;
            height: auto;
            max-height: none;
            object-fit: contain;
            display: block;
            border-radius: 16px;
            margin-bottom: 28px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.10);
        }

        /* ================= ARTICLE WRAPPER ================= */
        .article-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.06);
            padding: 40px 48px;
            margin-bottom: 40px;
        }

        @media (max-width: 768px) {
            .article-card { padding: 24px 20px; }
        }

        /* ================= META ================= */
        .article-meta {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 16px;
            margin-bottom: 18px;
        }
        .meta-badge {
            background: #EEF0FF;
            color: #1C145C;
            border-radius: 20px;
            padding: 4px 14px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        .meta-date {
            color: #888;
            font-size: 13px;
        }
        .meta-date i { margin-right: 5px; }

        /* ================= JUDUL ================= */
        .article-title {
            font-size: 30px;
            font-weight: 800;
            color: #1C145C;
            line-height: 1.3;
            margin-bottom: 20px;
        }
        @media (max-width: 768px) {
            .article-title { font-size: 22px; }
        }

        /* ================= DIVIDER ================= */
        .article-divider {
            border: none;
            border-top: 2px solid #EEF0FF;
            margin: 24px 0;
        }

        /* ================= KONTEN ================= */
        .article-content {
            font-size: 15.5px;
            color: #333;
            line-height: 1.85;
        }
        .article-content p {
            margin-bottom: 16px;
        }
        .article-content img {
            max-width: 100%;
            border-radius: 10px;
            margin: 10px 0;
        }

        /* ================= SHARE ================= */
        .share-wrap {
            background: #f5f6ff;
            border-radius: 14px;
            padding: 18px 24px;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 36px;
        }
        .share-label {
            font-size: 13px;
            font-weight: 700;
            color: #1C145C;
        }
        .share-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: opacity 0.2s;
        }
        .share-btn:hover { opacity: 0.85; }
        .share-fb  { background: #1877F2; color: #fff; }
        .share-wa  { background: #25D366; color: #fff; }
        .share-tw  { background: #1DA1F2; color: #fff; }
        .share-copy { background: #1C145C; color: #fff; cursor: pointer; border: none; }

        /* ================= BACK BUTTON ================= */
        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #1C145C;
            color: #fff;
            border-radius: 20px;
            padding: 9px 22px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s;
            margin-bottom: 28px;
        }
        .btn-back:hover { background: #150f4a; color: #fff; }

        /* ================= BERITA LAINNYA ================= */
        .related-title {
            font-size: 20px;
            font-weight: 800;
            color: #1C145C;
            margin-bottom: 20px;
        }
        .related-card {
            border: 1px solid #eee;
            border-radius: 16px;
            overflow: hidden;
            background: #fff;
            height: 100%;
            transition: box-shadow 0.25s, transform 0.25s;
        }
        .related-card:hover {
            box-shadow: 0 8px 24px rgba(28,20,92,0.10);
            transform: translateY(-3px);
        }
        .related-card img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            display: block;
        }
        .related-card-body {
            padding: 14px 16px;
            text-align: center;
        }
        .related-card-body h6 {
            font-size: 14px;
            font-weight: 700;
            color: #1C145C;
            margin-bottom: 8px;
        }
        .related-card-body p {
            font-size: 12px;
            color: #666;
            margin-bottom: 10px;
        }
        .related-card-body a {
            display: inline-block;
            padding: 5px 14px;
            background: #1C145C;
            color: white;
            text-decoration: none;
            border-radius: 20px;
            font-size: 12px;
        }
        .related-card-body a:hover { background: #150f4a; }
</style>

<body>

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
    background: #ffffff;
    overflow-x: hidden;
    padding-top: calc(38px + 70px);
    position: relative;
}

/* ============================================================
   TOPBAR
============================================================ */
.topbar { background: linear-gradient(90deg,#1C145C 0%,#34258d 50%,#1C145C 100%); position:fixed; top:0;left:0;width:100%;height:38px;z-index:10000;display:flex;align-items:center; }
.topbar .container { display:flex;align-items:center;justify-content:space-between; }
.topbar-info { display:flex;align-items:center;gap:14px; }
.topbar-info span { color:rgba(255,255,255,.88);font-size:12px;display:flex;align-items:center;gap:6px;white-space:nowrap; }
.topbar-social { display:flex;align-items:center;gap:12px; }
.topbar-social a { color:rgba(255,255,255,.75);font-size:14px;text-decoration:none;transition:.2s; }
.topbar-social a:hover { color:#fff; }
@media(max-width:991px) { .topbar-info span { font-size:10px; } .topbar-social { gap:10px; } }
@media(max-width:480px) { .topbar-info span { font-size:9px; } }

/* ============================================================
   NAVBAR
============================================================ */
.navbar-float-wrap { position:fixed;top:38px;left:0;width:100%;z-index:9998;padding:12px 20px; }
.navbar-float { max-width:1200px;margin:0 auto;position:relative;display:flex;align-items:center;justify-content:space-between;gap:10px;padding:10px 14px 10px 22px;border-radius:60px;background:rgba(255,255,255,0.07);backdrop-filter:blur(22px) saturate(180%);-webkit-backdrop-filter:blur(22px) saturate(180%);border:1px solid rgba(255,255,255,0.16);box-shadow:0 8px 32px rgba(15,23,42,.08),inset 0 1px 0 rgba(255,255,255,.22);transition:background .3s,border .3s,box-shadow .3s; }
.navbar-float.scrolled { background:rgba(255,255,255,.14);border:1px solid rgba(255,255,255,.22);box-shadow:0 10px 40px rgba(15,23,42,.10),inset 0 1px 0 rgba(255,255,255,.28); }
.navbar-float::before { content:"";position:absolute;inset:0;border-radius:inherit;background:linear-gradient(180deg,rgba(255,255,255,.20),rgba(255,255,255,.02));pointer-events:none; }
.nav-logo { position:relative;z-index:2; }
.navbar-float .nav-logo img { height:38px;object-fit:contain;display:block; }
.nav-links { display:flex;align-items:center;justify-content:center;flex:1;gap:2px;position:relative;z-index:2; }
.nav-link-pill { padding:8px 15px;border-radius:50px;font-size:14px;font-weight:500;color:#0f172a;text-decoration:none;white-space:nowrap;display:inline-flex;align-items:center;gap:4px;transition:background .2s,color .2s,transform .2s; }
.nav-link-pill:hover { background:rgba(255,255,255,.25);color:#1C145C;transform:translateY(-1px); }
.nav-link-pill.active { background:rgba(255,255,255,.35);color:#1C145C;font-weight:600; }
.drop-wrap { position:relative; }
.drop-menu { position:absolute;top:calc(100% + 12px);left:50%;transform:translateX(-50%) translateY(8px);min-width:200px;padding:8px;border-radius:22px;background:rgba(255,255,255,.92);backdrop-filter:blur(24px);border:1px solid rgba(255,255,255,.35);box-shadow:0 12px 35px rgba(15,23,42,.14);opacity:0;visibility:hidden;transition:.22s;z-index:100; }
.drop-wrap:hover .drop-menu { opacity:1;visibility:visible;transform:translateX(-50%) translateY(0); }
.drop-item { display:flex;align-items:center;gap:9px;padding:9px 13px;border-radius:12px;font-size:13.5px;color:#334155;text-decoration:none;transition:.18s;font-weight:500; }
.drop-item:hover { background:rgba(28,20,92,.07);color:#1C145C; }
.drop-item i { font-size:14px;color:#64748b;flex-shrink:0; }
.drop-item:hover i { color:#1C145C; }
.drop-divider { height:1px;background:rgba(0,0,0,.07);margin:4px 8px; }
.chevron { font-size:11px;opacity:.6;transition:.25s; }
.drop-wrap:hover .chevron { transform:rotate(180deg); }
.nav-cta { position:relative;z-index:2; }
.btn-kontak { padding:10px 22px;border-radius:50px;background:#1C145C;color:#fff!important;text-decoration:none!important;font-size:14px;font-weight:600;display:inline-block;border:none;box-shadow:0 8px 20px rgba(28,20,92,.25);transition:.2s; }
.btn-kontak:hover { background:#2a1e8a;transform:translateY(-1px); }
.nav-burger { display:none;flex-direction:column;gap:5px;cursor:pointer;border:none;background:transparent;padding:6px;position:relative;z-index:2; }
.nav-burger span { width:22px;height:2px;background:#1C145C;border-radius:2px;display:block;transition:.3s; }
.nav-burger.open span:nth-child(1) { transform:translateY(7px) rotate(45deg); }
.nav-burger.open span:nth-child(2) { opacity:0; }
.nav-burger.open span:nth-child(3) { transform:translateY(-7px) rotate(-45deg); }

/* DRAWER (MOBILE) */
.nav-overlay { display:none;position:fixed;inset:0;background:rgba(15,23,42,0);z-index:9999990;transition:background .3s; }
.nav-overlay.show { display:block;background:rgba(15,23,42,0.42); }
.nav-drawer { position:fixed;top:0;right:0;width:72%;max-width:300px;height:100dvh;z-index:9999995;transform:translateX(100%);transition:transform .32s cubic-bezier(.4,0,.2,1);background:rgba(255,255,255,0.97);backdrop-filter:blur(24px) saturate(180%);border-left:1px solid rgba(255,255,255,0.45);box-shadow:-8px 0 32px rgba(15,23,42,.12);display:flex;flex-direction:column;overflow-y:auto;overscroll-behavior:contain; }
.nav-drawer.open { transform:translateX(0); }
.drawer-header { display:flex;align-items:center;justify-content:space-between;padding:20px 16px 14px;border-bottom:1px solid rgba(0,0,0,.07);flex-shrink:0; }
.drawer-label { font-size:11px;font-weight:700;color:#94a3b8;letter-spacing:.8px;text-transform:uppercase; }
.drawer-close-btn { width:30px;height:30px;border-radius:50%;background:rgba(28,20,92,.08);border:none;display:flex;align-items:center;justify-content:center;color:#1C145C;cursor:pointer;font-size:14px; }
.drawer-nav { flex:1;padding:8px 10px;display:flex;flex-direction:column;gap:1px;overflow-y:auto; }
.d-link { display:flex;align-items:center;gap:10px;padding:10px 12px;border-radius:12px;font-size:14px;font-weight:500;color:#1e293b;text-decoration:none;transition:.16s; }
.d-link:hover { background:rgba(28,20,92,.06);color:#1C145C; }
.d-link.active { background:rgba(28,20,92,.09);color:#1C145C;font-weight:600; }
.d-icon { width:22px;height:22px;display:flex;align-items:center;justify-content:center;font-size:14px;color:#64748b;flex-shrink:0; }
.d-link.active .d-icon { color:#1C145C; }
.d-divider { height:1px;background:rgba(0,0,0,.07);margin:4px 2px; }
.drawer-footer { padding:12px 14px 24px;border-top:1px solid rgba(0,0,0,.07);flex-shrink:0; }
.drawer-footer .btn-kontak { border-radius:14px;display:block;text-align:center;padding:12px 22px; }
.d-accordion-btn { display:flex;align-items:center;justify-content:space-between;gap:8px;padding:10px 12px;border-radius:12px;font-size:14px;font-weight:600;color:#1e293b;cursor:pointer;background:none;border:none;width:100%;font-family:'Plus Jakarta Sans',sans-serif;transition:.16s; }
.d-accordion-btn:hover { background:rgba(28,20,92,.06);color:#1C145C; }
.d-accordion-btn.active-parent { color:#1C145C; }
.d-accordion-btn .d-acc-left { display:flex;align-items:center;gap:10px; }
.d-accordion-chevron { font-size:11px;color:#94a3b8;transition:transform .25s;flex-shrink:0; }
.d-accordion-btn.open .d-accordion-chevron { transform:rotate(180deg); }
.d-accordion-body { display:none;padding:2px 0 4px 12px; }
.d-accordion-body.open { display:block; }
.d-sub-link { display:flex;align-items:center;gap:9px;padding:8px 12px;border-radius:10px;font-size:13.5px;font-weight:500;color:#475569;text-decoration:none;transition:.16s; }
.d-sub-link:hover { background:rgba(28,20,92,.06);color:#1C145C; }
.d-sub-link i { font-size:13px;color:#94a3b8;flex-shrink:0;width:16px;text-align:center; }
.d-sub-link:hover i { color:#1C145C; }

@media(max-width:1100px) { .nav-link-pill{padding:7px 11px;font-size:13px;} }
@media(max-width:991px) {
    body { padding-top: calc(38px + 64px); }
    .navbar-float-wrap { top:38px;padding:4px 12px; }
    .navbar-float { border-radius:26px;padding:8px 14px; }
    .nav-links,.nav-cta { display:none; }
    .nav-burger { display:flex; }
}
@media(max-width:480px) { .navbar-float { border-radius:22px; } }
</style>


<!-- ============================================================
     TOPBAR
============================================================ -->
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


<!-- ============================================================
     NAVBAR
============================================================ -->
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
                    <a href="{{ url('/karir') }}"  class="drop-item"><i class="bi bi-briefcase"></i> Karir</a>
                    <a href="{{ url('/berita') }}" class="drop-item"><i class="bi bi-newspaper"></i> Berita</a>
                    <a href="{{ url('/video') }}"  class="drop-item"><i class="bi bi-play-circle"></i> Video</a>
                </div>
            </div>
            <div class="drop-wrap">
                <a href="/layanan" class="nav-link-pill {{ request()->is('layanan*') ? 'active' : '' }}">
                    Layanan <i class="bi bi-chevron-down chevron"></i>
                </a>
                <div class="drop-menu" style="min-width:220px;">
                    <a href="{{ url('/layanan') }}" class="drop-item"><i class="bi bi-grid-3x3-gap"></i> Semua Layanan</a>
                    <div class="drop-divider"></div>
                    <a href="{{ url('/layanan#igd') }}"          class="drop-item"><i class="bi bi-bandaid-fill"></i> IGD 24 Jam</a>
                    <a href="{{ url('/layanan#rawatjalan') }}"   class="drop-item"><i class="bi bi-clipboard2-pulse"></i> Rawat Jalan</a>
                    <a href="{{ url('/layanan#rawatinap') }}"    class="drop-item"><i class="bi bi-hospital"></i> Rawat Inap</a>
                    <a href="{{ url('/layanan#ambulans') }}"     class="drop-item"><i class="bi bi-truck"></i> Ambulans</a>
                    <a href="{{ url('/layanan#laboratorium') }}" class="drop-item"><i class="bi bi-eyedropper"></i> Laboratorium</a>
                    <a href="{{ url('/layanan#radiologi') }}"    class="drop-item"><i class="bi bi-radioactive"></i> Radiologi</a>
                    <a href="{{ url('/layanan#farmasi') }}"      class="drop-item"><i class="bi bi-capsule"></i> Farmasi</a>
                    <a href="{{ url('/layanan#mcu') }}"          class="drop-item"><i class="bi bi-heart-pulse"></i> Medical Check Up</a>
                </div>
            </div>
            <a href="/artikel"  class="nav-link-pill {{ request()->is('artikel*')  ? 'active' : '' }}">Artikel</a>
            <a href="/download" class="nav-link-pill {{ request()->is('download*') ? 'active' : '' }}">Download</a>
            <a href="/tentang"  class="nav-link-pill {{ request()->is('tentang*')  ? 'active' : '' }}">Tentang Kami</a>
            <a href="/mutu"     class="nav-link-pill {{ request()->is('mutu*')     ? 'active' : '' }}">Mutu</a>
        </div>
        <div class="nav-cta"><a href="/kontak" class="btn-kontak">Kontak</a></div>
        <button class="nav-burger" id="navBurger"><span></span><span></span><span></span></button>
    </nav>
</div>

<div class="nav-overlay" id="navOverlay"></div>
<aside class="nav-drawer" id="navDrawer">
    <div class="drawer-header">
        <span class="drawer-label">Menu</span>
        <button class="drawer-close-btn" id="drawerClose"><i class="bi bi-x-lg"></i></button>
    </div>
    <nav class="drawer-nav">
        <a href="/" class="d-link {{ request()->is('/') ? 'active' : '' }}">
            <span class="d-icon"><i class="bi bi-house"></i></span> Beranda
        </a>
        <button class="d-accordion-btn {{ request()->is('karir*','berita*','video*') ? 'active-parent' : '' }}" data-target="acc-menu">
            <span class="d-acc-left"><span class="d-icon"><i class="bi bi-grid"></i></span> Menu</span>
            <i class="bi bi-chevron-down d-accordion-chevron"></i>
        </button>
        <div class="d-accordion-body {{ request()->is('karir*','berita*','video*') ? 'open' : '' }}" id="acc-menu">
            <a href="{{ url('/karir') }}"  class="d-sub-link"><i class="bi bi-briefcase"></i> Karir</a>
            <a href="{{ url('/berita') }}" class="d-sub-link"><i class="bi bi-newspaper"></i> Berita</a>
            <a href="{{ url('/video') }}"  class="d-sub-link"><i class="bi bi-play-circle"></i> Video</a>
        </div>
        <div class="d-divider"></div>
        <button class="d-accordion-btn {{ request()->is('layanan*') ? 'active-parent' : '' }}" data-target="acc-layanan">
            <span class="d-acc-left"><span class="d-icon"><i class="bi bi-hospital"></i></span> Layanan</span>
            <i class="bi bi-chevron-down d-accordion-chevron"></i>
        </button>
        <div class="d-accordion-body {{ request()->is('layanan*') ? 'open' : '' }}" id="acc-layanan">
            <a href="{{ url('/layanan') }}"              class="d-sub-link"><i class="bi bi-grid-3x3-gap"></i> Semua Layanan</a>
            <a href="{{ url('/layanan#igd') }}"          class="d-sub-link"><i class="bi bi-bandaid-fill"></i> IGD 24 Jam</a>
            <a href="{{ url('/layanan#rawatjalan') }}"   class="d-sub-link"><i class="bi bi-clipboard2-pulse"></i> Rawat Jalan</a>
            <a href="{{ url('/layanan#rawatinap') }}"    class="d-sub-link"><i class="bi bi-hospital"></i> Rawat Inap</a>
            <a href="{{ url('/layanan#ambulans') }}"     class="d-sub-link"><i class="bi bi-truck"></i> Ambulans 24 Jam</a>
            <a href="{{ url('/layanan#laboratorium') }}" class="d-sub-link"><i class="bi bi-eyedropper"></i> Laboratorium</a>
            <a href="{{ url('/layanan#radiologi') }}"    class="d-sub-link"><i class="bi bi-radioactive"></i> Radiologi</a>
            <a href="{{ url('/layanan#farmasi') }}"      class="d-sub-link"><i class="bi bi-capsule"></i> Farmasi</a>
            <a href="{{ url('/layanan#mcu') }}"          class="d-sub-link"><i class="bi bi-heart-pulse"></i> Medical Check Up</a>
        </div>
        <div class="d-divider"></div>
        <a href="/artikel"  class="d-link {{ request()->is('artikel*')  ? 'active' : '' }}"><span class="d-icon"><i class="bi bi-journal-text"></i></span> Artikel</a>
        <a href="/download" class="d-link {{ request()->is('download*') ? 'active' : '' }}"><span class="d-icon"><i class="bi bi-download"></i></span> Download</a>
        <a href="/tentang"  class="d-link {{ request()->is('tentang*')  ? 'active' : '' }}"><span class="d-icon"><i class="bi bi-info-circle"></i></span> Tentang Kami</a>
        <a href="/mutu"     class="d-link {{ request()->is('mutu*')     ? 'active' : '' }}"><span class="d-icon"><i class="bi bi-patch-check"></i></span> Mutu</a>
    </nav>
    <div class="drawer-footer"><a href="/kontak" class="btn-kontak">Kontak</a></div>
</aside>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const burger  = document.getElementById('navBurger');
    const drawer  = document.getElementById('navDrawer');
    const overlay = document.getElementById('navOverlay');
    const closeBtn= document.getElementById('drawerClose');
    const navbar  = document.getElementById('mainNavbar');

    function openDrawer()  { burger.classList.add('open');drawer.classList.add('open');overlay.classList.add('show');document.body.style.overflow='hidden'; }
    function closeDrawer() { burger.classList.remove('open');drawer.classList.remove('open');overlay.classList.remove('show');document.body.style.overflow=''; }

    burger.addEventListener('click', e => { e.stopPropagation(); drawer.classList.contains('open') ? closeDrawer() : openDrawer(); });
    closeBtn.addEventListener('click', closeDrawer);
    overlay.addEventListener('click', closeDrawer);
    drawer.querySelectorAll('.d-link, .d-sub-link').forEach(l => l.addEventListener('click', closeDrawer));

    drawer.querySelectorAll('.d-accordion-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const targetId = this.dataset.target;
            const body = document.getElementById(targetId);
            const isOpen = body.classList.contains('open');
            drawer.querySelectorAll('.d-accordion-body').forEach(b => b.classList.remove('open'));
            drawer.querySelectorAll('.d-accordion-btn').forEach(b => b.classList.remove('open'));
            if (!isOpen) { body.classList.add('open'); this.classList.add('open'); }
        });
    });
    drawer.querySelectorAll('.d-accordion-body.open').forEach(b => {
        const btn = drawer.querySelector('[data-target="' + b.id + '"]');
        if (btn) btn.classList.add('open');
    });

    window.addEventListener('scroll', () => navbar.classList.toggle('scrolled', window.scrollY > 10), { passive: true });
});
</script>
<!-- END NAVBAR -->


<!-- ================= ORNAMEN SECTION ================= -->
<style>
.section-ornamen {
    position: relative;
    overflow: hidden;
}
.section-ornamen .orn {
    position: absolute;
    background-size: contain;
    background-repeat: no-repeat;
    background-image: url('{{ asset("images/beranda/ornamen.png") }}');
    pointer-events: none;
    z-index: 0;
}
.section-ornamen .orn-1 {
    right: -100px;
    top: 60px;
    width: 420px;
    height: 420px;
    opacity: 0.05;
}
.section-ornamen .orn-2 {
    left: -120px;
    top: 40%;
    width: 360px;
    height: 360px;
    opacity: 0.04;
}
.section-ornamen .orn-3 {
    right: -60px;
    bottom: 100px;
    width: 280px;
    height: 280px;
    opacity: 0.03;
}
.section-ornamen > .container {
    position: relative;
    z-index: 1;
}
</style>

<!-- ================= BREADCRUMB ================= -->
<div class="breadcrumb-wrap">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/berita') }}">Berita</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ Str::limit($berita->judul, 50) }}
                </li>
            </ol>
        </nav>
    </div>
</div>

<!-- ================= MAIN CONTENT ================= -->
<section class="section-ornamen" style="
    padding: 40px 0 60px;
    background: linear-gradient(
        to bottom,
        #ffffff 0%,
        #fefefd 5%,
        #fdfcf6 15%,
        #faf8ee 30%,
        #f7f5e8 50%,
        #fdfcf6 80%,
        #ffffff 100%
    ) !important;
">
    <div class="orn orn-1"></div>
    <div class="orn orn-2"></div>
    <div class="orn orn-3"></div>
    <div class="container">
        <div class="row justify-content-center">

            <!-- KOLOM ARTIKEL -->
            <div class="col-lg-8 col-12">

                <!-- TOMBOL KEMBALI -->
                <a href="{{ url('/berita') }}" class="btn-back">
                    <i class="bi bi-arrow-left"></i> Kembali ke Berita
                </a>

                <!-- CARD ARTIKEL -->
                <div class="article-card">

                    <!-- GAMBAR UTAMA -->
                    @if($berita->gambar)
                    <img src="{{ asset('storage/' . $berita->gambar) }}"
                         alt="{{ $berita->judul }}"
                         class="detail-hero">
                    @endif

                    <!-- META INFO -->
                    <div class="article-meta">
                        <span class="meta-badge">Buletin Allam Medica</span>
                        <span class="meta-date">
                            <i class="bi bi-calendar3"></i>
                            {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}
                        </span>
                    </div>

                    <!-- JUDUL -->
                    <h1 class="article-title">{{ $berita->judul }}</h1>

                    <hr class="article-divider">

                    <!-- KONTEN / DESKRIPSI -->
                    <div class="article-content">
                        {!! nl2br(e($berita->deskripsi)) !!}
                    </div>

                    <!-- BAGIKAN -->
                    <div class="share-wrap">
                        <span class="share-label"><i class="bi bi-share-fill me-1"></i> Bagikan:</span>

                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                           target="_blank" class="share-btn share-fb">
                            <i class="bi bi-facebook"></i> Facebook
                        </a>

                        <a href="https://wa.me/?text={{ urlencode($berita->judul . ' ' . request()->url()) }}"
                           target="_blank" class="share-btn share-wa">
                            <i class="bi bi-whatsapp"></i> WhatsApp
                        </a>

                        <button class="share-btn share-copy" onclick="copyLink()">
                            <i class="bi bi-link-45deg"></i> Salin Link
                        </button>
                    </div>

                </div>
            </div>

            <!-- KOLOM SIDEBAR -->
            <div class="col-lg-4 col-12 mt-4 mt-lg-0">

                <!-- BERITA TERBARU SIDEBAR -->
                <div style="
                    background:#fff;
                    border-radius:16px;
                    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
                    padding: 24px;
                    position: sticky;
                    top: 110px;
                ">
                    <h6 style="font-weight:800; color:#1C145C; font-size:16px; margin-bottom:18px; border-left:4px solid #1C145C; padding-left:10px;">
                        Berita Terbaru
                    </h6>

                    @foreach($beritaLainnya as $lain)
                    <a href="{{ url('/berita/' . $lain->slug) }}" style="text-decoration:none;">
                        <div style="
                            display:flex;
                            gap:12px;
                            align-items:flex-start;
                            padding: 12px 0;
                            border-bottom: 1px solid #f0f0f0;
                        ">
                            <img src="{{ asset('storage/' . $lain->gambar) }}"
                                 style="width:70px; height:70px; object-fit:cover; border-radius:10px; flex-shrink:0;">
                            <div>
                                <p style="font-size:13px; font-weight:700; color:#1C145C; margin:0 0 5px;">
                                    {{ Str::limit($lain->judul, 60) }}
                                </p>
                                <span style="font-size:11px; color:#999;">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ \Carbon\Carbon::parse($lain->created_at)->translatedFormat('d M Y') }}
                                </span>
                            </div>
                        </div>
                    </a>
                    @endforeach

                    <div class="text-center mt-3">
                        <a href="{{ url('/berita') }}"
                           style="
                                font-size:13px;
                                color:#1C145C;
                                font-weight:600;
                                text-decoration:none;
                           ">
                            Lihat Semua Berita <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                </div>

            </div>

        </div>

        <!-- ================= BERITA LAINNYA (BAWAH) ================= -->
        @if($beritaLainnya->count() > 0)
        <div style="margin-top: 60px;">
            <h2 class="related-title">Berita Lainnya</h2>
            <div class="row g-4">
                @foreach($beritaLainnya->take(4) as $lain)
                <div class="col-md-3 col-6">
                    <div class="related-card">
                        <img src="{{ asset('storage/' . $lain->gambar) }}" alt="{{ $lain->judul }}">
                        <div class="related-card-body">
                            <h6>{{ Str::limit($lain->judul, 55) }}</h6>
                            <p>{{ Str::limit($lain->deskripsi, 70) }}</p>
                            <a href="{{ url('/berita/' . $lain->slug) }}">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</section>

<!-- ============================================================
     FOOTER
============================================================ -->
<style>
.footer-rsu{
    background:linear-gradient(
        to bottom,
        #ffffff 0%,
        #ffffff 8%,
        #fefefd 15%,
        #fdfcf6 25%,
        #faf8ee 38%,
        #f7f5e8 50%,
        #f3f0e1 65%,
        #ede9d9 80%,
        #e3deca 100%
    );
    color:#1C145C;
    padding:56px 0 0;
    position:relative;
    overflow:hidden;
}

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

.footer-rsu .container-fluid{
    max-width:1550px;
    position:relative;
    z-index:1;
}

.footer-rsu .row{
    --bs-gutter-x:3.5rem;
}

.footer-rsu .footer-logo{
    height:40px;
    width:auto;
    display:block;
    margin-bottom:14px;
}

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

@media(max-width:991px){
    .footer-rsu{ padding:45px 0 0; }
    .footer-rsu .row > div{ margin-bottom:24px; }
    .footer-rsu .footer-desc{ max-width:100%; }
}

@media(max-width:768px){
    .footer-rsu{ padding:40px 0 0; }
    .footer-rsu .container-fluid{ padding-left:20px !important; padding-right:20px !important; }
    .footer-rsu .footer-copy{ flex-direction:column; align-items:flex-start; gap:8px; }
    .footer-rsu .footer-bottom{ padding:15px 20px; }
    .footer-rsu a:hover{ padding-left:0; }
    .footer-rsu .footer-logo{ height:34px; }
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
                <h5 class="footer-title">RSU Allam Medica Bumiayu</h5>
                <p class="footer-desc">
                    Jl. Pangeran Diponegoro No. 609,
                    Jatisawit, Bumiayu, Kabupaten Brebes,
                    Jawa Tengah 52273
                </p>
                <div class="footer-social">
                    <a href="https://www.tiktok.com/@rsuallammedicabumiayu" target="_blank"><i class="bi bi-tiktok"></i></a>
                    <a href="https://www.facebook.com/allam.medicabmy" target="_blank"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/allam.medica/" target="_blank"><i class="bi bi-instagram"></i></a>
                </div>
                <div class="footer-mitra-label">Akreditasi & Mitra</div>
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
                    <div class="footer-contact-icon"><i class="bi bi-telephone-fill"></i></div>
                    <div class="footer-contact-text">(0289) 430822</div>
                </div>
                <div class="footer-contact-row">
                    <div class="footer-contact-icon"><i class="bi bi-envelope-fill"></i></div>
                    <div class="footer-contact-text">allam.medica@yahoo.co.id</div>
                </div>
                <div class="footer-contact-row">
                    <div class="footer-contact-icon"><i class="bi bi-clock-fill"></i></div>
                    <div class="footer-contact-text">
                        IGD, Lab & Farmasi : 24 Jam<br>
                        Rawat Jalan : Sen – Sab 07.00 – 21.00
                    </div>
                </div>
                <div class="footer-contact-row">
                    <div class="footer-contact-icon"><i class="bi bi-geo-alt-fill"></i></div>
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
                <span class="footer-copy-badge">Melayani dengan Sepenuh Hati</span>
            </div>
        </div>
    </div>

</footer>
<!-- END FOOTER -->


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
function copyLink() {
    navigator.clipboard.writeText(window.location.href).then(function() {
        const btn = document.querySelector('.share-copy');
        const originalHTML = btn.innerHTML;
        btn.innerHTML = '<i class="bi bi-check2"></i> Tersalin!';
        btn.style.background = '#28a745';
        setTimeout(() => {
            btn.innerHTML = originalHTML;
            btn.style.background = '#1C145C';
        }, 2000);
    });
}
</script>

</body>
</html>