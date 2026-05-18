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
    
body{
    font-family:'Segoe UI',sans-serif;
    padding-top:90px;
    background:#f5f7fb;
    overflow-x:hidden;
    background: #fff !important;
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


<style>
body { 
    padding-top: 85px; 
}

/* ===== HERO ===== */
.contact-section {
    background: linear-gradient(135deg,
        #0d0a3a 0%, #1C145C 30%, #2a1f7a 60%, #110d46 100%
    );
    padding: 70px 20px 80px;
    text-align: center;
    color: #fff;
    position: relative;
    overflow: hidden;
}
.contact-section::before {
    content: '';
    position: absolute;
    top: -120px; left: -120px;
    width: 400px; height: 400px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(254,252,241,.06) 0%, transparent 70%);
    pointer-events: none;
}
.contact-section::after {
    content: '';
    position: absolute;
    bottom: -100px; right: -100px;
    width: 350px; height: 350px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(90,70,200,.2) 0%, transparent 70%);
    pointer-events: none;
}
.contact-section .contact-shimmer {
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, transparent, rgba(254,252,241,.55) 50%, transparent);
}
.contact-section .contact-inner { position: relative; z-index: 1; }
.contact-section .contact-breadcrumb {
    font-size: 12px;
    color: rgba(254,252,241,.45);
    margin-bottom: 14px;
    letter-spacing: .04em;
}
.contact-section .contact-breadcrumb span { color: rgba(254,252,241,.7); }
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