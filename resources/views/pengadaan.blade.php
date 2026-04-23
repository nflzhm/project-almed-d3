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


<!-- ================= PENGADAAN HEADER ================= -->
<style>
.pengadaan-section{
    padding:60px 0 40px;
}
body{
    padding-top:100px;
}

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
    background:rgba(28, 20, 92, 0.05);
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    text-align:center;
    transition:0.3s;
}

.stat-card:hover{
    transform:translateY(-5px);
    background:rgba(28, 20, 92, 0.1);
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
</style>

<section class="pengadaan-section">
<div class="container">

    <!-- WRAPPER BIAR SEJAJAR -->
    <div class="text-start" style="max-width:600px;">

        <!-- TEXT -->
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



<Style>
.alert-urgent{
    background:#ffe5e5;
    border:1px solid #ff4d4d;
    color:#b30000;
    border-radius:12px;
    padding:15px 20px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-top:30px;
}

.alert-urgent strong{
    display:block;
    font-size:14px;
}

.badge-urgent{
    background:#ff1a1a;
    color:#fff;
    padding:6px 14px;
    border-radius:20px;
    font-size:12px;
    font-weight:600;
}

/* ================= TABLE CARD ================= */
.pengadaan-wrapper{
    display:flex;
    gap:20px;
    margin-top:25px;
    flex-wrap:wrap;
}

.pengadaan-table-card{
    flex:2;
    background:#f9f9f9;
    border-radius:16px;
    padding:20px;
    box-shadow:0 5px 15px rgba(0,0,0,0.05);
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
}

/* TABLE */
.table-custom th{
    font-size:12px;
    color:#666;
}

.table-custom td{
    font-size:13px;
}

/* ================= QR CARD ================= */
.qr-card{
    flex:1;
    background:#fff;
    border-radius:16px;
    padding:20px;
    text-align:center;
    box-shadow:0 5px 15px rgba(0,0,0,0.08);
}

.qr-card img{
    width:100%;
    max-width:400px;
}

.qr-text{
    font-size:12px;
    color:#555;
    margin-top:10px;
}
</Style>



<div class="container">

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

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <div class="pengadaan-title">Daftar Kebutuhan Alat Kesehatan</div>
                    <div class="pengadaan-sub">Periode April – Mei 2026</div>
                </div>
                <div class="badge-total">7 Item • 29 Unit</div>
            </div>

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
                    <tr><td>01</td><td>Bedside Monitor</td><td>8 Unit</td><td>April - Mei 2026</td></tr>
                    <tr><td>02</td><td>Vein Viewer</td><td>1 Unit</td><td>April - Mei 2026</td></tr>
                    <tr><td>03</td><td>Bed 3 Crank</td><td>7 Unit</td><td>April - Mei 2026</td></tr>
                    <tr><td>04</td><td>Syringe Pump</td><td>6 Unit</td><td>April - Mei 2026</td></tr>
                    <tr><td>05</td><td>Infuse Pump</td><td>3 Unit</td><td>April - Mei 2026</td></tr>
                    <tr><td>06</td><td>Defibrillator</td><td>2 Unit</td><td>April - Mei 2026</td></tr>
                    <tr><td>07</td><td>Oximetri Monitor</td><td>1 Unit</td><td>April - Mei 2026</td></tr>
                </tbody>
            </table>

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