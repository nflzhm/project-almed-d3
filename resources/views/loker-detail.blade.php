<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $loker->judul }} — Karir RSU Allam Medica</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">

    <style>
        :root {
        --navy:         #1C145C;
        --navy-mid:     #231a72;
        --navy-light:   #2d2480;
        --blue:         #0ea5e9;
        --blue-dark:    #0284c7;
        --blue-light:   #e0f2fe;
        --cyan:         #06b6d4;
        --white:        #ffffff;
        --body-bg:      #f5f7fc;
        --card-bg:      #ffffff;
        --text-main:    #0f172a;
        --text-muted:   #64748b;
        --border:       #e2e8f0;
        --radius:       16px;
        --radius-sm:    10px;
        --shadow-sm:    0 2px 8px rgba(0,0,0,.06);
        --shadow-md:    0 8px 32px rgba(28,20,92,.1);
        --shadow-lg:    0 20px 60px rgba(28,20,92,.15);
        --transition:   .22s cubic-bezier(.4,0,.2,1);
    }

    .loker-hero {
        background: linear-gradient(135deg, var(--navy) 0%, var(--navy-light) 50%, #1e40af 100%);
        position: relative; overflow: hidden;
        padding: 60px 0 80px;
    }

    /* Decorative shapes */
    .loker-hero::before {
        content: '';
        position: absolute; right: -100px; top: -100px;
        width: 500px; height: 500px; border-radius: 50%;
        background: radial-gradient(circle, rgba(14,165,233,.15), transparent 65%);
        pointer-events: none;
    }
    .loker-hero::after {
        content: '';
        position: absolute; left: -60px; bottom: -120px;
        width: 350px; height: 350px; border-radius: 50%;
        background: radial-gradient(circle, rgba(6,182,212,.12), transparent 65%);
        pointer-events: none;
    }

    /* Dot grid pattern */
    .hero-dot-grid {
        position: absolute; inset: 0; pointer-events: none;
        background-image: radial-gradient(rgba(255,255,255,.06) 1px, transparent 1px);
        background-size: 28px 28px;
    }

    .hero-content { position: relative; z-index: 2; }

    /* Breadcrumb */
    .hero-breadcrumb {
        display: flex; align-items: center; gap: 8px;
        margin-bottom: 20px;
    }
    .hero-breadcrumb a {
        color: rgba(255,255,255,.6); font-size: 13px; font-weight: 500;
        text-decoration: none; transition: color var(--transition);
        display: flex; align-items: center; gap: 5px;
    }
    .hero-breadcrumb a:hover { color: #fff; }
    .hero-breadcrumb .sep { color: rgba(255,255,255,.3); font-size: 11px; }
    .hero-breadcrumb .current { color: rgba(255,255,255,.85); font-size: 13px; font-weight: 600; }

    /* NEW badge */
    .hero-new-badge {
        display: inline-flex; align-items: center; gap: 6px;
        background: linear-gradient(135deg, var(--blue), var(--cyan));
        color: #fff; font-size: 11px; font-weight: 800;
        text-transform: uppercase; letter-spacing: 1px;
        padding: 5px 14px; border-radius: 20px;
        margin-bottom: 16px;
        box-shadow: 0 4px 14px rgba(14,165,233,.4);
    }

    /* Title */
    .hero-title {
        font-family: 'DM Serif Display', serif;
        font-size: clamp(28px, 5vw, 46px);
        font-weight: 400; color: #fff;
        line-height: 1.2; letter-spacing: -.5px;
        margin-bottom: 20px;
    }

    /* Meta pills */
    .hero-meta {
        display: flex; align-items: center; gap: 10px;
        flex-wrap: wrap;
    }
    .hero-meta-pill {
        display: inline-flex; align-items: center; gap: 7px;
        background: rgba(255,255,255,.1);
        border: 1px solid rgba(255,255,255,.15);
        color: rgba(255,255,255,.85);
        font-size: 12.5px; font-weight: 600;
        padding: 6px 14px; border-radius: 20px;
        backdrop-filter: blur(8px);
    }
    .hero-meta-pill i { font-size: 11px; color: var(--blue); }

    /* Hero image (kanan) */
    .hero-img-wrap {
        position: relative; z-index: 2;
        display: flex; justify-content: center; align-items: center;
    }
    .hero-img-card {
        width: 100%; max-width: 440px;
        border-radius: 20px; overflow: hidden;
        box-shadow: 0 24px 64px rgba(0,0,0,.35);
        border: 2px solid rgba(255,255,255,.1);
        aspect-ratio: 16/10;
    }
    .hero-img-card img { width: 100%; height: 100%; object-fit: cover; display: block; }
    .hero-img-placeholder {
        width: 100%; height: 100%;
        background: linear-gradient(135deg, rgba(14,165,233,.2), rgba(6,182,212,.15));
        display: flex; flex-direction: column;
        align-items: center; justify-content: center; gap: 12px;
    }
    .hero-img-placeholder i    { font-size: 52px; color: rgba(255,255,255,.25); }
    .hero-img-placeholder span { font-size: 13px; color: rgba(255,255,255,.35); font-weight: 600; letter-spacing: .5px; }

    /* Floating apply card (pojok kanan bawah hero) */
    .hero-apply-float {
        position: absolute; bottom: -28px; right: 20px; z-index: 5;
        background: #fff; border-radius: var(--radius);
        padding: 16px 20px;
        box-shadow: var(--shadow-lg);
        display: flex; align-items: center; gap: 14px;
        min-width: 220px;
        border: 1px solid var(--border);
    }
    .haf-icon {
        width: 44px; height: 44px; border-radius: 12px;
        background: var(--blue-light); color: var(--blue-dark);
        display: flex; align-items: center; justify-content: center;
        font-size: 18px; flex-shrink: 0;
    }
    .haf-label { font-size: 11px; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: .6px; }
    .haf-val   { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 14px; font-weight: 800; color: var(--navy); margin-top: 2px; }

    /* ============================================================
       MAIN BODY
    ============================================================ */
    .loker-body { padding: 56px 0 72px; }

    /* ---- Deskripsi card ---- */
    .desc-card {
        background: var(--card-bg); border-radius: var(--radius);
        border: 1px solid var(--border); box-shadow: var(--shadow-sm);
        overflow: hidden;
        animation: fadeUp .5s ease both;
    }
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .desc-card-header {
        padding: 20px 28px 18px;
        border-bottom: 1px solid var(--border);
        display: flex; align-items: center; gap: 12px;
    }
    .desc-card-header .dch-icon {
        width: 38px; height: 38px; border-radius: 10px;
        background: var(--blue-light); color: var(--blue-dark);
        display: flex; align-items: center; justify-content: center; font-size: 15px;
    }
    .desc-card-header .dch-title {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 15px; font-weight: 800; color: var(--text-main);
    }
    .desc-card-header .dch-sub { font-size: 12px; color: var(--text-muted); margin-top: 2px; }

    .desc-card-body { padding: 24px 28px; }

    /* Deskripsi text styling */
    .loker-desc-content {
        font-size: 15px; line-height: 1.85; color: #334155;
        white-space: pre-wrap; word-break: break-word;
    }
    .loker-desc-content p    { margin-bottom: 14px; }
    .loker-desc-content ul,
    .loker-desc-content ol   { padding-left: 20px; margin-bottom: 14px; }
    .loker-desc-content li   { margin-bottom: 6px; }
    .loker-desc-content strong { color: var(--text-main); font-weight: 700; }

    /* ---- Sidebar ---- */
    .sidebar-card {
        background: var(--card-bg); border-radius: var(--radius);
        border: 1px solid var(--border); box-shadow: var(--shadow-sm);
        overflow: hidden; margin-bottom: 20px;
        animation: fadeUp .5s ease both;
    }
    .sidebar-card:nth-child(2) { animation-delay: .1s; }
    .sidebar-card:nth-child(3) { animation-delay: .2s; }

    .sc-header {
        padding: 16px 22px 14px; border-bottom: 1px solid var(--border);
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 13px; font-weight: 800; color: var(--text-main);
        display: flex; align-items: center; gap: 8px;
    }
    .sc-header i { color: var(--blue); font-size: 12px; }
    .sc-body { padding: 18px 22px; }

    /* Info rows */
    .info-row {
        display: flex; align-items: flex-start; gap: 12px;
        padding: 10px 0; border-bottom: 1px solid var(--border);
    }
    .info-row:last-child { border-bottom: 0; padding-bottom: 0; }
    .info-row-icon {
        width: 34px; height: 34px; border-radius: 8px; flex-shrink: 0;
        display: flex; align-items: center; justify-content: center; font-size: 13px;
        margin-top: 1px;
    }
    .info-row-label { font-size: 11px; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: .6px; }
    .info-row-val   { font-size: 13.5px; font-weight: 600; color: var(--text-main); margin-top: 3px; line-height: 1.4; }

    /* ---- Apply CTA card ---- */
    .apply-card {
        background: linear-gradient(145deg, var(--navy), var(--navy-light));
        border-radius: var(--radius); padding: 28px 24px;
        text-align: center; position: relative; overflow: hidden;
        box-shadow: var(--shadow-md);
        animation: fadeUp .5s .15s ease both;
    }
    .apply-card::before {
        content: '';
        position: absolute; right: -40px; top: -40px;
        width: 140px; height: 140px; border-radius: 50%;
        background: radial-gradient(circle, rgba(14,165,233,.2), transparent 70%);
    }
    .apply-card::after {
        content: '';
        position: absolute; left: -30px; bottom: -50px;
        width: 120px; height: 120px; border-radius: 50%;
        background: radial-gradient(circle, rgba(6,182,212,.15), transparent 70%);
    }
    .apply-card-icon {
        width: 56px; height: 56px; border-radius: 16px;
        background: rgba(255,255,255,.12);
        display: flex; align-items: center; justify-content: center;
        font-size: 22px; color: var(--blue);
        margin: 0 auto 14px; position: relative; z-index: 1;
    }
    .apply-card-title {
        font-family: 'DM Serif Display', serif;
        font-size: 20px; color: #fff; margin-bottom: 8px;
        position: relative; z-index: 1;
    }
    .apply-card-sub {
        font-size: 13px; color: rgba(255,255,255,.6);
        line-height: 1.5; margin-bottom: 20px;
        position: relative; z-index: 1;
    }
    .btn-apply {
        display: block; width: 100%;
        padding: 14px; border-radius: var(--radius-sm);
        background: linear-gradient(130deg, var(--blue), var(--cyan));
        color: #fff; font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 14px; font-weight: 800;
        text-decoration: none; border: none; cursor: pointer;
        display: flex; align-items: center; justify-content: center; gap: 8px;
        box-shadow: 0 6px 20px rgba(14,165,233,.4);
        transition: transform var(--transition), box-shadow var(--transition);
        position: relative; z-index: 1;
    }
    .btn-apply:hover {
        transform: translateY(-2px); color: #fff;
        box-shadow: 0 12px 32px rgba(14,165,233,.5);
    }
    .btn-apply:active { transform: translateY(0); }

    /* Email apply note */
    .apply-email-note {
        margin-top: 12px; font-size: 12px; color: rgba(255,255,255,.45);
        position: relative; z-index: 1;
        display: flex; align-items: center; justify-content: center; gap: 5px;
    }

    /* ---- Share card ---- */
    .share-btns { display: flex; gap: 8px; }
    .share-btn {
        flex: 1; display: flex; align-items: center; justify-content: center; gap: 6px;
        padding: 10px; border-radius: var(--radius-sm); border: 1.5px solid var(--border);
        font-size: 12.5px; font-weight: 700; cursor: pointer;
        text-decoration: none; background: var(--body-bg);
        color: var(--text-main);
        transition: background var(--transition), border-color var(--transition), color var(--transition), transform var(--transition);
    }
    .share-btn:hover { transform: translateY(-2px); }
    .share-wa   { }
    .share-wa:hover   { background: #25D366; border-color: #25D366; color: #fff; }
    .share-copy { }
    .share-copy:hover { background: var(--blue); border-color: var(--blue); color: #fff; }
    .share-copy.copied { background: #10b981; border-color: #10b981; color: #fff; }

    /* ---- Other loker card ---- */
    .other-loker-item {
        display: flex; align-items: center; gap: 12px;
        padding: 12px 0; border-bottom: 1px solid var(--border);
        text-decoration: none; color: var(--text-main);
        transition: background var(--transition);
        border-radius: var(--radius-sm);
        cursor: pointer;
    }
    .other-loker-item:last-child { border-bottom: 0; }
    .other-loker-item:hover .oli-title { color: var(--blue); }
    .oli-icon {
        width: 40px; height: 40px; border-radius: 10px;
        flex-shrink: 0; overflow: hidden; background: var(--blue-light);
        display: flex; align-items: center; justify-content: center;
    }
    .oli-icon img   { width: 100%; height: 100%; object-fit: cover; }
    .oli-icon i     { font-size: 16px; color: var(--blue); }
    .oli-title      { font-size: 13px; font-weight: 700; color: var(--text-main); line-height: 1.35; transition: color var(--transition); }
    .oli-date       { font-size: 11px; color: var(--text-muted); margin-top: 3px; }

    /* ---- Divider with label ---- */
    .section-divider {
        display: flex; align-items: center; gap: 12px; margin: 8px 0 20px;
    }
    .section-divider::before,
    .section-divider::after { content: ''; flex: 1; height: 1px; background: var(--border); }
    .section-divider span {
        font-size: 11px; font-weight: 800; color: var(--text-muted);
        text-transform: uppercase; letter-spacing: 1px; white-space: nowrap;
    }

    /* ---- Back button floating ---- */
    .back-float {
        position: fixed; bottom: 28px; right: 28px; z-index: 100;
        display: flex; align-items: center; gap: 8px;
        padding: 12px 20px; border-radius: 30px;
        background: var(--navy); color: #fff;
        font-size: 13px; font-weight: 700;
        text-decoration: none;
        box-shadow: 0 8px 24px rgba(28,20,92,.3);
        transition: transform var(--transition), box-shadow var(--transition);
        border: 1.5px solid rgba(255,255,255,.1);
    }
    .back-float:hover { transform: translateY(-3px); box-shadow: 0 14px 36px rgba(28,20,92,.4); color: #fff; }
    @media(max-width:575px) { .back-float { bottom: 16px; right: 16px; padding: 10px 16px; } }

    /* ---- Tags ---- */
    .loker-tags { display: flex; flex-wrap: wrap; gap: 6px; margin-top: 16px; }
    .loker-tag {
        display: inline-flex; align-items: center; gap: 5px;
        background: var(--blue-light); color: var(--blue-dark);
        font-size: 12px; font-weight: 700; padding: 5px 12px; border-radius: 20px;
        border: 1px solid rgba(14,165,233,.2);
    }

    /* Responsive */
    @media(max-width:991.98px) {
        .loker-hero     { padding: 48px 0 64px; }
        .hero-img-wrap  { margin-top: 36px; }
        .hero-apply-float { position: static; margin: 20px auto 0; display: none; }
        .loker-body     { padding: 40px 0 56px; }
    }
    @media(max-width:575.98px) {
        .hero-title     { font-size: 26px; }
        .desc-card-body { padding: 20px; }
        .sc-body        { padding: 16px 18px; }
    }



    body {
    font-family: 'Segoe UI', sans-serif;
    padding-top: 90px;
}

/* ================= TOP BAR ================= */
.topbar {
    background:#1C145C;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 9999;
    height: 40px;
    padding: 2px 0;
}

/* ================= NAVBAR ================= */
.navbar-main {
    background: #fff;
    border-radius: 0 0 20px 20px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    position: fixed;
    top: 40px;
    width: 100%;
    z-index: 9998;
}

/* ================= DESKTOP GAP ================= */
.nav-gap {
    gap: 18px;
}

/* ================= DROPDOWN DESKTOP ================= */
@media (min-width: 992px) {

    .dropdown-menu {
        display: block;
        opacity: 0;
        transform: translateY(10px);
        visibility: hidden;
        transition: all 0.3s ease;

        border-radius: 12px;
        border: none;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        padding: 10px 0;
    }

    .nav-item.dropdown:hover .dropdown-menu {
        opacity: 1;
        transform: translateY(0);
        visibility: visible;
    }
}

/* ================= MOBILE FIX ================= */
@media (max-width: 991px) {

    body {
        padding-top: 100px;
    }

    /* HAPUS JARAK MENU */
    .navbar-nav.nav-gap {
        gap: 0 !important;
        width: 100%;
    }

    .navbar-nav .nav-item {
        padding: 0;
    }

    .navbar-nav .nav-link {
        padding: 10px 0;
    }

    /* ================= DROPDOWN SMOOTH MOBILE ================= */
    .dropdown-menu {
        position: static;
        display: block !important;

        max-height: 0;
        overflow: hidden;

        opacity: 0;
        visibility: hidden;

        transform: translateY(-5px);

        transition: all 0.35s ease;

        box-shadow: none;
        border: none;
        padding-left: 15px;
    }

    .dropdown-menu.show {
        max-height: 500px;
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }
}
        </style>


<body>

<!-- ================= TOP BAR ================= -->
<nav class="navbar navbar-dark topbar">
    <div class="container">

        <ul class="navbar-nav flex-row" style="font-size:13px;">
            <li class="nav-item">
                <span style="color:#fff;padding:4px 10px;">
                    <i class="bi bi-telephone-fill" style="margin-right:5px;font-size:12px;"></i>
                    0834325542
                </span>
            </li>

            <li class="nav-item">
                <span style="color:#fff;padding:4px 10px;">
                    <i class="bi bi-envelope-fill" style="margin-right:5px;font-size:12px;"></i>
                    allammedica@gmail.com
                </span>
            </li>
        </ul>

        <ul class="navbar-nav flex-row ms-auto">
            <li class="nav-item"><a class="nav-link text-white p-1" href="#"><i class="bi bi-twitter"></i></a></li>
            <li class="nav-item"><a class="nav-link text-white p-1" href="#"><i class="bi bi-facebook"></i></a></li>
            <li class="nav-item"><a class="nav-link text-white p-1" href="#"><i class="bi bi-instagram"></i></a></li>
        </ul>

    </div>
</nav>

<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand-lg navbar-light navbar-main">

    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/beranda/logo-almed.png') }}" height="40">
        </a>

        <!-- BURGER -->
        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="mainMenu">

            <ul class="navbar-nav ms-auto nav-gap">

                <li class="nav-item"><a href="/" class="nav-link">Beranda</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        Menu
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('/karir') }}">Karir</a></li>
                        <li><a class="dropdown-item" href="{{ url('/berita') }}">Berita</a></li>
                        <li><a class="dropdown-item" href="{{ url('/video') }}">Video</a></li>
                    </ul>
                </li>

                <li class="nav-item"><a href="/layanan" class="nav-link">Layanan</a></li>
                <li class="nav-item"><a href="/download" class="nav-link">Download</a></li>
                <li class="nav-item"><a href="/tentang" class="nav-link">Tentang Kami</a></li>
                <li class="nav-item"><a href="/kontak" class="nav-link">Kontak</a></li>

            </ul>

        </div>

    </div>
</nav>



<section class="loker-hero">
    <div class="hero-dot-grid"></div>

    <div class="container">
        <div class="row align-items-center g-5">

            {{-- LEFT: Text --}}
            <div class="col-lg-7">
                <div class="hero-content">

                    {{-- Breadcrumb --}}
                    <div class="hero-breadcrumb">
                        <a href="/"><i class="bi bi-house-fill"></i> Beranda</a>
                        <span class="sep"><i class="bi bi-chevron-right"></i></span>
                        <a href="{{ url('/karir') }}">
                            Karir
                        </a>
                        <span class="sep"><i class="bi bi-chevron-right"></i></span>
                        <span class="current">Detail Loker</span>
                    </div>

                    {{-- NEW badge --}}
                    @if(\Carbon\Carbon::parse($loker->created_at)->diffInDays(now()) <= 7)
                    <div class="hero-new-badge">
                        <i class="fa-solid fa-bolt" style="font-size:10px;"></i>
                        Lowongan Baru
                    </div>
                    @endif

                    {{-- Title --}}
                    <h1 class="hero-title">{{ $loker->judul }}</h1>

                    {{-- Meta --}}
                    <div class="hero-meta">
                        <span class="hero-meta-pill">
                            <i class="fa-solid fa-hospital"></i>
                            RSU Allam Medica Bumiayu
                        </span>
                        <span class="hero-meta-pill">
                            <i class="fa-regular fa-calendar"></i>
                            Diposting {{ \Carbon\Carbon::parse($loker->created_at)->translatedFormat('d F Y') }}
                        </span>
                        <span class="hero-meta-pill">
                            <i class="fa-solid fa-location-dot"></i>
                            Bumiayu, Brebes
                        </span>
                    </div>

                </div>
            </div>

            {{-- RIGHT: Image --}}
            <div class="col-lg-5">
                <div class="hero-img-wrap">
                    <div class="hero-img-card">
                        @if($loker->gambar)
                            <img src="{{ asset('storage/' . $loker->gambar) }}"
                                 alt="{{ $loker->judul }}">
                        @else
                            <div class="hero-img-placeholder">
                                <i class="fa-solid fa-briefcase"></i>
                                <span>{{ $loker->judul }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ============================================================
     MAIN BODY
============================================================ --}}
<section class="loker-body">
    <div class="container">
        <div class="row g-4">

            {{-- ====================================================
                 MAIN COLUMN — Deskripsi
            ==================================================== --}}
            <div class="col-lg-8">

                {{-- Deskripsi card --}}
                <div class="desc-card">
                    <div class="desc-card-header">
                        <div class="dch-icon"><i class="fa-solid fa-file-lines"></i></div>
                        <div>
                            <div class="dch-title">Deskripsi & Kualifikasi</div>
                            <div class="dch-sub">Informasi lengkap posisi yang dibutuhkan</div>
                        </div>
                    </div>
                    <div class="desc-card-body">
                        <div class="loker-desc-content">{{ $loker->deskripsi }}</div>

                        {{-- Tags otomatis berdasarkan judul --}}
                        <div class="loker-tags">
                            <span class="loker-tag"><i class="fa-solid fa-tag" style="font-size:9px;"></i> Full Time</span>
                            <span class="loker-tag"><i class="fa-solid fa-location-dot" style="font-size:9px;"></i> Bumiayu</span>
                            <span class="loker-tag"><i class="fa-solid fa-briefcase-medical" style="font-size:9px;"></i> Kesehatan</span>
                            <span class="loker-tag"><i class="fa-regular fa-clock" style="font-size:9px;"></i> On-site</span>
                        </div>
                    </div>
                </div>

                {{-- Cara Melamar card --}}
                <div class="desc-card" style="margin-top:20px;animation-delay:.1s;">
                    <div class="desc-card-header">
                        <div class="dch-icon" style="background:#d1fae5;color:#059669;">
                            <i class="fa-solid fa-paper-plane"></i>
                        </div>
                        <div>
                            <div class="dch-title">Cara Melamar</div>
                            <div class="dch-sub">Ikuti langkah berikut untuk mengirim lamaran</div>
                        </div>
                    </div>
                    <div class="desc-card-body">

                        <div style="display:flex;flex-direction:column;gap:16px;">

                            {{-- Step 1 --}}
                            <div style="display:flex;gap:14px;align-items:flex-start;">
                                <div style="width:36px;height:36px;border-radius:10px;background:#e0f2fe;color:#0284c7;
                                            display:flex;align-items:center;justify-content:center;
                                            font-family:'Plus Jakarta Sans',sans-serif;font-size:14px;font-weight:800;flex-shrink:0;">
                                    1
                                </div>
                                <div>
                                    <div style="font-size:14px;font-weight:700;color:var(--text-main);margin-bottom:4px;">
                                        Siapkan Berkas Lamaran
                                    </div>
                                    <div style="font-size:13px;color:var(--text-muted);line-height:1.6;">
                                        CV terbaru, fotokopi ijazah, STR/SIP aktif (jika diperlukan),
                                        pas foto 3×4, dan surat lamaran kerja.
                                    </div>
                                </div>
                            </div>

                            {{-- Step 2 --}}
                            <div style="display:flex;gap:14px;align-items:flex-start;">
                                <div style="width:36px;height:36px;border-radius:10px;background:#d1fae5;color:#059669;
                                            display:flex;align-items:center;justify-content:center;
                                            font-family:'Plus Jakarta Sans',sans-serif;font-size:14px;font-weight:800;flex-shrink:0;">
                                    2
                                </div>
                                <div>
                                    <div style="font-size:14px;font-weight:700;color:var(--text-main);margin-bottom:4px;">
                                        Kirim via Email atau Datang Langsung
                                    </div>
                                    <div style="font-size:13px;color:var(--text-muted);line-height:1.6;">
                                        Email ke
                                        <a href="mailto:kepegawaianallammedica@gmail.com"
                                           style="color:var(--blue);font-weight:700;text-decoration:none;">
                                            kepegawaianallammedica@gmail.com
                                        </a>
                                        dengan subject <strong>"Lamaran — {{ $loker->judul }}"</strong>,
                                        atau antar langsung ke bagian HRD RSU Allam Medica.
                                    </div>
                                </div>
                            </div>

                            {{-- Step 3 --}}
                            <div style="display:flex;gap:14px;align-items:flex-start;">
                                <div style="width:36px;height:36px;border-radius:10px;background:#fef3c7;color:#d97706;
                                            display:flex;align-items:center;justify-content:center;
                                            font-family:'Plus Jakarta Sans',sans-serif;font-size:14px;font-weight:800;flex-shrink:0;">
                                    3
                                </div>
                                <div>
                                    <div style="font-size:14px;font-weight:700;color:var(--text-main);margin-bottom:4px;">
                                        Tunggu Konfirmasi
                                    </div>
                                    <div style="font-size:13px;color:var(--text-muted);line-height:1.6;">
                                        Tim HRD kami akan menghubungi pelamar yang memenuhi kualifikasi
                                        untuk proses seleksi selanjutnya. Hanya yang lolos seleksi berkas
                                        yang akan dihubungi.
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

            {{-- ====================================================
                 SIDEBAR
            ==================================================== --}}
            <div class="col-lg-4">

                {{-- Apply CTA card --}}
                <div class="apply-card mb-4">
                    <div class="apply-card-icon">
                        <i class="fa-solid fa-paper-plane"></i>
                    </div>
                    <div class="apply-card-title">Tertarik dengan posisi ini?</div>
                    <div class="apply-card-sub">
                        Kirimkan lamaran Anda sekarang dan bergabunglah bersama tim RSU Allam Medica.
                    </div>
                    <a href="mailto:kepegawaianallammedica@gmail.com?subject=Lamaran — {{ urlencode($loker->judul) }}"
                       class="btn-apply">
                        <i class="fa-solid fa-paper-plane"></i>
                        Kirim Lamaran Sekarang
                    </a>
                    <div class="apply-email-note">
                        <i class="fa-regular fa-envelope" style="font-size:11px;"></i>
                        kepegawaianallammedica@gmail.com
                    </div>
                </div>

                {{-- Info card --}}
                <div class="sidebar-card">
                    <div class="sc-header">
                        <i class="fa-solid fa-circle-info"></i>
                        Informasi Loker
                    </div>
                    <div class="sc-body">

                        <div class="info-row">
                            <div class="info-row-icon" style="background:#e0f2fe;color:#0284c7;">
                                <i class="fa-solid fa-briefcase"></i>
                            </div>
                            <div>
                                <div class="info-row-label">Posisi</div>
                                <div class="info-row-val">{{ $loker->judul }}</div>
                            </div>
                        </div>

                        <div class="info-row">
                            <div class="info-row-icon" style="background:#d1fae5;color:#059669;">
                                <i class="fa-solid fa-hospital"></i>
                            </div>
                            <div>
                                <div class="info-row-label">Institusi</div>
                                <div class="info-row-val">RSU Allam Medica Bumiayu</div>
                            </div>
                        </div>

                        <div class="info-row">
                            <div class="info-row-icon" style="background:#fef3c7;color:#d97706;">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div>
                                <div class="info-row-label">Lokasi</div>
                                <div class="info-row-val">Bumiayu, Brebes, Jawa Tengah</div>
                            </div>
                        </div>

                        <div class="info-row">
                            <div class="info-row-icon" style="background:#ede9fe;color:#7c3aed;">
                                <i class="fa-regular fa-clock"></i>
                            </div>
                            <div>
                                <div class="info-row-label">Tipe Pekerjaan</div>
                                <div class="info-row-val">Full Time / On-site</div>
                            </div>
                        </div>

                        <div class="info-row">
                            <div class="info-row-icon" style="background:#fce7f3;color:#be185d;">
                                <i class="fa-regular fa-calendar"></i>
                            </div>
                            <div>
                                <div class="info-row-label">Diposting</div>
                                <div class="info-row-val">
                                    {{ \Carbon\Carbon::parse($loker->created_at)->translatedFormat('d F Y') }}
                                </div>
                            </div>
                        </div>

                        <div class="info-row">
                            <div class="info-row-icon" style="background:#e0f2fe;color:#0284c7;">
                                <i class="fa-solid fa-hashtag"></i>
                            </div>
                            <div>
                                <div class="info-row-label">ID Loker</div>
                                <div class="info-row-val">#{{ str_pad($loker->id, 4, '0', STR_PAD_LEFT) }}</div>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Kontak card --}}
                <div class="sidebar-card">
                    <div class="sc-header">
                        <i class="fa-solid fa-phone"></i>
                        Hubungi HRD
                    </div>
                    <div class="sc-body">
                        <a href="tel:085292224886"
                           style="display:flex;align-items:center;gap:10px;padding:10px 0;text-decoration:none;border-bottom:1px solid var(--border);">
                            <div style="width:36px;height:36px;border-radius:8px;background:#d1fae5;color:#059669;
                                        display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0;">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div>
                                <div style="font-size:11px;font-weight:700;color:var(--text-muted);text-transform:uppercase;letter-spacing:.5px;">Telepon</div>
                                <div style="font-size:13.5px;font-weight:700;color:var(--text-main);margin-top:2px;">085292224886</div>
                            </div>
                        </a>
                        <a href="mailto:kepegawaianallammedica@gmail.com"
                           style="display:flex;align-items:center;gap:10px;padding:10px 0;text-decoration:none;">
                            <div style="width:36px;height:36px;border-radius:8px;background:#e0f2fe;color:#0284c7;
                                        display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0;">
                                <i class="fa-regular fa-envelope"></i>
                            </div>
                            <div>
                                <div style="font-size:11px;font-weight:700;color:var(--text-muted);text-transform:uppercase;letter-spacing:.5px;">Email</div>
                                <div style="font-size:12.5px;font-weight:700;color:var(--text-main);margin-top:2px;">kepegawaianallammedica@gmail.com</div>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Share card --}}
                <div class="sidebar-card">
                    <div class="sc-header">
                        <i class="fa-solid fa-share-nodes"></i>
                        Bagikan Loker Ini
                    </div>
                    <div class="sc-body">
                        <div class="share-btns">
                            <a href="https://wa.me/?text={{ urlencode('Lowongan Kerja: ' . $loker->judul . ' di RSU Allam Medica — ' . url()->current()) }}"
                               target="_blank" class="share-btn share-wa">
                                <i class="fa-brands fa-whatsapp" style="font-size:15px;"></i>
                                WhatsApp
                            </a>
                            <button class="share-btn share-copy" id="copyBtn"
                                    onclick="copyLink()">
                                <i class="fa-solid fa-link" style="font-size:13px;"></i>
                                Salin Link
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Loker lainnya --}}
                @if(isset($lokerLain) && count($lokerLain) > 0)
                <div class="sidebar-card">
                    <div class="sc-header">
                        <i class="fa-solid fa-briefcase"></i>
                        Loker Lainnya
                    </div>
                    <div class="sc-body">
                        @foreach($lokerLain->take(4) as $lain)
                        <a href="{{ route('loker.detail', $lain->id) }}" class="other-loker-item">
                            <div class="oli-icon">
                                @if($lain->gambar)
                                    <img src="{{ asset('storage/'.$lain->gambar) }}" alt="{{ $lain->judul }}">
                                @else
                                    <i class="fa-solid fa-briefcase"></i>
                                @endif
                            </div>
                            <div>
                                <div class="oli-title">{{ $lain->judul }}</div>
                                <div class="oli-date">
                                    <i class="fa-regular fa-clock" style="font-size:9px;"></i>
                                    {{ \Carbon\Carbon::parse($lain->created_at)->diffForHumans() }}
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>
            {{-- end sidebar --}}

        </div>
    </div>
</section>

<!-- footer -->
<footer style="background:#FFFFFF; color:black; padding:50px 0 20px;">

    <div class="container-fluid px-5">

        <div class="row align-items-start">

            <!-- LOGO + DESKRIPSI -->
            <div class="col-md-3 mb-4" style="padding-right:30px;">

                <!-- LOGO DIPERKECIL -->
                <img src="{{ asset('images/beranda/logo-almed.png') }}"
                     style="height:50px; margin-bottom:10px;">

                <h5 class="fw-bold mb-2">RSU Allam Medica Bumiayu</h5>

                <p style="font-size:13px; line-height:1.6; color:#666; margin-bottom:15px;">
                    Jl. Pangeran Diponegoro No. 609, Jatisawit, Bumiayu,
                    Kabupaten Brebes, Jawa Tengah 52273
                </p>

                <!-- SOSIAL -->
                <div style="margin-bottom:15px;">
                    <i class="bi bi-twitter me-2" style="color:#666;"></i>
                    <i class="bi bi-facebook me-2" style="color:#666;"></i>
                    <i class="bi bi-instagram" style="color:#666;"></i>
                </div>

                <!-- AKREDITASI & MITRA -->
                <small style="color:#666;">Akreditasi & Mitra</small><br>

                <div style="margin-top:8px; display:flex; gap:10px; align-items:center;">
                    <img src="{{ asset('images/beranda/paripurna.png') }}" style="height:35px;">
                    <img src="{{ asset('images/beranda/bpjs.png') }}" style="height:25px;">
                </div>

            </div>

            <!-- TAUTAN CEPAT -->
            <div class="col-md-2 mb-4">
                <h6 class="fw-bold mb-3">Tautan Cepat</h6>

                <ul style="list-style:none; padding:0; font-size:13px; line-height:1.9;">
                    <li><a href="#" style="color:#666; text-decoration:none;">Beranda</a></li>
                    <li><a href="#" style="color:#666; text-decoration:none;">Tentang Kami</a></li>
                    <li><a href="#" style="color:#666; text-decoration:none;">Video</a></li>
                    <li><a href="#" style="color:#666; text-decoration:none;">Kontak</a></li>
                </ul>

                <h6 class="fw-bold mt-3 mb-2">Download</h6>
                <ul style="list-style:none; padding:0; font-size:13px; line-height:1.9;">
                    <li><a href="#" style="color:#666; text-decoration:none;">Download List Pengadaan</a></li>
                    <li><a href="#" style="color:#666; text-decoration:none;">Lihat Semua Data</a></li>
                </ul>
            </div>

            <!-- MENU -->
            <div class="col-md-2 mb-4">
                <h6 class="fw-bold mb-3">Menu</h6>

                <ul style="list-style:none; padding:0; font-size:13px; line-height:1.9;">
                    <li><a href="#" style="color:#666; text-decoration:none;">Beranda</a></li>
                    <li><a href="#" style="color:#666; text-decoration:none;">Layanan</a></li>
                    <li><a href="#" style="color:#666; text-decoration:none;">Dokter</a></li>
                    <li><a href="#" style="color:#666; text-decoration:none;">Kontak</a></li>
                </ul>

                <h6 class="fw-bold mt-3 mb-2">Informasi Legal</h6>
                <ul style="list-style:none; padding:0; font-size:13px; line-height:1.9;">
                    <li><a href="#" style="color:#666; text-decoration:none;">Kebijakan Privasi</a></li>
                    <li><a href="#" style="color:#666; text-decoration:none;">Disclaimer</a></li>
                </ul>
            </div>

            <!-- LAYANAN -->
            <div class="col-md-3 mb-4">
                <h6 class="fw-bold mb-3">Layanan</h6>

                <ul style="list-style:none; padding:0; font-size:13px; line-height:1.8; color:#666;">
                    <li>Poliklinik Spesialis Anak</li>
                    <li>Poliklinik Spesialis Penyakit Dalam</li>
                    <li>Poliklinik Spesialis THT</li>
                    <li>Poliklinik Spesialis Mata</li>
                    <li>Poliklinik Spesialis Kandungan</li>
                    <li>Poliklinik Dermatologi & Estetika</li>
                    <li>Poliklinik Gigi (Umum)</li>
                    <li>Poliklinik Jantung & Pembuluh Darah</li>
                </ul>
            </div>

            <!-- HUBUNGI (DIGESER KE KIRI) -->
            <div class="col-md-2 mb-4" style="padding-left:0;">

                <h6 class="fw-bold mb-3">Hubungi Kami</h6>

                <p style="color:#666; font-size:13px; margin-bottom:10px;">
                    <i class="bi bi-telephone-fill me-2"></i> (0289) 430822
                </p>

                <p style="color:#666; font-size:13px; margin-bottom:10px;">
                    <i class="bi bi-envelope-fill me-2"></i> allam.medica@yahoo.co.id
                </p>

                <p style="color:#666; font-size:13px; margin-bottom:10px;">
                    <i class="bi bi-clock-fill me-2"></i>
                    IGD: 24 Jam | Rawat Jalan: Sen - Sab 07.00 – 21.00
                </p>

                <p style="color:#666; font-size:13px; line-height:1.6;">
                    <i class="bi bi-geo-alt-fill me-2"></i>
                    Jl. Pangeran Diponegoro No.609, Bumiayu, Brebes
                </p>

            </div>

        </div>

        <hr style="border-color:#ddd; margin:20px 0;">

        <div class="text-start" style="font-size:13px; color:#666;">
            © 2026 RSU Allam Medica. Hak Cipta Dilindungi.
        </div>

    </div>

</footer>

{{-- Back floating button --}}
<a href="{{ url('/karir') }}" class="back-float">
    <i class="fa-solid fa-arrow-left" style="font-size:12px;"></i>
    Kembali ke Karir
</a>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
/* ---- Copy link ---- */
function copyLink() {
    const btn = document.getElementById('copyBtn');
    navigator.clipboard.writeText(window.location.href).then(function() {
        btn.classList.add('copied');
        btn.innerHTML = '<i class="fa-solid fa-check" style="font-size:13px;"></i> Tersalin!';
        setTimeout(function() {
            btn.classList.remove('copied');
            btn.innerHTML = '<i class="fa-solid fa-link" style="font-size:13px;"></i> Salin Link';
        }, 2500);
    }).catch(function() {
        /* Fallback */
        const ta = document.createElement('textarea');
        ta.value = window.location.href;
        document.body.appendChild(ta);
        ta.select(); document.execCommand('copy');
        document.body.removeChild(ta);
        btn.classList.add('copied');
        btn.innerHTML = '<i class="fa-solid fa-check" style="font-size:13px;"></i> Tersalin!';
        setTimeout(function() {
            btn.classList.remove('copied');
            btn.innerHTML = '<i class="fa-solid fa-link" style="font-size:13px;"></i> Salin Link';
        }, 2500);
    });
}
</script>

</body>
</html>