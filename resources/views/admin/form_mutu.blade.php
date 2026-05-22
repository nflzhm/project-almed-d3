<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ isset($mutu) ? 'Edit' : 'Tambah' }} Data Mutu | Admin RSU Allam Medica</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background:#f5f7fb; font-family:'Segoe UI',sans-serif; }

        .admin-topbar { background:linear-gradient(90deg,#1C145C,#2d2090); color:#fff; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; }
        .admin-topbar .brand { font-size:15px; font-weight:700; display:flex; align-items:center; gap:10px; }
        .admin-topbar .brand i { font-size:20px; opacity:.8; }
        .admin-topbar .right a { color:rgba(255,255,255,.75); text-decoration:none; font-size:13px; }
        .admin-topbar .right a:hover { color:#fff; }

        .admin-breadcrumb { background:#fff; border-bottom:1px solid #e2e8f0; padding:10px 24px; font-size:12.5px; color:#94a3b8; }
        .admin-breadcrumb a { color:#1C145C; text-decoration:none; }
        .admin-breadcrumb span { margin:0 6px; }

        .admin-main { max-width:900px; margin:0 auto; padding:2rem 1.5rem; }

        .form-card { background:#fff; border:1px solid #e2e8f0; border-radius:16px; overflow:hidden; box-shadow:0 2px 8px rgba(28,20,92,.04); margin-bottom:1.5rem; }

        .form-card-header { background:#f8f7ff; border-bottom:1px solid #e2e8f0; padding:1rem 1.4rem; display:flex; align-items:center; gap:10px; }
        .form-card-header .hnum { width:28px;height:28px; background:#1C145C; color:#fff; border-radius:7px; display:flex; align-items:center; justify-content:center; font-size:13px; font-weight:700; flex-shrink:0; }
        .form-card-header h2 { font-size:.95rem; font-weight:700; color:#1C145C; margin:0; }
        .form-card-header p  { font-size:12px; color:#64748b; margin:0; }

        .form-card-body { padding:1.4rem; }

        .form-label-custom { font-size:13px; font-weight:600; color:#334155; margin-bottom:5px; }
        .form-control, .form-select { font-size:13.5px; border:1px solid #d1d5db; border-radius:10px; padding:9px 12px; color:#1e293b; background:#fafafe; transition:border-color .2s,box-shadow .2s; }
        .form-control:focus, .form-select:focus { border-color:#1C145C; box-shadow:0 0 0 3px rgba(28,20,92,.08); background:#fff; outline:none; }

        .num-den-row { display:grid; grid-template-columns:1fr 1fr 1fr; gap:10px; align-items:end; }
        @media(max-width:600px) { .num-den-row { grid-template-columns:1fr 1fr; } }

        .capaian-display { background:#eeedf8; border:1px solid #c4bfee; border-radius:10px; padding:9px 14px; font-size:1.1rem; font-weight:700; color:#1C145C; text-align:center; min-height:42px; display:flex; align-items:center; justify-content:center; }

        .target-tag { display:inline-block; font-size:11px; padding:2px 9px; border-radius:12px; background:#eeedf8; color:#2d2090; font-weight:600; margin-left:8px; }

        textarea.form-control { resize:vertical; min-height:70px; }

        .btn-save { background:#1C145C; color:#fff; border:none; border-radius:10px; padding:11px 28px; font-size:14px; font-weight:700; cursor:pointer; display:inline-flex; align-items:center; gap:8px; transition:.2s; }
        .btn-save:hover { background:#2d2090; transform:translateY(-1px); }
        .btn-cancel { background:#f1f0fa; color:#1C145C; border:none; border-radius:10px; padding:11px 22px; font-size:14px; font-weight:600; text-decoration:none; display:inline-flex; align-items:center; gap:8px; transition:.2s; }
        .btn-cancel:hover { background:#e0ddf5; }

        .error-msg { font-size:12px; color:#dc2626; margin-top:4px; }

        .periode-card { background:#fff; border:1px solid #e2e8f0; border-radius:16px; padding:1.25rem 1.4rem; margin-bottom:1.5rem; display:flex; align-items:center; gap:16px; flex-wrap:wrap; box-shadow:0 2px 8px rgba(28,20,92,.04); }
        .periode-card label { font-size:13px; font-weight:600; color:#1C145C; }
        .periode-card select { font-size:13.5px; border:1px solid #d1d5db; border-radius:10px; padding:8px 14px; color:#1e293b; }
    </style>
</head>
<body>

@php
// ── Bulan ──────────────────────────────────────────────────────────────────
$bulanList = $bulanList ?? [
    1  => 'Januari',
    2  => 'Februari',
    3  => 'Maret',
    4  => 'April',
    5  => 'Mei',
    6  => 'Juni',
    7  => 'Juli',
    8  => 'Agustus',
    9  => 'September',
    10 => 'Oktober',
    11 => 'November',
    12 => 'Desember',
];

// ── Tahun — FIX: selalu generate default, merge dengan data dari controller ─
$_tahunDB  = (isset($tahunList) && is_array($tahunList) && count($tahunList) > 0)
             ? array_map('intval', $tahunList)
             : [];
$_tahunDef = array_reverse(range(2020, (int) date('Y')));  // [2026,2025,...,2020]
$tahunList = array_values(array_unique(array_merge($_tahunDB, $_tahunDef)));
rsort($tahunList); // pastikan urutan descending
@endphp

<div class="admin-topbar">
    <div class="brand"><i class="bi bi-hospital"></i>RSU Allam Medica — Panel Admin</div>
    <div class="right">
        <a href="{{ route('admin.form_mutu.index') }}" target="_blank"><i class="bi bi-eye"></i> Lihat Publik</a>
    </div>
</div>

<div class="admin-breadcrumb">
    <a href="{{ route('admin.form_mutu.index') }}">Indikator Mutu</a>
    <span>›</span>
    <strong style="color:#1C145C;">{{ isset($mutu) ? 'Edit '.$mutu->periode : 'Tambah Data Bulan Baru' }}</strong>
</div>

<div class="admin-main">

    @if($errors->any())
    <div style="background:#fee2e2;border:1px solid #fecaca;border-radius:10px;padding:12px 16px;margin-bottom:1.25rem;font-size:13.5px;color:#991b1b;">
        <i class="bi bi-exclamation-circle-fill me-2"></i>
        @foreach($errors->all() as $err) {{ $err }}<br> @endforeach
    </div>
    @endif

    <form method="POST"
          action="{{ isset($mutu) ? route('admin.form_mutu.update', $mutu) : route('admin.form_mutu.store') }}">
        @csrf
        @if(isset($mutu)) @method('PUT') @endif

        {{-- PERIODE --}}
        <div class="periode-card">
            <i class="bi bi-calendar3" style="font-size:20px;color:#1C145C;"></i>
            <div>
                <div style="font-size:11px;color:#94a3b8;text-transform:uppercase;letter-spacing:.05em;margin-bottom:6px;">Periode Data</div>
                <div style="display:flex;gap:10px;align-items:center;flex-wrap:wrap;">

                    {{-- BULAN --}}
                    <div>
                        <label class="form-label-custom">Bulan</label><br>
                        <select name="bulan" class="form-select" style="width:160px;" required>
                            @foreach($bulanList as $num => $nama)
                            <option value="{{ $num }}"
                                {{ (int) old('bulan', $mutu->bulan ?? '') === (int) $num ? 'selected' : '' }}>
                                {{ $nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- TAHUN — FIX: cast ke int dua sisi agar selected tidak meleset --}}
                    <div>
                        <label class="form-label-custom">Tahun</label><br>
                        <select name="tahun" class="form-select" style="width:110px;" required>
                            @foreach($tahunList as $th)
                            <option value="{{ $th }}"
                                {{ (int) old('tahun', $mutu->tahun ?? date('Y')) === (int) $th ? 'selected' : '' }}>
                                {{ $th }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
            @if($errors->has('bulan'))
            <div class="error-msg w-100">{{ $errors->first('bulan') }}</div>
            @endif
            @if($errors->has('tahun'))
            <div class="error-msg w-100">{{ $errors->first('tahun') }}</div>
            @endif
        </div>

        {{-- INDIKATOR SATU PER SATU --}}
        @php
            $no = 0;
            $indicators = [
                ['kbt', 'Kepatuhan Kebersihan Tangan',           'Target ≥ 85%',    true],
                ['apd', 'Kepatuhan Penggunaan APD',              'Target 100%',     true],
                ['idp', 'Kepatuhan Identifikasi Pasien',         'Target 100%',     true],
                ['sc',  'Waktu Tanggap SC Emergensi',            'Target > 80%',    true],
                ['wtj', 'Waktu Tunggu Rawat Jalan',              'Target ≥ 80%',    true],
                ['poe', 'Penundaan Operasi Elektif',             'Target < 5%',     true],
                ['kvd', 'Kepatuhan Waktu Visite Dokter',         'Target ≥ 80%',    true],
                ['pkl', 'Pelaporan Hasil Kritis Laboratorium',   'Target 100%',     true],
                ['kfn', 'Kepatuhan Formularium Nasional',        'Target ≥ 80%',    true],
                ['kcp', 'Kepatuhan Clinical Pathway',            'Target ≥ 80%',    true],
                ['prj', 'Pencegahan Risiko Pasien Jatuh',        'Target 100%',     true],
                ['ktk', 'Kecepatan Tanggap Komplain',            'Target ≥ 80%',    true],
                ['kep', 'Kepuasan Pasien',                       'Target > 76.61%', false],
            ];
        @endphp

        @foreach($indicators as [$key, $label, $target, $hasNum])
        @php $no++; @endphp
        <div class="form-card">
            <div class="form-card-header">
                <div class="hnum">{{ $no }}</div>
                <div>
                    <h2>{{ $label }} <span class="target-tag">{{ $target }}</span></h2>
                </div>
            </div>
            <div class="form-card-body">

                @if($hasNum)
                <div class="num-den-row mb-3">
                    <div>
                        <label class="form-label-custom">Numerator</label>
                        <input type="number" name="{{ $key }}_numerator"
                               class="form-control"
                               placeholder="Contoh: 360"
                               value="{{ old($key.'_numerator', $mutu->{$key.'_numerator'} ?? '') }}"
                               oninput="hitungCapaian('{{ $key }}')">
                    </div>
                    <div>
                        <label class="form-label-custom">Denominator</label>
                        <input type="number" name="{{ $key }}_denominator"
                               class="form-control"
                               placeholder="Contoh: 423"
                               value="{{ old($key.'_denominator', $mutu->{$key.'_denominator'} ?? '') }}"
                               oninput="hitungCapaian('{{ $key }}')">
                    </div>
                    <div>
                        <label class="form-label-custom">Capaian (%)</label>
                        <div class="capaian-display" id="{{ $key }}_preview">
                            @php $cap = old($key.'_capaian', $mutu->{$key.'_capaian'} ?? null); @endphp
                            {{ $cap !== null && $cap !== '' ? number_format((float)$cap, 2).'%' : '—' }}
                        </div>
                        <input type="hidden" name="{{ $key }}_capaian" id="{{ $key }}_capaian"
                               value="{{ old($key.'_capaian', $mutu->{$key.'_capaian'} ?? '') }}">
                    </div>
                </div>
                @else
                {{-- Kepuasan pasien: langsung input capaian --}}
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label-custom">Capaian (%)</label>
                        <input type="number" step="0.01" name="{{ $key }}_capaian"
                               class="form-control"
                               placeholder="Contoh: 92.5"
                               value="{{ old($key.'_capaian', $mutu->{$key.'_capaian'} ?? '') }}">
                    </div>
                </div>
                @endif

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label-custom">Analisa</label>
                        <textarea name="{{ $key }}_analisa" class="form-control"
                                  placeholder="Tuliskan analisa capaian indikator ini...">{{ old($key.'_analisa', $mutu->{$key.'_analisa'} ?? '') }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label-custom">Rencana Tindak Lanjut (RTL)</label>
                        <textarea name="{{ $key }}_rtl" class="form-control"
                                  placeholder="Tuliskan rencana tindak lanjut...">{{ old($key.'_rtl', $mutu->{$key.'_rtl'} ?? '') }}</textarea>
                    </div>
                </div>

            </div>
        </div>
        @endforeach

        {{-- TOMBOL --}}
        <div style="display:flex;gap:12px;align-items:center;padding-bottom:3rem;">
            <button type="submit" class="btn-save">
                <i class="bi bi-floppy"></i>
                {{ isset($mutu) ? 'Simpan Perubahan' : 'Simpan Data Bulan Ini' }}
            </button>
            <a href="{{ route('admin.form_mutu.index') }}" class="btn-cancel">
                <i class="bi bi-arrow-left"></i> Batal
            </a>
        </div>

    </form>
</div>

<script>
/* Auto-hitung capaian dari numerator / denominator */
function hitungCapaian(key) {
    const num     = parseFloat(document.querySelector(`[name="${key}_numerator"]`)?.value);
    const den     = parseFloat(document.querySelector(`[name="${key}_denominator"]`)?.value);
    const preview = document.getElementById(`${key}_preview`);
    const hidden  = document.getElementById(`${key}_capaian`);

    if (!isNaN(num) && !isNaN(den) && den > 0) {
        const cap = ((num / den) * 100).toFixed(2);
        preview.textContent = cap + '%';
        if (hidden) hidden.value = cap;
    } else {
        preview.textContent = '—';
        if (hidden) hidden.value = '';
    }
}

/* Init: hitung semua yang sudah ada value saat edit */
document.addEventListener('DOMContentLoaded', () => {
    @php
        $keys = ['kbt','apd','idp','sc','wtj','poe','kvd','pkl','kfn','kcp','prj','ktk'];
    @endphp
    @foreach($keys as $k)
    hitungCapaian('{{ $k }}');
    @endforeach
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>