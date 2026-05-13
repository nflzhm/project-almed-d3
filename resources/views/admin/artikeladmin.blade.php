@extends('admin.layout')

@section('title', 'Manajemen Artikel')
@section('page-title', 'Artikel')

@section('breadcrumb')
    <li class="breadcrumb-item active">Manajemen Artikel</li>
@endsection

@push('styles')
<style>
/* ============================================================
   ARTIKEL PAGE — Allam Medica Admin
   Beda dari Berita: ada field Kategori + field Isi (konten panjang)
============================================================ */

.page-header {
    display: flex; align-items: flex-end;
    justify-content: space-between;
    margin-bottom: 24px; gap: 16px; flex-wrap: wrap;
}
.page-header-left .ph-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 20px; font-weight: 800; color: var(--text-main); letter-spacing: -.3px;
}
.page-header-left .ph-sub { font-size: 13px; color: var(--text-muted); margin-top: 3px; }

/* ---- Stats ---- */
.art-stats { display: flex; gap: 12px; margin-bottom: 24px; flex-wrap: wrap; }
.art-stat {
    flex: 1; min-width: 130px; background: var(--card-bg);
    border: 1px solid var(--border-color); border-radius: var(--radius);
    padding: 16px 20px; display: flex; align-items: center; gap: 14px;
    box-shadow: var(--shadow-sm);
    transition: box-shadow var(--transition), transform var(--transition);
}
.art-stat:hover { box-shadow: var(--shadow-md); transform: translateY(-2px); }
.art-stat-icon {
    width: 42px; height: 42px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 16px; flex-shrink: 0;
}
.art-stat-val {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 22px; font-weight: 800; color: var(--text-main); line-height: 1;
}
.art-stat-lbl { font-size: 12px; color: var(--text-muted); margin-top: 3px; font-weight: 500; }

/* ---- Toolbar ---- */
.art-toolbar {
    background: var(--card-bg); border: 1px solid var(--border-color);
    border-radius: var(--radius); padding: 14px 18px;
    display: flex; align-items: center; gap: 10px;
    margin-bottom: 20px; flex-wrap: wrap; box-shadow: var(--shadow-sm);
}
.search-wrap { position: relative; flex: 1; min-width: 200px; }
.search-wrap i {
    position: absolute; left: 14px; top: 50%;
    transform: translateY(-50%); color: var(--text-muted); font-size: 13px; pointer-events: none;
}
.search-input {
    width: 100%; padding: 9px 14px 9px 38px;
    border: 1.5px solid var(--border-color); border-radius: var(--radius-sm);
    font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13.5px; color: var(--text-main);
    outline: none; background: var(--body-bg);
    transition: border-color var(--transition), box-shadow var(--transition);
}
.search-input::placeholder { color: #b0bec5; }
.search-input:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(14,165,233,.12); background: #fff; }
.filter-select {
    padding: 9px 30px 9px 13px; border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm); font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px; color: var(--text-main); outline: none; background: var(--body-bg);
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%2364748b' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
    background-repeat: no-repeat; background-position: right 11px center; cursor: pointer;
}
.filter-select:focus { border-color: var(--primary); outline: none; }

/* ============================================================
   CARDS GRID
============================================================ */
.art-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}

/* ---- Artikel Card ---- */
.art-card {
    background: var(--card-bg); border: 1px solid var(--border-color);
    border-radius: var(--radius); overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: box-shadow var(--transition), transform var(--transition);
    display: flex; flex-direction: column;
    animation: cardIn .35s ease both;
}
@keyframes cardIn {
    from { opacity: 0; transform: translateY(14px); }
    to   { opacity: 1; transform: translateY(0); }
}
.art-card:nth-child(1){animation-delay:.04s} .art-card:nth-child(2){animation-delay:.08s}
.art-card:nth-child(3){animation-delay:.12s} .art-card:nth-child(4){animation-delay:.16s}
.art-card:nth-child(5){animation-delay:.20s} .art-card:nth-child(6){animation-delay:.24s}
.art-card:hover { box-shadow: 0 8px 32px rgba(14,165,233,.14); transform: translateY(-3px); }

/* Thumbnail */
.ac-img-wrap {
    position: relative; overflow: hidden;
    aspect-ratio: 16/9; background: var(--body-bg); flex-shrink: 0;
}
.ac-img-wrap img {
    width: 100%; height: 100%; object-fit: cover;
    transition: transform .4s ease;
}
.art-card:hover .ac-img-wrap img { transform: scale(1.04); }
.ac-img-placeholder {
    width: 100%; height: 100%;
    display: flex; align-items: center; justify-content: center;
    background: linear-gradient(135deg, #e0f2fe, #cffafe);
    color: var(--primary); font-size: 38px;
}

/* Kategori badge */
.ac-kat-badge {
    position: absolute; top: 10px; left: 10px;
    font-size: 10px; font-weight: 800;
    text-transform: uppercase; letter-spacing: .7px;
    padding: 4px 10px; border-radius: 20px;
    backdrop-filter: blur(8px);
    background: rgba(28,20,92,.82); color: #fff;
}

/* Reading time badge */
.ac-read-badge {
    position: absolute; bottom: 8px; right: 8px;
    background: rgba(0,0,0,.6); color: #fff;
    font-size: 10px; font-weight: 600;
    padding: 3px 8px; border-radius: 6px;
    display: flex; align-items: center; gap: 4px;
}

/* Card body */
.ac-body { padding: 18px 20px; flex: 1; display: flex; flex-direction: column; }
.ac-meta-row {
    display: flex; align-items: center; gap: 8px; flex-wrap: wrap; margin-bottom: 8px;
}
.ac-date {
    font-size: 11px; color: var(--text-muted); font-weight: 600;
    text-transform: uppercase; letter-spacing: .5px;
    display: flex; align-items: center; gap: 4px;
}
.ac-views {
    font-size: 11px; color: var(--text-muted);
    display: flex; align-items: center; gap: 4px;
}
.ac-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 14.5px; font-weight: 700; color: var(--text-main); line-height: 1.4;
    margin-bottom: 8px;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
}
.ac-excerpt {
    font-size: 13px; color: var(--text-muted); line-height: 1.55; flex: 1;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
    margin-bottom: 0;
}

/* Card footer */
.ac-footer {
    display: flex; align-items: center; justify-content: space-between;
    padding: 12px 20px; border-top: 1px solid var(--border-color);
    background: #fafbff;
}
.ac-kat-tag {
    display: inline-flex; align-items: center; gap: 5px;
    background: var(--primary-light); color: var(--primary-dark);
    font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 20px;
    border: 1px solid rgba(14,165,233,.2);
}
.ac-actions { display: flex; gap: 6px; }

/* ---- Empty state ---- */
.empty-state {
    grid-column: 1/-1; padding: 64px 24px; text-align: center; color: var(--text-muted);
}
.empty-state .es-icon {
    width: 72px; height: 72px; border-radius: 20px;
    background: var(--primary-light); color: var(--primary);
    display: flex; align-items: center; justify-content: center;
    font-size: 28px; margin: 0 auto 16px;
}
.empty-state .es-title { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 16px; font-weight: 700; color: var(--text-main); margin-bottom: 6px; }
.empty-state .es-sub   { font-size: 13.5px; margin-bottom: 20px; }

/* ============================================================
   MODAL
============================================================ */
.am-modal .modal-body {
    max-height: 70vh;
    overflow-y: auto;
    padding-right: 10px;
}

.am-modal .modal-dialog { max-width: 700px; }
.am-modal.modal-xl .modal-dialog { max-width: 860px; }
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
.am-modal .modal-body   { padding: 28px 28px 8px; }
.am-modal .modal-footer { padding: 16px 28px 24px; border: none; gap: 10px; }

/* Form */
.mfg { margin-bottom: 20px; }
.mfg:last-child { margin-bottom: 0; }
.mfg-label {
    font-size: 12.5px; font-weight: 700; color: var(--text-main);
    margin-bottom: 6px; display: flex; align-items: center; gap: 6px;
}
.mfg-label i  { color: var(--primary); font-size: 11px; }
.mfg-label .req { color: #ef4444; }
.mfg-label .opt { color: var(--text-muted); font-size: 11px; font-weight: 500; }
.mfg-input, .mfg-textarea, .mfg-select {
    width: 100%; padding: 10px 14px;
    border: 1.5px solid var(--border-color); border-radius: var(--radius-sm);
    font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13.5px; color: var(--text-main);
    outline: none; background: var(--body-bg);
    transition: border-color var(--transition), box-shadow var(--transition), background var(--transition);
}
.mfg-input:focus, .mfg-textarea:focus, .mfg-select:focus {
    border-color: var(--primary); box-shadow: 0 0 0 3px rgba(14,165,233,.12); background: #fff;
}
.mfg-input::placeholder, .mfg-textarea::placeholder { color: #b0bec5; }
.mfg-textarea { resize: vertical; line-height: 1.65; }
.mfg-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
@media(max-width:575px) { .mfg-row { grid-template-columns: 1fr; } }

/* Image upload zone */
.img-upload-zone {
    border: 2px dashed var(--border-color);
    border-radius: var(--radius-sm); padding: 24px 20px; text-align: center;
    cursor: pointer; background: var(--body-bg); position: relative; overflow: hidden;
    transition: border-color var(--transition), background var(--transition);
}
.img-upload-zone:hover, .img-upload-zone.dragover {
    border-color: var(--primary); background: var(--primary-light);
}
.img-upload-zone input[type="file"] {
    position: absolute; inset: 0; opacity: 0; cursor: pointer; width: 100%; height: 100%;
}
.iuz-icon {
    width: 48px; height: 48px; border-radius: 12px;
    background: var(--primary-light); color: var(--primary);
    display: flex; align-items: center; justify-content: center;
    font-size: 20px; margin: 0 auto 12px;
    transition: background var(--transition), color var(--transition);
}
.img-upload-zone:hover .iuz-icon { background: var(--primary); color: #fff; }
.iuz-title { font-size: 13.5px; font-weight: 700; color: var(--text-main); margin-bottom: 4px; }
.iuz-sub   { font-size: 12px; color: var(--text-muted); }

/* Image preview */
.img-preview-wrap {
    display: none; position: relative;
    border-radius: var(--radius-sm); overflow: hidden;
    border: 1.5px solid var(--border-color);
}
.img-preview-wrap.show { display: block; }
.img-preview-wrap img  { width: 100%; height: 180px; object-fit: cover; display: block; }
.img-preview-overlay {
    position: absolute; inset: 0;
    background: rgba(12,26,46,.52);
    display: flex; align-items: center; justify-content: center;
    gap: 8px; opacity: 0; transition: opacity var(--transition);
}
.img-preview-wrap:hover .img-preview-overlay { opacity: 1; }
.ppb {
    display: flex; align-items: center; gap: 6px;
    padding: 8px 14px; border-radius: 8px; border: none;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 12px; font-weight: 700; cursor: pointer;
}
.ppb-change { background: #fff; color: var(--primary); }
.ppb-remove { background: #ef4444; color: #fff; }
.ppb-change input { display: none; }
.img-preview-label {
    position: absolute; bottom: 0; left: 0; right: 0;
    background: rgba(12,26,46,.75); backdrop-filter: blur(4px);
    color: #fff; font-size: 10.5px; font-weight: 700;
    padding: 5px 12px; text-align: center;
    text-transform: uppercase; letter-spacing: .6px;
}

/* Char counter */
.char-counter { font-size: 11px; color: var(--text-muted); text-align: right; margin-top: 3px; }
.char-counter.warn { color: var(--warning); }
.char-counter.over { color: var(--danger); }

/* Word counter for isi */
.word-counter {
    font-size: 11px; color: var(--text-muted); margin-top: 4px;
    display: flex; align-items: center; gap: 8px;
}
.word-counter span { font-weight: 600; color: var(--primary); }

/* Kategori select with custom input */
.kat-custom-wrap { display: none; margin-top: 8px; }

/* Status toggle */
.status-toggle-group { display: flex; gap: 8px; }
.status-toggle-group label {
    flex: 1; display: flex; align-items: center; justify-content: center; gap: 7px;
    padding: 9px 14px; border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm); font-size: 13px; font-weight: 600;
    cursor: pointer; transition: all var(--transition);
    background: var(--body-bg); color: var(--text-muted);
}
.status-toggle-group input { display: none; }
.status-toggle-group input:checked + label.lbl-published { background: #d1fae5; border-color: #6ee7b7; color: #065f46; }
.status-toggle-group input:checked + label.lbl-draft     { background: #f1f5f9; border-color: #94a3b8; color: #475569; }

/* Preview mini card */
.modal-preview-bar {
    background: linear-gradient(135deg, var(--sidebar-bg), #1e3a5f);
    border-radius: var(--radius-sm); padding: 14px 16px;
    display: flex; align-items: center; gap: 12px; margin-top: 16px;
    overflow: hidden; position: relative;
}
.modal-preview-bar::after {
    content: ''; position: absolute; right: -20px; top: -20px;
    width: 90px; height: 90px; border-radius: 50%;
    background: rgba(14,165,233,.08); pointer-events: none;
}
.mpb-thumb {
    width: 60px; height: 44px; border-radius: 8px;
    object-fit: cover; flex-shrink: 0;
    border: 2px solid rgba(255,255,255,.12);
}
.mpb-thumb-placeholder {
    width: 60px; height: 44px; border-radius: 8px;
    background: rgba(255,255,255,.08);
    display: flex; align-items: center; justify-content: center;
    color: rgba(255,255,255,.3); font-size: 18px; flex-shrink: 0;
}
.mpb-title    { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13.5px; font-weight: 700; color: #fff; }
.mpb-subtitle { font-size: 11.5px; color: rgba(255,255,255,.5); margin-top: 3px; display: flex; align-items: center; gap: 6px; }

/* Tab pills (untuk section isi & ringkasan) */
.form-tab-pills {
    display: flex; gap: 6px; margin-bottom: 16px;
    border-bottom: 1.5px solid var(--border-color); padding-bottom: 12px;
}
.ftab-btn {
    padding: 7px 16px; border-radius: 8px; border: 1.5px solid var(--border-color);
    background: var(--body-bg); color: var(--text-muted);
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 12.5px; font-weight: 700; cursor: pointer;
    transition: all var(--transition);
}
.ftab-btn.active { background: var(--primary); border-color: var(--primary); color: #fff; }

/* Modal buttons */
.btn-cancel {
    padding: 10px 20px; border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm); background: transparent;
    color: var(--text-muted); font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13.5px; font-weight: 600; cursor: pointer; transition: background var(--transition);
}
.btn-cancel:hover { background: var(--body-bg); color: var(--text-main); }
.btn-save {
    padding: 10px 24px;
    background: linear-gradient(130deg, var(--primary) 0%, var(--accent) 100%);
    color: #fff; border: none; border-radius: var(--radius-sm);
    font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13.5px; font-weight: 700; cursor: pointer;
    display: inline-flex; align-items: center; gap: 8px;
    transition: box-shadow var(--transition), transform var(--transition);
    box-shadow: 0 4px 14px rgba(14,165,233,.3);
}
.btn-save:hover { transform: translateY(-1px); box-shadow: 0 8px 22px rgba(14,165,233,.4); }

/* Admin action buttons */
.btn-icon-sm {
    width: 30px; height: 30px; border-radius: 6px;
    display: inline-flex; align-items: center; justify-content: center;
    font-size: 12px; cursor: pointer; border: none;
    transition: background var(--transition), color var(--transition), transform var(--transition);
}
.btn-icon-sm:hover { transform: scale(1.08); }
.btn-edit   { background: #e0f2fe; color: var(--primary); }
.btn-edit:hover   { background: var(--primary); color: #fff; }
.btn-delete { background: #fee2e2; color: #ef4444; }
.btn-delete:hover { background: #ef4444; color: #fff; }
.btn-preview { background: #f0fdf4; color: #059669; }
.btn-preview:hover { background: #059669; color: #fff; }

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

/* Pagination */
.art-pagination {
    display: flex; align-items: center; justify-content: space-between;
    margin-top: 24px; flex-wrap: wrap; gap: 12px;
}
.pag-info { font-size: 13px; color: var(--text-muted); }

/* Responsive */
@media(max-width:767.98px) {
    .art-grid { grid-template-columns: 1fr; }
    .art-stats { gap: 8px; }
    .art-stat  { min-width: 120px; }
    .art-toolbar { flex-direction: column; align-items: stretch; }
    .am-modal .modal-body   { padding: 20px 18px 8px; }
    .am-modal .modal-footer { padding: 12px 18px 20px; }
}
</style>
@endpush

@section('content')

{{-- ================================================================
     PAGE HEADER
================================================================ --}}
<div class="page-header">
    <div class="page-header-left">
        <div class="ph-title">Manajemen Artikel</div>
        <div class="ph-sub">Kelola artikel edukasi & informasi kesehatan RSU Allam Medica</div>
    </div>
    <button class="btn-primary-am" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="fa-solid fa-plus"></i>
        Tulis Artikel
    </button>
</div>

{{-- ================================================================
     STATS STRIP
================================================================ --}}
<div class="art-stats">
    <div class="art-stat">
        <div class="art-stat-icon" style="background:#e0f2fe;color:#0284c7;">
            <i class="fa-regular fa-newspaper"></i>
        </div>
        <div>
            <div class="art-stat-val">{{ isset($artikel) ? $artikel->count() : 6 }}</div>
            <div class="art-stat-lbl">Total Artikel</div>
        </div>
    </div>
    <div class="art-stat">
        <div class="art-stat-icon" style="background:#d1fae5;color:#059669;">
            <i class="fa-solid fa-circle-check"></i>
        </div>
        <div>
            <div class="art-stat-val">{{ $totalPublished ?? 4 }}</div>
            <div class="art-stat-lbl">Dipublikasikan</div>
        </div>
    </div>
    <div class="art-stat">
        <div class="art-stat-icon" style="background:#f1f5f9;color:#64748b;">
            <i class="fa-solid fa-file-pen"></i>
        </div>
        <div>
            <div class="art-stat-val">{{ $totalDraft ?? 2 }}</div>
            <div class="art-stat-lbl">Draft</div>
        </div>
    </div>
    <div class="art-stat">
        <div class="art-stat-icon" style="background:#fef3c7;color:#d97706;">
            <i class="fa-regular fa-eye"></i>
        </div>
        <div>
            <div class="art-stat-val">{{ number_format($totalViews ?? 6894) }}</div>
            <div class="art-stat-lbl">Total Tayangan</div>
        </div>
    </div>
    <div class="art-stat">
        <div class="art-stat-icon" style="background:#ede9fe;color:#7c3aed;">
            <i class="fa-solid fa-layer-group"></i>
        </div>
        <div>
            <div class="art-stat-val">{{ $totalKategori ?? 4 }}</div>
            <div class="art-stat-lbl">Kategori</div>
        </div>
    </div>
</div>

{{-- ================================================================
     TOOLBAR
================================================================ --}}
<div class="art-toolbar">
    <div class="search-wrap">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="search" class="search-input" id="searchArtikel"
               placeholder="Cari judul artikel...">
    </div>
    <select class="filter-select" id="filterKategori">
        <option value="">Semua Kategori</option>
        <option value="kesehatan">Kesehatan</option>
        <option value="informasi">Informasi</option>
        <option value="layanan">Layanan</option>
        <option value="dokter">Dokter</option>
        <option value="edukasi">Edukasi</option>
        <option value="tips">Tips</option>
        <option value="lainnya">Lainnya</option>
    </select>
    <select class="filter-select" id="filterStatus">
        <option value="">Semua Status</option>
        <option value="published">Dipublikasikan</option>
        <option value="draft">Draft</option>
    </select>
    <select class="filter-select" id="filterSort">
        <option value="newest">Terbaru</option>
        <option value="oldest">Terlama</option>
        <option value="popular">Terpopuler</option>
        <option value="az">A – Z</option>
    </select>
    <div style="display:flex;gap:4px;">
        <button class="topbar-btn" id="viewGrid" title="Grid"
                style="background:var(--primary-light);color:var(--primary);">
            <i class="fa-solid fa-grip"></i>
        </button>
        <button class="topbar-btn" id="viewList" title="List">
            <i class="fa-solid fa-list"></i>
        </button>
    </div>
</div>

{{-- ================================================================
     DUMMY DATA
================================================================ --}}
@php
$dummyArtikel = [
    ['id'=>1,'judul'=>'Kenali Tanda-Tanda Awal Diabetes dan Cara Mencegahnya','isi'=>'Diabetes mellitus adalah penyakit kronis yang mempengaruhi cara tubuh memproses gula darah. Kenali gejala awal dan langkah pencegahannya sejak dini agar Anda dapat hidup lebih sehat.','gambar'=>null,'kategori'=>'Kesehatan','status'=>'published','created_at'=>'2026-04-10','views'=>1248],
    ['id'=>2,'judul'=>'Panduan Memilih Dokter Spesialis yang Tepat untuk Kondisi Anda','isi'=>'Memilih dokter spesialis yang sesuai sangat penting untuk mendapatkan penanganan medis yang optimal. Artikel ini memberikan panduan lengkap bagi Anda.','gambar'=>null,'kategori'=>'Informasi','status'=>'published','created_at'=>'2026-04-08','views'=>876],
    ['id'=>3,'judul'=>'Manfaat Pemeriksaan Kesehatan Rutin Setiap Tahun','isi'=>'Medical check-up tahunan dapat mendeteksi penyakit sejak dini, bahkan sebelum gejala muncul. Simak manfaat lengkap dan panduan pelaksanaannya di artikel ini.','gambar'=>null,'kategori'=>'Tips','status'=>'published','created_at'=>'2026-04-05','views'=>1034],
    ['id'=>4,'judul'=>'Tips Menjaga Kesehatan Anak di Musim Pancaroba','isi'=>'Perubahan cuaca membuat anak rentan terkena penyakit. Berikut tips praktis dari dokter anak kami untuk menjaga imunitas si kecil tetap optimal sepanjang tahun.','gambar'=>null,'kategori'=>'Edukasi','status'=>'published','created_at'=>'2026-04-02','views'=>756],
    ['id'=>5,'judul'=>'Layanan Poli Kandungan: Persiapan Menuju Persalinan Aman','isi'=>'Kehamilan yang sehat dimulai dari pemeriksaan rutin yang tepat. Tim dokter kandungan RSU Allam Medica siap mendampingi Anda selama masa kehamilan.','gambar'=>null,'kategori'=>'Layanan','status'=>'published','created_at'=>'2026-03-28','views'=>923],
    ['id'=>6,'judul'=>'Hipertensi: Penyebab, Gejala, dan Penanganan Modern','isi'=>'Hipertensi atau tekanan darah tinggi sering disebut silent killer karena sering tidak bergejala. Pelajari cara mengelola dan mencegah komplikasinya bersama tim kami.','gambar'=>null,'kategori'=>'Kesehatan','status'=>'draft','created_at'=>'2026-03-24','views'=>0],
];
$listArtikel = $artikel ?? collect($dummyArtikel);

$katColors = [
    'Kesehatan' => ['bg'=>'#fee2e2','color'=>'#dc2626'],
    'Informasi' => ['bg'=>'#e0f2fe','color'=>'#0284c7'],
    'Tips'      => ['bg'=>'#fef3c7','color'=>'#d97706'],
    'Edukasi'   => ['bg'=>'#d1fae5','color'=>'#059669'],
    'Layanan'   => ['bg'=>'#ede9fe','color'=>'#7c3aed'],
    'Dokter'    => ['bg'=>'#cffafe','color'=>'#0891b2'],
    'Lainnya'   => ['bg'=>'#f1f5f9','color'=>'#64748b'],
];
@endphp

{{-- ================================================================
     CARDS GRID
================================================================ --}}
<div class="art-grid" id="artikelGrid">

    @forelse($listArtikel as $item)
    @php
        $id       = $item['id']          ?? $item->id;
        $judul    = $item['judul']       ?? $item->judul;
        $isi      = $item['isi']         ?? $item->isi ?? $item->deskripsi ?? '';
        $gambar   = $item['gambar']      ?? $item->gambar      ?? null;
        $kategori = $item['kategori']    ?? $item->kategori    ?? 'Lainnya';
        $status   = $item['status']      ?? $item->status      ?? 'draft';
        $views    = $item['views']       ?? $item->views       ?? 0;
        $tgl      = $item['created_at']  ?? $item->created_at  ?? null;
        $imgUrl   = $gambar ? asset('storage/'.$gambar) : null;
        $tglFmt   = $tgl ? \Carbon\Carbon::parse($tgl)->translatedFormat('d M Y') : '-';
        $wc       = str_word_count(strip_tags($isi));
        $readTime = max(1, ceil($wc / 200));
        $kc       = $katColors[$kategori] ?? $katColors['Lainnya'];
    @endphp

    <div class="art-card"
         data-id="{{ $id }}"
         data-judul="{{ strtolower($judul) }}"
         data-kategori="{{ strtolower($kategori) }}"
         data-status="{{ $status }}">

        {{-- Thumbnail --}}
        <div class="ac-img-wrap">
            @if($imgUrl)
                <img src="{{ $imgUrl }}" alt="{{ $judul }}" loading="lazy">
            @else
                <div class="ac-img-placeholder">
                    <i class="fa-regular fa-newspaper"></i>
                </div>
            @endif

            {{-- Kategori badge --}}
            <span class="ac-kat-badge">{{ $kategori }}</span>

            {{-- Status badge --}}
            <span style="position:absolute;top:10px;right:10px;
                         font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.6px;
                         padding:3px 9px;border-radius:20px;backdrop-filter:blur(8px);
                         background:{{ $status === 'published' ? 'rgba(16,185,129,.85)' : 'rgba(100,116,139,.8)' }};
                         color:#fff;">
                {{ $status === 'published' ? 'Publik' : 'Draft' }}
            </span>

            {{-- Read time --}}
            <div class="ac-read-badge">
                <i class="fa-regular fa-clock" style="font-size:9px;"></i>
                {{ $readTime }} mnt
            </div>
        </div>

        {{-- Body --}}
        <div class="ac-body">
            <div class="ac-meta-row">
                <div class="ac-date">
                    <i class="fa-regular fa-calendar" style="font-size:10px;"></i>
                    {{ $tglFmt }}
                </div>
                <div class="ac-views">
                    <i class="fa-regular fa-eye" style="font-size:10px;"></i>
                    {{ number_format($views) }}
                </div>
            </div>
            <div class="ac-title">{{ $judul }}</div>
            <div class="ac-excerpt">{{ Str::limit(strip_tags($isi), 120) }}</div>
        </div>

        {{-- Footer --}}
        <div class="ac-footer">
            <span class="ac-kat-tag"
                  style="background:{{ $kc['bg'] }};color:{{ $kc['color'] }};border-color:{{ $kc['bg'] }};">
                <i class="fa-solid fa-tag" style="font-size:9px;"></i>
                {{ $kategori }}
            </span>
            <div class="ac-actions">
                {{-- Preview --}}
                <a href="{{ route('artikel.detail', $id) }}" target="_blank"
                   class="btn-icon-sm btn-preview" title="Lihat di website">
                    <i class="fa-solid fa-eye"></i>
                </a>
                {{-- Edit --}}
                <button class="btn-icon-sm btn-edit" title="Edit artikel"
                    onclick="openEditModal(
                        '{{ $id }}',
                        `{{ addslashes($judul) }}`,
                        `{{ addslashes($isi) }}`,
                        '{{ $imgUrl ?? '' }}',
                        '{{ $kategori }}',
                        '{{ $status }}'
                    )">
                    <i class="fa-solid fa-pen"></i>
                </button>
                {{-- Delete --}}
                <button class="btn-icon-sm btn-delete" title="Hapus artikel"
                    onclick="openDeleteModal('{{ $id }}', `{{ addslashes($judul) }}`)">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
        </div>

    </div>
    @empty
    <div class="empty-state">
        <div class="es-icon"><i class="fa-regular fa-newspaper"></i></div>
        <div class="es-title">Belum Ada Artikel</div>
        <div class="es-sub">Mulai tulis artikel edukasi kesehatan pertama Anda.</div>
        <button class="btn-primary-am" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fa-solid fa-plus"></i> Tulis Artikel Pertama
        </button>
    </div>
    @endforelse

</div>

{{-- Pagination --}}
@if(isset($artikel) && $artikel->hasPages())
<div class="art-pagination">
    <div class="pag-info">
        Menampilkan {{ $artikel->firstItem() }}–{{ $artikel->lastItem() }}
        dari {{ $artikel->total() }} artikel
    </div>
    {{ $artikel->withQueryString()->links() }}
</div>
@endif


{{-- ================================================================
     MODAL: TAMBAH ARTIKEL
================================================================ --}}
<div class="modal fade am-modal" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <span class="mt-icon"><i class="fa-solid fa-pen-nib"></i></span>
                    Tulis Artikel Baru
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('admin.artikel.store') }}" method="POST"
                  enctype="multipart/form-data" id="formTambah">
                @csrf
                <div class="modal-body">

                    {{-- Gambar (sampul) --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-image"></i>
                            Gambar Sampul Artikel <span class="opt">(opsional)</span>
                        </div>

                        <div class="img-preview-wrap" id="tambahPreviewWrap">
                            <img src="" id="tambahPreviewImg" alt="Preview">
                            <div class="img-preview-label">Preview Sampul</div>
                            <div class="img-preview-overlay">
                                <label class="ppb ppb-change">
                                    <i class="fa-solid fa-arrow-up-from-bracket"></i> Ganti
                                    <input type="file" name="gambar" id="tambahGambar2"
                                           accept="image/jpeg,image/png,image/webp"
                                           onchange="previewImg(this,'tambah')">
                                </label>
                                <button type="button" class="ppb ppb-remove"
                                        onclick="removeImg('tambah')">
                                    <i class="fa-solid fa-trash-can"></i> Hapus
                                </button>
                            </div>
                        </div>

                        <div class="img-upload-zone" id="tambahUploadZone">
                            <input type="file" name="gambar" id="tambahGambar"
                                   accept="image/jpeg,image/png,image/webp"
                                   onchange="previewImg(this,'tambah')">
                            <div class="iuz-icon"><i class="fa-solid fa-cloud-arrow-up"></i></div>
                            <div class="iuz-title">Klik atau seret gambar sampul</div>
                            <div class="iuz-sub">JPG, PNG, WebP — Maks. 7 MB — Rasio 16:9 dianjurkan</div>
                        </div>
                    </div>

                    {{-- Judul --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-heading"></i>
                            Judul Artikel <span class="req">*</span>
                        </div>
                        <input type="text" name="judul" class="mfg-input" id="tambahJudul"
                               placeholder="Tulis judul artikel yang menarik..."
                               maxlength="200" required
                               oninput="syncPreview('tambah')">
                        <div class="char-counter" id="tambahJudulCtr">0 / 200</div>
                    </div>

                    {{-- Kategori & Status (2 col) --}}
                    <div class="mfg-row mfg">
                        <div>
                            <div class="mfg-label">
                                <i class="fa-solid fa-tag"></i>
                                Kategori <span class="req">*</span>
                            </div>
                            <select name="_kategori_select" class="mfg-select" id="tambahKategoriSelect"
                                    required onchange="onKategoriChange('tambah')">
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Kesehatan">Kesehatan</option>
                                <option value="Informasi">Informasi</option>
                                <option value="Layanan">Layanan</option>
                                <option value="Dokter">Dokter</option>
                                <option value="Edukasi">Edukasi</option>
                                <option value="Tips">Tips</option>
                                <option value="lainnya">+ Lainnya</option>
                            </select>
                            <div class="kat-custom-wrap" id="tambahKatCustomWrap">
                                <input type="text" class="mfg-input" id="tambahKatCustom"
                                       placeholder="Tulis kategori..." style="margin-top:8px;">
                            </div>
                            <input type="hidden" name="kategori" id="tambahKategori">
                        </div>
                        <div>
                            <div class="mfg-label">
                                <i class="fa-solid fa-toggle-on"></i>
                                Status Publikasi
                            </div>
                            <div class="status-toggle-group" style="margin-top:2px;">
                                <input type="radio" name="status" id="tambahPublished" value="published" checked>
                                <label for="tambahPublished" class="lbl-published">
                                    <i class="fa-solid fa-circle-check"></i> Publik
                                </label>
                                <input type="radio" name="status" id="tambahDraft" value="draft">
                                <label for="tambahDraft" class="lbl-draft">
                                    <i class="fa-solid fa-file-pen"></i> Draft
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- Isi Artikel --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-align-left"></i>
                            Isi / Konten Artikel <span class="req">*</span>
                        </div>
                        <textarea name="isi" class="mfg-textarea" id="tambahIsi"
                                  placeholder="Tulis konten artikel di sini...&#10;&#10;Anda bisa menggunakan paragraf, poin-poin, atau susunan konten bebas. Artikel yang baik memuat informasi yang jelas, mudah dipahami, dan bermanfaat bagi pembaca."
                                  style="min-height:200px;"
                                  required
                                  oninput="updateWordCount('tambah')"></textarea>
                        <div class="word-counter">
                            Kata: <span id="tambahWordCount">0</span> &nbsp;·&nbsp;
                            Estimasi baca: <span id="tambahReadTime">0</span> menit
                        </div>
                    </div>

                    {{-- Live preview --}}
                    <div class="modal-preview-bar">
                        <img src="" id="tambahMpbThumb" class="mpb-thumb" alt="" style="display:none;">
                        <div class="mpb-thumb-placeholder" id="tambahMpbPlaceholder">
                            <i class="fa-regular fa-newspaper"></i>
                        </div>
                        <div>
                            <div class="mpb-title"  id="tambahMpbTitle">Judul Artikel</div>
                            <div class="mpb-subtitle" id="tambahMpbSub">
                                <i class="fa-solid fa-tag" style="font-size:9px;color:var(--primary);"></i>
                                Kategori
                                &nbsp;·&nbsp;
                                <i class="fa-regular fa-clock" style="font-size:9px;"></i>
                                0 menit baca
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Batal
                    </button>
                    <button type="submit" class="btn-save">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Artikel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- ================================================================
     MODAL: EDIT ARTIKEL
================================================================ --}}
<div class="modal fade am-modal" id="modalEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(135deg,#1e3a5f 0%,#0ea5e9 100%);">
                <h5 class="modal-title">
                    <span class="mt-icon"><i class="fa-solid fa-pen-to-square"></i></span>
                    Edit Artikel
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="" method="POST" enctype="multipart/form-data" id="formEdit">
                @csrf @method('PUT')
                <input type="hidden" name="id"            id="editId">
                <input type="hidden" name="hapus_gambar"  id="editHapusGambar" value="0">
                <input type="hidden" name="kategori"      id="editKategori">

                <div class="modal-body">

                    {{-- Gambar --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-image"></i>
                            Gambar Sampul <span class="opt">(kosongkan jika tidak diganti)</span>
                        </div>

                        <div class="img-preview-wrap" id="editPreviewWrap">
                            <img src="" id="editPreviewImg" alt="Preview">
                            <div class="img-preview-label" id="editPreviewLabel">Gambar Saat Ini</div>
                            <div class="img-preview-overlay">
                                <label class="ppb ppb-change">
                                    <i class="fa-solid fa-arrow-up-from-bracket"></i> Ganti
                                    <input type="file" name="gambar" id="editGambar2"
                                           accept="image/jpeg,image/png,image/webp"
                                           onchange="previewImg(this,'edit')">
                                </label>
                                <button type="button" class="ppb ppb-remove"
                                        onclick="removeImg('edit')">
                                    <i class="fa-solid fa-trash-can"></i> Hapus
                                </button>
                            </div>
                        </div>

                        <div class="img-upload-zone" id="editUploadZone">
                            <input type="file" name="gambar" id="editGambar"
                                   accept="image/jpeg,image/png,image/webp"
                                   onchange="previewImg(this,'edit')">
                            <div class="iuz-icon"><i class="fa-solid fa-arrow-up-from-bracket"></i></div>
                            <div class="iuz-title">Ganti gambar sampul</div>
                            <div class="iuz-sub">JPG, PNG, WebP — Maks. 7 MB</div>
                        </div>
                    </div>

                    {{-- Judul --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-heading"></i>
                            Judul Artikel <span class="req">*</span>
                        </div>
                        <input type="text" name="judul" class="mfg-input" id="editJudul"
                               placeholder="Judul artikel..." maxlength="200" required
                               oninput="syncPreview('edit')">
                        <div class="char-counter" id="editJudulCtr">0 / 200</div>
                    </div>

                    {{-- Kategori & Status --}}
                    <div class="mfg-row mfg">
                        <div>
                            <div class="mfg-label">
                                <i class="fa-solid fa-tag"></i>
                                Kategori <span class="req">*</span>
                            </div>
                            <select name="_kategori_sel" class="mfg-select" id="editKategoriSelect"
                                    onchange="onKategoriChange('edit')">
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Kesehatan">Kesehatan</option>
                                <option value="Informasi">Informasi</option>
                                <option value="Layanan">Layanan</option>
                                <option value="Dokter">Dokter</option>
                                <option value="Edukasi">Edukasi</option>
                                <option value="Tips">Tips</option>
                                <option value="lainnya">+ Lainnya</option>
                            </select>
                            <div class="kat-custom-wrap" id="editKatCustomWrap">
                                <input type="text" class="mfg-input" id="editKatCustom"
                                       placeholder="Tulis kategori..." style="margin-top:8px;"
                                       oninput="document.getElementById('editKategori').value = this.value;">
                            </div>
                        </div>
                        <div>
                            <div class="mfg-label">
                                <i class="fa-solid fa-toggle-on"></i>
                                Status Publikasi
                            </div>
                            <div class="status-toggle-group" style="margin-top:2px;">
                                <input type="radio" name="status" id="editPublished" value="published">
                                <label for="editPublished" class="lbl-published">
                                    <i class="fa-solid fa-circle-check"></i> Publik
                                </label>
                                <input type="radio" name="status" id="editDraft" value="draft">
                                <label for="editDraft" class="lbl-draft">
                                    <i class="fa-solid fa-file-pen"></i> Draft
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- Isi --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-align-left"></i>
                            Isi / Konten Artikel <span class="req">*</span>
                        </div>
                        <textarea name="isi" class="mfg-textarea" id="editIsi"
                                  placeholder="Konten artikel..."
                                  style="min-height:200px;"
                                  required
                                  oninput="updateWordCount('edit')"></textarea>
                        <div class="word-counter">
                            Kata: <span id="editWordCount">0</span> &nbsp;·&nbsp;
                            Estimasi baca: <span id="editReadTime">0</span> menit
                        </div>
                    </div>

                    {{-- Live preview --}}
                    <div class="modal-preview-bar">
                        <img src="" id="editMpbThumb" class="mpb-thumb" alt="" style="display:none;">
                        <div class="mpb-thumb-placeholder" id="editMpbPlaceholder">
                            <i class="fa-regular fa-newspaper"></i>
                        </div>
                        <div>
                            <div class="mpb-title"   id="editMpbTitle">—</div>
                            <div class="mpb-subtitle" id="editMpbSub">
                                <i class="fa-solid fa-tag" style="font-size:9px;color:var(--primary);"></i>—
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Batal
                    </button>
                    <button type="submit" class="btn-save">
                        <i class="fa-solid fa-floppy-disk"></i> Perbarui Artikel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- ================================================================
     MODAL: HAPUS ARTIKEL
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
                    <div class="del-icon"><i class="fa-regular fa-newspaper"></i></div>
                    <div class="del-title">Hapus Artikel Ini?</div>
                    <div class="del-sub">
                        Artikel berikut akan dihapus secara permanen beserta gambar sampulnya.
                        Tindakan ini tidak dapat dibatalkan.
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

@endsection


@push('scripts')
<script>
/* ============================================================
   ARTIKEL PAGE — JavaScript
============================================================ */
document.getElementById('formTambah').addEventListener('submit', function() {
    const sel = document.getElementById('tambahKategoriSelect');
    const hidden = document.getElementById('tambahKategori');

    if (sel.value !== 'lainnya') {
        hidden.value = sel.value;
    }
});


/* ---- Char counters ---- */
function initCtr(elId, ctrId, max) {
    const el = document.getElementById(elId);
    const ct = document.getElementById(ctrId);
    if (!el || !ct) return;
    const upd = () => {
        const l = el.value.length;
        ct.textContent = `${l} / ${max}`;
        ct.className = 'char-counter' + (l >= max ? ' over' : l > max * .88 ? ' warn' : '');
    };
    el.addEventListener('input', upd); upd();
}
initCtr('tambahJudul', 'tambahJudulCtr', 200);
initCtr('editJudul',   'editJudulCtr',   200);

/* ---- Word counter + reading time ---- */
function updateWordCount(prefix) {
    const isi  = document.getElementById(prefix + 'Isi')?.value || '';
    const wc   = isi.trim() ? isi.trim().split(/\s+/).length : 0;
    const rt   = Math.max(1, Math.ceil(wc / 200));
    const wcEl = document.getElementById(prefix + 'WordCount');
    const rtEl = document.getElementById(prefix + 'ReadTime');
    if (wcEl) wcEl.textContent = wc.toLocaleString('id-ID');
    if (rtEl) rtEl.textContent = rt;

    // Update preview subtitle
    syncPreview(prefix);
}

/* ---- Kategori select logic ---- */
function onKategoriChange(prefix) {
    const sel   = document.getElementById(prefix + 'KategoriSelect');
    const custW = document.getElementById(prefix + 'KatCustomWrap');
    const custI = document.getElementById(prefix + 'KatCustom');
    const hid   = document.getElementById(prefix + 'Kategori');

    if (sel.value === 'lainnya') {
        custW.style.display = 'block';
        custI?.focus();
        if (hid) hid.value = '';
    } else {
        custW.style.display = 'none';
        if (hid) hid.value = sel.value;
        syncPreview(prefix);
    }
}

/* custom kat input sync */
['tambahKatCustom','editKatCustom'].forEach(function(id) {
    const el = document.getElementById(id);
    if (!el) return;
    el.addEventListener('input', function() {
        const p   = id.includes('tambah') ? 'tambah' : 'edit';
        const hid = document.getElementById(p + 'Kategori');
        if (hid) hid.value = this.value;
        syncPreview(p);
    });
});

/* ---- Sync live preview bar ---- */
function syncPreview(prefix) {
    const judul = document.getElementById(prefix + 'Judul')?.value    || 'Judul Artikel';
    const katSel = document.getElementById(prefix + 'KategoriSelect');
    let kat = katSel?.value === 'lainnya'
                ? (document.getElementById(prefix + 'KatCustom')?.value || 'Lainnya')
                : (katSel?.value || 'Kategori');

    const wc = document.getElementById(prefix + 'Isi')?.value?.trim()?.split(/\s+/).length || 0;
    const rt = Math.max(1, Math.ceil(wc / 200));

    const titleEl = document.getElementById(prefix + 'MpbTitle');
    const subEl   = document.getElementById(prefix + 'MpbSub');
    if (titleEl) titleEl.textContent = judul || 'Judul Artikel';
    if (subEl)   subEl.innerHTML =
        `<i class="fa-solid fa-tag" style="font-size:9px;color:var(--primary);"></i> ${kat}
         &nbsp;·&nbsp;
         <i class="fa-regular fa-clock" style="font-size:9px;"></i> ${rt} menit baca`;
}

/* ---- Image preview ---- */
function previewImg(input, prefix) {
    const file = input.files[0];
    if (!file) return;
    if (!['image/jpeg','image/png','image/webp'].includes(file.type)) {
        alert('Format tidak didukung. Gunakan JPG, PNG, atau WebP.'); input.value = ''; return;
    }
    if (file.size > 7 * 1024 * 1024) {
        alert('Ukuran file terlalu besar. Maksimal 7 MB.'); input.value = ''; return;
    }
    const reader = new FileReader();
    reader.onload = function(e) {
        const wrap  = document.getElementById(prefix + 'PreviewWrap');
        const img   = document.getElementById(prefix + 'PreviewImg');
        const zone  = document.getElementById(prefix + 'UploadZone');
        const label = document.getElementById(prefix + 'PreviewLabel');
        const mpbT  = document.getElementById(prefix + 'MpbThumb');
        const mpbP  = document.getElementById(prefix + 'MpbPlaceholder');

        img.src = e.target.result;
        wrap.classList.add('show');
        zone.style.display = 'none';
        if (label) label.textContent = 'Gambar Baru — Belum Tersimpan';
        if (mpbT)  { mpbT.src = e.target.result; mpbT.style.display = 'block'; }
        if (mpbP)  mpbP.style.display = 'none';
        if (prefix === 'edit') {
            const hf = document.getElementById('editHapusGambar');
            if (hf) hf.value = '0';
        }
    };
    reader.readAsDataURL(file);
}

function removeImg(prefix) {
    const wrap  = document.getElementById(prefix + 'PreviewWrap');
    const img   = document.getElementById(prefix + 'PreviewImg');
    const zone  = document.getElementById(prefix + 'UploadZone');
    const mpbT  = document.getElementById(prefix + 'MpbThumb');
    const mpbP  = document.getElementById(prefix + 'MpbPlaceholder');

    img.src = ''; wrap.classList.remove('show'); zone.style.display = '';
    ['Gambar','Gambar2'].forEach(s => {
        const el = document.getElementById(prefix + s); if (el) el.value = '';
    });
    if (mpbT)  { mpbT.src = ''; mpbT.style.display = 'none'; }
    if (mpbP)  mpbP.style.display = 'flex';
    if (prefix === 'edit') {
        const hf = document.getElementById('editHapusGambar');
        if (hf) hf.value = '1';
    }
}

/* ---- Drag & drop ---- */
['tambah','edit'].forEach(function(p) {
    const zone = document.getElementById(p + 'UploadZone');
    if (!zone) return;
    zone.addEventListener('dragover',  e => { e.preventDefault(); zone.classList.add('dragover'); });
    zone.addEventListener('dragleave', () => zone.classList.remove('dragover'));
    zone.addEventListener('drop', function(e) {
        e.preventDefault(); zone.classList.remove('dragover');
        const inp = zone.querySelector('input[type="file"]');
        if (e.dataTransfer.files.length) { inp.files = e.dataTransfer.files; previewImg(inp, p); }
    });
});

/* ---- Open EDIT modal ---- */
function openEditModal(id, judul, isi, imgUrl, kategori, status) {
    document.getElementById('editId').value      = id;
    document.getElementById('editJudul').value   = judul;
    document.getElementById('editIsi').value     = isi;
    document.getElementById('editHapusGambar').value = '0';
    document.getElementById('formEdit').action   = '{{ url("admin/artikel") }}/' + id;

    // Status
    document.getElementById('editPublished').checked = (status === 'published');
    document.getElementById('editDraft').checked     = (status !== 'published');

    // Kategori
    const sel    = document.getElementById('editKategoriSelect');
    const custW  = document.getElementById('editKatCustomWrap');
    const custI  = document.getElementById('editKatCustom');
    const hidden = document.getElementById('editKategori');
    let found = false;
    for (let opt of sel.options) {
        if (opt.value === kategori) { opt.selected = true; found = true; break; }
    }
    if (!found && kategori) {
        sel.value = 'lainnya'; custW.style.display = 'block'; custI.value = kategori;
    } else {
        custW.style.display = 'none';
    }
    hidden.value = kategori;

    // Image
    const wrap  = document.getElementById('editPreviewWrap');
    const img   = document.getElementById('editPreviewImg');
    const zone  = document.getElementById('editUploadZone');
    const label = document.getElementById('editPreviewLabel');
    const mpbT  = document.getElementById('editMpbThumb');
    const mpbP  = document.getElementById('editMpbPlaceholder');
    if (imgUrl && imgUrl.trim() !== '') {
        img.src = imgUrl; wrap.classList.add('show'); zone.style.display = 'none';
        if (label) label.textContent = 'Gambar Saat Ini';
        if (mpbT)  { mpbT.src = imgUrl; mpbT.style.display = 'block'; }
        if (mpbP)  mpbP.style.display = 'none';
    } else {
        img.src = ''; wrap.classList.remove('show'); zone.style.display = '';
        if (mpbT)  { mpbT.src = ''; mpbT.style.display = 'none'; }
        if (mpbP)  mpbP.style.display = 'flex';
    }

    // Reset file inputs
    ['editGambar','editGambar2'].forEach(i => { const el = document.getElementById(i); if (el) el.value = ''; });

    // Trigger counters
    ['editJudul','editIsi'].forEach(i => document.getElementById(i).dispatchEvent(new Event('input')));
    updateWordCount('edit');
    syncPreview('edit');

    new bootstrap.Modal(document.getElementById('modalEdit')).show();
}

/* ---- Open DELETE modal ---- */
function openDeleteModal(id, judul) {
    document.getElementById('formHapus').action      = '{{ url("admin/artikel") }}/' + id;
    document.getElementById('delTarget').textContent = judul;
    new bootstrap.Modal(document.getElementById('modalHapus')).show();
}

/* ---- Reset tambah modal on close ---- */
document.getElementById('modalTambah').addEventListener('hidden.bs.modal', function() {
    document.getElementById('formTambah').reset();
    removeImg('tambah');
    document.getElementById('tambahKategori').value = '';
    document.getElementById('tambahKatCustomWrap').style.display = 'none';
    document.getElementById('tambahWordCount').textContent = '0';
    document.getElementById('tambahReadTime').textContent  = '0';
    document.getElementById('tambahMpbTitle').textContent  = 'Judul Artikel';
    document.getElementById('tambahMpbSub').innerHTML =
        '<i class="fa-solid fa-tag" style="font-size:9px;color:var(--primary);"></i> Kategori &nbsp;·&nbsp; <i class="fa-regular fa-clock" style="font-size:9px;"></i> 0 menit baca';
    ['tambahJudulCtr'].forEach(id => {
        const el = document.getElementById(id); if (el) el.textContent = '0 / 200';
    });
});

/* ---- Live search ---- */
document.getElementById('searchArtikel').addEventListener('input', function() {
    const q = this.value.toLowerCase();
    document.querySelectorAll('.art-card').forEach(function(card) {
        const t = card.dataset.judul || '';
        card.style.display = (!q || t.includes(q)) ? '' : 'none';
    });
});

/* ---- Filter kategori ---- */
document.getElementById('filterKategori').addEventListener('change', function() {
    const val = this.value.toLowerCase();
    document.querySelectorAll('.art-card').forEach(function(card) {
        const k = card.dataset.kategori || '';
        card.style.display = (!val || k === val) ? '' : 'none';
    });
});

/* ---- Filter status ---- */
document.getElementById('filterStatus').addEventListener('change', function() {
    const val = this.value;
    document.querySelectorAll('.art-card').forEach(function(card) {
        card.style.display = (!val || card.dataset.status === val) ? '' : 'none';
    });
});

/* ---- View toggle ---- */
const grid = document.getElementById('artikelGrid');
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