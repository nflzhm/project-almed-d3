@extends('admin.layout')

@section('title', 'Manajemen Pengadaan')
@section('page-title', 'Pengadaan')

@section('breadcrumb')
    <li class="breadcrumb-item active">Manajemen Pengadaan</li>
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

/* ---- Stats strip ---- */
.pgd-stats { display: flex; gap: 12px; margin-bottom: 24px; flex-wrap: wrap; }
.pgd-stat {
    flex: 1; min-width: 130px;
    background: var(--card-bg); border: 1px solid var(--border-color);
    border-radius: var(--radius); padding: 16px 20px;
    display: flex; align-items: center; gap: 14px;
    box-shadow: var(--shadow-sm);
    transition: box-shadow var(--transition), transform var(--transition);
}
.pgd-stat:hover { box-shadow: var(--shadow-md); transform: translateY(-2px); }
.pgd-stat-icon {
    width: 42px; height: 42px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 17px; flex-shrink: 0;
}
.pgd-stat-val {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 22px; font-weight: 800; color: var(--text-main); line-height: 1;
}
.pgd-stat-lbl { font-size: 12px; color: var(--text-muted); margin-top: 3px; font-weight: 500; }

/* ---- Toolbar ---- */
.pgd-toolbar {
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

/* ---- Grid ---- */
.pgd-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 18px;
}

/* ---- Card (mirip desain user tapi + action admin) ---- */
.pgd-card {
    background: #fff; border-radius: 14px; padding: 16px;
    box-shadow: 0 8px 20px rgba(0,0,0,.06);
    border: 1px solid var(--border-color);
    display: flex; flex-direction: column;
    transition: transform var(--transition), box-shadow var(--transition);
    animation: cardIn .35s ease both;
    position: relative;
}
@keyframes cardIn {
    from { opacity: 0; transform: translateY(14px); }
    to   { opacity: 1; transform: translateY(0); }
}
.pgd-card:nth-child(1){animation-delay:.04s} .pgd-card:nth-child(2){animation-delay:.08s}
.pgd-card:nth-child(3){animation-delay:.12s} .pgd-card:nth-child(4){animation-delay:.16s}
.pgd-card:nth-child(5){animation-delay:.20s} .pgd-card:nth-child(6){animation-delay:.24s}
.pgd-card:hover { transform: translateY(-4px); box-shadow: 0 14px 32px rgba(0,0,0,.1); }

/* Admin action badge (pojok kanan atas) */
.pgd-card-actions {
    position: absolute; top: 12px; right: 12px;
    display: flex; gap: 5px;
}

/* Header */
.pgd-card-header { display: flex; align-items: center; gap: 10px; margin-bottom: 8px; padding-right: 72px; }
.pgd-card-icon {
    width: 36px; height: 36px; border-radius: 8px;
    background: rgba(25,135,84,.1); color: #198754;
    display: flex; align-items: center; justify-content: center; font-size: 16px; flex-shrink: 0;
}
.pgd-card-title { font-size: 14px; font-weight: 700; color: var(--text-main); line-height: 1.3; }

/* Subtitle (periode) */
.pgd-card-period {
    font-size: 12px; font-weight: 600; color: #1C145C;
    margin-bottom: 4px;
}

/* Desc */
.pgd-card-desc { font-size: 12px; color: #444; line-height: 1.5; flex: 1; margin-bottom: 10px; }

/* Divider */
.pgd-card-line { height: 1px; background: #eee; margin: 8px 0; }

/* Info meta */
.pgd-card-meta { font-size: 11px; color: #888; line-height: 1.7; margin-bottom: 10px; }

/* File size badge */
.pgd-file-badge {
    display: inline-flex; align-items: center; gap: 5px;
    background: #f0fdf4; border: 1px solid #bbf7d0;
    color: #166534; font-size: 10.5px; font-weight: 700;
    padding: 3px 9px; border-radius: 20px; margin-bottom: 12px;
}

/* Category badge */
.pgd-cat-badge {
    display: inline-flex; align-items: center; gap: 5px;
    background: rgba(28,20,92,.08); color: #1C145C;
    font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: .6px;
    padding: 3px 9px; border-radius: 20px; margin-bottom: 6px;
}

/* Download button (sama persis dengan user) */
.btn-download-pgd {
    background: #198754; color: #fff; border: none;
    border-radius: 6px; padding: 8px;
    font-size: 12px; font-weight: 600;
    display: flex; align-items: center; justify-content: center; gap: 5px;
    text-decoration: none; cursor: pointer;
    transition: background var(--transition), box-shadow var(--transition);
    margin-top: auto;
}
.btn-download-pgd:hover { background: #157347; color: #fff; box-shadow: 0 4px 14px rgba(25,135,84,.3); }

/* Admin action buttons */
.btn-icon-sm {
    width: 30px; height: 30px; border-radius: 7px;
    display: inline-flex; align-items: center; justify-content: center;
    font-size: 12px; cursor: pointer;
    border: 1px solid transparent;
    transition: background var(--transition), color var(--transition);
}
.btn-edit   { background: #e0f2fe; color: var(--primary); }
.btn-edit:hover   { background: var(--primary); color: #fff; }
.btn-delete { background: #fee2e2; color: #ef4444; }
.btn-delete:hover { background: #ef4444; color: #fff; }
.btn-preview { background: #f0fdf4; color: #198754; }
.btn-preview:hover { background: #198754; color: #fff; }

/* ---- Empty state ---- */
.empty-state {
    grid-column: 1/-1; padding: 60px 24px; text-align: center; color: var(--text-muted);
}
.empty-state .es-icon {
    width: 72px; height: 72px; border-radius: 20px;
    background: #f0fdf4; color: #198754;
    display: flex; align-items: center; justify-content: center;
    font-size: 28px; margin: 0 auto 16px;
}
.empty-state .es-title { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 16px; font-weight: 700; color: var(--text-main); margin-bottom: 6px; }
.empty-state .es-sub   { font-size: 13.5px; color: var(--text-muted); margin-bottom: 20px; }

/* ============================================================
   MODAL STYLES
============================================================ */
.am-modal .modal-dialog { max-width: 620px; }
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
@media (max-width:575px) { .mfg-row { grid-template-columns: 1fr; } }

/* PDF Upload zone */
.pdf-upload-zone {
    border: 2px dashed var(--border-color);
    border-radius: var(--radius-sm); padding: 24px 16px; text-align: center;
    cursor: pointer; background: var(--body-bg); position: relative; overflow: hidden;
    transition: border-color var(--transition), background var(--transition);
}
.pdf-upload-zone:hover, .pdf-upload-zone.dragover {
    border-color: #198754; background: #f0fdf4;
}
.pdf-upload-zone input[type="file"] {
    position: absolute; inset: 0; opacity: 0; cursor: pointer; width: 100%; height: 100%;
}
.puz-icon {
    width: 48px; height: 48px; border-radius: 12px;
    background: #f0fdf4; color: #198754;
    display: flex; align-items: center; justify-content: center;
    font-size: 22px; margin: 0 auto 10px;
    transition: background var(--transition), color var(--transition);
}
.pdf-upload-zone:hover .puz-icon { background: #198754; color: #fff; }
.puz-title { font-size: 13.5px; font-weight: 700; color: var(--text-main); margin-bottom: 3px; }
.puz-sub   { font-size: 12px; color: var(--text-muted); }

/* PDF preview (setelah upload) */
.pdf-preview {
    display: none; background: #f0fdf4; border: 1.5px solid #bbf7d0;
    border-radius: var(--radius-sm); padding: 12px 16px;
    align-items: center; gap: 12px;
}
.pdf-preview.show { display: flex; }
.pdf-preview-icon {
    width: 40px; height: 40px; border-radius: 8px;
    background: #198754; color: #fff;
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; flex-shrink: 0;
}
.pdf-preview-info { flex: 1; min-width: 0; }
.pdf-preview-name { font-size: 13px; font-weight: 700; color: var(--text-main); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.pdf-preview-size { font-size: 11.5px; color: var(--text-muted); }
.pdf-preview-remove {
    width: 26px; height: 26px; border-radius: 6px;
    background: #fee2e2; color: #ef4444; border: none;
    display: flex; align-items: center; justify-content: center;
    font-size: 11px; cursor: pointer; flex-shrink: 0;
    transition: background var(--transition);
}
.pdf-preview-remove:hover { background: #ef4444; color: #fff; }

/* Existing file note */
.existing-file {
    display: flex; align-items: center; gap: 10px;
    background: #f0fdf4; border: 1.5px solid #bbf7d0;
    border-radius: var(--radius-sm); padding: 10px 14px;
    margin-bottom: 10px;
}
.existing-file-icon { color: #198754; font-size: 18px; flex-shrink: 0; }
.existing-file-name { font-size: 13px; font-weight: 600; color: var(--text-main); flex: 1; min-width: 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.existing-file-dl {
    font-size: 11.5px; font-weight: 600; color: #198754;
    text-decoration: none; display: flex; align-items: center; gap: 4px;
    background: rgba(25,135,84,.1); padding: 4px 10px; border-radius: 20px;
    transition: background var(--transition);
}
.existing-file-dl:hover { background: rgba(25,135,84,.2); color: #157347; }

/* Char counter */
.char-counter { font-size: 11px; color: var(--text-muted); text-align: right; margin-top: 3px; }
.char-counter.warn { color: var(--warning); }
.char-counter.over { color: var(--danger); }

/* Buttons modal */
.btn-cancel {
    padding: 10px 20px; border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm); background: transparent;
    color: var(--text-muted); font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13.5px; font-weight: 600; cursor: pointer;
    transition: background var(--transition);
}
.btn-cancel:hover { background: var(--body-bg); color: var(--text-main); }
.btn-save-pgd {
    padding: 10px 24px; background: #198754; color: #fff; border: none;
    border-radius: var(--radius-sm); font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13.5px; font-weight: 700; cursor: pointer;
    display: inline-flex; align-items: center; gap: 8px;
    transition: background var(--transition), box-shadow var(--transition), transform var(--transition);
    box-shadow: 0 4px 14px rgba(25,135,84,.25);
}
.btn-save-pgd:hover { background: #157347; transform: translateY(-1px); box-shadow: 0 8px 22px rgba(25,135,84,.35); }

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

/* PDF Preview modal */
.pdf-frame-wrap { width: 100%; height: 500px; border-radius: var(--radius-sm); overflow: hidden; background: #f1f5f9; }
.pdf-frame-wrap iframe { width: 100%; height: 100%; border: none; }

/* Responsive */
@media (max-width:767.98px) {
    .pgd-grid { grid-template-columns: 1fr; }
    .pgd-stats { gap: 8px; }
    .pgd-stat { min-width: 120px; }
    .pgd-toolbar { flex-direction: column; align-items: stretch; }
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
        <div class="ph-title">Manajemen Pengadaan</div>
        <div class="ph-sub">Kelola dokumen PDF pengadaan yang dapat diunduh oleh publik di halaman Download</div>
    </div>
    <button class="btn-primary-am" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="fa-solid fa-plus"></i>
        Tambah Dokumen
    </button>
</div>

{{-- ================================================================
     STATS STRIP
================================================================ --}}
<div class="pgd-stats">
    <div class="pgd-stat">
        <div class="pgd-stat-icon" style="background:#f0fdf4;color:#198754;">
            <i class="fa-solid fa-file-pdf"></i>
        </div>
        <div>
            <div class="pgd-stat-val">{{ isset($pengadaan) ? $pengadaan->total() : 9 }}</div>
            <div class="pgd-stat-lbl">Total Dokumen</div>
        </div>
    </div>
    <div class="pgd-stat">
        <div class="pgd-stat-icon" style="background:#e0f2fe;color:#0284c7;">
            <i class="fa-solid fa-cloud-arrow-down"></i>
        </div>
        <div>
            <div class="pgd-stat-val">{{ number_format($totalDownload ?? 1284) }}</div>
            <div class="pgd-stat-lbl">Total Diunduh</div>
        </div>
    </div>
    <div class="pgd-stat">
        <div class="pgd-stat-icon" style="background:#fef3c7;color:#d97706;">
            <i class="fa-solid fa-hard-drive"></i>
        </div>
        <div>
            <div class="pgd-stat-val">{{ $totalUkuran ?? '24,8' }} MB</div>
            <div class="pgd-stat-lbl">Total Ukuran</div>
        </div>
    </div>
    <div class="pgd-stat">
        <div class="pgd-stat-icon" style="background:#ede9fe;color:#7c3aed;">
            <i class="fa-solid fa-layer-group"></i>
        </div>
        <div>
            <div class="pgd-stat-val">{{ $totalKategori ?? 6 }}</div>
            <div class="pgd-stat-lbl">Kategori</div>
        </div>
    </div>
</div>

{{-- ================================================================
     TOOLBAR
================================================================ --}}
<div class="pgd-toolbar">
    <div class="search-wrap">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="search" class="search-input" id="searchPgd" placeholder="Cari nama dokumen...">
    </div>
    <select class="filter-select" id="filterKategori">
        <option value="">Semua Kategori</option>
        <option value="alat-kesehatan">Alat Kesehatan</option>
        <option value="obat">Obat</option>
        <option value="laboratorium">Laboratorium</option>
        <option value="radiologi">Radiologi</option>
        <option value="atk">ATK</option>
        <option value="it">Peralatan IT</option>
        <option value="ambulance">Ambulance</option>
        <option value="operasi">Alat Operasi</option>
        <option value="icu">Peralatan ICU</option>
        <option value="lainnya">Lainnya</option>
    </select>
    <select class="filter-select" id="filterSort">
        <option value="newest">Terbaru</option>
        <option value="oldest">Terlama</option>
        <option value="az">A–Z</option>
        <option value="popular">Paling Banyak Diunduh</option>
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
     GRID DOKUMEN
================================================================ --}}
@php
$dummyData = [
    ['id'=>1,'judul'=>'Kebutuhan Alat Kesehatan','periode'=>'April 2026 – Mei 2026','deskripsi'=>'Surat Kebutuhan Alat Kesehatan RSU Allam Medica Bumiayu','tanggal_upload'=>'1 April 2026','ukuran'=>'1,5 MB','download_count'=>312,'kategori'=>'Alat Kesehatan','file'=>'pengadaan/alkes-apr-2026.pdf'],
    ['id'=>2,'judul'=>'Kebutuhan Obat Rumah Sakit','periode'=>'Mei 2026','deskripsi'=>'Daftar kebutuhan obat RSU Allam Medica Bumiayu','tanggal_upload'=>'3 April 2026','ukuran'=>'2,1 MB','download_count'=>287,'kategori'=>'Obat','file'=>'pengadaan/obat-mei-2026.pdf'],
    ['id'=>3,'judul'=>'Pengadaan Alat Laboratorium','periode'=>'Juni 2026','deskripsi'=>'Dokumen pengadaan alat laboratorium terbaru','tanggal_upload'=>'5 April 2026','ukuran'=>'1,8 MB','download_count'=>198,'kategori'=>'Laboratorium','file'=>'pengadaan/lab-jun-2026.pdf'],
    ['id'=>4,'judul'=>'Pengadaan Alat Radiologi','periode'=>'Juni 2026','deskripsi'=>'Dokumen kebutuhan alat radiologi RSU','tanggal_upload'=>'6 April 2026','ukuran'=>'2,5 MB','download_count'=>145,'kategori'=>'Radiologi','file'=>'pengadaan/radiologi-jun-2026.pdf'],
    ['id'=>5,'judul'=>'Pengadaan ATK','periode'=>'April 2026','deskripsi'=>'Daftar kebutuhan alat tulis kantor RSU','tanggal_upload'=>'7 April 2026','ukuran'=>'900 KB','download_count'=>89,'kategori'=>'ATK','file'=>'pengadaan/atk-apr-2026.pdf'],
    ['id'=>6,'judul'=>'Pengadaan Peralatan IT','periode'=>'Mei 2026','deskripsi'=>'Dokumen kebutuhan perangkat IT rumah sakit','tanggal_upload'=>'8 April 2026','ukuran'=>'3,2 MB','download_count'=>203,'kategori'=>'Peralatan IT','file'=>'pengadaan/it-mei-2026.pdf'],
    ['id'=>7,'judul'=>'Pengadaan Ambulance','periode'=>'Juli 2026','deskripsi'=>'Rencana pengadaan kendaraan ambulance','tanggal_upload'=>'9 April 2026','ukuran'=>'4,1 MB','download_count'=>67,'kategori'=>'Ambulance','file'=>'pengadaan/ambulance-jul-2026.pdf'],
    ['id'=>8,'judul'=>'Pengadaan Alat Operasi','periode'=>'Juni 2026','deskripsi'=>'Daftar kebutuhan alat operasi rumah sakit','tanggal_upload'=>'10 April 2026','ukuran'=>'2,7 MB','download_count'=>154,'kategori'=>'Alat Operasi','file'=>'pengadaan/operasi-jun-2026.pdf'],
    ['id'=>9,'judul'=>'Pengadaan Peralatan ICU','periode'=>'Juli 2026','deskripsi'=>'Dokumen kebutuhan peralatan ICU terbaru','tanggal_upload'=>'12 April 2026','ukuran'=>'3,8 MB','download_count'=>98,'kategori'=>'Peralatan ICU','file'=>'pengadaan/icu-jul-2026.pdf'],
];
$listPgd = isset($pengadaan) ? $pengadaan->items() : $dummyData;
@endphp

<div class="pgd-grid" id="pgdGrid">
    @forelse($listPgd as $item)
    @php
        $id        = $item['id']             ?? $item->id;
        $judul     = $item['judul']           ?? $item->judul;
        $periode   = $item['periode']         ?? $item->periode;
        $deskripsi = $item['deskripsi']       ?? $item->deskripsi;
        $tgl       = $item['tanggal_upload']  ?? $item->tanggal_upload ?? '-';
        $ukuran    = $item['ukuran']          ?? $item->ukuran ?? '-';
        $dlCount   = $item['download_count']  ?? $item->download_count ?? 0;
        $kategori  = $item['kategori']        ?? $item->kategori ?? '-';
        $file      = $item['file']            ?? $item->file ?? '';
    @endphp

    <div class="pgd-card" data-id="{{ $id }}" data-kategori="{{ strtolower(str_replace(' ','-',$kategori)) }}">

        {{-- Admin action buttons pojok kanan atas --}}
        <div class="pgd-card-actions">
            {{-- Preview PDF --}}
            <button class="btn-icon-sm btn-preview" title="Preview PDF"
                onclick="openPreviewModal('{{ $judul }}','{{ $file ? asset('storage/'.$file) : '' }}')">
                <i class="fa-solid fa-eye"></i>
            </button>
            {{-- Edit --}}
            <button class="btn-icon-sm btn-edit" title="Edit dokumen"
                onclick="openEditModal(
                    '{{ $id }}',
                    `{{ addslashes($judul) }}`,
                    `{{ addslashes($periode) }}`,
                    `{{ addslashes($deskripsi) }}`,
                    `{{ addslashes($kategori) }}`,
                    '{{ $file }}'
                )">
                <i class="fa-solid fa-pen"></i>
            </button>
            {{-- Delete --}}
            <button class="btn-icon-sm btn-delete" title="Hapus dokumen"
                onclick="openDeleteModal('{{ $id }}','{{ addslashes($judul) }}')">
                <i class="fa-solid fa-trash-can"></i>
            </button>
        </div>

        {{-- Header --}}
        <div class="pgd-card-header">
            <div class="pgd-card-icon"><i class="bi bi-file-earmark-text-fill"></i></div>
            <div class="pgd-card-title">{{ $judul }}</div>
        </div>

        {{-- Kategori --}}
        <div class="pgd-cat-badge">
            <i class="fa-solid fa-tag" style="font-size:9px;"></i>
            {{ $kategori }}
        </div>

        {{-- Periode --}}
        <div class="pgd-card-period">{{ $periode }}</div>

        {{-- Desc --}}
        <div class="pgd-card-desc">{{ $deskripsi }}</div>

        {{-- File size --}}
        <div class="pgd-file-badge">
            <i class="fa-solid fa-file-pdf" style="font-size:10px;"></i>
            PDF {{ $ukuran }}
        </div>

        <div class="pgd-card-line"></div>

        {{-- Meta --}}
        <div class="pgd-card-meta">
            <i class="fa-regular fa-clock"></i> Diunggah: {{ $tgl }}<br>
            <i class="fa-solid fa-cloud-arrow-down" style="font-size:10px;"></i>
            {{ number_format($dlCount) }}x diunduh
        </div>

        {{-- Download button (sama persis dengan tampilan user) --}}
        @if($file)
            <a href="{{ route('admin.pengadaan.download', $id) }}"
               class="btn-download-pgd" target="_blank">
                <i class="bi bi-download"></i> Download PDF
            </a>
        @else
            <button class="btn-download-pgd" disabled style="opacity:.5;cursor:not-allowed;">
                <i class="fa-solid fa-triangle-exclamation"></i> File Belum Ada
            </button>
        @endif

    </div>
    @empty
    <div class="empty-state">
        <div class="es-icon"><i class="fa-solid fa-file-pdf"></i></div>
        <div class="es-title">Belum Ada Dokumen Pengadaan</div>
        <div class="es-sub">Tambahkan dokumen PDF pertama untuk ditampilkan di halaman Download publik.</div>
        <button class="btn-primary-am" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fa-solid fa-plus"></i> Tambah Dokumen Pertama
        </button>
    </div>
    @endforelse
</div>




{{-- ================================================================
     MODAL: TAMBAH DOKUMEN
================================================================ --}}
<div class="modal fade am-modal" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <span class="mt-icon"><i class="fa-solid fa-plus"></i></span>
                    Tambah Dokumen Pengadaan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('admin.pengadaan.store') }}" method="POST"
                  enctype="multipart/form-data" id="formTambah">
                @csrf
                <div class="modal-body">

                    {{-- Nama Dokumen --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-file-lines"></i>
                            Nama Dokumen <span class="req">*</span>
                        </div>
                        <input type="text" name="judul" class="mfg-input" id="tambahJudul"
                            placeholder="Contoh: Kebutuhan Alat Kesehatan" maxlength="120" required>
                        <div class="char-counter" id="tambahJudulCtr">0 / 120</div>
                    </div>

                    {{-- Kategori & Periode (2 col) --}}
                    <div class="mfg-row mfg">
                        <div>
                            <div class="mfg-label">
                                <i class="fa-solid fa-tag"></i>
                                Kategori <span class="req">*</span>
                            </div>
                            <select name="kategori" class="mfg-select" required>
                                <option value="">-- Pilih Kategori --</option>
                                <option>Alat Kesehatan</option>
                                <option>Obat</option>
                                <option>Laboratorium</option>
                                <option>Radiologi</option>
                                <option>ATK</option>
                                <option>Peralatan IT</option>
                                <option>Ambulance</option>
                                <option>Alat Operasi</option>
                                <option>Peralatan ICU</option>
                                <option>Lainnya</option>
                            </select>
                        </div>
                        <div>
                            <div class="mfg-label">
                                <i class="fa-regular fa-calendar"></i>
                                Periode <span class="req">*</span>
                            </div>
                            <input type="text" name="periode" class="mfg-input"
                                placeholder="Contoh: April 2026 – Mei 2026" required>
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-align-left"></i>
                            Deskripsi Singkat <span class="req">*</span>
                        </div>
                        <textarea name="deskripsi" class="mfg-textarea" id="tambahDesc"
                            placeholder="Deskripsi singkat isi dokumen..." maxlength="300" required></textarea>
                        <div class="char-counter" id="tambahDescCtr">0 / 300</div>
                    </div>

                    {{-- Upload PDF --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-file-pdf"></i>
                            File PDF <span class="req">*</span>
                        </div>

                        {{-- Preview setelah pilih file --}}
                        <div class="pdf-preview" id="tambahPdfPreview">
                            <div class="pdf-preview-icon"><i class="fa-solid fa-file-pdf"></i></div>
                            <div class="pdf-preview-info">
                                <div class="pdf-preview-name" id="tambahPdfName">—</div>
                                <div class="pdf-preview-size" id="tambahPdfSize">—</div>
                            </div>
                            <button type="button" class="pdf-preview-remove" onclick="removePdf('tambah')">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>

                        {{-- Upload zone --}}
                        <div class="pdf-upload-zone" id="tambahUploadZone">
                            <input type="file" name="file" id="tambahFile"
                                accept="application/pdf" onchange="handlePdf(this,'tambah')" required>
                            <div class="puz-icon"><i class="fa-solid fa-cloud-arrow-up"></i></div>
                            <div class="puz-title">Klik atau seret file PDF ke sini</div>
                            <div class="puz-sub">Hanya PDF — Maks. 10 MB</div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Batal
                    </button>
                    <button type="submit" class="btn-save-pgd">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Dokumen
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- ================================================================
     MODAL: EDIT DOKUMEN
================================================================ --}}
<div class="modal fade am-modal" id="modalEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(135deg,#1e3a5f 0%,#0ea5e9 100%);">
                <h5 class="modal-title">
                    <span class="mt-icon"><i class="fa-solid fa-pen-to-square"></i></span>
                    Edit Dokumen Pengadaan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="" method="POST" enctype="multipart/form-data" id="formEdit">
                @csrf @method('PUT')
                <input type="hidden" name="id" id="editId">
                <div class="modal-body">

                    {{-- Nama --}}
                    <div class="mfg">
                        <div class="mfg-label"><i class="fa-solid fa-file-lines"></i> Nama Dokumen <span class="req">*</span></div>
                        <input type="text" name="judul" class="mfg-input" id="editJudul"
                            placeholder="Nama dokumen..." maxlength="120" required>
                        <div class="char-counter" id="editJudulCtr">0 / 120</div>
                    </div>

                    {{-- Kategori & Periode --}}
                    <div class="mfg-row mfg">
                        <div>
                            <div class="mfg-label"><i class="fa-solid fa-tag"></i> Kategori <span class="req">*</span></div>
                            <select name="kategori" class="mfg-select" id="editKategori" required>
                                <option value="">-- Pilih --</option>
                                <option>Alat Kesehatan</option>
                                <option>Obat</option>
                                <option>Laboratorium</option>
                                <option>Radiologi</option>
                                <option>ATK</option>
                                <option>Peralatan IT</option>
                                <option>Ambulance</option>
                                <option>Alat Operasi</option>
                                <option>Peralatan ICU</option>
                                <option>Lainnya</option>
                            </select>
                        </div>
                        <div>
                            <div class="mfg-label"><i class="fa-regular fa-calendar"></i> Periode <span class="req">*</span></div>
                            <input type="text" name="periode" class="mfg-input" id="editPeriode"
                                placeholder="Contoh: Mei 2026" required>
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mfg">
                        <div class="mfg-label"><i class="fa-solid fa-align-left"></i> Deskripsi <span class="req">*</span></div>
                        <textarea name="deskripsi" class="mfg-textarea" id="editDesc"
                            placeholder="Deskripsi singkat..." maxlength="300" required></textarea>
                        <div class="char-counter" id="editDescCtr">0 / 300</div>
                    </div>

                    {{-- File PDF --}}
                    <div class="mfg">
                        <div class="mfg-label"><i class="fa-solid fa-file-pdf"></i> Ganti File PDF <span class="opt">(opsional)</span></div>
                        <div style="font-size:11.5px;color:var(--text-muted);margin-bottom:8px;">
                            <i class="fa-solid fa-circle-info" style="color:var(--primary);"></i>
                            Biarkan kosong jika tidak ingin mengganti file PDF.
                        </div>

                        {{-- File saat ini --}}
                        <div class="existing-file" id="editExistingFile">
                            <i class="fa-solid fa-file-pdf existing-file-icon"></i>
                            <span class="existing-file-name" id="editExistingName">—</span>
                            <a href="#" id="editExistingDl" target="_blank" class="existing-file-dl">
                                <i class="fa-solid fa-download" style="font-size:10px;"></i> Unduh
                            </a>
                        </div>

                        {{-- Preview file baru --}}
                        <div class="pdf-preview" id="editPdfPreview" style="margin-top:8px;">
                            <div class="pdf-preview-icon"><i class="fa-solid fa-file-pdf"></i></div>
                            <div class="pdf-preview-info">
                                <div class="pdf-preview-name" id="editPdfName">—</div>
                                <div class="pdf-preview-size" id="editPdfSize">—</div>
                            </div>
                            <button type="button" class="pdf-preview-remove" onclick="removePdf('edit')">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>

                        {{-- Upload zone --}}
                        <div class="pdf-upload-zone" id="editUploadZone" style="margin-top:8px;">
                            <input type="file" name="file" id="editFile"
                                accept="application/pdf" onchange="handlePdf(this,'edit')">
                            <div class="puz-icon"><i class="fa-solid fa-arrow-up-from-bracket"></i></div>
                            <div class="puz-title">Ganti file PDF</div>
                            <div class="puz-sub">PDF saja — Maks. 10 MB</div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Batal
                    </button>
                    <button type="submit" class="btn-save-pgd">
                        <i class="fa-solid fa-floppy-disk"></i> Perbarui Dokumen
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
                    <div class="del-icon"><i class="fa-solid fa-file-pdf"></i></div>
                    <div class="del-title">Hapus Dokumen Ini?</div>
                    <div class="del-sub">
                        File PDF dan data dokumen berikut akan dihapus permanen. Tindakan ini tidak dapat dibatalkan.
                    </div>
                    <div class="del-target" id="delTargetTitle">—</div>
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
     MODAL: PREVIEW PDF
================================================================ --}}
<div class="modal fade am-modal" id="modalPreview" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width:820px;">
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(135deg,#064e3b 0%,#198754 100%);">
                <h5 class="modal-title">
                    <span class="mt-icon"><i class="fa-solid fa-file-pdf"></i></span>
                    <span id="previewTitle">Preview Dokumen</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding:16px;">
                <div class="pdf-frame-wrap">
                    <iframe id="pdfFrame" src="" title="Preview PDF"></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" data-bs-dismiss="modal">Tutup</button>
                <a href="" id="previewDlBtn" target="_blank" class="btn-save-pgd" style="text-decoration:none;">
                    <i class="fa-solid fa-download"></i> Download PDF
                </a>
            </div>
        </div>
    </div>
</div>

@endsection


@push('scripts')
{{-- Bootstrap Icons CDN (untuk ikon bi-download di card) --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<script>
/* ============================================================
   PENGADAAN PAGE — JavaScript
============================================================ */

/* ---- Char counters ---- */
function initCtr(inputId, ctrId, max) {
    const el = document.getElementById(inputId);
    const ct = document.getElementById(ctrId);
    if (!el || !ct) return;
    function upd() {
        const len = el.value.length;
        ct.textContent = `${len} / ${max}`;
        ct.className = 'char-counter' + (len >= max ? ' over' : len > max*.85 ? ' warn' : '');
    }
    el.addEventListener('input', upd); upd();
}
initCtr('tambahJudul', 'tambahJudulCtr', 120);
initCtr('tambahDesc',  'tambahDescCtr',  300);
initCtr('editJudul',   'editJudulCtr',   120);
initCtr('editDesc',    'editDescCtr',    300);

/* ---- Format file size ---- */
function fmtSize(bytes) {
    if (bytes < 1024) return bytes + ' B';
    if (bytes < 1024*1024) return (bytes/1024).toFixed(1) + ' KB';
    return (bytes/(1024*1024)).toFixed(1) + ' MB';
}

/* ---- Handle PDF upload ---- */
function handlePdf(input, prefix) {
    const file = input.files[0];
    if (!file) return;
    if (file.type !== 'application/pdf') { alert('Hanya file PDF yang diizinkan.'); input.value=''; return; }
    if (file.size > 10*1024*1024) { alert('Ukuran file terlalu besar. Maksimal 10 MB.'); input.value=''; return; }

    const isEdit = prefix === 'edit';
    const previewEl = document.getElementById(prefix + 'PdfPreview');
    const nameEl    = document.getElementById(prefix + 'PdfName');
    const sizeEl    = document.getElementById(prefix + 'PdfSize');
    const zoneEl    = document.getElementById(prefix + 'UploadZone');

    nameEl.textContent = file.name;
    sizeEl.textContent = 'PDF · ' + fmtSize(file.size);
    previewEl.classList.add('show');
    zoneEl.style.display = 'none';
}

function removePdf(prefix) {
    const isEdit = prefix === 'edit';
    document.getElementById(prefix + 'PdfPreview').classList.remove('show');
    document.getElementById(prefix + 'PdfName').textContent = '—';
    document.getElementById(prefix + 'PdfSize').textContent = '—';
    document.getElementById(prefix + 'UploadZone').style.display = '';
    document.getElementById(prefix + 'File').value = '';
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
        if (e.dataTransfer.files.length) { inp.files = e.dataTransfer.files; handlePdf(inp, p); }
    });
});

/* ---- Open EDIT modal ---- */
function openEditModal(id, judul, periode, deskripsi, kategori, file) {
    document.getElementById('editId').value       = id;
    document.getElementById('editJudul').value    = judul;
    document.getElementById('editPeriode').value  = periode;
    document.getElementById('editDesc').value     = deskripsi;

    // Kategori select
    const sel = document.getElementById('editKategori');
    for (let opt of sel.options) { opt.selected = (opt.text === kategori); }

    // Existing file
    const existWrap = document.getElementById('editExistingFile');
    const existName = document.getElementById('editExistingName');
    const existDl   = document.getElementById('editExistingDl');
    if (file && file.trim() !== '') {
        existName.textContent = file.split('/').pop();
        existDl.href = '/storage/' + file;
        existWrap.style.display = 'flex';
    } else {
        existWrap.style.display = 'none';
    }

    // Reset new file preview
    removePdf('edit');

    document.getElementById('formEdit').action = '{{ url("admin/pengadaan") }}/' + id;
    ['editJudul','editDesc'].forEach(i => document.getElementById(i).dispatchEvent(new Event('input')));
    new bootstrap.Modal(document.getElementById('modalEdit')).show();
}

/* ---- Open DELETE modal ---- */
function openDeleteModal(id, judul) {
    document.getElementById('formHapus').action         = '{{ url("admin/pengadaan") }}/' + id;
    document.getElementById('delTargetTitle').textContent = judul;
    new bootstrap.Modal(document.getElementById('modalHapus')).show();
}

/* ---- Open PREVIEW modal ---- */
function openPreviewModal(judul, fileUrl) {
    document.getElementById('previewTitle').textContent = judul;
    if (!fileUrl || fileUrl.trim() === '') {
        alert('File PDF belum tersedia untuk dokumen ini.');
        return;
    }
    document.getElementById('pdfFrame').src    = fileUrl;
    document.getElementById('previewDlBtn').href = fileUrl;
    new bootstrap.Modal(document.getElementById('modalPreview')).show();
}

/* ---- Reset tambah modal ---- */
document.getElementById('modalTambah').addEventListener('hidden.bs.modal', function() {
    document.getElementById('formTambah').reset();
    removePdf('tambah');
});

/* ---- Clear iframe on close preview ---- */
document.getElementById('modalPreview').addEventListener('hidden.bs.modal', function() {
    document.getElementById('pdfFrame').src = '';
});

/* ---- Live search ---- */
document.getElementById('searchPgd').addEventListener('input', function() {
    const q = this.value.toLowerCase();
    document.querySelectorAll('.pgd-card').forEach(function(card) {
        const t = card.querySelector('.pgd-card-title')?.textContent.toLowerCase() || '';
        const d = card.querySelector('.pgd-card-desc')?.textContent.toLowerCase()  || '';
        card.style.display = (!q || t.includes(q) || d.includes(q)) ? '' : 'none';
    });
});

/* ---- Filter kategori ---- */
document.getElementById('filterKategori').addEventListener('change', function() {
    const val = this.value;
    document.querySelectorAll('.pgd-card').forEach(function(card) {
        card.style.display = (!val || card.dataset.kategori === val) ? '' : 'none';
    });
});

/* ---- View toggle ---- */
const grid   = document.getElementById('pgdGrid');
const btnG   = document.getElementById('viewGrid');
const btnL   = document.getElementById('viewList');
const hlStyle = 'var(--primary-light)';
const hlColor = 'var(--primary)';
btnG.addEventListener('click', function() {
    grid.style.gridTemplateColumns = '';
    btnG.style.background = hlStyle; btnG.style.color = hlColor;
    btnL.style.background = '';      btnL.style.color = '';
});
btnL.addEventListener('click', function() {
    grid.style.gridTemplateColumns = '1fr';
    btnL.style.background = hlStyle; btnL.style.color = hlColor;
    btnG.style.background = '';      btnG.style.color = '';
});
</script>
@endpush
