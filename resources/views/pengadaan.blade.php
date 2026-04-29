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


<!-- ================= PENGADAAN HEADER ================= -->
<style>

/* ================= SECTION ================= */
.pengadaan-section{
    padding:60px 0 40px;
}

body{
    padding-top:100px;
}

/* ================= HEADER ================= */
.pengadaan-label{
    font-size:12px;
    font-weight:600;
    color:#888;
    letter-spacing:2px;
    text-transform:uppercase;
}

.pengadaan-heading{
    font-size:32px;
    font-weight:800;
    color:#1C145C;
    margin:10px 0;
}

.pengadaan-desc{
    font-size:14px;
    color:#444;
    max-width:650px;
    line-height:1.7;
}

/* ================= STATS ================= */
.pengadaan-stats{
    display:flex;
    gap:20px;
    margin-top:25px;
    flex-wrap:wrap;
}

.stat-card{
    width:120px;
    height:120px;
    border-radius:16px;
    background:rgba(28,20,92,.05);
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    text-align:center;
    transition:.3s;
}

.stat-card:hover{
    transform:translateY(-5px);
    background:rgba(28,20,92,.1);
}

.stat-number{
    font-size:28px;
    font-weight:800;
    color:#1C145C;
}

.stat-text{
    font-size:12px;
    color:#555;
    margin-top:5px;
}

/* ================= ALERT ================= */
.alert-urgent{
    background:#ffe5e5;
    border:1px solid #ff4d4d;
    color:#b30000;
    border-radius:12px;
    padding:15px 20px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:15px;
    margin-top:30px;
}

.alert-urgent strong{
    display:block;
    font-size:14px;
    margin-bottom:4px;
}

.badge-urgent{
    background:#ff1a1a;
    color:#fff;
    padding:6px 14px;
    border-radius:20px;
    font-size:12px;
    font-weight:600;
    white-space:nowrap;
}

/* ================= WRAPPER ================= */
.pengadaan-wrapper{
    display:flex;
    gap:20px;
    margin-top:25px;
    align-items:flex-start;
}

/* ================= TABLE CARD ================= */
.pengadaan-table-card{
    flex:2;
    background:#f9f9f9;
    border-radius:16px;
    padding:20px;
    box-shadow:0 5px 15px rgba(0,0,0,.05);
    overflow:hidden;
}

.pengadaan-title{
    font-weight:700;
    font-size:16px;
}

.pengadaan-sub{
    font-size:12px;
    color:#777;
}

.badge-total{
    background:#e6e0ff;
    color:#4b3cc9;
    padding:5px 12px;
    border-radius:20px;
    font-size:12px;
    white-space:nowrap;
}

/* ================= TABLE ================= */
.table-wrap{
    overflow-x:auto;
}

.table-custom{
    min-width:600px;
}

.table-custom th{
    font-size:12px;
    color:#666;
    white-space:nowrap;
}

.table-custom td{
    font-size:13px;
    white-space:nowrap;
}

/* ================= QR CARD ================= */
.qr-card{
    flex:1;
    background:#fff;
    border-radius:16px;
    padding:20px;
    text-align:center;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
}

.qr-card img{
    width:100%;
    max-width:230px;
}

.qr-text{
    font-size:12px;
    color:#555;
    margin-top:10px;
    line-height:1.6;
}

/* ================= TABLET ================= */
@media(max-width:991px){

    .pengadaan-wrapper{
        flex-direction:column;
    }

    .pengadaan-table-card,
    .qr-card{
        width:100%;
    }

    .pengadaan-stats{
        gap:12px;
    }

    .stat-card{
        width:calc(33.33% - 8px);
        height:105px;
    }

    .stat-number{
        font-size:22px;
    }

    .alert-urgent{
        flex-direction:column;
        align-items:flex-start;
    }

    .badge-urgent{
        align-self:flex-start;
    }

    .header-flex{
        flex-direction:column;
        align-items:flex-start !important;
        gap:10px;
    }
}

/* ================= MOBILE ================= */
@media(max-width:576px){

    .pengadaan-section{
        padding:40px 0 25px;
    }

    .pengadaan-heading{
        font-size:24px;
        line-height:1.3;
    }

    .pengadaan-desc{
        font-size:13px;
    }

    .pengadaan-stats{
        display:grid;
        grid-template-columns:repeat(2,1fr);
        gap:10px;
    }

    .stat-card{
        width:100%;
        height:95px;
    }

    .stat-number{
        font-size:20px;
    }

    .stat-text{
        font-size:11px;
    }

    .pengadaan-table-card,
    .qr-card{
        padding:16px;
        border-radius:14px;
    }

    .pengadaan-title{
        font-size:14px;
    }

    .badge-total{
        font-size:11px;
        padding:5px 10px;
    }

    .table-custom th,
    .table-custom td{
        font-size:12px;
    }

    .alert-urgent{
        padding:14px;
    }

    .alert-urgent small{
        font-size:12px;
        line-height:1.6;
    }

    .qr-card img{
        max-width:180px;
    }

    .qr-text{
        font-size:11px;
    }
}

</style>

<!-- ================= HEADER ================= -->
<section class="pengadaan-section">
<div class="container">

    <div class="text-start" style="max-width:600px;">

        <span class="pengadaan-label">Pengadaan Alat Kesehatan</span>

        <h2 class="pengadaan-heading">
            RSU Allam Medica Bumiayu
        </h2>

        <p class="pengadaan-desc">
            Kami membuka pengadaan alat kesehatan untuk meningkatkan kualitas pelayanan medis 
            pada periode Oktober – November 2025.
        </p>

        <!-- ================= STATS ================= -->
        <div class="pengadaan-stats">

            <div class="stat-card">
                <div class="stat-number">7</div>
                <div class="stat-text">Jenis Alat</div>
            </div>

            <div class="stat-card">
                <div class="stat-number">29</div>
                <div class="stat-text">Total Unit</div>
            </div>

            <div class="stat-card">
                <div class="stat-number">1 bln</div>
                <div class="stat-text">Batas Respon</div>
            </div>

        </div>

    </div>

</div>
</section>

<!-- ================= CONTENT ================= -->
<div class="container">

    <!-- ALERT -->
    <div class="alert-urgent">
        <div>
            <strong>Dibutuhkan Segera</strong>
            <small>
                Pengiriman penawaran maksimal 1 bulan sejak permintaan diterima.
                Prioritas diberikan kepada vendor lokal Bumiayu.
            </small>
        </div>

        <div class="badge-urgent">Urgent</div>
    </div>

    <!-- ================= TABLE + QR ================= -->
    <div class="pengadaan-wrapper">

        <!-- TABLE -->
        <div class="pengadaan-table-card">

            <div class="d-flex justify-content-between align-items-center mb-3 header-flex">
                <div>
                    <div class="pengadaan-title">
                        Daftar Kebutuhan Alat Kesehatan
                    </div>
                    <div class="pengadaan-sub">
                        Periode April – Mei 2026
                    </div>
                </div>

                <div class="badge-total">
                    7 Item • 29 Unit
                </div>
            </div>

            <div class="table-wrap">
                <table class="table table-borderless table-custom">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA BARANG</th>
                            <th>JUMLAH</th>
                            <th>PERIODE</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>01</td>
                            <td>Bedside Monitor</td>
                            <td>8 Unit</td>
                            <td>April - Mei 2026</td>
                        </tr>

                        <tr>
                            <td>02</td>
                            <td>Vein Viewer</td>
                            <td>1 Unit</td>
                            <td>April - Mei 2026</td>
                        </tr>

                        <tr>
                            <td>03</td>
                            <td>Bed 3 Crank</td>
                            <td>7 Unit</td>
                            <td>April - Mei 2026</td>
                        </tr>

                        <tr>
                            <td>04</td>
                            <td>Syringe Pump</td>
                            <td>6 Unit</td>
                            <td>April - Mei 2026</td>
                        </tr>

                        <tr>
                            <td>05</td>
                            <td>Infuse Pump</td>
                            <td>3 Unit</td>
                            <td>April - Mei 2026</td>
                        </tr>

                        <tr>
                            <td>06</td>
                            <td>Defibrillator</td>
                            <td>2 Unit</td>
                            <td>April - Mei 2026</td>
                        </tr>

                        <tr>
                            <td>07</td>
                            <td>Oximetri Monitor</td>
                            <td>1 Unit</td>
                            <td>April - Mei 2026</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <small style="color:#777;">
                Kirim penawaran via form atau WhatsApp <br>
                <b>Link: s.id/PengadaanAllamMedica</b>
            </small>

        </div>

        <!-- QR -->
        <div class="qr-card">
            <img src="{{ asset('images/pengadaan/qr.png') }}" alt="QR Code">

            <div class="qr-text">
                Atau scan QR di atas <br>
                untuk mengirimkan penawaran
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