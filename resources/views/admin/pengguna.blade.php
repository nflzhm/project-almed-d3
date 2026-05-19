@extends('admin.layout')

@section('title', 'Pengguna Web')
@section('page-title', 'Pengguna Web')

@section('breadcrumb')
    <li class="breadcrumb-item active">Pengguna Web</li>
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
    font-size: 20px; font-weight: 800; color: var(--text-main); letter-spacing: -.3px;
}
.page-header-left .ph-sub { font-size: 13px; color: var(--text-muted); margin-top: 3px; }

/* ---- Stats strip ---- */
.pgn-stats { display: flex; gap: 12px; margin-bottom: 24px; flex-wrap: wrap; }
.pgn-stat {
    flex: 1; min-width: 130px; background: var(--card-bg);
    border: 1px solid var(--border-color); border-radius: var(--radius);
    padding: 16px 20px; display: flex; align-items: center; gap: 14px;
    box-shadow: var(--shadow-sm);
    transition: box-shadow var(--transition), transform var(--transition);
}
.pgn-stat:hover { box-shadow: var(--shadow-md); transform: translateY(-2px); }
.pgn-stat-icon {
    width: 42px; height: 42px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; flex-shrink: 0;
}
.pgn-stat-val {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 22px; font-weight: 800; color: var(--text-main); line-height: 1;
}
.pgn-stat-lbl { font-size: 12px; color: var(--text-muted); margin-top: 3px; font-weight: 500; }

/* ---- Toolbar ---- */
.pgn-toolbar {
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
   TABLE
============================================================ */
.pgn-table-card {
    background: var(--card-bg); border: 1px solid var(--border-color);
    border-radius: var(--radius); box-shadow: var(--shadow-sm); overflow: hidden;
}

/* Table head */
.pgn-table-head {
    display: grid;
    grid-template-columns: 60px 1.4fr 260px 180px 140px 130px;
    column-gap: 18px;
    background: var(--body-bg); border-bottom: 1px solid var(--border-color);
    padding: 0 20px;
}
.pgn-th {
    padding: 12px 8px;
    font-size: 11px; font-weight: 700; text-transform: uppercase;
    letter-spacing: .8px; color: var(--text-muted);
}

/* Table rows */
.pgn-row {
    display: grid;
    grid-template-columns: 60px 1.4fr 260px 180px 140px 130px;
    column-gap: 18px;

    align-items: center;
    padding: 0 24px;
    border-bottom: 1px solid var(--border-color);
    transition: background var(--transition);
    animation: rowIn .28s ease both;
}
@keyframes rowIn {
    from { opacity: 0; transform: translateX(-6px); }
    to   { opacity: 1; transform: translateX(0); }
}
.pgn-row:nth-child(1){animation-delay:.03s} .pgn-row:nth-child(2){animation-delay:.06s}
.pgn-row:nth-child(3){animation-delay:.09s} .pgn-row:nth-child(4){animation-delay:.12s}
.pgn-row:nth-child(5){animation-delay:.15s} .pgn-row:nth-child(6){animation-delay:.18s}
.pgn-row:last-child { border-bottom: 0; }
.pgn-row:hover { background: #f8faff; }
.pgn-td { padding: 13px 8px; font-size: 13.5px; color: var(--text-main); }

/* Avatar */
.pgn-avatar {
    width: 38px; height: 38px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 14px; font-weight: 800; color: #fff; flex-shrink: 0;
    position: relative;
}
.pgn-avatar .online-dot {
    position: absolute; bottom: 1px; right: 1px;
    width: 10px; height: 10px; border-radius: 50%;
    background: #10b981; border: 2px solid var(--card-bg);
}

/* User info cell */
.pgn-user-cell { display: flex; align-items: center; gap: 12px; }
.pgn-user-name { font-size: 13.5px; font-weight: 700; color: var(--text-main); }
.pgn-user-uname {
    font-size: 12px; color: var(--text-muted); margin-top: 2px;
    display: flex; align-items: center; gap: 4px;
}
.pgn-user-uname i { font-size: 10px; }

/* Email cell */
.pgn-email {
    font-size: 13px; color: var(--text-muted);
    display: flex; align-items: center; gap: 5px;
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
}
.pgn-email i { font-size: 11px; color: var(--primary); flex-shrink: 0; }

/* Role badge */
.role-badge {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 4px 12px; border-radius: 20px;
    font-size: 11px; font-weight: 700;
}
.role-admin { background: #ede9fe; color: #6d28d9; }
.role-user  { background: #d1fae5; color: #065f46; }

/* Join date */
.pgn-date { font-size: 12px; color: var(--text-muted); }

/* Row actions */
.pgn-row-actions { display: flex; gap: 5px; }
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
.am-modal .modal-dialog {
    max-width: 560px;
    margin: 1rem auto;
}

.am-modal .modal-dialog-scrollable {
    max-height: calc(100vh - 2rem);
}

.am-modal .modal-body {
    max-height: calc(100vh - 220px);
    overflow-y: auto;
}
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

/* Input with icon */
.mfg-input-wrap { position: relative; }
.mfg-input-wrap .mfg-prefix {
    position: absolute; left: 13px; top: 50%;
    transform: translateY(-50%); color: var(--text-muted); font-size: 13px; pointer-events: none;
}
.mfg-input-wrap.has-prefix .mfg-input { padding-left: 36px; }

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

/* Password input with show/hide toggle */
.mfg-pw-wrap { position: relative; }
.mfg-pw-wrap .mfg-input { padding-left: 36px; padding-right: 40px; }
.mfg-pw-wrap .pw-icon {
    position: absolute; left: 13px; top: 50%;
    transform: translateY(-50%); color: var(--text-muted); font-size: 13px; pointer-events: none;
}
.mfg-pw-wrap .pw-toggle {
    position: absolute; right: 12px; top: 50%;
    transform: translateY(-50%); color: var(--text-muted);
    font-size: 13px; cursor: pointer; background: none; border: none; padding: 4px;
    border-radius: 6px; transition: color var(--transition);
}
.mfg-pw-wrap .pw-toggle:hover { color: var(--primary); }

/* Password strength bar */
.pw-strength-wrap { margin-top: 6px; }
.pw-strength-bar  { height: 4px; border-radius: 2px; background: var(--border-color); overflow: hidden; }
.pw-strength-fill { height: 100%; border-radius: 2px; width: 0; transition: width .4s ease, background .4s ease; }
.pw-strength-text { font-size: 11px; margin-top: 4px; font-weight: 600; }

/* 2 column grid */
.mfg-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
@media(max-width:575px) { .mfg-row { grid-template-columns: 1fr; } }

/* Role toggle */
.role-toggle-group { display: flex; gap: 8px; }
.role-toggle-group label {
    flex: 1; display: flex; align-items: center; justify-content: center; gap: 7px;
    padding: 9px 14px; border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm); font-size: 13px; font-weight: 600;
    cursor: pointer; transition: all var(--transition);
    background: var(--body-bg); color: var(--text-muted);
}
.role-toggle-group input {
    position: absolute;
    opacity: 0;
}
.role-toggle-group input:checked + label.lbl-admin { background: #ede9fe; border-color: #c4b5fd; color: #6d28d9; }
.role-toggle-group input:checked + label.lbl-user  { background: #d1fae5; border-color: #6ee7b7; color: #065f46; }

/* Mini preview bar */
.modal-preview-bar {
    background: linear-gradient(135deg, var(--sidebar-bg), #1e3a5f);
    border-radius: var(--radius-sm); padding: 14px 16px;
    display: flex; align-items: center; gap: 12px; margin-top: 16px;
}
.mpb-avatar {
    width: 42px; height: 42px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 16px; font-weight: 800; color: #fff; flex-shrink: 0;
    background: linear-gradient(135deg, var(--primary), var(--accent));
}
.mpb-name   { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 14px; font-weight: 700; color: #fff; }
.mpb-email  { font-size: 12px; color: rgba(255,255,255,.5); margin-top: 2px; display: flex; align-items: center; gap: 5px; }

/* Char counter */
.char-counter { font-size: 11px; color: var(--text-muted); text-align: right; margin-top: 3px; }
.char-counter.warn { color: var(--warning); }
.char-counter.over { color: var(--danger); }

/* Buttons */
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

/* Pagination */
.pgn-pagination {
    display: flex; align-items: center; justify-content: space-between;
    margin-top: 18px; flex-wrap: wrap; gap: 12px; padding: 0 4px;
}
.pgn-pag-info { font-size: 13px; color: var(--text-muted); }

/* Responsive */
@media(max-width:1199.98px) {
    .pgn-table-head,
    .pgn-row { grid-template-columns: 56px 1fr 160px 130px 110px 90px; }
}
@media(max-width:991.98px) {
    .pgn-table-head { display: none; }
    .pgn-row {
        grid-template-columns: 1fr;
        padding: 14px 18px; gap: 4px;
    }
    .pgn-td:first-child { display: none; }
    .pgn-table-card { overflow: visible; }
}
@media(max-width:767.98px) {
    .pgn-stats { gap: 8px; }
    .pgn-stat  { min-width: 120px; }
    .pgn-toolbar { flex-direction: column; align-items: stretch; }
    .am-modal .modal-body   { padding: 18px 16px 8px; }
    .am-modal .modal-footer { padding: 12px 16px 20px; }
}
</style>
@endpush

@section('content')


<div class="page-header">
    <div class="page-header-left">
        <div class="ph-title">Pengguna Web</div>
        <div class="ph-sub">Kelola akun pengguna yang terdaftar di sistem RSU Allam Medica</div>
    </div>
    <button class="btn-primary-am" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="fa-solid fa-user-plus"></i>
        Tambah Pengguna
    </button>
</div>


<div class="pgn-stats">
    <div class="pgn-stat">
        <div class="pgn-stat-icon" style="background:#e0f2fe;color:#0284c7;">
            <i class="fa-solid fa-users"></i>
        </div>
        <div>
            <div class="pgn-stat-val">{{ isset($users) ? $users->total() : 12 }}</div>
            <div class="pgn-stat-lbl">Total Pengguna</div>
        </div>
    </div>

    <!-- ADMIN -->
    <div class="pgn-stat">
        <div class="pgn-stat-icon" style="background:#d1fae5;color:#059669;">
            <i class="fa-solid fa-user"></i>
        </div>
        <div>
            <div class="pgn-stat-val">{{ $totalAdmin ?? 3 }}</div>
            <div class="pgn-stat-lbl">Admin</div>
        </div>
    </div>

    <!-- SUPER ADMIN -->
    <div class="pgn-stat">
        <div class="pgn-stat-icon" style="background:#ede9fe;color:#6d28d9;">
            <i class="fa-solid fa-user-shield"></i>
        </div>
        <div>
            <div class="pgn-stat-val">{{ $totalSuperAdmin ?? 9 }}</div>
            <div class="pgn-stat-lbl">Super Admin</div>
        </div>
    </div>

    <div class="pgn-stat">
        <div class="pgn-stat-icon" style="background:#fef3c7;color:#d97706;">
            <i class="fa-solid fa-calendar-plus"></i>
        </div>
        <div>
            <div class="pgn-stat-val">{{ $newThisMonth ?? 2 }}</div>
            <div class="pgn-stat-lbl">Baru Bulan Ini</div>
        </div>
    </div>
</div>


<div class="pgn-toolbar">
    <div class="search-wrap">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="search" class="search-input" id="searchUser"
               placeholder="Cari nama, email, atau username...">
    </div>
    <select class="filter-select" id="filterRole">
        <option value="">Semua Role</option>
        <option value="admin">Admin</option>
        <option value="superadmin">Super Admin</option>
    </select>
    <select class="filter-select" id="filterSort">
        <option value="newest">Terbaru</option>
        <option value="oldest">Terlama</option>
        <option value="az">A – Z</option>
    </select>
</div>

{{-- ================================================================
     DUMMY DATA
================================================================ --}}
@php
$avatarColors = [
    'linear-gradient(135deg,#0ea5e9,#06b6d4)',
    'linear-gradient(135deg,#8b5cf6,#6d28d9)',
    'linear-gradient(135deg,#10b981,#059669)',
    'linear-gradient(135deg,#f59e0b,#d97706)',
    'linear-gradient(135deg,#ef4444,#dc2626)',
    'linear-gradient(135deg,#ec4899,#be185d)',
    'linear-gradient(135deg,#3b82f6,#1d4ed8)',
    'linear-gradient(135deg,#14b8a6,#0d9488)',
];
$dummyUsers = [
    ['id'=>1,'nama_lengkap'=>'Budi Santoso','email'=>'budi@allammedica.com','username'=>'budisantoso','role'=>'admin','created_at'=>'2026-01-10'],
    ['id'=>2,'nama_lengkap'=>'Siti Rahayu','email'=>'siti@allammedica.com','username'=>'sitirahayu','role'=>'admin','created_at'=>'2026-01-15'],
    ['id'=>3,'nama_lengkap'=>'Ahmad Fauzi','email'=>'ahmad@gmail.com','username'=>'ahmadfauzi','role'=>'user','created_at'=>'2026-02-03'],
    ['id'=>4,'nama_lengkap'=>'Dewi Lestari','email'=>'dewi@gmail.com','username'=>'dewilestari','role'=>'user','created_at'=>'2026-02-20'],
    ['id'=>5,'nama_lengkap'=>'Rizky Pratama','email'=>'rizky@gmail.com','username'=>'rizkypratama','role'=>'user','created_at'=>'2026-03-05'],
    ['id'=>6,'nama_lengkap'=>'Nur Hidayah','email'=>'nur@gmail.com','username'=>'nurhidayah','role'=>'user','created_at'=>'2026-03-18'],
    ['id'=>7,'nama_lengkap'=>'Hendra Wijaya','email'=>'hendra@allammedica.com','username'=>'hendrawijaya','role'=>'admin','created_at'=>'2026-04-01'],
    ['id'=>8,'nama_lengkap'=>'Rina Puspita','email'=>'rina@gmail.com','username'=>'rinapuspita','role'=>'user','created_at'=>'2026-04-10'],
];
$listUsers = isset($users) ? $users->items() : $dummyUsers;
@endphp


<div class="pgn-table-card">

    {{-- Head --}}
    <div class="pgn-table-head">
        <div class="pgn-th">#</div>
        <div class="pgn-th">Pengguna</div>
        <div class="pgn-th">Email</div>
        <div class="pgn-th">Username</div>
        <div class="pgn-th">Role</div>
        <div class="pgn-th">Aksi</div>
    </div>

    {{-- Rows --}}
    @forelse($listUsers as $i => $item)
    @php
        $id       = $item['id']           ?? $item->id;
        $nama     = $item['nama_lengkap'] ?? $item->nama_lengkap;
        $email    = $item['email']        ?? $item->email;
        $username = $item['username']     ?? $item->username;
        $role     = $item['role']         ?? $item->role ?? 'user';
        $tgl      = $item['created_at']   ?? $item->created_at ?? '-';
        $inisial  = strtoupper(substr($nama, 0, 1));
        $clr      = $avatarColors[$i % count($avatarColors)];
        $tglFmt   = $tgl && $tgl !== '-' ? \Carbon\Carbon::parse($tgl)->format('d M Y') : '-';
    @endphp

    <div class="pgn-row"
         data-id="{{ $id }}"
         data-role="{{ $role }}"
         data-nama="{{ strtolower($nama) }}"
         data-email="{{ strtolower($email) }}"
         data-username="{{ strtolower($username) }}">

        {{-- No --}}
        <div class="pgn-td">
            <span style="font-family:'Plus Jakarta Sans',sans-serif;font-size:12px;font-weight:700;color:var(--text-muted);">
                {{ $i + 1 }}
            </span>
        </div>

        {{-- User --}}
        <div class="pgn-td">
            <div class="pgn-user-cell">
                <div class="pgn-avatar" style="background:{{ $clr }};">
                    {{ $inisial }}
                </div>
                <div>
                    <div class="pgn-user-name">{{ $nama }}</div>
                    <div class="pgn-user-uname">
                        <i class="fa-solid fa-at" style="font-size:9px;"></i>
                        {{ $username }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Email --}}
        <div class="pgn-td">
            <div class="pgn-email">
                <i class="fa-regular fa-envelope"></i>
                {{ $email }}
            </div>
        </div>

        {{-- Username --}}
        <div class="pgn-td">
            <code style="font-size:12.5px;background:var(--body-bg);padding:3px 8px;border-radius:6px;color:var(--text-main);border:1px solid var(--border-color);">
                {{ $username }}
            </code>
        </div>

        {{-- Role --}}
        <div class="pgn-td">
            <span class="role-badge {{ $role === 'superadmin' ? 'role-admin' : 'role-user' }}">
                <i class="fa-solid {{ $role === 'superadmin' ? 'fa-user-shield' : 'fa-user' }}" style="font-size:10px;"></i>
                {{ $role === 'superadmin' ? 'Super Admin' : 'Admin' }}
            </span>
        </div>

        {{-- Aksi --}}
        <div class="pgn-td">
            <div class="pgn-row-actions">
                <button class="btn-icon-sm btn-view" title="Lihat detail"
                    onclick="openDetailModal(
                        '{{ $nama }}', '{{ $email }}', '{{ $username }}',
                        '{{ $role }}', '{{ $tglFmt }}', '{{ $clr }}'
                    )">
                    <i class="fa-solid fa-eye"></i>
                </button>
                <button class="btn-icon-sm btn-edit" title="Edit pengguna"
                    onclick="openEditModal(
                        '{{ $id }}','{{ addslashes($nama) }}',
                        '{{ $email }}','{{ $username }}','{{ $role }}'
                    )">
                    <i class="fa-solid fa-pen"></i>
                </button>
                <button class="btn-icon-sm btn-delete" title="Hapus pengguna"
                    onclick="openDeleteModal('{{ $id }}','{{ addslashes($nama) }}')">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
        </div>

    </div>
    @empty
    <div class="empty-state">
        <div class="es-icon"><i class="fa-solid fa-users"></i></div>
        <div class="es-title">Belum Ada Pengguna</div>
        <div class="es-sub">Tambahkan pengguna pertama untuk mengakses sistem.</div>
        <button class="btn-primary-am" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fa-solid fa-user-plus"></i> Tambah Pengguna
        </button>
    </div>
    @endforelse

</div>

{{-- Pagination --}}
@if(isset($users) && $users->hasPages())
<div class="pgn-pagination">
    <div class="pgn-pag-info">
        Menampilkan {{ $users->firstItem() }}–{{ $users->lastItem() }}
        dari {{ $users->total() }} pengguna
    </div>
    {{ $users->withQueryString()->links() }}
</div>
@endif



<div class="modal fade am-modal" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <span class="mt-icon"><i class="fa-solid fa-user-plus"></i></span>
                    Tambah Pengguna Baru
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('admin.pengguna.store') }}" method="POST" id="formTambah">
                @csrf
                <div class="modal-body">

                    {{-- Nama Lengkap --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-user"></i>
                            Nama Lengkap <span class="req">*</span>
                        </div>
                        <div class="mfg-input-wrap has-prefix">
                            <i class="mfg-prefix fa-solid fa-user"></i>
                            <input type="text" name="nama_lengkap" class="mfg-input"
                                   id="tambahNama"
                                   placeholder="Contoh: Budi Santoso"
                                   maxlength="100" required
                                   oninput="syncPreview('tambah')">
                        </div>
                        <div class="char-counter" id="tambahNamaCtr">0 / 100</div>
                    </div>

                    {{-- Email & Username (2 col) --}}
                    <div class="mfg-row mfg">
                        <div>
                            <div class="mfg-label">
                                <i class="fa-regular fa-envelope"></i>
                                Email <span class="req">*</span>
                            </div>
                            <div class="mfg-input-wrap has-prefix">
                                <i class="mfg-prefix fa-regular fa-envelope"></i>
                                <input type="email" name="email" class="mfg-input"
                                       id="tambahEmail"
                                       placeholder="email@domain.com"
                                       required
                                       oninput="syncPreview('tambah')">
                            </div>
                        </div>
                        <div>
                            <div class="mfg-label">
                                <i class="fa-solid fa-at"></i>
                                Username <span class="req">*</span>
                            </div>
                            <div class="mfg-input-wrap has-prefix">
                                <i class="mfg-prefix fa-solid fa-at"></i>
                                <input type="text" name="username" class="mfg-input"
                                       id="tambahUsername"
                                       placeholder="username"
                                       maxlength="50" required
                                       pattern="[a-zA-Z0-9_]+"
                                       title="Hanya huruf, angka, dan underscore">
                            </div>
                            <div style="font-size:11px;color:var(--text-muted);margin-top:3px;">
                                Hanya huruf, angka, dan _
                            </div>
                        </div>
                    </div>

                    {{-- Password --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-lock"></i>
                            Password <span class="req">*</span>
                        </div>
                        <div class="mfg-pw-wrap">
                            <i class="pw-icon fa-solid fa-lock"></i>
                            <input type="password" name="password" class="mfg-input"
                                   id="tambahPassword"
                                   placeholder="Minimal 8 karakter"
                                   minlength="8" required
                                   oninput="checkStrength('tambah')">
                            <button type="button" class="pw-toggle" id="tambahPwToggle"
                                    onclick="togglePw('tambah')">
                                <i class="fa-regular fa-eye" id="tambahPwIcon"></i>
                            </button>
                        </div>
                        <div class="pw-strength-wrap">
                            <div class="pw-strength-bar">
                                <div class="pw-strength-fill" id="tambahPwFill"></div>
                            </div>
                            <div class="pw-strength-text" id="tambahPwText" style="color:var(--text-muted);">
                                Masukkan password
                            </div>
                        </div>
                    </div>

                    {{-- Konfirmasi Password --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-lock"></i>
                            Konfirmasi Password <span class="req">*</span>
                        </div>
                        <div class="mfg-pw-wrap">
                            <i class="pw-icon fa-solid fa-lock"></i>
                            <input type="password" name="password_confirmation" class="mfg-input"
                                   id="tambahPasswordConf"
                                   placeholder="Ulangi password"
                                   minlength="8" required
                                   oninput="checkConfirm('tambah')">
                            <button type="button" class="pw-toggle"
                                    onclick="togglePwConf('tambah')">
                                <i class="fa-regular fa-eye" id="tambahPwConfIcon"></i>
                            </button>
                        </div>
                        <div style="font-size:11.5px;margin-top:4px;" id="tambahPwConfMsg"></div>
                    </div>

                    {{-- Role --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-user-tag"></i>
                            Role / Hak Akses <span class="req">*</span>
                        </div>
                        <div class="role-toggle-group">
                            <input type="radio" name="role" id="tambahRoleUser" value="superadmin" checked>
                            <label for="tambahRoleUser" class="lbl-user">
                                <i class="fa-solid fa-user"></i> Super Admin
                            </label>
                            <input type="radio" name="role" id="tambahRoleAdmin" value="admin">
                            <label for="tambahRoleAdmin" class="lbl-admin">
                                <i class="fa-solid fa-user-shield"></i> Admin
                            </label>
                        </div>
                    </div>

                    {{-- Live preview --}}
                    <div class="modal-preview-bar">
                        <div class="mpb-avatar" id="tambahMpbAvatar">A</div>
                        <div>
                            <div class="mpb-name"  id="tambahMpbNama">Nama Pengguna</div>
                            <div class="mpb-email" id="tambahMpbEmail">
                                <i class="fa-regular fa-envelope" style="font-size:9px;"></i>
                                email@domain.com
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Batal
                    </button>
                    <button type="submit" class="btn-save" id="btnTambahSubmit">
                        <i class="fa-solid fa-user-plus"></i> Tambah Pengguna
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
                    Edit Pengguna
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="" method="POST" id="formEdit">
                @csrf @method('PUT')
                <input type="hidden" name="id" id="editId">
                <div class="modal-body">

                    {{-- Nama Lengkap --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-user"></i>
                            Nama Lengkap <span class="req">*</span>
                        </div>
                        <div class="mfg-input-wrap has-prefix">
                            <i class="mfg-prefix fa-solid fa-user"></i>
                            <input type="text" name="nama_lengkap" class="mfg-input"
                                   id="editNama"
                                   placeholder="Nama lengkap..." maxlength="100" required
                                   oninput="syncPreview('edit')">
                        </div>
                        <div class="char-counter" id="editNamaCtr">0 / 100</div>
                    </div>

                    {{-- Email & Username --}}
                    <div class="mfg-row mfg">
                        <div>
                            <div class="mfg-label">
                                <i class="fa-regular fa-envelope"></i>
                                Email <span class="req">*</span>
                            </div>
                            <div class="mfg-input-wrap has-prefix">
                                <i class="mfg-prefix fa-regular fa-envelope"></i>
                                <input type="email" name="email" class="mfg-input"
                                       id="editEmail" placeholder="email@domain.com" required
                                       oninput="syncPreview('edit')">
                            </div>
                        </div>
                        <div>
                            <div class="mfg-label">
                                <i class="fa-solid fa-at"></i>
                                Username <span class="req">*</span>
                            </div>
                            <div class="mfg-input-wrap has-prefix">
                                <i class="mfg-prefix fa-solid fa-at"></i>
                                <input type="text" name="username" class="mfg-input"
                                       id="editUsername" placeholder="username"
                                       maxlength="50" required
                                       pattern="[a-zA-Z0-9_]+">
                            </div>
                        </div>
                    </div>

                    {{-- Password baru (opsional) --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-lock"></i>
                            Password Baru <span class="opt">(kosongkan jika tidak diganti)</span>
                        </div>
                        <div class="mfg-pw-wrap">
                            <i class="pw-icon fa-solid fa-lock"></i>
                            <input type="password" name="password" class="mfg-input"
                                   id="editPassword"
                                   placeholder="Password baru (min 8 karakter)"
                                   minlength="8"
                                   oninput="checkStrength('edit')">
                            <button type="button" class="pw-toggle"
                                    onclick="togglePw('edit')">
                                <i class="fa-regular fa-eye" id="editPwIcon"></i>
                            </button>
                        </div>
                        <div class="pw-strength-wrap">
                            <div class="pw-strength-bar">
                                <div class="pw-strength-fill" id="editPwFill"></div>
                            </div>
                            <div class="pw-strength-text" id="editPwText" style="color:var(--text-muted);">
                                Biarkan kosong jika tidak ingin mengganti password
                            </div>
                        </div>
                    </div>

                    {{-- Konfirmasi password baru --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-lock"></i>
                            Konfirmasi Password Baru <span class="opt">(opsional)</span>
                        </div>
                        <div class="mfg-pw-wrap">
                            <i class="pw-icon fa-solid fa-lock"></i>
                            <input type="password" name="password_confirmation" class="mfg-input"
                                   id="editPasswordConf"
                                   placeholder="Ulangi password baru"
                                   oninput="checkConfirm('edit')">
                            <button type="button" class="pw-toggle"
                                    onclick="togglePwConf('edit')">
                                <i class="fa-regular fa-eye" id="editPwConfIcon"></i>
                            </button>
                        </div>
                        <div style="font-size:11.5px;margin-top:4px;" id="editPwConfMsg"></div>
                    </div>

                    {{-- Role --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-user-tag"></i>
                            Role / Hak Akses <span class="req">*</span>
                        </div>
                        <div class="role-toggle-group">
                            <input type="radio" name="role" id="editRoleSuperAdmin" value="superadmin">
                            <label for="editRoleSuperAdmin" class="lbl-admin">
                                <i class="fa-solid fa-user-shield"></i> Super Admin
                            </label>

                            <input type="radio" name="role" id="editRoleAdmin" value="admin">
                            <label for="editRoleAdmin" class="lbl-user">
                                <i class="fa-solid fa-user"></i> Admin
                            </label>
                        </div>
                    </div>

                    {{-- Live preview --}}
                    <div class="modal-preview-bar">
                        <div class="mpb-avatar" id="editMpbAvatar">A</div>
                        <div>
                            <div class="mpb-name"  id="editMpbNama">—</div>
                            <div class="mpb-email" id="editMpbEmail">
                                <i class="fa-regular fa-envelope" style="font-size:9px;"></i> —
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



<div class="modal fade am-modal" id="modalDetail" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width:440px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <span class="mt-icon"><i class="fa-solid fa-circle-user"></i></span>
                    Detail Pengguna
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding:0;">

                {{-- Avatar hero --}}
                <div style="padding:28px 24px 20px;text-align:center;border-bottom:1px solid var(--border-color);">
                    <div id="detAvatar"
                         style="width:72px;height:72px;border-radius:50%;
                                display:flex;align-items:center;justify-content:center;
                                font-family:'Plus Jakarta Sans',sans-serif;
                                font-size:26px;font-weight:800;color:#fff;
                                margin:0 auto 12px;
                                box-shadow:0 8px 24px rgba(0,0,0,.15);">
                        A
                    </div>
                    <div style="font-family:'Plus Jakarta Sans',sans-serif;font-size:18px;font-weight:800;color:var(--text-main);" id="detNama">—</div>
                    <div style="font-size:13px;color:var(--text-muted);margin-top:4px;" id="detUsername">—</div>
                    <span class="role-badge" id="detRole" style="margin-top:8px;">—</span>
                </div>

                {{-- Info rows --}}
                <div style="padding:16px 24px;">
                    <div style="display:flex;align-items:center;gap:10px;padding:10px 0;border-bottom:1px solid var(--border-color);">
                        <div style="width:34px;height:34px;border-radius:8px;background:#e0f2fe;color:#0284c7;
                                    display:flex;align-items:center;justify-content:center;font-size:13px;flex-shrink:0;">
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                        <div>
                            <div style="font-size:10.5px;font-weight:700;color:var(--text-muted);text-transform:uppercase;letter-spacing:.6px;">Email</div>
                            <div style="font-size:13.5px;font-weight:600;color:var(--text-main);margin-top:2px;" id="detEmail">—</div>
                        </div>
                    </div>
                    <div style="display:flex;align-items:center;gap:10px;padding:10px 0;border-bottom:1px solid var(--border-color);">
                        <div style="width:34px;height:34px;border-radius:8px;background:#ede9fe;color:#6d28d9;
                                    display:flex;align-items:center;justify-content:center;font-size:13px;flex-shrink:0;">
                            <i class="fa-solid fa-user-tag"></i>
                        </div>
                        <div>
                            <div style="font-size:10.5px;font-weight:700;color:var(--text-muted);text-transform:uppercase;letter-spacing:.6px;">Role</div>
                            <div style="font-size:13.5px;font-weight:600;color:var(--text-main);margin-top:2px;" id="detRoleVal">—</div>
                        </div>
                    </div>
                    <div style="display:flex;align-items:center;gap:10px;padding:10px 0;">
                        <div style="width:34px;height:34px;border-radius:8px;background:#d1fae5;color:#059669;
                                    display:flex;align-items:center;justify-content:center;font-size:13px;flex-shrink:0;">
                            <i class="fa-regular fa-calendar"></i>
                        </div>
                        <div>
                            <div style="font-size:10.5px;font-weight:700;color:var(--text-muted);text-transform:uppercase;letter-spacing:.6px;">Bergabung</div>
                            <div style="font-size:13.5px;font-weight:600;color:var(--text-main);margin-top:2px;" id="detTgl">—</div>
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
                    <div class="del-icon"><i class="fa-solid fa-user-xmark"></i></div>
                    <div class="del-title">Hapus Pengguna Ini?</div>
                    <div class="del-sub">
                        Akun pengguna berikut akan dihapus secara permanen dari sistem.
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
   PENGGUNA WEB PAGE — JavaScript
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

/* ---- Sync live preview bar ---- */
function syncPreview(prefix) {
    const nama   = document.getElementById(prefix + 'Nama')?.value  || 'Nama Pengguna';
    const email  = document.getElementById(prefix + 'Email')?.value || 'email@domain.com';
    const avatar = document.getElementById(prefix + 'MpbAvatar');
    const namaEl = document.getElementById(prefix + 'MpbNama');
    const mailEl = document.getElementById(prefix + 'MpbEmail');
    if (avatar)  avatar.textContent = nama.charAt(0).toUpperCase() || 'A';
    if (namaEl)  namaEl.textContent = nama || 'Nama Pengguna';
    if (mailEl)  mailEl.innerHTML =
        `<i class="fa-regular fa-envelope" style="font-size:9px;"></i> ${email}`;
}

/* ---- Password show/hide ---- */
function togglePw(prefix) {
    const inp  = document.getElementById(prefix + 'Password');
    const icon = document.getElementById(prefix + 'PwIcon');
    if (!inp) return;
    const hidden = inp.type === 'password';
    inp.type = hidden ? 'text' : 'password';
    icon.className = hidden ? 'fa-regular fa-eye-slash' : 'fa-regular fa-eye';
}
function togglePwConf(prefix) {
    const inp  = document.getElementById(prefix + 'PasswordConf');
    const icon = document.getElementById(prefix + 'PwConfIcon');
    if (!inp) return;
    const hidden = inp.type === 'password';
    inp.type = hidden ? 'text' : 'password';
    icon.className = hidden ? 'fa-regular fa-eye-slash' : 'fa-regular fa-eye';
}

/* ---- Password strength ---- */
function checkStrength(prefix) {
    const pw    = document.getElementById(prefix + 'Password')?.value || '';
    const fill  = document.getElementById(prefix + 'PwFill');
    const text  = document.getElementById(prefix + 'PwText');
    if (!fill || !text) return;

    let score = 0;
    if (pw.length >= 8)             score++;
    if (/[A-Z]/.test(pw))           score++;
    if (/[0-9]/.test(pw))           score++;
    if (/[^A-Za-z0-9]/.test(pw))    score++;

    const levels = [
        { pct:  0, color: '#ef4444', label: 'Masukkan password' },
        { pct: 25, color: '#ef4444', label: 'Sangat lemah' },
        { pct: 50, color: '#f59e0b', label: 'Cukup' },
        { pct: 75, color: '#0ea5e9', label: 'Kuat' },
        { pct:100, color: '#10b981', label: '✓ Sangat kuat' },
    ];
    const lv = levels[pw.length === 0 ? 0 : Math.min(score, 4)];
    fill.style.width      = lv.pct + '%';
    fill.style.background = lv.color;
    text.textContent      = lv.label;
    text.style.color      = lv.color;

    // Also re-check confirm if it has value
    checkConfirm(prefix);
}

/* ---- Password confirm check ---- */
function checkConfirm(prefix) {
    const pw   = document.getElementById(prefix + 'Password')?.value      || '';
    const conf = document.getElementById(prefix + 'PasswordConf')?.value  || '';
    const msg  = document.getElementById(prefix + 'PwConfMsg');
    if (!msg || !conf) return;

    if (pw === conf) {
        msg.innerHTML = '<i class="fa-solid fa-circle-check" style="color:#10b981;margin-right:4px;"></i><span style="color:#10b981;font-weight:600;">Password cocok</span>';
    } else {
        msg.innerHTML = '<i class="fa-solid fa-circle-xmark" style="color:#ef4444;margin-right:4px;"></i><span style="color:#ef4444;font-weight:600;">Password tidak cocok</span>';
    }
}

/* ---- Open EDIT modal ---- */
function openEditModal(id, nama, email, username, role) {
    document.getElementById('editId').value       = id;
    document.getElementById('editNama').value     = nama;
    document.getElementById('editEmail').value    = email;
    document.getElementById('editUsername').value = username;

    document.getElementById('editRoleSuperAdmin').checked = (role === 'superadmin');
    document.getElementById('editRoleAdmin').checked      = (role === 'admin');

    document.getElementById('editPassword').value     = '';
    document.getElementById('editPasswordConf').value = '';
    document.getElementById('editPwFill').style.width = '0';
    document.getElementById('editPwText').textContent = 'Biarkan kosong jika tidak ingin mengganti password';
    document.getElementById('editPwText').style.color = 'var(--text-muted)';
    document.getElementById('editPwConfMsg').innerHTML = '';

    document.getElementById('formEdit').action = '{{ url("admin/pengguna") }}/' + id;

    ['editNama','editEmail'].forEach(i =>
        document.getElementById(i).dispatchEvent(new Event('input'))
    );
    syncPreview('edit');

    new bootstrap.Modal(document.getElementById('modalEdit')).show();
}

/* ---- Open DETAIL modal ---- */
function openDetailModal(nama, email, username, role, tgl, gradient) {
    document.getElementById('detNama').textContent     = nama;
    document.getElementById('detUsername').textContent = '@' + username;
    document.getElementById('detEmail').textContent    = email;
    document.getElementById('detRoleVal').textContent =
    role === 'superadmin' ? 'Super Admin' : 'Admin';
    document.getElementById('detTgl').textContent      = tgl;

    const av = document.getElementById('detAvatar');
    av.textContent = nama.charAt(0).toUpperCase();
    av.style.background = gradient;

    const roleBadge = document.getElementById('detRole');
    roleBadge.className =
    'role-badge ' + (role === 'superadmin' ? 'role-admin' : 'role-user');

    roleBadge.innerHTML = (role === 'superadmin'
    ? '<i class="fa-solid fa-user-shield" style="font-size:10px;"></i> Super Admin'
    : '<i class="fa-solid fa-user" style="font-size:10px;"></i> Admin');

    new bootstrap.Modal(document.getElementById('modalDetail')).show();
}

/* ---- Open DELETE modal ---- */
function openDeleteModal(id, nama) {
    document.getElementById('formHapus').action      = '{{ url("admin/pengguna") }}/' + id;
    document.getElementById('delTarget').textContent = nama;
    new bootstrap.Modal(document.getElementById('modalHapus')).show();
}

/* ---- Reset tambah modal ---- */
document.getElementById('modalTambah').addEventListener('hidden.bs.modal', function() {
    document.getElementById('formTambah').reset();
    document.getElementById('tambahPwFill').style.width = '0';
    document.getElementById('tambahPwText').textContent = 'Masukkan password';
    document.getElementById('tambahPwText').style.color = 'var(--text-muted)';
    document.getElementById('tambahPwConfMsg').innerHTML = '';
    document.getElementById('tambahMpbAvatar').textContent = 'A';
    document.getElementById('tambahMpbNama').textContent   = 'Nama Pengguna';
    document.getElementById('tambahMpbEmail').innerHTML    =
        '<i class="fa-regular fa-envelope" style="font-size:9px;"></i> email@domain.com';
    document.getElementById('tambahNamaCtr').textContent = '0 / 100';
});

/* ---- Live search ---- */
document.getElementById('searchUser').addEventListener('input', function() {
    const q = this.value.toLowerCase();
    document.querySelectorAll('.pgn-row').forEach(function(row) {
        const n = (row.dataset.nama     || '') + ' ' +
                  (row.dataset.email    || '') + ' ' +
                  (row.dataset.username || '');
        row.style.display = (!q || n.includes(q)) ? '' : 'none';
    });
});

/* ---- Filter role ---- */
document.getElementById('filterRole').addEventListener('change', function() {
    const val = this.value;
    document.querySelectorAll('.pgn-row').forEach(function(row) {
        row.style.display = (!val || row.dataset.role === val) ? '' : 'none';
    });
});
</script>
@endpush
