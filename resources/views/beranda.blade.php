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
    <link href="https://fonts.cdnfonts.com/css/gotham" rel="stylesheet">
</head>

<body>
<script>
document.addEventListener('DOMContentLoaded', function () {

    let currentItems = 12;

    const items = document.querySelectorAll('.dokter-item');
    const btn = document.getElementById('loadMoreDokter');

    if(btn){

        btn.addEventListener('click', function(){

            for(let i = currentItems; i < currentItems + 9; i++){

                if(items[i]){
                    items[i].style.display = 'block';
                }

            }

            currentItems += 9;

            if(currentItems >= items.length){
                btn.style.display = 'none';
            }

        });

    }

});
</script>

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

</body>

<!-- sub Hero Section -->
<style>
body {
    margin: 0;
    padding: 0;
}
</style>

<!-- HERO -->
<section style="
    position: relative;
    background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
    url('{{ asset('images/beranda/drop-off-sore.png') }}') center/cover no-repeat;
    height: 80vh;
    color: white;
    overflow: hidden;
">

    <div class="container d-flex align-items-center h-100">
        <div class="row w-100">
            <div class="col-md-6 text-start">
                <h1 class="fw-bold">Kesehatan Anda Tujuan Kami</h1>
                <p>Kami siap melayani Anda dengan tenaga medis profesional</p>
            </div>
        </div>
    </div>

    <!-- CURVE -->
    <div style="position:absolute; bottom:-2px; left:0; width:100%; line-height:0;">
        <svg viewBox="0 0 1440 120" xmlns="http://www.w3.org/2000/svg" style="display:block;">
            <path fill="#1C145C"
                d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z">
            </path>
        </svg>
    </div>

</section>





<section style="background:#1C145C; color:white; margin:0; padding:15px 0;">

    <div class="container-fluid px-2">

        <div class="row text-center g-0">

            <div class="col-6 col-md-3 d-flex flex-column align-items-center py-3">
                <i class="fa-solid fa-building" style="font-size:32px;"></i>
                <h4 class="fw-bold mt-2 mb-0">2008</h4>
                <small style="font-size:14px;">Berdiri Sejak</small>
            </div>

            <div class="col-6 col-md-3 d-flex flex-column align-items-center py-3">
                <i class="fa-solid fa-user-doctor" style="font-size:32px;"></i>
                <h4 class="fw-bold mt-2 mb-0">50</h4>
                <small style="font-size:14px;">Dokter Spesialis</small>
            </div>

            <div class="col-6 col-md-3 d-flex flex-column align-items-center py-3">
                <i class="fa-solid fa-bed" style="font-size:32px;"></i>
                <h4 class="fw-bold mt-2 mb-0">200</h4>
                <small style="font-size:14px;">Kamar Tidur</small>
            </div>

            <div class="col-6 col-md-3 d-flex flex-column align-items-center py-3">
                <i class="fa-solid fa-users" style="font-size:32px;"></i>
                <h4 class="fw-bold mt-2 mb-0">500</h4>
                <small style="font-size:14px;">Karyawan</small>
            </div>

        </div>

    </div>

</section>

<section style="background:#fff; padding:0; margin:0; overflow:hidden;">

    <div id="adCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2500">

        <div class="carousel-inner m-0 p-0">

            @foreach($banners as $key => $item)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{ asset('storage/'.$item->gambar) }}"
                     class="d-block w-100"
                     style="height:auto; display:block;">
            </div>
            @endforeach

        </div>

    </div>

</section>

<!-- PROFIL -->
<section style="background:#fff; padding:50px 0;">

    <div class="container">

        <!-- Judul -->
        <div class="text-center mb-4">
            <h2 class="fw-bold">Profil</h2>

            <!-- garis bawah -->
            <div style="
                width:80px;
                height:3px;
                background:#1C145C;
                margin:8px auto 0;
                border-radius:10px;
            "></div>
        </div>

        <!-- Deskripsi -->
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">

                <p style="line-height:1.8; font-size:16px; color:#333;">
                    Rumah Sakit Umum <strong>“Allam Medica”</strong> berdiri sejak tahun 2012
                    didirikan oleh Yayasan Allam Medica Bumiayu. Pada mulanya merupakan klinik pelayanan kesehatan
                    umum dan kebidanan dengan nama Balai Pengobatan dan Rumah Bersalin Allam Medica.
                    Penyelenggaraan rumah sakit sejak tahun 2008 dengan surat ijin Bupati Brebes nomor :
                    503.10/KPT/007/IV/2008 sebagai “Rumah Bersalin” dan surat ijin Bupati Brebes nomor :
                    503.10/KPT/008/IV/2008 sebagai “Balai Pengobatan Allam Medica” dan sejak 2015 menjadi
                    Rumah Sakit Umum Allam Medica dengan Ijin Operasional tetap dari Bupati Brebes :
                    503.10/KPPT/02797/IX/2015.
                </p>

            </div>
        </div>

    </div>

</section>

<!-- DOKTER SPESIALIS -->
<section style="background:#fff; padding:50px 0;">
    <div class="container">

        {{-- TITLE --}}
        <div class="text-center mb-5">
            <h2 class="fw-bold">Dokter Spesialis</h2>

            <div style="
                width:80px;
                height:3px;
                background:#1C145C;
                margin:8px auto 0;
                border-radius:10px;
            "></div>
        </div>

        {{-- GRID --}}
        <div class="row g-4">

            @foreach($dokter as $index => $item)
            <div class="col-lg-4 col-md-6 col-12 dokter-item"
                 style="{{ $index >= 12 ? 'display:none;' : '' }}">

                <div style="
                    display:flex;
                    gap:15px;
                    padding:15px;
                    border:1px solid #eee;
                    border-radius:12px;
                    align-items:center;
                    height:100%;
                    background:#fff;
                    transition:.3s;
                "
                onmouseover="this.style.boxShadow='0 10px 25px rgba(0,0,0,.08)'"
                onmouseout="this.style.boxShadow='none'">

                    {{-- FOTO --}}
                    @if($item->foto)
                        <img
                            src="{{ asset('uploads/dokter/'.$item->foto) }}"
                            loading="lazy"
                            alt="{{ $item->nama }}"
                            style="
                                width:90px;
                                height:90px;
                                border-radius:50%;
                                object-fit:cover;
                                border:3px solid #1C145C;
                                flex-shrink:0;
                            ">
                    @else
                        <div style="
                            width:90px;
                            height:90px;
                            border-radius:50%;
                            background:#e2e8f0;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            font-size:30px;
                            font-weight:700;
                            color:#475569;
                            border:3px solid #1C145C;
                            flex-shrink:0;
                        ">
                            {{ strtoupper(substr($item->nama,0,1)) }}
                        </div>
                    @endif
                    {{-- INFO --}}
                    <div style="
                        display:flex;
                        flex-direction:column;
                        justify-content:space-between;
                        height:100%;
                        width:100%;
                    ">

                        <div>
                            <h5 class="fw-bold mb-1"
                                style="
                                    font-size:16px;
                                    line-height:1.4;
                                ">
                                {{ $item->nama }}
                            </h5>

                            <small style="
                                color:gray;
                                font-size:13px;
                            ">
                                {{ $item->spesialis }}
                            </small>
                        </div>

                        <a href="#"
                           style="
                                margin-top:10px;
                                display:inline-block;
                                padding:6px 14px;
                                background:#1C145C;
                                color:white;
                                text-decoration:none;
                                border-radius:20px;
                                font-size:12px;
                                width:max-content;
                                transition:.3s;
                           ">
                            Cek Jadwal
                        </a>

                    </div>

                </div>

            </div>
            @endforeach

        </div>

        {{-- LOAD MORE --}}
        @if(count($dokter) > 12)
        <div class="text-center mt-5">
            <button id="loadMoreDokter"
                    style="
                        border:none;
                        background:#1C145C;
                        color:#fff;
                        padding:12px 26px;
                        border-radius:30px;
                        font-weight:600;
                    ">
                Lihat Dokter Lainnya
            </button>
        </div>
        @endif

    </div>
</section>


<!-- JUDUL -->
<div class="text-center mb-4">
    <h2 class="fw-bold">Media Informasi</h2>

    <div style="
        width:80px;
        height:3px;
        background:#1C145C;
        margin:8px auto 0;
        border-radius:10px;
    "></div>
</div>

<!-- MEDIA INFORMASI -->
<section style="background:#fff; padding:50px 0;">
    <div class="container">

        <div class="row g-4">

            @foreach($beritaTerbaru as $item)
            <div class="col-lg-3 col-md-6 col-12">

                <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden">

                    <!-- IMAGE FIX (SAMA UKURAN SEPERTI CONTOH) -->
                    <div style="
                        width:100%;
                        aspect-ratio: 4 / 5;
                        overflow:hidden;
                        background:#f3f3f3;
                    ">
                        <img src="{{ asset('storage/'.$item->gambar) }}"
                             style="
                                width:100%;
                                height:100%;
                                object-fit:cover;
                                display:block;
                             ">
                    </div>

                    <!-- BODY -->
                    <div class="card-body d-flex flex-column text-center">

                        <!-- JUDUL -->
                        <h6 class="fw-bold mb-2">
                            {{ $item->judul }}
                        </h6>

                        <!-- DESKRIPSI -->
                        <p class="text-muted small mb-3">
                            {{ Str::limit($item->deskripsi, 90) }}
                        </p>

                        <!-- BUTTON -->
                        <div class="mt-auto">
                            <a href="{{ url('/berita/'.$item->slug) }}"
                               class="btn btn-sm"
                               style="background:#1C145C; color:#fff; border-radius:20px; padding:6px 14px;">
                                Baca Selengkapnya
                            </a>
                        </div>

                    </div>

                </div>

            </div>
            @endforeach

        </div>

    </div>
</section>

<!-- BUTTON LIHAT BERITA LAINNYA -->
<div class="text-center mt-4" style="margin-bottom:40px;">
    <a href="/berita"
       style="
            display:inline-block;
            padding:10px 20px;
            background:#1C145C;
            color:#fff;
            text-decoration:none;
            border-radius:20px;
            font-size:14px;
            transition:0.3s ease;
       "
       onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 10px 20px rgba(0,0,0,0.15)'"
       onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'">
        Lihat Berita Lainnya
    </a>
</div>



    <style>
/* WRAPPER */
.partner-slider {
    overflow: hidden;
    background: #fff;
    padding: 30px 0;
}

/* TRACK (jalan terus) */
.partner-track {
    display: flex;
    width: calc(150px * 45); /* jumlah logo x 2 */
    animation: scroll 25s linear infinite;
}

/* ITEM */
.partner-item {
    width: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.partner-item img {
    max-width: 120px;
    opacity: 0.6;
    transition: 0.3s;
}

/* hover efek */
.partner-item img:hover {
    opacity: 1;
    transform: scale(1.1);
}

/* ANIMASI */
@keyframes scroll {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%);
    }
}
</style>

<!-- MITRA KERJASAMA -->
<section style="background:#fff; padding:50px 0;">

    <div class="container">

        <!-- Judul -->
        <div class="text-center mb-5">
            <h2 class="fw-bold">Mitra Kerjasama</h2>

            <div style="
                width:80px;
                height:3px;
                background:#1C145C;
                margin:8px auto 0;
                border-radius:10px;
            "></div>
        </div>

    </div>



<style>

/* ================= SLIDER WRAPPER ================= */
.partner-slider {
    overflow: hidden;
    width: 100%;
    position: relative;
}

/* ================= TRACK ANIMATION ================= */
.partner-track {
    display: flex;
    width: max-content;
    animation: scroll 30s linear infinite;
    align-items: center;
}

/* ================= ITEM + JARAK ================= */
.partner-item {
    flex: 0 0 auto;
    margin: 0 30px; /* 👉 INI JARAK ANTAR LOGO */
}

/* ================= IMAGE STYLE ================= */
.partner-item img {
    height: 60px;
    width: auto;
    object-fit: contain;

    /* HITAM PUTIH DEFAULT */
    filter: grayscale(100%);
    opacity: 0.6;

    transition: all 0.3s ease;
}

/* ================= HOVER COLOR ================= */
.partner-item img:hover {
    filter: grayscale(0%);
    opacity: 1;
    transform: scale(1.1);
}

/* ================= ANIMASI LOOP ================= */
@keyframes scroll {
    from {
        transform: translateX(0);
    }
    to {
        transform: translateX(-50%);
    }
}
</style>
    <!-- SLIDER -->
    <div class="partner-slider">

        <div class="partner-track">

            <!-- LOGO (ulang 2x biar looping halus) -->
             <div class="partner-item">
                <img src="{{ asset('images/beranda/logo0.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo1.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo2.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo3.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo4.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo5.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo6.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo7.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo8.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo9.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo10.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo11.webp') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo12.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo13.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo14.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo15.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo16.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo17.webp') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo18.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo19.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo20.webp') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo21.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo22.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo23.png') }}">
            </div>

            

            <!-- DUPLIKAT (WAJIB untuk looping smooth) -->
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo0.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo1.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo2.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo3.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo4.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo5.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo6.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo7.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo8.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo9.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo10.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo11.webp') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo12.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo13.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo14.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo15.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo16.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo17.webp') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo18.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo19.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo20.webp') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo21.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo22.png') }}">
            </div>
            <div class="partner-item">
                <img src="{{ asset('images/beranda/logo23.png') }}">
            </div>

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
                    <li><a href="beranda" style="color:#666; text-decoration:none;">Beranda</a></li>
                    <li><a href="tentang" style="color:#666; text-decoration:none;">Tentang Kami</a></li>
                    <li><a href="video" style="color:#666; text-decoration:none;">Video</a></li>
                    <li><a href="kontak" style="color:#666; text-decoration:none;">Kontak</a></li>
                </ul>

                <h6 class="fw-bold mt-3 mb-2">Download</h6>
                <ul style="list-style:none; padding:0; font-size:13px; line-height:1.9;">
                    <li><a href="download" style="color:#666; text-decoration:none;">Download List Pengadaan</a></li>
                    <li><a href="download" style="color:#666; text-decoration:none;">Lihat Semua Data</a></li>
                </ul>
            </div>

            <!-- MENU -->
            <div class="col-md-2 mb-4">
                <h6 class="fw-bold mb-3">Menu</h6>

                <ul style="list-style:none; padding:0; font-size:13px; line-height:1.9;">
                    <li><a href="pengadaan" style="color:#666; text-decoration:none;">Pengadaan</a></li>
                    <li><a href="karir" style="color:#666; text-decoration:none;">Karir</a></li>
                    <li><a href="berita" style="color:#666; text-decoration:none;">Berita</a></li>
                    <li><a href="video" style="color:#666; text-decoration:none;">Video</a></li>
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


<style>
/* ===============================
   FLOATING BAR DESKTOP
================================= */
.floating-bar{
    position: fixed;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 999999;
    display: flex;
    overflow: hidden;
    border-radius: 60px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.18);
}

/* SEMUA ITEM SAMA UKURAN */
.floating-item{
    width: 210px;
    height: 60px;

    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;

    font-size: 14px;
    font-weight: 600;
    text-decoration: none;

    background: #eaeaea;
    color: #000;

    transition: 0.3s ease;
    box-sizing: border-box;
}

/* KIRI & KANAN */
.floating-item:first-child{
    border-radius: 60px 0 0 60px;
}

.floating-item:last-child{
    border-radius: 0 60px 60px 0;
}

/* MERAH */
.floating-item.active{
    background: #ff1a1a;
    color: #fff;
}

/* TENGAH */
.floating-item.middle{
    background: #f2f2f2;
    color: #000;
}

.floating-item i{
    font-size: 18px;
}

.floating-item:hover{
    transform: translateY(-2px);
    opacity: .95;
}

/* ===============================
   MOBILE VERSION
================================= */
@media (max-width:768px){

    body{
        padding-bottom: 85px;
    }

    .floating-bar{
        left: 0;
        bottom: 0;
        transform: none;
        width: 100%;
        height: 72px;
        border-radius: 0;
        background: #fff;
        box-shadow: 0 -4px 12px rgba(0,0,0,.08);
        justify-content: space-around;
        align-items: center;
        overflow: visible;
    }

    .floating-item{
        width: auto;
        height: auto;
        flex: 1;
        padding: 8px;
        background: transparent !important;
        color: #555 !important;
        border-radius: 0 !important;

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 4px;

        font-size: 11px;
    }

    /* ICON BULAT DEFAULT */
    .floating-item i{
        width: 38px;
        height: 38px;
        border-radius: 50%;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 18px;

        background: #b7ff0049;
        color: #8fc700;
    }

    .floating-item span{
        font-size: 11px;
        line-height: 1;
    }

    /* TOMBOL TENGAH */
    .floating-item.middle{
        position: relative;
        top: -18px;
        width: 64px;
        height: 64px;
        flex: unset;

        border-radius: 50% !important;
        background: #1C145C !important;
        color: #fff !important;

        box-shadow: 0 8px 18px rgba(0,0,0,.18);
    }

    .floating-item.middle i{
        width: 42px;
        height: 42px;
        background: rgba(255,255,255,.18);
        color: #fff;
        font-size: 20px;
    }

    .floating-item.middle span{
        font-size: 10px;
    }

    /* MERAH UNTUK IGD & ALAMAT */
    .floating-item.active i,
    .floating-item.red i{
        background: rgba(220,53,69,.12);
        color: #dc3545;
    }

    .floating-item:hover{
        transform: none;
    }
}
</style>


<div class="floating-bar">

    <!-- IGD -->
    <a href="tel:085292224886" class="floating-item active">
        <i class="bi bi-hospital"></i>
        <span>IGD 24 JAM</span>
    </a>

    <!-- Tengah -->
    <a href="{{ url('/jadwaldokter') }}" class="floating-item middle">
        <i class="bi bi-calendar-check"></i>
        <span>Jadwal</span>
    </a>

    <!-- Alamat Merah Juga -->
    <a href="https://maps.app.goo.gl/4yvn64pEuhWg35mX6" target="_blank" class="floating-item active">
        <i class="bi bi-geo-alt-fill"></i>
        <span>Alamat</span>
    </a>

</div>
</html>