@extends('admin.layout')

@section('title', 'Data Dokter')
@section('page-title', 'Data Dokter')

@section('breadcrumb')
    <li class="breadcrumb-item active">Data Dokter</li>
@endsection

@push('styles')
<style>
/* ============================================================
   DATA DOKTER PAGE — Allam Medica Admin
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
.dok-stats { display: flex; gap: 12px; margin-bottom: 24px; flex-wrap: wrap; }
.dok-stat {
    flex: 1; min-width: 130px; background: var(--card-bg);
    border: 1px solid var(--border-color); border-radius: var(--radius);
    padding: 16px 20px; display: flex; align-items: center; gap: 14px;
    box-shadow: var(--shadow-sm);
    transition: box-shadow var(--transition), transform var(--transition);
}
.dok-stat:hover { box-shadow: var(--shadow-md); transform: translateY(-2px); }
.dok-stat-icon {
    width: 42px; height: 42px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; flex-shrink: 0;
}
.dok-stat-val {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 22px; font-weight: 800; color: var(--text-main); line-height: 1;
}
.dok-stat-lbl { font-size: 12px; color: var(--text-muted); margin-top: 3px; font-weight: 500; }

/* ---- Toolbar ---- */
.dok-toolbar {
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
    padding: 9px 28px 9px 12px; border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm); font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px; color: var(--text-main); outline: none; background: var(--body-bg);
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%2364748b' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
    background-repeat: no-repeat; background-position: right 10px center; cursor: pointer;
}
.filter-select:focus { border-color: var(--primary); outline: none; }

/* ============================================================
   CARDS GRID
============================================================ */
.dok-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 20px;
}

/* ---- Dokter Card ---- */
.dok-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    display: flex; flex-direction: column;
    transition: box-shadow var(--transition), transform var(--transition);
    animation: cardIn .35s ease both;
    position: relative;
    text-align: center;
}
@keyframes cardIn {
    from { opacity: 0; transform: translateY(14px); }
    to   { opacity: 1; transform: translateY(0); }
}
.dok-card:nth-child(1){animation-delay:.04s} .dok-card:nth-child(2){animation-delay:.08s}
.dok-card:nth-child(3){animation-delay:.12s} .dok-card:nth-child(4){animation-delay:.16s}
.dok-card:nth-child(5){animation-delay:.20s} .dok-card:nth-child(6){animation-delay:.24s}
.dok-card:hover { box-shadow: 0 10px 36px rgba(14,165,233,.15); transform: translateY(-4px); }

/* Photo area */
.dok-photo-wrap {
    position: relative; overflow: hidden;
    width: 100%; aspect-ratio: 3/4;
    background: var(--body-bg); flex-shrink: 0;
}
.dok-photo-wrap img {
    width: 100%; height: 100%; object-fit: cover;
    object-position: top center;
    transition: transform .4s ease;
}
.dok-card:hover .dok-photo-wrap img { transform: scale(1.05); }

/* Photo placeholder */
.dok-photo-placeholder {
    width: 100%; height: 100%;
    display: flex; flex-direction: column;
    align-items: center; justify-content: center; gap: 10px;
}
.dok-placeholder-avatar {
    width: 80px; height: 80px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 30px; font-weight: 800; color: #fff;
}
.dok-placeholder-label {
    font-size: 11px; font-weight: 700; text-transform: uppercase;
    letter-spacing: .7px; opacity: .5;
}

/* Spesialis badge on image */
.dok-spesialis-badge {
    position: absolute; bottom: 0; left: 0; right: 0;
    background: linear-gradient(to top, rgba(12,26,46,.9) 0%, rgba(12,26,46,.0) 100%);
    padding: 24px 12px 10px;
    display: flex; justify-content: center;
}
.dok-spesialis-pill {
    display: inline-flex; align-items: center; gap: 5px;
    background: rgba(14,165,233,.85);
    backdrop-filter: blur(8px);
    color: #fff; font-size: 10px; font-weight: 800;
    text-transform: uppercase; letter-spacing: .6px;
    padding: 4px 12px; border-radius: 20px;
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    max-width: 90%;
}

/* Hover admin action overlay */
.dok-hover-actions {
    position: absolute; inset: 0;
    background: rgba(12,26,46,.55);
    backdrop-filter: blur(3px);
    display: flex; align-items: center; justify-content: center;
    gap: 10px;
    opacity: 0; transition: opacity var(--transition);
}
.dok-card:hover .dok-hover-actions { opacity: 1; }
.dok-action-btn {
    width: 42px; height: 42px; border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-size: 16px; cursor: pointer; border: none;
    transition: transform var(--transition), box-shadow var(--transition);
}
.dok-action-btn:hover { transform: scale(1.12); }
.dab-view   { background: #fff; color: var(--primary); }
.dab-edit   { background: var(--primary); color: #fff; box-shadow: 0 4px 12px rgba(14,165,233,.4); }
.dab-delete { background: #ef4444; color: #fff; box-shadow: 0 4px 12px rgba(239,68,68,.4); }

/* Card body */
.dok-card-body {
    padding: 16px 14px 8px;
    flex: 1; display: flex; flex-direction: column; align-items: center;
}
.dok-name {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 14px; font-weight: 800; color: var(--text-main);
    line-height: 1.3; margin-bottom: 4px;
}
.dok-spesialis-text {
    font-size: 12px; color: var(--text-muted); font-weight: 500;
    display: flex; align-items: center; gap: 4px;
}
.dok-spesialis-text i { font-size: 10px; color: var(--primary); }

/* Card footer */
.dok-card-footer {
    display: flex; align-items: center; justify-content: center;
    gap: 6px; padding: 10px 14px 14px;
}
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
.empty-state .es-sub   { font-size: 13.5px; margin-bottom: 20px; }

/* ============================================================
   MODAL
============================================================ */
.am-modal .modal-dialog { max-width: 580px; }
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
.am-modal .modal-body {
    padding: 26px 26px 8px;
    max-height: 70vh;
    overflow-y: auto;
}
.am-modal .modal-body::-webkit-scrollbar {
    width: 6px;
}

.am-modal .modal-body::-webkit-scrollbar-thumb {
    background: rgba(14,165,233,.4);
    border-radius: 10px;
}

.am-modal .modal-body::-webkit-scrollbar-track {
    background: transparent;
}
.am-modal .modal-footer { padding: 14px 26px 22px; border: none; gap: 10px; }

/* Form */
.mfg { margin-bottom: 18px; }
.mfg:last-child { margin-bottom: 0; }
.mfg-label {
    font-size: 12.5px; font-weight: 700; color: var(--text-main);
    margin-bottom: 6px; display: flex; align-items: center; gap: 6px;
}
.mfg-label i  { color: var(--primary); font-size: 11px; }
.mfg-label .req { color: #ef4444; }
.mfg-label .opt { color: var(--text-muted); font-size: 11px; font-weight: 500; }
.mfg-input, .mfg-select, .mfg-textarea {
    width: 100%; padding: 10px 13px;
    border: 1.5px solid var(--border-color); border-radius: var(--radius-sm);
    font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13.5px; color: var(--text-main);
    outline: none; background: var(--body-bg);
    transition: border-color var(--transition), box-shadow var(--transition), background var(--transition);
}
.mfg-input:focus, .mfg-select:focus, .mfg-textarea:focus {
    border-color: var(--primary); box-shadow: 0 0 0 3px rgba(14,165,233,.12); background: #fff;
}
.mfg-textarea { min-height: 80px; resize: vertical; line-height: 1.6; }
.mfg-input::placeholder { color: #b0bec5; }

/* Input with icon prefix */
.mfg-input-wrap { position: relative; }
.mfg-input-wrap .pfx-icon {
    position: absolute; left: 13px; top: 50%;
    transform: translateY(-50%); color: var(--text-muted); font-size: 13px; pointer-events: none;
}
.mfg-input-wrap.has-pfx .mfg-input { padding-left: 36px; }

/* ---- Photo upload zone ---- */
.photo-upload-zone {
    border: 2px dashed var(--border-color);
    border-radius: var(--radius-sm);
    padding: 0; text-align: center;
    cursor: pointer; background: var(--body-bg);
    position: relative; overflow: hidden;
    transition: border-color var(--transition), background var(--transition);
    aspect-ratio: 3/2;
    display: flex; align-items: center; justify-content: center;
}
.photo-upload-zone:hover,
.photo-upload-zone.dragover { border-color: var(--primary); background: var(--primary-light); }
.photo-upload-zone input[type="file"] {
    position: absolute; inset: 0; opacity: 0; cursor: pointer; width: 100%; height: 100%;
}
.puz-inner { display: flex; flex-direction: column; align-items: center; gap: 8px; padding: 20px; }
.puz-icon {
    width: 56px; height: 56px; border-radius: 50%;
    background: var(--primary-light); color: var(--primary);
    display: flex; align-items: center; justify-content: center;
    font-size: 22px; transition: background var(--transition), color var(--transition);
}
.photo-upload-zone:hover .puz-icon { background: var(--primary); color: #fff; }
.puz-title { font-size: 13.5px; font-weight: 700; color: var(--text-main); }
.puz-sub   { font-size: 12px; color: var(--text-muted); }
.puz-hint  {
    display: inline-flex; align-items: center; gap: 5px;
    font-size: 11.5px; color: var(--primary);
    background: rgba(14,165,233,.1); padding: 3px 10px; border-radius: 20px;
}

/* ---- Photo preview ---- */
.photo-preview-wrap {
    display: none; position: relative;
    border-radius: var(--radius-sm); overflow: hidden;
    border: 1.5px solid var(--border-color);
    aspect-ratio: 3/2;
}
.photo-preview-wrap.show { display: block; }
.photo-preview-wrap img  {
    width: 100%; height: 100%; object-fit: cover;
    object-position: top center; display: block;
}
.photo-preview-overlay {
    position: absolute; inset: 0;
    background: rgba(12,26,46,.55);
    display: flex; align-items: center; justify-content: center;
    gap: 8px; opacity: 0; transition: opacity var(--transition);
}
.photo-preview-wrap:hover .photo-preview-overlay { opacity: 1; }
.ppb {
    display: flex; align-items: center; gap: 6px;
    padding: 8px 14px; border-radius: 8px; border: none;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 12px; font-weight: 700; cursor: pointer;
}
.ppb:hover { transform: scale(1.04); }
.ppb-change { background: #fff; color: var(--primary); }
.ppb-remove { background: #ef4444; color: #fff; }
.ppb-change input { display: none; }
.photo-preview-label {
    position: absolute; bottom: 0; left: 0; right: 0;
    background: rgba(12,26,46,.75); backdrop-filter: blur(4px);
    color: #fff; font-size: 10.5px; font-weight: 700;
    padding: 5px 12px; text-align: center;
    text-transform: uppercase; letter-spacing: .6px;
}

/* Spesialis select + custom --*/
.spesialis-datalist-wrap { position: relative; }

/* Char counter */
.char-counter { font-size: 11px; color: var(--text-muted); text-align: right; margin-top: 3px; }
.char-counter.warn { color: var(--warning); }
.char-counter.over { color: var(--danger); }

/* Live preview card inside modal */
.modal-dok-preview {
    background: linear-gradient(135deg, var(--sidebar-bg), #1e3a5f);
    border-radius: var(--radius-sm); padding: 16px;
    display: flex; align-items: center; gap: 14px; margin-top: 16px;
    overflow: hidden; position: relative;
}
.modal-dok-preview::after {
    content: ''; position: absolute; right: -30px; top: -30px;
    width: 100px; height: 100px; border-radius: 50%;
    background: rgba(14,165,233,.08); pointer-events: none;
}
.mdp-photo {
    width: 56px; height: 56px; border-radius: 12px;
    object-fit: cover; object-position: top;
    flex-shrink: 0; border: 2px solid rgba(255,255,255,.15);
}
.mdp-placeholder {
    width: 56px; height: 56px; border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 20px; font-weight: 800; color: #fff; flex-shrink: 0;
    background: linear-gradient(135deg, var(--primary), var(--accent));
}
.mdp-name { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 14px; font-weight: 700; color: #fff; }
.mdp-spesialis {
    font-size: 12px; color: rgba(255,255,255,.55); margin-top: 3px;
    display: flex; align-items: center; gap: 5px;
}
.mdp-spesialis i { font-size: 10px; color: var(--primary); }

/* Buttons */
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
.del-dok-photo {
    width: 64px; height: 64px; border-radius: 50%;
    object-fit: cover; object-position: top;
    margin: 0 auto 14px; display: block;
    border: 3px solid #fee2e2;
    box-shadow: 0 4px 12px rgba(239,68,68,.2);
}
.del-dok-avatar {
    width: 64px; height: 64px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 22px; font-weight: 800; color: #fff;
    margin: 0 auto 14px;
    background: linear-gradient(135deg, #ef4444, #dc2626);
    box-shadow: 0 4px 12px rgba(239,68,68,.3);
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
.det-photo-hero {
    width: 100%; aspect-ratio: 3/2;
    object-fit: cover; object-position: top center; display: block;
}
.det-photo-placeholder {
    width: 100%; aspect-ratio: 3/2;
    display: flex; align-items: center; justify-content: center;
    font-size: 72px;
}
.det-body { padding: 20px 24px; }
.det-name { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 20px; font-weight: 800; color: var(--text-main); margin-bottom: 6px; }
.det-spesialis-tag {
    display: inline-flex; align-items: center; gap: 6px;
    background: var(--primary-light); color: var(--primary-dark);
    font-size: 12px; font-weight: 700; padding: 5px 14px; border-radius: 20px;
    border: 1px solid rgba(14,165,233,.2);
}
.det-section { margin-top: 16px; padding-top: 16px; border-top: 1px solid var(--border-color); }
.det-label {
    font-size: 11px; font-weight: 700; color: var(--text-muted);
    text-transform: uppercase; letter-spacing: .8px; margin-bottom: 6px;
}
.det-val { font-size: 13.5px; color: var(--text-main); line-height: 1.6; }

/* Responsive */
@media(max-width:1199.98px) { .dok-grid { grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); } }
@media(max-width:767.98px) {
    .dok-grid { grid-template-columns: repeat(2, 1fr); gap: 14px; }
    .dok-stats { gap: 8px; }
    .dok-stat  { min-width: 120px; }
    .dok-toolbar { flex-direction: column; align-items: stretch; }
    .am-modal .modal-body   { padding: 18px 16px 8px; }
    .am-modal .modal-footer { padding: 12px 16px 20px; }
}
@media(max-width:479.98px) { .dok-grid { grid-template-columns: 1fr; } }

/* =========================================================
   ADMIN PAGINATION GLOBAL (BERITA / DOKTER / BANNER)
========================================================= */

.admin-pagination{
    margin-top: 24px;
    padding: 16px 20px;
    background: #fff;
    border: 1px solid #edf1f7;
    border-radius: 16px;

    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    flex-wrap: wrap;
}

/* info text */
.admin-pagination .pag-info{
    font-size: 14px;
    font-weight: 500;
    color: #64748b;
}

/* hide default laravel small text */
.admin-pagination .small{
    display: none !important;
}

/* pagination container */
.admin-pagination .pagination{
    margin: 0;
    gap: 6px;
}

/* button */
.admin-pagination .page-link{
    min-width: 38px;
    height: 38px;

    border-radius: 10px !important;
    border: 1px solid #e2e8f0;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #fff;
    color: #334155;

    font-size: 14px;
    font-weight: 600;

    transition: .2s ease;
}

/* hover */
.admin-pagination .page-link:hover{
    background: #2563eb;
    border-color: #2563eb;
    color: #fff;
}

/* active */
.admin-pagination .active .page-link{
    background: #2563eb;
    border-color: #2563eb;
    color: #fff;
}

/* disabled */
.admin-pagination .disabled .page-link{
    opacity: .5;
}

/* svg icon */
.admin-pagination svg{
    width: 15px !important;
    height: 15px !important;
}

/* responsive */
@media(max-width:768px){
    .admin-pagination{
        flex-direction: column;
        text-align: center;
    }

    .admin-pagination .pagination{
        justify-content: center;
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
        <div class="ph-title">Data Dokter</div>
        <div class="ph-sub">Kelola profil dokter yang bertugas di RSU Allam Medica</div>
    </div>
    <button class="btn-primary-am" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="fa-solid fa-user-doctor"></i>
        Tambah Dokter
    </button>
</div>

{{-- ================================================================
     STATS STRIP
================================================================ --}}
<div class="dok-stats">
    <div class="dok-stat">
        <div class="dok-stat-icon" style="background:#e0f2fe;color:#0284c7;">
            <i class="fa-solid fa-user-doctor"></i>
        </div>
        <div>
            <div class="dok-stat-val">{{ isset($dokter) ? $dokter->total() : 8 }}</div>
            <div class="dok-stat-lbl">Total Dokter</div>
        </div>
    </div>
    <div class="dok-stat">
        <div class="dok-stat-icon" style="background:#d1fae5;color:#059669;">
            <i class="fa-solid fa-image"></i>
        </div>
        <div>
            <div class="dok-stat-val">{{ $totalDenganFoto ?? 0 }}</div>
            <div class="dok-stat-lbl">Punya Foto</div>
        </div>
    </div>
    <div class="dok-stat">
        <div class="dok-stat-icon" style="background:#ede9fe;color:#7c3aed;">
            <i class="fa-solid fa-stethoscope"></i>
        </div>
        <div>
            <div class="dok-stat-val">{{ $totalSpesialis ?? 5 }}</div>
            <div class="dok-stat-lbl">Spesialis</div>
        </div>
    </div>
    <div class="dok-stat">
        <div class="dok-stat-icon" style="background:#fef3c7;color:#d97706;">
            <i class="fa-solid fa-calendar-plus"></i>
        </div>
        <div>
            <div class="dok-stat-val">{{ $baru ?? 1 }}</div>
            <div class="dok-stat-lbl">Baru Ditambah</div>
        </div>
    </div>
</div>

{{-- ================================================================
     TOOLBAR
================================================================ --}}
<div class="dok-toolbar">
    <div class="search-wrap">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="search" class="search-input" id="searchDok"
               placeholder="Cari nama dokter atau spesialis...">
    </div>
    <select class="filter-select" id="filterSpesialis">
        <option value="">Semua Spesialis</option>
        <option value="umum">Dokter Umum</option>
        <option value="anak">Spesialis Anak</option>
        <option value="penyakit-dalam">Penyakit Dalam</option>
        <option value="tht">THT</option>
        <option value="mata">Mata</option>
        <option value="kandungan">Kandungan & Kebidanan</option>
        <option value="gigi">Gigi</option>
        <option value="bedah">Bedah</option>
        <option value="jantung">Jantung</option>
        <option value="kulit">Dermatologi</option>
        <option value="saraf">Saraf</option>
    </select>
    <select class="filter-select" id="filterSort">
        <option value="az">A – Z</option>
        <option value="za">Z – A</option>
        <option value="newest">Terbaru</option>
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
     DUMMY DATA
================================================================ --}}
@php
$gradients = [
    'linear-gradient(135deg,#0ea5e9,#06b6d4)',
    'linear-gradient(135deg,#8b5cf6,#6d28d9)',
    'linear-gradient(135deg,#10b981,#059669)',
    'linear-gradient(135deg,#f59e0b,#d97706)',
    'linear-gradient(135deg,#ef4444,#dc2626)',
    'linear-gradient(135deg,#ec4899,#be185d)',
    'linear-gradient(135deg,#3b82f6,#1d4ed8)',
    'linear-gradient(135deg,#14b8a6,#0d9488)',
];
$bgGrads = [
    'linear-gradient(135deg,#e0f2fe,#cffafe)',
    'linear-gradient(135deg,#ede9fe,#ddd6fe)',
    'linear-gradient(135deg,#d1fae5,#a7f3d0)',
    'linear-gradient(135deg,#fef3c7,#fde68a)',
    'linear-gradient(135deg,#fee2e2,#fecaca)',
    'linear-gradient(135deg,#fce7f3,#fbcfe8)',
    'linear-gradient(135deg,#dbeafe,#bfdbfe)',
    'linear-gradient(135deg,#ccfbf1,#99f6e4)',
];
$dummyDokter = [
    ['id'=>1,'nama'=>'dr. Hendra Kusuma','spesialis'=>'Dokter Umum','gambar'=>null],
    ['id'=>2,'nama'=>'dr. Sari Dewi, Sp.A','spesialis'=>'Spesialis Anak','gambar'=>null],
    ['id'=>3,'nama'=>'drg. Rina Putri','spesialis'=>'Dokter Gigi','gambar'=>null],
    ['id'=>4,'nama'=>'dr. Budi Santoso, Sp.PD','spesialis'=>'Penyakit Dalam','gambar'=>null],
    ['id'=>5,'nama'=>'dr. Laila Anisa, Sp.OG','spesialis'=>'Kandungan & Kebidanan','gambar'=>null],
    ['id'=>6,'nama'=>'dr. Teguh Wibowo, Sp.M','spesialis'=>'Spesialis Mata','gambar'=>null],
    ['id'=>7,'nama'=>'dr. Nisa Rahmawati, Sp.KK','spesialis'=>'Dermatologi & Estetika','gambar'=>null],
    ['id'=>8,'nama'=>'dr. Yoga Pratama, Sp.THT','spesialis'=>'THT','gambar'=>null],
];
$listDokter = isset($dokter) ? $dokter->items() : $dummyDokter;
@endphp

{{-- ================================================================
     CARDS GRID
================================================================ --}}
<div class="dok-grid" id="dokGrid">

    @forelse($listDokter as $i => $item)
    @php
        $id        = $item['id']        ?? $item->id;
        $nama      = $item['nama']      ?? $item->nama;
        $spesialis = $item['spesialis'] ?? $item->spesialis;
        $foto      = $item['foto'] ?? $item->foto ?? null;
        $imgUrl    = $foto ? asset('uploads/dokter/' . $foto) : null;
        $inisial   = strtoupper(substr(ltrim($nama, 'dr. drg. '), 0, 1));
        $grad      = $gradients[$i % count($gradients)];
        $bgGrad    = $bgGrads[$i % count($bgGrads)];
    @endphp

    <div class="dok-card"
         data-id="{{ $id }}"
         data-nama="{{ strtolower($nama) }}"
         data-spesialis="{{ strtolower(str_replace(' ', '-', $spesialis)) }}">

        {{-- Photo --}}
        <div class="dok-photo-wrap">
            @if($imgUrl)
                <img src="{{ $imgUrl }}" alt="{{ $nama }}" loading="lazy">
            @else
                <div class="dok-photo-placeholder" style="background:{{ $bgGrad }};">
                    <div class="dok-placeholder-avatar" style="background:{{ $grad }};">
                        {{ $inisial }}
                    </div>
                    <span class="dok-placeholder-label" style="color:#475569;">Belum ada foto</span>
                </div>
            @endif

            {{-- Spesialis badge overlay --}}
            <div class="dok-spesialis-badge">
                <span class="dok-spesialis-pill">
                    <i class="fa-solid fa-stethoscope" style="font-size:9px;"></i>
                    {{ $spesialis }}
                </span>
            </div>

            {{-- Admin hover actions --}}
            <div class="dok-hover-actions">
                <button class="dok-action-btn dab-view" title="Detail dokter"
                    onclick="openDetailModal(
                        `{{ addslashes($nama) }}`,
                        `{{ addslashes($spesialis) }}`,
                        '{{ $imgUrl ?? '' }}',
                        '{{ $inisial }}',
                        '{{ $grad }}',
                        '{{ $bgGrad }}'
                    )">
                    <i class="fa-solid fa-eye"></i>
                </button>
                <button class="dok-action-btn dab-edit" title="Edit dokter"
                    onclick="openEditModal(
                        '{{ $id }}',
                        `{{ addslashes($nama) }}`,
                        `{{ addslashes($spesialis) }}`,
                        '{{ $imgUrl ?? '' }}'
                    )">
                    <i class="fa-solid fa-pen"></i>
                </button>
                <button class="dok-action-btn dab-delete" title="Hapus dokter"
                    onclick="openDeleteModal(
                        '{{ $id }}',
                        `{{ addslashes($nama) }}`,
                        '{{ $imgUrl ?? '' }}',
                        '{{ $inisial }}',
                        '{{ $grad }}'
                    )">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
        </div>

        {{-- Card body --}}
        <div class="dok-card-body">
            <div class="dok-name">{{ $nama }}</div>
            <div class="dok-spesialis-text">
                <i class="fa-solid fa-stethoscope"></i>
                {{ $spesialis }}
            </div>
        </div>

        {{-- Footer actions --}}
        <div class="dok-card-footer">
            <button class="btn-icon-sm btn-view" title="Detail"
                onclick="openDetailModal(
                    `{{ addslashes($nama) }}`,
                    `{{ addslashes($spesialis) }}`,
                    '{{ $imgUrl ?? '' }}',
                    '{{ $inisial }}','{{ $grad }}','{{ $bgGrad }}'
                )">
                <i class="fa-solid fa-eye"></i>
            </button>
            <button class="btn-icon-sm btn-edit" title="Edit"
                onclick="openEditModal(
                    '{{ $id }}',
                    `{{ addslashes($nama) }}`,
                    `{{ addslashes($spesialis) }}`,
                    '{{ $imgUrl ?? '' }}'
                )">
                <i class="fa-solid fa-pen"></i>
            </button>
            <button class="btn-icon-sm btn-delete" title="Hapus"
                onclick="openDeleteModal(
                    '{{ $id }}',
                    `{{ addslashes($nama) }}`,
                    '{{ $imgUrl ?? '' }}',
                    '{{ $inisial }}','{{ $grad }}'
                )">
                <i class="fa-solid fa-trash-can"></i>
            </button>
        </div>

    </div>
    @empty
    <div class="empty-state">
        <div class="es-icon"><i class="fa-solid fa-user-doctor"></i></div>
        <div class="es-title">Belum Ada Data Dokter</div>
        <div class="es-sub">Tambahkan profil dokter pertama untuk ditampilkan di website.</div>
        <button class="btn-primary-am" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fa-solid fa-plus"></i> Tambah Dokter
        </button>
    </div>
    @endforelse

</div>

{{-- ================================================================
     PAGINATION
================================================================ --}}
@if(isset($dokter) && $dokter->hasPages())
<div class="admin-pagination">

    <div class="pag-info">
        Menampilkan {{ $dokter->firstItem() }}–{{ $dokter->lastItem() }}
        dari {{ $dokter->total() }} dokter
    </div>

    {{ $dokter->withQueryString()->links() }}

</div>
@endif


{{-- ================================================================
     MODAL: TAMBAH DOKTER
================================================================ --}}
<div class="modal fade am-modal" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    <span class="mt-icon">
                        <i class="fa-solid fa-user-doctor"></i>
                    </span>
                    Tambah Data Dokter
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('admin.dokter.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  id="formTambah">

                @csrf

                <div class="modal-body">

                    <div class="mfg">

                        <div class="mfg-label">
                            <i class="fa-solid fa-camera"></i>
                            Foto Dokter
                            <span class="opt">(opsional)</span>
                        </div>

                        <div class="photo-preview-wrap" id="tambahPreviewWrap">

                            <img src=""
                                 id="tambahPreviewImg"
                                 alt="Preview Foto Dokter">

                            <div class="photo-preview-label"
                                 id="tambahPreviewLabel">
                                Foto Dokter
                            </div>

                            <div class="photo-preview-overlay">

                                <div style="display:flex;gap:8px;">

                                    <label class="ppb ppb-change">

                                        <i class="fa-solid fa-arrow-up-from-bracket"></i>
                                        Ganti

                                        <input type="file"
                                               name="foto"
                                               id="tambahFoto2"
                                               accept="image/jpeg,image/png,image/webp"
                                               onchange="previewPhoto(this,'tambah')">

                                    </label>

                                    <button type="button"
                                            class="ppb ppb-remove"
                                            onclick="removePhoto('tambah')">

                                        <i class="fa-solid fa-trash-can"></i>
                                        Hapus

                                    </button>

                                </div>

                            </div>

                        </div>

                        <div class="photo-upload-zone" id="tambahUploadZone">

                            <input type="file"
                                   name="foto"
                                   id="tambahFoto"
                                   accept="image/jpeg,image/png,image/webp"
                                   onchange="previewPhoto(this,'tambah')">

                            <div class="puz-inner">

                                <div class="puz-icon">
                                    <i class="fa-solid fa-camera"></i>
                                </div>

                                <div class="puz-title">
                                    Klik atau seret foto dokter
                                </div>

                                <div class="puz-sub">
                                    Foto wajah / setengah badan dokter
                                </div>

                                <div class="puz-hint">
                                    <i class="fa-solid fa-image"
                                       style="font-size:10px;"></i>

                                    JPG, PNG, WebP — Maks. 5 MB
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="mfg">

                        <div class="mfg-label">
                            <i class="fa-solid fa-user-doctor"></i>
                            Nama Dokter
                            <span class="req">*</span>
                        </div>

                        <div class="mfg-input-wrap has-pfx">

                            <i class="pfx-icon fa-solid fa-user-doctor"></i>

                            <input type="text"
                                   name="nama"
                                   class="mfg-input"
                                   id="tambahNama"
                                   placeholder="Contoh: dr. Budi Santoso, Sp.PD"
                                   maxlength="100"
                                   required
                                   oninput="syncPreview('tambah')">

                        </div>

                        <div style="font-size:11px;color:var(--text-muted);margin-top:3px;">
                            Sertakan gelar lengkap (dr. / drg. / Sp.XX)
                        </div>

                        <div class="char-counter" id="tambahNamaCtr">
                            0 / 100
                        </div>

                    </div>

                    <div class="mfg">

                        <div class="mfg-label">
                            <i class="fa-solid fa-stethoscope"></i>
                            Dokter Spesialis
                            <span class="req">*</span>
                        </div>

                        <select class="mfg-select"
                                id="tambahSpesialisSelect"
                                onchange="onSpesialisSelect('tambah')">

                            <option value="">
                                -- Pilih atau ketik spesialis --
                            </option>

                            <option value="Dokter Umum">
                                Dokter Umum
                            </option>

                            <option value="Dokter Gigi">
                                Dokter Gigi
                            </option>

                            <option value="Spesialis Anak">
                                Spesialis Anak
                            </option>

                            <option value="Penyakit Dalam">
                                Penyakit Dalam
                            </option>

                            <option value="THT">
                                THT (Telinga, Hidung, Tenggorokan)
                            </option>

                            <option value="Spesialis Mata">
                                Spesialis Mata
                            </option>

                            <option value="Kandungan & Kebidanan">
                                Kandungan & Kebidanan
                            </option>

                            <option value="Dermatologi & Estetika">
                                Dermatologi & Estetika
                            </option>

                            <option value="Bedah Umum">
                                Bedah Umum
                            </option>

                            <option value="Jantung & Pembuluh Darah">
                                Jantung & Pembuluh Darah
                            </option>

                            <option value="Saraf">
                                Saraf
                            </option>

                            <option value="Ortopedi">
                                Ortopedi
                            </option>

                            <option value="Anestesi">
                                Anestesi
                            </option>

                            <option value="Radiologi">
                                Radiologi
                            </option>

                            <option value="Patologi Klinik">
                                Patologi Klinik
                            </option>

                            <option value="lainnya">
                                + Lainnya (ketik manual)
                            </option>

                        </select>

                        <div id="tambahSpesialisCustomWrap"
                             style="display:none;margin-top:8px;">

                            <input type="text"
                                   class="mfg-input"
                                   id="tambahSpesialisCustom"
                                   placeholder="Ketik nama spesialis..."
                                   oninput="syncPreview('tambah')">

                        </div>

                        <input type="hidden"
                               name="spesialis"
                               id="tambahSpesialis">

                    </div>

                    <div class="modal-dok-preview">

                        <img src=""
                             id="tambahMdpPhoto"
                             class="mdp-photo"
                             alt=""
                             style="display:none;">

                        <div class="mdp-placeholder"
                             id="tambahMdpPlaceholder">
                            A
                        </div>

                        <div>

                            <div class="mdp-name"
                                 id="tambahMdpNama">
                                Nama Dokter
                            </div>

                            <div class="mdp-spesialis"
                                 id="tambahMdpSpesialis">

                                <i class="fa-solid fa-stethoscope"></i>
                                Spesialis

                            </div>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn-cancel"
                            data-bs-dismiss="modal">

                        <i class="fa-solid fa-xmark me-1"></i>
                        Batal

                    </button>

                    <button type="submit"
                            class="btn-save">

                        <i class="fa-solid fa-floppy-disk"></i>
                        Simpan Dokter

                    </button>

                </div>

            </form>

        </div>
    </div>
</div>
{{-- ================================================================
     MODAL: EDIT DOKTER
================================================================ --}}
<div class="modal fade am-modal" id="modalEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(135deg,#1e3a5f 0%,#0ea5e9 100%);">
                <h5 class="modal-title">
                    <span class="mt-icon"><i class="fa-solid fa-pen-to-square"></i></span>
                    Edit Data Dokter
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="" method="POST" enctype="multipart/form-data" id="formEdit">
                @csrf @method('PUT')
                <input type="hidden" name="id"            id="editId">
                <input type="hidden" name="hapus_gambar"  id="editHapusGambar" value="0">
                <input type="hidden" name="spesialis"     id="editSpesialis">

                <div class="modal-body">

                    {{-- Foto --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-camera"></i>
                            Foto Dokter <span class="opt">(kosongkan jika tidak diganti)</span>
                        </div>

                        {{-- Preview existing --}}
                        <div class="photo-preview-wrap" id="editPreviewWrap">
                            <img src="" id="editPreviewImg" alt="Foto Dokter">
                            <div class="photo-preview-label" id="editPreviewLabel">Foto Saat Ini</div>
                            <div class="photo-preview-overlay">
                                <div style="display:flex;gap:8px;">
                                    <label class="ppb ppb-change">
                                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Ganti
                                        <input type="file" name="gambar" id="editFoto2"
                                               accept="image/jpeg,image/png,image/webp"
                                               onchange="previewPhoto(this,'edit')">
                                    </label>
                                    <button type="button" class="ppb ppb-remove"
                                            onclick="removePhoto('edit')">
                                        <i class="fa-solid fa-trash-can"></i> Hapus
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Upload zone --}}
                        <div class="photo-upload-zone" id="editUploadZone">
                            <input type="file" name="foto" id="editFoto"
                            accept="image/jpeg,image/png,image/webp"
                            onchange="previewPhoto(this,'edit')">
                            <div class="puz-inner">
                                <div class="puz-icon"><i class="fa-solid fa-arrow-up-from-bracket"></i></div>
                                <div class="puz-title">Ganti foto dokter</div>
                                <div class="puz-sub">JPG, PNG, WebP — Maks. 5 MB</div>
                            </div>
                        </div>
                    </div>

                    {{-- Nama --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-user-doctor"></i>
                            Nama Dokter <span class="req">*</span>
                        </div>
                        <div class="mfg-input-wrap has-pfx">
                            <i class="pfx-icon fa-solid fa-user-doctor"></i>
                            <input type="text" name="nama" class="mfg-input"
                                   id="editNama"
                                   placeholder="Nama dokter..." maxlength="100" required
                                   oninput="syncPreview('edit')">
                        </div>
                        <div class="char-counter" id="editNamaCtr">0 / 100</div>
                    </div>

                    {{-- Spesialis --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-stethoscope"></i>
                            Dokter Spesialis <span class="req">*</span>
                        </div>
                        <select class="mfg-select" id="editSpesialisSelect"
                                onchange="onSpesialisSelect('edit')">
                            <option value="">-- Pilih atau ketik spesialis --</option>
                            <option value="Dokter Umum">Dokter Umum</option>
                            <option value="Dokter Gigi">Dokter Gigi</option>
                            <option value="Spesialis Anak">Spesialis Anak</option>
                            <option value="Penyakit Dalam">Penyakit Dalam</option>
                            <option value="THT">THT (Telinga, Hidung, Tenggorokan)</option>
                            <option value="Spesialis Mata">Spesialis Mata</option>
                            <option value="Kandungan & Kebidanan">Kandungan & Kebidanan</option>
                            <option value="Dermatologi & Estetika">Dermatologi & Estetika</option>
                            <option value="Bedah Umum">Bedah Umum</option>
                            <option value="Jantung & Pembuluh Darah">Jantung & Pembuluh Darah</option>
                            <option value="Saraf">Saraf</option>
                            <option value="Ortopedi">Ortopedi</option>
                            <option value="Anestesi">Anestesi</option>
                            <option value="Radiologi">Radiologi</option>
                            <option value="Patologi Klinik">Patologi Klinik</option>
                            <option value="lainnya">+ Lainnya (ketik manual)</option>
                        </select>
                        <div id="editSpesialisCustomWrap" style="display:none;margin-top:8px;">
                            <input type="text" class="mfg-input" id="editSpesialisCustom"
                                   placeholder="Ketik nama spesialis..."
                                   oninput="syncPreview('edit')">
                        </div>
                    </div>

                    {{-- Live preview --}}
                    <div class="modal-dok-preview">
                        <img src="" id="editMdpPhoto" class="mdp-photo" alt="" style="display:none;">
                        <div class="mdp-placeholder" id="editMdpPlaceholder">A</div>
                        <div>
                            <div class="mdp-name"      id="editMdpNama">—</div>
                            <div class="mdp-spesialis" id="editMdpSpesialis">
                                <i class="fa-solid fa-stethoscope"></i> —
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Batal
                    </button>
                    <button type="submit" class="btn-save">
                        <i class="fa-solid fa-floppy-disk"></i> Perbarui Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- ================================================================
     MODAL: HAPUS DOKTER
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
                    <img src="" id="delDokPhoto" class="del-dok-photo" alt="" style="display:none;">
                    <div class="del-dok-avatar" id="delDokAvatar" style="display:none;">A</div>
                    <div class="del-title">Hapus Data Dokter?</div>
                    <div class="del-sub">
                        Data dokter berikut beserta foto yang tersimpan akan dihapus secara permanen.
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
     MODAL: DETAIL DOKTER
================================================================ --}}
<div class="modal fade am-modal" id="modalDetail" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width:440px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <span class="mt-icon"><i class="fa-solid fa-user-doctor"></i></span>
                    Profil Dokter
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding:0;">

                {{-- Hero photo / placeholder --}}
                <div style="position:relative;overflow:hidden;">
                    <img src="" id="detPhoto" class="det-photo-hero" alt="" style="display:none;">
                    <div id="detPlaceholder" class="det-photo-placeholder">
                        <div style="width:100px;height:100px;border-radius:50%;
                                    display:flex;align-items:center;justify-content:center;
                                    font-family:'Plus Jakarta Sans',sans-serif;
                                    font-size:38px;font-weight:800;color:#fff;"
                             id="detPlaceholderAvatar">A</div>
                    </div>
                </div>

                <div class="det-body">
                    <div class="det-name" id="detNama">—</div>
                    <div style="margin-top:6px;">
                        <span class="det-spesialis-tag" id="detSpesialis">
                            <i class="fa-solid fa-stethoscope" style="font-size:10px;"></i>
                            —
                        </span>
                    </div>

                    <div class="det-section">
                        <div class="det-label">
                            <i class="fa-solid fa-hospital" style="margin-right:5px;color:var(--primary);"></i>
                            Tempat Praktik
                        </div>
                        <div class="det-val">RSU Allam Medica Bumiayu<br>
                            <span style="font-size:12px;color:var(--text-muted);">
                                Jl. Pangeran Diponegoro No.609, Bumiayu, Brebes
                            </span>
                        </div>
                    </div>

                    <div class="det-section">
                        <div class="det-label">
                            <i class="fa-regular fa-clock" style="margin-right:5px;color:var(--primary);"></i>
                            Jam Praktik
                        </div>
                        <div class="det-val" style="color:var(--text-muted);font-style:italic;font-size:13px;">
                            Lihat jadwal praktik untuk info lengkap
                        </div>
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
   DATA DOKTER PAGE — JavaScript
============================================================ */

/* ---- Char counters ---- */
function initCtr(elId, ctrId, max) {
    const el = document.getElementById(elId);
    const ct = document.getElementById(ctrId);
    if (!el || !ct) return;
    const upd = () => {
        const l = el.value.length;
        ct.textContent = `${l} / ${max}`;
        ct.className = 'char-counter' + (l >= max ? ' over' : l > max*.88 ? ' warn' : '');
    };
    el.addEventListener('input', upd); upd();
}
initCtr('tambahNama', 'tambahNamaCtr', 100);
initCtr('editNama',   'editNamaCtr',   100);

/* ---- Photo preview ---- */
function previewPhoto(input, prefix) {
    const file = input.files[0];
    if (!file) return;
    if (!['image/jpeg','image/png','image/webp'].includes(file.type)) {
        alert('Format tidak didukung. Gunakan JPG, PNG, atau WebP.'); input.value = ''; return;
    }
    if (file.size > 5 * 1024 * 1024) {
        alert('Ukuran terlalu besar. Maksimal 5 MB.'); input.value = ''; return;
    }
    const reader = new FileReader();
    reader.onload = function(e) {
        const wrap  = document.getElementById(prefix + 'PreviewWrap');
        const img   = document.getElementById(prefix + 'PreviewImg');
        const zone  = document.getElementById(prefix + 'UploadZone');
        const label = document.getElementById(prefix + 'PreviewLabel');
        const mdpPhoto = document.getElementById(prefix + 'MdpPhoto');
        const mdpPlhd  = document.getElementById(prefix + 'MdpPlaceholder');

        img.src = e.target.result;
        wrap.classList.add('show');
        zone.style.display = 'none';
        if (label) label.textContent = 'Foto Baru — Belum Tersimpan';

        // Sync preview bar
        if (mdpPhoto)  { mdpPhoto.src = e.target.result; mdpPhoto.style.display = 'block'; }
        if (mdpPlhd)   mdpPlhd.style.display = 'none';

        if (prefix === 'edit') {
            const hf = document.getElementById('editHapusGambar');
            if (hf) hf.value = '0';
        }
    };
    reader.readAsDataURL(file);
}

function removePhoto(prefix) {
    const wrap   = document.getElementById(prefix + 'PreviewWrap');
    const img    = document.getElementById(prefix + 'PreviewImg');
    const zone   = document.getElementById(prefix + 'UploadZone');
    const mdpP   = document.getElementById(prefix + 'MdpPhoto');
    const mdpPlhd= document.getElementById(prefix + 'MdpPlaceholder');

    img.src = '';
    wrap.classList.remove('show');
    zone.style.display = '';
    ['Foto','Foto2'].forEach(s => {
        const el = document.getElementById(prefix + s); if (el) el.value = '';
    });
    if (mdpP)    { mdpP.src = ''; mdpP.style.display = 'none'; }
    if (mdpPlhd) mdpPlhd.style.display = 'flex';

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
        if (e.dataTransfer.files.length) { inp.files = e.dataTransfer.files; previewPhoto(inp, p); }
    });
});

/* ---- Spesialis select logic ---- */
function onSpesialisSelect(prefix) {
    const sel     = document.getElementById(prefix + 'SpesialisSelect');
    const custW   = document.getElementById(prefix + 'SpesialisCustomWrap');
    const custIn  = document.getElementById(prefix + 'SpesialisCustom');
    const hidden  = document.getElementById(prefix === 'tambah' ? 'tambahSpesialis' : 'editSpesialis');

    if (sel.value === 'lainnya') {
        custW.style.display = 'block';
        custIn.focus();
        if (hidden) hidden.value = '';
    } else {
        custW.style.display = 'none';
        if (hidden) hidden.value = sel.value;
        syncPreview(prefix);
    }
}

/* When typing custom spesialis */
['tambahSpesialisCustom','editSpesialisCustom'].forEach(function(id) {
    const el = document.getElementById(id);
    if (!el) return;
    el.addEventListener('input', function() {
        const prefix = id.includes('tambah') ? 'tambah' : 'edit';
        const hidden = document.getElementById(prefix === 'tambah' ? 'tambahSpesialis' : 'editSpesialis');
        if (hidden) hidden.value = this.value;
        syncPreview(prefix);
    });
});

/* ---- Sync live preview bar ---- */
function syncPreview(prefix) {
    const nama  = document.getElementById(prefix + 'Nama')?.value || 'Nama Dokter';
    const spEl  = document.getElementById(prefix + 'SpesialisSelect');
    let sp      = spEl?.value === 'lainnya'
                    ? (document.getElementById(prefix + 'SpesialisCustom')?.value || 'Spesialis')
                    : (spEl?.value || 'Spesialis');

    const namaEl = document.getElementById(prefix + 'MdpNama');
    const spesEl = document.getElementById(prefix + 'MdpSpesialis');
    const plhd   = document.getElementById(prefix + 'MdpPlaceholder');

    if (namaEl) namaEl.textContent = nama || 'Nama Dokter';
    if (spesEl) spesEl.innerHTML   =
        `<i class="fa-solid fa-stethoscope"></i> ${sp || 'Spesialis'}`;
    if (plhd)  plhd.textContent = (nama || 'A').charAt(0).toUpperCase();
}

/* ---- Open EDIT modal ---- */
function openEditModal(id, nama, spesialis, imgUrl) {
    document.getElementById('editId').value       = id;
    document.getElementById('editNama').value     = nama;
    document.getElementById('editHapusGambar').value = '0';
    document.getElementById('formEdit').action    = '{{ url("admin/dokter") }}/' + id;

    // Set spesialis select
    const sel    = document.getElementById('editSpesialisSelect');
    const custW  = document.getElementById('editSpesialisCustomWrap');
    const custIn = document.getElementById('editSpesialisCustom');
    const hidden = document.getElementById('editSpesialis');

    let found = false;
    for (let opt of sel.options) {
        if (opt.value === spesialis) { opt.selected = true; found = true; break; }
    }
    if (!found && spesialis) {
        sel.value = 'lainnya';
        custW.style.display = 'block';
        custIn.value = spesialis;
    } else {
        custW.style.display = 'none';
    }
    hidden.value = spesialis;

    // Photo
    const wrap   = document.getElementById('editPreviewWrap');
    const img    = document.getElementById('editPreviewImg');
    const zone   = document.getElementById('editUploadZone');
    const label  = document.getElementById('editPreviewLabel');
    const mdpP   = document.getElementById('editMdpPhoto');
    const mdpPlhd= document.getElementById('editMdpPlaceholder');

    if (imgUrl && imgUrl.trim() !== '') {
        img.src = imgUrl;
        wrap.classList.add('show');
        zone.style.display = 'none';
        if (label) label.textContent = 'Foto Saat Ini';
        if (mdpP)  { mdpP.src = imgUrl; mdpP.style.display = 'block'; }
        if (mdpPlhd) mdpPlhd.style.display = 'none';
    } else {
        img.src = '';
        wrap.classList.remove('show');
        zone.style.display = '';
        if (mdpP)    { mdpP.src = ''; mdpP.style.display = 'none'; }
        if (mdpPlhd) mdpPlhd.style.display = 'flex';
    }

    // Reset file inputs
    ['editFoto','editFoto2'].forEach(i => { const el = document.getElementById(i); if (el) el.value = ''; });

    document.getElementById('editNama').dispatchEvent(new Event('input'));
    syncPreview('edit');

    new bootstrap.Modal(document.getElementById('modalEdit')).show();
}

/* ---- Open DELETE modal ---- */
function openDeleteModal(id, nama, imgUrl, inisial, grad) {
    document.getElementById('formHapus').action      = '{{ url("admin/dokter") }}/' + id;
    document.getElementById('delTarget').textContent = nama;

    const photo  = document.getElementById('delDokPhoto');
    const avatar = document.getElementById('delDokAvatar');

    if (imgUrl && imgUrl.trim() !== '') {
        photo.src = imgUrl;
        photo.style.display = 'block';
        avatar.style.display = 'none';
    } else {
        avatar.textContent  = inisial;
        avatar.style.background = grad;
        avatar.style.display = 'flex';
        photo.style.display = 'none';
    }
    new bootstrap.Modal(document.getElementById('modalHapus')).show();
}

/* ---- Open DETAIL modal ---- */
function openDetailModal(nama, spesialis, imgUrl, inisial, grad, bgGrad) {
    document.getElementById('detNama').textContent = nama;
    document.getElementById('detSpesialis').innerHTML =
        `<i class="fa-solid fa-stethoscope" style="font-size:10px;"></i> ${spesialis}`;

    const photo = document.getElementById('detPhoto');
    const plhd  = document.getElementById('detPlaceholder');
    const av    = document.getElementById('detPlaceholderAvatar');

    if (imgUrl && imgUrl.trim() !== '') {
        photo.src = imgUrl; photo.style.display = 'block';
        plhd.style.display = 'none';
    } else {
        photo.style.display = 'none';
        plhd.style.background = bgGrad;
        plhd.style.display = 'flex';
        av.textContent  = inisial;
        av.style.background = grad;
    }
    new bootstrap.Modal(document.getElementById('modalDetail')).show();
}

/* ---- Reset tambah modal on close ---- */
document.getElementById('modalTambah').addEventListener('hidden.bs.modal', function() {
    document.getElementById('formTambah').reset();
    removePhoto('tambah');
    document.getElementById('tambahSpesialisCustomWrap').style.display = 'none';
    document.getElementById('tambahSpesialis').value = '';
    document.getElementById('tambahMdpNama').textContent = 'Nama Dokter';
    document.getElementById('tambahMdpSpesialis').innerHTML =
        '<i class="fa-solid fa-stethoscope"></i> Spesialis';
    document.getElementById('tambahMdpPlaceholder').textContent = 'A';
    document.getElementById('tambahNamaCtr').textContent = '0 / 100';
});

/* ---- Live search ---- */
document.getElementById('searchDok').addEventListener('input', function() {
    const q = this.value.toLowerCase();
    document.querySelectorAll('.dok-card').forEach(function(card) {
        const n = (card.dataset.nama || '') + ' ' + (card.dataset.spesialis || '');
        card.style.display = (!q || n.includes(q)) ? '' : 'none';
    });
});

/* ---- Filter spesialis ---- */
document.getElementById('filterSpesialis').addEventListener('change', function() {
    const val = this.value.toLowerCase();
    document.querySelectorAll('.dok-card').forEach(function(card) {
        const sp = card.dataset.spesialis || '';
        card.style.display = (!val || sp.includes(val)) ? '' : 'none';
    });
});

/* ---- View toggle ---- */
const grid = document.getElementById('dokGrid');
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