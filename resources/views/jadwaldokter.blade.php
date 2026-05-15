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

body{
    font-family:'Segoe UI',sans-serif;
    padding-top:90px;
    background:#f5f7fb;
    overflow-x:hidden;
    background: #fff !important;
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
            <li class="nav-item"><a class="nav-link text-white p-1" href="https://www.tiktok.com/@rsuallammedicabumiayu?_t=8fLMQk9idhI&_r=1"><i class="bi bi-tiktok"></i></a></li>
            <li class="nav-item"><a class="nav-link text-white p-1" href="https://www.facebook.com/allam.medicabmy?mibextid=LQQJ4d"><i class="bi bi-facebook"></i></a></li>
            <li class="nav-item"><a class="nav-link text-white p-1" href="https://www.instagram.com/allam.medica/"><i class="bi bi-instagram"></i></a></li>
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

<section class="schedule-section">
<div class="container">

    <!-- FILTER BOX -->
<div class="schedule-filter">

    <form action="{{ url('/jadwaldokter') }}" method="GET">

        <div class="search-wrap">

            {{-- supaya filter hari tidak hilang saat search --}}
            @if(request('hari'))
                <input type="hidden" name="hari" value="{{ request('hari') }}">
            @endif

            <input
                type="text"
                name="search"
                class="search-input"
                placeholder="Cari nama dokter atau spesialisasi"
                value="{{ request('search') }}"
            >

            <button type="submit" class="search-btn">
                <i class="bi bi-search"></i> Cari
            </button>

        </div>

    </form>

    <div class="filter-title">Filter Hari</div>

    <div class="day-list">

        <a href="{{ url('/jadwaldokter') }}"
           class="{{ request('hari') ? '' : 'active' }}">
            Semua Hari
        </a>

        <a href="{{ url('/jadwaldokter?hari=Senin&search='.request('search')) }}"
           class="{{ request('hari') == 'Senin' ? 'active' : '' }}">
            Senin
        </a>

        <a href="{{ url('/jadwaldokter?hari=Selasa&search='.request('search')) }}"
           class="{{ request('hari') == 'Selasa' ? 'active' : '' }}">
            Selasa
        </a>

        <a href="{{ url('/jadwaldokter?hari=Rabu&search='.request('search')) }}"
           class="{{ request('hari') == 'Rabu' ? 'active' : '' }}">
            Rabu
        </a>

        <a href="{{ url('/jadwaldokter?hari=Kamis&search='.request('search')) }}"
           class="{{ request('hari') == 'Kamis' ? 'active' : '' }}">
            Kamis
        </a>

        <a href="{{ url('/jadwaldokter?hari=Jumat&search='.request('search')) }}"
           class="{{ request('hari') == 'Jumat' ? 'active' : '' }}">
            Jumat
        </a>

        <a href="{{ url('/jadwaldokter?hari=Sabtu&search='.request('search')) }}"
           class="{{ request('hari') == 'Sabtu' ? 'active' : '' }}">
            Sabtu
        </a>

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
                <div class="doctor-specialist">{{ $item->spesialis }}</div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="practice-area">
            <div class="practice-title">JADWAL PRAKTEK</div>

            @php
                $hariList = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];

                $jadwalGrouped = $item->jadwal->groupBy(function ($j) {
                    return ucfirst(strtolower(trim($j->hari)));
                });
            @endphp

            <div class="day-row">
                @foreach($hariList as $h)

                    @php
                        $jadwal = $jadwalGrouped[$h][0] ?? null;
                    @endphp

                    <div class="day-col {{ !$jadwal ? 'libur' : '' }}">

                        <div class="day-head">{{ $h }}</div>

                        <div class="day-body">
                            @if($jadwal)
                                <div class="clinic">{{ $jadwal->klinik }}</div>
                                <div class="time">{{ $jadwal->jam }}</div>
                                <div class="note">{{ $jadwal->note ?? '-' }}</div>
                            @else
                                <div class="clinic">-</div>
                                <div class="time">Libur</div>
                            @endif
                        </div>

                    </div>

                @endforeach
            </div>

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

<style>
/* ================= FOOTER ================= */
.footer-rsu{
    background:#fff;
    color:#000;
    padding:50px 0 20px;
    border-top:1px solid #eee;
}

.footer-rsu .container-fluid{
    max-width:1350px;
}

.footer-rsu .footer-logo{
    height:50px;
    margin-bottom:12px;
}

.footer-rsu .footer-title{
    font-size:18px;
    font-weight:700;
    margin-bottom:10px;
    color:#111;
}

.footer-rsu .footer-desc{
    font-size:13px;
    line-height:1.7;
    color:#666;
    margin-bottom:15px;
    max-width:320px;
}

.footer-rsu .footer-heading{
    font-size:16px;
    font-weight:700;
    margin-bottom:18px;
    color:#111;
}

.footer-rsu ul{
    list-style:none;
    padding:0;
    margin:0;
}

.footer-rsu ul li{
    margin-bottom:10px;
    font-size:13px;
}

.footer-rsu a{
    color:#666;
    text-decoration:none;
    transition:.2s ease;
}

.footer-rsu a:hover{
    color:#1C145C;
    padding-left:3px;
}

/* ================= SOSIAL ================= */
.footer-rsu .footer-social{
    display:flex;
    gap:14px;
    margin-bottom:18px;
}

.footer-rsu .footer-social i{
    font-size:18px;
    color:#666;
    transition:.2s ease;
    cursor:pointer;
}

.footer-rsu .footer-social i:hover{
    color:#1C145C;
    transform:translateY(-2px);
}

/* ================= MITRA ================= */
.footer-rsu .footer-mitra{
    display:flex;
    gap:12px;
    align-items:center;
    margin-top:10px;
    flex-wrap:wrap;
}

.footer-rsu .footer-mitra img:nth-child(1){
    height:35px;
}

.footer-rsu .footer-mitra img:nth-child(2){
    height:25px;
}

/* ================= CONTACT ================= */
.footer-rsu .footer-contact p{
    color:#666;
    font-size:13px;
    margin-bottom:14px;
    line-height:1.7;
    display:flex;
    align-items:flex-start;
    gap:10px;
}

.footer-rsu hr{
    border-color:#ddd;
    margin:25px 0 15px;
}

.footer-rsu .footer-copy{
    font-size:13px;
    color:#666;
}

/* ================= DESKTOP SPACING ================= */
.footer-rsu .footer-links{
    padding-left:20px;
}

.footer-rsu .footer-contact{
    padding-left:0;
    margin-left:-40px;
}

/* ================= TABLET ================= */
@media (max-width: 991px){

    .footer-rsu{
        padding:45px 0 20px;
    }

    .footer-rsu .row > div{
        margin-bottom:30px;
    }

    .footer-rsu .footer-title{
        font-size:17px;
    }

    .footer-rsu .footer-heading{
        font-size:15px;
    }

    .footer-rsu .footer-desc{
        max-width:100%;
    }

    .footer-rsu .footer-contact{
        margin-left:0;
    }

    .footer-rsu .footer-links{
        padding-left:0;
    }
}

/* ================= MOBILE ================= */
@media (max-width: 767px){

    .footer-rsu{
        text-align:left;
        padding:40px 0 20px;
    }

    .footer-rsu .container-fluid{
        padding-left:20px !important;
        padding-right:20px !important;
    }

    .footer-rsu .row{
        gap:5px;
    }

    .footer-rsu .footer-social{
        justify-content:flex-start;
    }

    .footer-rsu .footer-mitra{
        justify-content:flex-start;
    }

    .footer-rsu .footer-contact p{
        justify-content:flex-start;
        text-align:left;
    }

    .footer-rsu .footer-copy{
        text-align:left;
    }

    .footer-rsu .footer-desc{
        margin-left:0;
        margin-right:0;
    }

    .footer-rsu .footer-contact{
        margin-left:0;
    }

    .footer-rsu a:hover{
        padding-left:0;
    }
}
</style>

<!-- FOOTER -->
<footer class="footer-rsu">

    <div class="container-fluid px-lg-5 px-4">

        <div class="row justify-content-between">

            <!-- LOGO -->
            <div class="col-lg-4 col-md-6">

                <img src="{{ asset('images/beranda/logo-almed.png') }}"
                     class="footer-logo">

                <h5 class="footer-title">RSU Allam Medica Bumiayu</h5>

                <p class="footer-desc">
                    Jl. Pangeran Diponegoro No. 609, Jatisawit, Bumiayu,
                    Kabupaten Brebes, Jawa Tengah 52273
                </p>

                <!-- SOSIAL -->
                <div class="footer-social">
    
                    <a href="https://www.tiktok.com/@rsuallammedicabumiayu?_t=8fLMQk9idhI&_r=1" target="_blank">
                        <i class="bi bi-tiktok"></i>
                    </a>

                    <a href="https://www.facebook.com/allam.medicabmy?mibextid=LQQJ4d" target="_blank">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a href="https://www.instagram.com/allam.medica/" target="_blank">
                        <i class="bi bi-instagram"></i>
                    </a>

                </div>

                <!-- MITRA -->
                <small style="color:#666;">Akreditasi & Mitra</small>

                <div class="footer-mitra">
                    <img src="{{ asset('images/beranda/paripurna.png') }}">
                    <img src="{{ asset('images/beranda/bpjs.png') }}">
                </div>

            </div>

            <!-- TAUTAN -->
            <div class="col-lg-2 col-md-6 footer-links">

                <h6 class="footer-heading">Tautan Cepat</h6>

                <ul>
                    <li><a href="beranda">Beranda</a></li>
                    <li><a href="layanan">Layanan</a></li>
                    <li><a href="artikel">Artikel</a></li>
                    <li><a href="download">Download</a></li>
                    <li><a href="tentang">Tentang Kami</a></li>
                    <li><a href="kontak">Kontak</a></li>
                </ul>

            </div>

            <!-- MENU -->
            <div class="col-lg-2 col-md-6 footer-links">

                <h6 class="footer-heading">Menu</h6>

                <ul>
                    <li><a href="video">Video</a></li>
                    <li><a href="karir">Karir</a></li>
                    <li><a href="berita">Berita</a></li>
                </ul>

            </div>

            <!-- HUBUNGI -->
            <div class="col-lg-4 col-md-12 footer-contact">

                <h6 class="footer-heading">Hubungi Kami</h6>

                <p>
                    <i class="bi bi-telephone-fill"></i>
                    <span>(0289) 430822</span>
                </p>

                <p>
                    <i class="bi bi-envelope-fill"></i>
                    <span>allam.medica@yahoo.co.id</span>
                </p>

                <p>
                    <i class="bi bi-clock-fill"></i>
                    <span>IGD: 24 Jam | Rawat Jalan: Sen - Sab 07.00 – 21.00</span>
                </p>

                <p>
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>Jl. Pangeran Diponegoro No.609, Bumiayu, Brebes</span>
                </p>

            </div>

        </div>

        <hr>

        <div class="footer-copy">
            © 2026 RSU Allam Medica. Hak Cipta Dilindungi.
        </div>

    </div>

</footer>