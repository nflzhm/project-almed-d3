@extends('admin.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@push('styles')
<style>
    /* ============================================================
       DASHBOARD — extra styles
    ============================================================ */

    /* Animated counter */
    .stat-value[data-count] { transition: none; }

    /* Hero greeting banner */
    .dash-greeting {
        background: linear-gradient(120deg, #0c1a2e 0%, #0e3460 55%, #0ea5e9 100%);
        border-radius: var(--radius);
        padding: 28px 32px;
        margin-bottom: 28px;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
    }

    .dash-greeting::before {
        content: '';
        position: absolute;
        right: -60px; top: -60px;
        width: 220px; height: 220px;
        border-radius: 50%;
        background: rgba(255,255,255,.05);
    }

    .dash-greeting::after {
        content: '';
        position: absolute;
        right: 60px; bottom: -80px;
        width: 160px; height: 160px;
        border-radius: 50%;
        background: rgba(14,165,233,.18);
    }

    .greeting-text .hello {
        font-size: 13px; font-weight: 600;
        color: rgba(255,255,255,.6);
        text-transform: uppercase; letter-spacing: 1px;
    }

    .greeting-text .name {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 22px; font-weight: 800;
        color: #fff; margin: 4px 0 8px;
        line-height: 1.2;
    }

    .greeting-text .sub {
        font-size: 13px;
        color: rgba(255,255,255,.55);
    }

    .greeting-date {
        text-align: right;
        flex-shrink: 0;
        position: relative; z-index: 1;
    }

    .greeting-date .date-big {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 36px; font-weight: 800;
        color: #fff; line-height: 1;
    }

    .greeting-date .date-info {
        font-size: 12px; color: rgba(255,255,255,.55);
        margin-top: 4px;
    }

    /* Stat cards row */
    .stat-card {
        animation: fadeSlideUp .4s ease both;
    }

    @keyframes fadeSlideUp {
        from { opacity: 0; transform: translateY(18px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .stat-card:nth-child(1) { animation-delay: .05s; }
    .stat-card:nth-child(2) { animation-delay: .12s; }
    .stat-card:nth-child(3) { animation-delay: .19s; }
    .stat-card:nth-child(4) { animation-delay: .26s; }

    /* Quick actions */
    .quick-action {
        display: flex; flex-direction: column;
        align-items: center; justify-content: center;
        gap: 8px;
        padding: 18px 12px;
        border-radius: var(--radius);
        border: 1.5px dashed var(--border-color);
        background: var(--card-bg);
        cursor: pointer;
        text-decoration: none;
        color: var(--text-muted);
        font-size: 12px; font-weight: 600;
        transition: border-color var(--transition), background var(--transition), color var(--transition), transform var(--transition);
        text-align: center;
    }

    .quick-action:hover {
        border-color: var(--primary);
        background: var(--primary-light);
        color: var(--primary-dark);
        transform: translateY(-2px);
    }

    .quick-action .qa-icon {
        width: 40px; height: 40px;
        border-radius: var(--radius-sm);
        display: flex; align-items: center; justify-content: center;
        font-size: 16px;
        transition: background var(--transition);
    }

    /* Recent table */
    .am-card.no-pad { padding: 0; }
    .card-header-inner {
        display: flex; align-items: center; justify-content: space-between;
        padding: 18px 24px 0;
    }

    .card-inner-title {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 14px; font-weight: 700;
        color: var(--text-main);
    }

    .card-inner-sub { font-size: 12px; color: var(--text-muted); margin-top: 2px; }

    /* Chart placeholder */
    .chart-placeholder {
        height: 180px;
        display: flex; align-items: flex-end;
        gap: 6px; padding: 0 4px;
    }

    .chart-bar {
        flex: 1;
        border-radius: 4px 4px 0 0;
        background: linear-gradient(180deg, var(--primary) 0%, var(--accent) 100%);
        opacity: .75;
        transition: opacity .2s, transform .2s;
        cursor: pointer;
        position: relative;
    }

    .chart-bar:hover { opacity: 1; transform: scaleY(1.03); transform-origin: bottom; }

    .chart-bar.dim {
        background: linear-gradient(180deg, #cbd5e1 0%, #e2e8f0 100%);
        opacity: .5;
    }

    .chart-labels {
        display: flex; gap: 6px; padding: 6px 4px 0;
    }

    .chart-labels span {
        flex: 1; text-align: center;
        font-size: 10px; color: var(--text-muted);
    }

    /* Progress bar */
    .am-progress-wrap { margin-bottom: 14px; }
    .am-progress-label {
        display: flex; justify-content: space-between;
        font-size: 12.5px; color: var(--text-main); font-weight: 500;
        margin-bottom: 5px;
    }

    .am-progress {
        height: 7px; border-radius: 10px;
        background: var(--border-color); overflow: hidden;
    }

    .am-progress-bar {
        height: 100%; border-radius: 10px;
        background: linear-gradient(90deg, var(--primary), var(--accent));
        transition: width .8s cubic-bezier(.4,0,.2,1);
    }

    /* Status badge */
    .status-pill {
        display: inline-flex; align-items: center; gap: 5px;
        padding: 3px 10px; border-radius: 20px;
        font-size: 11px; font-weight: 600;
    }

    .status-pill::before {
        content: ''; width: 6px; height: 6px;
        border-radius: 50%; background: currentColor; opacity: .7;
    }

    .pill-active { background: #d1fae5; color: #065f46; }
    .pill-pending { background: #fef3c7; color: #92400e; }
    .pill-inactive { background: #f1f5f9; color: #64748b; }

    /* System status row */
    .sys-status-item {
        display: flex; align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid var(--border-color);
        gap: 12px;
    }

    .sys-status-item:last-child { border-bottom: 0; padding-bottom: 0; }

    .sys-icon {
        width: 32px; height: 32px;
        border-radius: 8px;
        display: flex; align-items: center; justify-content: center;
        font-size: 13px; flex-shrink: 0;
    }

    .sys-label { flex: 1; font-size: 13px; font-weight: 500; color: var(--text-main); }
    .sys-value { font-size: 12px; color: var(--text-muted); }

    /* Responsive */
    @media (max-width: 575.98px) {
        .dash-greeting { flex-direction: column; align-items: flex-start; }
        .greeting-date { text-align: left; }
    }
</style>
@endpush

@section('content')

{{-- ================================================================
     GREETING BANNER
================================================================ --}}
<div class="dash-greeting">
    <div class="greeting-text" style="position:relative;z-index:1;">
        <div class="hello">Selamat datang kembali 👋</div>
        <div class="name">{{ auth()->user()->name ?? 'Administrator' }}</div>
        <div class="sub">
            Berikut ringkasan aktivitas terkini Klinik Allam Medica hari ini.
        </div>
    </div>
    <div class="greeting-date">
        <div class="date-big" id="liveClock">--:--</div>
        <div class="date-info" id="liveDate">Memuat tanggal...</div>
    </div>
</div>

{{-- ================================================================
     STAT CARDS
================================================================ --}}
<div class="row g-3 mb-4">

    {{-- Berita --}}
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card" style="--stat-color:#0ea5e9;">
            <div class="stat-icon" style="background:#e0f2fe; color:#0284c7;">
                <i class="fa-solid fa-newspaper"></i>
            </div>
            <div class="stat-info">
                <div class="stat-value" data-count="{{ $totalBerita ?? 24 }}">0</div>
                <div class="stat-label">Total Berita</div>
                <div class="stat-trend" style="color:#10b981;">
                    <i class="fa-solid fa-arrow-trend-up" style="font-size:10px;"></i>
                    +3 bulan ini
                </div>
            </div>
        </div>
    </div>

    {{-- Dokter --}}
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card" style="--stat-color:#06b6d4;">
            <div class="stat-icon" style="background:#cffafe; color:#0891b2;">
                <i class="fa-solid fa-user-doctor"></i>
            </div>
            <div class="stat-info">
                <div class="stat-value" data-count="{{ $totalDokter ?? 12 }}">0</div>
                <div class="stat-label">Total Dokter</div>
                <div class="stat-trend" style="color:#10b981;">
                    <i class="fa-solid fa-arrow-trend-up" style="font-size:10px;"></i>
                    +1 baru
                </div>
            </div>
        </div>
    </div>

    {{-- Pengguna --}}
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card" style="--stat-color:#10b981;">
            <div class="stat-icon" style="background:#d1fae5; color:#059669;">
                <i class="fa-solid fa-users"></i>
            </div>
            <div class="stat-info">
                <div class="stat-value" data-count="{{ $totalPengguna ?? 138 }}">0</div>
                <div class="stat-label">Pengguna Web</div>
                <div class="stat-trend" style="color:#10b981;">
                    <i class="fa-solid fa-arrow-trend-up" style="font-size:10px;"></i>
                    +12 minggu ini
                </div>
            </div>
        </div>
    </div>

    {{-- Jadwal --}}
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card" style="--stat-color:#f59e0b;">
            <div class="stat-icon" style="background:#fef3c7; color:#d97706;">
                <i class="fa-solid fa-calendar-check"></i>
            </div>
            <div class="stat-info">
                <div class="stat-value" data-count="{{ $totalJadwal ?? 47 }}">0</div>
                <div class="stat-label">Jadwal Praktik</div>
                <div class="stat-trend" style="color:#f59e0b;">
                    <i class="fa-solid fa-circle-dot" style="font-size:9px;"></i>
                    Aktif minggu ini
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ================================================================
     QUICK ACTIONS
================================================================ --}}
<div class="am-card mb-4">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <div class="section-title" style="font-size:14px;">Aksi Cepat</div>
            <div style="font-size:12px;color:var(--text-muted);">Shortcut ke halaman yang sering diakses</div>
        </div>
    </div>
    <div class="row g-2">
        <div class="col-6 col-sm-4 col-md-2">
            <a href="{{ route('admin.berita.create') }}" class="quick-action">
                <div class="qa-icon" style="background:#e0f2fe;color:#0284c7;">
                    <i class="fa-solid fa-plus"></i>
                </div>
                Tambah Berita
            </a>
        </div>
        <div class="col-6 col-sm-4 col-md-2">
            <a href="{{ route('admin.dokter.create') }}" class="quick-action">
                <div class="qa-icon" style="background:#cffafe;color:#0891b2;">
                    <i class="fa-solid fa-user-plus"></i>
                </div>
                Tambah Dokter
            </a>
        </div>
        <div class="col-6 col-sm-4 col-md-2">
            <a href="{{ route('admin.jadwal.create') }}" class="quick-action">
                <div class="qa-icon" style="background:#fef3c7;color:#d97706;">
                    <i class="fa-solid fa-calendar-plus"></i>
                </div>
                Jadwal Baru
            </a>
        </div>
        <div class="col-6 col-sm-4 col-md-2">
            <a href="{{ route('admin.layanan.create') }}" class="quick-action">
                <div class="qa-icon" style="background:#d1fae5;color:#059669;">
                    <i class="fa-solid fa-stethoscope"></i>
                </div>
                Tambah Layanan
            </a>
        </div>
        <div class="col-6 col-sm-4 col-md-2">
            <a href="{{ route('admin.banner.create') }}" class="quick-action">
                <div class="qa-icon" style="background:#ede9fe;color:#7c3aed;">
                    <i class="fa-solid fa-image"></i>
                </div>
                Upload Banner
            </a>
        </div>
        <div class="col-6 col-sm-4 col-md-2">
            <a href="{{ route('admin.dashboard') }}" class="quick-action">
                <div class="qa-icon" style="background:#fce7f3;color:#be185d;">
                    <i class="fa-solid fa-users-gear"></i>
                </div>
                Kelola User
            </a>
        </div>
    </div>
</div>

{{-- ================================================================
     ROW 3: Kunjungan Chart + Dokter Aktif + Layanan
================================================================ --}}
<div class="row g-3 mb-4">

    {{-- Grafik Kunjungan --}}
    <div class="col-lg-5">
        <div class="am-card h-100" style="padding-bottom:18px;">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div>
                    <div class="card-inner-title">Kunjungan Website</div>
                    <div class="card-inner-sub">7 hari terakhir</div>
                </div>
                <span class="am-badge badge-active">Live</span>
            </div>

            {{-- Bar chart (CSS only, placeholder) --}}
            <div class="chart-placeholder" id="visitChart">
                {{-- JS will fill bars --}}
            </div>
            <div class="chart-labels" id="chartLabels"></div>

            <div class="d-flex gap-3 mt-3 pt-3" style="border-top:1px solid var(--border-color);">
                <div>
                    <div style="font-size:11px;color:var(--text-muted);font-weight:600;text-transform:uppercase;letter-spacing:.8px;">Total</div>
                    <div style="font-family:'Plus Jakarta Sans',sans-serif;font-size:20px;font-weight:800;color:var(--text-main);">1.284</div>
                </div>
                <div>
                    <div style="font-size:11px;color:var(--text-muted);font-weight:600;text-transform:uppercase;letter-spacing:.8px;">Rata-rata/hari</div>
                    <div style="font-family:'Plus Jakarta Sans',sans-serif;font-size:20px;font-weight:800;color:var(--text-main);">183</div>
                </div>
                <div class="ms-auto align-self-end">
                    <span style="font-size:12px;color:#10b981;font-weight:700;">
                        <i class="fa-solid fa-arrow-trend-up" style="font-size:11px;"></i>
                        +18% vs minggu lalu
                    </span>
                </div>
            </div>
        </div>
    </div>

    {{-- Distribusi Layanan --}}
    <div class="col-lg-4">
        <div class="am-card h-100">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <div class="card-inner-title">Distribusi Layanan</div>
                    <div class="card-inner-sub">Berdasarkan kunjungan</div>
                </div>
                <a href="{{ route('admin.layanan.index') }}"
                   style="font-size:12px;color:var(--primary);font-weight:600;text-decoration:none;">
                    Kelola <i class="fa-solid fa-arrow-right" style="font-size:10px;"></i>
                </a>
            </div>

            @php
                $layananData = $layananStats ?? [
                    ['nama' => 'Poli Umum',       'pct' => 72, 'color' => '#0ea5e9'],
                    ['nama' => 'Poli Gigi',        'pct' => 55, 'color' => '#06b6d4'],
                    ['nama' => 'Poli Anak',        'pct' => 43, 'color' => '#10b981'],
                    ['nama' => 'Laboratorium',     'pct' => 30, 'color' => '#f59e0b'],
                    ['nama' => 'Rawat Inap',       'pct' => 20, 'color' => '#ef4444'],
                ];
            @endphp

            @foreach($layananData as $item)
            <div class="am-progress-wrap">
                <div class="am-progress-label">
                    <span>{{ $item['nama'] }}</span>
                    <span style="color:var(--text-muted);">{{ $item['pct'] }}%</span>
                </div>
                <div class="am-progress">
                    <div class="am-progress-bar"
                         style="width:{{ $item['pct'] }}%; background: linear-gradient(90deg, {{ $item['color'] }}, {{ $item['color'] }}99);">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Status Sistem --}}
    <div class="col-lg-3">
        <div class="am-card h-100">
            <div class="card-inner-title mb-1">Status Sistem</div>
            <div class="card-inner-sub mb-4">Kondisi website & server</div>

            <div class="sys-status-item">
                <div class="sys-icon" style="background:#d1fae5;color:#059669;">
                    <i class="fa-solid fa-server"></i>
                </div>
                <div class="sys-label">Web Server</div>
                <span class="status-pill pill-active">Online</span>
            </div>

            <div class="sys-status-item">
                <div class="sys-icon" style="background:#d1fae5;color:#059669;">
                    <i class="fa-solid fa-database"></i>
                </div>
                <div class="sys-label">Database</div>
                <span class="status-pill pill-active">Online</span>
            </div>

            <div class="sys-status-item">
                <div class="sys-icon" style="background:#fef3c7;color:#d97706;">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="sys-label">Email Server</div>
                <span class="status-pill pill-pending">Standby</span>
            </div>

            <div class="sys-status-item">
                <div class="sys-icon" style="background:#d1fae5;color:#059669;">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <div class="sys-label">SSL Cert</div>
                <div class="sys-value">91 hari</div>
            </div>

            <div class="sys-status-item">
                <div class="sys-icon" style="background:#e0f2fe;color:#0284c7;">
                    <i class="fa-solid fa-hard-drive"></i>
                </div>
                <div class="sys-label">Penyimpanan</div>
                <div class="sys-value">4.2 / 10 GB</div>
            </div>

            <div class="mt-3 pt-3" style="border-top:1px solid var(--border-color);">
                <div class="am-progress-label">
                    <span style="font-size:12px;color:var(--text-muted);">Disk Usage</span>
                    <span style="font-size:12px;color:var(--text-muted);">42%</span>
                </div>
                <div class="am-progress">
                    <div class="am-progress-bar" style="width:42%;background:linear-gradient(90deg,#0ea5e9,#06b6d4);"></div>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- ================================================================
     ROW 4: Dokter Terbaru + Berita Terbaru + Jadwal Hari Ini
================================================================ --}}
<div class="row g-3">

    {{-- Dokter Terbaru --}}
    <div class="col-lg-4">
        <div class="am-card no-pad h-100">
            <div class="card-header-inner mb-0 pb-3"
                 style="border-bottom:1px solid var(--border-color);">
                <div>
                    <div class="card-inner-title">Dokter Terdaftar</div>
                    <div class="card-inner-sub">Data terkini</div>
                </div>
                <a href="{{ route('admin.dokter.index') }}"
                   style="font-size:12px;color:var(--primary);font-weight:600;text-decoration:none;">
                    Lihat Semua
                </a>
            </div>

            @php
                $dokterList = $dokterTerbaru ?? [
                    ['nama' => 'dr. Hendra Kusuma',  'spesialis' => 'Umum',            'status' => 'active'],
                    ['nama' => 'dr. Sari Dewi, Sp.A','spesialis' => 'Anak',             'status' => 'active'],
                    ['nama' => 'drg. Rina Putri',    'spesialis' => 'Gigi',             'status' => 'active'],
                    ['nama' => 'dr. Budi Santoso',   'spesialis' => 'Penyakit Dalam',   'status' => 'inactive'],
                    ['nama' => 'dr. Laila Anisa',    'spesialis' => 'Kebidanan',        'status' => 'active'],
                ];
            @endphp

            @foreach($dokterList as $index => $dokter)
            <div style="display:flex;align-items:center;gap:12px;padding:13px 24px;
                        border-bottom:{{ $index < count($dokterList)-1 ? '1px solid var(--border-color)' : 'none' }};
                        transition:background .18s;"
                 onmouseover="this.style.background='#f8faff'"
                 onmouseout="this.style.background='transparent'">
                <div class="doc-avatar-placeholder"
                     style="background:{{ ['#e0f2fe','#cffafe','#d1fae5','#fef3c7','#ede9fe'][$index % 5] }};
                            color:{{ ['#0284c7','#0891b2','#059669','#d97706','#7c3aed'][$index % 5] }};">
                    {{ strtoupper(substr($dokter['nama'], 4, 1)) }}
                </div>
                <div style="flex:1;min-width:0;">
                    <div style="font-size:13px;font-weight:600;color:var(--text-main);
                                white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                        {{ $dokter['nama'] }}
                    </div>
                    <div style="font-size:11.5px;color:var(--text-muted);">
                        <i class="fa-solid fa-stethoscope" style="font-size:9px;margin-right:4px;"></i>
                        {{ $dokter['spesialis'] }}
                    </div>
                </div>
                <span class="status-pill {{ $dokter['status'] === 'active' ? 'pill-active' : 'pill-inactive' }}">
                    {{ $dokter['status'] === 'active' ? 'Aktif' : 'Nonaktif' }}
                </span>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Berita Terbaru --}}
    <div class="col-lg-4">
        <div class="am-card no-pad h-100">
            <div class="card-header-inner pb-3"
                 style="border-bottom:1px solid var(--border-color);">
                <div>
                    <div class="card-inner-title">Berita Terbaru</div>
                    <div class="card-inner-sub">Publikasi terakhir</div>
                </div>
                <a href="{{ route('admin.berita.index') }}"
                   style="font-size:12px;color:var(--primary);font-weight:600;text-decoration:none;">
                    Lihat Semua
                </a>
            </div>

            @php
                $beritaList = $beritaTerbaru ?? [
                    ['judul' => 'Pelayanan Poli Gigi Kini Lebih Lengkap', 'tanggal' => '02 Mei 2025', 'views' => 312],
                    ['judul' => 'Jadwal Dokter Spesialis Bulan Mei', 'tanggal' => '01 Mei 2025', 'views' => 287],
                    ['judul' => 'Program Pemeriksaan Kesehatan Gratis', 'tanggal' => '29 Apr 2025', 'views' => 198],
                    ['judul' => 'Pengumuman Libur Nasional Klinik', 'tanggal' => '28 Apr 2025', 'views' => 145],
                ];
            @endphp

            @foreach($beritaList as $index => $berita)
            <div style="display:flex;align-items:flex-start;gap:12px;padding:14px 24px;
                        border-bottom:{{ $index < count($beritaList)-1 ? '1px solid var(--border-color)' : 'none' }};
                        transition:background .18s;"
                 onmouseover="this.style.background='#f8faff'"
                 onmouseout="this.style.background='transparent'">
                <div style="width:36px;height:36px;border-radius:8px;background:var(--primary-light);
                            display:flex;align-items:center;justify-content:center;
                            color:var(--primary);font-size:14px;flex-shrink:0;">
                    <i class="fa-regular fa-newspaper"></i>
                </div>
                <div style="flex:1;min-width:0;">
                    <div style="font-size:13px;font-weight:600;color:var(--text-main);line-height:1.35;
                                display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">
                        {{ $berita['judul'] }}
                    </div>
                    <div style="font-size:11.5px;color:var(--text-muted);margin-top:4px;display:flex;align-items:center;gap:8px;">
                        <span><i class="fa-regular fa-calendar" style="margin-right:3px;"></i>{{ $berita['tanggal'] }}</span>
                        <span><i class="fa-regular fa-eye" style="margin-right:3px;"></i>{{ $berita['views'] }}</span>
                    </div>
                </div>
                <a href="#"
                   class="btn-icon-sm btn-edit"
                   title="Edit">
                    <i class="fa-solid fa-pen"></i>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Jadwal Hari Ini --}}
    <div class="col-lg-4">
        <div class="am-card no-pad h-100">
            <div class="card-header-inner pb-3"
                 style="border-bottom:1px solid var(--border-color);">
                <div>
                    <div class="card-inner-title">Jadwal Hari Ini</div>
                    <div class="card-inner-sub" id="jadwalDate">Memuat...</div>
                </div>
                <a href="{{ route('admin.jadwal.index') }}"
                   style="font-size:12px;color:var(--primary);font-weight:600;text-decoration:none;">
                    Kelola
                </a>
            </div>

            @php
                $jadwalHariIni = $jadwalToday ?? [
                    ['dokter' => 'dr. Hendra Kusuma',  'poli' => 'Poli Umum',  'jam' => '08:00 – 12:00', 'status' => 'active'],
                    ['dokter' => 'dr. Sari Dewi, Sp.A','poli' => 'Poli Anak',  'jam' => '09:00 – 13:00', 'status' => 'active'],
                    ['dokter' => 'drg. Rina Putri',    'poli' => 'Poli Gigi',  'jam' => '13:00 – 17:00', 'status' => 'pending'],
                    ['dokter' => 'dr. Laila Anisa',    'poli' => 'Kebidanan',  'jam' => '14:00 – 18:00', 'status' => 'active'],
                ];
            @endphp

            @foreach($jadwalHariIni as $index => $jadwal)
            <div style="display:flex;align-items:center;gap:12px;padding:13px 24px;
                        border-bottom:{{ $index < count($jadwalHariIni)-1 ? '1px solid var(--border-color)' : 'none' }};
                        transition:background .18s;"
                 onmouseover="this.style.background='#f8faff'"
                 onmouseout="this.style.background='transparent'">
                <div style="width:36px;height:36px;border-radius:8px;
                            background:{{ $jadwal['status'] === 'active' ? '#d1fae5' : '#fef3c7' }};
                            color:{{ $jadwal['status'] === 'active' ? '#059669' : '#d97706' }};
                            display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0;">
                    <i class="fa-solid fa-clock"></i>
                </div>
                <div style="flex:1;min-width:0;">
                    <div style="font-size:13px;font-weight:600;color:var(--text-main);
                                white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                        {{ $jadwal['dokter'] }}
                    </div>
                    <div style="font-size:11.5px;color:var(--text-muted);margin-top:2px;">
                        <span class="day-badge" style="font-size:10px;padding:1px 6px;">{{ $jadwal['poli'] }}</span>
                        <span style="margin-left:4px;">{{ $jadwal['jam'] }}</span>
                    </div>
                </div>
                <span class="status-pill {{ $jadwal['status'] === 'active' ? 'pill-active' : 'pill-pending' }}"
                      style="font-size:10px;">
                    {{ $jadwal['status'] === 'active' ? 'Aktif' : 'Segera' }}
                </span>
            </div>
            @endforeach

            {{-- CTA --}}
            <div style="padding:14px 24px;">
                <a href="{{ route('admin.jadwal.create') }}"
                   class="btn-primary-am w-100 justify-content-center"
                   style="text-decoration:none;">
                    <i class="fa-solid fa-plus"></i>
                    Tambah Jadwal Baru
                </a>
            </div>
        </div>
    </div>

</div>
{{-- END ROW 4 --}}

@endsection

@push('scripts')
<script>
    /* ---- Live Clock ---- */
    function updateClock() {
        const now = new Date();
        const days   = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
        const months = ['Januari','Februari','Maret','April','Mei','Juni',
                        'Juli','Agustus','September','Oktober','November','Desember'];

        const hh = String(now.getHours()).padStart(2,'0');
        const mm = String(now.getMinutes()).padStart(2,'0');
        const ss = String(now.getSeconds()).padStart(2,'0');

        document.getElementById('liveClock').textContent = `${hh}:${mm}:${ss}`;
        document.getElementById('liveDate').textContent =
            `${days[now.getDay()]}, ${now.getDate()} ${months[now.getMonth()]} ${now.getFullYear()}`;
        document.getElementById('jadwalDate').textContent =
            `${days[now.getDay()]}, ${now.getDate()} ${months[now.getMonth()]}`;
    }
    updateClock();
    setInterval(updateClock, 1000);

    /* ---- Animated stat counters ---- */
    function animateCounter(el) {
        const target = parseInt(el.dataset.count, 10);
        const dur    = 1000;
        const step   = 16;
        const inc    = target / (dur / step);
        let current  = 0;

        const timer = setInterval(() => {
            current += inc;
            if (current >= target) { current = target; clearInterval(timer); }
            el.textContent = Math.floor(current).toLocaleString('id-ID');
        }, step);
    }

    document.querySelectorAll('.stat-value[data-count]').forEach(el => {
        const obs = new IntersectionObserver(entries => {
            entries.forEach(e => { if (e.isIntersecting) { animateCounter(el); obs.disconnect(); } });
        }, { threshold: .3 });
        obs.observe(el);
    });

    /* ---- Simple bar chart (CSS bars) ---- */
    (function () {
        const data   = [142, 198, 165, 210, 188, 232, 149];
        const labels = ['Sen','Sel','Rab','Kam','Jum','Sab','Min'];
        const max    = Math.max(...data);
        const today  = new Date().getDay(); // 0=Sun
        const todayIdx = today === 0 ? 6 : today - 1;

        const chart  = document.getElementById('visitChart');
        const labelEl= document.getElementById('chartLabels');
        const colors = ['#0ea5e9','#06b6d4','#0ea5e9','#06b6d4','#0ea5e9','#0ea5e9','#cbd5e1'];

        data.forEach((val, i) => {
            const bar  = document.createElement('div');
            const pct  = Math.round((val / max) * 100);
            bar.className = 'chart-bar' + (i > todayIdx ? ' dim' : '');
            bar.style.height = pct + '%';
            bar.style.background = i <= todayIdx
                ? `linear-gradient(180deg, ${colors[i % 2 === 0 ? 0 : 1]}, ${colors[i % 2 === 0 ? 1 : 0]})`
                : '';
            bar.title = `${labels[i]}: ${val.toLocaleString('id-ID')} kunjungan`;
            chart.appendChild(bar);

            const lbl = document.createElement('span');
            lbl.textContent = labels[i];
            labelEl.appendChild(lbl);
        });
    })();
</script>
@endpush
