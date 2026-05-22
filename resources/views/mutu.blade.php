
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Mutu & Keselamatan Pasien — RSU Allam Medica</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<style>
@font-face {
    font-family: 'GothamBlack';
    src: url('{{ asset('fonts/Gotham-Black.otf') }}') format('opentype');
    font-weight: 900; font-style: normal;
}
h1,h2,h3,h4,h5 { font-family: 'GothamBlack', sans-serif !important; }

body { font-family:'Segoe UI',sans-serif; background:#f5f7fb; overflow-x:hidden; padding-top:calc(38px + 70px); }

/* ── TOPBAR ── */
.topbar { background:linear-gradient(90deg,#1C145C 0%,#34258d 50%,#1C145C 100%); position:fixed; top:0;left:0; width:100%;height:38px; z-index:9999; display:flex; align-items:center; }
.topbar .container { display:flex; align-items:center; justify-content:space-between; }
.topbar-info { display:flex; align-items:center; gap:14px; flex-wrap:nowrap; }
.topbar-info span { color:rgba(255,255,255,.88); font-size:12px; display:flex; align-items:center; gap:6px; white-space:nowrap; }
.topbar-info i { font-size:11px; opacity:.8; }
.topbar-social { display:flex; align-items:center; gap:12px; }
.topbar-social a { color:rgba(255,255,255,.75); font-size:14px; text-decoration:none; display:flex; align-items:center; transition:.2s; }
.topbar-social a:hover { color:#fff; transform:translateY(-1px); }

/* ── NAVBAR ── */
.navbar-float-wrap { position:fixed; top:38px;left:0; width:100%; z-index:9998; padding:12px 20px; }
.navbar-float { max-width:1200px; margin:0 auto; position:relative; display:flex; align-items:center; justify-content:space-between; gap:10px; padding:10px 14px 10px 22px; border-radius:60px; background:rgba(255,255,255,0.07); backdrop-filter:blur(22px) saturate(180%); -webkit-backdrop-filter:blur(22px) saturate(180%); border:1px solid rgba(255,255,255,0.16); box-shadow:0 8px 32px rgba(15,23,42,.08),inset 0 1px 0 rgba(255,255,255,.22); transition:background .3s,border .3s,box-shadow .3s; }
.navbar-float.scrolled { background:rgba(255,255,255,.14); border:1px solid rgba(255,255,255,.22); box-shadow:0 10px 40px rgba(15,23,42,.10),inset 0 1px 0 rgba(255,255,255,.28); }
.navbar-float::before { content:""; position:absolute; inset:0; border-radius:inherit; background:linear-gradient(180deg,rgba(255,255,255,.20),rgba(255,255,255,.02)); pointer-events:none; }
.nav-logo { position:relative; z-index:2; }
.navbar-float .nav-logo img { height:38px; object-fit:contain; display:block; }
.nav-links { display:flex; align-items:center; justify-content:center; flex:1; gap:2px; position:relative; z-index:2; }
.nav-link-pill { padding:8px 15px; border-radius:50px; font-size:14px; font-weight:500; color:#0f172a; text-decoration:none; white-space:nowrap; display:inline-flex; align-items:center; gap:4px; transition:background .2s,color .2s,transform .2s; }
.nav-link-pill:hover { background:rgba(255,255,255,.25); color:#1C145C; transform:translateY(-1px); }
.nav-link-pill.active { background:rgba(255,255,255,.35); color:#1C145C; font-weight:600; box-shadow:inset 0 1px 0 rgba(255,255,255,.4),0 4px 10px rgba(255,255,255,.12); }
.drop-wrap { position:relative; }
.drop-menu { position:absolute; top:calc(100% + 12px); left:50%; transform:translateX(-50%) translateY(8px); min-width:180px; padding:8px; border-radius:22px; background:rgba(255,255,255,.70); backdrop-filter:blur(24px); -webkit-backdrop-filter:blur(24px); border:1px solid rgba(255,255,255,.35); box-shadow:0 12px 35px rgba(15,23,42,.12); opacity:0; visibility:hidden; transition:.22s ease; z-index:100; }
.drop-wrap:hover .drop-menu { opacity:1; visibility:visible; transform:translateX(-50%) translateY(0); }
.drop-item { display:flex; align-items:center; gap:8px; padding:10px 14px; border-radius:14px; font-size:14px; color:#334155; text-decoration:none; transition:.18s; }
.drop-item:hover { background:rgba(255,255,255,.55); color:#1C145C; }
.chevron { font-size:11px; opacity:.6; transition:.25s; }
.drop-wrap:hover .chevron { transform:rotate(180deg); }
.nav-cta { position:relative; z-index:2; }
.btn-kontak { padding:10px 22px; border-radius:50px; background:#1C145C; color:#fff !important; text-decoration:none !important; font-size:14px; font-weight:600; display:inline-block; border:none; box-shadow:0 8px 20px rgba(28,20,92,.25); transition:.2s; }
.btn-kontak:hover { background:#2a1e8a; transform:translateY(-1px); }
.nav-burger { display:none; flex-direction:column; gap:5px; cursor:pointer; border:none; background:transparent; padding:6px; position:relative; z-index:1000; }
.nav-burger span { width:22px; height:2px; background:#1C145C; border-radius:2px; display:block; transition:.3s; }
.nav-burger.open span:nth-child(1) { transform:translateY(7px) rotate(45deg); }
.nav-burger.open span:nth-child(2) { opacity:0; }
.nav-burger.open span:nth-child(3) { transform:translateY(-7px) rotate(-45deg); }
.mobile-menu { display:none; position:absolute; top:calc(100% + 12px); left:0;right:0; padding:10px; border-radius:26px; background:rgba(255,255,255,0.92); backdrop-filter:blur(24px); border:1px solid rgba(255,255,255,0.5); box-shadow:0 14px 40px rgba(15,23,42,.15); z-index:999; }
.mobile-menu.open { display:block; }
.m-link { display:block; padding:13px 16px; border-radius:14px; color:#1e293b; text-decoration:none; font-size:15px; font-weight:500; transition:.18s; }
.m-link:hover,.m-link.active { background:rgba(28,20,92,0.07); color:#1C145C; }
.m-group-label { font-size:11px; font-weight:700; color:#94a3b8; letter-spacing:.8px; text-transform:uppercase; padding:12px 16px 6px; }
.m-sub { padding-left:6px; }
.mobile-menu .btn-kontak { display:block; width:100%; text-align:center; margin-top:10px; border-radius:16px; box-sizing:border-box; }
@media(max-width:1100px){.nav-link-pill{padding:7px 11px;font-size:13px;}}
@media(max-width:991px){body{padding-top:calc(38px + 64px);}.navbar-float-wrap{padding:10px 12px;}.navbar-float{border-radius:26px;padding:10px 14px;}.nav-links,.nav-cta{display:none;}.nav-burger{display:flex;}.topbar-info span{font-size:10px;}.topbar-social{gap:10px;}}
@media(max-width:480px){.topbar .container{gap:8px;}.topbar-info{gap:8px;}.topbar-info span{font-size:9px;}.topbar-social a{font-size:12px;}.navbar-float{border-radius:22px;}}

/* ── HERO ── */
.mutu-hero { position:relative; overflow:hidden; margin-top:-70px; padding:6rem 0 3.5rem; background:linear-gradient(135deg,#060816 0%,#111c44 18%,#1C145C 38%,#4338ca 62%,#111c44 82%,#060816 100%); }
.mutu-hero::before { content:''; position:absolute; inset:0; pointer-events:none; background-image:radial-gradient(circle at 15% 50%,rgba(255,255,255,.05) 0%,transparent 45%),radial-gradient(circle at 85% 20%,rgba(255,255,255,.04) 0%,transparent 40%); }
.mutu-hero::after { content:""; position:absolute; left:0;right:0;bottom:0; height:140px; pointer-events:none; background:linear-gradient(to bottom,rgba(6,8,22,0) 0%,rgba(245,247,251,0.35) 45%,#f5f7fb 100%); }
.mutu-hero-eyebrow { display:inline-flex; align-items:center; gap:8px; background:rgba(255,255,255,.12); border:1px solid rgba(255,255,255,.22); border-radius:100px; padding:5px 14px; font-size:12px; color:rgba(255,255,255,.9); letter-spacing:.05em; margin-bottom:1.1rem; }
.dot-live { width:7px;height:7px; background:#a78bfa; border-radius:50%; animation:blink 2s infinite; }
@keyframes blink{0%,100%{opacity:1;}50%{opacity:.35;}}
.mutu-hero h1 { font-family:'GothamBlack',sans-serif !important; font-size:clamp(1.6rem,3.5vw,2.5rem); color:#fff; line-height:1.2; margin-bottom:.75rem; }
.mutu-hero p { color:rgba(255,255,255,.72); font-size:15px; max-width:520px; line-height:1.7; }
.hero-stat-row { display:flex; gap:12px; flex-wrap:wrap; margin-top:2.25rem; }
.hero-stat-box { background:rgba(255,255,255,.1); border:1px solid rgba(255,255,255,.18); border-radius:14px; padding:.9rem 1.4rem; text-align:center; min-width:120px; }
.hero-stat-box .hsb-val { font-family:'GothamBlack',sans-serif; font-size:1.55rem; color:#fff; line-height:1; margin-bottom:5px; }
.hero-stat-box .hsb-lbl { font-size:11px; color:rgba(255,255,255,.62); letter-spacing:.03em; }

/* ── FILTER PERIODE ── */
.periode-filter { background:#fff; border:1px solid #e2e8f0; border-radius:14px; padding:1rem 1.25rem; margin-bottom:1.5rem; display:flex; align-items:center; gap:12px; flex-wrap:wrap; box-shadow:0 2px 8px rgba(28,20,92,.04); }
.periode-filter label { font-size:13px; font-weight:600; color:#1C145C; white-space:nowrap; }
.periode-filter select { font-size:13px; border:1px solid #d1d5db; border-radius:8px; padding:7px 12px; color:#1e293b; background:#f8f7ff; outline:none; cursor:pointer; }
.periode-filter select:focus { border-color:#1C145C; box-shadow:0 0 0 3px rgba(28,20,92,.08); }
.btn-filter { padding:8px 18px; background:#1C145C; color:#fff; border:none; border-radius:8px; font-size:13px; font-weight:600; cursor:pointer; transition:.2s; }
.btn-filter:hover { background:#2d2090; }

/* ── SECTION ── */
.mutu-section { padding:2.75rem 0 0; }
.section-title { font-family:'GothamBlack',sans-serif !important; font-size:1.15rem; color:#1C145C; margin-bottom:4px; }
.section-sub { font-size:13px; color:#64748b; margin-bottom:1.4rem; }
.mutu-divider { border:none; border-top:1px solid #e8e6f5; margin:2.25rem 0; }

/* ── IMN TAB ── */
.imn-wrapper { background:#fff; border:1px solid #e2e8f0; border-radius:16px; overflow:hidden; margin-bottom:2.5rem; box-shadow:0 2px 12px rgba(28,20,92,.05); }
.imn-tab-nav { display:flex; overflow-x:auto; background:#f1f0fa; border-bottom:1px solid #e2e8f0; scrollbar-width:none; gap:2px; padding:6px 8px; }
.imn-tab-nav::-webkit-scrollbar { display:none; }
.imn-tab-btn { flex-shrink:0; padding:8px 16px; border-radius:30px; font-size:13px; font-family:'Segoe UI',sans-serif; font-weight:500; color:#64748b; background:transparent; border:none; cursor:pointer; white-space:nowrap; transition:all .2s; }
.imn-tab-btn:hover { color:#1C145C; background:rgba(255,255,255,.6); }
.imn-tab-btn.active { background:#fff; color:#1C145C; box-shadow:0 2px 8px rgba(28,20,92,.10); }
.imn-pane { display:none; padding:1.75rem; }
.imn-pane.active { display:block; }
.imn-card { display:grid; grid-template-columns:1fr 1fr; gap:2rem; align-items:start; }
@media(max-width:640px){.imn-card{grid-template-columns:1fr;gap:1.25rem;}}
.imn-desc h3 { font-family:'GothamBlack',sans-serif !important; font-size:1rem; color:#1C145C; margin-bottom:10px; }
.imn-desc p { font-size:13.5px; color:#5a6a7a; line-height:1.75; }
.imn-target { display:inline-block; margin-top:12px; font-size:12.5px; color:#1C145C; background:#eeedf8; padding:4px 12px; border-radius:20px; font-weight:600; }
.imn-data-box { background:#f8f7ff; border:1px solid #e0ddf5; border-radius:14px; padding:1.1rem 1.3rem; }
.imn-data-top { display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:12px; }
.imn-period { font-size:11.5px; color:#94a3b8; }
.imn-result { font-family:'GothamBlack',sans-serif; font-size:2rem; color:#1C145C; line-height:1; }
.imn-fraction { font-size:11px; color:#94a3b8; margin-bottom:8px; }
.imn-progress-label { display:flex; justify-content:space-between; font-size:12px; color:#64748b; margin-bottom:7px; }
.imn-progress-label span:last-child { color:#1C145C; font-weight:600; }
.imn-bar { height:7px; background:#ddd9f5; border-radius:4px; overflow:hidden; }
.imn-fill { height:100%; border-radius:4px; background:linear-gradient(90deg,#2d2090,#1C145C); }
.imn-fill.warning { background:linear-gradient(90deg,#d97706,#b45309); }
.imn-fill.danger  { background:linear-gradient(90deg,#dc2626,#991b1b); }
.imn-badge { display:inline-block; margin-top:12px; font-size:11.5px; font-weight:600; padding:4px 12px; border-radius:20px; }
.imn-badge.tercapai { background:#dcfce7; color:#166534; }
.imn-badge.monitor  { background:#fef9c3; color:#854d0e; }
.imn-badge.belum    { background:#fee2e2; color:#991b1b; }
.imn-nodata { text-align:center; padding:2.5rem; color:#94a3b8; font-size:14px; }
.imn-analisa { margin-top:1rem; font-size:13px; }
.imn-analisa .label { font-size:11px; font-weight:700; color:#1C145C; text-transform:uppercase; letter-spacing:.05em; margin-bottom:4px; }
.imn-analisa .val   { color:#475569; line-height:1.65; }

/* ── AKREDITASI ── */
.akred-card { background:#fff; border:1px solid #e2e8f0; border-radius:16px; padding:1.3rem 1.4rem; display:flex; gap:14px; align-items:flex-start; transition:box-shadow .2s,transform .2s; height:100%; box-shadow:0 2px 8px rgba(28,20,92,.04); }
.akred-card:hover { box-shadow:0 8px 24px rgba(28,20,92,.10); transform:translateY(-3px); }
.akred-icon { width:46px;height:46px; border-radius:12px; background:#eeedf8; display:flex; align-items:center; justify-content:center; font-size:22px; flex-shrink:0; color:#1C145C; }
.akred-body h3 { font-size:14px; font-weight:700; color:#1C145C; margin-bottom:5px; }
.akred-body p  { font-size:12.5px; color:#64748b; line-height:1.6; }
.akred-pill { display:inline-block; margin-top:10px; font-size:11px; padding:3px 11px; border-radius:20px; background:#eeedf8; color:#2d2090; font-weight:600; }

/* ── SKP ── */
.skp-item { background:#fff; border:1px solid #e2e8f0; border-radius:12px; padding:.9rem 1rem; display:flex; align-items:center; gap:12px; transition:border-color .2s,box-shadow .2s; box-shadow:0 1px 4px rgba(28,20,92,.04); }
.skp-item:hover { border-color:#c4bfee; box-shadow:0 4px 12px rgba(28,20,92,.07); }
.skp-num { width:30px;height:30px; background:#1C145C; color:#fff; border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:13px; font-weight:700; flex-shrink:0; }
.skp-item span { font-size:13.5px; color:#334155; }

/* ── PROGRAM ── */
.program-card { background:#fff; border:1px solid #e2e8f0; border-radius:16px; padding:1.25rem; height:100%; transition:all .2s; box-shadow:0 2px 8px rgba(28,20,92,.04); }
.program-card:hover { border-color:#c4bfee; box-shadow:0 8px 24px rgba(28,20,92,.09); transform:translateY(-3px); }
.program-card .p-icon { font-size:28px; margin-bottom:12px; display:block; color:#1C145C; }
.program-card h3 { font-size:13.5px; font-weight:700; color:#1C145C; margin-bottom:7px; }
.program-card p  { font-size:12.5px; color:#64748b; line-height:1.6; }

/* ── LAPORAN ── */
.laporan-box { background:linear-gradient(135deg,#1C145C 0%,#2d2090 100%); border-radius:16px; padding:1.5rem 1.75rem; display:flex; align-items:center; justify-content:space-between; gap:1rem; flex-wrap:wrap; margin-bottom:2.5rem; }
.laporan-box .lb-text p:first-child { font-size:15px; font-weight:700; color:#fff; margin-bottom:3px; }
.laporan-box .lb-text p:last-child  { font-size:12.5px; color:rgba(255,255,255,.65); }
.btn-unduh { display:inline-flex; align-items:center; gap:8px; background:rgba(255,255,255,.15); border:1.5px solid rgba(255,255,255,.35); color:#fff !important; text-decoration:none !important; font-size:13.5px; font-weight:600; padding:10px 22px; border-radius:30px; transition:all .2s; white-space:nowrap; }
.btn-unduh:hover { background:rgba(255,255,255,.25); border-color:rgba(255,255,255,.55); }

/* ── GRAFIK TREN ── */
.grafik-tab-nav { display:flex; overflow-x:auto; gap:6px; padding:4px 0 12px; scrollbar-width:none; flex-wrap:nowrap; }
.grafik-tab-nav::-webkit-scrollbar { display:none; }
.grafik-tab-btn { flex-shrink:0; padding:7px 16px; border-radius:30px; font-size:12.5px; font-weight:500; color:#64748b; background:#fff; border:1px solid #e2e8f0; cursor:pointer; white-space:nowrap; transition:all .2s; }
.grafik-tab-btn:hover { color:#1C145C; border-color:#c4bfee; }
.grafik-tab-btn.active { background:#1C145C; color:#fff; border-color:#1C145C; box-shadow:0 4px 12px rgba(28,20,92,.2); }

.grafik-wrapper { background:#fff; border:1px solid #e2e8f0; border-radius:16px; overflow:hidden; padding:1.5rem; margin-bottom:2.5rem; box-shadow:0 2px 12px rgba(28,20,92,.05); }
.grafik-header { display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:1.25rem; flex-wrap:wrap; gap:10px; }
.grafik-title { font-family:'GothamBlack',sans-serif; font-size:1rem; color:#1C145C; margin-bottom:3px; }
.grafik-meta  { font-size:12px; color:#94a3b8; }
.grafik-legend { display:flex; gap:14px; align-items:center; }
.leg-item { display:flex; align-items:center; gap:6px; font-size:12px; color:#64748b; }
.leg-dot  { width:12px; height:12px; border-radius:50%; display:inline-block; }

.grafik-summary { display:flex; flex-wrap:wrap; gap:10px; margin-top:1.25rem; padding-top:1rem; border-top:1px solid #f1f0fa; }
.gsm-item { flex:1; min-width:120px; background:#f8f7ff; border-radius:10px; padding:.6rem .85rem; }
.gsm-label { font-size:11px; color:#94a3b8; margin-bottom:2px; }
.gsm-val   { font-size:1.1rem; font-family:'GothamBlack',sans-serif; color:#1C145C; }
.gsm-val.ok   { color:#166534; }
.gsm-val.warn { color:#854d0e; }
.gsm-val.bad  { color:#991b1b; }

.grafik-nodata { text-align:center; padding:3rem; color:#94a3b8; font-size:14px; }


@font-face { font-family:'Gotham'; src:url('{{ asset('fonts/Gotham-Black.otf') }}') format('opentype'); font-weight:900; font-style:normal; font-display:swap; }
.footer-rsu { background:linear-gradient(to bottom,#ffffff 0%,#fefefd 3%,#fdfcf6 8%,#fcfbf3 13%,#faf8ee 20%,#f7f5e8 30%,#f3f0e1 45%,#ede9d9 65%,#e8e3d2 85%,#e3deca 100%); color:#1C145C; padding:56px 0 0; position:relative; overflow:hidden; }
.footer-rsu .footer-ornament { position:absolute; right:-80px;bottom:-150px; width:420px;height:420px; opacity:0.07; background-image:url('{{ asset('images/beranda/ornamen.png') }}'); background-size:contain; background-repeat:no-repeat; background-position:center; pointer-events:none; z-index:0; }
.footer-rsu .footer-ornament2 { position:absolute; left:-100px;top:40px; width:340px;height:340px; opacity:0.04; background-image:url('{{ asset('images/beranda/ornamen.png') }}'); background-size:contain; background-repeat:no-repeat; background-position:center; pointer-events:none; z-index:0; }
.footer-rsu .container-fluid { max-width:1100px; position:relative; z-index:1; }
.footer-rsu .footer-logo { height:50px; display:block; margin-bottom:16px; }
.footer-rsu .footer-title { font-size:16px; font-weight:700; color:#1C145C; margin-bottom:8px; }
.footer-rsu .footer-desc { font-size:13px; line-height:1.8; color:#5a5480; margin-bottom:20px; max-width:290px; }
.footer-rsu .footer-social { display:flex; gap:10px; margin-bottom:22px; }
.footer-rsu .footer-social a { width:36px;height:36px; border-radius:50%; background:rgba(28,20,92,.07); border:1px solid rgba(28,20,92,.15); display:flex;align-items:center;justify-content:center; color:#1C145C; text-decoration:none; font-size:15px; transition:.2s ease; }
.footer-rsu .footer-social a:hover { background:#1C145C; color:#FEFCF1; transform:translateY(-2px); }
.footer-rsu .footer-mitra-label { font-size:11px; color:#9994bb; text-transform:uppercase; letter-spacing:.08em; margin-bottom:10px; }
.footer-rsu .footer-mitra { display:flex; gap:10px; align-items:center; flex-wrap:wrap; }
.footer-rsu .footer-mitra img:nth-child(1){height:35px;} .footer-rsu .footer-mitra img:nth-child(2){height:26px;}
.footer-rsu .footer-heading { font-family:'Gotham','Arial Black',sans-serif; font-weight:900; font-size:12px; color:#1C145C; text-transform:uppercase; letter-spacing:.14em; margin-bottom:16px; padding-bottom:10px; border-bottom:1.5px solid rgba(28,20,92,.12); }
.footer-rsu ul{list-style:none;padding:0;margin:0;} .footer-rsu ul li{margin-bottom:9px;}
.footer-rsu a{color:#5a5480;text-decoration:none;font-size:13.5px;transition:.2s ease;display:inline-flex;align-items:center;gap:5px;}
.footer-rsu ul li a::before{content:'›';color:#1C145C;opacity:.4;font-size:15px;line-height:1;}
.footer-rsu a:hover{color:#1C145C;padding-left:3px;}
.footer-rsu .footer-contact-row{display:flex;align-items:flex-start;gap:11px;margin-bottom:13px;}
.footer-rsu .footer-contact-icon{width:33px;height:33px;border-radius:8px;background:rgba(28,20,92,.07);border:1px solid rgba(28,20,92,.1);display:flex;align-items:center;justify-content:center;font-size:14px;color:#1C145C;flex-shrink:0;}
.footer-rsu .footer-contact-text{font-size:13px;color:#5a5480;line-height:1.65;padding-top:4px;}
.footer-rsu hr{height:1px;background:linear-gradient(90deg,rgba(28,20,92,0) 0%,rgba(28,20,92,.12) 30%,rgba(28,20,92,.12) 70%,rgba(28,20,92,0) 100%);border:none;margin:36px 0 0;}
.footer-rsu .footer-bottom{background:rgba(28,20,92,.05);padding:15px 36px;position:relative;z-index:1;}
.footer-rsu .footer-copy{font-size:12.5px;color:#9994bb;display:flex;justify-content:space-between;align-items:center;gap:12px;}
.footer-rsu .footer-copy-badge{background:rgba(28,20,92,.06);border:1px solid rgba(28,20,92,.12);border-radius:20px;padding:4px 14px;font-size:11.5px;color:#7a74a0;white-space:nowrap;}
.footer-rsu .footer-accent-dot{display:inline-block;width:3px;height:3px;border-radius:50%;background:#1C145C;opacity:.25;margin:0 8px;vertical-align:middle;}
@media(max-width:991px){.footer-rsu{padding:45px 0 0;}.footer-rsu .row>div{margin-bottom:28px;}.footer-rsu .footer-desc{max-width:100%;}}
@media(max-width:767px){.footer-rsu{padding:40px 0 0;}.footer-rsu .container-fluid{padding-left:20px !important;padding-right:20px !important;}.footer-rsu .footer-social,.footer-rsu .footer-mitra{justify-content:flex-start;}.footer-rsu .footer-copy{flex-direction:column;align-items:flex-start;gap:8px;}.footer-rsu .footer-bottom{padding:15px 20px;}.footer-rsu a:hover{padding-left:0;}}
</style>

<!-- TOPBAR -->
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

<!-- NAVBAR -->
<div class="navbar-float-wrap">
    <nav class="navbar-float" id="mainNavbar">
        <a href="/" class="nav-logo"><img src="{{ asset('images/beranda/logo-almed.png') }}" alt="RSU Allam Medica"></a>
        <div class="nav-links">
            <a href="/" class="nav-link-pill {{ request()->is('/') ? 'active':'' }}">Beranda</a>
            <div class="drop-wrap">
                <a href="#" class="nav-link-pill {{ request()->is('karir*','berita*','video*') ? 'active':'' }}">Menu <i class="bi bi-chevron-down chevron"></i></a>
                <div class="drop-menu">
                    <a href="{{ url('/karir') }}" class="drop-item"><i class="bi bi-briefcase"></i>Karir</a>
                    <a href="{{ url('/berita') }}" class="drop-item"><i class="bi bi-newspaper"></i>Berita</a>
                    <a href="{{ url('/video') }}" class="drop-item"><i class="bi bi-play-circle"></i>Video</a>
                </div>
            </div>
            <a href="/layanan"  class="nav-link-pill {{ request()->is('layanan*')  ? 'active':'' }}">Layanan</a>
            <a href="/artikel"  class="nav-link-pill {{ request()->is('artikel*')  ? 'active':'' }}">Artikel</a>
            <a href="/download" class="nav-link-pill {{ request()->is('download*') ? 'active':'' }}">Download</a>
            <a href="/tentang"  class="nav-link-pill {{ request()->is('tentang*')  ? 'active':'' }}">Tentang Kami</a>
            <a href="/mutu"     class="nav-link-pill {{ request()->is('mutu*')     ? 'active':'' }}">Mutu</a>
        </div>
        <div class="nav-cta"><a href="/kontak" class="btn-kontak">Kontak</a></div>
        <button class="nav-burger" id="navBurger" aria-label="Toggle menu"><span></span><span></span><span></span></button>
        <div class="mobile-menu" id="mobileMenu">
            <a href="/"         class="m-link {{ request()->is('/')       ? 'active':'' }}">Beranda</a>
            <div class="m-group-label">Menu</div>
            <div class="m-sub">
                <a href="{{ url('/karir') }}"  class="m-link {{ request()->is('karir*')  ? 'active':'' }}">Karir</a>
                <a href="{{ url('/berita') }}" class="m-link {{ request()->is('berita*') ? 'active':'' }}">Berita</a>
                <a href="{{ url('/video') }}"  class="m-link {{ request()->is('video*')  ? 'active':'' }}">Video</a>
            </div>
            <a href="/layanan"  class="m-link {{ request()->is('layanan*')  ? 'active':'' }}">Layanan</a>
            <a href="/artikel"  class="m-link {{ request()->is('artikel*')  ? 'active':'' }}">Artikel</a>
            <a href="/download" class="m-link {{ request()->is('download*') ? 'active':'' }}">Download</a>
            <a href="/tentang"  class="m-link {{ request()->is('tentang*')  ? 'active':'' }}">Tentang Kami</a>
            <a href="/mutu"     class="m-link {{ request()->is('mutu*')     ? 'active':'' }}">Mutu</a>
            <a href="/kontak" class="btn-kontak">Kontak</a>
        </div>
    </nav>
</div>

<!-- HERO -->
<section class="mutu-hero">
    <div class="container">
        <div class="mutu-hero-eyebrow">
            <span class="dot-live"></span>
            @if($latest)
                Data terbaru: {{ $latest->nama_bulan }} {{ $latest->tahun }}
            @else
                Data belum tersedia
            @endif
        </div>
        <h1>Mutu &amp; Keselamatan Pasien</h1>
        <p>RSU Allam Medica Bumiayu berkomitmen memberikan pelayanan kesehatan yang aman, bermutu, dan berorientasi pada kepuasan pasien sesuai standar akreditasi KARS.</p>

        @if($latest)
        <div class="hero-stat-row">
            <div class="hero-stat-box">
                <div class="hsb-val">{{ $latest->kep_capaian ? number_format($latest->kep_capaian,1).'%' : '-' }}</div>
                <div class="hsb-lbl">Kepuasan Pasien</div>
            </div>
            <div class="hero-stat-box">
                @php $wtj = $latest->wtj_capaian; @endphp
                <div class="hsb-val">{{ $wtj ? number_format($wtj,1).'%' : '-' }}</div>
                <div class="hsb-lbl">Waktu Tunggu Rajal</div>
            </div>
            <div class="hero-stat-box">
                <div class="hsb-val">{{ $latest->idp_capaian ? number_format($latest->idp_capaian,0).'%' : '-' }}</div>
                <div class="hsb-lbl">Identifikasi Pasien</div>
            </div>
            <div class="hero-stat-box">
                <div class="hsb-val">{{ $latest->kbt_capaian ? number_format($latest->kbt_capaian,1).'%' : '-' }}</div>
                <div class="hsb-lbl">Kebersihan Tangan</div>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- KONTEN -->
<div class="container">

    <!-- FILTER PERIODE -->
    <div class="mutu-section">
        <div class="periode-filter">
            <label><i class="bi bi-calendar3 me-1"></i> Pilih Periode:</label>
            <form method="GET" action="{{ route('mutu') }}" style="display:flex;gap:8px;align-items:center;flex-wrap:wrap;">
                <select name="bulan">
                    @foreach(['1'=>'Januari','2'=>'Februari','3'=>'Maret','4'=>'April','5'=>'Mei','6'=>'Juni','7'=>'Juli','8'=>'Agustus','9'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember'] as $num => $nama)
                        <option value="{{ $num }}" {{ request('bulan') == $num || ($data && !request('bulan') && $data->bulan == $num) ? 'selected' : '' }}>{{ $nama }}</option>
                    @endforeach
                </select>
                <select name="tahun">
                    @foreach($periodeList->pluck('tahun')->unique()->sortDesc() as $th)
                        <option value="{{ $th }}" {{ request('tahun') == $th || ($data && !request('tahun') && $data->tahun == $th) ? 'selected' : '' }}>{{ $th }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn-filter">Tampilkan</button>
            </form>
            @if($data)
            <span style="font-size:12px;color:#94a3b8;margin-left:auto;">
                Menampilkan data: <strong style="color:#1C145C;">{{ $data->nama_bulan }} {{ $data->tahun }}</strong>
            </span>
            @endif
        </div>
    </div>

    <!-- IMN TABS -->
    <div class="mutu-section">
        <h2 class="section-title">Indikator Nasional Mutu (INM)</h2>
        <p class="section-sub">13 indikator wajib sesuai Kementerian Kesehatan RI — diperbarui setiap bulan</p>

        <div class="imn-wrapper">
            <div class="imn-tab-nav" role="tablist">
                @foreach($definisi as $key => $def)
                    <button class="imn-tab-btn {{ $loop->first ? 'active':'' }}"
                            onclick="showImn('{{ $key }}',this)">
                        {{ $def['label'] }}
                    </button>
                @endforeach
            </div>

            @foreach($definisi as $key => $def)
                @php
                    $capaian  = $data ? $data->{$key.'_capaian'} : null;
                    $num      = $data ? $data->{$key.'_numerator'} ?? null : null;
                    $den      = $data ? $data->{$key.'_denominator'} ?? null : null;
                    $analisa  = $data ? $data->{$key.'_analisa'} : null;
                    $rtl      = $data ? $data->{$key.'_rtl'} : null;

                    // Hitung status & bar width
                    $status  = 'belum';
                    $barPct  = 0;
                    $barClass = '';

                    if ($capaian !== null) {
                        $op = $def['op'];
                        $tv = $def['target_v'];

                        $status = match($op) {
                            '>='  => $capaian >= $tv ? 'tercapai' : 'belum',
                            '>'   => $capaian >  $tv ? 'tercapai' : 'belum',
                            '<'   => $capaian <  $tv ? 'tercapai' : 'belum',
                            '<='  => $capaian <= $tv ? 'tercapai' : 'belum',
                            default => 'belum'
                        };

                        // Bar: untuk target '<', inversi (semakin kecil semakin baik)
                        if (in_array($op, ['<','<='])) {
                            $barPct   = $capaian >= 100 ? 100 : $capaian;
                            $barClass = $status === 'tercapai' ? '' : 'danger';
                        } else {
                            $barPct   = min($capaian, 100);
                            $barClass = $status === 'tercapai' ? '' : 'warning';
                        }
                    }

                    $statusLabel = match($status) {
                        'tercapai' => '✓ Tercapai',
                        'belum'    => '✗ Belum Tercapai',
                        default    => '-'
                    };
                @endphp
                <div class="imn-pane {{ $loop->first ? 'active':'' }}" id="imn-{{ $key }}">
                    <div class="imn-card">
                        <div class="imn-desc">
                            <h3>{{ $def['label'] }}</h3>
                            <p>{{ $def['desc'] }}</p>
                            <span class="imn-target">Target {{ $def['target'] }}</span>

                            @if($analisa)
                            <div class="imn-analisa mt-3">
                                <div class="label">Analisa</div>
                                <div class="val">{{ $analisa }}</div>
                            </div>
                            @endif
                            @if($rtl)
                            <div class="imn-analisa mt-2">
                                <div class="label">Rencana Tindak Lanjut</div>
                                <div class="val">{{ $rtl }}</div>
                            </div>
                            @endif
                        </div>

                        <div>
                            @if($capaian !== null)
                            <div class="imn-data-box">
                                <div class="imn-data-top">
                                    <span class="imn-period">{{ $data->nama_bulan }} {{ $data->tahun }}</span>
                                    <span class="imn-result">{{ number_format($capaian, $capaian == (int)$capaian ? 0 : 2) }}%</span>
                                </div>
                                @if($def['has_num'] && $num !== null && $den !== null)
                                <div class="imn-fraction">{{ number_format($num) }} / {{ number_format($den) }} (Numerator / Denominator)</div>
                                @endif
                                <div class="imn-progress-label">
                                    <span>Capaian</span>
                                    <span>Target {{ $def['target'] }}</span>
                                </div>
                                <div class="imn-bar">
                                    <div class="imn-fill {{ $barClass }}" style="width:{{ $barPct }}%"></div>
                                </div>
                                <span class="imn-badge {{ $status }}">{{ $statusLabel }}</span>
                            </div>
                            @else
                            <div class="imn-nodata">
                                <i class="bi bi-inbox" style="font-size:2rem;display:block;margin-bottom:8px;"></i>
                                Data untuk periode ini belum tersedia
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <hr class="mutu-divider">

    {{-- ── GRAFIK TREN 12 BULAN ── --}}
    @php
        /*
         * Ambil 12 bulan terakhir dari DB (sudah di-pass dari controller sebagai $trendData)
         * Jika controller belum pass $trendData, fallback ke query langsung di sini.
         */
        $trend = isset($trendData)
            ? $trendData
            : \App\Models\IndikatorMutu::orderBy('tahun','desc')
                ->orderBy('bulan','desc')
                ->limit(12)
                ->get()
                ->sortBy(fn($r) => $r->tahun * 100 + $r->bulan)
                ->values();

        // Label bulan untuk sumbu X
        $bulanNama = ['','Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
        $labels = $trend->map(fn($r) => $bulanNama[$r->bulan].' \''.(substr($r->tahun,2)))->values()->toJson();

        // Helper: koleksi capaian per indikator jadi JSON array
        $js = fn($field) => $trend->map(fn($r) => $r->{$field} !== null ? (float)$r->{$field} : null)->values()->toJson();
    @endphp

    <div class="mutu-section">
        <h2 class="section-title">Grafik Tren Capaian Indikator Mutu</h2>
        <p class="section-sub">Perbandingan capaian 13 bulan terakhir terhadap target — klik tab untuk melihat indikator lain</p>

        {{-- TAB PILIH GRAFIK --}}
        <div class="grafik-tab-nav">
            <button class="grafik-tab-btn active" onclick="showGrafik('kbt',this)">Kebersihan Tangan</button>
            <button class="grafik-tab-btn" onclick="showGrafik('apd',this)">APD</button>
            <button class="grafik-tab-btn" onclick="showGrafik('idp',this)">Identifikasi Pasien</button>
            <button class="grafik-tab-btn" onclick="showGrafik('sc',this)">SC Emergensi</button>
            <button class="grafik-tab-btn" onclick="showGrafik('wtj',this)">Waktu Tunggu Rajal</button>
            <button class="grafik-tab-btn" onclick="showGrafik('poe',this)">Penundaan Operasi</button>
            <button class="grafik-tab-btn" onclick="showGrafik('kvd',this)">Visite Dokter</button>
            <button class="grafik-tab-btn" onclick="showGrafik('pkl',this)">Kritis Lab</button>
            <button class="grafik-tab-btn" onclick="showGrafik('kfn',this)">Formularium</button>
            <button class="grafik-tab-btn" onclick="showGrafik('kcp',this)">Clinical Pathway</button>
            <button class="grafik-tab-btn" onclick="showGrafik('prj',this)">Risiko Jatuh</button>
            <button class="grafik-tab-btn" onclick="showGrafik('ktk',this)">Tanggap Komplain</button>
            <button class="grafik-tab-btn" onclick="showGrafik('kep',this)">Kepuasan Pasien</button>
        </div>

        {{-- CANVAS GRAFIK --}}
        <div class="grafik-wrapper">
            @if($trend->isEmpty())
                <div class="grafik-nodata">
                    <i class="bi bi-bar-chart-line" style="font-size:2.5rem;display:block;margin-bottom:10px;opacity:.35;"></i>
                    Belum ada data untuk ditampilkan dalam grafik.
                </div>
            @else
                <div class="grafik-header" id="grafikHeader">
                    <div>
                        <div class="grafik-title" id="grafikTitle">Kepatuhan Kebersihan Tangan</div>
                        <div class="grafik-meta" id="grafikMeta">Target ≥ 85% &nbsp;·&nbsp; 12 bulan terakhir</div>
                    </div>
                    <div class="grafik-legend">
                        <span class="leg-item"><span class="leg-dot" style="background:#1C145C"></span>Capaian</span>
                        <span class="leg-item"><span class="leg-dot" style="background:#e2401c;border-radius:0;height:2px;"></span>Target</span>
                    </div>
                </div>
                <div style="position:relative; height:320px;">
                    <canvas id="grafikCanvas"></canvas>
                </div>
                <div class="grafik-summary" id="grafikSummary"></div>
            @endif
        </div>
    </div>

    {{-- Data JSON untuk Chart.js --}}
    @if(!$trend->isEmpty())
    <script id="chartData" type="application/json">
    {
        "labels": {!! $labels !!},
        "datasets": {
            "kbt": { "label": "Kepatuhan Kebersihan Tangan", "target": 85, "op": ">=", "data": {!! $js('kbt_capaian') !!} },
            "apd": { "label": "Kepatuhan Penggunaan APD",   "target": 100,"op": ">=", "data": {!! $js('apd_capaian') !!} },
            "idp": { "label": "Kepatuhan Identifikasi Pasien","target":100,"op": ">=","data": {!! $js('idp_capaian') !!} },
            "sc":  { "label": "Waktu Tanggap SC Emergensi", "target": 80, "op": ">",  "data": {!! $js('sc_capaian')  !!} },
            "wtj": { "label": "Waktu Tunggu Rawat Jalan",   "target": 80, "op": ">=", "data": {!! $js('wtj_capaian') !!} },
            "poe": { "label": "Penundaan Operasi Elektif",  "target": 5,  "op": "<",  "data": {!! $js('poe_capaian') !!} },
            "kvd": { "label": "Kepatuhan Waktu Visite Dokter","target":80,"op": ">=", "data": {!! $js('kvd_capaian') !!} },
            "pkl": { "label": "Pelaporan Hasil Kritis Lab", "target": 100,"op": ">=", "data": {!! $js('pkl_capaian') !!} },
            "kfn": { "label": "Kepatuhan Formularium Nasional","target":80,"op": ">=","data": {!! $js('kfn_capaian') !!} },
            "kcp": { "label": "Kepatuhan Clinical Pathway", "target": 80, "op": ">=", "data": {!! $js('kcp_capaian') !!} },
            "prj": { "label": "Pencegahan Risiko Jatuh",    "target": 100,"op": ">=", "data": {!! $js('prj_capaian') !!} },
            "ktk": { "label": "Kecepatan Tanggap Komplain", "target": 80, "op": ">=", "data": {!! $js('ktk_capaian') !!} },
            "kep": { "label": "Kepuasan Pasien",            "target": 76.61,"op":">", "data": {!! $js('kep_capaian') !!} }
        }
    }
    </script>
    @endif

    <!-- LAPORAN -->
    <div class="laporan-box">
        <div class="lb-text">
            <p><i class="bi bi-file-earmark-arrow-down me-2"></i>Laporan Indikator Nasional Mutu Bulanan</p>
            <p>Laporan lengkap beserta analisis capaian dan rencana tindak lanjut tersedia untuk diunduh.</p>
        </div>
        <a href="#" class="btn-unduh"><i class="bi bi-download"></i> Unduh Laporan</a>
    </div>

    <p class="text-center pb-4" style="font-size:12.5px;color:#94a3b8;">
        Data indikator mutu diperbarui setiap bulan oleh Komite Mutu RSU Allam Medica Bumiayu.<br>
        Informasi: <strong style="color:#1C145C;">(0289) 430822</strong> · <strong style="color:#1C145C;">allam.medica@yahoo.co.id</strong>
    </p>
</div>

<!-- FOOTER -->
<footer class="footer-rsu">
    <div class="footer-ornament"></div><div class="footer-ornament2"></div>
    <div class="container-fluid px-lg-5 px-4">
        <div class="row justify-content-between">
            <div class="col-lg-4 col-md-6">
                <img src="{{ asset('images/beranda/logo-almed.png') }}" class="footer-logo" alt="Logo RSU Allam Medica">
                <h5 class="footer-title">RSU Allam Medica Bumiayu</h5>
                <p class="footer-desc">Jl. Pangeran Diponegoro No. 609, Jatisawit, Bumiayu, Kabupaten Brebes, Jawa Tengah 52273</p>
                <div class="footer-social">
                    <a href="https://www.tiktok.com/@rsuallammedicabumiayu?_t=8fLMQk9idhI&_r=1" target="_blank"><i class="bi bi-tiktok"></i></a>
                    <a href="https://www.facebook.com/allam.medicabmy?mibextid=LQQJ4d" target="_blank"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/allam.medica/" target="_blank"><i class="bi bi-instagram"></i></a>
                </div>
                <div class="footer-mitra-label">Akreditasi & Mitra</div>
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
                    <li><a href="mutu">Mutu</a></li>
                    <li><a href="kontak">Kontak</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6">
                <h6 class="footer-heading">Menu</h6>
                <ul>
                    <li><a href="video">Video</a></li>
                    <li><a href="karir">Karir</a></li>
                    <li><a href="berita">Berita</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-12">
                <h6 class="footer-heading">Hubungi Kami</h6>
                <div class="footer-contact-row"><div class="footer-contact-icon"><i class="bi bi-telephone-fill"></i></div><div class="footer-contact-text">(0289) 430822</div></div>
                <div class="footer-contact-row"><div class="footer-contact-icon"><i class="bi bi-envelope-fill"></i></div><div class="footer-contact-text">allam.medica@yahoo.co.id</div></div>
                <div class="footer-contact-row"><div class="footer-contact-icon"><i class="bi bi-clock-fill"></i></div><div class="footer-contact-text">IGD: 24 Jam<br>Rawat Jalan: Sen–Sab 07.00–21.00</div></div>
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

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

<script>
/* ══════════════════════════════════════
   GRAFIK TREN INDIKATOR MUTU
══════════════════════════════════════ */
const rawData   = JSON.parse(document.getElementById('chartData')?.textContent || 'null');
let   activeKey = 'kbt';
let   chart     = null;

/* Warna ungu brand */
const BRAND  = '#1C145C';
const FILL   = 'rgba(28,20,92,0.07)';
const TARGET = '#e2401c';

/* Target meta per key */
const targetMeta = {
    '>=': (v, t) => v >= t,
    '>':  (v, t) => v >  t,
    '<':  (v, t) => v <  t,
    '<=': (v, t) => v <= t,
};

function buildChart(key) {
    if (!rawData) return;
    const ds     = rawData.datasets[key];
    const labels = rawData.labels;
    const data   = ds.data;
    const target = ds.target;
    const op     = ds.op;
    const checkFn= targetMeta[op];

    /* Update header */
    document.getElementById('grafikTitle').textContent = ds.label;
    const opLabel = { '>=':'≥', '>':'>', '<':'<', '<=':'≤' }[op] || op;
    document.getElementById('grafikMeta').textContent =
        `Target ${opLabel} ${target}%  ·  12 bulan terakhir`;

    /* Warna titik: hijau = tercapai, merah = belum */
    const pointColors = data.map(v =>
        v === null ? 'transparent' : checkFn(v, target) ? '#16a34a' : '#dc2626'
    );

    const targetLine = data.map(() => target);

    const ctx = document.getElementById('grafikCanvas').getContext('2d');
    if (chart) chart.destroy();

    chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels,
            datasets: [
                {
                    label: ds.label,
                    data,
                    borderColor: BRAND,
                    backgroundColor: FILL,
                    borderWidth: 2.5,
                    tension: 0.35,
                    fill: true,
                    pointBackgroundColor: pointColors,
                    pointBorderColor: pointColors,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    spanGaps: true,
                },
                {
                    label: `Target ${opLabel} ${target}%`,
                    data: targetLine,
                    borderColor: TARGET,
                    borderWidth: 1.5,
                    borderDash: [6, 4],
                    backgroundColor: 'transparent',
                    pointRadius: 0,
                    pointHoverRadius: 0,
                    tension: 0,
                    fill: false,
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: { mode: 'index', intersect: false },
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1C145C',
                    titleColor: '#fff',
                    bodyColor: 'rgba(255,255,255,.8)',
                    padding: 12,
                    cornerRadius: 10,
                    callbacks: {
                        label(ctx) {
                            if (ctx.datasetIndex === 1) return `Target: ${target}%`;
                            const v = ctx.parsed.y;
                            if (v === null) return 'Tidak ada data';
                            const ok = checkFn(v, target);
                            return `Capaian: ${v}% ${ok ? '✓' : '✗'}`;
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: { color: '#f1f0fa' },
                    ticks: { font: { size: 11 }, color: '#94a3b8' }
                },
                y: {
                    min: 0,
                    max: op === '<' ? Math.max(target * 3, 20) : 105,
                    grid: { color: '#f1f0fa' },
                    ticks: {
                        font: { size: 11 },
                        color: '#94a3b8',
                        callback: v => v + '%'
                    }
                }
            }
        }
    });

    /* Summary bawah grafik */
    const validData = data.filter(v => v !== null);
    if (validData.length === 0) {
        document.getElementById('grafikSummary').innerHTML = '';
        return;
    }
    const latest   = validData[validData.length - 1];
    const avg      = validData.reduce((a,b) => a+b, 0) / validData.length;
    const maxV     = Math.max(...validData);
    const minV     = Math.min(...validData);
    const tercapai = validData.filter(v => checkFn(v, target)).length;
    const pctOk    = Math.round(tercapai / validData.length * 100);

    const cls = v => checkFn(v, target) ? 'ok' : (Math.abs(v - target) < 5 ? 'warn' : 'bad');

    document.getElementById('grafikSummary').innerHTML = `
        <div class="gsm-item">
            <div class="gsm-label">Capaian Terakhir</div>
            <div class="gsm-val ${cls(latest)}">${latest}%</div>
        </div>
        <div class="gsm-item">
            <div class="gsm-label">Rata-rata</div>
            <div class="gsm-val ${cls(avg)}">${avg.toFixed(1)}%</div>
        </div>
        <div class="gsm-item">
            <div class="gsm-label">Tertinggi</div>
            <div class="gsm-val ok">${maxV}%</div>
        </div>
        <div class="gsm-item">
            <div class="gsm-label">Terendah</div>
            <div class="gsm-val ${cls(minV)}">${minV}%</div>
        </div>
        <div class="gsm-item">
            <div class="gsm-label">Bulan Tercapai</div>
            <div class="gsm-val ${pctOk === 100 ? 'ok' : pctOk >= 70 ? 'warn' : 'bad'}">${tercapai}/${validData.length} (${pctOk}%)</div>
        </div>
    `;
}

function showGrafik(key, btn) {
    document.querySelectorAll('.grafik-tab-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    activeKey = key;
    buildChart(key);
}

/* Init saat halaman load */
document.addEventListener('DOMContentLoaded', () => {
    if (rawData) buildChart('kbt');
});
</script>


</script>
</html>