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



<style>

body{
    padding-top:100px;
}
.layanan-section{
    padding:60px 0 40px;
    text-align:center;
}

.layanan-label{
    font-size:12px;
    font-weight:600;
    color:#888;
    letter-spacing:2px;
    text-transform:uppercase;
}

.layanan-heading{
    font-size:32px;
    font-weight:800;
    color:#1C145C;
    margin:10px 0;
}

.layanan-desc{
    font-size:14px;
    color:#444;
    max-width:650px;
    margin:auto;
}
.layanan-search-section{
    padding:30px 0;
}

.search-box{
    position:relative;
    max-width:600px;
    display:flex;
    align-items:center;
    background:#f6f7fb;
    border-radius:50px;
    padding:8px 10px 8px 45px;
}

.search-icon{
    position:absolute;
    left:18px;
    color:#999;
}

.search-input{
    border:none;
    background:transparent;
    font-size:14px;
}

.btn-search{
    background:#1C145C;
    color:#fff;
    border:none;
    border-radius:50px;
    padding:6px 18px;
    font-size:13px;
}
.layanan-card{
    background:#fff;
    border-radius:18px;
    box-shadow:0 10px 25px rgba(0,0,0,0.06);
    height:100%;
    overflow:hidden;
    transition:0.3s;
}

.layanan-card:hover{
    transform:translateY(-5px);
}
.layanan-img-wrapper{
    height:100%;
    display:flex;
    align-items:center;
    justify-content:center;
    background:#fff;
}

.layanan-img{
    width:100%;
    height:100%;
    object-fit:contain;
    padding:10px;
}

.layanan-content{
    padding:20px;
    display:flex;
    flex-direction:column;
    height:100%;
}

.layanan-card-title{
    font-size:14px;
    font-weight:700;
    margin-bottom:8px;
    color:#000;
}

.layanan-text{
    font-size:12px;
    color:#000;
    line-height:1.5;
    flex-grow:1;
}

.layanan-jadwal{
    font-size:11px;
    margin-top:8px;
    color:#000;
}

.layanan-contact{
    font-size:10px;
    margin-top:auto; 
    font-weight:600;
    display:flex;
    align-items:center;
    gap:6px;
    color:#000;
}


</style>
</head>

<body>

<!-- ================= HEADER ================= -->
<section class="layanan-section">
<div class="container">

<span class="layanan-label">Karir Kami</span>

<h2 class="layanan-heading">
Informasi Karir <br>
RSU Allam Medica
</h2>



</div>
</section>

<!-- ================= SEARCH ================= -->
<section class="layanan-search-section">
<div class="container">

<div class="search-box mx-auto">
<i class="bi bi-search search-icon"></i>
<input type="text" class="form-control search-input" placeholder="Cari loker...">
<button class="btn btn-search">Cari</button>
</div>

</div>
</section>

<!-- ================= CARD ================= -->
<div class="container py-5">
    <div class="row g-4">

        <!-- CARD 1 -->
        <div class="col-md-6">
            <div class="layanan-card h-100">
                <div class="row g-0 h-100">

                    <div class="col-md-5">
                        <div class="layanan-img-wrapper h-100">
                            <img src="{{ asset('images/karir/cssd.png') }}" class="layanan-img">
                        </div>
                    </div>

                    <div class="col-md-7 d-flex">
                        <div class="layanan-content d-flex flex-column">
                            <div class="layanan-card-title">Staff CSSD</div>
                            <div class="layanan-text">
                                Bertanggung jawab terhadap sterilisasi alat medis sesuai SOP. 
                                Kualifikasi: D3/S1 Kesehatan, memahami prosedur sterilisasi, teliti, dan disiplin.
                            </div>
                            <div class="mt-auto">
                                <a href="#" class="btn btn-danger btn-sm">Lamar Sekarang</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- CARD 2 -->
        <div class="col-md-6">
            <div class="layanan-card h-100">
                <div class="row g-0 h-100">
                    <div class="col-md-5">
                        <img src="{{ asset('images/karir/cssd.png') }}" class="layanan-img">
                    </div>
                    <div class="col-md-7 d-flex">
                        <div class="layanan-content d-flex flex-column">
                            <div class="layanan-card-title">Perawat</div>
                            <div class="layanan-text">
                                Memberikan asuhan keperawatan kepada pasien. 
                                Kualifikasi: STR aktif, komunikatif, mampu bekerja dalam tim.
                            </div>
                            <div class="mt-auto">
                                <a href="#" class="btn btn-danger btn-sm">Lamar Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD 3 -->
        <div class="col-md-6">
            <div class="layanan-card h-100">
                <div class="row g-0 h-100">
                    <div class="col-md-5">
                        <img src="{{ asset('images/karir/cssd.png') }}" class="layanan-img">
                    </div>
                    <div class="col-md-7 d-flex">
                        <div class="layanan-content d-flex flex-column">
                            <div class="layanan-card-title">Dokter Umum</div>
                            <div class="layanan-text">
                                Melayani konsultasi dan tindakan medis dasar. 
                                Kualifikasi: STR aktif, memiliki empati tinggi, profesional.
                            </div>
                            <div class="mt-auto">
                                <a href="#" class="btn btn-danger btn-sm">Lamar Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD 4 -->
        <div class="col-md-6">
            <div class="layanan-card h-100">
                <div class="row g-0 h-100">
                    <div class="col-md-5">
                        <img src="{{ asset('images/karir/cssd.png') }}" class="layanan-img">
                    </div>
                    <div class="col-md-7 d-flex">
                        <div class="layanan-content d-flex flex-column">
                            <div class="layanan-card-title">Apoteker</div>
                            <div class="layanan-text">
                                Mengelola distribusi obat dan pelayanan farmasi. 
                                Kualifikasi: S1 Farmasi + STRA, teliti, bertanggung jawab.
                            </div>
                            <div class="mt-auto">
                                <a href="#" class="btn btn-danger btn-sm">Lamar Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD 5 -->
        <div class="col-md-6">
            <div class="layanan-card h-100">
                <div class="row g-0 h-100">
                    <div class="col-md-5">
                        <img src="{{ asset('images/karir/cssd.png') }}" class="layanan-img">
                    </div>
                    <div class="col-md-7 d-flex">
                        <div class="layanan-content d-flex flex-column">
                            <div class="layanan-card-title">Admin Pendaftaran</div>
                            <div class="layanan-text">
                                Mengelola data pasien dan administrasi pendaftaran. 
                                Kualifikasi: minimal SMA/SMK, mampu mengoperasikan komputer.
                            </div>
                            <div class="mt-auto">
                                <a href="#" class="btn btn-danger btn-sm">Lamar Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD 6 -->
        <div class="col-md-6">
            <div class="layanan-card h-100">
                <div class="row g-0 h-100">
                    <div class="col-md-5">
                        <img src="{{ asset('images/karir/cssd.png') }}" class="layanan-img">
                    </div>
                    <div class="col-md-7 d-flex">
                        <div class="layanan-content d-flex flex-column">
                            <div class="layanan-card-title">Analis Laboratorium</div>
                            <div class="layanan-text">
                                Melakukan pemeriksaan sampel pasien. 
                                Kualifikasi: D3 Analis Kesehatan, teliti, memahami alat lab.
                            </div>
                            <div class="mt-auto">
                                <a href="#" class="btn btn-danger btn-sm">Lamar Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD 7 -->
        <div class="col-md-6">
            <div class="layanan-card h-100">
                <div class="row g-0 h-100">
                    <div class="col-md-5">
                        <img src="{{ asset('images/karir/cssd.png') }}" class="layanan-img">
                    </div>
                    <div class="col-md-7 d-flex">
                        <div class="layanan-content d-flex flex-column">
                            <div class="layanan-card-title">Security</div>
                            <div class="layanan-text">
                                Menjaga keamanan lingkungan rumah sakit. 
                                Kualifikasi: memiliki sertifikat Gada Pratama, disiplin.
                            </div>
                            <div class="mt-auto">
                                <a href="#" class="btn btn-danger btn-sm">Lamar Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD 8 -->
        <div class="col-md-6">
            <div class="layanan-card h-100">
                <div class="row g-0 h-100">
                    <div class="col-md-5">
                        <img src="{{ asset('images/karir/cssd.png') }}" class="layanan-img">
                    </div>
                    <div class="col-md-7 d-flex">
                        <div class="layanan-content d-flex flex-column">
                            <div class="layanan-card-title">Cleaning Service</div>
                            <div class="layanan-text">
                                Menjaga kebersihan area rumah sakit sesuai standar kebersihan. 
                                Kualifikasi: rajin, bertanggung jawab, sehat jasmani.
                            </div>
                            <div class="mt-auto">
                                <a href="#" class="btn btn-danger btn-sm">Lamar Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


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