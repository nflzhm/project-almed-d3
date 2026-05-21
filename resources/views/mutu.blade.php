<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Mutu & Keselamatan Pasien — RSU Allam Medica</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<style>
/* ================= FONT GOTHAM ================= */
@font-face {
    font-family: 'GothamBlack';
    src: url('{{ asset('fonts/Gotham-Black.otf') }}') format('opentype');
    font-weight: 900;
    font-style: normal;
}

h1, h2, h3, h4, h5 {
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

/* ========================================
   TOPBAR
======================================== */
.topbar {
    background: linear-gradient(90deg, #1C145C 0%, #34258d 50%, #1C145C 100%);
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 38px;
    z-index: 9999;
    display: flex;
    align-items: center;
}

.topbar .container {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.topbar-info {
    display: flex;
    align-items: center;
    gap: 14px;
    flex-wrap: nowrap;
}

.topbar-info span {
    color: rgba(255,255,255,.88);
    font-size: 12px;
    display: flex;
    align-items: center;
    gap: 6px;
    white-space: nowrap;
}

.topbar-info i { font-size: 11px; opacity: .8; }

.topbar-social { display: flex; align-items: center; gap: 12px; }

.topbar-social a {
    color: rgba(255,255,255,.75);
    font-size: 14px;
    text-decoration: none;
    display: flex;
    align-items: center;
    transition: .2s;
}

.topbar-social a:hover { color: #fff; transform: translateY(-1px); }

/* ========================================
   FLOAT WRAP
======================================== */
.navbar-float-wrap {
    position: fixed;
    top: 38px; left: 0;
    width: 100%;
    z-index: 9998;
    padding: 12px 20px;
}

/* ========================================
   NAVBAR FLOAT — GLASS
======================================== */
.navbar-float {
    max-width: 1200px;
    margin: 0 auto;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    padding: 10px 14px 10px 22px;
    border-radius: 60px;
    background: rgba(255,255,255,0.07);
    backdrop-filter: blur(22px) saturate(180%);
    -webkit-backdrop-filter: blur(22px) saturate(180%);
    border: 1px solid rgba(255,255,255,0.16);
    box-shadow: 0 8px 32px rgba(15,23,42,.08), inset 0 1px 0 rgba(255,255,255,.22);
    transition: background .3s ease, border .3s ease, box-shadow .3s ease;
}

.navbar-float.scrolled {
    background: rgba(255,255,255,.14);
    backdrop-filter: blur(26px) saturate(200%);
    -webkit-backdrop-filter: blur(26px) saturate(200%);
    border: 1px solid rgba(255,255,255,.22);
    box-shadow: 0 10px 40px rgba(15,23,42,.10), inset 0 1px 0 rgba(255,255,255,.28);
}

.navbar-float::before {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: inherit;
    background: linear-gradient(180deg, rgba(255,255,255,.20), rgba(255,255,255,.02));
    pointer-events: none;
}

.nav-logo { position: relative; z-index: 2; }
.navbar-float .nav-logo img { height: 38px; object-fit: contain; display: block; }

.nav-links {
    display: flex;
    align-items: center;
    justify-content: center;
    flex: 1;
    gap: 2px;
    position: relative;
    z-index: 2;
}

.nav-link-pill {
    padding: 8px 15px;
    border-radius: 50px;
    font-size: 14px;
    font-weight: 500;
    color: #0f172a;
    text-decoration: none;
    white-space: nowrap;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    transition: background .2s, color .2s, transform .2s;
}

.nav-link-pill:hover { background: rgba(255,255,255,.25); color: #1C145C; transform: translateY(-1px); }

.nav-link-pill.active {
    background: rgba(255,255,255,.35);
    color: #1C145C;
    font-weight: 600;
    box-shadow: inset 0 1px 0 rgba(255,255,255,.4), 0 4px 10px rgba(255,255,255,.12);
}

.drop-wrap { position: relative; }

.drop-menu {
    position: absolute;
    top: calc(100% + 12px);
    left: 50%;
    transform: translateX(-50%) translateY(8px);
    min-width: 180px;
    padding: 8px;
    border-radius: 22px;
    background: rgba(255,255,255,.70);
    backdrop-filter: blur(24px);
    -webkit-backdrop-filter: blur(24px);
    border: 1px solid rgba(255,255,255,.35);
    box-shadow: 0 12px 35px rgba(15,23,42,.12);
    opacity: 0;
    visibility: hidden;
    transition: .22s ease;
    z-index: 100;
}

.drop-wrap:hover .drop-menu {
    opacity: 1;
    visibility: visible;
    transform: translateX(-50%) translateY(0);
}

.drop-item {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 14px;
    border-radius: 14px;
    font-size: 14px;
    color: #334155;
    text-decoration: none;
    transition: .18s;
}

.drop-item:hover { background: rgba(255,255,255,.55); color: #1C145C; }

.chevron { font-size: 11px; opacity: .6; transition: .25s; }
.drop-wrap:hover .chevron { transform: rotate(180deg); }

.nav-cta { position: relative; z-index: 2; }

.btn-kontak {
    padding: 10px 22px;
    border-radius: 50px;
    background: #1C145C;
    color: #fff !important;
    text-decoration: none !important;
    font-size: 14px;
    font-weight: 600;
    display: inline-block;
    border: none;
    box-shadow: 0 8px 20px rgba(28,20,92,.25);
    transition: .2s;
}

.btn-kontak:hover { background: #2a1e8a; transform: translateY(-1px); }

.nav-burger {
    display: none;
    flex-direction: column;
    gap: 5px;
    cursor: pointer;
    border: none;
    background: transparent;
    padding: 6px;
    position: relative;
    z-index: 1000;
}

.nav-burger span { width: 22px; height: 2px; background: #1C145C; border-radius: 2px; display: block; transition: .3s; }
.nav-burger.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
.nav-burger.open span:nth-child(2) { opacity: 0; }
.nav-burger.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

.mobile-menu {
    display: none;
    position: absolute;
    top: calc(100% + 12px);
    left: 0; right: 0;
    padding: 10px;
    border-radius: 26px;
    background: rgba(255,255,255,0.92);
    backdrop-filter: blur(24px);
    -webkit-backdrop-filter: blur(24px);
    border: 1px solid rgba(255,255,255,0.5);
    box-shadow: 0 14px 40px rgba(15,23,42,.15);
    z-index: 999;
}

.mobile-menu.open { display: block; }

.m-link {
    display: block;
    padding: 13px 16px;
    border-radius: 14px;
    color: #1e293b;
    text-decoration: none;
    font-size: 15px;
    font-weight: 500;
    transition: .18s;
}

.m-link:hover, .m-link.active { background: rgba(28,20,92,0.07); color: #1C145C; }

.m-group-label {
    font-size: 11px;
    font-weight: 700;
    color: #94a3b8;
    letter-spacing: .8px;
    text-transform: uppercase;
    padding: 12px 16px 6px;
}

.m-sub { padding-left: 6px; }
.mobile-menu .btn-kontak { display: block; width: 100%; text-align: center; margin-top: 10px; border-radius: 16px; box-sizing: border-box; }

@media (max-width: 1100px) { .nav-link-pill { padding: 7px 11px; font-size: 13px; } }

@media (max-width: 991px) {
    body { padding-top: calc(38px + 64px); }
    .navbar-float-wrap { padding: 10px 12px; }
    .navbar-float { border-radius: 26px; padding: 10px 14px; }
    .nav-links, .nav-cta { display: none; }
    .nav-burger { display: flex; }
    .topbar-info span { font-size: 10px; }
    .topbar-social { gap: 10px; }
}

@media (max-width: 480px) {
    .topbar .container { gap: 8px; }
    .topbar-info { gap: 8px; }
    .topbar-info span { font-size: 9px; }
    .topbar-social a { font-size: 12px; }
    .navbar-float { border-radius: 22px; }
}

/* ========================================
   HALAMAN MUTU — HERO
======================================== */

.mutu-hero{
    position: relative;
    overflow: hidden;
    margin-top: -70px;
    padding: 6rem 0 3.5rem;

    background: linear-gradient(
        135deg,
        #060816 0%,
        #111c44 18%,
        #1C145C 38%,
        #4338ca 62%,
        #111c44 82%,
        #060816 100%
    );
}

/* ========================================
   EFFECT GLOW / FUTURISTIC LIGHT
======================================== */
.mutu-hero::before{
    content: '';
    position: absolute;
    inset: 0;
    pointer-events: none;

    background-image:
        radial-gradient(
            circle at 15% 50%,
            rgba(255,255,255,.05) 0%,
            transparent 45%
        ),
        radial-gradient(
            circle at 85% 20%,
            rgba(255,255,255,.04) 0%,
            transparent 40%
        );
}

/* ========================================
   FADE GRADIENT KE BAWAH
======================================== */
.mutu-hero::after{
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;

    height: 140px;
    pointer-events: none;

    background: linear-gradient(
        to bottom,
        rgba(6, 8, 22, 0) 0%,
        rgba(245, 247, 251, 0.35) 45%,
        #f5f7fb 100%
    );
}

.mutu-hero-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255,255,255,.12);
    border: 1px solid rgba(255,255,255,.22);
    border-radius: 100px;
    padding: 5px 14px;
    font-size: 12px;
    color: rgba(255,255,255,.9);
    letter-spacing: .05em;
    margin-bottom: 1.1rem;
}

.mutu-hero-eyebrow .dot-live {
    width: 7px; height: 7px;
    background: #a78bfa;
    border-radius: 50%;
    animation: blink 2s infinite;
}

@keyframes blink {
    0%, 100% { opacity: 1; }
    50%       { opacity: .35; }
}

.mutu-hero h1 {
    font-family: 'GothamBlack', sans-serif !important;
    font-size: clamp(1.6rem, 3.5vw, 2.5rem);
    color: #fff;
    line-height: 1.2;
    margin-bottom: .75rem;
}

.mutu-hero p {
    color: rgba(255,255,255,.72);
    font-size: 15px;
    max-width: 520px;
    line-height: 1.7;
}

/* Stat cards di hero */
.hero-stat-row {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
    margin-top: 2.25rem;
}

.hero-stat-box {
    background: rgba(255,255,255,.1);
    border: 1px solid rgba(255,255,255,.18);
    border-radius: 14px;
    padding: .9rem 1.4rem;
    text-align: center;
    min-width: 120px;
}

.hero-stat-box .hsb-val {
    font-family: 'GothamBlack', sans-serif;
    font-size: 1.55rem;
    color: #fff;
    line-height: 1;
    margin-bottom: 5px;
}

.hero-stat-box .hsb-lbl {
    font-size: 11px;
    color: rgba(255,255,255,.62);
    letter-spacing: .03em;
}

/* ========================================
   SECTION WRAPPER
======================================== */
.mutu-section {
    padding: 2.75rem 0 0;
}

.section-title {
    font-family: 'GothamBlack', sans-serif !important;
    font-size: 1.15rem;
    color: #1C145C;
    margin-bottom: 4px;
}

.section-sub {
    font-size: 13px;
    color: #64748b;
    margin-bottom: 1.4rem;
}

/* ========================================
   TAB INDIKATOR MUTU
======================================== */
.imn-wrapper {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    overflow: hidden;
    margin-bottom: 2.5rem;
    box-shadow: 0 2px 12px rgba(28,20,92,.05);
}

.imn-tab-nav {
    display: flex;
    overflow-x: auto;
    background: #f1f0fa;
    border-bottom: 1px solid #e2e8f0;
    scrollbar-width: none;
    gap: 2px;
    padding: 6px 8px;
}

.imn-tab-nav::-webkit-scrollbar { display: none; }

.imn-tab-btn {
    flex-shrink: 0;
    padding: 8px 16px;
    border-radius: 30px;
    font-size: 13px;
    font-family: 'Segoe UI', sans-serif;
    font-weight: 500;
    color: #64748b;
    background: transparent;
    border: none;
    cursor: pointer;
    white-space: nowrap;
    transition: all .2s;
}

.imn-tab-btn:hover { color: #1C145C; background: rgba(255,255,255,.6); }

.imn-tab-btn.active {
    background: #fff;
    color: #1C145C;
    box-shadow: 0 2px 8px rgba(28,20,92,.10);
}

.imn-pane { display: none; padding: 1.75rem; }
.imn-pane.active { display: block; }

.imn-card {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
    align-items: start;
}

@media (max-width: 640px) { .imn-card { grid-template-columns: 1fr; gap: 1.25rem; } }

.imn-desc h3 {
    font-family: 'GothamBlack', sans-serif !important;
    font-size: 1rem;
    color: #1C145C;
    margin-bottom: 10px;
}

.imn-desc p {
    font-size: 13.5px;
    color: #5a6a7a;
    line-height: 1.75;
}

.imn-target {
    display: inline-block;
    margin-top: 12px;
    font-size: 12.5px;
    color: #1C145C;
    background: #eeedf8;
    padding: 4px 12px;
    border-radius: 20px;
    font-weight: 600;
}

.imn-data-box {
    background: #f8f7ff;
    border: 1px solid #e0ddf5;
    border-radius: 14px;
    padding: 1.1rem 1.3rem;
}

.imn-data-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    margin-bottom: 12px;
}

.imn-period { font-size: 11.5px; color: #94a3b8; }

.imn-result {
    font-family: 'GothamBlack', sans-serif;
    font-size: 2rem;
    color: #1C145C;
    line-height: 1;
}

.imn-progress-label {
    display: flex;
    justify-content: space-between;
    font-size: 12px;
    color: #64748b;
    margin-bottom: 7px;
}

.imn-progress-label span:last-child { color: #1C145C; font-weight: 600; }

.imn-bar {
    height: 7px;
    background: #ddd9f5;
    border-radius: 4px;
    overflow: hidden;
}

.imn-fill {
    height: 100%;
    border-radius: 4px;
    background: linear-gradient(90deg, #2d2090, #1C145C);
}

.imn-fill.warning { background: linear-gradient(90deg, #d97706, #b45309); }

.imn-badge {
    display: inline-block;
    margin-top: 12px;
    font-size: 11.5px;
    font-weight: 600;
    padding: 4px 12px;
    border-radius: 20px;
}

.imn-badge.tercapai { background: #dcfce7; color: #166534; }
.imn-badge.monitor  { background: #fef9c3; color: #854d0e; }
.imn-badge.belum    { background: #fee2e2; color: #991b1b; }

/* ========================================
   AKREDITASI CARDS
======================================== */
.akred-card {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    padding: 1.3rem 1.4rem;
    display: flex;
    gap: 14px;
    align-items: flex-start;
    transition: box-shadow .2s, transform .2s;
    height: 100%;
    box-shadow: 0 2px 8px rgba(28,20,92,.04);
}

.akred-card:hover {
    box-shadow: 0 8px 24px rgba(28,20,92,.10);
    transform: translateY(-3px);
}

.akred-icon {
    width: 46px; height: 46px;
    border-radius: 12px;
    background: #eeedf8;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    flex-shrink: 0;
    color: #1C145C;
}

.akred-body h3 { font-size: 14px; font-weight: 700; color: #1C145C; margin-bottom: 5px; }
.akred-body p  { font-size: 12.5px; color: #64748b; line-height: 1.6; }

.akred-pill {
    display: inline-block;
    margin-top: 10px;
    font-size: 11px;
    padding: 3px 11px;
    border-radius: 20px;
    background: #eeedf8;
    color: #2d2090;
    font-weight: 600;
}

/* ========================================
   6 SKP
======================================== */
.skp-item {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: .9rem 1rem;
    display: flex;
    align-items: center;
    gap: 12px;
    transition: border-color .2s, box-shadow .2s;
    box-shadow: 0 1px 4px rgba(28,20,92,.04);
}

.skp-item:hover {
    border-color: #c4bfee;
    box-shadow: 0 4px 12px rgba(28,20,92,.07);
}

.skp-num {
    width: 30px; height: 30px;
    background: #1C145C;
    color: #fff;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    font-weight: 700;
    flex-shrink: 0;
}

.skp-item span { font-size: 13.5px; color: #334155; }

/* ========================================
   PROGRAM MUTU
======================================== */
.program-card {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    padding: 1.25rem;
    height: 100%;
    transition: all .2s;
    box-shadow: 0 2px 8px rgba(28,20,92,.04);
}

.program-card:hover {
    border-color: #c4bfee;
    box-shadow: 0 8px 24px rgba(28,20,92,.09);
    transform: translateY(-3px);
}

.program-card .p-icon {
    font-size: 28px;
    margin-bottom: 12px;
    display: block;
    color: #1C145C;
}

.program-card h3 { font-size: 13.5px; font-weight: 700; color: #1C145C; margin-bottom: 7px; }
.program-card p  { font-size: 12.5px; color: #64748b; line-height: 1.6; }

/* ========================================
   LAPORAN DOWNLOAD BOX
======================================== */
.laporan-box {
    background: linear-gradient(135deg, #1C145C 0%, #2d2090 100%);
    border-radius: 16px;
    padding: 1.5rem 1.75rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    flex-wrap: wrap;
    margin-bottom: 2.5rem;
}

.laporan-box .lb-text p:first-child { font-size: 15px; font-weight: 700; color: #fff; margin-bottom: 3px; }
.laporan-box .lb-text p:last-child  { font-size: 12.5px; color: rgba(255,255,255,.65); }

.btn-unduh {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255,255,255,.15);
    border: 1.5px solid rgba(255,255,255,.35);
    color: #fff !important;
    text-decoration: none !important;
    font-size: 13.5px;
    font-weight: 600;
    padding: 10px 22px;
    border-radius: 30px;
    transition: all .2s;
    white-space: nowrap;
}

.btn-unduh:hover {
    background: rgba(255,255,255,.25);
    border-color: rgba(255,255,255,.55);
}

/* ========================================
   SECTION DIVIDER
======================================== */
.mutu-divider {
    border: none;
    border-top: 1px solid #e8e6f5;
    margin: 2.25rem 0;
}

/* ========================================
   FOOTER (sama persis dengan beranda)
======================================== */
@font-face {
    font-family: 'Gotham';
    src: url('{{ asset('fonts/Gotham-Black.otf') }}') format('opentype');
    font-weight: 900;
    font-style: normal;
    font-display: swap;
}

.section-partner { position: relative; background: #ffffff; padding-bottom: 0; }
.section-partner::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 80px;
    background: linear-gradient(to bottom, rgba(255,255,255,0), #ffffff);
    pointer-events: none;
    z-index: 1;
}

.footer-rsu {
    background: linear-gradient(
        to bottom,
        #ffffff 0%, #fefefd 3%, #fdfcf6 8%, #fcfbf3 13%,
        #faf8ee 20%, #f7f5e8 30%, #f3f0e1 45%,
        #ede9d9 65%, #e8e3d2 85%, #e3deca 100%
    );
    color: #1C145C;
    padding: 56px 0 0;
    position: relative;
    overflow: hidden;
}

.footer-rsu .footer-ornament {
    position: absolute;
    right: -80px; bottom: -150px;
    width: 420px; height: 420px;
    opacity: 0.07;
    background-image: url('{{ asset('images/beranda/ornamen.png') }}');
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    pointer-events: none;
    z-index: 0;
}

.footer-rsu .footer-ornament2 {
    position: absolute;
    left: -100px; top: 40px;
    width: 340px; height: 340px;
    opacity: 0.04;
    background-image: url('{{ asset('images/beranda/ornamen.png') }}');
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    pointer-events: none;
    z-index: 0;
}

.footer-rsu .container-fluid { max-width: 1100px; position: relative; z-index: 1; }

.footer-rsu .footer-logo { height: 50px; display: block; margin-bottom: 16px; }
.footer-rsu .footer-title { font-size: 16px; font-weight: 700; color: #1C145C; margin-bottom: 8px; }
.footer-rsu .footer-desc { font-size: 13px; line-height: 1.8; color: #5a5480; margin-bottom: 20px; max-width: 290px; }

.footer-rsu .footer-social { display: flex; gap: 10px; margin-bottom: 22px; }
.footer-rsu .footer-social a {
    width: 36px; height: 36px;
    border-radius: 50%;
    background: rgba(28,20,92,.07);
    border: 1px solid rgba(28,20,92,.15);
    display: flex; align-items: center; justify-content: center;
    color: #1C145C;
    text-decoration: none;
    font-size: 15px;
    transition: .2s ease;
}
.footer-rsu .footer-social a:hover { background: #1C145C; color: #FEFCF1; transform: translateY(-2px); }

.footer-rsu .footer-mitra-label { font-size: 11px; color: #9994bb; text-transform: uppercase; letter-spacing: .08em; margin-bottom: 10px; }
.footer-rsu .footer-mitra { display: flex; gap: 10px; align-items: center; flex-wrap: wrap; }
.footer-rsu .footer-mitra img:nth-child(1) { height: 35px; }
.footer-rsu .footer-mitra img:nth-child(2) { height: 26px; }

.footer-rsu .footer-heading {
    font-family: 'Gotham', 'Arial Black', sans-serif;
    font-weight: 900;
    font-size: 12px;
    color: #1C145C;
    text-transform: uppercase;
    letter-spacing: .14em;
    margin-bottom: 16px;
    padding-bottom: 10px;
    border-bottom: 1.5px solid rgba(28,20,92,.12);
}

.footer-rsu ul { list-style: none; padding: 0; margin: 0; }
.footer-rsu ul li { margin-bottom: 9px; }
.footer-rsu a { color: #5a5480; text-decoration: none; font-size: 13.5px; transition: .2s ease; display: inline-flex; align-items: center; gap: 5px; }
.footer-rsu ul li a::before { content: '›'; color: #1C145C; opacity: .4; font-size: 15px; line-height: 1; }
.footer-rsu a:hover { color: #1C145C; padding-left: 3px; }

.footer-rsu .footer-contact-row { display: flex; align-items: flex-start; gap: 11px; margin-bottom: 13px; }
.footer-rsu .footer-contact-icon {
    width: 33px; height: 33px;
    border-radius: 8px;
    background: rgba(28,20,92,.07);
    border: 1px solid rgba(28,20,92,.1);
    display: flex; align-items: center; justify-content: center;
    font-size: 14px; color: #1C145C;
    flex-shrink: 0;
}
.footer-rsu .footer-contact-text { font-size: 13px; color: #5a5480; line-height: 1.65; padding-top: 4px; }

.footer-rsu hr {
    height: 1px;
    background: linear-gradient(90deg, rgba(28,20,92,0) 0%, rgba(28,20,92,.12) 30%, rgba(28,20,92,.12) 70%, rgba(28,20,92,0) 100%);
    border: none;
    margin: 36px 0 0;
}

.footer-rsu .footer-bottom { background: rgba(28,20,92,.05); padding: 15px 36px; position: relative; z-index: 1; }
.footer-rsu .footer-copy { font-size: 12.5px; color: #9994bb; display: flex; justify-content: space-between; align-items: center; gap: 12px; }
.footer-rsu .footer-copy-badge { background: rgba(28,20,92,.06); border: 1px solid rgba(28,20,92,.12); border-radius: 20px; padding: 4px 14px; font-size: 11.5px; color: #7a74a0; white-space: nowrap; }
.footer-rsu .footer-accent-dot { display: inline-block; width: 3px; height: 3px; border-radius: 50%; background: #1C145C; opacity: .25; margin: 0 8px; vertical-align: middle; }

@media (max-width: 991px) {
    .footer-rsu { padding: 45px 0 0; }
    .footer-rsu .row > div { margin-bottom: 28px; }
    .footer-rsu .footer-desc { max-width: 100%; }
}

@media (max-width: 767px) {
    .footer-rsu { padding: 40px 0 0; }
    .footer-rsu .container-fluid { padding-left: 20px !important; padding-right: 20px !important; }
    .footer-rsu .footer-social, .footer-rsu .footer-mitra { justify-content: flex-start; }
    .footer-rsu .footer-copy { flex-direction: column; align-items: flex-start; gap: 8px; }
    .footer-rsu .footer-bottom { padding: 15px 20px; }
    .footer-rsu a:hover { padding-left: 0; }
}
</style>


<!-- ========== TOPBAR ========== -->
<div class="topbar">
    <div class="container">
        <div class="topbar-info">
            <span><i class="bi bi-telephone-fill"></i>0834325542</span>
            <span><i class="bi bi-envelope-fill"></i>allam.medica@yahoo.co.id</span>
        </div>
        <div class="topbar-social">
            <a href="https://www.tiktok.com/@rsuallammedicabumiayu?_t=8fLMQk9idhI&_r=1" target="_blank"><i class="bi bi-tiktok"></i></a>
            <a href="https://www.facebook.com/allam.medicabmy?mibextid=LQQJ4d" target="_blank"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/allam.medica/" target="_blank"><i class="bi bi-instagram"></i></a>
        </div>
    </div>
</div>

<!-- ========== FLOATING NAVBAR ========== -->
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
                    <a href="{{ url('/karir') }}" class="drop-item"><i class="bi bi-briefcase"></i>Karir</a>
                    <a href="{{ url('/berita') }}" class="drop-item"><i class="bi bi-newspaper"></i>Berita</a>
                    <a href="{{ url('/video') }}" class="drop-item"><i class="bi bi-play-circle"></i>Video</a>
                </div>
            </div>

            <a href="/layanan"   class="nav-link-pill {{ request()->is('layanan*')  ? 'active' : '' }}">Layanan</a>
            <a href="/artikel"   class="nav-link-pill {{ request()->is('artikel*')  ? 'active' : '' }}">Artikel</a>
            <a href="/download"  class="nav-link-pill {{ request()->is('download*') ? 'active' : '' }}">Download</a>
            <a href="/tentang"   class="nav-link-pill {{ request()->is('tentang*')  ? 'active' : '' }}">Tentang Kami</a>
            <a href="/mutu"      class="nav-link-pill {{ request()->is('mutu*')     ? 'active' : '' }}">Mutu</a>
        </div>

        <div class="nav-cta">
            <a href="/kontak" class="btn-kontak">Kontak</a>
        </div>

        <button class="nav-burger" id="navBurger" aria-label="Toggle menu">
            <span></span><span></span><span></span>
        </button>

        <div class="mobile-menu" id="mobileMenu">
            <a href="/"          class="m-link {{ request()->is('/')        ? 'active' : '' }}">Beranda</a>
            <div class="m-group-label">Menu</div>
            <div class="m-sub">
                <a href="{{ url('/karir') }}"  class="m-link {{ request()->is('karir*')  ? 'active' : '' }}">Karir</a>
                <a href="{{ url('/berita') }}" class="m-link {{ request()->is('berita*') ? 'active' : '' }}">Berita</a>
                <a href="{{ url('/video') }}"  class="m-link {{ request()->is('video*')  ? 'active' : '' }}">Video</a>
            </div>
            <a href="/layanan"  class="m-link {{ request()->is('layanan*')  ? 'active' : '' }}">Layanan</a>
            <a href="/artikel"  class="m-link {{ request()->is('artikel*')  ? 'active' : '' }}">Artikel</a>
            <a href="/download" class="m-link {{ request()->is('download*') ? 'active' : '' }}">Download</a>
            <a href="/tentang"  class="m-link {{ request()->is('tentang*')  ? 'active' : '' }}">Tentang Kami</a>
            <a href="/mutu"     class="m-link {{ request()->is('mutu*')     ? 'active' : '' }}">Mutu</a>
            <a href="/kontak" class="btn-kontak">Kontak</a>
        </div>

    </nav>
</div>


<!-- ========================================================
     HERO MUTU
======================================================== -->
<section class="mutu-hero">
    <div class="container">
        <div class="mutu-hero-eyebrow">
            <span class="dot-live"></span>
            Data diperbarui Triwulan I 2025
        </div>
        <h1>Mutu &amp; Keselamatan Pasien</h1>
        <p>RSU Allam Medica Bumiayu berkomitmen memberikan pelayanan kesehatan yang aman, bermutu, dan berorientasi pada kepuasan pasien sesuai standar akreditasi KARS.</p>

        <div class="hero-stat-row">
            <div class="hero-stat-box">
                <div class="hsb-val">92%</div>
                <div class="hsb-lbl">Kepuasan Pasien</div>
            </div>
            <div class="hero-stat-box">
                <div class="hsb-val">&lt;5 mnt</div>
                <div class="hsb-lbl">Waktu Tanggap IGD</div>
            </div>
            <div class="hero-stat-box">
                <div class="hsb-val">100%</div>
                <div class="hsb-lbl">Identifikasi Pasien</div>
            </div>
            <div class="hero-stat-box">
                <div class="hsb-val">Paripurna</div>
                <div class="hsb-lbl">Status Akreditasi</div>
            </div>
        </div>
    </div>
</section>


<!-- ========================================================
     KONTEN MUTU
======================================================== -->
<div class="container">

    <!-- ── 1. INDIKATOR MUTU NASIONAL ── -->
    <div class="mutu-section">
        <h2 class="section-title">Indikator Mutu Nasional (IMN)</h2>
        <p class="section-sub">12 indikator wajib sesuai Kementerian Kesehatan RI — diperbarui setiap triwulan</p>

        <div class="imn-wrapper">
            <!-- TAB NAV -->
            <div class="imn-tab-nav" role="tablist">
                <button class="imn-tab-btn active" onclick="showImn(0,this)">Kebersihan Tangan</button>
                <button class="imn-tab-btn" onclick="showImn(1,this)">Identifikasi Pasien</button>
                <button class="imn-tab-btn" onclick="showImn(2,this)">Waktu Tunggu Rajal</button>
                <button class="imn-tab-btn" onclick="showImn(3,this)">Tanggap IGD</button>
                <button class="imn-tab-btn" onclick="showImn(4,this)">Visite Dokter</button>
                <button class="imn-tab-btn" onclick="showImn(5,this)">Hasil Kritis Lab</button>
                <button class="imn-tab-btn" onclick="showImn(6,this)">Formularium</button>
                <button class="imn-tab-btn" onclick="showImn(7,this)">Clinical Pathway</button>
                <button class="imn-tab-btn" onclick="showImn(8,this)">Risiko Jatuh</button>
                <button class="imn-tab-btn" onclick="showImn(9,this)">Penundaan Operasi</button>
                <button class="imn-tab-btn" onclick="showImn(10,this)">Kepuasan Pasien</button>
                <button class="imn-tab-btn" onclick="showImn(11,this)">Respons Komplain</button>
            </div>

            <!-- PANE 0: Kebersihan Tangan -->
            <div class="imn-pane active" id="imn-0">
                <div class="imn-card">
                    <div class="imn-desc">
                        <h3>Kepatuhan Kebersihan Tangan</h3>
                        <p>Mengukur kepatuhan seluruh tenaga kesehatan dalam melaksanakan 5 momen kebersihan tangan sesuai standar WHO. Indikator ini mencegah infeksi silang antara petugas dan pasien.</p>
                        <span class="imn-target">Target ≥ 85%</span>
                    </div>
                    <div>
                        <div class="imn-data-box">
                            <div class="imn-data-top">
                                <span class="imn-period">TW I 2025</span>
                                <span class="imn-result">95%</span>
                            </div>
                            <div class="imn-progress-label"><span>Capaian</span><span>Target 85%</span></div>
                            <div class="imn-bar"><div class="imn-fill" style="width:95%"></div></div>
                            <span class="imn-badge tercapai">✓ Tercapai</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PANE 1: Identifikasi -->
            <div class="imn-pane" id="imn-1">
                <div class="imn-card">
                    <div class="imn-desc">
                        <h3>Kepatuhan Identifikasi Pasien</h3>
                        <p>Penilaian kepatuhan petugas dalam melakukan identifikasi minimal 2 identitas pasien (nama dan tanggal lahir/nomor rekam medis) sebelum setiap tindakan medis dilakukan.</p>
                        <span class="imn-target">Target 100%</span>
                    </div>
                    <div>
                        <div class="imn-data-box">
                            <div class="imn-data-top">
                                <span class="imn-period">TW I 2025</span>
                                <span class="imn-result">100%</span>
                            </div>
                            <div class="imn-progress-label"><span>Capaian</span><span>Target 100%</span></div>
                            <div class="imn-bar"><div class="imn-fill" style="width:100%"></div></div>
                            <span class="imn-badge tercapai">✓ Tercapai</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PANE 2: Waktu Tunggu Rajal -->
            <div class="imn-pane" id="imn-2">
                <div class="imn-card">
                    <div class="imn-desc">
                        <h3>Waktu Tunggu Rawat Jalan</h3>
                        <p>Mengukur lama waktu dari pasien mendaftar hingga dilayani dokter di poliklinik. Waktu tunggu yang pendek mencerminkan efisiensi dan kenyamanan pelayanan rawat jalan.</p>
                        <span class="imn-target">Target ≤ 60 menit</span>
                    </div>
                    <div>
                        <div class="imn-data-box">
                            <div class="imn-data-top">
                                <span class="imn-period">TW I 2025</span>
                                <span class="imn-result">52 mnt</span>
                            </div>
                            <div class="imn-progress-label"><span>Rata-rata waktu tunggu</span><span>Target ≤60 mnt</span></div>
                            <div class="imn-bar"><div class="imn-fill" style="width:87%"></div></div>
                            <span class="imn-badge tercapai">✓ Tercapai</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PANE 3: IGD -->
            <div class="imn-pane" id="imn-3">
                <div class="imn-card">
                    <div class="imn-desc">
                        <h3>Waktu Tanggap IGD (ERT)</h3>
                        <p>Mengukur kecepatan tenaga medis IGD dalam merespons dan mulai menangani pasien gawat darurat sejak pasien tiba. Kecepatan respons berdampak langsung pada keselamatan jiwa pasien.</p>
                        <span class="imn-target">Target ≤ 5 menit (kasus gawat)</span>
                    </div>
                    <div>
                        <div class="imn-data-box">
                            <div class="imn-data-top">
                                <span class="imn-period">TW I 2025</span>
                                <span class="imn-result">&lt; 5 mnt</span>
                            </div>
                            <div class="imn-progress-label"><span>Capaian</span><span>Target ≤5 mnt</span></div>
                            <div class="imn-bar"><div class="imn-fill" style="width:100%"></div></div>
                            <span class="imn-badge tercapai">✓ Tercapai</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PANE 4: Visite -->
            <div class="imn-pane" id="imn-4">
                <div class="imn-card">
                    <div class="imn-desc">
                        <h3>Kepatuhan Jam Visite Dokter Spesialis</h3>
                        <p>Mengukur persentase visite dokter spesialis yang dilakukan sesuai jam yang ditetapkan (08.00–14.00 WIB). Ketepatan visite penting untuk pemantauan pasien rawat inap secara optimal.</p>
                        <span class="imn-target">Target ≥ 80%</span>
                    </div>
                    <div>
                        <div class="imn-data-box">
                            <div class="imn-data-top">
                                <span class="imn-period">TW I 2025</span>
                                <span class="imn-result">84%</span>
                            </div>
                            <div class="imn-progress-label"><span>Capaian</span><span>Target 80%</span></div>
                            <div class="imn-bar"><div class="imn-fill" style="width:84%"></div></div>
                            <span class="imn-badge tercapai">✓ Tercapai</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PANE 5: Lab -->
            <div class="imn-pane" id="imn-5">
                <div class="imn-card">
                    <div class="imn-desc">
                        <h3>Waktu Lapor Hasil Kritis Laboratorium</h3>
                        <p>Mengukur kecepatan petugas laboratorium dalam melaporkan nilai kritis pemeriksaan kepada dokter penanggung jawab pasien. Keterlambatan laporan kritis dapat membahayakan nyawa pasien.</p>
                        <span class="imn-target">Target 100% dilaporkan ≤ 30 menit</span>
                    </div>
                    <div>
                        <div class="imn-data-box">
                            <div class="imn-data-top">
                                <span class="imn-period">TW I 2025</span>
                                <span class="imn-result">98%</span>
                            </div>
                            <div class="imn-progress-label"><span>Dilaporkan ≤30 mnt</span><span>Target 100%</span></div>
                            <div class="imn-bar"><div class="imn-fill warning" style="width:98%"></div></div>
                            <span class="imn-badge monitor">⚠ Perlu Peningkatan</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PANE 6: Formularium -->
            <div class="imn-pane" id="imn-6">
                <div class="imn-card">
                    <div class="imn-desc">
                        <h3>Kepatuhan Penggunaan Formularium Nasional</h3>
                        <p>Mengukur persentase resep dokter yang menggunakan obat sesuai Formularium Nasional. Berlaku untuk pasien peserta JKN/BPJS Kesehatan guna menjamin penggunaan obat yang rasional dan efisien.</p>
                        <span class="imn-target">Target ≥ 80%</span>
                    </div>
                    <div>
                        <div class="imn-data-box">
                            <div class="imn-data-top">
                                <span class="imn-period">TW I 2025</span>
                                <span class="imn-result">91%</span>
                            </div>
                            <div class="imn-progress-label"><span>Capaian</span><span>Target 80%</span></div>
                            <div class="imn-bar"><div class="imn-fill" style="width:91%"></div></div>
                            <span class="imn-badge tercapai">✓ Tercapai</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PANE 7: Clinical Pathway -->
            <div class="imn-pane" id="imn-7">
                <div class="imn-card">
                    <div class="imn-desc">
                        <h3>Kepatuhan terhadap Clinical Pathway</h3>
                        <p>Mengukur kepatuhan dokter dan tenaga kesehatan dalam menjalankan alur klinis terstandar untuk diagnosis tertentu. Clinical pathway memastikan pelayanan yang terstruktur, efisien, dan berbasis bukti.</p>
                        <span class="imn-target">Target ≥ 80%</span>
                    </div>
                    <div>
                        <div class="imn-data-box">
                            <div class="imn-data-top">
                                <span class="imn-period">TW I 2025</span>
                                <span class="imn-result">88%</span>
                            </div>
                            <div class="imn-progress-label"><span>Capaian</span><span>Target 80%</span></div>
                            <div class="imn-bar"><div class="imn-fill" style="width:88%"></div></div>
                            <span class="imn-badge tercapai">✓ Tercapai</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PANE 8: Risiko Jatuh -->
            <div class="imn-pane" id="imn-8">
                <div class="imn-card">
                    <div class="imn-desc">
                        <h3>Kepatuhan Pencegahan Risiko Pasien Jatuh</h3>
                        <p>Memantau penerapan asesmen risiko jatuh dan tindakan pencegahan yang sesuai pada pasien rawat inap. Jatuh adalah insiden yang dapat dicegah dan merupakan salah satu sasaran keselamatan pasien utama.</p>
                        <span class="imn-target">Target 100%</span>
                    </div>
                    <div>
                        <div class="imn-data-box">
                            <div class="imn-data-top">
                                <span class="imn-period">TW I 2025</span>
                                <span class="imn-result">100%</span>
                            </div>
                            <div class="imn-progress-label"><span>Capaian</span><span>Target 100%</span></div>
                            <div class="imn-bar"><div class="imn-fill" style="width:100%"></div></div>
                            <span class="imn-badge tercapai">✓ Tercapai</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PANE 9: Penundaan Operasi -->
            <div class="imn-pane" id="imn-9">
                <div class="imn-card">
                    <div class="imn-desc">
                        <h3>Penundaan Operasi Elektif</h3>
                        <p>Mengukur persentase operasi terjadwal yang mengalami penundaan dari jadwal yang telah ditentukan. Penundaan yang tinggi berdampak pada kualitas pelayanan dan kepercayaan pasien.</p>
                        <span class="imn-target">Target ≤ 5% kasus tertunda</span>
                    </div>
                    <div>
                        <div class="imn-data-box">
                            <div class="imn-data-top">
                                <span class="imn-period">TW I 2025</span>
                                <span class="imn-result">3,2%</span>
                            </div>
                            <div class="imn-progress-label"><span>Kasus penundaan</span><span>Target ≤5%</span></div>
                            <div class="imn-bar"><div class="imn-fill" style="width:64%"></div></div>
                            <span class="imn-badge tercapai">✓ Tercapai</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PANE 10: Kepuasan -->
            <div class="imn-pane" id="imn-10">
                <div class="imn-card">
                    <div class="imn-desc">
                        <h3>Kepuasan Pasien dan Keluarga</h3>
                        <p>Hasil survei kepuasan yang dilakukan setiap triwulan kepada pasien rawat inap dan rawat jalan. Indeks kepuasan mencerminkan kualitas pengalaman pasien secara keseluruhan di RSU Allam Medica.</p>
                        <span class="imn-target">Target ≥ 76,61 (skala 100)</span>
                    </div>
                    <div>
                        <div class="imn-data-box">
                            <div class="imn-data-top">
                                <span class="imn-period">TW I 2025</span>
                                <span class="imn-result">92</span>
                            </div>
                            <div class="imn-progress-label"><span>Indeks kepuasan</span><span>Target ≥76,61</span></div>
                            <div class="imn-bar"><div class="imn-fill" style="width:92%"></div></div>
                            <span class="imn-badge tercapai">✓ Tercapai</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PANE 11: Respons Komplain -->
            <div class="imn-pane" id="imn-11">
                <div class="imn-card">
                    <div class="imn-desc">
                        <h3>Kecepatan Respons terhadap Komplain</h3>
                        <p>Mengukur persentase pengaduan pasien yang direspons dan ditindaklanjuti dalam waktu ≤ 24 jam (non-darurat) atau ≤ 1 jam (darurat). Penanganan komplain yang cepat menunjukkan komitmen terhadap pelayanan prima.</p>
                        <span class="imn-target">Target 100%</span>
                    </div>
                    <div>
                        <div class="imn-data-box">
                            <div class="imn-data-top">
                                <span class="imn-period">TW I 2025</span>
                                <span class="imn-result">100%</span>
                            </div>
                            <div class="imn-progress-label"><span>Capaian</span><span>Target 100%</span></div>
                            <div class="imn-bar"><div class="imn-fill" style="width:100%"></div></div>
                            <span class="imn-badge tercapai">✓ Tercapai</span>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- end imn-wrapper -->
    </div><!-- end mutu-section -->

    <hr class="mutu-divider">

    <!-- ── 2. AKREDITASI ── -->
    <div class="mutu-section">
        <h2 class="section-title">Akreditasi &amp; Sertifikasi</h2>
        <p class="section-sub">Pengakuan resmi terhadap standar mutu pelayanan RSU Allam Medica Bumiayu</p>

        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="akred-card">
                    <div class="akred-icon"><i class="bi bi-patch-check-fill"></i></div>
                    <div class="akred-body">
                        <h3>Akreditasi KARS</h3>
                        <p>Terakreditasi oleh Komisi Akreditasi Rumah Sakit (KARS) Nasional sebagai bukti pemenuhan standar mutu dan keselamatan pelayanan.</p>
                        <span class="akred-pill">Paripurna · Berlaku s.d. 2027</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="akred-card">
                    <div class="akred-icon"><i class="bi bi-file-earmark-check-fill"></i></div>
                    <div class="akred-body">
                        <h3>Izin Operasional</h3>
                        <p>Memiliki izin operasional resmi dari Pemerintah Kabupaten Brebes dan Kemenkes RI sebagai rumah sakit umum tipe C.</p>
                        <span class="akred-pill">Aktif · Tipe C</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="akred-card">
                    <div class="akred-icon"><i class="bi bi-heart-pulse-fill"></i></div>
                    <div class="akred-body">
                        <h3>Provider BPJS Kesehatan</h3>
                        <p>Mitra resmi BPJS Kesehatan untuk pelayanan peserta JKN di wilayah Bumiayu dan sekitarnya.</p>
                        <span class="akred-pill">Aktif · FKRTL</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="mutu-divider">

    <!-- ── 3. 6 SKP ── -->
    <div class="mutu-section">
        <h2 class="section-title">6 Sasaran Keselamatan Pasien (SKP)</h2>
        <p class="section-sub">Standar internasional yang diterapkan di RSU Allam Medica sesuai ketentuan KARS</p>

        <div class="row g-2 mb-4">
            <div class="col-md-6">
                <div class="skp-item">
                    <div class="skp-num">1</div>
                    <span>Ketepatan identifikasi pasien</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="skp-item">
                    <div class="skp-num">2</div>
                    <span>Komunikasi efektif antar tenaga kesehatan</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="skp-item">
                    <div class="skp-num">3</div>
                    <span>Keamanan obat kewaspadaan tinggi (<em>high-alert</em>)</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="skp-item">
                    <div class="skp-num">4</div>
                    <span>Ketepatan lokasi, prosedur, dan pasien operasi</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="skp-item">
                    <div class="skp-num">5</div>
                    <span>Pengurangan risiko infeksi terkait pelayanan</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="skp-item">
                    <div class="skp-num">6</div>
                    <span>Pengurangan risiko cedera akibat pasien jatuh</span>
                </div>
            </div>
        </div>
    </div>

    <hr class="mutu-divider">

    <!-- ── 4. PROGRAM MUTU ── -->
    <div class="mutu-section">
        <h2 class="section-title">Program Peningkatan Mutu</h2>
        <p class="section-sub">Upaya berkelanjutan RSU Allam Medica dalam menjaga dan meningkatkan standar pelayanan</p>

        <div class="row g-3 mb-4">
            <div class="col-md-4 col-sm-6">
                <div class="program-card">
                    <span class="p-icon"><i class="bi bi-people-fill"></i></span>
                    <h3>Komite Mutu &amp; Keselamatan</h3>
                    <p>Tim khusus yang memantau dan mengevaluasi mutu layanan secara berkala setiap bulan bersama seluruh unit pelayanan.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="program-card">
                    <span class="p-icon"><i class="bi bi-bar-chart-line-fill"></i></span>
                    <h3>Audit Klinis Rutin</h3>
                    <p>Evaluasi rekam medis dan prosedur klinis dilakukan secara periodik untuk menjamin standar dan konsistensi pelayanan.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="program-card">
                    <span class="p-icon"><i class="bi bi-megaphone-fill"></i></span>
                    <h3>Pelaporan Insiden</h3>
                    <p>Sistem pelaporan insiden keselamatan pasien yang terbuka, tanpa hukuman, dan berorientasi pada pembelajaran bersama.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="program-card">
                    <span class="p-icon"><i class="bi bi-star-fill"></i></span>
                    <h3>Survei Kepuasan</h3>
                    <p>Survei triwulanan kepada pasien dan keluarga untuk mengukur tingkat kepuasan dan harapan terhadap layanan kami.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="program-card">
                    <span class="p-icon"><i class="bi bi-mortarboard-fill"></i></span>
                    <h3>Pelatihan Staf</h3>
                    <p>Program pelatihan rutin bagi seluruh tenaga kesehatan tentang mutu, keselamatan pasien, dan prosedur klinis terkini.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="program-card">
                    <span class="p-icon"><i class="bi bi-search"></i></span>
                    <h3>Supervisi &amp; Monitoring</h3>
                    <p>Pengawasan lapangan berkala oleh komite mutu untuk memastikan kepatuhan prosedur di setiap unit pelayanan.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ── 5. LAPORAN DOWNLOAD ── -->
    <div class="laporan-box">
        <div class="lb-text">
            <p><i class="bi bi-file-earmark-arrow-down me-2"></i>Laporan Indikator Mutu Nasional Triwulanan</p>
            <p>Laporan lengkap beserta analisis capaian dan rencana tindak lanjut tersedia untuk diunduh.</p>
        </div>
        <a href="#" class="btn-unduh">
            <i class="bi bi-download"></i> Unduh Laporan TW I 2025
        </a>
    </div>

    <!-- Catatan -->
    <p class="text-center pb-4" style="font-size:12.5px; color:#94a3b8;">
        Data indikator mutu diperbarui setiap triwulan oleh Komite Mutu RSU Allam Medica Bumiayu.<br>
        Informasi lebih lanjut: <strong style="color:#1C145C;">(0289) 430822</strong> atau <strong style="color:#1C145C;">allam.medica@yahoo.co.id</strong>
    </p>

</div><!-- end container -->


<!-- ========================================================
     FOOTER
======================================================== -->
<footer class="footer-rsu">

    <div class="footer-ornament"></div>
    <div class="footer-ornament2"></div>

    <div class="container-fluid px-lg-5 px-4">
        <div class="row justify-content-between">

            <!-- BRAND -->
            <div class="col-lg-4 col-md-6">
                <img src="{{ asset('images/beranda/logo-almed.png') }}" class="footer-logo" alt="Logo RSU Allam Medica">
                <h5 class="footer-title">RSU Allam Medica Bumiayu</h5>
                <p class="footer-desc">Jl. Pangeran Diponegoro No. 609, Jatisawit, Bumiayu, Kabupaten Brebes, Jawa Tengah 52273</p>
                <div class="footer-social">
                    <a href="https://www.tiktok.com/@rsuallammedicabumiayu?_t=8fLMQk9idhI&_r=1" target="_blank" title="TikTok"><i class="bi bi-tiktok"></i></a>
                    <a href="https://www.facebook.com/allam.medicabmy?mibextid=LQQJ4d" target="_blank" title="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/allam.medica/" target="_blank" title="Instagram"><i class="bi bi-instagram"></i></a>
                </div>
                <div class="footer-mitra-label">Akreditasi & Mitra</div>
                <div class="footer-mitra">
                    <img src="{{ asset('images/beranda/paripurna.png') }}" alt="Akreditasi Paripurna">
                    <img src="{{ asset('images/beranda/bpjs.png') }}" alt="BPJS Kesehatan">
                </div>
            </div>

            <!-- TAUTAN CEPAT -->
            <div class="col-lg-2 col-md-6">
                <h6 class="footer-heading">Tautan Cepat</h6>
                <ul>
                    <li><a href="{{ route('beranda') }}">Beranda</a></li>
                    <li><a href="layanan">Layanan</a></li>
                    <li><a href="artikel">Artikel</a></li>
                    <li><a href="download">Download</a></li>
                    <li><a href="tentang">Tentang Kami</a></li>
                    <li><a href="mutu">Mutu</a></li>
                    <li><a href="kontak">Kontak</a></li>
                </ul>
            </div>

            <!-- MENU -->
            <div class="col-lg-2 col-md-6">
                <h6 class="footer-heading">Menu</h6>
                <ul>
                    <li><a href="video">Video</a></li>
                    <li><a href="karir">Karir</a></li>
                    <li><a href="berita">Berita</a></li>
                </ul>
            </div>

            <!-- HUBUNGI KAMI -->
            <div class="col-lg-3 col-md-12">
                <h6 class="footer-heading">Hubungi Kami</h6>
                <div class="footer-contact-row">
                    <div class="footer-contact-icon"><i class="bi bi-telephone-fill"></i></div>
                    <div class="footer-contact-text">(0289) 430822</div>
                </div>
                <div class="footer-contact-row">
                    <div class="footer-contact-icon"><i class="bi bi-envelope-fill"></i></div>
                    <div class="footer-contact-text">allam.medica@yahoo.co.id</div>
                </div>
                <div class="footer-contact-row">
                    <div class="footer-contact-icon"><i class="bi bi-clock-fill"></i></div>
                    <div class="footer-contact-text">IGD: 24 Jam<br>Rawat Jalan: Sen – Sab 07.00 – 21.00</div>
                </div>
                <div class="footer-contact-row">
                    <div class="footer-contact-icon"><i class="bi bi-geo-alt-fill"></i></div>
                    <div class="footer-contact-text">Jl. Pangeran Diponegoro No.609,<br>Bumiayu, Brebes</div>
                </div>
            </div>

        </div>
        <hr>
    </div>

    <div class="footer-bottom">
        <div class="container-fluid px-lg-5 px-4">
            <div class="footer-copy">
                <span>© 2026 RSU Allam Medica <span class="footer-accent-dot"></span> Hak Cipta Dilindungi</span>
                <span class="footer-copy-badge">Melayani dengan Sepenuh Hati</span>
            </div>
        </div>
    </div>

</footer>


<!-- ========================================
     SCRIPTS
======================================== -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
/* ── Navbar scroll ── */
window.addEventListener('scroll', () => {
    document.getElementById('mainNavbar').classList.toggle('scrolled', window.scrollY > 30);
});

/* ── Burger mobile ── */
document.getElementById('navBurger').addEventListener('click', function () {
    this.classList.toggle('open');
    document.getElementById('mobileMenu').classList.toggle('open');
});

/* ── Tab IMN ── */
function showImn(idx, btn) {
    document.querySelectorAll('.imn-tab-btn').forEach(b => b.classList.remove('active'));
    document.querySelectorAll('.imn-pane').forEach(p => p.classList.remove('active'));
    btn.classList.add('active');
    document.getElementById('imn-' + idx).classList.add('active');
}
</script>

</html>