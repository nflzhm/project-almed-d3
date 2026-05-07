@extends('admin.layout')

@section('title', 'Manajemen Video')
@section('page-title', 'Video YouTube')

@section('breadcrumb')
    <li class="breadcrumb-item active">Manajemen Video</li>
@endsection

@push('styles')
<style>


/* ---- Page header ---- */
.page-header {
    display: flex; align-items: flex-end;
    justify-content: space-between;
    margin-bottom: 24px; gap: 16px; flex-wrap: wrap;
}
.page-header-left .ph-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 20px; font-weight: 800;
    color: var(--text-main); letter-spacing: -.3px;
}
.page-header-left .ph-sub { font-size: 13px; color: var(--text-muted); margin-top: 3px; }

/* ---- Stats ---- */
.vid-stats { display: flex; gap: 12px; margin-bottom: 24px; flex-wrap: wrap; }
.vid-stat {
    flex: 1; min-width: 130px;
    background: var(--card-bg); border: 1px solid var(--border-color);
    border-radius: var(--radius); padding: 16px 20px;
    display: flex; align-items: center; gap: 14px;
    box-shadow: var(--shadow-sm);
    transition: box-shadow var(--transition), transform var(--transition);
}
.vid-stat:hover { box-shadow: var(--shadow-md); transform: translateY(-2px); }
.vid-stat-icon {
    width: 42px; height: 42px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; flex-shrink: 0;
}
.vid-stat-val {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 22px; font-weight: 800; color: var(--text-main); line-height: 1;
}
.vid-stat-lbl { font-size: 12px; color: var(--text-muted); margin-top: 3px; font-weight: 500; }

/* ---- Toolbar ---- */
.vid-toolbar {
    background: var(--card-bg); border: 1px solid var(--border-color);
    border-radius: var(--radius); padding: 14px 18px;
    display: flex; align-items: center; gap: 10px;
    margin-bottom: 20px; flex-wrap: wrap; box-shadow: var(--shadow-sm);
}
.search-wrap { position: relative; flex: 1; min-width: 200px; }
.search-wrap i {
    position: absolute; left: 13px; top: 50%;
    transform: translateY(-50%); color: var(--text-muted); font-size: 13px; pointer-events: none;
}
.search-input {
    width: 100%; padding: 9px 13px 9px 36px;
    border: 1.5px solid var(--border-color); border-radius: var(--radius-sm);
    font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13.5px; color: var(--text-main);
    outline: none; background: var(--body-bg);
    transition: border-color var(--transition), box-shadow var(--transition);
}
.search-input::placeholder { color: #b0bec5; }
.search-input:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(14,165,233,.12); background: #fff; }
.filter-select {
    padding: 9px 30px 9px 12px; border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm); font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px; color: var(--text-main); outline: none; background: var(--body-bg);
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%2364748b' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
    background-repeat: no-repeat; background-position: right 10px center; cursor: pointer;
    transition: border-color var(--transition);
}
.filter-select:focus { border-color: var(--primary); outline: none; }

/* ---- Grid ---- */
.vid-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}

/* ---- Video Card ---- */
.vid-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    display: flex; flex-direction: column;
    transition: box-shadow var(--transition), transform var(--transition);
    animation: cardIn .35s ease both;
    position: relative;
}
@keyframes cardIn {
    from { opacity: 0; transform: translateY(14px); }
    to   { opacity: 1; transform: translateY(0); }
}
.vid-card:nth-child(1){animation-delay:.04s} .vid-card:nth-child(2){animation-delay:.08s}
.vid-card:nth-child(3){animation-delay:.12s} .vid-card:nth-child(4){animation-delay:.16s}
.vid-card:nth-child(5){animation-delay:.20s} .vid-card:nth-child(6){animation-delay:.24s}
.vid-card:hover { box-shadow: 0 10px 32px rgba(255,0,0,.1); transform: translateY(-3px); }

/* Thumbnail wrapper */
.vid-thumb {
    position: relative; overflow: hidden;
    aspect-ratio: 16 / 9;
    background: #0f0f0f;
    cursor: pointer; flex-shrink: 0;
}
.vid-thumb img {
    width: 100%; height: 100%; object-fit: cover;
    transition: transform .4s ease, filter .4s ease;
}
.vid-card:hover .vid-thumb img { transform: scale(1.04); filter: brightness(.85); }

/* Thumbnail placeholder */
.vid-thumb-placeholder {
    width: 100%; height: 100%;
    background: linear-gradient(135deg, #1a1a2e, #16213e);
    display: flex; align-items: center; justify-content: center;
}
.vid-thumb-placeholder i { font-size: 40px; color: rgba(255,255,255,.15); }

/* Play button overlay */
.vid-play-btn {
    position: absolute; inset: 0;
    display: flex; align-items: center; justify-content: center;
    opacity: 0;
    transition: opacity var(--transition);
}
.vid-card:hover .vid-play-btn { opacity: 1; }
.vid-play-circle {
    width: 56px; height: 56px; border-radius: 50%;
    background: rgba(255,0,0,.9);
    display: flex; align-items: center; justify-content: center;
    box-shadow: 0 4px 20px rgba(0,0,0,.4);
    transition: transform var(--transition);
}
.vid-card:hover .vid-play-circle { transform: scale(1.1); }
.vid-play-circle i { color: #fff; font-size: 20px; margin-left: 3px; }

/* Duration badge */
.vid-duration {
    position: absolute; bottom: 8px; right: 8px;
    background: rgba(0,0,0,.8); color: #fff;
    font-size: 11px; font-weight: 700;
    padding: 2px 7px; border-radius: 4px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    letter-spacing: .5px;
}

/* Admin action buttons (pojok kanan atas card) */
.vid-card-actions {
    position: absolute; top: 8px; left: 8px;
    display: flex; gap: 5px; z-index: 5;
    opacity: 0; transition: opacity var(--transition);
}
.vid-card:hover .vid-card-actions { opacity: 1; }

/* Category badge */
.vid-cat {
    position: absolute; top: 8px; right: 8px;
    font-size: 10px; font-weight: 700;
    text-transform: uppercase; letter-spacing: .7px;
    padding: 3px 9px; border-radius: 20px;
    backdrop-filter: blur(6px);
    background: rgba(255,255,255,.15); color: #fff;
    border: 1px solid rgba(255,255,255,.2);
    z-index: 5;
}

/* Card body */
.vid-body { padding: 16px 18px; flex: 1; display: flex; flex-direction: column; }

.vid-meta-row {
    display: flex; align-items: center; gap: 8px;
    margin-bottom: 7px; flex-wrap: wrap;
}
.vid-channel-badge {
    display: inline-flex; align-items: center; gap: 5px;
    font-size: 10.5px; font-weight: 700;
    background: #fee2e2; color: #b91c1c;
    padding: 3px 9px; border-radius: 20px;
}
.vid-date {
    font-size: 11px; color: var(--text-muted);
    display: flex; align-items: center; gap: 4px;
}

.vid-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 14px; font-weight: 700;
    color: var(--text-main); line-height: 1.4;
    margin-bottom: 7px;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
}
.vid-desc {
    font-size: 12.5px; color: var(--text-muted);
    line-height: 1.55; flex: 1;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
    margin-bottom: 14px;
}

/* Card footer */
.vid-footer {
    display: flex; align-items: center; justify-content: space-between;
    padding: 12px 18px;
    border-top: 1px solid var(--border-color);
    background: #fafbff; gap: 8px; flex-wrap: wrap;
}

/* YouTube link button */
.btn-yt {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 7px 14px;
    background: #ff0000;
    color: #fff; border: none; border-radius: 7px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 12px; font-weight: 700;
    text-decoration: none; cursor: pointer;
    transition: background var(--transition), box-shadow var(--transition), transform var(--transition);
    box-shadow: 0 3px 10px rgba(255,0,0,.25);
}
.btn-yt:hover {
    background: #cc0000; color: #fff;
    box-shadow: 0 6px 18px rgba(255,0,0,.35);
    transform: translateY(-1px);
}
.btn-yt i { font-size: 13px; }

/* View count */
.vid-views {
    font-size: 12px; color: var(--text-muted);
    display: flex; align-items: center; gap: 5px;
}

/* Admin action buttons (inline) */
.vid-admin-actions { display: flex; gap: 5px; }
.btn-icon-sm {
    width: 30px; height: 30px; border-radius: 7px;
    display: inline-flex; align-items: center; justify-content: center;
    font-size: 12px; cursor: pointer; border: 1px solid transparent;
    transition: background var(--transition), color var(--transition);
}
.btn-edit   { background: #e0f2fe; color: var(--primary); }
.btn-edit:hover   { background: var(--primary); color: #fff; }
.btn-delete { background: #fee2e2; color: #ef4444; }
.btn-delete:hover { background: #ef4444; color: #fff; }

/* ---- Featured / Pinned indicator ---- */
.vid-featured-badge {
    position: absolute; bottom: 8px; left: 8px; z-index: 5;
    background: #f59e0b; color: #fff;
    font-size: 10px; font-weight: 700;
    padding: 2px 8px; border-radius: 20px;
    display: flex; align-items: center; gap: 4px;
}

/* ---- Empty state ---- */
.empty-state {
    grid-column: 1/-1; padding: 60px 24px; text-align: center; color: var(--text-muted);
}
.empty-state .es-icon {
    width: 72px; height: 72px; border-radius: 20px;
    background: #fee2e2; color: #ef4444;
    display: flex; align-items: center; justify-content: center;
    font-size: 28px; margin: 0 auto 16px;
}
.empty-state .es-title { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 16px; font-weight: 700; color: var(--text-main); margin-bottom: 6px; }
.empty-state .es-sub   { font-size: 13.5px; color: var(--text-muted); margin-bottom: 20px; }

/* ============================================================
   MODAL
============================================================ */
.am-modal .modal-dialog { max-width: 600px; }
.am-modal .modal-content {
    border: none; border-radius: var(--radius);
    box-shadow: 0 24px 64px rgba(0,0,0,.18); overflow: hidden;
}
.am-modal .modal-header {
    background: linear-gradient(135deg, #0c1a2e 0%, #1e3a5f 100%);
    padding: 18px 24px; border: none;
}
.am-modal .modal-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 15px; font-weight: 700; color: #fff;
    display: flex; align-items: center; gap: 10px;
}
.am-modal .modal-title .mt-icon {
    width: 30px; height: 30px; border-radius: 8px;
    background: rgba(255,255,255,.12);
    display: flex; align-items: center; justify-content: center; font-size: 13px;
}
.am-modal .btn-close { filter: invert(1) brightness(2); opacity: .7; }
.am-modal .btn-close:hover { opacity: 1; }
.am-modal .modal-body   { padding: 26px 26px 8px; }
.am-modal .modal-footer { padding: 14px 26px 22px; border: none; gap: 10px; }

.am-modal .modal-body {
    max-height: 70vh;   /* tinggi maksimal modal */
    overflow-y: auto;   /* aktifkan scroll vertikal */
    padding-right: 10px;
}

/* Form */
.mfg { margin-bottom: 18px; }
.mfg:last-child { margin-bottom: 0; }
.mfg-label {
    font-size: 12.5px; font-weight: 700; color: var(--text-main);
    margin-bottom: 6px; display: flex; align-items: center; gap: 6px;
}
.mfg-label i { color: var(--primary); font-size: 11px; }
.mfg-label .req { color: #ef4444; }
.mfg-label .opt { color: var(--text-muted); font-size: 11px; font-weight: 500; }
.mfg-input, .mfg-textarea, .mfg-select {
    width: 100%; padding: 10px 13px;
    border: 1.5px solid var(--border-color); border-radius: var(--radius-sm);
    font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13.5px; color: var(--text-main);
    outline: none; background: var(--body-bg);
    transition: border-color var(--transition), box-shadow var(--transition), background var(--transition);
}
.mfg-input:focus, .mfg-textarea:focus, .mfg-select:focus {
    border-color: var(--primary); box-shadow: 0 0 0 3px rgba(14,165,233,.12); background: #fff;
}
.mfg-textarea { min-height: 80px; resize: vertical; line-height: 1.6; }
.mfg-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
@media(max-width:575px) { .mfg-row { grid-template-columns: 1fr; } }

/* YouTube URL input (merah) */
.yt-input-wrap { position: relative; }
.yt-input-wrap .yt-icon {
    position: absolute; left: 13px; top: 50%;
    transform: translateY(-50%);
    color: #ff0000; font-size: 16px; pointer-events: none;
}
.yt-input-wrap .mfg-input { padding-left: 38px; }
.yt-input-wrap .mfg-input:focus { border-color: #ff0000; box-shadow: 0 0 0 3px rgba(255,0,0,.1); }

/* URL Preview card */
.yt-url-preview {
    display: none; margin-top: 10px;
    background: #fff9f9; border: 1.5px solid #fecaca;
    border-radius: var(--radius-sm); overflow: hidden;
}
.yt-url-preview.show { display: block; }
.yt-url-preview iframe {
    width: 100%; aspect-ratio: 16/9;
    border: none; display: block;
}
.yt-url-preview-bar {
    padding: 8px 12px;
    display: flex; align-items: center; gap: 8px;
    background: #fff;
}
.yt-url-preview-bar i { color: #ff0000; font-size: 14px; }
.yt-url-preview-bar span { font-size: 11.5px; color: var(--text-muted); flex: 1; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
.yt-url-preview-bar a {
    font-size: 11.5px; font-weight: 700; color: #ff0000;
    text-decoration: none; display: flex; align-items: center; gap: 4px;
}
.yt-url-preview-bar a:hover { text-decoration: underline; }

/* URL error */
.yt-url-error {
    display: none; margin-top: 6px;
    font-size: 12px; color: #ef4444;
    display: none; align-items: center; gap: 5px;
}
.yt-url-error.show { display: flex; }

/* Thumbnail source toggle */
.thumb-toggle { display: flex; gap: 8px; }
.thumb-toggle label {
    flex: 1; display: flex; align-items: center; justify-content: center; gap: 6px;
    padding: 8px 12px; border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm); font-size: 12.5px; font-weight: 600;
    cursor: pointer; transition: all var(--transition);
    background: var(--body-bg); color: var(--text-muted);
}
.thumb-toggle input { display: none; }
.thumb-toggle input:checked + label { background: #fee2e2; border-color: #fca5a5; color: #b91c1c; }

/* Featured toggle */
.feat-toggle-group { display: flex; gap: 8px; }
.feat-toggle-group label {
    flex: 1; display: flex; align-items: center; justify-content: center; gap: 7px;
    padding: 9px 14px; border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm); font-size: 13px; font-weight: 600;
    cursor: pointer; transition: all var(--transition);
    background: var(--body-bg); color: var(--text-muted);
}
.feat-toggle-group input { display: none; }
.feat-toggle-group input:checked + label.feat-ya  { background: #fef9c3; border-color: #fde047; color: #854d0e; }
.feat-toggle-group input:checked + label.feat-tdk { background: #f1f5f9; border-color: #94a3b8; color: #475569; }

/* Char counter */
.char-counter { font-size: 11px; color: var(--text-muted); text-align: right; margin-top: 3px; }
.char-counter.warn { color: var(--warning); }
.char-counter.over { color: var(--danger); }

/* Modal buttons */
.btn-cancel {
    padding: 10px 20px; border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm); background: transparent;
    color: var(--text-muted); font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13.5px; font-weight: 600; cursor: pointer;
    transition: background var(--transition);
}
.btn-cancel:hover { background: var(--body-bg); color: var(--text-main); }
.btn-save-vid {
    padding: 10px 24px; background: #ff0000; color: #fff; border: none;
    border-radius: var(--radius-sm); font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13.5px; font-weight: 700; cursor: pointer;
    display: inline-flex; align-items: center; gap: 8px;
    transition: background var(--transition), box-shadow var(--transition), transform var(--transition);
    box-shadow: 0 4px 14px rgba(255,0,0,.25);
}
.btn-save-vid:hover { background: #cc0000; transform: translateY(-1px); box-shadow: 0 8px 22px rgba(255,0,0,.35); }

/* Delete modal */
.del-body { padding: 32px 28px; text-align: center; }
.del-icon {
    width: 68px; height: 68px; border-radius: 50%;
    background: #fee2e2; display: flex; align-items: center; justify-content: center;
    font-size: 28px; color: #ef4444; margin: 0 auto 16px;
}
.del-title { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 17px; font-weight: 800; color: var(--text-main); margin-bottom: 8px; }
.del-sub   { font-size: 13.5px; color: var(--text-muted); line-height: 1.5; }
.del-target {
    display: inline-block; margin-top: 10px; padding: 6px 14px;
    background: var(--body-bg); border: 1.5px solid var(--border-color);
    border-radius: 8px; font-size: 13px; font-weight: 700; color: var(--text-main);
    max-width: 280px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
}
.btn-danger-am {
    padding: 10px 24px; background: #ef4444; color: #fff; border: none;
    border-radius: var(--radius-sm); font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13.5px; font-weight: 700; cursor: pointer;
    display: inline-flex; align-items: center; gap: 8px;
    transition: background var(--transition), box-shadow var(--transition);
}
.btn-danger-am:hover { background: #dc2626; box-shadow: 0 6px 20px rgba(239,68,68,.35); }

/* Embed Preview modal */
.embed-wrap { width:100%; aspect-ratio:16/9; border-radius:var(--radius-sm); overflow:hidden; background:#000; }
.embed-wrap iframe { width:100%; height:100%; border:none; }

/* Responsive */
@media(max-width:767.98px) {
    .vid-grid { grid-template-columns: 1fr; }
    .vid-stats { gap: 8px; }
    .vid-stat { min-width: 120px; }
    .vid-toolbar { flex-direction: column; align-items: stretch; }
    .am-modal .modal-body { padding: 18px 16px 8px; }
    .am-modal .modal-footer { padding: 12px 16px 20px; }
}
</style>
@endpush

@section('content')

{{-- ================================================================
     PAGE HEADER
================================================================ --}}
<div class="page-header">
    <div class="page-header-left">
        <div class="ph-title">
            <i class="fa-brands fa-youtube" style="color:#ff0000;margin-right:8px;"></i>
            Manajemen Video YouTube
        </div>
        <div class="ph-sub">Kelola video YouTube yang ditampilkan di halaman Video website</div>
    </div>
    <button class="btn-primary-am" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="fa-solid fa-plus"></i>
        Tambah Video
    </button>
</div>

{{-- ================================================================
     STATS
================================================================ --}}
<div class="vid-stats">
    <div class="vid-stat">
        <div class="vid-stat-icon" style="background:#fee2e2;color:#dc2626;">
            <i class="fa-brands fa-youtube"></i>
        </div>
        <div>
            <div class="vid-stat-val">{{ isset($video) ? $video->total() : 6 }}</div>
            <div class="vid-stat-lbl">Total Video</div>
        </div>
    </div>
    <div class="vid-stat">
        <div class="vid-stat-icon" style="background:#fef9c3;color:#ca8a04;">
            <i class="fa-solid fa-star"></i>
        </div>
        <div>
            <div class="vid-stat-val">{{ $totalFeatured ?? 2 }}</div>
            <div class="vid-stat-lbl">Video Unggulan</div>
        </div>
    </div>
    <div class="vid-stat">
        <div class="vid-stat-icon" style="background:#e0f2fe;color:#0284c7;">
            <i class="fa-regular fa-eye"></i>
        </div>
        <div>
            <div class="vid-stat-val">{{ number_format($totalViews ?? 28400) }}</div>
            <div class="vid-stat-lbl">Total Tayangan</div>
        </div>
    </div>
    <div class="vid-stat">
        <div class="vid-stat-icon" style="background:#d1fae5;color:#059669;">
            <i class="fa-solid fa-layer-group"></i>
        </div>
        <div>
            <div class="vid-stat-val">{{ $totalKategori ?? 4 }}</div>
            <div class="vid-stat-lbl">Kategori</div>
        </div>
    </div>
</div>

{{-- ================================================================
     TOOLBAR
================================================================ --}}
<div class="vid-toolbar">
    <div class="search-wrap">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="search" class="search-input" id="searchVid" placeholder="Cari judul video...">
    </div>
    <select class="filter-select" id="filterKat">
        <option value="">Semua Kategori</option>
        <option value="profil">Profil RS</option>
        <option value="edukasi">Edukasi Kesehatan</option>
        <option value="kegiatan">Kegiatan</option>
        <option value="testimoni">Testimoni</option>
        <option value="lainnya">Lainnya</option>
    </select>
    <select class="filter-select" id="filterSort">
        <option value="newest">Terbaru</option>
        <option value="oldest">Terlama</option>
        <option value="popular">Terpopuler</option>
        <option value="featured">Unggulan Dulu</option>
    </select>
    <div style="display:flex;gap:4px;">
        <button class="topbar-btn" id="viewGrid" title="Grid" style="background:var(--primary-light);color:var(--primary);">
            <i class="fa-solid fa-grip"></i>
        </button>
        <button class="topbar-btn" id="viewList" title="List">
            <i class="fa-solid fa-list"></i>
        </button>
    </div>
</div>

{{-- ================================================================
     VIDEO GRID
================================================================ --}}
@php
$dummyVideo = [
    ['id'=>1,'judul'=>'Profil RSU Allam Medica Bumiayu','deskripsi'=>'Mengenal lebih dekat RSU Allam Medica, fasilitas dan layanan unggulan kami.','youtube_url'=>'https://www.youtube.com/watch?v=dQw4w9WgXcQ','youtube_id'=>'dQw4w9WgXcQ','kategori'=>'Profil RS','tanggal'=>'10 Apr 2026','views'=>'5.2K','durasi'=>'5:32','featured'=>true],
    ['id'=>2,'judul'=>'Tips Menjaga Kesehatan di Musim Hujan','deskripsi'=>'dr. Hendra Kusuma berbagi tips menjaga imunitas tubuh saat musim hujan tiba.','youtube_url'=>'https://www.youtube.com/watch?v=dQw4w9WgXcQ','youtube_id'=>'dQw4w9WgXcQ','kategori'=>'Edukasi Kesehatan','tanggal'=>'8 Apr 2026','views'=>'3.8K','durasi'=>'8:14','featured'=>true],
    ['id'=>3,'judul'=>'Kegiatan Bakti Sosial Allam Medica 2026','deskripsi'=>'Dokumentasi kegiatan bakti sosial pemeriksaan kesehatan gratis untuk masyarakat Bumiayu.','youtube_url'=>'https://www.youtube.com/watch?v=dQw4w9WgXcQ','youtube_id'=>'dQw4w9WgXcQ','kategori'=>'Kegiatan','tanggal'=>'5 Apr 2026','views'=>'2.1K','durasi'=>'4:45','featured'=>false],
    ['id'=>4,'judul'=>'Testimoni Pasien Poli Spesialis Anak','deskripsi'=>'Cerita nyata dari orang tua pasien yang telah mempercayakan kesehatan anaknya kepada kami.','youtube_url'=>'https://www.youtube.com/watch?v=dQw4w9WgXcQ','youtube_id'=>'dQw4w9WgXcQ','kategori'=>'Testimoni','tanggal'=>'1 Apr 2026','views'=>'1.7K','durasi'=>'3:22','featured'=>false],
    ['id'=>5,'judul'=>'Fasilitas Laboratorium Terbaru RSU','deskripsi'=>'Tour fasilitas laboratorium klinik kami yang baru dilengkapi peralatan modern dan canggih.','youtube_url'=>'https://www.youtube.com/watch?v=dQw4w9WgXcQ','youtube_id'=>'dQw4w9WgXcQ','kategori'=>'Profil RS','tanggal'=>'28 Mar 2026','views'=>'4.3K','durasi'=>'6:10','featured'=>false],
    ['id'=>6,'judul'=>'Cara Mendaftar Poli Online Allam Medica','deskripsi'=>'Panduan lengkap cara mendaftar antrian poli secara online dari rumah, mudah dan cepat.','youtube_url'=>'https://www.youtube.com/watch?v=dQw4w9WgXcQ','youtube_id'=>'dQw4w9WgXcQ','kategori'=>'Edukasi Kesehatan','tanggal'=>'25 Mar 2026','views'=>'6.9K','durasi'=>'2:58','featured'=>false],
];
$listVideo = isset($video) ? $video->items() : $dummyVideo;
@endphp

<div class="vid-grid" id="vidGrid">

    @forelse($listVideo as $item)
    @php
        $id         = $item['id']          ?? $item->id;
        $judul      = $item['judul']        ?? $item->judul;
        $deskripsi  = $item['deskripsi']    ?? $item->deskripsi;
        $ytUrl      = $item['youtube_url']  ?? $item->youtube_url;
        $ytId       = $item['youtube_id']   ?? $item->youtube_id ?? '';
        $kategori   = $item['kategori']     ?? $item->kategori;
        $tanggal    = $item['tanggal']      ?? ($item->created_at?->format('d M Y') ?? '-');
        $views      = $item['views']        ?? $item->views ?? '0';
        $durasi     = $item['durasi']       ?? $item->durasi ?? '';
        $featured   = $item['featured']     ?? $item->featured ?? false;
        $thumbUrl   = $ytId ? "https://img.youtube.com/vi/{$ytId}/hqdefault.jpg" : '';
    @endphp

    <div class="vid-card" data-id="{{ $id }}" data-kat="{{ strtolower(str_replace(' ','-',$kategori)) }}">

        {{-- Thumbnail --}}
        <div class="vid-thumb" onclick="openEmbedModal('{{ $judul }}','{{ $ytId }}')">

            {{-- Admin action buttons (hover) --}}
            <div class="vid-card-actions">
                <button class="btn-icon-sm btn-edit" style="background:rgba(255,255,255,.9);color:var(--primary);"
                    title="Edit video"
                    onclick="event.stopPropagation(); openEditModal(
                        '{{ $id }}',
                        `{{ addslashes($judul) }}`,
                        `{{ addslashes($deskripsi) }}`,
                        '{{ $ytUrl }}',
                        '{{ $kategori }}',
                        '{{ $durasi }}',
                        {{ $featured ? 'true' : 'false' }}
                    )">
                    <i class="fa-solid fa-pen"></i>
                </button>
                <button class="btn-icon-sm btn-delete" style="background:rgba(255,255,255,.9);color:#ef4444;"
                    title="Hapus video"
                    onclick="event.stopPropagation(); openDeleteModal('{{ $id }}','{{ addslashes($judul) }}')">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>

            {{-- Category --}}
            <span class="vid-cat">{{ $kategori }}</span>

            {{-- Thumbnail image --}}
            @if($thumbUrl)
                <img src="{{ $thumbUrl }}" alt="{{ $judul }}" loading="lazy">
            @else
                <div class="vid-thumb-placeholder">
                    <i class="fa-brands fa-youtube"></i>
                </div>
            @endif

            {{-- Play overlay --}}
            <div class="vid-play-btn">
                <div class="vid-play-circle">
                    <i class="fa-solid fa-play"></i>
                </div>
            </div>

            {{-- Duration --}}
            @if($durasi)
                <span class="vid-duration">{{ $durasi }}</span>
            @endif

            {{-- Featured badge --}}
            @if($featured)
                <div class="vid-featured-badge">
                    <i class="fa-solid fa-star" style="font-size:9px;"></i> Unggulan
                </div>
            @endif
        </div>

        {{-- Body --}}
        <div class="vid-body">
            <div class="vid-meta-row">
                <span class="vid-channel-badge">
                    <i class="fa-brands fa-youtube" style="font-size:11px;"></i>
                    YouTube
                </span>
                <span class="vid-date">
                    <i class="fa-regular fa-calendar" style="font-size:10px;"></i>
                    {{ $tanggal }}
                </span>
            </div>
            <div class="vid-title">{{ $judul }}</div>
            <div class="vid-desc">{{ $deskripsi }}</div>
        </div>

        {{-- Footer --}}
        <div class="vid-footer">
            {{-- YouTube link button --}}
            <a href="{{ $ytUrl }}" target="_blank" rel="noopener noreferrer" class="btn-yt">
                <i class="fa-brands fa-youtube"></i>
                Tonton di YouTube
            </a>

            <div style="display:flex;align-items:center;gap:8px;">
                <div class="vid-views">
                    <i class="fa-regular fa-eye"></i>
                    {{ $views }}
                </div>
                <div class="vid-admin-actions">
                    <button class="btn-icon-sm btn-edit" title="Edit"
                        onclick="openEditModal(
                            '{{ $id }}',
                            `{{ addslashes($judul) }}`,
                            `{{ addslashes($deskripsi) }}`,
                            '{{ $ytUrl }}',
                            '{{ $kategori }}',
                            '{{ $durasi }}',
                            {{ $featured ? 'true' : 'false' }}
                        )">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                    <button class="btn-icon-sm btn-delete" title="Hapus"
                        onclick="openDeleteModal('{{ $id }}','{{ addslashes($judul) }}')">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
            </div>
        </div>

    </div>
    @empty
    <div class="empty-state">
        <div class="es-icon"><i class="fa-brands fa-youtube"></i></div>
        <div class="es-title">Belum Ada Video</div>
        <div class="es-sub">Tambahkan video YouTube pertama untuk ditampilkan di halaman Video website.</div>
        <button class="btn-primary-am" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fa-solid fa-plus"></i> Tambah Video Pertama
        </button>
    </div>
    @endforelse

</div>

{{-- Pagination --}}
@if(isset($video) && $video->hasPages())
<div style="margin-top:24px;">{{ $video->withQueryString()->links() }}</div>
@endif


{{-- ================================================================
     MODAL: TAMBAH VIDEO
================================================================ --}}
<div class="modal fade am-modal" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <span class="mt-icon"><i class="fa-brands fa-youtube"></i></span>
                    Tambah Video YouTube
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('admin.video.store') }}" method="POST" id="formTambah">
                @csrf
                <div class="modal-body">

                    {{-- YouTube URL --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-brands fa-youtube" style="color:#ff0000;font-size:13px;"></i>
                            Link YouTube <span class="req">*</span>
                        </div>
                        <div class="yt-input-wrap">
                            <i class="fa-brands fa-youtube yt-icon"></i>
                            <input type="url" name="youtube_url" class="mfg-input" id="tambahYtUrl"
                                placeholder="https://www.youtube.com/watch?v=..."
                                oninput="debouncePreview(this.value,'tambah')" required>
                        </div>
                        <div class="yt-url-error" id="tambahYtError">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            URL tidak valid. Gunakan link YouTube yang benar.
                        </div>
                        <input type="hidden" name="youtube_id" id="tambahYtId">

                        {{-- Preview embed --}}
                        <div class="yt-url-preview" id="tambahYtPreview">
                            <iframe id="tambahYtFrame" src="" allowfullscreen
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
                            </iframe>
                            <div class="yt-url-preview-bar">
                                <i class="fa-brands fa-youtube"></i>
                                <span id="tambahYtPreviewUrl">—</span>
                                <a href="#" id="tambahYtPreviewLink" target="_blank" rel="noopener">
                                    <i class="fa-solid fa-arrow-up-right-from-square" style="font-size:10px;"></i>
                                    Buka
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Judul --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-heading"></i>
                            Judul Video <span class="req">*</span>
                        </div>
                        <input type="text" name="judul" class="mfg-input" id="tambahJudul"
                            placeholder="Judul video..." maxlength="150" required>
                        <div class="char-counter" id="tambahJudulCtr">0 / 150</div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-align-left"></i>
                            Deskripsi Singkat <span class="opt">(opsional)</span>
                        </div>
                        <textarea name="deskripsi" class="mfg-textarea" id="tambahDesc"
                            placeholder="Deskripsi singkat isi video..." maxlength="300"></textarea>
                        <div class="char-counter" id="tambahDescCtr">0 / 300</div>
                    </div>

                    {{-- Kategori & Durasi --}}
                    <div class="mfg-row mfg">
                        <div>
                            <div class="mfg-label">
                                <i class="fa-solid fa-tag"></i>
                                Kategori <span class="req">*</span>
                            </div>
                            <select name="kategori" class="mfg-select" required>
                                <option value="">-- Pilih --</option>
                                <option>Profil RS</option>
                                <option>Edukasi Kesehatan</option>
                                <option>Kegiatan</option>
                                <option>Testimoni</option>
                                <option>Lainnya</option>
                            </select>
                        </div>
                        <div>
                            <div class="mfg-label">
                                <i class="fa-regular fa-clock"></i>
                                Durasi <span class="opt">(opsional)</span>
                            </div>
                            <input type="text" name="durasi" class="mfg-input"
                                placeholder="Contoh: 5:32" maxlength="8">
                        </div>
                    </div>

                    {{-- Featured --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-star"></i>
                            Tampilkan sebagai Unggulan?
                        </div>
                        <div class="feat-toggle-group">
                            <input type="radio" name="featured" id="tambahFeatYa"  value="1">
                            <label for="tambahFeatYa"  class="feat-ya">
                                <i class="fa-solid fa-star"></i> Ya, Unggulan
                            </label>
                            <input type="radio" name="featured" id="tambahFeatTdk" value="0" checked>
                            <label for="tambahFeatTdk" class="feat-tdk">
                                <i class="fa-regular fa-star"></i> Biasa
                            </label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Batal
                    </button>
                    <button type="submit" class="btn-save-vid">
                        <i class="fa-brands fa-youtube"></i> Simpan Video
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- ================================================================
     MODAL: EDIT VIDEO
================================================================ --}}
<div class="modal fade am-modal" id="modalEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(135deg,#7f1d1d 0%,#ff0000 100%);">
                <h5 class="modal-title">
                    <span class="mt-icon"><i class="fa-solid fa-pen-to-square"></i></span>
                    Edit Video YouTube
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="" method="POST" id="formEdit">
                @csrf @method('PUT')
                <input type="hidden" name="id"         id="editId">
                <input type="hidden" name="youtube_id" id="editYtId">

                <div class="modal-body">

                    {{-- YouTube URL --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-brands fa-youtube" style="color:#ff0000;font-size:13px;"></i>
                            Link YouTube <span class="req">*</span>
                        </div>
                        <div class="yt-input-wrap">
                            <i class="fa-brands fa-youtube yt-icon"></i>
                            <input type="url" name="youtube_url" class="mfg-input" id="editYtUrl"
                                placeholder="https://www.youtube.com/watch?v=..."
                                oninput="debouncePreview(this.value,'edit')" required>
                        </div>
                        <div class="yt-url-error" id="editYtError">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            URL tidak valid.
                        </div>

                        {{-- Preview --}}
                        <div class="yt-url-preview" id="editYtPreview">
                            <iframe id="editYtFrame" src="" allowfullscreen
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
                            </iframe>
                            <div class="yt-url-preview-bar">
                                <i class="fa-brands fa-youtube"></i>
                                <span id="editYtPreviewUrl">—</span>
                                <a href="#" id="editYtPreviewLink" target="_blank" rel="noopener">
                                    <i class="fa-solid fa-arrow-up-right-from-square" style="font-size:10px;"></i>
                                    Buka
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Judul --}}
                    <div class="mfg">
                        <div class="mfg-label"><i class="fa-solid fa-heading"></i> Judul Video <span class="req">*</span></div>
                        <input type="text" name="judul" class="mfg-input" id="editJudul"
                            placeholder="Judul video..." maxlength="150" required>
                        <div class="char-counter" id="editJudulCtr">0 / 150</div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mfg">
                        <div class="mfg-label"><i class="fa-solid fa-align-left"></i> Deskripsi <span class="opt">(opsional)</span></div>
                        <textarea name="deskripsi" class="mfg-textarea" id="editDesc"
                            placeholder="Deskripsi singkat..." maxlength="300"></textarea>
                        <div class="char-counter" id="editDescCtr">0 / 300</div>
                    </div>

                    {{-- Kategori & Durasi --}}
                    <div class="mfg-row mfg">
                        <div>
                            <div class="mfg-label"><i class="fa-solid fa-tag"></i> Kategori <span class="req">*</span></div>
                            <select name="kategori" class="mfg-select" id="editKategori" required>
                                <option value="">-- Pilih --</option>
                                <option>Profil RS</option>
                                <option>Edukasi Kesehatan</option>
                                <option>Kegiatan</option>
                                <option>Testimoni</option>
                                <option>Lainnya</option>
                            </select>
                        </div>
                        <div>
                            <div class="mfg-label"><i class="fa-regular fa-clock"></i> Durasi <span class="opt">(opsional)</span></div>
                            <input type="text" name="durasi" class="mfg-input" id="editDurasi"
                                placeholder="5:32" maxlength="8">
                        </div>
                    </div>

                    {{-- Featured --}}
                    <div class="mfg">
                        <div class="mfg-label"><i class="fa-solid fa-star"></i> Tampilkan sebagai Unggulan?</div>
                        <div class="feat-toggle-group">
                            <input type="radio" name="featured" id="editFeatYa"  value="1">
                            <label for="editFeatYa"  class="feat-ya"><i class="fa-solid fa-star"></i> Ya, Unggulan</label>
                            <input type="radio" name="featured" id="editFeatTdk" value="0">
                            <label for="editFeatTdk" class="feat-tdk"><i class="fa-regular fa-star"></i> Biasa</label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Batal
                    </button>
                    <button type="submit" class="btn-save-vid">
                        <i class="fa-solid fa-floppy-disk"></i> Perbarui Video
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- ================================================================
     MODAL: HAPUS
================================================================ --}}
<div class="modal fade am-modal" id="modalHapus" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width:420px;">
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(135deg,#7f1d1d 0%,#ef4444 100%);">
                <h5 class="modal-title">
                    <span class="mt-icon"><i class="fa-solid fa-triangle-exclamation"></i></span>
                    Konfirmasi Hapus
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="" method="POST" id="formHapus">
                @csrf @method('DELETE')
                <div class="del-body">
                    <div class="del-icon"><i class="fa-brands fa-youtube"></i></div>
                    <div class="del-title">Hapus Video Ini?</div>
                    <div class="del-sub">
                        Video berikut akan dihapus dari daftar secara permanen. Link YouTube aslinya tidak terpengaruh.
                    </div>
                    <div class="del-target" id="delTarget">—</div>
                </div>
                <div class="modal-footer" style="justify-content:center;gap:12px;">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Batal
                    </button>
                    <button type="submit" class="btn-danger-am">
                        <i class="fa-solid fa-trash-can"></i> Ya, Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- ================================================================
     MODAL: EMBED PREVIEW (klik thumbnail)
================================================================ --}}
<div class="modal fade am-modal" id="modalEmbed" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width:800px;">
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(135deg,#0f0f0f 0%,#212121 100%);">
                <h5 class="modal-title">
                    <span class="mt-icon" style="background:#ff0000;"><i class="fa-brands fa-youtube"></i></span>
                    <span id="embedTitle" style="max-width:400px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">Video</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding:0;">
                <div class="embed-wrap">
                    <iframe id="embedFrame" src="" allowfullscreen
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
                    </iframe>
                </div>
            </div>
            <div class="modal-footer" style="background:#111;border:none;padding:12px 18px;">
                <span style="font-size:12px;color:#888;flex:1;">
                    <i class="fa-brands fa-youtube" style="color:#ff0000;"></i>
                    Diputar langsung dari YouTube
                </span>
                <a href="#" id="embedYtLink" target="_blank" rel="noopener" class="btn-yt" style="font-size:12px;padding:7px 14px;">
                    <i class="fa-brands fa-youtube"></i> Tonton di YouTube
                </a>
                <button type="button" class="btn-cancel" data-bs-dismiss="modal" style="color:#888;border-color:#333;">Tutup</button>
            </div>
        </div>
    </div>
</div>

@endsection


@push('scripts')
<script>
/* ============================================================
   VIDEO PAGE — JavaScript
============================================================ */

/* ---- Char counters ---- */
function initCtr(elId, ctrId, max) {
    const el = document.getElementById(elId);
    const ct = document.getElementById(ctrId);
    if (!el || !ct) return;
    function upd() {
        const l = el.value.length;
        ct.textContent = `${l} / ${max}`;
        ct.className = 'char-counter' + (l >= max ? ' over' : l > max*.88 ? ' warn' : '');
    }
    el.addEventListener('input', upd); upd();
}
initCtr('tambahJudul', 'tambahJudulCtr', 150);
initCtr('tambahDesc',  'tambahDescCtr',  300);
initCtr('editJudul',   'editJudulCtr',   150);
initCtr('editDesc',    'editDescCtr',    300);

/* ---- Extract YouTube ID from URL ---- */
function extractYtId(url) {
    if (!url) return null;
    const patterns = [
        /(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([A-Za-z0-9_-]{11})/,
        /youtube\.com\/shorts\/([A-Za-z0-9_-]{11})/,
    ];
    for (const p of patterns) {
        const m = url.match(p);
        if (m) return m[1];
    }
    return null;
}

/* ---- Preview YouTube embed with debounce ---- */
let previewTimer = {};
function debouncePreview(url, prefix) {
    clearTimeout(previewTimer[prefix]);
    previewTimer[prefix] = setTimeout(() => showYtPreview(url, prefix), 700);
}

function showYtPreview(url, prefix) {
    const previewEl  = document.getElementById(prefix + 'YtPreview');
    const frameEl    = document.getElementById(prefix + 'YtFrame');
    const urlSpan    = document.getElementById(prefix + 'YtPreviewUrl');
    const linkEl     = document.getElementById(prefix + 'YtPreviewLink');
    const hiddenId   = document.getElementById(prefix + 'YtId');
    const errorEl    = document.getElementById(prefix + 'YtError');

    const ytId = extractYtId(url);

    if (!ytId) {
        previewEl.classList.remove('show');
        frameEl.src = '';
        if (hiddenId) hiddenId.value = '';
        if (url.length > 10) {
            errorEl.classList.add('show');
        } else {
            errorEl.classList.remove('show');
        }
        return;
    }

    errorEl.classList.remove('show');
    if (hiddenId) hiddenId.value = ytId;

    frameEl.src = `https://www.youtube.com/embed/${ytId}?rel=0&modestbranding=1`;
    urlSpan.textContent = url.length > 50 ? url.substring(0, 50) + '…' : url;
    linkEl.href = url;
    previewEl.classList.add('show');
}

/* ---- Open EDIT modal ---- */
function openEditModal(id, judul, deskripsi, ytUrl, kategori, durasi, featured) {
    document.getElementById('editId').value      = id;
    document.getElementById('editJudul').value   = judul;
    document.getElementById('editDesc').value    = deskripsi;
    document.getElementById('editYtUrl').value   = ytUrl;
    document.getElementById('editDurasi').value  = durasi;

    // Kategori select
    const sel = document.getElementById('editKategori');
    for (let opt of sel.options) { opt.selected = (opt.text === kategori); }

    // Featured radio
    document.getElementById('editFeatYa').checked  = featured;
    document.getElementById('editFeatTdk').checked = !featured;

    // Form action
    document.getElementById('formEdit').action = '{{ url("admin/video") }}/' + id;

    // Trigger char counters
    ['editJudul','editDesc'].forEach(i => document.getElementById(i).dispatchEvent(new Event('input')));

    // Show YT preview
    showYtPreview(ytUrl, 'edit');

    new bootstrap.Modal(document.getElementById('modalEdit')).show();
}

/* ---- Open DELETE modal ---- */
function openDeleteModal(id, judul) {
    document.getElementById('formHapus').action = '{{ url("admin/video") }}/' + id;
    document.getElementById('delTarget').textContent = judul;
    new bootstrap.Modal(document.getElementById('modalHapus')).show();
}

/* ---- Open embed preview modal (klik thumbnail) ---- */
function openEmbedModal(judul, ytId) {
    if (!ytId) { alert('ID video tidak ditemukan.'); return; }
    document.getElementById('embedTitle').textContent = judul;
    document.getElementById('embedFrame').src =
        `https://www.youtube.com/embed/${ytId}?autoplay=1&rel=0&modestbranding=1`;
    document.getElementById('embedYtLink').href =
        `https://www.youtube.com/watch?v=${ytId}`;
    new bootstrap.Modal(document.getElementById('modalEmbed')).show();
}

/* ---- Stop video on close ---- */
['modalEmbed','modalEdit','modalTambah'].forEach(function(id) {
    const el = document.getElementById(id);
    if (!el) return;
    el.addEventListener('hidden.bs.modal', function() {
        const frames = el.querySelectorAll('iframe');
        frames.forEach(f => { const s = f.src; f.src = ''; f.src = s.replace('?autoplay=1',''); });
    });
});

/* ---- Reset tambah modal ---- */
document.getElementById('modalTambah').addEventListener('hidden.bs.modal', function() {
    document.getElementById('formTambah').reset();
    document.getElementById('tambahYtPreview').classList.remove('show');
    document.getElementById('tambahYtFrame').src = '';
    document.getElementById('tambahYtError').classList.remove('show');
    document.getElementById('tambahYtId').value = '';
});

/* ---- Live search ---- */
document.getElementById('searchVid').addEventListener('input', function() {
    const q = this.value.toLowerCase();
    document.querySelectorAll('.vid-card').forEach(function(card) {
        const t = card.querySelector('.vid-title')?.textContent.toLowerCase() || '';
        const d = card.querySelector('.vid-desc')?.textContent.toLowerCase()  || '';
        card.style.display = (!q || t.includes(q) || d.includes(q)) ? '' : 'none';
    });
});

/* ---- Filter kategori ---- */
document.getElementById('filterKat').addEventListener('change', function() {
    const val = this.value;
    document.querySelectorAll('.vid-card').forEach(function(card) {
        card.style.display = (!val || card.dataset.kat === val) ? '' : 'none';
    });
});

/* ---- View toggle ---- */
const grid = document.getElementById('vidGrid');
document.getElementById('viewGrid').addEventListener('click', function() {
    grid.style.gridTemplateColumns = '';
    this.style.background = 'var(--primary-light)'; this.style.color = 'var(--primary)';
    document.getElementById('viewList').style.cssText = '';
});
document.getElementById('viewList').addEventListener('click', function() {
    grid.style.gridTemplateColumns = '1fr';
    this.style.background = 'var(--primary-light)'; this.style.color = 'var(--primary)';
    document.getElementById('viewGrid').style.cssText = '';
});
</script>
@endpush
