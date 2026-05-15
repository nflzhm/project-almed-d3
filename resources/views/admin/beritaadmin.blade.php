
@extends('admin.layout')

@section('title', 'Manajemen Berita')
@section('page-title', 'Berita')

@section('breadcrumb')
    <li class="breadcrumb-item active">Manajemen Berita</li>
@endsection

@push('styles')
<style>


/* ---- Page header ---- */
.page-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    margin-bottom: 24px;
    gap: 16px;
    flex-wrap: wrap;
}

.page-header-left .ph-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 20px;
    font-weight: 800;
    color: var(--text-main);
    letter-spacing: -.3px;
}

.page-header-left .ph-sub {
    font-size: 13px;
    color: var(--text-muted);
    margin-top: 3px;
}

/* ---- Stats strip ---- */
.berita-stats {
    display: flex;
    gap: 12px;
    margin-bottom: 24px;
    flex-wrap: wrap;
}

.bs-item {
    flex: 1;
    min-width: 140px;
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: var(--radius);
    padding: 16px 20px;
    display: flex;
    align-items: center;
    gap: 14px;
    box-shadow: var(--shadow-sm);
    transition: box-shadow var(--transition), transform var(--transition);
}

.bs-item:hover {
    box-shadow: var(--shadow-md);
    transform: translateY(-2px);
}

.bs-icon {
    width: 42px; height: 42px;
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 16px;
    flex-shrink: 0;
}

.bs-info .bs-val {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 22px;
    font-weight: 800;
    color: var(--text-main);
    line-height: 1;
}

.bs-info .bs-lbl {
    font-size: 12px;
    color: var(--text-muted);
    margin-top: 3px;
    font-weight: 500;
}

/* ---- Toolbar (search + filter + add) ---- */
.berita-toolbar {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: var(--radius);
    padding: 16px 20px;
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
    flex-wrap: wrap;
    box-shadow: var(--shadow-sm);
}

.search-wrap {
    position: relative;
    flex: 1;
    min-width: 200px;
}

.search-wrap i {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-muted);
    font-size: 13px;
    pointer-events: none;
}

.search-input {
    width: 100%;
    padding: 9px 14px 9px 38px;
    border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm);
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13.5px;
    color: var(--text-main);
    outline: none;
    transition: border-color var(--transition), box-shadow var(--transition);
    background: var(--body-bg);
}

.search-input::placeholder { color: #b0bec5; }

.search-input:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(14,165,233,.12);
    background: #fff;
}

.filter-select {
    padding: 9px 32px 9px 14px;
    border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm);
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    color: var(--text-main);
    outline: none;
    background: var(--body-bg);
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%2364748b' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 12px center;
    cursor: pointer;
    transition: border-color var(--transition);
}

.filter-select:focus { border-color: var(--primary); outline: none; }

/* ---- Cards grid ---- */
.berita-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}

/* ---- Berita card ---- */
.berita-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: box-shadow var(--transition), transform var(--transition);
    display: flex;
    flex-direction: column;
    animation: cardIn .35s ease both;
}

@keyframes cardIn {
    from { opacity: 0; transform: translateY(14px); }
    to   { opacity: 1; transform: translateY(0); }
}

.berita-card:hover {
    box-shadow: 0 8px 32px rgba(14,165,233,.14);
    transform: translateY(-3px);
}

.berita-card:nth-child(1) { animation-delay: .04s; }
.berita-card:nth-child(2) { animation-delay: .08s; }
.berita-card:nth-child(3) { animation-delay: .12s; }
.berita-card:nth-child(4) { animation-delay: .16s; }
.berita-card:nth-child(5) { animation-delay: .20s; }
.berita-card:nth-child(6) { animation-delay: .24s; }

/* Image area */
.bc-img-wrap {
    position: relative;
    overflow: hidden;
    aspect-ratio: 16/9;
    background: var(--body-bg);
    flex-shrink: 0;
}

.bc-img-wrap img {
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform .4s ease;
}

.berita-card:hover .bc-img-wrap img {
    transform: scale(1.04);
}

.bc-img-placeholder {
    width: 100%; height: 100%;
    display: flex; align-items: center; justify-content: center;
    background: linear-gradient(135deg, var(--primary-light), #e0f7fa);
    color: var(--primary);
    font-size: 36px;
}

/* Overlay badge */
.bc-badge {
    position: absolute;
    top: 10px; left: 10px;
    font-size: 10px; font-weight: 700;
    text-transform: uppercase; letter-spacing: .8px;
    padding: 4px 10px;
    border-radius: 20px;
    backdrop-filter: blur(8px);
}

.bc-badge.published { background: rgba(16,185,129,.85); color: #fff; }
.bc-badge.draft     { background: rgba(100,116,139,.8); color: #fff; }

/* Card body */
.bc-body {
    padding: 18px 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.bc-date {
    font-size: 11px;
    color: var(--text-muted);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: .6px;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 5px;
}

.bc-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 14.5px;
    font-weight: 700;
    color: var(--text-main);
    line-height: 1.4;
    margin-bottom: 8px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.bc-desc {
    font-size: 13px;
    color: var(--text-muted);
    line-height: 1.55;
    flex: 1;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    margin-bottom: 14px;
}

/* Card footer */
.bc-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 20px;
    border-top: 1px solid var(--border-color);
    background: #fafbff;
}

.bc-views {
    font-size: 12px;
    color: var(--text-muted);
    display: flex;
    align-items: center;
    gap: 5px;
}

.bc-actions {
    display: flex;
    gap: 6px;
}

/* ---- Empty state ---- */
.empty-state {
    grid-column: 1 / -1;
    padding: 64px 24px;
    text-align: center;
    color: var(--text-muted);
}

.empty-state .es-icon {
    width: 72px; height: 72px;
    border-radius: 20px;
    background: var(--primary-light);
    display: flex; align-items: center; justify-content: center;
    font-size: 28px;
    color: var(--primary);
    margin: 0 auto 16px;
}

.empty-state .es-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 16px;
    font-weight: 700;
    color: var(--text-main);
    margin-bottom: 6px;
}

.empty-state .es-sub {
    font-size: 13.5px;
    color: var(--text-muted);
    margin-bottom: 20px;
}

/* ---- Pagination ---- */
.berita-pagination {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 24px;
    flex-wrap: wrap;
    gap: 12px;
}

.pag-info {
    font-size: 13px;
    color: var(--text-muted);
}

/* ============================================================
   MODAL STYLES
============================================================ */
.am-modal .modal-dialog {
    max-height: 90vh;
    display: flex;
    align-items: center;
}

.am-modal .modal-content {
    max-height: 90vh;
    display: flex;
    flex-direction: column;
    overflow: hidden;
}
.am-modal .modal-body {
    flex: 1;
    overflow-y: auto;
    max-height: calc(90vh - 140px); /* header + footer space */
    padding-right: 10px;
}

.am-modal .modal-header {
    background: linear-gradient(135deg, var(--sidebar-bg) 0%, #1e3a5f 100%);
    padding: 18px 24px;
    border: none;
}

.am-modal .modal-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 15px;
    font-weight: 700;
    color: #fff;
    display: flex;
    align-items: center;
    gap: 10px;
}

.am-modal .modal-title i {
    width: 30px; height: 30px;
    border-radius: 8px;
    background: rgba(255,255,255,.12);
    display: flex; align-items: center; justify-content: center;
    font-size: 13px;
}

.am-modal .btn-close {
    filter: invert(1) brightness(2);
    opacity: .7;
}

.am-modal .btn-close:hover { opacity: 1; }

.am-modal .modal-body {
    padding: 28px 28px 8px;
}

.am-modal .modal-footer {
    flex-shrink: 0;
    background: #fff;
    z-index: 2;
}

/* Form inside modal */
.modal-form-group {
    margin-bottom: 20px;
}

.modal-form-group:last-child {
    margin-bottom: 0;
}

.mfg-label {
    font-size: 12.5px;
    font-weight: 700;
    color: var(--text-main);
    margin-bottom: 6px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.mfg-label .req {
    color: #ef4444;
    font-size: 13px;
}

.mfg-input,
.mfg-textarea,
.mfg-select {
    width: 100%;
    padding: 10px 14px;
    border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm);
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13.5px;
    color: var(--text-main);
    outline: none;
    background: var(--body-bg);
    transition: border-color var(--transition), box-shadow var(--transition), background var(--transition);
}

.mfg-input:focus,
.mfg-textarea:focus,
.mfg-select:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(14,165,233,.12);
    background: #fff;
}

.mfg-textarea {
    min-height: 120px;
    resize: vertical;
    line-height: 1.6;
}

/* Image upload zone */
.img-upload-zone {
    border: 2px dashed var(--border-color);
    border-radius: var(--radius-sm);
    padding: 28px 20px;
    text-align: center;
    cursor: pointer;
    transition: border-color var(--transition), background var(--transition);
    background: var(--body-bg);
    position: relative;
    overflow: hidden;
}

.img-upload-zone:hover,
.img-upload-zone.dragover {
    border-color: var(--primary);
    background: var(--primary-light);
}

.img-upload-zone input[type="file"] {
    position: absolute;
    inset: 0;
    opacity: 0;
    cursor: pointer;
    width: 100%;
    height: 100%;
}

.iuz-icon {
    width: 48px; height: 48px;
    border-radius: 12px;
    background: var(--primary-light);
    color: var(--primary);
    display: flex; align-items: center; justify-content: center;
    font-size: 20px;
    margin: 0 auto 12px;
    transition: background var(--transition);
}

.img-upload-zone:hover .iuz-icon {
    background: var(--primary);
    color: #fff;
}

.iuz-title {
    font-size: 13.5px;
    font-weight: 700;
    color: var(--text-main);
    margin-bottom: 4px;
}

.iuz-sub {
    font-size: 12px;
    color: var(--text-muted);
}

/* Image preview */
.img-preview-wrap {
    position: relative;
    border-radius: var(--radius-sm);
    overflow: hidden;
    border: 1.5px solid var(--border-color);
    display: none;
}

.img-preview-wrap.show { display: block; }

.img-preview-wrap img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    display: block;
}

.img-preview-remove {
    position: absolute;
    top: 8px; right: 8px;
    width: 28px; height: 28px;
    border-radius: 8px;
    background: rgba(0,0,0,.55);
    color: #fff;
    border: none;
    cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    font-size: 11px;
    transition: background var(--transition);
}

.img-preview-remove:hover { background: var(--danger); }

/* Status toggle */
.status-toggle-group {
    display: flex;
    gap: 8px;
}

.status-toggle-group label {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    padding: 9px 14px;
    border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm);
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: all var(--transition);
    background: var(--body-bg);
    color: var(--text-muted);
}

.status-toggle-group input { display: none; }

.status-toggle-group input:checked + label.published-lbl {
    background: #d1fae5;
    border-color: #6ee7b7;
    color: #065f46;
}

.status-toggle-group input:checked + label.draft-lbl {
    background: #f1f5f9;
    border-color: #94a3b8;
    color: #475569;
}

/* Character counter */
.char-counter {
    font-size: 11px;
    color: var(--text-muted);
    text-align: right;
    margin-top: 4px;
}

.char-counter.warn { color: var(--warning); }
.char-counter.over  { color: var(--danger); }

/* Modal buttons */
.btn-cancel {
    padding: 10px 20px;
    border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm);
    background: transparent;
    color: var(--text-muted);
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13.5px;
    font-weight: 600;
    cursor: pointer;
    transition: background var(--transition), color var(--transition);
}

.btn-cancel:hover { background: var(--body-bg); color: var(--text-main); }

.btn-save {
    padding: 10px 24px;
    background: linear-gradient(130deg, var(--primary) 0%, var(--accent) 100%);
    color: #fff;
    border: none;
    border-radius: var(--radius-sm);
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13.5px;
    font-weight: 700;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: box-shadow var(--transition), transform var(--transition);
    box-shadow: 0 4px 14px rgba(14,165,233,.3);
}

.btn-save:hover { transform: translateY(-1px); box-shadow: 0 8px 22px rgba(14,165,233,.4); }
.btn-save:active { transform: translateY(0); }

/* Delete modal */
.delete-modal-body {
    padding: 32px 28px;
    text-align: center;
}

.delete-modal-body .del-icon {
    width: 68px; height: 68px;
    border-radius: 50%;
    background: #fee2e2;
    display: flex; align-items: center; justify-content: center;
    font-size: 28px;
    color: var(--danger);
    margin: 0 auto 18px;
}

.delete-modal-body .del-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 17px;
    font-weight: 800;
    color: var(--text-main);
    margin-bottom: 8px;
}

.delete-modal-body .del-sub {
    font-size: 13.5px;
    color: var(--text-muted);
    line-height: 1.5;
}

.delete-modal-body .del-target {
    display: inline-block;
    margin-top: 10px;
    padding: 6px 14px;
    background: var(--body-bg);
    border: 1.5px solid var(--border-color);
    border-radius: 8px;
    font-size: 13px;
    font-weight: 700;
    color: var(--text-main);
    max-width: 260px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.btn-danger-am {
    padding: 10px 24px;
    background: var(--danger);
    color: #fff;
    border: none;
    border-radius: var(--radius-sm);
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13.5px;
    font-weight: 700;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: background var(--transition), box-shadow var(--transition);
}

.btn-danger-am:hover { background: #dc2626; box-shadow: 0 6px 20px rgba(239,68,68,.35); }

/* ---- Responsive ---- */
@media (max-width: 767.98px) {
    .berita-grid { grid-template-columns: 1fr; }
    .berita-stats { gap: 8px; }
    .bs-item { min-width: 120px; }
    .berita-toolbar { flex-direction: column; align-items: stretch; }
    .search-wrap { min-width: 0; }
    .am-modal .modal-dialog { margin: 12px; }
    .am-modal .modal-body { padding: 20px 18px 8px; }
    .am-modal .modal-footer { padding: 12px 18px 20px; }
}

/* =========================================================
   PAGINATION BERITA
========================================================= */
/* =========================================================
   PAGINATION BERITA
========================================================= */

.berita-pagination{
    margin-top: 24px;
    padding: 20px 24px;
    background: #fff;
    border: 1px solid #edf1f7;
    border-radius: 20px;

    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    flex-wrap: wrap;

    box-shadow: 0 4px 14px rgba(15,23,42,.04);
}

/* Info kiri */
.berita-pagination .pag-info{
    font-size: 14px;
    font-weight: 600;
    color: #64748b;
}

/* Sembunyikan tulisan bawaan Laravel */
.berita-pagination .small{
    display: none !important;
}

/* nav */
.berita-pagination nav{
    margin-left: auto;
}

/* pagination */
.berita-pagination .pagination{
    margin: 0;
    gap: 10px;
    align-items: center;
}

/* item */
.berita-pagination .page-item{
    list-style: none;
}

/* tombol */
.berita-pagination .page-link{
    width: 46px;
    height: 46px;

    border: none !important;
    border-radius: 14px !important;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #f8fafc;
    color: #334155;

    font-size: 15px;
    font-weight: 700;

    transition: all .2s ease;
    box-shadow: none !important;
}

/* hover */
.berita-pagination .page-link:hover{
    background: #2563eb;
    color: #fff;
    transform: translateY(-2px);
}

/* active */
.berita-pagination .active .page-link{
    background: linear-gradient(135deg,#2563eb,#1d4ed8);
    color: #fff;
    box-shadow: 0 10px 20px rgba(37,99,235,.25) !important;
}

/* disabled */
.berita-pagination .disabled .page-link{
    background: #f1f5f9;
    color: #94a3b8;
    opacity: .7;
}

/* icon */
.berita-pagination svg{
    width: 16px !important;
    height: 16px !important;
}

/* mobile */
@media(max-width:768px){

    .berita-pagination{
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    .berita-pagination nav{
        margin-left: 0;
    }

    .berita-pagination .pagination{
        justify-content: center;
        flex-wrap: wrap;
    }
}
</style>
@endpush

@section('content')

{{-- ================================================================
     PAGE HEADER
================================================================ --}}
<div class="page-header">
    <div class="page-header-left">
        <div class="ph-title">Manajemen Berita</div>
        <div class="ph-sub">Kelola semua artikel & berita klinik Allam Medica</div>
    </div>
    <button
        class="btn-primary-am"
        data-bs-toggle="modal"
        data-bs-target="#modalTambah"
    >
        <i class="fa-solid fa-plus"></i>
        Tambah Berita
    </button>
</div>

{{-- ================================================================
     STATS STRIP
================================================================ --}}
<div class="berita-stats">
    
    <div class="bs-item">
        <div class="bs-icon" style="background:#e0f2fe;color:#0284c7;">
            <i class="fa-solid fa-newspaper"></i>
        </div>

        <div class="bs-info">
            <div class="bs-val">{{ $berita->total() }}</div>
            <div class="bs-lbl">Total Berita</div>
        </div>
    </div>

    <div class="bs-item">
        <div class="bs-icon" style="background:#d1fae5;color:#059669;">
            <i class="fa-solid fa-circle-check"></i>
        </div>

        <div class="bs-info">
            <div class="bs-val">{{ $totalPublished }}</div>
            <div class="bs-lbl">Dipublikasikan</div>
        </div>
    </div>

    <div class="bs-item">
        <div class="bs-icon" style="background:#f1f5f9;color:#64748b;">
            <i class="fa-solid fa-file-pen"></i>
        </div>

        <div class="bs-info">
            <div class="bs-val">{{ $totalDraft }}</div>
            <div class="bs-lbl">Draft</div>
        </div>
    </div>

    <div class="bs-item">
        <div class="bs-icon" style="background:#fef3c7;color:#d97706;">
            <i class="fa-regular fa-eye"></i>
        </div>

        <div class="bs-info">
            <div class="bs-val">{{ number_format($totalViews) }}</div>
            <div class="bs-lbl">Total Tayangan</div>
        </div>
    </div>

</div>
{{-- ================================================================
     TOOLBAR
================================================================ --}}
<div class="berita-toolbar">
    {{-- Search --}}
    <div class="search-wrap">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input
            type="search"
            class="search-input"
            id="searchBerita"
            placeholder="Cari judul berita..."
            value="{{ request('search') }}"
        >
    </div>

    {{-- Filter status --}}
    <select class="filter-select" id="filterStatus">
        <option value="">Semua Status</option>
        <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Dipublikasikan</option>
        <option value="draft"     {{ request('status') === 'draft'     ? 'selected' : '' }}>Draft</option>
    </select>

    {{-- Sort --}}
    <select class="filter-select" id="filterSort">
        <option value="newest">Terbaru</option>
        <option value="oldest">Terlama</option>
        <option value="popular">Terpopuler</option>
    </select>

    {{-- View toggle --}}
    <div style="display:flex;gap:4px;">
        <button class="topbar-btn active" id="viewGrid" title="Grid View" style="background:var(--primary-light);color:var(--primary);">
            <i class="fa-solid fa-grip"></i>
        </button>
        <button class="topbar-btn" id="viewList" title="List View">
            <i class="fa-solid fa-list"></i>
        </button>
    </div>
</div>

<div class="berita-grid" id="beritaGrid">

    @php
    // Dummy data — ganti dengan $berita dari controller
    $beritaDummy = [
        [
            'id'      => 1,
            'judul'   => 'Pelayanan Poli Gigi Kini Lebih Lengkap dengan Peralatan Modern',
            'deskripsi'=> 'Klinik Allam Medica kini hadir dengan fasilitas poli gigi yang telah diperbarui. Kami menghadirkan peralatan dental terbaru untuk memberikan pelayanan terbaik kepada pasien.',
            'gambar'  => null,
            'status'  => 'published',
            'tanggal' => '02 Mei 2025',
            'views'   => 312,
        ],
        [
            'id'      => 2,
            'judul'   => 'Jadwal Dokter Spesialis Bulan Mei 2025',
            'deskripsi'=> 'Informasi lengkap mengenai jadwal praktik dokter spesialis yang tersedia di klinik kami sepanjang bulan Mei 2025. Segera buat janji temu Anda.',
            'gambar'  => null,
            'status'  => 'published',
            'tanggal' => '01 Mei 2025',
            'views'   => 287,
        ],
        [
            'id'      => 3,
            'judul'   => 'Program Pemeriksaan Kesehatan Gratis untuk Masyarakat',
            'deskripsi'=> 'Dalam rangka HUT klinik, kami menyelenggarakan program pemeriksaan kesehatan gratis meliputi cek gula darah, tekanan darah, dan konsultasi dokter umum.',
            'gambar'  => null,
            'status'  => 'published',
            'tanggal' => '29 Apr 2025',
            'views'   => 198,
        ],
        [
            'id'      => 4,
            'judul'   => 'Pengumuman Libur Nasional: Jadwal Operasional Klinik',
            'deskripsi'=> 'Sehubungan dengan hari raya nasional, klinik Allam Medica menyesuaikan jam operasional. Pasien diharapkan menghubungi kami sebelum berkunjung.',
            'gambar'  => null,
            'status'  => 'draft',
            'tanggal' => '28 Apr 2025',
            'views'   => 145,
        ],
        [
            'id'      => 5,
            'judul'   => 'Penambahan Layanan Laboratorium Klinik Terbaru',
            'deskripsi'=> 'Allam Medica kini melayani pemeriksaan laboratorium lengkap dengan hasil cepat dan akurat. Tersedia pemeriksaan darah lengkap, urin, dan berbagai panel kesehatan.',
            'gambar'  => null,
            'status'  => 'published',
            'tanggal' => '25 Apr 2025',
            'views'   => 234,
        ],
        [
            'id'      => 6,
            'judul'   => 'Tips Menjaga Kesehatan di Musim Hujan',
            'deskripsi'=> 'Musim hujan tiba, yuk jaga kesehatan! Tim dokter Allam Medica berbagi tips praktis untuk menjaga imunitas tubuh dan menghindari penyakit musiman.',
            'gambar'  => null,
            'status'  => 'draft',
            'tanggal' => '22 Apr 2025',
            'views'   => 89,
        ],
    ];

    $listBerita = isset($berita) ? $berita->items() : $beritaDummy;
    @endphp

    @forelse($listBerita as $item)
    <div class="berita-card" data-id="{{ $item['id'] ?? $item->id }}">

        {{-- Image --}}
        <div class="bc-img-wrap">
            @if(!empty($item['gambar'] ?? $item->gambar ?? null))
                <img
                    src="{{ asset('storage/' . ($item['gambar'] ?? $item->gambar)) }}"
                    alt="{{ $item['judul'] ?? $item->judul }}"
                    loading="lazy"
                >
            @else
                <div class="bc-img-placeholder">
                    <i class="fa-regular fa-image"></i>
                </div>
            @endif

            {{-- Status badge --}}
            @php $status = $item['status'] ?? $item->status ?? 'draft'; @endphp
            <span class="bc-badge {{ $status }}">
                {{ $status === 'published' ? 'Dipublikasikan' : 'Draft' }}
            </span>
        </div>

        {{-- Body --}}
        <div class="bc-body">
            <div class="bc-date">
                <i class="fa-regular fa-calendar"></i>
                {{ $item['tanggal'] ?? ($item->created_at?->format('d M Y') ?? '-') }}
            </div>
            <div class="bc-title">{{ $item['judul'] ?? $item->judul }}</div>
            <div class="bc-desc">{{ $item['deskripsi'] ?? $item->deskripsi }}</div>
        </div>

        {{-- Footer --}}
        <div class="bc-footer">
            <div class="bc-views">
                <i class="fa-regular fa-eye"></i>
                {{ number_format($item['views'] ?? $item->views ?? 0) }} tayangan
            </div>
            <div class="bc-actions">
                {{-- Edit --}}
                <button
                    class="btn-icon-sm btn-edit"
                    title="Edit berita"
                    onclick="openEditModal(
                        '{{ $item['id'] ?? $item->id }}',
                        `{{ addslashes($item['judul'] ?? $item->judul) }}`,
                        `{{ addslashes($item['deskripsi'] ?? $item->deskripsi) }}`,
                        '{{ $item['gambar'] ?? $item->gambar ?? '' }}',
                        '{{ $item['status'] ?? $item->status ?? 'draft' }}'
                    )"
                >
                    <i class="fa-solid fa-pen"></i>
                </button>

                {{-- Delete --}}
                <button
                    class="btn-icon-sm btn-delete"
                    title="Hapus berita"
                    onclick="openDeleteModal(
                        '{{ $item['id'] ?? $item->id }}',
                        `{{ addslashes($item['judul'] ?? $item->judul) }}`
                    )"
                >
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
        </div>
    </div>
    @empty
    <div class="empty-state">
        <div class="es-icon"><i class="fa-regular fa-newspaper"></i></div>
        <div class="es-title">Belum Ada Berita</div>
        <div class="es-sub">Mulai tambahkan berita pertama untuk klinik Allam Medica.</div>
        <button class="btn-primary-am" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fa-solid fa-plus"></i> Tambah Berita Pertama
        </button>
    </div>
    @endforelse

</div>

{{-- ================================================================
     PAGINATION
================================================================ --}}
@if(isset($berita) && $berita->hasPages())
<div class="berita-pagination">
    <div class="pag-info">
        Menampilkan {{ $berita->firstItem() }}–{{ $berita->lastItem() }}
        dari {{ $berita->total() }} berita
    </div>
    {{ $berita->withQueryString()->links() }}
</div>
@endif


{{-- ================================================================
     MODAL: TAMBAH BERITA
================================================================ --}}
<div class="modal fade am-modal" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">
                    <i class="fa-solid fa-plus"></i>
                    Tambah Berita Baru
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>

            <form
                action="{{ route('admin.berita.store') }}"
                method="POST"
                enctype="multipart/form-data"
                id="formTambah"
            >
                @csrf

                <div class="modal-body">

                    {{-- Judul --}}
                    <div class="modal-form-group">
                        <div class="mfg-label">
                            <i class="fa-solid fa-heading" style="color:var(--primary);font-size:12px;"></i>
                            Judul Berita <span class="req">*</span>
                        </div>
                        <input
                            type="text"
                            name="judul"
                            class="mfg-input"
                            id="tambahJudul"
                            placeholder="Masukkan judul berita yang menarik..."
                            maxlength="150"
                            required
                        >
                        <div class="char-counter" id="judulCounter">0 / 150</div>
                    </div>

                    {{-- Gambar --}}
                    <div class="modal-form-group">
                        <div class="mfg-label">
                            <i class="fa-solid fa-image" style="color:var(--primary);font-size:12px;"></i>
                            Gambar Berita
                        </div>

                        {{-- Preview --}}
                        <div class="img-preview-wrap" id="tambahPreviewWrap">
                            <img src="" id="tambahPreviewImg" alt="Preview">
                            <button type="button" class="img-preview-remove" onclick="removeImage('tambah')" title="Hapus gambar">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>

                        {{-- Upload zone --}}
                        <div class="img-upload-zone" id="tambahUploadZone">
                            <input
                                type="file"
                                name="gambar"
                                id="tambahGambar"
                                accept="image/jpeg,image/png,image/webp"
                                onchange="previewImage(this, 'tambah')"
                            >
                            <div class="iuz-icon">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                            </div>
                            <div class="iuz-title">Klik atau seret gambar ke sini</div>
                            <div class="iuz-sub">JPG, PNG, WebP — Maks. 2 MB</div>
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="modal-form-group">
                        <div class="mfg-label">
                            <i class="fa-solid fa-align-left" style="color:var(--primary);font-size:12px;"></i>
                            Deskripsi / Konten <span class="req">*</span>
                        </div>
                        <textarea
                            name="deskripsi"
                            class="mfg-textarea"
                            id="tambahDeskripsi"
                            placeholder="Tulis konten berita di sini..."
                            maxlength="5000"
                            required
                        ></textarea>
                        <div class="char-counter" id="deskripsiCounter">0 / 5000</div>
                    </div>

                    {{-- Status --}}
                    <div class="modal-form-group">
                        <div class="mfg-label">
                            <i class="fa-solid fa-toggle-on" style="color:var(--primary);font-size:12px;"></i>
                            Status Publikasi
                        </div>
                        <div class="status-toggle-group">
                            <input type="radio" name="status" id="statusPublished" value="published" checked>
                            <label for="statusPublished" class="published-lbl">
                                <i class="fa-solid fa-circle-check"></i> Publikasikan
                            </label>

                            <input type="radio" name="status" id="statusDraft" value="draft">
                            <label for="statusDraft" class="draft-lbl">
                                <i class="fa-solid fa-file-pen"></i> Simpan Draft
                            </label>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Batal
                    </button>
                    <button type="submit" class="btn-save">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Berita
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>


{{-- ================================================================
     MODAL: EDIT BERITA
================================================================ --}}
<div class="modal fade am-modal" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header" style="background:linear-gradient(135deg, #1e3a5f 0%, #0ea5e9 100%);">
                <h5 class="modal-title" id="modalEditLabel">
                    <i class="fa-solid fa-pen-to-square"></i>
                    Edit Berita
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>

            <form
                action=""
                method="POST"
                enctype="multipart/form-data"
                id="formEdit"
            >
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="editId">

                <div class="modal-body">

                    {{-- Judul --}}
                    <div class="modal-form-group">
                        <div class="mfg-label">
                            <i class="fa-solid fa-heading" style="color:var(--primary);font-size:12px;"></i>
                            Judul Berita <span class="req">*</span>
                        </div>
                        <input
                            type="text"
                            name="judul"
                            class="mfg-input"
                            id="editJudul"
                            placeholder="Masukkan judul berita..."
                            maxlength="150"
                            required
                        >
                        <div class="char-counter" id="editJudulCounter">0 / 150</div>
                    </div>

                    {{-- Gambar --}}
                    <div class="modal-form-group">
                        <div class="mfg-label">
                            <i class="fa-solid fa-image" style="color:var(--primary);font-size:12px;"></i>
                            Gambar Berita
                        </div>
                        <div style="font-size:12px;color:var(--text-muted);margin-bottom:8px;">
                            <i class="fa-solid fa-circle-info" style="color:var(--primary);"></i>
                            Biarkan kosong jika tidak ingin mengganti gambar.
                        </div>

                        {{-- Current image --}}
                        <div class="img-preview-wrap" id="editCurrentWrap">
                            <img src="" id="editCurrentImg" alt="Gambar saat ini">
                            <button type="button" class="img-preview-remove" onclick="removeImage('edit')" title="Hapus gambar">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>

                        {{-- Upload zone --}}
                        <div class="img-upload-zone" id="editUploadZone">
                            <input
                                type="file"
                                name="gambar"
                                id="editGambar"
                                accept="image/jpeg,image/png,image/webp"
                                onchange="previewImage(this, 'edit')"
                            >
                            <div class="iuz-icon">
                                <i class="fa-solid fa-arrow-up-from-bracket"></i>
                            </div>
                            <div class="iuz-title">Ganti gambar</div>
                            <div class="iuz-sub">JPG, PNG, WebP — Maks. 2 MB</div>
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="modal-form-group">
                        <div class="mfg-label">
                            <i class="fa-solid fa-align-left" style="color:var(--primary);font-size:12px;"></i>
                            Deskripsi / Konten <span class="req">*</span>
                        </div>
                        <textarea
                            name="deskripsi"
                            class="mfg-textarea"
                            id="editDeskripsi"
                            placeholder="Tulis konten berita..."
                            maxlength="5000"
                            required
                        ></textarea>
                        <div class="char-counter" id="editDeskripsiCounter">0 / 5000</div>
                    </div>

                    {{-- Status --}}
                    <div class="modal-form-group">
                        <div class="mfg-label">
                            <i class="fa-solid fa-toggle-on" style="color:var(--primary);font-size:12px;"></i>
                            Status Publikasi
                        </div>
                        <div class="status-toggle-group">
                            <input type="radio" name="status" id="editStatusPublished" value="published">
                            <label for="editStatusPublished" class="published-lbl">
                                <i class="fa-solid fa-circle-check"></i> Publikasikan
                            </label>

                            <input type="radio" name="status" id="editStatusDraft" value="draft">
                            <label for="editStatusDraft" class="draft-lbl">
                                <i class="fa-solid fa-file-pen"></i> Simpan Draft
                            </label>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Batal
                    </button>
                    <button type="submit" class="btn-save">
                        <i class="fa-solid fa-floppy-disk"></i> Perbarui Berita
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>


{{-- ================================================================
     MODAL: HAPUS BERITA
================================================================ --}}
<div class="modal fade am-modal" id="modalHapus" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width:420px;">
        <div class="modal-content">

            <div class="modal-header" style="background:linear-gradient(135deg, #7f1d1d 0%, #ef4444 100%);">
                <h5 class="modal-title" id="modalHapusLabel">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    Konfirmasi Hapus
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>

            <form action="" method="POST" id="formHapus">
                @csrf
                @method('DELETE')

                <div class="delete-modal-body">
                    <div class="del-icon">
                        <i class="fa-solid fa-trash-can"></i>
                    </div>
                    <div class="del-title">Hapus Berita Ini?</div>
                    <div class="del-sub">
                        Tindakan ini tidak dapat dibatalkan. Berita berikut akan dihapus secara permanen:
                    </div>
                    <div class="del-target" id="deleteTargetTitle">—</div>
                </div>

                <div class="modal-footer" style="justify-content:center;gap:12px;">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Tidak, Batal
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
   BERITA PAGE — JavaScript
============================================================ */

/* ---- Character counter ---- */
function initCharCounter(inputId, counterId, max) {
    const el = document.getElementById(inputId);
    const ct = document.getElementById(counterId);
    if (!el || !ct) return;

    function update() {
        const len = el.value.length;
        ct.textContent = `${len.toLocaleString('id-ID')} / ${max.toLocaleString('id-ID')}`;
        ct.className = 'char-counter' +
            (len > max * .9 ? (len >= max ? ' over' : ' warn') : '');
    }

    el.addEventListener('input', update);
    update();
}

initCharCounter('tambahJudul',     'judulCounter',      150);
initCharCounter('tambahDeskripsi', 'deskripsiCounter',  5000);
initCharCounter('editJudul',       'editJudulCounter',  150);
initCharCounter('editDeskripsi',   'editDeskripsiCounter', 5000);

/* ---- Image preview ---- */
function previewImage(input, prefix) {
    const file = input.files[0];
    if (!file) return;

    // 2 MB limit
    if (file.size > 2 * 1024 * 1024) {
        alert('Ukuran file terlalu besar. Maksimal 2 MB.');
        input.value = '';
        return;
    }

    const reader = new FileReader();
    reader.onload = function (e) {
        const previewWrap = document.getElementById(prefix + (prefix === 'tambah' ? 'PreviewWrap' : 'CurrentWrap'));
        const previewImg  = document.getElementById(prefix + (prefix === 'tambah' ? 'PreviewImg'  : 'CurrentImg'));
        const uploadZone  = document.getElementById(prefix + 'UploadZone');

        previewImg.src = e.target.result;
        previewWrap.classList.add('show');
        uploadZone.style.display = 'none';
    };
    reader.readAsDataURL(file);
}

function removeImage(prefix) {
    const previewWrap = document.getElementById(prefix + (prefix === 'tambah' ? 'PreviewWrap' : 'CurrentWrap'));
    const previewImg  = document.getElementById(prefix + (prefix === 'tambah' ? 'PreviewImg'  : 'CurrentImg'));
    const uploadZone  = document.getElementById(prefix + 'UploadZone');
    const fileInput   = document.getElementById(prefix + 'Gambar');

    previewImg.src = '';
    previewWrap.classList.remove('show');
    uploadZone.style.display = '';
    fileInput.value = '';
}

/* ---- Drag & drop ---- */
['tambah', 'edit'].forEach(function (prefix) {
    const zone = document.getElementById(prefix + 'UploadZone');
    if (!zone) return;

    zone.addEventListener('dragover', function (e) {
        e.preventDefault();
        zone.classList.add('dragover');
    });

    zone.addEventListener('dragleave', function () {
        zone.classList.remove('dragover');
    });

    zone.addEventListener('drop', function (e) {
        e.preventDefault();
        zone.classList.remove('dragover');
        const inputEl = zone.querySelector('input[type="file"]');
        if (e.dataTransfer.files.length) {
            inputEl.files = e.dataTransfer.files;
            previewImage(inputEl, prefix);
        }
    });
});

/* ---- Open EDIT modal ---- */
function openEditModal(id, judul, deskripsi, gambar, status) {
    document.getElementById('editId').value      = id;
    document.getElementById('editJudul').value   = judul;
    document.getElementById('editDeskripsi').value = deskripsi;

    // Update form action
    document.getElementById('formEdit').action =
        '{{ url("admin/berita") }}/' + id;

    // Status radio
    const radioPublished = document.getElementById('editStatusPublished');
    const radioDraft     = document.getElementById('editStatusDraft');
    radioPublished.checked = (status === 'published');
    radioDraft.checked     = (status === 'draft');

    // Existing image
    const previewWrap = document.getElementById('editCurrentWrap');
    const previewImg  = document.getElementById('editCurrentImg');
    const uploadZone  = document.getElementById('editUploadZone');

    if (gambar && gambar.trim() !== '') {
        previewImg.src = '/storage/' + gambar;
        previewWrap.classList.add('show');
        uploadZone.style.display = 'none';
    } else {
        previewImg.src = '';
        previewWrap.classList.remove('show');
        uploadZone.style.display = '';
    }

    // Trigger char counters
    document.getElementById('editJudul').dispatchEvent(new Event('input'));
    document.getElementById('editDeskripsi').dispatchEvent(new Event('input'));

    // Show modal
    new bootstrap.Modal(document.getElementById('modalEdit')).show();
}

/* ---- Open DELETE modal ---- */
function openDeleteModal(id, judul) {
    document.getElementById('formHapus').action    = '{{ url("admin/berita") }}/' + id;
    document.getElementById('deleteTargetTitle').textContent = judul;
    new bootstrap.Modal(document.getElementById('modalHapus')).show();
}

/* ---- Reset tambah modal on close ---- */
document.getElementById('modalTambah').addEventListener('hidden.bs.modal', function () {
    document.getElementById('formTambah').reset();
    removeImage('tambah');
    ['judulCounter', 'deskripsiCounter'].forEach(function (id) {
        const el = document.getElementById(id);
        if (el) el.textContent = '0 / ' + (id.includes('judul') ? '150' : '5.000');
    });
});

/* ---- Live search (client-side demo) ---- */
document.getElementById('searchBerita').addEventListener('input', function () {
    const q = this.value.toLowerCase();
    document.querySelectorAll('.berita-card').forEach(function (card) {
        const title = card.querySelector('.bc-title')?.textContent.toLowerCase() || '';
        const desc  = card.querySelector('.bc-desc')?.textContent.toLowerCase()  || '';
        card.style.display = (title.includes(q) || desc.includes(q)) ? '' : 'none';
    });
});

/* ---- View toggle (grid / list) ---- */
document.getElementById('viewGrid').addEventListener('click', function () {
    document.getElementById('beritaGrid').style.gridTemplateColumns = '';
    this.style.background = 'var(--primary-light)';
    this.style.color = 'var(--primary)';
    document.getElementById('viewList').style.background = '';
    document.getElementById('viewList').style.color = '';
});

document.getElementById('viewList').addEventListener('click', function () {
    document.getElementById('beritaGrid').style.gridTemplateColumns = '1fr';
    this.style.background = 'var(--primary-light)';
    this.style.color = 'var(--primary)';
    document.getElementById('viewGrid').style.background = '';
    document.getElementById('viewGrid').style.color = '';
});
</script>
@endpush
