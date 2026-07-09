<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>RSU Allam Medica - Download</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('assets/logoalmed.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
<style>
@font-face {
    font-family: 'GothamBlack';
    src: url('{{ asset('fonts/Gotham-Black.otf') }}') format('opentype');
    font-weight: 900; font-style: normal;
}
h1, h2, h3, h4 { font-family: 'GothamBlack', sans-serif !important; }

body {
    font-family: 'Segoe UI', sans-serif;
    background: #ffffff;
    overflow-x: hidden;
    position: relative;
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

.nav-burger { display:none;flex-direction:column;gap:5px;cursor:pointer;border:none;background:transparent;padding:6px;position:relative;z-index:2; }
.nav-burger span { width:22px;height:2px;background:#1C145C;border-radius:2px;display:block;transition:.3s; }
.nav-burger.open span:nth-child(1) { transform:translateY(7px) rotate(45deg); }
.nav-burger.open span:nth-child(2) { opacity:0; }
.nav-burger.open span:nth-child(3) { transform:translateY(-7px) rotate(-45deg); }

/* ============================================================
   KONTAK MEGA DROPDOWN (desktop)
============================================================ */
.kontak-wrap { position: relative; }

.btn-kontak {
    padding:10px 22px; border-radius:50px; background:#1C145C;
    color:#fff!important; text-decoration:none!important; font-size:14px;
    font-weight:600; display:inline-flex; align-items:center; gap:6px;
    border:none; box-shadow:0 8px 20px rgba(28,20,92,.25);
    transition:.2s; cursor:pointer; font-family:inherit;
}
.btn-kontak:hover { background:#2a1e8a; transform:translateY(-1px); }

.kontak-mega {
    position: absolute; top: calc(100% + 18px); right: 0;
    width: 780px; max-width: calc(100vw - 40px);
    background: rgba(255,255,255,0.97);
    backdrop-filter: blur(28px) saturate(180%);
    border: 1px solid rgba(255,255,255,0.5); border-radius: 24px;
    box-shadow: 0 24px 60px rgba(15,23,42,.16), 0 2px 12px rgba(15,23,42,.06);
    padding: 28px; opacity: 0; visibility: hidden;
    transform: translateY(12px);
    transition: opacity .26s, visibility .26s, transform .26s;
    z-index: 9999;
}
.kontak-wrap:hover .kontak-mega,
.kontak-mega:hover,
.kontak-mega.open { opacity: 1; visibility: visible; transform: translateY(0); }

.kontak-mega::before {
    content:''; position:absolute; top:0; left:24px; right:24px; height:2px;
    background:linear-gradient(90deg,transparent,rgba(28,20,92,.2) 50%,transparent);
    border-radius:2px;
}

.kontak-mega-grid { display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 22px; }

.kontak-form-panel {
    background: #1C145C; border-radius: 16px; padding: 22px 20px;
    position: relative; overflow: hidden;
}
.kontak-form-panel .form-ornament {
    position: absolute; bottom: -50px; right: -50px; width: 160px; height: 160px;
    opacity: .07; background-image: url('{{ asset("images/beranda/ornamen.png") }}');
    background-size: contain; background-repeat: no-repeat;
    pointer-events: none; filter: brightness(10);
}
.kontak-form-panel > *:not(.form-ornament) { position: relative; z-index: 1; }

.kontak-form-sublabel {
    font-size: 10px; font-weight: 700; color: rgba(254,252,241,.45);
    text-transform: uppercase; letter-spacing: .12em; margin-bottom: 4px;
}
.kontak-form-title {
    font-family: 'GothamBlack', sans-serif !important;
    font-size: 19px; color: #FEFCF1; margin-bottom: 16px; line-height: 1.2;
}
.kontak-form-title span {
    background: linear-gradient(90deg, #a89eff, #FEFCF1);
    -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
}

.ck-field { margin-bottom: 10px; }
.ck-field label { display:block;font-size:10.5px;color:rgba(254,252,241,.55);margin-bottom:3px;letter-spacing:.04em; }
.ck-field input, .ck-field textarea {
    width: 100%; background: rgba(255,255,255,.1);
    border: 1px solid rgba(254,252,241,.18); border-radius: 7px;
    padding: 8px 11px; font-size: 12.5px; color: #FEFCF1;
    outline: none; transition: .2s; font-family: inherit; box-sizing: border-box;
}
.ck-field input::placeholder, .ck-field textarea::placeholder { color: rgba(254,252,241,.35); }
.ck-field input:focus, .ck-field textarea:focus { border-color: rgba(254,252,241,.5); background:rgba(255,255,255,.15); }
.ck-field textarea { resize:vertical; min-height:72px; }
.ck-row { display:grid; grid-template-columns:1fr 1fr; gap:8px; }

.btn-send-mega {
    margin-top: 12px; width: 100%; padding: 10px;
    background: #FEFCF1; color: #1C145C; border: none; border-radius: 50px;
    font-size: 13px; font-weight: 700; cursor: pointer; transition: .2s;
    display: flex; align-items: center; justify-content: center; gap: 7px; font-family: inherit;
}
.btn-send-mega:hover { background:#fff; transform:translateY(-1px); box-shadow:0 4px 14px rgba(0,0,0,.18); }

.kontak-info-panel { display:flex; flex-direction:column; gap:14px; }
.kontak-info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
.kontak-info-card {
    background: #f8f7ff; border: 1px solid #ece9f8;
    border-radius: 12px; padding: 12px; text-align: center;
}
.kontak-info-icon {
    width: 36px; height: 36px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 16px; margin: 0 auto 8px;
}
.ci-phone { background:rgba(25,135,84,.12);  color:#198754; }
.ci-email { background:rgba(220,53,69,.1);   color:#dc3545; }
.ci-igd   { background:rgba(245,158,11,.12); color:#d97706; }
.ci-map   { background:rgba(28,20,92,.1);    color:#1C145C; }

.kontak-info-title { font-size:11px; font-weight:700; color:#1C145C; margin-bottom:2px; }
.kontak-info-val   { font-size:11.5px; color:#5a5480; line-height:1.45; }
.kontak-map-box { border-radius: 12px; overflow:hidden; border:1px solid #e8e4d8; flex:1; }
.kontak-map-box iframe { width:100%; height:140px; display:block; border:0; }

/* ============================================================
   DRAWER (MOBILE)
============================================================ */
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
.d-accordion-btn { display:flex;align-items:center;justify-content:space-between;gap:8px;padding:10px 12px;border-radius:12px;font-size:14px;font-weight:600;color:#1e293b;cursor:pointer;background:none;border:none;width:100%;font-family:'Segoe UI',sans-serif;transition:.16s; }
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

.btn-kontak-drawer {
    border-radius:14px; display:block; text-align:center; padding:12px 22px;
    background:#1C145C; color:#fff!important; text-decoration:none!important;
    font-size:14px; font-weight:600; border:none; cursor:pointer;
    font-family:inherit; width:100%; transition:.2s;
}
.btn-kontak-drawer:hover { background:#2a1e8a; }

/* ============================================================
   BOTTOM SHEET (mobile kontak)
============================================================ */
.bs-overlay {
    display:none; position:fixed; inset:0;
    background:rgba(15,23,42,0); z-index:10000001; transition:background .3s;
}
.bs-overlay.show { display:block; background:rgba(15,23,42,0.5); }

.bs-sheet {
    position:fixed; left:0; right:0; bottom:0;
    z-index:10000002; background:#fff;
    border-radius:24px 24px 0 0;
    box-shadow:0 -8px 40px rgba(15,23,42,.18);
    transform:translateY(100%);
    transition:transform .35s cubic-bezier(.4,0,.2,1);
    height:92dvh; display:flex; flex-direction:column; overflow:visible;
}
.bs-sheet.open { transform:translateY(0); }

.bs-handle-wrap {
    flex-shrink:0; display:flex; align-items:center;
    justify-content:center; padding:10px 16px 6px;
}
.bs-handle { width:40px; height:4px; border-radius:2px; background:rgba(0,0,0,.15); }

.bs-header {
    flex-shrink:0; display:flex; align-items:center;
    justify-content:space-between; padding:0 18px 14px;
    border-bottom:1px solid rgba(0,0,0,.07);
}
.bs-title { font-family:'GothamBlack',sans-serif; font-size:17px; color:#1C145C; margin:0; }
.bs-close {
    width:32px; height:32px; border-radius:50%;
    background:rgba(28,20,92,.08); border:none;
    display:flex; align-items:center; justify-content:center;
    color:#1C145C; cursor:pointer; font-size:15px;
}

.bs-body {
    flex:1; min-height:0;
    overflow-y:auto; -webkit-overflow-scrolling:touch;
    overscroll-behavior:contain;
    padding:18px 18px calc(18px + env(safe-area-inset-bottom)) 18px;
    display:flex; flex-direction:column; gap:16px;
}

.bs-form-card {
    background:#1C145C; border-radius:14px; padding:18px 16px;
    position:relative; overflow:hidden; flex-shrink:0;
}
.bs-form-card .bs-form-ornament {
    position:absolute; bottom:-40px; right:-40px; width:130px; height:130px;
    opacity:.07; background-image:url('{{ asset("images/beranda/ornamen.png") }}');
    background-size:contain; background-repeat:no-repeat;
    pointer-events:none; filter:brightness(10);
}
.bs-form-card > *:not(.bs-form-ornament) { position:relative; z-index:1; }

.bs-sublabel {
    font-size:10px; font-weight:700; color:rgba(254,252,241,.45);
    text-transform:uppercase; letter-spacing:.12em; margin-bottom:3px;
}
.bs-form-title { font-family:'GothamBlack',sans-serif!important; font-size:17px; color:#FEFCF1; margin-bottom:14px; }
.bs-form-title span {
    background:linear-gradient(90deg,#a89eff,#FEFCF1);
    -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
}

.bs-form-card .ck-field { margin-bottom:9px; }
.bs-form-card .ck-field label { font-size:10px; color:rgba(254,252,241,.5); margin-bottom:2px; }
.bs-form-card .ck-field input,
.bs-form-card .ck-field textarea {
    font-size:12px; padding:7px 10px; border-radius:7px;
    background:rgba(255,255,255,.1); border:1px solid rgba(254,252,241,.18);
    color:#FEFCF1; width:100%; box-sizing:border-box; outline:none; font-family:inherit; transition:.2s;
}
.bs-form-card .ck-field input::placeholder,
.bs-form-card .ck-field textarea::placeholder { color:rgba(254,252,241,.35); }
.bs-form-card .ck-field input:focus,
.bs-form-card .ck-field textarea:focus { border-color:rgba(254,252,241,.5); background:rgba(255,255,255,.15); }
.bs-form-card .ck-field textarea { min-height:68px; resize:vertical; }

.btn-send-bs {
    width:100%; padding:11px; background:#FEFCF1; color:#1C145C;
    border:none; border-radius:50px; font-size:13px; font-weight:700;
    cursor:pointer; transition:.2s; display:flex; align-items:center;
    justify-content:center; gap:7px; font-family:inherit; margin-top:10px;
}
.btn-send-bs:hover { background:#fff; box-shadow:0 4px 14px rgba(0,0,0,.18); }

.bs-info-grid { display:grid; grid-template-columns:1fr 1fr; gap:10px; flex-shrink:0; }
.bs-info-card {
    background:#f8f7ff; border:1px solid #ece9f8;
    border-radius:12px; padding:12px; text-align:center;
}
.bs-info-icon {
    width:34px; height:34px; border-radius:9px; display:flex;
    align-items:center; justify-content:center; font-size:15px; margin:0 auto 7px;
}
.bs-info-title { font-size:11px; font-weight:700; color:#1C145C; margin-bottom:1px; }
.bs-info-val   { font-size:11px; color:#5a5480; line-height:1.45; }

.bs-map-box { border-radius:12px; overflow:hidden; border:1px solid #e8e4d8; flex-shrink:0; }
.bs-map-box iframe { width:100%; height:160px; display:block; border:0; }

/* ============================================================
   RESPONSIVE NAVBAR
============================================================ */
@media(max-width:1100px) { .nav-link-pill{ padding:7px 11px; font-size:13px; } }
@media(max-width:991px) {
    body { padding-top: calc(38px + 64px); }
    .navbar-float-wrap { top:38px; padding:4px 12px; }
    .navbar-float { border-radius:26px; padding:8px 14px; }
    .nav-links, .nav-cta { display:none; }
    .nav-burger { display:flex; }
    .kontak-mega { display:none !important; }
}
@media(max-width:480px) { .navbar-float { border-radius:22px; } }


/* ================================================================
   BODY OVERRIDE (halaman download tidak punya padding extra)
================================================================ */
body { padding-top: 38px; }
@media(max-width:991px){ body { padding-top: 38px; } }

/* ================================================================
   BANNER
================================================================ */
.banner-download {
    position: relative; 
    height: 360px; 
    width: 100%;
    display: flex; a
    lign-items: center; 
    color: #fff; 
    overflow: hidden;
}
.banner-download img {
    position: absolute; width: 100%; height: 100%; object-fit: cover;
    top: 0; left: 0; z-index: 1; transform: scale(1.04); filter: brightness(0.75);
}
.banner-overlay {
    position: absolute; inset: 0; z-index: 2;
    background: linear-gradient(105deg, rgba(28,20,92,0.97) 0%, rgba(28,20,92,0.82) 45%, rgba(28,20,92,0.30) 100%);
}
.banner-overlay::after {
    content: ''; position: absolute; inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
    opacity: .18; pointer-events: none;
}
.banner-deco { position:absolute;right:-60px;top:-60px;width:340px;height:340px;border-radius:50%;border:60px solid rgba(255,255,255,0.04);z-index:3;pointer-events:none; }
.banner-deco-2 { position:absolute;right:80px;bottom:-100px;width:220px;height:220px;border-radius:50%;border:40px solid rgba(255,255,255,0.03);z-index:3;pointer-events:none; }

.banner-content { position:relative;z-index:4;width:100%;max-width:720px;padding:110px 80px 85px; }

.banner-breadcrumb {
    display: inline-flex; align-items: center; gap: 6px;
    background: rgba(255,255,255,0.10); border: 1px solid rgba(255,255,255,0.18);
    border-radius: 50px; padding: 4px 14px; font-size: 11.5px;
    color: rgba(255,255,255,0.75); letter-spacing: 0.04em; margin-bottom: 14px;
}
.banner-breadcrumb i { font-size: 10px; opacity: 0.7; }

.banner-title { font-size: 30px; font-weight: 800; line-height: 1.2; margin-bottom: 10px; letter-spacing: -0.3px; }
.banner-title span { color: rgba(255,255,255,0.55); }
.banner-desc { font-size: 13.5px; line-height: 1.75; color: rgba(255,255,255,0.80); max-width: 520px; }

.banner-stats {
    position: absolute; bottom: 18px; left: 0; right: 0; z-index: 4;
    display: flex; align-items: center; justify-content: flex-start; gap: 0; padding: 0 80px;
}
.banner-stat-item {
    display: flex; align-items: center; gap: 8px;
    padding: 10px 22px 10px 0; margin-right: 22px;
    border-right: 1px solid rgba(255,255,255,0.15);
}
.banner-stat-item:last-child { border-right: none; }
.banner-stat-item i { font-size: 13px; color: rgba(255,255,255,0.55); }
.banner-stat-item span { font-size: 12px; color: rgba(255,255,255,0.72); }

/* ================================================================
   SECTION WRAPPER
================================================================ */
.download-section {
    position: relative; overflow: hidden; padding: 48px 0 64px;
}
.download-section::before {
    content:''; position:absolute; top:120px; right:-200px; width:380px; height:380px;
    background:url('{{ asset("images/beranda/ornamen.png") }}') center/contain no-repeat;
    opacity:.04; pointer-events:none; z-index:0;
}
.download-section::after {
    content:''; position:absolute; left:-200px; bottom:-20px; width:420px; height:420px;
    background:url('{{ asset("images/beranda/ornamen.png") }}') center/contain no-repeat;
    opacity:.035; pointer-events:none; z-index:0;
}
.download-section .container { position:relative; z-index:2; }

.download-section-header { text-align: center; margin-bottom: 36px; }

.section-eyebrow {
    display: inline-flex; align-items: center; gap: 7px;
    background: rgba(28,20,92,0.07); border: 1px solid rgba(28,20,92,0.12);
    border-radius: 50px; padding: 5px 16px; font-size: 11.5px; font-weight: 700;
    color: #1C145C; letter-spacing: 0.06em; text-transform: uppercase; margin-bottom: 14px;
}
.section-eyebrow i { font-size: 11px; }
.section-title-main { font-size: 26px; font-weight: 800; color: #0f0b3b; letter-spacing: -0.3px; margin-bottom: 8px; }
.section-subtitle-main { font-size: 14px; color: #64748b; max-width: 480px; margin: 0 auto; line-height: 1.65; }

/* ================================================================
   DOWNLOAD CARD
================================================================ */
.download-card {
    background: #ffffff; border-radius: 20px; padding: 22px;
    box-shadow: 0 2px 8px rgba(28,20,92,0.04), 0 8px 24px rgba(28,20,92,0.06);
    border: 1px solid rgba(28,20,92,0.07); height: 100%;
    display: flex; flex-direction: column;
    transition: transform 0.28s ease, box-shadow 0.28s ease, border-color 0.28s ease;
    position: relative; overflow: hidden;
}
.download-card::before {
    content:''; position:absolute; top:0; left:0; right:0; height:3px;
    background: linear-gradient(90deg,#1C145C,#4a3fcc);
    border-radius: 20px 20px 0 0; opacity:0; transition: opacity 0.28s ease;
}
.download-card:hover { transform: translateY(-5px); box-shadow: 0 4px 16px rgba(28,20,92,0.06), 0 20px 40px rgba(28,20,92,0.11); border-color: rgba(28,20,92,0.14); }
.download-card:hover::before { opacity: 1; }

.download-header { display: flex; align-items: flex-start; gap: 14px; margin-bottom: 14px; }
.download-icon {
    width: 46px; height: 46px; border-radius: 13px;
    background: linear-gradient(135deg,#1C145C,#3d30b0); color: #fff;
    display: flex; align-items: center; justify-content: center;
    font-size: 19px; flex-shrink: 0; box-shadow: 0 4px 14px rgba(28,20,92,0.25);
}
.download-title { font-size: 14.5px; font-weight: 700; color: #1a1a2e; line-height: 1.4; flex: 1; padding-top: 2px; }

.download-badge {
    display: inline-flex; align-items: center; gap: 5px;
    background: rgba(28,20,92,0.07); color: #1C145C; border-radius: 50px;
    padding: 4px 12px; font-size: 11.5px; font-weight: 600; margin-bottom: 10px; letter-spacing: 0.02em;
}
.download-desc { font-size: 13px; color: #64748b; line-height: 1.65; flex: 1; margin-bottom: 0; }

.download-line { height: 1px; background: linear-gradient(90deg,rgba(28,20,92,0.08),rgba(28,20,92,0.02)); margin: 14px 0; }

.download-meta { display: flex; flex-direction: column; gap: 6px; margin-bottom: 14px; }
.download-info { font-size: 12px; color: #94a3b8; display: flex; align-items: center; gap: 7px; }
.download-info i { color: #1C145C; opacity: 0.45; font-size: 11.5px; width: 14px; }

.btn-download {
    width: 100%; background: #1C145C; border: none; color: #fff;
    padding: 11px 16px; border-radius: 12px; font-size: 13px; font-weight: 600;
    display: flex; align-items: center; justify-content: center; gap: 8px;
    cursor: pointer; transition: background 0.22s ease, transform 0.22s ease, box-shadow 0.22s ease;
    text-decoration: none; letter-spacing: 0.02em; box-shadow: 0 4px 14px rgba(28,20,92,0.22);
}
.btn-download:hover { background: #2a1e8a; transform: translateY(-1px); box-shadow: 0 8px 20px rgba(28,20,92,0.32); color: #fff; }
.btn-download:active { transform: translateY(0); }

.download-empty { text-align: center; padding: 64px 20px; color: #94a3b8; }
.download-empty i { font-size: 48px; color: rgba(28,20,92,0.15); display: block; margin-bottom: 16px; }
.download-empty p { font-size: 15px; }

/* ================================================================
   RESPONSIVE BANNER + DOWNLOAD
================================================================ */
@media (max-width: 992px) {
    .banner-content { padding-left: 40px; padding-right: 24px; }
    .banner-stats { padding: 0 40px; }
    .banner-title { font-size: 24px; }
}
@media (max-width: 768px) {
    .banner-download { height: auto; min-height: auto; padding: 0; display: block; }
    
    /* 1. Tambah padding-top agar teks turun dan tidak tertabrak navbar */
    .banner-content { padding: 120px 20px 20px; max-width: 100%; } 
    .banner-title { font-size: 22px; margin-bottom: 8px; }
    .banner-desc { font-size: 12.5px; }
    
    /* 2. Ubah stat dari absolute ke relative agar menyusun rapi di bawah teks */
    .banner-stats { 
        position: relative; 
        bottom: auto; 
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 0; /* Jarak diatur via padding di stat-item */
        padding: 0 20px 32px; /* Tambahan spasi di bawah banner */
    }
    
    /* 3. Rapihkan jarak antar item stats */
    .banner-stat-item { 
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 0;
        margin-right: 0;
        border-right: none;
        border-bottom: 1px solid rgba(255,255,255,0.15);
        width: 100%; 
    }
    .banner-stat-item:last-child { border-bottom: none; }
    .banner-stat-item i { font-size: 14px; }
    .banner-stat-item span { font-size: 12px; line-height: 1.4; }
    
    .download-section { padding: 32px 0 48px; }
    .section-title-main { font-size: 22px; }
}
@media (max-width: 480px) {
    .banner-breadcrumb { font-size: 10.5px; }
    .banner-title { font-size: 18px; }
    .banner-desc { display: none; }
    .banner-deco, .banner-deco-2 { display: none; }
}
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
            <a href="/download" class="nav-link-pill {{ request()->is('download*') ? 'active' : '' }}">Pengadaan</a>
            <a href="/tentang"  class="nav-link-pill {{ request()->is('tentang*')  ? 'active' : '' }}">Tentang Kami</a>
            <a href="/mutu"     class="nav-link-pill {{ request()->is('mutu*')     ? 'active' : '' }}">Mutu</a>
        </div>

        <!-- ===== KONTAK CTA dengan Mega Dropdown ===== -->
        <div class="nav-cta kontak-wrap" id="kontakWrap">
            <button class="btn-kontak" id="btnKontakDesktop" type="button">Kontak</button>

            <!-- MEGA PANEL -->
            <div class="kontak-mega" id="kontakMega">
                <div class="kontak-mega-grid">
                    <!-- KIRI: FORM -->
                    <div class="kontak-form-panel">
                        <div class="form-ornament"></div>
                        <div class="kontak-form-sublabel">Kontak Kami</div>
                        <div class="kontak-form-title">Get In <span>Touch</span></div>
                        <form action="https://formspree.io/f/xaqzzypq" method="POST">
                            <div class="ck-row">
                                <div class="ck-field">
                                    <label>Nama</label>
                                    <input type="text" name="nama" placeholder="Nama lengkap" required>
                                </div>
                                <div class="ck-field">
                                    <label>Telepon</label>
                                    <input type="text" name="telepon" placeholder="No. telepon" required>
                                </div>
                            </div>
                            <div class="ck-row">
                                <div class="ck-field">
                                    <label>Email</label>
                                    <input type="email" name="email" placeholder="Email Anda" required>
                                </div>
                                <div class="ck-field">
                                    <label>Subject</label>
                                    <input type="text" name="subject" placeholder="Perihal" required>
                                </div>
                            </div>
                            <div class="ck-field">
                                <label>Pesan</label>
                                <textarea name="pesan" placeholder="Tulis pesan Anda..." required></textarea>
                            </div>
                            <button type="submit" class="btn-send-mega">
                                <i class="bi bi-send-fill"></i> Kirim Pesan
                            </button>
                        </form>
                    </div>
                    <!-- KANAN: INFO + MAP -->
                    <div class="kontak-info-panel">
                        <div class="kontak-info-grid">
                            <div class="kontak-info-card">
                                <div class="kontak-info-icon ci-phone"><i class="bi bi-telephone-fill"></i></div>
                                <div class="kontak-info-title">Telepon</div>
                                <div class="kontak-info-val">(0289) 430822</div>
                            </div>
                            <div class="kontak-info-card">
                                <div class="kontak-info-icon ci-email"><i class="bi bi-envelope-fill"></i></div>
                                <div class="kontak-info-title">Email</div>
                                <div class="kontak-info-val">allam.medica@<br>yahoo.co.id</div>
                            </div>
                            <div class="kontak-info-card">
                                <div class="kontak-info-icon ci-igd"><i class="bi bi-clock-fill"></i></div>
                                <div class="kontak-info-title">IGD</div>
                                <div class="kontak-info-val">24 Jam</div>
                            </div>
                            <div class="kontak-info-card">
                                <div class="kontak-info-icon ci-map"><i class="bi bi-geo-alt-fill"></i></div>
                                <div class="kontak-info-title">Alamat</div>
                                <div class="kontak-info-val">Jl. P. Diponegoro No.609, Bumiayu</div>
                            </div>
                        </div>
                        <div class="kontak-map-box">
                            <iframe src="https://www.google.com/maps?q=RSU+Allam+Medica+Bumiayu&output=embed" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END KONTAK CTA -->

        <button class="nav-burger" id="navBurger"><span></span><span></span><span></span></button>
    </nav>
</div>

<!-- DRAWER OVERLAY -->
<div class="nav-overlay" id="navOverlay"></div>

<!-- DRAWER MOBILE -->
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
        <a href="/download" class="d-link {{ request()->is('download*') ? 'active' : '' }}"><span class="d-icon"><i class="bi bi-download"></i></span> Pengadaan</a>
        <a href="/tentang"  class="d-link {{ request()->is('tentang*')  ? 'active' : '' }}"><span class="d-icon"><i class="bi bi-info-circle"></i></span> Tentang Kami</a>
        <a href="/mutu"     class="d-link {{ request()->is('mutu*')     ? 'active' : '' }}"><span class="d-icon"><i class="bi bi-patch-check"></i></span> Mutu</a>
    </nav>
    <div class="drawer-footer">
        <button class="btn-kontak-drawer" id="btnKontakMobile" type="button">Kontak</button>
    </div>
</aside>


<!-- ============================================================
     BOTTOM SHEET KONTAK (mobile)
============================================================ -->
<div class="bs-overlay" id="bsOverlay"></div>

<div class="bs-sheet" id="bsSheet">
    <div class="bs-handle-wrap"><div class="bs-handle"></div></div>
    <div class="bs-header">
        <h2 class="bs-title">Hubungi Kami</h2>
        <button class="bs-close" id="bsClose"><i class="bi bi-x-lg"></i></button>
    </div>
    <div class="bs-body">
        <div class="bs-form-card">
            <div class="bs-form-ornament"></div>
            <div class="bs-sublabel">Kirim Pesan</div>
            <div class="bs-form-title">Get In <span>Touch</span></div>
            <form action="https://formspree.io/f/xaqzzypq" method="POST">
                <div class="ck-field">
                    <label>Nama</label>
                    <input type="text" name="nama" placeholder="Nama lengkap" required>
                </div>
                <div class="ck-field">
                    <label>Telepon</label>
                    <input type="text" name="telepon" placeholder="No. telepon" required>
                </div>
                <div class="ck-field">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Email Anda" required>
                </div>
                <div class="ck-field">
                    <label>Subject</label>
                    <input type="text" name="subject" placeholder="Perihal" required>
                </div>
                <div class="ck-field">
                    <label>Pesan</label>
                    <textarea name="pesan" placeholder="Tulis pesan Anda..." required></textarea>
                </div>
                <button type="submit" class="btn-send-bs">
                    <i class="bi bi-send-fill"></i> Kirim Pesan
                </button>
            </form>
        </div>
        <div class="bs-info-grid">
            <div class="bs-info-card">
                <div class="bs-info-icon ci-phone"><i class="bi bi-telephone-fill"></i></div>
                <div class="bs-info-title">Telepon</div>
                <div class="bs-info-val">(0289) 430822</div>
            </div>
            <div class="bs-info-card">
                <div class="bs-info-icon ci-email"><i class="bi bi-envelope-fill"></i></div>
                <div class="bs-info-title">Email</div>
                <div class="bs-info-val">allam.medica@yahoo.co.id</div>
            </div>
            <div class="bs-info-card">
                <div class="bs-info-icon ci-igd"><i class="bi bi-clock-fill"></i></div>
                <div class="bs-info-title">IGD</div>
                <div class="bs-info-val">24 Jam</div>
            </div>
            <div class="bs-info-card">
                <div class="bs-info-icon ci-map"><i class="bi bi-geo-alt-fill"></i></div>
                <div class="bs-info-title">Alamat</div>
                <div class="bs-info-val">Jl. P. Diponegoro No.609, Bumiayu, Brebes</div>
            </div>
        </div>
        <div class="bs-map-box">
            <iframe src="https://www.google.com/maps?q=RSU+Allam+Medica+Bumiayu&output=embed" loading="lazy"></iframe>
        </div>
    </div>
</div>


<!-- ============================================================
     SCRIPTS: NAVBAR + MEGA DROPDOWN + BOTTOM SHEET
============================================================ -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const navbar   = document.getElementById('mainNavbar');
    const burger   = document.getElementById('navBurger');
    const drawer   = document.getElementById('navDrawer');
    const overlay  = document.getElementById('navOverlay');
    const closeBtn = document.getElementById('drawerClose');

    window.addEventListener('scroll', () => navbar.classList.toggle('scrolled', window.scrollY > 10), { passive: true });

    function openDrawer()  { burger.classList.add('open');drawer.classList.add('open');overlay.classList.add('show');document.body.style.overflow='hidden'; }
    function closeDrawer() { burger.classList.remove('open');drawer.classList.remove('open');overlay.classList.remove('show');if(!bsOpen())document.body.style.overflow=''; }

    burger.addEventListener('click', e => { e.stopPropagation(); drawer.classList.contains('open') ? closeDrawer() : openDrawer(); });
    closeBtn.addEventListener('click', closeDrawer);
    overlay.addEventListener('click', () => { closeDrawer(); closeBs(); });
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

    /* ─── Mega Dropdown Desktop ─── */
    const kontakWrap = document.getElementById('kontakWrap');
    const kontakMega = document.getElementById('kontakMega');
    let megaTimer;

    kontakWrap.addEventListener('mouseenter', () => { clearTimeout(megaTimer); kontakMega.classList.add('open'); });
    kontakWrap.addEventListener('mouseleave', () => { megaTimer = setTimeout(() => kontakMega.classList.remove('open'), 120); });
    kontakMega.addEventListener('mouseenter', () => clearTimeout(megaTimer));
    kontakMega.addEventListener('mouseleave', () => { megaTimer = setTimeout(() => kontakMega.classList.remove('open'), 120); });

    document.getElementById('btnKontakDesktop').addEventListener('click', function(e) {
        e.stopPropagation();
        kontakMega.classList.toggle('open');
    });
    document.addEventListener('click', function(e) {
        if (!kontakWrap.contains(e.target)) kontakMega.classList.remove('open');
    });

    /* ─── Bottom Sheet Mobile ─── */
    const bsSheet   = document.getElementById('bsSheet');
    const bsOverlay = document.getElementById('bsOverlay');
    const bsClose   = document.getElementById('bsClose');
    const btnMobile = document.getElementById('btnKontakMobile');

    function bsOpen()  { return bsSheet.classList.contains('open'); }
    function openBs()  { bsSheet.classList.add('open');bsOverlay.classList.add('show');document.body.style.overflow='hidden';closeDrawer(); }
    function closeBs() { bsSheet.classList.remove('open');bsOverlay.classList.remove('show');document.body.style.overflow=''; }

    btnMobile.addEventListener('click', openBs);
    bsClose.addEventListener('click', closeBs);
    bsOverlay.addEventListener('click', closeBs);

    let startY = 0;
    bsSheet.addEventListener('touchstart', e => { startY = e.touches[0].clientY; }, { passive: true });
    bsSheet.addEventListener('touchend',   e => { if (e.changedTouches[0].clientY - startY > 80) closeBs(); }, { passive: true });
});
</script>
<!-- END NAVBAR + KONTAK PANEL -->


<!-- ================================================================
     BANNER
================================================================ -->
<section class="banner-download">
    <img src="{{ asset('images/download/banner.png') }}" alt="Download Pengadaan">
    <div class="banner-overlay"></div>
    <div class="banner-deco"></div>
    <div class="banner-deco-2"></div>

    <div class="banner-content">
        <div class="banner-breadcrumb">
            <i class="bi bi-house-fill"></i>
            Beranda
            <i class="bi bi-chevron-right"></i>
            Pengadaan
        </div>
        <div class="banner-title">
            Download List <span>Pengadaan</span>
        </div>
        <div class="banner-desc">
            Pengadaan rumah sakit merupakan langkah strategis dalam meningkatkan akses
            dan kualitas pelayanan kesehatan. Unduh dokumen yang Anda butuhkan di bawah ini.
        </div>
    </div>

    <div class="banner-stats">
        <div class="banner-stat-item">
            <i class="bi bi-file-earmark-text"></i>
            <span>Dokumen Resmi RSU Allam Medica</span>
        </div>
        <div class="banner-stat-item">
            <i class="bi bi-shield-check"></i>
            <span>Terverifikasi &amp; Terpercaya</span>
        </div>
        <div class="banner-stat-item">
            <i class="bi bi-download"></i>
            <span>Akses Gratis</span>
        </div>
    </div>
</section>


<!-- ================================================================
     DOWNLOAD CARDS SECTION
================================================================ -->
<section class="download-section">
    <div class="container">

        <div class="download-section-header">
            <div class="section-eyebrow">
                <i class="bi bi-folder2-open"></i>
                Dokumen Tersedia
            </div>
            <h2 class="section-title-main">Daftar Dokumen Pengadaan</h2>
            <p class="section-subtitle-main">
                Unduh dokumen pengadaan rumah sakit yang telah tersedia.
                Pastikan perangkat Anda mendukung format file yang diunduh.
            </p>
        </div>

        <div class="row g-4">
            @forelse($data as $item)
            <div class="col-lg-4 col-md-6">
                <div class="download-card">
                    <div class="download-header">
                        <div class="download-icon">
                            <i class="bi bi-file-earmark-text-fill"></i>
                        </div>
                        <div class="download-title">{{ $item->judul }}</div>
                    </div>
                    <div class="download-badge">
                        <i class="bi bi-tag-fill"></i>
                        {{ $item->kategori }}
                        @if($item->periode)
                            &bull; {{ $item->periode }}
                        @endif
                    </div>
                    <p class="download-desc">{{ $item->deskripsi }}</p>
                    <div class="download-line"></div>
                    <div class="download-meta">
                        <div class="download-info">
                            <i class="bi bi-calendar3"></i>
                            Diunggah: {{ optional($item->tanggal_upload)->format('d M Y') ?? '-' }}
                        </div>
                        <div class="download-info">
                            <i class="bi bi-hdd"></i>
                            Ukuran: {{ $item->ukuran ?? '-' }}
                        </div>
                    </div>
                    <button class="btn-download" onclick="window.location='{{ route('download.file', $item->id) }}'">
                        <i class="bi bi-download"></i>
                        Download File
                    </button>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="download-empty">
                    <i class="bi bi-folder-x"></i>
                    <p>Belum ada dokumen yang tersedia saat ini.</p>
                </div>
            </div>
            @endforelse
        </div>

    </div>
</section>


<!-- ============================================================
     FOOTER
============================================================ -->
<style>
.footer-rsu { background:linear-gradient(to bottom,#ffffff 0%,#fefefd 3%,#fdfcf6 8%,#fcfbf3 13%,#faf8ee 20%,#f7f5e8 30%,#f3f0e1 45%,#ede9d9 65%,#e8e3d2 85%,#e3deca 100%);color:#1C145C;padding:56px 0 0;position:relative;overflow:hidden; }
.footer-rsu .footer-ornament  { position:absolute;right:-80px;bottom:-150px;width:420px;height:420px;opacity:.07;background-image:url('{{ asset("images/beranda/ornamen.png") }}');background-size:contain;background-repeat:no-repeat;background-position:center;pointer-events:none;z-index:0; }
.footer-rsu .footer-ornament2 { position:absolute;left:-100px;top:40px;width:340px;height:340px;opacity:.04;background-image:url('{{ asset("images/beranda/ornamen.png") }}');background-size:contain;background-repeat:no-repeat;background-position:center;pointer-events:none;z-index:0; }
.footer-rsu .container-fluid  { max-width:1550px;position:relative;z-index:1; }
.footer-rsu .row               { --bs-gutter-x:3.5rem; }
.footer-rsu .footer-logo       { height:40px;width:auto;display:block;margin-bottom:14px; }
.footer-rsu .footer-title      { font-size:16px;font-weight:700;color:#1C145C;margin-bottom:8px; }
.footer-rsu .footer-desc       { font-size:13px;line-height:1.8;color:#5a5480;margin-bottom:20px;max-width:340px; }
.footer-rsu .footer-social     { display:flex;gap:10px;margin-bottom:22px; }
.footer-rsu .footer-social a   { width:36px;height:36px;border-radius:50%;background:rgba(28,20,92,.07);border:1px solid rgba(28,20,92,.15);display:flex;align-items:center;justify-content:center;color:#1C145C;text-decoration:none;font-size:15px;transition:.25s; }
.footer-rsu .footer-social a:hover { background:#1C145C;color:#fff;transform:translateY(-2px); }
.footer-rsu .footer-mitra-label { font-size:11px;color:#9994bb;text-transform:uppercase;letter-spacing:.08em;margin-bottom:10px; }
.footer-rsu .footer-mitra      { display:flex;gap:10px;align-items:center;flex-wrap:wrap; }
.footer-rsu .footer-mitra img:nth-child(1) { height:33px; }
.footer-rsu .footer-mitra img:nth-child(2) { height:23px; }
.footer-rsu .footer-heading    { font-weight:900;font-size:12px;color:#1C145C;text-transform:uppercase;letter-spacing:.14em;margin-bottom:18px;padding-bottom:10px;border-bottom:1.5px solid rgba(28,20,92,.12);white-space:nowrap; }
.footer-rsu ul { list-style:none;padding:0;margin:0; }
.footer-rsu ul li { margin-bottom:10px; }
.footer-rsu a { color:#5a5480;text-decoration:none;font-size:13.5px;transition:.2s;display:inline-flex;align-items:center;gap:5px; }
.footer-rsu ul li a::before { content:'›';color:#1C145C;opacity:.4;font-size:15px; }
.footer-rsu a:hover { color:#1C145C;padding-left:3px; }
.footer-rsu .footer-contact-row  { display:flex;align-items:flex-start;gap:11px;margin-bottom:16px; }
.footer-rsu .footer-contact-icon { width:34px;height:34px;border-radius:8px;background:rgba(28,20,92,.07);border:1px solid rgba(28,20,92,.1);display:flex;align-items:center;justify-content:center;color:#1C145C;flex-shrink:0; }
.footer-rsu .footer-contact-text { font-size:13px;color:#5a5480;line-height:1.7; }
.footer-rsu hr { height:1px;background:linear-gradient(90deg,rgba(28,20,92,0) 0%,rgba(28,20,92,.12) 30%,rgba(28,20,92,.12) 70%,rgba(28,20,92,0) 100%);border:none;margin:36px 0 0; }
.footer-rsu .footer-bottom { background:rgba(28,20,92,.05);padding:15px 36px; }
.footer-rsu .footer-copy   { font-size:12.5px;color:#9994bb;display:flex;justify-content:space-between;align-items:center;gap:12px; }
.footer-rsu .footer-copy-badge   { background:rgba(28,20,92,.06);border:1px solid rgba(28,20,92,.12);border-radius:20px;padding:4px 14px;font-size:11.5px;color:#7a74a0;white-space:nowrap; }
.footer-rsu .footer-accent-dot   { display:inline-block;width:3px;height:3px;border-radius:50%;background:#1C145C;opacity:.25;margin:0 8px; }
@media(max-width:991px){ .footer-rsu{padding:45px 0 0;} .footer-rsu .row>div{margin-bottom:24px;} .footer-rsu .footer-desc{max-width:100%;} }
@media(max-width:768px){ .footer-rsu{padding:40px 0 0;} .footer-rsu .container-fluid{padding-left:20px!important;padding-right:20px!important;} .footer-rsu .footer-copy{flex-direction:column;align-items:flex-start;gap:8px;} .footer-rsu .footer-bottom{padding:15px 20px;} .footer-rsu a:hover{padding-left:0;} .footer-rsu .footer-logo{height:34px;} }
</style>

<footer class="footer-rsu">
    <div class="footer-ornament"></div>
    <div class="footer-ornament2"></div>
    <div class="container-fluid px-lg-5 px-4">
        <div class="row g-5 justify-content-between">
            <div class="col-lg-3 col-md-12">
                <img src="{{ asset('images/beranda/logo-almed.png') }}" class="footer-logo" alt="Logo RSU Allam Medica">
                <h5 class="footer-title">RSU Allam Medica Bumiayu</h5>
                <p class="footer-desc">Jl. Pangeran Diponegoro No. 609, Jatisawit, Bumiayu, Kabupaten Brebes, Jawa Tengah 52273</p>
                <div class="footer-social">
                    <a href="https://www.tiktok.com/@rsuallammedicabumiayu" target="_blank"><i class="bi bi-tiktok"></i></a>
                    <a href="https://www.facebook.com/allam.medicabmy" target="_blank"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/allam.medica/" target="_blank"><i class="bi bi-instagram"></i></a>
                </div>
                <div class="footer-mitra-label">Akreditasi & Mitra</div>
                <div class="footer-mitra">
                    <img src="{{ asset('images/beranda/paripurna.png') }}" alt="">
                    <img src="{{ asset('images/beranda/bpjs.png') }}" alt="">
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <h6 class="footer-heading">Tautan Cepat</h6>
                <ul>
                    <li><a href="{{ route('beranda') }}">Beranda</a></li>
                    <li><a href="{{ url('/artikel') }}">Artikel</a></li>
                    <li><a href="{{ url('/download') }}">Pengadaan</a></li>
                    <li><a href="{{ url('/tentang') }}">Tentang Kami</a></li>
                    <li><a href="{{ url('/mutu') }}">Mutu</a></li>
                    <li><a href="{{ url('/kontak') }}">Kontak</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <h6 class="footer-heading">Menu</h6>
                <ul>
                    <li><a href="{{ url('/karir') }}">Karir</a></li>
                    <li><a href="{{ url('/berita') }}">Berita</a></li>
                    <li><a href="{{ url('/video') }}">Video</a></li>
                </ul>
            </div>
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
                    <div class="footer-contact-text">IGD, Lab & Farmasi : 24 Jam<br>Rawat Jalan : Sen – Sab 07.00 – 21.00</div>
                </div>
                <div class="footer-contact-row">
                    <div class="footer-contact-icon"><i class="bi bi-geo-alt-fill"></i></div>
                    <div class="footer-contact-text">Jl. Pangeran Diponegoro No. 609,<br>Bumiayu, Brebes</div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<style>
/* ============================================================
   FLOATING WHATSAPP BUTTON
============================================================ */
.wa-float-btn {
    position: fixed;
    right: 25px;
    bottom: 25px;
    width: 68px;
    height: 68px;
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
    box-shadow: 0 16px 40px rgba(37, 211, 102, 0.32);
    z-index: 99999;
    cursor: pointer;
    overflow: hidden;
    transition: transform .25s ease, box-shadow .25s ease, filter .25s ease;
    animation: waFloatIn .7s cubic-bezier(.2,.8,.2,1) both;
}
.wa-float-btn::before {
    content: "";
    position: absolute;
    inset: -2px;
    border-radius: inherit;
    border: 1px solid rgba(255,255,255,.22);
    animation: waPulse 3.4s ease-in-out infinite;
    pointer-events: none;
}
.wa-float-btn::after {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: inherit;
    background: rgba(255,255,255,.18);
    transform: scale(0);
    opacity: 0;
    pointer-events: none;
}
.wa-float-btn.is-clicked::after { animation: waRipple .55s ease-out; }
.wa-float-btn:hover {
    transform: scale(1.08);
    box-shadow: 0 22px 48px rgba(18, 140, 126, 0.38);
    filter: saturate(1.08);
}
.wa-float-btn:active { transform: scale(1.02); }
.wa-float-btn:hover .wa-float-icon { animation: waWiggle .35s ease-in-out 2; }
.wa-float-icon { position: relative; z-index: 1; font-size: 30px; line-height: 1; }

.wa-tooltip {
    position: fixed;
    right: 100px;
    bottom: 35px;
    max-width: 290px;
    padding: 12px 14px;
    display: flex;
    align-items: flex-start;
    gap: 10px;
    border-radius: 16px;
    background: rgba(255,255,255,.97);
    border: 1px solid rgba(28,20,92,.12);
    box-shadow: 0 18px 40px rgba(15,23,42,.16);
    color: #1C145C;
    z-index: 99998;
    opacity: 0;
    transform: translateX(16px);
    pointer-events: none;
}
.wa-tooltip.show {
    opacity: 1;
    transform: translateX(0);
    animation: waTooltipIn .35s ease forwards;
    pointer-events: auto;
}
.wa-tooltip.is-hidden {
    opacity: 0;
    transform: translateX(16px);
    animation: waTooltipOut .28s ease forwards;
    pointer-events: none;
}
.wa-tooltip-icon {
    width: 34px; height: 34px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0; background: rgba(37, 211, 102, .14);
    color: #128C7E; font-size: 16px;
}
.wa-tooltip-body { flex: 1; }
.wa-tooltip-title { font-size: 13px; font-weight: 700; margin-bottom: 2px; }
.wa-tooltip-text { font-size: 12.5px; line-height: 1.45; color: #5a5480; }
.wa-tooltip-close { border: none; background: transparent; color: #64748b; cursor: pointer; padding: 2px; margin-left: 4px; }

.wa-modal-overlay {
    position: fixed;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    background: rgba(15, 23, 42, .6);
    z-index: 10000003;
    opacity: 0;
    visibility: hidden;
    transition: opacity .25s ease, visibility .25s ease;
}
.wa-modal-overlay.show { opacity: 1; visibility: visible; }
.wa-modal-card {
    position: relative;
    width: min(92vw, 480px);
    background: #fff;
    border-radius: 24px;
    padding: 24px 22px 20px;
    box-shadow: 0 24px 60px rgba(15,23,42,.18);
    transform: scale(.96);
    opacity: 0;
    transition: transform .25s ease, opacity .25s ease;
}
.wa-modal-overlay.show .wa-modal-card { transform: scale(1); opacity: 1; }
.wa-modal-icon {
    width: 54px; height: 54px; border-radius: 16px;
    display: flex; align-items: center; justify-content: center;
    background: rgba(37, 211, 102, .14); color: #128C7E;
    font-size: 24px; margin-bottom: 14px;
}
.wa-modal-card h3 { margin: 0 0 8px; font-size: 20px; color: #1C145C; }
.wa-modal-card p { margin: 0 0 12px; color: #5a5480; line-height: 1.65; font-size: 14px; }
.wa-modal-pre {
    padding: 12px 14px;
    border-radius: 14px;
    background: #f7f9fc;
    border: 1px solid #ecf0f6;
    color: #334155;
    font-size: 13px;
    line-height: 1.6;
    white-space: pre-wrap;
    margin-bottom: 16px;
}
.wa-modal-actions { display: flex; justify-content: flex-end; gap: 10px; flex-wrap: wrap; }
.wa-btn {
    border: none; border-radius: 999px; padding: 10px 16px;
    font-weight: 600; text-decoration: none;
    display: inline-flex; align-items: center; justify-content: center;
    cursor: pointer; transition: transform .18s ease, box-shadow .18s ease;
}
.wa-btn:hover { transform: translateY(-1px); }
.wa-btn-secondary { background: #f3f4f6; color: #334155; }
.wa-btn-primary {
    background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
    color: #fff;
    box-shadow: 0 10px 24px rgba(37, 211, 102, .24);
}

@keyframes waFloatIn {
    from { opacity: 0; transform: translateY(18px) scale(.92); }
    to   { opacity: 1; transform: translateY(0) scale(1); }
}
@keyframes waPulse {
    0%, 100% { transform: scale(1); opacity: .55; }
    50%      { transform: scale(1.08); opacity: .2; }
}
@keyframes waWiggle {
    0%, 100% { transform: rotate(0); }
    25%      { transform: rotate(-8deg); }
    75%      { transform: rotate(8deg); }
}
@keyframes waRipple {
    0%   { transform: scale(.72); opacity: .45; }
    100% { transform: scale(1.7); opacity: 0; }
}
@keyframes waTooltipIn {
    from { opacity: 0; transform: translateX(16px); }
    to   { opacity: 1; transform: translateX(0); }
}
@keyframes waTooltipOut {
    from { opacity: 1; transform: translateX(0); }
    to   { opacity: 0; transform: translateX(16px); }
}

@media(max-width: 575px) {
    .wa-float-btn { right: 20px; bottom: 20px; width: 60px; height: 60px; }
    .wa-float-icon { font-size: 26px; }
    .wa-tooltip { right: 78px; bottom: 24px; max-width: min(72vw, 240px); padding: 11px 12px; }
    .wa-modal-card { padding: 20px 18px 18px; }
    .wa-modal-actions { justify-content: stretch; }
    .wa-modal-actions .wa-btn { flex: 1 1 100%; }
}
</style>

<!-- ============================================================
     FLOATING WHATSAPP BUTTON — HTML
============================================================ -->
<button class="wa-float-btn" id="waFloatButton" type="button" aria-label="Hubungi Admin WhatsApp">
    <span class="wa-float-icon"><i class="fab fa-whatsapp"></i></span>
</button>

<div class="wa-tooltip" id="waTooltip" role="status" aria-live="polite">
    <div class="wa-tooltip-icon"><i class="fab fa-whatsapp"></i></div>
    <div class="wa-tooltip-body">
        <div class="wa-tooltip-title">Butuh bantuan?</div>
        <div class="wa-tooltip-text">Chat Admin kami melalui WhatsApp.</div>
    </div>
    <button class="wa-tooltip-close" id="waTooltipClose" type="button" aria-label="Tutup tooltip">
        <i class="bi bi-x-lg"></i>
    </button>
</div>

<div class="wa-modal-overlay" id="waModalOverlay" aria-hidden="true">
    <div class="wa-modal-card" role="dialog" aria-modal="true" aria-labelledby="waModalTitle">
        <div class="wa-modal-icon"><i class="fab fa-whatsapp"></i></div>
        <h3 id="waModalTitle">Hubungi Admin RSU Allam Medica</h3>
        <p>
            Anda akan terhubung dengan Admin RSU Allam Medica melalui WhatsApp.
            Silakan klik tombol <strong>Lanjutkan ke WhatsApp</strong> untuk memulai percakapan.
            Tim kami siap membantu memberikan informasi mengenai layanan rumah sakit.
        </p>
        <div class="wa-modal-pre">Halo Admin RSU Allam Medica,

Saya ingin mendapatkan informasi mengenai layanan rumah sakit.
Terima kasih.</div>
        <div class="wa-modal-actions">
            <button class="wa-btn wa-btn-secondary" id="waCancelBtn" type="button">Batal</button>
            <a class="wa-btn wa-btn-primary" id="waContinueBtn" href="#" target="_blank" rel="noopener noreferrer">
                Lanjutkan ke WhatsApp
            </a>
        </div>
    </div>
</div>

<!-- ============================================================
     FLOATING WHATSAPP BUTTON — JAVASCRIPT
============================================================ -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    const waButton        = document.getElementById('waFloatButton');
    const waTooltip        = document.getElementById('waTooltip');
    const waTooltipClose   = document.getElementById('waTooltipClose');
    const waModalOverlay   = document.getElementById('waModalOverlay');
    const waCancelBtn      = document.getElementById('waCancelBtn');
    const waContinueBtn    = document.getElementById('waContinueBtn');

    const waPhone   = '6285292224886';
    const waMessage = 'Halo Admin RSU Allam Medica,\n\nSaya ingin mendapatkan informasi mengenai layanan rumah sakit.\nTerima kasih.';

    function openWaModal() {
        if (!waModalOverlay) return;
        waModalOverlay.classList.add('show');
        waModalOverlay.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }

    function closeWaModal() {
        if (!waModalOverlay) return;
        waModalOverlay.classList.remove('show');
        waModalOverlay.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    function showTooltip() {
        if (!waTooltip) return;
        waTooltip.classList.remove('is-hidden');
        waTooltip.classList.add('show');
    }

    function hideTooltip() {
        if (!waTooltip) return;
        waTooltip.classList.remove('show');
        waTooltip.classList.add('is-hidden');
    }

    if (waButton) {
        waButton.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            waButton.classList.remove('is-clicked');
            void waButton.offsetWidth;
            waButton.classList.add('is-clicked');
            setTimeout(openWaModal, 220);
        });
    }

    if (waTooltipClose) {
        waTooltipClose.addEventListener('click', function () {
            hideTooltip();
        });
    }

    if (waCancelBtn) {
        waCancelBtn.addEventListener('click', closeWaModal);
    }

    if (waContinueBtn) {
        waContinueBtn.href = 'https://wa.me/' + waPhone + '?text=' + encodeURIComponent(waMessage);
        waContinueBtn.addEventListener('click', closeWaModal);
    }

    if (waModalOverlay) {
        waModalOverlay.addEventListener('click', function (e) {
            if (e.target === waModalOverlay) closeWaModal();
        });
    }

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && waModalOverlay && waModalOverlay.classList.contains('show')) {
            closeWaModal();
        }
    });

    let tooltipShowTimer;
    let tooltipHideTimer;

    function scheduleTooltip() {
        clearTimeout(tooltipShowTimer);
        clearTimeout(tooltipHideTimer);
        tooltipShowTimer = setTimeout(showTooltip, 5000);
        tooltipHideTimer = setTimeout(() => hideTooltip(), 11000);
    }

    scheduleTooltip();
    window.addEventListener('focus', scheduleTooltip);

});
</script>
</body>
</html>