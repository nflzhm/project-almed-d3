<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>
@if(isset($poli)){{ $poli->poli }} — @endif
Layanan — RSU Allam Medica
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">
</head>

<style>
/* ============================================================
   BASE
============================================================ */
body { font-family: 'Plus Jakarta Sans', sans-serif; background: #f8faff; overflow-x: hidden; }

/* ============================================================
   ORNAMENT BODY (bunga gradasi seperti footer)
============================================================ */
.body-ornament-wrap {
    position: fixed;
    inset: 0;
    pointer-events: none;
    z-index: 0;
    overflow: hidden;
}
.body-ornament-wrap .orn-1 {
    position: absolute;
    right: -120px;
    top: 30%;
    width: 480px;
    height: 480px;
    background-image: url('{{ asset("images/beranda/ornamen.png") }}');
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    opacity: 0;
    mask-image: radial-gradient(circle at 60% 50%, rgba(0,0,0,0.07) 30%, transparent 75%);
    -webkit-mask-image: radial-gradient(circle at 60% 50%, rgba(0,0,0,0.07) 30%, transparent 75%);
    filter: hue-rotate(220deg) saturate(0.4);
}
.body-ornament-wrap .orn-2 {
    position: absolute;
    left: -100px;
    bottom: 20%;
    width: 360px;
    height: 360px;
    background-image: url('{{ asset("images/beranda/ornamen.png") }}');
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    opacity: 0;
    mask-image: radial-gradient(circle at 40% 50%, rgba(0,0,0,0.05) 30%, transparent 75%);
    -webkit-mask-image: radial-gradient(circle at 40% 50%, rgba(0,0,0,0.05) 30%, transparent 75%);
    filter: hue-rotate(200deg) saturate(0.3);
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
.drop-divider { height:1px;background:rgba(0,0,0,.07);margin:4px 8px; }
.drop-item-icon { width:26px;height:26px;border-radius:7px;display:flex;align-items:center;justify-content:center;font-size:12px;flex-shrink:0; }
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
.nav-overlay { display:none;position:fixed;inset:0;background:rgba(15,23,42,0);z-index:9999990;transition:background .3s; }
.nav-overlay.show { display:block;background:rgba(15,23,42,0.42); }
.nav-drawer { position:fixed;top:0;right:0;width:62%;max-width:280px;height:100dvh;z-index:9999995;transform:translateX(100%);transition:transform .32s cubic-bezier(.4,0,.2,1);background:rgba(255,255,255,0.95);backdrop-filter:blur(24px) saturate(180%);border-left:1px solid rgba(255,255,255,0.45);box-shadow:-8px 0 32px rgba(15,23,42,.12);display:flex;flex-direction:column;overflow-y:auto;overscroll-behavior:contain; }
.nav-drawer.open { transform:translateX(0); }
.drawer-header { display:flex;align-items:center;justify-content:space-between;padding:20px 16px 14px;border-bottom:1px solid rgba(0,0,0,.07);flex-shrink:0; }
.drawer-label { font-size:11px;font-weight:700;color:#94a3b8;letter-spacing:.8px;text-transform:uppercase; }
.drawer-close-btn { width:30px;height:30px;border-radius:50%;background:rgba(28,20,92,.08);border:none;display:flex;align-items:center;justify-content:center;color:#1C145C;cursor:pointer;font-size:14px; }
.drawer-nav { flex:1;padding:10px;display:flex;flex-direction:column;gap:2px;overflow-y:auto; }
.d-link { display:flex;align-items:center;gap:10px;padding:10px 12px;border-radius:12px;font-size:14px;font-weight:500;color:#1e293b;text-decoration:none;transition:.16s; }
.d-link:hover { background:rgba(28,20,92,.06);color:#1C145C; }
.d-link.active { background:rgba(28,20,92,.09);color:#1C145C;font-weight:600; }
.d-icon { width:22px;height:22px;border-radius:7px;background:rgba(28,20,92,.08);display:flex;align-items:center;justify-content:center;font-size:12px;color:#1C145C;flex-shrink:0; }
.d-link.active .d-icon { background:#1C145C;color:#fff; }
.d-group-label { font-size:10px;font-weight:700;color:#94a3b8;letter-spacing:.7px;text-transform:uppercase;padding:12px 12px 4px; }
.d-sub { padding-left:8px; }
.d-divider { height:1px;background:rgba(0,0,0,.07);margin:6px 2px; }
.drawer-footer { padding:12px 14px 24px;border-top:1px solid rgba(0,0,0,.07);flex-shrink:0; }
.drawer-footer .btn-kontak { border-radius:14px;display:block;text-align:center;padding:12px 22px; }

/* ============================================================
   HERO — LIST MODE
============================================================ */
.lay-hero { background:linear-gradient(150deg,#1C145C 0%,#231a72 40%,#0ea5e9 100%);padding:130px 0 72px;position:relative;overflow:hidden; }
.lay-hero::before { content:'';position:absolute;right:-80px;top:-80px;width:420px;height:420px;border-radius:50%;background:radial-gradient(circle,rgba(255,255,255,.06),transparent 65%);pointer-events:none; }
.lay-hero::after  { content:'';position:absolute;left:-40px;bottom:-100px;width:300px;height:300px;border-radius:50%;background:radial-gradient(circle,rgba(14,165,233,.12),transparent 65%);pointer-events:none; }
/* Bunga ornamen di hero */
.lay-hero .hero-orn {
    position:absolute;right:-60px;bottom:-80px;width:320px;height:320px;
    background-image:url('{{ asset("images/beranda/ornamen.png") }}');
    background-size:contain;background-repeat:no-repeat;background-position:center;
    opacity:0.07;filter:brightness(10);pointer-events:none;
    mask-image:radial-gradient(circle at 55% 55%,rgba(0,0,0,1) 20%,transparent 70%);
    -webkit-mask-image:radial-gradient(circle at 55% 55%,rgba(0,0,0,1) 20%,transparent 70%);
}
.lay-hero .hero-orn-2 {
    position:absolute;left:-40px;top:-40px;width:240px;height:240px;
    background-image:url('{{ asset("images/beranda/ornamen.png") }}');
    background-size:contain;background-repeat:no-repeat;background-position:center;
    opacity:0.04;filter:brightness(10);pointer-events:none;
    mask-image:radial-gradient(circle at 45% 45%,rgba(0,0,0,1) 20%,transparent 70%);
    -webkit-mask-image:radial-gradient(circle at 45% 45%,rgba(0,0,0,1) 20%,transparent 70%);
}
.hero-dots { position:absolute;inset:0;pointer-events:none;background-image:radial-gradient(rgba(255,255,255,.05) 1px,transparent 1px);background-size:26px 26px; }
.hero-inner { position:relative;z-index:2; }
.hero-bc { display:flex;align-items:center;gap:8px;margin-bottom:20px; }
.hero-bc a { color:rgba(255,255,255,.6);font-size:13px;font-weight:500;text-decoration:none;transition:color .2s; }
.hero-bc a:hover { color:#fff; }
.hero-bc .sep { color:rgba(255,255,255,.25);font-size:11px; }
.hero-bc .cur { color:rgba(255,255,255,.8);font-size:13px;font-weight:600; }
.hero-kat { display:inline-flex;align-items:center;gap:6px;background:rgba(14,165,233,.85);color:#fff;font-size:11px;font-weight:800;text-transform:uppercase;letter-spacing:1px;padding:5px 14px;border-radius:20px;margin-bottom:18px; }
.hero-title { font-family:'DM Serif Display',serif;font-size:clamp(28px,4.5vw,46px);color:#fff;line-height:1.2;letter-spacing:-.3px;margin-bottom:18px;font-weight:400; }
.hero-meta { display:flex;align-items:center;gap:8px;flex-wrap:wrap; }
.hero-meta-pill { display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.15);color:rgba(255,255,255,.8);font-size:12px;font-weight:600;padding:5px 13px;border-radius:20px; }
.hero-stats { display:flex;gap:0;margin-top:32px;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.14);border-radius:16px;overflow:hidden;backdrop-filter:blur(12px);width:fit-content; }
.hero-stat-item { padding:14px 28px;text-align:center;border-right:1px solid rgba(255,255,255,.1); }
.hero-stat-item:last-child { border-right:none; }
.hero-stat-num { font-weight:900;font-size:22px;color:#fff;display:block;line-height:1; }
.hero-stat-label { font-size:10px;color:rgba(255,255,255,.6);margin-top:5px; }

/* ============================================================
   TICKER DOKTER
============================================================ */
.dokter-ticker-section { width:100vw;position:relative;left:50%;transform:translateX(-50%);overflow:hidden;background:linear-gradient(135deg,#1C145C 0%,#1e3a6e 50%,#0c6197 100%);box-shadow:0 4px 24px rgba(28,20,92,.18); }
.dokter-ticker-section::before,.dokter-ticker-section::after { content:'';position:absolute;top:0;bottom:0;width:80px;z-index:3;pointer-events:none; }
.dokter-ticker-section::before { left:0;background:linear-gradient(to right,#1C145C,transparent); }
.dokter-ticker-section::after  { right:0;background:linear-gradient(to left,#0c6197,transparent); }
.dokter-ticker-track { display:flex;align-items:center;width:max-content;animation:dokterScroll 80s linear infinite;padding:14px 0; }
.dokter-ticker-track:hover { animation-play-state:paused; }
@keyframes dokterScroll { 0%{transform:translateX(0)} 100%{transform:translateX(-50%)} }
.dokter-ticker-card { display:flex;align-items:center;gap:11px;padding:0 20px 0 0;margin-right:8px;border-right:1px solid rgba(255,255,255,.12);flex-shrink:0; }
.dokter-ticker-card:hover .dtc-foto,.dokter-ticker-card:hover .dtc-no-foto { border-color:#7dd3fc;transform:scale(1.06); }
.dokter-ticker-card:hover .dtc-nama { color:#7dd3fc; }
.dtc-foto-wrap { position:relative;flex-shrink:0; }
.dtc-foto { width:46px;height:46px;border-radius:50%;object-fit:cover;border:2.5px solid rgba(255,255,255,.35);transition:border-color .2s,transform .2s;display:block; }
.dtc-no-foto { width:46px;height:46px;border-radius:50%;background:rgba(255,255,255,.12);border:2.5px solid rgba(255,255,255,.25);display:flex;align-items:center;justify-content:center;font-size:18px;color:rgba(255,255,255,.6);flex-shrink:0;transition:border-color .2s,transform .2s; }
.dtc-online-dot { position:absolute;bottom:1px;right:1px;width:10px;height:10px;border-radius:50%;background:#10b981;border:2px solid #1C145C; }
.dtc-info { min-width:0; }
.dtc-label { font-size:9px;font-weight:800;color:rgba(255,255,255,.45);text-transform:uppercase;letter-spacing:.8px;margin-bottom:1px; }
.dtc-nama { font-size:12.5px;font-weight:800;color:#fff;white-space:nowrap;line-height:1.3;transition:color .2s; }
.dtc-sp   { font-size:10.5px;color:rgba(125,211,252,.8);white-space:nowrap;font-weight:500; }

/* ============================================================
   TABS
============================================================ */
.layanan-tabs-wrap { background:#fff;border-bottom:1px solid #e8edf5;position:relative;z-index:1;box-shadow:0 2px 12px rgba(28,20,92,.06); }
.layanan-tabs { display:flex;align-items:center;overflow-x:auto;scrollbar-width:none;padding:0 16px; }
.layanan-tabs::-webkit-scrollbar { display:none; }
.lay-tab { display:inline-flex;align-items:center;gap:7px;padding:14px 16px;border-bottom:3px solid transparent;font-size:13px;font-weight:600;color:#64748b;text-decoration:none;white-space:nowrap;transition:color .2s,border-color .2s;cursor:pointer;flex-shrink:0; }
.lay-tab:hover { color:#1C145C; }
.lay-tab.active { color:#1C145C;border-bottom-color:#1C145C; }
.lay-tab i { font-size:14px; }

/* ============================================================
   PAGE BODY
============================================================ */
.layanan-page-body { padding:0 0 80px;background:#f8faff;position:relative;z-index:1; }
.lay-section { padding:60px 0 0;scroll-margin-top:80px; }

/* Ornamen bunga di section body */
.section-orn-wrap { position:relative; }
.section-orn-wrap::after {
    content:'';
    position:absolute;
    right:-60px;
    top:0;
    width:300px;
    height:300px;
    background-image:url('{{ asset("images/beranda/ornamen.png") }}');
    background-size:contain;
    background-repeat:no-repeat;
    background-position:center;
    opacity:0.04;
    pointer-events:none;
    z-index:0;
    filter:hue-rotate(220deg) saturate(0.5);
    mask-image:radial-gradient(circle at 60% 40%,rgba(0,0,0,1) 25%,transparent 70%);
    -webkit-mask-image:radial-gradient(circle at 60% 40%,rgba(0,0,0,1) 25%,transparent 70%);
}

/* ============================================================
   SECTION HEADER
============================================================ */
.sec-label { display:inline-flex;align-items:center;gap:6px;padding:4px 12px;border-radius:20px;font-size:10px;font-weight:800;text-transform:uppercase;letter-spacing:1px;margin-bottom:10px; }
.sec-title { font-family:'DM Serif Display',serif;font-size:clamp(22px,3vw,30px);font-weight:400;color:#1C145C;line-height:1.2; }
.sec-sub { font-size:14px;color:#64748b;margin-top:6px;line-height:1.6; }
.sec-divider { width:100%;height:1px;background:linear-gradient(to right,#1C145C,#0ea5e9,transparent);margin-bottom:32px;opacity:.15; }

/* ============================================================
   SERVICE CARD
============================================================ */
.svc-card { background:#fff;border-radius:20px;border:1px solid #e8edf5;box-shadow:0 4px 20px rgba(28,20,92,.05);overflow:hidden; }
.svc-header { padding:36px 32px 30px;position:relative;overflow:hidden; }
.svc-header::after { content:'';position:absolute;right:-20px;bottom:-20px;width:120px;height:120px;border-radius:50%;background:rgba(255,255,255,.07);pointer-events:none; }
/* Bunga di svc-header */
.svc-header::before {
    content:'';position:absolute;right:20px;top:50%;transform:translateY(-50%);
    width:90px;height:90px;
    background-image:url('{{ asset("images/beranda/ornamen.png") }}');
    background-size:contain;background-repeat:no-repeat;background-position:center;
    opacity:0.12;pointer-events:none;filter:brightness(10);
    mask-image:radial-gradient(circle,rgba(0,0,0,1) 30%,transparent 70%);
    -webkit-mask-image:radial-gradient(circle,rgba(0,0,0,1) 30%,transparent 70%);
}
.svc-title { font-family:'DM Serif Display',serif;font-size:24px;font-weight:400;color:#fff;margin-bottom:8px;position:relative;z-index:1; }
.svc-tagline { font-size:13.5px;color:rgba(255,255,255,.72);line-height:1.6;position:relative;z-index:1; }
.svc-body { padding:26px 32px; }
.svc-desc { font-size:14.5px;color:#475569;line-height:1.8;margin-bottom:22px; }
.svc-list { list-style:none;padding:0;margin:0 0 22px;display:flex;flex-direction:column;gap:9px; }
.svc-list li { font-size:13.5px;color:#374151;padding-left:20px;position:relative;line-height:1.6; }
.svc-list li::before { content:'';position:absolute;left:0;top:7px;width:8px;height:8px;border-radius:50%;background:linear-gradient(135deg,#1C145C,#0ea5e9); }
.svc-footer { padding:0 32px 28px;display:flex;align-items:center;gap:10px;flex-wrap:wrap; }
.svc-badge { display:inline-flex;align-items:center;gap:6px;padding:7px 16px;border-radius:20px;font-size:12.5px;font-weight:600;text-decoration:none;transition:all .2s; }

/* ============================================================
   POLI GRID
============================================================ */
.poli-grid { display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:18px;margin-top:24px; }
.poli-card { background:#fff;border-radius:16px;border:1px solid #e8edf5;overflow:hidden;display:flex;flex-direction:column;transition:transform .28s cubic-bezier(.22,.68,0,1.2),box-shadow .28s,border-color .28s;animation:fadeUp .45s cubic-bezier(.22,.68,0,1.2) both; }
@keyframes fadeUp { from{opacity:0;transform:translateY(16px)} to{opacity:1;transform:translateY(0)} }
.poli-card:hover { transform:translateY(-4px);box-shadow:0 12px 32px rgba(28,20,92,.09);border-color:#c7d2fe; }
.poli-thumb { position:relative;background:#f0eeff;flex-shrink:0; }
.poli-thumb img { width:100%;height:auto;display:block;transition:transform .4s; }
.poli-card:hover .poli-thumb img { transform:scale(1.03); }
.poli-thumb-placeholder { height:155px;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#e0e7ff,#dbeafe); }
.poli-thumb-placeholder i { font-size:38px;color:#818cf8; }
.poli-status { position:absolute;top:10px;right:10px;font-size:9px;font-weight:800;padding:3px 10px;border-radius:20px;text-transform:uppercase; }
.poli-status.aktif    { background:rgba(16,185,129,.9);color:#fff; }
.poli-status.nonaktif { background:rgba(100,116,139,.8);color:#fff; }
.poli-body { padding:16px 18px;flex:1;display:flex;flex-direction:column; }
.poli-name { font-family:'DM Serif Display',serif;font-size:16px;font-weight:400;color:#1C145C;margin-bottom:6px;line-height:1.3; }
.poli-desc { font-size:12.5px;color:#64748b;line-height:1.65;flex:1;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;margin-bottom:12px; }
.poli-footer { padding:11px 18px 15px;border-top:1px solid #f1f5f9;display:flex;align-items:center;justify-content:space-between;gap:8px;flex-wrap:wrap; }
.poli-wa { display:inline-flex;align-items:center;gap:5px;padding:7px 13px;border-radius:9px;font-size:12px;font-weight:700;background:#dcfce7;color:#15803d;text-decoration:none;border:1px solid #86efac;transition:background .2s; }
.poli-wa:hover { background:#25D366;color:#fff; }
.poli-detail { display:inline-flex;align-items:center;gap:6px;padding:7px 16px;border-radius:9px;font-size:12px;font-weight:700;background:#1C145C;color:#fff;text-decoration:none;border:none;cursor:pointer;transition:background .2s; }
.poli-detail:hover { background:#2a1f7a;color:#fff; }
.poli-empty { grid-column:1/-1;padding:48px 24px;text-align:center;background:#fff;border-radius:16px;border:1px dashed #c7d2fe; }
.poli-empty p { font-size:14px;color:#64748b;margin:0; }

/* ============================================================
   REKAP CARDS
============================================================ */
.rekap-grid { display:grid;grid-template-columns:repeat(auto-fill,minmax(230px,1fr));gap:14px;margin-bottom:48px; }
.rekap-card { background:#fff;border-radius:16px;border:1px solid #e8edf5;padding:22px 20px;display:flex;flex-direction:column;text-decoration:none;color:inherit;box-shadow:0 2px 10px rgba(28,20,92,.04);animation:fadeUp .4s ease both;transition:transform .28s cubic-bezier(.22,.68,0,1.2),box-shadow .28s,border-color .28s; }
.rekap-card:hover { transform:translateY(-4px);box-shadow:0 12px 32px rgba(28,20,92,.09);text-decoration:none;color:inherit; }
.rekap-icon { width:48px;height:48px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:20px;margin-bottom:14px; }
.rekap-name { font-family:'DM Serif Display',serif;font-size:17px;font-weight:400;color:#1C145C;margin-bottom:6px; }
.rekap-desc { font-size:12.5px;color:#64748b;line-height:1.6;flex:1;margin-bottom:14px; }
.rekap-arrow { font-size:12px;font-weight:700;color:#1C145C;display:inline-flex;align-items:center;gap:5px; }

/* ============================================================
   RAWAT INAP — KELAS KAMAR
============================================================ */
.kelas-grid { display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:16px;margin-top:24px; }
.kelas-card {
    background:#fff;border-radius:16px;border:1px solid #e8edf5;overflow:hidden;
    box-shadow:0 3px 14px rgba(28,20,92,.05);
    transition:transform .28s cubic-bezier(.22,.68,0,1.2),box-shadow .28s,border-color .28s;
    animation:fadeUp .45s ease both;
    display:flex;flex-direction:column;
}
.kelas-card:hover { transform:translateY(-5px);box-shadow:0 14px 36px rgba(28,20,92,.11);border-color:#c7d2fe; }
.kelas-header {
    padding:22px 24px 18px;
    position:relative;overflow:hidden;
    display:flex;align-items:center;gap:14px;
}
.kelas-header::after {
    content:'';position:absolute;right:-14px;bottom:-14px;
    width:80px;height:80px;border-radius:50%;
    background:rgba(255,255,255,.08);pointer-events:none;
}
/* bunga mini di kelas header */
.kelas-header::before {
    content:'';position:absolute;right:16px;top:50%;transform:translateY(-50%);
    width:56px;height:56px;
    background-image:url('{{ asset("images/beranda/ornamen.png") }}');
    background-size:contain;background-repeat:no-repeat;background-position:center;
    opacity:0.13;pointer-events:none;filter:brightness(10);
    mask-image:radial-gradient(circle,rgba(0,0,0,1) 30%,transparent 70%);
    -webkit-mask-image:radial-gradient(circle,rgba(0,0,0,1) 30%,transparent 70%);
}
.kelas-icon-wrap {
    width:44px;height:44px;border-radius:12px;
    background:rgba(255,255,255,.18);
    display:flex;align-items:center;justify-content:center;
    font-size:20px;color:#fff;flex-shrink:0;position:relative;z-index:1;
}
.kelas-name { font-family:'DM Serif Display',serif;font-size:17px;font-weight:400;color:#fff;margin:0;position:relative;z-index:1; }
.kelas-body { padding:16px 22px;flex:1;display:flex;flex-direction:column;gap:8px; }
.kelas-feature { display:flex;align-items:flex-start;gap:10px;font-size:13px;color:#475569;line-height:1.55; }
.kelas-feature i { color:#1C145C;flex-shrink:0;margin-top:2px;font-size:13px;opacity:.7; }
.kelas-footer { padding:12px 22px 18px;border-top:1px solid #f1f5f9;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:8px; }
.kelas-badge { font-size:11.5px;font-weight:700;padding:4px 12px;border-radius:20px; }
.kelas-wa-btn { display:inline-flex;align-items:center;gap:5px;padding:7px 14px;border-radius:9px;font-size:12px;font-weight:700;background:#dcfce7;color:#15803d;text-decoration:none;border:1px solid #86efac;transition:.2s; }
.kelas-wa-btn:hover { background:#25D366;color:#fff; }

/* ============================================================
   DALAM PENGEMBANGAN
============================================================ */
.dev-banner { background:#fff;border-radius:20px;border:2px dashed #e2e8f0;padding:52px 32px;text-align:center; }
.dev-title { font-family:'DM Serif Display',serif;font-size:24px;font-weight:400;color:#1C145C;margin-bottom:8px; }
.dev-sub { font-size:14px;color:#64748b;line-height:1.7;max-width:480px;margin:0 auto 20px; }

/* ============================================================
   MCU PAKET
============================================================ */
.mcu-paket-card { background:#fff;border-radius:14px;border:1.5px solid #e8edf5;padding:20px 22px;margin-bottom:12px; }
.mcu-paket-card:last-child { margin-bottom:0; }
.mcu-paket-name { font-size:16px;font-weight:800;color:#1e293b;margin-bottom:6px; }
.mcu-paket-items { display:flex;flex-wrap:wrap;gap:6px;margin-top:10px; }
.mcu-paket-item { font-size:12px;padding:3px 10px;border-radius:20px;background:#f8faff;border:1px solid #e2e8f0;color:#475569; }

/* ============================================================
   DETAIL POLI MODE
============================================================ */
.detail-hero { background:linear-gradient(150deg,#1C145C 0%,#231a72 40%,#0ea5e9 100%);padding:130px 0 60px;position:relative;overflow:hidden; }
.detail-hero::before { content:'';position:absolute;right:-80px;top:-80px;width:420px;height:420px;border-radius:50%;background:radial-gradient(circle,rgba(255,255,255,.06),transparent 65%);pointer-events:none; }
/* Bunga di detail hero */
.detail-hero .hero-orn {
    position:absolute;right:-40px;bottom:-60px;width:280px;height:280px;
    background-image:url('{{ asset("images/beranda/ornamen.png") }}');
    background-size:contain;background-repeat:no-repeat;background-position:center;
    opacity:0.08;filter:brightness(10);pointer-events:none;
    mask-image:radial-gradient(circle at 55% 55%,rgba(0,0,0,1) 20%,transparent 70%);
    -webkit-mask-image:radial-gradient(circle at 55% 55%,rgba(0,0,0,1) 20%,transparent 70%);
}
.detail-hero-kat { display:inline-flex;align-items:center;gap:6px;background:rgba(14,165,233,.85);color:#fff;font-size:11px;font-weight:800;text-transform:uppercase;letter-spacing:1px;padding:5px 14px;border-radius:20px;margin-bottom:16px; }
.detail-hero-title { font-family:'DM Serif Display',serif;font-size:clamp(26px,4vw,44px);color:#fff;line-height:1.2;letter-spacing:-.3px;margin-bottom:14px;font-weight:400; }
.detail-hero-chips { display:flex;align-items:center;gap:8px;flex-wrap:wrap; }
.detail-chip { display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.15);color:rgba(255,255,255,.85);font-size:12px;font-weight:600;padding:5px 13px;border-radius:20px; }
.detail-chip.aktif { background:rgba(16,185,129,.18);border-color:rgba(16,185,129,.35);color:#6ee7b7; }
.detail-body { padding:0 0 80px; }
.detail-main { background:#fff;border-radius:20px;border:1px solid #e8edf5;box-shadow:0 8px 32px rgba(28,20,92,.07);overflow:hidden;margin-top:-32px;position:relative;z-index:5; }
.detail-featured-img { width:100%;height:auto;display:block;max-height:460px;object-fit:cover; }
.detail-img-placeholder { width:100%;height:280px;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#e0e7ff,#dbeafe);font-size:72px;color:#818cf8; }
.detail-content { padding:36px 40px; }
.detail-section-label { font-size:10px;font-weight:800;letter-spacing:1.5px;text-transform:uppercase;color:#64748b;margin-bottom:12px; }
.detail-desc { font-size:15.5px;color:#374151;line-height:1.9; }
.detail-desc p { margin-bottom:1em; }
.detail-divider { height:1px;background:#f0edf8;margin:0 40px 28px; }
.share-bar { display:flex;align-items:center;justify-content:space-between;margin:0 40px 28px;padding:14px 20px;background:#f8faff;border:1px solid #e8edf5;border-radius:12px;flex-wrap:wrap;gap:12px; }
.share-label { font-size:13px;font-weight:600;color:#64748b; }
.share-btns { display:flex;gap:8px; }
.share-btn { display:inline-flex;align-items:center;gap:6px;padding:7px 15px;border-radius:8px;border:none;font-family:'Plus Jakarta Sans',sans-serif;font-size:12.5px;font-weight:700;cursor:pointer;text-decoration:none;transition:transform .2s; }
.share-btn:hover { transform:translateY(-1px); }
.btn-wa-share { background:#25D366;color:#fff; }
.btn-wa-share:hover { color:#fff; }
.btn-copy { background:#f1f5f9;color:#475569;border:1.5px solid #e2e8f0; }
.btn-copy.copied { background:#10b981;color:#fff;border-color:#10b981; }
.detail-sidebar { position:sticky;top:110px; }
.sidebar-card { background:#fff;border-radius:18px;border:1px solid #e8edf5;box-shadow:0 4px 20px rgba(28,20,92,.07);overflow:hidden;margin-top:-32px;position:relative;z-index:5; }
.sc-header { background:linear-gradient(135deg,#1C145C 0%,#3b5bdb 100%);padding:22px 24px;position:relative;overflow:hidden; }
.sc-header::after {
    content:'';position:absolute;right:10px;bottom:-10px;width:70px;height:70px;
    background-image:url('{{ asset("images/beranda/ornamen.png") }}');
    background-size:contain;background-repeat:no-repeat;background-position:center;
    opacity:0.12;filter:brightness(10);pointer-events:none;
    mask-image:radial-gradient(circle,rgba(0,0,0,1) 30%,transparent 70%);
    -webkit-mask-image:radial-gradient(circle,rgba(0,0,0,1) 30%,transparent 70%);
}
.sc-header h3 { font-family:'DM Serif Display',serif;font-weight:400;font-size:17px;color:#fff;margin-bottom:3px;position:relative;z-index:1; }
.sc-header p  { font-size:11.5px;color:rgba(255,255,255,.6);margin:0;position:relative;z-index:1; }
.sc-body { padding:18px 22px; }
.info-row { display:flex;align-items:flex-start;gap:12px;padding:10px 0;border-bottom:1px solid #f0edf8; }
.info-row:last-child { border-bottom:none;padding-bottom:0; }
.info-icon { width:34px;height:34px;border-radius:9px;display:flex;align-items:center;justify-content:center;flex-shrink:0; }
.info-label { font-size:10px;color:#a09bbf;font-weight:700;letter-spacing:.3px;text-transform:uppercase; }
.info-val   { font-size:13.5px;color:#1C145C;font-weight:700;margin-top:2px; }
.btn-wa-sidebar { display:flex;align-items:center;justify-content:center;gap:8px;margin-top:16px;padding:12px 20px;border-radius:12px;font-size:13.5px;font-weight:700;background:#1D9E75;color:#fff;text-decoration:none;border:none;transition:background .2s;width:100%; }
.btn-wa-sidebar:hover { background:#0F6E56;color:#fff; }
.btn-tel-sidebar { display:flex;align-items:center;justify-content:center;gap:8px;margin-top:10px;padding:11px 20px;border-radius:12px;font-size:13px;font-weight:700;background:#FCEAEA;color:#c0392b;text-decoration:none;border:1px solid #F09595;transition:background .2s;width:100%; }
.btn-tel-sidebar:hover { background:#F09595;color:#791F1F; }
.jadwal-cta { display:block;margin-top:14px;text-decoration:none;border-radius:16px;overflow:hidden;border:1.5px solid #1C145C;background:linear-gradient(135deg,#EEEDFE 0%,#E6F1FB 100%);transition:transform .2s,box-shadow .2s; }
.jadwal-cta:hover { transform:translateY(-2px);box-shadow:0 8px 24px rgba(28,20,92,.15);text-decoration:none; }
.jadwal-inner { display:flex;align-items:center;gap:12px;padding:16px 18px; }
.jadwal-text .jt-label { font-size:13.5px;font-weight:800;color:#1C145C; }
.jadwal-text .jt-sub   { font-size:11px;color:#534AB7;margin-top:2px; }
.jadwal-arrow { font-size:18px;color:#1C145C;margin-left:auto;transition:transform .2s; }
.jadwal-cta:hover .jadwal-arrow { transform:translateX(4px); }
.terkait-title { font-family:'DM Serif Display',serif;font-size:22px;font-weight:400;color:#1C145C;margin-bottom:20px; }
.terkait-grid { display:grid;grid-template-columns:repeat(auto-fill,minmax(255px,1fr));gap:14px; }
.terkait-card { background:#fff;border-radius:14px;border:1px solid #e8edf5;overflow:hidden;display:flex;flex-direction:column;text-decoration:none;color:inherit;transition:transform .28s cubic-bezier(.22,.68,0,1.2),box-shadow .28s,border-color .28s; }
.terkait-card:hover { transform:translateY(-4px);box-shadow:0 12px 32px rgba(28,20,92,.09);border-color:#c7d2fe;text-decoration:none;color:inherit; }
.terkait-thumb { position:relative;background:#f0eeff;flex-shrink:0; }
.terkait-thumb img { width:100%;height:140px;object-fit:cover;display:block;transition:transform .4s; }
.terkait-card:hover .terkait-thumb img { transform:scale(1.03); }
.terkait-thumb-placeholder { height:130px;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#e0e7ff,#dbeafe);font-size:32px;color:#818cf8; }
.terkait-body { padding:14px 16px;flex:1; }
.terkait-name { font-family:'DM Serif Display',serif;font-size:14.5px;font-weight:400;color:#1C145C;margin-bottom:4px; }
.terkait-desc { font-size:12px;color:#64748b;line-height:1.6;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden; }
.terkait-footer { padding:10px 16px 13px;border-top:1px solid #f1f5f9;display:flex;justify-content:flex-end; }
.terkait-btn { display:inline-flex;align-items:center;gap:5px;padding:6px 14px;border-radius:8px;font-size:12px;font-weight:700;background:#1C145C;color:#fff; }

/* ============================================================
   HOME SERVICE LAB — Card khusus
============================================================ */
.homeservice-card {
    background:linear-gradient(135deg,#f0fdf4 0%,#ecfdf5 100%);
    border-radius:16px;border:1.5px solid #86efac;padding:26px 28px;
    position:relative;overflow:hidden;
}
.homeservice-card::after {
    content:'';position:absolute;right:-20px;top:50%;transform:translateY(-50%);
    width:100px;height:100px;
    background-image:url('{{ asset("images/beranda/ornamen.png") }}');
    background-size:contain;background-repeat:no-repeat;background-position:center;
    opacity:0.08;pointer-events:none;
    filter:hue-rotate(120deg) saturate(0.6);
    mask-image:radial-gradient(circle,rgba(0,0,0,1) 30%,transparent 70%);
    -webkit-mask-image:radial-gradient(circle,rgba(0,0,0,1) 30%,transparent 70%);
}

/* ============================================================
   FOOTER
============================================================ */
.footer-rsu { background:linear-gradient(to bottom,#ffffff 0%,#fefefd 3%,#fdfcf6 8%,#fcfbf3 13%,#faf8ee 20%,#f7f5e8 30%,#f3f0e1 45%,#ede9d9 65%,#e8e3d2 85%,#e3deca 100%);color:#1C145C;padding:56px 0 0;position:relative;overflow:hidden; }
.footer-rsu .footer-ornament  { position:absolute;right:-80px;bottom:-150px;width:420px;height:420px;opacity:.07;background-image:url('{{ asset("images/beranda/ornamen.png") }}');background-size:contain;background-repeat:no-repeat;background-position:center;pointer-events:none;z-index:0; }
.footer-rsu .footer-ornament2 { position:absolute;left:-100px;top:40px;width:340px;height:340px;opacity:.04;background-image:url('{{ asset("images/beranda/ornamen.png") }}');background-size:contain;background-repeat:no-repeat;background-position:center;pointer-events:none;z-index:0; }
.footer-rsu .container-fluid  { max-width:1100px;position:relative;z-index:1; }
.footer-rsu .footer-logo { height:50px;display:block;margin-bottom:16px; }
.footer-rsu .footer-title { font-size:16px;font-weight:700;color:#1C145C;margin-bottom:8px; }
.footer-rsu .footer-desc  { font-size:13px;line-height:1.8;color:#5a5480;margin-bottom:20px;max-width:290px; }
.footer-rsu .footer-social { display:flex;gap:10px;margin-bottom:22px; }
.footer-rsu .footer-social a { width:36px;height:36px;border-radius:50%;background:rgba(28,20,92,.07);border:1px solid rgba(28,20,92,.15);display:flex;align-items:center;justify-content:center;color:#1C145C;text-decoration:none;font-size:15px;transition:.2s; }
.footer-rsu .footer-social a:hover { background:#1C145C;color:#FEFCF1;transform:translateY(-2px); }
.footer-rsu .footer-mitra-label { font-size:11px;color:#9994bb;text-transform:uppercase;letter-spacing:.08em;margin-bottom:10px; }
.footer-rsu .footer-mitra { display:flex;gap:10px;align-items:center;flex-wrap:wrap; }
.footer-rsu .footer-mitra img:nth-child(1) { height:35px; }
.footer-rsu .footer-mitra img:nth-child(2) { height:26px; }
.footer-rsu .footer-heading { font-weight:900;font-size:12px;color:#1C145C;text-transform:uppercase;letter-spacing:.14em;margin-bottom:16px;padding-bottom:10px;border-bottom:1.5px solid rgba(28,20,92,.12); }
.footer-rsu ul { list-style:none;padding:0;margin:0; }
.footer-rsu ul li { margin-bottom:9px; }
.footer-rsu a { color:#5a5480;text-decoration:none;font-size:13.5px;transition:.2s;display:inline-flex;align-items:center;gap:5px; }
.footer-rsu ul li a::before { content:'›';color:#1C145C;opacity:.4;font-size:15px;line-height:1; }
.footer-rsu a:hover { color:#1C145C;padding-left:3px; }
.footer-rsu .footer-contact-row  { display:flex;align-items:flex-start;gap:11px;margin-bottom:13px; }
.footer-rsu .footer-contact-icon { width:33px;height:33px;border-radius:8px;background:rgba(28,20,92,.07);border:1px solid rgba(28,20,92,.1);display:flex;align-items:center;justify-content:center;font-size:14px;color:#1C145C;flex-shrink:0; }
.footer-rsu .footer-contact-text { font-size:13px;color:#5a5480;line-height:1.65;padding-top:4px; }
.footer-rsu hr { height:1px;background:linear-gradient(90deg,rgba(28,20,92,0) 0%,rgba(28,20,92,.12) 30%,rgba(28,20,92,.12) 70%,rgba(28,20,92,0) 100%);border:none;margin:36px 0 0; }
.footer-rsu .footer-bottom { background:rgba(28,20,92,.05);padding:15px 36px;position:relative;z-index:1; }
.footer-rsu .footer-copy  { font-size:12.5px;color:#9994bb;display:flex;justify-content:space-between;align-items:center;gap:12px; }
.footer-rsu .footer-copy-badge { background:rgba(28,20,92,.06);border:1px solid rgba(28,20,92,.12);border-radius:20px;padding:4px 14px;font-size:11.5px;color:#7a74a0;white-space:nowrap; }
.footer-rsu .footer-accent-dot { display:inline-block;width:3px;height:3px;border-radius:50%;background:#1C145C;opacity:.25;margin:0 8px;vertical-align:middle; }

/* ============================================================
   RESPONSIVE
============================================================ */
@media(max-width:1100px) { .nav-link-pill{padding:7px 11px;font-size:13px;} }
@media(max-width:991px) {
    body{padding-top:calc(38px + 64px);}
    .navbar-float-wrap{padding:10px 12px;} .navbar-float{border-radius:26px;padding:10px 14px;}
    .nav-links,.nav-cta{display:none;} .nav-burger{display:flex;}
    .topbar-info span{font-size:10px;} .topbar-social{gap:10px;}
    .detail-sidebar{position:static;margin-top:24px;} .sidebar-card,.detail-main{margin-top:0;}
    .footer-rsu{padding:45px 0 0;} .footer-rsu .row>div{margin-bottom:28px;} .footer-rsu .footer-desc{max-width:100%;}
    .dokter-ticker-track{animation-duration:60s;}
    .kelas-grid{grid-template-columns:repeat(2,1fr);}
}
@media(max-width:768px) {
    .lay-hero{padding:110px 0 60px;} .detail-hero{padding:110px 0 52px;}
    .hero-stats{width:100%;max-width:calc(100% - 28px);}
    .hero-stat-item{padding:12px 16px;} .hero-stat-num{font-size:18px;}
    .rekap-grid{grid-template-columns:repeat(2,1fr);gap:12px;}
    .poli-grid{grid-template-columns:1fr;}
    .kelas-grid{grid-template-columns:1fr;}
    .svc-header,.svc-body,.svc-footer{padding-left:22px;padding-right:22px;}
    .detail-content,.detail-divider,.share-bar{padding-left:22px;padding-right:22px;}
    .terkait-grid{grid-template-columns:1fr 1fr;}
    .footer-rsu{padding:40px 0 0;} .footer-rsu .container-fluid{padding-left:20px!important;padding-right:20px!important;}
    .footer-rsu .footer-copy{flex-direction:column;align-items:flex-start;gap:8px;} .footer-rsu .footer-bottom{padding:15px 20px;}
    .footer-rsu a:hover{padding-left:0;}
}
@media(max-width:480px) {
    .topbar-info span{font-size:9px;} .navbar-float{border-radius:22px;}
    .rekap-grid{grid-template-columns:1fr;}
    .terkait-grid{grid-template-columns:1fr;}
    .dokter-ticker-track{animation-duration:45s;}
    .dtc-foto,.dtc-no-foto{width:38px;height:38px;} .dtc-nama{font-size:11.5px;}
    .dokter-ticker-card{padding:0 14px 0 0;gap:8px;}
}
</style>


<!-- TOPBAR -->
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

<!-- NAVBAR -->
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
                    <a href="{{ url('/layanan') }}" class="drop-item">
                        <span class="drop-item-icon" style="background:#e0e7ff;color:#4338ca;"><i class="bi bi-grid-3x3-gap"></i></span>
                        Semua Layanan
                    </a>
                    <div class="drop-divider"></div>
                    <a href="{{ url('/layanan#igd') }}"          class="drop-item"><span class="drop-item-icon" style="background:#fee2e2;color:#dc2626;"><i class="bi bi-bandaid-fill"></i></span> IGD 24 Jam</a>
                    <a href="{{ url('/layanan#rawatjalan') }}"   class="drop-item"><span class="drop-item-icon" style="background:#e0f2fe;color:#0284c7;"><i class="bi bi-clipboard2-pulse"></i></span> Rawat Jalan</a>
                    <a href="{{ url('/layanan#rawatinap') }}"    class="drop-item"><span class="drop-item-icon" style="background:#ede9fe;color:#7c3aed;"><i class="bi bi-hospital"></i></span> Rawat Inap</a>
                    <a href="{{ url('/layanan#ambulans') }}"     class="drop-item"><span class="drop-item-icon" style="background:#fef3c7;color:#d97706;"><i class="bi bi-truck"></i></span> Ambulans 24 Jam</a>
                    <a href="{{ url('/layanan#laboratorium') }}" class="drop-item"><span class="drop-item-icon" style="background:#d1fae5;color:#059669;"><i class="bi bi-eyedropper"></i></span> Laboratorium</a>
                    <a href="{{ url('/layanan#radiologi') }}"    class="drop-item"><span class="drop-item-icon" style="background:#ede9fe;color:#6366f1;"><i class="bi bi-radioactive"></i></span> Radiologi</a>
                    <a href="{{ url('/layanan#farmasi') }}"      class="drop-item"><span class="drop-item-icon" style="background:#fce7f3;color:#db2777;"><i class="bi bi-capsule"></i></span> Farmasi</a>
                    <a href="{{ url('/layanan#mcu') }}"          class="drop-item"><span class="drop-item-icon" style="background:#ccfbf1;color:#0d9488;"><i class="bi bi-heart-pulse"></i></span> Medical Check Up</a>
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
        <a href="/" class="d-link {{ request()->is('/') ? 'active' : '' }}"><span class="d-icon"><i class="bi bi-house"></i></span> Beranda</a>
        <div class="d-group-label">Konten</div>
        <div class="d-sub">
            <a href="{{ url('/karir') }}"  class="d-link"><span class="d-icon"><i class="bi bi-briefcase"></i></span> Karir</a>
            <a href="{{ url('/berita') }}" class="d-link"><span class="d-icon"><i class="bi bi-newspaper"></i></span> Berita</a>
            <a href="{{ url('/video') }}"  class="d-link"><span class="d-icon"><i class="bi bi-play-circle"></i></span> Video</a>
        </div>
        <div class="d-divider"></div>
        <a href="/layanan" class="d-link {{ request()->is('layanan*') ? 'active' : '' }}"><span class="d-icon"><i class="bi bi-hospital"></i></span> Layanan</a>
        <div class="d-sub">
            <a href="{{ url('/layanan#igd') }}"          class="d-link" style="font-size:13px;"><span class="d-icon" style="background:#fee2e2;color:#dc2626;"><i class="bi bi-bandaid-fill"></i></span> IGD 24 Jam</a>
            <a href="{{ url('/layanan#rawatjalan') }}"   class="d-link" style="font-size:13px;"><span class="d-icon" style="background:#e0f2fe;color:#0284c7;"><i class="bi bi-clipboard2-pulse"></i></span> Rawat Jalan</a>
            <a href="{{ url('/layanan#rawatinap') }}"    class="d-link" style="font-size:13px;"><span class="d-icon" style="background:#ede9fe;color:#7c3aed;"><i class="bi bi-hospital"></i></span> Rawat Inap</a>
            <a href="{{ url('/layanan#ambulans') }}"     class="d-link" style="font-size:13px;"><span class="d-icon" style="background:#fef3c7;color:#d97706;"><i class="bi bi-truck"></i></span> Ambulans 24 Jam</a>
            <a href="{{ url('/layanan#laboratorium') }}" class="d-link" style="font-size:13px;"><span class="d-icon" style="background:#d1fae5;color:#059669;"><i class="bi bi-eyedropper"></i></span> Laboratorium</a>
            <a href="{{ url('/layanan#radiologi') }}"    class="d-link" style="font-size:13px;"><span class="d-icon" style="background:#ede9fe;color:#6366f1;"><i class="bi bi-radioactive"></i></span> Radiologi</a>
            <a href="{{ url('/layanan#farmasi') }}"      class="d-link" style="font-size:13px;"><span class="d-icon" style="background:#fce7f3;color:#db2777;"><i class="bi bi-capsule"></i></span> Farmasi</a>
            <a href="{{ url('/layanan#mcu') }}"          class="d-link" style="font-size:13px;"><span class="d-icon" style="background:#ccfbf1;color:#0d9488;"><i class="bi bi-heart-pulse"></i></span> Medical Check Up</a>
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
    const burger=document.getElementById('navBurger'),drawer=document.getElementById('navDrawer'),overlay=document.getElementById('navOverlay'),closeBtn=document.getElementById('drawerClose'),navbar=document.getElementById('mainNavbar');
    function openDrawer(){burger.classList.add('open');drawer.classList.add('open');overlay.classList.add('show');document.body.style.overflow='hidden';}
    function closeDrawer(){burger.classList.remove('open');drawer.classList.remove('open');overlay.classList.remove('show');document.body.style.overflow='';}
    burger.addEventListener('click',e=>{e.stopPropagation();drawer.classList.contains('open')?closeDrawer():openDrawer();});
    closeBtn.addEventListener('click',closeDrawer); overlay.addEventListener('click',closeDrawer);
    drawer.querySelectorAll('.d-link').forEach(l=>l.addEventListener('click',closeDrawer));
    window.addEventListener('scroll',()=>navbar.classList.toggle('scrolled',window.scrollY>10),{passive:true});
});
</script>


{{-- ================================================================
     MODE: DETAIL POLIKLINIK
================================================================ --}}
@if(isset($poli))

<section class="detail-hero">
    <div class="hero-orn"></div>
    <div class="hero-dots"></div>
    <div class="container hero-inner">
        <div class="hero-bc">
            <a href="/">Beranda</a>
            <span class="sep"><i class="bi bi-chevron-right"></i></span>
            <a href="{{ url('/layanan') }}">Layanan</a>
            <span class="sep"><i class="bi bi-chevron-right"></i></span>
            <a href="{{ url('/layanan#rawatjalan') }}">Rawat Jalan</a>
            <span class="sep"><i class="bi bi-chevron-right"></i></span>
            <span class="cur">{{ $poli->poli }}</span>
        </div>
        <div class="detail-hero-kat"><i class="bi bi-clipboard2-pulse"></i> Rawat Jalan — Poliklinik</div>
        <h1 class="detail-hero-title">{{ $poli->poli }}</h1>
        <div class="detail-hero-chips">
            <span class="detail-chip {{ $poli->status === 'aktif' ? 'aktif' : '' }}">
                <i class="bi bi-circle-fill" style="font-size:8px;"></i>
                {{ $poli->status === 'aktif' ? 'Layanan Aktif' : 'Tidak Aktif' }}
            </span>
            <span class="detail-chip"><i class="bi bi-hospital"></i> RSU Allam Medica</span>
            @if($poli->no_hp)
            <span class="detail-chip"><i class="bi bi-telephone"></i> {{ $poli->no_hp }}</span>
            @endif
        </div>
    </div>
</section>

{{-- Ticker dokter di halaman detail poli --}}
@if(isset($dokterList) && $dokterList->count())
<div class="dokter-ticker-section">
    <div class="dokter-ticker-track">
        @foreach($dokterList as $dok)
        <div class="dokter-ticker-card">
            <div class="dtc-foto-wrap">
                @if($dok->foto)
                    <img src="{{ asset('uploads/dokter/'.$dok->foto) }}" alt="{{ $dok->nama }}" class="dtc-foto" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                    <div class="dtc-no-foto" style="display:none;"><i class="fa-solid fa-user-doctor"></i></div>
                @else
                    <div class="dtc-no-foto"><i class="fa-solid fa-user-doctor"></i></div>
                @endif
                <span class="dtc-online-dot"></span>
            </div>
            <div class="dtc-info">
                <div class="dtc-label">Dokter</div>
                <div class="dtc-nama">{{ $dok->nama }}</div>
                @if($dok->spesialis)<div class="dtc-sp">{{ $dok->spesialis }}</div>@endif
            </div>
        </div>
        @endforeach
        {{-- duplikat untuk efek scroll tak henti --}}
        @foreach($dokterList as $dok)
        <div class="dokter-ticker-card">
            <div class="dtc-foto-wrap">
                @if($dok->foto)
                    <img src="{{ asset('uploads/dokter/'.$dok->foto) }}" alt="{{ $dok->nama }}" class="dtc-foto" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                    <div class="dtc-no-foto" style="display:none;"><i class="fa-solid fa-user-doctor"></i></div>
                @else
                    <div class="dtc-no-foto"><i class="fa-solid fa-user-doctor"></i></div>
                @endif
                <span class="dtc-online-dot"></span>
            </div>
            <div class="dtc-info">
                <div class="dtc-label">Dokter</div>
                <div class="dtc-nama">{{ $dok->nama }}</div>
                @if($dok->spesialis)<div class="dtc-sp">{{ $dok->spesialis }}</div>@endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

<div class="detail-body">
<div class="container" style="padding-top:48px;">
<div class="row g-4">

    {{-- MAIN CONTENT --}}
    <div class="col-lg-8">
        <div class="detail-main">
            @if($poli->gambar)
                <img src="{{ asset('storage/'.$poli->gambar) }}" alt="{{ $poli->poli }}" class="detail-featured-img">
            @else
                <div class="detail-img-placeholder">
                    <i class="bi bi-clipboard2-pulse"></i>
                </div>
            @endif

            <div class="detail-content">
                <div class="detail-section-label">Tentang Layanan</div>
                <div class="detail-desc">
                    @if($poli->deskripsi)
                        @foreach(explode("\n", $poli->deskripsi) as $para)
                            @if(trim($para))<p>{{ trim($para) }}</p>@endif
                        @endforeach
                    @else
                        <p style="color:#a09bbf;">Deskripsi layanan belum tersedia.</p>
                    @endif
                </div>
            </div>

            <div class="detail-divider"></div>

            <div class="share-bar">
                <span class="share-label"><i class="bi bi-share" style="margin-right:5px;"></i> Bagikan layanan ini</span>
                <div class="share-btns">
                    <a href="https://wa.me/?text={{ urlencode($poli->poli.' — RSU Allam Medica '.url()->current()) }}" target="_blank" class="share-btn btn-wa-share">
                        <i class="bi bi-whatsapp"></i> WhatsApp
                    </a>
                    <button class="share-btn btn-copy" id="copyBtn" onclick="copyLink()">
                        <i class="bi bi-link-45deg"></i> Salin Link
                    </button>
                </div>
            </div>
        </div>

        <div style="margin-top:18px;">
            <a href="{{ url('/layanan#rawatjalan') }}" style="display:inline-flex;align-items:center;gap:8px;padding:10px 22px;border-radius:10px;background:#1C145C;color:#fff;text-decoration:none;font-size:13.5px;font-weight:700;">
                <i class="bi bi-arrow-left"></i> Kembali ke Rawat Jalan
            </a>
        </div>

        {{-- Poli terkait --}}
        @if(isset($poliTerkait) && $poliTerkait->count())
        <div style="margin-top:40px;">
            <div class="terkait-title">Poliklinik Lainnya</div>
            <div class="terkait-grid">
                @foreach($poliTerkait as $i => $p)
                <a href="{{ route('layanan.poli', $p['id']) }}" class="terkait-card" style="animation:fadeUp .4s ease {{ $i*0.08 }}s both;">
                    <div class="terkait-thumb">
                        @if($p['gambar'])
                            <img src="{{ $p['gambar'] }}" alt="{{ $p['poli'] }}" loading="lazy">
                        @else
                            <div class="terkait-thumb-placeholder"><i class="bi bi-clipboard2-pulse"></i></div>
                        @endif
                    </div>
                    <div class="terkait-body">
                        <div class="terkait-name">{{ $p['poli'] }}</div>
                        <div class="terkait-desc">{{ $p['deskripsi'] ?: 'Layanan poliklinik RSU Allam Medica.' }}</div>
                    </div>
                    <div class="terkait-footer">
                        <span class="terkait-btn">Detail <i class="bi bi-arrow-right" style="font-size:11px;"></i></span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>

    {{-- SIDEBAR --}}
    <div class="col-lg-4">
        <div class="detail-sidebar">
            <div class="sidebar-card">
                <div class="sc-header">
                    <h3>Informasi Kontak</h3>
                    <p>Hubungi kami untuk janji temu</p>
                </div>
                <div class="sc-body">
                    <div class="info-row">
                        <div class="info-icon" style="background:#e0f2fe;"><i class="bi bi-clipboard2-pulse" style="color:#0284c7;font-size:15px;"></i></div>
                        <div><div class="info-label">Poliklinik</div><div class="info-val">{{ $poli->poli }}</div></div>
                    </div>
                    <div class="info-row">
                        <div class="info-icon" style="background:{{ $poli->status==='aktif'?'#d1fae5':'#f1f5f9' }};"><i class="bi bi-circle-fill" style="color:{{ $poli->status==='aktif'?'#059669':'#94a3b8' }};font-size:10px;"></i></div>
                        <div><div class="info-label">Status</div><div class="info-val" style="color:{{ $poli->status==='aktif'?'#059669':'#94a3b8' }};">{{ $poli->status==='aktif'?'Aktif':'Tidak Aktif' }}</div></div>
                    </div>
                    @if($poli->no_hp)
                    <div class="info-row">
                        <div class="info-icon" style="background:#fee2e2;"><i class="bi bi-telephone-fill" style="color:#dc2626;font-size:14px;"></i></div>
                        <div><div class="info-label">Telepon</div><div class="info-val">{{ $poli->no_hp }}</div></div>
                    </div>
                    @endif
                    @php $noWa = preg_replace('/[^0-9]/','',$poli->no_wa??''); @endphp
                    @if($noWa)
                    <div class="info-row">
                        <div class="info-icon" style="background:#d1fae5;"><i class="bi bi-whatsapp" style="color:#059669;font-size:15px;"></i></div>
                        <div><div class="info-label">WhatsApp</div><div class="info-val">+{{ $noWa }}</div></div>
                    </div>
                    @endif

                    @if($noWa)
                    <a href="https://wa.me/{{ $noWa }}" target="_blank" class="btn-wa-sidebar">
                        <i class="bi bi-whatsapp"></i> Chat WhatsApp
                    </a>
                    @endif
                    @if($poli->no_hp)
                    <a href="tel:{{ preg_replace('/[^0-9]/','',$poli->no_hp) }}" class="btn-tel-sidebar">
                        <i class="bi bi-telephone-fill"></i> Hubungi via Telepon
                    </a>
                    @endif
                </div>
            </div>

            {{-- Jam rawat jalan --}}
            <div style="background:#fff;border-radius:16px;border:1px solid #e8edf5;padding:18px 20px;margin-top:14px;box-shadow:0 2px 12px rgba(28,20,92,.05);">
                <div style="font-size:11px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.8px;margin-bottom:14px;">
                    <i class="bi bi-clock" style="margin-right:5px;"></i> Jam Rawat Jalan
                </div>
                <div style="display:flex;flex-direction:column;gap:8px;">
                    <div style="display:flex;justify-content:space-between;padding:9px 12px;background:#f8faff;border-radius:8px;border:1px solid #e8edf5;">
                        <span style="font-size:13px;font-weight:600;color:#1e293b;">Senin – Sabtu</span>
                        <span style="font-size:13px;font-weight:700;color:#059669;">07.00 – 21.00</span>
                    </div>
                    <div style="display:flex;justify-content:space-between;padding:9px 12px;background:#f8faff;border-radius:8px;border:1px solid #e8edf5;">
                        <span style="font-size:13px;font-weight:600;color:#1e293b;">Minggu</span>
                        <span style="font-size:13px;font-weight:700;color:#d97706;">08.00 – 14.00</span>
                    </div>
                </div>
                <p style="font-size:11.5px;color:#94a3b8;margin-top:10px;margin-bottom:0;line-height:1.5;">Jam praktik dapat berubah. Konfirmasi melalui telepon sebelum kunjungan.</p>
            </div>

            <a href="{{ route('jadwaldokter') }}" class="jadwal-cta">
                <div class="jadwal-inner">
                    <div style="width:40px;height:40px;border-radius:11px;background:#fff;border:1px solid rgba(28,20,92,.15);display:flex;align-items:center;justify-content:center;font-size:18px;color:#1C145C;flex-shrink:0;">
                        <i class="bi bi-calendar2-week-fill"></i>
                    </div>
                    <div class="jadwal-text">
                        <div class="jt-label">Lihat Jadwal Dokter</div>
                        <div class="jt-sub">Cek jadwal & ketersediaan dokter</div>
                    </div>
                    <i class="bi bi-arrow-right jadwal-arrow"></i>
                </div>
            </a>
        </div>
    </div>

</div>
</div>
</div>


{{-- ================================================================
     MODE: LIST LAYANAN
================================================================ --}}
@else

<section class="lay-hero">
    <div class="hero-orn"></div>
    <div class="hero-orn-2"></div>
    <div class="hero-dots"></div>
    <div class="container hero-inner">
        <div class="hero-bc">
            <a href="/">Beranda</a>
            <span class="sep"><i class="bi bi-chevron-right"></i></span>
            <span class="cur">Layanan</span>
        </div>
        <div class="hero-kat"><i class="bi bi-hospital-fill"></i> Poliklinik &amp; Layanan Medis</div>
        <h1 class="hero-title">Layanan Kesehatan<br><em>RSU Allam Medica</em></h1>
        <div class="hero-meta">
            <span class="hero-meta-pill"><i class="bi bi-geo-alt-fill"></i> RSU Allam Medica Bumiayu</span>
            <span class="hero-meta-pill"><i class="bi bi-grid-3x3-gap"></i> 8 Jenis Layanan</span>
            <span class="hero-meta-pill"><i class="bi bi-bandaid-fill"></i> IGD 24 Jam</span>
            <span class="hero-meta-pill"><i class="bi bi-shield-check"></i> Melayani BPJS</span>
        </div>
        <div class="hero-stats">
            <div class="hero-stat-item"><span class="hero-stat-num">8</span><div class="hero-stat-label">Jenis Layanan</div></div>
            <div class="hero-stat-item"><span class="hero-stat-num">24<small style="font-size:13px">/7</small></span><div class="hero-stat-label">IGD Siaga</div></div>
            <div class="hero-stat-item"><span class="hero-stat-num">BPJS</span><div class="hero-stat-label">Menerima BPJS</div></div>
            <div class="hero-stat-item"><span class="hero-stat-num" id="statPoli">—</span><div class="hero-stat-label">Poliklinik</div></div>
        </div>
    </div>
</section>

{{-- Ticker dokter --}}
@if(isset($dokterList) && $dokterList->count())
<div class="dokter-ticker-section">
    <div class="dokter-ticker-track">
        @foreach($dokterList as $dok)
        <div class="dokter-ticker-card">
            <div class="dtc-foto-wrap">
                @if($dok->foto)
                    <img src="{{ asset('uploads/dokter/'.$dok->foto) }}" alt="{{ $dok->nama }}" class="dtc-foto" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                    <div class="dtc-no-foto" style="display:none;"><i class="fa-solid fa-user-doctor"></i></div>
                @else
                    <div class="dtc-no-foto"><i class="fa-solid fa-user-doctor"></i></div>
                @endif
                <span class="dtc-online-dot"></span>
            </div>
            <div class="dtc-info">
                <div class="dtc-label">Dokter</div>
                <div class="dtc-nama">{{ $dok->nama }}</div>
                @if($dok->spesialis)<div class="dtc-sp">{{ $dok->spesialis }}</div>@endif
            </div>
        </div>
        @endforeach
        @foreach($dokterList as $dok)
        <div class="dokter-ticker-card">
            <div class="dtc-foto-wrap">
                @if($dok->foto)
                    <img src="{{ asset('uploads/dokter/'.$dok->foto) }}" alt="{{ $dok->nama }}" class="dtc-foto" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                    <div class="dtc-no-foto" style="display:none;"><i class="fa-solid fa-user-doctor"></i></div>
                @else
                    <div class="dtc-no-foto"><i class="fa-solid fa-user-doctor"></i></div>
                @endif
                <span class="dtc-online-dot"></span>
            </div>
            <div class="dtc-info">
                <div class="dtc-label">Dokter</div>
                <div class="dtc-nama">{{ $dok->nama }}</div>
                @if($dok->spesialis)<div class="dtc-sp">{{ $dok->spesialis }}</div>@endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

{{-- TABS --}}
<div class="layanan-tabs-wrap">
    <div class="container">
        <div class="layanan-tabs" id="layananTabs">
            <a href="#rekap"        class="lay-tab active" data-section="rekap"><i class="bi bi-grid-3x3-gap"></i> Semua</a>
            <a href="#igd"          class="lay-tab" data-section="igd"><i class="bi bi-bandaid-fill"></i> IGD 24 Jam</a>
            <a href="#rawatjalan"   class="lay-tab" data-section="rawatjalan"><i class="bi bi-clipboard2-pulse"></i> Rawat Jalan</a>
            <a href="#rawatinap"    class="lay-tab" data-section="rawatinap"><i class="bi bi-hospital"></i> Rawat Inap</a>
            <a href="#ambulans"     class="lay-tab" data-section="ambulans"><i class="bi bi-truck"></i> Ambulans</a>
            <a href="#laboratorium" class="lay-tab" data-section="laboratorium"><i class="bi bi-eyedropper"></i> Laboratorium</a>
            <a href="#radiologi"    class="lay-tab" data-section="radiologi"><i class="bi bi-radioactive"></i> Radiologi</a>
            <a href="#farmasi"      class="lay-tab" data-section="farmasi"><i class="bi bi-capsule"></i> Farmasi</a>
            <a href="#mcu"          class="lay-tab" data-section="mcu"><i class="bi bi-heart-pulse"></i> Medical Check Up</a>
        </div>
    </div>
</div>

<div class="layanan-page-body">
<div class="container" style="position:relative;z-index:1;">

    {{-- ===================== REKAP ===================== --}}
    <section id="rekap" class="lay-section">
        <div style="margin-bottom:28px;">
            <div class="sec-label" style="background:#e0e7ff;color:#4338ca;"><i class="bi bi-grid-3x3-gap"></i> Semua Layanan</div>
            <div class="sec-title">Pilih Layanan yang Anda Butuhkan</div>
            <div class="sec-sub">RSU Allam Medica menyediakan berbagai layanan kesehatan komprehensif untuk masyarakat Bumiayu dan sekitarnya.</div>
        </div>
        <div class="sec-divider"></div>
        <div class="rekap-grid">
            <a href="#igd" class="rekap-card" onclick="smoothTo('igd',event)" style="animation-delay:.04s">
                <div class="rekap-icon" style="background:#fee2e2;color:#dc2626;"><i class="bi bi-bandaid-fill"></i></div>
                <div class="rekap-name">IGD 24 Jam</div>
                <div class="rekap-desc">Penanganan gawat darurat cepat dan profesional, siap melayani 24 jam setiap hari.</div>
                <span class="rekap-arrow">Lihat Detail <i class="bi bi-arrow-right"></i></span>
            </a>
            <a href="#rawatjalan" class="rekap-card" onclick="smoothTo('rawatjalan',event)" style="animation-delay:.08s">
                <div class="rekap-icon" style="background:#e0f2fe;color:#0284c7;"><i class="bi bi-clipboard2-pulse"></i></div>
                <div class="rekap-name">Rawat Jalan</div>
                <div class="rekap-desc">Berbagai poliklinik spesialis dengan dokter berpengalaman untuk konsultasi dan pemeriksaan.</div>
                <span class="rekap-arrow">Lihat Poli <i class="bi bi-arrow-right"></i></span>
            </a>
            <a href="#rawatinap" class="rekap-card" onclick="smoothTo('rawatinap',event)" style="animation-delay:.12s">
                <div class="rekap-icon" style="background:#ede9fe;color:#7c3aed;"><i class="bi bi-hospital"></i></div>
                <div class="rekap-name">Rawat Inap</div>
                <div class="rekap-desc">Fasilitas rawat inap dengan berbagai kelas kamar dan perawatan dari tenaga profesional.</div>
                <span class="rekap-arrow">Lihat Kelas <i class="bi bi-arrow-right"></i></span>
            </a>
            <a href="#ambulans" class="rekap-card" onclick="smoothTo('ambulans',event)" style="animation-delay:.16s">
                <div class="rekap-icon" style="background:#fef3c7;color:#d97706;"><i class="bi bi-truck"></i></div>
                <div class="rekap-name">Ambulans 24 Jam</div>
                <div class="rekap-desc">Layanan ambulans siaga 24 jam dengan perlengkapan medis lengkap dan tim terlatih.</div>
                <span class="rekap-arrow">Lihat Detail <i class="bi bi-arrow-right"></i></span>
            </a>
            <a href="#laboratorium" class="rekap-card" onclick="smoothTo('laboratorium',event)" style="animation-delay:.20s">
                <div class="rekap-icon" style="background:#d1fae5;color:#059669;"><i class="bi bi-eyedropper"></i></div>
                <div class="rekap-name">Laboratorium</div>
                <div class="rekap-desc">Pemeriksaan laboratorium lengkap termasuk home service, buka 24 jam setiap hari termasuk hari libur.</div>
                <span class="rekap-arrow">Lihat Detail <i class="bi bi-arrow-right"></i></span>
            </a>
            <a href="#radiologi" class="rekap-card" onclick="smoothTo('radiologi',event)" style="animation-delay:.24s">
                <div class="rekap-icon" style="background:#ede9fe;color:#6366f1;"><i class="bi bi-radioactive"></i></div>
                <div class="rekap-name">Radiologi</div>
                <div class="rekap-desc">Layanan diagnostik pencitraan meliputi rontgen, USG, CT Scan, dan pemeriksaan lainnya.</div>
                <span class="rekap-arrow">Lihat Detail <i class="bi bi-arrow-right"></i></span>
            </a>
            <a href="#farmasi" class="rekap-card" onclick="smoothTo('farmasi',event)" style="animation-delay:.28s">
                <div class="rekap-icon" style="background:#fce7f3;color:#db2777;"><i class="bi bi-capsule"></i></div>
                <div class="rekap-name">Farmasi</div>
                <div class="rekap-desc">Apotek buka 24 jam dengan obat-obatan lengkap, melayani resep dokter dan obat bebas.</div>
                <span class="rekap-arrow">Lihat Detail <i class="bi bi-arrow-right"></i></span>
            </a>
            <a href="#mcu" class="rekap-card" onclick="smoothTo('mcu',event)" style="animation-delay:.32s">
                <div class="rekap-icon" style="background:#ccfbf1;color:#0d9488;"><i class="bi bi-heart-pulse"></i></div>
                <div class="rekap-name">Medical Check Up</div>
                <div class="rekap-desc">Paket MCU komprehensif untuk deteksi dini penyakit dan pemeriksaan kesehatan berkala.</div>
                <span class="rekap-arrow">Lihat Detail <i class="bi bi-arrow-right"></i></span>
            </a>
        </div>
    </section>


    {{-- ===================== IGD ===================== --}}
    <section id="igd" class="lay-section">
        <div class="sec-divider"></div>
        <div class="row g-4">
            <div class="col-lg-5">
                <div class="svc-card h-100">
                    <div class="svc-header" style="background:linear-gradient(135deg,#7f1d1d 0%,#dc2626 100%);">
                        <div style="font-size:32px;margin-bottom:12px;position:relative;z-index:1;">🚨</div>
                        <div class="svc-title">IGD 24 Jam</div>
                        <div class="svc-tagline">Penanganan gawat darurat cepat, tepat, dan profesional sepanjang waktu</div>
                    </div>
                    <div class="svc-body">
                        <p class="svc-desc">Instalasi Gawat Darurat RSU Allam Medica beroperasi penuh 24 jam sehari, 7 hari seminggu, 365 hari setahun. Ditangani oleh tim dokter dan perawat terlatih yang siap memberikan pertolongan pertama dan penanganan medis darurat.</p>
                        <ul class="svc-list">
                            <li>Buka 24 jam, 7 hari seminggu</li>
                            <li>Tim dokter dan perawat terlatih</li>
                            <li>Peralatan medis darurat lengkap</li>
                            <li>Ruang observasi dan stabilisasi</li>
                            <li>Menerima pasien BPJS dan umum</li>
                        </ul>
                    </div>
                    <div class="svc-footer">
                        <a href="tel:085292224886" class="svc-badge" style="background:#fee2e2;color:#dc2626;border:1px solid #fca5a5;"><i class="bi bi-telephone-fill"></i> 085292224886</a>
                        <a href="https://wa.me/6285292224886" target="_blank" class="svc-badge" style="background:#dcfce7;color:#15803d;border:1px solid #86efac;"><i class="bi bi-whatsapp"></i> WhatsApp</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-flex align-items-stretch">
                <div style="background:#fff;border-radius:20px;border:1px solid #e8edf5;box-shadow:0 4px 20px rgba(28,20,92,.05);padding:32px;width:100%;position:relative;overflow:hidden;">
                    {{-- ornamen bunga tipis di pojok --}}
                    <div style="position:absolute;right:-30px;bottom:-30px;width:120px;height:120px;background-image:url('{{ asset('images/beranda/ornamen.png') }}');background-size:contain;background-repeat:no-repeat;background-position:center;opacity:0.04;pointer-events:none;filter:hue-rotate(0deg) saturate(0.3);"></div>
                    <div style="font-size:11px;font-weight:800;color:#64748b;text-transform:uppercase;letter-spacing:.8px;margin-bottom:18px;">Prosedur Penanganan</div>
                    <div style="display:flex;flex-direction:column;gap:16px;">
                        @php
                        $steps=[
                            ['num'=>'01','icon'=>'bi-funnel','title'=>'Triage','desc'=>'Pasien diklasifikasikan berdasarkan tingkat kegawatan untuk menentukan prioritas penanganan.'],
                            ['num'=>'02','icon'=>'bi-person-check','title'=>'Pemeriksaan Awal','desc'=>'Dokter IGD melakukan pemeriksaan fisik dan penanganan stabilisasi kondisi pasien.'],
                            ['num'=>'03','icon'=>'bi-activity','title'=>'Penanganan & Observasi','desc'=>'Tindakan medis darurat diberikan dan pasien diobservasi hingga kondisi stabil.'],
                            ['num'=>'04','icon'=>'bi-arrow-right-circle','title'=>'Rawat Inap atau Rujukan','desc'=>'Pasien dirujuk ke rawat inap atau difasilitasi rujukan ke rumah sakit lain bila diperlukan.'],
                        ];
                        @endphp
                        @foreach($steps as $s)
                        <div style="display:flex;gap:14px;align-items:flex-start;">
                            <div style="width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,#fee2e2,#fecaca);color:#dc2626;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:800;flex-shrink:0;border:1px solid #fca5a5;">{{ $s['num'] }}</div>
                            <div>
                                <div style="font-size:14px;font-weight:700;color:#1e293b;margin-bottom:3px;display:flex;align-items:center;gap:7px;">
                                    <i class="bi {{ $s['icon'] }}" style="color:#dc2626;font-size:13px;"></i>
                                    {{ $s['title'] }}
                                </div>
                                <div style="font-size:13px;color:#64748b;line-height:1.6;">{{ $s['desc'] }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ===================== RAWAT JALAN ===================== --}}
    <section id="rawatjalan" class="lay-section">
        <div class="lay-section-header" style="display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:28px;gap:16px;flex-wrap:wrap;">
            <div>
                <div class="sec-label" style="background:#e0f2fe;color:#0284c7;"><i class="bi bi-clipboard2-pulse"></i> Rawat Jalan</div>
                <div class="sec-title">Poliklinik Spesialis</div>
                <div class="sec-sub">Konsultasi dengan dokter spesialis berpengalaman di berbagai bidang.<br>Klik <strong>Detail</strong> untuk melihat halaman lengkap setiap poliklinik.</div>
            </div>
            <div style="text-align:right;flex-shrink:0;">
                <div style="font-size:12px;color:#64748b;margin-bottom:4px;">Total Poliklinik</div>
                <div style="font-family:'DM Serif Display',serif;font-size:32px;color:#1C145C;" id="poliCount">—</div>
            </div>
        </div>
        <div class="sec-divider"></div>

        <div style="background:#fff;border-radius:12px;border:1px solid #e8edf5;padding:12px 16px;display:flex;align-items:center;gap:10px;margin-bottom:20px;box-shadow:0 2px 8px rgba(28,20,92,.04);flex-wrap:wrap;">
            <div style="position:relative;flex:1;min-width:180px;">
                <i class="bi bi-search" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:13px;pointer-events:none;"></i>
                <input type="search" id="searchPoli" placeholder="Cari poliklinik..." oninput="filterPoli()"
                    style="width:100%;padding:8px 12px 8px 34px;border:1.5px solid #e2e8f0;border-radius:9px;font-size:13px;outline:none;background:#f8faff;">
            </div>
            <select id="filterPoliStatus" onchange="filterPoli()"
                style="padding:8px 26px 8px 11px;border:1.5px solid #e2e8f0;border-radius:9px;font-size:13px;outline:none;background:#f8faff;appearance:none;background-image:url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%2364748b' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E\");background-repeat:no-repeat;background-position:right 9px center;cursor:pointer;">
                <option value="">Semua Status</option>
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
        </div>

        <div class="poli-grid" id="poliGrid">
            @php $poliItems = collect($layananData)->where('kategori','poli')->values(); @endphp
            @forelse($poliItems as $i => $pol)
            <div class="poli-card" data-nama="{{ strtolower($pol['poli']??'') }}" data-status="{{ $pol['status']??'aktif' }}" style="animation-delay:{{ min($i*0.06,0.5) }}s">
                <div class="poli-thumb">
                    @if(!empty($pol['gambar']))
                        <img src="{{ $pol['gambar'] }}" alt="{{ $pol['poli'] }}" loading="lazy">
                    @else
                        <div class="poli-thumb-placeholder"><i class="bi bi-clipboard2-pulse"></i></div>
                    @endif
                    <span class="poli-status {{ $pol['status']??'aktif' }}">{{ ($pol['status']??'aktif')==='aktif'?'Aktif':'Nonaktif' }}</span>
                </div>
                <div class="poli-body">
                    <div class="poli-name">{{ $pol['poli'] }}</div>
                    <div class="poli-desc">{{ $pol['deskripsi']??'Layanan poliklinik spesialis RSU Allam Medica.' }}</div>
                </div>
                <div class="poli-footer">
                    @php $noWa=preg_replace('/[^0-9]/','', $pol['no_wa']??''); @endphp
                    @if($noWa)
                        <a href="https://wa.me/{{ $noWa }}" target="_blank" class="poli-wa"><i class="bi bi-whatsapp"></i> WhatsApp</a>
                    @else
                        <span style="font-size:12px;color:#94a3b8;font-style:italic;">—</span>
                    @endif
                    <a href="{{ route('layanan.poli', $pol['id']) }}" class="poli-detail">
                        <i class="bi bi-eye" style="font-size:11px;"></i> Detail <i class="bi bi-arrow-right" style="font-size:11px;"></i>
                    </a>
                </div>
            </div>
            @empty
            <div class="poli-empty"><p><i class="bi bi-inbox" style="font-size:24px;display:block;margin-bottom:8px;"></i>Belum ada data poliklinik.</p></div>
            @endforelse
        </div>

        {{-- CTA Jadwal Dokter --}}
        <div style="margin-top:28px;background:linear-gradient(135deg,#1C145C 0%,#3b5bdb 100%);border-radius:18px;padding:28px 32px;display:flex;align-items:center;justify-content:space-between;gap:20px;flex-wrap:wrap;position:relative;overflow:hidden;">
            <div style="position:absolute;right:-20px;bottom:-20px;width:120px;height:120px;background-image:url('{{ asset('images/beranda/ornamen.png') }}');background-size:contain;background-repeat:no-repeat;background-position:center;opacity:0.1;filter:brightness(10);"></div>
            <div style="position:relative;z-index:1;">
                <div style="font-size:11px;font-weight:700;color:rgba(255,255,255,.5);text-transform:uppercase;letter-spacing:.8px;margin-bottom:6px;">Jadwal Dokter</div>
                <div style="font-family:'DM Serif Display',serif;font-size:22px;color:#fff;font-weight:400;margin-bottom:4px;">Cek Jadwal Praktik Dokter</div>
                <div style="font-size:13px;color:rgba(255,255,255,.65);">Temukan dokter yang tepat sesuai kebutuhan Anda</div>
            </div>
            <a href="{{ route('jadwaldokter') }}" style="display:inline-flex;align-items:center;gap:10px;padding:12px 24px;border-radius:13px;background:#fff;color:#1C145C;font-size:14px;font-weight:800;text-decoration:none;box-shadow:0 4px 16px rgba(0,0,0,.15);position:relative;z-index:1;">
                <i class="bi bi-calendar2-week-fill"></i> Lihat Jadwal Dokter <i class="bi bi-arrow-right" style="font-size:12px;"></i>
            </a>
        </div>
    </section>


    {{-- ===================== RAWAT INAP — KELAS KAMAR ===================== --}}
    <section id="rawatinap" class="lay-section">
        <div class="sec-divider"></div>
        <div style="margin-bottom:28px;">
            <div class="sec-label" style="background:#ede9fe;color:#7c3aed;"><i class="bi bi-hospital"></i> Rawat Inap</div>
            <div class="sec-title">Fasilitas Rawat Inap</div>
            <div class="sec-sub">RSU Allam Medica menyediakan berbagai pilihan kelas perawatan sesuai kebutuhan dan kondisi pasien.</div>
        </div>
        @php
        $kelasRawat = [
            [
                'nama'    => 'Kelas 1',
                'icon'    => 'bi-star-fill',
                'grad'    => 'linear-gradient(135deg,#1e3a6e 0%,#2563eb 100%)',
                'badge_bg'=> '#dbeafe',
                'badge_c' => '#1d4ed8',
                'badge'   => 'Kelas 1',
                'fitur'   => [
                    ['icon'=>'bi-door-open','teks'=>'2 tempat tidur per kamar'],
                    ['icon'=>'bi-wifi','teks'=>'Fasilitas TV & WiFi'],
                    ['icon'=>'bi-person-check','teks'=>'Pelayanan perawat prioritas'],
                    ['icon'=>'bi-box-seam','teks'=>'Lemari & ruang penyimpanan'],
                ],
            ],
            [
                'nama'    => 'Kelas 2',
                'icon'    => 'bi-star-half',
                'grad'    => 'linear-gradient(135deg,#1e4d3a 0%,#059669 100%)',
                'badge_bg'=> '#d1fae5',
                'badge_c' => '#065f46',
                'badge'   => 'Kelas 2',
                'fitur'   => [
                    ['icon'=>'bi-door-open','teks'=>'3–4 tempat tidur per kamar'],
                    ['icon'=>'bi-shield-plus','teks'=>'Pelayanan keperawatan standar'],
                    ['icon'=>'bi-person-hearts','teks'=>'Ruang kunjungan keluarga'],
                    ['icon'=>'bi-patch-check','teks'=>'Melayani pasien BPJS'],
                ],
            ],
            [
                'nama'    => 'Kelas 3',
                'icon'    => 'bi-star',
                'grad'    => 'linear-gradient(135deg,#3d2a0f 0%,#d97706 100%)',
                'badge_bg'=> '#fef3c7',
                'badge_c' => '#92400e',
                'badge'   => 'Kelas 3',
                'fitur'   => [
                    ['icon'=>'bi-door-open','teks'=>'5–6 tempat tidur per kamar'],
                    ['icon'=>'bi-patch-check','teks'=>'Melayani pasien BPJS'],
                    ['icon'=>'bi-shield-plus','teks'=>'Perawatan medis lengkap'],
                    ['icon'=>'bi-people','teks'=>'Area keluarga tersedia'],
                ],
            ],
            [
                'nama'    => 'Intermediet',
                'icon'    => 'bi-activity',
                'grad'    => 'linear-gradient(135deg,#1a1a5e 0%,#6366f1 100%)',
                'badge_bg'=> '#ede9fe',
                'badge_c' => '#4c1d95',
                'badge'   => 'Perawatan Khusus',
                'fitur'   => [
                    ['icon'=>'bi-heart-pulse-fill','teks'=>'Monitor vital sign kontinu'],
                    ['icon'=>'bi-person-badge','teks'=>'Perawat terlatih 24 jam'],
                    ['icon'=>'bi-capsule','teks'=>'Obat-obatan khusus tersedia'],
                    ['icon'=>'bi-exclamation-triangle','teks'=>'Untuk pasien semi-kritis'],
                ],
            ],
            [
                'nama'    => 'Perinatologi',
                'icon'    => 'bi-emoji-smile',
                'grad'    => 'linear-gradient(135deg,#831843 0%,#ec4899 100%)',
                'badge_bg'=> '#fce7f3',
                'badge_c' => '#9d174d',
                'badge'   => 'Bayi Baru Lahir',
                'fitur'   => [
                    ['icon'=>'bi-thermometer','teks'=>'Inkubator & penghangat bayi'],
                    ['icon'=>'bi-lungs','teks'=>'Monitor oksigen neonatus'],
                    ['icon'=>'bi-person-badge','teks'=>'Perawat neonatus terlatih'],
                    ['icon'=>'bi-heart','teks'=>'Perawatan bayi baru lahir'],
                ],
            ],
            [
                'nama'    => 'IGD',
                'icon'    => 'bi-bandaid-fill',
                'grad'    => 'linear-gradient(135deg,#7f1d1d 0%,#dc2626 100%)',
                'badge_bg'=> '#fee2e2',
                'badge_c' => '#991b1b',
                'badge'   => 'Gawat Darurat',
                'fitur'   => [
                    ['icon'=>'bi-lightning-fill','teks'=>'Penanganan darurat cepat'],
                    ['icon'=>'bi-activity','teks'=>'Monitor pasien real-time'],
                    ['icon'=>'bi-clock-fill','teks'=>'Siaga 24 jam penuh'],
                    ['icon'=>'bi-people-fill','teks'=>'Tim dokter & perawat siaga'],
                ],
            ],
            [
                'nama'    => 'HCU / ICU / PICU / NICU',
                'icon'    => 'bi-heart-pulse-fill',
                'grad'    => 'linear-gradient(135deg,#134e4a 0%,#0d9488 100%)',
                'badge_bg'=> '#ccfbf1',
                'badge_c' => '#134e4a',
                'badge'   => 'Perawatan Intensif',
                'fitur'   => [
                    ['icon'=>'bi-heart-pulse-fill','teks'=>'Monitor intensif 24 jam'],
                    ['icon'=>'bi-lungs','teks'=>'Ventilator & alat bantu napas'],
                    ['icon'=>'bi-person-badge','teks'=>'Dokter spesialis jaga'],
                    ['icon'=>'bi-shield-fill-check','teks'=>'Penanganan kritis komprehensif'],
                ],
            ],
            [
                'nama'    => 'Ruang Bersalin',
                'icon'    => 'bi-gender-female',
                'grad'    => 'linear-gradient(135deg,#5b21b6 0%,#8b5cf6 100%)',
                'badge_bg'=> '#ede9fe',
                'badge_c' => '#5b21b6',
                'badge'   => 'Kebidanan',
                'fitur'   => [
                    ['icon'=>'bi-heart','teks'=>'Ruang persalinan nyaman & bersih'],
                    ['icon'=>'bi-person-badge','teks'=>'Bidan & dokter kebidanan siap'],
                    ['icon'=>'bi-shield-plus','teks'=>'Mendukung metode VBAC & SC'],
                    ['icon'=>'bi-people-fill','teks'=>'Pendamping persalinan diizinkan'],
                ],
            ],
        ];
        @endphp
        <div class="kelas-grid">
            @foreach($kelasRawat as $i => $kelas)
            <div class="kelas-card" style="animation-delay:{{ min($i*0.07,0.5) }}s;">
                <div class="kelas-header" style="background:{{ $kelas['grad'] }};">
                    <div class="kelas-icon-wrap">
                        <i class="bi {{ $kelas['icon'] }}"></i>
                    </div>
                    <div class="kelas-name">{{ $kelas['nama'] }}</div>
                </div>
                <div class="kelas-body">
                    @foreach($kelas['fitur'] as $f)
                    <div class="kelas-feature">
                        <i class="bi {{ $f['icon'] }}"></i>
                        <span>{{ $f['teks'] }}</span>
                    </div>
                    @endforeach
                </div>
                <div class="kelas-footer">
                    <span class="kelas-badge" style="background:{{ $kelas['badge_bg'] }};color:{{ $kelas['badge_c'] }};">{{ $kelas['badge'] }}</span>
                    <a href="https://wa.me/6285292224886?text=Halo,%20saya%20ingin%20info%20{{ urlencode($kelas['nama']) }}" target="_blank" class="kelas-wa-btn">
                        <i class="bi bi-whatsapp"></i> Tanya
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- CTA Rawat Inap --}}
        <div style="margin-top:28px;background:#fff;border-radius:16px;border:1px solid #e8edf5;padding:24px 28px;display:flex;align-items:center;gap:16px;flex-wrap:wrap;box-shadow:0 2px 12px rgba(28,20,92,.05);">
            <div style="width:44px;height:44px;border-radius:12px;background:#ede9fe;display:flex;align-items:center;justify-content:center;font-size:20px;color:#7c3aed;flex-shrink:0;"><i class="bi bi-info-circle-fill"></i></div>
            <div style="flex:1;">
                <div style="font-size:14px;font-weight:700;color:#1e293b;margin-bottom:3px;">Informasi Ketersediaan Kamar</div>
                <div style="font-size:13px;color:#64748b;line-height:1.6;">Untuk ketersediaan kamar dan informasi lebih lanjut, silakan hubungi petugas kami.</div>
            </div>
            <div style="display:flex;gap:10px;flex-wrap:wrap;">
                <a href="tel:085292224886" style="display:inline-flex;align-items:center;gap:7px;padding:10px 18px;border-radius:10px;background:#1C145C;color:#fff;font-size:13px;font-weight:700;text-decoration:none;"><i class="bi bi-telephone-fill"></i> Telepon</a>
                <a href="https://wa.me/6285292224886?text=Halo,%20saya%20ingin%20info%20ketersediaan%20kamar%20rawat%20inap" target="_blank" style="display:inline-flex;align-items:center;gap:7px;padding:10px 18px;border-radius:10px;background:#dcfce7;color:#15803d;font-size:13px;font-weight:700;text-decoration:none;border:1px solid #86efac;"><i class="bi bi-whatsapp"></i> WhatsApp</a>
            </div>
        </div>
    </section>


    {{-- ===================== AMBULANS ===================== --}}
    <section id="ambulans" class="lay-section">
        <div class="sec-divider"></div>
        <div class="svc-card">
            <div class="row g-0">
                <div class="col-lg-4">
                    <div class="svc-header h-100" style="background:linear-gradient(135deg,#78350f 0%,#f59e0b 100%);border-radius:20px 0 0 20px;">
                        <div style="font-size:32px;margin-bottom:12px;position:relative;z-index:1;">🚑</div>
                        <div class="svc-title">Ambulans 24 Jam</div>
                        <div class="svc-tagline">Respons cepat ke mana pun Anda membutuhkan pertolongan</div>
                        <div style="margin-top:22px;position:relative;z-index:1;">
                            <a href="tel:085292224886" class="svc-badge" style="background:rgba(255,255,255,.2);color:#fff;border:1px solid rgba(255,255,255,.3);">
                                <i class="bi bi-telephone-fill"></i> Hubungi Sekarang
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="svc-body">
                        <p class="svc-desc">Layanan ambulans RSU Allam Medica siap 24 jam untuk transportasi pasien gawat darurat maupun rujukan. Armada dilengkapi peralatan medis darurat dan ditangani oleh pengemudi serta petugas medis terlatih.</p>
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
                            @php
                            $fiturAmb=[
                                ['icon'=>'bi-clock-fill','bg'=>'#fef3c7','c'=>'#d97706','title'=>'Siaga 24 Jam','desc'=>'Tersedia setiap saat termasuk hari libur nasional'],
                                ['icon'=>'bi-geo-alt-fill','bg'=>'#dbeafe','c'=>'#1d4ed8','title'=>'Jangkauan Luas','desc'=>'Melayani wilayah Bumiayu dan sekitarnya'],
                                ['icon'=>'bi-bag-plus-fill','bg'=>'#fee2e2','c'=>'#dc2626','title'=>'Perlengkapan Medis','desc'=>'Tabung oksigen, defibrilator, dan alat medis darurat'],
                                ['icon'=>'bi-person-badge-fill','bg'=>'#d1fae5','c'=>'#059669','title'=>'Tim Terlatih','desc'=>'Pengemudi dan petugas medis bersertifikat'],
                            ];
                            @endphp
                            @foreach($fiturAmb as $f)
                            <div style="padding:14px 16px;background:#f8faff;border-radius:12px;border:1px solid #e8edf5;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:6px;">
                                    <div style="width:30px;height:30px;border-radius:8px;background:{{ $f['bg'] }};display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                        <i class="bi {{ $f['icon'] }}" style="color:{{ $f['c'] }};font-size:14px;"></i>
                                    </div>
                                    <div style="font-size:13.5px;font-weight:700;color:#1e293b;">{{ $f['title'] }}</div>
                                </div>
                                <div style="font-size:12.5px;color:#64748b;line-height:1.5;">{{ $f['desc'] }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ===================== LABORATORIUM ===================== --}}
    <section id="laboratorium" class="lay-section">
        <div class="sec-divider"></div>
        <div class="row g-4">
            <div class="col-lg-5">
                <div class="svc-card h-100">
                    <div class="svc-header" style="background:linear-gradient(135deg,#064e3b 0%,#059669 100%);">
                        <div style="font-size:32px;margin-bottom:12px;position:relative;z-index:1;">🧪</div>
                        <div class="svc-title">Laboratorium</div>
                        <div class="svc-tagline">Pemeriksaan akurat dengan teknologi modern, buka 24 jam termasuk hari libur</div>
                        <div style="margin-top:16px;display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.25);color:#fff;font-size:12px;font-weight:700;padding:5px 12px;border-radius:20px;position:relative;z-index:1;">
                            <i class="bi bi-clock-fill"></i> Buka 24 Jam Setiap Hari
                        </div>
                    </div>
                    <div class="svc-body">
                        <p class="svc-desc">Laboratorium RSU Allam Medica dilengkapi peralatan diagnostik modern untuk berbagai jenis pemeriksaan. Beroperasi 24 jam termasuk hari Minggu dan hari libur nasional, dengan hasil yang akurat untuk mendukung diagnosis dokter.</p>
                        <ul class="svc-list">
                            <li>Pemeriksaan darah lengkap</li>
                            <li>Tes urin dan feses</li>
                            <li>Pemeriksaan kimia klinik</li>
                            <li>Serologi dan imunologi</li>
                            <li>Kultur dan sensitivitas bakteri</li>
                            <li>Pemeriksaan elektrolit & hormon</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-flex align-items-stretch">
                <div style="display:flex;flex-direction:column;gap:16px;width:100%;">

                    {{-- Home Service Card --}}
                    <div class="homeservice-card">
                        <div style="display:flex;align-items:flex-start;gap:14px;margin-bottom:16px;">
                            <div style="width:48px;height:48px;border-radius:14px;background:linear-gradient(135deg,#059669,#10b981);display:flex;align-items:center;justify-content:center;font-size:22px;color:#fff;flex-shrink:0;">🏠</div>
                            <div>
                                <div style="font-family:'DM Serif Display',serif;font-size:20px;color:#065f46;font-weight:400;margin-bottom:4px;">Home Service Laboratorium</div>
                                <div style="font-size:12px;font-weight:700;color:#059669;background:#d1fae5;border:1px solid #6ee7b7;padding:2px 10px;border-radius:20px;display:inline-block;">Layanan ke Rumah Anda</div>
                            </div>
                        </div>
                        <p style="font-size:13.5px;color:#15803d;line-height:1.75;margin-bottom:14px;">Tidak perlu datang ke rumah sakit. Petugas laboratorium kami siap datang ke rumah Anda untuk pengambilan sampel darah, urin, dan pemeriksaan lainnya.</p>
                        <ul class="svc-list" style="margin-bottom:16px;">
                            <li>Jadwal fleksibel sesuai permintaan</li>
                            <li>Tersedia untuk area Bumiayu dan sekitarnya</li>
                            <li>Hasil dikirim via WhatsApp atau diambil langsung</li>
                            <li>Petugas bersertifikat & berpengalaman</li>
                        </ul>
                        <a href="https://wa.me/6285292224886?text=Halo,%20saya%20ingin%20pesan%20home%20service%20laboratorium" target="_blank"
                           style="display:inline-flex;align-items:center;gap:7px;padding:10px 20px;border-radius:10px;background:#059669;color:#fff;font-size:13px;font-weight:700;text-decoration:none;">
                            <i class="bi bi-whatsapp"></i> Pesan Home Service
                        </a>
                    </div>

                    {{-- Jenis pemeriksaan tambahan --}}
                    <div style="background:#fff;border-radius:14px;border:1px solid #e8edf5;padding:20px 22px;box-shadow:0 2px 10px rgba(28,20,92,.04);">
                        <div style="font-size:11px;font-weight:800;color:#64748b;text-transform:uppercase;letter-spacing:.8px;margin-bottom:14px;"><i class="bi bi-flask" style="margin-right:4px;"></i> Pemeriksaan Tambahan</div>
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:9px;">
                            @php
                            $labExtra=[
                                ['icon'=>'bi-droplet-fill','bg'=>'#fee2e2','c'=>'#dc2626','nama'=>'Hemostasis'],
                                ['icon'=>'bi-virus','bg'=>'#ede9fe','c'=>'#7c3aed','nama'=>'Virologi'],
                                ['icon'=>'bi-activity','bg'=>'#d1fae5','c'=>'#059669','nama'=>'Enzim Jantung'],
                                ['icon'=>'bi-gender-ambiguous','bg'=>'#fce7f3','c'=>'#db2777','nama'=>'Hormon'],
                                ['icon'=>'bi-bug','bg'=>'#fef3c7','c'=>'#d97706','nama'=>'Mikrobiologi'],
                                ['icon'=>'bi-search-heart','bg'=>'#e0f2fe','c'=>'#0284c7','nama'=>'Tumor Marker'],
                            ];
                            @endphp
                            @foreach($labExtra as $ex)
                            <div style="display:flex;align-items:center;gap:9px;padding:9px 11px;background:#f8faff;border-radius:9px;border:1px solid #e8edf5;">
                                <div style="width:28px;height:28px;border-radius:7px;background:{{ $ex['bg'] }};display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                    <i class="bi {{ $ex['icon'] }}" style="color:{{ $ex['c'] }};font-size:12px;"></i>
                                </div>
                                <span style="font-size:12.5px;font-weight:600;color:#1e293b;">{{ $ex['nama'] }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    {{-- ===================== RADIOLOGI ===================== --}}
    <section id="radiologi" class="lay-section">
        <div class="sec-divider"></div>
        <div class="svc-card">
            <div class="row g-0">
                <div class="col-lg-4">
                    <div class="svc-header h-100" style="background:linear-gradient(135deg,#1e1b4b 0%,#6366f1 100%);border-radius:20px 0 0 20px;">
                        <div style="font-size:32px;margin-bottom:12px;position:relative;z-index:1;">🩻</div>
                        <div class="svc-title">Radiologi</div>
                        <div class="svc-tagline">Diagnostik pencitraan dengan peralatan modern dan akurasi tinggi</div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="svc-body">
                        <p class="svc-desc">Instalasi Radiologi RSU Allam Medica menyediakan layanan diagnostik pencitraan dengan peralatan modern. Didukung dokter spesialis radiologi berpengalaman untuk interpretasi yang akurat.</p>
                        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:10px;">
                            @php
                            $radLayanan=[
                                ['icon'=>'bi-radioactive','bg'=>'#ede9fe','c'=>'#6366f1','nama'=>'Rontgen / X-Ray'],
                                ['icon'=>'bi-soundwave','bg'=>'#e0f2fe','c'=>'#0284c7','nama'=>'USG'],
                                ['icon'=>'bi-bullseye','bg'=>'#fee2e2','c'=>'#dc2626','nama'=>'CT Scan'],
                                ['icon'=>'bi-heart-pulse','bg'=>'#d1fae5','c'=>'#059669','nama'=>'EKG'],
                                ['icon'=>'bi-reception-4','bg'=>'#fef3c7','c'=>'#d97706','nama'=>'Echo'],
                                ['icon'=>'bi-lungs','bg'=>'#fce7f3','c'=>'#db2777','nama'=>'Foto Thorax'],
                            ];
                            @endphp
                            @foreach($radLayanan as $r)
                            <div style="text-align:center;padding:16px 8px;background:#f8faff;border-radius:12px;border:1px solid #e8edf5;transition:transform .2s,border-color .2s;" onmouseover="this.style.transform='translateY(-3px)';this.style.borderColor='#c7d2fe';" onmouseout="this.style.transform='';this.style.borderColor='#e8edf5';">
                                <div style="width:36px;height:36px;border-radius:10px;background:{{ $r['bg'] }};display:flex;align-items:center;justify-content:center;margin:0 auto 8px;">
                                    <i class="bi {{ $r['icon'] }}" style="color:{{ $r['c'] }};font-size:16px;"></i>
                                </div>
                                <div style="font-size:12.5px;font-weight:700;color:#1e293b;">{{ $r['nama'] }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ===================== FARMASI ===================== --}}
    <section id="farmasi" class="lay-section">
        <div class="sec-divider"></div>
        <div class="row g-4">
            <div class="col-lg-5">
                <div class="svc-card h-100">
                    <div class="svc-header" style="background:linear-gradient(135deg,#831843 0%,#ec4899 100%);">
                        <div style="font-size:32px;margin-bottom:12px;position:relative;z-index:1;">💊</div>
                        <div class="svc-title">Farmasi / Apotek</div>
                        <div class="svc-tagline">Obat-obatan lengkap berkualitas, buka 24 jam setiap hari termasuk hari libur</div>
                    </div>
                    <div class="svc-body">
                        <p class="svc-desc">Instalasi Farmasi RSU Allam Medica menyediakan obat-obatan lengkap dan berkualitas. Melayani resep dokter rumah sakit, resep luar, serta obat bebas — buka 24 jam termasuk hari Minggu dan hari libur nasional.</p>
                        <ul class="svc-list">
                            <li>Obat generik dan paten lengkap</li>
                            <li>Melayani resep BPJS dan umum</li>
                            <li>Konsultasi apoteker tersedia</li>
                            <li>Buka 24 jam setiap hari</li>
                            <li>Resep dari luar dapat dilayani</li>
                        </ul>
                    </div>
                    <div class="svc-footer">
                        <span class="svc-badge" style="background:#fce7f3;color:#db2777;border:1px solid #f9a8d4;"><i class="bi bi-clock-fill"></i> Buka 24 Jam — Termasuk Hari Libur</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-flex align-items-stretch">
                <div style="background:#fff;border-radius:20px;border:1px solid #e8edf5;box-shadow:0 4px 20px rgba(28,20,92,.05);padding:32px;width:100%;display:flex;flex-direction:column;justify-content:center;position:relative;overflow:hidden;">
                    <div style="position:absolute;right:-30px;bottom:-30px;width:130px;height:130px;background-image:url('{{ asset('images/beranda/ornamen.png') }}');background-size:contain;background-repeat:no-repeat;background-position:center;opacity:0.04;pointer-events:none;filter:hue-rotate(320deg) saturate(0.5);"></div>
                    <div style="font-size:11px;font-weight:800;color:#64748b;text-transform:uppercase;letter-spacing:.8px;margin-bottom:20px;"><i class="bi bi-capsule" style="margin-right:5px;color:#db2777;"></i> Layanan Kami</div>
                    <div style="display:flex;flex-direction:column;gap:12px;">
                        @php
                        $infoFar=[
                            ['icon'=>'bi-prescription','bg'=>'#fce7f3','c'=>'#db2777','title'=>'Resep Dokter RS','desc'=>'Resep dari dokter RSU Allam Medica diproses dengan cepat dan diprioritaskan.'],
                            ['icon'=>'bi-file-earmark-medical','bg'=>'#e0f2fe','c'=>'#0284c7','title'=>'Resep Luar dan Obat Bebas','desc'=>'Melayani resep dari dokter luar serta penjualan obat bebas dan suplemen kesehatan.'],
                            ['icon'=>'bi-patch-check-fill','bg'=>'#d1fae5','c'=>'#059669','title'=>'Jaminan Kualitas','desc'=>'Semua obat bersumber dari distributor resmi dan tersimpan sesuai standar farmasi.'],
                            ['icon'=>'bi-person-lines-fill','bg'=>'#fef3c7','c'=>'#d97706','title'=>'Konsultasi Apoteker','desc'=>'Apoteker siap memberikan informasi mengenai obat, dosis, dan interaksi obat.'],
                        ];
                        @endphp
                        @foreach($infoFar as $f)
                        <div style="display:flex;align-items:flex-start;gap:12px;padding:14px 16px;background:#f8faff;border-radius:12px;border:1px solid #e8edf5;">
                            <div style="width:36px;height:36px;border-radius:10px;background:{{ $f['bg'] }};display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="bi {{ $f['icon'] }}" style="color:{{ $f['c'] }};font-size:16px;"></i>
                            </div>
                            <div>
                                <div style="font-size:14px;font-weight:700;color:#1e293b;margin-bottom:3px;">{{ $f['title'] }}</div>
                                <div style="font-size:13px;color:#64748b;line-height:1.6;">{{ $f['desc'] }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ===================== MCU ===================== --}}
    <section id="mcu" class="lay-section" style="padding-bottom:60px;">
        <div class="sec-divider"></div>
        <div class="row g-4 align-items-start">
            <div class="col-lg-5">
                <div class="svc-card">
                    <div class="svc-header" style="background:linear-gradient(135deg,#134e4a 0%,#0d9488 100%);">
                        <div style="font-size:32px;margin-bottom:12px;position:relative;z-index:1;">❤️</div>
                        <div class="svc-title">Medical Check Up</div>
                        <div class="svc-tagline">Deteksi dini untuk hidup lebih sehat dan produktif</div>
                    </div>
                    <div class="svc-body">
                        <p class="svc-desc">Program MCU RSU Allam Medica dirancang untuk pemeriksaan kesehatan menyeluruh. Tersedia berbagai paket sesuai kebutuhan individu maupun instansi.</p>
                        <ul class="svc-list">
                            <li>Paket MCU dasar, standar, dan komprehensif</li>
                            <li>MCU untuk instansi dan perusahaan</li>
                            <li>Hasil dan konsultasi dokter</li>
                            <li>Tersedia dengan BPJS untuk jenis tertentu</li>
                            <li>Jadwal fleksibel sesuai kebutuhan</li>
                        </ul>
                    </div>
                    <div class="svc-footer">
                        <a href="https://wa.me/6285292224886?text=Halo,%20saya%20ingin%20info%20paket%20MCU" target="_blank"
                           class="svc-badge" style="background:#ccfbf1;color:#0d9488;border:1px solid #5eead4;">
                           <i class="bi bi-whatsapp"></i> Tanya Paket MCU
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div style="font-size:11px;font-weight:800;color:#64748b;text-transform:uppercase;letter-spacing:.8px;margin-bottom:20px;margin-top:4px;"><i class="bi bi-list-check" style="margin-right:5px;"></i> Paket Tersedia</div>

                @if(isset($mcuPakets) && $mcuPakets->count())
                    @foreach($mcuPakets as $paket)
                    <div class="mcu-paket-card" style="border-left:4px solid {{ $paket->warna ?? '#0d9488' }};">
                        <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:8px;">
                            <div class="mcu-paket-name">{{ $paket->nama }}</div>
                            @if($paket->harga)
                            <span style="font-size:12px;font-weight:700;padding:3px 12px;border-radius:20px;background:#f8faff;border:1px solid #e2e8f0;color:#475569;">{{ $paket->harga }}</span>
                            @endif
                        </div>
                        @if($paket->deskripsi)
                        <p style="font-size:13px;color:#64748b;margin:8px 0 10px;line-height:1.6;">{{ $paket->deskripsi }}</p>
                        @endif
                        @if($paket->items && $paket->items->count())
                        <div class="mcu-paket-items">
                            @foreach($paket->items as $item)
                            <span class="mcu-paket-item"><i class="bi bi-check-circle-fill" style="color:#0d9488;font-size:10px;margin-right:3px;"></i>{{ $item->nama }}</span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    @endforeach
                @else
                    {{-- Fallback jika belum ada data dari admin --}}
                    @php
                    $defaultPakets=[
                        ['nama'=>'Paket Dasar','harga'=>'Hubungi kami','warna'=>'#0d9488','items'=>['Pemeriksaan fisik lengkap','Darah rutin','Urin rutin','Foto rontgen thorax','Konsultasi dokter']],
                        ['nama'=>'Paket Standar','harga'=>'Hubungi kami','warna'=>'#0284c7','items'=>['Semua paket dasar','Kimia darah','Fungsi hati dan ginjal','EKG','Konsultasi spesialis']],
                        ['nama'=>'Paket Komprehensif','harga'=>'Hubungi kami','warna'=>'#7c3aed','items'=>['Semua paket standar','USG abdomen','Tumor marker','Spirometri','Audiometri','Konsultasi multi-spesialis']],
                    ];
                    @endphp
                    @foreach($defaultPakets as $p)
                    <div class="mcu-paket-card" style="border-left:4px solid {{ $p['warna'] }};">
                        <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:8px;margin-bottom:8px;">
                            <div class="mcu-paket-name">{{ $p['nama'] }}</div>
                            <span style="font-size:12px;font-weight:700;padding:3px 12px;border-radius:20px;background:#f8faff;border:1px solid #e2e8f0;color:#475569;">{{ $p['harga'] }}</span>
                        </div>
                        <div class="mcu-paket-items">
                            @foreach($p['items'] as $item)
                            <span class="mcu-paket-item"><i class="bi bi-check-circle-fill" style="color:{{ $p['warna'] }};font-size:10px;margin-right:3px;"></i>{{ $item }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                    <p style="font-size:12px;color:#94a3b8;margin-top:12px;display:flex;align-items:center;gap:6px;"><i class="bi bi-info-circle"></i> Harga dan detail paket dapat berubah. Hubungi kami untuk informasi terkini.</p>
                @endif
            </div>
        </div>
    </section>

</div>
</div>

@endif


{{-- ============================================================
     FOOTER
============================================================ --}}
<footer class="footer-rsu">
    <div class="footer-ornament"></div>
    <div class="footer-ornament2"></div>
    <div class="container-fluid px-lg-5 px-4">
        <div class="row justify-content-between">
            <div class="col-lg-4 col-md-6">
                <img src="{{ asset('images/beranda/logo-almed.png') }}" class="footer-logo" alt="Logo RSU Allam Medica">
                <h5 class="footer-title">RSU Allam Medica Bumiayu</h5>
                <p class="footer-desc">Jl. Pangeran Diponegoro No. 609, Jatisawit, Bumiayu, Kabupaten Brebes, Jawa Tengah 52273</p>
                <div class="footer-social">
                    <a href="https://www.tiktok.com/@rsuallammedicabumiayu" target="_blank"><i class="bi bi-tiktok"></i></a>
                    <a href="https://www.facebook.com/allam.medicabmy" target="_blank"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/allam.medica/" target="_blank"><i class="bi bi-instagram"></i></a>
                </div>
                <div class="footer-mitra-label">Akreditasi &amp; Mitra</div>
                <div class="footer-mitra">
                    <img src="{{ asset('images/beranda/paripurna.png') }}" alt="Akreditasi Paripurna">
                    <img src="{{ asset('images/beranda/bpjs.png') }}" alt="BPJS Kesehatan">
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <h6 class="footer-heading">Tautan Cepat</h6>
                <ul>
                    <li><a href="{{ route('beranda') }}">Beranda</a></li>
                    <li><a href="layanan">Layanan</a></li>
                    <li><a href="artikel">Artikel</a></li>
                    <li><a href="download">Download</a></li>
                    <li><a href="tentang">Tentang Kami</a></li>
                    <li><a href="kontak">Kontak</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6">
                <h6 class="footer-heading">Layanan</h6>
                <ul>
                    <li><a href="{{ url('/layanan#igd') }}">IGD 24 Jam</a></li>
                    <li><a href="{{ url('/layanan#rawatjalan') }}">Rawat Jalan</a></li>
                    <li><a href="{{ url('/layanan#rawatinap') }}">Rawat Inap</a></li>
                    <li><a href="{{ url('/layanan#ambulans') }}">Ambulans</a></li>
                    <li><a href="{{ url('/layanan#laboratorium') }}">Laboratorium</a></li>
                    <li><a href="{{ url('/layanan#farmasi') }}">Farmasi</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-12">
                <h6 class="footer-heading">Hubungi Kami</h6>
                <div class="footer-contact-row"><div class="footer-contact-icon"><i class="bi bi-telephone-fill"></i></div><div class="footer-contact-text">(0289) 430822</div></div>
                <div class="footer-contact-row"><div class="footer-contact-icon"><i class="bi bi-envelope-fill"></i></div><div class="footer-contact-text">allam.medica@yahoo.co.id</div></div>
                <div class="footer-contact-row"><div class="footer-contact-icon"><i class="bi bi-clock-fill"></i></div><div class="footer-contact-text">IGD & Lab & Farmasi: 24 Jam<br>Rawat Jalan: Sen – Sab 07.00 – 21.00</div></div>
                <div class="footer-contact-row"><div class="footer-contact-icon"><i class="bi bi-geo-alt-fill"></i></div><div class="footer-contact-text">Jl. Pangeran Diponegoro No.609,<br>Bumiayu, Brebes</div></div>
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

<script>
/* ============================================================
   POLI COUNT
============================================================ */
document.addEventListener('DOMContentLoaded', function () {
    const cards  = document.querySelectorAll('#poliGrid .poli-card');
    const statEl = document.getElementById('statPoli');
    const cntEl  = document.getElementById('poliCount');
    if (statEl) statEl.textContent = cards.length || '—';
    if (cntEl)  cntEl.textContent  = cards.length || '—';
});

/* ============================================================
   FILTER POLI
============================================================ */
function filterPoli() {
    const q   = document.getElementById('searchPoli').value.toLowerCase().trim();
    const sta = document.getElementById('filterPoliStatus').value;
    let visible = 0;
    document.querySelectorAll('#poliGrid .poli-card').forEach(function (c) {
        const matchQ = !q   || (c.dataset.nama||'').includes(q);
        const matchS = !sta || c.dataset.status === sta;
        const show   = matchQ && matchS;
        c.style.display = show ? '' : 'none';
        if (show) visible++;
    });
    const empty = document.querySelector('#poliGrid .poli-empty');
    if (empty) empty.style.display = (visible === 0) ? '' : 'none';
}

/* ============================================================
   SMOOTH SCROLL
============================================================ */
function smoothTo(id, e) {
    if (e) e.preventDefault();
    const el = document.getElementById(id);
    if (!el) return;
    window.scrollTo({ top: el.getBoundingClientRect().top + window.scrollY - 80, behavior: 'smooth' });
}

/* ============================================================
   TAB ACTIVE ON SCROLL
============================================================ */
(function () {
    const sections = ['rekap','igd','rawatjalan','rawatinap','ambulans','laboratorium','radiologi','farmasi','mcu'];
    const tabs = document.querySelectorAll('.lay-tab');

    function updateTab() {
        let current = 'rekap';
        sections.forEach(function (id) {
            const el = document.getElementById(id);
            if (el && el.getBoundingClientRect().top <= 160) current = id;
        });
        tabs.forEach(function (tab) {
            tab.classList.toggle('active', tab.dataset.section === current);
        });
    }

    window.addEventListener('scroll', updateTab, { passive: true });

    tabs.forEach(function (tab) {
        tab.addEventListener('click', function (e) {
            e.preventDefault();
            smoothTo(tab.dataset.section, null);
        });
    });
})();

/* ============================================================
   COPY LINK
============================================================ */
function copyLink() {
    const btn = document.getElementById('copyBtn');
    if (!btn) return;
    navigator.clipboard.writeText(window.location.href).then(function () {
        btn.classList.add('copied');
        btn.innerHTML = '<i class="bi bi-check-lg"></i> Tersalin!';
        setTimeout(function () { btn.classList.remove('copied'); btn.innerHTML = '<i class="bi bi-link-45deg"></i> Salin Link'; }, 2500);
    }).catch(function () {
        const ta = document.createElement('textarea');
        ta.value = window.location.href;
        document.body.appendChild(ta); ta.select(); document.execCommand('copy'); document.body.removeChild(ta);
        btn.classList.add('copied'); btn.innerHTML = '<i class="bi bi-check-lg"></i> Tersalin!';
        setTimeout(function () { btn.classList.remove('copied'); btn.innerHTML = '<i class="bi bi-link-45deg"></i> Salin Link'; }, 2500);
    });
}

/* ============================================================
   HASH ON LOAD
============================================================ */
window.addEventListener('load', function () {
    if (window.location.hash) {
        const id = window.location.hash.replace('#','');
        setTimeout(function () { smoothTo(id, null); }, 400);
    }
});
</script>

</body>
</html>