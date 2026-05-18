@php
use Illuminate\Support\Str;
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $berita->judul }} - RSU Allam Medica</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
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
/* ================= BREADCRUMB ================= */
        .breadcrumb-wrap {
            background: #fff;
            border-bottom: 1px solid #eee;
            padding: 12px 0;
            margin-top: 15px;
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
            height: auto;          /* penting: biar ikut tinggi asli */
            max-height: none;      /* hilangkan batas crop */
            object-fit: contain;   /* tampil full tanpa kepotong */
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
<section style="padding: 40px 0 60px;">
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

                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($berita->judul) }}&url={{ urlencode(request()->url()) }}"
                           target="_blank" class="share-btn share-tw">
                            <i class="bi bi-twitter"></i> Twitter
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
                    <a href="{{ url('/berita/' . $lain->id) }}" style="text-decoration:none;">
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
                            <a href="{{ url('/berita/' . $lain->id) }}">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

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
