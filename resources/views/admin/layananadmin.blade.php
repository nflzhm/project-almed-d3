@extends('admin.layout')

@section('title', 'Manajemen Layanan')
@section('page-title', 'Layanan')

@section('breadcrumb')
    <li class="breadcrumb-item active">Manajemen Layanan</li>
@endsection

@push('styles')
<style>
/* ============================================================
   LAYANAN PAGE — Allam Medica Admin (+ Gambar)
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
.lay-stats { display: flex; gap: 12px; margin-bottom: 24px; flex-wrap: wrap; }
.lay-stat {
    flex: 1; min-width: 130px; background: var(--card-bg);
    border: 1px solid var(--border-color); border-radius: var(--radius);
    padding: 16px 20px; display: flex; align-items: center; gap: 14px;
    box-shadow: var(--shadow-sm); transition: box-shadow var(--transition), transform var(--transition);
}
.lay-stat:hover { box-shadow: var(--shadow-md); transform: translateY(-2px); }
.lay-stat-icon {
    width: 42px; height: 42px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0;
}
.lay-stat-val {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 22px; font-weight: 800; color: var(--text-main); line-height: 1;
}
.lay-stat-lbl { font-size: 12px; color: var(--text-muted); margin-top: 3px; font-weight: 500; }

/* ---- Toolbar ---- */
.lay-toolbar {
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
}
.filter-select:focus { border-color: var(--primary); outline: none; }

/* ============================================================
   CARD GRID
============================================================ */
.lay-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}

/* ---- Layanan Card ---- */
.lay-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    display: flex;
    flex-direction: column;
    transition: box-shadow var(--transition), transform var(--transition);
    animation: cardIn .35s ease both;
    position: relative;
}
@keyframes cardIn {
    from { opacity: 0; transform: translateY(14px); }
    to   { opacity: 1; transform: translateY(0); }
}
.lay-card:nth-child(1){animation-delay:.04s} .lay-card:nth-child(2){animation-delay:.08s}
.lay-card:nth-child(3){animation-delay:.12s} .lay-card:nth-child(4){animation-delay:.16s}
.lay-card:nth-child(5){animation-delay:.20s} .lay-card:nth-child(6){animation-delay:.24s}
.lay-card:hover { box-shadow: var(--shadow-md); transform: translateY(-4px); }

/* ---- Image area ---- */
.lay-card-img {
    position: relative;
    aspect-ratio: 16 / 7;
    overflow: hidden;
    background: var(--body-bg);
    flex-shrink: 0;
}
.lay-card-img img {
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform .4s ease;
    display: block;
}
.lay-card:hover .lay-card-img img { transform: scale(1.05); }

/* Image placeholder */
.lay-img-placeholder {
    width: 100%; height: 100%;
    display: flex; flex-direction: column;
    align-items: center; justify-content: center; gap: 8px;
}
.lay-img-placeholder i  { font-size: 36px; opacity: .35; }
.lay-img-placeholder span { font-size: 11px; opacity: .5; font-weight: 600; text-transform: uppercase; letter-spacing: .7px; }

/* Status badge on image */
.lay-status-badge {
    position: absolute; top: 10px; right: 10px;
    font-size: 10px; font-weight: 700;
    text-transform: uppercase; letter-spacing: .7px;
    padding: 4px 10px; border-radius: 20px;
    backdrop-filter: blur(8px);
}
.lay-status-badge.aktif    { background: rgba(16,185,129,.85); color: #fff; }
.lay-status-badge.nonaktif { background: rgba(100,116,139,.8);  color: #fff; }

/* No urut badge */
.lay-num-badge {
    position: absolute; top: 10px; left: 10px;
    width: 28px; height: 28px; border-radius: 8px;
    background: rgba(12,26,46,.7);
    backdrop-filter: blur(6px);
    display: flex; align-items: center; justify-content: center;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 12px; font-weight: 800; color: #fff;
}

/* Admin hover actions on image */
.lay-img-actions {
    position: absolute; inset: 0;
    background: rgba(12,26,46,.55);
    backdrop-filter: blur(2px);
    display: flex; align-items: center; justify-content: center;
    gap: 8px;
    opacity: 0;
    transition: opacity var(--transition);
}
.lay-card:hover .lay-img-actions { opacity: 1; }
.lay-img-action-btn {
    width: 38px; height: 38px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 15px; cursor: pointer; border: none;
    font-family: 'Plus Jakarta Sans', sans-serif;
    transition: transform var(--transition), box-shadow var(--transition);
}
.lay-img-action-btn:hover { transform: scale(1.1); }
.iab-view   { background: #fff; color: var(--primary); }
.iab-edit   { background: var(--primary); color: #fff; box-shadow: 0 4px 12px rgba(14,165,233,.4); }
.iab-delete { background: #ef4444; color: #fff; box-shadow: 0 4px 12px rgba(239,68,68,.4); }

/* ---- Card body ---- */
.lay-card-body { padding: 16px 18px; flex: 1; display: flex; flex-direction: column; }

.lay-card-poli {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 15px; font-weight: 800;
    color: var(--text-main); line-height: 1.3;
    margin-bottom: 8px;
}

.lay-card-desc {
    font-size: 12.5px; color: var(--text-muted); line-height: 1.6;
    flex: 1; margin-bottom: 14px;
    display: -webkit-box; -webkit-line-clamp: 3;
    -webkit-box-orient: vertical; overflow: hidden;
}

/* ---- Card footer ---- */
.lay-card-footer {
    padding: 12px 18px;
    border-top: 1px solid var(--border-color);
    background: #fafbff;
    display: flex; align-items: center; justify-content: space-between;
    gap: 8px; flex-wrap: wrap;
}

/* Phone badge */
.lay-phone-badge {
    display: inline-flex; align-items: center; gap: 6px;
    background: #f0fdf4; border: 1px solid #bbf7d0;
    color: #166534; font-size: 12px; font-weight: 600;
    padding: 5px 12px; border-radius: 20px;
    text-decoration: none;
    transition: background var(--transition), box-shadow var(--transition);
    white-space: nowrap;
}
.lay-phone-badge:hover {
    background: #dcfce7; color: #14532d;
    box-shadow: 0 3px 10px rgba(16,185,129,.2);
}
.lay-phone-badge i { font-size: 11px; }

.lay-wa-badge {
    display: inline-flex; align-items: center; gap: 5px;
    background: #dcfce7; border: 1px solid #86efac;
    color: #15803d; font-size: 12px; font-weight: 700;
    padding: 5px 10px; border-radius: 20px;
    text-decoration: none;
    transition: background var(--transition);
}
.lay-wa-badge:hover { background: #25D366; color: #fff; }

.no-contact-label {
    font-size: 12px; color: var(--text-muted); font-style: italic;
    display: flex; align-items: center; gap: 5px;
}

/* Row admin actions (footer) */
.lay-foot-actions { display: flex; gap: 5px; }
.btn-icon-sm {
    width: 30px; height: 30px; border-radius: 7px;
    display: inline-flex; align-items: center; justify-content: center;
    font-size: 12px; cursor: pointer; border: none;
    transition: background var(--transition), color var(--transition), transform var(--transition);
}
.btn-icon-sm:hover { transform: scale(1.08); }
.btn-edit   { background: #e0f2fe; color: var(--primary); }
.btn-edit:hover   { background: var(--primary); color: #fff; }
.btn-delete { background: #fee2e2; color: #ef4444; }
.btn-delete:hover { background: #ef4444; color: #fff; }
.btn-view   { background: #f0fdf4; color: #059669; }
.btn-view:hover   { background: #059669; color: #fff; }

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
.empty-state .es-sub   { font-size: 13.5px; color: var(--text-muted); margin-bottom: 20px; }

/* ============================================================
   MODAL
============================================================ */
.am-modal .modal-dialog {
    max-width: 620px;
    max-height: 90vh; /* penting */
}

.am-modal .modal-content {
    border: none;
    border-radius: var(--radius);
    box-shadow: 0 24px 64px rgba(0,0,0,.18);
    overflow: hidden;

    display: flex;
    flex-direction: column;
    max-height: 90vh; /* penting */
}

.am-modal .modal-body {
    padding: 26px 26px 8px;

    overflow-y: auto;   
    flex: 1;            
    max-height: calc(90vh - 140px); 
}

.am-modal .modal-header {
    flex-shrink: 0;
}

.am-modal .modal-footer {
    flex-shrink: 0;
    padding: 14px 26px 22px;
    border: none;
    gap: 10px;
}

/* Form groups */
.mfg { margin-bottom: 18px; }
.mfg:last-child { margin-bottom: 0; }
.mfg-label {
    font-size: 12.5px; font-weight: 700; color: var(--text-main);
    margin-bottom: 6px; display: flex; align-items: center; gap: 6px;
}
.mfg-label i  { color: var(--primary); font-size: 11px; }
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
.mfg-textarea { min-height: 90px; resize: vertical; line-height: 1.6; }
.mfg-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
@media(max-width:575px) { .mfg-row { grid-template-columns: 1fr; } }

/* ---- Image upload zone ---- */
.img-upload-zone {
    border: 2px dashed var(--border-color);
    border-radius: var(--radius-sm);
    padding: 24px 16px; text-align: center;
    cursor: pointer; background: var(--body-bg);
    position: relative; overflow: hidden;
    transition: border-color var(--transition), background var(--transition);
}
.img-upload-zone:hover,
.img-upload-zone.dragover { border-color: var(--primary); background: var(--primary-light); }
.img-upload-zone input[type="file"] {
    position: absolute; inset: 0; opacity: 0;
    cursor: pointer; width: 100%; height: 100%;
}
.iuz-icon {
    width: 52px; height: 52px; border-radius: 14px;
    background: var(--primary-light); color: var(--primary);
    display: flex; align-items: center; justify-content: center;
    font-size: 22px; margin: 0 auto 12px;
    transition: background var(--transition), color var(--transition);
}
.img-upload-zone:hover .iuz-icon { background: var(--primary); color: #fff; }
.iuz-title { font-size: 13.5px; font-weight: 700; color: var(--text-main); margin-bottom: 4px; }
.iuz-sub   { font-size: 12px; color: var(--text-muted); }
.iuz-formats {
    display: inline-flex; align-items: center; gap: 5px;
    margin-top: 8px; font-size: 11.5px; color: var(--primary);
    background: rgba(14,165,233,.1); padding: 3px 10px; border-radius: 20px;
}

/* ---- Image preview (after select) ---- */
.img-preview-wrap {
    display: none; position: relative;
    border-radius: var(--radius-sm); overflow: hidden;
    border: 1.5px solid var(--border-color);
    margin-bottom: 10px;
}
.img-preview-wrap.show { display: block; }
.img-preview-wrap img  {
    width: 100%; height: 180px; object-fit: cover; display: block;
    transition: filter .3s;
}

/* Preview overlay on hover */
.img-preview-overlay {
    position: absolute; inset: 0;
    background: rgba(12,26,46,.5);
    display: flex; align-items: center; justify-content: center;
    opacity: 0; transition: opacity var(--transition);
}
.img-preview-wrap:hover .img-preview-overlay { opacity: 1; }

.img-preview-actions { display: flex; gap: 8px; }
.img-preview-btn {
    display: flex; align-items: center; gap: 6px;
    padding: 8px 14px; border-radius: 8px; border: none;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 12px; font-weight: 700; cursor: pointer;
    transition: transform var(--transition);
}
.img-preview-btn:hover { transform: scale(1.05); }
.ipb-change { background: #fff; color: var(--primary); }
.ipb-remove { background: #ef4444; color: #fff; }

.img-preview-label {
    position: absolute; bottom: 0; left: 0; right: 0;
    background: rgba(12,26,46,.75); backdrop-filter: blur(4px);
    color: #fff; font-size: 10.5px; font-weight: 700;
    padding: 5px 12px; text-align: center;
    text-transform: uppercase; letter-spacing: .6px;
}

/* Hidden change input for existing preview */
.hidden-file-input { display: none; }

/* Phone input with prefix */
.phone-wrap { position: relative; display: flex; align-items: stretch; }
.phone-prefix {
    display: flex; align-items: center; gap: 6px;
    padding: 10px 12px;
    background: var(--body-bg); border: 1.5px solid var(--border-color);
    border-right: 0; border-radius: var(--radius-sm) 0 0 var(--radius-sm);
    font-size: 13px; font-weight: 700; color: var(--text-muted);
    white-space: nowrap; flex-shrink: 0;
}
.phone-wrap .mfg-input {
    border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
    border-left: 0;
}
.phone-wrap .mfg-input:focus {
    border-color: var(--primary); border-left: 1.5px solid var(--primary);
}

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
.status-toggle-group input:checked + label.status-aktif { background: #d1fae5; border-color: #6ee7b7; color: #065f46; }
.status-toggle-group input:checked + label.status-off   { background: #f1f5f9; border-color: #94a3b8; color: #475569; }

/* Char counter */
.char-counter { font-size: 11px; color: var(--text-muted); text-align: right; margin-top: 3px; }
.char-counter.warn { color: var(--warning); }
.char-counter.over { color: var(--danger); }

/* Live preview mini card inside modal */
.modal-preview-bar {
    background: linear-gradient(135deg, var(--sidebar-bg), #1e3a5f);
    border-radius: var(--radius-sm); padding: 14px 16px;
    display: flex; align-items: center; gap: 12px; margin-top: 16px;
}
.mpb-img {
    width: 52px; height: 52px; border-radius: 10px;
    object-fit: cover; flex-shrink: 0;
    border: 2px solid rgba(255,255,255,.15);
}
.mpb-img-placeholder {
    width: 52px; height: 52px; border-radius: 10px;
    background: rgba(255,255,255,.1);
    display: flex; align-items: center; justify-content: center;
    color: rgba(255,255,255,.4); font-size: 20px; flex-shrink: 0;
}
.mpb-poli  { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 14px; font-weight: 700; color: #fff; }
.mpb-phone { font-size: 12px; color: rgba(255,255,255,.5); margin-top: 3px; display: flex; align-items: center; gap: 5px; }

/* Modal buttons */
.btn-cancel {
    padding: 10px 20px; border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm); background: transparent;
    color: var(--text-muted); font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13.5px; font-weight: 600; cursor: pointer;
    transition: background var(--transition);
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

/* Detail modal */
.det-img-hero {
    width: 100%; height: 200px; object-fit: cover; display: block;
}
.det-img-placeholder {
    width: 100%; height: 200px;
    display: flex; align-items: center; justify-content: center;
    font-size: 56px; color: rgba(255,255,255,.3);
}
.det-body { padding: 20px 24px; }
.det-poli { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 20px; font-weight: 800; color: var(--text-main); margin-bottom: 6px; }
.det-section { margin-top: 16px; padding-top: 16px; border-top: 1px solid var(--border-color); }
.det-label {
    font-size: 11px; font-weight: 700; color: var(--text-muted);
    text-transform: uppercase; letter-spacing: .8px; margin-bottom: 8px;
    display: flex; align-items: center; gap: 6px;
}
.det-value { font-size: 13.5px; color: var(--text-main); line-height: 1.6; }

/* Responsive */
@media(max-width:767.98px) {
    .lay-grid { grid-template-columns: 1fr; }
    .lay-stats { gap: 8px; }
    .lay-stat  { min-width: 120px; }
    .lay-toolbar { flex-direction: column; align-items: stretch; }
    .am-modal .modal-body   { padding: 18px 16px 8px; }
    .am-modal .modal-footer { padding: 12px 16px 20px; }
}
</style>
@endpush

@section('content')


<div class="page-header">
    <div class="page-header-left">
        <div class="ph-title">Manajemen Layanan</div>
        <div class="ph-sub">Kelola data poliklinik & layanan RSU Allam Medica beserta foto dan kontak</div>
    </div>
    <button class="btn-primary-am" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="fa-solid fa-plus"></i>
        Tambah Layanan
    </button>
</div>


<div class="lay-stats">
    <div class="lay-stat">
        <div class="lay-stat-icon" style="background:#e0f2fe;color:#0284c7;">
            <i class="fa-solid fa-stethoscope"></i>
        </div>
        <div>
            <div class="lay-stat-val">{{ isset($layanan) ? $layanan->total() : 8 }}</div>
            <div class="lay-stat-lbl">Total Layanan</div>
        </div>
    </div>
    <div class="lay-stat">
        <div class="lay-stat-icon" style="background:#d1fae5;color:#059669;">
            <i class="fa-solid fa-circle-check"></i>
        </div>
        <div>
            <div class="lay-stat-val">{{ $totalAktif ?? 7 }}</div>
            <div class="lay-stat-lbl">Aktif</div>
        </div>
    </div>
    <div class="lay-stat">
        <div class="lay-stat-icon" style="background:#fef3c7;color:#d97706;">
            <i class="fa-solid fa-image"></i>
        </div>
        <div>
            <div class="lay-stat-val">{{ $totalDenganGambar ?? 6 }}</div>
            <div class="lay-stat-lbl">Punya Foto</div>
        </div>
    </div>
    <div class="lay-stat">
        <div class="lay-stat-icon" style="background:#f0fdf4;color:#059669;">
            <i class="fa-solid fa-phone"></i>
        </div>
        <div>
            <div class="lay-stat-val">{{ $totalDenganHp ?? 6 }}</div>
            <div class="lay-stat-lbl">Punya No. HP</div>
        </div>
    </div>
</div>

{{-- ================================================================
     TOOLBAR
================================================================ --}}
<div class="lay-toolbar">
    <div class="search-wrap">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="search" class="search-input" id="searchLay" placeholder="Cari nama poliklinik...">
    </div>
    <select class="filter-select" id="filterStatus">
        <option value="">Semua Status</option>
        <option value="aktif">Aktif</option>
        <option value="nonaktif">Nonaktif</option>
    </select>
    <select class="filter-select" id="filterSort">
        <option value="az">A – Z</option>
        <option value="za">Z – A</option>
        <option value="newest">Terbaru</option>
    </select>
</div>


<div class="lay-grid" id="layGrid">

    @forelse($layanan as $i => $item)
    @php
    $id     = $item['id'] ?? $item->id;
    $poli   = $item['poli'] ?? $item->poli;
    $desc   = $item['deskripsi'] ?? $item->deskripsi ?? '';
    $hp     = $item['no_hp'] ?? $item->no_hp ?? '';
    $wa     = $item['no_wa'] ?? $item->no_wa ?? '';
    $status = $item['status'] ?? $item->status ?? 'aktif';
    $gambar = $item['gambar'] ?? $item->gambar ?? null;

    $imgUrl = $gambar ? asset('storage/' . $gambar) : null;

    // fallback icon config
    $ic = [
        'bg'    => '#e0f2fe',
        'color' => '#0284c7',
        'icon'  => 'fa-solid fa-stethoscope'
    ];
    @endphp

    <div class="lay-card"
         data-id="{{ $id }}"
         data-status="{{ $status }}"
         data-poli="{{ strtolower($poli) }}">

        {{-- ---- IMAGE AREA ---- --}}
        <div class="lay-card-img"
             style="{{ !$imgUrl ? 'background:linear-gradient(135deg,'.$ic['bg'].','.adjustBrightness($ic['bg']).')' : '' }}">

            @if($imgUrl)
                <img src="{{ $imgUrl }}" alt="{{ $poli }}" loading="lazy">
            @else
                <div class="lay-img-placeholder" style="color:{{ $ic['color'] }};">
                    <i class="{{ $ic['icon'] }}"></i>
                    <span>Belum ada foto</span>
                </div>
            @endif

            {{-- Number badge --}}
            <div class="lay-num-badge">{{ $i + 1 }}</div>

            {{-- Status badge --}}
            <span class="lay-status-badge {{ $status }}">
                {{ $status === 'aktif' ? 'Aktif' : 'Nonaktif' }}
            </span>

            {{-- Hover overlay actions --}}
            <div class="lay-img-actions">
                <button class="lay-img-action-btn iab-view" title="Lihat detail"
                    onclick="openDetailModal(
                        `{{ addslashes($poli) }}`,
                        `{{ addslashes($desc) }}`,
                        '{{ $hp }}', '{{ $wa }}', '{{ $status }}',
                        '{{ $imgUrl ?? '' }}',
                        '{{ $ic['bg'] }}', '{{ $ic['color'] }}', '{{ $ic['icon'] }}'
                    )">
                    <i class="fa-solid fa-eye"></i>
                </button>
                <button class="lay-img-action-btn iab-edit" title="Edit layanan"
                    onclick="openEditModal(
                        '{{ $id }}',
                        `{{ addslashes($poli) }}`,
                        `{{ addslashes($desc) }}`,
                        '{{ $hp }}', '{{ $wa }}', '{{ $status }}',
                        '{{ $imgUrl ?? '' }}'
                    )">
                    <i class="fa-solid fa-pen"></i>
                </button>
                <button class="lay-img-action-btn iab-delete" title="Hapus layanan"
                    onclick="openDeleteModal('{{ $id }}','{{ addslashes($poli) }}')">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>

        </div>

        {{-- ---- CARD BODY ---- --}}
        <div class="lay-card-body">
            <div class="lay-card-poli">{{ $poli }}</div>
            <div class="lay-card-desc">{{ $desc }}</div>
        </div>

        {{-- ---- CARD FOOTER ---- --}}
        <div class="lay-card-footer">
            <div style="display:flex;flex-direction:column;gap:5px;">
                @if($hp)
                    <a href="tel:{{ preg_replace('/[^0-9]/', '', $hp) }}" class="lay-phone-badge">
                        <i class="fa-solid fa-phone"></i>
                        {{ $hp }}
                    </a>
                @endif
                @if($wa)
                    <a href="https://wa.me/{{ $wa }}" target="_blank" class="lay-wa-badge">
                        <i class="fa-brands fa-whatsapp"></i>
                        WhatsApp
                    </a>
                @endif
                @if(!$hp && !$wa)
                    <span class="no-contact-label">
                        <i class="fa-solid fa-phone-slash" style="font-size:10px;"></i>
                        Belum ada kontak
                    </span>
                @endif
            </div>
            <div class="lay-foot-actions">
                <button class="btn-icon-sm btn-edit" title="Edit"
                    onclick="openEditModal(
                        '{{ $id }}',
                        `{{ addslashes($poli) }}`,
                        `{{ addslashes($desc) }}`,
                        '{{ $hp }}', '{{ $wa }}', '{{ $status }}',
                        '{{ $imgUrl ?? '' }}'
                    )">
                    <i class="fa-solid fa-pen"></i>
                </button>
                <button class="btn-icon-sm btn-delete" title="Hapus"
                    onclick="openDeleteModal('{{ $id }}','{{ addslashes($poli) }}')">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
        </div>

    </div>
    @empty
    <div class="empty-state">
        <div class="es-icon"><i class="fa-solid fa-stethoscope"></i></div>
        <div class="es-title">Belum Ada Layanan</div>
        <div class="es-sub">Tambahkan layanan poliklinik pertama untuk ditampilkan di website.</div>
        <button class="btn-primary-am" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fa-solid fa-plus"></i> Tambah Layanan
        </button>
    </div>
    @endforelse

</div>



<div class="modal fade am-modal" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <span class="mt-icon"><i class="fa-solid fa-plus"></i></span>
                    Tambah Layanan Poliklinik
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('admin.layanan.store') }}" method="POST"
                  enctype="multipart/form-data" id="formTambah">
                @csrf
                <div class="modal-body">

                    {{-- Gambar --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-image"></i>
                            Foto / Gambar Layanan <span class="opt">(opsional)</span>
                        </div>

                        {{-- Preview --}}
                        <div class="img-preview-wrap" id="tambahPreviewWrap">
                            <img src="" id="tambahPreviewImg" alt="Preview">
                            <div class="img-preview-label">Preview Foto Layanan</div>
                            <div class="img-preview-overlay">
                                <div class="img-preview-actions">
                                    <label class="img-preview-btn ipb-change" style="cursor:pointer;">
                                        <i class="fa-solid fa-arrow-up-from-bracket"></i>
                                        Ganti
                                        <input type="file" name="gambar" id="tambahGambar2"
                                               class="hidden-file-input"
                                               accept="image/jpeg,image/png,image/webp"
                                               onchange="previewImg(this,'tambah')">
                                    </label>
                                    <button type="button" class="img-preview-btn ipb-remove"
                                            onclick="removeImg('tambah')">
                                        <i class="fa-solid fa-trash-can"></i>
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Upload zone --}}
                        <div class="img-upload-zone" id="tambahUploadZone">
                            <input type="file" name="gambar" id="tambahGambar"
                                   accept="image/jpeg,image/png,image/webp"
                                   onchange="previewImg(this,'tambah')">
                            <div class="iuz-icon"><i class="fa-solid fa-cloud-arrow-up"></i></div>
                            <div class="iuz-title">Klik atau seret foto ke sini</div>
                            <div class="iuz-sub">Foto poliklinik, ruang tunggu, atau banner layanan</div>
                            <div class="iuz-formats">
                                <i class="fa-solid fa-image" style="font-size:10px;"></i>
                                JPG, PNG, WebP — Maks. 2 MB
                            </div>
                        </div>
                    </div>

                    {{-- Nama Poli --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-stethoscope"></i>
                            Nama Poliklinik / Layanan <span class="req">*</span>
                        </div>
                        <input type="text" name="poli" class="mfg-input" id="tambahNama"
                            placeholder="Contoh: Poliklinik Spesialis Anak"
                            maxlength="100" required
                            oninput="syncPreview('tambah')">
                        <div class="char-counter" id="tambahNamaCtr">0 / 100</div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-align-left"></i>
                            Deskripsi Layanan <span class="req">*</span>
                        </div>
                        <textarea name="deskripsi" class="mfg-textarea" id="tambahDesc"
                            placeholder="Jelaskan jenis layanan, spesialisasi, dan keunggulannya..."
                            maxlength="500" required></textarea>
                        <div class="char-counter" id="tambahDescCtr">0 / 500</div>
                    </div>

                    {{-- No HP & WhatsApp --}}
<div class="mfg-row mfg">

    {{-- ===================== NO HP ===================== --}}
    <div>
        <div class="mfg-label">
            <i class="fa-solid fa-phone"></i>
            No. HP / Telepon <span class="opt">(opsional)</span>
        </div>

        <div class="phone-wrap">
            <div class="phone-prefix">
                <i class="fa-solid fa-phone" style="font-size:10px;"></i>
                +62
            </div>

            <input type="tel"
                   name="no_hp"
                   class="mfg-input"
                   id="tambahHp"
                   placeholder="289-430822 ext 1"
                   oninput="syncPreview('tambah')">
        </div>

        <div style="font-size:11px;color:var(--text-muted);margin-top:3px;">
            Format: 0289-430822
        </div>
    </div>

    {{-- ===================== WHATSAPP ===================== --}}
    <div>
        <div class="mfg-label">
            <i class="fa-brands fa-whatsapp" style="color:#25D366;font-size:12px;"></i>
            Nomor WhatsApp <span class="opt">(opsional)</span>
        </div>

        <div class="phone-wrap">
            <div class="phone-prefix">
                <i class="fa-brands fa-whatsapp" style="font-size:11px;color:#25D366;"></i>
                +62
            </div>

            <input type="tel"
                   name="no_wa"
                   class="mfg-input"
                   id="tambahWa"
                   placeholder="8289430822"
                   inputmode="numeric"
                   oninput="syncPreview('tambah')">
        </div>

        <div style="font-size:11px;color:var(--text-muted);margin-top:3px;">
            Tanpa angka 0 di depan
        </div>
    </div>

</div>

                    {{-- Status --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-toggle-on"></i>
                            Status Layanan
                        </div>
                        <div class="status-toggle-group">
                            <input type="radio" name="status" id="tambahAktif" value="aktif" checked>
                            <label for="tambahAktif" class="status-aktif">
                                <i class="fa-solid fa-circle-check"></i> Aktif
                            </label>
                            <input type="radio" name="status" id="tambahOff" value="nonaktif">
                            <label for="tambahOff" class="status-off">
                                <i class="fa-solid fa-circle-pause"></i> Nonaktif
                            </label>
                        </div>
                    </div>

                    {{-- Live preview mini --}}
                    <div class="modal-preview-bar">
                        <img src="" id="tambahMpbImg" alt="" class="mpb-img" style="display:none;">
                        <div class="mpb-img-placeholder" id="tambahMpbPlaceholder">
                            <i class="fa-solid fa-stethoscope"></i>
                        </div>
                        <div>
                            <div class="mpb-poli" id="tambahMpbNama">Nama Poliklinik</div>
                            <div class="mpb-phone" id="tambahMpbPhone">
                                <i class="fa-solid fa-phone" style="font-size:9px;"></i>
                                Belum ada no. HP
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Batal
                    </button>
                    <button type="submit" class="btn-save">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Layanan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade am-modal" id="modalEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(135deg,#1e3a5f 0%,#0ea5e9 100%);">
                <h5 class="modal-title">
                    <span class="mt-icon"><i class="fa-solid fa-pen-to-square"></i></span>
                    Edit Layanan Poliklinik
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="" method="POST" enctype="multipart/form-data" id="formEdit">
                @csrf @method('PUT')
                <input type="hidden" name="id" id="editId">
                <input type="hidden" name="hapus_gambar" id="editHapusGambar" value="0">

                <div class="modal-body">

                    {{-- Gambar --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-image"></i>
                            Foto / Gambar Layanan <span class="opt">(opsional)</span>
                        </div>
                        <div style="font-size:11.5px;color:var(--text-muted);margin-bottom:8px;">
                            <i class="fa-solid fa-circle-info" style="color:var(--primary);"></i>
                            Biarkan kosong jika tidak ingin mengganti foto.
                        </div>

                        {{-- Preview (existing + new) --}}
                        <div class="img-preview-wrap" id="editPreviewWrap">
                            <img src="" id="editPreviewImg" alt="Preview">
                            <div class="img-preview-label" id="editPreviewLabel">Foto Saat Ini</div>
                            <div class="img-preview-overlay">
                                <div class="img-preview-actions">
                                    <label class="img-preview-btn ipb-change" style="cursor:pointer;">
                                        <i class="fa-solid fa-arrow-up-from-bracket"></i>
                                        Ganti Foto
                                        <input type="file" name="gambar" id="editGambar2"
                                               class="hidden-file-input"
                                               accept="image/jpeg,image/png,image/webp"
                                               onchange="previewImg(this,'edit')">
                                    </label>
                                    <button type="button" class="img-preview-btn ipb-remove"
                                            onclick="removeImg('edit')">
                                        <i class="fa-solid fa-trash-can"></i>
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Upload zone --}}
                        <div class="img-upload-zone" id="editUploadZone">
                            <input type="file" name="gambar" id="editGambar"
                                   accept="image/jpeg,image/png,image/webp"
                                   onchange="previewImg(this,'edit')">
                            <div class="iuz-icon"><i class="fa-solid fa-arrow-up-from-bracket"></i></div>
                            <div class="iuz-title">Unggah foto baru</div>
                            <div class="iuz-sub">JPG, PNG, WebP — Maks. 2 MB</div>
                        </div>
                    </div>

                    {{-- Nama Poli --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-stethoscope"></i>
                            Nama Poliklinik / Layanan <span class="req">*</span>
                        </div>
                        <input type="text" name="poli" class="mfg-input" id="editNama"
                            placeholder="Nama poliklinik..." maxlength="100" required
                            oninput="syncPreview('edit')">
                        <div class="char-counter" id="editNamaCtr">0 / 100</div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-align-left"></i>
                            Deskripsi Layanan <span class="req">*</span>
                        </div>
                        <textarea name="deskripsi" class="mfg-textarea" id="editDesc"
                            placeholder="Deskripsi layanan..." maxlength="500" required></textarea>
                        <div class="char-counter" id="editDescCtr">0 / 500</div>
                    </div>

                    {{-- No HP & WhatsApp --}}
                    <div class="mfg-row mfg">

                        {{-- ===================== NO HP ===================== --}}
                        <div>
                            <div class="mfg-label">
                                <i class="fa-solid fa-phone"></i>
                                No. HP / Telepon <span class="opt">(opsional)</span>
                            </div>

                            <div class="phone-wrap">
                                <div class="phone-prefix">
                                    <i class="fa-solid fa-phone" style="font-size:10px;"></i>
                                    +62
                                </div>

                                <input type="tel"
                                    name="no_hp"
                                    class="mfg-input"
                                    id="editHp"
                                    placeholder="289-430822 ext 1">
                            </div>
                        </div>

                        {{-- ===================== WHATSAPP ===================== --}}
                        <div>
                            <div class="mfg-label">
                                <i class="fa-brands fa-whatsapp" style="color:#25D366;font-size:12px;"></i>
                                Nomor WhatsApp <span class="opt">(opsional)</span>
                            </div>

                            <div class="phone-wrap">
                                <div class="phone-prefix">
                                    <i class="fa-brands fa-whatsapp" style="font-size:11px;color:#25D366;"></i>
                                    +62
                                </div>

                                <input type="tel"
                                    name="no_wa"
                                    class="mfg-input"
                                    id="editWa"
                                    placeholder="8289430822"
                                    inputmode="numeric">
                            </div>
                        </div>

                    </div>

                    {{-- Status --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-toggle-on"></i>
                            Status Layanan
                        </div>
                        <div class="status-toggle-group">
                            <input type="radio" name="status" id="editAktif" value="aktif">
                            <label for="editAktif" class="status-aktif">
                                <i class="fa-solid fa-circle-check"></i> Aktif
                            </label>
                            <input type="radio" name="status" id="editOff" value="nonaktif">
                            <label for="editOff" class="status-off">
                                <i class="fa-solid fa-circle-pause"></i> Nonaktif
                            </label>
                        </div>
                    </div>

                    {{-- Live preview --}}
                    <div class="modal-preview-bar">
                        <img src="" id="editMpbImg" alt="" class="mpb-img" style="display:none;">
                        <div class="mpb-img-placeholder" id="editMpbPlaceholder">
                            <i class="fa-solid fa-stethoscope"></i>
                        </div>
                        <div>
                            <div class="mpb-poli"  id="editMpbNama">—</div>
                            <div class="mpb-phone" id="editMpbPhone">
                                <i class="fa-solid fa-phone" style="font-size:9px;"></i> —
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Batal
                    </button>
                    <button type="submit" class="btn-save">
                        <i class="fa-solid fa-floppy-disk"></i> Perbarui Layanan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>



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
                    <div class="del-icon"><i class="fa-solid fa-stethoscope"></i></div>
                    <div class="del-title">Hapus Layanan Ini?</div>
                    <div class="del-sub">
                        Data layanan beserta foto yang tersimpan akan dihapus secara permanen.
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

<div class="modal fade am-modal" id="modalDetail" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width:500px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <span class="mt-icon"><i class="fa-solid fa-circle-info"></i></span>
                    Detail Layanan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding:0;">

                {{-- Hero image --}}
                <div id="detImgWrap" style="position:relative;overflow:hidden;">
                    <img src="" id="detImg" class="det-img-hero" alt="" style="display:none;">
                    <div id="detImgPlaceholder" class="det-img-placeholder">
                        <i class="fa-solid fa-stethoscope" id="detPlaceholderIcon"></i>
                    </div>
                    {{-- Gradient overlay on image --}}
                    <div style="position:absolute;bottom:0;left:0;right:0;height:80px;
                                background:linear-gradient(to top,rgba(12,26,46,.8),transparent);
                                display:none;" id="detImgGrad"></div>
                </div>

                <div class="det-body">
                    {{-- Status + Nama --}}
                    <div style="display:flex;align-items:center;gap:10px;margin-bottom:4px;">
                        <span class="lay-status-badge" id="detStatus"
                              style="position:static;font-size:10px;">Aktif</span>
                    </div>
                    <div class="det-poli" id="detPoli">—</div>

                    {{-- Deskripsi --}}
                    <div class="det-section">
                        <div class="det-label">
                            <i class="fa-solid fa-align-left"></i> Deskripsi Layanan
                        </div>
                        <div class="det-value" id="detDesc">—</div>
                    </div>

                    {{-- Kontak --}}
                    <div class="det-section">
                        <div class="det-label">
                            <i class="fa-solid fa-address-book"></i> Informasi Kontak
                        </div>
                        <div id="detContact">—</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@endsection


@push('scripts')
<script>
/* ============================================================
   LAYANAN PAGE — JavaScript
============================================================ */

/* ---- Char counters ---- */
function initCtr(elId, ctrId, max) {
    const el = document.getElementById(elId);
    const ct = document.getElementById(ctrId);
    if (!el || !ct) return;
    const upd = () => {
        const l = el.value.length;
        ct.textContent = `${l} / ${max}`;
        ct.className   = 'char-counter' + (l >= max ? ' over' : l > max*.88 ? ' warn' : '');
    };
    el.addEventListener('input', upd); upd();
}
initCtr('tambahNama', 'tambahNamaCtr', 100);
initCtr('tambahDesc', 'tambahDescCtr', 500);
initCtr('editNama',   'editNamaCtr',   100);
initCtr('editDesc',   'editDescCtr',   500);

/* ---- Image preview ---- */
function previewImg(input, prefix) {
    const file = input.files[0];
    if (!file) return;

    if (!['image/jpeg','image/png','image/webp'].includes(file.type)) {
        alert('Format tidak didukung. Gunakan JPG, PNG, atau WebP.'); input.value = ''; return;
    }
    if (file.size > 2 * 1024 * 1024) {
        alert('Ukuran file terlalu besar. Maksimal 2 MB.'); input.value = ''; return;
    }

    const reader = new FileReader();
    reader.onload = function(e) {
        const previewWrap = document.getElementById(prefix + 'PreviewWrap');
        const previewImg  = document.getElementById(prefix + 'PreviewImg');
        const uploadZone  = document.getElementById(prefix + 'UploadZone');
        const label       = document.getElementById(prefix + 'PreviewLabel');

        previewImg.src = e.target.result;
        previewWrap.classList.add('show');
        uploadZone.style.display = 'none';
        if (label) label.textContent = 'Foto Baru — Belum Tersimpan';

        // Sync mini preview bar
        const mpbImg  = document.getElementById(prefix + 'MpbImg');
        const mpbPlhd = document.getElementById(prefix + 'MpbPlaceholder');
        if (mpbImg)  { mpbImg.src = e.target.result; mpbImg.style.display = 'block'; }
        if (mpbPlhd) mpbPlhd.style.display = 'none';

        // Mark hapus_gambar as 0 (we have new image)
        const hapusFlag = document.getElementById('editHapusGambar');
        if (hapusFlag) hapusFlag.value = '0';
    };
    reader.readAsDataURL(file);
}

function removeImg(prefix) {
    const previewWrap = document.getElementById(prefix + 'PreviewWrap');
    const previewImg  = document.getElementById(prefix + 'PreviewImg');
    const uploadZone  = document.getElementById(prefix + 'UploadZone');
    const mpbImg      = document.getElementById(prefix + 'MpbImg');
    const mpbPlhd     = document.getElementById(prefix + 'MpbPlaceholder');

    previewImg.src = '';
    previewWrap.classList.remove('show');
    uploadZone.style.display = '';

    // Reset both file inputs
    ['','2'].forEach(function(sfx) {
        const inp = document.getElementById(prefix + 'Gambar' + sfx);
        if (inp) inp.value = '';
    });

    // Reset mini preview
    if (mpbImg)  { mpbImg.src = ''; mpbImg.style.display = 'none'; }
    if (mpbPlhd) mpbPlhd.style.display = 'flex';

    // Mark hapus_gambar = 1 (for edit only)
    const hapusFlag = document.getElementById('editHapusGambar');
    if (hapusFlag) hapusFlag.value = '1';
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

/* ---- Mini preview bar sync ---- */
function syncPreview(prefix) {
    const nama  = document.getElementById(prefix + 'Nama')?.value  || 'Nama Poliklinik';
    const hp    = document.getElementById(prefix + 'Hp')?.value    || '';
    const namaEl  = document.getElementById(prefix + 'MpbNama');
    const phoneEl = document.getElementById(prefix + 'MpbPhone');
    if (namaEl)  namaEl.textContent  = nama || 'Nama Poliklinik';
    if (phoneEl) phoneEl.innerHTML =
        `<i class="fa-solid fa-phone" style="font-size:9px;"></i> ${hp || 'Belum ada no. HP'}`;
}

/* ---- Open EDIT modal ---- */
function openEditModal(id, poli, desc, hp, wa, status, imgUrl) {
    document.getElementById('editId').value   = id;
    document.getElementById('editNama').value = poli;
    document.getElementById('editDesc').value = desc;
    document.getElementById('editHp').value   = hp;
    document.getElementById('editWa').value   = wa;
    document.getElementById('editHapusGambar').value = '0';
    document.getElementById('formEdit').action = '{{ url("admin/layanan") }}/' + id;

    // Status
    document.getElementById('editAktif').checked = (status === 'aktif');
    document.getElementById('editOff').checked   = (status !== 'aktif');

    // Image
    const wrap  = document.getElementById('editPreviewWrap');
    const img   = document.getElementById('editPreviewImg');
    const zone  = document.getElementById('editUploadZone');
    const label = document.getElementById('editPreviewLabel');
    const mpbImg  = document.getElementById('editMpbImg');
    const mpbPlhd = document.getElementById('editMpbPlaceholder');

    if (imgUrl && imgUrl.trim() !== '') {
        img.src = imgUrl;
        wrap.classList.add('show');
        zone.style.display = 'none';
        if (label) label.textContent = 'Foto Saat Ini';
        if (mpbImg)  { mpbImg.src = imgUrl; mpbImg.style.display = 'block'; }
        if (mpbPlhd) mpbPlhd.style.display = 'none';
    } else {
        img.src = '';
        wrap.classList.remove('show');
        zone.style.display = '';
        if (mpbImg)  { mpbImg.src = ''; mpbImg.style.display = 'none'; }
        if (mpbPlhd) mpbPlhd.style.display = 'flex';
    }

    // Reset file inputs
    ['editGambar','editGambar2'].forEach(i => {
        const el = document.getElementById(i); if (el) el.value = '';
    });

    // Trigger counters & sync
    ['editNama','editDesc'].forEach(i => document.getElementById(i).dispatchEvent(new Event('input')));
    document.getElementById('editMpbNama').textContent = poli;
    document.getElementById('editMpbPhone').innerHTML =
        `<i class="fa-solid fa-phone" style="font-size:9px;"></i> ${hp || 'Belum ada no. HP'}`;

    new bootstrap.Modal(document.getElementById('modalEdit')).show();
}

/* ---- Open DELETE modal ---- */
function openDeleteModal(id, poli) {
    document.getElementById('formHapus').action      = '{{ url("admin/layanan") }}/' + id;
    document.getElementById('delTarget').textContent = poli;
    new bootstrap.Modal(document.getElementById('modalHapus')).show();
}

/* ---- Open DETAIL modal ---- */
function openDetailModal(poli, desc, hp, wa, status, imgUrl, bg, color, icon) {
    // Nama & status
    document.getElementById('detPoli').textContent = poli;
    document.getElementById('detDesc').textContent = desc;

    const statusEl = document.getElementById('detStatus');
    statusEl.className = 'lay-status-badge ' + status;
    statusEl.textContent = (status === 'aktif') ? 'Aktif' : 'Nonaktif';

    // Image / placeholder
    const detImg   = document.getElementById('detImg');
    const detPlhd  = document.getElementById('detImgPlaceholder');
    const detGrad  = document.getElementById('detImgGrad');
    const detPIcon = document.getElementById('detPlaceholderIcon');

    if (imgUrl && imgUrl.trim() !== '') {
        detImg.src = imgUrl;
        detImg.style.display = 'block';
        detPlhd.style.display = 'none';
        if (detGrad) detGrad.style.display = 'block';
    } else {
        detImg.style.display = 'none';
        detPlhd.style.display = 'flex';
        detPlhd.style.background = bg;
        detPlhd.style.color      = color;
        detPIcon.className = icon;
        if (detGrad) detGrad.style.display = 'none';
    }

    // Contact
    const contactEl = document.getElementById('detContact');
    let html = '';
    if (hp) html += `
        <a href="tel:${hp.replace(/[^0-9]/g,'')}" class="lay-phone-badge" style="display:inline-flex;margin-bottom:8px;">
            <i class="fa-solid fa-phone"></i> ${hp}
        </a><br>`;
    if (wa) html += `
        <a href="https://wa.me/${wa}" target="_blank" class="lay-wa-badge" style="display:inline-flex;">
            <i class="fa-brands fa-whatsapp"></i> Chat via WhatsApp
        </a>`;
    if (!hp && !wa) html = '<span class="no-contact-label"><i class="fa-solid fa-phone-slash" style="font-size:10px;"></i> Belum ada informasi kontak</span>';
    contactEl.innerHTML = html;

    new bootstrap.Modal(document.getElementById('modalDetail')).show();
}

/* ---- Reset tambah modal on close ---- */
document.getElementById('modalTambah').addEventListener('hidden.bs.modal', function () {
    document.getElementById('formTambah').reset();
    removeImg('tambah');
    document.getElementById('tambahMpbNama').textContent  = 'Nama Poliklinik';
    document.getElementById('tambahMpbPhone').innerHTML   =
        '<i class="fa-solid fa-phone" style="font-size:9px;"></i> Belum ada no. HP';
    ['tambahNamaCtr','tambahDescCtr'].forEach(id => {
        const el = document.getElementById(id);
        if (el) el.textContent = '0 / ' + (id.includes('Nama') ? '100' : '500');
    });
});

/* ---- Live search ---- */
document.getElementById('searchLay').addEventListener('input', function () {
    const q = this.value.toLowerCase();
    document.querySelectorAll('.lay-card').forEach(function (card) {
        const t = card.dataset.poli || '';
        card.style.display = (!q || t.includes(q)) ? '' : 'none';
    });
});

/* ---- Filter status ---- */
document.getElementById('filterStatus').addEventListener('change', function () {
    const val = this.value;
    document.querySelectorAll('.lay-card').forEach(function (card) {
        card.style.display = (!val || card.dataset.status === val) ? '' : 'none';
    });
});
</script>
@endpush