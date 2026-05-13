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
     STAT CARDS DASHBOARD
     Menampilkan ringkasan data utama sistem
================================================================ --}}

<div class="row g-3 mb-4">

    {{-- ============================================================
         CARD TOTAL BERITA
         Menampilkan jumlah seluruh berita
    ============================================================= --}}
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card" style="--stat-color:#0ea5e9;">

            {{-- Icon berita --}}
            <div class="stat-icon" style="background:#e0f2fe; color:#0284c7;">
                <i class="fa-solid fa-newspaper"></i>
            </div>

            {{-- Informasi statistik --}}
            <div class="stat-info">

                {{-- Angka total berita --}}
                <div class="stat-value" data-count="{{ $totalBerita ?? 24 }}">
                    0
                </div>

                {{-- Label --}}
                <div class="stat-label">
                    Total Berita
                </div>

                {{-- Keterangan tambahan --}}
                <div class="stat-trend" style="color:#10b981;">
                    <i class="fa-solid fa-arrow-trend-up" style="font-size:10px;"></i>
                    +3 bulan ini
                </div>

            </div>
        </div>
    </div>


    {{-- ============================================================
         CARD TOTAL DOKTER
         Menampilkan jumlah dokter aktif
    ============================================================= --}}
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card" style="--stat-color:#06b6d4;">

            {{-- Icon dokter --}}
            <div class="stat-icon" style="background:#cffafe; color:#0891b2;">
                <i class="fa-solid fa-user-doctor"></i>
            </div>

            {{-- Informasi statistik --}}
            <div class="stat-info">

                {{-- Angka total dokter --}}
                <div class="stat-value" data-count="{{ $totalDokter ?? 12 }}">
                    0
                </div>

                {{-- Label --}}
                <div class="stat-label">
                    Total Dokter
                </div>

                {{-- Keterangan tambahan --}}
                <div class="stat-trend" style="color:#10b981;">
                    <i class="fa-solid fa-arrow-trend-up" style="font-size:10px;"></i>
                    +1 baru
                </div>

            </div>
        </div>
    </div>


    {{-- ============================================================
         CARD TOTAL ARTIKEL
         Menampilkan jumlah artikel kesehatan
    ============================================================= --}}
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card" style="--stat-color:#ec4899;">

            {{-- Icon artikel --}}
            <div class="stat-icon" style="background:#fce7f3; color:#be185d;">
                <i class="fa-solid fa-file-lines"></i>
            </div>

            {{-- Informasi statistik --}}
            <div class="stat-info">

                {{-- Angka total artikel --}}
                <div class="stat-value" data-count="{{ $totalArtikel ?? 0 }}">
                    0
                </div>

                {{-- Label --}}
                <div class="stat-label">
                    Total Artikel
                </div>

                {{-- Keterangan tambahan --}}
                <div class="stat-trend" style="color:#ec4899;">
                    <i class="fa-solid fa-pen" style="font-size:10px;"></i>
                    Artikel terbaru
                </div>

            </div>
        </div>
    </div>


    {{-- ============================================================
         CARD TOTAL JADWAL PRAKTIK
         Menampilkan jumlah jadwal dokter aktif
    ============================================================= --}}
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card" style="--stat-color:#f59e0b;">

            {{-- Icon jadwal --}}
            <div class="stat-icon" style="background:#fef3c7; color:#d97706;">
                <i class="fa-solid fa-calendar-check"></i>
            </div>

            {{-- Informasi statistik --}}
            <div class="stat-info">

                {{-- Angka total jadwal --}}
                <div class="stat-value" data-count="{{ $totalJadwal ?? 47 }}">
                    0
                </div>

                {{-- Label --}}
                <div class="stat-label">
                    Jadwal Praktik
                </div>

                {{-- Keterangan tambahan --}}
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
            <div style="font-size:12px;color:var(--text-muted);">
                Shortcut ke halaman yang sering diakses
            </div>
        </div>
    </div>

    <div class="row g-2">

        {{-- TAMBAH BERITA --}}
        <div class="col-6 col-sm-4 col-md-2">
            <a href="{{ route('admin.berita.create') }}" class="quick-action">
                <div class="qa-icon" style="background:#e0f2fe;color:#0284c7;">
                    <i class="fa-solid fa-plus"></i>
                </div>
                Tambah Berita
            </a>
        </div>

        {{-- TAMBAH BANNER --}}
        <div class="col-6 col-sm-4 col-md-2">
            <a href="{{ route('admin.banner.create') }}" class="quick-action">
                <div class="qa-icon" style="background:#cffafe;color:#0891b2;">
                    <i class="fa-solid fa-user-plus"></i>
                </div>
                Tambah Banner
            </a>
        </div>

        {{-- TAMBAH PENGADAAN --}}
        <div class="col-6 col-sm-4 col-md-2">
            <a href="{{ route('admin.pengadaan.index') }}" class="quick-action">
                <div class="qa-icon" style="background:#fef3c7;color:#d97706;">
                    <i class="fa-solid fa-calendar-plus"></i>
                </div>
                Tambah Pengadaan
            </a>
        </div>

        {{-- TAMBAH VIDEO --}}
        <div class="col-6 col-sm-4 col-md-2">
            <a href="{{ route('admin.video.index') }}" class="quick-action">
                <div class="qa-icon" style="background:#d1fae5;color:#059669;">
                    <i class="fa-solid fa-stethoscope"></i>
                </div>
                Tambah Video
            </a>
        </div>

        {{-- TAMBAH LOKER --}}
        <div class="col-6 col-sm-4 col-md-2">
            <a href="{{ route('admin.loker.create') }}" class="quick-action">
                <div class="qa-icon" style="background:#ede9fe;color:#7c3aed;">
                    <i class="fa-solid fa-image"></i>
                </div>
                Tambah Loker
            </a>
        </div>

        {{-- TAMBAH ARTIKEL --}}
        <div class="col-6 col-sm-4 col-md-2">
            <a href="{{ route('admin.artikel.create') }}" class="quick-action">
                <div class="qa-icon" style="background:#fce7f3;color:#be185d;">
                    <i class="fa-solid fa-users-gear"></i>
                </div>
                Tambah Artikel
            </a>
        </div>

    </div>
</div>



    

    


@endsection

@push('scripts')
<script>

    /* ============================================================
       LIVE CLOCK
    ============================================================ */
    function updateClock() {

        const now = new Date();

        const days = [
            'Minggu','Senin','Selasa','Rabu',
            'Kamis','Jumat','Sabtu'
        ];

        const months = [
            'Januari','Februari','Maret','April',
            'Mei','Juni','Juli','Agustus',
            'September','Oktober','November','Desember'
        ];

        const hh = String(now.getHours()).padStart(2,'0');
        const mm = String(now.getMinutes()).padStart(2,'0');
        const ss = String(now.getSeconds()).padStart(2,'0');

        document.getElementById('liveClock').textContent =
            `${hh}:${mm}:${ss}`;

        document.getElementById('liveDate').textContent =
            `${days[now.getDay()]}, ${now.getDate()} ${months[now.getMonth()]} ${now.getFullYear()}`;

        // Cek dulu apakah element ada
        const jadwalDate = document.getElementById('jadwalDate');

        if (jadwalDate) {
            jadwalDate.textContent =
                `${days[now.getDay()]}, ${now.getDate()} ${months[now.getMonth()]}`;
        }
    }

    updateClock();
    setInterval(updateClock, 1000);


    /* ============================================================
       ANIMATED COUNTER
       Mengambil angka dari data-count database
    ============================================================ */
    function animateCounter(el) {

        const target = parseInt(el.dataset.count, 10) || 0;

        const duration = 1200;
        const stepTime = 16;

        const increment = target / (duration / stepTime);

        let current = 0;

        const timer = setInterval(() => {

            current += increment;

            if (current >= target) {

                current = target;

                clearInterval(timer);
            }

            el.textContent =
                Math.floor(current).toLocaleString('id-ID');

        }, stepTime);
    }


    /* ============================================================
       JALANKAN COUNTER SAAT CARD MUNCUL
    ============================================================ */
    document.querySelectorAll('.stat-value[data-count]').forEach(el => {

        const observer = new IntersectionObserver(entries => {

            entries.forEach(entry => {

                if (entry.isIntersecting) {

                    animateCounter(el);

                    observer.disconnect();
                }
            });

        }, {
            threshold: 0.3
        });

        observer.observe(el);
    });


    /* ============================================================
       SIMPLE BAR CHART
    ============================================================ */
    (function () {

        const chart = document.getElementById('visitChart');
        const labelEl = document.getElementById('chartLabels');

        // Jika chart tidak ada -> stop
        if (!chart || !labelEl) return;

        const data = [142, 198, 165, 210, 188, 232, 149];

        const labels = [
            'Sen','Sel','Rab',
            'Kam','Jum','Sab','Min'
        ];

        const max = Math.max(...data);

        const today = new Date().getDay();

        const todayIdx = today === 0 ? 6 : today - 1;

        const colors = [
            '#0ea5e9',
            '#06b6d4',
            '#0ea5e9',
            '#06b6d4',
            '#0ea5e9',
            '#0ea5e9',
            '#cbd5e1'
        ];

        data.forEach((val, i) => {

            const bar = document.createElement('div');

            const pct = Math.round((val / max) * 100);

            bar.className =
                'chart-bar' + (i > todayIdx ? ' dim' : '');

            bar.style.height = pct + '%';

            bar.style.background = i <= todayIdx
                ? `linear-gradient(
                    180deg,
                    ${colors[i % 2 === 0 ? 0 : 1]},
                    ${colors[i % 2 === 0 ? 1 : 0]}
                  )`
                : '';

            bar.title =
                `${labels[i]}: ${val.toLocaleString('id-ID')} kunjungan`;

            chart.appendChild(bar);

            const lbl = document.createElement('span');

            lbl.textContent = labels[i];

            labelEl.appendChild(lbl);
        });

    })();

</script>
@endpush
