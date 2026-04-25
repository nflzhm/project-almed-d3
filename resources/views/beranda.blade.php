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
                        <li><a class="dropdown-item" href="{{ url('/pengadaan') }}">Pengadaan</a></li>
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

<!-- IKLAN SLIDER -->
<section style="background:#fff; padding:0; margin:0; overflow:hidden;">

    <div id="adCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2500">

        <div class="carousel-inner m-0 p-0">

            <div class="carousel-item active">
                <img src="{{ asset('images/beranda/iklan1.png') }}"
                     class="d-block w-100"
                     style="height:auto; display:block;">
            </div>

            <div class="carousel-item">
                <img src="{{ asset('images/beranda/iklan2.png') }}"
                     class="d-block w-100"
                     style="height:auto; display:block;">
            </div>

            <div class="carousel-item">
                <img src="{{ asset('images/beranda/iklan3.png') }}"
                     class="d-block w-100"
                     style="height:auto; display:block;">
            </div>

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
        <!-- Judul -->
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

        <div class="row g-4">

            <div class="row g-4">

    <!-- DOKTER 1 -->
    <div class="col-md-4 col-12">

        <div style="
            display:flex;
            gap:15px;
            padding:15px;
            border:1px solid #eee;
            border-radius:12px;
            align-items:center;
            height:100%;
        ">

            <!-- FOTO -->
            <img src="{{ asset('images/beranda/drferry-1740452082.png') }}"
                 style="
                    width:90px;
                    height:90px;
                    border-radius:50%;
                    object-fit:cover;
                    border:3px solid #1C145C;
                 ">

            <!-- INFO -->
            <div style="display:flex; flex-direction:column; justify-content:space-between; height:100%;">

                <div>
                    <h5 class="fw-bold mb-0">dr. Ferry Gunawan, Sp. OG</h5>
                    <small style="color:gray;">Dokter Spesialis Kandungan</small>
                </div>

                <a href="#"
                   style="
                        margin-top:10px;
                        display:inline-block;
                        padding:6px 12px;
                        background:#1C145C;
                        color:white;
                        text-decoration:none;
                        border-radius:20px;
                        font-size:12px;
                        width:max-content;
                   ">
                    Cek Jadwal
                </a>

            </div>

        </div>

    </div>

    <!-- DOKTER 2 -->
    <div class="col-md-4 col-12">

        <div style="
            display:flex;
            gap:15px;
            padding:15px;
            border:1px solid #eee;
            border-radius:12px;
            align-items:center;
            height:100%;
        ">

            <img src="{{ asset('images/beranda/drrohmawati-1740454754.png') }}"
                 style="
                    width:90px;
                    height:90px;
                    border-radius:50%;
                    object-fit:cover;
                    border:3px solid #1C145C;
                 ">

            <div style="display:flex; flex-direction:column; justify-content:space-between; height:100%;">

                <div>
                    <h5 class="fw-bold mb-0">dr. Rochmawati I, Sp. Rad.</h5>
                    <small style="color:gray;">Dokter Spesialis Radiologi</small>
                </div>

                <a href="#"
                   style="
                        margin-top:10px;
                        display:inline-block;
                        padding:6px 12px;
                        background:#1C145C;
                        color:white;
                        text-decoration:none;
                        border-radius:20px;
                        font-size:12px;
                        width:max-content;
                   ">
                    Cek Jadwal
                </a>

            </div>

        </div>

    </div>


    <!-- DOKTER 3 -->
    <div class="col-md-4 col-12">

        <div style="
            display:flex;
            gap:15px;
            padding:15px;
            border:1px solid #eee;
            border-radius:12px;
            align-items:center;
            height:100%;
        ">

            <img src="{{ asset('images/beranda/drrahmat-1740454700.png') }}"
                 style="
                    width:90px;
                    height:90px;
                    border-radius:50%;
                    object-fit:cover;
                    border:3px solid #1C145C;
                 ">

            <div style="display:flex; flex-direction:column; justify-content:space-between; height:100%;">

                <div>
                    <h5 class="fw-bold mb-0">dr. Rahmat Santosa, Sp.PD</h5>
                    <small style="color:gray;">Dokter Spesialis Penyakit Dalam</small>
                </div>

                <a href="#"
                   style="
                        margin-top:10px;
                        display:inline-block;
                        padding:6px 12px;
                        background:#1C145C;
                        color:white;
                        text-decoration:none;
                        border-radius:20px;
                        font-size:12px;
                        width:max-content;
                   ">
                    Cek Jadwal
                </a>

            </div>

        </div>

    </div>

    <!-- DOKTER 4 -->
    <div class="col-md-4 col-12">

        <div style="
            display:flex;
            gap:15px;
            padding:15px;
            border:1px solid #eee;
            border-radius:12px;
            align-items:center;
            height:100%;
        ">

            <img src="{{ asset('images/beranda/drnasriatul-mawadah-1740452639.png') }}"
                 style="
                    width:90px;
                    height:90px;
                    border-radius:50%;
                    object-fit:cover;
                    border:3px solid #1C145C;
                 ">

            <div style="display:flex; flex-direction:column; justify-content:space-between; height:100%;">

                <div>
                    <h5 class="fw-bold mb-0">drg. Nashriatul Mawaddah</h5>
                    <small style="color:gray;">Dokter Gigi</small>
                </div>

                <a href="#"
                   style="
                        margin-top:10px;
                        display:inline-block;
                        padding:6px 12px;
                        background:#1C145C;
                        color:white;
                        text-decoration:none;
                        border-radius:20px;
                        font-size:12px;
                        width:max-content;
                   ">
                    Cek Jadwal
                </a>

            </div>

        </div>

    </div>

    <!-- DOKTER 5 -->
    <div class="col-md-4 col-12">

        <div style="
            display:flex;
            gap:15px;
            padding:15px;
            border:1px solid #eee;
            border-radius:12px;
            align-items:center;
            height:100%;
        ">

            <img src="{{ asset('images/beranda/drlizaldi-1740452597.png') }}"
                 style="
                    width:90px;
                    height:90px;
                    border-radius:50%;
                    object-fit:cover;
                    border:3px solid #1C145C;
                 ">

            <div style="display:flex; flex-direction:column; justify-content:space-between; height:100%;">

                <div>
                    <h5 class="fw-bold mb-0">dr. Lizaldi Ushan, Sp.B</h5>
                    <small style="color:gray;">Dokter Spesialis Bedah</small>
                </div>

                <a href="#"
                   style="
                        margin-top:10px;
                        display:inline-block;
                        padding:6px 12px;
                        background:#1C145C;
                        color:white;
                        text-decoration:none;
                        border-radius:20px;
                        font-size:12px;
                        width:max-content;
                   ">
                    Cek Jadwal
                </a>

            </div>

        </div>

    </div>

    <!-- DOKTER 6 -->
    <div class="col-md-4 col-12">

        <div style="
            display:flex;
            gap:15px;
            padding:15px;
            border:1px solid #eee;
            border-radius:12px;
            align-items:center;
            height:100%;
        ">

            <img src="{{ asset('images/beranda/drizzah-1740452426.png') }}"
                 style="
                    width:90px;
                    height:90px;
                    border-radius:50%;
                    object-fit:cover;
                    border:3px solid #1C145C;
                 ">

            <div style="display:flex; flex-direction:column; justify-content:space-between; height:100%;">

                <div>
                    <h5 class="fw-bold mb-0">drg. Izzah Dina Syamila</h5>
                    <small style="color:gray;">Dokter Gigi</small>
                </div>

                <a href="#"
                   style="
                        margin-top:10px;
                        display:inline-block;
                        padding:6px 12px;
                        background:#1C145C;
                        color:white;
                        text-decoration:none;
                        border-radius:20px;
                        font-size:12px;
                        width:max-content;
                   ">
                    Cek Jadwal
                </a>

            </div>

        </div>

    </div>

    <!-- DOKTER 7 -->
    <div class="col-md-4 col-12">

        <div style="
            display:flex;
            gap:15px;
            padding:15px;
            border:1px solid #eee;
            border-radius:12px;
            align-items:center;
            height:100%;
        ">

            <img src="{{ asset('images/beranda/drhermanto-1740452359.png') }}"
                 style="
                    width:90px;
                    height:90px;
                    border-radius:50%;
                    object-fit:cover;
                    border:3px solid #1C145C;
                 ">

            <div style="display:flex; flex-direction:column; justify-content:space-between; height:100%;">

                <div>
                    <h5 class="fw-bold mb-0">dr. Hermanto, Sp.N</h5>
                    <small style="color:gray;">Dokter Spesialis Saraf</small>
                </div>

                <a href="#"
                   style="
                        margin-top:10px;
                        display:inline-block;
                        padding:6px 12px;
                        background:#1C145C;
                        color:white;
                        text-decoration:none;
                        border-radius:20px;
                        font-size:12px;
                        width:max-content;
                   ">
                    Cek Jadwal
                </a>

            </div>

        </div>

    </div>

    <!-- DOKTER 8 -->
    <div class="col-md-4 col-12">

        <div style="
            display:flex;
            gap:15px;
            padding:15px;
            border:1px solid #eee;
            border-radius:12px;
            align-items:center;
            height:100%;
        ">

            <img src="{{ asset('images/beranda/drtajudin-1740454829.png') }}"
                 style="
                    width:90px;
                    height:90px;
                    border-radius:50%;
                    object-fit:cover;
                    border:3px solid #1C145C;
                 ">

            <div style="display:flex; flex-direction:column; justify-content:space-between; height:100%;">

                <div>
                    <h5 class="fw-bold mb-0">dr. Rakhmat Tajudin, Sp. PD</h5>
                    <small style="color:gray;">Dokter Spesialis Penyakit Dalam</small>
                </div>

                <a href="#"
                   style="
                        margin-top:10px;
                        display:inline-block;
                        padding:6px 12px;
                        background:#1C145C;
                        color:white;
                        text-decoration:none;
                        border-radius:20px;
                        font-size:12px;
                        width:max-content;
                   ">
                    Cek Jadwal
                </a>

            </div>

        </div>

    </div>

    <!-- DOKTER 9 -->
    <div class="col-md-4 col-12">

        <div style="
            display:flex;
            gap:15px;
            padding:15px;
            border:1px solid #eee;
            border-radius:12px;
            align-items:center;
            height:100%;
        ">

            <img src="{{ asset('images/beranda/drgigih-1740452182.png') }}"
                 style="
                    width:90px;
                    height:90px;
                    border-radius:50%;
                    object-fit:cover;
                    border:3px solid #1C145C;
                 ">

            <div style="display:flex; flex-direction:column; justify-content:space-between; height:100%;">

                <div>
                    <h5 class="fw-bold mb-0">dr. Gigih Fitriawan, Sp. PD</h5>
                    <small style="color:gray;">Dokter Spesialis Penyakit Dalam</small>
                </div>

                <a href="#"
                   style="
                        margin-top:10px;
                        display:inline-block;
                        padding:6px 12px;
                        background:#1C145C;
                        color:white;
                        text-decoration:none;
                        border-radius:20px;
                        font-size:12px;
                        width:max-content;
                   ">
                    Cek Jadwal
                </a>

            </div>

        </div>

    </div>

    <!-- DOKTER 10 -->
    <div class="col-md-4 col-12">

        <div style="
            display:flex;
            gap:15px;
            padding:15px;
            border:1px solid #eee;
            border-radius:12px;
            align-items:center;
            height:100%;
        ">

            <img src="{{ asset('images/beranda/dredith-1740452005.png') }}"
                 style="
                    width:90px;
                    height:90px;
                    border-radius:50%;
                    object-fit:cover;
                    border:3px solid #1C145C;
                 ">

            <div style="display:flex; flex-direction:column; justify-content:space-between; height:100%;">

                <div>
                    <h5 class="fw-bold mb-0">dr. Edith Fitriyana G, Sp. N</h5>
                    <small style="color:gray;">Dokter Spesialis Saraf</small>
                </div>

                <a href="#"
                   style="
                        margin-top:10px;
                        display:inline-block;
                        padding:6px 12px;
                        background:#1C145C;
                        color:white;
                        text-decoration:none;
                        border-radius:20px;
                        font-size:12px;
                        width:max-content;
                   ">
                    Cek Jadwal
                </a>

            </div>

        </div>

    </div>

    <!-- DOKTER 11 -->
    <div class="col-md-4 col-12">

        <div style="
            display:flex;
            gap:15px;
            padding:15px;
            border:1px solid #eee;
            border-radius:12px;
            align-items:center;
            height:100%;
        ">

            <img src="{{ asset('images/beranda/drdessy-1740451944.png') }}"
                 style="
                    width:90px;
                    height:90px;
                    border-radius:50%;
                    object-fit:cover;
                    border:3px solid #1C145C;
                 ">

            <div style="display:flex; flex-direction:column; justify-content:space-between; height:100%;">

                <div>
                    <h5 class="fw-bold mb-0">dr. Dessy Wulandari, Sp. OG</h5>
                    <small style="color:gray;">Dokter Spesialis Kandungan</small>
                </div>

                <a href="#"
                   style="
                        margin-top:10px;
                        display:inline-block;
                        padding:6px 12px;
                        background:#1C145C;
                        color:white;
                        text-decoration:none;
                        border-radius:20px;
                        font-size:12px;
                        width:max-content;
                   ">
                    Cek Jadwal
                </a>

            </div>

        </div>

    </div>

    <!-- DOKTER 12 -->
    <div class="col-md-4 col-12">

        <div style="
            display:flex;
            gap:15px;
            padding:15px;
            border:1px solid #eee;
            border-radius:12px;
            align-items:center;
            height:100%;
        ">

            <img src="{{ asset('images/beranda/drwawan-1740454865.png') }}"
                 style="
                    width:90px;
                    height:90px;
                    border-radius:50%;
                    object-fit:cover;
                    border:3px solid #1C145C;
                 ">

            <div style="display:flex; flex-direction:column; justify-content:space-between; height:100%;">

                <div>
                    <h5 class="fw-bold mb-0">dr. Wawan S, Sp.THT-KL</h5>
                    <small style="color:gray;">Dokter Spesialis THT-KL</small>
                </div>

                <a href="#"
                   style="
                        margin-top:10px;
                        display:inline-block;
                        padding:6px 12px;
                        background:#1C145C;
                        color:white;
                        text-decoration:none;
                        border-radius:20px;
                        font-size:12px;
                        width:max-content;
                   ">
                    Cek Jadwal
                </a>

            </div>

        </div>

    </div>

    <!-- DOKTER 13 -->
    <div class="col-md-4 col-12">

        <div style="
            display:flex;
            gap:15px;
            padding:15px;
            border:1px solid #eee;
            border-radius:12px;
            align-items:center;
            height:100%;
        ">

            <img src="{{ asset('images/beranda/drbambang-1740451759.png') }}"
                 style="
                    width:90px;
                    height:90px;
                    border-radius:50%;
                    object-fit:cover;
                    border:3px solid #1C145C;
                 ">

            <div style="display:flex; flex-direction:column; justify-content:space-between; height:100%;">

                <div>
                    <h5 class="fw-bold mb-0">dr. Bambang S, Sp. THT-KL</h5>
                    <small style="color:gray;">Dokter Spesialis THT-KL</small>
                </div>

                <a href="#"
                   style="
                        margin-top:10px;
                        display:inline-block;
                        padding:6px 12px;
                        background:#1C145C;
                        color:white;
                        text-decoration:none;
                        border-radius:20px;
                        font-size:12px;
                        width:max-content;
                   ">
                    Cek Jadwal
                </a>

            </div>

        </div>

    </div>

    <!-- DOKTER 14 -->
    <div class="col-md-4 col-12">

        <div style="
            display:flex;
            gap:15px;
            padding:15px;
            border:1px solid #eee;
            border-radius:12px;
            align-items:center;
            height:100%;
        ">

            <img src="{{ asset('images/beranda/drwiwin-1740454906.png') }}"
                 style="
                    width:90px;
                    height:90px;
                    border-radius:50%;
                    object-fit:cover;
                    border:3px solid #1C145C;
                 ">

            <div style="display:flex; flex-direction:column; justify-content:space-between; height:100%;">

                <div>
                    <h5 class="fw-bold mb-0">drg. Wiwin Yuniastri H</h5>
                    <small style="color:gray;">Dokter Gigi</small>
                </div>

                <a href="#"
                   style="
                        margin-top:10px;
                        display:inline-block;
                        padding:6px 12px;
                        background:#1C145C;
                        color:white;
                        text-decoration:none;
                        border-radius:20px;
                        font-size:12px;
                        width:max-content;
                   ">
                    Cek Jadwal
                </a>

            </div>

        </div>

    </div>

    <!-- DOKTER 15 -->
    <div class="col-md-4 col-12">

        <div style="
            display:flex;
            gap:15px;
            padding:15px;
            border:1px solid #eee;
            border-radius:12px;
            align-items:center;
            height:100%;
        ">

            <img src="{{ asset('images/beranda/dr-haikal-bulat-1746602010.png') }}"
                 style="
                    width:90px;
                    height:90px;
                    border-radius:50%;
                    object-fit:cover;
                    border:3px solid #1C145C;
                 ">

            <div style="display:flex; flex-direction:column; justify-content:space-between; height:100%;">

                <div>
                    <h5 class="fw-bold mb-0">drg. M Haikal Mahardhika, Sp.Ort</h5>
                    <small style="color:gray;">Dokter Spesialis Ortodonti</small>
                </div>

                <a href="#"
                   style="
                        margin-top:10px;
                        display:inline-block;
                        padding:6px 12px;
                        background:#1C145C;
                        color:white;
                        text-decoration:none;
                        border-radius:20px;
                        font-size:12px;
                        width:max-content;
                   ">
                    Cek Jadwal
                </a>

            </div>

        </div>

    </div>

    <!-- DOKTER 16 -->
    <div class="col-md-4 col-12">

        <div style="
            display:flex;
            gap:15px;
            padding:15px;
            border:1px solid #eee;
            border-radius:12px;
            align-items:center;
            height:100%;
        ">

            <img src="{{ asset('images/beranda/dradrin-1740387292.png') }}"
                 style="
                    width:90px;
                    height:90px;
                    border-radius:50%;
                    object-fit:cover;
                    border:3px solid #1C145C;
                 ">

            <div style="display:flex; flex-direction:column; justify-content:space-between; height:100%;">

                <div>
                    <h5 class="fw-bold mb-0">dr. Adrin Aefiansyah, Sp. JP</h5>
                    <small style="color:gray;">Dokter Spesialis Jantung dan Paru</small>
                </div>

                <a href="#"
                   style="
                        margin-top:10px;
                        display:inline-block;
                        padding:6px 12px;
                        background:#1C145C;
                        color:white;
                        text-decoration:none;
                        border-radius:20px;
                        font-size:12px;
                        width:max-content;
                   ">
                    Cek Jadwal
                </a>

            </div>

        </div>

    </div>

    <!-- DOKTER 17 -->
    <div class="col-md-4 col-12">

        <div style="
            display:flex;
            gap:15px;
            padding:15px;
            border:1px solid #eee;
            border-radius:12px;
            align-items:center;
            height:100%;
        ">

            <img src="{{ asset('images/beranda/dradhyatma-1740387212.png') }}"
                 style="
                    width:90px;
                    height:90px;
                    border-radius:50%;
                    object-fit:cover;
                    border:3px solid #1C145C;
                 ">

            <div style="display:flex; flex-direction:column; justify-content:space-between; height:100%;">

                <div>
                    <h5 class="fw-bold mb-0">dr. Adhyatma, Sp.M</h5>
                    <small style="color:gray;">Dokter Spesialis Mata</small>
                </div>

                <a href="#"
                   style="
                        margin-top:10px;
                        display:inline-block;
                        padding:6px 12px;
                        background:#1C145C;
                        color:white;
                        text-decoration:none;
                        border-radius:20px;
                        font-size:12px;
                        width:max-content;
                   ">
                    Cek Jadwal
                </a>

            </div>

        </div>

    </div>

    <!-- DOKTER 18 -->
    <div class="col-md-4 col-12">

        <div style="
            display:flex;
            gap:15px;
            padding:15px;
            border:1px solid #eee;
            border-radius:12px;
            align-items:center;
            height:100%;
        ">

            <img src="{{ asset('images/beranda/drayu-1740451662.png') }}"
                 style="
                    width:90px;
                    height:90px;
                    border-radius:50%;
                    object-fit:cover;
                    border:3px solid #1C145C;
                 ">

            <div style="display:flex; flex-direction:column; justify-content:space-between; height:100%;">

                <div>
                    <h5 class="fw-bold mb-0">dr. Ayu Asyifa Rahmi F, Sp.A</h5>
                    <small style="color:gray;">Dokter Spesialis Anak</small>
                </div>

                <a href="#"
                   style="
                        margin-top:10px;
                        display:inline-block;
                        padding:6px 12px;
                        background:#1C145C;
                        color:white;
                        text-decoration:none;
                        border-radius:20px;
                        font-size:12px;
                        width:max-content;
                   ">
                    Cek Jadwal
                </a>

            </div>

        </div>

    </div>

    <!-- DOKTER 19 -->
    <div class="col-md-4 col-12">

        <div style="
            display:flex;
            gap:15px;
            padding:15px;
            border:1px solid #eee;
            border-radius:12px;
            align-items:center;
            height:100%;
        ">

            <img src="{{ asset('images/beranda/dradika-1740451454.png') }}"
                 style="
                    width:90px;
                    height:90px;
                    border-radius:50%;
                    object-fit:cover;
                    border:3px solid #1C145C;
                 ">

            <div style="display:flex; flex-direction:column; justify-content:space-between; height:100%;">

                <div>
                    <h5 class="fw-bold mb-0">dr. Adhika S. PK</h5>
                    <small style="color:gray;">Dokter Spesialis Patologi Klinis</small>
                </div>

                <a href="#"
                   style="
                        margin-top:10px;
                        display:inline-block;
                        padding:6px 12px;
                        background:#1C145C;
                        color:white;
                        text-decoration:none;
                        border-radius:20px;
                        font-size:12px;
                        width:max-content;
                   ">
                    Cek Jadwal
                </a>

            </div>

        </div>

    </div>

    <!-- DOKTER 20 -->
    <div class="col-md-4 col-12">

        <div style="
            display:flex;
            gap:15px;
            padding:15px;
            border:1px solid #eee;
            border-radius:12px;
            align-items:center;
            height:100%;
        ">

            <img src="{{ asset('images/beranda/drdedi-1740451848.png') }}"
                 style="
                    width:90px;
                    height:90px;
                    border-radius:50%;
                    object-fit:cover;
                    border:3px solid #1C145C;
                 ">

            <div style="display:flex; flex-direction:column; justify-content:space-between; height:100%;">

                <div>
                    <h5 class="fw-bold mb-0">dr. Deddy Hediyanto, M.Sc.,Sp.A</h5>
                    <small style="color:gray;">Dokter Spesialis Anak</small>
                </div>

                <a href="#"
                   style="
                        margin-top:10px;
                        display:inline-block;
                        padding:6px 12px;
                        background:#1C145C;
                        color:white;
                        text-decoration:none;
                        border-radius:20px;
                        font-size:12px;
                        width:max-content;
                   ">
                    Cek Jadwal
                </a>

            </div>

        </div>

    </div>

    <!-- DOKTER 21 -->
    <div class="col-md-4 col-12">

        <div style="
            display:flex;
            gap:15px;
            padding:15px;
            border:1px solid #eee;
            border-radius:12px;
            align-items:center;
            height:100%;
        ">

            <img src="{{ asset('images/beranda/drheri-1740452278.png') }}"
                 style="
                    width:90px;
                    height:90px;
                    border-radius:50%;
                    object-fit:cover;
                    border:3px solid #1C145C;
                 ">

            <div style="display:flex; flex-direction:column; justify-content:space-between; height:100%;">

                <div>
                    <h5 class="fw-bold mb-0">dr. Heri Sugianto, M.Si.Med.,Sp.B</h5>
                    <small style="color:gray;">Dokter Spesialis Bedah</small>
                </div>

                <a href="#"
                   style="
                        margin-top:10px;
                        display:inline-block;
                        padding:6px 12px;
                        background:#1C145C;
                        color:white;
                        text-decoration:none;
                        border-radius:20px;
                        font-size:12px;
                        width:max-content;
                   ">
                    Cek Jadwal
                </a>

            </div>

        </div>

    </div>

    

</div>

            </div>

        </div>

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

            <!-- CARD 1 -->
            <div class="col-md-3 col-12">
                <div style="
                    border:1px solid #eee;
                    border-radius:20px;
                    overflow:hidden;
                    background:#fff;
                    height:100%;
                ">

                    <img src="{{ asset('images/beranda/gambar1.jpeg') }}"
                         style="width:100%; height:auto; display:block;">

                    <div style="padding:15px; text-align:center;">
                        <h6 class="fw-bold">Judul Informasi 1</h6>

                        <p style="font-size:13px; color:#666;">
                            Ringkasan singkat informasi atau berita rumah sakit.
                        </p>

                        <a href="#"
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

            <!-- CARD 2 -->
            <div class="col-md-3 col-12">
                <div style="
                    border:1px solid #eee;
                    border-radius:20px;
                    overflow:hidden;
                    background:#fff;
                    height:100%;
                ">

                    <img src="{{ asset('images/beranda/gambar2.jpeg') }}"
                         style="width:100%; height:auto; display:block;">

                    <div style="padding:15px; text-align:center;">
                        <h6 class="fw-bold">Judul Informasi 2</h6>
                        <p style="font-size:13px; color:#666;">
                            Ringkasan singkat informasi atau berita rumah sakit.
                        </p>

                        <a href="#"
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

            <!-- CARD 3 -->
            <div class="col-md-3 col-12">
                <div style="
                    border:1px solid #eee;
                    border-radius:20px;
                    overflow:hidden;
                    background:#fff;
                    height:100%;
                ">

                    <img src="{{ asset('images/beranda/gambar3.jpeg') }}"
                         style="width:100%; height:auto; display:block;">

                    <div style="padding:15px; text-align:center;">
                        <h6 class="fw-bold">Judul Informasi 3</h6>
                        <p style="font-size:13px; color:#666;">
                            Ringkasan singkat informasi atau berita rumah sakit.
                        </p>

                        <a href="#"
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

            <!-- CARD 4 -->
            <div class="col-md-3 col-12">
                <div style="
                    border:1px solid #eee;
                    border-radius:20px;
                    overflow:hidden;
                    background:#fff;
                    height:100%;
                ">

                    <img src="{{ asset('images/beranda/gambar4.jpeg') }}"
                         style="width:100%; height:auto; display:block;">

                    <div style="padding:15px; text-align:center;">
                        <h6 class="fw-bold">Judul Informasi 4</h6>
                        <p style="font-size:13px; color:#666;">
                            Ringkasan singkat informasi atau berita rumah sakit.
                        </p>

                        <a href="#"
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
<!-- ================= FLOATING BAR FINAL ================= -->
<style>

/* FLOATING BAR */
.floating-bar{
    position: fixed;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 99999999 !important;

    display: flex;
    overflow: hidden;

    border-radius: 60px; /* lebih rounded */
    box-shadow: 0 10px 25px rgba(0,0,0,0.18);
}

/* ITEM */
.floating-item{
    display: flex;
    align-items: center;
    gap: 8px;

    padding: 12px 24px;
    font-size: 14px;
    font-weight: 500;

    text-decoration: none;
    background: #eaeaea;
    color: #000;

    transition: 0.3s ease;
}

/* KIRI */
.floating-item:first-child{
    border-radius: 60px 0 0 60px;
}

/* KANAN */
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
    background: #e5e5e5;
    color: #000;
}

/* ICON */
.floating-item i{
    font-size: 18px;
}

/* HOVER */
.floating-item:hover{
    transform: translateY(-2px);
    opacity: .95;
}

/* RESPONSIVE */
@media(max-width:768px){

    .floating-item span{
        display:none;
    }

    .floating-item{
        padding:12px 15px;
    }
}
</style>

<div class="floating-bar">

    <a href="tel:0834325542" class="floating-item active">
        <i class="bi bi-hospital"></i>
        <span>IGD 24 JAM</span>
    </a>

    <a href="{{ url('/jadwaldokter') }}" class="floating-item middle">
        <i class="bi bi-calendar-check"></i>
        <span>Jadwal Praktik</span>
    </a>

    <a href="https://maps.google.com" target="_blank" class="floating-item active">
        <i class="bi bi-geo-alt-fill"></i>
        <span>Alamat</span>
    </a>

</div>
</div>
</html>