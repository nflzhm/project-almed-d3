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

/* ================= NAVBAR SPACE ================= */
body{
    padding-top:100px;
}

/* ================= HEADER ================= */
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

/* ================= SEARCH ================= */
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

/* ================= CARD ================= */
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

/* IMAGE FIX (ANTI KEPOTONG) */
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

/* CONTENT */
.layanan-content{
    padding:20px;
    display:flex;
    flex-direction:column;
    height:100%;
}

/* TEXT */
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
    font-size:12px;
    margin-top:auto; /* bikin selalu ke bawah */
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
<div class="col-md-6 d-flex">
<div class="layanan-card w-100">
<div class="row g-0 h-100">

<div class="col-md-5">
<div class="layanan-img-wrapper">
<img src="{{ asset('images/layanan/jantung.png') }}" class="layanan-img">
</div>
</div>

<div class="col-md-7 d-flex">
<div class="layanan-content">

<div class="layanan-card-title">
OPEN RECRUITMENT CSSD
</div>



<div class="layanan-text">
RSU Allam Medica Bumiayu membuka kesempatan bagi tenaga profesional yang kompeten, berdedikasi, dan memiliki semangat kerja tinggi untuk bergabung bersama kami sebagai staf CSSD, guna mendukung pelayanan kesehatan yang optimal dan berkualitas.
</div>

<!-- BUTTON -->
            <div class="layanan-contact">
                <a href="#" class="btn btn-danger btn-sm">
                    Lamar Sekarang
                </a>
            </div>

</div>
</div>

</body>
</html>