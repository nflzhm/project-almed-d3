<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ isset($loker) ? $loker->judul . ' — ' : '' }}Karir RSU Allam Medica</title>
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

    h1, h2, h3, h4, h5, .kontak-form-title, .bs-form-title {
        font-family: 'GothamBlack', sans-serif !important;
    }

    :root {
        --navy:         #1C145C;
        --navy-mid:     #231a72;
        --navy-light:   #2d2480;
        --blue:         #0ea5e9;
        --blue-dark:    #0284c7;
        --blue-light:   #e0f2fe;
        --cyan:         #06b6d4;
        --white:        #ffffff;
        --body-bg:      #ffffff;
        --card-bg:      #ffffff;
        --text-main:    #0f172a;
        --text-muted:   #64748b;
        --border:       #e2e8f0;
        --radius:       16px;
        --radius-sm:    10px;
        --shadow-sm:    0 2px 8px rgba(0,0,0,.06);
        --shadow-md:    0 8px 32px rgba(28,20,92,.1);
        --shadow-lg:    0 20px 60px rgba(28,20,92,.15);
        --transition:   .22s cubic-bezier(.4,0,.2,1);
    }

    /* ========================================
       BASE & TOPBAR
    ======================================== */
    body {
        font-family: 'Segoe UI', sans-serif;
        background: var(--body-bg);
        overflow-x: hidden;
        padding-top: 38px; /* REVISI: Hero nempel di bawah topbar */
        position: relative;
        margin: 0;
    }

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
    .drop-menu-layanan { 
        min-width: 420px; 
        max-width: min(94vw, 480px); 
        padding: 14px; 
        display: grid; 
        grid-template-columns: repeat(2, minmax(0, 1fr)); 
        gap: 10px 12px; 
        align-items: start; 
    }
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
       KARIR SPECIFIC ORNAMEN & STYLES
    ============================================================ */
    .ornamen {
        position: absolute;
        background-image: url('{{ asset("images/beranda/ornamen.png") }}');
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        pointer-events: none;
        z-index: 0;
    }

    .loker-hero {
        background: linear-gradient(135deg, var(--navy) 0%, var(--navy-light) 50%, #1e40af 100%);
        position: relative; overflow: hidden;
        padding: 100px 0 80px; 
        color: #fff;
    }
    .loker-hero::before {
        content: ''; position: absolute; right: -100px; top: -100px;
        width: 500px; height: 500px; border-radius: 50%;
        background: radial-gradient(circle, rgba(14,165,233,.15), transparent 65%);
        pointer-events: none;
    }
    .loker-hero::after {
        content: ''; position: absolute; left: -60px; bottom: -120px;
        width: 350px; height: 350px; border-radius: 50%;
        background: radial-gradient(circle, rgba(6,182,212,.12), transparent 65%);
        pointer-events: none;
    }
    .hero-dot-grid {
        position: absolute; inset: 0; pointer-events: none;
        background-image: radial-gradient(rgba(255,255,255,.06) 1px, transparent 1px);
        background-size: 28px 28px;
    }
    .hero-content { position: relative; z-index: 2; }
    .hero-breadcrumb { display: flex; align-items: center; gap: 8px; margin-bottom: 20px; }
    .hero-breadcrumb a { color: rgba(255,255,255,.6); font-size: 13px; font-weight: 500; text-decoration: none; transition: color var(--transition); display: flex; align-items: center; gap: 5px; }
    .hero-breadcrumb a:hover { color: #fff; }
    .hero-breadcrumb .sep { color: rgba(255,255,255,.3); font-size: 11px; }
    .hero-breadcrumb .current { color: rgba(255,255,255,.85); font-size: 13px; font-weight: 600; }
    .hero-new-badge {
        display: inline-flex; align-items: center; gap: 6px;
        background: linear-gradient(135deg, var(--blue), var(--cyan));
        color: #fff; font-size: 11px; font-weight: 800;
        text-transform: uppercase; letter-spacing: 1px;
        padding: 5px 14px; border-radius: 20px; margin-bottom: 16px;
        box-shadow: 0 4px 14px rgba(14,165,233,.4);
    }
    .hero-title {
        font-family: 'DM Serif Display', serif;
        font-size: clamp(28px, 5vw, 46px); font-weight: 400; color: #fff;
        line-height: 1.2; letter-spacing: -.5px; margin-bottom: 20px;
    }
    .hero-meta { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
    .hero-meta-pill {
        display: inline-flex; align-items: center; gap: 7px;
        background: rgba(255,255,255,.1); border: 1px solid rgba(255,255,255,.15);
        color: rgba(255,255,255,.85); font-size: 12.5px; font-weight: 600;
        padding: 6px 14px; border-radius: 20px; backdrop-filter: blur(8px);
    }
    .hero-meta-pill i { font-size: 11px; color: var(--blue); }
    .hero-img-wrap { position: relative; z-index: 2; display: flex; justify-content: center; align-items: center; }
    .hero-img-card {
        width: 100%; max-width: 440px; border-radius: 20px; overflow: hidden;
        box-shadow: 0 24px 64px rgba(0,0,0,.35); border: 2px solid rgba(255,255,255,.1);
        aspect-ratio: 16/10;
    }
    .hero-img-card img { width: 100%; height: 100%; object-fit: cover; display: block; }
    .hero-img-placeholder {
        width: 100%; height: 100%; background: linear-gradient(135deg, rgba(14,165,233,.2), rgba(6,182,212,.15));
        display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 12px;
    }
    .hero-img-placeholder i { font-size: 52px; color: rgba(255,255,255,.25); }
    .hero-img-placeholder span { font-size: 13px; color: rgba(255,255,255,.35); font-weight: 600; letter-spacing: .5px; }
    
    .loker-body { padding: 56px 0 72px; }
    .desc-card {
        background: var(--card-bg); border-radius: var(--radius);
        border: 1px solid var(--border); box-shadow: var(--shadow-sm); overflow: hidden;
        animation: fadeUp .5s ease both;
    }
    @keyframes fadeUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    .desc-card-header { padding: 20px 28px 18px; border-bottom: 1px solid var(--border); display: flex; align-items: center; gap: 12px; }
    .desc-card-header .dch-icon {
        width: 38px; height: 38px; border-radius: 10px; background: var(--blue-light);
        color: var(--blue-dark); display: flex; align-items: center; justify-content: center; font-size: 15px;
    }
    .desc-card-header .dch-title { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 15px; font-weight: 800; color: var(--text-main); }
    .desc-card-header .dch-sub { font-size: 12px; color: var(--text-muted); margin-top: 2px; }
    .desc-card-body { padding: 24px 28px; }
    .loker-desc-content { font-size: 15px; line-height: 1.85; color: #334155; white-space: pre-wrap; word-break: break-word; }
    .loker-desc-content p { margin-bottom: 14px; }
    .loker-desc-content ul, .loker-desc-content ol { padding-left: 20px; margin-bottom: 14px; }
    .loker-desc-content li { margin-bottom: 6px; }
    .loker-desc-content strong { color: var(--text-main); font-weight: 700; }
    
    .sidebar-card {
        background: var(--card-bg); border-radius: var(--radius); border: 1px solid var(--border);
        box-shadow: var(--shadow-sm); overflow: hidden; margin-bottom: 20px;
        animation: fadeUp .5s ease both;
    }
    .sidebar-card:nth-child(2) { animation-delay: .1s; }
    .sidebar-card:nth-child(3) { animation-delay: .2s; }
    .sc-header {
        padding: 16px 22px 14px; border-bottom: 1px solid var(--border);
        font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13px; font-weight: 800;
        color: var(--text-main); display: flex; align-items: center; gap: 8px;
    }
    .sc-header i { color: var(--blue); font-size: 12px; }
    .sc-body { padding: 18px 22px; }
    
    .info-row { display: flex; align-items: flex-start; gap: 12px; padding: 10px 0; border-bottom: 1px solid var(--border); }
    .info-row:last-child { border-bottom: 0; padding-bottom: 0; }
    .info-row-icon {
        width: 34px; height: 34px; border-radius: 8px; flex-shrink: 0;
        display: flex; align-items: center; justify-content: center; font-size: 13px; margin-top: 1px;
    }
    .info-row-label { font-size: 11px; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: .6px; }
    .info-row-val { font-size: 13.5px; font-weight: 600; color: var(--text-main); margin-top: 3px; line-height: 1.4; }
    
    .apply-card {
        background: linear-gradient(145deg, var(--navy), var(--navy-light));
        border-radius: var(--radius); padding: 28px 24px; text-align: center;
        position: relative; overflow: hidden; box-shadow: var(--shadow-md);
        animation: fadeUp .5s .15s ease both;
    }
    .apply-card::before {
        content: ''; position: absolute; right: -40px; top: -40px;
        width: 140px; height: 140px; border-radius: 50%;
        background: radial-gradient(circle, rgba(14,165,233,.2), transparent 70%);
    }
    .apply-card::after {
        content: ''; position: absolute; left: -30px; bottom: -50px;
        width: 120px; height: 120px; border-radius: 50%;
        background: radial-gradient(circle, rgba(6,182,212,.15), transparent 70%);
    }
    .apply-card-icon {
        width: 56px; height: 56px; border-radius: 16px; background: rgba(255,255,255,.12);
        display: flex; align-items: center; justify-content: center; font-size: 22px;
        color: var(--blue); margin: 0 auto 14px; position: relative; z-index: 1;
    }
    .apply-card-title { font-family: 'DM Serif Display', serif; font-size: 20px; color: #fff; margin-bottom: 8px; position: relative; z-index: 1; }
    .apply-card-sub { font-size: 13px; color: rgba(255,255,255,.6); line-height: 1.5; margin-bottom: 20px; position: relative; z-index: 1; }
    .btn-apply {
        display: block; width: 100%; padding: 14px; border-radius: var(--radius-sm);
        background: linear-gradient(130deg, var(--blue), var(--cyan));
        color: #fff; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 14px; font-weight: 800;
        text-decoration: none; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px;
        box-shadow: 0 6px 20px rgba(14,165,233,.4); transition: transform var(--transition), box-shadow var(--transition);
        position: relative; z-index: 1;
    }
    .btn-apply:hover { transform: translateY(-2px); color: #fff; box-shadow: 0 12px 32px rgba(14,165,233,.5); }
    .apply-email-note { margin-top: 12px; font-size: 12px; color: rgba(255,255,255,.45); position: relative; z-index: 1; display: flex; align-items: center; justify-content: center; gap: 5px; }
    
    .share-btns { display: flex; gap: 8px; }
    .share-btn {
        flex: 1; display: flex; align-items: center; justify-content: center; gap: 6px;
        padding: 10px; border-radius: var(--radius-sm); border: 1.5px solid var(--border);
        font-size: 12.5px; font-weight: 700; cursor: pointer; text-decoration: none;
        background: var(--body-bg); color: var(--text-main);
        transition: background var(--transition), border-color var(--transition), color var(--transition), transform var(--transition);
    }
    .share-btn:hover { transform: translateY(-2px); }
    .share-wa:hover { background: #25D366; border-color: #25D366; color: #fff; }
    .share-copy:hover { background: var(--blue); border-color: var(--blue); color: #fff; }
    .share-copy.copied { background: #10b981; border-color: #10b981; color: #fff; }
    
    .other-loker-item { display: flex; align-items: center; gap: 12px; padding: 12px 0; border-bottom: 1px solid var(--border); text-decoration: none; color: var(--text-main); transition: background var(--transition); border-radius: var(--radius-sm); cursor: pointer; }
    .other-loker-item:last-child { border-bottom: 0; }
    .other-loker-item:hover .oli-title { color: var(--blue); }
    .oli-icon { width: 40px; height: 40px; border-radius: 10px; flex-shrink: 0; overflow: hidden; background: var(--blue-light); display: flex; align-items: center; justify-content: center; }
    .oli-icon img { width: 100%; height: 100%; object-fit: cover; }
    .oli-icon i { font-size: 16px; color: var(--blue); }
    .oli-title { font-size: 13px; font-weight: 700; color: var(--text-main); line-height: 1.35; transition: color var(--transition); }
    .oli-date { font-size: 11px; color: var(--text-muted); margin-top: 3px; }
    
    .loker-tags { display: flex; flex-wrap: wrap; gap: 6px; margin-top: 16px; }
    .loker-tag { display: inline-flex; align-items: center; gap: 5px; background: var(--blue-light); color: var(--blue-dark); font-size: 12px; font-weight: 700; padding: 5px 12px; border-radius: 20px; border: 1px solid rgba(14,165,233,.2); }

    .back-float {
        position: fixed; bottom: 28px; right: 28px; z-index: 100;
        display: flex; align-items: center; gap: 8px;
        padding: 12px 20px; border-radius: 30px; background: var(--navy); color: #fff;
        font-size: 13px; font-weight: 700; text-decoration: none;
        box-shadow: 0 8px 24px rgba(28,20,92,.3); transition: transform var(--transition), box-shadow var(--transition); border: 1.5px solid rgba(255,255,255,.1);
    }
    .back-float:hover { transform: translateY(-3px); box-shadow: 0 14px 36px rgba(28,20,92,.4); color: #fff; }

    /* Specific to Loker List Section */
    .loker-section { padding: 100px 0 10px; background: #fff; } /* Menambahkan padding agar header tak menabrak Navbar di atas */
    .loker-wrap { max-width: 900px; }
    .loker-label { font-size: 12px; font-weight: 600; color: #888; letter-spacing: 2px; text-transform: uppercase; }
    .loker-heading { font-size: 32px; font-weight: 800; color: #1C145C; margin: 10px 0; }
    .loker-desc { font-size: 14px; color: #444; line-height: 1.6; }

    @media(max-width:991.98px) {
        .loker-hero { padding: 100px 0 64px; }
        .hero-img-wrap { margin-top: 36px; }
        .loker-body { padding: 40px 0 56px; }
    }
    @media(max-width:575.98px) {
        .hero-title { font-size: 26px; }
        .desc-card-body { padding: 20px; }
        .sc-body { padding: 16px 18px; }
        .back-float { bottom: 16px; right: 16px; padding: 10px 16px; }
    }

    
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
            <a href="{{ url('/layanan#rehab') }}"        class="d-sub-link"><i class="bi bi-person-wheelchair"></i> Fisioterapi</a>
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
     KONTEN HALAMAN KARIR (DETAIL ATAU LIST)
============================================================ -->
@if(isset($loker) && isset($loker->judul))

<a href="{{ url('/karir') }}" class="back-float">
    <i class="fa-solid fa-arrow-left"></i> Kembali
</a>

<section class="loker-hero">
    <div class="hero-dot-grid"></div>

    <div class="container">
        <div class="row align-items-center g-5">

            {{-- LEFT: Text --}}
            <div class="col-lg-7">
                <div class="hero-content">

                    {{-- Breadcrumb --}}
                    <div class="hero-breadcrumb">
                        <a href="/"><i class="bi bi-house-fill"></i> Beranda</a>
                        <span class="sep"><i class="bi bi-chevron-right"></i></span>
                        <a href="{{ url('/karir') }}">
                            Karir
                        </a>
                        <span class="sep"><i class="bi bi-chevron-right"></i></span>
                        <span class="current">Detail Loker</span>
                    </div>

                    {{-- NEW badge --}}
                    @if(\Carbon\Carbon::parse($loker->created_at)->diffInDays(now()) <= 7)
                    <div class="hero-new-badge">
                        <i class="fa-solid fa-bolt" style="font-size:10px;"></i>
                        Lowongan Baru
                    </div>
                    @endif

                    {{-- Title --}}
                    <h1 class="hero-title">{{ $loker->judul }}</h1>

                    {{-- Meta --}}
                    <div class="hero-meta">
                        <span class="hero-meta-pill">
                            <i class="fa-solid fa-hospital"></i>
                            RSU Allam Medica Bumiayu
                        </span>
                        <span class="hero-meta-pill">
                            <i class="fa-regular fa-calendar"></i>
                            Diposting {{ \Carbon\Carbon::parse($loker->created_at)->translatedFormat('d F Y') }}
                        </span>
                        <span class="hero-meta-pill">
                            <i class="fa-solid fa-location-dot"></i>
                            Bumiayu, Brebes
                        </span>
                    </div>

                </div>
            </div>

            {{-- RIGHT: Image --}}
            <div class="col-lg-5">
                <div class="hero-img-wrap">
                    <div class="hero-img-card">
                        @if($loker->gambar)
                            <img src="{{ asset('storage/' . $loker->gambar) }}"
                                 alt="{{ $loker->judul }}">
                        @else
                            <div class="hero-img-placeholder">
                                <i class="fa-solid fa-briefcase"></i>
                                <span>{{ $loker->judul }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- MAIN BODY -->
<section class="loker-body">
    <div class="container">
        <div class="row g-4">

            <!-- MAIN COLUMN — Deskripsi -->
            <div class="col-lg-8">

                {{-- Deskripsi card --}}
                <div class="desc-card">
                    <div class="desc-card-header">
                        <div class="dch-icon"><i class="fa-solid fa-file-lines"></i></div>
                        <div>
                            <div class="dch-title">Deskripsi & Kualifikasi</div>
                            <div class="dch-sub">Informasi lengkap posisi yang dibutuhkan</div>
                        </div>
                    </div>
                    <div class="desc-card-body">
                        <div class="loker-desc-content">{!! nl2br(e($loker->deskripsi)) !!}</div>

                        {{-- Tags --}}
                        <div class="loker-tags">
                            <span class="loker-tag"><i class="fa-solid fa-tag" style="font-size:9px;"></i> Full Time</span>
                            <span class="loker-tag"><i class="fa-solid fa-location-dot" style="font-size:9px;"></i> Bumiayu</span>
                            <span class="loker-tag"><i class="fa-solid fa-briefcase-medical" style="font-size:9px;"></i> Kesehatan</span>
                            <span class="loker-tag"><i class="fa-regular fa-clock" style="font-size:9px;"></i> On-site</span>
                        </div>
                    </div>
                </div>

                {{-- Cara Melamar card --}}
                <div class="desc-card" style="margin-top:20px;animation-delay:.1s;">
                    <div class="desc-card-header">
                        <div class="dch-icon" style="background:#d1fae5;color:#059669;">
                            <i class="fa-solid fa-paper-plane"></i>
                        </div>
                        <div>
                            <div class="dch-title">Cara Melamar</div>
                            <div class="dch-sub">Ikuti langkah berikut untuk mengirim lamaran</div>
                        </div>
                    </div>
                    <div class="desc-card-body">

                        <div style="display:flex;flex-direction:column;gap:16px;">
                            {{-- Step 1 --}}
                            <div style="display:flex;gap:14px;align-items:flex-start;">
                                <div style="width:36px;height:36px;border-radius:10px;background:#e0f2fe;color:#0284c7;
                                            display:flex;align-items:center;justify-content:center;
                                            font-family:'Plus Jakarta Sans',sans-serif;font-size:14px;font-weight:800;flex-shrink:0;">
                                    1
                                </div>
                                <div>
                                    <div style="font-size:14px;font-weight:700;color:var(--text-main);margin-bottom:4px;">
                                        Siapkan Berkas Lamaran
                                    </div>
                                    <div style="font-size:13px;color:var(--text-muted);line-height:1.6;">
                                        CV terbaru,dan surat lamaran kerja, fotokopi ijazah, fotocopy KTP,
                                        pas foto 3×4, Sertifikat pendukung, STR/SIP aktif (jika diperlukan).
                                    </div>
                                </div>
                            </div>

                            {{-- Step 2 --}}
                            <div style="display:flex;gap:14px;align-items:flex-start;">
                                <div style="width:36px;height:36px;border-radius:10px;background:#d1fae5;color:#059669;
                                            display:flex;align-items:center;justify-content:center;
                                            font-family:'Plus Jakarta Sans',sans-serif;font-size:14px;font-weight:800;flex-shrink:0;">
                                    2
                                </div>
                                <div>
                                    <div style="font-size:14px;font-weight:700;color:var(--text-main);margin-bottom:4px;">
                                        Kirim via Email atau Datang Langsung
                                    </div>
                                    <div style="font-size:13px;color:var(--text-muted);line-height:1.6;">
                                        Email ke
                                        <a href="mailto:kepegawaianallammedica@gmail.com"
                                           style="color:var(--blue);font-weight:700;text-decoration:none;">
                                            kepegawaianallammedica@gmail.com
                                        </a>
                                        dengan subject <strong>"Lamaran — {{ $loker->judul }}"</strong>,
                                        atau antar langsung ke bagian HRD RSU Allam Medica.
                                    </div>
                                </div>
                            </div>

                            {{-- Step 3 --}}
                            <div style="display:flex;gap:14px;align-items:flex-start;">
                                <div style="width:36px;height:36px;border-radius:10px;background:#fef3c7;color:#d97706;
                                            display:flex;align-items:center;justify-content:center;
                                            font-family:'Plus Jakarta Sans',sans-serif;font-size:14px;font-weight:800;flex-shrink:0;">
                                    3
                                </div>
                                <div>
                                    <div style="font-size:14px;font-weight:700;color:var(--text-main);margin-bottom:4px;">
                                        Tunggu Konfirmasi
                                    </div>
                                    <div style="font-size:13px;color:var(--text-muted);line-height:1.6;">
                                        Tim HRD kami akan menghubungi pelamar yang memenuhi kualifikasi
                                        untuk proses seleksi selanjutnya. Hanya yang lolos seleksi berkas
                                        yang akan dihubungi.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <!-- SIDEBAR -->
            <div class="col-lg-4">

                {{-- Apply CTA card --}}
                <div class="apply-card mb-4">
                    <div class="apply-card-icon">
                        <i class="fa-solid fa-paper-plane"></i>
                    </div>
                    <div class="apply-card-title">Tertarik dengan posisi ini?</div>
                    <div class="apply-card-sub">
                        Kirimkan lamaran Anda sekarang dan bergabunglah bersama tim RSU Allam Medica.
                    </div>
                    <a href="mailto:kepegawaianallammedica@gmail.com?subject=Lamaran — {{ urlencode($loker->judul) }}"
                       class="btn-apply">
                        <i class="fa-solid fa-paper-plane"></i>
                        Kirim Lamaran Sekarang
                    </a>
                    <div class="apply-email-note">
                        <i class="fa-regular fa-envelope" style="font-size:11px;"></i>
                        kepegawaianallammedica@gmail.com
                    </div>
                </div>

                {{-- Info card --}}
                <div class="sidebar-card">
                    <div class="sc-header">
                        <i class="fa-solid fa-circle-info"></i>
                        Informasi Loker
                    </div>
                    <div class="sc-body">
                        <div class="info-row">
                            <div class="info-row-icon" style="background:#e0f2fe;color:#0284c7;">
                                <i class="fa-solid fa-briefcase"></i>
                            </div>
                            <div>
                                <div class="info-row-label">Posisi</div>
                                <div class="info-row-val">{{ $loker->judul }}</div>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-row-icon" style="background:#d1fae5;color:#059669;">
                                <i class="fa-solid fa-hospital"></i>
                            </div>
                            <div>
                                <div class="info-row-label">Institusi</div>
                                <div class="info-row-val">RSU Allam Medica Bumiayu</div>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-row-icon" style="background:#fef3c7;color:#d97706;">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div>
                                <div class="info-row-label">Lokasi</div>
                                <div class="info-row-val">Bumiayu, Brebes, Jawa Tengah</div>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-row-icon" style="background:#ede9fe;color:#7c3aed;">
                                <i class="fa-regular fa-clock"></i>
                            </div>
                            <div>
                                <div class="info-row-label">Tipe Pekerjaan</div>
                                <div class="info-row-val">Full Time / On-site</div>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-row-icon" style="background:#fce7f3;color:#be185d;">
                                <i class="fa-regular fa-calendar"></i>
                            </div>
                            <div>
                                <div class="info-row-label">Diposting</div>
                                <div class="info-row-val">
                                    {{ \Carbon\Carbon::parse($loker->created_at)->translatedFormat('d F Y') }}
                                </div>
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-row-icon" style="background:#e0f2fe;color:#0284c7;">
                                <i class="fa-solid fa-hashtag"></i>
                            </div>
                            <div>
                                <div class="info-row-label">ID Loker</div>
                                <div class="info-row-val">#{{ str_pad($loker->id, 4, '0', STR_PAD_LEFT) }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Kontak card --}}
                <div class="sidebar-card">
                    <div class="sc-header">
                        <i class="fa-solid fa-phone"></i>
                        Hubungi HRD
                    </div>
                    <div class="sc-body">
                        <a href="tel:085292224886"
                           style="display:flex;align-items:center;gap:10px;padding:10px 0;text-decoration:none;border-bottom:1px solid var(--border);">
                            <div style="width:36px;height:36px;border-radius:8px;background:#d1fae5;color:#059669;
                                        display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0;">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div>
                                <div style="font-size:11px;font-weight:700;color:var(--text-muted);text-transform:uppercase;letter-spacing:.5px;">Telepon</div>
                                <div style="font-size:13.5px;font-weight:700;color:var(--text-main);margin-top:2px;">085292224886</div>
                            </div>
                        </a>
                        <a href="mailto:kepegawaianallammedica@gmail.com"
                           style="display:flex;align-items:center;gap:10px;padding:10px 0;text-decoration:none;">
                            <div style="width:36px;height:36px;border-radius:8px;background:#e0f2fe;color:#0284c7;
                                        display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0;">
                                <i class="fa-regular fa-envelope"></i>
                            </div>
                            <div>
                                <div style="font-size:11px;font-weight:700;color:var(--text-muted);text-transform:uppercase;letter-spacing:.5px;">Email</div>
                                <div style="font-size:12.5px;font-weight:700;color:var(--text-main);margin-top:2px;">kepegawaianallammedica@gmail.com</div>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Share card --}}
                <div class="sidebar-card">
                    <div class="sc-header">
                        <i class="fa-solid fa-share-nodes"></i>
                        Bagikan Loker Ini
                    </div>
                    <div class="sc-body">
                        <div class="share-btns">
                            <a href="https://wa.me/?text={{ urlencode('Lowongan Kerja: ' . $loker->judul . ' di RSU Allam Medica — ' . url()->current()) }}"
                               target="_blank" class="share-btn share-wa">
                                <i class="fa-brands fa-whatsapp" style="font-size:15px;"></i>
                                WhatsApp
                            </a>
                            <button class="share-btn share-copy" id="copyBtn" onclick="copyLink()">
                                <i class="fa-solid fa-link" style="font-size:13px;"></i>
                                Salin Link
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Loker lainnya --}}
                @if(isset($lokerLain) && count($lokerLain) > 0)
                <div class="sidebar-card">
                    <div class="sc-header">
                        <i class="fa-solid fa-briefcase"></i>
                        Loker Lainnya
                    </div>
                    <div class="sc-body">
                        @foreach($lokerLain->take(4) as $lain)
                        <a href="{{ route('karir.detail', $lain->id) }}" class="other-loker-item">
                            <div class="oli-icon">
                                @if($lain->gambar)
                                    <img src="{{ asset('storage/'.$lain->gambar) }}" alt="{{ $lain->judul }}">
                                @else
                                    <i class="fa-solid fa-briefcase"></i>
                                @endif
                            </div>
                            <div>
                                <div class="oli-title">{{ $lain->judul }}</div>
                                <div class="oli-date">
                                    <i class="fa-regular fa-clock" style="font-size:9px;"></i>
                                    {{ \Carbon\Carbon::parse($lain->created_at)->diffForHumans() }}
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>
            <!-- end sidebar -->

        </div>
    </div>
</section>

@else

<section class="loker-section" style="position:relative; overflow:hidden;">
    <div class="container" style="position:relative; z-index:1;">
        <div class="loker-wrap">
            <span class="loker-label">Karir RSU Allam Medica</span>
            <h2 class="loker-heading">Lowongan Kerja Terbaru</h2>
            <p class="loker-desc">
                Temukan peluang karir terbaik dan bergabunglah bersama tim profesional kami.
            </p>
        </div>
    </div>
</section>

<section style="background:#fff; padding:50px 0; position:relative; overflow:hidden;">

    <div class="ornamen" style="top:-15px; left:-50px; width:250px; height:250px; opacity:0.04;"></div>
    <div class="ornamen" style="bottom:-25px; right:-70px; width:320px; height:320px; opacity:0.04;"></div>
    <div class="ornamen" style="top:50%; left:50%; transform:translate(-50%,-50%); width:480px; height:480px; opacity:0.02;"></div>

    <div class="container" style="position:relative; z-index:1;">
        <div class="row g-4">

            @foreach($lokers as $item)
            <div class="col-md-3 col-12">
                <div style="
                    border:1px solid #eee;
                    border-radius:20px;
                    overflow:hidden;
                    background:#fff;
                    height:100%;
                    transition:.3s;
                "
                onmouseover="this.style.boxShadow='0 14px 35px rgba(0,0,0,.08)'; this.style.transform='translateY(-4px)';"
                onmouseout="this.style.boxShadow='none'; this.style.transform='translateY(0)';">

                    <img src="{{ asset('storage/'.$item->gambar) }}"
                         style="width:100%; height:auto; display:block;">

                    <div style="padding:15px; text-align:center;">
                        <h6 class="fw-bold">{{ $item->judul }}</h6>
                        <p style="font-size:13px; color:#666;">
                            {{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 90) }}
                        </p>
                        <a href="{{ route('karir.detail', $item->id) }}"
                           style="display:inline-block; margin-top:8px; padding:6px 16px; background:#1C145C; color:white; text-decoration:none; border-radius:20px; font-size:12px; font-weight:600; transition:.3s;"
                           onmouseover="this.style.background='#31248f';"
                           onmouseout="this.style.background='#1C145C';">
                            Lihat Detail
                        </a>
                    </div>

                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

@endif

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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- ============================================================
     JAVASCRIPT: NAVBAR, BOTTOM SHEET, WA MODAL, COPY LINK
============================================================ -->
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

});

/* ---- Copy link Loker ---- */
function copyLink() {
    const btn = document.getElementById('copyBtn');
    if(!btn) return;
    navigator.clipboard.writeText(window.location.href).then(function() {
        btn.classList.add('copied');
        btn.innerHTML = '<i class="fa-solid fa-check" style="font-size:13px;"></i> Tersalin!';
        setTimeout(function() {
            btn.classList.remove('copied');
            btn.innerHTML = '<i class="fa-solid fa-link" style="font-size:13px;"></i> Salin Link';
        }, 2500);
    }).catch(function() {
        /* Fallback */
        const ta = document.createElement('textarea');
        ta.value = window.location.href;
        document.body.appendChild(ta);
        ta.select(); document.execCommand('copy');
        document.body.removeChild(ta);
        btn.classList.add('copied');
        btn.innerHTML = '<i class="fa-solid fa-check" style="font-size:13px;"></i> Tersalin!';
        setTimeout(function() {
            btn.classList.remove('copied');
            btn.innerHTML = '<i class="fa-solid fa-link" style="font-size:13px;"></i> Salin Link';
        }, 2500);
    });
}
</script>
</body>
</html>