@extends('admin.layout')

@section('title', (isset($mutu) ? 'Edit' : 'Tambah') . ' Data Mutu')
@section('page-title', isset($mutu) ? 'Edit Data Mutu' : 'Tambah Data Mutu')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.form_mutu.index') }}">Indikator Mutu</a>
    </li>
    <li class="breadcrumb-item active">
        {{ isset($mutu) ? 'Edit '.$mutu->periode : 'Tambah Data Bulan Baru' }}
    </li>
@endsection

@push('styles')
<style>
/* ============================================================
   FORM MUTU — Page Styles
============================================================ */

/* ---- Page header ---- */
.page-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    margin-bottom: 24px;
    gap: 16px;
    flex-wrap: wrap;
}
.page-header-left .ph-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 20px; font-weight: 800;
    color: var(--text-main); letter-spacing: -.3px;
}
.page-header-left .ph-sub {
    font-size: 13px; color: var(--text-muted); margin-top: 3px;
}

/* ---- Validation errors ---- */
.alert-validation {
    background: #fee2e2;
    border: 1.5px solid #fecaca;
    border-radius: var(--radius-sm);
    padding: 12px 16px;
    margin-bottom: 20px;
    font-size: 13px;
    color: #991b1b;
    display: flex;
    align-items: flex-start;
    gap: 10px;
    line-height: 1.6;
}
.alert-validation i { margin-top: 2px; flex-shrink: 0; }

/* ---- Periode card ---- */
.periode-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: var(--radius);
    padding: 20px 24px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 18px;
    flex-wrap: wrap;
    box-shadow: var(--shadow-sm);
}
.periode-icon {
    width: 44px; height: 44px;
    border-radius: var(--radius-sm);
    background: var(--primary-light);
    display: flex; align-items: center; justify-content: center;
    color: var(--primary); font-size: 18px; flex-shrink: 0;
}
.periode-fields { display: flex; gap: 14px; align-items: flex-end; flex-wrap: wrap; }
.periode-field label {
    font-size: 12px; font-weight: 700; color: var(--text-muted);
    text-transform: uppercase; letter-spacing: .6px;
    display: block; margin-bottom: 5px;
}
.periode-select {
    padding: 9px 32px 9px 13px;
    border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm);
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13.5px; color: var(--text-main);
    background: var(--body-bg);
    outline: none; cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%2364748b' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 11px center;
    transition: border-color var(--transition), box-shadow var(--transition);
}
.periode-select:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(14,165,233,.12);
    background-color: #fff;
}
.error-msg { font-size: 11.5px; color: #dc2626; margin-top: 5px; }

/* ---- Indicator card ---- */
.indicator-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    margin-bottom: 16px;
    transition: box-shadow var(--transition);
}
.indicator-card:hover { box-shadow: var(--shadow-md); }

.indicator-card-header {
    background: #f8faff;
    border-bottom: 1px solid var(--border-color);
    padding: 14px 20px;
    display: flex;
    align-items: center;
    gap: 12px;
}
.ind-num {
    width: 30px; height: 30px;
    border-radius: 8px;
    background: var(--primary);
    color: #fff;
    display: flex; align-items: center; justify-content: center;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px; font-weight: 800;
    flex-shrink: 0;
}
.ind-label {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 14px; font-weight: 700;
    color: var(--text-main); flex: 1;
}
.ind-target-badge {
    font-size: 11px; font-weight: 700;
    padding: 3px 10px; border-radius: 20px;
    background: var(--primary-light);
    color: var(--primary-dark);
    white-space: nowrap;
}

.indicator-card-body { padding: 20px 24px; }

/* ---- Numerator / Denominator row ---- */
.num-den-row {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 14px;
    align-items: end;
    margin-bottom: 18px;
}
@media (max-width: 640px) {
    .num-den-row { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 420px) {
    .num-den-row { grid-template-columns: 1fr; }
}

/* ---- Capaian display ---- */
.capaian-display {
    min-height: 42px;
    background: var(--primary-light);
    border: 1.5px solid #bae6fd;
    border-radius: var(--radius-sm);
    display: flex; align-items: center; justify-content: center;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 1.05rem; font-weight: 800;
    color: var(--primary-dark);
    letter-spacing: -.2px;
}

/* ---- Form controls ---- */
.am-label {
    font-size: 12px; font-weight: 700;
    color: var(--text-muted);
    text-transform: uppercase; letter-spacing: .6px;
    display: block; margin-bottom: 5px;
}
.am-input, .am-textarea {
    width: 100%;
    padding: 9px 13px;
    border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm);
    font-family: 'DM Sans', sans-serif;
    font-size: 13.5px; color: var(--text-main);
    background: var(--body-bg);
    outline: none;
    transition: border-color var(--transition), box-shadow var(--transition), background var(--transition);
}
.am-input:focus, .am-textarea:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(14,165,233,.12);
    background: #fff;
}
.am-textarea { resize: vertical; min-height: 78px; line-height: 1.6; }

/* ---- Analisa / RTL grid ---- */
.analisa-rtl-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
}
@media (max-width: 640px) {
    .analisa-rtl-row { grid-template-columns: 1fr; }
}

/* ---- Action bar ---- */
.form-action-bar {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: var(--radius);
    padding: 18px 24px;
    display: flex;
    align-items: center;
    gap: 12px;
    margin-top: 8px;
    box-shadow: var(--shadow-sm);
    flex-wrap: wrap;
}
.btn-save-am {
    background: var(--primary);
    color: #fff; border: none;
    border-radius: var(--radius-sm);
    padding: 10px 24px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13.5px; font-weight: 700;
    cursor: pointer;
    display: inline-flex; align-items: center; gap: 8px;
    transition: background var(--transition), box-shadow var(--transition), transform var(--transition);
    box-shadow: 0 4px 14px rgba(14,165,233,.25);
}
.btn-save-am:hover {
    background: var(--primary-dark);
    transform: translateY(-1px);
    box-shadow: 0 8px 22px rgba(14,165,233,.35);
}
.btn-cancel-am {
    background: transparent;
    color: var(--text-muted);
    border: 1.5px solid var(--border-color);
    border-radius: var(--radius-sm);
    padding: 10px 20px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13.5px; font-weight: 600;
    cursor: pointer;
    display: inline-flex; align-items: center; gap: 8px;
    text-decoration: none;
    transition: background var(--transition), color var(--transition), border-color var(--transition);
}
.btn-cancel-am:hover {
    background: var(--body-bg);
    color: var(--text-main);
    border-color: var(--text-muted);
}
</style>
@endpush

@section('content')

@php
/* ── Bulan ─────────────────────────────────────────────────────── */
$bulanList = $bulanList ?? [
    1  => 'Januari',   2  => 'Februari', 3  => 'Maret',
    4  => 'April',     5  => 'Mei',      6  => 'Juni',
    7  => 'Juli',      8  => 'Agustus',  9  => 'September',
    10 => 'Oktober',   11 => 'November', 12 => 'Desember',
];

/* ── Tahun ─────────────────────────────────────────────────────── */
$_tahunDB  = (isset($tahunList) && is_array($tahunList) && count($tahunList) > 0)
             ? array_map('intval', $tahunList) : [];
$_tahunDef = array_reverse(range(2020, (int) date('Y')));
$tahunList = array_values(array_unique(array_merge($_tahunDB, $_tahunDef)));
rsort($tahunList);

/* ── Indikator list ────────────────────────────────────────────── */
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

{{-- ================================================================
     PAGE HEADER
================================================================ --}}
<div class="page-header">
    <div class="page-header-left">
        <div class="ph-title">
            {{ isset($mutu) ? 'Edit Data Mutu — '.$mutu->periode : 'Tambah Data Mutu Bulan Baru' }}
        </div>
        <div class="ph-sub">
            {{ isset($mutu)
                ? 'Perbarui data indikator mutu untuk periode yang dipilih'
                : 'Isi data numerator, denominator, analisa, dan RTL untuk setiap indikator' }}
        </div>
    </div>
    <a href="{{ route('admin.form_mutu.index') }}" class="btn-cancel-am">
        <i class="fa-solid fa-arrow-left"></i>
        Kembali ke Daftar
    </a>
</div>

{{-- ================================================================
     VALIDATION ERRORS
================================================================ --}}
@if($errors->any())
<div class="alert-validation">
    <i class="fa-solid fa-circle-exclamation"></i>
    <div>
        <strong>Terdapat kesalahan pada form:</strong><br>
        @foreach($errors->all() as $err)
            • {{ $err }}<br>
        @endforeach
    </div>
</div>
@endif

{{-- ================================================================
     FORM
================================================================ --}}
<form method="POST"
      action="{{ isset($mutu) ? route('admin.form_mutu.update', $mutu) : route('admin.form_mutu.store') }}">
    @csrf
    @if(isset($mutu)) @method('PUT') @endif

    {{-- ── PERIODE ────────────────────────────────────────────── --}}
    <div class="periode-card">
        <div class="periode-icon">
            <i class="fa-regular fa-calendar"></i>
        </div>
        <div>
            <div style="font-size:11px;color:var(--text-muted);text-transform:uppercase;letter-spacing:.7px;font-weight:700;margin-bottom:10px;">
                Periode Data
            </div>
            <div class="periode-fields">
                {{-- Bulan --}}
                <div class="periode-field">
                    <label>Bulan</label>
                    <select name="bulan" class="periode-select" required>
                        @foreach($bulanList as $num => $nama)
                            <option value="{{ $num }}"
                                {{ (int) old('bulan', $mutu->bulan ?? '') === (int) $num ? 'selected' : '' }}>
                                {{ $nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Tahun --}}
                <div class="periode-field">
                    <label>Tahun</label>
                    <select name="tahun" class="periode-select" required>
                        @foreach($tahunList as $th)
                            <option value="{{ $th }}"
                                {{ (int) old('tahun', $mutu->tahun ?? date('Y')) === (int) $th ? 'selected' : '' }}>
                                {{ $th }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            @if($errors->has('bulan'))
                <div class="error-msg">{{ $errors->first('bulan') }}</div>
            @endif
            @if($errors->has('tahun'))
                <div class="error-msg">{{ $errors->first('tahun') }}</div>
            @endif
        </div>
    </div>

    {{-- ── INDIKATOR CARDS ────────────────────────────────────── --}}
    @foreach($indicators as $no => [$key, $label, $target, $hasNum])
    <div class="indicator-card">

        {{-- Header --}}
        <div class="indicator-card-header">
            <div class="ind-num">{{ $no + 1 }}</div>
            <div class="ind-label">{{ $label }}</div>
            <span class="ind-target-badge">{{ $target }}</span>
        </div>

        {{-- Body --}}
        <div class="indicator-card-body">

            @if($hasNum)
            {{-- Numerator / Denominator / Capaian --}}
            <div class="num-den-row">
                <div>
                    <label class="am-label">Numerator</label>
                    <input type="number" name="{{ $key }}_numerator"
                           class="am-input"
                           placeholder="Contoh: 360"
                           value="{{ old($key.'_numerator', $mutu->{$key.'_numerator'} ?? '') }}"
                           oninput="hitungCapaian('{{ $key }}')">
                </div>
                <div>
                    <label class="am-label">Denominator</label>
                    <input type="number" name="{{ $key }}_denominator"
                           class="am-input"
                           placeholder="Contoh: 423"
                           value="{{ old($key.'_denominator', $mutu->{$key.'_denominator'} ?? '') }}"
                           oninput="hitungCapaian('{{ $key }}')">
                </div>
                <div>
                    <label class="am-label">Capaian (%)</label>
                    <div class="capaian-display" id="{{ $key }}_preview">
                        @php $cap = old($key.'_capaian', $mutu->{$key.'_capaian'} ?? null); @endphp
                        {{ $cap !== null && $cap !== '' ? number_format((float)$cap, 2).'%' : '—' }}
                    </div>
                    <input type="hidden" name="{{ $key }}_capaian" id="{{ $key }}_capaian"
                           value="{{ old($key.'_capaian', $mutu->{$key.'_capaian'} ?? '') }}">
                </div>
            </div>
            @else
            {{-- Kepuasan pasien: input capaian langsung --}}
            <div style="margin-bottom:18px;">
                <div style="display:grid;grid-template-columns:200px 1fr;gap:14px;align-items:end;">
                    <div>
                        <label class="am-label">Capaian (%)</label>
                        <input type="number" step="0.01" name="{{ $key }}_capaian"
                               class="am-input"
                               placeholder="Contoh: 92.5"
                               value="{{ old($key.'_capaian', $mutu->{$key.'_capaian'} ?? '') }}">
                    </div>
                    <div></div>
                </div>
            </div>
            @endif

            {{-- Analisa & RTL --}}
            <div class="analisa-rtl-row">
                <div>
                    <label class="am-label">Analisa</label>
                    <textarea name="{{ $key }}_analisa"
                              class="am-textarea"
                              placeholder="Tuliskan analisa capaian indikator ini...">{{ old($key.'_analisa', $mutu->{$key.'_analisa'} ?? '') }}</textarea>
                </div>
                <div>
                    <label class="am-label">Rencana Tindak Lanjut (RTL)</label>
                    <textarea name="{{ $key }}_rtl"
                              class="am-textarea"
                              placeholder="Tuliskan rencana tindak lanjut...">{{ old($key.'_rtl', $mutu->{$key.'_rtl'} ?? '') }}</textarea>
                </div>
            </div>

        </div>
    </div>
    @endforeach

    {{-- ── ACTION BAR ─────────────────────────────────────────── --}}
    <div class="form-action-bar">
        <button type="submit" class="btn-save-am">
            <i class="fa-solid fa-floppy-disk"></i>
            {{ isset($mutu) ? 'Simpan Perubahan' : 'Simpan Data Bulan Ini' }}
        </button>
        <a href="{{ route('admin.form_mutu.index') }}" class="btn-cancel-am">
            <i class="fa-solid fa-xmark"></i>
            Batal
        </a>
    </div>

</form>
@endsection


@push('scripts')
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

/* Init: hitung semua yang sudah terisi saat mode edit */
document.addEventListener('DOMContentLoaded', () => {
    @php $keys = ['kbt','apd','idp','sc','wtj','poe','kvd','pkl','kfn','kcp','prj','ktk']; @endphp
    @foreach($keys as $k)
    hitungCapaian('{{ $k }}');
    @endforeach
});
</script>
@endpush