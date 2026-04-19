<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>RSU Allam Medica - Layanan</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
                        <li><a class="dropdown-item" href="#">Pengadaan</a></li>
                        <li><a class="dropdown-item" href="#">Karir</a></li>
                        <li><a class="dropdown-item" href="#">Berita</a></li>
                        <li><a class="dropdown-item" href="#">Video</a></li>
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



<style>
/* ================= FIX NAVBAR SPACE ================= */
body{
    padding-top:80px; /* tinggi total navbar */
}

/* ================= FULL BANNER ================= */
.banner-download{
    position:relative;
    height:200px;
    width:100%;
    display:flex;
    align-items:center;
    color:#fff;
    overflow:hidden;
}


/* IMAGE */
.banner-download img{
    position:absolute;
    width:100%;
    height:100%;
    object-fit:cover;
    top:0;
    left:0;
    z-index:1;
}

/* GRADIENT */
.banner-overlay{
    position:absolute;
    width:100%;
    height:100%;
    background:linear-gradient(
        to right,
        rgba(28,20,92,0.85),
        rgba(28,20,92,0.6),
        rgba(28,20,92,0.2)
    );
    z-index:2;
}

/* CONTENT */
.banner-content{
    position:relative;
    z-index:3;
    padding-left:60px;
    max-width:1000px; /* 🔥 diperlebar */
}

/* TEXT */
.banner-title{
    font-size:24px;
    font-weight:700;
    margin-bottom:8px;
}

.banner-desc{
    font-size:13px;
    line-height:1.7;
    text-align:justify; /* 🔥 biar rata kiri kanan */
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
/* WRAPPER (LEBIH LEBAR) */
.download-wrapper{
    max-width:1300px; /* 🔥 lebih lebar dari sebelumnya */
    margin:auto;
}

/* CARD */
.download-card{
    display:flex;
    flex-direction:column;
    background:#fff;
    border-radius:14px;
    padding:16px;
    box-shadow:0 8px 20px rgba(0,0,0,0.05);
    transition:0.3s;
    height:100%;
}

.download-card:hover{
    transform:translateY(-4px);
}

/* HEADER */
.download-header{
    display:flex;
    align-items:center;
    gap:10px;
    margin-bottom:8px;
}

/* ICON */
.download-icon{
    width:36px;
    height:36px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:8px;
    background:rgba(25,135,84,0.1);
    color:#198754;
    font-size:16px;
}

/* TITLE */
.download-title{
    font-size:14px;
    font-weight:700;
}

/* SUBTITLE */
.download-subtitle{
    font-size:12px;
    font-weight:600;
    color:#1C145C;
    margin-bottom:4px;
}

/* DESC */
.download-desc{
    font-size:12px;
    color:#444;
    line-height:1.5;
}

/* LINE */
.download-line{
    height:1px;
    background:#eee;
    margin:10px 0;
}

/* INFO */
.download-info{
    font-size:11px;
    color:#888;
    line-height:1.5;
}

/* BUTTON */
.btn-download{
    margin-top:auto;
    background:#198754;
    color:#fff;
    border:none;
    border-radius:6px;
    padding:7px;
    font-size:12px;
    font-weight:600;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:5px;
}

.btn-download:hover{
    background:#157347;
}
</style>


<div class="container-fluid py-5 download-wrapper">
<div class="row g-3">

<!-- CARD 1 -->
<div class="col-lg-4 col-md-6">
<div class="download-card">
<div class="download-header">
<div class="download-icon"><i class="bi bi-file-earmark-text-fill"></i></div>
<div class="download-title">Kebutuhan Alat Kesehatan</div>
</div>
<div class="download-subtitle">Bulan April 2026 - Mei 2026</div>
<div class="download-desc">Surat Kebutuhan Alat Kesehatan RSU Allam Medica Bumiayu</div>
<div class="download-line"></div>
<div class="download-info"><i class="bi bi-clock"></i> Diunggah: 1 April 2026 <br> PDF 1,5 MB</div>
<button class="btn-download"><i class="bi bi-download"></i> Download</button>
</div>
</div>

<!-- CARD 2 -->
<div class="col-lg-4 col-md-6">
<div class="download-card">
<div class="download-header">
<div class="download-icon"><i class="bi bi-file-earmark-text-fill"></i></div>
<div class="download-title">Kebutuhan Obat Rumah Sakit</div>
</div>
<div class="download-subtitle">Bulan Mei 2026</div>
<div class="download-desc">Daftar kebutuhan obat RSU Allam Medica Bumiayu</div>
<div class="download-line"></div>
<div class="download-info"><i class="bi bi-clock"></i> Diunggah: 3 April 2026 <br> PDF 2,1 MB</div>
<button class="btn-download"><i class="bi bi-download"></i> Download</button>
</div>
</div>

<!-- CARD 3 -->
<div class="col-lg-4 col-md-6">
<div class="download-card">
<div class="download-header">
<div class="download-icon"><i class="bi bi-file-earmark-text-fill"></i></div>
<div class="download-title">Pengadaan Alat Laboratorium</div>
</div>
<div class="download-subtitle">Bulan Juni 2026</div>
<div class="download-desc">Dokumen pengadaan alat laboratorium terbaru</div>
<div class="download-line"></div>
<div class="download-info"><i class="bi bi-clock"></i> Diunggah: 5 April 2026 <br> PDF 1,8 MB</div>
<button class="btn-download"><i class="bi bi-download"></i> Download</button>
</div>
</div>

<!-- CARD 4 -->
<div class="col-lg-4 col-md-6">
<div class="download-card">
<div class="download-header">
<div class="download-icon"><i class="bi bi-file-earmark-text-fill"></i></div>
<div class="download-title">Pengadaan Alat Radiologi</div>
</div>
<div class="download-subtitle">Bulan Juni 2026</div>
<div class="download-desc">Dokumen kebutuhan alat radiologi RSU</div>
<div class="download-line"></div>
<div class="download-info"><i class="bi bi-clock"></i> Diunggah: 6 April 2026 <br> PDF 2,5 MB</div>
<button class="btn-download"><i class="bi bi-download"></i> Download</button>
</div>
</div>

<!-- CARD 5 -->
<div class="col-lg-4 col-md-6">
<div class="download-card">
<div class="download-header">
<div class="download-icon"><i class="bi bi-file-earmark-text-fill"></i></div>
<div class="download-title">Pengadaan ATK</div>
</div>
<div class="download-subtitle">Bulan April 2026</div>
<div class="download-desc">Daftar kebutuhan alat tulis kantor RSU</div>
<div class="download-line"></div>
<div class="download-info"><i class="bi bi-clock"></i> Diunggah: 7 April 2026 <br> PDF 900 KB</div>
<button class="btn-download"><i class="bi bi-download"></i> Download</button>
</div>
</div>

<!-- CARD 6 -->
<div class="col-lg-4 col-md-6">
<div class="download-card">
<div class="download-header">
<div class="download-icon"><i class="bi bi-file-earmark-text-fill"></i></div>
<div class="download-title">Pengadaan Peralatan IT</div>
</div>
<div class="download-subtitle">Bulan Mei 2026</div>
<div class="download-desc">Dokumen kebutuhan perangkat IT rumah sakit</div>
<div class="download-line"></div>
<div class="download-info"><i class="bi bi-clock"></i> Diunggah: 8 April 2026 <br> PDF 3,2 MB</div>
<button class="btn-download"><i class="bi bi-download"></i> Download</button>
</div>
</div>

<!-- CARD 7 -->
<div class="col-lg-4 col-md-6">
<div class="download-card">
<div class="download-header">
<div class="download-icon"><i class="bi bi-file-earmark-text-fill"></i></div>
<div class="download-title">Pengadaan Ambulance</div>
</div>
<div class="download-subtitle">Bulan Juli 2026</div>
<div class="download-desc">Rencana pengadaan kendaraan ambulance</div>
<div class="download-line"></div>
<div class="download-info"><i class="bi bi-clock"></i> Diunggah: 9 April 2026 <br> PDF 4,1 MB</div>
<button class="btn-download"><i class="bi bi-download"></i> Download</button>
</div>
</div>

<!-- CARD 8 -->
<div class="col-lg-4 col-md-6">
<div class="download-card">
<div class="download-header">
<div class="download-icon"><i class="bi bi-file-earmark-text-fill"></i></div>
<div class="download-title">Pengadaan Alat Operasi</div>
</div>
<div class="download-subtitle">Bulan Juni 2026</div>
<div class="download-desc">Daftar kebutuhan alat operasi rumah sakit</div>
<div class="download-line"></div>
<div class="download-info"><i class="bi bi-clock"></i> Diunggah: 10 April 2026 <br> PDF 2,7 MB</div>
<button class="btn-download"><i class="bi bi-download"></i> Download</button>
</div>
</div>

<!-- CARD 9 -->
<div class="col-lg-4 col-md-6">
<div class="download-card">
<div class="download-header">
<div class="download-icon"><i class="bi bi-file-earmark-text-fill"></i></div>
<div class="download-title">Pengadaan Peralatan ICU</div>
</div>
<div class="download-subtitle">Bulan Juli 2026</div>
<div class="download-desc">Dokumen kebutuhan peralatan ICU terbaru</div>
<div class="download-line"></div>
<div class="download-info"><i class="bi bi-clock"></i> Diunggah: 12 April 2026 <br> PDF 3,8 MB</div>
<button class="btn-download"><i class="bi bi-download"></i> Download</button>
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