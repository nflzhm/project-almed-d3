<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan | RSU Allam Medica</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:wght@500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f5f0e8 0%, #ede8dc 50%, #e8e0d0 100%);
            font-family: 'Inter', sans-serif;
            overflow: hidden;
        }

        .ornamen {
            position: fixed;
            opacity: 0.06;
            pointer-events: none;
            z-index: 0;
        }
        .ornamen-tl { top: -80px; left: -80px; width: 380px; }
        .ornamen-br { bottom: -80px; right: -80px; width: 380px; transform: rotate(180deg); }

        .card {
            position: relative;
            z-index: 1;
            background: rgba(255,255,255,0.55);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(255,255,255,0.7);
            border-radius: 24px;
            padding: 56px 64px;
            max-width: 480px;
            width: 90%;
            text-align: center;
            box-shadow: 0 8px 48px rgba(0,0,0,0.08), 0 2px 8px rgba(0,0,0,0.04);
        }

        .error-code {
            font-family: 'Playfair Display', serif;
            font-size: 96px;
            font-weight: 600;
            line-height: 1;
            color: #2c2c2c;
            letter-spacing: -4px;
            margin-bottom: 4px;
            opacity: 0.12;
            user-select: none;
        }

        .icon-wrap {
            width: 72px; height: 72px;
            background: linear-gradient(135deg, #4a7c6b, #2d5a4a);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: -48px auto 24px;
            box-shadow: 0 8px 24px rgba(74,124,107,0.3);
        }
        .icon-wrap svg {
            width: 32px; height: 32px;
            fill: none;
            stroke: #fff;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(74,124,107,0.08);
            border: 1px solid rgba(74,124,107,0.2);
            border-radius: 100px;
            padding: 6px 16px;
            margin-bottom: 28px;
        }
        .badge-dot {
            width: 7px; height: 7px;
            border-radius: 50%;
            background: #4a7c6b;
            animation: pulse 2s infinite;
        }
        .badge-text {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.1em;
            color: #4a7c6b;
            text-transform: uppercase;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.4; }
        }

        .title {
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 12px;
            line-height: 1.3;
        }

        .divider {
            width: 40px;
            height: 2px;
            background: linear-gradient(90deg, #4a7c6b, transparent);
            margin: 0 auto 28px;
            border-radius: 2px;
        }

        .desc {
            font-size: 14px;
            color: #6b6b6b;
            line-height: 1.7;
            margin-bottom: 36px;
        }

        .hospital-name {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.12em;
            color: #999;
            text-transform: uppercase;
            margin-bottom: 32px;
        }

        .btn-group {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            border-radius: 100px;
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
            cursor: pointer;
            border: none;
        }
        .btn svg {
            width: 15px; height: 15px;
            fill: none;
            stroke: currentColor;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .btn-primary {
            background: linear-gradient(135deg, #4a7c6b, #2d5a4a);
            color: #fff;
            box-shadow: 0 4px 16px rgba(74,124,107,0.3);
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(74,124,107,0.4);
        }

        .btn-secondary {
            background: rgba(0,0,0,0.05);
            color: #555;
            border: 1px solid rgba(0,0,0,0.08);
        }
        .btn-secondary:hover {
            background: rgba(0,0,0,0.08);
            transform: translateY(-2px);
        }

        @media (max-width: 480px) {
            .card { padding: 40px 28px; }
            .error-code { font-size: 72px; }
        }
    </style>
</head>
<body>

    <img src="{{ asset('images/ornamen.png') }}" class="ornamen ornamen-tl" alt="">
    <img src="{{ asset('images/ornamen.png') }}" class="ornamen ornamen-br" alt="">

    <div class="card">
        <div class="error-code">404</div>

        <div class="icon-wrap">
            <svg viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                <line x1="11" y1="8" x2="11" y2="14"></line>
                <line x1="8" y1="11" x2="14" y2="11"></line>
            </svg>
        </div>

        <div class="badge">
            <span class="badge-dot"></span>
            <span class="badge-text">Halaman Tidak Ditemukan</span>
        </div>

        <h1 class="title">Halaman yang Anda cari<br>tidak tersedia</h1>

        <div class="divider"></div>

        <p class="desc">
            Halaman mungkin telah dipindahkan, dihapus, atau alamat URL yang Anda masukkan tidak sesuai.
            Silakan kembali ke halaman utama.
        </p>

        <p class="hospital-name">RSU Allam Medica Bumiayu</p>

        <div class="btn-group">
            <a href="{{ url('/') }}" class="btn btn-primary">
                <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                Halaman Utama
            </a>
            <a href="javascript:history.back()" class="btn btn-secondary">
                <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"></polyline></svg>
                Kembali
            </a>
        </div>
    </div>

</body>
</html>