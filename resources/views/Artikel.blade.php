<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Artikel — RSU Allam Medica</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">
</head>

<style>
/* ============================================================
   HERO
============================================================ */
.artikel-hero {
    background: linear-gradient(150deg, #1C145C 0%, #231a72 40%, #0ea5e9 100%);
    padding: 85px 0 72px; position: relative; overflow: hidden;
}
.artikel-hero::before {
    content: ''; position: absolute; right: -80px; top: -80px;
    width: 420px; height: 420px; border-radius: 50%;
    background: radial-gradient(circle, rgba(255,255,255,.06), transparent 65%); pointer-events: none;
}
.artikel-hero::after {
    content: ''; position: absolute; left: -40px; bottom: -100px;
    width: 300px; height: 300px; border-radius: 50%;
    background: radial-gradient(circle, rgba(14,165,233,.12), transparent 65%); pointer-events: none;
}
.hero-dots {
    position: absolute; inset: 0; pointer-events: none;
    background-image: radial-gradient(rgba(255,255,255,.05) 1px, transparent 1px);
    background-size: 26px 26px;
}
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
.hero-title {
    font-family: 'DM Serif Display', serif;
    font-size: clamp(28px, 4.5vw, 46px); color: #fff; line-height: 1.2;
    letter-spacing: -.3px; margin-bottom: 18px; font-weight: 400;
}
.hero-meta { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
.hero-meta-pill {
    display: inline-flex; align-items: center; gap: 6px;
    background: rgba(255,255,255,.1); border: 1px solid rgba(255,255,255,.15);
    color: rgba(255,255,255,.8); font-size: 12px; font-weight: 600;
    padding: 5px 13px; border-radius: 20px; backdrop-filter: blur(6px);
}
.hero-meta-pill i { font-size: 10px; color: #7dd3fc; }

/* ============================================================
   BODY
============================================================ */
.artikel-body { padding: 52px 0 72px; background: #fff; }

.artikel-main-card {
    background: #fff; border-radius: 20px; overflow: hidden;
    box-shadow: 0 4px 24px rgba(28,20,92,.08);
    border: 1px solid #e8edf5; margin-bottom: 28px;
}
.artikel-featured-img { width:100%; height:auto; object-fit:contain; display:block; }
.artikel-img-placeholder {
    width: 100%; aspect-ratio: 16/7;
    background: linear-gradient(135deg, #e0f2fe, #cffafe);
    display: flex; align-items: center; justify-content: center;
    font-size: 72px; color: #0ea5e9; opacity: .4;
}

.artikel-content { padding: 28px 32px 32px; }
.artikel-content p { font-size: 15.5px; line-height: 1.9; color: #374151; margin-bottom: 20px; }

.artikel-share-bar {
    display: flex; align-items: center; justify-content: space-between;
    padding: 14px 32px; border-top: 1px solid #e8edf5;
    background: #fafbff; flex-wrap: wrap; gap: 12px;
}
.share-label { font-size: 13px; font-weight: 700; color: #64748b; display: flex; align-items: center; gap: 6px; }
.share-btns { display: flex; gap: 8px; }
.share-btn {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 7px 16px; border-radius: 8px; border: none;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 12.5px; font-weight: 700; cursor: pointer;
    text-decoration: none; transition: transform .2s, box-shadow .2s;
}
.share-btn:hover { transform: translateY(-2px); }
.btn-wa   { background: #25D366; color: #fff; box-shadow: 0 3px 10px rgba(37,211,102,.3); }
.btn-wa:hover { color: #fff; box-shadow: 0 6px 18px rgba(37,211,102,.4); }
.btn-copy { background: #f1f5f9; color: #475569; border: 1.5px solid #e2e8f0; }
.btn-copy.copied { background: #10b981; color: #fff; border-color: #10b981; }

/* ============================================================
   SIDEBAR
============================================================ */
.sidebar-card {
    background: #fff; border-radius: 16px; overflow: hidden;
    box-shadow: 0 4px 18px rgba(28,20,92,.07);
    border: 1px solid #e8edf5; margin-bottom: 20px;
}
.sc-head {
    padding: 14px 20px 12px; border-bottom: 1px solid #e8edf5;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px; font-weight: 800; color: #1e293b;
    display: flex; align-items: center; gap: 8px;
}
.sc-head i { color: #0ea5e9; font-size: 13px; }
.sc-body { padding: 14px 18px; }

.sidebar-dokter-card {
    display: flex; align-items: center; gap: 12px;
    padding: 12px 14px;
    background: linear-gradient(135deg, #eff6ff, #dbeafe);
    border: 1.5px solid #bfdbfe; border-radius: 10px;
}
.sidebar-dokter-card img {
    width: 44px; height: 44px; border-radius: 50%;
    object-fit: cover; border: 2px solid #93c5fd; flex-shrink: 0;
}
.sidebar-dokter-card .no-foto {
    width: 44px; height: 44px; border-radius: 50%;
    background: #dbeafe; color: #2563eb;
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; flex-shrink: 0;
}
.sidebar-dokter-card .dk-label { font-size: 10px; font-weight: 700; color: #3b82f6; text-transform: uppercase; letter-spacing: .5px; }
.sidebar-dokter-card .dk-nama  { font-size: 13px; font-weight: 800; color: #1e40af; line-height: 1.3; }
.sidebar-dokter-card .dk-sp    { font-size: 11.5px; color: #3b82f6; }
.sidebar-dokter-btn {
    display: flex; align-items: center; justify-content: center; gap: 6px;
    margin-top: 10px; padding: 9px 14px; border-radius: 8px;
    background: #1e40af; color: #fff; text-decoration: none;
    font-size: 12.5px; font-weight: 700;
    transition: background .2s, transform .2s;
}
.sidebar-dokter-btn:hover { background: #1d4ed8; color: #fff; transform: translateY(-1px); }

.artikel-item {
    display: flex; align-items: flex-start; gap: 12px;
    padding: 10px 0; border-bottom: 1px solid #f1f5f9;
    text-decoration: none; color: #1e293b; cursor: pointer;
}
.artikel-item:last-child { border-bottom: 0; padding-bottom: 0; }
.artikel-item:hover .ai-title { color: #0ea5e9; }
.ai-thumb { width: 64px; height: 48px; border-radius: 8px; object-fit: cover; flex-shrink: 0; }
.ai-thumb-placeholder {
    width: 64px; height: 48px; border-radius: 8px;
    background: linear-gradient(135deg, #e0f2fe, #cffafe);
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; color: #0ea5e9; flex-shrink: 0;
}
.ai-title {
    font-size: 13px; font-weight: 700; color: #1e293b; line-height: 1.4;
    transition: color .15s;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
}
.ai-date { font-size: 11px; color: #94a3b8; margin-top: 4px; display: flex; align-items: center; gap: 4px; }

.tag-cloud { display: flex; flex-wrap: wrap; gap: 7px; }
.tag-pill {
    display: inline-flex; align-items: center; gap: 5px;
    background: #f1f5f9; color: #475569;
    font-size: 12px; font-weight: 700; padding: 5px 13px; border-radius: 20px;
    border: 1.5px solid #e2e8f0; text-decoration: none;
    transition: background .2s, color .2s, border-color .2s;
}
.tag-pill:hover { background: #1C145C; color: #fff; border-color: #1C145C; }

/* ============================================================
   ARTIKEL GRID
============================================================ */
.artikel-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 22px; padding: 20px 0 32px;
}
.artikel-card {
    background: #fff; border-radius: 16px; overflow: hidden;
    box-shadow: 0 2px 12px rgba(28,20,92,.07);
    border: 1px solid #e8edf5;
    display: flex; flex-direction: column;
    transition: transform .25s, box-shadow .25s;
}
.artikel-card:hover { transform: translateY(-5px); box-shadow: 0 12px 36px rgba(28,20,92,.12); }
.ac-thumb {
    position: relative; overflow: hidden; flex-shrink: 0;
    display:flex; align-items:center; justify-content:center; background:#f8fafc;
}
.ac-thumb img { width:100%; height:auto; object-fit:contain; transition: transform .4s ease; }
.artikel-card:hover .ac-thumb img { transform: scale(1.04); }
.ac-thumb-placeholder {
    width: 100%; aspect-ratio: 16/9;
    background: linear-gradient(135deg, #e0f2fe, #cffafe);
    display: flex; align-items: center; justify-content: center;
    font-size: 42px; color: #0ea5e9;
}
.ac-kat {
    position: absolute; top: 10px; left: 10px;
    background: rgba(28,20,92,.82); backdrop-filter: blur(6px);
    color: #fff; font-size: 10px; font-weight: 800;
    text-transform: uppercase; letter-spacing: .7px;
    padding: 3px 10px; border-radius: 20px;
}
.ac-body { padding: 16px 18px; flex: 1; display: flex; flex-direction: column; }
.ac-date { font-size: 11px; color: #94a3b8; font-weight: 600; text-transform: uppercase; letter-spacing: .5px; margin-bottom: 7px; display: flex; align-items: center; gap: 5px; }
.ac-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 14.5px; font-weight: 800; color: #1e293b; line-height: 1.4; margin-bottom: 7px;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
}
.ac-excerpt {
    font-size: 13px; color: #64748b; line-height: 1.6; flex: 1;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
    margin-bottom: 12px;
}
.ac-footer { display:flex; align-items:center; margin-top:auto; padding:12px 18px 16px; border-top:1px solid #eef2f7; }
.ac-read-btn {
    display:inline-flex; align-items:center; justify-content:center; gap:8px;
    padding:9px 18px; border-radius:10px;
    background:#1C145C; color:#fff;
    font-size:13px; font-weight:600; text-decoration:none;
    transition:all .25s ease;
}
.ac-read-btn i { font-size:11px; transition:transform .25s ease; }
.ac-read-btn:hover { background:#2a1f7a; transform:translateY(-2px); color:#fff; }
.ac-read-btn:hover i { transform:translateX(3px); }

/* Filter bar */
.filter-bar {
    background: #fff; border-radius: 14px; border: 1px solid #e8edf5;
    padding: 14px 18px; display: flex; align-items: center; gap: 12px;
    margin-bottom: 24px; flex-wrap: wrap;
    box-shadow: 0 2px 10px rgba(28,20,92,.06);
}
.filter-search-wrap { position: relative; flex: 1; min-width: 200px; }
.filter-search-wrap i { position: absolute; left: 13px; top: 50%; transform: translateY(-50%); color: #94a3b8; font-size: 13px; pointer-events: none; }
.filter-search {
    width: 100%; padding: 9px 13px 9px 36px;
    border: 1.5px solid #e2e8f0; border-radius: 10px;
    font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13.5px; color: #1e293b;
    outline: none; background: #f8faff;
    transition: border-color .2s, box-shadow .2s;
}
.filter-search::placeholder { color: #b0bec5; }
.filter-search:focus { border-color: #0ea5e9; box-shadow: 0 0 0 3px rgba(14,165,233,.12); background: #fff; }
.filter-select {
    padding: 9px 28px 9px 12px; border: 1.5px solid #e2e8f0;
    border-radius: 10px; font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px; color: #1e293b; outline: none; background: #f8faff;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%2364748b' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
    background-repeat: no-repeat; background-position: right 10px center; cursor: pointer;
}
.filter-select:focus { border-color: #0ea5e9; outline: none; }

.section-heading { font-family: 'DM Serif Display', serif; font-size: 28px; font-weight: 400; color: #1C145C; margin-bottom: 6px; letter-spacing: -.3px; }
.section-sub { font-size: 14px; color: #64748b; margin-bottom: 24px; }
.section-divider { display: flex; align-items: center; gap: 12px; margin-bottom: 24px; }
.section-divider::after { content: ''; flex: 1; height: 1.5px; background: linear-gradient(to right, #e2e8f0, transparent); }

/* Pagination */
.artikel-pagination { display: flex; flex-direction: column; align-items: center; gap: 12px; padding: 20px 0 28px; border-top: 1px solid #e8edf5; }
.pag-buttons { display: flex; align-items: center; gap: 4px; flex-wrap: wrap; justify-content: center; }
.pag-btn {
    display: inline-flex; align-items: center; justify-content: center;
    min-width: 38px; height: 38px; border-radius: 10px;
    border: 1.5px solid #e2e8f0; background: #fff; color: #475569;
    font-size: 13px; font-weight: 600; cursor: pointer;
    text-decoration: none; transition: all .2s;
}
.pag-btn:hover, .pag-btn.active { background: #1C145C; border-color: #1C145C; color: #fff; }
.pag-info { font-size: 13px; color: #94a3b8; }

/* Empty */
.empty-state { grid-column: 1/-1; padding: 64px 24px; text-align: center; color: #64748b; }
.empty-state .es-icon { width: 72px; height: 72px; border-radius: 20px; background: #e0f2fe; color: #0ea5e9; display: flex; align-items: center; justify-content: center; font-size: 28px; margin: 0 auto 16px; }
.empty-state .es-title { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 16px; font-weight: 700; color: #1e293b; margin-bottom: 6px; }
.empty-state .es-sub { font-size: 13.5px; }



.dtc-foto-wrap {
    position: relative; flex-shrink: 0;
}
.dtc-foto {
    width: 46px; height: 46px; border-radius: 50%;
    object-fit: cover;
    border: 2.5px solid rgba(255,255,255,.35);
    transition: border-color .2s, transform .2s;
    display: block;
}
.dtc-no-foto {
    width: 46px; height: 46px; border-radius: 50%;
    background: rgba(255,255,255,.12);
    border: 2.5px solid rgba(255,255,255,.25);
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; color: rgba(255,255,255,.6);
    flex-shrink: 0;
    transition: border-color .2s, transform .2s;
}
.dtc-online-dot {
    position: absolute; bottom: 1px; right: 1px;
    width: 10px; height: 10px; border-radius: 50%;
    background: #10b981;
    border: 2px solid #1C145C;
}

.dtc-info { min-width: 0; }
.dtc-label {
    font-size: 9px; font-weight: 800; color: rgba(255,255,255,.45);
    text-transform: uppercase; letter-spacing: .8px; margin-bottom: 1px;
}
.dtc-nama {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 12.5px; font-weight: 800; color: #fff;
    white-space: nowrap; line-height: 1.3;
    transition: color .2s;
}
.dtc-sp {
    font-size: 10.5px; color: rgba(125,211,252,.8);
    white-space: nowrap; font-weight: 500;
}

/* Responsive */
@media(max-width:991.98px) {
    .artikel-content { padding: 24px 20px 28px; }
    .artikel-share-bar { padding: 12px 20px; }
    .artikel-grid { grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 16px; }
    .dokter-ticker-track { animation-duration: 60s; }
}
@media(max-width:575.98px) {
    .artikel-hero { padding: 80px 0 56px; }
    .hero-title { font-size: 26px; }
    .artikel-content { padding: 18px 16px 24px; }
    .artikel-share-bar { padding: 12px 16px; }
    .artikel-grid { grid-template-columns: 1fr; }
    .filter-bar { flex-direction: column; align-items: stretch; }
    .ac-footer { padding: 10px 16px 14px; }
    .ac-read-btn { width: 100%; }
    .dokter-ticker-track { animation-duration: 45s; }
    .dtc-foto, .dtc-no-foto { width: 38px; height: 38px; }
    .dtc-nama { font-size: 11.5px; }
    .dokter-ticker-card { padding: 0 14px 0 0; gap: 8px; }
}
</style>

<!-- ============================================================
     TOPBAR
============================================================ -->
<style>
.topbar { background: linear-gradient(90deg,#1C145C 0%,#34258d 50%,#1C145C 100%); position:fixed; top:0;left:0;width:100%;height:38px;z-index:10000;display:flex;align-items:center; }
.topbar .container { display:flex;align-items:center;justify-content:space-between; }
.topbar-info { display:flex;align-items:center;gap:14px; }
.topbar-info span { color:rgba(255,255,255,.88);font-size:12px;display:flex;align-items:center;gap:6px;white-space:nowrap; }
.topbar-social { display:flex;align-items:center;gap:12px; }
.topbar-social a { color:rgba(255,255,255,.75);font-size:14px;text-decoration:none;transition:.2s; }
.topbar-social a:hover { color:#fff; }
@media(max-width:991px) { .topbar-info span { font-size:10px; } .topbar-social { gap:10px; } }
@media(max-width:480px) { .topbar-info span { font-size:9px; } }
</style>

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
<style>
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
    .navbar-float-wrap { top:38px;padding:4px 12px; }
    .navbar-float { border-radius:26px;padding:8px 14px; }
    .nav-links,.nav-cta { display:none; }
    .nav-burger { display:flex; }
}
@media(max-width:480px) { .navbar-float { border-radius:22px; } }
</style>

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
<style>body { padding-top: 37px; }</style>

{{-- ============================================================
     MODE: DETAIL ARTIKEL
============================================================ --}}
@if(isset($artikel))

<section class="artikel-hero">
    <div class="hero-dots"></div>
    <div class="container hero-inner">
        <div class="hero-bc">
            <a href="/"><i class="bi bi-house-fill"></i> Beranda</a>
            <span class="sep"><i class="bi bi-chevron-right"></i></span>
            <a href="{{ url('/artikel') }}">Artikel</a>
            <span class="sep"><i class="bi bi-chevron-right"></i></span>
            <span class="cur">Detail Artikel</span>
        </div>
        @if(!empty($artikel->kategori))
        <div class="hero-kat">
            <i class="fa-solid fa-tag" style="font-size:10px;"></i> {{ $artikel->kategori }}
        </div>
        @endif
        <h1 class="hero-title">{{ $artikel->judul }}</h1>
        <div class="hero-meta">
            <span class="hero-meta-pill"><i class="fa-solid fa-hospital"></i> RSU Allam Medica</span>
            <span class="hero-meta-pill">
                <i class="fa-regular fa-calendar"></i>
                {{ \Carbon\Carbon::parse($artikel->created_at)->translatedFormat('d F Y') }}
            </span>
            <span class="hero-meta-pill">
                <i class="fa-regular fa-clock"></i>
                {{ ceil(str_word_count(strip_tags($artikel->isi ?? $artikel->deskripsi ?? '')) / 200) }} menit baca
            </span>
            @if($artikel->views ?? false)
            <span class="hero-meta-pill">
                <i class="fa-regular fa-eye"></i> {{ number_format($artikel->views) }} tayangan
            </span>
            @endif
        </div>
    </div>
</section>

<section class="artikel-body">
    <div class="container">
        <div class="row g-4">

            <!-- Main column -->
            <div class="col-lg-8">
                <div class="artikel-main-card">

                    @if(!empty($artikel->gambar))
                        <img src="{{ Storage::url($artikel->gambar) }}"
                             alt="{{ $artikel->judul }}" class="artikel-featured-img">
                    @else
                        <div class="artikel-img-placeholder">
                            <i class="fa-regular fa-newspaper"></i>
                        </div>
                    @endif

                    <div class="artikel-content">
                        {!! nl2br(e($artikel->isi ?? $artikel->deskripsi ?? '')) !!}
                    </div>

                    <div class="artikel-share-bar">
                        <div class="share-label">
                            <i class="fa-solid fa-share-nodes" style="color:#0ea5e9;"></i>
                            Bagikan artikel ini
                        </div>
                        <div class="share-btns">
                            <a href="https://wa.me/?text={{ urlencode($artikel->judul . ' — ' . url()->current()) }}"
                               target="_blank" class="share-btn btn-wa">
                                <i class="fa-brands fa-whatsapp"></i> WhatsApp
                            </a>
                            <button class="share-btn btn-copy" id="copyBtn" onclick="copyLink()">
                                <i class="fa-solid fa-link"></i> Salin Link
                            </button>
                        </div>
                    </div>

                </div>

                <a href="{{ url('/artikel') }}"
                   style="display:inline-flex;align-items:center;gap:8px;padding:10px 22px;
                          border-radius:10px;background:#1C145C;color:#fff;text-decoration:none;
                          font-size:13.5px;font-weight:700;transition:background .2s,transform .2s;">
                    <i class="fa-solid fa-arrow-left" style="font-size:12px;"></i>
                    Kembali ke Daftar Artikel
                </a>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">

                {{-- Dokter sidebar --}}
                @if($artikel->dokters->count())
                <div class="sidebar-card">
                    <div class="sc-head">
                        <i class="fa-solid fa-user-doctor"></i> Dokter Terkait
                    </div>
                    <div class="sc-body">
                        @foreach($artikel->dokters as $dok)
                        <div class="sidebar-dokter-card" style="{{ !$loop->last ? 'margin-bottom:10px;' : '' }}">
                            @if($dok->foto)
                                <img src="{{ asset('storage/'.$dok->foto) }}" alt="{{ $dok->nama }}"
                                     onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                                <div class="no-foto" style="display:none;"><i class="fa-solid fa-user-doctor"></i></div>
                            @else
                                <div class="no-foto"><i class="fa-solid fa-user-doctor"></i></div>
                            @endif
                            <div>
                                <div class="dk-label"><i class="fa-solid fa-stethoscope" style="font-size:9px;"></i> Spesialis</div>
                                <div class="dk-nama">{{ $dok->nama }}</div>
                                <div class="dk-sp">{{ $dok->spesialis ?? 'Dokter' }}</div>
                            </div>
                        </div>
                        @endforeach
                        <a href="{{ route('jadwaldokter') }}" class="sidebar-dokter-btn">
                            <i class="fa-solid fa-calendar-check" style="font-size:11px;"></i>
                            Cek Jadwal Dokter
                        </a>
                    </div>
                </div>
                @endif

                <!-- Tags -->
                <div class="sidebar-card">
                    <div class="sc-head"><i class="fa-solid fa-tags"></i> Topik</div>
                    <div class="sc-body">
                        <div class="tag-cloud">
                            @if(isset($kategoriList) && $kategoriList->count())
                                @foreach($kategoriList as $kat)
                                    <a href="{{ url('/artikel?kategori='.$kat) }}" class="tag-pill">{{ $kat }}</a>
                                @endforeach
                            @else
                                <a href="{{ url('/artikel?kategori=Kesehatan') }}" class="tag-pill">Kesehatan</a>
                                <a href="{{ url('/artikel?kategori=Informasi') }}" class="tag-pill">Informasi</a>
                                <a href="{{ url('/artikel?kategori=Layanan') }}"   class="tag-pill">Layanan</a>
                                <a href="{{ url('/artikel?kategori=Dokter') }}"    class="tag-pill">Dokter</a>
                                <a href="{{ url('/artikel?kategori=Edukasi') }}"   class="tag-pill">Edukasi</a>
                                <a href="{{ url('/artikel?kategori=Tips') }}"      class="tag-pill">Tips</a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Artikel terkait -->
                @if(isset($artikelTerkait) && count($artikelTerkait) > 0)
                <div class="sidebar-card">
                    <div class="sc-head"><i class="fa-solid fa-layer-group"></i> Artikel Terkait</div>
                    <div class="sc-body">
                        @foreach($artikelTerkait->take(4) as $terkait)
                        <a href="{{ route('artikel.detail', $terkait->id) }}" class="artikel-item">
                            @if(!empty($terkait->gambar))
                                <img src="{{ asset('storage/'.$terkait->gambar) }}" alt="{{ $terkait->judul }}" class="ai-thumb">
                            @else
                                <div class="ai-thumb-placeholder"><i class="fa-regular fa-newspaper"></i></div>
                            @endif
                            <div>
                                <div class="ai-title">{{ $terkait->judul }}</div>
                                <div class="ai-date">
                                    <i class="fa-regular fa-clock" style="font-size:9px;"></i>
                                    {{ \Carbon\Carbon::parse($terkait->created_at)->diffForHumans() }}
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</section>


{{-- ============================================================
     MODE: LIST ARTIKEL
============================================================ --}}
@else

<section class="artikel-hero">
    <div class="hero-dots"></div>
    <div class="container hero-inner">
        <div class="hero-bc">
            <a href="/"><i class="bi bi-house-fill"></i> Beranda</a>
            <span class="sep"><i class="bi bi-chevron-right"></i></span>
            <span class="cur">Artikel</span>
        </div>
        <div class="hero-kat">
            <i class="fa-regular fa-newspaper" style="font-size:10px;"></i>
            Artikel & Edukasi Kesehatan
        </div>
        <h1 class="hero-title">Artikel<br><em>RSU Allam Medica</em></h1>
        <div class="hero-meta">
            <span class="hero-meta-pill">
                <i class="fa-solid fa-newspaper"></i>
                {{ isset($artikelList) ? $artikelList->total() : 0 }} Artikel
            </span>
            <span class="hero-meta-pill">
                <i class="fa-solid fa-hospital"></i> RSU Allam Medica Bumiayu
            </span>
        </div>
    </div>
</section>

<section class="artikel-body" style="padding-top:0;">


    <div class="container" style="padding-top:36px;">

        {{-- Filter bar --}}
        <div class="filter-bar">
            <div class="filter-search-wrap">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="search" class="filter-search" id="searchArtikel"
                       placeholder="Cari judul artikel..." value="{{ request('search') }}">
            </div>
            <select class="filter-select" id="filterKategori">
                <option value="">Semua Kategori</option>
                @foreach($kategoriList as $kat)
                    <option value="{{ $kat }}" {{ request('kategori') === $kat ? 'selected' : '' }}>
                        {{ $kat }}
                    </option>
                @endforeach
            </select>
            <select class="filter-select" id="filterSort">
                <option value="newest">Terbaru</option>
                <option value="oldest">Terlama</option>
                <option value="popular">Terpopuler</option>
            </select>
        </div>

        <div class="section-divider">
            <div>
                <div class="section-heading">Semua Artikel</div>
                <div class="section-sub">Baca informasi terbaru, edukasi kesehatan, dan update layanan dari tim kami</div>
            </div>
        </div>

        <div class="artikel-grid" id="artikelGrid">
            @forelse($artikelList as $item)

            <div class="artikel-card"
                 data-judul="{{ strtolower($item->judul) }}"
                 data-kat="{{ strtolower($item->kategori ?? '') }}">

                <div class="ac-thumb">
                    @if($item->gambar)
                        <img src="{{ asset('storage/'.$item->gambar) }}" alt="{{ $item->judul }}" loading="lazy">
                    @else
                        <div class="ac-thumb-placeholder"><i class="fa-regular fa-newspaper"></i></div>
                    @endif
                    @if($item->kategori)
                        <span class="ac-kat">{{ $item->kategori }}</span>
                    @endif
                </div>

                <div class="ac-body">
                    <div class="ac-date">
                        <i class="fa-regular fa-calendar" style="font-size:10px;"></i>
                        {{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') : '-' }}
                    </div>
                    <div class="ac-title">{{ $item->judul }}</div>
                    <div class="ac-excerpt">{{ Str::limit(strip_tags($item->deskripsi ?? ''), 120) }}</div>
                </div>

                <div class="ac-footer">
                    <a href="{{ route('artikel.detail', $item->id) }}" class="ac-read-btn">
                        Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>

            </div>
            @empty
            <div class="empty-state">
                <div class="es-icon"><i class="fa-regular fa-newspaper"></i></div>
                <div class="es-title">Belum Ada Artikel</div>
                <div class="es-sub">Artikel akan segera ditambahkan. Nantikan informasi terbaru dari kami.</div>
            </div>
            @endforelse
        </div>

        @if(isset($artikelList) && $artikelList->hasPages())
        <div class="artikel-pagination">
            <div class="pag-info">
                Menampilkan {{ $artikelList->firstItem() }}–{{ $artikelList->lastItem() }}
                dari {{ $artikelList->total() }} artikel
            </div>
            <div class="pag-buttons">
                @if($artikelList->onFirstPage())
                    <span class="pag-btn" style="opacity:.35;cursor:not-allowed;">‹</span>
                @else
                    <a href="{{ $artikelList->previousPageUrl() }}" class="pag-btn">‹</a>
                @endif
                @foreach($artikelList->getUrlRange(1, $artikelList->lastPage()) as $page => $url)
                    @if($page == $artikelList->currentPage())
                        <span class="pag-btn active">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="pag-btn">{{ $page }}</a>
                    @endif
                @endforeach
                @if($artikelList->hasMorePages())
                    <a href="{{ $artikelList->nextPageUrl() }}" class="pag-btn">›</a>
                @else
                    <span class="pag-btn" style="opacity:.35;cursor:not-allowed;">›</span>
                @endif
            </div>
        </div>
        @endif

    </div>
</section>

@endif


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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function copyLink() {
    const btn = document.getElementById('copyBtn');
    if (!btn) return;
    navigator.clipboard.writeText(window.location.href).then(function() {
        btn.classList.add('copied'); btn.innerHTML = '<i class="fa-solid fa-check"></i> Tersalin!';
        setTimeout(function() { btn.classList.remove('copied'); btn.innerHTML = '<i class="fa-solid fa-link"></i> Salin Link'; }, 2500);
    }).catch(function() {
        const ta = document.createElement('textarea');
        ta.value = window.location.href; document.body.appendChild(ta); ta.select(); document.execCommand('copy'); document.body.removeChild(ta);
        btn.classList.add('copied'); btn.innerHTML = '<i class="fa-solid fa-check"></i> Tersalin!';
        setTimeout(function() { btn.classList.remove('copied'); btn.innerHTML = '<i class="fa-solid fa-link"></i> Salin Link'; }, 2500);
    });
}

const searchEl = document.getElementById('searchArtikel');
if (searchEl) {
    searchEl.addEventListener('input', function() {
        const q = this.value.toLowerCase();
        document.querySelectorAll('.artikel-card').forEach(card => {
            card.style.display = (!q || (card.dataset.judul || '').includes(q)) ? '' : 'none';
        });
    });
}

const katEl = document.getElementById('filterKategori');
if (katEl) {
    katEl.addEventListener('change', function() {
        const val = this.value.toLowerCase();
        document.querySelectorAll('.artikel-card').forEach(card => {
            card.style.display = (!val || (card.dataset.kat || '') === val) ? '' : 'none';
        });
    });
}
</script>

</body>
</html>