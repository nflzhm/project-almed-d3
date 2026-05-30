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

.art-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}

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

.ac-img-wrap {
    position: relative; overflow: hidden;
    aspect-ratio: 16/9; background: var(--body-bg); flex-shrink: 0;
}
.ac-img-wrap img { width: 100%; height: 100%; object-fit: cover; transition: transform .4s ease; }
.art-card:hover .ac-img-wrap img { transform: scale(1.04); }
.ac-img-placeholder {
    width: 100%; height: 100%;
    display: flex; align-items: center; justify-content: center;
    background: linear-gradient(135deg, #e0f2fe, #cffafe);
    color: var(--primary); font-size: 38px;
}
.ac-kat-badge {
    position: absolute; top: 10px; left: 10px;
    font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: .7px;
    padding: 4px 10px; border-radius: 20px; backdrop-filter: blur(8px);
    background: rgba(28,20,92,.82); color: #fff;
}
.ac-read-badge {
    position: absolute; bottom: 8px; right: 8px;
    background: rgba(0,0,0,.6); color: #fff;
    font-size: 10px; font-weight: 600; padding: 3px 8px; border-radius: 6px;
    display: flex; align-items: center; gap: 4px;
}
.ac-body { padding: 18px 20px; flex: 1; display: flex; flex-direction: column; }
.ac-meta-row { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; margin-bottom: 8px; }
.ac-date {
    font-size: 11px; color: var(--text-muted); font-weight: 600;
    text-transform: uppercase; letter-spacing: .5px;
    display: flex; align-items: center; gap: 4px;
}
.ac-views { font-size: 11px; color: var(--text-muted); display: flex; align-items: center; gap: 4px; }
.ac-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 14.5px; font-weight: 700; color: var(--text-main); line-height: 1.4; margin-bottom: 8px;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
}
.ac-excerpt {
    font-size: 13px; color: var(--text-muted); line-height: 1.55; flex: 1;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; margin-bottom: 0;
}

.ac-dokter-chip {
    display: flex; align-items: center; gap: 8px;
    margin-top: 10px; padding: 7px 10px;
    background: #eff6ff; border: 1px solid #bfdbfe;
    border-radius: 8px; flex-shrink: 0;
}
.ac-dokter-chip img {
    width: 26px; height: 26px; border-radius: 50%; object-fit: cover;
    border: 1.5px solid #bfdbfe; flex-shrink: 0;
}
.ac-dokter-chip .no-foto {
    width: 26px; height: 26px; border-radius: 50%;
    background: #dbeafe; color: #2563eb;
    display: flex; align-items: center; justify-content: center;
    font-size: 11px; flex-shrink: 0;
}
.ac-dokter-chip .dk-nama { font-size: 11.5px; font-weight: 700; color: #1e40af; line-height: 1.2; }
.ac-dokter-chip .dk-sp   { font-size: 10.5px; color: #3b82f6; }

.ac-footer {
    display: flex; align-items: center; justify-content: space-between;
    padding: 12px 20px; border-top: 1px solid var(--border-color); background: #fafbff;
}
.ac-kat-tag {
    display: inline-flex; align-items: center; gap: 5px;
    background: var(--primary-light); color: var(--primary-dark);
    font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 20px;
    border: 1px solid rgba(14,165,233,.2);
}
.ac-actions { display: flex; gap: 6px; }

.empty-state { grid-column: 1/-1; padding: 64px 24px; text-align: center; color: var(--text-muted); }
.empty-state .es-icon {
    width: 72px; height: 72px; border-radius: 20px;
    background: var(--primary-light); color: var(--primary);
    display: flex; align-items: center; justify-content: center;
    font-size: 28px; margin: 0 auto 16px;
}
.empty-state .es-title { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 16px; font-weight: 700; color: var(--text-main); margin-bottom: 6px; }
.empty-state .es-sub   { font-size: 13.5px; margin-bottom: 20px; }

.am-modal .modal-dialog { max-width: 700px; }
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
.am-modal .modal-body { padding: 28px 28px 8px; max-height: 70vh; overflow-y: auto; }
.am-modal .modal-footer { padding: 16px 28px 24px; border: none; gap: 10px; }

#modalPreview .modal-dialog { max-width: 760px; }
#modalPreview .modal-body   { padding: 0; max-height: 80vh; overflow-y: auto; }

.pv-img-wrap { aspect-ratio: 16/9; overflow: hidden; max-height: 280px; display: none; }
.pv-img-wrap img { width: 100%; height: 100%; object-fit: cover; display: block; }
.pv-img-placeholder {
    aspect-ratio: 16/9; max-height: 180px;
    display: flex; align-items: center; justify-content: center;
    background: linear-gradient(135deg, #e0f2fe, #cffafe);
    color: #0284c7; font-size: 52px;
}
.pv-body { padding: 28px 32px 32px; }
.pv-badges { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; margin-bottom: 14px; }
.pv-badge-status {
    font-size: 10px; font-weight: 800; text-transform: uppercase;
    letter-spacing: .7px; padding: 4px 10px; border-radius: 20px;
}
.pv-badge-kat {
    font-size: 10px; font-weight: 700; text-transform: uppercase;
    letter-spacing: .6px; padding: 4px 10px; border-radius: 20px;
    background: #e0f2fe; color: #0284c7;
}
.pv-judul {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 22px; font-weight: 800; color: var(--text-main);
    line-height: 1.35; margin-bottom: 14px; letter-spacing: -.3px;
}
.pv-meta {
    display: flex; align-items: center; gap: 20px; flex-wrap: wrap;
    margin-bottom: 20px; padding-bottom: 20px;
    border-bottom: 1px solid var(--border-color);
}
.pv-meta-item {
    display: flex; align-items: center; gap: 6px;
    font-size: 12.5px; color: var(--text-muted);
}
.pv-meta-item i { color: var(--primary); font-size: 12px; }

.pv-dokter-card {
    display: flex; align-items: center; gap: 12px;
    padding: 12px 16px; margin-bottom: 20px;
    background: #eff6ff; border: 1.5px solid #bfdbfe; border-radius: 10px;
}
.pv-dokter-card img {
    width: 44px; height: 44px; border-radius: 50%; object-fit: cover; border: 2px solid #bfdbfe;
}
.pv-dokter-card .no-foto {
    width: 44px; height: 44px; border-radius: 50%;
    background: #dbeafe; color: #2563eb;
    display: flex; align-items: center; justify-content: center; font-size: 18px;
}
.pv-dokter-card .dk-label { font-size: 10px; font-weight: 700; color: #3b82f6; text-transform: uppercase; letter-spacing: .5px; }
.pv-dokter-card .dk-nama  { font-size: 14px; font-weight: 800; color: #1e40af; }
.pv-dokter-card .dk-sp    { font-size: 12px; color: #3b82f6; }

.pv-konten {
    font-size: 14.5px; color: var(--text-main);
    line-height: 1.8; white-space: pre-wrap; word-break: break-word;
}

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

.img-upload-zone {
    border: 2px dashed var(--border-color); border-radius: var(--radius-sm);
    padding: 24px 20px; text-align: center; cursor: pointer;
    background: var(--body-bg); position: relative; overflow: hidden;
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

.img-preview-wrap {
    display: none; position: relative; border-radius: var(--radius-sm);
    overflow: hidden; border: 1.5px solid var(--border-color);
}
.img-preview-wrap.show { display: block; }
.img-preview-wrap img  { width: 100%; height: 180px; object-fit: cover; display: block; }
.img-preview-overlay {
    position: absolute; inset: 0; background: rgba(12,26,46,.52);
    display: flex; align-items: center; justify-content: center;
    gap: 8px; opacity: 0; transition: opacity var(--transition);
}
.img-preview-wrap:hover .img-preview-overlay { opacity: 1; }
.ppb {
    display: flex; align-items: center; gap: 6px;
    padding: 8px 14px; border-radius: 8px; border: none;
    font-family: 'Plus Jakarta Sans', sans-serif; font-size: 12px; font-weight: 700; cursor: pointer;
}
.ppb-change { background: #fff; color: var(--primary); }
.ppb-remove { background: #ef4444; color: #fff; }
.img-preview-label {
    position: absolute; bottom: 0; left: 0; right: 0;
    background: rgba(12,26,46,.75); backdrop-filter: blur(4px);
    color: #fff; font-size: 10.5px; font-weight: 700;
    padding: 5px 12px; text-align: center; text-transform: uppercase; letter-spacing: .6px;
}

.char-counter { font-size: 11px; color: var(--text-muted); text-align: right; margin-top: 3px; }
.char-counter.warn { color: var(--warning); }
.char-counter.over { color: var(--danger); }
.word-counter { font-size: 11px; color: var(--text-muted); margin-top: 4px; display: flex; align-items: center; gap: 8px; }
.word-counter span { font-weight: 600; color: var(--primary); }
.kat-custom-wrap { display: none; margin-top: 8px; }

.status-toggle-group { display: flex; gap: 8px; }
.status-toggle-group label {
    flex: 1; display: flex; align-items: center; justify-content: center; gap: 7px;
    padding: 9px 14px; border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm); font-size: 13px; font-weight: 600;
    cursor: pointer; transition: all var(--transition); background: var(--body-bg); color: var(--text-muted);
}
.status-toggle-group input { display: none; }
.status-toggle-group input:checked + label.lbl-published { background: #d1fae5; border-color: #6ee7b7; color: #065f46; }
.status-toggle-group input:checked + label.lbl-draft     { background: #f1f5f9; border-color: #94a3b8; color: #475569; }

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
    width: 60px; height: 44px; border-radius: 8px; object-fit: cover; flex-shrink: 0;
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

/* ============================================================
   Dokter search dropdown
   Dropdown di-append ke <body> via JS sehingga bebas dari
   overflow/clip apapun di dalam modal.
============================================================ */
.dokter-search-wrap {
    position: relative;
}
.dokter-dropdown {
    display: none;
    position: fixed;
    z-index: 999999;
    border: 1.5px solid #cbd5e1;
    border-radius: 8px;
    max-height: 240px;
    overflow-y: auto;
    background: #fff;
    box-shadow: 0 12px 32px rgba(0,0,0,.18);
    pointer-events: auto;
}
.dokter-dropdown-item {
    padding: 10px 14px; cursor: pointer;
    display: flex; align-items: center; gap: 10px;
    border-bottom: 1px solid #f1f5f9;
    transition: background .15s;
}
.dokter-dropdown-item:hover { background: #f0f9ff; }
.dokter-dropdown-item:last-child { border-bottom: none; }
.dokter-dropdown-item img {
    width: 36px; height: 36px; border-radius: 50%; object-fit: cover;
    border: 1.5px solid #e0f2fe; flex-shrink: 0;
}
.dokter-dropdown-item .no-foto {
    width: 36px; height: 36px; border-radius: 50%;
    background: #e0f2fe; color: #0284c7;
    display: flex; align-items: center; justify-content: center;
    font-size: 14px; flex-shrink: 0;
}
.dokter-dropdown-item .dk-nama { font-size: 13px; font-weight: 700; color: #0f172a; }
.dokter-dropdown-item .dk-sp   { font-size: 11.5px; color: #64748b; }
.dokter-selected-card {
    display: none; align-items: center; gap: 12px;
    margin-top: 8px; padding: 10px 14px;
    background: #eff6ff; border: 1.5px solid #bfdbfe; border-radius: var(--radius-sm);
}
.dokter-selected-card img {
    width: 40px; height: 40px; border-radius: 50%; object-fit: cover; border: 2px solid #bfdbfe;
}
.dokter-selected-card .no-foto {
    width: 40px; height: 40px; border-radius: 50%;
    background: #dbeafe; color: #2563eb;
    display: flex; align-items: center; justify-content: center; font-size: 16px;
}
.dokter-selected-card .dk-nama { font-size: 13.5px; font-weight: 700; color: #1e40af; }
.dokter-selected-card .dk-sp   { font-size: 12px; color: #3b82f6; }
.dokter-clear-btn {
    margin-left: auto; background: none; border: none;
    color: #94a3b8; cursor: pointer; font-size: 16px; padding: 4px;
    transition: color .15s;
}
.dokter-clear-btn:hover { color: #ef4444; }

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
.btn-icon-sm {
    width: 30px; height: 30px; border-radius: 6px;
    display: inline-flex; align-items: center; justify-content: center;
    font-size: 12px; cursor: pointer; border: none;
    transition: background var(--transition), color var(--transition), transform var(--transition);
}
.btn-icon-sm:hover { transform: scale(1.08); }
.btn-edit    { background: #e0f2fe; color: var(--primary); }
.btn-edit:hover    { background: var(--primary); color: #fff; }
.btn-delete  { background: #fee2e2; color: #ef4444; }
.btn-delete:hover  { background: #ef4444; color: #fff; }
.btn-preview { background: #f0fdf4; color: #059669; }
.btn-preview:hover { background: #059669; color: #fff; }

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

.art-pagination {
    margin-top: 24px; padding: 20px 24px; background: #fff;
    border: 1px solid #edf1f7; border-radius: 20px;
    display: flex; align-items: center; justify-content: space-between;
    gap: 20px; flex-wrap: wrap; box-shadow: 0 4px 14px rgba(15,23,42,.04);
}
.art-pagination .pag-info { font-size: 14px; font-weight: 600; color: #64748b; }
.art-pagination .pag-buttons {
    display: flex; align-items: center; gap: 4px;
    flex-wrap: wrap; justify-content: center; margin-left: auto;
}
.art-pagination .pag-btn {
    width: 46px; height: 46px; border-radius: 14px; border: none;
    background: #f8fafc; color: #334155; font-size: 15px; font-weight: 700;
    cursor: pointer; text-decoration: none;
    display: inline-flex; align-items: center; justify-content: center; transition: all .2s ease;
}
.art-pagination .pag-btn:hover { background: #2563eb; color: #fff; transform: translateY(-2px); }
.art-pagination .pag-btn.active {
    background: linear-gradient(135deg, #2563eb, #1d4ed8); color: #fff;
    box-shadow: 0 10px 20px rgba(37,99,235,.25);
}
.art-pagination .pag-btn.disabled {
    background: #f1f5f9; color: #94a3b8; opacity: .7;
    cursor: not-allowed; pointer-events: none;
}
@media(max-width:768px) {
    .art-pagination { flex-direction: column; justify-content: center; text-align: center; }
    .art-pagination .pag-buttons { margin-left: 0; justify-content: center; }
    .art-pagination .pag-btn { width: 40px; height: 40px; border-radius: 12px; font-size: 13px; }
}
</style>
@endpush

@section('content')

{{-- PAGE HEADER --}}
<div class="page-header">
    <div class="page-header-left">
        <div class="ph-title">Manajemen Artikel</div>
        <div class="ph-sub">Kelola artikel edukasi &amp; informasi kesehatan RSU Allam Medica</div>
    </div>
    <button class="btn-primary-am" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="fa-solid fa-plus"></i> Tulis Artikel
    </button>
</div>

{{-- STATS --}}
<div class="art-stats">
    <div class="art-stat">
        <div class="art-stat-icon" style="background:#e0f2fe;color:#0284c7;"><i class="fa-regular fa-newspaper"></i></div>
        <div><div class="art-stat-val">{{ $artikel->total() }}</div><div class="art-stat-lbl">Total Artikel</div></div>
    </div>
    <div class="art-stat">
        <div class="art-stat-icon" style="background:#d1fae5;color:#059669;"><i class="fa-solid fa-circle-check"></i></div>
        <div><div class="art-stat-val">{{ $totalPublished }}</div><div class="art-stat-lbl">Dipublikasikan</div></div>
    </div>
    <div class="art-stat">
        <div class="art-stat-icon" style="background:#f1f5f9;color:#64748b;"><i class="fa-solid fa-file-pen"></i></div>
        <div><div class="art-stat-val">{{ $totalDraft }}</div><div class="art-stat-lbl">Draft</div></div>
    </div>
    <div class="art-stat">
        <div class="art-stat-icon" style="background:#fef3c7;color:#d97706;"><i class="fa-regular fa-eye"></i></div>
        <div><div class="art-stat-val">{{ number_format($totalViews) }}</div><div class="art-stat-lbl">Total Tayangan</div></div>
    </div>
    <div class="art-stat">
        <div class="art-stat-icon" style="background:#ede9fe;color:#7c3aed;"><i class="fa-solid fa-layer-group"></i></div>
        <div><div class="art-stat-val">{{ $totalKategori }}</div><div class="art-stat-lbl">Kategori</div></div>
    </div>
</div>

{{-- TOOLBAR --}}
<div class="art-toolbar">
    <div class="search-wrap">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="search" class="search-input" id="searchArtikel" placeholder="Cari judul artikel...">
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
    <div style="display:flex;gap:4px;">
        <button class="topbar-btn" id="viewGrid" title="Grid" style="background:var(--primary-light);color:var(--primary);">
            <i class="fa-solid fa-grip"></i>
        </button>
        <button class="topbar-btn" id="viewList" title="List">
            <i class="fa-solid fa-list"></i>
        </button>
    </div>
</div>

{{-- CARDS GRID --}}
@php
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

<div class="art-grid" id="artikelGrid">
    @forelse($artikel as $item)
    @php
        $imgUrl   = $item->gambar ? asset('storage/'.$item->gambar) : null;
        $tglFmt   = $item->created_at ? $item->created_at->translatedFormat('d M Y') : '-';
        $konten   = $item->deskripsi ?? '';
        $wc       = str_word_count(strip_tags($konten));
        $readTime = max(1, ceil($wc / 200));
        $kc       = $katColors[$item->kategori] ?? $katColors['Lainnya'];
        $dokter   = $item->dokter;
        $dokterFotoUrl = $dokter && $dokter->foto ? asset('storage/'.$dokter->foto) : null;
    @endphp

    <div class="art-card"
         data-id="{{ $item->id }}"
         data-judul="{{ strtolower($item->judul) }}"
         data-kategori="{{ strtolower($item->kategori ?? '') }}"
         data-status="{{ $item->status }}">

        <div class="ac-img-wrap">
            @if($imgUrl)
                <img src="{{ $imgUrl }}" alt="{{ $item->judul }}" loading="lazy">
            @else
                <div class="ac-img-placeholder"><i class="fa-regular fa-newspaper"></i></div>
            @endif
            <span class="ac-kat-badge">{{ $item->kategori ?? 'Umum' }}</span>
            <span style="position:absolute;top:10px;right:10px;font-size:10px;font-weight:700;
                         text-transform:uppercase;letter-spacing:.6px;padding:3px 9px;border-radius:20px;
                         backdrop-filter:blur(8px);color:#fff;
                         background:{{ $item->status === 'published' ? 'rgba(16,185,129,.85)' : 'rgba(100,116,139,.8)' }};">
                {{ $item->status === 'published' ? 'Publik' : 'Draft' }}
            </span>
            <div class="ac-read-badge">
                <i class="fa-regular fa-clock" style="font-size:9px;"></i> {{ $readTime }} mnt
            </div>
        </div>

        <div class="ac-body">
            <div class="ac-meta-row">
                <div class="ac-date"><i class="fa-regular fa-calendar" style="font-size:10px;"></i> {{ $tglFmt }}</div>
                <div class="ac-views"><i class="fa-regular fa-eye" style="font-size:10px;"></i> {{ number_format($item->views) }}</div>
            </div>
            <div class="ac-title">{{ $item->judul }}</div>
            <div class="ac-excerpt">{{ Str::limit(strip_tags($konten), 120) }}</div>

            @if($dokter)
            <div class="ac-dokter-chip">
                @if($dokterFotoUrl)
                    <img src="{{ $dokterFotoUrl }}" alt="{{ $dokter->nama }}"
                         onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                    <div class="no-foto" style="display:none;"><i class="fa-solid fa-user-doctor"></i></div>
                @else
                    <div class="no-foto"><i class="fa-solid fa-user-doctor"></i></div>
                @endif
                <div>
                    <div class="dk-nama">{{ $dokter->nama }}</div>
                    <div class="dk-sp">{{ $dokter->spesialis ?? 'Dokter' }}</div>
                </div>
            </div>
            @endif
        </div>

        <div class="ac-footer">
            <span class="ac-kat-tag" style="background:{{ $kc['bg'] }};color:{{ $kc['color'] }};border-color:{{ $kc['bg'] }};">
                <i class="fa-solid fa-tag" style="font-size:9px;"></i> {{ $item->kategori ?? 'Umum' }}
            </span>
            <div class="ac-actions">
                <button class="btn-icon-sm btn-preview" title="Preview artikel"
                    onclick="openPreviewModal(
                        `{{ addslashes($item->judul) }}`,
                        `{{ addslashes($konten) }}`,
                        '{{ $imgUrl ?? '' }}',
                        '{{ $item->kategori ?? 'Umum' }}',
                        '{{ $item->status }}',
                        '{{ $tglFmt }}',
                        {{ $item->views ?? 0 }},
                        {{ $readTime }},
                        '{{ $dokter ? addslashes($dokter->nama) : '' }}',
                        '{{ $dokter ? addslashes($dokter->spesialis ?? '') : '' }}',
                        '{{ $dokterFotoUrl ?? '' }}'
                    )">
                    <i class="fa-solid fa-eye"></i>
                </button>

                <button class="btn-icon-sm btn-edit" title="Edit artikel"
                    onclick="openEditModal(
                        '{{ $item->id }}',
                        `{{ addslashes($item->judul) }}`,
                        `{{ addslashes($konten) }}`,
                        '{{ $imgUrl ?? '' }}',
                        '{{ $item->kategori ?? '' }}',
                        '{{ $item->status }}',
                        '{{ $item->dokter_id ?? '' }}',
                        '{{ $dokter ? addslashes($dokter->nama) : '' }}',
                        '{{ $dokter ? addslashes($dokter->spesialis ?? '') : '' }}',
                        '{{ $dokterFotoUrl ?? '' }}'
                    )">
                    <i class="fa-solid fa-pen"></i>
                </button>

                <button class="btn-icon-sm btn-delete" title="Hapus artikel"
                    onclick="openDeleteModal('{{ $item->id }}', `{{ addslashes($item->judul) }}`)">
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

@if($artikel->hasPages())
<div class="art-pagination">
    <div class="pag-info">
        Menampilkan {{ $artikel->firstItem() }}–{{ $artikel->lastItem() }}
        dari {{ $artikel->total() }} artikel
    </div>
    <div class="pag-buttons">
        @if($artikel->onFirstPage())
            <span class="pag-btn disabled">‹</span>
        @else
            <a href="{{ $artikel->previousPageUrl() }}" class="pag-btn">‹</a>
        @endif
        @foreach($artikel->getUrlRange(1, $artikel->lastPage()) as $page => $url)
            @if($page == $artikel->currentPage())
                <span class="pag-btn active">{{ $page }}</span>
            @else
                <a href="{{ $url }}" class="pag-btn">{{ $page }}</a>
            @endif
        @endforeach
        @if($artikel->hasMorePages())
            <a href="{{ $artikel->nextPageUrl() }}" class="pag-btn">›</a>
        @else
            <span class="pag-btn disabled">›</span>
        @endif
    </div>
</div>
@endif


{{-- ================================================================
     MODAL: PREVIEW ARTIKEL
================================================================ --}}
<div class="modal fade am-modal" id="modalPreview" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(135deg,#064e3b 0%,#059669 100%);">
                <h5 class="modal-title">
                    <span class="mt-icon"><i class="fa-solid fa-eye"></i></span>
                    Preview Artikel
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="pv-img-wrap" id="pvImgWrap">
                    <img id="pvImg" src="" alt="">
                </div>
                <div class="pv-img-placeholder" id="pvImgPlaceholder">
                    <i class="fa-regular fa-newspaper"></i>
                </div>
                <div class="pv-body">
                    <div class="pv-badges">
                        <span class="pv-badge-status" id="pvStatus"></span>
                        <span class="pv-badge-kat"    id="pvKategori"></span>
                    </div>
                    <div class="pv-judul" id="pvJudul"></div>
                    <div class="pv-meta">
                        <div class="pv-meta-item"><i class="fa-regular fa-calendar"></i><span id="pvTanggal">—</span></div>
                        <div class="pv-meta-item"><i class="fa-regular fa-clock"></i><span id="pvReadTime">—</span></div>
                        <div class="pv-meta-item"><i class="fa-regular fa-eye"></i><span id="pvViews">—</span></div>
                    </div>

                    <div class="pv-dokter-card" id="pvDokterCard" style="display:none;">
                        <div id="pvDokterFotoWrap"></div>
                        <div>
                            <div class="dk-label"><i class="fa-solid fa-user-doctor" style="font-size:9px;"></i> Dokter Terkait</div>
                            <div class="dk-nama" id="pvDokterNama"></div>
                            <div class="dk-sp"   id="pvDokterSp"></div>
                        </div>
                    </div>

                    <div class="pv-konten" id="pvKonten"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" data-bs-dismiss="modal">
                    <i class="fa-solid fa-xmark me-1"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>


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
            <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data" id="formTambah">
                @csrf
                <div class="modal-body">

                    {{-- Gambar --}}
                    <div class="mfg">
                        <div class="mfg-label"><i class="fa-solid fa-image"></i> Gambar Sampul <span class="opt">(opsional)</span></div>
                        <div class="img-preview-wrap" id="tambahPreviewWrap">
                            <img src="" id="tambahPreviewImg" alt="Preview">
                            <div class="img-preview-label">Preview Sampul</div>
                            <div class="img-preview-overlay">
                                <label class="ppb ppb-change" onclick="document.getElementById('tambahGambar').click()">
                                    <i class="fa-solid fa-arrow-up-from-bracket"></i> Ganti
                                </label>
                                <button type="button" class="ppb ppb-remove" onclick="removeImg('tambah')">
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
                            <div class="iuz-sub">JPG, PNG, WebP — Maks. 3 MB — Rasio 16:9 dianjurkan</div>
                        </div>
                    </div>

                    {{-- Judul --}}
                    <div class="mfg">
                        <div class="mfg-label"><i class="fa-solid fa-heading"></i> Judul Artikel <span class="req">*</span></div>
                        <input type="text" name="judul" class="mfg-input" id="tambahJudul"
                               placeholder="Tulis judul artikel yang menarik..." maxlength="200" required
                               oninput="syncPreview('tambah')">
                        <div class="char-counter" id="tambahJudulCtr">0 / 200</div>
                    </div>

                    {{-- Kategori & Status --}}
                    <div class="mfg-row mfg">
                        <div>
                            <div class="mfg-label"><i class="fa-solid fa-tag"></i> Kategori <span class="opt">(opsional)</span></div>
                            <select name="_kategori_select" class="mfg-select" id="tambahKategoriSelect" onchange="onKategoriChange('tambah')">
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
                                <input type="text" class="mfg-input" id="tambahKatCustom" placeholder="Tulis kategori...">
                            </div>
                            <input type="hidden" name="kategori" id="tambahKategori">
                        </div>
                        <div>
                            <div class="mfg-label"><i class="fa-solid fa-toggle-on"></i> Status Publikasi</div>
                            <div class="status-toggle-group" style="margin-top:2px;">
                                <input type="radio" name="status" id="tambahPublished" value="published" checked>
                                <label for="tambahPublished" class="lbl-published"><i class="fa-solid fa-circle-check"></i> Publik</label>
                                <input type="radio" name="status" id="tambahDraft" value="draft">
                                <label for="tambahDraft" class="lbl-draft"><i class="fa-solid fa-file-pen"></i> Draft</label>
                            </div>
                        </div>
                    </div>

                    {{-- Rekomendasi Dokter --}}
                    <div class="mfg" id="tambahDokterWrap">
                        <div class="mfg-label"><i class="fa-solid fa-user-doctor"></i> Rekomendasi Dokter <span class="opt">(opsional)</span></div>
                        <div class="dokter-search-wrap">
                            <input type="text" class="mfg-input" id="tambahDokterSearch"
                                   placeholder="Cari nama atau spesialis dokter..."
                                   autocomplete="off"
                                   oninput="filterDokter('tambah')">
                            <div class="dokter-dropdown" id="tambahDokterDropdown"></div>
                        </div>
                        <div class="dokter-selected-card" id="tambahDokterSelected"></div>
                        <input type="hidden" name="dokter_id" id="tambahDokterId">
                    </div>

                    {{-- Konten --}}
                    <div class="mfg">
                        <div class="mfg-label"><i class="fa-solid fa-align-left"></i> Isi / Konten Artikel <span class="req">*</span></div>
                        <textarea name="deskripsi" class="mfg-textarea" id="tambahIsi"
                                  placeholder="Tulis konten artikel di sini..." style="min-height:200px;"
                                  required oninput="updateWordCount('tambah')"></textarea>
                        <div class="word-counter">
                            Kata: <span id="tambahWordCount">0</span> &nbsp;·&nbsp;
                            Estimasi baca: <span id="tambahReadTime">0</span> menit
                        </div>
                    </div>

                    {{-- Live preview bar --}}
                    <div class="modal-preview-bar">
                        <img src="" id="tambahMpbThumb" class="mpb-thumb" alt="" style="display:none;">
                        <div class="mpb-thumb-placeholder" id="tambahMpbPlaceholder"><i class="fa-regular fa-newspaper"></i></div>
                        <div>
                            <div class="mpb-title" id="tambahMpbTitle">Judul Artikel</div>
                            <div class="mpb-subtitle" id="tambahMpbSub">
                                <i class="fa-solid fa-tag" style="font-size:9px;color:var(--primary);"></i>
                                Kategori &nbsp;·&nbsp; <i class="fa-regular fa-clock" style="font-size:9px;"></i> 0 menit baca
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-1"></i> Batal</button>
                    <button type="submit" class="btn-save"><i class="fa-solid fa-floppy-disk"></i> Simpan Artikel</button>
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
                <input type="hidden" name="hapus_gambar" id="editHapusGambar" value="0">
                <input type="hidden" name="kategori"     id="editKategori">

                <div class="modal-body">

                    {{-- Gambar --}}
                    <div class="mfg">
                        <div class="mfg-label"><i class="fa-solid fa-image"></i> Gambar Sampul <span class="opt">(kosongkan jika tidak diganti)</span></div>
                        <div class="img-preview-wrap" id="editPreviewWrap">
                            <img src="" id="editPreviewImg" alt="Preview">
                            <div class="img-preview-label" id="editPreviewLabel">Gambar Saat Ini</div>
                            <div class="img-preview-overlay">
                                <label class="ppb ppb-change" onclick="document.getElementById('editGambar').click()">
                                    <i class="fa-solid fa-arrow-up-from-bracket"></i> Ganti
                                </label>
                                <button type="button" class="ppb ppb-remove" onclick="removeImg('edit')">
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
                            <div class="iuz-sub">JPG, PNG, WebP — Maks. 3 MB</div>
                        </div>
                    </div>

                    {{-- Judul --}}
                    <div class="mfg">
                        <div class="mfg-label"><i class="fa-solid fa-heading"></i> Judul Artikel <span class="req">*</span></div>
                        <input type="text" name="judul" class="mfg-input" id="editJudul"
                               placeholder="Judul artikel..." maxlength="200" required
                               oninput="syncPreview('edit')">
                        <div class="char-counter" id="editJudulCtr">0 / 200</div>
                    </div>

                    {{-- Kategori & Status --}}
                    <div class="mfg-row mfg">
                        <div>
                            <div class="mfg-label"><i class="fa-solid fa-tag"></i> Kategori <span class="opt">(opsional)</span></div>
                            <select name="_kategori_sel" class="mfg-select" id="editKategoriSelect" onchange="onKategoriChange('edit')">
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
                                       placeholder="Tulis kategori..."
                                       oninput="document.getElementById('editKategori').value = this.value; syncPreview('edit');">
                            </div>
                        </div>
                        <div>
                            <div class="mfg-label"><i class="fa-solid fa-toggle-on"></i> Status Publikasi</div>
                            <div class="status-toggle-group" style="margin-top:2px;">
                                <input type="radio" name="status" id="editPublished" value="published">
                                <label for="editPublished" class="lbl-published"><i class="fa-solid fa-circle-check"></i> Publik</label>
                                <input type="radio" name="status" id="editDraft" value="draft">
                                <label for="editDraft" class="lbl-draft"><i class="fa-solid fa-file-pen"></i> Draft</label>
                            </div>
                        </div>
                    </div>

                    {{-- Rekomendasi Dokter --}}
                    <div class="mfg" id="editDokterWrap">
                        <div class="mfg-label"><i class="fa-solid fa-user-doctor"></i> Rekomendasi Dokter <span class="opt">(opsional)</span></div>
                        <div class="dokter-search-wrap">
                            <input type="text" class="mfg-input" id="editDokterSearch"
                                   placeholder="Cari nama atau spesialis dokter..."
                                   autocomplete="off"
                                   oninput="filterDokter('edit')">
                            <div class="dokter-dropdown" id="editDokterDropdown"></div>
                        </div>
                        <div class="dokter-selected-card" id="editDokterSelected"></div>
                        <input type="hidden" name="dokter_id" id="editDokterId">
                    </div>

                    {{-- Konten --}}
                    <div class="mfg">
                        <div class="mfg-label"><i class="fa-solid fa-align-left"></i> Isi / Konten Artikel <span class="req">*</span></div>
                        <textarea name="deskripsi" class="mfg-textarea" id="editIsi"
                                  placeholder="Konten artikel..." style="min-height:200px;"
                                  required oninput="updateWordCount('edit')"></textarea>
                        <div class="word-counter">
                            Kata: <span id="editWordCount">0</span> &nbsp;·&nbsp;
                            Estimasi baca: <span id="editReadTime">0</span> menit
                        </div>
                    </div>

                    {{-- Live preview bar --}}
                    <div class="modal-preview-bar">
                        <img src="" id="editMpbThumb" class="mpb-thumb" alt="" style="display:none;">
                        <div class="mpb-thumb-placeholder" id="editMpbPlaceholder"><i class="fa-regular fa-newspaper"></i></div>
                        <div>
                            <div class="mpb-title" id="editMpbTitle">—</div>
                            <div class="mpb-subtitle" id="editMpbSub">
                                <i class="fa-solid fa-tag" style="font-size:9px;color:var(--primary);"></i>—
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-1"></i> Batal</button>
                    <button type="submit" class="btn-save"><i class="fa-solid fa-floppy-disk"></i> Perbarui Artikel</button>
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
                    <div class="del-sub">Artikel berikut akan dihapus secara permanen beserta gambar sampulnya. Tindakan ini tidak dapat dibatalkan.</div>
                    <div class="del-target" id="delTarget">—</div>
                </div>
                <div class="modal-footer" style="justify-content:center;gap:12px;">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-1"></i> Batal</button>
                    <button type="submit" class="btn-danger-am"><i class="fa-solid fa-trash-can"></i> Ya, Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


@push('scripts')
<script>
/* ============================================================
   DATA DOKTER
============================================================ */
const DOKTERS = @json($dokters);

/* ============================================================
   SYNC KATEGORI SAAT SUBMIT
============================================================ */
document.getElementById('formTambah').addEventListener('submit', function() {
    const sel = document.getElementById('tambahKategoriSelect');
    document.getElementById('tambahKategori').value = (sel.value === 'lainnya')
        ? document.getElementById('tambahKatCustom').value
        : sel.value;
});
document.getElementById('formEdit').addEventListener('submit', function() {
    const sel = document.getElementById('editKategoriSelect');
    if (sel.value !== 'lainnya') document.getElementById('editKategori').value = sel.value;
});

/* ============================================================
   CHAR COUNTER
============================================================ */
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

/* ============================================================
   WORD COUNTER
============================================================ */
function updateWordCount(prefix) {
    const isi = document.getElementById(prefix + 'Isi')?.value || '';
    const wc  = isi.trim() ? isi.trim().split(/\s+/).length : 0;
    const rt  = Math.max(1, Math.ceil(wc / 200));
    const wcEl = document.getElementById(prefix + 'WordCount');
    const rtEl = document.getElementById(prefix + 'ReadTime');
    if (wcEl) wcEl.textContent = wc.toLocaleString('id-ID');
    if (rtEl) rtEl.textContent = rt;
    syncPreview(prefix);
}

/* ============================================================
   KATEGORI SELECT
============================================================ */
function onKategoriChange(prefix) {
    const sel   = document.getElementById(prefix + 'KategoriSelect');
    const custW = document.getElementById(prefix + 'KatCustomWrap');
    const custI = document.getElementById(prefix + 'KatCustom');
    const hid   = document.getElementById(prefix + 'Kategori');

    if (sel.value === 'lainnya') {
        custW.style.display = 'block'; custI?.focus();
        if (hid) hid.value = '';
    } else {
        custW.style.display = 'none';
        if (hid) hid.value = sel.value;
        syncPreview(prefix);
    }
}

/* ============================================================
   LIVE PREVIEW BAR
============================================================ */
function syncPreview(prefix) {
    const judul  = document.getElementById(prefix + 'Judul')?.value || 'Judul Artikel';
    const katSel = document.getElementById(prefix + 'KategoriSelect');
    const kat    = (katSel?.value === 'lainnya')
                    ? (document.getElementById(prefix + 'KatCustom')?.value || 'Lainnya')
                    : (katSel?.value || 'Kategori');
    const wc = document.getElementById(prefix + 'Isi')?.value?.trim()?.split(/\s+/).length || 0;
    const rt = Math.max(1, Math.ceil(wc / 200));
    const titleEl = document.getElementById(prefix + 'MpbTitle');
    const subEl   = document.getElementById(prefix + 'MpbSub');
    if (titleEl) titleEl.textContent = judul;
    if (subEl)   subEl.innerHTML =
        `<i class="fa-solid fa-tag" style="font-size:9px;color:var(--primary);"></i> ${kat}
         &nbsp;·&nbsp; <i class="fa-regular fa-clock" style="font-size:9px;"></i> ${rt} menit baca`;
}

/* ============================================================
   IMAGE PREVIEW
============================================================ */
function previewImg(input, prefix) {
    const file = input.files[0];
    if (!file) return;
    if (!['image/jpeg','image/png','image/webp'].includes(file.type)) {
        alert('Format tidak didukung. Gunakan JPG, PNG, atau WebP.'); input.value = ''; return;
    }
    if (file.size > 3 * 1024 * 1024) {
        alert('Ukuran file terlalu besar. Maksimal 3 MB.'); input.value = ''; return;
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
        if (prefix === 'edit') document.getElementById('editHapusGambar').value = '0';
    };
    reader.readAsDataURL(file);
}

function removeImg(prefix) {
    const masterInput = document.getElementById(prefix + 'Gambar');
    if (masterInput) masterInput.value = '';
    const wrap = document.getElementById(prefix + 'PreviewWrap');
    const img  = document.getElementById(prefix + 'PreviewImg');
    const zone = document.getElementById(prefix + 'UploadZone');
    const mpbT = document.getElementById(prefix + 'MpbThumb');
    const mpbP = document.getElementById(prefix + 'MpbPlaceholder');
    img.src = ''; wrap.classList.remove('show'); zone.style.display = '';
    if (mpbT) { mpbT.src = ''; mpbT.style.display = 'none'; }
    if (mpbP) mpbP.style.display = 'flex';
    if (prefix === 'edit') document.getElementById('editHapusGambar').value = '1';
}

/* ---- Drag & drop ---- */
['tambah','edit'].forEach(function(p) {
    const zone = document.getElementById(p + 'UploadZone');
    if (!zone) return;
    zone.addEventListener('dragover',  e => { e.preventDefault(); zone.classList.add('dragover'); });
    zone.addEventListener('dragleave', () => zone.classList.remove('dragover'));
    zone.addEventListener('drop', function(e) {
        e.preventDefault(); zone.classList.remove('dragover');
        const inp = document.getElementById(p + 'Gambar');
        if (e.dataTransfer.files.length) {
            const dt = new DataTransfer();
            dt.items.add(e.dataTransfer.files[0]);
            inp.files = dt.files;
            previewImg(inp, p);
        }
    });
});

/* ============================================================
   DOKTER SEARCH & SELECT
   Strategi: dropdown di-append ke <body> dan diposisikan
   dengan getBoundingClientRect() → bebas dari overflow/clip
   modal apapun. Event onmousedown mencegah blur menutup
   dropdown sebelum item sempat terpilih.
============================================================ */

/* Pindahkan kedua dropdown ke <body> saat DOM siap */
document.addEventListener('DOMContentLoaded', function () {
    ['tambah', 'edit'].forEach(function (p) {
        const dd = document.getElementById(p + 'DokterDropdown');
        if (dd) document.body.appendChild(dd);
    });
});

function _positionDD(prefix) {
    const input = document.getElementById(prefix + 'DokterSearch');
    const dd    = document.getElementById(prefix + 'DokterDropdown');
    if (!input || !dd) return;
    const r = input.getBoundingClientRect();
    dd.style.top   = (r.bottom + 4) + 'px';
    dd.style.left  = r.left + 'px';
    dd.style.width = r.width + 'px';
}

function filterDokter(prefix) {
    const q  = document.getElementById(prefix + 'DokterSearch').value.toLowerCase().trim();
    const dd = document.getElementById(prefix + 'DokterDropdown');

    if (!q) { dd.style.display = 'none'; return; }

    _positionDD(prefix);

    const results = DOKTERS.filter(d =>
        d.nama.toLowerCase().includes(q) ||
        (d.spesialis || '').toLowerCase().includes(q)
    ).slice(0, 8);

    dd.innerHTML = results.length
        ? results.map(function (d) {
            const fotoUrl  = d.foto ? '/storage/' + d.foto : '';
            const fotoHtml = fotoUrl
                ? `<img src="${fotoUrl}" style="width:36px;height:36px;border-radius:50%;object-fit:cover;border:1.5px solid #e0f2fe;flex-shrink:0;"
                        onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                   <div style="display:none;width:36px;height:36px;border-radius:50%;background:#e0f2fe;color:#0284c7;align-items:center;justify-content:center;font-size:14px;flex-shrink:0;">
                       <i class="fa-solid fa-user-doctor"></i>
                   </div>`
                : `<div style="display:flex;width:36px;height:36px;border-radius:50%;background:#e0f2fe;color:#0284c7;align-items:center;justify-content:center;font-size:14px;flex-shrink:0;">
                       <i class="fa-solid fa-user-doctor"></i>
                   </div>`;
            /* onmousedown supaya terpilih SEBELUM input blur menutup dropdown */
            return `<div class="dokter-dropdown-item"
                         onmousedown="event.preventDefault();selectDokter('${prefix}',${d.id},${JSON.stringify(d.nama)},${JSON.stringify(d.spesialis||'')},${JSON.stringify(fotoUrl)})">
                        ${fotoHtml}
                        <div>
                            <div class="dk-nama">${d.nama}</div>
                            <div class="dk-sp">${d.spesialis || 'Dokter Umum'}</div>
                        </div>
                    </div>`;
        }).join('')
        : `<div style="padding:12px 16px;color:#94a3b8;font-size:13px;text-align:center;">
               <i class="fa-solid fa-user-doctor" style="margin-right:6px;"></i>Dokter tidak ditemukan
           </div>`;

    dd.style.display = 'block';
}

function selectDokter(prefix, id, nama, spesialis, fotoUrl) {
    document.getElementById(prefix + 'DokterId').value     = id;
    document.getElementById(prefix + 'DokterSearch').value = '';
    document.getElementById(prefix + 'DokterDropdown').style.display = 'none';

    const card = document.getElementById(prefix + 'DokterSelected');
    const fotoHtml = fotoUrl
        ? `<img src="${fotoUrl}" style="width:40px;height:40px;border-radius:50%;object-fit:cover;border:2px solid #bfdbfe;"
                onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
           <div style="display:none;width:40px;height:40px;border-radius:50%;background:#dbeafe;color:#2563eb;align-items:center;justify-content:center;font-size:16px;">
               <i class="fa-solid fa-user-doctor"></i>
           </div>`
        : `<div style="display:flex;width:40px;height:40px;border-radius:50%;background:#dbeafe;color:#2563eb;align-items:center;justify-content:center;font-size:16px;">
               <i class="fa-solid fa-user-doctor"></i>
           </div>`;

    card.innerHTML = `
        ${fotoHtml}
        <div style="flex:1;">
            <div class="dk-nama">${nama}</div>
            <div class="dk-sp">${spesialis || 'Dokter Umum'}</div>
        </div>
        <button type="button" class="dokter-clear-btn" onclick="clearDokter('${prefix}')">
            <i class="fa-solid fa-xmark"></i>
        </button>`;
    card.style.display = 'flex';
}

function clearDokter(prefix) {
    document.getElementById(prefix + 'DokterId').value     = '';
    document.getElementById(prefix + 'DokterSearch').value = '';
    document.getElementById(prefix + 'DokterDropdown').style.display = 'none';
    const card = document.getElementById(prefix + 'DokterSelected');
    card.innerHTML = ''; card.style.display = 'none';
}

/* Tutup dropdown jika klik di luar input & dropdown */
document.addEventListener('mousedown', function (e) {
    ['tambah', 'edit'].forEach(function (p) {
        const inp = document.getElementById(p + 'DokterSearch');
        const dd  = document.getElementById(p + 'DokterDropdown');
        if (dd && inp && !inp.contains(e.target) && !dd.contains(e.target)) {
            dd.style.display = 'none';
        }
    });
});

/* Reposisi saat window atau modal-body di-scroll */
window.addEventListener('scroll', function () {
    ['tambah', 'edit'].forEach(function (p) {
        const dd = document.getElementById(p + 'DokterDropdown');
        if (dd && dd.style.display === 'block') _positionDD(p);
    });
}, true);

/* ============================================================
   OPEN PREVIEW MODAL
============================================================ */
function openPreviewModal(judul, konten, imgUrl, kategori, status, tanggal, views, readTime, dokterNama, dokterSp, dokterFoto) {
    const pvImgWrap = document.getElementById('pvImgWrap');
    const pvImg     = document.getElementById('pvImg');
    const pvImgPh   = document.getElementById('pvImgPlaceholder');
    if (imgUrl && imgUrl.trim()) {
        pvImg.src = imgUrl; pvImgWrap.style.display = 'block'; pvImgPh.style.display = 'none';
    } else {
        pvImgWrap.style.display = 'none'; pvImgPh.style.display = 'flex';
    }

    document.getElementById('pvJudul').textContent    = judul;
    document.getElementById('pvKonten').textContent   = konten;
    document.getElementById('pvTanggal').textContent  = tanggal;
    document.getElementById('pvReadTime').textContent = readTime + ' menit baca';
    document.getElementById('pvViews').textContent    = parseInt(views).toLocaleString('id-ID') + ' tayangan';
    document.getElementById('pvKategori').textContent = kategori || 'Umum';

    const pvStatus = document.getElementById('pvStatus');
    if (status === 'published') {
        pvStatus.textContent = '● Dipublikasikan';
        pvStatus.style.background = '#d1fae5'; pvStatus.style.color = '#065f46';
    } else {
        pvStatus.textContent = '● Draft';
        pvStatus.style.background = '#f1f5f9'; pvStatus.style.color = '#475569';
    }

    const pvDokterCard = document.getElementById('pvDokterCard');
    if (dokterNama && dokterNama.trim()) {
        const fotoWrap = document.getElementById('pvDokterFotoWrap');
        fotoWrap.innerHTML = dokterFoto && dokterFoto.trim()
            ? `<img src="${dokterFoto}" style="width:44px;height:44px;border-radius:50%;object-fit:cover;border:2px solid #bfdbfe;"
                    onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
               <div class="no-foto" style="display:none;width:44px;height:44px;border-radius:50%;background:#dbeafe;color:#2563eb;align-items:center;justify-content:center;font-size:18px;">
                   <i class="fa-solid fa-user-doctor"></i>
               </div>`
            : `<div class="no-foto" style="width:44px;height:44px;border-radius:50%;background:#dbeafe;color:#2563eb;display:flex;align-items:center;justify-content:center;font-size:18px;">
                   <i class="fa-solid fa-user-doctor"></i>
               </div>`;
        document.getElementById('pvDokterNama').textContent = dokterNama;
        document.getElementById('pvDokterSp').textContent   = dokterSp || 'Dokter';
        pvDokterCard.style.display = 'flex';
    } else {
        pvDokterCard.style.display = 'none';
    }

    new bootstrap.Modal(document.getElementById('modalPreview')).show();
}

/* ============================================================
   OPEN EDIT MODAL
============================================================ */
function openEditModal(id, judul, isi, imgUrl, kategori, status, dokterId, dokterNama, dokterSp, dokterFoto) {
    document.getElementById('editJudul').value       = judul;
    document.getElementById('editIsi').value         = isi;
    document.getElementById('editHapusGambar').value = '0';
    document.getElementById('formEdit').action       = '{{ url("admin/artikel") }}/' + id;

    document.getElementById('editPublished').checked = (status === 'published');
    document.getElementById('editDraft').checked     = (status !== 'published');

    /* Kategori */
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

    /* Gambar */
    const wrap  = document.getElementById('editPreviewWrap');
    const img   = document.getElementById('editPreviewImg');
    const zone  = document.getElementById('editUploadZone');
    const label = document.getElementById('editPreviewLabel');
    const mpbT  = document.getElementById('editMpbThumb');
    const mpbP  = document.getElementById('editMpbPlaceholder');
    if (imgUrl && imgUrl.trim()) {
        img.src = imgUrl; wrap.classList.add('show'); zone.style.display = 'none';
        if (label) label.textContent = 'Gambar Saat Ini';
        if (mpbT)  { mpbT.src = imgUrl; mpbT.style.display = 'block'; }
        if (mpbP)  mpbP.style.display = 'none';
    } else {
        img.src = ''; wrap.classList.remove('show'); zone.style.display = '';
        if (mpbT) { mpbT.src = ''; mpbT.style.display = 'none'; }
        if (mpbP) mpbP.style.display = 'flex';
    }
    document.getElementById('editGambar').value = '';

    /* Dokter */
    clearDokter('edit');
    if (dokterId && dokterNama && dokterNama.trim()) {
        selectDokter('edit', dokterId, dokterNama, dokterSp, dokterFoto);
    }

    updateWordCount('edit');
    syncPreview('edit');
    new bootstrap.Modal(document.getElementById('modalEdit')).show();
}

/* ============================================================
   OPEN DELETE MODAL
============================================================ */
function openDeleteModal(id, judul) {
    document.getElementById('formHapus').action      = '{{ url("admin/artikel") }}/' + id;
    document.getElementById('delTarget').textContent = judul;
    new bootstrap.Modal(document.getElementById('modalHapus')).show();
}

/* ============================================================
   RESET FORM TAMBAH
============================================================ */
document.getElementById('modalTambah').addEventListener('hidden.bs.modal', function() {
    document.getElementById('formTambah').reset();
    removeImg('tambah');
    clearDokter('tambah');
    document.getElementById('tambahKategori').value              = '';
    document.getElementById('tambahKatCustomWrap').style.display = 'none';
    document.getElementById('tambahWordCount').textContent       = '0';
    document.getElementById('tambahReadTime').textContent        = '0';
    document.getElementById('tambahMpbTitle').textContent        = 'Judul Artikel';
    document.getElementById('tambahJudulCtr').textContent        = '0 / 200';
    document.getElementById('tambahMpbSub').innerHTML =
        '<i class="fa-solid fa-tag" style="font-size:9px;color:var(--primary);"></i> Kategori &nbsp;·&nbsp; <i class="fa-regular fa-clock" style="font-size:9px;"></i> 0 menit baca';
});

/* ============================================================
   FILTER & SEARCH
============================================================ */
document.getElementById('searchArtikel').addEventListener('input', function() {
    const q = this.value.toLowerCase();
    document.querySelectorAll('.art-card').forEach(card => {
        card.style.display = (!q || (card.dataset.judul || '').includes(q)) ? '' : 'none';
    });
});

document.getElementById('filterKategori').addEventListener('change', function() {
    const val = this.value.toLowerCase();
    document.querySelectorAll('.art-card').forEach(card => {
        card.style.display = (!val || (card.dataset.kategori || '') === val) ? '' : 'none';
    });
});

document.getElementById('filterStatus').addEventListener('change', function() {
    const val = this.value;
    document.querySelectorAll('.art-card').forEach(card => {
        card.style.display = (!val || card.dataset.status === val) ? '' : 'none';
    });
});

/* ============================================================
   VIEW TOGGLE
============================================================ */
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