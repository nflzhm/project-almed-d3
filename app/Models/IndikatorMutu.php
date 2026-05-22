<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndikatorMutu extends Model
{
    protected $table = 'indikator_mutu';

    protected $fillable = [
        'bulan', 'tahun',

        'kbt_capaian', 'kbt_numerator', 'kbt_denominator', 'kbt_analisa', 'kbt_rtl',
        'apd_capaian', 'apd_numerator', 'apd_denominator', 'apd_analisa', 'apd_rtl',
        'idp_capaian', 'idp_numerator', 'idp_denominator', 'idp_analisa', 'idp_rtl',
        'sc_capaian',  'sc_numerator',  'sc_denominator',  'sc_analisa',  'sc_rtl',
        'wtj_capaian', 'wtj_numerator', 'wtj_denominator', 'wtj_analisa', 'wtj_rtl',
        'poe_capaian', 'poe_numerator', 'poe_denominator', 'poe_analisa', 'poe_rtl',
        'kvd_capaian', 'kvd_numerator', 'kvd_denominator', 'kvd_analisa', 'kvd_rtl',
        'pkl_capaian', 'pkl_numerator', 'pkl_denominator', 'pkl_analisa', 'pkl_rtl',
        'kfn_capaian', 'kfn_numerator', 'kfn_denominator', 'kfn_analisa', 'kfn_rtl',
        'kcp_capaian', 'kcp_numerator', 'kcp_denominator', 'kcp_analisa', 'kcp_rtl',
        'prj_capaian', 'prj_numerator', 'prj_denominator', 'prj_analisa', 'prj_rtl',
        'ktk_capaian', 'ktk_numerator', 'ktk_denominator', 'ktk_analisa', 'ktk_rtl',
        'kep_capaian', 'kep_analisa', 'kep_rtl',
    ];

    protected $casts = [
        'kbt_capaian' => 'float', 'apd_capaian' => 'float', 'idp_capaian' => 'float',
        'sc_capaian'  => 'float', 'wtj_capaian' => 'float', 'poe_capaian' => 'float',
        'kvd_capaian' => 'float', 'pkl_capaian' => 'float', 'kfn_capaian' => 'float',
        'kcp_capaian' => 'float', 'prj_capaian' => 'float', 'ktk_capaian' => 'float',
        'kep_capaian' => 'float',
    ];

    // Accessor nama_bulan
    public function getNamaBulanAttribute(): string
    {
        $bulan = [
            1 => 'Januari',  2 => 'Februari', 3 => 'Maret',     4 => 'April',
            5 => 'Mei',      6 => 'Juni',      7 => 'Juli',      8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];
        return $bulan[(int) $this->bulan] ?? '-';
    }

    // Definisi 13 INM — dipakai controller publik & admin
    public static function definisiIndikator(): array
    {
        return [
            'kbt' => [
                'label'    => 'Kepatuhan Kebersihan Tangan',
                'desc'     => 'Kepatuhan petugas dalam melakukan kebersihan tangan sesuai five moments.',
                'op'       => '>=', 'target_v' => 85,    'target' => '≥ 85%',
                'has_num'  => true,
            ],
            'apd' => [
                'label'    => 'Kepatuhan Penggunaan APD',
                'desc'     => 'Kepatuhan petugas menggunakan APD sesuai indikasi.',
                'op'       => '>=', 'target_v' => 100,   'target' => '= 100%',
                'has_num'  => true,
            ],
            'idp' => [
                'label'    => 'Kepatuhan Identifikasi Pasien',
                'desc'     => 'Kepatuhan pelaksanaan identifikasi pasien sebelum tindakan.',
                'op'       => '>=', 'target_v' => 100,   'target' => '= 100%',
                'has_num'  => true,
            ],
            'sc'  => [
                'label'    => 'Waktu Tanggap SC Emergensi ≤ 30 Menit',
                'desc'     => 'Persentase SC emergensi yang dilayani dalam waktu ≤ 30 menit.',
                'op'       => '>',  'target_v' => 80,    'target' => '> 80%',
                'has_num'  => true,
            ],
            'wtj' => [
                'label'    => 'Waktu Tunggu Rawat Jalan',
                'desc'     => 'Persentase pasien rawat jalan yang dilayani ≤ 60 menit.',
                'op'       => '>=', 'target_v' => 80,    'target' => '≥ 80%',
                'has_num'  => true,
            ],
            'poe' => [
                'label'    => 'Penundaan Operasi Elektif',
                'desc'     => 'Persentase penundaan jadwal operasi elektif.',
                'op'       => '<',  'target_v' => 5,     'target' => '< 5%',
                'has_num'  => true,
            ],
            'kvd' => [
                'label'    => 'Kepatuhan Waktu Visite Dokter',
                'desc'     => 'Kepatuhan dokter melakukan visite sebelum pukul 14.00.',
                'op'       => '>=', 'target_v' => 80,    'target' => '≥ 80%',
                'has_num'  => true,
            ],
            'pkl' => [
                'label'    => 'Pelaporan Hasil Kritis Laboratorium',
                'desc'     => 'Pelaporan hasil kritis laboratorium ≤ 30 menit.',
                'op'       => '>=', 'target_v' => 100,   'target' => '= 100%',
                'has_num'  => true,
            ],
            'kfn' => [
                'label'    => 'Kepatuhan Formularium Nasional',
                'desc'     => 'Kepatuhan penggunaan obat sesuai formularium nasional.',
                'op'       => '>=', 'target_v' => 80,    'target' => '≥ 80%',
                'has_num'  => true,
            ],
            'kcp' => [
                'label'    => 'Kepatuhan Clinical Pathway',
                'desc'     => 'Kepatuhan penerapan clinical pathway sesuai PPK.',
                'op'       => '>=', 'target_v' => 80,    'target' => '≥ 80%',
                'has_num'  => true,
            ],
            'prj' => [
                'label'    => 'Pencegahan Risiko Jatuh',
                'desc'     => 'Kepatuhan upaya pencegahan risiko jatuh pada pasien rawat inap.',
                'op'       => '>=', 'target_v' => 100,   'target' => '= 100%',
                'has_num'  => true,
            ],
            'ktk' => [
                'label'    => 'Kecepatan Tanggap Komplain',
                'desc'     => 'Kecepatan penanganan komplain pasien ≤ 24 jam.',
                'op'       => '>=', 'target_v' => 80,    'target' => '≥ 80%',
                'has_num'  => true,
            ],
            'kep' => [
                'label'    => 'Kepuasan Pasien',
                'desc'     => 'Indeks kepuasan pasien berdasarkan survei kepuasan.',
                'op'       => '>',  'target_v' => 76.61, 'target' => '> 76.61%',
                'has_num'  => false,
            ],
        ];
    }
}