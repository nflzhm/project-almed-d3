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
