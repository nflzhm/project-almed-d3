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
    <link href="https://fonts.cdnfonts.com/css/gotham" rel="stylesheet">
</head>

<body>
<script>
document.addEventListener('DOMContentLoaded', function () {

    let currentItems = 12;

    const items = document.querySelectorAll('.dokter-item');
    const btn = document.getElementById('loadMoreDokter');

    if(btn){

        btn.addEventListener('click', function(){

            for(let i = currentItems; i < currentItems + 9; i++){

                if(items[i]){
                    items[i].style.display = 'block';
                }

            }

            currentItems += 9;

            if(currentItems >= items.length){
                btn.style.display = 'none';
            }

        });

    }

});
</script>

<style>
@font-face {
    font-family: 'GothamBlack';
    src: url('{{ asset('fonts/Gotham-Black.otf') }}') format('opentype');
    font-weight: 900;
    font-style: normal;
}

h1, h2, h3, h4 {
    font-family: 'GothamBlack', sans-serif !important;
}

/* ========================================
   BASE
======================================== */
body {
    font-family: 'Segoe UI', sans-serif;
    background: #f5f7fb;
    overflow-x: hidden;
    padding-top: calc(38px + 70px);
}

/* ============================================================
   TOPBAR
============================================================ */
.topbar { background: linear-gradient(90deg,#1C145C 0%,#34258d 50%,#1C145C 100%); position:fixed; top:0;left:0;width:100%;height:38px;z-index:10000;display:flex;align-items:center; }
.topbar .container { display:flex;align-items:center;justify-content:space-between; }
.topbar-info { display:flex;align-items:center;gap:14px; }
.topbar-info span { color:rgba(255,255,255,.88);font-size:12px;display:flex;align-items:center;gap:6px;white-space:nowrap; }
.topbar-social { display:flex;align-items:center;gap:12px; }
.topbar-social a { color:rgba(255,255,255,.75);font-size:14px;text-decoration:none;transition:.2s; }
.topbar-social a:hover { color:#fff; }
@media(max-width:991px) { .topbar-info span { font-size:10px; } .topbar-social { gap:10px; } }
@media(max-width:480px) { .topbar-info span { font-size:9px; } }

/* ============================================================
   NAVBAR
============================================================ */
.navbar-float-wrap { position:fixed;top:38px;left:0;width:100%;z-index:9998;padding:12px 20px; }
.navbar-float { max-width:1200px;margin:0 auto;position:relative;display:flex;align-items:center;justify-content:space-between;gap:10px;padding:10px 14px 10px 22px;border-radius:60px;background:rgba(255,255,255,0.07);backdrop-filter:blur(22px) saturate(180%);-webkit-backdrop-filter:blur(22px) saturate(180%);border:1px solid rgba(255,255,255,0.16);box-shadow:0 8px 32px rgba(15,23,42,.08),inset 0 1px 0 rgba(255,255,255,.22);transition:background .3s,border .3s,box-shadow .3s; }
.navbar-float.scrolled { background:rgba(255,255,255,.14);border:1px solid rgba(255,255,255,.22);box-shadow:0 10px 40px rgba(15,23,42,.10),inset 0 1px 0 rgba(255,255,255,.28); }
.navbar-float::before { content:"";position:absolute;inset:0;border-radius:inherit;background:linear-gradient(180deg,rgba(255,255,255,.20),rgba(255,255,255,.02));pointer-events:none; }
.nav-logo { position:relative;z-index:2; }
.navbar-float .nav-logo img { height:38px;object-fit:contain;display:block; }
.nav-links { display:flex;align-items:center;justify-content:center;flex:1;gap:2px;position:relative;z-index:2; }
.nav-link-pill { padding:8px 15px;border-radius:50px;font-size:14px;font-weight:500;color:#0f172a;text-decoration:none;white-space:nowrap;display:inline-flex;align-items:center;gap:4px;transition:background .2s,color .2s,transform .2s; }
.nav-link-pill:hover { background:rgba(255,255,255,.25);color:#1C145C;transform:translateY(-1px); }
.nav-link-pill.active { background:rgba(255,255,255,.35);color:#1C145C;font-weight:600; }
.drop-wrap { position:relative; }
.drop-menu { position:absolute;top:calc(100% + 12px);left:50%;transform:translateX(-50%) translateY(8px);min-width:200px;padding:8px;border-radius:22px;background:rgba(255,255,255,.92);backdrop-filter:blur(24px);border:1px solid rgba(255,255,255,.35);box-shadow:0 12px 35px rgba(15,23,42,.14);opacity:0;visibility:hidden;transition:.22s;z-index:100; }
.drop-wrap:hover .drop-menu { opacity:1;visibility:visible;transform:translateX(-50%) translateY(0); }
.drop-item { display:flex;align-items:center;gap:9px;padding:9px 13px;border-radius:12px;font-size:13.5px;color:#334155;text-decoration:none;transition:.18s;font-weight:500; }
.drop-item:hover { background:rgba(28,20,92,.07);color:#1C145C; }
.drop-item i { font-size:14px;color:#64748b;flex-shrink:0; }
.drop-item:hover i { color:#1C145C; }
.drop-divider { height:1px;background:rgba(0,0,0,.07);margin:4px 8px; }
.chevron { font-size:11px;opacity:.6;transition:.25s; }
.drop-wrap:hover .chevron { transform:rotate(180deg); }
.nav-cta { position:relative;z-index:2; }
.btn-kontak { padding:10px 22px;border-radius:50px;background:#1C145C;color:#fff!important;text-decoration:none!important;font-size:14px;font-weight:600;display:inline-block;border:none;box-shadow:0 8px 20px rgba(28,20,92,.25);transition:.2s; }
.btn-kontak:hover { background:#2a1e8a;transform:translateY(-1px); }
.nav-burger { display:none;flex-direction:column;gap:5px;cursor:pointer;border:none;background:transparent;padding:6px;position:relative;z-index:2; }
.nav-burger span { width:22px;height:2px;background:#1C145C;border-radius:2px;display:block;transition:.3s; }
.nav-burger.open span:nth-child(1) { transform:translateY(7px) rotate(45deg); }
.nav-burger.open span:nth-child(2) { opacity:0; }
.nav-burger.open span:nth-child(3) { transform:translateY(-7px) rotate(-45deg); }

/* DRAWER (MOBILE) */
.nav-overlay { display:none;position:fixed;inset:0;background:rgba(15,23,42,0);z-index:9999990;transition:background .3s; }
.nav-overlay.show { display:block;background:rgba(15,23,42,0.42); }
.nav-drawer { position:fixed;top:0;right:0;width:72%;max-width:300px;height:100dvh;z-index:9999995;transform:translateX(100%);transition:transform .32s cubic-bezier(.4,0,.2,1);background:rgba(255,255,255,0.97);backdrop-filter:blur(24px) saturate(180%);border-left:1px solid rgba(255,255,255,0.45);box-shadow:-8px 0 32px rgba(15,23,42,.12);display:flex;flex-direction:column;overflow-y:auto;overscroll-behavior:contain; }
.nav-drawer.open { transform:translateX(0); }
.drawer-header { display:flex;align-items:center;justify-content:space-between;padding:20px 16px 14px;border-bottom:1px solid rgba(0,0,0,.07);flex-shrink:0; }
.drawer-label { font-size:11px;font-weight:700;color:#94a3b8;letter-spacing:.8px;text-transform:uppercase; }
.drawer-close-btn { width:30px;height:30px;border-radius:50%;background:rgba(28,20,92,.08);border:none;display:flex;align-items:center;justify-content:center;color:#1C145C;cursor:pointer;font-size:14px; }
.drawer-nav { flex:1;padding:8px 10px;display:flex;flex-direction:column;gap:1px;overflow-y:auto; }
.d-link { display:flex;align-items:center;gap:10px;padding:10px 12px;border-radius:12px;font-size:14px;font-weight:500;color:#1e293b;text-decoration:none;transition:.16s; }
.d-link:hover { background:rgba(28,20,92,.06);color:#1C145C; }
.d-link.active { background:rgba(28,20,92,.09);color:#1C145C;font-weight:600; }
.d-icon { width:22px;height:22px;display:flex;align-items:center;justify-content:center;font-size:14px;color:#64748b;flex-shrink:0; }
.d-link.active .d-icon { color:#1C145C; }
.d-divider { height:1px;background:rgba(0,0,0,.07);margin:4px 2px; }
.drawer-footer { padding:12px 14px 24px;border-top:1px solid rgba(0,0,0,.07);flex-shrink:0; }
.drawer-footer .btn-kontak { border-radius:14px;display:block;text-align:center;padding:12px 22px; }
.d-accordion-btn { display:flex;align-items:center;justify-content:space-between;gap:8px;padding:10px 12px;border-radius:12px;font-size:14px;font-weight:600;color:#1e293b;cursor:pointer;background:none;border:none;width:100%;font-family:'Plus Jakarta Sans',sans-serif;transition:.16s; }
.d-accordion-btn:hover { background:rgba(28,20,92,.06);color:#1C145C; }
.d-accordion-btn.active-parent { color:#1C145C; }
.d-accordion-btn .d-acc-left { display:flex;align-items:center;gap:10px; }
.d-accordion-chevron { font-size:11px;color:#94a3b8;transition:transform .25s;flex-shrink:0; }
.d-accordion-btn.open .d-accordion-chevron { transform:rotate(180deg); }
.d-accordion-body { display:none;padding:2px 0 4px 12px; }
.d-accordion-body.open { display:block; }
.d-sub-link { display:flex;align-items:center;gap:9px;padding:8px 12px;border-radius:10px;font-size:13.5px;font-weight:500;color:#475569;text-decoration:none;transition:.16s; }
.d-sub-link:hover { background:rgba(28,20,92,.06);color:#1C145C; }
.d-sub-link i { font-size:13px;color:#94a3b8;flex-shrink:0;width:16px;text-align:center; }
.d-sub-link:hover i { color:#1C145C; }

@media(max-width:1100px) { .nav-link-pill{padding:7px 11px;font-size:13px;} }
@media(max-width:991px) {
    body { padding-top: calc(38px + 64px); }
    .navbar-float-wrap { top:38px;padding:4px 12px; }
    .navbar-float { border-radius:26px;padding:8px 14px; }
    .nav-links,.nav-cta { display:none; }
    .nav-burger { display:flex; }
}
@media(max-width:480px) { .navbar-float { border-radius:22px; } }
</style>


<!-- ============================================================
     TOPBAR
============================================================ -->
<div class="topbar">
    <div class="container">
        <div class="topbar-info">
            <span><i class="bi bi-telephone-fill"></i> 085292224886</span>
            <span><i class="bi bi-envelope-fill"></i> allam.medica@yahoo.co.id</span>
        </div>
        <div class="topbar-social">
            <a href="https://www.tiktok.com/@rsuallammedicabumiayu?_t=8fLMQk9idhI&_r=1" target="_blank"><i class="bi bi-tiktok"></i></a>
            <a href="https://www.facebook.com/allam.medicabmy?mibextid=LQQJ4d" target="_blank"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/allam.medica/" target="_blank"><i class="bi bi-instagram"></i></a>
        </div>
    </div>
</div>


<!-- ============================================================
     NAVBAR
============================================================ -->
<div class="navbar-float-wrap">
    <nav class="navbar-float" id="mainNavbar">
        <a href="/" class="nav-logo">
            <img src="{{ asset('images/beranda/logo-almed.png') }}" alt="RSU Allam Medica">
        </a>
        <div class="nav-links">
            <a href="/" class="nav-link-pill {{ request()->is('/') ? 'active' : '' }}">Beranda</a>
            <div class="drop-wrap">
                <a href="#" class="nav-link-pill {{ request()->is('karir*','berita*','video*') ? 'active' : '' }}">
                    Menu <i class="bi bi-chevron-down chevron"></i>
                </a>
                <div class="drop-menu">
                    <a href="{{ url('/karir') }}"  class="drop-item"><i class="bi bi-briefcase"></i> Karir</a>
                    <a href="{{ url('/berita') }}" class="drop-item"><i class="bi bi-newspaper"></i> Berita</a>
                    <a href="{{ url('/video') }}"  class="drop-item"><i class="bi bi-play-circle"></i> Video</a>
                </div>
            </div>
            <div class="drop-wrap">
                <a href="/layanan" class="nav-link-pill {{ request()->is('layanan*') ? 'active' : '' }}">
                    Layanan <i class="bi bi-chevron-down chevron"></i>
                </a>
                <div class="drop-menu" style="min-width:220px;">
                    <a href="{{ url('/layanan') }}" class="drop-item"><i class="bi bi-grid-3x3-gap"></i> Semua Layanan</a>
                    <div class="drop-divider"></div>
                    <a href="{{ url('/layanan#igd') }}"          class="drop-item"><i class="bi bi-bandaid-fill"></i> IGD 24 Jam</a>
                    <a href="{{ url('/layanan#rawatjalan') }}"   class="drop-item"><i class="bi bi-clipboard2-pulse"></i> Rawat Jalan</a>
                    <a href="{{ url('/layanan#rawatinap') }}"    class="drop-item"><i class="bi bi-hospital"></i> Rawat Inap</a>
                    <a href="{{ url('/layanan#ambulans') }}"     class="drop-item"><i class="bi bi-truck"></i> Ambulans</a>
                    <a href="{{ url('/layanan#laboratorium') }}" class="drop-item"><i class="bi bi-eyedropper"></i> Laboratorium</a>
                    <a href="{{ url('/layanan#radiologi') }}"    class="drop-item"><i class="bi bi-radioactive"></i> Radiologi</a>
                    <a href="{{ url('/layanan#farmasi') }}"      class="drop-item"><i class="bi bi-capsule"></i> Farmasi</a>
                    <a href="{{ url('/layanan#mcu') }}"          class="drop-item"><i class="bi bi-heart-pulse"></i> Medical Check Up</a>
                </div>
            </div>
            <a href="/artikel"  class="nav-link-pill {{ request()->is('artikel*')  ? 'active' : '' }}">Artikel</a>
            <a href="/download" class="nav-link-pill {{ request()->is('download*') ? 'active' : '' }}">Download</a>
            <a href="/tentang"  class="nav-link-pill {{ request()->is('tentang*')  ? 'active' : '' }}">Tentang Kami</a>
            <a href="/mutu"     class="nav-link-pill {{ request()->is('mutu*')     ? 'active' : '' }}">Mutu</a>
        </div>
        <div class="nav-cta"><a href="/kontak" class="btn-kontak">Kontak</a></div>
        <button class="nav-burger" id="navBurger"><span></span><span></span><span></span></button>
    </nav>
</div>

<div class="nav-overlay" id="navOverlay"></div>
<aside class="nav-drawer" id="navDrawer">
    <div class="drawer-header">
        <span class="drawer-label">Menu</span>
        <button class="drawer-close-btn" id="drawerClose"><i class="bi bi-x-lg"></i></button>
    </div>
    <nav class="drawer-nav">
        <a href="/" class="d-link {{ request()->is('/') ? 'active' : '' }}">
            <span class="d-icon"><i class="bi bi-house"></i></span> Beranda
        </a>
        <button class="d-accordion-btn {{ request()->is('karir*','berita*','video*') ? 'active-parent' : '' }}" data-target="acc-menu">
            <span class="d-acc-left"><span class="d-icon"><i class="bi bi-grid"></i></span> Menu</span>
            <i class="bi bi-chevron-down d-accordion-chevron"></i>
        </button>
        <div class="d-accordion-body {{ request()->is('karir*','berita*','video*') ? 'open' : '' }}" id="acc-menu">
            <a href="{{ url('/karir') }}"  class="d-sub-link"><i class="bi bi-briefcase"></i> Karir</a>
            <a href="{{ url('/berita') }}" class="d-sub-link"><i class="bi bi-newspaper"></i> Berita</a>
            <a href="{{ url('/video') }}"  class="d-sub-link"><i class="bi bi-play-circle"></i> Video</a>
        </div>
        <div class="d-divider"></div>
        <button class="d-accordion-btn {{ request()->is('layanan*') ? 'active-parent' : '' }}" data-target="acc-layanan">
            <span class="d-acc-left"><span class="d-icon"><i class="bi bi-hospital"></i></span> Layanan</span>
            <i class="bi bi-chevron-down d-accordion-chevron"></i>
        </button>
        <div class="d-accordion-body {{ request()->is('layanan*') ? 'open' : '' }}" id="acc-layanan">
            <a href="{{ url('/layanan') }}"              class="d-sub-link"><i class="bi bi-grid-3x3-gap"></i> Semua Layanan</a>
            <a href="{{ url('/layanan#igd') }}"          class="d-sub-link"><i class="bi bi-bandaid-fill"></i> IGD 24 Jam</a>
            <a href="{{ url('/layanan#rawatjalan') }}"   class="d-sub-link"><i class="bi bi-clipboard2-pulse"></i> Rawat Jalan</a>
            <a href="{{ url('/layanan#rawatinap') }}"    class="d-sub-link"><i class="bi bi-hospital"></i> Rawat Inap</a>
            <a href="{{ url('/layanan#ambulans') }}"     class="d-sub-link"><i class="bi bi-truck"></i> Ambulans 24 Jam</a>
            <a href="{{ url('/layanan#laboratorium') }}" class="d-sub-link"><i class="bi bi-eyedropper"></i> Laboratorium</a>
            <a href="{{ url('/layanan#radiologi') }}"    class="d-sub-link"><i class="bi bi-radioactive"></i> Radiologi</a>
            <a href="{{ url('/layanan#farmasi') }}"      class="d-sub-link"><i class="bi bi-capsule"></i> Farmasi</a>
            <a href="{{ url('/layanan#mcu') }}"          class="d-sub-link"><i class="bi bi-heart-pulse"></i> Medical Check Up</a>
        </div>
        <div class="d-divider"></div>
        <a href="/artikel"  class="d-link {{ request()->is('artikel*')  ? 'active' : '' }}"><span class="d-icon"><i class="bi bi-journal-text"></i></span> Artikel</a>
        <a href="/download" class="d-link {{ request()->is('download*') ? 'active' : '' }}"><span class="d-icon"><i class="bi bi-download"></i></span> Download</a>
        <a href="/tentang"  class="d-link {{ request()->is('tentang*')  ? 'active' : '' }}"><span class="d-icon"><i class="bi bi-info-circle"></i></span> Tentang Kami</a>
        <a href="/mutu"     class="d-link {{ request()->is('mutu*')     ? 'active' : '' }}"><span class="d-icon"><i class="bi bi-patch-check"></i></span> Mutu</a>
    </nav>
    <div class="drawer-footer"><a href="/kontak" class="btn-kontak">Kontak</a></div>
</aside>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const burger  = document.getElementById('navBurger');
    const drawer  = document.getElementById('navDrawer');
    const overlay = document.getElementById('navOverlay');
    const closeBtn= document.getElementById('drawerClose');
    const navbar  = document.getElementById('mainNavbar');

    function openDrawer()  { burger.classList.add('open');drawer.classList.add('open');overlay.classList.add('show');document.body.style.overflow='hidden'; }
    function closeDrawer() { burger.classList.remove('open');drawer.classList.remove('open');overlay.classList.remove('show');document.body.style.overflow=''; }

    burger.addEventListener('click', e => { e.stopPropagation(); drawer.classList.contains('open') ? closeDrawer() : openDrawer(); });
    closeBtn.addEventListener('click', closeDrawer);
    overlay.addEventListener('click', closeDrawer);
    drawer.querySelectorAll('.d-link, .d-sub-link').forEach(l => l.addEventListener('click', closeDrawer));

    drawer.querySelectorAll('.d-accordion-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const targetId = this.dataset.target;
            const body = document.getElementById(targetId);
            const isOpen = body.classList.contains('open');
            drawer.querySelectorAll('.d-accordion-body').forEach(b => b.classList.remove('open'));
            drawer.querySelectorAll('.d-accordion-btn').forEach(b => b.classList.remove('open'));
            if (!isOpen) { body.classList.add('open'); this.classList.add('open'); }
        });
    });
    drawer.querySelectorAll('.d-accordion-body.open').forEach(b => {
        const btn = drawer.querySelector('[data-target="' + b.id + '"]');
        if (btn) btn.classList.add('open');
    });

    window.addEventListener('scroll', () => navbar.classList.toggle('scrolled', window.scrollY > 10), { passive: true });
});
</script>
<!-- END NAVBAR -->

</body>

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
                <h4 class="fw-bold mt-2 mb-0">44</h4>
                <small style="font-size:14px;">Dokter</small>
            </div>

            <div class="col-6 col-md-3 d-flex flex-column align-items-center py-3">
                <i class="fa-solid fa-bed" style="font-size:32px;"></i>
                <h4 class="fw-bold mt-2 mb-0">140</h4>
                <small style="font-size:14px;">Tempat Tidur</small>
            </div>

            <div class="col-6 col-md-3 d-flex flex-column align-items-center py-3">
                <i class="fa-solid fa-users" style="font-size:32px;"></i>
                <h4 class="fw-bold mt-2 mb-0">400</h4>
                <small style="font-size:14px;">Karyawan</small>
            </div>

        </div>

    </div>

</section>

<section style="background:#fff; padding:0; margin:0; overflow:hidden;">

    <div id="adCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2500">

        <div class="carousel-inner m-0 p-0">

            @foreach($banners as $key => $item)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{ asset('storage/'.$item->gambar) }}"
                     class="d-block w-100"
                     style="height:auto; display:block;">
            </div>
            @endforeach

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
                    Rumah Sakit Umum <strong>“Allam Medica”</strong> berdiri sejak tahun 2012
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

<style>
    /* ==========================================================
   ORNAMEN BACKGROUND SECTION DOKTER & MEDIA INFORMASI
========================================================== */

.section-dokter,
.section-media{
    position:relative;
    overflow:hidden;
}

/* pastikan semua isi section berada di atas ornamen */
.section-dokter .container,
.section-media .container{
    position:relative;
    z-index:2;
}

/* ==========================
   DOKTER KAMI
========================== */

.section-dokter::before{
    content:'';
    position:absolute;
    left:-120px;
    top:40px;
    width:360px;
    height:360px;
    background:url('{{ asset("images/beranda/ornamen.png") }}') center/contain no-repeat;
    opacity:.05;
    pointer-events:none;
    z-index:1;
}

.section-dokter::after{
    content:'';
    position:absolute;
    right:-110px;
    bottom:30px;
    width:320px;
    height:320px;
    background:url('{{ asset("images/beranda/ornamen.png") }}') center/contain no-repeat;
    opacity:.04;
    pointer-events:none;
    z-index:1;
}

/* ==========================
   MEDIA INFORMASI
========================== */

.section-media::before{
    content:'';
    position:absolute;
    right:-120px;
    top:20px;
    width:380px;
    height:380px;
    background:url('{{ asset("images/beranda/ornamen.png") }}') center/contain no-repeat;
    opacity:.05;
    pointer-events:none;
    z-index:1;
}

.section-media::after{
    content:'';
    position:absolute;
    left:-100px;
    bottom:20px;
    width:300px;
    height:300px;
    background:url('{{ asset("images/beranda/ornamen.png") }}') center/contain no-repeat;
    opacity:.04;
    pointer-events:none;
    z-index:1;
}
</style>

<!-- DOKTER KAMI -->
<section class="section-dokter" style="background:#fff; padding:50px 0;">
    <div class="container">

        {{-- TITLE --}}
        <div class="text-center mb-5">
            <h2 class="fw-bold">Dokter Kami</h2>

            <div style="
                width:80px;
                height:3px;
                background:#1C145C;
                margin:8px auto 0;
                border-radius:10px;
            "></div>
        </div>

        {{-- GRID --}}
        <div class="row g-4">

            @foreach($dokter as $index => $item)
            <div class="col-lg-4 col-md-6 col-12 dokter-item"
                 style="{{ $index >= 12 ? 'display:none;' : '' }}">

                <div style="
                    display:flex;
                    gap:15px;
                    padding:18px;
                    border:1px solid #eee;
                    border-radius:28px;
                    align-items:center;
                    height:100%;
                    background:#fff;
                    transition:.3s;
                "
                onmouseover="
                    this.style.boxShadow='0 14px 35px rgba(0,0,0,.08)';
                    this.style.transform='translateY(-4px)';
                "
                onmouseout="
                    this.style.boxShadow='none';
                    this.style.transform='translateY(0)';
                ">

                    {{-- FOTO --}}
                    @if($item->foto)
                        <img
                            src="{{ asset('uploads/dokter/'.$item->foto) }}"
                            loading="lazy"
                            alt="{{ $item->nama }}"
                            style="
                                width:95px;
                                height:95px;
                                border-radius:50%;
                                object-fit:cover;
                                border:3px solid #1C145C;
                                flex-shrink:0;
                            ">
                    @else
                        <div style="
                            width:95px;
                            height:95px;
                            border-radius:50%;
                            background:#e2e8f0;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            font-size:30px;
                            font-weight:700;
                            color:#475569;
                            border:3px solid #1C145C;
                            flex-shrink:0;
                        ">
                            {{ strtoupper(substr($item->nama,0,1)) }}
                        </div>
                    @endif

                    {{-- INFO --}}
                    <div style="
                        display:flex;
                        flex-direction:column;
                        justify-content:space-between;
                        height:100%;
                        width:100%;
                    ">

                        <div>
                            <h5 class="fw-bold mb-1"
                                style="
                                    font-size:16px;
                                    line-height:1.4;
                                    color:#1C145C;
                                ">
                                {{ $item->nama }}
                            </h5>

                            <small style="
                                color:#64748b;
                                font-size:13px;
                            ">
                                {{ $item->spesialis }}
                            </small>
                        </div>

                        <a href="{{ route('jadwaldokter') }}"
                           style="
                                margin-top:12px;
                                display:inline-block;
                                padding:8px 16px;
                                background:#1C145C;
                                color:white;
                                text-decoration:none;
                                border-radius:999px;
                                font-size:12px;
                                font-weight:600;
                                width:max-content;
                                transition:.3s;
                           "
                           onmouseover="
                                this.style.background='#31248f';
                           "
                           onmouseout="
                                this.style.background='#1C145C';
                           ">
                            Cek Jadwal
                        </a>

                    </div>

                </div>

            </div>
            @endforeach

        </div>

        {{-- LOAD MORE --}}
        @if(count($dokter) > 12)
        <div class="text-center mt-5">
            <button id="loadMoreDokter"
                    style="
                        border:none;
                        background:#1C145C;
                        color:#fff;
                        padding:12px 28px;
                        border-radius:999px;
                        font-weight:600;
                        transition:.3s;
                    "
                    onmouseover="
                        this.style.background='#31248f';
                        this.style.transform='translateY(-2px)';
                    "
                    onmouseout="
                        this.style.background='#1C145C';
                        this.style.transform='translateY(0)';
                    ">
                Lihat Dokter Lainnya
            </button>
        </div>
        @endif

    </div>
</section>


<!-- JUDUL -->
<section style="background:#fff; padding:50px 0;">

    <div class="container">

        <!-- Judul -->
        <div class="text-center mb-4">
            <h2 class="fw-bold">Media Informasi</h2>

            <!-- garis bawah -->
            <div style="
                width:80px;
                height:3px;
                background:#1C145C;
                margin:8px auto 0;
                border-radius:10px;
            "></div>
        </div>
        </div>
        </section>

<!-- MEDIA INFORMASI -->
<section class="section-media" style="
    padding:70px 0;
    background: linear-gradient(
        to bottom,
        #ffffff 0%,
        #fdfcf8 20%,
        #f5f2e7 50%,
        #fdfcf8 80%,
        #ffffff 100%
    );
">
    <div class="container">

        <div class="row g-4">
            @foreach($beritaTerbaru as $item)
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden">

                    <div style="width:100%; aspect-ratio: 4/5; overflow:hidden; background:#f3f3f3;">
                        <img src="{{ asset('storage/'.$item->gambar) }}"
                             style="width:100%; height:100%; object-fit:cover; display:block;">
                    </div>

                    <div class="card-body d-flex flex-column text-center">
                        <h6 class="fw-bold mb-2">{{ $item->judul }}</h6>
                        <p class="text-muted small mb-3">{{ Str::limit($item->deskripsi, 90) }}</p>
                        <div class="mt-auto">
                            <a href="{{ url('/berita/'.$item->slug) }}"
                               class="btn btn-sm"
                               style="background:#1C145C; color:#fff; border-radius:20px; padding:6px 14px;">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div>

        <!-- BUTTON LIHAT BERITA LAINNYA — dalam container yang sama -->
        <div class="text-center mt-5">
            <a href="/berita"
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

    </div>
</section>



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



<style>

/* ================= SLIDER WRAPPER ================= */
.partner-slider {
    overflow: hidden;
    width: 100%;
    position: relative;
}

/* ================= TRACK ANIMATION ================= */
.partner-track {
    display: flex;
    width: max-content;
    animation: scroll 30s linear infinite;
    align-items: center;
}

/* ================= ITEM + JARAK ================= */
.partner-item {
    flex: 0 0 auto;
    margin: 0 30px; /* 👉 INI JARAK ANTAR LOGO */
}

/* ================= IMAGE STYLE ================= */
.partner-item img {
    height: 60px;
    width: auto;
    object-fit: contain;

    /* HITAM PUTIH DEFAULT */
    filter: grayscale(100%);
    opacity: 0.6;

    transition: all 0.3s ease;
}

/* ================= HOVER COLOR ================= */
.partner-item img:hover {
    filter: grayscale(0%);
    opacity: 1;
    transform: scale(1.1);
}

/* ================= ANIMASI LOOP ================= */
@keyframes scroll {
    from {
        transform: translateX(0);
    }
    to {
        transform: translateX(-50%);
    }
}
</style>
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

<!-- ============================================================
     FOOTER
============================================================ -->
<style>
.footer-rsu{
    background:linear-gradient(
        to bottom,
        #ffffff 0%,
        #fefefd 3%,
        #fdfcf6 8%,
        #fcfbf3 13%,
        #faf8ee 20%,
        #f7f5e8 30%,
        #f3f0e1 45%,
        #ede9d9 65%,
        #e8e3d2 85%,
        #e3deca 100%
    );
    color:#1C145C;
    padding:56px 0 0;
    position:relative;
    overflow:hidden;
}

/* ORNAMEN */
.footer-rsu .footer-ornament{
    position:absolute;
    right:-80px;
    bottom:-150px;
    width:420px;
    height:420px;
    opacity:.07;
    background-image:url('{{ asset("images/beranda/ornamen.png") }}');
    background-size:contain;
    background-repeat:no-repeat;
    background-position:center;
    pointer-events:none;
    z-index:0;
}

.footer-rsu .footer-ornament2{
    position:absolute;
    left:-100px;
    top:40px;
    width:340px;
    height:340px;
    opacity:.04;
    background-image:url('{{ asset("images/beranda/ornamen.png") }}');
    background-size:contain;
    background-repeat:no-repeat;
    background-position:center;
    pointer-events:none;
    z-index:0;
}

/* CONTAINER */
.footer-rsu .container-fluid{
    max-width:1550px;
    position:relative;
    z-index:1;
}

/* GRID */
.footer-rsu .row{
    --bs-gutter-x:3.5rem;
}

/* LOGO */
.footer-rsu .footer-logo{
    height:40px;
    width:auto;
    display:block;
    margin-bottom:14px;
}

/* TITLE */
.footer-rsu .footer-title{
    font-size:16px;
    font-weight:700;
    color:#1C145C;
    margin-bottom:8px;
}

.footer-rsu .footer-desc{
    font-size:13px;
    line-height:1.8;
    color:#5a5480;
    margin-bottom:20px;
    max-width:340px;
}

/* SOCIAL */
.footer-rsu .footer-social{
    display:flex;
    gap:10px;
    margin-bottom:22px;
}

.footer-rsu .footer-social a{
    width:36px;
    height:36px;
    border-radius:50%;
    background:rgba(28,20,92,.07);
    border:1px solid rgba(28,20,92,.15);
    display:flex;
    align-items:center;
    justify-content:center;
    color:#1C145C;
    text-decoration:none;
    font-size:15px;
    transition:.25s;
}

.footer-rsu .footer-social a:hover{
    background:#1C145C;
    color:#fff;
    transform:translateY(-2px);
}

/* MITRA */
.footer-rsu .footer-mitra-label{
    font-size:11px;
    color:#9994bb;
    text-transform:uppercase;
    letter-spacing:.08em;
    margin-bottom:10px;
}

.footer-rsu .footer-mitra{
    display:flex;
    gap:10px;
    align-items:center;
    flex-wrap:wrap;
}

.footer-rsu .footer-mitra img:nth-child(1){
    height:33px;
}

.footer-rsu .footer-mitra img:nth-child(2){
    height:23px;
}

/* HEADING */
.footer-rsu .footer-heading{
    font-weight:900;
    font-size:12px;
    color:#1C145C;
    text-transform:uppercase;
    letter-spacing:.14em;
    margin-bottom:18px;
    padding-bottom:10px;
    border-bottom:1.5px solid rgba(28,20,92,.12);
    white-space:nowrap;
}

/* LIST */
.footer-rsu ul{
    list-style:none;
    padding:0;
    margin:0;
}

.footer-rsu ul li{
    margin-bottom:10px;
}

.footer-rsu a{
    color:#5a5480;
    text-decoration:none;
    font-size:13.5px;
    transition:.2s;
    display:inline-flex;
    align-items:center;
    gap:5px;
}

.footer-rsu ul li a::before{
    content:'›';
    color:#1C145C;
    opacity:.4;
    font-size:15px;
}

.footer-rsu a:hover{
    color:#1C145C;
    padding-left:3px;
}

/* CONTACT */
.footer-rsu .footer-contact-row{
    display:flex;
    align-items:flex-start;
    gap:11px;
    margin-bottom:16px;
}

.footer-rsu .footer-contact-icon{
    width:34px;
    height:34px;
    border-radius:8px;
    background:rgba(28,20,92,.07);
    border:1px solid rgba(28,20,92,.1);
    display:flex;
    align-items:center;
    justify-content:center;
    color:#1C145C;
    flex-shrink:0;
}

.footer-rsu .footer-contact-text{
    font-size:13px;
    color:#5a5480;
    line-height:1.7;
    word-break:normal;
}

/* HR */
.footer-rsu hr{
    height:1px;
    background:linear-gradient(
        90deg,
        rgba(28,20,92,0) 0%,
        rgba(28,20,92,.12) 30%,
        rgba(28,20,92,.12) 70%,
        rgba(28,20,92,0) 100%
    );
    border:none;
    margin:36px 0 0;
}

/* BOTTOM */
.footer-rsu .footer-bottom{
    background:rgba(28,20,92,.05);
    padding:15px 36px;
}

.footer-rsu .footer-copy{
    font-size:12.5px;
    color:#9994bb;
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:12px;
}

.footer-rsu .footer-copy-badge{
    background:rgba(28,20,92,.06);
    border:1px solid rgba(28,20,92,.12);
    border-radius:20px;
    padding:4px 14px;
    font-size:11.5px;
    color:#7a74a0;
    white-space:nowrap;
}

.footer-rsu .footer-accent-dot{
    display:inline-block;
    width:3px;
    height:3px;
    border-radius:50%;
    background:#1C145C;
    opacity:.25;
    margin:0 8px;
}

/* TABLET */
@media(max-width:991px){

    .footer-rsu{
        padding:45px 0 0;
    }

    .footer-rsu .row > div{
        margin-bottom:24px;
    }

    .footer-rsu .footer-desc{
        max-width:100%;
    }
}

/* MOBILE */
@media(max-width:768px){

    .footer-rsu{
        padding:40px 0 0;
    }

    .footer-rsu .container-fluid{
        padding-left:20px !important;
        padding-right:20px !important;
    }

    .footer-rsu .footer-copy{
        flex-direction:column;
        align-items:flex-start;
        gap:8px;
    }

    .footer-rsu .footer-bottom{
        padding:15px 20px;
    }

    .footer-rsu a:hover{
        padding-left:0;
    }

    .footer-rsu .footer-logo{
        height:34px;
    }
}
</style>

<footer class="footer-rsu">

    <div class="footer-ornament"></div>
    <div class="footer-ornament2"></div>

    <div class="container-fluid px-lg-5 px-4">

        <div class="row g-5 justify-content-between">

            <!-- BRAND -->
            <div class="col-lg-3 col-md-12">

                <img src="{{ asset('images/beranda/logo-almed.png') }}"
                     class="footer-logo"
                     alt="Logo RSU Allam Medica">

                <h5 class="footer-title">
                    RSU Allam Medica Bumiayu
                </h5>

                <p class="footer-desc">
                    Jl. Pangeran Diponegoro No. 609,
                    Jatisawit, Bumiayu, Kabupaten Brebes,
                    Jawa Tengah 52273
                </p>

                <div class="footer-social">
                    <a href="https://www.tiktok.com/@rsuallammedicabumiayu" target="_blank">
                        <i class="bi bi-tiktok"></i>
                    </a>
                    <a href="https://www.facebook.com/allam.medicabmy" target="_blank">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://www.instagram.com/allam.medica/" target="_blank">
                        <i class="bi bi-instagram"></i>
                    </a>
                </div>

                <div class="footer-mitra-label">
                    Akreditasi & Mitra
                </div>

                <div class="footer-mitra">
                    <img src="{{ asset('images/beranda/paripurna.png') }}" alt="">
                    <img src="{{ asset('images/beranda/bpjs.png') }}" alt="">
                </div>

            </div>

            <!-- TAUTAN CEPAT -->
            <div class="col-lg-2 col-md-4 col-6">

                <h6 class="footer-heading">Tautan Cepat</h6>

                <ul>
                    <li><a href="{{ route('beranda') }}">Beranda</a></li>
                    <li><a href="{{ url('/artikel') }}">Artikel</a></li>
                    <li><a href="{{ url('/download') }}">Download</a></li>
                    <li><a href="{{ url('/tentang') }}">Tentang Kami</a></li>
                    <li><a href="{{ url('/mutu') }}">Mutu</a></li>
                    <li><a href="{{ url('/kontak') }}">Kontak</a></li>
                </ul>

            </div>

            <!-- MENU -->
            <div class="col-lg-2 col-md-4 col-6">

                <h6 class="footer-heading">Menu</h6>

                <ul>
                    <li><a href="{{ url('/karir') }}">Karir</a></li>
                    <li><a href="{{ url('/berita') }}">Berita</a></li>
                    <li><a href="{{ url('/video') }}">Video</a></li>
                </ul>

            </div>

            <!-- LAYANAN -->
            <div class="col-lg-2 col-md-4 col-6">

                <h6 class="footer-heading">Layanan</h6>

                <ul>
                    <li><a href="{{ url('/layanan#igd') }}">IGD 24 Jam</a></li>
                    <li><a href="{{ url('/layanan#rawatjalan') }}">Rawat Jalan</a></li>
                    <li><a href="{{ url('/layanan#rawatinap') }}">Rawat Inap</a></li>
                    <li><a href="{{ url('/layanan#ambulans') }}">Ambulans</a></li>
                    <li><a href="{{ url('/layanan#laboratorium') }}">Laboratorium</a></li>
                    <li><a href="{{ url('/layanan#radiologi') }}">Radiologi</a></li>
                    <li><a href="{{ url('/layanan#farmasi') }}">Farmasi</a></li>
                    <li><a href="{{ url('/layanan#mcu') }}">Medical Check Up</a></li>
                </ul>

            </div>

            <!-- KONTAK -->
            <div class="col-lg-3 col-md-12">

                <h6 class="footer-heading">Hubungi Kami</h6>

                <div class="footer-contact-row">
                    <div class="footer-contact-icon">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <div class="footer-contact-text">
                        (0289) 430822
                    </div>
                </div>

                <div class="footer-contact-row">
                    <div class="footer-contact-icon">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <div class="footer-contact-text">
                        allam.medica@yahoo.co.id
                    </div>
                </div>

                <div class="footer-contact-row">
                    <div class="footer-contact-icon">
                        <i class="bi bi-clock-fill"></i>
                    </div>
                    <div class="footer-contact-text">
                        IGD, Lab & Farmasi : 24 Jam<br>
                        Rawat Jalan : Sen – Sab 07.00 – 21.00
                    </div>
                </div>

                <div class="footer-contact-row">
                    <div class="footer-contact-icon">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <div class="footer-contact-text">
                        Jl. Pangeran Diponegoro No. 609,<br>
                        Bumiayu, Brebes
                    </div>
                </div>

            </div>

        </div>

        <hr>

    </div>

    <div class="footer-bottom">

        <div class="container-fluid px-lg-5 px-4">

            <div class="footer-copy">
                <span>
                    © 2026 RSU Allam Medica
                    <span class="footer-accent-dot"></span>
                    Hak Cipta Dilindungi
                </span>

                <span class="footer-copy-badge">
                    Melayani dengan Sepenuh Hati
                </span>
            </div>

        </div>

    </div>

</footer>
<!-- END FOOTER -->




<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

<style>
/* ===============================
   FLOATING BAR DESKTOP
================================= */
.floating-bar {
    position: fixed;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 999999;
    display: flex;
    overflow: hidden;
    border-radius: 60px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.18);
}

.floating-item {
    width: 210px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    background: #eaeaea;
    color: #000;
    transition: 0.3s ease;
    box-sizing: border-box;
}

.floating-item:first-child {
    border-radius: 60px 0 0 60px;
}

.floating-item:last-child {
    border-radius: 0 60px 60px 0;
}

.floating-item.active {
    background: #ff1a1a;
    color: #fff;
}

.floating-item.middle {
    background: #f2f2f2;
    color: #000;
}

.floating-item i {
    font-size: 18px;
}

.floating-item:hover {
    transform: translateY(-2px);
    opacity: .95;
}

/* ===============================
   MOBILE VERSION
================================= */
@media (max-width: 768px) {

    html, body {
        background-color: #e3deca;
    }

    body {
        padding-bottom: 120px;
    }

    .floating-bar {
        position: fixed;
        left: 50%;
        transform: translateX(-50%);
        bottom: 14px;
        width: calc(100% - 24px);
        max-width: 390px;
        height: 88px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 10px 0;
        background: rgba(255,255,255,.18);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        border: 1px solid rgba(255,255,255,.22);
        border-radius: 28px;
        box-shadow: 0 8px 30px rgba(0,0,0,.10);
        overflow: visible;
        z-index: 999999;
    }

    .floating-item {
        flex: 1;
        min-width: 90px;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 5px;
        padding: 6px 2px;
        text-decoration: none;
        background: transparent !important;
        color: #555 !important;
        border-radius: 0 !important;
        transition: .2s ease;
    }

    .floating-item i {
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 18px;
        background: #f3f4f6;
        color: #666;
        transition: .2s ease;
    }

    .floating-item span {
        font-size: 10px;
        font-weight: 600;
        line-height: 1.2;
        text-align: center;
    }

    .floating-item.middle {
        position: relative;
        top: -2px;
        width: 72px;
        height: 72px;
        flex: none;
        border-radius: 50% !important;
        background: #1C145C !important;
        color: #fff !important;
        box-shadow: 0 10px 24px rgba(28,20,92,.25);
    }

    .floating-item.middle i {
        width: 44px;
        height: 44px;
        background: rgba(255,255,255,.15);
        color: #fff;
        font-size: 20px;
    }

    .floating-item.middle span {
        width: 60px;
        font-size: 9px;
        line-height: 1.2;
        color: #fff;
    }

    .floating-item.active i {
        background: #ffe7eb;
        color: #dc3545;
    }

    .floating-item:active {
        transform: scale(.96);
    }

    .floating-item:hover {
        transform: none;
    }

    .floating-item:first-child,
    .floating-item:last-child {
        border-radius: 0 !important;
    }
}

/* ===============================
   MODAL KONFIRMASI IGD
================================= */
.modal-igd .modal-content {
    border: 0;
    border-radius: 20px;
    overflow: hidden;
}

.modal-igd .igd-icon-wrap {
    width: 68px;
    height: 68px;
    background: #fff0f0;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 16px;
}

.modal-igd .igd-icon-wrap i {
    font-size: 30px;
    color: #dc3545;
}

.modal-igd .igd-number {
    font-size: 22px;
    font-weight: 700;
    color: #dc3545;
    letter-spacing: .5px;
}

.modal-igd .igd-warning {
    font-size: 12px;
    color: #6c757d;
    line-height: 1.6;
}

.modal-igd .btn-batal {
    border-radius: 50px;
    padding: 10px 24px;
    font-size: 14px;
    font-weight: 600;
    border: 1.5px solid #dee2e6;
    color: #6c757d;
    background: transparent;
    transition: .2s;
}

.modal-igd .btn-batal:hover {
    background: #f8f9fa;
    border-color: #adb5bd;
}

.modal-igd .btn-telepon {
    border-radius: 50px;
    padding: 10px 24px;
    font-size: 14px;
    font-weight: 600;
    background: #dc3545;
    color: #fff;
    border: none;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: .2s;
}

.modal-igd .btn-telepon:hover {
    background: #bb2d3b;
    color: #fff;
    transform: translateY(-1px);
}
</style>


<!-- FLOATING BAR -->
<div class="floating-bar">

    <!-- IGD — pakai onclick, bukan href langsung -->
    <a href="#" class="floating-item active" onclick="konfirmasiIGD(event)">
        <i class="bi bi-hospital"></i>
        <span>IGD 24 JAM</span>
    </a>

    <!-- Tengah -->
    <a href="{{ url('/jadwaldokter') }}" class="floating-item middle">
        <i class="bi bi-calendar-check"></i>
        <span>Cek Jadwal Dokter</span>
    </a>

    <!-- Alamat -->
    <a href="https://maps.app.goo.gl/4yvn64pEuhWg35mX6" target="_blank" class="floating-item active">
        <i class="bi bi-geo-alt-fill"></i>
        <span>Alamat</span>
    </a>

</div>


<!-- MODAL KONFIRMASI IGD -->
<div class="modal fade modal-igd" id="modalIGD" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content shadow-lg">

            <div class="modal-body text-center px-4 pt-4 pb-2">

                <div class="igd-icon-wrap">
                    <i class="bi bi-hospital-fill"></i>
                </div>

                <h5 class="fw-bold mb-1" style="color:#1C145C; font-size:17px;">
                    Hubungi IGD?
                </h5>

                <p class="text-muted mb-1" style="font-size:13px;">
                    Nomor IGD RSU Allam Medica
                </p>

                <p class="igd-number mb-3">(0289) 430822</p>

                <div class="alert alert-warning py-2 px-3 mb-0 rounded-3" style="background:#fffbeb; border:1px solid #fde68a; font-size:12px; color:#92400e;">
                    <i class="bi bi-exclamation-triangle-fill me-1"></i>
                    Nomor ini <strong>khusus kedaruratan medis</strong>.<br>
                    Mohon gunakan hanya saat kondisi darurat.
                </div>

            </div>

            <div class="modal-footer border-0 justify-content-center gap-2 pb-4 pt-3">

                <button type="button" class="btn-batal" data-bs-dismiss="modal">
                    Batal
                </button>

                <a href="tel:+62289430822" class="btn-telepon">
                    <i class="bi bi-telephone-fill"></i>
                    Telepon Sekarang
                </a>

            </div>

        </div>
    </div>
</div>


<script>
function konfirmasiIGD(e) {
    e.preventDefault();
    new bootstrap.Modal(document.getElementById('modalIGD')).show();
}
</script>

</html>