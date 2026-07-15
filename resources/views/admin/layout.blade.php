<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — Allam Medica Admin</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        
        :root {
            --primary:        #0ea5e9;
            --primary-dark:   #0284c7;
            --primary-light:  #e0f2fe;
            --accent:         #06b6d4;
            --success:        #10b981;
            --warning:        #f59e0b;
            --danger:         #ef4444;
            --sidebar-bg:     #0c1a2e;
            --sidebar-hover:  #1e3a5f;
            --sidebar-active: #0ea5e9;
            --sidebar-width:  260px;
            --topbar-h:       64px;
            --body-bg:        #f0f6ff;
            --card-bg:        #ffffff;
            --text-main:      #1e293b;
            --text-muted:     #64748b;
            --text-sidebar:   #94a3b8;
            --border-color:   #e2e8f0;
            --shadow-sm:      0 1px 3px rgba(0,0,0,.08), 0 1px 2px rgba(0,0,0,.06);
            --shadow-md:      0 4px 16px rgba(14,165,233,.12);
            --radius:         12px;
            --radius-sm:      8px;
            --transition:     .22s cubic-bezier(.4,0,.2,1);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--body-bg);
            color: var(--text-main);
            overflow-x: hidden;
        }

        h1,h2,h3,h4,h5,h6, .fw-heading {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        
        #sidebar {
            position: fixed;
            top: 0; left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--sidebar-bg);
            display: flex;
            flex-direction: column;
            z-index: 1050;
            transition: width var(--transition), transform var(--transition);
            overflow: hidden;
        }

        #sidebar.collapsed { width: 68px; }
        #sidebar.collapsed .sidebar-label,
        #sidebar.collapsed .sidebar-brand-text,
        #sidebar.collapsed .sidebar-section-label,
        #sidebar.collapsed .dropdown-arrow { opacity: 0; width: 0; overflow: hidden; white-space: nowrap; }
        #sidebar.collapsed .sidebar-brand { justify-content: center; }
        #sidebar.collapsed .nav-link { justify-content: center; padding: 12px; }
        #sidebar.collapsed .nav-link .nav-icon { margin-right: 0; }
        #sidebar.collapsed .collapse { display: none !important; }


        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 20px 20px 16px;
            border-bottom: 1px solid rgba(255,255,255,.07);
            text-decoration: none;
            flex-shrink: 0;
        }

        .sidebar-brand-icon {
            width: 38px; height: 38px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: var(--radius-sm);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .sidebar-brand-icon i { color: #fff; font-size: 17px; }

        .sidebar-brand-text {
            display: flex; flex-direction: column;
            transition: opacity var(--transition), width var(--transition);
        }

        .sidebar-brand-text .name {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px; font-weight: 800;
            color: #fff; line-height: 1.2;
            letter-spacing: -.2px;
        }

        .sidebar-brand-text .sub {
            font-size: 10px; font-weight: 500;
            color: var(--primary); letter-spacing: .8px;
            text-transform: uppercase;
        }

        .sidebar-nav {
            flex: 1;
            overflow-y: auto;
            overflow-x: hidden;
            padding: 12px 0;
            scrollbar-width: thin;
            scrollbar-color: rgba(255,255,255,.1) transparent;
        }

        .sidebar-nav::-webkit-scrollbar { width: 4px; }
        .sidebar-nav::-webkit-scrollbar-thumb { background: rgba(255,255,255,.1); border-radius: 2px; }

        .sidebar-section-label {
            font-size: 10px; font-weight: 700;
            color: var(--text-sidebar);
            text-transform: uppercase; letter-spacing: 1.2px;
            padding: 12px 20px 4px;
            transition: opacity var(--transition);
        }

        .nav-link {
            display: flex; align-items: center;
            padding: 10px 20px;
            color: var(--text-sidebar);
            text-decoration: none;
            border-radius: 0;
            transition: background var(--transition), color var(--transition), padding var(--transition);
            position: relative;
            cursor: pointer;
            gap: 0;
        }

        .nav-link:hover {
            background: var(--sidebar-hover);
            color: #fff;
        }

        .nav-link.active {
            background: rgba(14,165,233,.18);
            color: var(--primary);
        }

        .nav-link.active::before {
            content: '';
            position: absolute; left: 0; top: 6px; bottom: 6px;
            width: 3px;
            background: var(--primary);
            border-radius: 0 3px 3px 0;
        }

        .nav-icon {
            width: 28px; height: 28px;
            display: flex; align-items: center; justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
            margin-right: 12px;
            transition: margin var(--transition);
        }

        .sidebar-label {
            flex: 1; font-size: 13.5px; font-weight: 500;
            white-space: nowrap;
            transition: opacity var(--transition), width var(--transition);
        }

        .dropdown-arrow {
            font-size: 10px;
            transition: transform var(--transition), opacity var(--transition);
        }

        .nav-link[aria-expanded="true"] .dropdown-arrow { transform: rotate(90deg); }


        .sidebar-submenu { padding: 4px 0; background: rgba(0,0,0,.15); }

        .sidebar-submenu .nav-link {
            padding: 8px 20px 8px 58px;
            font-size: 13px;
            color: #7a8fa6;
        }

        .sidebar-submenu .nav-link:hover { color: #fff; background: rgba(255,255,255,.05); }
        .sidebar-submenu .nav-link.active { color: var(--primary); background: rgba(14,165,233,.1); }
        .sidebar-submenu .nav-link.active::before { display: none; }

        .submenu-dot {
            width: 6px; height: 6px;
            border-radius: 50%; background: currentColor;
            margin-right: 10px; flex-shrink: 0;
            opacity: .6;
        }

 
        .sidebar-footer {
            padding: 12px;
            border-top: 1px solid rgba(255,255,255,.07);
            flex-shrink: 0;
        }

        .sidebar-user {
            display: flex; align-items: center; gap: 10px;
            padding: 8px 10px;
            border-radius: var(--radius-sm);
            transition: background var(--transition);
            cursor: pointer;
        }

        .sidebar-user:hover { background: var(--sidebar-hover); }

        .user-avatar {
            width: 34px; height: 34px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: 13px; font-weight: 700;
            flex-shrink: 0;
        }

        .user-info { flex: 1; overflow: hidden; }
        .user-info .uname { font-size: 13px; font-weight: 600; color: #fff; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .user-info .urole { font-size: 11px; color: var(--text-sidebar); }

        
        #topbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-width);
            right: 0;
            height: var(--topbar-h);
            background: var(--card-bg);
            border-bottom: 1px solid var(--border-color);
            display: flex; align-items: center;
            padding: 0 24px;
            gap: 12px;
            z-index: 1040;
            transition: left var(--transition);
            box-shadow: var(--shadow-sm);
        }

        #topbar.sidebar-collapsed { left: 68px; }

        .topbar-toggle {
            width: 36px; height: 36px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            background: transparent;
            color: var(--text-muted);
            display: flex; align-items: center; justify-content: center;
            cursor: pointer;
            transition: background var(--transition), color var(--transition);
            flex-shrink: 0;
        }

        .topbar-toggle:hover { background: var(--primary-light); color: var(--primary-dark); }

        .topbar-breadcrumb {
            flex: 1;
        }

        .topbar-breadcrumb .page-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 16px; font-weight: 700;
            color: var(--text-main);
            line-height: 1;
        }

        .topbar-breadcrumb .breadcrumb {
            margin: 2px 0 0;
            font-size: 12px;
        }

        .breadcrumb-item + .breadcrumb-item::before { color: var(--text-muted); }
        .breadcrumb-item a { color: var(--primary); text-decoration: none; }
        .breadcrumb-item.active { color: var(--text-muted); }

        .topbar-actions { display: flex; align-items: center; gap: 8px; }

        .topbar-btn {
            width: 36px; height: 36px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            background: transparent;
            color: var(--text-muted);
            display: flex; align-items: center; justify-content: center;
            cursor: pointer;
            position: relative;
            transition: background var(--transition), color var(--transition);
        }

        .topbar-btn:hover { background: var(--primary-light); color: var(--primary-dark); border-color: var(--primary-light); }

        .badge-dot {
            position: absolute; top: 7px; right: 7px;
            width: 7px; height: 7px;
            border-radius: 50%; background: var(--danger);
            border: 1.5px solid #fff;
        }

        .topbar-divider {
            width: 1px; height: 24px;
            background: var(--border-color);
        }

        .topbar-user {
            display: flex; align-items: center; gap: 8px;
            padding: 4px 8px 4px 4px;
            border-radius: 30px;
            border: 1px solid var(--border-color);
            cursor: pointer;
            transition: background var(--transition);
        }

        .topbar-user:hover { background: var(--primary-light); }

        .topbar-avatar {
            width: 30px; height: 30px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: 12px; font-weight: 700;
        }

        .topbar-uname { font-size: 13px; font-weight: 600; color: var(--text-main); }


        #main-wrapper {
            margin-left: var(--sidebar-width);
            padding-top: var(--topbar-h);
            min-height: 100vh;
            transition: margin-left var(--transition);
        }

        #main-wrapper.sidebar-collapsed { margin-left: 68px; }

        .main-content {
            padding: 28px 28px;
        }


        .am-card {
            background: var(--card-bg);
            border-radius: var(--radius);
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
            padding: 24px;
            transition: box-shadow var(--transition), transform var(--transition);
        }

        .am-card:hover { box-shadow: var(--shadow-md); }

        .stat-card {
            background: var(--card-bg);
            border-radius: var(--radius);
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
            padding: 20px 24px;
            display: flex; align-items: center; gap: 16px;
            transition: box-shadow var(--transition), transform var(--transition);
            overflow: hidden;
            position: relative;
        }

        .stat-card:hover { box-shadow: var(--shadow-md); transform: translateY(-2px); }

        .stat-card::after {
            content: '';
            position: absolute; right: -16px; top: -16px;
            width: 80px; height: 80px;
            border-radius: 50%;
            background: var(--stat-color, var(--primary));
            opacity: .06;
        }

        .stat-icon {
            width: 48px; height: 48px;
            border-radius: var(--radius-sm);
            display: flex; align-items: center; justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .stat-info .stat-value {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 26px; font-weight: 800;
            color: var(--text-main); line-height: 1;
        }

        .stat-info .stat-label {
            font-size: 12.5px; color: var(--text-muted); margin-top: 4px; font-weight: 500;
        }

        .stat-info .stat-trend {
            font-size: 11.5px; margin-top: 6px; font-weight: 600;
        }

    
        .am-table {
            width: 100%; border-collapse: separate; border-spacing: 0;
        }

        .am-table thead th {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 11px; font-weight: 700;
            text-transform: uppercase; letter-spacing: .8px;
            color: var(--text-muted);
            padding: 12px 16px;
            background: var(--body-bg);
            border-bottom: 1px solid var(--border-color);
        }

        .am-table tbody td {
            padding: 13px 16px;
            font-size: 13.5px;
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
        }

        .am-table tbody tr:last-child td { border-bottom: 0; }
        .am-table tbody tr:hover td { background: #f8faff; }

        .btn-primary-am {
            background: var(--primary);
            color: #fff; border: none;
            padding: 8px 18px;
            border-radius: var(--radius-sm);
            font-size: 13px; font-weight: 600;
            display: inline-flex; align-items: center; gap: 7px;
            cursor: pointer;
            transition: background var(--transition), box-shadow var(--transition);
        }

        .btn-primary-am:hover { background: var(--primary-dark); box-shadow: 0 4px 12px rgba(14,165,233,.3); color: #fff; }

        .btn-icon-sm {
            width: 30px; height: 30px;
            border-radius: 6px;
            display: inline-flex; align-items: center; justify-content: center;
            font-size: 12px; cursor: pointer;
            border: 1px solid transparent;
            transition: background var(--transition), color var(--transition);
        }

        .btn-edit { background: #e0f2fe; color: var(--primary); }
        .btn-edit:hover { background: var(--primary); color: #fff; }
        .btn-delete { background: #fee2e2; color: var(--danger); }
        .btn-delete:hover { background: var(--danger); color: #fff; }
        .btn-view { background: #d1fae5; color: var(--success); }
        .btn-view:hover { background: var(--success); color: #fff; }


        .am-badge {
            display: inline-flex; align-items: center;
            padding: 3px 10px; border-radius: 20px;
            font-size: 11px; font-weight: 600;
        }

        .badge-admin { background: #ede9fe; color: #7c3aed; }
        .badge-user  { background: #d1fae5; color: #059669; }
        .badge-active { background: #d1fae5; color: #059669; }
        .badge-inactive { background: #fee2e2; color: #dc2626; }


        .doc-avatar {
            width: 36px; height: 36px; border-radius: 50%;
            object-fit: cover;
        }

        .doc-avatar-placeholder {
            width: 36px; height: 36px; border-radius: 50%;
            background: var(--primary-light);
            display: flex; align-items: center; justify-content: center;
            color: var(--primary); font-size: 14px; font-weight: 700;
        }

        .am-modal-header {
            background: var(--sidebar-bg);
            border-radius: var(--radius) var(--radius) 0 0;
            padding: 16px 24px;
        }

        .am-modal-header .modal-title { color: #fff; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 15px; font-weight: 700; }
        .am-modal-header .btn-close { filter: invert(1); }

        /* Form group */
        .am-form-label { font-size: 12.5px; font-weight: 600; color: var(--text-main); margin-bottom: 5px; }
        .am-form-control {
            border: 1.5px solid var(--border-color);
            border-radius: var(--radius-sm);
            padding: 9px 13px;
            font-size: 13.5px;
            width: 100%;
            transition: border-color var(--transition), box-shadow var(--transition);
            outline: none;
        }

        .am-form-control:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(14,165,233,.15); }

        
        
        .section-header {
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 20px;
        }

        .section-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 17px; font-weight: 800;
            color: var(--text-main);
        }

        .section-sub {
            font-size: 12.5px; color: var(--text-muted); margin-top: 2px;
        }

        .day-badge {
            display: inline-flex; align-items: center;
            padding: 2px 8px; border-radius: 4px;
            font-size: 11px; font-weight: 600;
            background: var(--primary-light); color: var(--primary-dark);
            margin: 1px;
        }

        .am-toast-container {
            position: fixed; top: 80px; right: 20px; z-index: 9999;
        }

        .am-toast {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            box-shadow: var(--shadow-md);
            padding: 12px 16px;
            display: flex; align-items: center; gap: 10px;
            min-width: 240px;
            animation: toastIn .3s ease;
        }

        @keyframes toastIn {
            from { opacity: 0; transform: translateX(20px); }
            to   { opacity: 1; transform: translateX(0); }
        }

        #sidebar-overlay {
            display: none;
            position: fixed; inset: 0;
            background: rgba(0,0,0,.45);
            z-index: 1045;
        }

        @media (max-width: 991.98px) {
            :root { --sidebar-width: 260px; }

            #sidebar { transform: translateX(-100%); width: var(--sidebar-width) !important; }
            #sidebar.mobile-open { transform: translateX(0); }
            #sidebar-overlay { display: block; opacity: 0; pointer-events: none; transition: opacity var(--transition); }
            #sidebar.mobile-open ~ #sidebar-overlay,
            body.sidebar-open #sidebar-overlay { opacity: 1; pointer-events: auto; }

            #topbar { left: 0 !important; }
            #main-wrapper { margin-left: 0 !important; }

            .main-content { padding: 20px 16px; }
        }

        @media (max-width: 575.98px) {
            .topbar-breadcrumb .page-title { font-size: 14px; }
            .topbar-breadcrumb .breadcrumb { display: none; }
            .topbar-uname { display: none; }
            .stat-card { padding: 16px; }
            .stat-info .stat-value { font-size: 22px; }
        }
    </style>

    @stack('styles')
</head>
<body>


<aside id="sidebar">

    {{-- Brand --}}
    <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
        <div class="sidebar-brand-icon">
            <i class="fa-solid fa-hospital-user"></i>
        </div>
        <div class="sidebar-brand-text">
            <span class="name">Allam Medica</span>
            <span class="sub">Admin Panel</span>
        </div>
    </a>

    {{-- Navigation --}}
    <nav class="sidebar-nav" id="sidebarNav">

        {{-- Main --}}
        <div class="sidebar-section-label">Main</div>

        <a href="{{ route('admin.dashboard') }}"
           class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-chart-pie"></i></span>
            <span class="sidebar-label">Dashboard</span>
        </a>

        {{-- ---- INFORMASI dropdown ---- --}}
        <div class="sidebar-section-label">Informasi</div>

        <a class="nav-link"
           data-bs-toggle="collapse"
           href="#menuInformasi"
           role="button"
           aria-expanded="{{ request()->routeIs('admin.berita.*','admin.banner.*','admin.pengadaan.*','admin.video.*') ? 'true' : 'false' }}">
            <span class="nav-icon"><i class="fa-solid fa-newspaper"></i></span>
            <span class="sidebar-label">Informasi</span>
            <i class="fa-solid fa-chevron-right dropdown-arrow ms-auto"></i>
        </a>

        <div class="collapse {{ request()->routeIs('admin.berita.*','admin.banner.*','admin.pengadaan.*','admin.video.*') ? 'show' : '' }}"
             id="menuInformasi">
            <div class="sidebar-submenu">
                <a href="{{ route('admin.berita.index') }}"
                   class="nav-link {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                    <span class="submenu-dot"></span>
                    <span class="sidebar-label">Berita</span>
                </a>
                <a href="{{ route('admin.banner.index') }}"
                   class="nav-link {{ request()->routeIs('admin.banner.*') ? 'active' : '' }}">
                    <span class="submenu-dot"></span>
                    <span class="sidebar-label">Banner</span>
                </a>
                <a href="{{ route('admin.pengadaan.index') }}"
                   class="nav-link {{ request()->routeIs('admin.pengadaan.*') ? 'active' : '' }}">
                    <span class="submenu-dot"></span>
                    <span class="sidebar-label">Pengadaan</span>
                </a>
                <a href="{{ route('admin.video.index') }}"
                   class="nav-link {{ request()->routeIs('admin.video.*') ? 'active' : '' }}">
                    <span class="submenu-dot"></span>
                    <span class="sidebar-label">Video YouTube</span>
                </a>
                <a href="{{ route('admin.loker.index') }}"
                   class="nav-link {{ request()->routeIs('admin.loker.*') ? 'active' : '' }}">
                    <span class="submenu-dot"></span>
                    <span class="sidebar-label">Loker</span>
                </a>
                <a href="{{ route('admin.artikel.index') }}"
                   class="nav-link {{ request()->routeIs('admin.artikel.*') ? 'active' : '' }}">
                    <span class="submenu-dot"></span>
                    <span class="sidebar-label">Artikel</span>
                </a>
                <a href="{{ route('admin.form_mutu.index') }}"
                    class="nav-link {{ request()->routeIs('admin.form_mutu.*') ? 'active' : '' }}">
                    <span class="submenu-dot"></span>
                    <span class="sidebar-label">Form Mutu</span>
                </a>
                <a href="{{ route('admin.galeri.index') }}"
                class="nav-link {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
                    <span class="submenu-dot"></span>
                    <span class="sidebar-label">Galeri</span>
                </a>
            </div>
        </div>

        {{-- ---- LAYANAN ---- --}}
        <div class="sidebar-section-label">Klinik</div>

        <a href="{{ route('admin.layanan.index') }}"
           class="nav-link {{ request()->routeIs('admin.layanan.*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-stethoscope"></i></span>
            <span class="sidebar-label">Layanan</span>
        </a>

        {{-- ---- DATA DOKTER ---- --}}
        <a href="{{ route('admin.dokter.index') }}"
           class="nav-link {{ request()->routeIs('admin.dokter.*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-user-doctor"></i></span>
            <span class="sidebar-label">Data Dokter</span>
        </a>

        <a href="{{ route('admin.jadwal.index') }}"
        class="nav-link {{ request()->routeIs('admin.jadwal.*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-calendar-days"></i></span>
            <span class="sidebar-label">Jadwal Praktik</span>
        </a>

        {{-- ---- PENGGUNA ---- --}}
        <div class="sidebar-section-label">Sistem</div>

        <a href="{{ route('admin.pengguna.index') }}"
        class="nav-link {{ request()->routeIs('admin.pengguna.*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-users"></i></span>
            <span class="sidebar-label">Pengguna Web</span>
        </a>

    </nav>

    {{-- Footer user --}}
    <div class="sidebar-footer">
        <div class="sidebar-user" id="sidebarUserDropdown"
             data-bs-toggle="dropdown" aria-expanded="false">
            <div class="user-avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
            </div>
            <div class="user-info">
                <div class="uname">{{ auth()->user()->name ?? 'Administrator' }}</div>
                <div class="urole">{{ auth()->user()->role ?? 'Admin' }}</div>
            </div>
            <i class="fa-solid fa-ellipsis-vertical" style="color:#64748b;font-size:12px;"></i>
        </div>

        <ul class="dropdown-menu dropdown-menu-end" style="font-size:13px; border-radius:var(--radius-sm); border:1px solid var(--border-color);">
            
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-right-from-bracket me-2"></i> Keluar
                </a>
            </li>
        </ul>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</aside>

{{-- Mobile overlay --}}
<div id="sidebar-overlay" onclick="toggleMobileSidebar()"></div>


<header id="topbar">

    {{-- Toggle button --}}
    <button class="topbar-toggle" id="sidebarToggle" title="Toggle Sidebar">
        <i class="fa-solid fa-bars"></i>
    </button>

    {{-- Breadcrumb --}}
    <div class="topbar-breadcrumb">
        <div class="page-title fw-heading">@yield('page-title', 'Dashboard')</div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                @yield('breadcrumb')
            </ol>
        </nav>
    </div>

    
        <div class="topbar-divider"></div>

        {{-- User menu --}}
        <div class="topbar-user" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="topbar-avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
            </div>
            <span class="topbar-uname">{{ auth()->user()->name ?? 'Administrator' }}</span>
            <i class="fa-solid fa-chevron-down ms-1" style="font-size:10px;color:var(--text-muted);"></i>
        </div>

        <ul class="dropdown-menu dropdown-menu-end" style="font-size:13px; border-radius:var(--radius-sm); min-width:180px;">
            
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-arrow-right-from-bracket me-2"></i> Keluar
                </a>
            </li>
        </ul>

    </div>
</header>


<div id="main-wrapper">
    <main class="main-content">

        {{-- Flash message --}}
        @if(session('success'))
            <div class="alert d-flex align-items-center gap-2 mb-4"
                 style="background:#d1fae5;border:1.5px solid #a7f3d0;border-radius:var(--radius-sm);color:#065f46;font-size:13.5px;padding:12px 16px;">
                <i class="fa-solid fa-circle-check"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert d-flex align-items-center gap-2 mb-4"
                 style="background:#fee2e2;border:1.5px solid #fecaca;border-radius:var(--radius-sm);color:#991b1b;font-size:13.5px;padding:12px 16px;">
                <i class="fa-solid fa-circle-xmark"></i>
                {{ session('error') }}
            </div>
        @endif

        {{-- PAGE CONTENT --}}
        @yield('content')

    </main>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    /* ---- Sidebar collapse (desktop) ---- */
    const sidebar      = document.getElementById('sidebar');
    const topbar       = document.getElementById('topbar');
    const mainWrapper  = document.getElementById('main-wrapper');
    const toggleBtn    = document.getElementById('sidebarToggle');
    const STORAGE_KEY  = 'am_sidebar_collapsed';

    function applySidebarState(collapsed) {
        if (collapsed) {
            sidebar.classList.add('collapsed');
            topbar.classList.add('sidebar-collapsed');
            mainWrapper.classList.add('sidebar-collapsed');
            toggleBtn.querySelector('i').className = 'fa-solid fa-bars';
        } else {
            sidebar.classList.remove('collapsed');
            topbar.classList.remove('sidebar-collapsed');
            mainWrapper.classList.remove('sidebar-collapsed');
            toggleBtn.querySelector('i').className = 'fa-solid fa-bars';
        }
    }

    // Restore state
    if (window.innerWidth > 991) {
        applySidebarState(localStorage.getItem(STORAGE_KEY) === 'true');
    }

    toggleBtn.addEventListener('click', function () {
        if (window.innerWidth <= 991) {
            toggleMobileSidebar();
        } else {
            const collapsed = !sidebar.classList.contains('collapsed');
            applySidebarState(collapsed);
            localStorage.setItem(STORAGE_KEY, collapsed);
        }
    });

    /* ---- Mobile sidebar ---- */
    const overlay = document.getElementById('sidebar-overlay');

    function toggleMobileSidebar() {
        const open = sidebar.classList.toggle('mobile-open');
        document.body.classList.toggle('sidebar-open', open);
        overlay.style.opacity = open ? '1' : '0';
        overlay.style.pointerEvents = open ? 'auto' : 'none';
    }

    /* ---- Auto-close flash alerts ---- */
    document.querySelectorAll('.alert').forEach(function (el) {
        setTimeout(function () {
            el.style.transition = 'opacity .4s';
            el.style.opacity = '0';
            setTimeout(() => el.remove(), 400);
        }, 4000);
    });
</script>

@stack('scripts')
</body>
</html>