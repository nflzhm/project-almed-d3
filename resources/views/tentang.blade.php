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


</head>
<!-- ✅ Navbar -->

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





<!-- sub Hero Section -->
<style>
body {
    margin: 0;
    padding: 0;
    background: #fff !important;
}
</style>

<!-- HERO -->
<section style="
    position: relative;
    background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
    url('{{ asset('images/beranda/soretentangkami.png') }}') center/cover no-repeat;
    height: 80vh;
    color: white;
    overflow: hidden;
">

    <div class="container d-flex align-items-center h-100">
        <div class="row w-100">
            <div class="col-md-6 text-start">
                <h1 class="fw-bold">RSU Allam Medica Bumiayu</h1>
                <p>Rumah Sakit Umum terpercaya di Kabupaten Brebes yang telah melayani masyarakat sejak 2012. Berkomitmen menghadirkan layanan kesehatan yang inovatif, handal, dan terpercaya.</p>
            </div>
        </div>
    </div>

    <!-- CURVE (TRANSPARAN - POTONG GAMBAR) -->
    <div style="position:absolute; bottom:-1px; left:0; width:100%; line-height:0;">
        <svg viewBox="0 0 1440 120" xmlns="http://www.w3.org/2000/svg">
            <path fill="#ffffff"
                d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L0,120Z">
            </path>
        </svg>
    </div>

</section>


<style>
/* PROFIL */
.profile-section{
    background:#fff;
    padding:60px 0;
}

.profile-text{
    font-size:15px;
    color:#555;
    line-height:1.7;
    text-align: justify;
    text-justify: inter-word;
}

/* CARD */
.info-card{
    background:#fff;
    border-radius:12px;
    padding:14px;
    box-shadow:0 5px 15px rgba(0,0,0,0.05);
    transition:0.3s;
    display:flex;
    gap:10px;
    align-items:flex-start;
}

.info-card:hover{
    transform:translateY(-4px);
    box-shadow:0 10px 20px rgba(0,0,0,0.08);
}

/* TEXT */
.info-card small{
    font-size:11px;
    color:#888;
}

.info-card b{
    font-size:12.5px;
    font-weight:600;
    color:#333;
    line-height:1.5;
}

/* ICON */
.icon-box{
    width:34px;
    height:34px;
    border-radius:8px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:14px;
}

/* ICON COLOR */
.icon-primary{ background:rgba(28,20,92,0.1); color:#1C145C; }
.icon-success{ background:rgba(40,167,69,0.1); color:#28a745; }
.icon-warning{ background:rgba(255,152,0,0.1); color:#ff9800; }
.icon-danger{ background:rgba(220,53,69,0.1); color:#dc3545; }

/* ================= NILAI MEDICA ================= */
.medica-section{
    padding:60px 0;
    background:#fff;
}

.medica-label{
    font-size:11px;
    color:#888;
    font-weight:600;
    letter-spacing:1.5px;
    text-transform:uppercase;
    display:block;
    margin-bottom:4px;
}

.medica-heading{
    font-size:26px;
    font-weight:800;
    letter-spacing:3px;
    margin-bottom:30px;
}

.medica-card{
    border-radius:14px;
    padding:18px 10px;
    border:2px solid;
    height:100%;
    transition:0.3s;
}

.medica-card:hover{
    transform:translateY(-5px);
    box-shadow:0 10px 20px rgba(0,0,0,0.08);
}

.medica-letter{
    font-size:48px;
    font-weight:900;
    font-style:italic;
    margin-bottom:10px;
}

.medica-name{
    font-size:12px;
    font-weight:700;
    margin-bottom:5px;
}

.medica-desc{
    font-size:11px;
    color:#777;
}

/* WARNA */
.medica-m{ background:#FCEBEB; border-color:#F09595; color:#A32D2D; }
.medica-e{ background:#EEEDFE; border-color:#AFA9EC; color:#3C3489; }
.medica-d{ background:#F1EFE8; border-color:#B4B2A9; color:#444; }
.medica-i{ background:#EAF3DE; border-color:#97C459; color:#27500A; }
.medica-c{ background:#F1EFE8; border-color:#B4B2A9; color:#5F5E5A; }
.medica-a{ background:#FBEAF0; border-color:#ED93B1; color:#72243E; }

/* ================= VISI MISI ================= */
.visi-misi-section{
    padding:60px 0;
}

/* HEADING */
.visi-misi-heading{
    font-weight:700;
    margin-bottom:20px;
}

/* CARD BASE */
.vm-card{
    background:#fff;
    border-radius:16px;
    padding:25px;
    box-shadow:0 8px 25px rgba(0,0,0,0.05);
    position:relative;
    overflow:hidden;
    transition:0.3s;
}

.vm-card:hover{
    transform:translateY(-5px);
    box-shadow:0 15px 30px rgba(0,0,0,0.08);
}

/* LABEL TRANSPARAN (VISI / MISI) */
.vm-label{
    position:absolute;
    top:15px;
    right:20px;
    font-size:40px;
    font-weight:800;
    color:rgba(0,0,0,0.05);
    pointer-events:none;
}

/* HEADER */
.vm-header{
    display:flex;
    align-items:center;
    gap:12px;
    margin-bottom:15px;
}

/* ICON */
.vm-icon{
    width:45px;
    height:45px;
    border-radius:12px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:18px;
}

/* WARNA */
.vm-visi .vm-icon{
    background:rgba(28,20,92,0.1);
    color:#1C145C;
}

.vm-misi .vm-icon{
    background:rgba(40,167,69,0.1);
    color:#28a745;
}

/* TITLE */
.vm-title{
    font-weight:700;
    font-size:18px;
}

/* TEXT */
.vm-text{
    font-size:14px;
    color:#555;
    line-height:1.7;
}

/* LIST MISI */
.vm-list{
    padding-left:18px;
    font-size:14px;
    color:#555;
    line-height:1.7;
}

.vm-card .vm-text,
.vm-card .vm-list{
    flex-grow:1;
}
.vm-label{
    position:absolute;
    top:20px;
    right:20px;
    font-size:12px;
    font-weight:700;
    letter-spacing:1px;
    padding:4px 12px;
    border-radius:6px;
    z-index:1;
}

/* warna beda */
.vm-visi .vm-label{
    background:rgba(28,20,92,0.08);
    color:#1C145C;
}

.vm-misi .vm-label{
    background:rgba(40,167,69,0.08);
    color:#28a745;
}
.vm-card{
    height:100%; /* ini penting */
    display:flex;
    flex-direction:column;
} 

</style>


<!-- ================= PROFIL ================= -->
<section class="profile-section">
<div class="container">

    <div class="row">

        <!-- KIRI -->
        <div class="col-md-7">
            <h4 class="fw-bold mb-3">Profil Rumah Sakit</h4>

            <p class="profile-text">
                RSU Allam Medica Rumah Sakit Umum "Allam Medica" berdiri sejak tahun 2012, didirikan oleh Yayasan Allam Medica Bumiayu. Pada mulanya merupakan klinik pelayanan kesehatan umum dan kebidanan dengan nama Balai Pengobatan dan Rumah Bersalin Allam Medica. Penyelenggaraan rumah sakit sejak tahun 2008 dengan surat izin Bupati Brebes nomor 503.IO/KPT/005/IV/2008 sebagai "Rumah Bersalin" dan surat izin Bupati Brebes nomor 503.IO/KPT/008/IV/2008 sebagai "Balai Pengobatan Allam Medica".
   Sejak 2015 menjadi Rumah Sakit Umum Allam Medica dengan Ijin Operasional tetap dari Bupati Brebes, dan pada 2023 resmi menjadi Rumah Sakit Tipe C.
Didukung sistem keamanan aktif yang ramah bagi pengunjung, dengan pendekatan tenaga keamanan yang profesional dan sistem pemantauan area sepanjang waktu, dilengkapi 38 unit CCTV di setiap sudut strategis.
            </p>

        </div>

        <!-- KANAN -->
        <div class="col-md-5">

            <div class="mb-3 info-card">
                <div class="icon-box icon-primary">
                    <i class="bi bi-file-earmark-text"></i>
                </div>
                <div>
                    <small>Izin Operasional</small><br>
                    <b>503.IO/KPT/02787/IX/2015 Bupati Brebes — Tetap</b>
                </div>
            </div>

            <div class="mb-3 info-card">
                <div class="icon-box icon-success">
                    <i class="bi bi-hospital"></i>
                </div>
                <div>
                    <small>Kelas Rumah Sakit</small><br>
                    <b>Rumah Sakit Umum Tipe C SK 91/2008/02/7/2001</b>
                </div>
            </div>

            <div class="mb-3 info-card">
                <div class="icon-box icon-warning">
                    <i class="bi bi-geo-alt-fill"></i>
                </div>
                <div>
                    <small>Alamat</small><br>
                    <b>Jl. Pangeran Diponegoro No. 609 Jatisawit, Bumiayu, Kab. Brebes, 52273</b>
                </div>
            </div>

            <div class="info-card">
                <div class="icon-box icon-danger">
                    <i class="bi bi-telephone-fill"></i>
                </div>
                <div>
                    <small>Kontak</small><br>
                    <b>(0289) 430822</b>
                </div>
            </div>

        </div>

    </div>

</div>
</section>


<!-- ================= NILAI KEUTAMAAN ================= -->
<section class="medica-section">
<div class="container">

    <h4 class="fw-bold mb-3">Nilai Keutamaan</h4>
    <h1 class="medica-heading">M-E-D-I-C-A</h1>

    <div class="row g-3">

        <div class="col-6 col-md-4 col-lg-2">
            <div class="medica-card medica-m text-center">
                <div class="medica-letter">M</div>
                <div class="medica-name">Melayani Sepenuh Hati</div>
                <p class="medica-desc">Sepenuh hati melayani setiap pasien</p>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
            <div class="medica-card medica-e text-center">
                <div class="medica-letter">E</div>
                <div class="medica-name">Empati</div>
                <p class="medica-desc">Memahami dan merasakan kondisi pasien</p>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
            <div class="medica-card medica-d text-center">
                <div class="medica-letter">D</div>
                <div class="medica-name">Disiplin</div>
                <p class="medica-desc">Disiplin dalam bekerja dan pelayanan</p>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
            <div class="medica-card medica-i text-center">
                <div class="medica-letter">I</div>
                <div class="medica-name">Ikhlas</div>
                <p class="medica-desc">Ikhlas dalam memberikan layanan terbaik</p>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
            <div class="medica-card medica-c text-center">
                <div class="medica-letter">C</div>
                <div class="medica-name">Cepat</div>
                <p class="medica-desc">Respons cepat dan tindakan yang tepat</p>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
            <div class="medica-card medica-a text-center">
                <div class="medica-letter">A</div>
                <div class="medica-name">Antusias</div>
                <p class="medica-desc">Bertanggung jawab dan dapat dipercaya</p>
            </div>
        </div>

    </div>

</div>
</section>


{{-- ======================== VISI & MISI ======================== --}}

<section class="visi-misi-section">
<div class="container">

    <h4 class="fw-bold mb-4">Visi & Misi</h4>

    <div class="row g-4 align-items-stretch">

        <!-- VISI -->
        <div class="col-md-6">
            <div class="vm-card vm-visi">

                <div class="vm-label">VISI</div>

                <div class="vm-header">
                    <div class="vm-icon">
                        <i class="bi bi-eye-fill"></i>
                    </div>
                    <div class="vm-title">Visi</div>
                </div>

                <p class="vm-text">
                    Menjadi Rujukan Utama Pelayanan Kesehatan yang Inovatif, Handal dan Terpercaya di Kabupaten Brebes
                </p>

            </div>
        </div>

        <!-- MISI -->
        <div class="col-md-6">
            <div class="vm-card vm-misi">

                <div class="vm-label">MISI</div>

                <div class="vm-header">
                    <div class="vm-icon">
                        <i class="bi bi-bullseye"></i>
                    </div>
                    <div class="vm-title">Misi</div>
                </div>

                <ol class="vm-list">
                    <li>Melakukan upaya pelayanan kesehatan secara profesional dan inovatif melalui teknologi terbaru</li>
                    <li>Mewujudkan layanan kesehatan modern dan berorientasi pada kepuasan pelanggan</li>
                    <li>Menjalankan prinsip tata kelola perusahaan yang baik</li>
                    <li>Mengembangkan SDM unggul dan berdaya saing</li>
                </ol>

            </div>
        </div>

    </div>

</div>
</section>

<!-- AOS (WAJIB kalau mau animasi) -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<style>
.timeline-section{
    padding:100px 0;
    background:#f9fafc;
}

/* GARIS TENGAH */
.timeline{
    position:relative;
    max-width:1100px;
    margin:auto;
}

.timeline::before{
    content:'';
    position:absolute;
    left:50%;
    top:0;
    bottom:0;
    width:3px;
    background:linear-gradient(to bottom,#1C145C,#6c63ff);
    transform:translateX(-50%);
}

/* ITEM */
.timeline-item{
    position:relative;
    width:50%;
    padding:40px 60px;
    display:flex;
}

/* POSISI */
.timeline-item.left{
    left:0;
    justify-content:flex-end;
    text-align:right;
}

.timeline-item.right{
    left:50%;
    justify-content:flex-start;
}

/* ICON BULAT */
.timeline-icon{
    position:absolute;
    top:35px;
    width:50px;
    height:50px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:20px;
    color:#fff;
    z-index:3;
    box-shadow:0 5px 15px rgba(0,0,0,0.2);
}

/* POSISI ICON */
.timeline-item.left .timeline-icon{
    right:-25px;
}
.timeline-item.right .timeline-icon{
    left:-25px;
}

/* WARNA ICON */
.icon-1{ background:#1C145C; }
.icon-2{ background:#28a745; }
.icon-3{ background:#ff9800; }
.icon-4{ background:#dc3545; }

/* CARD */
.timeline-card{
    background:#fff;
    padding:25px 30px;
    border-radius:18px;
    box-shadow:0 12px 35px rgba(0,0,0,0.08);
    transition:0.3s;
    width:100%;
    max-width:420px;

    /* 🔥 BIKIN TINGGI SAMA */
    min-height:150px;
    display:flex;
    flex-direction:column;
    justify-content:center;
}

.timeline-card:hover{
    transform:translateY(-8px) scale(1.02);
    box-shadow:0 20px 45px rgba(0,0,0,0.15);
}

/* TEXT */
.timeline-year{
    font-weight:800;
    color:#1C145C;
    font-size:20px;
}

.timeline-text{
    font-size:14px;
    color:#555;
    margin-top:6px;
    line-height:1.6;
}

/* RESPONSIVE */
@media(max-width:768px){

    .timeline::before{
        left:25px;
    }

    .timeline-item{
        width:100%;
        padding-left:80px;
        padding-right:20px;
    }

    .timeline-item.left,
    .timeline-item.right{
        left:0;
        text-align:left;
        justify-content:flex-start;
    }

    .timeline-icon{
        left:0 !important;
    }
}
</style>

<section class="timeline-section">
<div class="container">

    <h4 class="fw-bold mb-5 text-center">Tonggak Sejarah</h4>

    <div class="timeline">

        <!-- 2008 -->
        <div class="timeline-item left" data-aos="fade-right">
            <div class="timeline-icon icon-1">
                <i class="bi bi-house-heart-fill"></i>
            </div>
            <div class="timeline-card">
                <div class="timeline-year">2008</div>
                <div class="timeline-text">
                    503.10/KPT/007/IV/2008 Rumah Bersalin dan Balai Pengobatan Allam Medica Bumiayu.
                </div>
            </div>
        </div>

        <!-- 2011 -->
        <div class="timeline-item right" data-aos="fade-left">
            <div class="timeline-icon icon-2">
                <i class="bi bi-file-earmark-check-fill"></i>
            </div>
            <div class="timeline-card">
                <div class="timeline-year">2011</div>
                <div class="timeline-text">
                    Mendapat izin resmi sebagai Rumah Sakit.
                </div>
            </div>
        </div>

        <!-- 2015 -->
        <div class="timeline-item left" data-aos="fade-right">
            <div class="timeline-icon icon-3">
                <i class="bi bi-hospital-fill"></i>
            </div>
            <div class="timeline-card">
                <div class="timeline-year">2015</div>
                <div class="timeline-text">
                    503.10/KPPT/02797/IX/2015 Ijin Operasional Tetap RSU Allam Medica Bumiayu.
                </div>
            </div>
        </div>

        <!-- 2023 -->
        <div class="timeline-item right" data-aos="fade-left">
            <div class="timeline-icon icon-4">
                <i class="bi bi-award-fill"></i>
            </div>
            <div class="timeline-card">
                <div class="timeline-year">2023</div>
                <div class="timeline-text">
                    RSU Allam Medica resmi menjadi Rumah Sakit Tipe C.
                </div>
            </div>
        </div>

    </div>

</div>
</section>

<script>
AOS.init({
    duration:800,
    once:true
});
</script>


<style>
.filosofi-section{
    padding:80px 0;
    background:#fffff;
}

.filosofi-card{
    border-radius:16px;
    padding:30px;
    position:relative;
    overflow:hidden;
    height:100%;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
    transition:0.3s;
}

.filosofi-card:hover{
    transform:translateY(-6px);
    box-shadow:0 15px 40px rgba(0,0,0,0.12);
}

/* CARD PUTIH */
.card-filosofi{
    background:#fff;
}

/* CARD BIRU */
.card-semboyan{
    background:#1C145C;
    color:#fff;
}

/* HEADER */
.filosofi-header{
    display:flex;
    align-items:center;
    gap:12px;
    margin-bottom:15px;
}

.filosofi-icon{
    width:42px;
    height:42px;
    border-radius:10px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:18px;
}

/* ICON WARNA */
.icon-filosofi{
    background:rgba(28,20,92,0.1);
    color:#1C145C;
}

.icon-semboyan{
    background:rgba(255,255,255,0.2);
    color:#fff;
}

/* JUDUL */
.filosofi-title{
    font-size:16px;
    font-weight:700;
}

/* TEXT */
.filosofi-text{
    font-size:14px;
    line-height:1.7;
    color:#555;
}

.card-semboyan .filosofi-text{
    color:#e0e0e0;
}

/* BACKGROUND TEXT (EFEK VISI MISI) */
.bg-label{
    position:absolute;
    top:20px;
    right:20px;
    font-size:60px;
    font-weight:800;
    opacity:0.05;
    pointer-events:none;
}
</style>

<section class="filosofi-section">
<div class="container">

    <div class="row g-4">

        <!-- FILOSOFI -->
        <div class="col-md-6">
            <div class="filosofi-card card-filosofi">

                <div class="bg-label">F</div>

                <div class="filosofi-header">
                    <div class="filosofi-icon icon-filosofi">
                        <i class="bi bi-lightbulb-fill"></i>
                    </div>
                    <div class="filosofi-title">Filosofi RSU Allam Medica</div>
                </div>

                <p class="filosofi-text">
                    Rumah Sakit yang memberikan pelayanan medis, rujukan medis yang terintegrasi dalam pelayanan, dengan menjunjung tinggi rasa kemanusiaan sehingga tercapai derajat kesehatan yang optimal bagi masyarakat
                </p>

            </div>
        </div>

        <!-- SEMBOYAN -->
        <div class="col-md-6">
            <div class="filosofi-card card-semboyan">

                <div class="bg-label">S</div>

                <div class="filosofi-header">
                    <div class="filosofi-icon icon-semboyan">
                        <i class="bi bi-chat-heart-fill"></i>
                    </div>
                    <div class="filosofi-title">Makna Semboyan</div>
                </div>

                <p class="filosofi-text">
                    "Kesehatan Anda, Tujuan Kami"
                </p>
                <p class="filosofi-text">
                    Setiap langkah pelayanan kami selalu berorientasi pada kesembuhan dan kepuasan pasien. Kesehatan Anda adalah prioritas utama yang menjadi alasan kami hadir.
                </p>

            </div>
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