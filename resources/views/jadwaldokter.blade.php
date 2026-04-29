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


    <!-- ================= JADWAL DOKTER FULL + SPESIALIS ================= -->
<style>

/* ================= BODY ================= */
body{
    font-family:'Segoe UI',sans-serif;
    padding-top:135px;
}

/* ================= TOP BAR ================= */
.topbar{
    background:#1C145C;
    position:fixed;
    top:0;
    width:100%;
    z-index:9999;
    height:40px;
    padding:2px 0;
}

/* ================= NAVBAR ================= */
.navbar-main{
    background:#fff;
    border-radius:0 0 20px 20px;
    box-shadow:0 4px 10px rgba(0,0,0,.1);
    position:fixed;
    top:40px;
    width:100%;
    z-index:9998;
}

.nav-gap{
    gap:18px;
}

/* ================= SECTION ================= */
.schedule-section{
    padding:25px 0 14px;
}

/* ================= FILTER BOX ================= */
.schedule-filter{
    background:#fff;
    border-radius:18px;
    padding:20px;
    box-shadow:0 6px 18px rgba(0,0,0,.08);
    margin-bottom:28px;
    border:1px solid #ececec;
}

/* ================= SEARCH ================= */
.search-wrap{
    display:flex;
    gap:10px;
    margin-bottom:14px;
}

.search-input{
    flex:1;
    height:44px;
    border:1px solid #ddd;
    border-radius:10px;
    padding:0 15px;
    font-size:13px;
}

.search-btn{
    background:#1C145C;
    color:#fff;
    border:none;
    border-radius:10px;
    padding:0 22px;
    font-size:14px;
    font-weight:600;
    height:44px;
    white-space:nowrap;
}

/* ================= FILTER ================= */
.filter-title{
    font-size:13px;
    font-weight:700;
    margin-bottom:8px;
    color:#1C145C;
}

.day-list{
    display:flex;
    gap:8px;
    flex-wrap:wrap;
}

.day-list a{
    text-decoration:none;
    background:#ececec;
    color:#555;
    padding:5px 16px;
    border-radius:30px;
    font-size:12px;
}

.day-list a.active{
    background:#1C145C;
    color:#fff;
}

/* ================= INFO ================= */
.schedule-info{
    font-size:14px;
    margin-bottom:15px;
    color:#222;
}

/* ================= BOX ================= */
.schedule-box{
    background:#fff;
    border-radius:18px;
    padding:18px;
    box-shadow:0 6px 18px rgba(0,0,0,.08);
    border:1px solid #ececec;
    margin-bottom:12px;
}

/* ================= GRID ================= */
.schedule-grid{
    display:grid;
    grid-template-columns:260px 1fr;
    gap:18px;
}

/* ================= LEFT CARD ================= */
.doctor-card{
    background:linear-gradient(135deg,#1C145C,#2d2391);
    border-radius:18px;
    padding:22px;
    color:#fff;
    text-align:center;
}

.doctor-card img{
    width:95px;
    height:95px;
    border-radius:50%;
    object-fit:cover;
    margin-bottom:14px;
    border:3px solid rgba(255,255,255,.25);
}

.doctor-name{
    font-size:14px;
    font-weight:700;
    line-height:1.5;
}

.doctor-specialist{
    font-size:12px;
    font-weight:500;
    color:rgba(255,255,255,.85);
    margin-top:6px;
    line-height:1.4;
}

/* ================= RIGHT ================= */
.practice-title{
    font-size:16px;
    font-weight:800;
    color:#1C145C;
    margin-bottom:15px;
}

.day-row{
    display:grid;
    grid-template-columns:repeat(7,1fr);
    gap:10px;
}

/* ================= CARD HARI ================= */
.day-col{
    background:#fff;
    border-radius:12px;
    overflow:hidden;
    border:1px solid #e7e7e7;
}

.day-head{
    background:#1C145C;
    color:#fff;
    font-size:13px;
    font-weight:700;
    text-align:center;
    padding:10px;
}

.day-body{
    padding:12px;
    text-align:center;
}

.clinic{
    font-size:12px;
    font-weight:600;
    color:#333;
    margin-bottom:8px;
    min-height:32px;
}

.time{
    font-size:14px;
    font-weight:800;
    color:#1C145C;
    margin-bottom:8px;
}

.note{
    font-size:11px;
    color:#777;
    line-height:1.5;
}

/* LIBUR */
.libur .clinic,
.libur .time,
.libur .note{
    color:#b5b5b5;
}

/* ================= DESKTOP DROPDOWN ================= */
@media (min-width:992px){

    .dropdown-menu{
        display:block;
        opacity:0;
        transform:translateY(10px);
        visibility:hidden;
        transition:all .3s ease;
        border-radius:12px;
        border:none;
        box-shadow:0 8px 20px rgba(0,0,0,.1);
        padding:10px 0;
    }

    .nav-item.dropdown:hover .dropdown-menu{
        opacity:1;
        transform:translateY(0);
        visibility:visible;
    }
}

/* ================= MOBILE ================= */
@media(max-width:991px){

    body{
        padding-top:145px;
    }

    .navbar-nav.nav-gap{
        gap:0 !important;
        width:100%;
    }

    .navbar-nav .nav-item{
        padding:0;
    }

    .navbar-nav .nav-link{
        padding:10px 0;
    }

    .dropdown-menu{
        position:static;
        display:block !important;
        max-height:0;
        overflow:hidden;
        opacity:0;
        visibility:hidden;
        transform:translateY(-5px);
        transition:all .35s ease;
        box-shadow:none;
        border:none;
        padding-left:15px;
    }

    .dropdown-menu.show{
        max-height:500px;
        opacity:1;
        visibility:visible;
        transform:translateY(0);
    }

    /* Card mobile */
    .schedule-box{
        padding:14px;
        margin-bottom:10px;
    }

    .schedule-grid{
        display:block;
    }

    .doctor-card{
        display:flex;
        align-items:center;
        gap:14px;
        text-align:left;
        padding:14px;
        border-radius:16px;
        position:relative;
        cursor:pointer;
    }

    .doctor-card img{
        width:68px;
        height:68px;
        margin:0;
        flex-shrink:0;
    }

    .doctor-name{
        font-size:13px;
        line-height:1.4;
        margin-bottom:4px;
    }

    .doctor-specialist{
        font-size:11px;
        margin-top:0;
    }

    .doctor-card::after{
        content:"▼";
        position:absolute;
        right:14px;
        top:50%;
        transform:translateY(-50%);
        font-size:12px;
        color:#fff;
        transition:.3s;
    }

    .schedule-box.active .doctor-card::after{
        transform:translateY(-50%) rotate(180deg);
    }

    .practice-area{
        display:none;
        margin-top:12px;
    }

    .schedule-box.active .practice-area{
        display:block;
    }

    .practice-title{
        font-size:14px;
        margin-bottom:10px;
    }

    .day-row{
        grid-template-columns:1fr;
        gap:8px;
    }

    .day-head{
        font-size:12px;
        padding:8px;
    }

    .day-body{
        padding:10px;
    }

    .clinic{
        min-height:auto;
        font-size:12px;
    }

    .time{
        font-size:13px;
    }

    .note{
        font-size:11px;
    }
}

/* ================= SMALL MOBILE ================= */
@media(max-width:576px){

    /* SEARCH tetap sejajar */
    .search-wrap{
        flex-direction:row;
        align-items:center;
        gap:8px;
    }

    .search-input{
        height:44px;
        font-size:13px;
    }

    .search-btn{
        height:44px;
        padding:0 16px;
        font-size:13px;
    }

    /* Filter hari diperkecil */
    .day-list{
        gap:6px;
    }

    .day-list a{
        padding:4px 10px;
        font-size:11px;
        border-radius:20px;
    }
}

</style>



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


<section class="schedule-section">
<div class="container">

    <!-- FILTER BOX -->
    <div class="schedule-filter">

        <div class="search-wrap">
            <input type="text" class="search-input" placeholder="cari nama dokter atau spesialisasi">

            <button class="search-btn">
                <i class="bi bi-search"></i> Cari
            </button>
        </div>

        <div class="filter-title">Filter Hari</div>

        <div class="day-list">
            <a href="#" class="active">Semua Hari</a>
            <a href="#">Senin</a>
            <a href="#">Selasa</a>
            <a href="#">Rabu</a>
            <a href="#">Kamis</a>
            <a href="#">Jumat</a>
            <a href="#">Sabtu</a>
        </div>

    </div>

    @foreach($dokter as $item)

<div class="schedule-box">
    <div class="schedule-grid">

        <!-- LEFT -->
        <div class="doctor-card">

            <img src="{{ asset('images/beranda/' . $item->foto) }}">

            <div>
                <div class="doctor-name">{{ $item->nama }}</div>
                <div class="doctor-specialist">{{ $item->sp }}</div>
            </div>

        </div>

        <!-- RIGHT -->
        <div class="practice-area">

            <div class="practice-title">JADWAL PRAKTEK</div>

            @php
                $jadwalList = explode("\n", trim($item->jadwal));
            @endphp

            @foreach($jadwalList as $jadwal)
                <div class="day-row">
                    <div class="day-body">
                        {{ $jadwal }}
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</div>

@endforeach


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.querySelectorAll('.doctor-card').forEach(function(card){

    card.addEventListener('click', function(){

        if(window.innerWidth <= 991){
            card.closest('.schedule-box').classList.toggle('active');
        }

    });

});
</script>
</div>
</section>

