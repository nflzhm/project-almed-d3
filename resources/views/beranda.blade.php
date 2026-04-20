<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>RSU Allam Medica - Beranda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Style tambahan -->
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }
        .hero {
            background: linear-gradient(#1C145C, #fdfdfd),
                        url('/images/rs.jpg') no-repeat center;
            background-size: cover;
            color: white;
            padding: 100px 0;
        }
        .card:hover {
            transform: scale(1.05);
            transition: 0.3s;
        }
        footer {
            background: #1C145C;
            color: white;
            padding: 20px 0;
        }
        .navbar-white {
        background-color: #ffffff !important;
        border-radius: 0 0 20px 20px; /* kiri atas, kanan atas, kanan bawah, kiri bawah */
        box-shadow: 0 4px 10px rgba(0,0,0,0.1); /* biar lebih elegan */
        }
        
        .dropdown-menu {
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .partner-slider {
            overflow: hidden;
            position: relative;
            width: 100%;
        }

        .partner-track {
            display: flex;
            width: max-content;
            animation: scroll 30s linear infinite;
        }

        /* JARAK ANTAR LOGO */
        .partner-item {
            flex: 0 0 auto;
            margin: 0 25px; /* jarak kiri kanan */
        }

        /* UKURAN + HITAM PUTIH */
        .partner-item img {
            height: 60px;
            width: auto;
            object-fit: contain;
            filter: grayscale(100%); /* jadi hitam putih */
            opacity: 0.7;
            transition: 0.3s ease;
        }

        /* HOVER JADI WARNA */
        .partner-item img:hover {
            filter: grayscale(0%);
            opacity: 1;
            transform: scale(1.1);
        }

        .floating-bar {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 9999;

        display: flex;
        overflow: hidden;

        border-radius: 40px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }

    /* item umum */
    .floating-item {
        display: flex;
        align-items: center;
        gap: 8px;

        padding: 12px 25px;
        font-size: 14px;
        font-weight: 500;

        background: #eaeaea;
        color: #000;

        transition: 0.3s;
    }

    /* kiri & kanan merah */
    .floating-item.active {
        background: #ff1a1a;
        color: white;
    }

    /* tengah */
    .floating-item.middle {
        background: #e5e5e5;
        color: #000;
    }

    /* icon */
    .floating-item i {
        font-size: 18px;
    }

    /* hover effect */
    .floating-item:hover {
        transform: translateY(-2px);
        cursor: pointer;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .floating-item span {
            display: none;
        }

        .floating-item {
            padding: 12px 15px;
        }
    }

/* ANIMASI */
@keyframes scroll {
    from {
        transform: translateX(0);
    }
    to {
        transform: translateX(-50%);
    }
}
    </style>
</head>
<body>

<!-- ✅ Navbar -->

<nav class="navbar navbar-expand-lg navbar-dark"
    style="background:#1C145C;position:fixed;top:0;width:100%;z-index:9999;padding:2px 0;height:40px;">
    <div class="container">

        <ul class="navbar-nav" style="font-size:13px;">
            <li class="nav-item">
                <span style="color:#fff;display:block;padding:4px 10px;">
                    <i class="bi bi-telephone-fill" style="color:#fff;margin-right:5px;font-size:12px;"></i>
                    0834325542
                </span>
            </li>
            <li class="nav-item">
                <span style="color:#fff;display:block;padding:4px 10px;">
                    <i class="bi bi-envelope-fill" style="color:#fff;margin-right:5px;font-size:12px;"></i>
                    allammedica@gmail.com
                </span>
            </li>
        </ul>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto" style="font-size:13px;">
                <li class="nav-item"><a class="nav-link" href="#" style="padding:4px 8px;"><i class="bi bi-twitter" style="font-size:14px;"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="#" style="padding:4px 8px;"><i class="bi bi-facebook" style="font-size:14px;"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="#" style="padding:4px 8px;"><i class="bi bi-instagram" style="font-size:14px;"></i></a></li>
            </ul>
        </div>

    </div>
</nav>

<style>
/* DROPDOWN ANIMATION */
.dropdown-menu {
    border-radius: 12px;
    border: none;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    padding: 10px 0;
    opacity: 0;
    transform: translateY(10px);
    transition: all 0.3s ease;
    display: block;
    visibility: hidden;
}

/* SHOW ON HOVER */
.nav-item.dropdown:hover .dropdown-menu {
    opacity: 1;
    transform: translateY(0);
    visibility: visible;
}

/* ITEM STYLE */
.dropdown-item {
    font-size: 14px;
    padding: 8px 20px;
    transition: 0.2s;
}

/* HOVER EFFECT */
.dropdown-item:hover {
    background: #1C145C;
    color: #fff;
}
.dropdown-menu {
    pointer-events: auto;
}
</style>

<nav class="navbar navbar-expand-lg navbar-light"
    style="background:#fff;border-radius:0 0 20px 20px;box-shadow:0 4px 10px rgba(0,0,0,0.1);position:fixed;top:40px;width:100%;z-index:9998;">
    
    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/beranda/logo-almed.png') }}" height="40">
        </a>

        <!-- TOGGLER -->
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a href="/" class="nav-link">Beranda</a>
                </li>

                <!-- DROPDOWN -->
                <li class="nav-item dropdown position-relative">
                    <a class="nav-link dropdown-toggle" href="#">
                        Menu
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('/pengadaan') }}">Pengadaan</a></li>
                        <li><a class="dropdown-item" href="{{ url('/karir') }}">Karir</a></li>
                        <li><a class="dropdown-item" href="{{ url('/berita') }}">Berita</a></li>
                        <li><a class="dropdown-item" href="{{ url('/video') }}">Video</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/layanan" class="nav-link">Layanan</a>
                </li>

                <li class="nav-item">
                    <a href="/download" class="nav-link me-3">Download</a>
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


<div class="floating-bar">

    <div class="floating-item active">
        <i class="bi bi-hospital"></i>
        <span>IGD 24 JAM</span>
    </div>

    <div class="floating-item middle">
        <i class="bi bi-calendar-check"></i>
        <span>Jadwal Praktik</span>
    </div>

    <div class="floating-item active">
        <i class="bi bi-geo-alt-fill"></i>
        <span>Alamat</span>
    </div>

</div>


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
                    <strong>RSU Alam Medica</strong> Rumah Sakit Umum “Allam Medica” berdiri sejak tahun 2012
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
    <a href="#"
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
</html>