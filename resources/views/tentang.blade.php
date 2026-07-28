<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>RSU Allam Medica - Tentang Kami</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="{{ asset('assets/logoalmed.png') }}">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">

    <style>
    /* ========================================
       FONT & BASE
    ======================================== */
    @font-face {
        font-family: 'GothamBlack';
        src: url('{{ asset("fonts/Gotham-Black.otf") }}') format('opentype');
        font-weight: 900;
        font-style: normal;
    }

    h1, h2, h3, h4, h5, .kontak-form-title, .bs-form-title {
        font-family: 'GothamBlack', sans-serif !important;
    }

    body {
        font-family: 'Segoe UI', sans-serif;
        background: #ffffff;
        overflow-x: hidden;
        padding-top: 38px; /* REVISI: Hero nempel di bawah topbar */
        position: relative;
        margin: 0;
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
    @media(max-width:991px) { .topbar-info span { font-size:10px; } .topbar-social { gap:10px; } body { padding-top: 38px; } }
    @media(max-width:480px) { .topbar-info span { font-size:9px; } }

    /* ============================================================
       NAVBAR & MEGA MENU
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
    .drop-menu::before { content: ""; position: absolute; top: -15px; left: 0; width: 100%; height: 15px; background: transparent; }
    .drop-wrap:hover .drop-menu { opacity:1;visibility:visible;transform:translateX(-50%) translateY(0); }
    .drop-item { display:flex;align-items:center;gap:9px;padding:9px 13px;border-radius:12px;font-size:13.5px;color:#334155;text-decoration:none;transition:.18s;font-weight:500; }
    .drop-item:hover { background:rgba(28,20,92,.07);color:#1C145C; }
    .drop-item i { font-size:14px;color:#64748b;flex-shrink:0; }
    .drop-item:hover i { color:#1C145C; }
    .drop-divider { height:1px;background:rgba(0,0,0,.07);margin:4px 8px; }

    /* Dropdown Layanan (2 Kolom) */
    .drop-menu-layanan { min-width: 420px; max-width: min(94vw, 480px); padding: 14px; display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 10px 12px; align-items: start; }
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

    .kontak-mega { position: absolute; top: calc(100% + 18px); right: 0; width: 780px; max-width: calc(100vw - 40px); background: rgba(255,255,255,0.97); backdrop-filter: blur(28px) saturate(180%); border: 1px solid rgba(255,255,255,0.5); border-radius: 24px; box-shadow: 0 24px 60px rgba(15,23,42,.16), 0 2px 12px rgba(15,23,42,.06); padding: 28px; opacity: 0; visibility: hidden; transform: translateY(12px); transition: opacity .26s, visibility .26s, transform .26s; z-index: 9999; }
    .kontak-wrap:hover .kontak-mega, .kontak-mega:hover, .kontak-mega.open { opacity: 1; visibility: visible; transform: translateY(0); }
    .kontak-mega::before { content:''; position:absolute; top:0; left:24px; right:24px; height:2px; background:linear-gradient(90deg,transparent,rgba(28,20,92,.2) 50%,transparent); border-radius:2px; }
    .kontak-mega-grid { display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 22px; }

    .kontak-form-panel { background: #1C145C; border-radius: 16px; padding: 22px 20px; position: relative; overflow: hidden; }
    .kontak-form-panel .form-ornament { position: absolute; bottom: -50px; right: -50px; width: 160px; height: 160px; opacity: .07; background-image: url('{{ asset("images/beranda/ornamen.png") }}'); background-size: contain; background-repeat: no-repeat; pointer-events: none; filter: brightness(10); }
    .kontak-form-panel > *:not(.form-ornament) { position: relative; z-index: 1; }
    .kontak-form-sublabel { font-size: 10px; font-weight: 700; color: rgba(254,252,241,.45); text-transform: uppercase; letter-spacing: .12em; margin-bottom: 4px; }
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
    .ci-igd   { background:rgba(245,158,11,.12); color:#d97706; }
    .ci-map   { background:rgba(28,20,92,.1); color:#1C145C; }
    .ci-ambulans { background: rgba(239,68,68,.12); color: #ef4444; }
    .ci-wa { background: rgba(37,211,102,.14); color: #128C7E; }
    .kontak-info-title { font-size:11px; font-weight:700; color:#1C145C; margin-bottom:2px; }
    .kontak-info-val { font-size:11.5px; color:#5a5480; line-height:1.45; }
    
    .kontak-social-row { display: flex; align-items: center; justify-content: center; gap: 10px; padding: 4px 0 2px; }
    .kontak-social-row a { width: 34px; height: 34px; border-radius: 50%; background: #f8f7ff; border: 1px solid #ece9f8; display: flex; align-items: center; justify-content: center; color: #1C145C; font-size: 15px; text-decoration: none; transition: .2s; }
    .kontak-social-row a:hover { background: #1C145C; color: #fff; transform: translateY(-2px); }
    .kontak-map-caption { display: flex; align-items: center; gap: 6px; font-size: 11.5px; color: #5a5480; text-decoration: none; margin-top: 8px; }
    .kontak-map-caption:hover { color: #1C145C; }
    .kontak-map-caption i { color: #1C145C; font-size: 11px; }
    .kontak-map-box { border-radius: 12px; overflow:hidden; border:1px solid #e8e4d8; flex:1; }
    .kontak-map-box iframe { width:100%; height:140px; display:block; border:0; }

    /* ============================================================
       DRAWER & BOTTOM SHEET (MOBILE)
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
    .btn-kontak-drawer { border-radius:14px; display:block; text-align:center; padding:12px 22px; background:#1C145C; color:#fff!important; text-decoration:none!important; font-size:14px; font-weight:600; border:none; cursor:pointer; font-family:inherit; width:100%; transition:.2s; }
    .btn-kontak-drawer:hover { background:#2a1e8a; }

    .bs-overlay { display:none; position:fixed; inset:0; background:rgba(15,23,42,0); z-index:10000001; transition:background .3s; }
    .bs-overlay.show { display:block; background:rgba(15,23,42,0.5); }
    .bs-sheet { position:fixed; left:0; right:0; bottom:0; z-index:10000002; background:#fff; border-radius:24px 24px 0 0; box-shadow:0 -8px 40px rgba(15,23,42,.18); transform:translateY(100%); transition:transform .35s cubic-bezier(.4,0,.2,1); height:92dvh; display:flex; flex-direction:column; overflow:visible; }
    .bs-sheet.open { transform:translateY(0); }
    .bs-handle-wrap { flex-shrink:0; display:flex; align-items:center; justify-content:center; padding:10px 16px 6px; }
    .bs-handle { width:40px; height:4px; border-radius:2px; background:rgba(0,0,0,.15); }
    .bs-header { flex-shrink:0; display:flex; align-items:center; justify-content:space-between; padding:0 18px 14px; border-bottom:1px solid rgba(0,0,0,.07); }
    .bs-title { font-family:'GothamBlack', sans-serif !important; font-size:17px; color:#1C145C; margin:0; }
    .bs-close { width:32px; height:32px; border-radius:50%; background:rgba(28,20,92,.08); border:none; display:flex; align-items:center; justify-content:center; color:#1C145C; cursor:pointer; font-size:15px; }
    .bs-body { flex:1; min-height:0; overflow-y:auto; -webkit-overflow-scrolling:touch; overscroll-behavior:contain; padding:18px 18px calc(18px + env(safe-area-inset-bottom)) 18px; display:flex; flex-direction:column; gap:16px; }
    .bs-form-card { background:#1C145C; border-radius:14px; padding:18px 16px; position:relative; overflow:hidden; flex-shrink:0; }
    .bs-form-card .bs-form-ornament { position:absolute; bottom:-40px; right:-40px; width:130px; height:130px; opacity:.07; background-image:url('{{ asset("images/beranda/ornamen.png") }}'); background-size:contain; background-repeat:no-repeat; pointer-events:none; filter:brightness(10); }
    .bs-form-card > *:not(.bs-form-ornament) { position:relative; z-index:1; }
    .bs-sublabel { font-size:10px; font-weight:700; color:rgba(254,252,241,.45); text-transform:uppercase; letter-spacing:.12em; margin-bottom:3px; }
    .bs-form-card .ck-field { margin-bottom:9px; }
    .bs-form-card .ck-field label { font-size:10px; color:rgba(254,252,241,.5); margin-bottom:2px; }
    .bs-form-card .ck-field input, .bs-form-card .ck-field textarea { font-size:12px; padding:7px 10px; border-radius:7px; background:rgba(255,255,255,.1); border:1px solid rgba(254,252,241,.18); color:#FEFCF1; width:100%; box-sizing:border-box; outline:none; font-family:inherit; transition:.2s; }
    .bs-form-card .ck-field input::placeholder, .bs-form-card .ck-field textarea::placeholder { color:rgba(254,252,241,.35); }
    .bs-form-card .ck-field input:focus, .bs-form-card .ck-field textarea:focus { border-color:rgba(254,252,241,.5); background:rgba(255,255,255,.15); }
    .bs-form-card .ck-field textarea { min-height:68px; resize:vertical; }
    .btn-send-bs { width:100%; padding:11px; background:#FEFCF1; color:#1C145C; border:none; border-radius:50px; font-size:13px; font-weight:700; cursor:pointer; transition:.2s; display:flex; align-items:center; justify-content:center; gap:7px; font-family:inherit; margin-top:10px; }
    .btn-send-bs:hover { background:#fff; box-shadow:0 4px 14px rgba(0,0,0,.18); }
    .bs-info-grid { display:grid; grid-template-columns:1fr 1fr; gap:10px; flex-shrink:0; }
    .bs-info-card { background:#f8f7ff; border:1px solid #ece9f8; border-radius:12px; padding:12px; text-align:center; text-decoration:none; color:inherit; display:block; transition:.2s; }
    .bs-info-card:hover { transform:translateY(-2px); box-shadow:0 6px 16px rgba(28,20,92,.1); border-color:#d8d4f0; }
    .bs-info-icon { width:34px; height:34px; border-radius:9px; display:flex; align-items:center; justify-content:center; font-size:15px; margin:0 auto 7px; }
    .bs-info-title { font-size:11px; font-weight:700; color:#1C145C; margin-bottom:1px; }
    .bs-info-val   { font-size:11px; color:#5a5480; line-height:1.45; }
    .bs-map-box { border-radius:12px; overflow:hidden; border:1px solid #e8e4d8; flex-shrink:0; }
    .bs-map-box iframe { width:100%; height:160px; display:block; border:0; }

    @media(max-width:1100px) { .nav-link-pill{padding:7px 11px;font-size:13px;} }
    @media(max-width:991px) {
        .navbar-float-wrap { top:38px;padding:4px 12px; }
        .navbar-float { border-radius:26px;padding:8px 14px; }
        .nav-links,.nav-cta { display:none; }
        .nav-burger { display:flex; }
        .kontak-mega { display:none !important; }
    }
    @media(max-width:480px) { .navbar-float { border-radius:22px; } }

    /* ============================================================
       TENTANG KAMI SPECIFIC
    ============================================================ */
    .hero-section {
        position: relative;
        padding-top: 100px; /* Adjusted to accommodate fixed navbar cleanly */
        background:
            linear-gradient(rgba(0,0,0,.55),rgba(0,0,0,.55)),
            url('{{ asset("images/beranda/soretentangkami.png") }}')
            center center / cover no-repeat;
        height: 80vh;
        color: #fff;
        overflow: hidden;
    }

    .about-flow {
        position: relative; overflow: hidden;
        background: linear-gradient(180deg, #ffffff 0%, #ffffff 8%, #fdfcf7 18%, #faf8ee 30%, #f5f2e5 42%, #f0ecdc 52%, #f5f2e5 62%, #faf8ee 74%, #fdfcf7 86%, #ffffff 96%, #ffffff 100%);
    }

    .profile-section,.medica-section,.visi-misi-section,.timeline-section,.filosofi-section,.sambutan-section,.struktur-section,.akreditasi-section { position:relative;overflow:visible; }
    .profile-section::before { content:'';position:absolute;top:-20px;right:-120px;width:380px;height:380px;background:url('{{ asset("images/beranda/ornamen.png") }}') center/contain no-repeat;opacity:.04;pointer-events:none;z-index:0; }
    .medica-section::after { content:'';position:absolute;left:-140px;top:50%;transform:translateY(-50%);width:340px;height:340px;background:url('{{ asset("images/beranda/ornamen.png") }}') center/contain no-repeat;opacity:.035;pointer-events:none;z-index:0; }
    .visi-misi-section::before { content:'';position:absolute;right:-150px;bottom:-20px;width:400px;height:400px;background:url('{{ asset("images/beranda/ornamen.png") }}') center/contain no-repeat;opacity:.035;pointer-events:none;z-index:0; }
    .timeline-section::after { content:'';position:absolute;left:-150px;bottom:-20px;width:420px;height:420px;background:url('{{ asset("images/beranda/ornamen.png") }}') center/contain no-repeat;opacity:.04;pointer-events:none;z-index:0; }
    .filosofi-section::before { content:'';position:absolute;right:-20px;top:-20px;width:300px;height:300px;background:url('{{ asset("images/beranda/ornamen.png") }}') center/contain no-repeat;opacity:.035;pointer-events:none;z-index:0; }
    .profile-section .container,.medica-section .container,.visi-misi-section .container,.timeline-section .container,.filosofi-section .container { position:relative;z-index:2; }

    .profile-section { background:transparent;padding:60px 0; }
    .profile-text { font-size:15px;color:#555;line-height:1.7;text-align:justify;text-justify:inter-word; }
    .info-card { background:#fff;border-radius:12px;padding:14px;box-shadow:0 5px 15px rgba(0,0,0,0.05);transition:0.3s;display:flex;gap:10px;align-items:flex-start; }
    .info-card:hover { transform:translateY(-4px);box-shadow:0 10px 20px rgba(0,0,0,0.08); }
    .info-card small { font-size:11px;color:#888; }
    .info-card b { font-size:12.5px;font-weight:600;color:#333;line-height:1.5; }
    .icon-box { width:34px;height:34px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:14px; }
    .icon-primary { background:rgba(28,20,92,0.1);color:#1C145C; }
    .icon-success { background:rgba(40,167,69,0.1);color:#28a745; }
    .icon-warning { background:rgba(255,152,0,0.1);color:#ff9800; }
    .icon-danger  { background:rgba(220,53,69,0.1);color:#dc3545; }

    .medica-section { padding:60px 0;background:transparent; }
    .medica-label { font-size:11px;color:#888;font-weight:600;letter-spacing:1.5px;text-transform:uppercase;display:block;margin-bottom:4px; }
    .medica-heading { font-size:26px;font-weight:800;letter-spacing:3px;margin-bottom:30px; }
    .medica-card { border-radius:14px;padding:18px 10px;border:2px solid;height:100%;transition:0.3s; }
    .medica-card:hover { transform:translateY(-5px);box-shadow:0 10px 20px rgba(0,0,0,0.08); }
    .medica-letter { font-size:48px;font-weight:900;font-style:italic;margin-bottom:10px; }
    .medica-name { font-size:12px;font-weight:700;margin-bottom:5px; }
    .medica-desc { font-size:11px;color:#777; }
    .medica-m { background:#FCEBEB;border-color:#F09595;color:#A32D2D; }
    .medica-e { background:#EEEDFE;border-color:#AFA9EC;color:#3C3489; }
    .medica-d { background:#F1EFE8;border-color:#B4B2A9;color:#444; }
    .medica-i { background:#EAF3DE;border-color:#97C459;color:#27500A; }
    .medica-c { background:#F1EFE8;border-color:#B4B2A9;color:#5F5E5A; }
    .medica-a { background:#FBEAF0;border-color:#ED93B1;color:#72243E; }

    .visi-misi-section { padding:60px 0;background:transparent; }
    .visi-block { position:relative;border-radius:16px;overflow:hidden;margin-bottom:20px;background:#1C145C; }
    .visi-inner { display:flex;align-items:center;gap:28px;padding:28px 32px;position:relative;z-index:1; }
    .visi-icon-box { width:52px;height:52px;border-radius:14px;background:rgba(255,255,255,0.15);border:1px solid rgba(255,255,255,0.2);display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:22px;color:#fff; }
    .visi-label { font-size:10px;font-weight:700;letter-spacing:0.14em;text-transform:uppercase;color:rgba(255,255,255,0.55);margin-bottom:6px; }
    .visi-text { font-size:15px;font-weight:600;color:#fff;line-height:1.7;margin:0; }
    .visi-deco { position:absolute;right:24px;top:50%;transform:translateY(-50%);font-size:80px;font-weight:900;color:rgba(255,255,255,0.05);font-family:'GothamBlack','Arial Black',sans-serif;pointer-events:none;line-height:1;user-select:none;z-index:0; }
    .misi-block { border-radius:16px;overflow:hidden;border:1.5px solid #e9ecef;background:#fff;box-shadow:0 5px 20px rgba(0,0,0,0.05); }
    .misi-head { display:flex;align-items:center;gap:14px;padding:18px 28px;background:#f8f7fb;border-bottom:1.5px solid #e9ecef; }
    .misi-head-icon { width:40px;height:40px;border-radius:10px;background:rgba(28,20,92,0.10);display:flex;align-items:center;justify-content:center;font-size:18px;color:#1C145C;flex-shrink:0; }
    .misi-head-title { font-size:15px;font-weight:700;color:#1C145C; }
    .misi-head-sub   { font-size:12px;color:#888;margin-top:1px; }
    .misi-count { margin-left:auto;font-size:11px;font-weight:600;letter-spacing:0.06em;background:rgba(28,20,92,0.08);color:#1C145C;padding:4px 12px;border-radius:999px; }
    .misi-body { padding:8px 28px 20px; }
    .misi-item { display:flex;gap:16px;padding:16px 0;border-bottom:1px solid #f0f0f0;align-items:flex-start; }
    .misi-item:last-child { border-bottom:none; }
    .misi-num { flex-shrink:0;width:30px;height:30px;border-radius:8px;background:#1C145C;color:#fff;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;margin-top:2px; }
    .misi-txt { font-size:14px;color:#444;line-height:1.72;margin:0;padding-top:5px; }

    .timeline-section { padding:100px 0;position:relative;overflow:visible;background:transparent; }
    .timeline { position:relative;max-width:1100px;margin:auto; }
    .timeline::before { content:'';position:absolute;left:50%;top:0;bottom:0;width:3px;background:linear-gradient(to bottom,#1C145C,#6c63ff);transform:translateX(-50%); }
    .timeline-item { position:relative;width:50%;padding:40px 60px;display:flex; }
    .timeline-item.left { left:0;justify-content:flex-end;text-align:right; }
    .timeline-item.right { left:50%;justify-content:flex-start; }
    .timeline-icon { position:absolute;top:35px;width:50px;height:50px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:20px;color:#fff;z-index:3;box-shadow:0 5px 15px rgba(0,0,0,0.2); }
    .timeline-item.left .timeline-icon  { right:-25px; }
    .timeline-item.right .timeline-icon { left:-25px; }
    .icon-1 { background:#1C145C; }
    .icon-2 { background:#28a745; }
    .icon-3 { background:#ff9800; }
    .icon-4 { background:#dc3545; }
    .timeline-card { background:#fff;padding:25px 30px;border-radius:18px;box-shadow:0 12px 35px rgba(0,0,0,0.08);transition:0.3s;width:100%;max-width:420px;min-height:150px;display:flex;flex-direction:column;justify-content:center; }
    .timeline-card:hover { transform:translateY(-8px) scale(1.02);box-shadow:0 20px 45px rgba(0,0,0,0.15); }
    .timeline-year { font-weight:800;color:#1C145C;font-size:20px; }
    .timeline-text { font-size:14px;color:#555;margin-top:6px;line-height:1.6; }
    @media(max-width:768px) {
        .timeline::before { left:25px; }
        .timeline-item { width:100%;padding-left:80px;padding-right:20px; }
        .timeline-item.left,.timeline-item.right { left:0;text-align:left;justify-content:flex-start; }
        .timeline-icon { left:0 !important; }
    }

    .filosofi-section { padding:80px 0;background:transparent; }
    .filosofi-card { border-radius:16px;padding:30px;position:relative;overflow:hidden;height:100%;box-shadow:0 10px 30px rgba(0,0,0,0.08);transition:0.3s; }
    .filosofi-card:hover { transform:translateY(-6px);box-shadow:0 15px 40px rgba(0,0,0,0.12); }
    .card-filosofi { background:#fff; }
    .card-semboyan { background:#1C145C;color:#fff; }
    .filosofi-header { display:flex;align-items:center;gap:12px;margin-bottom:15px; }
    .filosofi-icon { width:42px;height:42px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:18px; }
    .icon-filosofi { background:rgba(28,20,92,0.1);color:#1C145C; }
    .icon-semboyan { background:rgba(255,255,255,0.2);color:#fff; }
    .filosofi-title { font-size:16px;font-weight:700; }
    .filosofi-text { font-size:14px;line-height:1.7;color:#555; }
    .card-semboyan .filosofi-text { color:#e0e0e0; }
    .bg-label { position:absolute;top:20px;right:20px;font-size:60px;font-weight:800;opacity:0.05;pointer-events:none; }

    .sambutan-section { padding:80px 0 70px;background:transparent;position:relative;overflow:visible; }
    .sambutan-section::before { content:'';position:absolute;left:-130px;bottom:-80px;width:360px;height:360px;background:url('{{ asset("images/beranda/ornamen.png") }}') center/contain no-repeat;opacity:.04;pointer-events:none;z-index:0; }
    .sambutan-section .container { position:relative;z-index:2; }
    .sambutan-eyebrow { display:flex;align-items:center;gap:10px;margin-bottom:8px; }
    .sambutan-eyebrow span { font-size:11px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:#1C145C; }
    .sambutan-eyebrow::before { content:'';width:26px;height:2px;background:#1C145C;border-radius:2px; }
    .sambutan-heading-sub { font-size:13px;color:#8d87b0;margin-bottom:34px; }
    .sambutan-card { background:#fff;border-radius:26px;box-shadow:0 20px 55px rgba(15,23,42,.08);border:1px solid #f0eef8;overflow:hidden;position:relative; }
    .sambutan-card::before { content:'';position:absolute;top:0;left:0;right:0;height:5px;background:linear-gradient(90deg,#1C145C 0%,#6c63ff 50%,#1C145C 100%); }
    .sambutan-card-inner { display:grid;grid-template-columns:300px 1fr;gap:0; }
    .sambutan-photo-col { background:#f8f7ff;padding:36px 30px;display:flex;flex-direction:column;align-items:center;text-align:center;border-right:1px solid #f0eef8;position:relative; }
    .sambutan-photo-ring { width:100%;max-width:220px;aspect-ratio:1/1;border-radius:50%;padding:6px;background:linear-gradient(135deg,#1C145C,#6c63ff);margin-bottom:18px;position:relative; }
    .sambutan-photo-ring img { width:100%;height:100%;object-fit:cover;border-radius:50%;border:4px solid #f8f7ff;display:block; }
    .sambutan-photo-badge { position:absolute;bottom:14px;right:calc(50% - 110px + 4px);background:#1C145C;color:#fff;width:38px;height:38px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:15px;border:3px solid #f8f7ff;box-shadow:0 6px 14px rgba(28,20,92,.3); }
    .sambutan-photo-nama { font-weight:800;font-size:15.5px;color:#1C145C;line-height:1.35; }
    .sambutan-photo-jabatan { font-size:11.5px;color:#8d87b0;margin-top:4px;margin-bottom:18px; }
    .sambutan-photo-tagbox { background:#1C145C;border-radius:12px;padding:12px 14px;position:relative;overflow:hidden;width:100%; }
    .sambutan-photo-tagbox .tb-ornament { position:absolute;bottom:-24px;right:-24px;width:90px;height:90px;opacity:.1;background-image:url('{{ asset("images/beranda/ornamen.png") }}');background-size:contain;background-repeat:no-repeat;filter:brightness(10);pointer-events:none; }
    .sambutan-photo-tagbox p { position:relative;z-index:1;font-size:11.5px;font-weight:700;color:#FEFCF1;margin:0;line-height:1.5;font-style:italic; }
    .sambutan-letter-col { padding:38px 42px 34px;position:relative; }
    .sambutan-quote-icon { font-size:44px;color:rgba(28,20,92,.10);line-height:1;margin-bottom:2px; }
    .sambutan-salam { font-size:15px;color:#1C145C;font-weight:700;margin-bottom:2px; }
    .sambutan-salam + .sambutan-salam { font-weight:600;color:#3C3489;margin-bottom:16px; }
    .sambutan-text { font-size:14.5px;color:#555;line-height:1.9;text-align:justify;margin-bottom:14px; }
    .sambutan-motto-box { background:linear-gradient(135deg,#f8f7ff,#f1effc);border-left:3px solid #1C145C;border-radius:0 14px 14px 0;padding:18px 22px;margin:22px 0; }
    .sambutan-motto-box p.sambutan-text { margin-bottom:0;text-align:left;color:#3C3489; }
    .sambutan-motto-box strong { color:#1C145C; }
    .sambutan-divider { height:1px;background:linear-gradient(90deg,rgba(28,20,92,.14),transparent);margin:26px 0 22px; }
    .sambutan-signoff { display:flex;align-items:center;gap:14px; }
    .sambutan-signoff .icon-box { width:44px;height:44px;flex-shrink:0; }
    .sambutan-signoff-name { font-weight:800;color:#1C145C;font-size:14.5px; }
    .sambutan-signoff-jabatan { font-size:11.5px;color:#8d87b0;margin-top:1px; }
    .sambutan-signoff-tagline { margin-top:10px;font-size:11.5px;color:#666;font-style:italic;line-height:1.6; }
    .sambutan-signoff-tagline strong { color:#1C145C;font-style:normal; }
    @media(max-width:991px) { .sambutan-card-inner { grid-template-columns:1fr; } .sambutan-photo-col { border-right:none;border-bottom:1px solid #f0eef8;padding:30px 24px; } .sambutan-photo-ring { max-width:160px; } .sambutan-letter-col { padding:30px 24px; } }
    @media(max-width:480px) { .sambutan-letter-col { padding:26px 18px; } .sambutan-photo-col { padding:26px 18px; } }

    .struktur-section { padding:70px 0;background:transparent;position:relative;overflow:visible; }
    .struktur-section::after { content:'';position:absolute;right:-160px;top:-40px;width:380px;height:380px;background:url('{{ asset("images/beranda/ornamen.png") }}') center/contain no-repeat;opacity:.035;pointer-events:none;z-index:0; }
    .struktur-section .container { position:relative;z-index:2; }
    .org-top-chart { display:flex;flex-direction:column;align-items:center;max-width:900px;margin:0 auto 46px; }
    .org-node { border-radius:12px;padding:10px 22px;text-align:center;position:relative;z-index:2; }
    .org-node.org-direktur { background:#1C145C;color:#fff;box-shadow:0 10px 24px rgba(28,20,92,.25); }
    .org-node.org-direktur .jabatan { font-size:10px;letter-spacing:.12em;text-transform:uppercase;color:rgba(255,255,255,.6); }
    .org-node.org-direktur .nama { font-size:14px;font-weight:800; }
    .org-connector { width:2px;background:#c9c3e8;height:22px; }
    .org-top-row { display:flex;justify-content:center;align-items:flex-start;gap:40px;width:100%;position:relative;margin-top:2px; }
    .org-node.org-side { background:#f8f7ff;border:1.5px solid #ece9f8;flex:1;max-width:340px; }
    .org-node.org-side .jabatan { font-size:10px;letter-spacing:.1em;text-transform:uppercase;color:#7a74a0;margin-bottom:4px;font-weight:700; }
    .org-node.org-side .nama { font-size:12px;font-weight:600;color:#3C3489;line-height:1.6; }
    .org-wadir-grid { display:grid;grid-template-columns:1fr 1fr;gap:22px; }
    .org-wadir-card { background:#fff;border:1.5px solid #e9ecef;border-radius:16px;overflow:hidden;box-shadow:0 8px 24px rgba(0,0,0,.04); }
    .org-wadir-head { background:#1C145C;color:#fff;padding:18px 20px;position:relative;overflow:hidden; }
    .org-wadir-head .wh-ornament { position:absolute;bottom:-30px;right:-30px;width:110px;height:110px;opacity:.08;background-image:url('{{ asset("images/beranda/ornamen.png") }}');background-size:contain;background-repeat:no-repeat;pointer-events:none;filter:brightness(10); }
    .org-wadir-head .jabatan { font-size:10px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:rgba(255,255,255,.55);position:relative;z-index:1; }
    .org-wadir-head .nama { font-size:16px;font-weight:800;color:#fff;position:relative;z-index:1;margin-top:2px; }
    .org-manajer-list { padding:10px 12px; }
    .org-manajer-item { border-bottom:1px solid #f0eff7; }
    .org-manajer-item:last-child { border-bottom:none; }
    .org-manajer-btn { display:flex;justify-content:space-between;align-items:center;gap:10px;padding:13px 8px;cursor:pointer;width:100%;background:none;border:none;text-align:left;font-family:inherit; }
    .org-manajer-btn .om-text .jabatan { font-size:10px;color:#888;text-transform:uppercase;letter-spacing:.06em;font-weight:700; }
    .org-manajer-btn .om-text .nama { font-size:13px;font-weight:700;color:#1C145C;margin-top:1px; }
    .org-manajer-chevron { font-size:11px;color:#aaa;transition:transform .25s;flex-shrink:0; }
    .org-manajer-btn.open .org-manajer-chevron { transform:rotate(180deg); }
    .org-manajer-body { display:none;padding:0 8px 12px 8px; }
    .org-manajer-body.open { display:block; }
    .org-staff-row { display:flex;justify-content:space-between;gap:10px;padding:7px 10px;font-size:12px;color:#555;border-bottom:1px dashed #f0eff7;background:#faf9ff;border-radius:8px;margin-bottom:4px; }
    .org-staff-row:last-child { margin-bottom:0; }
    .org-staff-row .jabatan-kecil { color:#8d87b0;flex-shrink:0;font-size:11px; }
    .org-staff-row .nama-kecil { font-weight:600;color:#333;text-align:right; }
    @media(max-width:991px){ .org-wadir-grid{ grid-template-columns:1fr; } .org-top-row{ flex-direction:column;align-items:center;gap:14px; } .org-node.org-side{ max-width:100%; } }

    .akreditasi-section { padding:70px 0 90px;background:transparent;position:relative;overflow:visible; }
    .akreditasi-section::before { content:'';position:absolute;left:-140px;top:-60px;width:360px;height:360px;background:url('{{ asset("images/beranda/ornamen.png") }}') center/contain no-repeat;opacity:.04;pointer-events:none;z-index:0; }
    .akreditasi-section .container { position:relative;z-index:2; }
    .akreditasi-card { background:#1C145C;border-radius:18px;padding:30px;display:flex;align-items:center;gap:22px;position:relative;overflow:hidden;height:100%; }
    .akreditasi-card .ak-ornament { position:absolute;bottom:-40px;right:-40px;width:150px;height:150px;opacity:.08;background-image:url('{{ asset("images/beranda/ornamen.png") }}');background-size:contain;background-repeat:no-repeat;pointer-events:none;filter:brightness(10); }
    .akreditasi-badge { width:64px;height:64px;border-radius:16px;background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.22);display:flex;align-items:center;justify-content:center;font-size:28px;color:#fff;flex-shrink:0;position:relative;z-index:1; }
    .akreditasi-info { position:relative;z-index:1; }
    .akreditasi-label { font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:rgba(255,255,255,.55);margin-bottom:4px; }
    .akreditasi-title { font-size:19px;font-weight:800;color:#fff;margin-bottom:4px; }
    .akreditasi-desc { font-size:12.5px;color:rgba(255,255,255,.75);line-height:1.6; }
    .tt-heading { font-size:15px;font-weight:700;color:#1C145C;margin:40px 0 18px; }
    .tt-grid { display:grid;grid-template-columns:repeat(4,1fr);gap:14px; }
    .tt-card { background:#fff;border:1.5px solid #ece9f8;border-radius:14px;padding:18px 14px;text-align:center;box-shadow:0 5px 15px rgba(0,0,0,0.04);transition:.3s; }
    .tt-card:hover { transform:translateY(-4px);box-shadow:0 10px 22px rgba(0,0,0,0.08); }
    .tt-card .tt-icon { width:40px;height:40px;border-radius:10px;background:rgba(28,20,92,.08);color:#1C145C;display:flex;align-items:center;justify-content:center;font-size:17px;margin:0 auto 10px; }
    .tt-card .tt-jumlah { font-size:26px;font-weight:800;color:#1C145C;line-height:1; }
    .tt-card .tt-satuan { font-size:10.5px;color:#999;margin-bottom:6px; }
    .tt-card .tt-nama { font-size:12.5px;font-weight:600;color:#444; }
    .tt-total-card { background: linear-gradient(135deg, #1C145C 0%, #2c2085 100%); border-radius: 14px; padding: 18px 14px; text-align: center; color: #fff; box-shadow: 0 5px 15px rgba(28, 20, 92, 0.15); transition: 0.3s; position: relative; overflow: hidden; border: 1.5px solid transparent; }
    .tt-total-card:hover { transform: translateY(-4px); box-shadow: 0 10px 22px rgba(28, 20, 92, 0.25); border-color: rgba(255, 255, 255, 0.15); }
    .tt-total-card::before { content: ''; position: absolute; top: -50%; right: -50%; width: 100%; height: 100%; background: radial-gradient(circle, rgba(255,255,255,0.06) 0%, transparent 60%); pointer-events: none; }
    .tt-total-card .tt-icon { width: 40px; height: 40px; border-radius: 10px; background: rgba(255, 255, 255, 0.12); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 17px; margin: 0 auto 10px; box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2); }
    .tt-total-card .tt-jumlah { font-size: 26px; font-weight: 800; color: #fff; line-height: 1; position: relative; }
    .tt-total-card .tt-satuan { font-size: 10.5px; color: rgba(255, 255, 255, 0.65); margin-bottom: 6px; position: relative; }
    .tt-total-card .tt-nama { font-size: 12.5px; font-weight: 700; color: #fff; position: relative; }
    .tt-note { font-size:10px;color:#9994bb;line-height:1.5;margin-top:6px;padding-top:6px;border-top:1px dashed #ece9f8; }
    .tt-subheading { font-size:13px;font-weight:700;color:#7a74a0;text-transform:uppercase;letter-spacing:.08em;margin:34px 0 14px; }
    @media(max-width:768px){ .tt-grid{ grid-template-columns:repeat(2,1fr); } .akreditasi-card{ flex-direction:column;text-align:center; } }


    /* ============================================================
       FLOATING WHATSAPP BUTTON & MODAL
    ============================================================ */
    .wa-float-btn { position: fixed; right: 25px; bottom: 25px; width: 68px; height: 68px; border: none; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; background: linear-gradient(135deg, #25D366 0%, #128C7E 100%); box-shadow: 0 16px 40px rgba(37, 211, 102, 0.32); z-index: 99999; cursor: pointer; overflow: hidden; transition: transform .25s ease, box-shadow .25s ease, filter .25s ease; animation: waFloatIn .7s cubic-bezier(.2,.8,.2,1) both; }
    .wa-float-btn::before { content: ""; position: absolute; inset: -2px; border-radius: inherit; border: 1px solid rgba(255,255,255,.22); animation: waPulse 3.4s ease-in-out infinite; pointer-events: none; }
    .wa-float-btn::after { content: ""; position: absolute; inset: 0; border-radius: inherit; background: rgba(255,255,255,.18); transform: scale(0); opacity: 0; pointer-events: none; }
    .wa-float-btn.is-clicked::after { animation: waRipple .55s ease-out; }
    .wa-float-btn:hover { transform: scale(1.08); box-shadow: 0 22px 48px rgba(18, 140, 126, 0.38); filter: saturate(1.08); }
    .wa-float-btn:active { transform: scale(1.02); }
    .wa-float-btn:hover .wa-float-icon { animation: waWiggle .35s ease-in-out 2; }
    .wa-float-icon { position: relative; z-index: 1; font-size: 30px; line-height: 1; }

    .wa-tooltip { position: fixed; right: 100px; bottom: 35px; max-width: 290px; padding: 12px 14px; display: flex; align-items: flex-start; gap: 10px; border-radius: 16px; background: rgba(255,255,255,.97); border: 1px solid rgba(28,20,92,.12); box-shadow: 0 18px 40px rgba(15,23,42,.16); color: #1C145C; z-index: 99998; opacity: 0; transform: translateX(16px); pointer-events: none; }
    .wa-tooltip.show { opacity: 1; transform: translateX(0); animation: waTooltipIn .35s ease forwards; pointer-events: auto; }
    .wa-tooltip.is-hidden { opacity: 0; transform: translateX(16px); animation: waTooltipOut .28s ease forwards; pointer-events: none; }
    .wa-tooltip-icon { width: 34px; height: 34px; border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; background: rgba(37, 211, 102, .14); color: #128C7E; font-size: 16px; }
    .wa-tooltip-body { flex: 1; }
    .wa-tooltip-title { font-size: 13px; font-weight: 700; margin-bottom: 2px; }
    .wa-tooltip-text { font-size: 12.5px; line-height: 1.45; color: #5a5480; }
    .wa-tooltip-close { border: none; background: transparent; color: #64748b; cursor: pointer; padding: 2px; margin-left: 4px; }

    .wa-modal-overlay { position: fixed; inset: 0; display: flex; align-items: center; justify-content: center; padding: 20px; background: rgba(15, 23, 42, .6); z-index: 10000003; opacity: 0; visibility: hidden; transition: opacity .25s ease, visibility .25s ease; }
    .wa-modal-overlay.show { opacity: 1; visibility: visible; }
    .wa-modal-card { position: relative; width: min(92vw, 480px); background: #fff; border-radius: 24px; padding: 24px 22px 20px; box-shadow: 0 24px 60px rgba(15,23,42,.18); transform: scale(.96); opacity: 0; transition: transform .25s ease, opacity .25s ease; }
    .wa-modal-overlay.show .wa-modal-card { transform: scale(1); opacity: 1; }
    .wa-modal-icon { width: 54px; height: 54px; border-radius: 16px; display: flex; align-items: center; justify-content: center; background: rgba(37, 211, 102, .14); color: #128C7E; font-size: 24px; margin-bottom: 14px; }
    .wa-modal-card h3 { margin: 0 0 8px; font-size: 20px; color: #1C145C; }
    .wa-modal-card p { margin: 0 0 12px; color: #5a5480; line-height: 1.65; font-size: 14px; }
    .wa-modal-pre { padding: 12px 14px; border-radius: 14px; background: #f7f9fc; border: 1px solid #ecf0f6; color: #334155; font-size: 13px; line-height: 1.6; white-space: pre-wrap; margin-bottom: 16px; }
    .wa-modal-actions { display: flex; justify-content: flex-end; gap: 10px; flex-wrap: wrap; }
    .wa-btn { border: none; border-radius: 999px; padding: 10px 16px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; cursor: pointer; transition: transform .18s ease, box-shadow .18s ease; }
    .wa-btn:hover { transform: translateY(-1px); }
    .wa-btn-secondary { background: #f3f4f6; color: #334155; }
    .wa-btn-primary { background: linear-gradient(135deg, #25D366 0%, #128C7E 100%); color: #fff; box-shadow: 0 10px 24px rgba(37, 211, 102, .24); }

    @keyframes waFloatIn { from { opacity: 0; transform: translateY(18px) scale(.92); } to { opacity: 1; transform: translateY(0) scale(1); } }
    @keyframes waPulse { 0%, 100% { transform: scale(1); opacity: .55; } 50% { transform: scale(1.08); opacity: .2; } }
    @keyframes waWiggle { 0%, 100% { transform: rotate(0); } 25% { transform: rotate(-8deg); } 75% { transform: rotate(8deg); } }
    @keyframes waRipple { 0% { transform: scale(.72); opacity: .45; } 100% { transform: scale(1.7); opacity: 0; } }
    @keyframes waTooltipIn { from { opacity: 0; transform: translateX(16px); } to { opacity: 1; transform: translateX(0); } }
    @keyframes waTooltipOut { from { opacity: 1; transform: translateX(0); } to { opacity: 0; transform: translateX(16px); } }

    @media(max-width: 575px) {
        .wa-float-btn { right: 20px; bottom: 20px; width: 60px; height: 60px; }
        .wa-float-icon { font-size: 26px; }
        .wa-tooltip { right: 78px; bottom: 24px; max-width: min(72vw, 240px); padding: 11px 12px; }
        .wa-modal-card { padding: 20px 18px 18px; }
        .wa-modal-actions { justify-content: stretch; }
        .wa-modal-actions .wa-btn { flex: 1 1 100%; }
    }
    </style>
</head>
<body>

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
            <a href="https://www.tiktok.com/@rsuallammedicabumiayu" target="_blank"><i class="bi bi-tiktok"></i></a>
            <a href="https://www.facebook.com/allam.medicabmy" target="_blank"><i class="bi bi-facebook"></i></a>
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
                        <a href="{{ url('/layanan#intensif') }}" class="drop-item"><i class="bi bi-heart-pulse-fill"></i> ICU/NICU/HCU</a>
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
            <a href="/mutu"     class="nav-link-pill {{ request()->is('mutu*')      ? 'active' : '' }}">Mutu</a>
        </div>
        
        <!-- ===== KONTAK CTA dengan Mega Dropdown ===== -->
        <div class="nav-cta kontak-wrap" id="kontakWrap">
            <button class="btn-kontak" id="btnKontakDesktop" type="button">Kontak</button>
            <div class="kontak-mega" id="kontakMega">
                <div class="kontak-mega-grid">
                    <!-- KIRI: FORM -->
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
                    <!-- KANAN: INFO + MAP -->
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
                            <a href="https://www.tiktok.com/@allam.medica" target="_blank" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
                            <a href="https://www.facebook.com/allam.medicabmy" target="_blank" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/allam.medica/" target="_blank" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        </div>
                        <div class="kontak-map-box">
                            <iframe src="https://www.google.com/maps?q=RSU+Allam+Medica+Bumiayu&output=embed" loading="lazy"></iframe>
                        </div>
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

<!-- ============================================================
     DRAWER (MOBILE)
============================================================ -->
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
            <a href="{{ url('/layanan') }}"             class="d-sub-link"><i class="bi bi-grid-3x3-gap"></i> Semua Layanan</a>
            <div class="d-divider"></div>
            <a href="{{ url('/layanan#igd') }}"         class="d-sub-link"><i class="bi bi-bandaid-fill"></i> IGD 24 Jam</a>
            <a href="{{ url('/layanan#rawatjalan') }}"  class="d-sub-link"><i class="bi bi-clipboard2-pulse"></i> Rawat Jalan</a>
            <a href="{{ url('/layanan#rawatinap') }}"   class="d-sub-link"><i class="bi bi-hospital"></i> Rawat Inap</a>
            <a href="{{ url('/layanan#ambulans') }}"     class="d-sub-link"><i class="bi bi-truck"></i> Ambulans 24 Jam</a>
            <a href="{{ url('/layanan#laboratorium') }}" class="d-sub-link"><i class="bi bi-eyedropper"></i> Laboratorium</a>
            <a href="{{ url('/layanan#radiologi') }}"    class="d-sub-link"><i class="bi bi-radioactive"></i> Radiologi</a>
            <a href="{{ url('/layanan#farmasi') }}"      class="d-sub-link"><i class="bi bi-capsule"></i> Farmasi</a>
            <a href="{{ url('/layanan#mcu') }}"          class="d-sub-link"><i class="bi bi-heart-pulse"></i> Medical Check Up</a>
            <a href="{{ url('/layanan#intensif') }}"     class="d-sub-link"><i class="bi bi-heart-pulse-fill"></i> ICU/NICU/HCU</a>
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
            <a href="https://www.tiktok.com/@allam.medica" target="_blank" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
            <a href="https://www.facebook.com/allam.medicabmy" target="_blank" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
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

<!-- ============================================================
     HERO
============================================================ -->
<section class="hero-section">
    <div class="container d-flex align-items-center h-100">
        <div class="row w-100">
            <div class="col-md-6 text-start">
                <h1 class="fw-bold">RSU Allam Medica Bumiayu</h1>
                <p>
                    Rumah Sakit Umum terpercaya di Kabupaten Brebes yang telah
                    melayani masyarakat sejak 2012. Berkomitmen menghadirkan
                    layanan kesehatan yang inovatif, handal, dan terpercaya.
                </p>
            </div>
        </div>
    </div>

    <div style="position:absolute;bottom:-1px;left:0;width:100%;line-height:0;">
        <svg viewBox="0 0 1440 120" xmlns="http://www.w3.org/2000/svg">
            <path fill="#ffffff" d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L0,120Z"></path>
        </svg>
    </div>
</section>

<!-- ============================================================
     ABOUT FLOW WRAPPER
============================================================ -->
<div class="about-flow">

    <!-- PROFIL -->
    <section class="profile-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h4 class="fw-bold mb-3">Profil Rumah Sakit</h4>
                    <p class="profile-text">
                        RSU Allam Medica Rumah Sakit Umum "Allam Medica" berdiri sejak tahun 2012, didirikan oleh Yayasan Allam Medica Bumiayu. Pada mulanya merupakan klinik pelayanan kesehatan umum dan kebidanan dengan nama Balai Pengobatan dan Rumah Bersalin Allam Medica. Penyelenggaraan rumah sakit sejak tahun 2008 dengan surat izin Bupati Brebes nomor 503.IO/KPT/005/IV/2008 sebagai "Rumah Bersalin" dan surat izin Bupati Brebes nomor 503.IO/KPT/008/IV/2008 sebagai "Balai Pengobatan Allam Medica".
                        Sejak 2015 menjadi Rumah Sakit Umum Allam Medica dengan Ijin Operasional tetap dari Bupati Brebes, dan pada 2023 resmi menjadi Rumah Sakit Tipe C.
                        Didukung sistem keamanan aktif yang ramah bagi pengunjung, dengan pendekatan tenaga keamanan yang profesional dan sistem pemantauan area sepanjang waktu, dilengkapi 38 unit CCTV di setiap sudut strategis.
                    </p>
                </div>
                <div class="col-md-5">
                    <div class="mb-3 info-card">
                        <div class="icon-box icon-primary"><i class="bi bi-file-earmark-text"></i></div>
                        <div><small>Izin Operasional</small><br><b>503.IO/KPT/02787/IX/2015 Bupati Brebes — Tetap</b></div>
                    </div>
                    <div class="mb-3 info-card">
                        <div class="icon-box icon-success"><i class="bi bi-hospital"></i></div>
                        <div><small>Kelas Rumah Sakit</small><br><b>Rumah Sakit Umum Tipe C SK 91/2008/02/7/2001</b></div>
                    </div>
                    <div class="mb-3 info-card">
                        <div class="icon-box icon-warning"><i class="bi bi-geo-alt-fill"></i></div>
                        <div><small>Alamat</small><br><b>Jl. Pangeran Diponegoro No. 609 Jatisawit, Bumiayu, Kab. Brebes, 52273</b></div>
                    </div>
                    <div class="info-card">
                        <div class="icon-box icon-danger"><i class="bi bi-telephone-fill"></i></div>
                        <div><small>Kontak</small><br><b>(0289) 430822</b></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SAMBUTAN -->
    <section class="sambutan-section">
        <div class="container">
            <div class="sambutan-eyebrow"><span>Sambutan</span></div>
            <h4 class="fw-bold mb-1">Sambutan Direktur</h4>
            <p class="sambutan-heading-sub">Pesan resmi dari pimpinan RSU Allam Medica Bumiayu</p>

            <div class="sambutan-card" data-aos="fade-up">
                <div class="sambutan-card-inner">

                    <div class="sambutan-photo-col">
                        <div class="sambutan-photo-ring">
                            <img src="{{ asset('images/beranda/dr. hardyansyah, MPH-MMR.png') }}" alt="Direktur RSU Allam Medica">
                            <div class="sambutan-photo-badge"><i class="bi bi-patch-check-fill"></i></div>
                        </div>
                        <div class="sambutan-photo-nama">dr. Hardyansyah, MPH-MMR</div>
                        <div class="sambutan-photo-jabatan">Direktur RSU Allam Medica Bumiayu</div>
                        <div class="sambutan-photo-tagbox">
                            <div class="tb-ornament"></div>
                            <p>"Kesehatan Anda, Tujuan Kami"</p>
                        </div>
                    </div>

                    <div class="sambutan-letter-col">
                        <div class="sambutan-quote-icon">
                            <i class="bi bi-quote"></i>
                        </div>

                        <p class="sambutan-salam">Assalamu'alaikum warahmatullahi wabarakatuh.</p>
                        <p class="sambutan-salam">Selamat datang di RSU Allam Medica Bumiayu.</p>

                        <p class="sambutan-text">
                            Merupakan sebuah kehormatan bagi kami untuk menjadi bagian dari perjalanan kesehatan masyarakat Kabupaten Brebes dan sekitarnya. Sejak berdiri pada tahun 2012, kami terus bertumbuh dengan satu keyakinan bahwa pelayanan kesehatan terbaik lahir dari perpaduan antara kompetensi, kepedulian, inovasi, dan integritas.
                        </p>
                        <p class="sambutan-text">
                            Di RSU Allam Medica Bumiayu, setiap pasien adalah amanah yang kami layani dengan sepenuh hati. Oleh karena itu, kami terus memperkuat kualitas sumber daya manusia, menghadirkan teknologi medis yang semakin modern, mengembangkan layanan-layanan unggulan, serta membangun budaya pelayanan yang mengutamakan keselamatan pasien, profesionalisme, dan pengalaman berobat yang nyaman.
                        </p>
                        <p class="sambutan-text">
                            Kami percaya bahwa rumah sakit bukan hanya tempat untuk mengobati penyakit, tetapi juga menjadi mitra kesehatan keluarga yang mampu memberikan solusi pelayanan secara komprehensif, cepat, tepat, dan terpercaya.
                        </p>
                        <p class="sambutan-text">
                            Ke depan, kami memiliki komitmen untuk menjadikan RSU Allam Medica Bumiayu sebagai rumah sakit rujukan yang unggul di wilayah selatan Kabupaten Brebes dan sekitarnya melalui pengembangan layanan berbasis kompetensi, digitalisasi pelayanan, peningkatan mutu berkelanjutan, serta penguatan layanan unggulan seperti Neuroscience Center, Rehabilitation Center, Orthopaedi, Jantung, Mata, dan layanan spesialistik lainnya yang didukung oleh fasilitas diagnostik modern dan tenaga kesehatan yang kompeten.
                        </p>
                        <p class="sambutan-text">
                            Kepercayaan masyarakat merupakan motivasi terbesar bagi kami untuk terus berbenah dan memberikan pelayanan yang semakin baik dari waktu ke waktu.
                        </p>
                        <p class="sambutan-text">
                            Kami percaya bahwa pelayanan kesehatan yang unggul lahir dari komitmen untuk terus belajar, berinovasi, dan berkembang. Dengan dukungan masyarakat serta dedikasi seluruh insan RSU Allam Medica Bumiayu, kami optimis melangkah menuju masa depan sebagai rumah sakit yang mampu memberikan pelayanan kesehatan yang berkualitas, berorientasi pada keselamatan pasien, serta menjadi rumah sakit rujukan yang dipercaya masyarakat Brebes dan sekitarnya.
                        </p>

                        <div class="sambutan-motto-box">
                            <p class="sambutan-text">
                                Setiap langkah yang kami lakukan senantiasa berlandaskan pada satu komitmen sederhana namun bermakna, yaitu <strong>"Kesehatan Anda, Tujuan Kami."</strong> Motto ini menjadi semangat bagi seluruh insan RSU Allam Medica Bumiayu untuk terus memberikan pelayanan yang profesional, humanis, dan berorientasi pada kebutuhan setiap pasien.
                            </p>
                        </div>

                        <p class="sambutan-text">
                            Atas nama seluruh keluarga besar RSU Allam Medica Bumiayu, kami mengucapkan terima kasih atas kepercayaan yang telah diberikan. Semoga kami senantiasa dapat menjadi sahabat dan mitra kesehatan terpercaya bagi Anda dan keluarga.
                        </p>

                        <p class="sambutan-text">
                            Wassalamu'alaikum warahmatullahi wabarakatuh.
                        </p>

                        <div class="sambutan-divider"></div>

                        <div class="sambutan-signoff">
                            <div class="icon-box icon-primary">
                                <i class="bi bi-pen-fill"></i>
                            </div>
                            <div>
                                <div class="sambutan-signoff-name">dr. Hardyansyah, MPH-MMR</div>
                                <div class="sambutan-signoff-jabatan">Direktur RSU Allam Medica Bumiayu</div>
                            </div>
                        </div>
                        <div class="sambutan-signoff-tagline">
                            <strong>Kesehatan Anda, Tujuan Kami</strong><br>
                            "Membangun Kepercayaan • Menghadirkan Pelayanan Berkualitas • Menuju Rumah Sakit Rujukan yang Inovatif, Modern, dan Handal."
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- NILAI MEDICA -->
    <section class="medica-section">
        <div class="container">
            <h4 class="fw-bold mb-3">Nilai Keutamaan</h4>
            <h1 class="medica-heading">M-E-D-I-C-A</h1>
            <div class="row g-3">
                <div class="col-6 col-md-4 col-lg-2"><div class="medica-card medica-m text-center"><div class="medica-letter">M</div><div class="medica-name">Melayani Sepenuh Hati</div><p class="medica-desc">Sepenuh hati melayani setiap pasien</p></div></div>
                <div class="col-6 col-md-4 col-lg-2"><div class="medica-card medica-e text-center"><div class="medica-letter">E</div><div class="medica-name">Empati</div><p class="medica-desc">Memahami dan merasakan kondisi pasien</p></div></div>
                <div class="col-6 col-md-4 col-lg-2"><div class="medica-card medica-d text-center"><div class="medica-letter">D</div><div class="medica-name">Disiplin</div><p class="medica-desc">Disiplin dalam bekerja dan pelayanan</p></div></div>
                <div class="col-6 col-md-4 col-lg-2"><div class="medica-card medica-i text-center"><div class="medica-letter">I</div><div class="medica-name">Ikhlas</div><p class="medica-desc">Ikhlas dalam memberikan layanan terbaik</p></div></div>
                <div class="col-6 col-md-4 col-lg-2"><div class="medica-card medica-c text-center"><div class="medica-letter">C</div><div class="medica-name">Cepat</div><p class="medica-desc">Respons cepat dan tindakan yang tepat</p></div></div>
                <div class="col-6 col-md-4 col-lg-2"><div class="medica-card medica-a text-center"><div class="medica-letter">A</div><div class="medica-name">Antusias</div><p class="medica-desc">Bertanggung jawab dan dapat dipercaya</p></div></div>
            </div>
        </div>
    </section>

    <!-- VISI MISI -->
    <section class="visi-misi-section">
        <div class="container">
            <h4 class="fw-bold mb-4">Visi &amp; Misi</h4>
            <div class="visi-block">
                <div class="visi-deco">VISI</div>
                <div class="visi-inner">
                    <div class="visi-icon-box"><i class="bi bi-eye-fill"></i></div>
                    <div>
                        <div class="visi-label">Visi</div>
                        <p class="visi-text">Menjadi Rujukan Utama Pelayanan Kesehatan yang Inovatif, Handal dan Terpercaya di Kabupaten Brebes</p>
                    </div>
                </div>
            </div>
            <div class="misi-block">
                <div class="misi-head">
                    <div class="misi-head-icon"><i class="bi bi-bullseye"></i></div>
                    <div><div class="misi-head-title">Misi</div><div class="misi-head-sub">Langkah strategis pencapaian visi</div></div>
                    <span class="misi-count">4 Poin</span>
                </div>
                <div class="misi-body">
                    <div class="misi-item"><div class="misi-num">1</div><p class="misi-txt">Melaksanakan upaya pelayanan Kesehatan secara profesional dan inovatif melalui adopsi teknologi terbarukan selaras dengan perkembangan zaman.</p></div>
                    <div class="misi-item"><div class="misi-num">2</div><p class="misi-txt">Mewujudkan layanan Kesehatan yang modern dan berorientasi kepada kepuasan pelanggan sesuai dengan kebutuhan Masyarakat.</p></div>
                    <div class="misi-item"><div class="misi-num">3</div><p class="misi-txt">Menjalankan prinsip tatakelola perusahaan yang baik guna menciptakan nilai tambah bagi stakeholders (pelanggan, pekerja, mitrakerja, pemilik, dan masyarakat) dan berdampak positif terhadap lingkungan.</p></div>
                    <div class="misi-item"><div class="misi-num">4</div><p class="misi-txt">Mengembangkan infrastruktur modern dan tatakelola sumberdaya manusia berkualitas guna mencapai SDM yang Unggul, Kompeten dan berdaya saing.</p></div>
                </div>
            </div>
        </div>
    </section>

    <!-- STRUKTUR ORGANISASI -->
    <section class="struktur-section">
        <div class="container">
            <h4 class="fw-bold mb-2 text-center">Struktur Organisasi</h4>
            <p class="text-center text-muted mb-5" style="font-size:13.5px;">Susunan tata kelola RSU Allam Medica Bumiayu</p>

            <!-- TOP: DIREKTUR, KOMITE/TIM, SPI -->
            <div class="org-top-chart">
                <div class="org-node org-direktur">
                    <div class="jabatan">Direktur</div>
                    <div class="nama">dr. Hardyansyah, MPH-MMR</div>
                </div>
                <div class="org-connector"></div>
                <div class="org-top-row">
                    <div class="org-node org-side">
                        <div class="jabatan">Komite / Tim</div>
                    </div>
                    <div class="org-node org-side">
                        <div class="jabatan">SPI</div>
                        <div class="nama">
                            dr. Ely Hikmawati, M.H.Kes<br>
                            Akhmad Tauhid, S.T<br>
                            dr. Mutiara Kantika, M.M<br>
                            dr. Novie Eko Puspitasari, M.H.Kes
                        </div>
                    </div>
                </div>
            </div>

            <!-- DUA WAKIL DIREKTUR -->
            <div class="org-wadir-grid">

                <!-- WADIR PELAYANAN -->
                <div class="org-wadir-card">
                    <div class="org-wadir-head">
                        <div class="wh-ornament"></div>
                        <div class="jabatan">Wakil Direktur Pelayanan</div>
                        <div class="nama">dr. Artono Tri Pamungkas, Sp.PD</div>
                    </div>
                    <div class="org-manajer-list" data-accordion-group>
                        <div class="org-manajer-item">
                            <button class="org-manajer-btn" type="button">
                                <div class="om-text"><div class="jabatan">Manajer Pelayanan Medis</div><div class="nama">dr. Nurkholis Majid</div></div>
                                <i class="bi bi-chevron-down org-manajer-chevron"></i>
                            </button>
                            <div class="org-manajer-body">
                                <div class="org-staff-row"><span class="jabatan-kecil">Kepala IMP</span><span class="nama-kecil">dr. Dessy Wulandari, Sp. OG</span></div>
                                <div class="org-staff-row"><span class="jabatan-kecil">Kepala IBS</span><span class="nama-kecil">dr. Heri Sugianto, M.Si.Med., Sp.B</span></div>
                                <div class="org-staff-row"><span class="jabatan-kecil">Kepala ICU</span><span class="nama-kecil">dr. Igun Winarno, Sp.An</span></div>
                                <div class="org-staff-row"><span class="jabatan-kecil">Kepala IGD & Rajal</span><span class="nama-kecil">dr. Lintang Fifgi Andila, Sp.PD</span></div>
                                <div class="org-staff-row"><span class="jabatan-kecil">Kepala IRNA</span><span class="nama-kecil">dr. Iin Nila Nuraini</span></div>
                            </div>
                        </div>
                        <div class="org-manajer-item">
                            <button class="org-manajer-btn" type="button">
                                <div class="om-text"><div class="jabatan">Manajer Penunjang Medis</div><div class="nama">dr. Iput Syarhil Musthofa</div></div>
                                <i class="bi bi-chevron-down org-manajer-chevron"></i>
                            </button>
                            <div class="org-manajer-body">
                                <div class="org-staff-row"><span class="jabatan-kecil">Kepala Inst. Farmasi</span><span class="nama-kecil">Nurul Maryana, S.Farm., Apt</span></div>
                                <div class="org-staff-row"><span class="jabatan-kecil">Kepala Inst. Radiologi</span><span class="nama-kecil">dr. Rochmawati Istutiningrum, Sp.Rad</span></div>
                                <div class="org-staff-row"><span class="jabatan-kecil">Kepala Inst. Laboratorium</span><span class="nama-kecil">dr. Adika Zhulhi Arjana, M.Med.Sc., Sp.PK</span></div>
                                <div class="org-staff-row"><span class="jabatan-kecil">Kepala Inst. BDRS</span><span class="nama-kecil">dr. Adika Zhulhi Arjana, M.Med.Sc., Sp.PK</span></div>
                                <div class="org-staff-row"><span class="jabatan-kecil">Kepala Inst. Rekam Medis</span><span class="nama-kecil">Danang Try Pamungkas, A.Md.Kes</span></div>
                                <div class="org-staff-row"><span class="jabatan-kecil">Kepala Inst. Rehab Medik</span><span class="nama-kecil">Pramudita Setya Widya Utami, S.Kes., Ftr</span></div>
                            </div>
                        </div>
                        <div class="org-manajer-item">
                            <button class="org-manajer-btn" type="button">
                                <div class="om-text"><div class="jabatan">Manajer Penunjang Non Medis</div><div class="nama">dr. Ligar Hervian</div></div>
                                <i class="bi bi-chevron-down org-manajer-chevron"></i>
                            </button>
                            <div class="org-manajer-body">
                                <div class="org-staff-row"><span class="jabatan-kecil">Ka. Inst. Gizi</span><span class="nama-kecil">Tya Yunitasari, S.Tr.Gz</span></div>
                                <div class="org-staff-row"><span class="jabatan-kecil">Ka. Inst. Sanitasi & Linen</span><span class="nama-kecil">Wiyatri Sulharini Rahayu, A.Md, KL</span></div>
                                <div class="org-staff-row"><span class="jabatan-kecil">Ka. Inst. CSSD</span><span class="nama-kecil">Suliyani, A.Md.Keb</span></div>
                                <div class="org-staff-row"><span class="jabatan-kecil">Koor. Ambulance</span><span class="nama-kecil">Syaifulloh</span></div>
                                <div class="org-staff-row"><span class="jabatan-kecil">Koor. Pemulasaraan Jenazah</span><span class="nama-kecil">Mukholifin</span></div>
                                <div class="org-staff-row"><span class="jabatan-kecil">Koor. Security</span><span class="nama-kecil">Diski Farozi</span></div>
                            </div>
                        </div>
                        <div class="org-manajer-item">
                            <button class="org-manajer-btn" type="button">
                                <div class="om-text"><div class="jabatan">Manajer Keperawatan</div><div class="nama">Yunizar, S.Kep., Ners</div></div>
                                <i class="bi bi-chevron-down org-manajer-chevron"></i>
                            </button>
                            <div class="org-manajer-body">
                                <div class="org-staff-row"><span class="jabatan-kecil">Supervisor Keperawatan IGD & Rajal</span><span class="nama-kecil">Efi Trusila Astuti, A.Md.Keb</span></div>
                                <div class="org-staff-row"><span class="jabatan-kecil">Supervisor Keperawatan Intensif & Ranap</span><span class="nama-kecil">Sri Haryati, A.Md.Keb</span></div>
                            </div>
                        </div>
                        <div class="org-manajer-item">
                            <button class="org-manajer-btn" type="button">
                                <div class="om-text"><div class="jabatan">Manajer Casemix</div><div class="nama">dr. Novie Eko Puspitasari, M.H.Kes</div></div>
                                <i class="bi bi-chevron-down org-manajer-chevron"></i>
                            </button>
                            <div class="org-manajer-body">
                                <div class="org-staff-row"><span class="jabatan-kecil">Supervisor Verifikasi Klinis</span><span class="nama-kecil">dr. Ligar Hervian</span></div>
                                <div class="org-staff-row"><span class="jabatan-kecil">Supervisor Klaim & Administrasi Casemix</span><span class="nama-kecil">Citra Widining Afani, A.Md.Keb</span></div>
                                <div class="org-staff-row"><span class="jabatan-kecil">Supervisor Coding & Grouping</span><span class="nama-kecil">Ananda Nur Fajarwati, A.Md.Kes</span></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- WADIR UMUM & KEUANGAN -->
                <div class="org-wadir-card">
                    <div class="org-wadir-head">
                        <div class="wh-ornament"></div>
                        <div class="jabatan">Wakil Direktur Umum & Keuangan</div>
                        <div class="nama">Akhmad Tauhid, S.T</div>
                    </div>
                    <div class="org-manajer-list" data-accordion-group>
                        <div class="org-manajer-item">
                            <button class="org-manajer-btn" type="button">
                                <div class="om-text"><div class="jabatan">Manajer Humas & Kerjasama</div><div class="nama">dr. Soviyanti Wulandari</div></div>
                                <i class="bi bi-chevron-down org-manajer-chevron"></i>
                            </button>
                            <div class="org-manajer-body">
                                <div class="org-staff-row"><span class="jabatan-kecil">Supervisor Humas & Kerjasama</span><span class="nama-kecil">Esih Kurniasih, S.M</span></div>
                                <div class="org-staff-row"><span class="jabatan-kecil">Supervisor Hukum & Kerjasama</span><span class="nama-kecil">Gani Yunanto, S.H</span></div>
                                <div class="org-staff-row"><span class="jabatan-kecil">Supervisor Marketing</span><span class="nama-kecil">Ns. Anggraeni, S.Kep</span></div>
                            </div>
                        </div>
                        <div class="org-manajer-item">
                            <button class="org-manajer-btn" type="button">
                                <div class="om-text"><div class="jabatan">Manajer Administrasi Umum & Remunisasi</div><div class="nama">Erdaf Galih Tri Abimanyu, S.M</div></div>
                                <i class="bi bi-chevron-down org-manajer-chevron"></i>
                            </button>
                            <div class="org-manajer-body">
                                <div class="org-staff-row"><span class="jabatan-kecil">Supervisor Alkes & Non Alkes</span><span class="nama-kecil">Muhammad Zulfa Amarta, S.M</span></div>
                                <div class="org-staff-row"><span class="jabatan-kecil">Supervisor SIM RS & Pelaporan</span><span class="nama-kecil">Tri Setiyo Nugroho, A.Md</span></div>
                            </div>
                        </div>
                        <div class="org-manajer-item">
                            <button class="org-manajer-btn" type="button">
                                <div class="om-text"><div class="jabatan">Manajer Keuangan</div><div class="nama">Adi Susilo, S.E</div></div>
                                <i class="bi bi-chevron-down org-manajer-chevron"></i>
                            </button>
                            <div class="org-manajer-body">
                                <div class="org-staff-row"><span class="jabatan-kecil">Supervisor Perbendaharaan</span><span class="nama-kecil">Siti Marwati</span></div>
                                <div class="org-staff-row"><span class="jabatan-kecil">Supervisor Pendapatan</span><span class="nama-kecil">Rohmah Dewi Komalasari, S.Ak</span></div>
                                <div class="org-staff-row"><span class="jabatan-kecil">Supervisor Akuntansi</span><span class="nama-kecil">Lailatul Amaliah, S.E</span></div>
                            </div>
                        </div>
                        <div class="org-manajer-item">
                            <button class="org-manajer-btn" type="button">
                                <div class="om-text"><div class="jabatan">Manajer HR</div><div class="nama">dr. Rivai Harun Arrasid</div></div>
                                <i class="bi bi-chevron-down org-manajer-chevron"></i>
                            </button>
                            <div class="org-manajer-body">
                                <div class="org-staff-row"><span class="jabatan-kecil">Supervisor Kepegawaian</span><span class="nama-kecil">Plt. Tresno Waluyo</span></div>
                                <div class="org-staff-row"><span class="jabatan-kecil">Supervisor Diklat</span><span class="nama-kecil">Dikara Nurmalitasari, S.ST</span></div>
                            </div>
                        </div>
                        <div class="org-manajer-item">
                            <button class="org-manajer-btn" type="button">
                                <div class="om-text"><div class="jabatan">Manajer Sarpras</div><div class="nama">Gani Yunanto, S.H</div></div>
                                <i class="bi bi-chevron-down org-manajer-chevron"></i>
                            </button>
                            <div class="org-manajer-body">
                                <div class="org-staff-row"><span class="jabatan-kecil">Supervisor Bangunan & Engineering</span><span class="nama-kecil">M. Lukman Nur Hamdani</span></div>
                                <div class="org-staff-row"><span class="jabatan-kecil">Supervisor IPSRS</span><span class="nama-kecil">Bahtiar Ismono Hadi</span></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- TIMELINE -->
    <section class="timeline-section">
        <div class="container">
            <h4 class="fw-bold mb-5 text-center">Tonggak Sejarah</h4>
            <div class="timeline">
                <div class="timeline-item left" data-aos="fade-right">
                    <div class="timeline-icon icon-1"><i class="bi bi-house-heart-fill"></i></div>
                    <div class="timeline-card"><div class="timeline-year">2008</div><div class="timeline-text">503.10/KPT/007/IV/2008 Rumah Bersalin dan Balai Pengobatan Allam Medica Bumiayu.</div></div>
                </div>
                <div class="timeline-item right" data-aos="fade-left">
                    <div class="timeline-icon icon-2"><i class="bi bi-file-earmark-check-fill"></i></div>
                    <div class="timeline-card"><div class="timeline-year">2011</div><div class="timeline-text">Mendapat izin resmi sebagai Rumah Sakit.</div></div>
                </div>
                <div class="timeline-item left" data-aos="fade-right">
                    <div class="timeline-icon icon-3"><i class="bi bi-hospital-fill"></i></div>
                    <div class="timeline-card"><div class="timeline-year">2015</div><div class="timeline-text">503.10/KPPT/02797/IX/2015 Ijin Operasional Tetap RSU Allam Medica Bumiayu.</div></div>
                </div>
                <div class="timeline-item right" data-aos="fade-left">
                    <div class="timeline-icon icon-4"><i class="bi bi-award-fill"></i></div>
                    <div class="timeline-card"><div class="timeline-year">2023</div><div class="timeline-text">RSU Allam Medica resmi menjadi Rumah Sakit Tipe C.</div></div>
                </div>
            </div>
        </div>
    </section>

    <!-- FILOSOFI -->
    <section class="filosofi-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="filosofi-card card-filosofi">
                        <div class="bg-label">F</div>
                        <div class="filosofi-header">
                            <div class="filosofi-icon icon-filosofi"><i class="bi bi-lightbulb-fill"></i></div>
                            <div class="filosofi-title">Filosofi RSU Allam Medica</div>
                        </div>
                        <p class="filosofi-text">Rumah Sakit yang memberikan pelayanan medis, rujukan medis yang terintegrasi dalam pelayanan, dengan menjunjung tinggi rasa kemanusiaan sehingga tercapai derajat kesehatan yang optimal bagi masyarakat</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="filosofi-card card-semboyan">
                        <div class="bg-label">S</div>
                        <div class="filosofi-header">
                            <div class="filosofi-icon icon-semboyan"><i class="bi bi-chat-heart-fill"></i></div>
                            <div class="filosofi-title">Makna Semboyan</div>
                        </div>
                        <p class="filosofi-text">"Kesehatan Anda, Tujuan Kami"</p>
                        <p class="filosofi-text">Setiap langkah pelayanan kami selalu berorientasi pada kesembuhan dan kepuasan pasien. Kesehatan Anda adalah prioritas utama yang menjadi alasan kami hadir.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- AKREDITASI -->
    <section class="akreditasi-section">
        <div class="container">
            <h4 class="fw-bold mb-4">Status Akreditasi</h4>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="akreditasi-card">
                        <div class="ak-ornament"></div>
                        <div class="akreditasi-badge"><i class="bi bi-patch-check-fill"></i></div>
                        <div class="akreditasi-info">
                            <div class="akreditasi-label">Status Akreditasi</div>
                            <div class="akreditasi-title">Akreditasi Paripurna</div>
                            <div class="akreditasi-desc">Terakreditasi oleh Komisi Akreditasi Rumah Sakit (KARS) No. Sertifikat: KARS-SERT/482/XI/2022 - Berlaku s.d. 23 November 2026</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="akreditasi-card">
                        <div class="ak-ornament"></div>
                        <div class="akreditasi-badge"><i class="bi bi-award-fill"></i></div>
                        <div class="akreditasi-info">
                            <div class="akreditasi-label">Kelas Rumah Sakit</div>
                            <div class="akreditasi-title">Rumah Sakit Umum Tipe C</div>
                            <div class="akreditasi-desc">Ditetapkan berdasarkan SK 91/2008/02/7/2001, resmi menjadi Tipe C sejak tahun 2023.</div>
                        </div>
                    </div>
                </div>
            </div>

            <h5 class="tt-heading">Kapasitas Tempat Tidur</h5>

            <div class="tt-grid">
                <div class="tt-card">
                    <div class="tt-icon"><i class="bi bi-star-fill"></i></div>
                    <div class="tt-jumlah">8</div>
                    <div class="tt-satuan">Tempat Tidur</div>
                    <div class="tt-nama">VIP</div>
                </div>
                <div class="tt-card">
                    <div class="tt-icon"><i class="bi bi-hospital"></i></div>
                    <div class="tt-jumlah">24</div>
                    <div class="tt-satuan">Tempat Tidur</div>
                    <div class="tt-nama">Kelas I</div>
                </div>
                <div class="tt-card">
                    <div class="tt-icon"><i class="bi bi-hospital"></i></div>
                    <div class="tt-jumlah">12</div>
                    <div class="tt-satuan">Tempat Tidur</div>
                    <div class="tt-nama">Kelas II</div>
                </div>
                <div class="tt-card">
                    <div class="tt-icon"><i class="bi bi-hospital"></i></div>
                    <div class="tt-jumlah">58</div>
                    <div class="tt-satuan">Tempat Tidur</div>
                    <div class="tt-nama">Kelas III</div>
                </div>
                <div class="tt-card">
                    <div class="tt-icon"><i class="bi bi-activity"></i></div>
                    <div class="tt-jumlah">4</div>
                    <div class="tt-satuan">Tempat Tidur</div>
                    <div class="tt-nama">Intermediate</div>
                </div>
                <div class="tt-card">
                    <div class="tt-icon"><i class="bi bi-shield-fill-plus"></i></div>
                    <div class="tt-jumlah">14</div>
                    <div class="tt-satuan">Tempat Tidur</div>
                    <div class="tt-nama">Isolasi</div>
                    <div class="tt-note">Cempaka 1 · Perina 3 · Dahlia 8 · Freesia 1 · BGV 1</div>
                </div>
                <div class="tt-card">
                    <div class="tt-icon"><i class="bi bi-heart-pulse-fill"></i></div>
                    <div class="tt-jumlah">9</div>
                    <div class="tt-satuan">Tempat Tidur</div>
                    <div class="tt-nama">ICU, RICU, ICCU</div>
                    <div class="tt-note">ICU 7 · RICU 1 · ICCU 1</div>
                </div>
                <div class="tt-card">
                    <div class="tt-icon"><i class="bi bi-heart-pulse-fill"></i></div>
                    <div class="tt-jumlah">7</div>
                    <div class="tt-satuan">Tempat Tidur</div>
                    <div class="tt-nama">PICU, NICU, HCU</div>
                    <div class="tt-note">PICU 2 · NICU 3 · HCU 2</div>
                </div>
                <div class="tt-card">
                    <div class="tt-icon"><i class="bi bi-file-medical-fill"></i></div>
                    <div class="tt-jumlah">4</div>
                    <div class="tt-satuan">Tempat Tidur</div>
                    <div class="tt-nama">Perina</div>
                </div>
                <div class="tt-total-card">
                    <div class="tt-icon"><i class="bi bi-grid-fill"></i></div>
                    <div class="tt-jumlah">140</div>
                    <div class="tt-satuan">Tempat Tidur</div>
                    <div class="tt-nama">Total Keseluruhan</div>
                </div>
            </div>

            <h5 class="tt-subheading">Tempat Tidur Tindakan</h5>
            <div class="tt-grid">
                <div class="tt-card">
                    <div class="tt-icon"><i class="bi bi-bandaid-fill"></i></div>
                    <div class="tt-jumlah">12</div>
                    <div class="tt-satuan">Tempat Tidur</div>
                    <div class="tt-nama">IGD</div>
                </div>
                <div class="tt-card">
                    <div class="tt-icon"><i class="bi bi-clipboard2-pulse"></i></div>
                    <div class="tt-jumlah">3</div>
                    <div class="tt-satuan">Tempat Tidur</div>
                    <div class="tt-nama">VK Observasi</div>
                </div>
                <div class="tt-card">
                    <div class="tt-icon"><i class="bi bi-clipboard2-pulse"></i></div>
                    <div class="tt-jumlah">4</div>
                    <div class="tt-satuan">Tempat Tidur</div>
                    <div class="tt-nama">VK Tindakan</div>
                </div>
                <div class="tt-card">
                    <div class="tt-icon"><i class="bi bi-hospital-fill"></i></div>
                    <div class="tt-jumlah">5</div>
                    <div class="tt-satuan">Tempat Tidur</div>
                    <div class="tt-nama">IBS</div>
                </div>
            </div>
        </div>
    </section>

</div> <!-- End about-flow wrapper -->

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
                    <li><a href="{{ url('/layanan#intensif') }}">ICU / NICU / HCU</a></li>
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
<!-- ============================================================
     FLOATING WHATSAPP BUTTON & MODAL
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
     SCRIPTS
============================================================ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>AOS.init({ duration:800, once:true });</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    /* ─── Navbar & Drawer Logic ─── */
    const burger  = document.getElementById('navBurger');
    const drawer  = document.getElementById('navDrawer');
    const overlay = document.getElementById('navOverlay');
    const closeBtn= document.getElementById('drawerClose');
    const navbar  = document.getElementById('mainNavbar');

    function openDrawer()  { burger.classList.add('open');drawer.classList.add('open');overlay.classList.add('show');document.body.style.overflow='hidden'; }
    function closeDrawer() { burger.classList.remove('open');drawer.classList.remove('open');overlay.classList.remove('show');if(!bsOpen())document.body.style.overflow=''; }

    if(burger) burger.addEventListener('click', e => { e.stopPropagation(); drawer.classList.contains('open') ? closeDrawer() : openDrawer(); });
    if(closeBtn) closeBtn.addEventListener('click', closeDrawer);
    if(overlay) overlay.addEventListener('click', () => { closeDrawer(); closeBs(); });
    if(drawer) drawer.querySelectorAll('.d-link, .d-sub-link').forEach(l => l.addEventListener('click', closeDrawer));

    if(drawer) {
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
    }

    if(navbar) window.addEventListener('scroll', () => navbar.classList.toggle('scrolled', window.scrollY > 10), { passive: true });

    /* ─── Mega Dropdown Desktop ─── */
    const kontakWrap = document.getElementById('kontakWrap');
    const kontakMega = document.getElementById('kontakMega');
    let megaTimer;

    if (kontakWrap && kontakMega) {
        kontakWrap.addEventListener('mouseenter', () => { clearTimeout(megaTimer); kontakMega.classList.add('open'); });
        kontakWrap.addEventListener('mouseleave', () => { megaTimer = setTimeout(() => kontakMega.classList.remove('open'), 120); });
        kontakMega.addEventListener('mouseenter', () => clearTimeout(megaTimer));
        kontakMega.addEventListener('mouseleave', () => { megaTimer = setTimeout(() => kontakMega.classList.remove('open'), 120); });

        const btnDesk = document.getElementById('btnKontakDesktop');
        if(btnDesk) {
            btnDesk.addEventListener('click', function(e) {
                e.stopPropagation();
                kontakMega.classList.toggle('open');
            });
        }
        document.addEventListener('click', function(e) {
            if (!kontakWrap.contains(e.target)) kontakMega.classList.remove('open');
        });
    }

    /* ─── Bottom Sheet Mobile ─── */
    const bsSheet   = document.getElementById('bsSheet');
    const bsOverlay = document.getElementById('bsOverlay');
    const bsClose   = document.getElementById('bsClose');
    const btnMobile = document.getElementById('btnKontakMobile');

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

    /* ─── Floating WhatsApp Button Logic ─── */
    const waButton        = document.getElementById('waFloatButton');
    const waTooltip       = document.getElementById('waTooltip');
    const waTooltipClose  = document.getElementById('waTooltipClose');
    const waModalOverlay  = document.getElementById('waModalOverlay');
    const waCancelBtn     = document.getElementById('waCancelBtn');
    const waContinueBtn   = document.getElementById('waContinueBtn');

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

    /* ─── Accordion Manager SO ─── */
    document.querySelectorAll('.org-manajer-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const body = this.parentElement.querySelector('.org-manajer-body');
            const isOpen = body.classList.contains('open');
            body.classList.toggle('open', !isOpen);
            this.classList.toggle('open', !isOpen);
        });
    });

});
</script>
</body>
</html>