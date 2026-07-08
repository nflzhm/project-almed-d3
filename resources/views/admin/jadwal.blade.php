@extends('admin.layout')

@section('title', 'Jadwal Praktik')
@section('page-title', 'Jadwal Praktik')

@section('breadcrumb')
    <li class="breadcrumb-item active">Jadwal Praktik</li>
@endsection

@push('styles')
<style>
/* ============================================================
   JADWAL PRAKTIK PAGE — Allam Medica Admin
   Output user: per dokter → tabel 7 hari (poli, jam, sesi)
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
.jdw-stats { display: flex; gap: 12px; margin-bottom: 24px; flex-wrap: wrap; }
.jdw-stat {
    flex: 1; min-width: 130px; background: var(--card-bg);
    border: 1px solid var(--border-color); border-radius: var(--radius);
    padding: 16px 20px; display: flex; align-items: center; gap: 14px;
    box-shadow: var(--shadow-sm);
    transition: box-shadow var(--transition), transform var(--transition);
}
.jdw-stat:hover { box-shadow: var(--shadow-md); transform: translateY(-2px); }
.jdw-stat-icon {
    width: 42px; height: 42px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; flex-shrink: 0;
}
.jdw-stat-val {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 22px; font-weight: 800; color: var(--text-main); line-height: 1;
}
.jdw-stat-lbl { font-size: 12px; color: var(--text-muted); margin-top: 3px; font-weight: 500; }

/* ---- Toolbar ---- */
.jdw-toolbar {
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
   JADWAL CARD PER DOKTER (mirip output user)
============================================================ */
.jdw-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: var(--radius);
    box-shadow: var(--shadow-sm);
    margin-bottom: 20px;
    overflow: hidden;
    animation: cardIn .35s ease both;
    transition: box-shadow var(--transition);
}
@keyframes cardIn {
    from { opacity: 0; transform: translateY(12px); }
    to   { opacity: 1; transform: translateY(0); }
}
.jdw-card:nth-child(1){animation-delay:.04s}
.jdw-card:nth-child(2){animation-delay:.08s}
.jdw-card:nth-child(3){animation-delay:.12s}
.jdw-card:hover { box-shadow: var(--shadow-md); }

/* Card header bar */
.jdw-card-header {
    display: flex; align-items: center; justify-content: space-between;
    padding: 16px 20px;
    border-bottom: 1px solid var(--border-color);
    background: linear-gradient(135deg, #0c1a2e 0%, #1e3a5f 100%);
    gap: 12px; flex-wrap: wrap;
}

/* Dokter info (left) */
.jdw-dok-info { display: flex; align-items: center; gap: 14px; }
.jdw-dok-photo {
    width: 52px; height: 52px; border-radius: 50%;
    object-fit: cover; object-position: top;
    border: 2.5px solid rgba(255,255,255,.2);
    flex-shrink: 0;
}
.jdw-dok-avatar {
    width: 52px; height: 52px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 18px; font-weight: 800; color: #fff; flex-shrink: 0;
    border: 2.5px solid rgba(255,255,255,.15);
}
.jdw-dok-name {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 15px; font-weight: 800; color: #fff;
}
.jdw-dok-spesialis {
    font-size: 12px; color: rgba(255,255,255,.55);
    margin-top: 3px; display: flex; align-items: center; gap: 5px;
}
.jdw-dok-spesialis i { font-size: 10px; color: var(--primary); }

/* Header actions (right) */
.jdw-header-actions { display: flex; gap: 8px; align-items: center; }
.btn-add-jadwal {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 8px 16px; border-radius: var(--radius-sm);
    background: var(--primary); color: #fff; border: none;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 12.5px; font-weight: 700; cursor: pointer;
    transition: background var(--transition), transform var(--transition), box-shadow var(--transition);
    box-shadow: 0 3px 10px rgba(14,165,233,.3);
}
.btn-add-jadwal:hover { background: var(--blue-dark); transform: translateY(-1px); box-shadow: 0 6px 16px rgba(14,165,233,.4); }

.btn-collapse-jadwal {
    width: 32px; height: 32px; border-radius: 8px;
    background: rgba(255,255,255,.1); color: rgba(255,255,255,.7);
    border: 1px solid rgba(255,255,255,.15); cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    font-size: 13px; transition: background var(--transition), transform var(--transition);
}
.btn-collapse-jadwal:hover { background: rgba(255,255,255,.2); color: #fff; }
.btn-collapse-jadwal.collapsed i { transform: rotate(-90deg); }

/* ============================================================
   JADWAL TABLE (per dokter)
============================================================ */
.jdw-table-wrap {
    overflow-x: auto;
    padding: 20px;
}
.jdw-table-wrap::-webkit-scrollbar { height: 6px; }
.jdw-table-wrap::-webkit-scrollbar-thumb { background: var(--border-color); border-radius: 3px; }

.jdw-hari-table {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 10px;
    min-width: 700px;
}

/* Day column */
.jdw-day-col { display: flex; flex-direction: column; gap: 8px; }

/* Day header */
.jdw-day-header {
    background: #1C145C;
    color: #fff;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px; font-weight: 800;
    text-align: center; padding: 10px 6px;
    border-radius: var(--radius-sm);
    letter-spacing: .3px;
}

/* Slot card (sesuai output user) */
.jdw-slot {
    background: #fff; border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm);
    padding: 12px 8px; text-align: center;
    min-height: 100px; display: flex; flex-direction: column;
    align-items: center; justify-content: center; gap: 4px;
    position: relative; transition: border-color var(--transition), box-shadow var(--transition);
}
.jdw-slot:hover { border-color: var(--primary); box-shadow: 0 3px 12px rgba(14,165,233,.12); }

/* Libur slot */
.jdw-slot.libur { background: #f8faff; }
.jdw-slot.libur .slot-poli   { color: var(--text-muted); opacity: .5; }
.jdw-slot.libur .slot-jam    { font-size: 14px; font-weight: 700; color: #cbd5e1; }
.jdw-slot.libur .slot-sesi   { font-size: 11px; color: #94a3b8; }

/* Active slot */
.slot-poli {
    font-size: 12px; color: var(--text-muted); font-weight: 500; line-height: 1.3;
}
.slot-jam {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 14px; font-weight: 800; color: #1C145C;
    letter-spacing: -.3px; margin: 2px 0;
}
.slot-sesi {
    font-size: 11px; color: var(--text-muted); font-weight: 600;
}
.slot-libur-text {
    font-size: 13px; font-weight: 700; color: #94a3b8; letter-spacing: .3px;
}

/* Slot action buttons (on hover) */
.slot-actions {
    position: absolute; top: 5px; right: 5px;
    display: flex; gap: 3px;
    opacity: 0; transition: opacity var(--transition);
}
.jdw-slot:hover .slot-actions { opacity: 1; }
.slot-btn {
    width: 22px; height: 22px; border-radius: 5px;
    display: flex; align-items: center; justify-content: center;
    font-size: 10px; cursor: pointer; border: none;
    transition: background var(--transition);
}
.slot-btn-edit   { background: var(--primary-light); color: var(--primary); }
.slot-btn-edit:hover   { background: var(--primary); color: #fff; }
.slot-btn-delete { background: #fee2e2; color: #ef4444; }
.slot-btn-delete:hover { background: #ef4444; color: #fff; }
.slot-btn-add    { background: #d1fae5; color: #059669; }
.slot-btn-add:hover { background: #059669; color: #fff; }

/* ---- Empty state ---- */
.empty-state {
    padding: 64px 24px; text-align: center; color: var(--text-muted);
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
.am-modal .modal-body   { padding: 26px 26px 8px; }
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
.mfg-input, .mfg-select {
    width: 100%; padding: 10px 13px;
    border: 1.5px solid var(--border-color); border-radius: var(--radius-sm);
    font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13.5px; color: var(--text-main);
    outline: none; background: var(--body-bg);
    transition: border-color var(--transition), box-shadow var(--transition), background var(--transition);
}
.mfg-input:focus, .mfg-select:focus {
    border-color: var(--primary); box-shadow: 0 0 0 3px rgba(14,165,233,.12); background: #fff;
}
.mfg-input::placeholder { color: #b0bec5; }
.mfg-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
@media(max-width:575px) { .mfg-row { grid-template-columns: 1fr; } }

/* Day checkboxes */
.day-check-grid {
    display: grid; grid-template-columns: repeat(7, 1fr); gap: 6px;
}
.day-check-item { display: flex; flex-direction: column; align-items: center; gap: 5px; }
.day-check-item input[type="checkbox"] { display: none; }
.day-check-label {
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    width: 100%; padding: 8px 4px; border-radius: 8px;
    border: 1.5px solid var(--border-color); cursor: pointer;
    background: var(--body-bg); font-size: 11px; font-weight: 700;
    color: var(--text-muted); transition: all var(--transition);
    text-align: center; line-height: 1.2;
}
.day-check-item input:checked + .day-check-label {
    background: #1C145C; border-color: #1C145C; color: #fff;
}
.day-check-label:hover { border-color: var(--primary); color: var(--primary); }

/* Sesi toggle */
.sesi-toggle-group { display: flex; gap: 8px; }
.sesi-toggle-group label {
    flex: 1; display: flex; align-items: center; justify-content: center; gap: 7px;
    padding: 9px 14px; border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm); font-size: 13px; font-weight: 600;
    cursor: pointer; transition: all var(--transition);
    background: var(--body-bg); color: var(--text-muted);
}
.sesi-toggle-group input { display: none; }
.sesi-toggle-group input:checked + label.lbl-pagi   { background: #fef3c7; border-color: #fde047; color: #92400e; }
.sesi-toggle-group input:checked + label.lbl-siang  { background: #dbeafe; border-color: #93c5fd; color: #1d4ed8; }
.sesi-toggle-group input:checked + label.lbl-malam  { background: #ede9fe; border-color: #c4b5fd; color: #5b21b6; }

/* Preview jadwal in modal */
.jadwal-preview {
    background: var(--body-bg); border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm); padding: 14px 16px; margin-top: 16px;
}
.jp-title { font-size: 11px; font-weight: 800; color: var(--text-muted); text-transform: uppercase; letter-spacing: .7px; margin-bottom: 10px; }
.jp-grid  { display: flex; gap: 8px; flex-wrap: wrap; }
.jp-day-badge {
    display: inline-flex; flex-direction: column; align-items: center;
    padding: 8px 12px; border-radius: 8px; background: #1C145C; color: #fff;
    font-family: 'Plus Jakarta Sans', sans-serif; min-width: 70px;
}
.jp-day-name { font-size: 11px; font-weight: 700; opacity: .6; margin-bottom: 3px; }
.jp-day-jam  { font-size: 13px; font-weight: 800; }
.jp-day-sesi { font-size: 10px; opacity: .55; margin-top: 2px; }

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
}
.btn-danger-am {
    padding: 10px 24px; background: #ef4444; color: #fff; border: none;
    border-radius: var(--radius-sm); font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13.5px; font-weight: 700; cursor: pointer;
    display: inline-flex; align-items: center; gap: 8px;
    transition: background var(--transition), box-shadow var(--transition);
}
.btn-danger-am:hover { background: #dc2626; box-shadow: 0 6px 20px rgba(239,68,68,.35); }

/* Responsive */
@media(max-width:767.98px) {
    .jdw-stats { gap: 8px; }
    .jdw-stat  { min-width: 120px; }
    .jdw-toolbar { flex-direction: column; align-items: stretch; }
    .day-check-grid { grid-template-columns: repeat(4, 1fr); }
    .am-modal .modal-body   { padding: 18px 16px 8px; }
    .am-modal .modal-footer { padding: 12px 16px 20px; }
}
.jdw-day-header.minggu-libur{
    background:#ef4444;
    color:#fff;
}

#modalTambah .modal-content{
    max-height: 90vh;
    overflow: hidden;
}

#modalTambah .modal-body{
    overflow-y: auto;
    max-height: calc(90vh - 140px);
    padding-right: 8px;
}

/* scrollbar */
#modalTambah .modal-body::-webkit-scrollbar{
    width: 6px;
}

#modalTambah .modal-body::-webkit-scrollbar-thumb{
    background: #cbd5e1;
    border-radius: 10px;
}
</style>
@endpush

@section('content')

{{-- ================================================================
     PAGE HEADER
================================================================ --}}
<div class="page-header">
    <div class="page-header-left">
        <div class="ph-title">Jadwal Praktik Dokter</div>
        <div class="ph-sub">Kelola jadwal praktik dokter yang tampil di halaman website</div>
    </div>
    <button class="btn-primary-am" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="fa-solid fa-calendar-plus"></i>
        Tambah Jadwal
    </button>
</div>

{{-- ================================================================
     STATS STRIP
================================================================ --}}
<div class="jdw-stats">
    <div class="jdw-stat">
        <div class="jdw-stat-icon" style="background:#e0f2fe;color:#0284c7;">
            <i class="fa-solid fa-calendar-days"></i>
        </div>
        <div>
            <div class="jdw-stat-val">{{ $totalJadwal ?? 14 }}</div>
            <div class="jdw-stat-lbl">Total Jadwal</div>
        </div>
    </div>
    <div class="jdw-stat">
        <div class="jdw-stat-icon" style="background:#d1fae5;color:#059669;">
            <i class="fa-solid fa-user-doctor"></i>
        </div>
        <div>
            <div class="jdw-stat-val">{{ $totalDokterAktif ?? 5 }}</div>
            <div class="jdw-stat-lbl">Dokter Aktif</div>
        </div>
    </div>
    <div class="jdw-stat">
        <div class="jdw-stat-icon" style="background:#fef3c7;color:#d97706;">
            <i class="fa-solid fa-sun"></i>
        </div>
        <div>
            <div class="jdw-stat-val">{{ $jadwalHariIni ?? 4 }}</div>
            <div class="jdw-stat-lbl">Praktik Hari Ini</div>
        </div>
    </div>
    
</div>

{{-- ================================================================
     TOOLBAR
================================================================ --}}
<div class="jdw-toolbar">
    <div class="search-wrap">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="search" class="search-input" id="searchJdw"
               placeholder="Cari nama dokter...">
    </div>
    <select class="filter-select" id="filterHari">
        <option value="">Semua Hari</option>
        <option value="senin">Senin</option>
        <option value="selasa">Selasa</option>
        <option value="rabu">Rabu</option>
        <option value="kamis">Kamis</option>
        <option value="jumat">Jumat</option>
        <option value="sabtu">Sabtu</option>
        <option value="minggu">Minggu</option>
    </select>
    <select class="filter-select" id="filterSesi">
        <option value="">Semua Sesi</option>
        <option value="Pagi">Pagi</option>
        <option value="Siang">Siang</option>
        <option value="Malam">Malam</option>
    </select>
</div>

{{-- ================================================================
     DATA
================================================================ --}}
@php

$hariList = [
    'Senin',
    'Selasa',
    'Rabu',
    'Kamis',
    'Jumat',
    'Sabtu',
    'Minggu'
];

/*
|--------------------------------------------------------------------------
| Penanda hari sekarang
|--------------------------------------------------------------------------
| Senin = 0
| Minggu = 6
*/
$todayMap = [
    'Monday'    => 0,
    'Tuesday'   => 1,
    'Wednesday' => 2,
    'Thursday'  => 3,
    'Friday'    => 4,
    'Saturday'  => 5,
    'Sunday'    => 6,
];

$todayIdx = $todayMap[date('l')] ?? 0;

/*
|--------------------------------------------------------------------------
| Gradient avatar dokter
|--------------------------------------------------------------------------
*/
$gradients = [
    'linear-gradient(135deg,#0ea5e9,#06b6d4)',
    'linear-gradient(135deg,#8b5cf6,#6d28d9)',
    'linear-gradient(135deg,#10b981,#059669)',
    'linear-gradient(135deg,#f59e0b,#d97706)',
    'linear-gradient(135deg,#ef4444,#dc2626)',
];

/*
|--------------------------------------------------------------------------
| Data dokter dari database
|--------------------------------------------------------------------------
*/
$dokterList = $dokterList ?? [];

@endphp

<div id="jadwalContainer">

@forelse($dokterList as $i => $dok)

@php
    $dokId     = $dok->id;
    $nama      = $dok->nama;
    $spesialis = $dok->spesialis;
    $gambar    = $dok->foto;
    $imgUrl    = $gambar ? asset('uploads/dokter/' . $gambar) : null;

    $inisial = strtoupper(substr($nama, 0, 1));

    $gradients = [
        'linear-gradient(135deg,#0ea5e9,#06b6d4)',
        'linear-gradient(135deg,#8b5cf6,#6d28d9)',
        'linear-gradient(135deg,#10b981,#059669)',
        'linear-gradient(135deg,#f59e0b,#d97706)',
        'linear-gradient(135deg,#ef4444,#dc2626)',
    ];

    $grad = $gradients[$loop->index % count($gradients)];

    // jadwal tetap object (collection)
    $jadwal = $dok->jadwal->keyBy('hari');
@endphp

<div class="jdw-card" data-dok-nama="{{ strtolower($nama) }}">

    {{-- Card header --}}
    <div class="jdw-card-header">

        {{-- Dokter info --}}
        <div class="jdw-dok-info">
            @if($imgUrl)
                <img src="{{ $imgUrl }}" alt="{{ $nama }}" class="jdw-dok-photo">
            @else
                <div class="jdw-dok-avatar" style="background:{{ $grad }};">{{ $inisial }}</div>
            @endif
            <div>
                <div class="jdw-dok-name">{{ $nama }}</div>
                <div class="jdw-dok-spesialis">
                    <i class="fa-solid fa-stethoscope"></i>
                    {{ $spesialis }}
                </div>
            </div>
        </div>

        {{-- Actions --}}
        <div class="jdw-header-actions">
            <button class="btn-add-jadwal"
                onclick="openTambahModal('{{ $dokId }}', `{{ addslashes($nama) }}`, `{{ addslashes($spesialis) }}`)">
                <i class="fa-solid fa-plus"></i>
                Tambah Jadwal
            </button>
            <button class="btn-collapse-jadwal" title="Sembunyikan/Tampilkan"
                onclick="toggleCollapse(this)"
                data-target="jadwal-body-{{ $dokId }}">
                <i class="fa-solid fa-chevron-up"></i>
            </button>
        </div>

    </div>

<div class="jdw-table-wrap" id="jadwal-body-{{ $dokId }}">
    <div class="jdw-hari-table">

        @foreach($hariList as $hari)

        @php
            $slot = $jadwal[$hari] ?? null;

            $jamMulai = '';
            $jamSelesai = '';

            if($slot && isset($slot['jam'])){

                $pecahJam = explode(' - ', $slot['jam']);

                $jamMulai = $pecahJam[0] ?? '';
                $jamSelesai = $pecahJam[1] ?? '';
            }
        @endphp

        <div class="jdw-day-col">

            <div class="jdw-day-header {{ $hari == 'Minggu' ? 'minggu-libur' : '' }}">
                {{ $hari }}
            </div>

            <div class="jdw-slot {{ $slot ? '' : 'libur' }}">

                @if($slot)

                    <div class="slot-actions">

                    <button
                        class="slot-btn slot-btn-edit"
                        title="Edit jadwal"

                        onclick="openEditModal(
                            '{{ data_get($slot, 'id') }}',
                            '{{ $dokId }}',
                            `{{ addslashes($nama) }}`,
                            '{{ $hari }}',
                            '{{ addslashes(data_get($slot,'klinik')) }}',
                            '{{ data_get($slot,'jam_mulai') }}',
                            '{{ data_get($slot,'jam_selesai') }}',
                            '{{ data_get($slot,'sesi') }}'
                        )">
                        <i class="fa-solid fa-pen"></i>

                    </button>

                    <button
    class="slot-btn slot-btn-delete"
    title="Hapus jadwal"

    onclick="openDeleteModal(
    '{{ data_get($slot, 'id') }}',
    `{{ addslashes($nama) }}`,
    '{{ $hari }}'
)">

    <i class="fa-solid fa-trash-can"></i>
</button>

                </div>

                    <div class="slot-poli">
                        {{ $slot->klinik }}
                    </div>

                    <div class="slot-jam">
                        {{ $slot->jam }}
                    </div>

                @else

                    <div class="slot-actions">

                        <button
                            class="slot-btn slot-btn-add"
                            title="Tambah jadwal"

                            onclick="openTambahModalHari(
                                '{{ $dokId }}',
                                `{{ addslashes($nama) }}`,
                                '{{ $hari }}'
                            )">

                            <i class="fa-solid fa-plus"></i>

                        </button>

                    </div>

                    <div class="slot-libur-text">
                        Libur
                    </div>

                @endif

            </div>

        </div>

        @endforeach

    </div>
</div>

</div>

@empty

<div class="empty-state">

    <div class="es-icon">
        <i class="fa-solid fa-calendar-days"></i>
    </div>

    <div class="es-title">
        Belum Ada Jadwal
    </div>

    <div class="es-sub">
        Tambahkan jadwal praktik dokter agar tampil di website.
    </div>

    <button
        class="btn-primary-am"
        data-bs-toggle="modal"
        data-bs-target="#modalTambah">

        <i class="fa-solid fa-plus"></i>
        Tambah Jadwal

    </button>

</div>

@endforelse

</div>



{{-- ================================================================
     MODAL: TAMBAH JADWAL
================================================================ --}}
<div class="modal fade am-modal" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <span class="mt-icon"><i class="fa-solid fa-calendar-plus"></i></span>
                    Tambah Jadwal Praktik
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('admin.jadwal.store') }}" method="POST" id="formTambah">
                @csrf
                <input type="hidden" name="dokter_id" id="tambahDokterIdHidden">

                <div class="modal-body">

                    {{-- Pilih Dokter --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-user-doctor"></i>
                            Dokter <span class="req">*</span>
                        </div>
                        <select name="dokter_id" class="mfg-select" id="tambahDokterSelect" required
                                onchange="onDokterChange('tambah')">
                            <option value="">-- Pilih Dokter --</option>
                            @foreach($dokterList as $d)
                            <option value="{{ $d['id'] ?? $d->id }}">
                                {{ $d['nama'] ?? $d->nama }} — {{ $d['spesialis'] ?? $d->spesialis }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Hari Praktik (checkbox multi) --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-calendar-week"></i>
                            Hari Praktik <span class="req">*</span>
                        </div>
                        <div class="day-check-grid" id="tambahHariGrid">
                            @foreach($hariList as $h)
                            <div class="day-check-item">
                                <input type="checkbox" name="hari[]" value="{{ $h }}"
                                       id="hari_{{ strtolower($h) }}"
                                       onchange="updateJadwalPreview()">
                                <label class="day-check-label" for="hari_{{ strtolower($h) }}">
                                    {{ substr($h, 0, 3) }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                        <div style="font-size:11px;color:var(--text-muted);margin-top:5px;">
                            Pilih satu atau beberapa hari sekaligus
                        </div>
                    </div>

                    {{-- Nama Poli --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-hospital"></i>
                            Nama Poli <span class="req">*</span>
                        </div>
                        <select name="poli" class="mfg-select" id="tambahPoli" required
                                onchange="updateJadwalPreview()">
                            <option value="">-- Pilih Poli --</option>
                            <option value="Poli Spesialis Obgyn">Poli Spesialis Obgyn</option>
                            <option value="Poli Spesialis Anak">Poli Spesialis Anak</option>
                            <option value="Poli Gigi">Poli Gigi</option>
                            <option value="Poli Orthodonti">Poli Orthodonti</option>
                            <option value="Poli Mata">Poli Mata</option>
                            <option value="Poli Spesialis THT">Poli Spesialis THT</option>
                            <option value="Poli Kulit">Poli Kulit</option>
                            <option value="Poli Jantung">Poli Jantung</option>
                            <option value="Poli Saraf">Poli Saraf</option>
                            <option value="Poli Bedah">Poli Bedah</option>
                            <option value="Poli Dalam">Poli Penyakit Dalam</option>
                            <option value="Poli Radiologi">Poli Radiologi</option>
                            <option value="Poli Umum & MCU">Poli Umum & MCU</option>
                            <option value="Poli Jiwa">Poli Jiwa</option>
                            <option value="Poli Dermatologi">Poli Dermatologi, Venerologi & Estetika</option>

                        </select>
                    </div>

                    {{-- Jam Mulai & Selesai --}}
                    <div class="mfg-row mfg">

                        {{-- Jam Mulai --}}
                        <div>
                            <div class="mfg-label">
                                <i class="fa-regular fa-clock"></i>
                                Jam Mulai <span class="req">*</span>
                            </div>

                            <input type="text"
                                name="jam_mulai"
                                class="mfg-input"
                                id="tambahJamMulai"
                                placeholder="08:00"
                                maxlength="5"
                                required
                                oninput="formatJam(this); autoSetSesi(); updateJadwalPreview();">
                        </div>

                        {{-- Jam Selesai --}}
                        <div>
                            <div class="mfg-label">
                                <i class="fa-regular fa-clock"></i>
                                Jam Selesai <span class="req">*</span>
                            </div>

                            <input type="text"
                                name="jam_selesai"
                                class="mfg-input"
                                id="tambahJamSelesai"
                                placeholder="14:00"
                                maxlength="5"
                                required
                                oninput="formatJam(this); updateJadwalPreview();">
                        </div>

                    </div>

                    {{-- Sesi --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-sun"></i>
                            Sesi <span class="req">*</span>
                        </div>
                        <div class="sesi-toggle-group">
                            <input type="radio" name="sesi" id="sesiPagi"  value="Pagi"  checked
                                   onchange="updateJadwalPreview()">
                            <label for="sesiPagi"  class="lbl-pagi">
                                <i class="fa-solid fa-sun" style="font-size:12px;"></i> Pagi
                            </label>
                            <input type="radio" name="sesi" id="sesiSiang" value="Siang"
                                   onchange="updateJadwalPreview()">
                            <label for="sesiSiang" class="lbl-siang">
                                <i class="fa-regular fa-sun" style="font-size:12px;"></i> Siang
                            </label>
                            <input type="radio" name="sesi" id="sesiMalam" value="Malam"
                                   onchange="updateJadwalPreview()">
                            <label for="sesiMalam" class="lbl-malam">
                                <i class="fa-solid fa-moon" style="font-size:12px;"></i> Malam
                            </label>
                        </div>
                    </div>

                    {{-- Live preview --}}
                    <div class="jadwal-preview" id="jadwalPreview" style="display:none;">
                        <div class="jp-title">
                            <i class="fa-regular fa-calendar" style="margin-right:5px;color:var(--primary);"></i>
                            Preview Jadwal
                        </div>
                        <div class="jp-grid" id="jpGrid"></div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Batal
                    </button>
                    <button type="submit" class="btn-save">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Jadwal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- ================================================================
     MODAL: EDIT JADWAL (per slot hari)
================================================================ --}}
<div class="modal fade am-modal" id="modalEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(135deg,#1e3a5f 0%,#0ea5e9 100%);">
                <h5 class="modal-title">
                    <span class="mt-icon"><i class="fa-solid fa-pen-to-square"></i></span>
                    Edit Jadwal Praktik
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="" method="POST" id="formEdit">
                @csrf @method('PUT')
                <input type="hidden" name="jadwal_id"  id="editJadwalId">
                <input type="hidden" name="dokter_id"  id="editDokterIdHidden">

                <div class="modal-body">

                    {{-- Info dokter & hari (readonly) --}}
                    <div style="background:var(--body-bg);border:1.5px solid var(--border-color);
                                border-radius:var(--radius-sm);padding:12px 16px;margin-bottom:18px;
                                display:flex;align-items:center;gap:12px;">
                        <div style="width:36px;height:36px;border-radius:9px;background:var(--primary-light);
                                    color:var(--primary);display:flex;align-items:center;justify-content:center;font-size:15px;">
                            <i class="fa-solid fa-user-doctor"></i>
                        </div>
                        <div>
                            <div style="font-size:13px;font-weight:700;color:var(--text-main);" id="editDokterNama">—</div>
                            <div style="font-size:12px;color:var(--text-muted);margin-top:2px;">
                                Hari: <strong id="editHariNama">—</strong>
                            </div>
                        </div>
                    </div>

                    {{-- Poli --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-hospital"></i>
                            Nama Poli <span class="req">*</span>
                        </div>
                        <select name="poli" class="mfg-select" id="editPoli" required>
                            <option value="">-- Pilih Poli --</option>
                            <option value="Poli Spesialis Obgyn">Poli Spesialis Obgyn</option>
                            <option value="Poli Spesialis Anak">Poli Spesialis Anak</option>
                            <option value="Poli Gigi">Poli Gigi</option>
                            <option value="Poli Orthodonti">Poli Orthodonti</option>
                            <option value="Poli Mata">Poli Mata</option>
                            <option value="Poli Spesialis THT">Poli Spesialis THT</option>
                            <option value="Poli Kulit">Poli Kulit</option>
                            <option value="Poli Jantung">Poli Jantung</option>
                            <option value="Poli Saraf">Poli Saraf</option>
                            <option value="Poli Bedah">Poli Bedah</option>
                            <option value="Poli Dalam">Poli Penyakit Dalam</option>
                            <option value="Poli Bedah">Poli Bedah</option>
                        </select>
                    </div>

                    {{-- Jam --}}
<div class="mfg-row mfg">

    {{-- Jam Mulai --}}
    <div>
        <div class="mfg-label">
            <i class="fa-regular fa-clock"></i>
            Jam Mulai <span class="req">*</span>
        </div>
        <input type="text"
               name="jam_mulai"
               class="mfg-input"
               id="editJamMulai"
               placeholder="08:00"
               maxlength="5"
               required
               oninput="formatJam(this); autoSetSesiEdit();">
    </div>

    {{-- Jam Selesai --}}
    <div>
        <div class="mfg-label">
            <i class="fa-regular fa-clock"></i>
            Jam Selesai <span class="req">*</span>
        </div>
        <input type="text"
               name="jam_selesai"
               class="mfg-input"
               id="editJamSelesai"
               placeholder="14:00"
               maxlength="5"
               required
               oninput="formatJam(this);">
    </div>

</div>

                    {{-- Sesi --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-sun"></i>
                            Sesi <span class="req">*</span>
                        </div>
                        <div class="sesi-toggle-group">
                            <input type="radio" name="sesi" id="editSesiPagi"  value="Pagi">
                            <label for="editSesiPagi"  class="lbl-pagi"><i class="fa-solid fa-sun" style="font-size:12px;"></i> Pagi</label>
                            <input type="radio" name="sesi" id="editSesiSiang" value="Siang">
                            <label for="editSesiSiang" class="lbl-siang"><i class="fa-regular fa-sun" style="font-size:12px;"></i> Siang</label>
                            <input type="radio" name="sesi" id="editSesiMalam" value="Malam">
                            <label for="editSesiMalam" class="lbl-malam"><i class="fa-solid fa-moon" style="font-size:12px;"></i> Malam</label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Batal
                    </button>
                    <button type="submit" class="btn-save">
                        <i class="fa-solid fa-floppy-disk"></i> Perbarui Jadwal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- ================================================================
     MODAL: HAPUS JADWAL
================================================================ --}}
<div class="modal fade am-modal" id="modalHapus" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width:420px;">
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(135deg,#7f1d1d 0%,#ef4444 100%);">
                <h5 class="modal-title">
                    <span class="mt-icon"><i class="fa-solid fa-triangle-exclamation"></i></span>
                    Hapus Jadwal
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="" method="POST" id="formHapus">
                @csrf @method('DELETE')
                <div class="del-body">
                    <div class="del-icon"><i class="fa-solid fa-calendar-xmark"></i></div>
                    <div class="del-title">Hapus Jadwal Ini?</div>
                    <div class="del-sub">
                        Jadwal praktik berikut akan dihapus dan hari tersebut akan ditandai <strong>Libur</strong> di website.
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
   JADWAL PRAKTIK PAGE — JavaScript
============================================================ */

const HARI_LIST = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];

/* ---- Toggle collapse jadwal body ---- */
function toggleCollapse(btn) {
    const targetId = btn.dataset.target;
    const body     = document.getElementById(targetId);
    if (!body) return;
    const icon = btn.querySelector('i');
    if (body.style.display === 'none') {
        body.style.display = '';
        icon.style.transform = 'rotate(0)';
        btn.classList.remove('collapsed');
    } else {
        body.style.display = 'none';
        icon.style.transform = 'rotate(-90deg)';
        btn.classList.add('collapsed');
    }
}

/* ---- Open TAMBAH modal (from header button) ---- */
function openTambahModal(dokId, nama, spesialis) {
    const sel = document.getElementById('tambahDokterSelect');
    if (sel) {
        for (let opt of sel.options) {
            opt.selected = (opt.value == dokId);
        }
    }
    document.getElementById('tambahDokterIdHidden').value = dokId;

    // Clear all day checkboxes
    document.querySelectorAll('#tambahHariGrid input[type="checkbox"]')
            .forEach(cb => { cb.checked = false; });

    // Reset other fields
    document.getElementById('tambahPoli').value       = '';
    document.getElementById('tambahJamMulai').value   = '';
    document.getElementById('tambahJamSelesai').value = '';
    document.getElementById('sesiPagi').checked = true;

    updateJadwalPreview();
    new bootstrap.Modal(document.getElementById('modalTambah')).show();
}

/* ---- Open TAMBAH modal pre-selected hari ---- */
function openTambahModalHari(dokId, nama, hari) {
    openTambahModal(dokId, nama, '');
    const cb = document.getElementById('hari_' + hari.toLowerCase());
    if (cb) { cb.checked = true; updateJadwalPreview(); }
}

/* ---- On dokter select change ---- */
function onDokterChange(prefix) {
    const sel = document.getElementById(prefix + 'DokterSelect');
    const hid = document.getElementById(prefix + 'DokterIdHidden');
    if (hid && sel) hid.value = sel.value;
}

/* ---- Format jam Indonesia 24 jam (HH:MM) ---- */
function formatJam(input) {
    let val = input.value.replace(/\D/g, '');
    if (val.length >= 3) {
        val = val.substring(0, 2) + ':' + val.substring(2, 4);
    }
    input.value = val;
}

/* ---- Helper: ambil sesi dari string jam "HH:MM" ---- */
function getSesiDariJam(jam) {
    if (!jam || jam.length < 5) return null;
    const h = parseInt(jam.split(':')[0], 10);
    if (h >= 5  && h < 12) return 'Pagi';
    if (h >= 12 && h < 19) return 'Siang';
    return 'Malam';
}

/* ---- Auto set sesi — TAMBAH modal ---- */
function autoSetSesi() {
    const jam  = document.getElementById('tambahJamMulai')?.value;
    const sesi = getSesiDariJam(jam);
    if (!sesi) return;
    document.getElementById('sesiPagi').checked  = (sesi === 'Pagi');
    document.getElementById('sesiSiang').checked = (sesi === 'Siang');
    document.getElementById('sesiMalam').checked = (sesi === 'Malam');
    updateJadwalPreview();
}

/* ---- Auto set sesi — EDIT modal ---- */
function autoSetSesiEdit() {
    const jam  = document.getElementById('editJamMulai')?.value;
    const sesi = getSesiDariJam(jam);
    if (!sesi) return;
    document.getElementById('editSesiPagi').checked  = (sesi === 'Pagi');
    document.getElementById('editSesiSiang').checked = (sesi === 'Siang');
    document.getElementById('editSesiMalam').checked = (sesi === 'Malam');
}

/* ---- Live preview for tambah modal ---- */
function updateJadwalPreview() {
    const checked = Array.from(
        document.querySelectorAll('#tambahHariGrid input:checked')
    ).map(cb => cb.value);

    const poli  = document.getElementById('tambahPoli')?.value       || '';
    const mulai = document.getElementById('tambahJamMulai')?.value   || '';
    const sls   = document.getElementById('tambahJamSelesai')?.value || '';
    const sesi  = document.querySelector('input[name="sesi"]:checked')?.value || 'Pagi';

    const preview = document.getElementById('jadwalPreview');
    const grid    = document.getElementById('jpGrid');
    if (!preview || !grid) return;

    if (!checked.length || !mulai) {
        preview.style.display = 'none'; return;
    }

    preview.style.display = '';
    grid.innerHTML = checked.map(h =>
        `<div class="jp-day-badge">
            <span class="jp-day-name">${h.substring(0,3).toUpperCase()}</span>
            <span class="jp-day-jam">${mulai}${sls ? ' – ' + sls : ''}</span>
            <span class="jp-day-sesi">${poli || '-'} · ${sesi}</span>
        </div>`
    ).join('');
}

/* ---- Open EDIT modal (per slot hari) ---- */
function openEditModal(jadwalId, dokId, nama, hari, poli, mulai, selesai, sesi) {
    document.getElementById('editJadwalId').value        = jadwalId;
    document.getElementById('editDokterIdHidden').value  = dokId;
    document.getElementById('editDokterNama').textContent = nama;
    document.getElementById('editHariNama').textContent   = hari;
    document.getElementById('editJamMulai').value   = mulai;
    document.getElementById('editJamSelesai').value = selesai;
    document.getElementById('formEdit').action =
        '{{ url("admin/jadwal") }}/' + (jadwalId ?? '');

    // Set poli select
    const poliSel = document.getElementById('editPoli');
    for (let opt of poliSel.options) { opt.selected = (opt.value === poli); }

    // Set sesi dari data, lalu sync dari jam mulai
    document.getElementById('editSesiPagi').checked  = (sesi === 'Pagi');
    document.getElementById('editSesiSiang').checked = (sesi === 'Siang');
    document.getElementById('editSesiMalam').checked = (sesi === 'Malam');
    autoSetSesiEdit();

    new bootstrap.Modal(document.getElementById('modalEdit')).show();
}

/* ---- Open DELETE modal ---- */
function openDeleteModal(jadwalId, nama, hari) {
    console.log('JADWAL ID:', jadwalId);

    if (!jadwalId) {
        alert('ID jadwal tidak ditemukan!');
        return;
    }

    document.getElementById('formHapus').action =
        `{{ url('admin/jadwal') }}/${jadwalId}`;

    document.getElementById('delTarget').textContent = `${nama} — ${hari}`;

    new bootstrap.Modal(document.getElementById('modalHapus')).show();
}

/* ---- Reset tambah modal on close ---- */
document.getElementById('modalTambah').addEventListener('hidden.bs.modal', function () {
    document.getElementById('formTambah').reset();
    document.getElementById('jadwalPreview').style.display = 'none';
    document.getElementById('jpGrid').innerHTML = '';
});

/* ---- Live search by dokter name ---- */
document.getElementById('searchJdw').addEventListener('input', function () {
    const q = this.value.toLowerCase();
    document.querySelectorAll('.jdw-card').forEach(function (card) {
        const n = card.dataset.dokNama || '';
        card.style.display = (!q || n.includes(q)) ? '' : 'none';
    });
});

/* ---- Watch perubahan field tambah modal ---- */
document.getElementById('tambahJamMulai')?.addEventListener('input', updateJadwalPreview);
document.getElementById('tambahJamSelesai')?.addEventListener('input', updateJadwalPreview);
document.getElementById('tambahPoli')?.addEventListener('change', updateJadwalPreview);
</script>
@endpush