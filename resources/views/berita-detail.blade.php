@php
use Illuminate\Support\Str;
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $berita->judul }} - RSU Allam Medica</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            padding-top: 90px;
            background: #f9f9f9;
        }

        /* ================= TOP BAR ================= */
        .topbar {
            background: #1C145C;
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

        .nav-gap { gap: 18px; }

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
            body { padding-top: 100px; }
            .navbar-nav.nav-gap { gap: 0 !important; width: 100%; }
            .navbar-nav .nav-item { padding: 0; }
            .navbar-nav .nav-link { padding: 10px 0; }
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

       /* ================= BREADCRUMB ================= */
        .breadcrumb-wrap {
            background: #fff;
            border-bottom: 1px solid #eee;
            padding: 12px 0;
            margin-top: 15px;
        }

        /* Container breadcrumb */
        .breadcrumb {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            margin-bottom: 0;
        }

        /* Item breadcrumb */
        .breadcrumb-item {
            display: flex;
            align-items: center;
            font-size: 13px;
            line-height: 1.5;
        }

        /* Link & active disamakan */
        .breadcrumb-item a,
        .breadcrumb-item.active {
            display: inline-flex;
            align-items: center;
            font-size: 13px;
            line-height: 1.5;
        }

        /* Warna */
        .breadcrumb-item a {
            color: #1C145C;
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: #888;
        }

        /* Separator "/" */
        .breadcrumb-item + .breadcrumb-item::before {
            display: inline-flex;
            align-items: center;
            color: #aaa;
            margin: 0 6px;
        }
        /* ================= HERO IMAGE ================= */
        .detail-hero {
            width: 100%;
            height: auto;          /* penting: biar ikut tinggi asli */
            max-height: none;      /* hilangkan batas crop */
            object-fit: contain;   /* tampil full tanpa kepotong */
            display: block;
            border-radius: 16px;
            margin-bottom: 28px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.10);
        }

        /* ================= ARTICLE WRAPPER ================= */
        .article-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.06);
            padding: 40px 48px;
            margin-bottom: 40px;
        }

        @media (max-width: 768px) {
            .article-card { padding: 24px 20px; }
        }

        /* ================= META ================= */
        .article-meta {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 16px;
            margin-bottom: 18px;
        }
        .meta-badge {
            background: #EEF0FF;
            color: #1C145C;
            border-radius: 20px;
            padding: 4px 14px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        .meta-date {
            color: #888;
            font-size: 13px;
        }
        .meta-date i { margin-right: 5px; }

        /* ================= JUDUL ================= */
        .article-title {
            font-size: 30px;
            font-weight: 800;
            color: #1C145C;
            line-height: 1.3;
            margin-bottom: 20px;
        }
        @media (max-width: 768px) {
            .article-title { font-size: 22px; }
        }

        /* ================= DIVIDER ================= */
        .article-divider {
            border: none;
            border-top: 2px solid #EEF0FF;
            margin: 24px 0;
        }

        /* ================= KONTEN ================= */
        .article-content {
            font-size: 15.5px;
            color: #333;
            line-height: 1.85;
        }
        .article-content p {
            margin-bottom: 16px;
        }
        .article-content img {
            max-width: 100%;
            border-radius: 10px;
            margin: 10px 0;
        }

        /* ================= SHARE ================= */
        .share-wrap {
            background: #f5f6ff;
            border-radius: 14px;
            padding: 18px 24px;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 36px;
        }
        .share-label {
            font-size: 13px;
            font-weight: 700;
            color: #1C145C;
        }
        .share-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: opacity 0.2s;
        }
        .share-btn:hover { opacity: 0.85; }
        .share-fb  { background: #1877F2; color: #fff; }
        .share-wa  { background: #25D366; color: #fff; }
        .share-tw  { background: #1DA1F2; color: #fff; }
        .share-copy { background: #1C145C; color: #fff; cursor: pointer; border: none; }

        /* ================= BACK BUTTON ================= */
        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #1C145C;
            color: #fff;
            border-radius: 20px;
            padding: 9px 22px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s;
            margin-bottom: 28px;
        }
        .btn-back:hover { background: #150f4a; color: #fff; }

        /* ================= BERITA LAINNYA ================= */
        .related-title {
            font-size: 20px;
            font-weight: 800;
            color: #1C145C;
            margin-bottom: 20px;
        }
        .related-card {
            border: 1px solid #eee;
            border-radius: 16px;
            overflow: hidden;
            background: #fff;
            height: 100%;
            transition: box-shadow 0.25s, transform 0.25s;
        }
        .related-card:hover {
            box-shadow: 0 8px 24px rgba(28,20,92,0.10);
            transform: translateY(-3px);
        }
        .related-card img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            display: block;
        }
        .related-card-body {
            padding: 14px 16px;
            text-align: center;
        }
        .related-card-body h6 {
            font-size: 14px;
            font-weight: 700;
            color: #1C145C;
            margin-bottom: 8px;
        }
        .related-card-body p {
            font-size: 12px;
            color: #666;
            margin-bottom: 10px;
        }
        .related-card-body a {
            display: inline-block;
            padding: 5px 14px;
            background: #1C145C;
            color: white;
            text-decoration: none;
            border-radius: 20px;
            font-size: 12px;
        }
        .related-card-body a:hover { background: #150f4a; }
    </style>
</head>

<body>

<!-- ================= TOP BAR ================= -->
<nav class="navbar navbar-dark topbar">
    <div class="container">
        <ul class="navbar-nav flex-row" style="font-size:13px;">
            <li class="nav-item">
                <span style="color:#fff; padding:4px 10px;">
                    <i class="bi bi-telephone-fill" style="margin-right:5px; font-size:12px;"></i>
                    0834325542
                </span>
            </li>
            <li class="nav-item">
                <span style="color:#fff; padding:4px 10px;">
                    <i class="bi bi-envelope-fill" style="margin-right:5px; font-size:12px;"></i>
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
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/beranda/logo-almed.png') }}" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainMenu">
            <ul class="navbar-nav ms-auto nav-gap">
                <li class="nav-item"><a href="/" class="nav-link">Beranda</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Menu</a>
                    <ul class="dropdown-menu">
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

<!-- ================= BREADCRUMB ================= -->
<div class="breadcrumb-wrap">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/berita') }}">Berita</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ Str::limit($berita->judul, 50) }}
                </li>
            </ol>
        </nav>
    </div>
</div>

<!-- ================= MAIN CONTENT ================= -->
<section style="padding: 40px 0 60px;">
    <div class="container">
        <div class="row justify-content-center">

            <!-- KOLOM ARTIKEL -->
            <div class="col-lg-8 col-12">

                <!-- TOMBOL KEMBALI -->
                <a href="{{ url('/berita') }}" class="btn-back">
                    <i class="bi bi-arrow-left"></i> Kembali ke Berita
                </a>

                <!-- CARD ARTIKEL -->
                <div class="article-card">

                    <!-- GAMBAR UTAMA -->
                    @if($berita->gambar)
                    <img src="{{ asset('storage/' . $berita->gambar) }}"
                         alt="{{ $berita->judul }}"
                         class="detail-hero">
                    @endif

                    <!-- META INFO -->
                    <div class="article-meta">
                        <span class="meta-badge">Buletin Allam Medica</span>
                        <span class="meta-date">
                            <i class="bi bi-calendar3"></i>
                            {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}
                        </span>
                    </div>

                    <!-- JUDUL -->
                    <h1 class="article-title">{{ $berita->judul }}</h1>

                    <hr class="article-divider">

                    <!-- KONTEN / DESKRIPSI -->
                    <div class="article-content">
                        {!! nl2br(e($berita->deskripsi)) !!}
                    </div>

                    <!-- BAGIKAN -->
                    <div class="share-wrap">
                        <span class="share-label"><i class="bi bi-share-fill me-1"></i> Bagikan:</span>

                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                           target="_blank" class="share-btn share-fb">
                            <i class="bi bi-facebook"></i> Facebook
                        </a>

                        <a href="https://wa.me/?text={{ urlencode($berita->judul . ' ' . request()->url()) }}"
                           target="_blank" class="share-btn share-wa">
                            <i class="bi bi-whatsapp"></i> WhatsApp
                        </a>

                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($berita->judul) }}&url={{ urlencode(request()->url()) }}"
                           target="_blank" class="share-btn share-tw">
                            <i class="bi bi-twitter"></i> Twitter
                        </a>

                        <button class="share-btn share-copy" onclick="copyLink()">
                            <i class="bi bi-link-45deg"></i> Salin Link
                        </button>
                    </div>

                </div>
            </div>

            <!-- KOLOM SIDEBAR -->
            <div class="col-lg-4 col-12 mt-4 mt-lg-0">

                <!-- BERITA TERBARU SIDEBAR -->
                <div style="
                    background:#fff;
                    border-radius:16px;
                    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
                    padding: 24px;
                    position: sticky;
                    top: 110px;
                ">
                    <h6 style="font-weight:800; color:#1C145C; font-size:16px; margin-bottom:18px; border-left:4px solid #1C145C; padding-left:10px;">
                        Berita Terbaru
                    </h6>

                    @foreach($beritaLainnya as $lain)
                    <a href="{{ url('/berita/' . $lain->id) }}" style="text-decoration:none;">
                        <div style="
                            display:flex;
                            gap:12px;
                            align-items:flex-start;
                            padding: 12px 0;
                            border-bottom: 1px solid #f0f0f0;
                        ">
                            <img src="{{ asset('storage/' . $lain->gambar) }}"
                                 style="width:70px; height:70px; object-fit:cover; border-radius:10px; flex-shrink:0;">
                            <div>
                                <p style="font-size:13px; font-weight:700; color:#1C145C; margin:0 0 5px;">
                                    {{ Str::limit($lain->judul, 60) }}
                                </p>
                                <span style="font-size:11px; color:#999;">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ \Carbon\Carbon::parse($lain->created_at)->translatedFormat('d M Y') }}
                                </span>
                            </div>
                        </div>
                    </a>
                    @endforeach

                    <div class="text-center mt-3">
                        <a href="{{ url('/berita') }}"
                           style="
                                font-size:13px;
                                color:#1C145C;
                                font-weight:600;
                                text-decoration:none;
                           ">
                            Lihat Semua Berita <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                </div>

            </div>

        </div>

        <!-- ================= BERITA LAINNYA (BAWAH) ================= -->
        @if($beritaLainnya->count() > 0)
        <div style="margin-top: 60px;">
            <h2 class="related-title">Berita Lainnya</h2>
            <div class="row g-4">
                @foreach($beritaLainnya->take(4) as $lain)
                <div class="col-md-3 col-6">
                    <div class="related-card">
                        <img src="{{ asset('storage/' . $lain->gambar) }}" alt="{{ $lain->judul }}">
                        <div class="related-card-body">
                            <h6>{{ Str::limit($lain->judul, 55) }}</h6>
                            <p>{{ Str::limit($lain->deskripsi, 70) }}</p>
                            <a href="{{ url('/berita/' . $lain->id) }}">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</section>

<!-- ================= FOOTER ================= -->
<footer style="background:#FFFFFF; color:black; padding:50px 0 20px;">
    <div class="container-fluid px-5">
        <div class="row align-items-start">

            <!-- LOGO + DESKRIPSI -->
            <div class="col-md-3 mb-4" style="padding-right:30px;">
                <img src="{{ asset('images/beranda/logo-almed.png') }}" style="height:50px; margin-bottom:10px;">
                <h5 class="fw-bold mb-2">RSU Allam Medica Bumiayu</h5>
                <p style="font-size:13px; line-height:1.6; color:#666; margin-bottom:15px;">
                    Jl. Pangeran Diponegoro No. 609, Jatisawit, Bumiayu, Kabupaten Brebes, Jawa Tengah 52273
                </p>
                <div style="margin-bottom:15px;">
                    <i class="bi bi-twitter me-2" style="color:#666;"></i>
                    <i class="bi bi-facebook me-2" style="color:#666;"></i>
                    <i class="bi bi-instagram" style="color:#666;"></i>
                </div>
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

            <!-- HUBUNGI -->
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

<script>
function copyLink() {
    navigator.clipboard.writeText(window.location.href).then(function() {
        const btn = document.querySelector('.share-copy');
        const originalHTML = btn.innerHTML;
        btn.innerHTML = '<i class="bi bi-check2"></i> Tersalin!';
        btn.style.background = '#28a745';
        setTimeout(() => {
            btn.innerHTML = originalHTML;
            btn.style.background = '#1C145C';
        }, 2000);
    });
}
</script>

</body>
</html>
