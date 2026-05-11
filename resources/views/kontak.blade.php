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

<!-- ✅ Navbar -->

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
            <li class="nav-item"><a class="nav-link text-white p-1" href="#"><i class="bi bi-tiktok"></i></a></li>
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




<!-- ================= HUBUNGI KAMI ================= -->
<style>
    body{
    padding-top:85px;
}
.contact-section{
    background:#1C145C;
    width:100%;
    padding:50px 20px;
    text-align:center;
    color:#fff;
}

/* JUDUL */
.contact-title{
    font-size:26px;
    font-weight:700;
    margin-bottom:10px;
}

/* DESKRIPSI */
.contact-desc{
    font-size:14px;
    color:#ddd;
    max-width:500px;
    margin:auto;
    line-height:1.6;
}
</style>

<section class="contact-section">

    <div class="contact-title">
        Hubungi Kami
    </div>

    <div class="contact-desc">
        Kami siap membantu Anda 24 jam sehari, 7 hari seminggu
    </div>

</section>


<!-- ================= PROFIL ================= -->
<style>
    .profile-section{
    margin-top:40px; /* bisa kamu ubah: 30px / 50px sesuai selera */
    }
</style>

<section class="profile-section">
<div class="container">

    <div class="row">

        <!-- KIRI -->
        <div class="col-md-7">
            <h4 class="fw-bold mb-3">informasi Kontak</h4>
        </div>


        <style>
/* SECTION */
.contact-wrapper{
    padding:50px 0;
}

/* CARD INFO */
.info-card{
    display:flex;
    gap:12px;
    background:#f8f9fb;
    padding:15px;
    border-radius:12px;
    margin-bottom:15px;
}

/* ICON */
.info-icon{
    width:40px;
    height:40px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:10px;
    font-size:18px;
}

/* WARNA ICON */
.icon-blue{
    background:rgba(28,20,92,0.1);
    color:#1C145C;
}

.icon-green{
    background:rgba(25,135,84,0.1);
    color:#198754;
}

.icon-red{
    background:rgba(220,53,69,0.1);
    color:#dc3545;
}

.icon-orange{
    background:rgba(255,193,7,0.15);
    color:#f59e0b;
}

/* TEXT */
.info-title{
    font-size:14px;
    font-weight:600;
}

.info-desc{
    font-size:13px;
    color:#666;
}

/* MAP */
.map-box iframe{
    width:100%;
    height:100%;
    min-height:260px;
    border-radius:12px;
    border:0;
}

/* FORM */
.contact-form{
    margin-top:30px;
    background:#f8f9fb;
    padding:20px;
    border-radius:12px;
}

.btn-send{
    background:#1C145C;
    color:#fff;
    border:none;
    padding:10px;
    border-radius:8px;
    width:100%;
    font-weight:600;
}

.btn-send:hover{
    background:#140e45;
}
</style>


<div class="container contact-wrapper">

<div class="row g-4">

    <!-- KIRI (4 CARD) -->
    <div class="col-lg-6">

        <!-- ALAMAT -->
        <div class="info-card">
            <div class="info-icon icon-blue">
                <i class="bi bi-geo-alt-fill"></i>
            </div>
            <div>
                <div class="info-title">Alamat</div>
                <div class="info-desc">
                    Jl. Pangeran Diponegoro No.609, Krajan, Jatisawit, Kec. Bumiayu, Kabupaten Brebes, Jawa Tengah
                </div>
            </div>
        </div>

        <!-- TELEPON -->
        <div class="info-card">
            <div class="info-icon icon-green">
                <i class="bi bi-telephone-fill"></i>
            </div>
            <div>
                <div class="info-title">Telepon</div>
                <div class="info-desc">(0289) 430822</div>
            </div>
        </div>

        <!-- EMAIL -->
        <div class="info-card">
            <div class="info-icon icon-red">
                <i class="bi bi-envelope-fill"></i>
            </div>
            <div>
                <div class="info-title">Email</div>
                <div class="info-desc">allam.medica@yahoo.co.id</div>
            </div>
        </div>

        <!-- JAM -->
        <div class="info-card">
            <div class="info-icon icon-orange">
                <i class="bi bi-clock-fill"></i>
            </div>
            <div>
                <div class="info-title">Jam Operasional</div>
                <div class="info-desc">
                    IGD: 24 Jam<br>
                </div>
            </div>
        </div>

    </div>

    <!-- KANAN (MAP) -->
    <div class="col-lg-6">
        <div class="map-box">
            <iframe 
                src="https://www.google.com/maps?q=RSU+Allam+Medica+Bumiayu&output=embed">
            </iframe>
        </div>
    </div>

</div>

<!-- FORM -->
<div class="contact-form">

    <h5 class="mb-3">Kirim Pesan</h5>

    <div class="row g-3">

        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Nama">
        </div>

        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Telepon">
        </div>

        <div class="col-md-6">
            <input type="email" class="form-control" placeholder="Email">
        </div>

        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Subject">
        </div>

        <div class="col-12">
            <textarea class="form-control" rows="4" placeholder="Pesan"></textarea>
        </div>

        <div class="col-12">
            <button class="btn-send">
                Kirim Pesan
            </button>
        </div>

    </div>

</div>

</div>

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
                    <i class="bi bi-tiktok"></i>
                    <i class="bi bi-facebook"></i>
                    <i class="bi bi-instagram"></i>
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