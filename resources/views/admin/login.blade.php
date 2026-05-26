<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Admin — Allam Medica</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>

    /* ---- Reset & Base ---- */
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
        --navy:          #0c1a2e;
        --navy-mid:      #0e2340;
        --navy-light:    #1e3a5f;
        --blue:          #0ea5e9;
        --blue-dark:     #0284c7;
        --blue-light:    #e0f2fe;
        --cyan:          #06b6d4;
        --white:         #ffffff;
        --text-main:     #1e293b;
        --text-muted:    #64748b;
        --border:        rgba(14,165,233,.2);
        --error-bg:      #fff1f2;
        --error-border:  #fecdd3;
        --error-text:    #be123c;
        --input-bg:      #f8faff;
        --radius-card:   24px;
        --radius-input:  12px;
        --radius-btn:    12px;
        --shadow-card:   0 32px 80px rgba(12,26,46,.35), 0 8px 24px rgba(14,165,233,.12);
        --shadow-btn:    0 8px 24px rgba(14,165,233,.4);
        --transition:    .22s cubic-bezier(.4,0,.2,1);
    }

    html, body {
        height: 100%;
        font-family: 'Plus Jakarta Sans', sans-serif;
        -webkit-font-smoothing: antialiased;
    }

    /* ---- Background ---- */
    body {
        min-height: 100vh;
        background:
            radial-gradient(ellipse 80% 60% at 20% 0%, rgba(14,165,233,.18) 0%, transparent 60%),
            radial-gradient(ellipse 60% 50% at 80% 100%, rgba(6,182,212,.14) 0%, transparent 55%),
            linear-gradient(160deg, var(--navy) 0%, #0d2244 45%, #0a1e38 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 24px 16px;
        position: relative;
        overflow: hidden;
    }

    /* Decorative circles */
    body::before, body::after {
        content: '';
        position: fixed;
        border-radius: 50%;
        pointer-events: none;
    }

    body::before {
        width: 520px; height: 520px;
        top: -180px; left: -140px;
        background: radial-gradient(circle, rgba(14,165,233,.08) 0%, transparent 70%);
    }

    body::after {
        width: 400px; height: 400px;
        bottom: -160px; right: -100px;
        background: radial-gradient(circle, rgba(6,182,212,.1) 0%, transparent 70%);
    }

    /* ---- Floating particles (decorative dots) ---- */
    .particle {
        position: fixed;
        border-radius: 50%;
        background: rgba(14,165,233,.15);
        pointer-events: none;
        animation: float linear infinite;
    }

    @keyframes float {
        0%   { transform: translateY(110vh) scale(0); opacity: 0; }
        10%  { opacity: 1; }
        90%  { opacity: .4; }
        100% { transform: translateY(-10vh) scale(1); opacity: 0; }
    }

    /* ---- Page wrapper ---- */
    .login-wrapper {
        width: 100%;
        max-width: 960px;
        display: flex;
        align-items: stretch;
        border-radius: var(--radius-card);
        overflow: hidden;
        box-shadow: var(--shadow-card);
        animation: fadeSlideUp .55s cubic-bezier(.4,0,.2,1) both;
        position: relative;
        z-index: 1;
    }

    @keyframes fadeSlideUp {
        from { opacity: 0; transform: translateY(32px) scale(.98); }
        to   { opacity: 1; transform: translateY(0) scale(1); }
    }

    /* ---- Left panel (illustration) ---- */
    .login-panel-left {
        flex: 1;
        background: linear-gradient(145deg, #0e2a4a 0%, #0c2040 40%, #081830 100%);
        padding: 48px 40px 56px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        overflow: hidden;
        min-width: 0;
    }

    .login-panel-left::before {
        content: '';
        position: absolute;
        top: -80px; right: -80px;
        width: 280px; height: 280px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(14,165,233,.12), transparent 70%);
    }

    .login-panel-left::after {
        content: '';
        position: absolute;
        bottom: -60px; left: -40px;
        width: 200px; height: 200px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(6,182,212,.1), transparent 70%);
    }

    /* Brand */
    .login-brand {
        display: flex;
        align-items: center;
        gap: 14px;
        position: relative; z-index: 1;
    }

    .brand-icon {
        width: 46px; height: 46px;
        border-radius: 14px;
        background: linear-gradient(135deg, var(--blue), var(--cyan));
        display: flex; align-items: center; justify-content: center;
        font-size: 20px; color: #fff;
        flex-shrink: 0;
        box-shadow: 0 6px 20px rgba(14,165,233,.35);
    }

    .brand-text .brand-name {
        font-size: 18px; font-weight: 800;
        color: #fff; line-height: 1.1;
        letter-spacing: -.3px;
    }

    .brand-text .brand-sub {
        font-size: 11px; font-weight: 500;
        color: rgba(255,255,255,.45);
        text-transform: uppercase; letter-spacing: 1px;
        margin-top: 2px;
    }

    /* Illustration SVG area */
    .login-illustration {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 56px 0;
        position: relative; z-index: 1;
    }

    .illus-svg {
        width: 100%;
        max-width: 300px;
        animation: floatSvg 4s ease-in-out infinite;
    }

    @keyframes floatSvg {
        0%, 100% { transform: translateY(0); }
        50%       { transform: translateY(-10px); }
    }

    /* Tagline below illustration */
    .illus-tagline {
        position: relative; z-index: 1;
        text-align: center;
    }

    .illus-tagline p {
        font-size: 13px;
        font-weight: 500;
        color: rgba(255,255,255,.4);
        line-height: 1.6;
        letter-spacing: .2px;
    }

    .illus-tagline strong {
        color: rgba(255,255,255,.7);
        font-weight: 700;
    }

    /* ---- Right panel (form) ---- */
    .login-panel-right {
        width: 420px;
        flex-shrink: 0;
        background: #fff;
        padding: 52px 44px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    /* Heading */
    .login-heading {
        margin-bottom: 32px;
    }

    .login-heading .eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 11px;
        font-weight: 700;
        color: var(--blue);
        text-transform: uppercase;
        letter-spacing: 1.2px;
        margin-bottom: 10px;
    }

    .login-heading .eyebrow::before {
        content: '';
        width: 20px; height: 2px;
        background: var(--blue);
        border-radius: 2px;
    }

    .login-heading h1 {
        font-size: 26px;
        font-weight: 800;
        color: var(--text-main);
        letter-spacing: -.5px;
        line-height: 1.15;
        margin-bottom: 8px;
    }

    .login-heading p {
        font-size: 14px;
        color: var(--text-muted);
        font-weight: 400;
        line-height: 1.5;
    }

    /* Error alert */
    .login-error {
        background: var(--error-bg);
        border: 1.5px solid var(--error-border);
        border-radius: var(--radius-input);
        padding: 12px 16px;
        margin-bottom: 20px;
        display: flex;
        align-items: flex-start;
        gap: 10px;
        animation: shakeX .4s ease;
    }

    @keyframes shakeX {
        0%, 100% { transform: translateX(0); }
        20%       { transform: translateX(-6px); }
        40%       { transform: translateX(6px); }
        60%       { transform: translateX(-4px); }
        80%       { transform: translateX(4px); }
    }

    .login-error .err-icon {
        width: 20px; height: 20px;
        border-radius: 50%;
        background: var(--error-text);
        color: #fff;
        display: flex; align-items: center; justify-content: center;
        font-size: 10px;
        flex-shrink: 0;
        margin-top: 1px;
    }

    .login-error .err-msg {
        font-size: 13px;
        color: var(--error-text);
        font-weight: 500;
        line-height: 1.4;
    }

    /* Form */
    .login-form { display: flex; flex-direction: column; gap: 18px; }

    .form-group { display: flex; flex-direction: column; gap: 6px; }

    .form-label {
        font-size: 12.5px;
        font-weight: 700;
        color: var(--text-main);
        letter-spacing: .2px;
    }

    /* Input wrapper */
    .input-wrap {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-icon {
        position: absolute;
        left: 16px;
        color: var(--text-muted);
        font-size: 14px;
        pointer-events: none;
        transition: color var(--transition);
        z-index: 1;
    }

    .form-input {
        width: 100%;
        padding: 13px 46px 13px 44px;
        background: var(--input-bg);
        border: 1.5px solid #e2e8f0;
        border-radius: var(--radius-input);
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 14px;
        color: var(--text-main);
        transition: border-color var(--transition), box-shadow var(--transition), background var(--transition);
        outline: none;
        -webkit-appearance: none;
    }

    .form-input::placeholder { color: #b0bec5; font-weight: 400; }

    .form-input:focus {
        border-color: var(--blue);
        background: #fff;
        box-shadow: 0 0 0 4px rgba(14,165,233,.12);
    }

    .form-input:focus ~ .input-icon,
    .input-wrap:focus-within .input-icon {
        color: var(--blue);
    }

    /* Toggle password visibility */
    .input-toggle {
        position: absolute;
        right: 14px;
        background: none;
        border: none;
        color: var(--text-muted);
        font-size: 14px;
        cursor: pointer;
        padding: 4px;
        border-radius: 6px;
        transition: color var(--transition), background var(--transition);
        line-height: 1;
    }

    .input-toggle:hover { color: var(--blue); background: var(--blue-light); }

    /* Validation error per field */
    .field-error {
        font-size: 12px;
        color: var(--error-text);
        font-weight: 500;
        display: flex; align-items: center; gap: 4px;
    }

    /* Row: remember me + forgot */
    .form-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: -4px;
    }

    /* Custom checkbox */
    .custom-check {
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        user-select: none;
    }

    .custom-check input[type="checkbox"] {
        width: 17px; height: 17px;
        accent-color: var(--blue);
        cursor: pointer;
        border-radius: 4px;
        flex-shrink: 0;
    }

    .custom-check span {
        font-size: 13px;
        color: var(--text-muted);
        font-weight: 500;
    }

    .forgot-link {
        font-size: 13px;
        font-weight: 600;
        color: var(--blue);
        text-decoration: none;
        transition: color var(--transition);
    }

    .forgot-link:hover { color: var(--blue-dark); text-decoration: underline; }

    /* Submit button */
    .btn-login {
        width: 100%;
        padding: 14px;
        background: linear-gradient(130deg, var(--blue) 0%, var(--cyan) 100%);
        color: #fff;
        border: none;
        border-radius: var(--radius-btn);
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 15px;
        font-weight: 700;
        letter-spacing: .3px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow-btn);
        transition: box-shadow var(--transition), transform var(--transition), background var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-top: 4px;
    }

    .btn-login::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(130deg, rgba(255,255,255,.15) 0%, transparent 60%);
        opacity: 0;
        transition: opacity var(--transition);
    }

    .btn-login:hover {
        transform: translateY(-3px);
        box-shadow: 0 14px 36px rgba(14,165,233,.5);
    }

    .btn-login:hover::before { opacity: 1; }

    .btn-login:active {
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(14,165,233,.35);
    }

    /* Loading state */
    .btn-login.loading .btn-text  { opacity: 0; }
    .btn-login.loading .btn-spinner { display: block; }
    .btn-spinner {
        display: none;
        position: absolute;
        width: 20px; height: 20px;
        border: 2.5px solid rgba(255,255,255,.35);
        border-top-color: #fff;
        border-radius: 50%;
        animation: spin .65s linear infinite;
    }

    @keyframes spin { to { transform: rotate(360deg); } }

    /* Divider */
    .login-divider {
        display: flex;
        align-items: center;
        gap: 12px;
        color: var(--text-muted);
        font-size: 12px;
        font-weight: 500;
        margin: 4px 0;
    }

    .login-divider::before,
    .login-divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #e2e8f0;
    }

    /* Footer */
    .login-footer {
        margin-top: 28px;
        text-align: center;
        font-size: 12px;
        color: var(--text-muted);
        line-height: 1.6;
    }

    .login-footer a {
        color: var(--blue);
        font-weight: 600;
        text-decoration: none;
    }

    .login-footer a:hover { text-decoration: underline; }

    /* Security badge */
    .security-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 11px;
        color: var(--text-muted);
        background: #f1f5f9;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        padding: 4px 12px;
        margin-top: 10px;
    }

    .security-badge i { color: #10b981; font-size: 10px; }

    /* ---- Responsive ---- */
    @media (max-width: 767.98px) {
        .login-panel-left { display: none; }

        .login-wrapper {
            max-width: 440px;
            border-radius: 20px;
        }

        .login-panel-right {
            width: 100%;
            padding: 40px 28px;
        }
    }

    @media (max-width: 479.98px) {
        body { padding: 16px 12px; }

        .login-panel-right { padding: 36px 22px; }

        .login-heading h1 { font-size: 22px; }

        .btn-login { font-size: 14px; padding: 13px; }
    }
    </style>
</head>
<body>

    {{-- Floating particles (decorative) --}}
    <div class="particle" style="width:6px;height:6px;left:12%;animation-duration:14s;animation-delay:0s;"></div>
    <div class="particle" style="width:4px;height:4px;left:28%;animation-duration:18s;animation-delay:3s;"></div>
    <div class="particle" style="width:8px;height:8px;left:55%;animation-duration:12s;animation-delay:1.5s;"></div>
    <div class="particle" style="width:5px;height:5px;left:72%;animation-duration:16s;animation-delay:5s;"></div>
    <div class="particle" style="width:3px;height:3px;left:88%;animation-duration:20s;animation-delay:2s;"></div>

    <div class="login-wrapper">

        {{-- ============================================================
             LEFT PANEL — Illustration & Brand
        ============================================================ --}}
        <div class="login-panel-left">

            {{-- Brand --}}
            <div class="login-brand">
                <div class="brand-icon">
                    <i class="fa-solid fa-hospital-user"></i>
                </div>
                <div class="brand-text">
                    <div class="brand-name">Allam Medica</div>
                    <div class="brand-sub">Admin System</div>
                </div>
            </div>

            {{-- SVG Illustration --}}
            <div class="login-illustration">
                <svg class="illus-svg" viewBox="0 0 320 300" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <!-- Background circle -->
                    <circle cx="160" cy="150" r="130" fill="rgba(14,165,233,0.06)" />
                    <circle cx="160" cy="150" r="100" fill="rgba(14,165,233,0.06)" />

                    <!-- Hospital building -->
                    <rect x="80" y="110" width="160" height="130" rx="8" fill="rgba(255,255,255,0.08)" stroke="rgba(14,165,233,0.4)" stroke-width="1.5"/>

                    <!-- Roof / top bar -->
                    <rect x="70" y="98" width="180" height="20" rx="6" fill="rgba(14,165,233,0.5)"/>

                    <!-- Cross symbol -->
                    <rect x="148" y="60" width="24" height="48" rx="4" fill="rgba(14,165,233,0.7)"/>
                    <rect x="132" y="76" width="56" height="24" rx="4" fill="rgba(14,165,233,0.7)"/>

                    <!-- Windows -->
                    <rect x="98"  y="128" width="28" height="28" rx="4" fill="rgba(14,165,233,0.3)" stroke="rgba(14,165,233,0.5)" stroke-width="1"/>
                    <rect x="146" y="128" width="28" height="28" rx="4" fill="rgba(14,165,233,0.3)" stroke="rgba(14,165,233,0.5)" stroke-width="1"/>
                    <rect x="194" y="128" width="28" height="28" rx="4" fill="rgba(14,165,233,0.3)" stroke="rgba(14,165,233,0.5)" stroke-width="1"/>

                    <rect x="98"  y="170" width="28" height="28" rx="4" fill="rgba(6,182,212,0.25)" stroke="rgba(6,182,212,0.4)" stroke-width="1"/>
                    <rect x="194" y="170" width="28" height="28" rx="4" fill="rgba(6,182,212,0.25)" stroke="rgba(6,182,212,0.4)" stroke-width="1"/>

                    <!-- Door -->
                    <rect x="140" y="188" width="40" height="52" rx="6" fill="rgba(14,165,233,0.45)" stroke="rgba(14,165,233,0.7)" stroke-width="1.5"/>
                    <circle cx="172" cy="215" r="3" fill="rgba(255,255,255,0.6)"/>

                    <!-- Ground line -->
                    <line x1="50" y1="240" x2="270" y2="240" stroke="rgba(14,165,233,0.2)" stroke-width="1.5" stroke-dasharray="6 4"/>

                    <!-- Decorative dots -->
                    <circle cx="50"  cy="120" r="5" fill="rgba(14,165,233,0.25)"/>
                    <circle cx="270" cy="180" r="4" fill="rgba(6,182,212,0.25)"/>
                    <circle cx="40"  cy="200" r="3" fill="rgba(14,165,233,0.2)"/>
                    <circle cx="280" cy="100" r="6" fill="rgba(6,182,212,0.2)"/>

                    <!-- Pulse rings -->
                    <circle cx="160" cy="150" r="140" stroke="rgba(14,165,233,0.07)" stroke-width="1" stroke-dasharray="8 6"/>
                </svg>
            </div>

            {{-- Tagline (pengganti stats) --}}
            <div class="illus-tagline">
                <p>Sistem manajemen website<br><strong>Allam Medica</strong> — andal & aman.</p>
            </div>

        </div>

        {{-- ============================================================
             RIGHT PANEL — Login Form
        ============================================================ --}}
        <div class="login-panel-right">

            {{-- Heading --}}
            <div class="login-heading">
                <div class="eyebrow">Admin Panel</div>
                <h1>Login Admin</h1>
                <p>Silakan masuk untuk melanjutkan pengelolaan sistem website.</p>
            </div>

            {{-- Error message (session) --}}
            @if(session('error'))
                <div class="login-error" role="alert">
                    <div class="err-icon">
                        <i class="fa-solid fa-exclamation"></i>
                    </div>
                    <div class="err-msg">{{ session('error') }}</div>
                </div>
            @endif

            {{-- Validation errors (Laravel default) --}}
            @if($errors->any())
                <div class="login-error" role="alert">
                    <div class="err-icon">
                        <i class="fa-solid fa-exclamation"></i>
                    </div>
                    <div class="err-msg">{{ $errors->first() }}</div>
                </div>
            @endif

            {{-- Form --}}
            <form
                class="login-form"
                method="POST"
                action="{{ route('login.post') }}"
                id="loginForm"
                novalidate
            >
                @csrf

                {{-- Email --}}
                <div class="form-group">
                    <label class="form-label" for="email">Alamat Email</label>
                    <div class="input-wrap">
                        <span class="input-icon">
                            <i class="fa-regular fa-envelope"></i>
                        </span>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-input"
                            placeholder="admin@allammedica.com"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            required
                            autofocus
                        >
                    </div>
                    @error('email')
                        <span class="field-error">
                            <i class="fa-solid fa-circle-exclamation" style="font-size:11px;"></i>
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="form-group">
                    <label class="form-label" for="password">Kata Sandi</label>
                    <div class="input-wrap">
                        <span class="input-icon">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-input"
                            placeholder="Masukkan kata sandi"
                            autocomplete="current-password"
                            required
                        >
                        <button
                            type="button"
                            class="input-toggle"
                            id="togglePassword"
                            title="Tampilkan / Sembunyikan"
                            tabindex="-1"
                            aria-label="Toggle password visibility"
                        >
                            <i class="fa-regular fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                    @error('password')
                        <span class="field-error">
                            <i class="fa-solid fa-circle-exclamation" style="font-size:11px;"></i>
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                {{-- Remember me + Forgot password --}}
                <div class="form-row">
                    <label class="custom-check">
                        <input
                            type="checkbox"
                            name="remember"
                            id="remember"
                            {{ old('remember') ? 'checked' : '' }}
                        >
                        <span>Ingat saya</span>
                    </label>
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn-login" id="btnLogin">
                    <span class="btn-spinner" aria-hidden="true"></span>
                    <span class="btn-text">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Masuk ke Sistem
                    </span>
                </button>

            </form>

            {{-- Footer --}}
            <div class="login-footer">
                <div>
                    <span class="security-badge">
                        <i class="fa-solid fa-shield-halved"></i>
                        Koneksi aman & terenkripsi
                    </span>
                </div>
            </div>

        </div>
        {{-- end right panel --}}

    </div>
    {{-- end login-wrapper --}}

    <script>
        /* ---- Toggle password visibility ---- */
        const toggleBtn  = document.getElementById('togglePassword');
        const pwdInput   = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');

        toggleBtn.addEventListener('click', function () {
            const isHidden = pwdInput.type === 'password';
            pwdInput.type  = isHidden ? 'text' : 'password';
            toggleIcon.className = isHidden
                ? 'fa-regular fa-eye-slash'
                : 'fa-regular fa-eye';
        });

        /* ---- Loading state on submit ---- */
        const loginForm = document.getElementById('loginForm');
        const btnLogin  = document.getElementById('btnLogin');

        loginForm.addEventListener('submit', function (e) {
            const email = document.getElementById('email').value.trim();
            const pwd   = pwdInput.value;

            // Basic client-side validation
            if (!email || !pwd) {
                e.preventDefault();
                if (!email) document.getElementById('email').focus();
                else pwdInput.focus();
                return;
            }

            // Show loading spinner
            btnLogin.classList.add('loading');
            btnLogin.disabled = true;
        });

        /* ---- Remove loading if page stays (e.g. validation error) ---- */
        window.addEventListener('pageshow', function () {
            btnLogin.classList.remove('loading');
            btnLogin.disabled = false;
        });
    </script>

</body>
</html>