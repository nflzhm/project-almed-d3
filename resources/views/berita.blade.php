@php
use Illuminate\Support\Str;
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>RSU Allam Medica - Berita</title>
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

<!-- ================= BERITA HEADER ================= -->
<style>

.berita-section{
    padding:60px 0 40px;
    background:#fff;
}

.berita-wrap{
    max-width: 900px;   
    text-align: left;
}

/* LABEL */
.berita-label{
    font-size:12px;
    font-weight:600;
    color:#888;
    letter-spacing:2px;
    text-transform:uppercase;
}

/* JUDUL */
.berita-heading{
    font-size:32px;
    font-weight:800;
    color:#1C145C;
    margin:10px 0;
}

/* PARAGRAF FIX */
.berita-desc{
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

<section class="berita-section">
    <div class="container">

        <!-- WRAPPER FULL WIDTH CONTROL -->
        <div class="berita-wrap">

            <span class="berita-label">Buletin Allam Medica</span>

            <h2 class="berita-heading">
                Informasi Kesehatan Terpercaya untuk Anda
            </h2>

            <p class="berita-desc">
                Artikel kesehatan, tips medis, dan informasi layanan RS terkini dari tim dokter dan tenaga kesehatan kami.
            </p>

        </div>

    </div>
</section>

<!-- MEDIA INFORMASI -->
<section style="background:#fff; padding:50px 0;">
    <div class="container">
        <div class="row g-4">

            @foreach($berita as $item)

            <div class="col-md-3 col-12">
                <div style="
                    border:1px solid #eee;
                    border-radius:20px;
                    overflow:hidden;
                    background:#fff;
                    height:100%;
                ">

                    <img src="{{ asset('storage/'.$item->gambar) }}"
                         style="width:100%; height:auto; display:block;">

                    <div style="padding:15px; text-align:center;">

                        <h6 class="fw-bold">
                            {{ $item->judul }}
                        </h6>

                        <p style="font-size:13px; color:#666;">
                            {{ \Illuminate\Support\Str::limit($item->deskripsi, 95) }}
                        </p>

                        <a href="{{ url('/berita/'.$item->slug) }}"
                           style="
                                display:inline-block;
                                margin-top:8px;
                                padding:6px 12px;
                                background:#1C145C;
                                color:white;
                                text-decoration:none;
                                border-radius:20px;
                                font-size:12px;
                           ">
                            Baca Selengkapnya
                        </a>

                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</section>


 <section class="pagination-section">

<style>

/* ================= SECTION ================= */
.pagination-section{
    width:100%;
    background:#fff !important;

    padding:35px 0;

    display:flex;
    justify-content:center;
    align-items:center;
}


/* ================= PAGINATION ================= */
.custom-pagination{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:8px;

    flex-wrap:wrap;

    background:#fff !important;
}


/* ITEM */
.custom-pagination a,
.custom-pagination span{
    min-width:40px;
    height:40px;
    padding:0 14px;

    border-radius:12px;

    display:flex;
    align-items:center;
    justify-content:center;

    text-decoration:none;

    font-size:13px;
    font-weight:600;

    transition:all .25s ease;

    background:#fff;
}


/* NORMAL */
.custom-pagination a{
    background:#fff;
    color:#64748b;

    border:1px solid #e2e8f0;
}


/* HOVER */
.custom-pagination a:hover{
    background:#1C145C;
    color:#fff;

    border-color:#1C145C;

    transform:translateY(-2px);

    box-shadow:0 8px 20px rgba(28,20,92,.15);
}


/* ACTIVE */
.custom-pagination .active{
    background:#1C145C;
    color:#fff;

    border:1px solid #1C145C;

    box-shadow:0 8px 20px rgba(28,20,92,.20);
}


/* DISABLED */
.custom-pagination .disabled{
    background:#fff;
    color:#cbd5e1;

    border:1px solid #e2e8f0;

    cursor:not-allowed;
}


/* ICON */
.custom-pagination i{
    font-size:12px;
}


/* MOBILE */
@media(max-width:576px){

    .custom-pagination{
        gap:6px;
    }

    .custom-pagination a,
    .custom-pagination span{
        min-width:36px;
        height:36px;

        font-size:12px;

        border-radius:10px;
    }
}

</style>


<!-- ================= PAGINATION ================= -->
@if($berita->hasPages())

<div class="custom-pagination">

    {{-- PREVIOUS --}}
    @if ($berita->onFirstPage())

        <span class="disabled">
            <i class="bi bi-chevron-left"></i>
        </span>

    @else

        <a href="{{ $berita->previousPageUrl() }}">
            <i class="bi bi-chevron-left"></i>
        </a>

    @endif



    {{-- PAGE NUMBER --}}
    @for ($i = 1; $i <= $berita->lastPage(); $i++)

        @if ($i == $berita->currentPage())

            <span class="active">
                {{ $i }}
            </span>

        @else

            <a href="{{ $berita->url($i) }}">
                {{ $i }}
            </a>

        @endif

    @endfor



    {{-- NEXT --}}
    @if ($berita->hasMorePages())

        <a href="{{ $berita->nextPageUrl() }}">
            <i class="bi bi-chevron-right"></i>
        </a>

    @else

        <span class="disabled">
            <i class="bi bi-chevron-right"></i>
        </span>

    @endif

</div>

@endif

</section>

<style>
/* ================= FOOTER ================= */
.footer-rsu{
    background:#fff;
    color:#000;
    padding:50px 0 20px;
    border-top:1px solid #eee;
}

.footer-rsu .container-fluid{
    max-width:1350px;
}

.footer-rsu .footer-logo{
    height:50px;
    margin-bottom:12px;
}

.footer-rsu .footer-title{
    font-size:18px;
    font-weight:700;
    margin-bottom:10px;
    color:#111;
}

.footer-rsu .footer-desc{
    font-size:13px;
    line-height:1.7;
    color:#666;
    margin-bottom:15px;
    max-width:320px;
}

.footer-rsu .footer-heading{
    font-size:16px;
    font-weight:700;
    margin-bottom:18px;
    color:#111;
}

.footer-rsu ul{
    list-style:none;
    padding:0;
    margin:0;
}

.footer-rsu ul li{
    margin-bottom:10px;
    font-size:13px;
}

.footer-rsu a{
    color:#666;
    text-decoration:none;
    transition:.2s ease;
}

.footer-rsu a:hover{
    color:#1C145C;
    padding-left:3px;
}

/* ================= SOSIAL ================= */
.footer-rsu .footer-social{
    display:flex;
    gap:14px;
    margin-bottom:18px;
}

.footer-rsu .footer-social i{
    font-size:18px;
    color:#666;
    transition:.2s ease;
    cursor:pointer;
}

.footer-rsu .footer-social i:hover{
    color:#1C145C;
    transform:translateY(-2px);
}

/* ================= MITRA ================= */
.footer-rsu .footer-mitra{
    display:flex;
    gap:12px;
    align-items:center;
    margin-top:10px;
    flex-wrap:wrap;
}

.footer-rsu .footer-mitra img:nth-child(1){
    height:35px;
}

.footer-rsu .footer-mitra img:nth-child(2){
    height:25px;
}

/* ================= CONTACT ================= */
.footer-rsu .footer-contact p{
    color:#666;
    font-size:13px;
    margin-bottom:14px;
    line-height:1.7;
    display:flex;
    align-items:flex-start;
    gap:10px;
}

.footer-rsu hr{
    border-color:#ddd;
    margin:25px 0 15px;
}

.footer-rsu .footer-copy{
    font-size:13px;
    color:#666;
}

/* ================= DESKTOP SPACING ================= */
.footer-rsu .footer-links{
    padding-left:20px;
}

.footer-rsu .footer-contact{
    padding-left:0;
    margin-left:-40px;
}

/* ================= TABLET ================= */
@media (max-width: 991px){

    .footer-rsu{
        padding:45px 0 20px;
    }

    .footer-rsu .row > div{
        margin-bottom:30px;
    }

    .footer-rsu .footer-title{
        font-size:17px;
    }

    .footer-rsu .footer-heading{
        font-size:15px;
    }

    .footer-rsu .footer-desc{
        max-width:100%;
    }

    .footer-rsu .footer-contact{
        margin-left:0;
    }

    .footer-rsu .footer-links{
        padding-left:0;
    }
}

/* ================= MOBILE ================= */
@media (max-width: 767px){

    .footer-rsu{
        text-align:left;
        padding:40px 0 20px;
    }

    .footer-rsu .container-fluid{
        padding-left:20px !important;
        padding-right:20px !important;
    }

    .footer-rsu .row{
        gap:5px;
    }

    .footer-rsu .footer-social{
        justify-content:flex-start;
    }

    .footer-rsu .footer-mitra{
        justify-content:flex-start;
    }

    .footer-rsu .footer-contact p{
        justify-content:flex-start;
        text-align:left;
    }

    .footer-rsu .footer-copy{
        text-align:left;
    }

    .footer-rsu .footer-desc{
        margin-left:0;
        margin-right:0;
    }

    .footer-rsu .footer-contact{
        margin-left:0;
    }

    .footer-rsu a:hover{
        padding-left:0;
    }
}
</style>

<!-- FOOTER -->
<footer class="footer-rsu">

    <div class="container-fluid px-lg-5 px-4">

        <div class="row justify-content-between">

            <!-- LOGO -->
            <div class="col-lg-4 col-md-6">

                <img src="{{ asset('images/beranda/logo-almed.png') }}"
                     class="footer-logo">

                <h5 class="footer-title">RSU Allam Medica Bumiayu</h5>

                <p class="footer-desc">
                    Jl. Pangeran Diponegoro No. 609, Jatisawit, Bumiayu,
                    Kabupaten Brebes, Jawa Tengah 52273
                </p>

                <!-- SOSIAL -->
                <div class="footer-social">
    
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

                <!-- MITRA -->
                <small style="color:#666;">Akreditasi & Mitra</small>

                <div class="footer-mitra">
                    <img src="{{ asset('images/beranda/paripurna.png') }}">
                    <img src="{{ asset('images/beranda/bpjs.png') }}">
                </div>

            </div>

            <!-- TAUTAN -->
            <div class="col-lg-2 col-md-6 footer-links">

                <h6 class="footer-heading">Tautan Cepat</h6>

                <ul>
                    <li><a href="beranda">Beranda</a></li>
                    <li><a href="layanan">Layanan</a></li>
                    <li><a href="artikel">Artikel</a></li>
                    <li><a href="download">Download</a></li>
                    <li><a href="tentang">Tentang Kami</a></li>
                    <li><a href="kontak">Kontak</a></li>
                </ul>

            </div>

            <!-- MENU -->
            <div class="col-lg-2 col-md-6 footer-links">

                <h6 class="footer-heading">Menu</h6>

                <ul>
                    <li><a href="video">Video</a></li>
                    <li><a href="karir">Karir</a></li>
                    <li><a href="berita">Berita</a></li>
                </ul>

            </div>

            <!-- HUBUNGI -->
            <div class="col-lg-4 col-md-12 footer-contact">

                <h6 class="footer-heading">Hubungi Kami</h6>

                <p>
                    <i class="bi bi-telephone-fill"></i>
                    <span>(0289) 430822</span>
                </p>

                <p>
                    <i class="bi bi-envelope-fill"></i>
                    <span>allam.medica@yahoo.co.id</span>
                </p>

                <p>
                    <i class="bi bi-clock-fill"></i>
                    <span>IGD: 24 Jam | Rawat Jalan: Sen - Sab 07.00 – 21.00</span>
                </p>

                <p>
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>Jl. Pangeran Diponegoro No.609, Bumiayu, Brebes</span>
                </p>

            </div>

        </div>

        <hr>

        <div class="footer-copy">
            © 2026 RSU Allam Medica. Hak Cipta Dilindungi.
        </div>

    </div>

</footer>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>