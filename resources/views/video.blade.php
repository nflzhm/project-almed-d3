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

<body>
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

<!-- ================= VIDEO HEADER ================= -->
<style>

.video-section{
    padding:60px 0 40px;
    background:#fff;
}

.video-wrap{
    max-width: 900px;   /* bikin lebih lega */
    text-align: left;
}

/* LABEL */
.video-label{
    font-size:12px;
    font-weight:600;
    color:#888;
    letter-spacing:2px;
    text-transform:uppercase;
}

/* JUDUL */
.video-heading{
    font-size:32px;
    font-weight:800;
    color:#1C145C;
    margin:10px 0;
}

/* PARAGRAF FIX */
.video-desc{
    font-size:14px;
    color:#444;
    margin:0;
    padding:0;
    line-height:1.6;
    white-space: normal;
    display: block;
    width: 100%;
}
</style>

<section class="video-section">
    <div class="container">

        <!-- WRAPPER FULL WIDTH CONTROL -->
        <div class="video-wrap">

            <span class="video-label">Video RSU Allam Medica</span>

            <h2 class="video-heading">
                Lihat Langsung Layanan dan Kegiatan Kami
            </h2>

            <p class="video-desc">
                Dokumentasi prosedur medis, edukasi kesehatan, dan kegiatan rumah sakit dalam bentuk video yang informatif dan mudah dipahami.
            </p>

        </div>

    </div>
</section>

<!-- ================= CARD VIDEO ================= -->
<style>
    
.video-card{
    border: none;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    margin-bottom: 30px;
}

/* WRAPPER GAMBAR */
.video-img{
    overflow: hidden;
    height: 100%;
}

/* GAMBAR */
.video-card img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    min-height: 320px;
}

/* BODY */
.video-card .card-body{
    padding: 30px;
    display: flex;
    flex-direction: column;
    min-height: 320px;
}

/* HEAD TETAP DI ATAS */
.video-card h3{
    font-size: 20px;
    font-weight: 800;
    color: #1C145C;
    margin-bottom: 12px;
}

/* DESKRIPSI TETAP DI ATAS */
.video-card p{
    font-size: 13px;
    color: #555;
    line-height: 1.7;
    margin-bottom: 15px;
}

/* BUTTON PALING BAWAH */
.btn-wrap{
    margin-top: auto;
}

/* BUTTON DIKECILKAN */
.btn-youtube{
    background: #ff0000;
    color: #fff;
    border: none;
    padding: 8px 18px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    display: inline-block;
    transition: 0.3s;
}

.btn-youtube:hover{
    background: #d90000;
    color: #fff;
}

/* MOBILE */
@media(max-width:991px){

    .video-card img{
        min-height: 230px;
    }

    .video-card .card-body{
        min-height: auto;
        padding: 22px;
    }

    .video-card h3{
        font-size: 18px;
    }

    .video-card p{
        font-size: 12px;
    }
    
}
</style>

<section class="pb-5" style="background:#fff;">
<div class="container">

<div class="row">

@foreach($videos as $video)

@php
    $url = $video->youtube_url;

    preg_match('/(?:youtu\.be\/|v=)([^&]+)/', $url, $match);

    $id = $match[1] ?? null;
@endphp

<div class="col-12 mb-4">

<div class="card video-card">
<div class="row g-0 align-items-stretch">

    <!-- VIDEO -->
    <div class="col-lg-5">
        <div class="video-img">
            @if($id)
                <iframe width="100%" height="100%"
                    src="https://www.youtube.com/embed/{{ $id }}"
                    frameborder="0"
                    allowfullscreen>
                </iframe>
            @else
                <p class="p-3">Video tidak valid</p>
            @endif
        </div>
    </div>

    <!-- DESKRIPSI -->
    <div class="col-lg-7">
        <div class="card-body">

            <h3>{{ $video->judul }}</h3>

            <p>{{ $video->deskripsi }}</p>

            <div class="btn-wrap">
                <a href="{{ $video->youtube_url }}" target="_blank" class="btn-youtube">
                    <i class="bi bi-youtube"></i> Tonton di YouTube
                </a>
            </div>

        </div>
    </div>

</div>
</div>

</div>

@endforeach

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


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>