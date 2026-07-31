<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>
    @if(isset($poli)){{ $poli->poli }} — @endif
    Layanan — RSU Allam Medica
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('assets/logoalmed.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">
    <style>
    @font-face {
        font-family: 'GothamBlack';
        src: url('{{ asset("fonts/Gotham-Black.otf") }}') format('opentype');
        font-weight: 900; font-style: normal;
    }
    </style>
</head>

<body>
<style>
/* ============================================================
   BASE & TOPBAR & NAVBAR
============================================================ */
body { font-family: 'Segoe UI', sans-serif; background: linear-gradient(180deg, #ffffff 0%, #ffffff 8%, #fdfcf7 18%, #faf8ee 30%, #f5f2e5 42%, #f0ecdc 52%, #f5f2e5 62%, #faf8ee 74%, #fdfcf7 86%, #ffffff 96%, #ffffff 100%); overflow-x: hidden; padding-top: 38px; color:#1f2937; }
.topbar { background: linear-gradient(90deg,#1C145C 0%,#34258d 50%,#1C145C 100%); position:fixed; top:0;left:0;width:100%;height:38px;z-index:10000;display:flex;align-items:center; }
.topbar .container { display:flex;align-items:center;justify-content:space-between; }
.topbar-info { display:flex;align-items:center;gap:14px; }
.topbar-info span { color:rgba(255,255,255,.88);font-size:12px;display:flex;align-items:center;gap:6px;white-space:nowrap; }
.topbar-social { display:flex;align-items:center;gap:12px; }
.topbar-social a { color:rgba(255,255,255,.75);font-size:14px;text-decoration:none;transition:.2s; }
.topbar-social a:hover { color:#fff; }
@media(max-width:991px) { .topbar-info span { font-size:10px; } .topbar-social { gap:10px; } }
@media(max-width:480px) { .topbar-info span { font-size:9px; } }
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
.drop-menu::before { content: ""; position: absolute; top: -15px; left: 0; width: 100%; height: 15px; background: transparent; }
.drop-wrap:hover .drop-menu { opacity:1;visibility:visible;transform:translateX(-50%) translateY(0); }
.drop-item { display:flex;align-items:center;gap:9px;padding:9px 13px;border-radius:12px;font-size:13.5px;color:#334155;text-decoration:none;transition:.18s;font-weight:500; }
.drop-item:hover { background:rgba(28,20,92,.07);color:#1C145C; }
.drop-item i { font-size:14px;color:#64748b;flex-shrink:0; }
.drop-item:hover i { color:#1C145C; }
.drop-divider { height:1px;background:rgba(0,0,0,.07);margin:4px 8px; }

/* LAYANAN MEGA DROPDOWN (Navbar 2 Kolom) */
.drop-menu-layanan { min-width:480px;max-width:min(94vw, 520px);padding:14px;display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:10px 12px;align-items:start; }
.drop-menu-layanan .drop-column { display:flex;flex-direction:column;gap:2px; }
.drop-menu-layanan .drop-column + .drop-column { border-left:1px solid rgba(15,23,42,.06);padding-left:10px; }
.drop-menu-layanan .drop-item { padding:8px 10px;font-size:13px; }

.chevron { font-size:11px;opacity:.6;transition:.25s; }
.drop-wrap:hover .chevron { transform:rotate(180deg); }
.nav-cta { position:relative;z-index:2; }
.nav-burger { display:none;flex-direction:column;gap:5px;cursor:pointer;border:none;background:transparent;padding:6px;position:relative;z-index:2; }
.nav-burger span { width:22px;height:2px;background:#1C145C;border-radius:2px;display:block;transition:.3s; }
.nav-burger.open span:nth-child(1) { transform:translateY(7px) rotate(45deg); }
.nav-burger.open span:nth-child(2) { opacity:0; }
.nav-burger.open span:nth-child(3) { transform:translateY(-7px) rotate(-45deg); }

/* KONTAK MEGA */
.kontak-wrap { position: relative; }
.btn-kontak { padding:10px 22px; border-radius:50px; background:#1C145C; color:#fff!important; text-decoration:none!important; font-size:14px; font-weight:600; display:inline-flex; align-items:center; gap:6px; border:none; box-shadow:0 8px 20px rgba(28,20,92,.25); transition:.2s; cursor:pointer; font-family:inherit; }
.btn-kontak:hover { background:#2a1e8a; transform:translateY(-1px); }
.kontak-mega { position: absolute; top: calc(100% + 18px); right: 0; width: 780px; max-width: calc(100vw - 40px); background: rgba(255,255,255,0.97); backdrop-filter: blur(28px) saturate(180%); -webkit-backdrop-filter: blur(28px) saturate(180%); border: 1px solid rgba(255,255,255,0.5); border-radius: 24px; box-shadow: 0 24px 60px rgba(15,23,42,.16), 0 2px 12px rgba(15,23,42,.06); padding: 28px; opacity: 0; visibility: hidden; transform: translateY(12px); transition: opacity .26s, visibility .26s, transform .26s; z-index: 9999; }
.kontak-wrap:hover .kontak-mega, .kontak-mega:hover, .kontak-mega.open { opacity: 1; visibility: visible; transform: translateY(0); }
.kontak-mega::before { content:''; position:absolute; top:0; left:24px; right:24px; height:2px; background:linear-gradient(90deg,transparent,rgba(28,20,92,.2) 50%,transparent); border-radius:2px; }
.kontak-mega-grid { display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 22px; }
.kontak-form-panel { background: #1C145C; border-radius: 16px; padding: 22px 20px; position: relative; overflow: hidden; }
.kontak-form-panel .form-ornament { position: absolute; bottom: -50px; right: -50px; width: 160px; height: 160px; opacity: .07; background-image: url('{{ asset("images/beranda/ornamen.png") }}'); background-size: contain; background-repeat: no-repeat; pointer-events: none; filter: brightness(10); }
.kontak-form-panel > *:not(.form-ornament) { position: relative; z-index: 1; }
.kontak-form-sublabel { font-size: 10px; font-weight: 700; color: rgba(254,252,241,.45); text-transform: uppercase; letter-spacing: .12em; margin-bottom: 4px; }
.kontak-form-title { font-family: 'GothamBlack', sans-serif !important; font-size: 19px; color: #FEFCF1; margin-bottom: 16px; line-height: 1.2; }
.kontak-form-title span { background: linear-gradient(90deg, #a89eff, #FEFCF1); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
.ck-field { margin-bottom: 10px; }
.ck-field label { display:block;font-size:10.5px;color:rgba(254,252,241,.55);margin-bottom:3px;letter-spacing:.04em; }
.ck-field input, .ck-field textarea { width: 100%; background: rgba(255,255,255,.1); border: 1px solid rgba(254,252,241,.18); border-radius: 7px; padding: 8px 11px; font-size: 12.5px; color: #FEFCF1; outline: none; transition: .2s; font-family: inherit; box-sizing: border-box; }
.ck-field input::placeholder, .ck-field textarea::placeholder { color: rgba(254,252,241,.35); }
.ck-field input:focus, .ck-field textarea:focus { border-color: rgba(254,252,241,.5); background:rgba(255,255,255,.15); }
.ck-field textarea { resize:vertical; min-height:72px; }
.ck-row { display:grid; grid-template-columns:1fr 1fr; gap:8px; }
.btn-send-mega { margin-top: 12px; width: 100%; padding: 10px; background: #FEFCF1; color: #1C145C; border: none; border-radius: 50px; font-size: 13px; font-weight: 700; cursor: pointer; transition: .2s; display: flex; align-items: center; justify-content: center; gap: 7px; font-family: inherit; }
.btn-send-mega:hover { background:#fff; transform:translateY(-1px); box-shadow:0 4px 14px rgba(0,0,0,.18); }
.kontak-info-panel { display:flex; flex-direction:column; gap:14px; }
.kontak-info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
.kontak-info-card { background: #f8f7ff; border: 1px solid #ece9f8; border-radius: 12px; padding: 12px; text-align: center; text-decoration: none; color: inherit; display: block; transition: .2s; }
.kontak-info-card:hover { transform: translateY(-2px); box-shadow: 0 6px 16px rgba(28,20,92,.1); border-color: #d8d4f0; }
.kontak-info-icon { width: 36px; height: 36px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 16px; margin: 0 auto 8px; }
.ci-phone { background:rgba(25,135,84,.12); color:#198754; }
.ci-email { background:rgba(220,53,69,.1); color:#dc3545; }
.ci-igd { background:rgba(245,158,11,.12); color:#d97706; }
.ci-map { background:rgba(28,20,92,.1); color:#1C145C; }
.ci-ambulans { background: rgba(239,68,68,.12); color: #ef4444; }
.ci-wa { background: rgba(37,211,102,.14); color: #128C7E; }
.kontak-social-row { display: flex; align-items: center; justify-content: center; gap: 10px; padding: 4px 0 2px; }
.kontak-social-row a { width: 34px; height: 34px; border-radius: 50%; background: #f8f7ff; border: 1px solid #ece9f8; display: flex; align-items: center; justify-content: center; color: #1C145C; font-size: 15px; text-decoration: none; transition: .2s; }
.kontak-social-row a:hover { background: #1C145C; color: #fff; transform: translateY(-2px); }
.kontak-map-caption { display: flex; align-items: center; gap: 6px; font-size: 11.5px; color: #5a5480; text-decoration: none; margin-top: 8px; }
.kontak-map-caption:hover { color: #1C145C; }
.kontak-map-caption i { color: #1C145C; font-size: 11px; }
.kontak-info-title { font-size:11px; font-weight:700; color:#1C145C; margin-bottom:2px; }
.kontak-info-val { font-size:11.5px; color:#5a5480; line-height:1.45; }
.kontak-map-box { border-radius: 12px; overflow:hidden; border:1px solid #e8e4d8; flex:1; }
.kontak-map-box iframe { width:100%; height:140px; display:block; border:0; }

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
.d-sub-link i { font-size:14px;color:#94a3b8;flex-shrink:0;width:18px;text-align:center; }
.d-sub-link:hover i { color:#1C145C; }
.btn-kontak-drawer { border-radius:14px; display:block; text-align:center; padding:12px 22px; background:#1C145C; color:#fff!important; text-decoration:none!important; font-size:14px; font-weight:600; border:none; cursor:pointer; font-family:inherit; width:100%; transition:.2s; }
.btn-kontak-drawer:hover { background:#2a1e8a; }

/* BOTTOM SHEET */
.bs-overlay { display:none; position:fixed; inset:0; background:rgba(15,23,42,0); z-index:10000001; transition:background .3s; }
.bs-overlay.show { display:block; background:rgba(15,23,42,0.5); }
.bs-sheet { position:fixed; left:0; right:0; bottom:0; z-index:10000002; background:#fff; border-radius:24px 24px 0 0; box-shadow:0 -8px 40px rgba(15,23,42,.18); transform:translateY(100%); transition:transform .35s cubic-bezier(.4,0,.2,1); height:92dvh; display:flex; flex-direction:column; overflow:visible; }
.bs-sheet.open { transform:translateY(0); }
.bs-handle-wrap { flex-shrink:0; display:flex; align-items:center; justify-content:center; padding:10px 16px 6px; }
.bs-handle { width:40px; height:4px; border-radius:2px; background:rgba(0,0,0,.15); }
.bs-header { flex-shrink:0; display:flex; align-items:center; justify-content:space-between; padding:0 18px 14px; border-bottom:1px solid rgba(0,0,0,.07); }
.bs-title { font-family:'GothamBlack',sans-serif; font-size:17px; color:#1C145C; margin:0; }
.bs-close { width:32px; height:32px; border-radius:50%; background:rgba(28,20,92,.08); border:none; display:flex; align-items:center; justify-content:center; color:#1C145C; cursor:pointer; font-size:15px; }
.bs-body { flex:1; min-height:0; overflow-y:auto; -webkit-overflow-scrolling:touch; overscroll-behavior:contain; padding:18px 18px calc(18px + env(safe-area-inset-bottom)) 18px; display:flex; flex-direction:column; gap:16px; }
.bs-form-card { background:#1C145C; border-radius:14px; padding:18px 16px; position:relative; overflow:hidden; flex-shrink:0; }
.bs-form-card .bs-form-ornament { position:absolute; bottom:-40px; right:-40px; width:130px; height:130px; opacity:.07; background-image:url('{{ asset("images/beranda/ornamen.png") }}'); background-size:contain; background-repeat:no-repeat; pointer-events:none; filter:brightness(10); }
.bs-form-card > *:not(.bs-form-ornament) { position:relative; z-index:1; }
.bs-sublabel { font-size:10px; font-weight:700; color:rgba(254,252,241,.45); text-transform:uppercase; letter-spacing:.12em; margin-bottom:3px; }
.bs-form-title { font-family:'GothamBlack',sans-serif!important; font-size:17px; color:#FEFCF1; margin-bottom:14px; }
.bs-form-title span { background:linear-gradient(90deg,#a89eff,#FEFCF1); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text; }
.bs-form-card .ck-field { margin-bottom:9px; }
.bs-form-card .ck-field label { font-size:10px; color:rgba(254,252,241,.5); margin-bottom:2px; }
.bs-form-card .ck-field input, .bs-form-card .ck-field textarea { font-size:12px; padding:7px 10px; border-radius:7px; background:rgba(255,255,255,.1); border:1px solid rgba(254,252,241,.18); color:#FEFCF1; width:100%; box-sizing:border-box; outline:none; font-family:inherit; transition:.2s; }
.btn-send-bs { width:100%; padding:11px; background:#FEFCF1; color:#1C145C; border:none; border-radius:50px; font-size:13px; font-weight:700; cursor:pointer; transition:.2s; display:flex; align-items:center; justify-content:center; gap:7px; font-family:inherit; margin-top:10px; }
.bs-info-grid { display:grid; grid-template-columns:1fr 1fr; gap:10px; flex-shrink:0; }
.bs-info-card { background:#f8f7ff; border:1px solid #ece9f8; border-radius:12px; padding:12px; text-align:center; text-decoration:none; color:inherit; display:block; }
.bs-info-icon { width:34px; height:34px; border-radius:9px; display:flex; align-items:center; justify-content:center; font-size:15px; margin:0 auto 7px; }
.bs-info-title { font-size:11px; font-weight:700; color:#1C145C; margin-bottom:1px; }
.bs-info-val   { font-size:11px; color:#5a5480; line-height:1.45; }
.bs-map-box { border-radius:12px; overflow:hidden; border:1px solid #e8e4d8; flex-shrink:0; }
.bs-map-box iframe { width:100%; height:160px; display:block; border:0; }

/* ORNAMEN HELPER */
.ornamen { position:absolute;background-image:url('{{ asset("images/beranda/ornamen.png") }}');background-size:contain;background-repeat:no-repeat;background-position:center;pointer-events:none;z-index:0; }
.page-ornament { position:fixed;pointer-events:none;z-index:0;background-image:url('{{ asset("images/beranda/ornamen.png") }}');background-size:contain;background-repeat:no-repeat;background-position:center;transition:opacity 0.6s ease,transform 0.6s ease;will-change:opacity,transform; }
.orn-1 { right:-100px;top:20%;width:380px;height:380px;opacity:0;filter:hue-rotate(220deg) saturate(0.35); }
.orn-2 { left:-80px;top:45%;width:300px;height:300px;opacity:0;filter:hue-rotate(200deg) saturate(0.3); }
.orn-3 { right:-90px;top:65%;width:340px;height:340px;opacity:0;filter:hue-rotate(230deg) saturate(0.3); }
.orn-4 { left:-70px;top:82%;width:280px;height:280px;opacity:0;filter:hue-rotate(210deg) saturate(0.35); }
.orn-5 { right:-80px;top:110%;width:320px;height:320px;opacity:0;filter:hue-rotate(220deg) saturate(0.3); }
.page-ornament.orn-visible { opacity:0.042; }

/* HERO & TICKER */
.lay-hero { background:linear-gradient(150deg,#1C145C 0%,#231a72 40%,#0ea5e9 100%);padding:130px 0 72px;position:relative;overflow:hidden; }
.lay-hero::before { content:'';position:absolute;right:-80px;top:-80px;width:420px;height:420px;border-radius:50%;background:radial-gradient(circle,rgba(255,255,255,.06),transparent 65%);pointer-events:none; }
.lay-hero::after { content:'';position:absolute;left:-40px;bottom:-100px;width:300px;height:300px;border-radius:50%;background:radial-gradient(circle,rgba(14,165,233,.12),transparent 65%);pointer-events:none; }
.lay-hero .hero-orn { position:absolute;right:-60px;bottom:-80px;width:320px;height:320px;background-image:url('{{ asset("images/beranda/ornamen.png") }}');background-size:contain;background-repeat:no-repeat;background-position:center;opacity:0.07;filter:brightness(10);pointer-events:none; }
.lay-hero .hero-orn-2 { position:absolute;left:-40px;top:-40px;width:240px;height:240px;background-image:url('{{ asset("images/beranda/ornamen.png") }}');background-size:contain;background-repeat:no-repeat;background-position:center;opacity:0.04;filter:brightness(10);pointer-events:none; }
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
.dokter-ticker-section { width:100vw;position:relative;left:50%;transform:translateX(-50%);overflow:hidden;background:linear-gradient(135deg,#1C145C 0%,#1e3a6e 50%,#0c6197 100%);box-shadow:0 4px 24px rgba(28,20,92,.18); }
.dokter-ticker-section::before,.dokter-ticker-section::after { content:'';position:absolute;top:0;bottom:0;width:80px;z-index:3;pointer-events:none; }
.dokter-ticker-section::before { left:0;background:linear-gradient(to right,#1C145C,transparent); }
.dokter-ticker-section::after { right:0;background:linear-gradient(to left,#0c6197,transparent); }
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
.dtc-sp { font-size:10.5px;color:rgba(125,211,252,.8);white-space:nowrap;font-weight:500; }

/* TABS */
.layanan-tabs-wrap { width:100%;display:flex;justify-content:center;position:relative;z-index:2;background:#1C145C;border-bottom:1px solid rgba(0,0,0,.15);box-shadow:0 6px 18px rgba(28,20,92,.15); }
.layanan-tabs-wrap .container { width:100%;max-width:1400px;padding:0 20px; }
.lay-tabs-shell { display:flex;align-items:center;gap:8px; }
.lay-nav-btn { width:30px;height:30px;border:1px solid rgba(255,255,255,.2);border-radius:999px;background:rgba(255,255,255,.1);display:flex;align-items:center;justify-content:center;color:#fff;cursor:pointer;transition:color .2s,border-color .2s,background .2s,transform .2s;flex-shrink:0;padding:0; }
.lay-nav-btn:hover { border-color:rgba(255,255,255,.4);background:rgba(255,255,255,.2);transform:translateY(-1px); }
.lay-nav-btn.is-active { border-color:rgba(255,255,255,.5);background:rgba(255,255,255,.3); }
.lay-nav-btn:disabled { opacity:.25;cursor:not-allowed;transform:none; }
.layanan-tabs { display:flex;align-items:center;justify-content:flex-start;width:100%;max-width:1400px;overflow-x:auto;overflow-y:hidden;scrollbar-width:none;scroll-behavior:smooth;padding:10px 0;gap:4px; }
.layanan-tabs::-webkit-scrollbar { display:none; }
.lay-tab { display:inline-flex;align-items:center;gap:7px;padding:10px 14px;border:none;border-bottom:1px solid transparent;font-size:13.5px;font-weight:600;color:rgba(255,255,255,.75);text-decoration:none;white-space:nowrap;transition:color .2s,border-color .2s,background .2s;cursor:pointer;flex-shrink:0;border-radius:999px; }
.lay-tab:hover { color:#fff;background:rgba(255,255,255,.15); }
.lay-tab.active { color:#1C145C;background:#fff;font-weight:700; box-shadow:0 4px 10px rgba(0,0,0,.15); }
.lay-tab i { font-size:15px; }

/* PAGE BODY */
.layanan-page-body { padding:0 0 90px;background:linear-gradient(180deg, #ffffff 0%, #ffffff 8%, #fdfcf7 18%, #faf8ee 30%, #f5f2e5 42%, #f0ecdc 52%, #f5f2e5 62%, #faf8ee 74%, #fdfcf7 86%, #ffffff 96%, #ffffff 100%);position:relative;z-index:1;overflow:hidden; }
.layanan-page-body::before { content:'';position:absolute;inset:0 auto 0 0;width:100%;height:100%;background-image:url('{{ asset("images/beranda/ornamen.png") }}');background-repeat:repeat-y;background-position:center top;background-size:260px auto;opacity:0.035;pointer-events:none;z-index:0; }
.layanan-page-body > .container { position:relative;z-index:1; }
.lay-section { padding:60px 0 0; scroll-margin-top:140px; position:relative; overflow:visible !important; }
.sec-label { display:inline-flex;align-items:center;gap:6px;padding:4px 12px;border-radius:20px;font-size:10px;font-weight:800;text-transform:uppercase;letter-spacing:1px;margin-bottom:10px; }
.sec-title { font-family:'DM Serif Display',serif;font-size:clamp(22px,3vw,30px);font-weight:400;color:#1C145C;line-height:1.2; }
.sec-sub { font-size:14px;color:#64748b;margin-top:6px;line-height:1.6; }
.sec-divider { width:100%;height:1px;background:linear-gradient(to right,#1C145C,#0ea5e9,transparent);margin-bottom:32px;opacity:.15; }

/* SERVICE CARD */
.svc-card { background:#fff;border-radius:20px;border:1px solid #e8edf5;box-shadow:0 4px 20px rgba(28,20,92,.05);overflow:hidden; }
.svc-header { padding:36px 32px 30px;position:relative;overflow:hidden; }
.svc-header-icon { width:52px;height:52px;border-radius:14px;background:rgba(255,255,255,.18);border:1px solid rgba(255,255,255,.28);display:flex;align-items:center;justify-content:center;font-size:24px;color:#fff;margin-bottom:16px;position:relative;z-index:1;flex-shrink:0; }
.svc-title { font-family:'DM Serif Display',serif;font-size:24px;font-weight:400;color:#fff;margin-bottom:8px;position:relative;z-index:1; }
.svc-tagline { font-size:13.5px;color:rgba(255,255,255,.72);line-height:1.6;position:relative;z-index:1; }
.svc-body { padding:26px 32px; }
.svc-desc { font-size:14.5px;color:#475569;line-height:1.8;margin-bottom:22px; }
.svc-list { list-style:none;padding:0;margin:0 0 22px;display:flex;flex-direction:column;gap:9px; }
.svc-list li { font-size:13.5px;color:#374151;padding-left:20px;position:relative;line-height:1.6; }
.svc-list li::before { content:'';position:absolute;left:0;top:7px;width:8px;height:8px;border-radius:50%;background:linear-gradient(135deg,#1C145C,#0ea5e9); }
.svc-footer { padding:0 32px 28px;display:flex;align-items:center;gap:10px;flex-wrap:wrap; }
.svc-badge { display:inline-flex;align-items:center;gap:6px;padding:7px 16px;border-radius:20px;font-size:12.5px;font-weight:600;text-decoration:none;transition:all .2s; }

/* POLI GRID */
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
.poli-status.aktif { background:rgba(16,185,129,.9);color:#fff; }
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

/* POLI MOBILE */
.poli-mobile-list { display:none;flex-direction:column;gap:0;margin-top:16px;border-radius:14px;border:1px solid #e8edf5;overflow:hidden;box-shadow:0 2px 12px rgba(28,20,92,.05); }
.poli-mobile-item { display:flex;align-items:center;gap:12px;padding:12px 14px;background:#fff;border-bottom:1px solid #f1f5f9;transition:background .18s; }
.pmi-icon { width:40px;height:40px;border-radius:10px;background:linear-gradient(135deg,#e0e7ff,#dbeafe);display:flex;align-items:center;justify-content:center;font-size:17px;color:#818cf8;flex-shrink:0; }
.pmi-info { flex:1;min-width:0; }
.pmi-name { font-family:'DM Serif Display',serif;font-size:14px;font-weight:400;color:#1C145C;line-height:1.25;white-space:nowrap;overflow:hidden;text-overflow:ellipsis; }
.pmi-status-badge { display:inline-flex;align-items:center;gap:4px;font-size:10px;font-weight:700;margin-top:3px; }
.pmi-status-badge.aktif { color:#059669; }
.pmi-status-badge.nonaktif { color:#94a3b8; }
.pmi-status-badge::before { content:'';display:inline-block;width:5px;height:5px;border-radius:50%;background:currentColor;flex-shrink:0; }
.pmi-actions { display:flex;align-items:center;gap:7px;flex-shrink:0; }
.pmi-wa { width:34px;height:34px;border-radius:9px;background:#dcfce7;color:#15803d;border:1px solid #86efac;display:flex;align-items:center;justify-content:center;font-size:15px;text-decoration:none;transition:background .2s;flex-shrink:0; }
.pmi-detail { display:inline-flex;align-items:center;gap:5px;padding:7px 12px;border-radius:9px;font-size:12px;font-weight:700;background:#1C145C;color:#fff;text-decoration:none;flex-shrink:0; }
.poli-mobile-search { display:flex;gap:8px;margin-bottom:12px; }
.poli-mobile-search-wrap { position:relative;flex:1; }
.poli-mobile-search-wrap i { position:absolute;left:11px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:13px;pointer-events:none; }
.poli-mobile-search-wrap input { width:100%;padding:9px 12px 9px 34px;border:1.5px solid #e2e8f0;border-radius:10px;font-size:13px;outline:none;background:#f8faff; }
.poli-mobile-search select { padding:9px 10px;border:1.5px solid #e2e8f0;border-radius:10px;font-size:13px;outline:none;background:#f8faff;flex-shrink:0; }
.pmi-empty { padding:36px 20px;text-align:center;color:#94a3b8;font-size:13px; }

/* KELAS RAWAT INAP */
.kelas-grid { display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:16px;margin-top:24px;grid-auto-rows:1fr; }
.kelas-card { background:#fff;border-radius:16px;border:1px solid #e8edf5;overflow:hidden;box-shadow:0 3px 14px rgba(28,20,92,.05);transition:transform .28s cubic-bezier(.22,.68,0,1.2),box-shadow .28s,border-color .28s;animation:fadeUp .45s ease both;display:flex;flex-direction:column;height:100%; }
.kelas-card:hover { transform:translateY(-5px);box-shadow:0 14px 36px rgba(28,20,92,.11);border-color:#c7d2fe; }
.kelas-thumb { width:100%;height:160px;overflow:hidden;flex-shrink:0;background:#f0eeff; }
.kelas-thumb img { width:100%;height:100%;object-fit:cover;display:block;transition:transform .4s; }
.kelas-card:hover .kelas-thumb img { transform:scale(1.04); }
.kelas-thumb-placeholder { width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:36px;color:#818cf8;background:linear-gradient(135deg,#e0e7ff,#dbeafe); }
.kelas-header { padding:16px 20px 14px;position:relative;overflow:hidden;display:flex;align-items:center;gap:12px;flex-shrink:0; }
.kelas-icon-wrap { width:40px;height:40px;border-radius:11px;background:rgba(255,255,255,.18);display:flex;align-items:center;justify-content:center;font-size:18px;color:#fff;flex-shrink:0;position:relative;z-index:1; }
.kelas-name { font-family:'DM Serif Display',serif;font-size:16px;font-weight:400;color:#fff;margin:0;position:relative;z-index:1;line-height:1.2; }
.kelas-body { padding:14px 20px;flex:1;display:flex;flex-direction:column;gap:7px; }
.kelas-feature { display:flex;align-items:flex-start;gap:9px;font-size:12.5px;color:#475569;line-height:1.5; }
.kelas-feature i { color:#1C145C;flex-shrink:0;margin-top:2px;font-size:12px;opacity:.7; }
.kelas-footer { padding:10px 20px 16px;border-top:1px solid #f1f5f9;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:8px;flex-shrink:0; }
.kelas-badge { font-size:11.5px;font-weight:700;padding:4px 12px;border-radius:20px; }
.kelas-wa-btn { display:inline-flex;align-items:center;gap:5px;padding:7px 14px;border-radius:9px;font-size:12px;font-weight:700;background:#dcfce7;color:#15803d;text-decoration:none;border:1px solid #86efac;transition:.2s; }
.kelas-wa-btn:hover { background:#25D366;color:#fff; }

/* KELAS MOBILE */
.kelas-mobile-wrap { display:none; }
.kelas-pills-scroll { display:flex;gap:8px;overflow-x:auto;scrollbar-width:none;padding:4px 0 12px;margin-bottom:16px; }
.kelas-pills-scroll::-webkit-scrollbar { display:none; }
.kelas-pill { display:inline-flex;align-items:center;gap:7px;padding:9px 15px;border-radius:30px;font-size:12.5px;font-weight:700;color:#fff;border:2px solid transparent;white-space:nowrap;flex-shrink:0;cursor:pointer;transition:transform .2s,box-shadow .2s,border-color .2s;opacity:.72; }
.kelas-pill.active { opacity:1;border-color:rgba(255,255,255,.55);transform:translateY(-2px);box-shadow:0 6px 18px rgba(0,0,0,.18); }
.kelas-detail-panel { background:#fff;border-radius:18px;border:1px solid #e8edf5;overflow:hidden;box-shadow:0 4px 20px rgba(28,20,92,.07);animation:fadeUp .3s ease both; }
.kdp-header { display:flex;align-items:center;gap:14px;padding:20px 20px 16px; }
.kdp-icon { width:46px;height:46px;border-radius:13px;display:flex;align-items:center;justify-content:center;font-size:21px;color:#fff;flex-shrink:0; }
.kdp-title { font-family:'DM Serif Display',serif;font-size:19px;font-weight:400;color:#1C145C;margin:0; }
.kdp-badge { display:inline-block;font-size:11px;font-weight:700;padding:2px 10px;border-radius:20px;margin-top:4px; }
.kdp-body { padding:0 20px 16px;display:grid;grid-template-columns:1fr 1fr;gap:8px; }
.kdp-feature { display:flex;align-items:flex-start;gap:8px;padding:10px 11px;background:#f8faff;border-radius:10px;border:1px solid #e8edf5; }
.kdp-feature i { color:#1C145C;font-size:13px;flex-shrink:0;margin-top:1px;opacity:.7; }
.kdp-feature span { font-size:12px;color:#374151;line-height:1.45; }
.kdp-footer { padding:12px 20px 18px;border-top:1px solid #f1f5f9;display:flex;gap:10px; }
.kdp-footer a { flex:1;display:flex;align-items:center;justify-content:center;gap:7px;padding:10px;border-radius:11px;font-size:13px;font-weight:700;text-decoration:none; }
.kdp-wa { background:#dcfce7;color:#15803d;border:1px solid #86efac; }
.kdp-wa:hover { background:#25D366;color:#fff; }

/* DETAIL POLI HERO DLL */
.detail-hero { background:linear-gradient(150deg,#1C145C 0%,#231a72 40%,#0ea5e9 100%);padding:130px 0 60px;position:relative;overflow:hidden; }
.detail-hero::before { content:'';position:absolute;right:-80px;top:-80px;width:420px;height:420px;border-radius:50%;background:radial-gradient(circle,rgba(255,255,255,.06),transparent 65%);pointer-events:none; }
.detail-hero .hero-orn { position:absolute;right:-40px;bottom:-60px;width:280px;height:280px;background-image:url('{{ asset("images/beranda/ornamen.png") }}');background-size:contain;background-repeat:no-repeat;background-position:center;opacity:0.08;filter:brightness(10);pointer-events:none; }
.detail-hero-kat { display:inline-flex;align-items:center;gap:6px;background:rgba(14,165,233,.85);color:#fff;font-size:11px;font-weight:800;text-transform:uppercase;letter-spacing:1px;padding:5px 14px;border-radius:20px;margin-bottom:16px; }
.detail-hero-title { font-family:'DM Serif Display',serif;font-size:clamp(26px,4vw,44px);color:#fff;line-height:1.2;letter-spacing:-.3px;margin-bottom:14px;font-weight:400; }
.detail-hero-chips { display:flex;align-items:center;gap:8px;flex-wrap:wrap; }
.detail-chip { display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.15);color:rgba(255,255,255,.85);font-size:12px;font-weight:600;padding:5px 13px;border-radius:20px; }
.detail-chip.aktif { background:rgba(16,185,129,.18);border-color:rgba(16,185,129,.35);color:#6ee7b7; }
.detail-body { padding: 0 0 64px; position: relative; z-index: 1; background: linear-gradient(180deg, #fdfcf7 0%, #faf8ee 22%, #f5f2e5 45%, #faf8ee 75%, #ffffff 100% ); }
.detail-main { background:#fff;border-radius:20px;border:1px solid #e8edf5;box-shadow:0 8px 32px rgba(28,20,92,.07);overflow:hidden;margin-top:-32px;position:relative;z-index:5; }
.detail-featured-img { width:100%;height:auto;display:block;object-fit:contain; }
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
.btn-copy { background:#f1f5f9;color:#475569;border:1.5px solid #e2e8f0; }
.btn-copy.copied { background:#10b981;color:#fff;border-color:#10b981; }
.detail-sidebar { position:sticky;top:110px; }
.sidebar-card { background:#fff;border-radius:18px;border:1px solid #e8edf5;box-shadow:0 4px 20px rgba(28,20,92,.07);overflow:hidden;margin-top:-32px;position:relative;z-index:5; }
.sc-header { background:linear-gradient(135deg,#1C145C 0%,#3b5bdb 100%);padding:22px 24px;position:relative;overflow:hidden; }
.sc-header h3 { font-family:'DM Serif Display',serif;font-weight:400;font-size:17px;color:#fff;margin-bottom:3px;position:relative;z-index:1; }
.sc-header p { font-size:11.5px;color:rgba(255,255,255,.6);margin:0;position:relative;z-index:1; }
.sc-body { padding:18px 22px; }
.info-row { display:flex;align-items:flex-start;gap:12px;padding:10px 0;border-bottom:1px solid #f0edf8; }
.info-row:last-child { border-bottom:none;padding-bottom:0; }
.info-icon { width:34px;height:34px;border-radius:9px;display:flex;align-items:center;justify-content:center;flex-shrink:0; }
.info-label { font-size:10px;color:#a09bbf;font-weight:700;letter-spacing:.3px;text-transform:uppercase; }
.info-val { font-size:13.5px;color:#1C145C;font-weight:700;margin-top:2px; }
.btn-wa-sidebar { display:flex;align-items:center;justify-content:center;gap:8px;margin-top:16px;padding:12px 20px;border-radius:12px;font-size:13.5px;font-weight:700;background:#1D9E75;color:#fff;text-decoration:none;border:none;transition:background .2s;width:100%; }
.btn-wa-sidebar:hover { background:#0F6E56;color:#fff; }
.btn-tel-sidebar { display:flex;align-items:center;justify-content:center;gap:8px;margin-top:10px;padding:11px 20px;border-radius:12px;font-size:13px;font-weight:700;background:#FCEAEA;color:#c0392b;text-decoration:none;border:1px solid #F09595;transition:background .2s;width:100%; }
.btn-tel-sidebar:hover { background:#F09595;color:#791F1F; }
.jadwal-cta { display:block;margin-top:14px;text-decoration:none;border-radius:16px;overflow:hidden;border:1.5px solid #1C145C;background:linear-gradient(135deg,#EEEDFE 0%,#E6F1FB 100%);transition:transform .2s,box-shadow .2s; }
.jadwal-cta:hover { transform:translateY(-2px);box-shadow:0 8px 24px rgba(28,20,92,.15);text-decoration:none; }
.jadwal-inner { display:flex;align-items:center;gap:12px;padding:16px 18px; }
.jadwal-text .jt-label { font-size:13.5px;font-weight:800;color:#1C145C; }
.jadwal-text .jt-sub { font-size:11px;color:#534AB7;margin-top:2px; }
.jadwal-arrow { font-size:18px;color:#1C145C;margin-left:auto;transition:transform .2s; }
.jadwal-cta:hover .jadwal-arrow { transform:translateX(4px); }
.terkait-title { font-family:'DM Serif Display',serif;font-size:22px;font-weight:400;color:#1C145C;margin-bottom:20px; }
.terkait-grid { display:grid;grid-template-columns:repeat(auto-fill,minmax(255px,1fr));gap:14px; }
.terkait-card { background:#fff;border-radius:14px;border:1px solid #e8edf5;overflow:hidden;display:flex;flex-direction:column;text-decoration:none;color:inherit;transition:transform .28s cubic-bezier(.22,.68,0,1.2),box-shadow .28s,border-color .28s; }
.terkait-card:hover { transform:translateY(-4px);box-shadow:0 12px 32px rgba(28,20,92,.09);border-color:#c7d2fe;text-decoration:none;color:inherit; }
.terkait-thumb { position:relative;background:#f0eeff;flex-shrink:0; }
.terkait-thumb img { width:100%;height:auto;display:block;transition:transform .4s;max-height:160px;object-fit:cover; }
.terkait-card:hover .terkait-thumb img { transform:scale(1.03); }
.terkait-thumb-placeholder { height:130px;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#e0e7ff,#dbeafe);font-size:32px;color:#818cf8; }
.terkait-body { padding:14px 16px;flex:1; }
.terkait-name { font-family:'DM Serif Display',serif;font-size:14.5px;font-weight:400;color:#1C145C;margin-bottom:4px; }
.terkait-desc { font-size:12px;color:#64748b;line-height:1.6;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden; }
.terkait-footer { padding:10px 16px 13px;border-top:1px solid #f1f5f9;display:flex;justify-content:flex-end; }
.terkait-btn { display:inline-flex;align-items:center;gap:5px;padding:6px 14px;border-radius:8px;font-size:12px;font-weight:700;background:#1C145C;color:#fff; }

/* ============================================================
   RESPONSIVE
============================================================ */
@media(max-width:1100px) { .nav-link-pill{padding:7px 11px;font-size:13px;} }
@media(max-width:991px) {
    .navbar-float-wrap { top:38px;padding:4px 12px; }
    .navbar-float { border-radius:26px;padding:8px 14px; }
    .nav-links,.nav-cta { display:none; }
    .nav-burger { display:flex; }
    .lay-hero { padding:95px 0 60px; }
    .detail-hero { padding:95px 0 52px; }
    .detail-sidebar { position:static;margin-top:24px; }
    .sidebar-card,.detail-main { margin-top:0; }
    .dokter-ticker-track { animation-duration:60s; }
    .poli-grid { display:none; }
    .poli-mobile-list { display:flex; }
    .kelas-grid { display:none; }
    .kelas-mobile-wrap { display:block; }
    .lay-section { padding:48px 0 0; scroll-margin-top:130px; }
    .svc-header,.svc-body,.svc-footer { padding-left:24px;padding-right:24px; }
    .svc-list{gap:8px;}
}
@media(max-width:768px) {
    .lay-hero { padding:110px 0 60px; }
    .detail-hero { padding:110px 0 52px; }
    .hero-stats { width:100%;max-width:calc(100% - 28px); }
    .hero-stat-item { padding:12px 16px; }
    .hero-stat-num { font-size:18px; }
    .detail-content,.detail-divider,.share-bar { padding-left:22px;padding-right:22px; }
    .terkait-grid { grid-template-columns:1fr 1fr; }
    .kdp-body { grid-template-columns:1fr; }
    .page-ornament { display:none; }
    .lay-tabs-shell { gap:6px; }
    .lay-nav-btn { display:none; }
    .layanan-tabs { padding:8px 0; gap:6px; grid-template-columns:1fr; }
    .lay-nav-column { width:100%; }
    .lay-tab { padding:10px 12px; font-size:12px; }
    .svc-card { border-radius:16px; }
    .svc-header { padding:24px 20px 20px; }
    .svc-body{ padding:20px; }
    .svc-footer{ padding:0 20px 20px; }
    .poli-mobile-search{flex-direction:column;}
    .poli-mobile-search select{width:100%;}
    .kdp-footer{flex-direction:column;}
}
@media(max-width:480px) {
    .terkait-grid { grid-template-columns:1fr; }
    .dokter-ticker-track { animation-duration:45s; }
    .dtc-foto,.dtc-no-foto { width:38px;height:38px; }
    .dtc-nama { font-size:11.5px; }
    .dokter-ticker-card { padding:0 14px 0 0;gap:8px; }
    .pmi-detail-label { display:none; }
    .lay-tab { padding:9px 11px; font-size:11.5px; }
    .svc-header,.svc-body,.svc-footer { padding-left:18px;padding-right:18px; }
    .svc-title { font-size:20px; }
    .poli-mobile-item { padding:11px 12px; }
    .poli-mobile-search-wrap input { font-size:12px; }
}
/* ============================================================
   RESPONSIVE TABS MOBILE (Penyesuaian Layar HP)
============================================================ */
@media (max-width: 768px) {
    .layanan-tabs-wrap .container { padding: 0 12px; }
    .lay-nav-btn { display: none !important; } /* Sembunyikan panah di mobile (cukup swipe) */
    .layanan-tabs { padding: 12px 0; gap: 6px; justify-content: flex-start; }
    .lay-tab { padding: 8px 14px; font-size: 12.5px; }
}

@media (max-width: 480px) {
    .layanan-tabs-wrap .container { padding: 0 10px; }
    .layanan-tabs { padding: 10px 0; gap: 5px; }
    .lay-tab { padding: 7px 12px; font-size: 11.5px; }
    .lay-tab i { font-size: 13px; } /* Ikon sedikit diperkecil */
}
</style>

{{-- TOPBAR --}}
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

{{-- NAVBAR --}}
<div class="navbar-float-wrap">
    <nav class="navbar-float" id="mainNavbar">
        <a href="/" class="nav-logo">
            <img src="{{ asset('images/beranda/logo-almed.png') }}" alt="RSU Allam Medica">
        </a>
        <div class="nav-links">
            <a href="/" class="nav-link-pill {{ request()->is('/') ? 'active' : '' }}">Beranda</a>
            <div class="drop-wrap">
                <a href="#" class="nav-link-pill {{ request()->is('karir*','berita*','video*','galeri*') ? 'active' : '' }}">
                    Menu <i class="bi bi-chevron-down chevron"></i>
                </a>
                <div class="drop-menu">
                    <a href="{{ url('/karir') }}"  class="drop-item"><i class="bi bi-briefcase"></i> Karir</a>
                    <a href="{{ url('/berita') }}" class="drop-item"><i class="bi bi-newspaper"></i> Berita</a>
                    <a href="{{ url('/video') }}"  class="drop-item"><i class="bi bi-play-circle"></i> Video</a>
                    <a href="{{ url('/galeri') }}" class="drop-item"><i class="bi bi-images"></i> Galeri</a>
                </div>
            </div>
            <div class="drop-wrap">
                <a href="/layanan" class="nav-link-pill {{ request()->is('layanan*') ? 'active' : '' }}">
                    Layanan <i class="bi bi-chevron-down chevron"></i>
                </a>
                <div class="drop-menu drop-menu-layanan">
                    <div class="drop-column">
                        <a href="{{ url('/layanan') }}" class="drop-item"><i class="bi bi-grid-3x3-gap"></i> Semua Layanan</a>
                        <div class="drop-divider"></div>
                        <a href="{{ url('/layanan#igd') }}" class="drop-item"><i class="bi bi-bandaid-fill"></i> IGD 24 Jam</a>
                        <a href="{{ url('/layanan#rawatjalan') }}" class="drop-item"><i class="bi bi-clipboard2-pulse"></i> Rawat Jalan</a>
                        <a href="{{ url('/layanan#rawatinap') }}" class="drop-item"><i class="bi bi-hospital"></i> Rawat Inap</a>
                        <a href="{{ url('/layanan#ambulans') }}" class="drop-item"><i class="bi bi-truck"></i> Ambulans</a>
                        <a href="{{ url('/layanan#mcu') }}" class="drop-item"><i class="bi bi-heart-pulse"></i> Medical Check Up</a>
                    </div>
                    <div class="drop-column">
                        <a href="{{ url('/layanan#intensif') }}" class="drop-item"><i class="bi bi-heart-pulse-fill"></i> HCU/ICU/PICU//NICU</a>
                        <a href="{{ url('/layanan#vk') }}" class="drop-item"><i class="bi bi-gender-female"></i> Ruang Bersalin (VK)</a>
                        <a href="{{ url('/layanan#ibs') }}" class="drop-item"><i class="bi bi-scissors"></i> Bedah Sentral (IBS)</a>
                        <a href="{{ url('/layanan#penunjang') }}" class="drop-item"><i class="bi bi-eyedropper"></i> Penunjang Medis</a>
                        <a href="{{ url('/layanan#homeservice') }}" class="drop-item"><i class="bi bi-house-heart-fill"></i> Home Service</a>
                    </div>
                </div>
            </div>
            <a href="/artikel"  class="nav-link-pill {{ request()->is('artikel*')  ? 'active' : '' }}">Artikel</a>
            <a href="/download" class="nav-link-pill {{ request()->is('download*') ? 'active' : '' }}">Pengadaan</a>
            <a href="/tentang"  class="nav-link-pill {{ request()->is('tentang*')  ? 'active' : '' }}">Tentang Kami</a>
            <a href="/mutu"     class="nav-link-pill {{ request()->is('mutu*')     ? 'active' : '' }}">Mutu</a>
        </div>
        
        <!-- KONTAK MEGA DROPDOWN -->
        <div class="nav-cta kontak-wrap" id="kontakWrap">
            <button class="btn-kontak" id="btnKontakDesktop" type="button">Kontak</button>
            <div class="kontak-mega" id="kontakMega">
                <div class="kontak-mega-grid">
                    <div class="kontak-form-panel">
                        <div class="form-ornament"></div>
                        <div class="kontak-form-sublabel">Kontak Kami</div>
                        <div class="kontak-form-title">Get In <span>Touch</span></div>
                        <form action="https://formspree.io/f/xaqzzypq" method="POST">
                            <div class="ck-row">
                                <div class="ck-field"><label>Nama</label><input type="text" name="nama" placeholder="Nama lengkap" required></div>
                                <div class="ck-field"><label>Telepon</label><input type="text" name="telepon" placeholder="No. telepon" required></div>
                            </div>
                            <div class="ck-row">
                                <div class="ck-field"><label>Email</label><input type="email" name="email" placeholder="Email Anda" required></div>
                                <div class="ck-field"><label>Subject</label><input type="text" name="subject" placeholder="Perihal" required></div>
                            </div>
                            <div class="ck-field"><label>Pesan</label><textarea name="pesan" placeholder="Tulis pesan Anda..." required></textarea></div>
                            <button type="submit" class="btn-send-mega"><i class="bi bi-send-fill"></i> Kirim Pesan</button>
                        </form>
                    </div>
                   <div class="kontak-info-panel">
                        <div class="kontak-info-grid">
                            <a href="https://wa.me/6285290273097" target="_blank" class="kontak-info-card">
                                <div class="kontak-info-icon ci-igd"><i class="bi bi-heart-pulse-fill"></i></div>
                                <div class="kontak-info-title">IGD 24 Jam</div>
                                <div class="kontak-info-val">0852-9027-3097</div>
                            </a>
                            <a href="https://wa.me/6285290273097" target="_blank" class="kontak-info-card">
                                <div class="kontak-info-icon ci-ambulans"><i class="bi bi-truck"></i></div>
                                <div class="kontak-info-title">Ambulans</div>
                                <div class="kontak-info-val">0852-9027-3097</div>
                            </a>
                            <a href="https://wa.me/6285292224886" target="_blank" class="kontak-info-card">
                                <div class="kontak-info-icon ci-wa"><i class="fa-brands fa-whatsapp"></i></div>
                                <div class="kontak-info-title">WhatsApp</div>
                                <div class="kontak-info-val">0852-9222-4886</div>
                            </a>
                            <a href="mailto:allam.medica@yahoo.co.id" class="kontak-info-card">
                                <div class="kontak-info-icon ci-email"><i class="bi bi-envelope-fill"></i></div>
                                <div class="kontak-info-title">Email</div>
                                <div class="kontak-info-val">allam.medica@yahoo.co.id</div>
                            </a>
                        </div>
                        <div class="kontak-social-row">
                            <a href="https://www.tiktok.com/@rsuallammedicabumiayu?_t=8fLMQk9idhI&_r=1" target="_blank" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
                            <a href="https://www.facebook.com/allam.medicabmy?mibextid=LQQJ4d" target="_blank" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/allam.medica/" target="_blank" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        </div>
                        <div class="kontak-map-box"><iframe src="https://www.google.com/maps?q=RSU+Allam+Medica+Bumiayu&output=embed" loading="lazy"></iframe></div>
                        <a href="https://www.google.com/maps?q=RSU+Allam+Medica+Bumiayu" target="_blank" class="kontak-map-caption">
                            <i class="bi bi-geo-alt-fill"></i> Jl. P. Diponegoro No.609, Bumiayu, Brebes
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <button class="nav-burger" id="navBurger"><span></span><span></span><span></span></button>
    </nav>
</div>

{{-- DRAWER --}}
<div class="nav-overlay" id="navOverlay"></div>
<aside class="nav-drawer" id="navDrawer">
    <div class="drawer-header">
        <span class="drawer-label">Menu</span>
        <button class="drawer-close-btn" id="drawerClose"><i class="bi bi-x-lg"></i></button>
    </div>
    <nav class="drawer-nav">
        <a href="/" class="d-link {{ request()->is('/') ? 'active' : '' }}"><span class="d-icon"><i class="bi bi-house"></i></span> Beranda</a>
        <button class="d-accordion-btn {{ request()->is('karir*','berita*','video*','galeri*') ? 'active-parent' : '' }}" data-target="acc-menu">
            <span class="d-acc-left"><span class="d-icon"><i class="bi bi-grid"></i></span> Menu</span>
            <i class="bi bi-chevron-down d-accordion-chevron"></i>
        </button>
        <div class="d-accordion-body {{ request()->is('karir*','berita*','video*','galeri*') ? 'open' : '' }}" id="acc-menu">
            <a href="{{ url('/karir') }}"  class="d-sub-link"><i class="bi bi-briefcase"></i> Karir</a>
            <a href="{{ url('/berita') }}" class="d-sub-link"><i class="bi bi-newspaper"></i> Berita</a>
            <a href="{{ url('/video') }}"  class="d-sub-link"><i class="bi bi-play-circle"></i> Video</a>
            <a href="{{ url('/galeri') }}" class="d-sub-link"><i class="bi bi-images"></i> Galeri</a>
        </div>
        <div class="d-divider"></div>
        <button class="d-accordion-btn {{ request()->is('layanan*') ? 'active-parent' : '' }}" data-target="acc-layanan">
            <span class="d-acc-left"><span class="d-icon"><i class="bi bi-hospital"></i></span> Layanan</span>
            <i class="bi bi-chevron-down d-accordion-chevron"></i>
        </button>
        <div class="d-accordion-body {{ request()->is('layanan*') ? 'open' : '' }}" id="acc-layanan">
            <a href="{{ url('/layanan') }}"              class="d-sub-link"><i class="bi bi-grid-3x3-gap"></i> Semua Layanan</a>
            <div class="d-divider"></div>
            <a href="{{ url('/layanan#igd') }}"          class="d-sub-link"><i class="bi bi-bandaid-fill"></i> IGD 24 Jam</a>
            <a href="{{ url('/layanan#rawatjalan') }}"   class="d-sub-link"><i class="bi bi-clipboard2-pulse"></i> Rawat Jalan</a>
            <a href="{{ url('/layanan#rawatinap') }}"    class="d-sub-link"><i class="bi bi-hospital"></i> Rawat Inap</a>
            <a href="{{ url('/layanan#ambulans') }}"     class="d-sub-link"><i class="bi bi-truck"></i> Ambulans 24 Jam</a>
            <a href="{{ url('/layanan#mcu') }}"          class="d-sub-link"><i class="bi bi-heart-pulse"></i> Medical Check Up</a>
            <a href="{{ url('/layanan#intensif') }}"     class="d-sub-link"><i class="bi bi-heart-pulse-fill"></i> HCU/ICU/PICU//NICU</a>
            <a href="{{ url('/layanan#vk') }}"           class="d-sub-link"><i class="bi bi-gender-female"></i> Ruang Bersalin (VK)</a>
            <a href="{{ url('/layanan#ibs') }}"          class="d-sub-link"><i class="bi bi-scissors"></i> Bedah Sentral (IBS)</a>
            <a href="{{ url('/layanan#penunjang') }}"    class="d-sub-link"><i class="bi bi-eyedropper"></i> Penunjang Medis</a>
            <a href="{{ url('/layanan#homeservice') }}"  class="d-sub-link"><i class="bi bi-house-heart-fill"></i> Home Service</a>
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

{{-- BOTTOM SHEET --}}
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
                <div class="ck-field"><label>Nama</label><input type="text" name="nama" placeholder="Nama lengkap" required></div>
                <div class="ck-field"><label>Telepon</label><input type="text" name="telepon" placeholder="No. telepon" required></div>
                <div class="ck-field"><label>Email</label><input type="email" name="email" placeholder="Email Anda" required></div>
                <div class="ck-field"><label>Subject</label><input type="text" name="subject" placeholder="Perihal" required></div>
                <div class="ck-field"><label>Pesan</label><textarea name="pesan" placeholder="Tulis pesan Anda..." required></textarea></div>
                <button type="submit" class="btn-send-bs"><i class="bi bi-send-fill"></i> Kirim Pesan</button>
            </form>
        </div>
        <div class="bs-info-grid">
            <a href="https://wa.me/6285290273097" target="_blank" class="bs-info-card">
                <div class="bs-info-icon ci-igd"><i class="bi bi-heart-pulse-fill"></i></div>
                <div class="bs-info-title">IGD 24 Jam</div>
                <div class="bs-info-val">0852-9027-3097</div>
            </a>
            <a href="https://wa.me/6285290273097" target="_blank" class="bs-info-card">
                <div class="bs-info-icon ci-ambulans"><i class="bi bi-truck"></i></div>
                <div class="bs-info-title">Ambulans</div>
                <div class="bs-info-val">0852-9027-3097</div>
            </a>
            <a href="https://wa.me/6285292224886" target="_blank" class="bs-info-card">
                <div class="bs-info-icon ci-wa"><i class="fa-brands fa-whatsapp"></i></div>
                <div class="bs-info-title">WhatsApp</div>
                <div class="bs-info-val">0852-9222-4886</div>
            </a>
            <a href="mailto:allam.medica@yahoo.co.id" class="bs-info-card">
                <div class="bs-info-icon ci-email"><i class="bi bi-envelope-fill"></i></div>
                <div class="bs-info-title">Email</div>
                <div class="bs-info-val">allam.medica@yahoo.co.id</div>
            </a>
        </div>
        <div class="kontak-social-row">
            <a href="https://www.tiktok.com/@rsuallammedicabumiayu?_t=8fLMQk9idhI&_r=1" target="_blank" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
            <a href="https://www.facebook.com/allam.medicabmy?mibextid=LQQJ4d" target="_blank" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/allam.medica/" target="_blank" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
        </div>
        <div class="bs-map-box">
            <iframe src="https://www.google.com/maps?q=RSU+Allam+Medica+Bumiayu&output=embed" loading="lazy"></iframe>
        </div>
        <a href="https://www.google.com/maps?q=RSU+Allam+Medica+Bumiayu" target="_blank" class="kontak-map-caption">
            <i class="bi bi-geo-alt-fill"></i> Jl. P. Diponegoro No.609, Bumiayu, Brebes
        </a>
    </div>
</div>

<div class="page-ornament orn-1" id="pgOrn1"></div>
<div class="page-ornament orn-2" id="pgOrn2"></div>
<div class="page-ornament orn-3" id="pgOrn3"></div>
<div class="page-ornament orn-4" id="pgOrn4"></div>
<div class="page-ornament orn-5" id="pgOrn5"></div>

{{-- ============================================================
     DETAIL POLI
============================================================ --}}
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
            @if($poli->no_hp)<span class="detail-chip"><i class="bi bi-telephone"></i> {{ $poli->no_hp }}</span>@endif
        </div>
    </div>
</section>

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

<div class="detail-body">
<div class="container" style="padding-top:48px;">
<div class="row g-4">
    <div class="col-lg-8">
        <div class="detail-main">
            @if($poli->gambar)
                <img src="{{ asset('storage/'.$poli->gambar) }}" alt="{{ $poli->poli }}" class="detail-featured-img">
            @else
                <div class="detail-img-placeholder"><i class="bi bi-clipboard2-pulse"></i></div>
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
        @if(isset($poliTerkait) && $poliTerkait->count())
        <div style="margin-top:40px;">
            <div class="terkait-title">Poliklinik Lainnya</div>
            <div class="terkait-grid">
                @foreach($poliTerkait as $i => $p)
                <a href="{{ route('layanan.poli', $p['id']) }}" class="terkait-card" style="animation:fadeUp .4s ease {{ $i*0.08 }}s both;">
                    <div class="terkait-thumb">
                        @if($p['gambar'])<img src="{{ $p['gambar'] }}" alt="{{ $p['poli'] }}" loading="lazy">
                        @else<div class="terkait-thumb-placeholder"><i class="bi bi-clipboard2-pulse"></i></div>@endif
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
        @else
        <div style="height:24px;"></div>
        @endif
    </div>
    <div class="col-lg-4">
        <div class="detail-sidebar">
            <div class="sidebar-card">
                <div class="sc-header"><h3>Informasi Kontak</h3><p>Hubungi kami untuk janji temu</p></div>
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
                    <a href="https://wa.me/{{ $noWa }}" target="_blank" class="btn-wa-sidebar"><i class="bi bi-whatsapp"></i> Chat WhatsApp</a>
                    @endif
                    @if($poli->no_hp)
                    <a href="tel:{{ preg_replace('/[^0-9]/','',$poli->no_hp) }}" class="btn-tel-sidebar"><i class="bi bi-telephone-fill"></i> Hubungi via Telepon</a>
                    @endif
                </div>
            </div>
            
            <a href="{{ route('jadwaldokter') }}" class="jadwal-cta">
                <div class="jadwal-inner">
                    <div style="width:40px;height:40px;border-radius:11px;background:#fff;border:1px solid rgba(28,20,92,.15);display:flex;align-items:center;justify-content:center;font-size:18px;color:#1C145C;flex-shrink:0;"><i class="bi bi-calendar2-week-fill"></i></div>
                    <div class="jadwal-text"><div class="jt-label">Lihat Jadwal Dokter</div><div class="jt-sub">Cek jadwal & ketersediaan dokter</div></div>
                    <i class="bi bi-arrow-right jadwal-arrow"></i>
                </div>
            </a>
        </div>
    </div>
</div>
</div>

@else

{{-- ============================================================
     LIST MODE
============================================================ --}}
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
        <div class="hero-kat"><i class="bi bi-hospital-fill"></i> Poliklinik & Layanan Medis</div>
        <h1 class="hero-title">Layanan Kesehatan<br><em>RSU Allam Medica</em></h1>
        <div class="hero-meta">
            <span class="hero-meta-pill"><i class="bi bi-geo-alt-fill"></i> RSU Allam Medica Bumiayu</span>
            <span class="hero-meta-pill"><i class="bi bi-grid-3x3-gap"></i> 10 Jenis Layanan</span>
            <span class="hero-meta-pill"><i class="bi bi-bandaid-fill"></i> IGD 24 Jam</span>
            <span class="hero-meta-pill"><i class="bi bi-shield-check"></i> Melayani BPJS</span>
        </div>
        <div class="hero-stats">
            <div class="hero-stat-item"><span class="hero-stat-num">10</span><div class="hero-stat-label">Jenis Layanan</div></div>
            <div class="hero-stat-item"><span class="hero-stat-num">24<small style="font-size:13px">/7</small></span><div class="hero-stat-label">IGD Siaga</div></div>
            <div class="hero-stat-item"><span class="hero-stat-num">BPJS</span><div class="hero-stat-label">Menerima BPJS</div></div>
            <div class="hero-stat-item"><span class="hero-stat-num" id="statPoli">—</span><div class="hero-stat-label">Poliklinik</div></div>
        </div>
    </div>
</section>

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

<div class="layanan-tabs-wrap">
    <div class="container">
        <div class="lay-tabs-shell">
            <button type="button" class="lay-nav-btn lay-nav-btn-prev" aria-label="Scroll tab ke kiri"><i class="bi bi-chevron-left"></i></button>
            <div class="layanan-tabs" id="layananTabs">
                <a href="#igd"          class="lay-tab active" data-section="igd"><i class="bi bi-bandaid-fill"></i> IGD 24 Jam</a>
                <a href="#rawatjalan"   class="lay-tab" data-section="rawatjalan"><i class="bi bi-clipboard2-pulse"></i> Rawat Jalan</a>
                <a href="#rawatinap"    class="lay-tab" data-section="rawatinap"><i class="bi bi-hospital"></i> Rawat Inap</a>
                <a href="#ambulans"     class="lay-tab" data-section="ambulans"><i class="bi bi-truck"></i> Ambulans</a>
                <a href="#mcu"          class="lay-tab" data-section="mcu"><i class="bi bi-heart-pulse"></i> Medical Check Up</a>
                <a href="#intensif"     class="lay-tab" data-section="intensif"><i class="bi bi-heart-pulse-fill"></i> HCU/ICU/PICU//NICU</a>
                <a href="#vk"           class="lay-tab" data-section="vk"><i class="bi bi-gender-female"></i> Ruang Bersalin (VK)</a>
                <a href="#ibs"          class="lay-tab" data-section="ibs"><i class="bi bi-scissors"></i> Bedah Sentral (IBS)</a>
                <a href="#penunjang"    class="lay-tab" data-section="penunjang"><i class="bi bi-eyedropper"></i> Penunjang Medis</a>
                <a href="#homeservice"  class="lay-tab" data-section="homeservice"><i class="bi bi-house-heart-fill"></i> Home Service</a>
            </div>
            <button type="button" class="lay-nav-btn lay-nav-btn-next" aria-label="Scroll tab ke kanan"><i class="bi bi-chevron-right"></i></button>
        </div>
    </div>
</div>

<div class="layanan-page-body">
<div class="container" style="position:relative;z-index:1;">

    {{-- IGD --}}
    <section id="igd" class="lay-section" style="position:relative;overflow:hidden;">
        <div class="ornamen" style="top:-20px;right:-20px;width:280px;height:280px;opacity:0.04;"></div>
        <div class="ornamen" style="bottom:-60px;left:-70px;width:260px;height:260px;opacity:0.035;"></div>
        <div style="margin-bottom:28px;position:relative;z-index:1;">
            <div class="sec-label" style="background:#fee2e2;color:#dc2626;"><i class="bi bi-bandaid-fill"></i> Gawat Darurat</div>
            <div class="sec-title">IGD 24 Jam</div>
            <div class="sec-sub">Penanganan gawat darurat cepat, tepat, dan profesional sepanjang waktu.</div>
        </div>
        <div class="sec-divider"></div>
        <div class="row g-4" style="position:relative;z-index:1;">
            <div class="col-lg-5">
                <div class="svc-card h-100">
                    <div class="svc-header" style="background:linear-gradient(135deg,#7f1d1d 0%,#dc2626 100%);">
                        <div class="svc-header-icon"><i class="bi bi-bandaid-fill"></i></div>
                        <div class="svc-title">IGD 24 Jam</div>
                        <div class="svc-tagline">Penanganan gawat darurat cepat, tepat, dan profesional sepanjang waktu</div>
                    </div>
                    <div class="svc-body">
                        <p class="svc-desc">Instalasi Gawat Darurat RSU Allam Medica beroperasi penuh 24 jam sehari, 7 hari seminggu, 365 hari setahun. Ditangani oleh tim dokter dan perawat terlatih yang siap memberikan pertolongan pertama dan penanganan medis darurat.</p>
                        <ul class="svc-list">
                            <li><strong style="color:#1C145C;">Jam Pelayanan:</strong> Buka 24 Jam, 7 hari seminggu</li>
                            <li><strong style="color:#1C145C;">Lokasi:</strong> Gedung Utama Lantai 1 (Akses Depan)</li>
                            <li><strong style="color:#1C145C;">Persyaratan:</strong> KTP/Identitas Diri, Kartu BPJS (jika ada)</li>
                            <li><strong style="color:#1C145C;">Alur Pelayanan:</strong> Triage &rarr; Pemeriksaan Awal &rarr; Penanganan & Observasi &rarr; Rawat Inap/Rujuk/Pulang</li>
                            <li><strong style="color:#1C145C;">Kontak & Informasi:</strong> 085290273097 (WhatsApp/Telepon)</li>
                        </ul>
                    </div>
                    <div class="svc-footer">
                        <a href="tel:085290273097" class="svc-badge" style="background:#fee2e2;color:#dc2626;border:1px solid #fca5a5;"><i class="bi bi-telephone-fill"></i> 085290273097</a>
                        <a href="https://wa.me/6285290273097" target="_blank" class="svc-badge" style="background:#dcfce7;color:#15803d;border:1px solid #86efac;"><i class="bi bi-whatsapp"></i> WhatsApp</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-flex align-items-stretch flex-column">
                <div style="background:#fff;border-radius:20px;border:1px solid #e8edf5;box-shadow:0 4px 20px rgba(28,20,92,.05);padding:32px;width:100%;position:relative;overflow:hidden;flex:1;">
                    <div style="font-size:11px;font-weight:800;color:#64748b;text-transform:uppercase;letter-spacing:.8px;margin-bottom:18px;">Prosedur Penanganan</div>
                    <div style="display:flex;flex-direction:column;gap:16px;">
                        @php $steps=[['num'=>'01','icon'=>'bi-funnel','title'=>'Triage','desc'=>'Pasien diklasifikasikan berdasarkan tingkat kegawatan untuk menentukan prioritas penanganan.'],['num'=>'02','icon'=>'bi-person-check','title'=>'Pemeriksaan Awal','desc'=>'Dokter IGD melakukan pemeriksaan fisik dan penanganan stabilisasi kondisi pasien.'],['num'=>'03','icon'=>'bi-activity','title'=>'Penanganan & Observasi','desc'=>'Tindakan medis darurat diberikan dan pasien diobservasi hingga kondisi stabil.'],['num'=>'04','icon'=>'bi-arrow-right-circle','title'=>'Rawat Inap atau Rujukan','desc'=>'Pasien dirujuk ke rawat inap atau difasilitasi rujukan ke rumah sakit lain bila diperlukan.']]; @endphp
                        @foreach($steps as $s)
                        <div style="display:flex;gap:14px;align-items:flex-start;">
                            <div style="width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,#fee2e2,#fecaca);color:#dc2626;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:800;flex-shrink:0;border:1px solid #fca5a5;">{{ $s['num'] }}</div>
                            <div>
                                <div style="font-size:14px;font-weight:700;color:#1e293b;margin-bottom:3px;display:flex;align-items:center;gap:7px;"><i class="bi {{ $s['icon'] }}" style="color:#dc2626;font-size:13px;"></i>{{ $s['title'] }}</div>
                                <div style="font-size:13px;color:#64748b;line-height:1.6;">{{ $s['desc'] }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <div class="col-lg-12 mt-4" style="position:relative;z-index:1;">
                <div style="background:#fff;border-radius:20px;border:1px solid #e8edf5;box-shadow:0 4px 20px rgba(28,20,92,.05);padding:32px;">
                    <div style="font-size:11px;font-weight:800;color:#64748b;text-transform:uppercase;letter-spacing:.8px;margin-bottom:18px;"><i class="bi bi-people-fill" style="margin-right:5px;color:#dc2626;"></i> Tim Dokter Umum IGD</div>
                    <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(200px, 1fr));gap:14px;">
                        @php 
                        $dokterIgd = [
                            ['nama' => 'dr. Wildan Baiti Al Anwari', 'jadwal' => 'Dokter Umum IGD 24 Jam', 'foto' => 'dr.Wildan.jpg'],
                            ['nama' => 'dr. Laelatul Faizah', 'jadwal' => 'Dokter Umum IGD 24 Jam', 'foto' => 'dr.LaelatulFaizah.jpg'],
                            ['nama' => 'dr. Almira Meida Resi Fauzia', 'jadwal' => 'Dokter Umum IGD 24 Jam', 'foto' => 'almira.png'],
                            ['nama' => 'dr. Vania Salsabila Ihwanah', 'jadwal' => 'Dokter Umum IGD 24 Jam', 'foto' => 'dr.vania.jpg'],
                            ['nama' => 'dr. Muhammad Salman Shalahudgin', 'jadwal' => 'Dokter Umum IGD 24 Jam', 'foto' => 'dr.salman.jpg'],
                            ['nama' => 'dr. Windy Listiana', 'jadwal' => 'Dokter Umum IGD 24 Jam', 'foto' => 'dr.Windi.jpg.jpeg'],
                            ['nama' => 'dr. Akhdan Baghaskara Rahmatullah', 'jadwal' => 'Dokter Umum IGD 24 Jam', 'foto' => 'dr.bagas.jpg'],
                            ['nama' => 'dr. Hilda Maulyda Utamie', 'jadwal' => 'Dokter Umum IGD 24 Jam', 'foto' => 'dr.Hilda.jpg'],
                            ['nama' => 'dr. Solikha', 'jadwal' => 'Dokter Umum IGD 24 Jam', 'foto' => 'dr.Solikha.jpg.jpeg'],
                        ];
                        @endphp
                        @foreach($dokterIgd as $dok)
                        <div style="display:flex;align-items:center;gap:12px;padding:12px;background:#f8faff;border-radius:12px;border:1px solid #e8edf5;">
                            <div style="width:40px;height:40px;border-radius:50%;background:#fee2e2;color:#dc2626;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0;overflow:hidden;">
                                <img src="{{ asset('images/layanan/' . $dok['foto']) }}"
                                     alt="{{ $dok['nama'] }}"
                                     style="width:100%;height:100%;object-fit:cover;border-radius:50%;"
                                     onerror="this.onerror=null;this.replaceWith(Object.assign(document.createElement('i'), {className:'fa-solid fa-user-doctor'}));">
                            </div>
                            <div>
                                <div style="font-size:13.5px;font-weight:700;color:#1e293b;">{{ $dok['nama'] }}</div>
                                <div style="font-size:11px;color:#64748b;">{{ $dok['jadwal'] }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- RAWAT JALAN --}}
    <section id="rawatjalan" class="lay-section" style="position:relative;overflow:hidden;">
        <div class="ornamen" style="top:-90px;left:-20px;width:340px;height:340px;opacity:0.04;"></div>
        <div class="ornamen" style="bottom:-80px;right:-70px;width:280px;height:280px;opacity:0.035;"></div>
        <div class="lay-section-header" style="display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:28px;gap:16px;flex-wrap:wrap;position:relative;z-index:1;">
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

        <div style="background:#fff;border-radius:16px;border:1px solid #e8edf5;padding:24px 28px;margin-bottom:24px;box-shadow:0 2px 12px rgba(28,20,92,.05);position:relative;z-index:1;">
            <div style="font-size:14px;font-weight:700;color:#1C145C;margin-bottom:12px;"><i class="bi bi-info-circle-fill" style="margin-right:6px;"></i> Informasi Umum Rawat Jalan</div>
            <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(250px, 1fr));gap:12px;">
                <div style="font-size:13px;"><strong style="color:#1C145C;">Jam Pelayanan:</strong><br>Senin - Sabtu: 07.00 - 21.00 WIB<br>Minggu: 08.00 - 14.00 WIB</div>
                <div style="font-size:13px;"><strong style="color:#1C145C;">Lokasi:</strong><br>Gedung Poliklinik Lantai 1 & 2</div>
                <div style="font-size:13px;"><strong style="color:#1C145C;">Persyaratan:</strong><br>KTP, Surat Rujukan (Untuk BPJS), Kartu Berobat/Identitas Pasien</div>
                <div style="font-size:13px;"><strong style="color:#1C145C;">Alur Pelayanan:</strong><br>Pendaftaran &rarr; Antrean Poli &rarr; Pemeriksaan Dokter &rarr; Farmasi/Kasir</div>
                <div style="font-size:13px;"><strong style="color:#1C145C;">Kontak & Pendaftaran:</strong><br><i class="bi bi-telephone-fill"></i> 085292224886</div>
            </div>
        </div>

        <div class="d-none d-lg-flex" style="background:#fff;border-radius:12px;border:1px solid #e8edf5;padding:12px 16px;align-items:center;gap:10px;margin-bottom:20px;box-shadow:0 2px 8px rgba(28,20,92,.04);flex-wrap:wrap;position:relative;z-index:1;">
            <div style="position:relative;flex:1;min-width:180px;">
                <i class="bi bi-search" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:13px;pointer-events:none;"></i>
                <input type="search" id="searchPoliDesktop" placeholder="Cari poliklinik..." oninput="filterPoliDesktop()" style="width:100%;padding:8px 12px 8px 34px;border:1.5px solid #e2e8f0;border-radius:9px;font-size:13px;outline:none;background:#f8faff;">
            </div>
            <select id="filterPoliStatusDesktop" onchange="filterPoliDesktop()" style="padding:8px 26px 8px 11px;border:1.5px solid #e2e8f0;border-radius:9px;font-size:13px;outline:none;background:#f8faff;appearance:none;background-image:url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%2364748b' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E\");background-repeat:no-repeat;background-position:right 9px center;cursor:pointer;">
                <option value="">Semua Status</option>
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
        </div>
        <div class="poli-grid" id="poliGrid" style="position:relative;z-index:1;">
            @php $poliItems = collect($layananData)->where('kategori','poli')->values(); @endphp
            @forelse($poliItems as $i => $pol)
            <div class="poli-card" data-nama="{{ strtolower($pol['poli']??'') }}" data-status="{{ $pol['status']??'aktif' }}" style="animation-delay:{{ min($i*0.06,0.5) }}s">
                <div class="poli-thumb">
                    @if(!empty($pol['gambar']))<img src="{{ $pol['gambar'] }}" alt="{{ $pol['poli'] }}" loading="lazy">
                    @else<div class="poli-thumb-placeholder"><i class="bi bi-clipboard2-pulse"></i></div>@endif
                    <span class="poli-status {{ $pol['status']??'aktif' }}">{{ ($pol['status']??'aktif')==='aktif'?'Aktif':'Nonaktif' }}</span>
                </div>
                <div class="poli-body">
                    <div class="poli-name">{{ $pol['poli'] }}</div>
                    <div class="poli-desc">{{ $pol['deskripsi']??'Layanan poliklinik spesialis RSU Allam Medica.' }}</div>
                </div>
                <div class="poli-footer">
                    @php $noWa=preg_replace('/[^0-9]/','', $pol['no_wa']??''); @endphp
                    @if($noWa)<a href="https://wa.me/{{ $noWa }}" target="_blank" class="poli-wa"><i class="bi bi-whatsapp"></i> WhatsApp</a>
                    @else<span style="font-size:12px;color:#94a3b8;font-style:italic;">—</span>@endif
                    <a href="{{ route('layanan.poli', $pol['id']) }}" class="poli-detail">
                        <i class="bi bi-eye" style="font-size:11px;"></i> Detail <i class="bi bi-arrow-right" style="font-size:11px;"></i>
                    </a>
                </div>
            </div>
            @empty
            <div class="poli-empty"><p><i class="bi bi-inbox" style="font-size:24px;display:block;margin-bottom:8px;"></i>Belum ada data poliklinik.</p></div>
            @endforelse
        </div>
        <div class="d-lg-none" style="position:relative;z-index:1;">
            <div class="poli-mobile-search">
                <div class="poli-mobile-search-wrap">
                    <i class="bi bi-search"></i>
                    <input type="search" id="searchPoliMobile" placeholder="Cari poliklinik..." oninput="filterPoliMobile()">
                </div>
                <select id="filterPoliStatusMobile" onchange="filterPoliMobile()" style="padding:9px 10px;border:1.5px solid #e2e8f0;border-radius:10px;font-size:13px;outline:none;background:#f8faff;flex-shrink:0;">
                    <option value="">Semua</option>
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>
            <div class="poli-mobile-list" id="poliMobileList">
                @forelse($poliItems as $pol)
                <div class="poli-mobile-item" data-nama="{{ strtolower($pol['poli']??'') }}" data-status="{{ $pol['status']??'aktif' }}">
                    <div class="pmi-icon"><i class="bi bi-clipboard2-pulse"></i></div>
                    <div class="pmi-info">
                        <div class="pmi-name">{{ $pol['poli'] }}</div>
                        <div class="pmi-status-badge {{ $pol['status']??'aktif' }}">{{ ($pol['status']??'aktif')==='aktif' ? 'Aktif' : 'Nonaktif' }}</div>
                    </div>
                    <div class="pmi-actions">
                        @php $noWaMob=preg_replace('/[^0-9]/','', $pol['no_wa']??''); @endphp
                        @if($noWaMob)<a href="https://wa.me/{{ $noWaMob }}" target="_blank" class="pmi-wa" title="WhatsApp"><i class="bi bi-whatsapp"></i></a>@endif
                        <a href="{{ route('layanan.poli', $pol['id']) }}" class="pmi-detail">
                            <i class="bi bi-arrow-right" style="font-size:12px;"></i>
                            <span class="pmi-detail-label">Detail</span>
                        </a>
                    </div>
                </div>
                @empty
                <div class="pmi-empty"><i class="bi bi-inbox" style="font-size:22px;display:block;margin-bottom:6px;"></i>Belum ada data poliklinik.</div>
                @endforelse
            </div>
            <div id="poliMobileEmpty" style="display:none;" class="pmi-empty">
                <i class="bi bi-search" style="font-size:22px;display:block;margin-bottom:6px;"></i>Poliklinik tidak ditemukan.
            </div>
        </div>
        <div style="margin-top:28px;background:linear-gradient(135deg,#1C145C 0%,#3b5bdb 100%);border-radius:18px;padding:28px 32px;display:flex;align-items:center;justify-content:space-between;gap:20px;flex-wrap:wrap;position:relative;overflow:hidden;z-index:1;">
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

    {{-- RAWAT INAP --}}
    <section id="rawatinap" class="lay-section" style="position:relative;overflow:hidden;">
        <div class="ornamen" style="top:-20px;right:-20px;width:360px;height:360px;opacity:0.04;"></div>
        <div class="ornamen" style="bottom:-80px;left:-80px;width:600px;height:600px;opacity:0.035;"></div>
        <div class="sec-divider"></div>
        <div style="margin-bottom:28px;position:relative;z-index:1;">
            <div class="sec-label" style="background:#ede9fe;color:#7c3aed;"><i class="bi bi-hospital"></i> Rawat Inap</div>
            <div class="sec-title">Fasilitas Rawat Inap</div>
            <div class="sec-sub">RSU Allam Medica menyediakan berbagai pilihan kelas perawatan sesuai kebutuhan dan kondisi pasien.</div>
        </div>
        
        <div style="background:#fff;border-radius:16px;border:1px solid #e8edf5;padding:24px 28px;margin-bottom:24px;box-shadow:0 2px 12px rgba(28,20,92,.05);position:relative;z-index:1;">
            <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(200px, 1fr));gap:12px;">
                <div style="font-size:13px;"><strong style="color:#1C145C;">Jam Pelayanan:</strong><br>24 Jam Terjadwal</div>
                <div style="font-size:13px;"><strong style="color:#1C145C;">Lokasi:</strong><br>Gedung Rawat Inap (Lantai 1 & 2)</div>
                <div style="font-size:13px;"><strong style="color:#1C145C;">Persyaratan:</strong><br>Surat Pengantar Rawat Inap, KTP/KK, BPJS</div>
                <div style="font-size:13px;"><strong style="color:#1C145C;">Alur Pelayanan:</strong><br>Rekomendasi IGD/Poli &rarr; Registrasi Ranap &rarr; Ruang Perawatan</div>
                <div style="font-size:13px;"><strong style="color:#1C145C;">Kontak & Informasi:</strong><br><i class="bi bi-whatsapp"></i> 085292224886</div>
            </div>
        </div>

        @php
        $kelasRawat = [
            ['nama'=>'Kelas VIP','foto'=>asset('assets/KelasVIP.png'),'icon'=>'bi-gem','grad'=>'linear-gradient(135deg,#0f0c29 0%,#302b63 50%,#24243e 100%)','badge_bg'=>'#ede9fe','badge_c'=>'#4c1d95','badge'=>'VIP','fitur'=>[['icon'=>'bi-door-open','teks'=>'Kamar pribadi 1 tempat tidur'],['icon'=>'bi-tv','teks'=>'TV & AC'],['icon'=>'bi-box-seam','teks'=>'Kulkas mini, kamar mandi dalam'],['icon'=>'bi-person-hearts','teks'=>'Ruang kunjungan keluarga'],['icon'=>'bi-patch-check','teks'=>'Melayani pasien BPJS']]],
            ['nama'=>'Kelas 1','foto'=>asset('assets/Kelas1.png'),'icon'=>'bi-star-fill','grad'=>'linear-gradient(135deg,#1e3a6e 0%,#2563eb 100%)','badge_bg'=>'#dbeafe','badge_c'=>'#1d4ed8','badge'=>'Kelas 1','fitur'=>[['icon'=>'bi-door-open','teks'=>'2 tempat tidur per kamar'],['icon'=>'bi-tv','teks'=>'Fasilitas TV & AC'],['icon'=>'bi-box-seam','teks'=>'Lemari & ruang penyimpanan'],['icon'=>'bi-person-hearts','teks'=>'Ruang kunjungan keluarga'],['icon'=>'bi-patch-check','teks'=>'Melayani pasien BPJS']]],
            ['nama'=>'Kelas 2','foto'=>asset('assets/Kelas2.png'),'icon'=>'bi-star-half','grad'=>'linear-gradient(135deg,#1e4d3a 0%,#059669 100%)','badge_bg'=>'#d1fae5','badge_c'=>'#065f46','badge'=>'Kelas 2','fitur'=>[['icon'=>'bi-door-open','teks'=>'3-4 tempat tidur per kamar'],['icon'=>'bi-person-hearts','teks'=>'Ruang kunjungan keluarga'],['icon'=>'bi-patch-check','teks'=>'Melayani pasien BPJS']]],
            ['nama'=>'Kelas 3','foto'=>asset('assets/Kelas3.png'),'icon'=>'bi-star','grad'=>'linear-gradient(135deg,#3d2a0f 0%,#d97706 100%)','badge_bg'=>'#fef3c7','badge_c'=>'#92400e','badge'=>'Kelas 3','fitur'=>[['icon'=>'bi-door-open','teks'=>'5–6 tempat tidur per kamar'],['icon'=>'bi-patch-check','teks'=>'Melayani pasien BPJS'],['icon'=>'bi-shield-plus','teks'=>'Perawatan medis lengkap'],['icon'=>'bi-people','teks'=>'Area keluarga tersedia']]],
            ['nama'=>'Intermediet','foto'=>asset('assets/Intermediet.png'),'icon'=>'bi-activity','grad'=>'linear-gradient(135deg,#1a1a5e 0%,#6366f1 100%)','badge_bg'=>'#ede9fe','badge_c'=>'#4c1d95','badge'=>'Perawatan Khusus','fitur'=>[['icon'=>'bi-heart-pulse-fill','teks'=>'Monitor vital sign kontinu'],['icon'=>'bi-person-badge','teks'=>'Perawat terlatih 24 jam'],['icon'=>'bi-capsule','teks'=>'Obat-obatan khusus tersedia'],['icon'=>'bi-exclamation-triangle','teks'=>'Untuk pasien semi-kritis']]],
            ['nama'=>'Perinatologi','foto'=>asset('assets/Perinatologi.png'),'icon'=>'bi-balloon-heart','grad'=>'linear-gradient(135deg,#831843 0%,#ec4899 100%)','badge_bg'=>'#fce7f3','badge_c'=>'#9d174d','badge'=>'Bayi Baru Lahir','fitur'=>[['icon'=>'bi-thermometer','teks'=>'Inkubator & penghangat bayi'],['icon'=>'bi-lungs','teks'=>'Monitor oksigen neonatus'],['icon'=>'bi-person-badge','teks'=>'Perawat neonatus terlatih'],['icon'=>'bi-heart','teks'=>'Perawatan bayi baru lahir']]],
        ];
        @endphp
        <div class="kelas-grid" style="position:relative;z-index:1;">
            @foreach($kelasRawat as $i => $kelas)
            <div class="kelas-card" style="animation-delay:{{ min($i*0.07,0.5) }}s;">
                <div class="kelas-thumb">
                    @if(!empty($kelas['foto']))
                        <img src="{{ $kelas['foto'] }}" alt="{{ $kelas['nama'] }}" loading="lazy" style="width:100%;height:100%;object-fit:cover;" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                        <div class="kelas-thumb-placeholder" style="display:none;"><i class="bi {{ $kelas['icon'] }}"></i></div>
                    @else
                        <div class="kelas-thumb-placeholder"><i class="bi {{ $kelas['icon'] }}"></i></div>
                    @endif
                </div>
                <div class="kelas-header" style="background:{{ $kelas['grad'] }};">
                    <div class="kelas-icon-wrap"><i class="bi {{ $kelas['icon'] }}"></i></div>
                    <div class="kelas-name">{{ $kelas['nama'] }}</div>
                </div>
                <div class="kelas-body">
                    @foreach($kelas['fitur'] as $f)
                    <div class="kelas-feature"><i class="bi {{ $f['icon'] }}"></i><span>{{ $f['teks'] }}</span></div>
                    @endforeach
                </div>
                <div class="kelas-footer">
                    <span class="kelas-badge" style="background:{{ $kelas['badge_bg'] }};color:{{ $kelas['badge_c'] }};">{{ $kelas['badge'] }}</span>
                    <a href="https://wa.me/6285292224886?text=Halo,%20saya%20ingin%20info%20{{ urlencode($kelas['nama']) }}" target="_blank" class="kelas-wa-btn"><i class="bi bi-whatsapp"></i> Tanya</a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="kelas-mobile-wrap" style="position:relative;z-index:1;">
            <div class="kelas-pills-scroll" id="kelasPills">
                @foreach($kelasRawat as $i => $kelas)
                <button type="button" class="kelas-pill {{ $i===0?'active':'' }}" data-index="{{ $i }}" style="background:{{ $kelas['grad'] }};">
                    <i class="bi {{ $kelas['icon'] }}"></i>{{ $kelas['nama'] }}
                </button>
                @endforeach
            </div>
            @foreach($kelasRawat as $i => $kelas)
            <div class="kelas-detail-panel" id="kelasPanel{{ $i }}" style="{{ $i!==0?'display:none;':'' }}">
                <div class="kdp-header">
                    <div class="kdp-icon" style="background:{{ $kelas['grad'] }};"><i class="bi {{ $kelas['icon'] }}"></i></div>
                    <div>
                        <div class="kdp-title">{{ $kelas['nama'] }}</div>
                        <span class="kdp-badge" style="background:{{ $kelas['badge_bg'] }};color:{{ $kelas['badge_c'] }};">{{ $kelas['badge'] }}</span>
                    </div>
                </div>
                <div class="kdp-body">
                    @foreach($kelas['fitur'] as $f)
                    <div class="kdp-feature"><i class="bi {{ $f['icon'] }}"></i><span>{{ $f['teks'] }}</span></div>
                    @endforeach
                </div>
                <div class="kdp-footer">
                    <a href="https://wa.me/6285292224886?text=Halo,%20saya%20ingin%20info%20{{ urlencode($kelas['nama']) }}" target="_blank" class="kdp-wa"><i class="bi bi-whatsapp"></i> Tanya via WhatsApp</a>
                </div>
            </div>
            @endforeach
        </div>

        <div style="margin-top:28px;background:#fff;border-radius:16px;border:1px solid #e8edf5;padding:24px 28px;display:flex;align-items:center;gap:16px;flex-wrap:wrap;box-shadow:0 2px 12px rgba(28,20,92,.05);position:relative;z-index:1;">
            <div style="width:44px;height:44px;border-radius:12px;background:#ede9fe;display:flex;align-items:center;justify-content:center;font-size:20px;color:#7c3aed;flex-shrink:0;"><i class="bi bi-info-circle-fill"></i></div>
            <div style="flex:1;"><div style="font-size:14px;font-weight:700;color:#1e293b;margin-bottom:3px;">Informasi Ketersediaan Kamar</div><div style="font-size:13px;color:#64748b;line-height:1.6;">Untuk ketersediaan kamar dan informasi lebih lanjut, silakan hubungi petugas kami.</div></div>
            <div style="display:flex;gap:10px;flex-wrap:wrap;">
                <a href="tel:085292224886" style="display:inline-flex;align-items:center;gap:7px;padding:10px 18px;border-radius:10px;background:#1C145C;color:#fff;font-size:13px;font-weight:700;text-decoration:none;"><i class="bi bi-telephone-fill"></i> Telepon</a>
                <a href="https://wa.me/6285292224886?text=Halo,%20saya%20ingin%20info%20ketersediaan%20kamar%20rawat%20inap" target="_blank" style="display:inline-flex;align-items:center;gap:7px;padding:10px 18px;border-radius:10px;background:#dcfce7;color:#15803d;font-size:13px;font-weight:700;text-decoration:none;border:1px solid #86efac;"><i class="bi bi-whatsapp"></i> WhatsApp</a>
            </div>
        </div>
    </section>

    {{-- AMBULANS --}}
    <section id="ambulans" class="lay-section" style="position:relative;overflow:hidden;">
        <div class="ornamen" style="top:-20px;left:-20px;width:360px;height:360px;opacity:0.04;"></div>
        <div class="sec-divider"></div>
        <div class="svc-card" style="position:relative;z-index:1;">
            <div class="row g-0">
                <div class="col-lg-4">
                    <div class="svc-header h-100" style="background:linear-gradient(135deg,#78350f 0%,#f59e0b 100%);border-radius:20px 0 0 20px;">
                        <div class="svc-header-icon"><i class="bi bi-truck"></i></div>
                        <div class="svc-title">Ambulans 24 Jam</div>
                        <div class="svc-tagline">Respons cepat ke mana pun Anda membutuhkan pertolongan</div>
                        <div style="margin-top:22px;position:relative;z-index:1;">
                            <a href="tel:085292224886" class="svc-badge" style="background:rgba(255,255,255,.2);color:#fff;border:1px solid rgba(255,255,255,.3);"><i class="bi bi-telephone-fill"></i> Hubungi Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="svc-body">
                        <ul class="svc-list" style="display:grid;grid-template-columns:repeat(auto-fit, minmax(280px, 1fr));gap:16px;">
                            <li><strong style="color:#1C145C;">Jam Pelayanan:</strong> Siaga 24 Jam</li>
                            <li><strong style="color:#1C145C;">Lokasi:</strong> Area Parkir Utama RSU</li>
                            <li><strong style="color:#1C145C;">Persyaratan:</strong> Info identitas & lokasi detail pasien</li>
                            <li><strong style="color:#1C145C;">Alur Pelayanan:</strong> Hubungi Telepon/WA &rarr; Konfirmasi Lokasi &rarr; Ambulans Meluncur ke Titik Jemput</li>
                            <li><strong style="color:#1C145C;">Kontak & Penjemputan:</strong> 085290273097</li>
                        </ul>
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-top:16px;">
                            @php $fiturAmb=[['icon'=>'bi-bag-plus-fill','bg'=>'#fee2e2','c'=>'#dc2626','title'=>'Perlengkapan Medis','desc'=>'Oksigen & alat darurat standar'],['icon'=>'bi-person-badge-fill','bg'=>'#d1fae5','c'=>'#059669','title'=>'Tim Terlatih','desc'=>'Pengemudi & nakes bersertifikat']]; @endphp
                            @foreach($fiturAmb as $f)
                            <div style="padding:14px 16px;background:#f8faff;border-radius:12px;border:1px solid #e8edf5;">
                                <div style="display:flex;align-items:center;gap:8px;margin-bottom:6px;">
                                    <div style="width:30px;height:30px;border-radius:8px;background:{{ $f['bg'] }};display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="bi {{ $f['icon'] }}" style="color:{{ $f['c'] }};font-size:14px;"></i></div>
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

    {{-- MCU --}}
    <section id="mcu" class="lay-section" style="position:relative;overflow:hidden;">
        <div class="ornamen" style="top:-20px;left:-20px;width:340px;height:340px;opacity:0.04;"></div>
        <div class="ornamen" style="bottom:-20px;right:-20px;width:300px;height:300px;opacity:0.04;"></div>
        <div class="sec-divider"></div>
        
        <div class="svc-card mb-4" style="position:relative;z-index:1;">
            <div class="svc-header" style="background:linear-gradient(135deg,#134e4a 0%,#0d9488 100%);">
                <div class="svc-header-icon"><i class="bi bi-heart-pulse"></i></div>
                <div class="svc-title">Medical Check Up (MCU)</div>
                <div class="svc-tagline">Deteksi dini untuk hidup lebih sehat dan produktif. Memastikan kondisi tubuh Anda prima dengan berbagai pilihan paket.</div>
            </div>
            <div class="svc-body">
                <ul class="svc-list" style="display:grid;grid-template-columns:repeat(auto-fit, minmax(280px, 1fr));gap:12px;">
                    <li><strong style="color:#1C145C;">Jam Pelayanan:</strong> Sen - Sab (08.00 - 14.00)</li>
                    <li><strong style="color:#1C145C;">Lokasi:</strong> Poliklinik MCU Lantai 1</li>
                    <li><strong style="color:#1C145C;">Persyaratan:</strong> KTP, Puasa (tergantung paket)</li>
                    <li><strong style="color:#1C145C;">Alur Pelayanan:</strong> Pendaftaran &rarr; Pemeriksaan &rarr; Konsultasi Dokter</li>
                    <li><strong style="color:#1C145C;">Kontak & Reservasi:</strong> 085292224886</li>
                </ul>
            </div>
        </div>
        
        <div style="position:relative;z-index:1;">
            <div style="font-size:11px;font-weight:800;color:#64748b;text-transform:uppercase;letter-spacing:.8px;margin-bottom:14px;"><i class="bi bi-list-check" style="margin-right:5px;"></i> Pilihan Paket MCU</div>
            
            <div class="row g-4 mb-3">
                <!-- Paket Pria -->
                <div class="col-lg-4 col-md-6">
                    <div style="border-radius:16px;border:1px solid #bfdbfe;background:linear-gradient(135deg,#eff6ff 0%,#dbeafe 100%);padding:20px;height:100%;">
                        <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
                            <div style="width:42px;height:42px;border-radius:50%;background:#2563eb;color:#fff;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0;"><i class="bi bi-gender-male"></i></div>
                            <div><div style="font-size:13px;font-weight:800;color:#1e40af;">PAKET PRIA</div><div style="font-size:18px;font-weight:900;color:#1d4ed8;line-height:1.1;">Rp 649.000<span style="font-size:11px;font-weight:600;">,-</span></div></div>
                        </div>
                        <div style="display:flex;flex-direction:column;gap:8px;">
                            @foreach(['Darah Lengkap','Golongan Darah','Gula Darah Sewaktu','Rontgen Thorax','HBsAg','Anti HIV','Urine Lengkap'] as $item)
                            <div style="display:flex;align-items:center;gap:8px;font-size:13px;color:#1e40af;"><i class="bi bi-check-circle-fill" style="color:#2563eb;font-size:12px;flex-shrink:0;"></i> {{ $item }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <!-- Paket Wanita -->
                <div class="col-lg-4 col-md-6">
                    <div style="border-radius:16px;border:1px solid #fbcfe8;background:linear-gradient(135deg,#fdf2f8 0%,#fce7f3 100%);padding:20px;height:100%;">
                        <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
                            <div style="width:42px;height:42px;border-radius:50%;background:#db2777;color:#fff;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0;"><i class="bi bi-gender-female"></i></div>
                            <div><div style="font-size:13px;font-weight:800;color:#9d174d;">PAKET WANITA</div><div style="font-size:18px;font-weight:900;color:#be185d;line-height:1.1;">Rp 759.000<span style="font-size:11px;font-weight:600;">,-</span></div></div>
                        </div>
                        <div style="display:flex;flex-direction:column;gap:8px;">
                            @foreach(['Darah Lengkap','Golongan Darah','Gula Darah Sewaktu','Rontgen Thorax','HBsAg','Anti HIV','Urine Lengkap','Cek Sifilis'] as $item)
                            <div style="display:flex;align-items:center;gap:8px;font-size:13px;color:#9d174d;"><i class="bi bi-check-circle-fill" style="color:#db2777;font-size:12px;flex-shrink:0;"></i> {{ $item }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <!-- Paket Karyawan -->
                <div class="col-lg-4 col-md-12">
                    <div style="border-radius:16px;border:1px solid #86efac;background:linear-gradient(135deg,#f0fdf4 0%,#dcfce7 100%);padding:20px;height:100%;">
                        <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
                            <div style="width:42px;height:42px;border-radius:50%;background:#059669;color:#fff;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0;"><i class="bi bi-person-badge-fill"></i></div>
                            <div><div style="font-size:13px;font-weight:800;color:#065f46;">PAKET KARYAWAN</div><div style="font-size:18px;font-weight:900;color:#15803d;line-height:1.1;">Hubungi Kami</div></div>
                        </div>
                        <div style="display:flex;flex-direction:column;gap:8px;">
                            @foreach(['Pemeriksaan Fisik Dokter','Darah Lengkap','Urine Lengkap','Rontgen Thorax','Buta Warna & Visus Mata','Bebas Narkoba'] as $item)
                            <div style="display:flex;align-items:center;gap:8px;font-size:13px;color:#065f46;"><i class="bi bi-check-circle-fill" style="color:#059669;font-size:12px;flex-shrink:0;"></i> {{ $item }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
            <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:14px;">
                <p style="font-size:12px;color:#94a3b8;margin:0;display:flex;align-items:center;gap:6px;"><i class="bi bi-info-circle"></i> Harga & detail paket dapat berubah sewaktu-waktu.</p>
                <a href="https://wa.me/6285292224886?text=Halo,%20saya%20ingin%20info%20paket%20MCU" target="_blank" style="display:inline-flex;align-items:center;gap:6px;padding:8px 18px;border-radius:10px;font-size:13px;font-weight:700;background:#ccfbf1;color:#0d9488;border:1px solid #5eead4;text-decoration:none;"><i class="bi bi-whatsapp"></i> Tanya Info MCU</a>
            </div>
        </div>
    </section>

    {{-- RUANG INTENSIF (ICU/NICU/HCU) --}}
    <section id="intensif" class="lay-section" style="position:relative;overflow:hidden;">
        <div class="sec-divider"></div>
        <div class="row g-4" style="position:relative;z-index:1;">
            <div class="col-lg-12">
                <div class="svc-card">
                    <div class="svc-header" style="background:linear-gradient(135deg,#134e4a 0%,#0d9488 100%);">
                        <div class="svc-header-icon"><i class="bi bi-heart-pulse-fill"></i></div>
                        <div class="svc-title">Perawatan Intensif (HCU/ICU/PICU//NICU)</div>
                        <div class="svc-tagline">Pemantauan medis berkelanjutan untuk pasien kondisi kritis dan bayi baru lahir</div>
                    </div>
                    <div class="svc-body">
                        <ul class="svc-list" style="display:grid;grid-template-columns:repeat(auto-fit, minmax(300px, 1fr));gap:16px;">
                            <li><strong style="color:#1C145C;">Jam Pelayanan:</strong> Buka 24 Jam</li>
                            <li><strong style="color:#1C145C;">Lokasi:</strong> Gedung Utama Lantai 1</li>
                            <li><strong style="color:#1C145C;">Persyaratan:</strong> KTP/KK, BPJS (jika ada), Surat Pengantar/Rujukan Dokter, Persetujuan Tindakan Medis (Informed Consent)</li>
                            <li><strong style="color:#1C145C;">Alur Pelayanan:</strong> Rekomendasi Dokter IGD/Poli/Inap &rarr; Persetujuan Keluarga &rarr; Observasi Intensif &rarr; Pemindahan ke Rawat Inap Reguler jika stabil</li>
                            <li><strong style="color:#1C145C;">Kontak & Informasi:</strong> 085292224886 (WhatsApp/Telepon)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- RUANG BERSALIN (VK) --}}
    <section id="vk" class="lay-section" style="position:relative;overflow:hidden;">
        <div class="sec-divider"></div>
        <div class="row g-4" style="position:relative;z-index:1;">
            <div class="col-lg-12">
                <div class="svc-card">
                    <div class="svc-header" style="background:linear-gradient(135deg,#831843 0%,#ec4899 100%);">
                        <div class="svc-header-icon"><i class="bi bi-gender-female"></i></div>
                        <div class="svc-title">Ruang Bersalin (VK)</div>
                        <div class="svc-tagline">Fasilitas persalinan yang nyaman, aman, dan ditangani oleh bidan serta dokter spesialis kandungan</div>
                    </div>
                    <div class="svc-body">
                        <ul class="svc-list" style="display:grid;grid-template-columns:repeat(auto-fit, minmax(300px, 1fr));gap:16px;">
                            <li><strong style="color:#1C145C;">Jam Pelayanan:</strong> Buka 24 Jam</li>
                            <li><strong style="color:#1C145C;">Lokasi:</strong> Gedung Utama Lantai 1</li>
                            <li><strong style="color:#1C145C;">Persyaratan:</strong> KTP Ibu & Suami, KK, Buku KIA, Kartu BPJS (jika menggunakan BPJS)</li>
                            <li><strong style="color:#1C145C;">Alur Pelayanan:</strong> Pendaftaran/IGD &rarr; Pemeriksaan Awal Bidan &rarr; Proses Persalinan (Normal/SC) &rarr; Ruang Nifas / Rawat Inap</li>
                            <li><strong style="color:#1C145C;">Kontak & Informasi:</strong> 085292224886 (WhatsApp/Telepon)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- INSTALASI BEDAH SENTRAL (IBS) --}}
    <section id="ibs" class="lay-section" style="position:relative;overflow:hidden;">
        <div class="sec-divider"></div>
        <div class="row g-4" style="position:relative;z-index:1;">
            <div class="col-lg-12">
                <div class="svc-card">
                    <div class="svc-header" style="background:linear-gradient(135deg,#1e3a6e 0%,#2563eb 100%);">
                        <div class="svc-header-icon"><i class="bi bi-scissors"></i></div>
                        <div class="svc-title">Instalasi Bedah Sentral (IBS)</div>
                        <div class="svc-tagline">Layanan operasi elektif dan cito (darurat) dengan standar keamanan tinggi</div>
                    </div>
                    <div class="svc-body">
                        <ul class="svc-list" style="display:grid;grid-template-columns:repeat(auto-fit, minmax(300px, 1fr));gap:16px;">
                            <li><strong style="color:#1C145C;">Jam Pelayanan:</strong> 24 Jam (Operasi Darurat) / Terjadwal (Operasi Elektif)</li>
                            <li><strong style="color:#1C145C;">Lokasi:</strong> Gedung Utama Lantai 1</li>
                            <li><strong style="color:#1C145C;">Persyaratan:</strong> Rujukan Dokter, Hasil Lab/Radiologi, Puasa (Sesuai Instruksi), Surat Persetujuan Operasi</li>
                            <li><strong style="color:#1C145C;">Alur Pelayanan:</strong> Penjadwalan dari Poli/IGD/Inap &rarr; Ruang Persiapan (Pre-op) &rarr; Ruang Operasi &rarr; Ruang Pemulihan (Recovery Room) &rarr; Rawat Inap</li>
                            <li><strong style="color:#1C145C;">Kontak & Informasi:</strong> 085292224886 (WhatsApp/Telepon)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ========================== PENUNJANG MEDIS ========================== --}}
    <section id="penunjang" class="lay-section" style="position:relative;overflow:hidden;">
        <div class="ornamen" style="top:-20px;right:-20px;width:360px;height:360px;opacity:0.04;"></div>
        <div class="sec-divider"></div>
        <div style="margin-bottom:28px;position:relative;z-index:1;">
            <div class="sec-label" style="background:#ede9fe;color:#7c3aed;"><i class="bi bi-eyedropper"></i> Diagnostik & Obat</div>
            <div class="sec-title">Penunjang Medis</div>
            <div class="sec-sub">Fasilitas diagnostik modern, penyediaan obat-obatan lengkap, dan layanan pemulihan gerak.</div>
        </div>
        
        <!-- LABORATORIUM & RADIOLOGI (BARIS 1) -->
        <div class="row g-4 mb-4" style="position:relative;z-index:1;">
            
            <div class="col-lg-6">
                <!-- LABORATORIUM -->
                <div class="svc-card h-100 d-flex flex-column">
                    <div class="svc-header" style="background:linear-gradient(135deg,#064e3b 0%,#059669 100%);">
                        <div class="svc-header-icon"><i class="bi bi-eyedropper"></i></div>
                        <div class="svc-title">Laboratorium</div>
                        <div class="svc-tagline">Pemeriksaan akurat dengan teknologi modern, buka 24 jam termasuk hari libur</div>
                    </div>
                    <div class="svc-body flex-grow-1">
                        <p class="svc-desc">Laboratorium RSU Allam Medica dilengkapi peralatan diagnostik modern untuk berbagai jenis pemeriksaan.</p>
                        <ul class="svc-list">
                            <li><strong style="color:#1C145C;">Jam Pelayanan:</strong> 24 Jam Setiap Hari</li>
                            <li><strong style="color:#1C145C;">Lokasi:</strong> Gedung utama lantai 1</li>
                            <li><strong style="color:#1C145C;">Persyaratan:</strong> Pengantar Dokter/Identitas (Mandiri)</li>
                            <li><strong style="color:#1C145C;">Alur Pelayanan:</strong> Pendaftaran &rarr; Pengambilan Sampel &rarr; Analisis &rarr; Hasil Diterima</li>
                            <li><strong style="color:#1C145C;">Kontak & Informasi:</strong> 082328642154</li>
                        </ul>
                        <div style="margin-top:20px;border-top:1px solid #e8edf5;padding-top:16px;">
                            <div style="font-size:11px;font-weight:800;color:#64748b;text-transform:uppercase;letter-spacing:.8px;margin-bottom:14px;"><i class="bi bi-flask" style="margin-right:4px;"></i> Pemeriksaan Tambahan</div>
                            <div style="display:grid;grid-template-columns:1fr 1fr;gap:9px;">
                                @php $labExtra=[['icon'=>'bi-droplet-fill','bg'=>'#fee2e2','c'=>'#dc2626','nama'=>'Hemostasis'],['icon'=>'bi-virus','bg'=>'#ede9fe','c'=>'#7c3aed','nama'=>'Virologi'],['icon'=>'bi-activity','bg'=>'#d1fae5','c'=>'#059669','nama'=>'Enzim Jantung'],['icon'=>'bi-gender-ambiguous','bg'=>'#fce7f3','c'=>'#db2777','nama'=>'Hormon'],['icon'=>'bi-bug','bg'=>'#fef3c7','c'=>'#d97706','nama'=>'Mikrobiologi'],['icon'=>'bi-search-heart','bg'=>'#e0f2fe','c'=>'#0284c7','nama'=>'Tumor Marker']]; @endphp
                                @foreach($labExtra as $ex)
                                <div style="display:flex;align-items:center;gap:9px;padding:9px 11px;background:#f8faff;border-radius:9px;border:1px solid #e8edf5;">
                                    <div style="width:28px;height:28px;border-radius:7px;background:{{ $ex['bg'] }};display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="bi {{ $ex['icon'] }}" style="color:{{ $ex['c'] }};font-size:12px;"></i></div>
                                    <span style="font-size:12.5px;font-weight:600;color:#1e293b;">{{ $ex['nama'] }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <!-- RADIOLOGI -->
                <div class="svc-card h-100 d-flex flex-column">
                    <div class="svc-header" style="background:linear-gradient(135deg,#1e1b4b 0%,#6366f1 100%);">
                        <div class="svc-header-icon"><i class="bi bi-radioactive"></i></div>
                        <div class="svc-title">Radiologi</div>
                        <div class="svc-tagline">Diagnostik pencitraan dengan peralatan modern dan akurasi tinggi</div>
                    </div>
                    <div class="svc-body flex-grow-1">
                        <ul class="svc-list" style="margin-bottom:20px;">
                            <li><strong style="color:#1C145C;">Jam Pelayanan:</strong> Buka 24 Jam</li>
                            <li><strong style="color:#1C145C;">Lokasi:</strong> Gedung utama lantai 1</li>
                            <li><strong style="color:#1C145C;">Persyaratan:</strong> Pengantar Dokter & Persiapan Khusus (jika ada)</li>
                            <li><strong style="color:#1C145C;">Alur Pelayanan:</strong> Pendaftaran &rarr; Persiapan &rarr; Tindakan &rarr; Hasil</li>
                            <li><strong style="color:#1C145C;">Kontak & Informasi:</strong> 085640782510</li>
                        </ul>
                        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-top:auto;">
                            @php 
                            $radLayanan=[
                                ['icon'=>'bi-radioactive','bg'=>'#ede9fe','c'=>'#6366f1','nama'=>'Rontgen / X-Ray'],
                                ['icon'=>'bi-soundwave','bg'=>'#e0f2fe','c'=>'#0284c7','nama'=>'USG'],
                                ['icon'=>'bi-bullseye','bg'=>'#fee2e2','c'=>'#dc2626','nama'=>'CT Scan','status'=>'coming_soon'],
                                ['icon'=>'bi-heart-pulse','bg'=>'#d1fae5','c'=>'#059669','nama'=>'EKG / EEG'],
                                ['icon'=>'bi-reception-4','bg'=>'#fef3c7','c'=>'#d97706','nama'=>'Echo'],
                                ['icon'=>'bi-lungs','bg'=>'#fce7f3','c'=>'#db2777','nama'=>'Foto Thorax'],
                            ]; 
                            @endphp
                            @foreach($radLayanan as $r)
                            @php $isComingSoon = ($r['status'] ?? null) === 'coming_soon'; @endphp
                            <div style="position:relative;text-align:center;padding:16px 8px;background:#f8faff;border-radius:12px;border:1px solid #e8edf5;transition:transform .2s,border-color .2s;{{ $isComingSoon ? 'opacity:.6;' : '' }}"
                                 @if(!$isComingSoon)
                                 onmouseover="this.style.transform='translateY(-3px)';this.style.borderColor='#c7d2fe';" onmouseout="this.style.transform='';this.style.borderColor='#e8edf5';"
                                 @endif>
                                @if($isComingSoon)
                                <span style="position:absolute;top:-8px;right:-6px;background:#1C145C;color:#FEFCF1;font-size:9px;font-weight:700;padding:2px 7px;border-radius:999px;text-transform:uppercase;letter-spacing:.3px;white-space:nowrap;">Segera</span>
                                @endif
                                <div style="width:36px;height:36px;border-radius:10px;background:{{ $r['bg'] }};display:flex;align-items:center;justify-content:center;margin:0 auto 8px;"><i class="bi {{ $r['icon'] }}" style="color:{{ $r['c'] }};font-size:16px;"></i></div>
                                <div style="font-size:12.5px;font-weight:700;color:#1e293b;">{{ $r['nama'] }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- FARMASI & REHAB (BARIS 2) -->
        <div class="row g-4" style="position:relative;z-index:1;">

            <div class="col-lg-6">
                <!-- FARMASI -->
                <div class="svc-card h-100 d-flex flex-column">
                    <div class="svc-header" style="background:linear-gradient(135deg,#831843 0%,#ec4899 100%);">
                        <div class="svc-header-icon"><i class="bi bi-capsule"></i></div>
                        <div class="svc-title">Farmasi / Apotek</div>
                        <div class="svc-tagline">Obat-obatan lengkap berkualitas, buka 24 jam setiap hari termasuk hari libur</div>
                    </div>
                    <div class="svc-body flex-grow-1">
                        <ul class="svc-list">
                            <li><strong style="color:#1C145C;">Jam Pelayanan:</strong> 24 Jam Setiap Hari</li>
                            <li><strong style="color:#1C145C;">Lokasi:</strong> Dekat Lobi Utama Poliklinik</li>
                            <li><strong style="color:#1C145C;">Persyaratan:</strong> Resep Dokter (Asli)</li>
                            <li><strong style="color:#1C145C;">Alur Pelayanan:</strong> Serahkan Resep &rarr; Penyiapan &rarr; Panggilan & Edukasi Obat</li>
                            <li><strong style="color:#1C145C;">Kontak & Informasi:</strong> 085292224886</li>
                        </ul>
                        <div style="margin-top:20px;border-top:1px solid #e8edf5;padding-top:16px;">
                            <div style="font-size:11px;font-weight:800;color:#64748b;text-transform:uppercase;letter-spacing:.8px;margin-bottom:14px;"><i class="bi bi-capsule" style="margin-right:5px;color:#db2777;"></i> Layanan Kami</div>
                            <div style="display:flex;flex-direction:column;gap:12px;">
                                @php $infoFar=[['icon'=>'bi-prescription','bg'=>'#fce7f3','c'=>'#db2777','title'=>'Resep Dokter RS','desc'=>'Resep dari dokter RSU Allam Medica diproses dengan cepat dan diprioritaskan.'],['icon'=>'bi-patch-check-fill','bg'=>'#d1fae5','c'=>'#059669','title'=>'Jaminan Kualitas','desc'=>'Semua obat bersumber dari distributor resmi dan tersimpan sesuai standar farmasi.'],['icon'=>'bi-person-lines-fill','bg'=>'#fef3c7','c'=>'#d97706','title'=>'Konsultasi Apoteker','desc'=>'Apoteker siap memberikan informasi mengenai obat, dosis, dan interaksi obat.']]; @endphp
                                @foreach($infoFar as $f)
                                <div style="display:flex;align-items:flex-start;gap:12px;padding:14px 16px;background:#f8faff;border-radius:12px;border:1px solid #e8edf5;">
                                    <div style="width:36px;height:36px;border-radius:10px;background:{{ $f['bg'] }};display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="bi {{ $f['icon'] }}" style="color:{{ $f['c'] }};font-size:16px;"></i></div>
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
            </div>

            <div class="col-lg-6">
                <!-- REHABILITASI MEDIK -->
                <div class="svc-card h-100 d-flex flex-column">
                    <div class="svc-header" style="background:linear-gradient(135deg,#1e4d3a 0%,#059669 100%);">
                        <div class="svc-header-icon"><i class="bi bi-person-wheelchair"></i></div>
                        <div class="svc-title">Rehabilitasi Medik (Fisioterapi)</div>
                        <div class="svc-tagline">Pemulihan fungsi gerak dan tubuh paska cedera, operasi, atau gangguan syaraf</div>
                    </div>
                    <div class="svc-body flex-grow-1">
                        <ul class="svc-list">
                            <li><strong style="color:#1C145C;">Jam Pelayanan:</strong> Senin - Sabtu (08.00 - 14.00 WIB)</li>
                            <li><strong style="color:#1C145C;">Lokasi:</strong> Gedung utama lantai 1</li>
                            <li><strong style="color:#1C145C;">Persyaratan:</strong> KTP, BPJS, Surat Rujukan/Pengantar dari Dokter Spesialis (Ortopedi/Saraf/Penyakit Dalam)</li>
                            <li><strong style="color:#1C145C;">Alur Pelayanan:</strong> Pendaftaran Poli &rarr; Asesmen Dokter Rehab Medik &rarr; Penjadwalan Terapi &rarr; Pelaksanaan Fisioterapi</li>
                            <li><strong style="color:#1C145C;">Kontak & Informasi:</strong> 085292224886 (WhatsApp/Telepon)</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- ========================== HOME SERVICE TERPADU ========================== --}}
    <section id="homeservice" class="lay-section" style="position:relative;overflow:hidden;padding-bottom:80px;">
        <div class="sec-divider"></div>
        <div style="margin-bottom:28px;position:relative;z-index:1;">
            <div class="sec-label" style="background:#dcfce7;color:#15803d;"><i class="bi bi-house-heart-fill"></i> Praktis & Nyaman</div>
            <div class="sec-title">Home Service Terpadu</div>
            <div class="sec-sub">Layanan medis, keperawatan, laboratorium, dan fisioterapi yang hadir langsung di rumah Anda.</div>
        </div>
        
        <div style="background:linear-gradient(135deg,#f0fdf4 0%,#ecfdf5 100%);border:1.5px solid #86efac;border-radius:24px;padding:36px;position:relative;overflow:hidden;box-shadow:0 8px 30px rgba(16,185,129,.1);">
            <i class="bi bi-house-heart" style="position:absolute;right:-20px;bottom:-30px;font-size:220px;color:rgba(16,185,129,0.06);line-height:1;pointer-events:none;"></i>
            
            <div class="row g-4 align-items-center" style="position:relative;z-index:1;">
                <div class="col-lg-7">
                    <div style="display:flex;align-items:center;gap:16px;margin-bottom:20px;">
                        <div style="width:60px;height:60px;border-radius:16px;background:linear-gradient(135deg,#059669,#10b981);display:flex;align-items:center;justify-content:center;font-size:28px;color:#fff;flex-shrink:0;box-shadow:0 8px 20px rgba(16,185,129,.3);"><i class="bi bi-house-heart-fill"></i></div>
                        <div>
                            <div style="font-family:'DM Serif Display',serif;font-size:28px;color:#065f46;line-height:1.2;">Home Service RS Allam Medica</div>
                            <div style="font-size:14px;font-weight:700;color:#059669;">Rumah Sakit Hadir di Rumah Anda</div>
                        </div>
                    </div>
                    <p style="font-size:15px;color:#15803d;line-height:1.8;margin-bottom:28px;">
                        Tidak perlu antre atau menempuh perjalanan saat Anda sedang butuh istirahat. Tim medis profesional kami siap datang ke lokasi Anda. Mulai dari pemeriksaan dokter, perawatan luka, hingga tes laboratorium dengan standar kualitas rumah sakit yang tetap terjaga.
                    </p>
                    <div style="display:flex;gap:12px;flex-wrap:wrap;">
                        <a href="https://wa.me/6285292224886?text=Halo,%20saya%20ingin%20memesan%20layanan%20Home%20Service%20(Dokter/Perawat/Lab/Fisioterapi)" target="_blank" style="display:inline-flex;align-items:center;gap:8px;padding:12px 26px;border-radius:12px;background:#059669;color:#fff;font-size:14.5px;font-weight:700;text-decoration:none;box-shadow:0 6px 16px rgba(5,150,105,.25);transition:.2s;"><i class="bi bi-whatsapp"></i> Pesan Home Service</a>
                    </div>
                </div>
                
                <div class="col-lg-5">
                    <div style="background:rgba(255,255,255,0.7);backdrop-filter:blur(12px);border-radius:20px;padding:24px;border:1px solid rgba(16,185,129,0.25);">
                        <div style="font-size:12px;font-weight:800;color:#065f46;text-transform:uppercase;letter-spacing:1px;margin-bottom:16px;">Cakupan Layanan Home Service:</div>
                        
                        <div style="display:flex;flex-direction:column;gap:12px;">
                            <div style="display:flex;align-items:flex-start;gap:12px;">
                                <div style="width:28px;height:28px;border-radius:8px;background:#d1fae5;color:#059669;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="bi bi-person-fill-check"></i></div>
                                <div><div style="font-size:14px;font-weight:700;color:#065f46;">Kunjungan Dokter</div><div style="font-size:12px;color:#15803d;">Pemeriksaan umum & konsultasi di rumah.</div></div>
                            </div>
                            <div style="display:flex;align-items:flex-start;gap:12px;">
                                <div style="width:28px;height:28px;border-radius:8px;background:#d1fae5;color:#059669;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="bi bi-bandaid"></i></div>
                                <div><div style="font-size:14px;font-weight:700;color:#065f46;">Home Care Perawat / Bidan</div><div style="font-size:12px;color:#15803d;">Perawatan luka pasca operasi, cek tensi, dll.</div></div>
                            </div>
                            <div style="display:flex;align-items:flex-start;gap:12px;">
                                <div style="width:28px;height:28px;border-radius:8px;background:#d1fae5;color:#059669;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="bi bi-eyedropper"></i></div>
                                <div><div style="font-size:14px;font-weight:700;color:#065f46;">Pengambilan Sampel Laborat</div><div style="font-size:12px;color:#15803d;">Cek darah & urine tanpa harus ke RS.</div></div>
                            </div>
                            <div style="display:flex;align-items:flex-start;gap:12px;">
                                <div style="width:28px;height:28px;border-radius:8px;background:#d1fae5;color:#059669;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="bi bi-person-wheelchair"></i></div>
                                <div><div style="font-size:14px;font-weight:700;color:#065f46;">Fisioterapi di Rumah</div><div style="font-size:12px;color:#15803d;">Terapi gerak pasca cedera & stroke.</div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
</div>
@endunless

{{-- FOOTER --}}
<style>
.footer-rsu{background:linear-gradient(to bottom,#ffffff 0%,#fefefd 3%,#fdfcf6 8%,#fcfbf3 13%,#faf8ee 20%,#f7f5e8 30%,#f3f0e1 45%,#ede9d9 65%,#e8e3d2 85%,#e3deca 100%);color:#1C145C;padding:56px 0 0;position:relative;overflow:hidden;}
.footer-rsu .footer-ornament{position:absolute;right:-80px;bottom:-150px;width:420px;height:420px;opacity:.07;background-image:url('{{ asset("images/beranda/ornamen.png") }}');background-size:contain;background-repeat:no-repeat;background-position:center;pointer-events:none;z-index:0;}
.footer-rsu .container-fluid{max-width:1550px;position:relative;z-index:1;}
.footer-rsu .row{--bs-gutter-x:3.5rem;}
.footer-rsu .footer-logo{height:40px;width:auto;display:block;margin-bottom:14px;}
.footer-rsu .footer-title{font-size:16px;font-weight:700;color:#1C145C;margin-bottom:8px;}
.footer-rsu .footer-desc{font-size:13px;line-height:1.8;color:#5a5480;margin-bottom:20px;max-width:340px;}
.footer-rsu .footer-social{display:flex;gap:10px;margin-bottom:22px;}
.footer-rsu .footer-social a{width:36px;height:36px;border-radius:50%;background:rgba(28,20,92,.07);border:1px solid rgba(28,20,92,.15);display:flex;align-items:center;justify-content:center;color:#1C145C;text-decoration:none;font-size:15px;transition:.25s;}
.footer-rsu .footer-social a:hover{background:#1C145C;color:#fff;transform:translateY(-2px);}
.footer-rsu .footer-mitra-label{font-size:11px;color:#9994bb;text-transform:uppercase;letter-spacing:.08em;margin-bottom:10px;}
.footer-rsu .footer-mitra{display:flex;gap:10px;align-items:center;flex-wrap:wrap;}
.footer-rsu .footer-mitra img:nth-child(1){height:33px;}
.footer-rsu .footer-mitra img:nth-child(2){height:23px;}
.footer-rsu .footer-heading{font-weight:900;font-size:12px;color:#1C145C;text-transform:uppercase;letter-spacing:.14em;margin-bottom:18px;padding-bottom:10px;border-bottom:1.5px solid rgba(28,20,92,.12);white-space:nowrap;}
.footer-rsu ul{list-style:none;padding:0;margin:0;}
.footer-rsu ul li{margin-bottom:10px;}
.footer-rsu a{color:#5a5480;text-decoration:none;font-size:13.5px;transition:.2s;display:inline-flex;align-items:center;gap:5px;}
.footer-rsu ul li a::before{content:'›';color:#1C145C;opacity:.4;font-size:15px;}
.footer-rsu a:hover{color:#1C145C;padding-left:3px;}
.footer-rsu .footer-contact-row{display:flex;align-items:flex-start;gap:11px;margin-bottom:16px;}
.footer-rsu .footer-contact-icon{width:34px;height:34px;border-radius:8px;background:rgba(28,20,92,.07);border:1px solid rgba(28,20,92,.1);display:flex;align-items:center;justify-content:center;color:#1C145C;flex-shrink:0;}
.footer-rsu .footer-contact-text{font-size:13px;color:#5a5480;line-height:1.7;word-break:normal;}
.footer-rsu hr{height:1px;background:linear-gradient(90deg,rgba(28,20,92,0) 0%,rgba(28,20,92,.12) 30%,rgba(28,20,92,.12) 70%,rgba(28,20,92,0) 100%);border:none;margin:36px 0 0;}
.footer-rsu .footer-bottom{background:rgba(28,20,92,.05);padding:15px 36px;}
.footer-rsu .footer-copy{font-size:12.5px;color:#9994bb;display:flex;justify-content:space-between;align-items:center;gap:12px;}
.footer-rsu .footer-copy-badge{background:rgba(28,20,92,.06);border:1px solid rgba(28,20,92,.12);border-radius:20px;padding:4px 14px;font-size:11.5px;color:#7a74a0;white-space:nowrap;}
.footer-rsu .footer-accent-dot{display:inline-block;width:3px;height:3px;border-radius:50%;background:#1C145C;opacity:.25;margin:0 8px;}
@media(max-width:991px){.footer-rsu{padding:45px 0 0;}.footer-rsu .row>div{margin-bottom:24px;}}
@media(max-width:768px){.footer-rsu{padding:40px 0 0;}.footer-rsu .container-fluid{padding-left:20px!important;padding-right:20px!important;}.footer-rsu .footer-copy{flex-direction:column;align-items:flex-start;gap:8px;}.footer-rsu .footer-bottom{padding:15px 20px;}.footer-rsu a:hover{padding-left:0;}}
</style>
<footer class="footer-rsu">
    <div class="footer-ornament"></div>
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
                    <li><a href="{{ url('/faq') }}">FAQ</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <h6 class="footer-heading">Layanan Medis</h6>
                <ul>
                    <li><a href="{{ url('/layanan#igd') }}">IGD 24 Jam</a></li>
                    <li><a href="{{ url('/layanan#rawatjalan') }}">Rawat Jalan</a></li>
                    <li><a href="{{ url('/layanan#rawatinap') }}">Rawat Inap</a></li>
                    <li><a href="{{ url('/layanan#ambulans') }}">Ambulans</a></li>
                    <li><a href="{{ url('/layanan#mcu') }}">Medical Check Up</a></li>
                    <li><a href="{{ url('/layanan#intensif') }}">HCU/ICU/PICU//NICU</a></li>
                    <li><a href="{{ url('/layanan#vk') }}">Ruang Bersalin (VK)</a></li>
                    <li><a href="{{ url('/layanan#ibs') }}">Bedah Sentral (IBS)</a></li>
                    <li><a href="{{ url('/layanan#penunjang') }}">Penunjang Medis</a></li>
                    <li><a href="{{ url('/layanan#homeservice') }}">Home Service</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <h6 class="footer-heading">Menu Lainnya</h6>
                <ul>
                    <li><a href="{{ url('/karir') }}">Karir</a></li>
                    <li><a href="{{ url('/berita') }}">Berita</a></li>
                    <li><a href="{{ url('/video') }}">Video</a></li>
                    <li><a href="{{ url('/galeri') }}">Galeri</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-12">
                <h6 class="footer-heading">Hubungi Kami</h6>
                <div class="footer-contact-row"><div class="footer-contact-icon"><i class="bi bi-telephone-fill"></i></div><div class="footer-contact-text">(0289) 430822</div></div>
                <div class="footer-contact-row"><div class="footer-contact-icon"><i class="bi bi-envelope-fill"></i></div><div class="footer-contact-text">allam.medica@yahoo.co.id</div></div>
                <div class="footer-contact-row"><div class="footer-contact-icon"><i class="bi bi-clock-fill"></i></div><div class="footer-contact-text">IGD, Lab & Farmasi : 24 Jam<br>Rawat Jalan : Sen – Sab 07.00 – 21.00</div></div>
                <div class="footer-contact-row"><div class="footer-contact-icon"><i class="bi bi-geo-alt-fill"></i></div><div class="footer-contact-text">Jl. Pangeran Diponegoro No. 609,<br>Bumiayu, Brebes</div></div>
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
document.addEventListener('DOMContentLoaded', function () {
    const burger   = document.getElementById('navBurger');
    const drawer   = document.getElementById('navDrawer');
    const overlay  = document.getElementById('navOverlay');
    const closeBtn = document.getElementById('drawerClose');
    const navbar   = document.getElementById('mainNavbar');

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

    window.addEventListener('scroll', () => navbar.classList.toggle('scrolled', window.scrollY > 10), { passive: true });

    const kontakWrap = document.getElementById('kontakWrap');
    const kontakMega = document.getElementById('kontakMega');
    let megaTimer;
    if (kontakWrap && kontakMega) {
        kontakWrap.addEventListener('mouseenter', () => { clearTimeout(megaTimer); kontakMega.classList.add('open'); });
        kontakWrap.addEventListener('mouseleave', () => { megaTimer = setTimeout(() => kontakMega.classList.remove('open'), 120); });
        kontakMega.addEventListener('mouseenter', () => clearTimeout(megaTimer));
        kontakMega.addEventListener('mouseleave', () => { megaTimer = setTimeout(() => kontakMega.classList.remove('open'), 120); });
        document.getElementById('btnKontakDesktop').addEventListener('click', function(e) { e.stopPropagation(); kontakMega.classList.toggle('open'); });
        document.addEventListener('click', function(e) { if (!kontakWrap.contains(e.target)) kontakMega.classList.remove('open'); });
    }

    const bsSheet    = document.getElementById('bsSheet');
    const bsOverlay  = document.getElementById('bsOverlay');
    const bsClose    = document.getElementById('bsClose');
    const btnMobile  = document.getElementById('btnKontakMobile');
    function bsOpen()  { return bsSheet && bsSheet.classList.contains('open'); }
    function openBs()  { if(bsSheet) { bsSheet.classList.add('open');bsOverlay.classList.add('show');document.body.style.overflow='hidden';closeDrawer(); } }
    function closeBs() { if(bsSheet) { bsSheet.classList.remove('open');bsOverlay.classList.remove('show');document.body.style.overflow=''; } }
    if(btnMobile) btnMobile.addEventListener('click', openBs);
    if(bsClose) bsClose.addEventListener('click', closeBs);
    if(bsOverlay) bsOverlay.addEventListener('click', closeBs);
    if(bsSheet) {
        let startY = 0;
        bsSheet.addEventListener('touchstart', e => { startY = e.touches[0].clientY; }, { passive: true });
        bsSheet.addEventListener('touchend',   e => { if (e.changedTouches[0].clientY - startY > 80) closeBs(); }, { passive: true });
    }

    var pillsWrap = document.getElementById('kelasPills');
    if (pillsWrap) {
        pillsWrap.addEventListener('click', function (e) {
            var btn = e.target.closest('.kelas-pill');
            if (!btn) return;
            var index = parseInt(btn.getAttribute('data-index'), 10);
            
            document.querySelectorAll('[id^="kelasPanel"]').forEach(function (el, i) {
                el.style.display = (i === index) ? 'block' : 'none';
            });
            
            var pills = document.querySelectorAll('.kelas-pill');
            pills.forEach(function (el, i) {
                el.classList.toggle('active', i === index);
            });
            
            var container = document.getElementById('kelasPills');
            var activePill = pills[index];
            if (activePill && container) {
                var targetLeft = activePill.offsetLeft - (container.clientWidth / 2) + (activePill.clientWidth / 2);
                var maxScroll = container.scrollWidth - container.clientWidth;
                if (targetLeft < 0) targetLeft = 0;
                if (targetLeft > maxScroll) targetLeft = maxScroll;
                container.scrollTo({ left: targetLeft, behavior: 'smooth' });
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const cards  = document.querySelectorAll('#poliGrid .poli-card');
    const statEl = document.getElementById('statPoli');
    const cntEl  = document.getElementById('poliCount');
    if (statEl) statEl.textContent = cards.length || '—';
    if (cntEl)  cntEl.textContent  = cards.length || '—';
});

function filterPoliDesktop() {
    const q   = (document.getElementById('searchPoliDesktop').value || '').toLowerCase().trim();
    const sta = document.getElementById('filterPoliStatusDesktop').value;
    let visible = 0;
    document.querySelectorAll('#poliGrid .poli-card').forEach(function (c) {
        const show = (!q || (c.dataset.nama||'').includes(q)) && (!sta || c.dataset.status === sta);
        c.style.display = show ? '' : 'none';
        if (show) visible++;
    });
    const empty = document.querySelector('#poliGrid .poli-empty');
    if (empty) empty.style.display = (visible === 0) ? 'block' : 'none';
}

function filterPoliMobile() {
    const q   = (document.getElementById('searchPoliMobile').value || '').toLowerCase().trim();
    const sta = document.getElementById('filterPoliStatusMobile') ? document.getElementById('filterPoliStatusMobile').value : '';
    let visible = 0;
    document.querySelectorAll('#poliMobileList .poli-mobile-item').forEach(function (el) {
        const show = (!q || (el.dataset.nama||'').includes(q)) && (!sta || el.dataset.status === sta);
        el.style.display = show ? 'flex' : 'none';
        if (show) visible++;
    });
    const emptyEl = document.getElementById('poliMobileEmpty');
    if (emptyEl) emptyEl.style.display = (visible === 0) ? 'block' : 'none';
    const listEl = document.getElementById('poliMobileList');
    if (listEl) listEl.style.display = visible > 0 ? 'flex' : 'none';
}

function smoothTo(id) {
    const el = document.getElementById(id);
    if (!el) return;
    const top = el.getBoundingClientRect().top + window.scrollY - 95;
    window.scrollTo({ top: top, behavior: 'smooth' });
}

(function () {
    const sections = ['igd','rawatjalan','rawatinap','ambulans','mcu','intensif','vk','ibs','penunjang','homeservice'];
    const tabs = Array.from(document.querySelectorAll('.lay-tab'));
    const tabStrip = document.getElementById('layananTabs');
    const prevBtn = document.querySelector('.lay-nav-btn-prev');
    const nextBtn = document.querySelector('.lay-nav-btn-next');

    function updateNavButtons() {
        if (!tabStrip || !prevBtn || !nextBtn) return;
        const maxScroll = tabStrip.scrollWidth - tabStrip.clientWidth;
        const atStart = tabStrip.scrollLeft <= 2;
        const atEnd = tabStrip.scrollLeft >= maxScroll - 2;
        prevBtn.disabled = atStart;
        nextBtn.disabled = atEnd;
        prevBtn.classList.toggle('is-active', !atStart);
        nextBtn.classList.toggle('is-active', !atEnd);
    }

    function updateTab() {
        let current = 'igd';
        const offset = window.innerWidth < 992 ? 120 : 160;
        sections.forEach(function (id) {
            const el = document.getElementById(id);
            if (el && el.getBoundingClientRect().top <= offset) current = id;
        });
        tabs.forEach(function (tab) { tab.classList.toggle('active', tab.dataset.section === current); });
        updateNavButtons();
    }

    function scrollTabsBy(delta) {
        if (!tabStrip) return;
        tabStrip.scrollBy({ left: delta, behavior: 'smooth' });
        setTimeout(updateNavButtons, 220);
    }

    if (prevBtn) prevBtn.addEventListener('click', function (e) { e.preventDefault(); scrollTabsBy(-220); });
    if (nextBtn) nextBtn.addEventListener('click', function (e) { e.preventDefault(); scrollTabsBy(220); });
    if (tabStrip) {
        tabStrip.addEventListener('scroll', updateNavButtons, { passive: true });
        window.addEventListener('resize', updateNavButtons, { passive: true });
    }

    window.addEventListener('scroll', updateTab, { passive: true });
    tabs.forEach(function (tab) {
        tab.addEventListener('click', function (e) {
            e.preventDefault();
            smoothTo(tab.dataset.section);
            tabs.forEach(function (item) { item.classList.remove('active'); });
            tab.classList.add('active');
            setTimeout(updateTab, 350);
        });
    });

    updateTab();
    updateNavButtons();
})();

function copyLink() {
    const btn = document.getElementById('copyBtn');
    if (!btn) return;
    navigator.clipboard.writeText(window.location.href).then(function () {
        btn.classList.add('copied'); btn.innerHTML = '<i class="bi bi-check-lg"></i> Tersalin!';
        setTimeout(function () { btn.classList.remove('copied'); btn.innerHTML = '<i class="bi bi-link-45deg"></i> Salin Link'; }, 2500);
    }).catch(function () {
        const ta = document.createElement('textarea');
        ta.value = window.location.href;
        document.body.appendChild(ta); ta.select(); document.execCommand('copy'); document.body.removeChild(ta);
        btn.classList.add('copied'); btn.innerHTML = '<i class="bi bi-check-lg"></i> Tersalin!';
        setTimeout(function () { btn.classList.remove('copied'); btn.innerHTML = '<i class="bi bi-link-45deg"></i> Salin Link'; }, 2500);
    });
}

(function () {
    const orns = [
        { el: document.getElementById('pgOrn1'), triggerPct: 0.08 },
        { el: document.getElementById('pgOrn2'), triggerPct: 0.28 },
        { el: document.getElementById('pgOrn3'), triggerPct: 0.50 },
        { el: document.getElementById('pgOrn4'), triggerPct: 0.70 },
        { el: document.getElementById('pgOrn5'), triggerPct: 0.88 },
    ];
    function updateOrns() {
        const docH = document.documentElement.scrollHeight - window.innerHeight;
        const pct  = docH > 0 ? window.scrollY / docH : 0;
        orns.forEach(function (o) {
            if (!o.el) return;
            o.el.classList.toggle('orn-visible', pct >= o.triggerPct && pct < o.triggerPct + 0.18);
        });
    }
    window.addEventListener('scroll', updateOrns, { passive: true });
    updateOrns();
})();

window.addEventListener('load', function () {
    if (window.location.hash) {
        setTimeout(function () { smoothTo(window.location.hash.replace('#','')); }, 400);
    }
});
</script>
</body>
</html>