@extends('admin.layout')

@section('title', 'Manajemen Loker')
@section('page-title', 'Lowongan Kerja')

@section('breadcrumb')
    <li class="breadcrumb-item active">Manajemen Loker</li>
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
.loker-stats {
    display: flex; gap: 12px; margin-bottom: 24px; flex-wrap: wrap;
}
.ls-item {
    flex: 1; min-width: 140px;
    background: var(--card-bg); border: 1px solid var(--border-color);
    border-radius: var(--radius); padding: 16px 20px;
    display: flex; align-items: center; gap: 14px;
    box-shadow: var(--shadow-sm);
    transition: box-shadow var(--transition), transform var(--transition);
}
.ls-item:hover { box-shadow: var(--shadow-md); transform: translateY(-2px); }
.ls-icon {
    width: 42px; height: 42px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 16px; flex-shrink: 0;
}
.ls-info .ls-val {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 22px; font-weight: 800; color: var(--text-main); line-height: 1;
}
.ls-info .ls-lbl { font-size: 12px; color: var(--text-muted); margin-top: 3px; font-weight: 500; }

/* ---- Toolbar ---- */
.loker-toolbar {
    background: var(--card-bg); border: 1px solid var(--border-color);
    border-radius: var(--radius); padding: 16px 20px;
    display: flex; align-items: center; gap: 12px;
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
.search-input:focus {
    border-color: var(--primary); box-shadow: 0 0 0 3px rgba(14,165,233,.12); background: #fff;
}
.filter-select {
    padding: 9px 32px 9px 14px; border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm); font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px; color: var(--text-main); outline: none; background: var(--body-bg);
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%2364748b' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
    background-repeat: no-repeat; background-position: right 12px center; cursor: pointer;
}
.filter-select:focus { border-color: var(--primary); outline: none; }

/* ---- Cards grid ---- */
.loker-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}

/* ---- Loker card ---- */
.loker-card {
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
.loker-card:nth-child(1){animation-delay:.04s} .loker-card:nth-child(2){animation-delay:.08s}
.loker-card:nth-child(3){animation-delay:.12s} .loker-card:nth-child(4){animation-delay:.16s}
.loker-card:nth-child(5){animation-delay:.20s} .loker-card:nth-child(6){animation-delay:.24s}
.loker-card:hover { box-shadow: 0 8px 32px rgba(14,165,233,.14); transform: translateY(-3px); }

/* Image area */
.lc-img-wrap {
    position: relative; overflow: hidden;
    aspect-ratio: 16/9; background: var(--body-bg); flex-shrink: 0;
}
.lc-img-wrap img {
    width: 100%; height: 100%; object-fit: cover;
    transition: transform .4s ease;
}
.loker-card:hover .lc-img-wrap img { transform: scale(1.04); }
.lc-img-placeholder {
    width: 100%; height: 100%;
    display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 6px;
    background: linear-gradient(135deg, #e0f2fe, #cffafe);
    color: var(--primary); font-size: 36px;
}
.lc-img-placeholder span {
    font-size: 11px; font-weight: 700; text-transform: uppercase;
    letter-spacing: .7px; opacity: .6;
}

/* NEW badge */
.lc-new-badge {
    position: absolute; top: 10px; left: 10px;
    background: linear-gradient(135deg, var(--primary), var(--accent));
    color: #fff; font-size: 10px; font-weight: 800;
    text-transform: uppercase; letter-spacing: .8px;
    padding: 3px 10px; border-radius: 20px;
    box-shadow: 0 3px 10px rgba(14,165,233,.35);
}

/* Card body */
.lc-body { padding: 18px 20px; flex: 1; display: flex; flex-direction: column; }
.lc-date {
    font-size: 11px; color: var(--text-muted); font-weight: 600;
    text-transform: uppercase; letter-spacing: .6px;
    margin-bottom: 8px; display: flex; align-items: center; gap: 5px;
}
.lc-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 14.5px; font-weight: 700; color: var(--text-main); line-height: 1.4;
    margin-bottom: 8px;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
}
.lc-desc {
    font-size: 13px; color: var(--text-muted); line-height: 1.55; flex: 1;
    display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;
    margin-bottom: 0;
}

/* Card footer */
.lc-footer {
    display: flex; align-items: center; justify-content: space-between;
    padding: 12px 20px; border-top: 1px solid var(--border-color); background: #fafbff;
}
.lc-id-badge {
    font-size: 11px; color: var(--text-muted); font-weight: 600;
    background: var(--body-bg); border: 1px solid var(--border-color);
    padding: 3px 9px; border-radius: 20px;
    display: flex; align-items: center; gap: 4px;
}
.lc-actions { display: flex; gap: 6px; }

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
.am-modal .modal-dialog { max-width: 640px; }
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
.mfg-input, .mfg-textarea {
    width: 100%; padding: 10px 14px;
    border: 1.5px solid var(--border-color); border-radius: var(--radius-sm);
    font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13.5px; color: var(--text-main);
    outline: none; background: var(--body-bg);
    transition: border-color var(--transition), box-shadow var(--transition), background var(--transition);
}
.mfg-input:focus, .mfg-textarea:focus {
    border-color: var(--primary); box-shadow: 0 0 0 3px rgba(14,165,233,.12); background: #fff;
}
.mfg-textarea { min-height: 130px; resize: vertical; line-height: 1.6; }

/* Image upload zone */
.img-upload-zone {
    border: 2px dashed var(--border-color);
    border-radius: var(--radius-sm); padding: 28px 20px; text-align: center;
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
    position: absolute; inset: 0; background: rgba(12,26,46,.5);
    display: flex; align-items: center; justify-content: center; gap: 8px;
    opacity: 0; transition: opacity var(--transition);
}
.img-preview-wrap:hover .img-preview-overlay { opacity: 1; }
.ipb {
    display: flex; align-items: center; gap: 6px;
    padding: 8px 14px; border-radius: 8px; border: none;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 12px; font-weight: 700; cursor: pointer;
    transition: transform var(--transition);
}
.ipb:hover { transform: scale(1.05); }
.ipb-change { background: #fff; color: var(--primary); }
.ipb-remove { background: #ef4444; color: #fff; }
.ipb-change input { display: none; }
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
.loker-pagination {
    display: flex; align-items: center; justify-content: space-between;
    margin-top: 24px; flex-wrap: wrap; gap: 12px;
}
.pag-info { font-size: 13px; color: var(--text-muted); }

/* Responsive */
@media(max-width:767.98px) {
    .loker-grid { grid-template-columns: 1fr; }
    .loker-stats { gap: 8px; }
    .ls-item { min-width: 120px; }
    .loker-toolbar { flex-direction: column; align-items: stretch; }
    .am-modal .modal-body   { padding: 20px 18px 8px; }
    .am-modal .modal-footer { padding: 12px 18px 20px; }
}
</style>
@endpush

@section('content')

{{-- PAGE HEADER --}}
<div class="page-header">
    <div class="page-header-left">
        <div class="ph-title">Manajemen Lowongan Kerja</div>
        <div class="ph-sub">Kelola semua lowongan kerja yang tampil di halaman Karir website</div>
    </div>
    <button class="btn-primary-am" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="fa-solid fa-plus"></i>
        Tambah Loker
    </button>
</div>

{{-- STATS STRIP --}}
<div class="loker-stats">

    <div class="ls-item">
        <div class="ls-icon" style="background:#e0f2fe;color:#0284c7;">
            <i class="fa-solid fa-briefcase"></i>
        </div>

        <div class="ls-info">
            <div class="ls-val">{{ $loker->total() }}</div>
            <div class="ls-lbl">Total Loker</div>
        </div>
    </div>

    <div class="ls-item">
        <div class="ls-icon" style="background:#d1fae5;color:#059669;">
            <i class="fa-solid fa-image"></i>
        </div>

        <div class="ls-info">
            <div class="ls-val">{{ $totalDenganGambar }}</div>
            <div class="ls-lbl">Punya Gambar</div>
        </div>
    </div>

    <div class="ls-item">
        <div class="ls-icon" style="background:#fef3c7;color:#d97706;">
            <i class="fa-regular fa-clock"></i>
        </div>

        <div class="ls-info">
            <div class="ls-val">{{ $lokerBulanIni }}</div>
            <div class="ls-lbl">Bulan Ini</div>
        </div>
    </div>

    <div class="ls-item">
        <div class="ls-icon" style="background:#ede9fe;color:#7c3aed;">
            <i class="fa-solid fa-calendar-plus"></i>
        </div>

        <div class="ls-info">
            <div class="ls-val">{{ $lokerTerbaru }}</div>
            <div class="ls-lbl">Terbaru Hari Ini</div>
        </div>
    </div>

</div>

{{-- TOOLBAR --}}
<div class="loker-toolbar">
    <div class="search-wrap">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="search" class="search-input" id="searchLoker"
               placeholder="Cari judul lowongan...">
    </div>
    <select class="filter-select" id="filterSort">
        <option value="newest">Terbaru</option>
        <option value="oldest">Terlama</option>
        <option value="az">A – Z</option>
    </select>
    <div style="display:flex;gap:4px;">
        <button class="topbar-btn" id="viewGrid" title="Grid View"
                style="background:var(--primary-light);color:var(--primary);">
            <i class="fa-solid fa-grip"></i>
        </button>
        <button class="topbar-btn" id="viewList" title="List View">
            <i class="fa-solid fa-list"></i>
        </button>
    </div>
</div>

{{-- ================================================================
     LOKER GRID (FINAL CLEAN - DATABASE ONLY)
================================================================ --}}

@php
use Carbon\Carbon;
@endphp

<div class="loker-grid" id="lokerGrid">

    @forelse($loker as $item)

        @php
            $id        = $item->id;
            $judul     = $item->judul;
            $deskripsi = $item->deskripsi;
            $gambar    = $item->gambar;
            $createdAt = $item->created_at;

            $imgUrl = $gambar ? asset('storage/' . $gambar) : null;

            $tgl = $createdAt
                ? Carbon::parse($createdAt)->translatedFormat('d M Y')
                : '-';

            $isNew = $createdAt
                ? Carbon::parse($createdAt)->diffInDays(now()) <= 7
                : false;
        @endphp

        <div class="loker-card"
             data-id="{{ $id }}"
             data-judul="{{ strtolower($judul) }}">

            {{-- IMAGE --}}
            <div class="lc-img-wrap">

                @if($imgUrl)
                    <img src="{{ $imgUrl }}" alt="{{ $judul }}" loading="lazy">
                @else
                    <div class="lc-img-placeholder">
                        <i class="fa-solid fa-briefcase"></i>
                        <span>Belum ada gambar</span>
                    </div>
                @endif

                @if($isNew)
                    <span class="lc-new-badge">
                        <i class="fa-solid fa-bolt" style="font-size:9px;"></i> Baru
                    </span>
                @endif

            </div>

            {{-- BODY --}}
            <div class="lc-body">

                <div class="lc-date">
                    <i class="fa-regular fa-calendar" style="font-size:10px;"></i>
                    {{ $tgl }}
                </div>

                <div class="lc-title">
                    {{ $judul }}
                </div>

                <div class="lc-desc">
                    {{ $deskripsi }}
                </div>

            </div>

            {{-- FOOTER --}}
            <div class="lc-footer">

                <span class="lc-id-badge">
                    <i class="fa-solid fa-hashtag" style="font-size:9px;"></i>
                    ID {{ $id }}
                </span>

                <div class="lc-actions">

                    <button class="btn-icon-sm btn-edit"
                        onclick="openEditModal(
                            '{{ $id }}',
                            `{{ addslashes($judul) }}`,
                            `{{ addslashes($deskripsi) }}`,
                            '{{ $imgUrl ?? '' }}'
                        )">
                        <i class="fa-solid fa-pen"></i>
                    </button>

                    <button class="btn-icon-sm btn-delete"
                        onclick="openDeleteModal(
                            '{{ $id }}',
                            `{{ addslashes($judul) }}`
                        )">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>

                </div>

            </div>

        </div>

    @empty

        <div class="empty-state">
            <div class="es-icon">
                <i class="fa-solid fa-briefcase"></i>
            </div>
            <div class="es-title">Belum Ada Lowongan</div>
            <div class="es-sub">
                Tambahkan lowongan kerja pertama untuk ditampilkan di halaman Karir.
            </div>

            <button class="btn-primary-am"
                data-bs-toggle="modal"
                data-bs-target="#modalTambah">
                <i class="fa-solid fa-plus"></i> Tambah Loker Pertama
            </button>
        </div>

    @endforelse

</div>




{{-- ================================================================
     MODAL: TAMBAH LOKER
================================================================ --}}
<div class="modal fade am-modal" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <span class="mt-icon"><i class="fa-solid fa-plus"></i></span>
                    Tambah Lowongan Kerja
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('admin.loker.store') }}" method="POST"
                  enctype="multipart/form-data" id="formTambah">
                @csrf
                <div class="modal-body">

                    {{-- Gambar --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-image"></i>
                            Gambar Lowongan
                            <span class="opt">(opsional)</span>
                        </div>

                        {{-- Preview --}}
                        <div class="img-preview-wrap" id="tambahPreviewWrap">
                            <img src="" id="tambahPreviewImg" alt="Preview">
                            <div class="img-preview-label">Preview Gambar</div>
                            <div class="img-preview-overlay">
                                <div style="display:flex;gap:8px;">
                                    <label class="ipb ipb-change">
                                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Ganti
                                        <input type="file" name="gambar" id="tambahGambar2"
                                               accept="image/jpeg,image/png,image/webp"
                                               onchange="previewImg(this,'tambah')">
                                    </label>
                                    <button type="button" class="ipb ipb-remove"
                                            onclick="removeImg('tambah')">
                                        <i class="fa-solid fa-trash-can"></i> Hapus
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
                            <div class="iuz-title">Klik atau seret gambar ke sini</div>
                            <div class="iuz-sub">JPG, PNG, WebP — Maks. 2 MB</div>
                        </div>
                    </div>

                    {{-- Judul --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-briefcase"></i>
                            Judul Lowongan <span class="req">*</span>
                        </div>
                        <input type="text" name="judul" class="mfg-input" id="tambahJudul"
                               placeholder="Contoh: Dokter Umum, Perawat IGD..."
                               maxlength="150" required>
                        <div class="char-counter" id="tambahJudulCtr">0 / 150</div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-align-left"></i>
                            Deskripsi / Kualifikasi <span class="req">*</span>
                        </div>
                        <textarea name="deskripsi" class="mfg-textarea" id="tambahDeskripsi"
                                  placeholder="Tuliskan deskripsi posisi, kualifikasi, syarat, dan cara melamar..."
                                  maxlength="5000" required></textarea>
                        <div class="char-counter" id="tambahDeskripsiCtr">0 / 5000</div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Batal
                    </button>
                    <button type="submit" class="btn-save">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Loker
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- ================================================================
     MODAL: EDIT LOKER
================================================================ --}}
<div class="modal fade am-modal" id="modalEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(135deg,#1e3a5f 0%,#0ea5e9 100%);">
                <h5 class="modal-title">
                    <span class="mt-icon"><i class="fa-solid fa-pen-to-square"></i></span>
                    Edit Lowongan Kerja
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="" method="POST" enctype="multipart/form-data" id="formEdit">
                @csrf @method('PUT')
                <input type="hidden" name="id"           id="editId">
                <input type="hidden" name="hapus_gambar" id="editHapusGambar" value="0">

                <div class="modal-body">

                    {{-- Gambar --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-image"></i>
                            Gambar Lowongan
                            <span class="opt">(opsional — kosongkan jika tidak diganti)</span>
                        </div>

                        {{-- Preview existing --}}
                        <div class="img-preview-wrap" id="editPreviewWrap">
                            <img src="" id="editPreviewImg" alt="Preview">
                            <div class="img-preview-label" id="editPreviewLabel">Gambar Saat Ini</div>
                            <div class="img-preview-overlay">
                                <div style="display:flex;gap:8px;">
                                    <label class="ipb ipb-change">
                                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Ganti
                                        <input type="file" name="gambar" id="editGambar2"
                                               accept="image/jpeg,image/png,image/webp"
                                               onchange="previewImg(this,'edit')">
                                    </label>
                                    <button type="button" class="ipb ipb-remove"
                                            onclick="removeImg('edit')">
                                        <i class="fa-solid fa-trash-can"></i> Hapus
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
                            <div class="iuz-title">Unggah gambar baru</div>
                            <div class="iuz-sub">JPG, PNG, WebP — Maks. 2 MB</div>
                        </div>
                    </div>

                    {{-- Judul --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-briefcase"></i>
                            Judul Lowongan <span class="req">*</span>
                        </div>
                        <input type="text" name="judul" class="mfg-input" id="editJudul"
                               placeholder="Judul lowongan..." maxlength="150" required>
                        <div class="char-counter" id="editJudulCtr">0 / 150</div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mfg">
                        <div class="mfg-label">
                            <i class="fa-solid fa-align-left"></i>
                            Deskripsi / Kualifikasi <span class="req">*</span>
                        </div>
                        <textarea name="deskripsi" class="mfg-textarea" id="editDeskripsi"
                                  placeholder="Deskripsi lowongan..." maxlength="5000" required></textarea>
                        <div class="char-counter" id="editDeskripsiCtr">0 / 5000</div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Batal
                    </button>
                    <button type="submit" class="btn-save">
                        <i class="fa-solid fa-floppy-disk"></i> Perbarui Loker
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- ================================================================
     MODAL: HAPUS LOKER
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
                    <div class="del-icon"><i class="fa-solid fa-briefcase"></i></div>
                    <div class="del-title">Hapus Lowongan Ini?</div>
                    <div class="del-sub">
                        Data lowongan berikut akan dihapus secara permanen beserta gambarnya.
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
   LOKER PAGE — JavaScript
============================================================ */

/* ---- Char counters ---- */
function initCtr(elId, ctrId, max) {
    const el = document.getElementById(elId);
    const ct = document.getElementById(ctrId);
    if (!el || !ct) return;
    const upd = () => {
        const l = el.value.length;
        ct.textContent = `${l} / ${max.toLocaleString('id-ID')}`;
        ct.className   = 'char-counter' + (l >= max ? ' over' : l > max * .88 ? ' warn' : '');
    };
    el.addEventListener('input', upd); upd();
}
initCtr('tambahJudul',     'tambahJudulCtr',     150);
initCtr('tambahDeskripsi', 'tambahDeskripsiCtr', 5000);
initCtr('editJudul',       'editJudulCtr',       150);
initCtr('editDeskripsi',   'editDeskripsiCtr',   5000);

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
        const wrap  = document.getElementById(prefix + 'PreviewWrap');
        const img   = document.getElementById(prefix + 'PreviewImg');
        const zone  = document.getElementById(prefix + 'UploadZone');
        const label = document.getElementById(prefix + 'PreviewLabel');
        img.src = e.target.result;
        wrap.classList.add('show');
        zone.style.display = 'none';
        if (label) label.textContent = 'Gambar Baru — Belum Tersimpan';
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
    img.src = '';
    wrap.classList.remove('show');
    zone.style.display = '';
    ['','2'].forEach(function(sfx) {
        const inp = document.getElementById(prefix + 'Gambar' + sfx);
        if (inp) inp.value = '';
    });
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
function openEditModal(id, judul, deskripsi, imgUrl) {
    document.getElementById('editId').value        = id;
    document.getElementById('editJudul').value     = judul;
    document.getElementById('editDeskripsi').value = deskripsi;
    document.getElementById('editHapusGambar').value = '0';
    document.getElementById('formEdit').action     = '{{ url("admin/loker") }}/' + id;

    const wrap  = document.getElementById('editPreviewWrap');
    const img   = document.getElementById('editPreviewImg');
    const zone  = document.getElementById('editUploadZone');
    const label = document.getElementById('editPreviewLabel');

    if (imgUrl && imgUrl.trim() !== '') {
        img.src = imgUrl;
        wrap.classList.add('show');
        zone.style.display = 'none';
        if (label) label.textContent = 'Gambar Saat Ini';
    } else {
        img.src = '';
        wrap.classList.remove('show');
        zone.style.display = '';
    }

    ['editGambar','editGambar2'].forEach(i => {
        const el = document.getElementById(i); if (el) el.value = '';
    });

    ['editJudul','editDeskripsi'].forEach(i =>
        document.getElementById(i).dispatchEvent(new Event('input'))
    );

    new bootstrap.Modal(document.getElementById('modalEdit')).show();
}

/* ---- Open DELETE modal ---- */
function openDeleteModal(id, judul) {
    document.getElementById('formHapus').action      = '{{ url("admin/loker") }}/' + id;
    document.getElementById('delTarget').textContent = judul;
    new bootstrap.Modal(document.getElementById('modalHapus')).show();
}

/* ---- Reset tambah modal on close ---- */
document.getElementById('modalTambah').addEventListener('hidden.bs.modal', function () {
    document.getElementById('formTambah').reset();
    removeImg('tambah');
});

/* ---- Live search ---- */
document.getElementById('searchLoker').addEventListener('input', function () {
    const q = this.value.toLowerCase();
    document.querySelectorAll('.loker-card').forEach(function (card) {
        const t = card.dataset.judul || '';
        card.style.display = (!q || t.includes(q)) ? '' : 'none';
    });
});

/* ---- View toggle ---- */
const grid  = document.getElementById('lokerGrid');
const btnG  = document.getElementById('viewGrid');
const btnL  = document.getElementById('viewList');
btnG.addEventListener('click', function () {
    grid.style.gridTemplateColumns = '';
    btnG.style.background = 'var(--primary-light)'; btnG.style.color = 'var(--primary)';
    btnL.style.background = '';                     btnL.style.color = '';
});
btnL.addEventListener('click', function () {
    grid.style.gridTemplateColumns = '1fr';
    btnL.style.background = 'var(--primary-light)'; btnL.style.color = 'var(--primary)';
    btnG.style.background = '';                     btnG.style.color = '';
});
</script>
@endpush
