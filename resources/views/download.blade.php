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




<style>
/* ================= FIX NAVBAR SPACE ================= */
body{
    padding-top:80px;
}

/* ================= FULL BANNER ================= */

.banner-download{
    position:relative;
    height:240px;
    width:100%;
    display:flex;
    align-items:center;
    color:#fff;
    overflow:hidden;
    border-radius:0 0 30px 30px;
}

.banner-download img{
    position:absolute;
    width:100%;
    height:100%;
    object-fit:cover;
    top:0;
    left:0;
    z-index:1;
    transform:scale(1.05);
}

.banner-overlay{
    position:absolute;
    width:100%;
    height:100%;
    background:linear-gradient(
        120deg,
        rgba(28,20,92,0.92),
        rgba(28,20,92,0.65),
        rgba(0,0,0,0.2)
    );
    z-index:2;
}

.banner-content{
    position:relative;
    z-index:3;
    padding-left:70px;
    max-width:900px;
}

.banner-title{
    font-size:28px;
    font-weight:800;
    letter-spacing:0.5px;
    margin-bottom:8px;
}

.banner-desc{
    font-size:14px;
    line-height:1.7;
    opacity:0.9;
}
.download-card{
    display:flex;
    flex-direction:column;
}
</style>

<!-- ================= BANNER ================= -->
<section class="banner-download">

    <img src="{{ asset('images/download/banner.png') }}">

    <div class="banner-overlay"></div>

    <div class="banner-content">
        <div class="banner-title">
            Download List Pengadaan
        </div>

        <div class="banner-desc">
            Pengadaan rumah sakit merupakan langkah strategis dalam meningkatkan akses dan kualitas pelayanan kesehatan bagi masyarakat. Dalam proses ini, berbagai aspek harus dipertimbangkan, mulai dari perencanaan, pembangunan, hingga operasionalisasi rumah sakit agar dapat berfungsi secara optimal sesuai dengan standar pelayanan kesehatan yang ditetapkan.
        </div>
    </div>

</section>



<style>
    body {
    background: #fff !important;
}
.download-wrapper{
    max-width:1250px;
    margin:auto;
}

.download-card{
    background:#fff;
    border-radius:16px;
    padding:18px;
    box-shadow:0 10px 25px rgba(0,0,0,0.06);
    transition:0.3s ease;
    height:100%;
    border:1px solid rgba(0,0,0,0.04);
    position:relative;
    overflow:hidden;
}

.download-card:hover{
    transform:translateY(-6px);
    box-shadow:0 18px 35px rgba(0,0,0,0.12);
}

.download-icon{
    width:42px;
    height:42px;
    border-radius:12px;
    background:linear-gradient(135deg,#198754,#20c997);
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:18px;
    flex-shrink:0;
}

.download-header{
    display:flex;
    gap:12px;
    align-items:center;
    margin-bottom:10px;
}

.download-title{
    font-size:15px;
    font-weight:700;
    color:#222;
    line-height:1.3;
}

.download-subtitle{
    font-size:12px;
    color:#1C145C;
    font-weight:600;
    margin-bottom:8px;
}

.download-desc{
    font-size:12.5px;
    color:#555;
    line-height:1.6;
    margin-bottom:10px;
}

.download-info{
    font-size:11.5px;
    color:#888;
    display:flex;
    align-items:center;
    gap:6px;
    margin-bottom:4px;
}

.download-line{
    height:1px;
    background:#eee;
    margin:10px 0;
}

.btn-download{
    width:100%;
    margin-top:12px;
    background:linear-gradient(135deg,#198754,#157347);
    border:none;
    color:#fff;
    padding:8px;
    border-radius:10px;
    font-size:13px;
    font-weight:600;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:6px;
    transition:0.3s;
}

.btn-download:hover{
    opacity:0.9;
    transform:scale(1.02);
}

@media (max-width: 992px){
    .banner-content{
        padding-left:40px;
        padding-right:20px;
    }

    .banner-title{
        font-size:24px;
    }

    .banner-desc{
        font-size:13px;
    }
}

/* MOBILE */
@media (max-width: 768px){


    .banner-download{
        height:180px;
        text-align:left;
    }

    .banner-content{
        padding-left:20px;
        padding-right:20px;
    }

    .banner-title{
        font-size:18px;
    }

    .banner-desc{
        font-size:12px;
        line-height:1.5;
    }

    .download-wrapper{
        padding:0 12px;
    }

    .download-wrapper .col-lg-4,
    .download-wrapper .col-md-6{
        width:100% !important;
    }

    .download-card{
        padding:14px;
        border-radius:14px;
    }

    .download-title{
        font-size:14px;
    }

    .download-desc{
        font-size:12px;
    }

    .btn-download{
        font-size:12px;
        padding:10px;
    }
}

/* SMALL MOBILE */
@media (max-width: 480px){

    .banner-download{
        height:160px;
    }

    .banner-title{
        font-size:16px;
    }

    .banner-desc{
        display:none; 
    }

    .download-icon{
        width:38px;
        height:38px;
        font-size:16px;
    }
}

</style>


<div class="container-fluid py-5 download-wrapper">
    <div class="row g-3">

        @foreach($data as $item)
        <div class="col-lg-4 col-md-6">
            <div class="download-card">

                <div class="download-header">
                    <div class="download-icon">
                        <i class="bi bi-file-earmark-text-fill"></i>
                    </div>

                    <div class="download-title">
                        {{ $item->judul }}
                    </div>
                </div>

                <div class="download-subtitle">
                    {{ $item->kategori }} - {{ $item->periode }}
                </div>

                <div class="download-desc">
                    {{ $item->deskripsi }}
                </div>

                <div class="download-line"></div>

                <div class="download-info">
                    <i class="bi bi-clock"></i>
                    Diunggah: {{ optional($item->tanggal_upload)->format('d M Y') }}
                </div>

                <div class="download-info">
                    <i class="bi bi-hdd"></i>
                    Ukuran: {{ $item->ukuran }}
                </div>
                 <button onclick="window.location='{{ route('download.file', $item->id) }}'" class="btn-download">
                    <i class="bi bi-download"></i> Download File
                </button>

            </div>
        </div>
        @endforeach

    </div>
</div>


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