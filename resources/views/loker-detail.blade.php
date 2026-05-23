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
    body {
        padding-top: 0px;
    }

    .loker-hero {
        background: linear-gradient(135deg, var(--navy) 0%, var(--navy-light) 50%, #1e40af 100%);
        position: relative; overflow: hidden;
        padding: 90px 0 80px;
        margin-top:-90px;
        padding-top:120px;
        
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
    .loker-body { 
        padding: 56px 0 72px;
        background: #fff; 
    }

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
        .loker-hero     { padding: 110px 0 64px; }
        .hero-img-wrap  { margin-top: 36px; }
        .hero-apply-float { position: static; margin: 20px auto 0; display: none; }
        .loker-body     { padding: 40px 0 56px; }
    }
    @media(max-width:575.98px) {
        .hero-title     { font-size: 26px; }
        .desc-card-body { padding: 20px; }
        .sc-body        { padding: 16px 18px; }
    }



    
@font-face {
    font-family: 'GothamBlack';
    src: url('{{ asset('fonts/Gotham-Black.otf') }}') format('opentype');
    font-weight: 900;
    font-style: normal;
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
                    <li><a href="{{ route('video') }}">Video</a></li>
                    <li><a href="{{ route('loker.index') }}">Karir</a></li>
                    <li><a href="{{ route('berita') }}">Berita</a></li>
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