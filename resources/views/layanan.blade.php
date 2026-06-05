<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Layanan — RSU Allam Medica</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">
</head>

<style>
/* ============================
   GLOBAL
============================ */
body {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: #f8faff;
    overflow-x: hidden;
}

/* ============================
   TOPBAR
============================ */
.topbar {
    background: linear-gradient(90deg, #1C145C 0%, #34258d 50%, #1C145C 100%);
    position: fixed; top: 0; left: 0;
    width: 100%; height: 38px;
    z-index: 10000; display: flex; align-items: center;
}
.topbar .container { display: flex; align-items: center; justify-content: space-between; }
.topbar-info { display: flex; align-items: center; gap: 14px; flex-wrap: nowrap; }
.topbar-info span { color: rgba(255,255,255,.88); font-size: 12px; display: flex; align-items: center; gap: 6px; white-space: nowrap; }
.topbar-info i { font-size: 11px; opacity: .8; }
.topbar-social { display: flex; align-items: center; gap: 12px; }
.topbar-social a { color: rgba(255,255,255,.75); font-size: 14px; text-decoration: none; display: flex; align-items: center; transition: .2s; }
.topbar-social a:hover { color: #fff; transform: translateY(-1px); }

/* ============================
   NAVBAR
============================ */
.navbar-float-wrap { position: fixed; top: 38px; left: 0; width: 100%; z-index: 9998; padding: 12px 20px; }
.navbar-float {
    max-width: 1200px; margin: 0 auto; position: relative;
    display: flex; align-items: center; justify-content: space-between; gap: 10px;
    padding: 10px 14px 10px 22px; border-radius: 60px;
    background: rgba(255,255,255,0.07);
    backdrop-filter: blur(22px) saturate(180%); -webkit-backdrop-filter: blur(22px) saturate(180%);
    border: 1px solid rgba(255,255,255,0.16);
    box-shadow: 0 8px 32px rgba(15,23,42,.08), inset 0 1px 0 rgba(255,255,255,.22);
    transition: background .3s ease, border .3s ease, box-shadow .3s ease;
}
.navbar-float.scrolled {
    background: rgba(255,255,255,.14); backdrop-filter: blur(26px) saturate(200%);
    border: 1px solid rgba(255,255,255,.22);
    box-shadow: 0 10px 40px rgba(15,23,42,.10), inset 0 1px 0 rgba(255,255,255,.28);
}
.navbar-float::before {
    content: ""; position: absolute; inset: 0; border-radius: inherit;
    background: linear-gradient(180deg, rgba(255,255,255,.20), rgba(255,255,255,.02)); pointer-events: none;
}
.nav-logo { position: relative; z-index: 2; }
.navbar-float .nav-logo img { height: 38px; object-fit: contain; display: block; }
.nav-links { display: flex; align-items: center; justify-content: center; flex: 1; gap: 2px; position: relative; z-index: 2; }
.nav-link-pill {
    padding: 8px 15px; border-radius: 50px; font-size: 14px; font-weight: 500;
    color: #0f172a; text-decoration: none; white-space: nowrap;
    display: inline-flex; align-items: center; gap: 4px;
    transition: background .2s, color .2s, transform .2s;
}
.nav-link-pill:hover { background: rgba(255,255,255,.25); color: #1C145C; transform: translateY(-1px); }
.nav-link-pill.active { background: rgba(255,255,255,.35); color: #1C145C; font-weight: 600; }
.drop-wrap { position: relative; }
.drop-menu {
    position: absolute; top: calc(100% + 12px); left: 50%;
    transform: translateX(-50%) translateY(8px);
    min-width: 200px; padding: 8px; border-radius: 22px;
    background: rgba(255,255,255,.92); backdrop-filter: blur(24px);
    border: 1px solid rgba(255,255,255,.35);
    box-shadow: 0 12px 35px rgba(15,23,42,.14);
    opacity: 0; visibility: hidden; transition: .22s ease; z-index: 100;
}
.drop-wrap:hover .drop-menu { opacity: 1; visibility: visible; transform: translateX(-50%) translateY(0); }
.drop-item {
    display: flex; align-items: center; gap: 9px;
    padding: 9px 13px; border-radius: 12px;
    font-size: 13.5px; color: #334155; text-decoration: none; transition: .18s;
    font-weight: 500;
}
.drop-item:hover { background: rgba(28,20,92,.07); color: #1C145C; }
.drop-divider { height: 1px; background: rgba(0,0,0,.07); margin: 4px 8px; }
.drop-item-icon {
    width: 28px; height: 28px; border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: 13px; flex-shrink: 0;
}
.chevron { font-size: 11px; opacity: .6; transition: .25s; }
.drop-wrap:hover .chevron { transform: rotate(180deg); }
.nav-cta { position: relative; z-index: 2; }
.btn-kontak {
    padding: 10px 22px; border-radius: 50px; background: #1C145C;
    color: #fff !important; text-decoration: none !important;
    font-size: 14px; font-weight: 600; display: inline-block; border: none;
    box-shadow: 0 8px 20px rgba(28,20,92,.25); transition: .2s;
}
.btn-kontak:hover { background: #2a1e8a; transform: translateY(-1px); }
.nav-burger { display: none; flex-direction: column; gap: 5px; cursor: pointer; border: none; background: transparent; padding: 6px; position: relative; z-index: 2; }
.nav-burger span { width: 22px; height: 2px; background: #1C145C; border-radius: 2px; display: block; transition: .3s; }
.nav-burger.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
.nav-burger.open span:nth-child(2) { opacity: 0; }
.nav-burger.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }
.nav-overlay { display: none; position: fixed; inset: 0; background: rgba(15,23,42,0); z-index: 9999990; transition: background .3s ease; }
.nav-overlay.show { display: block; background: rgba(15,23,42,0.42); }
.nav-drawer {
    position: fixed; top: 0; right: 0; width: 62%; max-width: 280px; height: 100dvh;
    z-index: 9999995; transform: translateX(100%);
    transition: transform .32s cubic-bezier(.4,0,.2,1);
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(24px) saturate(180%);
    border-left: 1px solid rgba(255,255,255,0.45);
    box-shadow: -8px 0 32px rgba(15,23,42,.12);
    display: flex; flex-direction: column; overflow-y: auto; overscroll-behavior: contain;
}
.nav-drawer.open { transform: translateX(0); }
.drawer-header { display: flex; align-items: center; justify-content: space-between; padding: 20px 16px 14px; border-bottom: 1px solid rgba(0,0,0,.07); flex-shrink: 0; }
.drawer-label { font-size: 11px; font-weight: 700; color: #94a3b8; letter-spacing: .8px; text-transform: uppercase; }
.drawer-close-btn { width: 30px; height: 30px; border-radius: 50%; background: rgba(28,20,92,.08); border: none; display: flex; align-items: center; justify-content: center; color: #1C145C; cursor: pointer; font-size: 14px; transition: .2s; }
.drawer-close-btn:hover { background: rgba(28,20,92,.14); }
.drawer-nav { flex: 1; padding: 10px; display: flex; flex-direction: column; gap: 2px; overflow-y: auto; }
.d-link { display: flex; align-items: center; gap: 10px; padding: 10px 12px; border-radius: 12px; font-size: 14px; font-weight: 500; color: #1e293b; text-decoration: none; transition: .16s; }
.d-link:hover { background: rgba(28,20,92,.06); color: #1C145C; }
.d-link.active { background: rgba(28,20,92,.09); color: #1C145C; font-weight: 600; }
.d-icon { width: 22px; height: 22px; border-radius: 7px; background: rgba(28,20,92,.08); display: flex; align-items: center; justify-content: center; font-size: 12px; color: #1C145C; flex-shrink: 0; }
.d-link.active .d-icon { background: #1C145C; color: #fff; }
.d-group-label { font-size: 10px; font-weight: 700; color: #94a3b8; letter-spacing: .7px; text-transform: uppercase; padding: 12px 12px 4px; }
.d-sub { padding-left: 8px; }
.d-divider { height: 1px; background: rgba(0,0,0,.07); margin: 6px 2px; }
.drawer-footer { padding: 12px 14px 24px; border-top: 1px solid rgba(0,0,0,.07); flex-shrink: 0; }
.drawer-footer .btn-kontak { border-radius: 14px; display: block; text-align: center; padding: 12px 22px; }

/* ============================
   HERO
============================ */
.layanan-hero {
    background: linear-gradient(150deg, #1C145C 0%, #231a72 40%, #0ea5e9 100%);
    padding: 130px 0 72px;
    position: relative; overflow: hidden;
}
.layanan-hero::before {
    content: ''; position: absolute; right: -80px; top: -80px;
    width: 420px; height: 420px; border-radius: 50%;
    background: radial-gradient(circle, rgba(255,255,255,.06), transparent 65%); pointer-events: none;
}
.layanan-hero::after {
    content: ''; position: absolute; left: -40px; bottom: -100px;
    width: 300px; height: 300px; border-radius: 50%;
    background: radial-gradient(circle, rgba(14,165,233,.12), transparent 65%); pointer-events: none;
}
.hero-dots { position: absolute; inset: 0; pointer-events: none; background-image: radial-gradient(rgba(255,255,255,.05) 1px, transparent 1px); background-size: 26px 26px; }
.hero-inner { position: relative; z-index: 2; }
.hero-bc { display: flex; align-items: center; gap: 8px; margin-bottom: 20px; }
.hero-bc a { color: rgba(255,255,255,.6); font-size: 13px; font-weight: 500; text-decoration: none; transition: color .2s; display: flex; align-items: center; gap: 5px; }
.hero-bc a:hover { color: #fff; }
.hero-bc .sep { color: rgba(255,255,255,.25); font-size: 11px; }
.hero-bc .cur { color: rgba(255,255,255,.8); font-size: 13px; font-weight: 600; }
.hero-kat {
    display: inline-flex; align-items: center; gap: 6px;
    background: rgba(14,165,233,.85); color: #fff;
    font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 1px;
    padding: 5px 14px; border-radius: 20px; margin-bottom: 18px;
    box-shadow: 0 3px 12px rgba(14,165,233,.35);
}
.hero-title { font-family: 'DM Serif Display', serif; font-size: clamp(28px, 4.5vw, 46px); color: #fff; line-height: 1.2; letter-spacing: -.3px; margin-bottom: 18px; font-weight: 400; }
.hero-meta { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
.hero-meta-pill {
    display: inline-flex; align-items: center; gap: 6px;
    background: rgba(255,255,255,.1); border: 1px solid rgba(255,255,255,.15);
    color: rgba(255,255,255,.8); font-size: 12px; font-weight: 600;
    padding: 5px 13px; border-radius: 20px; backdrop-filter: blur(6px);
}
.hero-meta-pill i { font-size: 10px; color: #7dd3fc; }
.hero-stats {
    display: flex; gap: 0; margin-top: 32px;
    background: rgba(255,255,255,.08); border: 1px solid rgba(255,255,255,.14);
    border-radius: 16px; overflow: hidden; backdrop-filter: blur(12px); width: fit-content;
}
.hero-stat-item { padding: 14px 28px; text-align: center; border-right: 1px solid rgba(255,255,255,.1); }
.hero-stat-item:last-child { border-right: none; }
.hero-stat-num { font-weight: 900; font-size: 22px; color: #fff; display: block; line-height: 1; }
.hero-stat-label { font-size: 10px; color: rgba(255,255,255,.6); margin-top: 5px; letter-spacing: .3px; }

/* ============================================================
   DOKTER TICKER
============================================================ */
.dokter-ticker-section {
    width: 100vw; position: relative; left: 50%; transform: translateX(-50%);
    margin-bottom: 0; overflow: hidden;
    background: linear-gradient(135deg, #1C145C 0%, #1e3a6e 50%, #0c6197 100%);
    box-shadow: 0 4px 24px rgba(28,20,92,.18);
}
.dokter-ticker-section::before,
.dokter-ticker-section::after {
    content: ''; position: absolute; top: 0; bottom: 0; width: 80px;
    z-index: 3; pointer-events: none;
}
.dokter-ticker-section::before { left: 0; background: linear-gradient(to right, #1C145C, transparent); }
.dokter-ticker-section::after  { right: 0; background: linear-gradient(to left, #0c6197, transparent); }
.dokter-ticker-track {
    display: flex; align-items: center; width: max-content;
    animation: dokterScroll 80s linear infinite; padding: 14px 0;
}
.dokter-ticker-track:hover { animation-play-state: paused; }
@keyframes dokterScroll { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
.dokter-ticker-card {
    display: flex; align-items: center; gap: 11px;
    padding: 0 20px 0 0; margin-right: 8px;
    border-right: 1px solid rgba(255,255,255,.12);
    flex-shrink: 0; transition: background .2s;
}
.dokter-ticker-card:hover .dtc-foto,
.dokter-ticker-card:hover .dtc-no-foto { border-color: #7dd3fc; transform: scale(1.06); }
.dokter-ticker-card:hover .dtc-nama { color: #7dd3fc; }
.dtc-foto-wrap { position: relative; flex-shrink: 0; }
.dtc-foto { width: 46px; height: 46px; border-radius: 50%; object-fit: cover; border: 2.5px solid rgba(255,255,255,.35); transition: border-color .2s, transform .2s; display: block; }
.dtc-no-foto { width: 46px; height: 46px; border-radius: 50%; background: rgba(255,255,255,.12); border: 2.5px solid rgba(255,255,255,.25); display: flex; align-items: center; justify-content: center; font-size: 18px; color: rgba(255,255,255,.6); flex-shrink: 0; transition: border-color .2s, transform .2s; }
.dtc-online-dot { position: absolute; bottom: 1px; right: 1px; width: 10px; height: 10px; border-radius: 50%; background: #10b981; border: 2px solid #1C145C; }
.dtc-info { min-width: 0; }
.dtc-label { font-size: 9px; font-weight: 800; color: rgba(255,255,255,.45); text-transform: uppercase; letter-spacing: .8px; margin-bottom: 1px; }
.dtc-nama { font-size: 12.5px; font-weight: 800; color: #fff; white-space: nowrap; line-height: 1.3; transition: color .2s; }
.dtc-sp   { font-size: 10.5px; color: rgba(125,211,252,.8); white-space: nowrap; font-weight: 500; }

/* ============================================================
   LAYANAN NAV TABS
============================================================ */
.layanan-tabs-wrap {
    background: #fff;
    border-bottom: 1px solid #e8edf5;

    /* HAPUS sticky */
    position: relative;

    z-index: 1;
    box-shadow: 0 2px 12px rgba(28,20,92,.06);
}

.layanan-tabs {
    display: flex;
    align-items: center;
    gap: 0;
    overflow-x: auto;
    scrollbar-width: none;
    padding: 0 16px;
}

.layanan-tabs::-webkit-scrollbar {
    display: none;
}

.lay-tab {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 14px 18px;
    border-bottom: 3px solid transparent;
    font-size: 13px;
    font-weight: 600;
    color: #64748b;
    text-decoration: none;
    white-space: nowrap;
    transition: color .2s, border-color .2s;
    cursor: pointer;
    flex-shrink: 0;
}

.lay-tab:hover {
    color: #1C145C;
}

.lay-tab.active {
    color: #1C145C;
    border-bottom-color: #1C145C;
}

.lay-tab-icon {
    width: 28px;
    height: 28px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    flex-shrink: 0;
    transition: background .2s;
}

.lay-tab:hover .lay-tab-icon,
.lay-tab.active .lay-tab-icon {
    opacity: 1;
}

/* ============================================================
   LAYANAN SECTIONS
============================================================ */
.layanan-page-body { padding: 0 0 80px; background: #f8faff; }

/* Section container */
.lay-section {
    padding: 60px 0 0;
    scroll-margin-top: 140px;
}
.lay-section-header {
    display: flex; align-items: flex-end;
    justify-content: space-between;
    margin-bottom: 32px; gap: 16px; flex-wrap: wrap;
}
.lay-section-badge {
    display: inline-flex; align-items: center; gap: 7px;
    padding: 5px 14px; border-radius: 20px;
    font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 1px;
    margin-bottom: 10px;
}
.lay-section-title {
    font-family: 'DM Serif Display', serif;
    font-size: clamp(22px, 3vw, 30px); font-weight: 400;
    color: #1C145C; line-height: 1.2; letter-spacing: -.3px;
}
.lay-section-sub { font-size: 14px; color: #64748b; margin-top: 6px; line-height: 1.6; }
.lay-section-divider {
    width: 100%; height: 1px;
    background: linear-gradient(to right, #1C145C, #0ea5e9, transparent);
    margin-bottom: 32px; opacity: .2;
}

/* ============================================================
   STATIC SERVICE CARD (IGD, Ambulans, Farmasi, dll)
============================================================ */
.lay-static-card {
    background: #fff; border-radius: 20px;
    border: 1px solid #e8edf5;
    box-shadow: 0 4px 20px rgba(28,20,92,.06);
    overflow: hidden;
    transition: transform .28s cubic-bezier(.22,.68,0,1.2), box-shadow .28s, border-color .28s;
}
.lay-static-card:hover { transform: translateY(-6px); box-shadow: 0 16px 48px rgba(28,20,92,.12); border-color: #c7d2fe; }

.lay-static-hero {
    padding: 40px 32px 36px;
    position: relative; overflow: hidden;
}
.lay-static-hero::after {
    content: ''; position: absolute; right: -30px; bottom: -30px;
    width: 140px; height: 140px; border-radius: 50%;
    background: rgba(255,255,255,.07); pointer-events: none;
}
.lay-static-icon {
    width: 60px; height: 60px; border-radius: 18px;
    display: flex; align-items: center; justify-content: center;
    font-size: 26px; margin-bottom: 18px;
    box-shadow: 0 8px 24px rgba(0,0,0,.12);
}
.lay-static-name {
    font-family: 'DM Serif Display', serif;
    font-size: 22px; font-weight: 400; color: #fff;
    line-height: 1.2; margin-bottom: 8px;
}
.lay-static-tagline { font-size: 13px; color: rgba(255,255,255,.75); line-height: 1.6; }

.lay-static-body { padding: 24px 28px; }
.lay-static-desc { font-size: 14px; color: #475569; line-height: 1.75; margin-bottom: 20px; }

.lay-feature-list { list-style: none; padding: 0; margin: 0 0 20px; display: flex; flex-direction: column; gap: 8px; }
.lay-feature-list li {
    display: flex; align-items: center; gap: 10px;
    font-size: 13px; color: #374151; font-weight: 500;
}
.lay-feature-list li::before {
    content: ''; width: 6px; height: 6px; border-radius: 50%;
    background: currentColor; flex-shrink: 0;
}

.lay-static-footer {
    padding: 16px 28px 24px;
    display: flex; align-items: center; gap: 10px; flex-wrap: wrap;
}
.lay-badge-pill {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 6px 14px; border-radius: 20px;
    font-size: 12px; font-weight: 700; text-decoration: none;
    transition: all .2s;
}

/* ============================================================
   RAWAT JALAN — POLI GRID dari database
============================================================ */
.poli-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 18px;
    margin-top: 24px;
}
.poli-card {
    background: #fff; border-radius: 16px; border: 1px solid #e8edf5;
    overflow: hidden; display: flex; flex-direction: column;
    transition: transform .28s cubic-bezier(.22,.68,0,1.2), box-shadow .28s, border-color .28s;
    animation: fadeUpCard .45s cubic-bezier(.22,.68,0,1.2) both;
}
@keyframes fadeUpCard { from { opacity: 0; transform: translateY(18px); } to { opacity: 1; transform: translateY(0); } }
.poli-card:hover { transform: translateY(-5px); box-shadow: 0 14px 36px rgba(28,20,92,.10); border-color: #a5b4fc; }
.poli-card-thumb { position: relative; background: #f0eeff; flex-shrink: 0; }
.poli-card-thumb img { width: 100%; height: auto; display: block; transition: transform .4s ease; }
.poli-card:hover .poli-card-thumb img { transform: scale(1.04); }
.poli-thumb-placeholder {
    height: 160px; display: flex; align-items: center; justify-content: center;
    background: linear-gradient(135deg, #e0e7ff, #dbeafe);
}
.poli-thumb-placeholder i { font-size: 40px; color: #818cf8; }
.poli-status-badge {
    position: absolute; top: 10px; right: 10px;
    font-size: 9px; font-weight: 800; padding: 4px 10px;
    border-radius: 20px; text-transform: uppercase; letter-spacing: .5px;
}
.poli-status-badge.aktif    { background: rgba(16,185,129,.9); color: #fff; }
.poli-status-badge.nonaktif { background: rgba(100,116,139,.8); color: #fff; }
.poli-card-body { padding: 16px 18px; flex: 1; display: flex; flex-direction: column; }
.poli-card-name {
    font-family: 'DM Serif Display', serif;
    font-size: 16px; font-weight: 400; color: #1C145C; line-height: 1.3; margin-bottom: 6px;
}
.poli-card-desc {
    font-size: 12.5px; color: #64748b; line-height: 1.65; flex: 1;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
    margin-bottom: 12px;
}
.poli-card-footer {
    padding: 12px 18px 16px; border-top: 1px solid #f1f5f9;
    display: flex; align-items: center; justify-content: space-between; gap: 8px; flex-wrap: wrap;
}
.poli-wa-btn {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 7px 13px; border-radius: 9px; font-size: 12px; font-weight: 700;
    background: #dcfce7; color: #15803d; text-decoration: none;
    border: 1px solid #86efac; transition: background .2s, transform .15s;
}
.poli-wa-btn:hover { background: #25D366; color: #fff; transform: scale(1.02); }
.poli-detail-btn {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 7px 16px; border-radius: 9px; font-size: 12px; font-weight: 700;
    background: #1C145C; color: #fff; text-decoration: none; border: none; cursor: pointer;
    transition: background .2s, transform .15s;
}
.poli-detail-btn:hover { background: #2a1f7a; transform: translateY(-1px); color: #fff; }

/* Empty poli */
.poli-empty {
    grid-column: 1/-1; padding: 48px 24px; text-align: center;
    background: #fff; border-radius: 16px; border: 1px dashed #c7d2fe;
}
.poli-empty i { font-size: 36px; color: #a5b4fc; display: block; margin-bottom: 12px; }
.poli-empty p { font-size: 14px; color: #64748b; margin: 0; }

/* ============================================================
   LAYANAN REKAP GRID (8 card summary di atas)
============================================================ */
.rekap-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    gap: 16px;
    margin-bottom: 48px;
}
.rekap-card {
    background: #fff; border-radius: 18px; border: 1px solid #e8edf5;
    padding: 24px 22px; display: flex; flex-direction: column;
    transition: transform .28s cubic-bezier(.22,.68,0,1.2), box-shadow .28s, border-color .28s;
    cursor: pointer; text-decoration: none; color: inherit;
    box-shadow: 0 2px 12px rgba(28,20,92,.05);
    animation: fadeUpCard .4s ease both;
}
.rekap-card:hover { transform: translateY(-5px); box-shadow: 0 14px 36px rgba(28,20,92,.10); text-decoration: none; color: inherit; }
.rekap-card:nth-child(1){ animation-delay:.04s } .rekap-card:nth-child(2){ animation-delay:.08s }
.rekap-card:nth-child(3){ animation-delay:.12s } .rekap-card:nth-child(4){ animation-delay:.16s }
.rekap-card:nth-child(5){ animation-delay:.20s } .rekap-card:nth-child(6){ animation-delay:.24s }
.rekap-card:nth-child(7){ animation-delay:.28s } .rekap-card:nth-child(8){ animation-delay:.32s }
.rekap-icon {
    width: 52px; height: 52px; border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
    font-size: 22px; margin-bottom: 14px; flex-shrink: 0;
}
.rekap-name {
    font-family: 'DM Serif Display', serif;
    font-size: 17px; font-weight: 400; color: #1C145C; margin-bottom: 6px; line-height: 1.3;
}
.rekap-desc { font-size: 12.5px; color: #64748b; line-height: 1.6; flex: 1; margin-bottom: 14px; }
.rekap-arrow {
    display: inline-flex; align-items: center; gap: 6px;
    font-size: 12px; font-weight: 700; color: #1C145C;
    transition: gap .2s;
}
.rekap-card:hover .rekap-arrow { gap: 10px; }
.rekap-arrow i { font-size: 11px; }

/* ============================================================
   DETAIL MODAL (Poli)
============================================================ */
.am-modal .modal-dialog { max-width: 600px; }
.am-modal .modal-content { border: none; border-radius: 20px; box-shadow: 0 24px 64px rgba(0,0,0,.15); overflow: hidden; }
.am-modal .modal-header { padding: 22px 28px 18px; border-bottom: 1px solid #f1f5f9; }
.am-modal .modal-body   { padding: 0; }
.am-modal .modal-footer { padding: 16px 28px 22px; border-top: 1px solid #f1f5f9; gap: 10px; }
.det-img-hero { width: 100%; height: 220px; object-fit: cover; display: block; }
.det-img-placeholder {
    width: 100%; height: 220px;
    display: flex; align-items: center; justify-content: center;
    font-size: 64px; background: linear-gradient(135deg, #e0e7ff, #dbeafe);
    color: #818cf8;
}
.det-body { padding: 24px 28px; }
.det-name { font-family: 'DM Serif Display', serif; font-size: 22px; font-weight: 400; color: #1C145C; margin-bottom: 12px; }
.det-desc { font-size: 14px; color: #475569; line-height: 1.75; margin-bottom: 16px; }
.det-contact-row { display: flex; align-items: center; gap: 10px; margin-bottom: 8px; }
.det-contact-icon { width: 34px; height: 34px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 14px; flex-shrink: 0; }
.det-contact-val  { font-size: 13.5px; font-weight: 600; color: #1e293b; }
.btn-close-modal {
    padding: 9px 20px; border: 1.5px solid #e2e8f0; border-radius: 10px;
    background: #fff; color: #64748b; font-size: 13.5px; font-weight: 600;
    cursor: pointer; transition: background .2s;
}
.btn-close-modal:hover { background: #f8faff; color: #1e293b; }
.btn-wa-modal {
    padding: 9px 20px; border-radius: 10px; border: none;
    background: #25D366; color: #fff; font-size: 13.5px; font-weight: 700;
    cursor: pointer; display: inline-flex; align-items: center; gap: 7px;
    text-decoration: none; transition: background .2s;
}
.btn-wa-modal:hover { background: #1da851; color: #fff; }

/* ============================================================
   FOOTER
============================================================ */
.footer-rsu {
    background: linear-gradient(to bottom, #ffffff 0%, #fefefd 3%, #fdfcf6 8%, #fcfbf3 13%, #faf8ee 20%, #f7f5e8 30%, #f3f0e1 45%, #ede9d9 65%, #e8e3d2 85%, #e3deca 100%);
    color: #1C145C; padding: 56px 0 0; position: relative; overflow: hidden;
}
.footer-rsu .footer-ornament  { position: absolute; right: -80px; bottom: -150px; width: 420px; height: 420px; opacity: 0.07; background-image: url('{{ asset("images/beranda/ornamen.png") }}'); background-size: contain; background-repeat: no-repeat; background-position: center; pointer-events: none; z-index: 0; }
.footer-rsu .footer-ornament2 { position: absolute; left: -100px; top: 40px; width: 340px; height: 340px; opacity: 0.04; background-image: url('{{ asset("images/beranda/ornamen.png") }}'); background-size: contain; background-repeat: no-repeat; background-position: center; pointer-events: none; z-index: 0; }
.footer-rsu .container-fluid  { max-width: 1100px; position: relative; z-index: 1; }
.footer-rsu .footer-logo      { height: 50px; display: block; margin-bottom: 16px; }
.footer-rsu .footer-title     { font-size: 16px; font-weight: 700; color: #1C145C; margin-bottom: 8px; }
.footer-rsu .footer-desc      { font-size: 13px; line-height: 1.8; color: #5a5480; margin-bottom: 20px; max-width: 290px; }
.footer-rsu .footer-social    { display: flex; gap: 10px; margin-bottom: 22px; }
.footer-rsu .footer-social a  { width: 36px; height: 36px; border-radius: 50%; background: rgba(28,20,92,.07); border: 1px solid rgba(28,20,92,.15); display: flex; align-items: center; justify-content: center; color: #1C145C; text-decoration: none; font-size: 15px; transition: .2s ease; }
.footer-rsu .footer-social a:hover { background: #1C145C; color: #FEFCF1; transform: translateY(-2px); }
.footer-rsu .footer-mitra-label { font-size: 11px; color: #9994bb; text-transform: uppercase; letter-spacing: .08em; margin-bottom: 10px; }
.footer-rsu .footer-mitra       { display: flex; gap: 10px; align-items: center; flex-wrap: wrap; }
.footer-rsu .footer-mitra img:nth-child(1) { height: 35px; }
.footer-rsu .footer-mitra img:nth-child(2) { height: 26px; }
.footer-rsu .footer-heading { font-weight: 900; font-size: 12px; color: #1C145C; text-transform: uppercase; letter-spacing: .14em; margin-bottom: 16px; padding-bottom: 10px; border-bottom: 1.5px solid rgba(28,20,92,.12); }
.footer-rsu ul      { list-style: none; padding: 0; margin: 0; }
.footer-rsu ul li   { margin-bottom: 9px; }
.footer-rsu a       { color: #5a5480; text-decoration: none; font-size: 13.5px; transition: .2s ease; display: inline-flex; align-items: center; gap: 5px; }
.footer-rsu ul li a::before { content: '›'; color: #1C145C; opacity: .4; font-size: 15px; line-height: 1; }
.footer-rsu a:hover { color: #1C145C; padding-left: 3px; }
.footer-rsu .footer-contact-row  { display: flex; align-items: flex-start; gap: 11px; margin-bottom: 13px; }
.footer-rsu .footer-contact-icon { width: 33px; height: 33px; border-radius: 8px; background: rgba(28,20,92,.07); border: 1px solid rgba(28,20,92,.1); display: flex; align-items: center; justify-content: center; font-size: 14px; color: #1C145C; flex-shrink: 0; }
.footer-rsu .footer-contact-text { font-size: 13px; color: #5a5480; line-height: 1.65; padding-top: 4px; }
.footer-rsu hr { height: 1px; background: linear-gradient(90deg, rgba(28,20,92,0) 0%, rgba(28,20,92,.12) 30%, rgba(28,20,92,.12) 70%, rgba(28,20,92,0) 100%); border: none; margin: 36px 0 0; }
.footer-rsu .footer-bottom { background: rgba(28,20,92,.05); padding: 15px 36px; position: relative; z-index: 1; }
.footer-rsu .footer-copy  { font-size: 12.5px; color: #9994bb; display: flex; justify-content: space-between; align-items: center; gap: 12px; }
.footer-rsu .footer-copy-badge  { background: rgba(28,20,92,.06); border: 1px solid rgba(28,20,92,.12); border-radius: 20px; padding: 4px 14px; font-size: 11.5px; color: #7a74a0; white-space: nowrap; }
.footer-rsu .footer-accent-dot  { display: inline-block; width: 3px; height: 3px; border-radius: 50%; background: #1C145C; opacity: .25; margin: 0 8px; vertical-align: middle; }

/* ============================
   RESPONSIVE
============================ */
@media (max-width: 1100px) { .nav-link-pill { padding: 7px 11px; font-size: 13px; } }

@media (max-width: 991px) {
    body { padding-top: calc(38px + 64px); }
    .navbar-float-wrap { padding: 10px 12px; }
    .navbar-float { border-radius: 26px; padding: 10px 14px; }
    .nav-links, .nav-cta { display: none; }
    .nav-burger { display: flex; }
    .topbar-info span { font-size: 10px; }
    .topbar-social { gap: 10px; }
    .layanan-tabs-wrap { top: calc(38px + 58px); }
    .lay-section { scroll-margin-top: 160px; }
    .footer-rsu { padding: 45px 0 0; }
    .footer-rsu .row > div { margin-bottom: 28px; }
    .footer-rsu .footer-desc { max-width: 100%; }
    .dokter-ticker-track { animation-duration: 60s; }
}

@media (max-width: 768px) {
    .layanan-hero { padding: 110px 0 60px; }
    .hero-stats { width: 100%; max-width: calc(100% - 28px); }
    .hero-stat-item { padding: 12px 16px; }
    .hero-stat-num { font-size: 18px; }
    .rekap-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
    .poli-grid { grid-template-columns: 1fr; }
    .lay-static-hero { padding: 28px 22px; }
    .lay-static-body { padding: 18px 22px; }
    .lay-static-footer { padding: 14px 22px 20px; }
    .footer-rsu { padding: 40px 0 0; }
    .footer-rsu .container-fluid { padding-left: 20px !important; padding-right: 20px !important; }
    .footer-rsu .footer-copy { flex-direction: column; align-items: flex-start; gap: 8px; }
    .footer-rsu .footer-bottom { padding: 15px 20px; }
    .footer-rsu a:hover { padding-left: 0; }
}

@media (max-width: 480px) {
    .topbar .container { gap: 8px; }
    .topbar-info { gap: 8px; }
    .topbar-info span { font-size: 9px; }
    .topbar-social a { font-size: 12px; }
    .navbar-float { border-radius: 22px; }
    .rekap-grid { grid-template-columns: 1fr; }
    .dokter-ticker-track { animation-duration: 45s; }
    .dtc-foto, .dtc-no-foto { width: 38px; height: 38px; }
    .dtc-nama { font-size: 11.5px; }
    .dokter-ticker-card { padding: 0 14px 0 0; gap: 8px; }
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

<!-- FLOATING NAVBAR -->
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

            {{-- LAYANAN dengan dropdown --}}
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
                    <a href="{{ url('/layanan#igd') }}" class="drop-item">
                        <span class="drop-item-icon" style="background:#fee2e2;color:#dc2626;"><i class="bi bi-bandaid-fill"></i></span>
                        IGD 24 Jam
                    </a>
                    <a href="{{ url('/layanan#rawatjalan') }}" class="drop-item">
                        <span class="drop-item-icon" style="background:#e0f2fe;color:#0284c7;"><i class="bi bi-clipboard2-pulse"></i></span>
                        Rawat Jalan
                    </a>
                    <a href="{{ url('/layanan#rawatinap') }}" class="drop-item">
                        <span class="drop-item-icon" style="background:#ede9fe;color:#7c3aed;"><i class="bi bi-hospital"></i></span>
                        Rawat Inap
                    </a>
                    <a href="{{ url('/layanan#ambulans') }}" class="drop-item">
                        <span class="drop-item-icon" style="background:#fef3c7;color:#d97706;"><i class="bi bi-truck"></i></span>
                        Ambulans 24 Jam
                    </a>
                    <a href="{{ url('/layanan#laboratorium') }}" class="drop-item">
                        <span class="drop-item-icon" style="background:#d1fae5;color:#059669;"><i class="bi bi-eyedropper"></i></span>
                        Laboratorium
                    </a>
                    <a href="{{ url('/layanan#radiologi') }}" class="drop-item">
                        <span class="drop-item-icon" style="background:#ede9fe;color:#6366f1;"><i class="bi bi-radioactive"></i></span>
                        Radiologi
                    </a>
                    <a href="{{ url('/layanan#farmasi') }}" class="drop-item">
                        <span class="drop-item-icon" style="background:#fce7f3;color:#db2777;"><i class="bi bi-capsule"></i></span>
                        Farmasi
                    </a>
                    <a href="{{ url('/layanan#mcu') }}" class="drop-item">
                        <span class="drop-item-icon" style="background:#ccfbf1;color:#0d9488;"><i class="bi bi-heart-pulse"></i></span>
                        Medical Check Up
                    </a>
                </div>
            </div>

            <a href="/artikel"  class="nav-link-pill {{ request()->is('artikel*')  ? 'active' : '' }}">Artikel</a>
            <a href="/download" class="nav-link-pill {{ request()->is('download*') ? 'active' : '' }}">Download</a>
            <a href="/tentang"  class="nav-link-pill {{ request()->is('tentang*')  ? 'active' : '' }}">Tentang Kami</a>
            <a href="/mutu"     class="nav-link-pill {{ request()->is('mutu*')     ? 'active' : '' }}">Mutu</a>
        </div>
        <div class="nav-cta">
            <a href="/kontak" class="btn-kontak">Kontak</a>
        </div>
        <button class="nav-burger" id="navBurger" aria-label="Toggle menu">
            <span></span><span></span><span></span>
        </button>
    </nav>
</div>

<!-- OVERLAY -->
<div class="nav-overlay" id="navOverlay"></div>

<!-- SIDE DRAWER Mobile -->
<aside class="nav-drawer" id="navDrawer" aria-label="Mobile navigation">
    <div class="drawer-header">
        <span class="drawer-label">Menu</span>
        <button class="drawer-close-btn" id="drawerClose"><i class="bi bi-x-lg"></i></button>
    </div>
    <nav class="drawer-nav">
        <a href="/" class="d-link {{ request()->is('/') ? 'active' : '' }}">
            <span class="d-icon"><i class="bi bi-house"></i></span> Beranda
        </a>
        <div class="d-group-label">Konten</div>
        <div class="d-sub">
            <a href="{{ url('/karir') }}"  class="d-link {{ request()->is('karir*')  ? 'active' : '' }}"><span class="d-icon"><i class="bi bi-briefcase"></i></span> Karir</a>
            <a href="{{ url('/berita') }}" class="d-link {{ request()->is('berita*') ? 'active' : '' }}"><span class="d-icon"><i class="bi bi-newspaper"></i></span> Berita</a>
            <a href="{{ url('/video') }}"  class="d-link {{ request()->is('video*')  ? 'active' : '' }}"><span class="d-icon"><i class="bi bi-play-circle"></i></span> Video</a>
        </div>
        <div class="d-divider"></div>
        <a href="/layanan" class="d-link {{ request()->is('layanan*') ? 'active' : '' }}">
            <span class="d-icon"><i class="bi bi-hospital"></i></span> Layanan
        </a>
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

<!-- SCRIPT NAVBAR -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const burger   = document.getElementById('navBurger');
    const drawer   = document.getElementById('navDrawer');
    const overlay  = document.getElementById('navOverlay');
    const closeBtn = document.getElementById('drawerClose');
    const navbar   = document.getElementById('mainNavbar');
    function openDrawer()  { burger.classList.add('open'); drawer.classList.add('open'); overlay.classList.add('show'); document.body.style.overflow = 'hidden'; }
    function closeDrawer() { burger.classList.remove('open'); drawer.classList.remove('open'); overlay.classList.remove('show'); document.body.style.overflow = ''; }
    burger.addEventListener('click', e => { e.stopPropagation(); drawer.classList.contains('open') ? closeDrawer() : openDrawer(); });
    closeBtn.addEventListener('click', closeDrawer);
    overlay.addEventListener('click', closeDrawer);
    drawer.querySelectorAll('.d-link').forEach(l => l.addEventListener('click', closeDrawer));
    window.addEventListener('scroll', () => navbar.classList.toggle('scrolled', window.scrollY > 10), { passive: true });
});
</script>


{{-- ============================================================
     HERO
============================================================ --}}
<section class="layanan-hero">
    <div class="hero-dots"></div>
    <div class="container hero-inner">
        <div class="hero-bc">
            <a href="/"><i class="bi bi-house-fill"></i> Beranda</a>
            <span class="sep"><i class="bi bi-chevron-right"></i></span>
            <span class="cur">Layanan</span>
        </div>
        <div class="hero-kat">
            <i class="fa-solid fa-hospital-user" style="font-size:10px;"></i>
            Poliklinik &amp; Layanan Medis
        </div>
        <h1 class="hero-title">
            Layanan Kesehatan<br>
            <em>RSU Allam Medica</em>
        </h1>
        <div class="hero-meta">
            <span class="hero-meta-pill"><i class="fa-solid fa-hospital"></i> RSU Allam Medica Bumiayu</span>
            <span class="hero-meta-pill"><i class="fa-solid fa-stethoscope"></i> 8 Jenis Layanan</span>
            <span class="hero-meta-pill"><i class="fa-solid fa-clock"></i> IGD 24 Jam</span>
            <span class="hero-meta-pill"><i class="fa-solid fa-shield-heart"></i> Melayani BPJS</span>
        </div>
        <div class="hero-stats">
            <div class="hero-stat-item">
                <span class="hero-stat-num">8</span>
                <div class="hero-stat-label">Jenis Layanan</div>
            </div>
            <div class="hero-stat-item">
                <span class="hero-stat-num">24<small style="font-size:13px">/7</small></span>
                <div class="hero-stat-label">IGD Siaga</div>
            </div>
            <div class="hero-stat-item">
                <span class="hero-stat-num">BPJS</span>
                <div class="hero-stat-label">Menerima BPJS</div>
            </div>
            <div class="hero-stat-item">
                <span class="hero-stat-num" id="statPoli">—</span>
                <div class="hero-stat-label">Poliklinik</div>
            </div>
        </div>
    </div>
</section>


{{-- ============================================================
     DOKTER TICKER
============================================================ --}}
@if(isset($dokterList) && $dokterList->count())
<div class="dokter-ticker-section">
    <div class="dokter-ticker-track">
        @foreach($dokterList as $dok)
        <div class="dokter-ticker-card">
            <div class="dtc-foto-wrap">
                @if($dok->foto)
                    <img src="{{ asset('uploads/dokter/' . $dok->foto) }}" alt="{{ $dok->nama }}" class="dtc-foto"
                         onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
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
                    <img src="{{ asset('uploads/dokter/' . $dok->foto) }}" alt="{{ $dok->nama }}" class="dtc-foto"
                         onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
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


{{-- ============================================================
     STICKY TABS
============================================================ --}}
<div class="layanan-tabs-wrap">
    <div class="container">
        <div class="layanan-tabs" id="layananTabs">
            <a href="#rekap"        class="lay-tab active" data-section="rekap">
                <span class="lay-tab-icon" style="background:#e0e7ff;color:#4338ca;"><i class="bi bi-grid-3x3-gap"></i></span>
                Semua
            </a>
            <a href="#igd"          class="lay-tab" data-section="igd">
                <span class="lay-tab-icon" style="background:#fee2e2;color:#dc2626;"><i class="bi bi-bandaid-fill"></i></span>
                IGD 24 Jam
            </a>
            <a href="#rawatjalan"   class="lay-tab" data-section="rawatjalan">
                <span class="lay-tab-icon" style="background:#e0f2fe;color:#0284c7;"><i class="bi bi-clipboard2-pulse"></i></span>
                Rawat Jalan
            </a>
            <a href="#rawatinap"    class="lay-tab" data-section="rawatinap">
                <span class="lay-tab-icon" style="background:#ede9fe;color:#7c3aed;"><i class="bi bi-hospital"></i></span>
                Rawat Inap
            </a>
            <a href="#ambulans"     class="lay-tab" data-section="ambulans">
                <span class="lay-tab-icon" style="background:#fef3c7;color:#d97706;"><i class="bi bi-truck"></i></span>
                Ambulans
            </a>
            <a href="#laboratorium" class="lay-tab" data-section="laboratorium">
                <span class="lay-tab-icon" style="background:#d1fae5;color:#059669;"><i class="bi bi-eyedropper"></i></span>
                Laboratorium
            </a>
            <a href="#radiologi"    class="lay-tab" data-section="radiologi">
                <span class="lay-tab-icon" style="background:#ede9fe;color:#6366f1;"><i class="bi bi-radioactive"></i></span>
                Radiologi
            </a>
            <a href="#farmasi"      class="lay-tab" data-section="farmasi">
                <span class="lay-tab-icon" style="background:#fce7f3;color:#db2777;"><i class="bi bi-capsule"></i></span>
                Farmasi
            </a>
            <a href="#mcu"          class="lay-tab" data-section="mcu">
                <span class="lay-tab-icon" style="background:#ccfbf1;color:#0d9488;"><i class="bi bi-heart-pulse"></i></span>
                MCU
            </a>
        </div>
    </div>
</div>


{{-- ============================================================
     BODY
============================================================ --}}
<div class="layanan-page-body">
<div class="container">

    {{-- ============================================
         REKAP — 8 card ringkasan semua layanan
    ============================================ --}}
    <section id="rekap" class="lay-section">
        <div class="lay-section-header">
            <div>
                <div class="lay-section-badge" style="background:#e0e7ff;color:#4338ca;">
                    <i class="bi bi-grid-3x3-gap" style="font-size:10px;"></i> Semua Layanan
                </div>
                <div class="lay-section-title">Pilih Layanan yang Anda Butuhkan</div>
                <div class="lay-section-sub">RSU Allam Medica menyediakan berbagai layanan kesehatan komprehensif untuk masyarakat Bumiayu dan sekitarnya.</div>
            </div>
        </div>
        <div class="lay-section-divider"></div>

        <div class="rekap-grid">
            <a href="#igd" class="rekap-card" onclick="smoothScroll('igd')">
                <div class="rekap-icon" style="background:#fee2e2;color:#dc2626;"><i class="bi bi-bandaid-fill"></i></div>
                <div class="rekap-name">IGD 24 Jam</div>
                <div class="rekap-desc">Penanganan gawat darurat cepat dan profesional, siap melayani 24 jam setiap hari.</div>
                <span class="rekap-arrow">Lihat Detail <i class="bi bi-arrow-right"></i></span>
            </a>
            <a href="#rawatjalan" class="rekap-card" onclick="smoothScroll('rawatjalan')">
                <div class="rekap-icon" style="background:#e0f2fe;color:#0284c7;"><i class="bi bi-clipboard2-pulse"></i></div>
                <div class="rekap-name">Rawat Jalan</div>
                <div class="rekap-desc">Berbagai poliklinik spesialis dengan dokter berpengalaman untuk konsultasi dan pemeriksaan.</div>
                <span class="rekap-arrow">Lihat Poli <i class="bi bi-arrow-right"></i></span>
            </a>
            <a href="#rawatinap" class="rekap-card" onclick="smoothScroll('rawatinap')">
                <div class="rekap-icon" style="background:#ede9fe;color:#7c3aed;"><i class="bi bi-hospital"></i></div>
                <div class="rekap-name">Rawat Inap</div>
                <div class="rekap-desc">Fasilitas rawat inap nyaman dengan berbagai kelas kamar dan perawatan intensif.</div>
                <span class="rekap-arrow">Lihat Detail <i class="bi bi-arrow-right"></i></span>
            </a>
            <a href="#ambulans" class="rekap-card" onclick="smoothScroll('ambulans')">
                <div class="rekap-icon" style="background:#fef3c7;color:#d97706;"><i class="bi bi-truck"></i></div>
                <div class="rekap-name">Ambulans 24 Jam</div>
                <div class="rekap-desc">Layanan ambulans siaga 24 jam dengan pengemudi terlatih dan perlengkapan medis lengkap.</div>
                <span class="rekap-arrow">Lihat Detail <i class="bi bi-arrow-right"></i></span>
            </a>
            <a href="#laboratorium" class="rekap-card" onclick="smoothScroll('laboratorium')">
                <div class="rekap-icon" style="background:#d1fae5;color:#059669;"><i class="bi bi-eyedropper"></i></div>
                <div class="rekap-name">Laboratorium</div>
                <div class="rekap-desc">Pemeriksaan laboratorium lengkap dengan peralatan modern dan hasil yang akurat dan cepat.</div>
                <span class="rekap-arrow">Lihat Detail <i class="bi bi-arrow-right"></i></span>
            </a>
            <a href="#radiologi" class="rekap-card" onclick="smoothScroll('radiologi')">
                <div class="rekap-icon" style="background:#ede9fe;color:#6366f1;"><i class="bi bi-radioactive"></i></div>
                <div class="rekap-name">Radiologi</div>
                <div class="rekap-desc">Layanan radiologi diagnostik meliputi rontgen, USG, dan pemeriksaan pencitraan lainnya.</div>
                <span class="rekap-arrow">Lihat Detail <i class="bi bi-arrow-right"></i></span>
            </a>
            <a href="#farmasi" class="rekap-card" onclick="smoothScroll('farmasi')">
                <div class="rekap-icon" style="background:#fce7f3;color:#db2777;"><i class="bi bi-capsule"></i></div>
                <div class="rekap-name">Farmasi</div>
                <div class="rekap-desc">Apotek lengkap dengan obat-obatan berkualitas, melayani resep dokter dan obat bebas.</div>
                <span class="rekap-arrow">Lihat Detail <i class="bi bi-arrow-right"></i></span>
            </a>
            <a href="#mcu" class="rekap-card" onclick="smoothScroll('mcu')">
                <div class="rekap-icon" style="background:#ccfbf1;color:#0d9488;"><i class="bi bi-heart-pulse"></i></div>
                <div class="rekap-name">Medical Check Up</div>
                <div class="rekap-desc">Paket MCU komprehensif untuk deteksi dini penyakit dan pemeriksaan kesehatan berkala.</div>
                <span class="rekap-arrow">Lihat Detail <i class="bi bi-arrow-right"></i></span>
            </a>
        </div>
    </section>


    {{-- ============================================
         IGD 24 JAM
    ============================================ --}}
    <section id="igd" class="lay-section">
        <div class="lay-section-divider"></div>
        <div class="row g-4">
            <div class="col-lg-5">
                <div class="lay-static-card h-100">
                    <div class="lay-static-hero" style="background:linear-gradient(135deg,#7f1d1d 0%,#dc2626 100%);">
                        <div class="lay-static-icon" style="background:rgba(255,255,255,.15);color:#fff;">
                            <i class="bi bi-bandaid-fill"></i>
                        </div>
                        <div class="lay-static-name">IGD 24 Jam</div>
                        <div class="lay-static-tagline">Penanganan gawat darurat cepat, tepat, dan profesional</div>
                    </div>
                    <div class="lay-static-body">
                        <div class="lay-static-desc">
                            Instalasi Gawat Darurat RSU Allam Medica beroperasi penuh 24 jam sehari, 7 hari seminggu, 365 hari setahun. Ditangani oleh tim dokter dan perawat terlatih yang siap memberikan pertolongan pertama dan penanganan medis darurat.
                        </div>
                        <ul class="lay-feature-list" style="color:#dc2626;">
                            <li>Buka 24 jam, 7 hari seminggu</li>
                            <li>Tim dokter & perawat terlatih</li>
                            <li>Peralatan medis darurat lengkap</li>
                            <li>Ruang observasi & stabilisasi</li>
                            <li>Menerima pasien BPJS & umum</li>
                        </ul>
                    </div>
                    <div class="lay-static-footer">
                        <a href="tel:085292224886" class="lay-badge-pill" style="background:#fee2e2;color:#dc2626;border:1px solid #fca5a5;">
                            <i class="bi bi-telephone-fill"></i> 085292224886
                        </a>
                        <a href="https://wa.me/6285292224886" target="_blank" class="lay-badge-pill" style="background:#dcfce7;color:#15803d;border:1px solid #86efac;">
                            <i class="bi bi-whatsapp"></i> WhatsApp
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-flex align-items-stretch">
                <div style="background:#fff;border-radius:20px;border:1px solid #e8edf5;box-shadow:0 4px 20px rgba(28,20,92,.06);padding:28px 32px;width:100%;">
                    <div class="lay-section-badge" style="background:#fee2e2;color:#dc2626;margin-bottom:18px;">
                        <i class="bi bi-info-circle" style="font-size:10px;"></i> Informasi IGD
                    </div>
                    <h3 style="font-family:'DM Serif Display',serif;font-size:20px;color:#1C145C;margin-bottom:16px;font-weight:400;">
                        Prosedur Penanganan Darurat
                    </h3>
                    <div style="display:flex;flex-direction:column;gap:14px;">
                        @php
                        $steps = [
                            ['num'=>'01','title'=>'Triage','desc'=>'Pasien diterima dan diklasifikasikan berdasarkan tingkat kegawatan untuk prioritas penanganan.','color'=>'#dc2626'],
                            ['num'=>'02','title'=>'Pemeriksaan Awal','desc'=>'Dokter IGD melakukan pemeriksaan fisik dan penanganan stabilisasi kondisi pasien.','color'=>'#f59e0b'],
                            ['num'=>'03','title'=>'Penanganan & Observasi','desc'=>'Tindakan medis darurat diberikan dan pasien diobservasi hingga kondisi stabil.','color'=>'#8b5cf6'],
                            ['num'=>'04','title'=>'Rawat Inap / Rujukan','desc'=>'Pasien dirujuk ke rawat inap, poliklinik, atau difasilitasi rujukan ke RS lain bila diperlukan.','color'=>'#059669'],
                        ];
                        @endphp
                        @foreach($steps as $s)
                        <div style="display:flex;gap:14px;align-items:flex-start;">
                            <div style="width:36px;height:36px;border-radius:10px;background:{{ $s['color'] }}1a;color:{{ $s['color'] }};display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:800;flex-shrink:0;">{{ $s['num'] }}</div>
                            <div>
                                <div style="font-size:14px;font-weight:700;color:#1e293b;margin-bottom:3px;">{{ $s['title'] }}</div>
                                <div style="font-size:12.5px;color:#64748b;line-height:1.6;">{{ $s['desc'] }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ============================================
         RAWAT JALAN — DATA DARI DATABASE
    ============================================ --}}
    <section id="rawatjalan" class="lay-section">
        <div class="lay-section-header">
            <div>
                <div class="lay-section-badge" style="background:#e0f2fe;color:#0284c7;">
                    <i class="bi bi-clipboard2-pulse" style="font-size:10px;"></i> Rawat Jalan
                </div>
                <div class="lay-section-title">Poliklinik Spesialis</div>
                <div class="lay-section-sub">Konsultasi dengan dokter spesialis berpengalaman di berbagai bidang.</div>
            </div>
            <div style="text-align:right;flex-shrink:0;">
                <div style="font-size:12px;color:#64748b;margin-bottom:4px;">Total Poliklinik</div>
                <div style="font-family:'DM Serif Display',serif;font-size:32px;color:#1C145C;" id="poliCount">—</div>
            </div>
        </div>
        <div class="lay-section-divider"></div>

        {{-- Filter bar poliklinik --}}
        <div style="background:#fff;border-radius:12px;border:1px solid #e8edf5;padding:12px 16px;display:flex;align-items:center;gap:10px;margin-bottom:20px;box-shadow:0 2px 8px rgba(28,20,92,.05);flex-wrap:wrap;">
            <div style="position:relative;flex:1;min-width:180px;">
                <i class="bi bi-search" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:13px;pointer-events:none;"></i>
                <input type="search" id="searchPoli" placeholder="Cari poliklinik..."
                    style="width:100%;padding:8px 12px 8px 34px;border:1.5px solid #e2e8f0;border-radius:9px;font-size:13px;outline:none;background:#f8faff;"
                    oninput="filterPoli()">
            </div>
            <select id="filterPoliStatus" onchange="filterPoli()"
                style="padding:8px 26px 8px 11px;border:1.5px solid #e2e8f0;border-radius:9px;font-size:13px;outline:none;background:#f8faff;appearance:none;background-image:url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%2364748b' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E\");background-repeat:no-repeat;background-position:right 9px center;cursor:pointer;">
                <option value="">Semua Status</option>
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
        </div>

        <div class="poli-grid" id="poliGrid">
            @php
                $poliItems = collect($layananData)->where('kategori', 'poli')->values();
            @endphp

            @forelse($poliItems as $i => $poli)
            <div class="poli-card"
                 data-nama="{{ strtolower($poli['poli'] ?? '') }}"
                 data-status="{{ $poli['status'] ?? 'aktif' }}"
                 style="animation-delay:{{ min($i * 0.06, 0.5) }}s">
                <div class="poli-card-thumb">
                    @if(!empty($poli['gambar']))
                        <img src="{{ $poli['gambar'] }}" alt="{{ $poli['poli'] }}" loading="lazy">
                    @else
                        <div class="poli-thumb-placeholder">
                            <i class="bi bi-clipboard2-pulse"></i>
                        </div>
                    @endif
                    <span class="poli-status-badge {{ $poli['status'] ?? 'aktif' }}">
                        {{ ($poli['status'] ?? 'aktif') === 'aktif' ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </div>
                <div class="poli-card-body">
                    <div class="poli-card-name">{{ $poli['poli'] }}</div>
                    <div class="poli-card-desc">{{ $poli['deskripsi'] ?? 'Layanan poliklinik spesialis RSU Allam Medica.' }}</div>
                </div>
                <div class="poli-card-footer">
                    @php $noWa = preg_replace('/[^0-9]/', '', $poli['no_wa'] ?? ''); @endphp
                    @if($noWa)
                        <a href="https://wa.me/{{ $noWa }}" target="_blank" class="poli-wa-btn">
                            <i class="bi bi-whatsapp"></i> WhatsApp
                        </a>
                    @else
                        <span style="font-size:12px;color:#94a3b8;font-style:italic;">—</span>
                    @endif
                    <button class="poli-detail-btn" onclick="openPoliModal(
                        `{{ addslashes($poli['poli']) }}`,
                        `{{ addslashes($poli['deskripsi'] ?? '') }}`,
                        '{{ $poli['no_hp'] ?? '' }}',
                        '{{ $poli['no_wa'] ?? '' }}',
                        '{{ $poli['status'] ?? 'aktif' }}',
                        '{{ $poli['gambar'] ?? '' }}'
                    )">
                        Detail <i class="bi bi-arrow-right" style="font-size:11px;"></i>
                    </button>
                </div>
            </div>
            @empty
            <div class="poli-empty">
                <i class="bi bi-clipboard2-pulse"></i>
                <p>Belum ada data poliklinik. Tambahkan melalui halaman admin.</p>
            </div>
            @endforelse
        </div>

        {{-- Jadwal dokter CTA --}}
        <div style="margin-top:28px;background:linear-gradient(135deg,#1C145C 0%,#3b5bdb 100%);border-radius:18px;padding:28px 32px;display:flex;align-items:center;justify-content:space-between;gap:20px;flex-wrap:wrap;">
            <div>
                <div style="font-size:11px;font-weight:800;color:rgba(255,255,255,.5);text-transform:uppercase;letter-spacing:1px;margin-bottom:6px;">Jadwal Dokter</div>
                <div style="font-family:'DM Serif Display',serif;font-size:22px;color:#fff;font-weight:400;margin-bottom:4px;">Cek Jadwal Praktik Dokter</div>
                <div style="font-size:13px;color:rgba(255,255,255,.65);">Temukan dokter yang tepat sesuai kebutuhan Anda</div>
            </div>
            <a href="{{ route('jadwaldokter') }}"
               style="display:inline-flex;align-items:center;gap:10px;padding:13px 24px;border-radius:14px;background:#fff;color:#1C145C;font-size:14px;font-weight:800;text-decoration:none;transition:transform .2s,box-shadow .2s;box-shadow:0 4px 16px rgba(0,0,0,.15);"
               onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 8px 24px rgba(0,0,0,.2)'"
               onmouseout="this.style.transform='';this.style.boxShadow='0 4px 16px rgba(0,0,0,.15)'">
                <i class="bi bi-calendar2-week-fill" style="color:#1C145C;"></i>
                Lihat Jadwal Dokter
                <i class="bi bi-arrow-right" style="font-size:12px;"></i>
            </a>
        </div>
    </section>


    {{-- ============================================
         RAWAT INAP
    ============================================ --}}
    <section id="rawatinap" class="lay-section">
        <div class="lay-section-divider"></div>
        <div class="row g-4">
            <div class="col-lg-5">
                <div class="lay-static-card h-100">
                    <div class="lay-static-hero" style="background:linear-gradient(135deg,#4c1d95 0%,#7c3aed 100%);">
                        <div class="lay-static-icon" style="background:rgba(255,255,255,.15);color:#fff;">
                            <i class="bi bi-hospital"></i>
                        </div>
                        <div class="lay-static-name">Rawat Inap</div>
                        <div class="lay-static-tagline">Fasilitas rawat inap nyaman dengan perawatan terbaik</div>
                    </div>
                    <div class="lay-static-body">
                        <div class="lay-static-desc">
                            RSU Allam Medica menyediakan fasilitas rawat inap dengan berbagai pilihan kelas kamar yang nyaman. Setiap pasien mendapatkan perawatan intensif dari tenaga kesehatan profesional dengan standar pelayanan tinggi.
                        </div>
                        <ul class="lay-feature-list" style="color:#7c3aed;">
                            <li>Kelas VIP, I, II, dan III tersedia</li>
                            <li>Ruang ICU & NICU</li>
                            <li>Perawatan 24 jam oleh perawat terlatih</li>
                            <li>Sistem monitoring pasien modern</li>
                            <li>Fasilitas pendamping keluarga</li>
                        </ul>
                    </div>
                    <div class="lay-static-footer">
                        <a href="tel:028943082" class="lay-badge-pill" style="background:#ede9fe;color:#7c3aed;border:1px solid #c4b5fd;">
                            <i class="bi bi-telephone-fill"></i> (0289) 430822
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;height:100%;">
                    @php
                    $kamar = [
                        ['kelas'=>'VIP','icon'=>'bi-gem','color'=>'#7c3aed','bg'=>'#ede9fe','desc'=>'Kamar pribadi eksklusif dengan fasilitas lengkap dan layanan premium.'],
                        ['kelas'=>'Kelas I','icon'=>'bi-star-fill','color'=>'#d97706','bg'=>'#fef3c7','desc'=>'Kamar semi-privat dengan fasilitas lengkap dan nyaman.'],
                        ['kelas'=>'Kelas II','icon'=>'bi-hospital','color'=>'#0284c7','bg'=>'#e0f2fe','desc'=>'Kamar bersama 2-3 tempat tidur dengan fasilitas memadai.'],
                        ['kelas'=>'Kelas III','icon'=>'bi-heart-fill','color'=>'#059669','bg'=>'#d1fae5','desc'=>'Kamar bersama dengan fasilitas standar, melayani BPJS.'],
                    ];
                    @endphp
                    @foreach($kamar as $k)
                    <div style="background:#fff;border-radius:14px;border:1px solid #e8edf5;padding:20px;box-shadow:0 2px 10px rgba(28,20,92,.05);">
                        <div style="width:40px;height:40px;border-radius:11px;background:{{ $k['bg'] }};color:{{ $k['color'] }};display:flex;align-items:center;justify-content:center;font-size:17px;margin-bottom:10px;">
                            <i class="bi {{ $k['icon'] }}"></i>
                        </div>
                        <div style="font-size:14px;font-weight:800;color:#1e293b;margin-bottom:5px;">{{ $k['kelas'] }}</div>
                        <div style="font-size:12px;color:#64748b;line-height:1.6;">{{ $k['desc'] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    {{-- ============================================
         AMBULANS
    ============================================ --}}
    <section id="ambulans" class="lay-section">
        <div class="lay-section-divider"></div>
        <div class="lay-static-card">
            <div class="row g-0">
                <div class="col-lg-4">
                    <div class="lay-static-hero h-100" style="background:linear-gradient(135deg,#78350f 0%,#f59e0b 100%);border-radius:20px 0 0 20px;">
                        <div class="lay-static-icon" style="background:rgba(255,255,255,.15);color:#fff;">
                            <i class="bi bi-truck"></i>
                        </div>
                        <div class="lay-static-name">Ambulans 24 Jam</div>
                        <div class="lay-static-tagline">Respons cepat ke mana pun Anda butuhkan</div>
                        <div style="margin-top:20px;">
                            <a href="tel:085292224886" class="lay-badge-pill" style="background:rgba(255,255,255,.2);color:#fff;border:1px solid rgba(255,255,255,.3);">
                                <i class="bi bi-telephone-fill"></i> Hubungi Sekarang
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="lay-static-body">
                        <div class="lay-static-desc">
                            Layanan ambulans RSU Allam Medica siap 24 jam untuk transportasi pasien gawat darurat maupun rujukan. Armada ambulans dilengkapi peralatan medis darurat dan ditangani oleh pengemudi serta petugas medis terlatih.
                        </div>
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
                            @php
                            $fiturAmb = [
                                ['icon'=>'bi-clock-fill','color'=>'#f59e0b','bg'=>'#fef3c7','title'=>'Siaga 24 Jam','desc'=>'Tersedia setiap saat, termasuk hari libur nasional'],
                                ['icon'=>'bi-geo-alt-fill','color'=>'#dc2626','bg'=>'#fee2e2','title'=>'Jangkauan Luas','desc'=>'Melayani wilayah Bumiayu dan sekitarnya'],
                                ['icon'=>'bi-heart-pulse-fill','color'=>'#7c3aed','bg'=>'#ede9fe','title'=>'Perlengkapan Medis','desc'=>'Tabung oksigen, defibrilator, dan alat medis darurat'],
                                ['icon'=>'bi-person-check-fill','color'=>'#059669','bg'=>'#d1fae5','title'=>'Tim Terlatih','desc'=>'Pengemudi dan petugas medis bersertifikat'],
                            ];
                            @endphp
                            @foreach($fiturAmb as $f)
                            <div style="display:flex;align-items:flex-start;gap:10px;padding:14px;background:#f8faff;border-radius:12px;border:1px solid #e8edf5;">
                                <div style="width:36px;height:36px;border-radius:10px;background:{{ $f['bg'] }};color:{{ $f['color'] }};display:flex;align-items:center;justify-content:center;font-size:15px;flex-shrink:0;">
                                    <i class="bi {{ $f['icon'] }}"></i>
                                </div>
                                <div>
                                    <div style="font-size:13px;font-weight:700;color:#1e293b;margin-bottom:3px;">{{ $f['title'] }}</div>
                                    <div style="font-size:12px;color:#64748b;line-height:1.5;">{{ $f['desc'] }}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ============================================
         LABORATORIUM
    ============================================ --}}
    <section id="laboratorium" class="lay-section">
        <div class="lay-section-divider"></div>
        <div class="row g-4">
            <div class="col-lg-5">
                <div class="lay-static-card h-100">
                    <div class="lay-static-hero" style="background:linear-gradient(135deg,#064e3b 0%,#059669 100%);">
                        <div class="lay-static-icon" style="background:rgba(255,255,255,.15);color:#fff;">
                            <i class="bi bi-eyedropper"></i>
                        </div>
                        <div class="lay-static-name">Laboratorium</div>
                        <div class="lay-static-tagline">Hasil pemeriksaan akurat dengan teknologi modern</div>
                    </div>
                    <div class="lay-static-body">
                        <div class="lay-static-desc">
                            Laboratorium RSU Allam Medica dilengkapi peralatan diagnostik modern untuk berbagai jenis pemeriksaan. Hasil yang akurat dan cepat untuk mendukung diagnosis dokter.
                        </div>
                        <ul class="lay-feature-list" style="color:#059669;">
                            <li>Pemeriksaan darah lengkap</li>
                            <li>Tes urin dan feses</li>
                            <li>Pemeriksaan kimia klinik</li>
                            <li>Serologi dan imunologi</li>
                            <li>Kultur dan sensitivitas bakteri</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-flex align-items-stretch">
                <div style="background:#fff;border-radius:20px;border:1px solid #e8edf5;box-shadow:0 4px 20px rgba(28,20,92,.06);padding:28px 32px;width:100%;">
                    <div class="lay-section-badge" style="background:#d1fae5;color:#059669;margin-bottom:16px;">
                        <i class="bi bi-clock" style="font-size:10px;"></i> Jam Operasional
                    </div>
                    <div style="display:flex;flex-direction:column;gap:10px;">
                        @php
                        $jadwalLab = [
                            ['hari'=>'Senin – Jumat','jam'=>'07.00 – 21.00','status'=>'normal'],
                            ['hari'=>'Sabtu','jam'=>'07.00 – 17.00','status'=>'normal'],
                            ['hari'=>'Minggu & Hari Libur','jam'=>'08.00 – 14.00','status'=>'terbatas'],
                            ['hari'=>'Layanan Darurat','jam'=>'24 Jam','status'=>'darurat'],
                        ];
                        @endphp
                        @foreach($jadwalLab as $j)
                        <div style="display:flex;align-items:center;justify-content:space-between;padding:12px 16px;background:#f8faff;border-radius:10px;border:1px solid #e8edf5;">
                            <span style="font-size:13.5px;font-weight:600;color:#1e293b;">{{ $j['hari'] }}</span>
                            <span style="font-size:13px;font-weight:700;
                                color:{{ $j['status']==='darurat' ? '#dc2626' : ($j['status']==='terbatas' ? '#d97706' : '#059669') }};">
                                {{ $j['jam'] }}
                            </span>
                        </div>
                        @endforeach
                    </div>
                    <div style="margin-top:20px;padding:16px;background:#d1fae5;border-radius:12px;display:flex;align-items:center;gap:12px;">
                        <i class="bi bi-info-circle-fill" style="color:#059669;font-size:18px;flex-shrink:0;"></i>
                        <div style="font-size:12.5px;color:#065f46;line-height:1.6;">
                            Hasil laboratorium rutin dapat diambil dalam <strong>2–4 jam</strong> setelah pengambilan sampel.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ============================================
         RADIOLOGI
    ============================================ --}}
    <section id="radiologi" class="lay-section">
        <div class="lay-section-divider"></div>
        <div class="lay-static-card">
            <div class="row g-0">
                <div class="col-lg-4">
                    <div class="lay-static-hero h-100" style="background:linear-gradient(135deg,#1e1b4b 0%,#6366f1 100%);border-radius:20px 0 0 20px;">
                        <div class="lay-static-icon" style="background:rgba(255,255,255,.15);color:#fff;">
                            <i class="bi bi-radioactive"></i>
                        </div>
                        <div class="lay-static-name">Radiologi</div>
                        <div class="lay-static-tagline">Diagnostik pencitraan dengan akurasi tinggi</div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="lay-static-body">
                        <div class="lay-static-desc">
                            Instalasi Radiologi RSU Allam Medica menyediakan layanan diagnostik pencitraan dengan peralatan modern. Didukung dokter spesialis radiologi berpengalaman untuk interpretasi hasil yang akurat.
                        </div>
                        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-top:4px;">
                            @php
                            $radLayanan = [
                                ['icon'=>'bi-lungs-fill','nama'=>'Rontgen / X-Ray','color'=>'#6366f1'],
                                ['icon'=>'bi-activity','nama'=>'USG','color'=>'#0284c7'],
                                ['icon'=>'bi-cpu-fill','nama'=>'CT Scan','color'=>'#7c3aed'],
                                ['icon'=>'bi-heart-pulse','nama'=>'EKG','color'=>'#dc2626'],
                                ['icon'=>'bi-soundwave','nama'=>'Echo','color'=>'#d97706'],
                                ['icon'=>'bi-file-medical','nama'=>'Foto Thorax','color'=>'#059669'],
                            ];
                            @endphp
                            @foreach($radLayanan as $r)
                            <div style="text-align:center;padding:16px 10px;background:#f8faff;border-radius:12px;border:1px solid #e8edf5;">
                                <div style="font-size:24px;color:{{ $r['color'] }};margin-bottom:7px;"><i class="bi {{ $r['icon'] }}"></i></div>
                                <div style="font-size:12px;font-weight:700;color:#1e293b;line-height:1.3;">{{ $r['nama'] }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ============================================
         FARMASI
    ============================================ --}}
    <section id="farmasi" class="lay-section">
        <div class="lay-section-divider"></div>
        <div class="row g-4">
            <div class="col-lg-5">
                <div class="lay-static-card h-100">
                    <div class="lay-static-hero" style="background:linear-gradient(135deg,#831843 0%,#ec4899 100%);">
                        <div class="lay-static-icon" style="background:rgba(255,255,255,.15);color:#fff;">
                            <i class="bi bi-capsule"></i>
                        </div>
                        <div class="lay-static-name">Farmasi / Apotek</div>
                        <div class="lay-static-tagline">Obat-obatan berkualitas, harga terjangkau</div>
                    </div>
                    <div class="lay-static-body">
                        <div class="lay-static-desc">
                            Instalasi Farmasi RSU Allam Medica menyediakan obat-obatan lengkap dan berkualitas. Melayani resep dokter rumah sakit, resep luar, serta obat bebas dengan harga yang terjangkau.
                        </div>
                        <ul class="lay-feature-list" style="color:#ec4899;">
                            <li>Obat generik & paten lengkap</li>
                            <li>Melayani resep BPJS & umum</li>
                            <li>Konsultasi apoteker tersedia</li>
                            <li>Jam operasional panjang</li>
                        </ul>
                    </div>
                    <div class="lay-static-footer">
                        <span class="lay-badge-pill" style="background:#fce7f3;color:#db2777;border:1px solid #f9a8d4;">
                            <i class="bi bi-clock"></i> Sen–Sab: 07.00–21.00
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-flex align-items-stretch">
                <div style="background:#fff;border-radius:20px;border:1px solid #e8edf5;box-shadow:0 4px 20px rgba(28,20,92,.06);padding:28px 32px;width:100%;display:flex;flex-direction:column;justify-content:center;">
                    <div class="lay-section-badge" style="background:#fce7f3;color:#db2777;margin-bottom:16px;">
                        <i class="bi bi-info-circle" style="font-size:10px;"></i> Info Layanan
                    </div>
                    <div style="display:flex;flex-direction:column;gap:14px;">
                        @php
                        $infoFar = [
                            ['icon'=>'bi-prescription2','title'=>'Resep Dokter RS','desc'=>'Resep dari dokter RSU Allam Medica diproses dengan cepat dan prioritas.','color'=>'#ec4899','bg'=>'#fce7f3'],
                            ['icon'=>'bi-bag-heart','title'=>'Resep Luar & Bebas','desc'=>'Melayani resep dari dokter luar serta penjualan obat bebas dan suplemen kesehatan.','color'=>'#7c3aed','bg'=>'#ede9fe'],
                            ['icon'=>'bi-shield-check','title'=>'Jaminan Kualitas','desc'=>'Semua obat bersumber dari distributor resmi dan tersimpan sesuai standar farmasi.','color'=>'#059669','bg'=>'#d1fae5'],
                        ];
                        @endphp
                        @foreach($infoFar as $f)
                        <div style="display:flex;align-items:flex-start;gap:14px;padding:16px;background:#f8faff;border-radius:12px;border:1px solid #e8edf5;">
                            <div style="width:40px;height:40px;border-radius:11px;background:{{ $f['bg'] }};color:{{ $f['color'] }};display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0;">
                                <i class="bi {{ $f['icon'] }}"></i>
                            </div>
                            <div>
                                <div style="font-size:14px;font-weight:700;color:#1e293b;margin-bottom:4px;">{{ $f['title'] }}</div>
                                <div style="font-size:12.5px;color:#64748b;line-height:1.6;">{{ $f['desc'] }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ============================================
         MEDICAL CHECK UP
    ============================================ --}}
    <section id="mcu" class="lay-section" style="padding-bottom:60px;">
        <div class="lay-section-divider"></div>
        <div class="row g-4 align-items-center">
            <div class="col-lg-5">
                <div class="lay-static-card">
                    <div class="lay-static-hero" style="background:linear-gradient(135deg,#134e4a 0%,#0d9488 100%);">
                        <div class="lay-static-icon" style="background:rgba(255,255,255,.15);color:#fff;">
                            <i class="bi bi-heart-pulse"></i>
                        </div>
                        <div class="lay-static-name">Medical Check Up</div>
                        <div class="lay-static-tagline">Deteksi dini untuk hidup lebih sehat</div>
                    </div>
                    <div class="lay-static-body">
                        <div class="lay-static-desc">
                            Program MCU RSU Allam Medica dirancang untuk pemeriksaan kesehatan menyeluruh. Tersedia berbagai paket sesuai kebutuhan, mulai dari paket dasar hingga paket komprehensif.
                        </div>
                        <ul class="lay-feature-list" style="color:#0d9488;">
                            <li>Paket MCU dasar, standar & komprehensif</li>
                            <li>MCU untuk instansi & perusahaan</li>
                            <li>Hasil dan konsultasi dokter</li>
                            <li>Bisa dengan BPJS (tertentu)</li>
                        </ul>
                    </div>
                    <div class="lay-static-footer">
                        <a href="https://wa.me/6285292224886?text=Halo,%20saya%20ingin%20info%20paket%20MCU" target="_blank"
                           class="lay-badge-pill" style="background:#ccfbf1;color:#0d9488;border:1px solid #5eead4;">
                            <i class="bi bi-whatsapp"></i> Tanya Paket MCU
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div style="padding:4px 0;">
                    <div class="lay-section-badge" style="background:#ccfbf1;color:#0d9488;margin-bottom:16px;">
                        <i class="bi bi-list-check" style="font-size:10px;"></i> Paket MCU
                    </div>
                    <div style="display:flex;flex-direction:column;gap:12px;">
                        @php
                        $paketMcu = [
                            ['nama'=>'Paket Dasar','harga'=>'Terjangkau','isi'=>['Pemeriksaan fisik lengkap','Darah rutin','Urin rutin','Foto rontgen thorax'],'color'=>'#059669','bg'=>'#d1fae5'],
                            ['nama'=>'Paket Standar','harga'=>'Menengah','isi'=>['Semua paket dasar','Kimia darah (gula, kolesterol, asam urat)','Fungsi hati & ginjal','EKG'],'color'=>'#0284c7','bg'=>'#e0f2fe'],
                            ['nama'=>'Paket Komprehensif','harga'=>'Lengkap','isi'=>['Semua paket standar','USG abdomen','Tumor marker dasar','Spirometri','Audiometri'],'color'=>'#7c3aed','bg'=>'#ede9fe'],
                        ];
                        @endphp
                        @foreach($paketMcu as $p)
                        <div style="background:#fff;border-radius:14px;border:1.5px solid {{ $p['bg'] }};padding:18px 20px;display:flex;align-items:flex-start;gap:14px;">
                            <div style="width:10px;height:10px;border-radius:50%;background:{{ $p['color'] }};flex-shrink:0;margin-top:5px;"></div>
                            <div style="flex:1;">
                                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:8px;gap:10px;flex-wrap:wrap;">
                                    <div style="font-size:15px;font-weight:800;color:#1e293b;">{{ $p['nama'] }}</div>
                                    <span style="font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;background:{{ $p['bg'] }};color:{{ $p['color'] }};">{{ $p['harga'] }}</span>
                                </div>
                                <div style="display:flex;flex-wrap:wrap;gap:6px;">
                                    @foreach($p['isi'] as $item)
                                    <span style="font-size:12px;padding:3px 10px;border-radius:20px;background:#f8faff;border:1px solid #e2e8f0;color:#475569;">{{ $item }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div style="margin-top:16px;font-size:12px;color:#94a3b8;display:flex;align-items:center;gap:6px;">
                        <i class="bi bi-info-circle"></i>
                        Harga dan detail paket dapat berubah. Hubungi kami untuk informasi terkini.
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
</div>


{{-- ============================================================
     MODAL DETAIL POLIKLINIK
============================================================ --}}
<div class="modal fade am-modal" id="modalPoliDetail" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family:'DM Serif Display',serif;font-size:18px;font-weight:400;color:#1C145C;">
                    Detail Poliklinik
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="detPoliImg">
                    <div class="det-img-placeholder" id="detPoliImgPlaceholder">
                        <i class="bi bi-clipboard2-pulse"></i>
                    </div>
                    <img id="detPoliImgEl" src="" alt="" class="det-img-hero" style="display:none;">
                </div>
                <div class="det-body">
                    <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                        <span id="detPoliStatus" class="poli-status-badge" style="position:static;font-size:10px;">Aktif</span>
                        <span style="font-size:11px;color:#94a3b8;font-weight:600;">Rawat Jalan</span>
                    </div>
                    <div class="det-name" id="detPoliName">—</div>
                    <div class="det-desc" id="detPoliDesc">—</div>
                    <div id="detPoliContact"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-close-modal" data-bs-dismiss="modal">Tutup</button>
                <a id="detPoliWaBtn" href="#" target="_blank" class="btn-wa-modal" style="display:none;">
                    <i class="bi bi-whatsapp"></i> Chat WhatsApp
                </a>
            </div>
        </div>
    </div>
</div>


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
                    <li><a href="#igd">IGD 24 Jam</a></li>
                    <li><a href="#rawatjalan">Rawat Jalan</a></li>
                    <li><a href="#rawatinap">Rawat Inap</a></li>
                    <li><a href="#ambulans">Ambulans</a></li>
                    <li><a href="#laboratorium">Laboratorium</a></li>
                    <li><a href="#farmasi">Farmasi</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-12">
                <h6 class="footer-heading">Hubungi Kami</h6>
                <div class="footer-contact-row"><div class="footer-contact-icon"><i class="bi bi-telephone-fill"></i></div><div class="footer-contact-text">(0289) 430822</div></div>
                <div class="footer-contact-row"><div class="footer-contact-icon"><i class="bi bi-envelope-fill"></i></div><div class="footer-contact-text">allam.medica@yahoo.co.id</div></div>
                <div class="footer-contact-row"><div class="footer-contact-icon"><i class="bi bi-clock-fill"></i></div><div class="footer-contact-text">IGD: 24 Jam<br>Rawat Jalan: Sen – Sab 07.00 – 21.00</div></div>
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
    const poliCards = document.querySelectorAll('#poliGrid .poli-card');
    const statEl    = document.getElementById('statPoli');
    const countEl   = document.getElementById('poliCount');
    if (statEl)  statEl.textContent  = poliCards.length || '—';
    if (countEl) countEl.textContent = poliCards.length || '—';
});

/* ============================================================
   FILTER POLI
============================================================ */
function filterPoli() {
    const q   = document.getElementById('searchPoli').value.toLowerCase().trim();
    const sta = document.getElementById('filterPoliStatus').value;
    document.querySelectorAll('#poliGrid .poli-card').forEach(function (card) {
        const nama   = card.dataset.nama   || '';
        const status = card.dataset.status || '';
        const matchQ = !q   || nama.includes(q);
        const matchS = !sta || status === sta;
        card.style.display = (matchQ && matchS) ? '' : 'none';
    });
}

/* ============================================================
   SMOOTH SCROLL TO SECTION
============================================================ */
function smoothScroll(id) {
    event.preventDefault();
    const el = document.getElementById(id);
    if (!el) return;
    const offset = 150;
    const top    = el.getBoundingClientRect().top + window.scrollY - offset;
    window.scrollTo({ top: top, behavior: 'smooth' });
}

/* ============================================================
   STICKY TAB ACTIVE STATE ON SCROLL
============================================================ */
(function () {
    const sections = ['rekap','igd','rawatjalan','rawatinap','ambulans','laboratorium','radiologi','farmasi','mcu'];
    const tabs      = document.querySelectorAll('.lay-tab');
    const offset    = 200;

    function updateTab() {
        let current = 'rekap';
        sections.forEach(function (id) {
            const el = document.getElementById(id);
            if (el && el.getBoundingClientRect().top <= offset) current = id;
        });
        tabs.forEach(function (tab) {
            tab.classList.toggle('active', tab.dataset.section === current);
        });
    }

    window.addEventListener('scroll', updateTab, { passive: true });

    // Tab click → smooth scroll
    tabs.forEach(function (tab) {
        tab.addEventListener('click', function (e) {
            e.preventDefault();
            const id = tab.dataset.section;
            const el = document.getElementById(id);
            if (!el) return;
            const top = el.getBoundingClientRect().top + window.scrollY - 150;
            window.scrollTo({ top: top, behavior: 'smooth' });
        });
    });
})();

/* ============================================================
   MODAL DETAIL POLIKLINIK
============================================================ */
function openPoliModal(nama, desc, hp, wa, status, imgUrl) {
    document.getElementById('detPoliName').textContent = nama;
    document.getElementById('detPoliDesc').textContent = desc || 'Deskripsi layanan belum tersedia.';

    const statusEl = document.getElementById('detPoliStatus');
    statusEl.className = 'poli-status-badge ' + status;
    statusEl.style.position = 'static';
    statusEl.style.fontSize = '10px';
    statusEl.textContent = (status === 'aktif') ? 'Aktif' : 'Nonaktif';

    // Image
    const imgEl  = document.getElementById('detPoliImgEl');
    const plhd   = document.getElementById('detPoliImgPlaceholder');
    if (imgUrl && imgUrl.trim() !== '') {
        imgEl.src = imgUrl;
        imgEl.style.display = 'block';
        plhd.style.display  = 'none';
    } else {
        imgEl.style.display = 'none';
        plhd.style.display  = 'flex';
    }

    // Contact
    const noWa = wa ? wa.replace(/\D/g,'') : '';
    let contactHtml = '';
    if (hp) contactHtml += `
        <div class="det-contact-row">
            <div class="det-contact-icon" style="background:#fee2e2;color:#dc2626;"><i class="bi bi-telephone-fill"></i></div>
            <a href="tel:${hp}" class="det-contact-val" style="color:#1e293b;text-decoration:none;">${hp}</a>
        </div>`;
    if (noWa) contactHtml += `
        <div class="det-contact-row">
            <div class="det-contact-icon" style="background:#d1fae5;color:#059669;"><i class="bi bi-whatsapp"></i></div>
            <a href="https://wa.me/${noWa}" target="_blank" class="det-contact-val" style="color:#059669;text-decoration:none;">+${noWa}</a>
        </div>`;
    if (!hp && !noWa) contactHtml = '<span style="font-size:13px;color:#94a3b8;font-style:italic;">Belum ada informasi kontak</span>';
    document.getElementById('detPoliContact').innerHTML = contactHtml;

    // WA button
    const waBtn = document.getElementById('detPoliWaBtn');
    if (noWa) {
        waBtn.href = 'https://wa.me/' + noWa;
        waBtn.style.display = 'inline-flex';
    } else {
        waBtn.style.display = 'none';
    }

    new bootstrap.Modal(document.getElementById('modalPoliDetail')).show();
}

/* ============================================================
   ANCHOR HASH ON LOAD
============================================================ */
window.addEventListener('load', function () {
    if (window.location.hash) {
        const id = window.location.hash.replace('#','');
        const el = document.getElementById(id);
        if (el) {
            setTimeout(function () {
                const top = el.getBoundingClientRect().top + window.scrollY - 150;
                window.scrollTo({ top: top, behavior: 'smooth' });
            }, 400);
        }
    }
});
</script>

</body>
</html>