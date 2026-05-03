@extends('admin.layout')

@section('title', 'Manajemen Banner')
@section('page-title', 'Banner')

@section('breadcrumb')
    <li class="breadcrumb-item active">Manajemen Banner</li>
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
    font-size: 20px; font-weight: 800;
    color: var(--text-main); letter-spacing: -.3px;
}
.page-header-left .ph-sub {
    font-size: 13px; color: var(--text-muted); margin-top: 3px;
}

/* ---- Stats strip ---- */
.banner-stats {
    display: flex; gap: 12px;
    margin-bottom: 24px; flex-wrap: wrap;
}
.bs-item {
    flex: 1; min-width: 140px;
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: var(--radius);
    padding: 16px 20px;
    display: flex; align-items: center; gap: 14px;
    box-shadow: var(--shadow-sm);
    transition: box-shadow var(--transition), transform var(--transition);
}
.bs-item:hover { box-shadow: var(--shadow-md); transform: translateY(-2px); }
.bs-icon {
    width: 42px; height: 42px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 16px; flex-shrink: 0;
}
.bs-info .bs-val {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 22px; font-weight: 800;
    color: var(--text-main); line-height: 1;
}
.bs-info .bs-lbl { font-size: 12px; color: var(--text-muted); margin-top: 3px; font-weight: 500; }

/* ---- Toolbar ---- */
.banner-toolbar {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: var(--radius);
    padding: 16px 20px;
    display: flex; align-items: center; gap: 12px;
    margin-bottom: 20px; flex-wrap: wrap;
    box-shadow: var(--shadow-sm);
}
.search-wrap { position: relative; flex: 1; min-width: 200px; }
.search-wrap i {
    position: absolute; left: 14px; top: 50%;
    transform: translateY(-50%);
    color: var(--text-muted); font-size: 13px; pointer-events: none;
}
.search-input {
    width: 100%; padding: 9px 14px 9px 38px;
    border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm);
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13.5px; color: var(--text-main);
    outline: none; background: var(--body-bg);
    transition: border-color var(--transition), box-shadow var(--transition);
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
    font-size: 13px; color: var(--text-main);
    outline: none; background: var(--body-bg);
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%2364748b' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
    background-repeat: no-repeat; background-position: right 12px center;
    cursor: pointer; transition: border-color var(--transition);
}
.filter-select:focus { border-color: var(--primary); outline: none; }

/* ---- Info note ---- */
.banner-note {
    background: #eff6ff;
    border: 1.5px solid #bfdbfe;
    border-radius: var(--radius-sm);
    padding: 12px 16px;
    display: flex; align-items: flex-start; gap: 10px;
    margin-bottom: 20px;
    font-size: 13px; color: #1e40af; line-height: 1.5;
}
.banner-note i { color: #3b82f6; margin-top: 1px; flex-shrink: 0; font-size: 14px; }

/* ---- Cards grid ---- */
.banner-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 20px;
}

/* ---- Banner card ---- */
.banner-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: box-shadow var(--transition), transform var(--transition);
    display: flex; flex-direction: column;
    animation: cardIn .35s ease both;
}
@keyframes cardIn {
    from { opacity: 0; transform: translateY(14px); }
    to   { opacity: 1; transform: translateY(0); }
}
.banner-card:nth-child(1) { animation-delay: .04s; }
.banner-card:nth-child(2) { animation-delay: .08s; }
.banner-card:nth-child(3) { animation-delay: .12s; }
.banner-card:nth-child(4) { animation-delay: .16s; }
.banner-card:hover { box-shadow: 0 8px 32px rgba(14,165,233,.14); transform: translateY(-3px); }

/* Image area — landscape ratio 16:6 untuk banner */
.bc-img-wrap {
    position: relative; overflow: hidden;
    aspect-ratio: 16 / 6;
    background: var(--body-bg); flex-shrink: 0;
}
.bc-img-wrap img {
    width: 100%; height: 100%; object-fit: cover;
    transition: transform .4s ease;
}
.banner-card:hover .bc-img-wrap img { transform: scale(1.04); }
.bc-img-placeholder {
    width: 100%; height: 100%;
    display: flex; align-items: center; justify-content: center;
    background: linear-gradient(135deg, #e0f2fe, #cffafe);
    color: var(--primary); font-size: 40px;
}

/* Slide order badge */
.bc-order-badge {
    position: absolute; top: 10px; left: 10px;
    width: 30px; height: 30px; border-radius: 8px;
    background: rgba(12,26,46,.75);
    backdrop-filter: blur(8px);
    display: flex; align-items: center; justify-content: center;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px; font-weight: 800; color: #fff;
}

/* Status badge */
.bc-badge {
    position: absolute; top: 10px; right: 10px;
    font-size: 10px; font-weight: 700;
    text-transform: uppercase; letter-spacing: .8px;
    padding: 4px 10px; border-radius: 20px;
    backdrop-filter: blur(8px);
}
.bc-badge.active   { background: rgba(16,185,129,.85); color: #fff; }
.bc-badge.inactive { background: rgba(100,116,139,.8);  color: #fff; }

/* Slide indicator dots */
.bc-slide-indicator {
    position: absolute; bottom: 10px; left: 50%;
    transform: translateX(-50%);
    display: flex; gap: 5px;
}
.bc-slide-dot {
    width: 6px; height: 6px; border-radius: 50%;
    background: rgba(255,255,255,.4);
}
.bc-slide-dot.active { background: #fff; width: 18px; border-radius: 3px; }

/* Body */
.bc-body { padding: 16px 20px; flex: 1; display: flex; flex-direction: column; }

.bc-order-row {
    display: flex; align-items: center; gap: 8px;
    margin-bottom: 8px;
}
.bc-order-label {
    font-size: 11px; font-weight: 700;
    color: var(--text-muted); text-transform: uppercase; letter-spacing: .7px;
}
.bc-order-num {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 11px; font-weight: 800;
    background: var(--primary-light); color: var(--primary-dark);
    padding: 2px 8px; border-radius: 20px;
}

.bc-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 14.5px; font-weight: 700;
    color: var(--text-main); line-height: 1.4;
    margin-bottom: 6px;
    display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;
}
.bc-caption {
    font-size: 12.5px; color: var(--text-muted); line-height: 1.5;
    flex: 1;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
    margin-bottom: 12px;
}

/* Link badge */
.bc-link-badge {
    display: inline-flex; align-items: center; gap: 5px;
    font-size: 11.5px; font-weight: 600; color: var(--primary);
    background: var(--primary-light); padding: 4px 10px;
    border-radius: 20px; text-decoration: none;
    max-width: 100%; overflow: hidden; text-overflow: ellipsis;
    white-space: nowrap; border: 1px solid rgba(14,165,233,.2);
    transition: background var(--transition);
}
.bc-link-badge:hover { background: #bae6fd; color: var(--primary-dark); }
.bc-link-none {
    display: inline-flex; align-items: center; gap: 5px;
    font-size: 11.5px; color: var(--text-muted);
    font-style: italic;
}

/* Period */
.bc-period {
    display: flex; align-items: center; gap: 6px;
    font-size: 11.5px; color: var(--text-muted);
    margin-top: 8px;
}
.bc-period i { font-size: 10px; }

/* Footer */
.bc-footer {
    display: flex; align-items: center; justify-content: space-between;
    padding: 12px 20px;
    border-top: 1px solid var(--border-color);
    background: #fafbff;
}
.bc-meta { font-size: 12px; color: var(--text-muted); display: flex; align-items: center; gap: 6px; }
.bc-actions { display: flex; gap: 6px; }

/* Drag handle */
.bc-drag-handle {
    position: absolute; top: 10px; left: 50%;
    transform: translateX(-50%);
    color: rgba(255,255,255,.5);
    font-size: 12px; cursor: grab;
    padding: 4px 8px;
    background: rgba(0,0,0,.3);
    border-radius: 6px;
    backdrop-filter: blur(6px);
    opacity: 0;
    transition: opacity var(--transition);
}
.bc-img-wrap:hover .bc-drag-handle { opacity: 1; }

/* ---- Empty state ---- */
.empty-state {
    grid-column: 1 / -1; padding: 64px 24px; text-align: center; color: var(--text-muted);
}
.empty-state .es-icon {
    width: 72px; height: 72px; border-radius: 20px;
    background: var(--primary-light);
    display: flex; align-items: center; justify-content: center;
    font-size: 28px; color: var(--primary); margin: 0 auto 16px;
}
.empty-state .es-title { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 16px; font-weight: 700; color: var(--text-main); margin-bottom: 6px; }
.empty-state .es-sub   { font-size: 13.5px; color: var(--text-muted); margin-bottom: 20px; }

/* ============================================================
   MODAL
============================================================ */
.am-modal .modal-dialog { max-width: 660px; }
.am-modal .modal-content {
    border: none; border-radius: var(--radius);
    box-shadow: 0 24px 64px rgba(0,0,0,.18); overflow: hidden;
}
.am-modal .modal-header {
    background: linear-gradient(135deg, var(--sidebar-bg) 0%, #1e3a5f 100%);
    padding: 18px 24px; border: none;
}
.am-modal .modal-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 15px; font-weight: 700; color: #fff;
    display: flex; align-items: center; gap: 10px;
}
.am-modal .modal-title i {
    width: 30px; height: 30px; border-radius: 8px;
    background: rgba(255,255,255,.12);
    display: flex; align-items: center; justify-content: center; font-size: 13px;
}
.am-modal .btn-close { filter: invert(1) brightness(2); opacity: .7; }
.am-modal .btn-close:hover { opacity: 1; }
.am-modal .modal-body    { padding: 28px 28px 8px; }
.am-modal .modal-footer  { padding: 16px 28px 24px; border: none; gap: 10px; }

/* Form groups */
.modal-form-group { margin-bottom: 20px; }
.modal-form-group:last-child { margin-bottom: 0; }
.mfg-label {
    font-size: 12.5px; font-weight: 700;
    color: var(--text-main); margin-bottom: 6px;
    display: flex; align-items: center; gap: 6px;
}
.mfg-label .req { color: #ef4444; font-size: 13px; }
.mfg-label .opt { color: var(--text-muted); font-size: 11px; font-weight: 500; }

.mfg-input, .mfg-textarea, .mfg-select {
    width: 100%; padding: 10px 14px;
    border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm);
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13.5px; color: var(--text-main);
    outline: none; background: var(--body-bg);
    transition: border-color var(--transition), box-shadow var(--transition), background var(--transition);
}
.mfg-input:focus, .mfg-textarea:focus, .mfg-select:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(14,165,233,.12);
    background: #fff;
}
.mfg-textarea { min-height: 90px; resize: vertical; line-height: 1.6; }

/* Row 2 cols */
.mfg-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
@media (max-width: 575px) { .mfg-row { grid-template-columns: 1fr; } }

/* Input with icon */
.mfg-input-wrap { position: relative; }
.mfg-input-wrap i {
    position: absolute; left: 13px; top: 50%;
    transform: translateY(-50%);
    color: var(--text-muted); font-size: 13px; pointer-events: none;
}
.mfg-input-wrap .mfg-input { padding-left: 36px; }

/* Image upload zone */
.img-upload-zone {
    border: 2px dashed var(--border-color);
    border-radius: var(--radius-sm);
    padding: 28px 20px; text-align: center;
    cursor: pointer;
    transition: border-color var(--transition), background var(--transition);
    background: var(--body-bg); position: relative; overflow: hidden;
}
.img-upload-zone:hover, .img-upload-zone.dragover {
    border-color: var(--primary); background: var(--primary-light);
}
.img-upload-zone input[type="file"] {
    position: absolute; inset: 0; opacity: 0;
    cursor: pointer; width: 100%; height: 100%;
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
.iuz-hint  {
    display: inline-flex; align-items: center; gap: 5px;
    margin-top: 8px; font-size: 11.5px; color: var(--primary);
    background: rgba(14,165,233,.1); padding: 3px 10px; border-radius: 20px;
}

/* Preview */
.img-preview-wrap { position: relative; border-radius: var(--radius-sm); overflow: hidden; border: 1.5px solid var(--border-color); display: none; }
.img-preview-wrap.show { display: block; }
.img-preview-wrap img { width: 100%; height: 160px; object-fit: cover; display: block; }
.img-preview-remove {
    position: absolute; top: 8px; right: 8px;
    width: 28px; height: 28px; border-radius: 8px;
    background: rgba(0,0,0,.55); color: #fff; border: none;
    cursor: pointer; display: flex; align-items: center; justify-content: center;
    font-size: 11px; transition: background var(--transition);
}
.img-preview-remove:hover { background: var(--danger); }
.img-preview-label {
    position: absolute; bottom: 0; left: 0; right: 0;
    background: rgba(12,26,46,.7); backdrop-filter: blur(4px);
    color: #fff; font-size: 11px; font-weight: 600;
    padding: 6px 12px; text-align: center;
    letter-spacing: .5px; text-transform: uppercase;
}

/* Status toggle */
.status-toggle-group { display: flex; gap: 8px; }
.status-toggle-group label {
    flex: 1; display: flex; align-items: center; justify-content: center; gap: 7px;
    padding: 9px 14px;
    border: 1.5px solid var(--border-color); border-radius: var(--radius-sm);
    font-size: 13px; font-weight: 600; cursor: pointer;
    transition: all var(--transition); background: var(--body-bg); color: var(--text-muted);
}
.status-toggle-group input { display: none; }
.status-toggle-group input:checked + label.active-lbl   { background: #d1fae5; border-color: #6ee7b7; color: #065f46; }
.status-toggle-group input:checked + label.inactive-lbl { background: #f1f5f9; border-color: #94a3b8; color: #475569; }

/* Char counter */
.char-counter { font-size: 11px; color: var(--text-muted); text-align: right; margin-top: 4px; }
.char-counter.warn { color: var(--warning); }
.char-counter.over { color: var(--danger); }

/* Buttons */
.btn-cancel {
    padding: 10px 20px; border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm); background: transparent;
    color: var(--text-muted); font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13.5px; font-weight: 600; cursor: pointer;
    transition: background var(--transition), color var(--transition);
}
.btn-cancel:hover { background: var(--body-bg); color: var(--text-main); }
.btn-save {
    padding: 10px 24px;
    background: linear-gradient(130deg, var(--primary) 0%, var(--accent) 100%);
    color: #fff; border: none; border-radius: var(--radius-sm);
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13.5px; font-weight: 700; cursor: pointer;
    display: inline-flex; align-items: center; gap: 8px;
    transition: box-shadow var(--transition), transform var(--transition);
    box-shadow: 0 4px 14px rgba(14,165,233,.3);
}
.btn-save:hover { transform: translateY(-1px); box-shadow: 0 8px 22px rgba(14,165,233,.4); }

/* Delete modal */
.delete-modal-body { padding: 32px 28px; text-align: center; }
.delete-modal-body .del-icon {
    width: 68px; height: 68px; border-radius: 50%;
    background: #fee2e2; display: flex; align-items: center; justify-content: center;
    font-size: 28px; color: var(--danger); margin: 0 auto 18px;
}
.delete-modal-body .del-title { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 17px; font-weight: 800; color: var(--text-main); margin-bottom: 8px; }
.delete-modal-body .del-sub   { font-size: 13.5px; color: var(--text-muted); line-height: 1.5; }
.delete-modal-body .del-target {
    display: inline-block; margin-top: 10px; padding: 6px 14px;
    background: var(--body-bg); border: 1.5px solid var(--border-color);
    border-radius: 8px; font-size: 13px; font-weight: 700; color: var(--text-main);
    max-width: 260px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
}
.btn-danger-am {
    padding: 10px 24px; background: var(--danger); color: #fff; border: none;
    border-radius: var(--radius-sm); font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13.5px; font-weight: 700; cursor: pointer;
    display: inline-flex; align-items: center; gap: 8px;
    transition: background var(--transition), box-shadow var(--transition);
}
.btn-danger-am:hover { background: #dc2626; box-shadow: 0 6px 20px rgba(239,68,68,.35); }

/* Preview slider demo */
.slider-preview-demo {
    background: var(--sidebar-bg);
    border-radius: var(--radius);
    padding: 20px;
    margin-bottom: 24px;
    position: relative;
    overflow: hidden;
}
.slider-preview-demo::before {
    content: '';
    position: absolute; inset: 0;
    background: radial-gradient(ellipse at 20% 50%, rgba(14,165,233,.1), transparent 60%);
}
.spd-label {
    font-size: 11px; font-weight: 700; color: rgba(255,255,255,.4);
    text-transform: uppercase; letter-spacing: 1px; margin-bottom: 12px;
    display: flex; align-items: center; gap: 8px;
}
.spd-label::after {
    content: ''; flex: 1; height: 1px; background: rgba(255,255,255,.08);
}
.spd-track {
    display: flex; gap: 10px; overflow-x: auto;
    padding-bottom: 8px; scrollbar-width: thin; scrollbar-color: rgba(255,255,255,.1) transparent;
}
.spd-track::-webkit-scrollbar { height: 3px; }
.spd-track::-webkit-scrollbar-thumb { background: rgba(255,255,255,.15); border-radius: 2px; }
.spd-slide {
    flex-shrink: 0; width: 120px; height: 60px;
    border-radius: 8px; overflow: hidden; position: relative;
    border: 2px solid transparent;
    transition: border-color var(--transition), transform var(--transition);
    cursor: pointer;
}
.spd-slide:hover, .spd-slide.active {
    border-color: var(--primary); transform: scale(1.04);
}
.spd-slide img { width: 100%; height: 100%; object-fit: cover; }
.spd-slide-placeholder {
    width: 100%; height: 100%;
    background: linear-gradient(135deg, rgba(14,165,233,.2), rgba(6,182,212,.15));
    display: flex; align-items: center; justify-content: center;
    color: rgba(255,255,255,.3); font-size: 20px;
}
.spd-slide-num {
    position: absolute; bottom: 4px; right: 6px;
    font-size: 10px; font-weight: 800; color: rgba(255,255,255,.7);
    font-family: 'Plus Jakarta Sans', sans-serif;
}
.spd-dots {
    display: flex; justify-content: center; gap: 6px; margin-top: 12px;
}
.spd-dot {
    width: 6px; height: 6px; border-radius: 50%;
    background: rgba(255,255,255,.2); cursor: pointer;
    transition: background var(--transition), width var(--transition);
}
.spd-dot.active { background: var(--primary); width: 20px; border-radius: 3px; }

/* Responsive */
@media (max-width: 767.98px) {
    .banner-grid { grid-template-columns: 1fr; }
    .banner-stats { gap: 8px; }
    .bs-item { min-width: 120px; }
    .banner-toolbar { flex-direction: column; align-items: stretch; }
    .am-modal .modal-dialog { margin: 12px; }
    .am-modal .modal-body { padding: 20px 18px 8px; }
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
        <div class="ph-title">Manajemen Banner</div>
        <div class="ph-sub">Kelola banner iklan yang ditampilkan di slider beranda website</div>
    </div>
    <button class="btn-primary-am" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="fa-solid fa-plus"></i>
        Tambah Banner
    </button>
</div>

{{-- ================================================================
     STATS STRIP
================================================================ --}}
<div class="banner-stats">
    <div class="bs-item">
        <div class="bs-icon" style="background:#e0f2fe;color:#0284c7;">
            <i class="fa-regular fa-images"></i>
        </div>
        <div class="bs-info">
            <div class="bs-val">{{ isset($banner) ? $banner->total() : 5 }}</div>
            <div class="bs-lbl">Total Banner</div>
        </div>
    </div>
    <div class="bs-item">
        <div class="bs-icon" style="background:#d1fae5;color:#059669;">
            <i class="fa-solid fa-circle-play"></i>
        </div>
        <div class="bs-info">
            <div class="bs-val">{{ $totalActive ?? 4 }}</div>
            <div class="bs-lbl">Aktif di Slider</div>
        </div>
    </div>
    <div class="bs-item">
        <div class="bs-icon" style="background:#f1f5f9;color:#64748b;">
            <i class="fa-solid fa-circle-pause"></i>
        </div>
        <div class="bs-info">
            <div class="bs-val">{{ $totalInactive ?? 1 }}</div>
            <div class="bs-lbl">Tidak Aktif</div>
        </div>
    </div>
    <div class="bs-item">
        <div class="bs-icon" style="background:#fef3c7;color:#d97706;">
            <i class="fa-solid fa-rotate"></i>
        </div>
        <div class="bs-info">
            <div class="bs-val">{{ $sliderSpeed ?? 5 }}s</div>
            <div class="bs-lbl">Kecepatan Slide</div>
        </div>
    </div>
</div>

{{-- ================================================================
     SLIDER PREVIEW DEMO
================================================================ --}}
@php
$bannerDummy = [
    ['id'=>1,'judul'=>'Promo Kesehatan Gratis','caption'=>'Cek kesehatan gratis setiap Sabtu','gambar'=>null,'link'=>'#promo','urutan'=>1,'status'=>'active','tanggal_mulai'=>'01 Mei 2025','tanggal_selesai'=>'31 Mei 2025'],
    ['id'=>2,'judul'=>'Layanan Poli Spesialis','caption'=>'Dokter spesialis siap melayani Anda','gambar'=>null,'link'=>'#layanan','urutan'=>2,'status'=>'active','tanggal_mulai'=>'01 Mei 2025','tanggal_selesai'=>'30 Jun 2025'],
    ['id'=>3,'judul'=>'Jadwal Dokter Terbaru','caption'=>'Lihat jadwal dokter bulan ini','gambar'=>null,'link'=>'#jadwal','urutan'=>3,'status'=>'active','tanggal_mulai'=>'01 Mei 2025','tanggal_selesai'=>'31 Mei 2025'],
    ['id'=>4,'judul'=>'Fasilitas Laboratorium','caption'=>'Lab lengkap, hasil cepat & akurat','gambar'=>null,'link'=>null,'urutan'=>4,'status'=>'active','tanggal_mulai'=>'15 Apr 2025','tanggal_selesai'=>'15 Jun 2025'],
    ['id'=>5,'judul'=>'Pendaftaran Online','caption'=>'Daftar antrian dari rumah, mudah & praktis','gambar'=>null,'link'=>'#daftar','urutan'=>5,'status'=>'inactive','tanggal_mulai'=>'01 Jun 2025','tanggal_selesai'=>'30 Jun 2025'],
];
$listBanner = isset($banner) ? $banner->items() : $bannerDummy;
$activeBanners = array_filter($listBanner, fn($b) => ($b['status'] ?? $b->status ?? 'inactive') === 'active');
@endphp

<div class="slider-preview-demo">
    <div class="spd-label">
        <i class="fa-solid fa-sliders" style="color:rgba(255,255,255,.4);"></i>
        Preview Urutan Slider di Beranda
    </div>
    <div class="spd-track" id="spdTrack">
        @foreach($listBanner as $i => $b)
        @if(($b['status'] ?? $b->status ?? '') === 'active')
        <div class="spd-slide {{ $i === 0 ? 'active' : '' }}" data-index="{{ $i }}">
            @if(!empty($b['gambar'] ?? $b->gambar ?? null))
                <img src="{{ asset('storage/'.($b['gambar'] ?? $b->gambar)) }}" alt="{{ $b['judul'] ?? $b->judul }}">
            @else
                <div class="spd-slide-placeholder"><i class="fa-regular fa-image"></i></div>
            @endif
            <span class="spd-slide-num">{{ $b['urutan'] ?? $b->urutan ?? $i+1 }}</span>
        </div>
        @endif
        @endforeach
    </div>
    <div class="spd-dots" id="spdDots">
        @foreach($activeBanners as $i => $b)
        <div class="spd-dot {{ $i === 0 ? 'active' : '' }}" data-dot="{{ $i }}"></div>
        @endforeach
    </div>
</div>

{{-- ================================================================
     TOOLBAR
================================================================ --}}
<div class="banner-toolbar">
    <div class="search-wrap">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="search" class="search-input" id="searchBanner" placeholder="Cari judul banner...">
    </div>
    <select class="filter-select" id="filterStatus">
        <option value="">Semua Status</option>
        <option value="active">Aktif</option>
        <option value="inactive">Tidak Aktif</option>
    </select>
    <div style="display:flex;gap:4px;">
        <button class="topbar-btn" id="viewGrid" title="Grid View" style="background:var(--primary-light);color:var(--primary);">
            <i class="fa-solid fa-grip"></i>
        </button>
        <button class="topbar-btn" id="viewList" title="List View">
            <i class="fa-solid fa-list"></i>
        </button>
    </div>
</div>

{{-- ================================================================
     INFO NOTE
================================================================ --}}
<div class="banner-note">
    <i class="fa-solid fa-circle-info"></i>
    <div>
        Banner yang berstatus <strong>Aktif</strong> akan otomatis tampil dalam slider beranda sesuai urutan yang ditentukan.
        Banner dapat diatur ulang urutannya dengan mengubah nomor urut pada form edit.
        Durasi tampil tiap slide adalah <strong>{{ $sliderSpeed ?? 5 }} detik</strong>.
    </div>
</div>

{{-- ================================================================
     BANNER GRID
================================================================ --}}
<div class="banner-grid" id="bannerGrid">

    @forelse($listBanner as $item)
    @php $status = $item['status'] ?? $item->status ?? 'inactive'; @endphp
    <div class="banner-card" data-id="{{ $item['id'] ?? $item->id }}" data-status="{{ $status }}">

        {{-- Image --}}
        <div class="bc-img-wrap">
            @if(!empty($item['gambar'] ?? $item->gambar ?? null))
                <img src="{{ asset('storage/'.($item['gambar'] ?? $item->gambar)) }}"
                     alt="{{ $item['judul'] ?? $item->judul }}" loading="lazy">
            @else
                <div class="bc-img-placeholder">
                    <i class="fa-regular fa-image"></i>
                </div>
            @endif

            {{-- Order badge --}}
            <div class="bc-order-badge">{{ $item['urutan'] ?? $item->urutan ?? '—' }}</div>

            {{-- Status badge --}}
            <span class="bc-badge {{ $status }}">
                {{ $status === 'active' ? 'Aktif' : 'Nonaktif' }}
            </span>

            {{-- Slide indicator --}}
            <div class="bc-slide-indicator">
                <div class="bc-slide-dot active"></div>
                <div class="bc-slide-dot"></div>
                <div class="bc-slide-dot"></div>
            </div>
        </div>

        {{-- Body --}}
        <div class="bc-body">
            <div class="bc-order-row">
                <span class="bc-order-label">Urutan Slide</span>
                <span class="bc-order-num">#{{ $item['urutan'] ?? $item->urutan ?? '—' }}</span>
            </div>
            <div class="bc-title">{{ $item['judul'] ?? $item->judul ?? 'Tanpa Judul' }}</div>
            <div class="bc-caption">{{ $item['caption'] ?? $item->caption ?? '—' }}</div>

            @if(!empty($item['link'] ?? $item->link ?? null))
                <a href="{{ $item['link'] ?? $item->link }}" target="_blank" class="bc-link-badge">
                    <i class="fa-solid fa-link" style="font-size:10px;"></i>
                    {{ $item['link'] ?? $item->link }}
                </a>
            @else
                <span class="bc-link-none">
                    <i class="fa-solid fa-link-slash" style="font-size:10px;"></i>
                    Tanpa link
                </span>
            @endif

            <div class="bc-period">
                <i class="fa-regular fa-calendar-range"></i>
                {{ $item['tanggal_mulai'] ?? $item->tanggal_mulai ?? '—' }}
                &nbsp;→&nbsp;
                {{ $item['tanggal_selesai'] ?? $item->tanggal_selesai ?? '—' }}
            </div>
        </div>

        {{-- Footer --}}
        <div class="bc-footer">
            <div class="bc-meta">
                <i class="fa-regular fa-clock"></i>
                Diperbarui {{ isset($item['updated_at']) ? $item['updated_at'] : 'baru-baru ini' }}
            </div>
            <div class="bc-actions">
                {{-- Edit --}}
                <button class="btn-icon-sm btn-edit" title="Edit banner"
                    onclick="openEditModal(
                        '{{ $item['id'] ?? $item->id }}',
                        `{{ addslashes($item['judul'] ?? $item->judul ?? '') }}`,
                        `{{ addslashes($item['caption'] ?? $item->caption ?? '') }}`,
                        '{{ $item['gambar'] ?? $item->gambar ?? '' }}',
                        '{{ $item['link'] ?? $item->link ?? '' }}',
                        '{{ $item['urutan'] ?? $item->urutan ?? 1 }}',
                        '{{ $item['status'] ?? $item->status ?? 'inactive' }}',
                        '{{ $item['tanggal_mulai'] ?? $item->tanggal_mulai ?? '' }}',
                        '{{ $item['tanggal_selesai'] ?? $item->tanggal_selesai ?? '' }}'
                    )">
                    <i class="fa-solid fa-pen"></i>
                </button>

                {{-- Toggle status --}}
                <form action="{{ route('admin.banner.toggle', $item['id'] ?? $item->id) }}" method="POST" style="display:inline;">
                    @csrf @method('PATCH')
                    <button type="submit" class="btn-icon-sm btn-view"
                        title="{{ $status === 'active' ? 'Nonaktifkan' : 'Aktifkan' }}">
                        <i class="fa-solid {{ $status === 'active' ? 'fa-pause' : 'fa-play' }}"></i>
                    </button>
                </form>

                {{-- Delete --}}
                <button class="btn-icon-sm btn-delete" title="Hapus banner"
                    onclick="openDeleteModal(
                        '{{ $item['id'] ?? $item->id }}',
                        `{{ addslashes($item['judul'] ?? $item->judul ?? '') }}`
                    )">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
        </div>
    </div>
    @empty
    <div class="empty-state">
        <div class="es-icon"><i class="fa-regular fa-images"></i></div>
        <div class="es-title">Belum Ada Banner</div>
        <div class="es-sub">Tambahkan banner pertama untuk ditampilkan di slider beranda.</div>
        <button class="btn-primary-am" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fa-solid fa-plus"></i> Tambah Banner Pertama
        </button>
    </div>
    @endforelse

</div>

{{-- Pagination --}}
@if(isset($banner) && $banner->hasPages())
<div style="margin-top:24px;">{{ $banner->withQueryString()->links() }}</div>
@endif


{{-- ================================================================
     MODAL: TAMBAH BANNER
================================================================ --}}
<div class="modal fade am-modal" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa-solid fa-plus"></i>
                    Tambah Banner Baru
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data" id="formTambah">
                @csrf
                <div class="modal-body">

                    {{-- Gambar --}}
                    <div class="modal-form-group">
                        <div class="mfg-label">
                            <i class="fa-solid fa-image" style="color:var(--primary);font-size:12px;"></i>
                            Gambar Banner <span class="req">*</span>
                        </div>
                        <div style="font-size:11.5px;color:var(--text-muted);margin-bottom:8px;display:flex;align-items:center;gap:6px;">
                            <i class="fa-solid fa-circle-info" style="color:var(--primary);"></i>
                            Resolusi optimal: <strong>1920 × 600 px</strong> (format landscape)
                        </div>

                        <div class="img-preview-wrap" id="tambahPreviewWrap">
                            <img src="" id="tambahPreviewImg" alt="Preview">
                            <div class="img-preview-label">Preview Banner</div>
                            <button type="button" class="img-preview-remove" onclick="removeImage('tambah')">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>

                        <div class="img-upload-zone" id="tambahUploadZone">
                            <input type="file" name="gambar" id="tambahGambar"
                                accept="image/jpeg,image/png,image/webp"
                                onchange="previewImage(this,'tambah')" required>
                            <div class="iuz-icon"><i class="fa-solid fa-cloud-arrow-up"></i></div>
                            <div class="iuz-title">Klik atau seret gambar banner</div>
                            <div class="iuz-sub">JPG, PNG, WebP — Maks. 3 MB</div>
                            <div class="iuz-hint">
                                <i class="fa-solid fa-ruler-combined" style="font-size:10px;"></i>
                                Disarankan 1920 × 600 px
                            </div>
                        </div>
                    </div>

                    {{-- Judul --}}
                    <div class="modal-form-group">
                        <div class="mfg-label">
                            <i class="fa-solid fa-heading" style="color:var(--primary);font-size:12px;"></i>
                            Judul Banner <span class="req">*</span>
                        </div>
                        <input type="text" name="judul" class="mfg-input" id="tambahJudul"
                            placeholder="Contoh: Promo Kesehatan Bulan Mei" maxlength="100" required>
                        <div class="char-counter" id="tambahJudulCounter">0 / 100</div>
                    </div>

                    {{-- Caption --}}
                    <div class="modal-form-group">
                        <div class="mfg-label">
                            <i class="fa-solid fa-align-left" style="color:var(--primary);font-size:12px;"></i>
                            Caption / Deskripsi
                            <span class="opt">(opsional)</span>
                        </div>
                        <textarea name="caption" class="mfg-textarea" id="tambahCaption"
                            placeholder="Teks pendek yang ditampilkan di bawah judul banner..."
                            maxlength="200" style="min-height:72px;"></textarea>
                        <div class="char-counter" id="tambahCaptionCounter">0 / 200</div>
                    </div>

                    {{-- Link & Urutan --}}
                    <div class="mfg-row modal-form-group">
                        <div>
                            <div class="mfg-label">
                                <i class="fa-solid fa-link" style="color:var(--primary);font-size:12px;"></i>
                                Link Tujuan <span class="opt">(opsional)</span>
                            </div>
                            <div class="mfg-input-wrap">
                                <i class="fa-solid fa-globe"></i>
                                <input type="url" name="link" class="mfg-input"
                                    id="tambahLink" placeholder="https://...">
                            </div>
                        </div>
                        <div>
                            <div class="mfg-label">
                                <i class="fa-solid fa-sort" style="color:var(--primary);font-size:12px;"></i>
                                Nomor Urut <span class="req">*</span>
                            </div>
                            <input type="number" name="urutan" class="mfg-input"
                                id="tambahUrutan" placeholder="1" min="1" max="20"
                                value="{{ (isset($listBanner) ? count($listBanner) : 0) + 1 }}" required>
                        </div>
                    </div>

                    {{-- Periode tayang --}}
                    <div class="mfg-row modal-form-group">
                        <div>
                            <div class="mfg-label">
                                <i class="fa-regular fa-calendar-plus" style="color:var(--primary);font-size:12px;"></i>
                                Tanggal Mulai <span class="req">*</span>
                            </div>
                            <input type="date" name="tanggal_mulai" class="mfg-input"
                                id="tambahMulai" required>
                        </div>
                        <div>
                            <div class="mfg-label">
                                <i class="fa-regular fa-calendar-xmark" style="color:var(--primary);font-size:12px;"></i>
                                Tanggal Selesai <span class="req">*</span>
                            </div>
                            <input type="date" name="tanggal_selesai" class="mfg-input"
                                id="tambahSelesai" required>
                        </div>
                    </div>

                    {{-- Status --}}
                    <div class="modal-form-group">
                        <div class="mfg-label">
                            <i class="fa-solid fa-toggle-on" style="color:var(--primary);font-size:12px;"></i>
                            Status Tampil
                        </div>
                        <div class="status-toggle-group">
                            <input type="radio" name="status" id="tambahActive"   value="active"   checked>
                            <label for="tambahActive"   class="active-lbl">
                                <i class="fa-solid fa-circle-play"></i> Aktif di Slider
                            </label>
                            <input type="radio" name="status" id="tambahInactive" value="inactive">
                            <label for="tambahInactive" class="inactive-lbl">
                                <i class="fa-solid fa-circle-pause"></i> Nonaktif
                            </label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Batal
                    </button>
                    <button type="submit" class="btn-save">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Banner
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- ================================================================
     MODAL: EDIT BANNER
================================================================ --}}
<div class="modal fade am-modal" id="modalEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(135deg,#1e3a5f 0%,#0ea5e9 100%);">
                <h5 class="modal-title">
                    <i class="fa-solid fa-pen-to-square"></i>
                    Edit Banner
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="" method="POST" enctype="multipart/form-data" id="formEdit">
                @csrf @method('PUT')
                <input type="hidden" name="id" id="editId">

                <div class="modal-body">

                    {{-- Gambar --}}
                    <div class="modal-form-group">
                        <div class="mfg-label">
                            <i class="fa-solid fa-image" style="color:var(--primary);font-size:12px;"></i>
                            Gambar Banner
                        </div>
                        <div style="font-size:11.5px;color:var(--text-muted);margin-bottom:8px;">
                            <i class="fa-solid fa-circle-info" style="color:var(--primary);"></i>
                            Biarkan kosong jika tidak ingin mengganti gambar.
                        </div>

                        <div class="img-preview-wrap" id="editCurrentWrap">
                            <img src="" id="editCurrentImg" alt="Gambar saat ini">
                            <div class="img-preview-label">Gambar Saat Ini</div>
                            <button type="button" class="img-preview-remove" onclick="removeImage('edit')">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>

                        <div class="img-upload-zone" id="editUploadZone">
                            <input type="file" name="gambar" id="editGambar"
                                accept="image/jpeg,image/png,image/webp"
                                onchange="previewImage(this,'edit')">
                            <div class="iuz-icon"><i class="fa-solid fa-arrow-up-from-bracket"></i></div>
                            <div class="iuz-title">Ganti gambar banner</div>
                            <div class="iuz-sub">JPG, PNG, WebP — Maks. 3 MB</div>
                            <div class="iuz-hint">
                                <i class="fa-solid fa-ruler-combined" style="font-size:10px;"></i>
                                Disarankan 1920 × 600 px
                            </div>
                        </div>
                    </div>

                    {{-- Judul --}}
                    <div class="modal-form-group">
                        <div class="mfg-label">
                            <i class="fa-solid fa-heading" style="color:var(--primary);font-size:12px;"></i>
                            Judul Banner <span class="req">*</span>
                        </div>
                        <input type="text" name="judul" class="mfg-input" id="editJudul"
                            placeholder="Judul banner..." maxlength="100" required>
                        <div class="char-counter" id="editJudulCounter">0 / 100</div>
                    </div>

                    {{-- Caption --}}
                    <div class="modal-form-group">
                        <div class="mfg-label">
                            <i class="fa-solid fa-align-left" style="color:var(--primary);font-size:12px;"></i>
                            Caption / Deskripsi <span class="opt">(opsional)</span>
                        </div>
                        <textarea name="caption" class="mfg-textarea" id="editCaption"
                            placeholder="Teks pendek yang ditampilkan di bawah judul..."
                            maxlength="200" style="min-height:72px;"></textarea>
                        <div class="char-counter" id="editCaptionCounter">0 / 200</div>
                    </div>

                    {{-- Link & Urutan --}}
                    <div class="mfg-row modal-form-group">
                        <div>
                            <div class="mfg-label">
                                <i class="fa-solid fa-link" style="color:var(--primary);font-size:12px;"></i>
                                Link Tujuan <span class="opt">(opsional)</span>
                            </div>
                            <div class="mfg-input-wrap">
                                <i class="fa-solid fa-globe"></i>
                                <input type="url" name="link" class="mfg-input" id="editLink" placeholder="https://...">
                            </div>
                        </div>
                        <div>
                            <div class="mfg-label">
                                <i class="fa-solid fa-sort" style="color:var(--primary);font-size:12px;"></i>
                                Nomor Urut <span class="req">*</span>
                            </div>
                            <input type="number" name="urutan" class="mfg-input" id="editUrutan"
                                placeholder="1" min="1" max="20" required>
                        </div>
                    </div>

                    {{-- Periode --}}
                    <div class="mfg-row modal-form-group">
                        <div>
                            <div class="mfg-label">
                                <i class="fa-regular fa-calendar-plus" style="color:var(--primary);font-size:12px;"></i>
                                Tanggal Mulai <span class="req">*</span>
                            </div>
                            <input type="date" name="tanggal_mulai" class="mfg-input" id="editMulai" required>
                        </div>
                        <div>
                            <div class="mfg-label">
                                <i class="fa-regular fa-calendar-xmark" style="color:var(--primary);font-size:12px;"></i>
                                Tanggal Selesai <span class="req">*</span>
                            </div>
                            <input type="date" name="tanggal_selesai" class="mfg-input" id="editSelesai" required>
                        </div>
                    </div>

                    {{-- Status --}}
                    <div class="modal-form-group">
                        <div class="mfg-label">
                            <i class="fa-solid fa-toggle-on" style="color:var(--primary);font-size:12px;"></i>
                            Status Tampil
                        </div>
                        <div class="status-toggle-group">
                            <input type="radio" name="status" id="editActive"   value="active">
                            <label for="editActive"   class="active-lbl">
                                <i class="fa-solid fa-circle-play"></i> Aktif di Slider
                            </label>
                            <input type="radio" name="status" id="editInactive" value="inactive">
                            <label for="editInactive" class="inactive-lbl">
                                <i class="fa-solid fa-circle-pause"></i> Nonaktif
                            </label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Batal
                    </button>
                    <button type="submit" class="btn-save">
                        <i class="fa-solid fa-floppy-disk"></i> Perbarui Banner
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- ================================================================
     MODAL: HAPUS BANNER
================================================================ --}}
<div class="modal fade am-modal" id="modalHapus" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width:420px;">
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(135deg,#7f1d1d 0%,#ef4444 100%);">
                <h5 class="modal-title">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    Konfirmasi Hapus
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="" method="POST" id="formHapus">
                @csrf @method('DELETE')
                <div class="delete-modal-body">
                    <div class="del-icon"><i class="fa-solid fa-trash-can"></i></div>
                    <div class="del-title">Hapus Banner Ini?</div>
                    <div class="del-sub">
                        Tindakan ini tidak dapat dibatalkan. Banner berikut akan dihapus secara permanen beserta gambarnya:
                    </div>
                    <div class="del-target" id="deleteTargetTitle">—</div>
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
   BANNER PAGE — JavaScript
============================================================ */

/* ---- Character counters ---- */
function initCharCounter(inputId, counterId, max) {
    const el = document.getElementById(inputId);
    const ct = document.getElementById(counterId);
    if (!el || !ct) return;
    function update() {
        const len = el.value.length;
        ct.textContent = `${len} / ${max}`;
        ct.className = 'char-counter' +
            (len > max * .9 ? (len >= max ? ' over' : ' warn') : '');
    }
    el.addEventListener('input', update); update();
}
initCharCounter('tambahJudul',   'tambahJudulCounter',   100);
initCharCounter('tambahCaption', 'tambahCaptionCounter', 200);
initCharCounter('editJudul',     'editJudulCounter',     100);
initCharCounter('editCaption',   'editCaptionCounter',   200);

/* ---- Image preview ---- */
function previewImage(input, prefix) {
    const file = input.files[0];
    if (!file) return;
    if (file.size > 3 * 1024 * 1024) {
        alert('Ukuran file terlalu besar. Maksimal 3 MB.');
        input.value = ''; return;
    }
    const reader = new FileReader();
    reader.onload = function(e) {
        const isEdit    = prefix === 'edit';
        const wrapId    = isEdit ? 'editCurrentWrap'  : 'tambahPreviewWrap';
        const imgId     = isEdit ? 'editCurrentImg'   : 'tambahPreviewImg';
        const zoneId    = isEdit ? 'editUploadZone'   : 'tambahUploadZone';
        document.getElementById(imgId).src = e.target.result;
        document.getElementById(wrapId).classList.add('show');
        document.getElementById(zoneId).style.display = 'none';
    };
    reader.readAsDataURL(file);
}

function removeImage(prefix) {
    const isEdit = prefix === 'edit';
    const wrapId = isEdit ? 'editCurrentWrap'  : 'tambahPreviewWrap';
    const imgId  = isEdit ? 'editCurrentImg'   : 'tambahPreviewImg';
    const zoneId = isEdit ? 'editUploadZone'   : 'tambahUploadZone';
    const fileId = isEdit ? 'editGambar'       : 'tambahGambar';
    document.getElementById(imgId).src = '';
    document.getElementById(wrapId).classList.remove('show');
    document.getElementById(zoneId).style.display = '';
    document.getElementById(fileId).value = '';
}

/* ---- Drag & drop ---- */
['tambah','edit'].forEach(function(prefix) {
    const zoneId = prefix + 'UploadZone';
    const zone   = document.getElementById(zoneId);
    if (!zone) return;
    zone.addEventListener('dragover',  e => { e.preventDefault(); zone.classList.add('dragover'); });
    zone.addEventListener('dragleave', () => zone.classList.remove('dragover'));
    zone.addEventListener('drop', function(e) {
        e.preventDefault(); zone.classList.remove('dragover');
        const inp = zone.querySelector('input[type="file"]');
        if (e.dataTransfer.files.length) { inp.files = e.dataTransfer.files; previewImage(inp, prefix); }
    });
});

/* ---- Open EDIT modal ---- */
function openEditModal(id, judul, caption, gambar, link, urutan, status, mulai, selesai) {
    document.getElementById('editId').value      = id;
    document.getElementById('editJudul').value   = judul;
    document.getElementById('editCaption').value = caption;
    document.getElementById('editLink').value    = link;
    document.getElementById('editUrutan').value  = urutan;
    document.getElementById('editMulai').value   = mulai;
    document.getElementById('editSelesai').value = selesai;

    document.getElementById('formEdit').action = '{{ url("admin/banner") }}/' + id;

    document.getElementById('editActive').checked   = (status === 'active');
    document.getElementById('editInactive').checked = (status === 'inactive');

    const wrap = document.getElementById('editCurrentWrap');
    const img  = document.getElementById('editCurrentImg');
    const zone = document.getElementById('editUploadZone');
    if (gambar && gambar.trim() !== '') {
        img.src = '/storage/' + gambar;
        wrap.classList.add('show');
        zone.style.display = 'none';
    } else {
        img.src = ''; wrap.classList.remove('show'); zone.style.display = '';
    }

    ['editJudul','editCaption'].forEach(id => document.getElementById(id).dispatchEvent(new Event('input')));
    new bootstrap.Modal(document.getElementById('modalEdit')).show();
}

/* ---- Open DELETE modal ---- */
function openDeleteModal(id, judul) {
    document.getElementById('formHapus').action         = '{{ url("admin/banner") }}/' + id;
    document.getElementById('deleteTargetTitle').textContent = judul;
    new bootstrap.Modal(document.getElementById('modalHapus')).show();
}

/* ---- Reset tambah modal ---- */
document.getElementById('modalTambah').addEventListener('hidden.bs.modal', function() {
    document.getElementById('formTambah').reset();
    removeImage('tambah');
});

/* ---- Live search ---- */
document.getElementById('searchBanner').addEventListener('input', function() {
    const q = this.value.toLowerCase();
    document.querySelectorAll('.banner-card').forEach(function(card) {
        const title   = card.querySelector('.bc-title')?.textContent.toLowerCase()   || '';
        const caption = card.querySelector('.bc-caption')?.textContent.toLowerCase() || '';
        card.style.display = (title.includes(q) || caption.includes(q)) ? '' : 'none';
    });
});

/* ---- Filter status ---- */
document.getElementById('filterStatus').addEventListener('change', function() {
    const val = this.value;
    document.querySelectorAll('.banner-card').forEach(function(card) {
        card.style.display = (!val || card.dataset.status === val) ? '' : 'none';
    });
});

/* ---- View toggle ---- */
document.getElementById('viewGrid').addEventListener('click', function() {
    document.getElementById('bannerGrid').style.gridTemplateColumns = '';
    this.style.background = 'var(--primary-light)'; this.style.color = 'var(--primary)';
    document.getElementById('viewList').style.background = ''; document.getElementById('viewList').style.color = '';
});
document.getElementById('viewList').addEventListener('click', function() {
    document.getElementById('bannerGrid').style.gridTemplateColumns = '1fr';
    this.style.background = 'var(--primary-light)'; this.style.color = 'var(--primary)';
    document.getElementById('viewGrid').style.background = ''; document.getElementById('viewGrid').style.color = '';
});

/* ---- Slider preview dot interaction ---- */
document.querySelectorAll('.spd-slide').forEach(function(slide) {
    slide.addEventListener('click', function() {
        document.querySelectorAll('.spd-slide').forEach(s => s.classList.remove('active'));
        this.classList.add('active');
        const idx = this.dataset.index;
        document.querySelectorAll('.spd-dot').forEach((d, i) => d.classList.toggle('active', String(i) === String(idx)));
    });
});

/* ---- Date validation ---- */
['tambahMulai','editMulai'].forEach(function(id) {
    const el = document.getElementById(id);
    if (!el) return;
    el.addEventListener('change', function() {
        const endId = id.replace('Mulai','Selesai');
        const endEl = document.getElementById(endId);
        if (endEl && endEl.value && endEl.value < this.value) endEl.value = this.value;
    });
});
</script>
@endpush
