<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Artikel — RSU Allam Medica</title>
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
</head>

<style>
body{
    font-family:'Segoe UI',sans-serif;
    padding-top:90px;
    background:#f5f7fb;
    overflow-x:hidden;
}

/* ================= TOP BAR ================= */
.topbar{
    background:#1C145C;
    position:fixed;
    top:0;
    width:100%;
    z-index:9999;
    height:40px;
    display:flex;
    align-items:center;
}

.topbar .container{
    display:flex;
    align-items:center;
    justify-content:space-between;
}

.topbar .navbar-nav{
    display:flex;
    flex-direction:row;
    align-items:center;
    margin:0;
    padding:0;
}

.topbar .nav-item{
    list-style:none;
}

.topbar span{
    color:#fff;
    display:flex;
    align-items:center;
    gap:6px;
    font-size:13px;
    padding:0 10px;
    white-space:nowrap;
}

.topbar .nav-link{
    color:#fff !important;
    padding:0 6px !important;
    display:flex;
    align-items:center;
    justify-content:center;
    opacity:.9;
    transition:.3s;
}

.topbar .nav-link:hover{
    opacity:1;
    transform:translateY(-1px);
}

/* ================= NAVBAR ================= */
.navbar-main{
    background:#fff;
    border-radius:0 0 20px 20px;
    box-shadow:0 4px 12px rgba(0,0,0,0.08);
    position:fixed;
    top:40px;
    width:100%;
    z-index:9998;
    padding:10px 0;
}

/* ================= NAV MENU ================= */
.navbar-main .nav-gap{
    gap:18px;
}

.navbar-main .nav-link{
    color:#334155 !important;
    font-weight:500;
    transition:.3s;
}

.navbar-main .nav-link:hover{
    color:#1C145C !important;
}

/* ================= DESKTOP DROPDOWN ================= */
@media (min-width:992px){

    .navbar-main .dropdown-menu{
        display:block;
        opacity:0;
        visibility:hidden;
        transform:translateY(10px);
        transition:all .3s ease;

        border:none;
        border-radius:16px;
        padding:10px;
        min-width:220px;

        box-shadow:0 10px 25px rgba(0,0,0,0.08);
    }

    .navbar-main .nav-item.dropdown:hover .dropdown-menu{
        opacity:1;
        visibility:visible;
        transform:translateY(0);
    }

    .navbar-main .dropdown-item{
        border-radius:10px;
        padding:10px 14px;
        transition:.25s;
    }

    .navbar-main .dropdown-item:hover{
        background:#f1f5ff;
        color:#1C145C;
    }
}

/* ================= MOBILE ================= */
@media (max-width:991px){

    body{
        padding-top:100px;
    }

    /* TOPBAR */
    .topbar{
        height:40px;
    }

    .topbar .container{
        flex-direction:row;
        justify-content:space-between;
        align-items:center;
    }

    .topbar span{
        font-size:11px;
        padding:0 4px;
    }

    /* NAVBAR */
    .navbar-main{
        top:40px;
        border-radius:0 0 18px 18px;
    }

    /* BOX MENU */
    .navbar-main .navbar-collapse{
        background:#fff;
        margin-top:15px;
        border-radius:18px;
        padding:15px;
        box-shadow:0 8px 25px rgba(0,0,0,0.08);
    }

    /* MENU */
    .navbar-main .navbar-nav.nav-gap{
        gap:0 !important;
        width:100%;
    }

    .navbar-main .navbar-nav .nav-item{
        width:100%;
        border-bottom:1px solid #eef2f7;
    }

    .navbar-main .navbar-nav .nav-item:last-child{
        border-bottom:none;
    }

    .navbar-main .navbar-nav .nav-link{
        padding:14px 5px;
        font-size:15px;
    }

    /* DROPDOWN */
    .navbar-main .dropdown-toggle{
        display:flex;
        justify-content:space-between;
        align-items:center;
    }

    .navbar-main .dropdown-menu{
        position:static !important;
        display:block !important;

        border:none;
        background:#f8fafc;
        border-radius:14px;

        margin-top:5px;
        margin-bottom:10px;

        padding:0;

        max-height:0;
        overflow:hidden;

        opacity:0;
        visibility:hidden;

        transform:translateY(-5px);

        transition:
            max-height .35s ease,
            opacity .3s ease,
            transform .3s ease,
            padding .3s ease;
    }

    .navbar-main .dropdown-menu.show{
        max-height:400px;
        opacity:1;
        visibility:visible;
        transform:translateY(0);
        padding:8px;
    }

    .navbar-main .dropdown-item{
        padding:12px 14px;
        border-radius:10px;
        font-size:14px;
        color:#334155;
        transition:.25s;
    }

    .navbar-main .dropdown-item:hover{
        background:#e8eeff;
        color:#1C145C;
        padding-left:18px;
    }

    .navbar-main .dropdown-toggle::after{
        transition:.3s ease;
    }

    .navbar-main .dropdown-toggle.show::after{
        transform:rotate(180deg);
    }
}

/* ============================================================
   HERO SECTION
============================================================ */
.artikel-hero {
    background: linear-gradient(150deg, #1C145C 0%, #231a72 40%, #0ea5e9 100%);
    padding: 56px 0 72px;
    position: relative;
    overflow: hidden;
}

.artikel-hero::before {
    content: '';
    position: absolute; right: -80px; top: -80px;
    width: 420px; height: 420px; border-radius: 50%;
    background: radial-gradient(circle, rgba(255,255,255,.06), transparent 65%);
    pointer-events: none;
}

.artikel-hero::after {
    content: '';
    position: absolute; left: -40px; bottom: -100px;
    width: 300px; height: 300px; border-radius: 50%;
    background: radial-gradient(circle, rgba(14,165,233,.12), transparent 65%);
    pointer-events: none;
}

/* Dot grid */
.hero-dots {
    position: absolute; inset: 0; pointer-events: none;
    background-image: radial-gradient(rgba(255,255,255,.05) 1px, transparent 1px);
    background-size: 26px 26px;
}

.hero-inner { position: relative; z-index: 2; }

/* Breadcrumb */
.hero-bc {
    display: flex; align-items: center; gap: 8px;
    margin-bottom: 20px;
}
.hero-bc a {
    color: rgba(255,255,255,.6); font-size: 13px; font-weight: 500;
    text-decoration: none; transition: color .2s;
    display: flex; align-items: center; gap: 5px;
}
.hero-bc a:hover { color: #fff; }
.hero-bc .sep { color: rgba(255,255,255,.25); font-size: 11px; }
.hero-bc .cur { color: rgba(255,255,255,.8); font-size: 13px; font-weight: 600; }

/* Kategori pill */
.hero-kat {
    display: inline-flex; align-items: center; gap: 6px;
    background: rgba(14,165,233,.85);
    color: #fff; font-size: 11px; font-weight: 800;
    text-transform: uppercase; letter-spacing: 1px;
    padding: 5px 14px; border-radius: 20px;
    margin-bottom: 18px;
    box-shadow: 0 3px 12px rgba(14,165,233,.35);
}

/* Title */
.hero-title {
    font-family: 'DM Serif Display', serif;
    font-size: clamp(28px, 4.5vw, 46px);
    color: #fff; line-height: 1.2;
    letter-spacing: -.3px; margin-bottom: 18px;
    font-weight: 400;
}

/* Meta pills */
.hero-meta {
    display: flex; align-items: center; gap: 8px; flex-wrap: wrap;
}
.hero-meta-pill {
    display: inline-flex; align-items: center; gap: 6px;
    background: rgba(255,255,255,.1);
    border: 1px solid rgba(255,255,255,.15);
    color: rgba(255,255,255,.8);
    font-size: 12px; font-weight: 600;
    padding: 5px 13px; border-radius: 20px;
    backdrop-filter: blur(6px);
}
.hero-meta-pill i { font-size: 10px; color: #7dd3fc; }

/* ============================================================
   BODY LAYOUT
============================================================ */
.artikel-body { 
    padding: 52px 0 72px; 
    background: #ffffff;
}

/* ---- Main article card ---- */
.artikel-main-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 4px 24px rgba(28,20,92,.08);
    border: 1px solid #e8edf5;
    margin-bottom: 28px;
}

/* Featured image */
.artikel-featured-img {
    width: 100%; aspect-ratio: 16/7;
    object-fit: cover; display: block;
}

.artikel-img-placeholder {
    width: 100%; aspect-ratio: 16/7;
    background: linear-gradient(135deg, #e0f2fe, #cffafe);
    display: flex; align-items: center; justify-content: center;
    font-size: 72px; color: #0ea5e9; opacity: .4;
}

/* Article content */
.artikel-content {
    padding: 36px 40px 40px;
}

.artikel-content h1, .artikel-content h2, .artikel-content h3 {
    font-family: 'DM Serif Display', serif;
    color: #1C145C; margin-bottom: 16px; line-height: 1.3;
}

.artikel-content p {
    font-size: 15.5px; line-height: 1.9;
    color: #374151; margin-bottom: 20px;
}

.artikel-content ul, .artikel-content ol {
    padding-left: 22px; margin-bottom: 20px;
}

.artikel-content li {
    font-size: 15px; line-height: 1.8; color: #374151; margin-bottom: 6px;
}

/* Share bar (bawah artikel) */
.artikel-share-bar {
    display: flex; align-items: center; justify-content: space-between;
    padding: 16px 40px;
    border-top: 1px solid #e8edf5;
    background: #fafbff;
    flex-wrap: wrap; gap: 12px;
}

.share-label {
    font-size: 13px; font-weight: 700; color: #64748b;
    display: flex; align-items: center; gap: 6px;
}

.share-btns { display: flex; gap: 8px; }

.share-btn {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 7px 16px; border-radius: 8px; border: none;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 12.5px; font-weight: 700; cursor: pointer;
    text-decoration: none;
    transition: transform .2s, box-shadow .2s;
}
.share-btn:hover { transform: translateY(-2px); }
.btn-wa   { background: #25D366; color: #fff; box-shadow: 0 3px 10px rgba(37,211,102,.3); }
.btn-wa:hover   { color: #fff; box-shadow: 0 6px 18px rgba(37,211,102,.4); }
.btn-copy { background: #f1f5f9; color: #475569; border: 1.5px solid #e2e8f0; }
.btn-copy.copied { background: #10b981; color: #fff; border-color: #10b981; }

/* ============================================================
   SIDEBAR
============================================================ */

/* ---- Artikel terkait card ---- */
.sidebar-card {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 18px rgba(28,20,92,.07);
    border: 1px solid #e8edf5;
    margin-bottom: 24px;
}

.sc-head {
    padding: 16px 20px 14px;
    border-bottom: 1px solid #e8edf5;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13.5px; font-weight: 800; color: #1e293b;
    display: flex; align-items: center; gap: 8px;
}
.sc-head i { color: #0ea5e9; font-size: 13px; }
.sc-body { padding: 16px 20px; }

/* Artikel terkait item */
.artikel-item {
    display: flex; align-items: flex-start; gap: 12px;
    padding: 10px 0; border-bottom: 1px solid #f1f5f9;
    text-decoration: none; color: #1e293b;
    transition: background .15s;
    cursor: pointer;
}
.artikel-item:last-child { border-bottom: 0; padding-bottom: 0; }
.artikel-item:hover .ai-title { color: #0ea5e9; }

.ai-thumb {
    width: 68px; height: 52px; border-radius: 8px;
    object-fit: cover; flex-shrink: 0;
}
.ai-thumb-placeholder {
    width: 68px; height: 52px; border-radius: 8px;
    background: linear-gradient(135deg, #e0f2fe, #cffafe);
    display: flex; align-items: center; justify-content: center;
    font-size: 20px; color: #0ea5e9; flex-shrink: 0;
}
.ai-title {
    font-size: 13px; font-weight: 700; color: #1e293b;
    line-height: 1.4; transition: color .15s;
    display: -webkit-box; -webkit-line-clamp: 2;
    -webkit-box-orient: vertical; overflow: hidden;
}
.ai-date {
    font-size: 11px; color: #94a3b8; margin-top: 4px;
    display: flex; align-items: center; gap: 4px;
}

/* ---- Info box (meta artikel) ---- */
.info-row {
    display: flex; align-items: flex-start; gap: 12px;
    padding: 10px 0; border-bottom: 1px solid #f1f5f9;
}
.info-row:last-child { border-bottom: 0; padding-bottom: 0; }
.info-icon {
    width: 32px; height: 32px; border-radius: 8px; flex-shrink: 0;
    display: flex; align-items: center; justify-content: center; font-size: 13px;
}
.info-label {
    font-size: 10.5px; font-weight: 700; color: #94a3b8;
    text-transform: uppercase; letter-spacing: .6px;
}
.info-val {
    font-size: 13.5px; font-weight: 600; color: #1e293b; margin-top: 2px;
}

/* ---- Kategori tags ---- */
.tag-cloud { display: flex; flex-wrap: wrap; gap: 7px; }
.tag-pill {
    display: inline-flex; align-items: center; gap: 5px;
    background: #f1f5f9; color: #475569;
    font-size: 12px; font-weight: 700; padding: 5px 13px; border-radius: 20px;
    border: 1.5px solid #e2e8f0; text-decoration: none;
    transition: background .2s, color .2s, border-color .2s;
}
.tag-pill:hover { background: #1C145C; color: #fff; border-color: #1C145C; }

/* ============================================================
   PAGINATION
============================================================ */
.artikel-pagination {
    display: flex; align-items: center; justify-content: center;
    gap: 6px; padding: 12px 40px 24px; border-top: 1px solid #e8edf5;
    flex-wrap: wrap;
}
.pag-info { font-size: 13px; color: #64748b; width: 100%; text-align: center; margin-bottom: 8px; }
.pag-btn {
    display: inline-flex; align-items: center; justify-content: center;
    width: 36px; height: 36px; border-radius: 8px;
    border: 1.5px solid #e2e8f0; background: #fff; color: #475569;
    font-size: 13px; font-weight: 600; cursor: pointer;
    text-decoration: none; transition: all .2s;
}
.pag-btn:hover, .pag-btn.active {
    background: #1C145C; border-color: #1C145C; color: #fff;
}

/* ============================================================
   ARTIKEL GRID (list semua artikel)
============================================================ */
.artikel-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 22px;
    padding: 20px 0 32px;
}

/* Card artikel */
.artikel-card {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 2px 12px rgba(28,20,92,.07);
    border: 1px solid #e8edf5;
    display: flex; flex-direction: column;
    transition: transform .25s, box-shadow .25s;
}
.artikel-card:hover { transform: translateY(-5px); box-shadow: 0 12px 36px rgba(28,20,92,.12); }

/* Thumbnail */
.ac-thumb {
    position: relative; overflow: hidden;
    aspect-ratio: 16/9; flex-shrink: 0;
}
.ac-thumb img {
    width: 100%; height: 100%; object-fit: cover;
    transition: transform .4s ease;
}
.artikel-card:hover .ac-thumb img { transform: scale(1.04); }
.ac-thumb-placeholder {
    width: 100%; height: 100%;
    background: linear-gradient(135deg, #e0f2fe, #cffafe);
    display: flex; align-items: center; justify-content: center;
    font-size: 42px; color: #0ea5e9;
}

/* Kat badge on thumb */
.ac-kat {
    position: absolute; top: 10px; left: 10px;
    background: rgba(28,20,92,.82); backdrop-filter: blur(6px);
    color: #fff; font-size: 10px; font-weight: 800;
    text-transform: uppercase; letter-spacing: .7px;
    padding: 3px 10px; border-radius: 20px;
}

/* Card body */
.ac-body { padding: 18px 20px; flex: 1; display: flex; flex-direction: column; }
.ac-date {
    font-size: 11px; color: #94a3b8; font-weight: 600;
    text-transform: uppercase; letter-spacing: .5px;
    margin-bottom: 8px; display: flex; align-items: center; gap: 5px;
}
.ac-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 15px; font-weight: 800; color: #1e293b; line-height: 1.4;
    margin-bottom: 8px;
    display: -webkit-box; -webkit-line-clamp: 2;
    -webkit-box-orient: vertical; overflow: hidden;
}
.ac-excerpt {
    font-size: 13px; color: #64748b; line-height: 1.6; flex: 1;
    display: -webkit-box; -webkit-line-clamp: 2;
    -webkit-box-orient: vertical; overflow: hidden;
    margin-bottom: 16px;
}
/* Footer */
.ac-footer{
    display:flex;
    align-items:center;
    justify-content:flex-start;

    margin-top:16px;
    padding:14px 20px 18px; /* kasih jarak kiri & bawah */

    border-top:1px solid #eef2f7;
}

/* ================= BUTTON ================= */
.ac-read-btn{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:8px;

    padding:10px 18px;
    border-radius:12px;

    background:#1C145C;
    color:#fff;
    font-size:13px;
    font-weight:600;
    text-decoration:none;

    transition:all .25s ease;
}

.ac-read-btn i{
    font-size:12px;
    transition:transform .25s ease;
}

.ac-read-btn:hover{
    background:#2a1f7a;
    transform:translateY(-2px);
}

.ac-read-btn:hover i{
    transform:translateX(3px);
}

/* ================= MOBILE FIX ================= */
@media (max-width:575px){

    .ac-footer{
        margin-top:12px;
        padding:12px 16px 16px; /* mobile lebih rapih */
    }

    .ac-read-btn{
        width:100%;
        padding:11px 16px;
        font-size:13px;
        border-radius:10px;
    }
}
/* ---- Search + filter bar ---- */
.filter-bar {
    background: #fff; border-radius: 14px;
    border: 1px solid #e8edf5;
    padding: 16px 20px;
    display: flex; align-items: center; gap: 12px;
    margin-bottom: 24px; flex-wrap: wrap;
    box-shadow: 0 2px 10px rgba(28,20,92,.06);
}
.filter-search-wrap { position: relative; flex: 1; min-width: 200px; }
.filter-search-wrap i {
    position: absolute; left: 13px; top: 50%;
    transform: translateY(-50%); color: #94a3b8; font-size: 13px; pointer-events: none;
}
.filter-search {
    width: 100%; padding: 9px 13px 9px 36px;
    border: 1.5px solid #e2e8f0; border-radius: 10px;
    font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13.5px; color: #1e293b;
    outline: none; background: #f8faff;
    transition: border-color .2s, box-shadow .2s;
}
.filter-search::placeholder { color: #b0bec5; }
.filter-search:focus { border-color: #0ea5e9; box-shadow: 0 0 0 3px rgba(14,165,233,.12); background: #fff; }

.filter-select {
    padding: 9px 28px 9px 12px; border: 1.5px solid #e2e8f0;
    border-radius: 10px; font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px; color: #1e293b; outline: none; background: #f8faff;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%2364748b' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
    background-repeat: no-repeat; background-position: right 10px center; cursor: pointer;
}
.filter-select:focus { border-color: #0ea5e9; outline: none; }

/* ---- Section heading ---- */
.section-heading {
    font-family: 'DM Serif Display', serif;
    font-size: 28px; font-weight: 400; color: #1C145C;
    margin-bottom: 6px; letter-spacing: -.3px;
}
.section-sub { font-size: 14px; color: #64748b; margin-bottom: 24px; }
.section-divider {
    display: flex; align-items: center; gap: 12px; margin-bottom: 24px;
}
.section-divider::after { content: ''; flex: 1; height: 1.5px; background: linear-gradient(to right, #e2e8f0, transparent); }

/* ---- Empty state ---- */
.empty-state {
    grid-column: 1/-1; padding: 64px 24px; text-align: center; color: #64748b;
}
.empty-state .es-icon {
    width: 72px; height: 72px; border-radius: 20px;
    background: #e0f2fe; color: #0ea5e9;
    display: flex; align-items: center; justify-content: center;
    font-size: 28px; margin: 0 auto 16px;
}
.empty-state .es-title { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 16px; font-weight: 700; color: #1e293b; margin-bottom: 6px; }
.empty-state .es-sub   { font-size: 13.5px; }

/* Responsive */
@media(max-width:991.98px) {
    .artikel-content    { padding: 28px 24px 32px; }
    .artikel-share-bar  { padding: 14px 24px; }
    .artikel-pagination { padding: 10px 24px 20px; }
    .artikel-grid       { grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 16px; }
}
@media(max-width:575.98px) {
    .artikel-hero { padding: 44px 0 56px; }
    .hero-title   { font-size: 26px; }
    .artikel-content { padding: 22px 18px 28px; }
    .artikel-share-bar { padding: 12px 18px; }
    .artikel-grid { grid-template-columns: 1fr; }
    .filter-bar   { flex-direction: column; align-items: stretch; }
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
            <li class="nav-item"><a class="nav-link text-white p-1" href="https://www.tiktok.com/@rsuallammedicabumiayu?_t=8fLMQk9idhI&_r=1"><i class="bi bi-tiktok"></i></a></li>
            <li class="nav-item"><a class="nav-link text-white p-1" href="https://www.facebook.com/allam.medicabmy?mibextid=LQQJ4d"><i class="bi bi-facebook"></i></a></li>
            <li class="nav-item"><a class="nav-link text-white p-1" href="https://www.instagram.com/allam.medica/"><i class="bi bi-instagram"></i></a></li>
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
        <button class="navbar-toggler border-0 shadow-none" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="mainMenu">

            <ul class="navbar-nav ms-auto nav-gap">

                <li class="nav-item">
                    <a href="/" class="nav-link">Beranda</a>
                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       href="#"
                       data-bs-toggle="dropdown">
                        Menu
                    </a>

                    <ul class="dropdown-menu">

                        <li>
                            <a class="dropdown-item" href="{{ url('/karir') }}">
                                Karir
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="{{ url('/berita') }}">
                                Berita
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="{{ url('/video') }}">
                                Video
                            </a>
                        </li>

                    </ul>

                </li>

                <li class="nav-item">
                    <a href="/layanan" class="nav-link">Layanan</a>
                </li>

                <li class="nav-item">
                    <a href="/artikel" class="nav-link">Artikel</a>
                </li>

                <li class="nav-item">
                    <a href="/download" class="nav-link">Download</a>
                </li>

                <li class="nav-item">
                    <a href="/tentang" class="nav-link">Tentang Kami</a>
                </li>

                <li class="nav-item">
                    <a href="/kontak" class="nav-link">Kontak</a>
                </li>

            </ul>

        </div>

    </div>
</nav>


{{-- ============================================================
     CEK: apakah ini halaman DETAIL atau halaman LIST?
     Jika ada $artikel (single), tampilkan detail.
     Jika ada $artikelList (collection), tampilkan list.
============================================================ --}}

@if(isset($artikel))
{{-- ============================================================
     MODE DETAIL ARTIKEL
============================================================ --}}

<!-- HERO -->
<section class="artikel-hero">
    <div class="hero-dots"></div>
    <div class="container hero-inner">

        <!-- Breadcrumb -->
        <div class="hero-bc">
            <a href="/"><i class="bi bi-house-fill"></i> Beranda</a>
            <span class="sep"><i class="bi bi-chevron-right"></i></span>
            <a href="{{ url('/artikel') }}">Artikel</a>
            <span class="sep"><i class="bi bi-chevron-right"></i></span>
            <span class="cur">Detail Artikel</span>
        </div>

        <!-- Kategori -->
        @if(!empty($artikel->kategori))
        <div class="hero-kat">
            <i class="fa-solid fa-tag" style="font-size:10px;"></i>
            {{ $artikel->kategori }}
        </div>
        @endif

        <!-- Title -->
        <h1 class="hero-title">{{ $artikel->judul }}</h1>

        <!-- Meta -->
        <div class="hero-meta">
            <span class="hero-meta-pill">
                <i class="fa-solid fa-hospital"></i>
                RSU Allam Medica
            </span>
            <span class="hero-meta-pill">
                <i class="fa-regular fa-calendar"></i>
                {{ \Carbon\Carbon::parse($artikel->created_at)->translatedFormat('d F Y') }}
            </span>
            <span class="hero-meta-pill">
                <i class="fa-regular fa-clock"></i>
                {{ ceil(str_word_count(strip_tags($artikel->isi ?? $artikel->deskripsi ?? '')) / 200) }} menit baca
            </span>
            @if($artikel->views ?? false)
            <span class="hero-meta-pill">
                <i class="fa-regular fa-eye"></i>
                {{ number_format($artikel->views) }} tayangan
            </span>
            @endif
        </div>

    </div>
</section>

<!-- BODY -->
<section class="artikel-body">
    <div class="container">
        <div class="row g-4">

            <!-- Main column -->
            <div class="col-lg-8">
                <div class="artikel-main-card">

                    <!-- Featured image -->
                    @if(!empty($artikel->gambar))
                        <img src="{{ Storage::url($artikel->gambar) }}"
                             alt="{{ $artikel->judul }}"
                             class="artikel-featured-img">
                    @else
                        <div class="artikel-img-placeholder">
                            <i class="fa-regular fa-newspaper"></i>
                        </div>
                    @endif

                    <!-- Content -->
                    <div class="artikel-content">
                        <div class="artikel-isi">
                            {!! nl2br(e($artikel->isi ?? $artikel->deskripsi ?? '')) !!}
                        </div>
                    </div>

                    <!-- Share bar -->
                    <div class="artikel-share-bar">
                        <div class="share-label">
                            <i class="fa-solid fa-share-nodes" style="color:#0ea5e9;"></i>
                            Bagikan artikel ini
                        </div>
                        <div class="share-btns">
                            <a href="https://wa.me/?text={{ urlencode($artikel->judul . ' — ' . url()->current()) }}"
                               target="_blank" class="share-btn btn-wa">
                                <i class="fa-brands fa-whatsapp"></i> WhatsApp
                            </a>
                            <button class="share-btn btn-copy" id="copyBtn" onclick="copyLink()">
                                <i class="fa-solid fa-link"></i> Salin Link
                            </button>
                        </div>
                    </div>

                </div>

                <!-- Back button -->
                <a href="{{ url('/artikel') }}"
                   style="display:inline-flex;align-items:center;gap:8px;
                          padding:10px 22px;border-radius:10px;
                          background:#1C145C;color:#fff;text-decoration:none;
                          font-size:13.5px;font-weight:700;
                          transition:background .2s,transform .2s;">
                    <i class="fa-solid fa-arrow-left" style="font-size:12px;"></i>
                    Kembali ke Daftar Artikel
                </a>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">

                <!-- Info meta -->
                <div class="sidebar-card">
                    <div class="sc-head">
                        <i class="fa-solid fa-circle-info"></i>
                        Info Artikel
                    </div>
                    <div class="sc-body">
                        <div class="info-row">
                            <div class="info-icon" style="background:#e0f2fe;color:#0284c7;">
                                <i class="fa-regular fa-newspaper"></i>
                            </div>
                            <div>
                                <div class="info-label">Judul</div>
                                <div class="info-val" style="font-size:13px;line-height:1.4;">{{ $artikel->judul }}</div>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-icon" style="background:#d1fae5;color:#059669;">
                                <i class="fa-regular fa-calendar"></i>
                            </div>
                            <div>
                                <div class="info-label">Diterbitkan</div>
                                <div class="info-val">{{ \Carbon\Carbon::parse($artikel->created_at)->translatedFormat('d F Y') }}</div>
                            </div>
                        </div>
                        @if(!empty($artikel->kategori))
                        <div class="info-row">
                            <div class="info-icon" style="background:#ede9fe;color:#7c3aed;">
                                <i class="fa-solid fa-tag"></i>
                            </div>
                            <div>
                                <div class="info-label">Kategori</div>
                                <div class="info-val">{{ $artikel->kategori }}</div>
                            </div>
                        </div>
                        @endif
                        <div class="info-row">
                            <div class="info-icon" style="background:#fef3c7;color:#d97706;">
                                <i class="fa-solid fa-hospital"></i>
                            </div>
                            <div>
                                <div class="info-label">Penulis</div>
                                <div class="info-val">Tim RSU Allam Medica</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tags -->
                <div class="sidebar-card">
                    <div class="sc-head">
                        <i class="fa-solid fa-tags"></i>
                        Topik
                    </div>
                    <div class="sc-body">
                        <div class="tag-cloud">
                            <a href="{{ url('/artikel?kategori=Kesehatan') }}" class="tag-pill">Kesehatan</a>
                            <a href="{{ url('/artikel?kategori=Informasi') }}" class="tag-pill">Informasi</a>
                            <a href="{{ url('/artikel?kategori=Layanan') }}"   class="tag-pill">Layanan</a>
                            <a href="{{ url('/artikel?kategori=Dokter') }}"    class="tag-pill">Dokter</a>
                            <a href="{{ url('/artikel?kategori=Edukasi') }}"   class="tag-pill">Edukasi</a>
                            <a href="{{ url('/artikel?kategori=Tips') }}"      class="tag-pill">Tips</a>
                        </div>
                    </div>
                </div>

                <!-- Artikel terkait -->
                @if(isset($artikelTerkait) && count($artikelTerkait) > 0)
                <div class="sidebar-card">
                    <div class="sc-head">
                        <i class="fa-solid fa-layer-group"></i>
                        Artikel Terkait
                    </div>
                    <div class="sc-body">
                        @foreach($artikelTerkait->take(4) as $terkait)
                        <a href="{{ route('artikel.detail', $terkait->id) }}" class="artikel-item">
                            @if(!empty($terkait->gambar))
                                <img src="{{ asset('storage/'.$terkait->gambar) }}"
                                     alt="{{ $terkait->judul }}" class="ai-thumb">
                            @else
                                <div class="ai-thumb-placeholder">
                                    <i class="fa-regular fa-newspaper"></i>
                                </div>
                            @endif
                            <div>
                                <div class="ai-title">{{ $terkait->judul }}</div>
                                <div class="ai-date">
                                    <i class="fa-regular fa-clock" style="font-size:9px;"></i>
                                    {{ \Carbon\Carbon::parse($terkait->created_at)->diffForHumans() }}
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>

        </div>
    </div>
</section>

@else
{{-- ============================================================
     MODE LIST ARTIKEL
============================================================ --}}

<!-- HERO (list) -->
<section class="artikel-hero">
    <div class="hero-dots"></div>
    <div class="container hero-inner">

        <div class="hero-bc">
            <a href="/"><i class="bi bi-house-fill"></i> Beranda</a>
            <span class="sep"><i class="bi bi-chevron-right"></i></span>
            <span class="cur">Artikel</span>
        </div>

        <div class="hero-kat">
            <i class="fa-regular fa-newspaper" style="font-size:10px;"></i>
            Artikel & Edukasi Kesehatan
        </div>

        <h1 class="hero-title">
            Artikel<br>
            <em>RSU Allam Medica</em>
        </h1>

        <div class="hero-meta">
            <span class="hero-meta-pill">
                <i class="fa-solid fa-newspaper"></i>
                {{ isset($artikelList) ? $artikelList->total() : count($dummyArtikel ?? []) }} Artikel
            </span>
            <span class="hero-meta-pill">
                <i class="fa-solid fa-hospital"></i>
                RSU Allam Medica Bumiayu
            </span>
        </div>

    </div>
</section>

<!-- BODY LIST -->
<section class="artikel-body">
    <div class="container">

        <!-- Filter bar -->
        <div class="filter-bar">
            <div class="filter-search-wrap">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="search" class="filter-search" id="searchArtikel"
                       placeholder="Cari judul artikel..."
                       value="{{ request('search') }}">
            </div>
            <select class="filter-select" id="filterKategori">
                <option value="">Semua Kategori</option>
                <option value="Kesehatan"  {{ request('kategori') === 'Kesehatan'  ? 'selected' : '' }}>Kesehatan</option>
                <option value="Informasi"  {{ request('kategori') === 'Informasi'  ? 'selected' : '' }}>Informasi</option>
                <option value="Layanan"    {{ request('kategori') === 'Layanan'    ? 'selected' : '' }}>Layanan</option>
                <option value="Dokter"     {{ request('kategori') === 'Dokter'     ? 'selected' : '' }}>Dokter</option>
                <option value="Edukasi"    {{ request('kategori') === 'Edukasi'    ? 'selected' : '' }}>Edukasi</option>
                <option value="Tips"       {{ request('kategori') === 'Tips'       ? 'selected' : '' }}>Tips</option>
            </select>
            <select class="filter-select" id="filterSort">
                <option value="newest">Terbaru</option>
                <option value="oldest">Terlama</option>
                <option value="popular">Terpopuler</option>
            </select>
        </div>

        <!-- Section heading -->
        <div class="section-divider">
            <div>
                <div class="section-heading">Semua Artikel</div>
                <div class="section-sub">
                    Baca informasi terbaru, edukasi kesehatan, dan update layanan dari tim kami
                </div>
            </div>
        </div>

        @php
        /* Dummy data — ganti dengan $artikelList dari controller */
        $dummyArtikel = [
            ['id'=>1,'judul'=>'Kenali Tanda-Tanda Awal Diabetes dan Cara Mencegahnya','deskripsi'=>'Diabetes mellitus adalah penyakit kronis yang mempengaruhi cara tubuh memproses gula darah. Kenali gejala awal dan langkah pencegahannya sejak dini.','gambar'=>null,'kategori'=>'Kesehatan','created_at'=>'2026-04-10','views'=>1248],
            ['id'=>2,'judul'=>'Panduan Memilih Dokter Spesialis yang Tepat untuk Kondisi Anda','deskripsi'=>'Memilih dokter spesialis yang sesuai sangat penting untuk mendapatkan penanganan medis yang optimal. Berikut panduan lengkapnya.','gambar'=>null,'kategori'=>'Informasi','created_at'=>'2026-04-08','views'=>876],
            ['id'=>3,'judul'=>'Manfaat Pemeriksaan Kesehatan Rutin Setiap Tahun','deskripsi'=>'Medical check-up tahunan dapat mendeteksi penyakit sejak dini, bahkan sebelum gejala muncul. Simak manfaat lengkap dan panduan pelaksanaannya.','gambar'=>null,'kategori'=>'Tips','created_at'=>'2026-04-05','views'=>1034],
            ['id'=>4,'judul'=>'Tips Menjaga Kesehatan Anak di Musim Pancaroba','deskripsi'=>'Perubahan cuaca membuat anak rentan terkena penyakit. Berikut tips praktis dari dokter anak kami untuk menjaga imunitas si kecil.','gambar'=>null,'kategori'=>'Edukasi','created_at'=>'2026-04-02','views'=>756],
            ['id'=>5,'judul'=>'Layanan Poli Kandungan: Persiapan Menuju Persalinan Aman','deskripsi'=>'Kehamilan yang sehat dimulai dari pemeriksaan rutin yang tepat. Tim dokter kandungan RSU Allam Medica siap mendampingi Anda.','gambar'=>null,'kategori'=>'Layanan','created_at'=>'2026-03-28','views'=>923],
            ['id'=>6,'judul'=>'Hipertensi: Penyebab, Gejala, dan Penanganan di RSU Allam Medica','deskripsi'=>'Hipertensi atau tekanan darah tinggi sering disebut silent killer. Pelajari cara mengelola dan mencegah komplikasinya.','gambar'=>null,'kategori'=>'Kesehatan','created_at'=>'2026-03-24','views'=>1102],
        ];
        $listArtikel = isset($artikelList) ? $artikelList->items() : $dummyArtikel;
        @endphp

        <!-- Cards grid -->
        <div class="artikel-grid" id="artikelGrid">

            @forelse($listArtikel as $item)
            @php
                $aId   = $item['id']          ?? $item->id;
                $judul = $item['judul']        ?? $item->judul;
                $desc  = $item['deskripsi']    ?? $item->deskripsi ?? '';
                $gmbr  = $item['gambar']       ?? $item->gambar    ?? null;
                $kat   = $item['kategori']     ?? $item->kategori  ?? '';
                $tgl   = $item['created_at']   ?? $item->created_at ?? null;
                $views = $item['views']        ?? $item->views     ?? 0;
                $tglFmt = $tgl ? \Carbon\Carbon::parse($tgl)->translatedFormat('d M Y') : '-';
            @endphp

            <div class="artikel-card" data-judul="{{ strtolower($judul) }}" data-kat="{{ strtolower($kat) }}">

                <!-- Thumb -->
                <div class="ac-thumb">
                    @if($gmbr)
                        <img src="{{ asset('storage/'.$gmbr) }}" alt="{{ $judul }}" loading="lazy">
                    @else
                        <div class="ac-thumb-placeholder">
                            <i class="fa-regular fa-newspaper"></i>
                        </div>
                    @endif
                    @if($kat)
                        <span class="ac-kat">{{ $kat }}</span>
                    @endif
                </div>

                <!-- Body -->
                <div class="ac-body">
                    <div class="ac-date">
                        <i class="fa-regular fa-calendar" style="font-size:10px;"></i>
                        {{ $tglFmt }}
                    </div>
                    <div class="ac-title">{{ $judul }}</div>
                    <div class="ac-excerpt">{{ $desc }}</div>
                </div>

                <!-- Footer -->
                <div class="ac-footer">
                    <a href="{{ route('artikel.detail', $aId) }}" class="ac-read-btn">
                        Baca Selengkapnya
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>

            </div>
            @empty
            <div class="empty-state">
                <div class="es-icon"><i class="fa-regular fa-newspaper"></i></div>
                <div class="es-title">Belum Ada Artikel</div>
                <div class="es-sub">Artikel akan segera ditambahkan. Nantikan informasi terbaru dari kami.</div>
            </div>
            @endforelse

        </div>

        <!-- Pagination -->
        @if(isset($artikelList) && $artikelList->hasPages())
        <div class="artikel-pagination">
            <div class="pag-info">
                Menampilkan {{ $artikelList->firstItem() }}–{{ $artikelList->lastItem() }}
                dari {{ $artikelList->total() }} artikel
            </div>
            {{ $artikelList->withQueryString()->links() }}
        </div>
        @endif

    </div>
</section>

@endif
{{-- end if detail/list --}}


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

<script>
/* ---- Copy link ---- */
function copyLink() {
    const btn = document.getElementById('copyBtn');
    if (!btn) return;
    navigator.clipboard.writeText(window.location.href).then(function() {
        btn.classList.add('copied');
        btn.innerHTML = '<i class="fa-solid fa-check"></i> Tersalin!';
        setTimeout(function() {
            btn.classList.remove('copied');
            btn.innerHTML = '<i class="fa-solid fa-link"></i> Salin Link';
        }, 2500);
    }).catch(function() {
        const ta = document.createElement('textarea');
        ta.value = window.location.href;
        document.body.appendChild(ta);
        ta.select(); document.execCommand('copy');
        document.body.removeChild(ta);
        btn.classList.add('copied');
        btn.innerHTML = '<i class="fa-solid fa-check"></i> Tersalin!';
        setTimeout(function() {
            btn.classList.remove('copied');
            btn.innerHTML = '<i class="fa-solid fa-link"></i> Salin Link';
        }, 2500);
    });
}

/* ---- Live search (list mode) ---- */
const searchEl = document.getElementById('searchArtikel');
if (searchEl) {
    searchEl.addEventListener('input', function() {
        const q = this.value.toLowerCase();
        document.querySelectorAll('.artikel-card').forEach(function(card) {
            const t = card.dataset.judul || '';
            card.style.display = (!q || t.includes(q)) ? '' : 'none';
        });
    });
}

/* ---- Filter kategori (list mode) ---- */
const katEl = document.getElementById('filterKategori');
if (katEl) {
    katEl.addEventListener('change', function() {
        const val = this.value.toLowerCase();
        document.querySelectorAll('.artikel-card').forEach(function(card) {
            const k = card.dataset.kat || '';
            card.style.display = (!val || k === val) ? '' : 'none';
        });
    });
}
</script>

</body>
</html>