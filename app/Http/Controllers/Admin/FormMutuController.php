<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IndikatorMutu;
use Illuminate\Http\Request;

class FormMutuController extends Controller
{
    private const DEFINISI = [
        'kbt' => ['label' => 'Kepatuhan Kebersihan Tangan', 'op' => '>=', 'tv' => 85, 'has_num' => true],
        'apd' => ['label' => 'Kepatuhan Penggunaan APD', 'op' => '>=', 'tv' => 100, 'has_num' => true],
        'idp' => ['label' => 'Kepatuhan Identifikasi Pasien', 'op' => '>=', 'tv' => 100, 'has_num' => true],
        'sc'  => ['label' => 'Waktu Tanggap SC Emergensi ≤ 30 Menit', 'op' => '>', 'tv' => 80, 'has_num' => true],
        'wtj' => ['label' => 'Waktu Tunggu Rawat Jalan', 'op' => '>=', 'tv' => 80, 'has_num' => true],
        'poe' => ['label' => 'Penundaan Operasi Elektif', 'op' => '<', 'tv' => 5, 'has_num' => true],
        'kvd' => ['label' => 'Kepatuhan Waktu Visite Dokter', 'op' => '>=', 'tv' => 80, 'has_num' => true],
        'pkl' => ['label' => 'Pelaporan Hasil Kritis Laboratorium', 'op' => '>=', 'tv' => 100, 'has_num' => true],
        'kfn' => ['label' => 'Kepatuhan Formularium Nasional', 'op' => '>=', 'tv' => 80, 'has_num' => true],
        'kcp' => ['label' => 'Kepatuhan Clinical Pathway', 'op' => '>=', 'tv' => 80, 'has_num' => true],
        'prj' => ['label' => 'Pencegahan Risiko Jatuh', 'op' => '>=', 'tv' => 100, 'has_num' => true],
        'ktk' => ['label' => 'Kecepatan Tanggap Komplain', 'op' => '>=', 'tv' => 80, 'has_num' => true],
        'kep' => ['label' => 'Kepuasan Pasien', 'op' => '>', 'tv' => 76.61, 'has_num' => false],
    ];

    private const BULAN = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    ];

    // INDEX
    public function index(Request $request)
    {
        $query = IndikatorMutu::query()
            ->orderBy('tahun', 'desc')
            ->orderBy('bulan', 'desc');

        if ($request->filled('search')) {

            $keyword = strtolower($request->search);

            $matchedBulan = collect(self::BULAN)
                ->filter(fn($nama) => str_contains(strtolower($nama), $keyword))
                ->keys()
                ->toArray();

            $query->where(function ($q) use ($request, $matchedBulan) {
                $q->whereIn('bulan', $matchedBulan)
                  ->orWhere('tahun', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('tahun')) {
            $query->where('tahun', $request->tahun);
        }

        $data = $query->paginate(12)->withQueryString();

        $latest = IndikatorMutu::orderBy('tahun', 'desc')
            ->orderBy('bulan', 'desc')
            ->first();

        $latestTercapai = $latest ? $this->countTercapai($latest) : 0;

        $latestPeriode = $latest
            ? (self::BULAN[$latest->bulan] ?? '-') . ' ' . $latest->tahun
            : '-';

        $totalPeriode = IndikatorMutu::count();

        $tahunList = IndikatorMutu::selectRaw('DISTINCT tahun')
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        return view('admin.form_mutu', compact(
            'data',
            'totalPeriode',
            'latestTercapai',
            'latestPeriode',
            'tahunList'
        ));
    }

    // CREATE
    public function create()
    {
        $isEdit = false;
        $mutu = null;

        $definisi = self::DEFINISI;
        $bulanList = self::BULAN;
        $tahunList = $this->tahunList();

        return view('admin.form_mutu', compact(
            'isEdit',
            'mutu',
            'definisi',
            'bulanList',
            'tahunList'
        ));
    }

    // STORE
    public function store(Request $request)
    {
        $this->validatePeriode($request);

        $exists = IndikatorMutu::where('bulan', $request->bulan)
            ->where('tahun', $request->tahun)
            ->exists();

        if ($exists) {

            $namaBulan = self::BULAN[$request->bulan] ?? $request->bulan;

            return back()
                ->withInput()
                ->withErrors([
                    'bulan' => "Data untuk periode {$namaBulan} {$request->tahun} sudah ada."
                ]);
        }

        IndikatorMutu::create($this->buildPayload($request));

        return redirect()
            ->route('admin.form_mutu.index')
            ->with('success', 'Data indikator mutu berhasil disimpan.');
    }

    // SHOW
    public function show(IndikatorMutu $form_mutu)
    {
        return redirect()->route('admin.form_mutu.edit', $form_mutu->id);
    }

    // EDIT
    public function edit(IndikatorMutu $form_mutu)
    {
        $isEdit = true;
        $mutu = $form_mutu;

        $definisi = self::DEFINISI;
        $bulanList = self::BULAN;
        $tahunList = $this->tahunList();

        return view('admin.form_mutu', compact(
            'isEdit',
            'mutu',
            'definisi',
            'bulanList',
            'tahunList'
        ));
    }

    // UPDATE
    public function update(Request $request, IndikatorMutu $form_mutu)
    {
        $this->validatePeriode($request);

        $exists = IndikatorMutu::where('bulan', $request->bulan)
            ->where('tahun', $request->tahun)
            ->where('id', '!=', $form_mutu->id)
            ->exists();

        if ($exists) {

            $namaBulan = self::BULAN[$request->bulan] ?? $request->bulan;

            return back()
                ->withInput()
                ->withErrors([
                    'bulan' => "Data untuk periode {$namaBulan} {$request->tahun} sudah ada."
                ]);
        }

        $form_mutu->update($this->buildPayload($request));

        $namaBulan = self::BULAN[$form_mutu->bulan] ?? $form_mutu->bulan;

        return redirect()
            ->route('admin.form_mutu.index')
            ->with('success', "Data mutu {$namaBulan} {$form_mutu->tahun} berhasil diperbarui.");
    }

    // DESTROY
    public function destroy(IndikatorMutu $form_mutu)
    {
        $namaBulan = self::BULAN[$form_mutu->bulan] ?? $form_mutu->bulan;

        $label = "{$namaBulan} {$form_mutu->tahun}";

        $form_mutu->delete();

        return redirect()
            ->route('admin.form_mutu.index')
            ->with('success', "Data mutu periode {$label} berhasil dihapus.");
    }

    private function validatePeriode(Request $request): void
    {
        $request->validate([
            'bulan' => ['required', 'integer', 'between:1,12'],
            'tahun' => ['required', 'integer', 'min:2020', 'max:2099'],
        ]);
    }

    private function buildPayload(Request $request): array
    {
        $payload = [
            'bulan' => (int) $request->bulan,
            'tahun' => (int) $request->tahun,
        ];

        foreach (self::DEFINISI as $key => $cfg) {

            if ($cfg['has_num']) {

                $num = $request->input("{$key}_numerator");
                $den = $request->input("{$key}_denominator");

                if (
                    $num !== null &&
                    $num !== '' &&
                    $den !== null &&
                    $den !== '' &&
                    (float)$den > 0
                ) {

                    $capaian = round(((float)$num / (float)$den) * 100, 2);

                } elseif ($request->filled("{$key}_capaian")) {

                    $capaian = (float)$request->input("{$key}_capaian");

                } else {

                    $capaian = null;
                }

                $payload["{$key}_numerator"] = $num !== '' ? $num : null;
                $payload["{$key}_denominator"] = $den !== '' ? $den : null;
                $payload["{$key}_capaian"] = $capaian;

            } else {

                $payload["{$key}_capaian"] = $request->filled("{$key}_capaian")
                    ? (float)$request->input("{$key}_capaian")
                    : null;
            }

            $payload["{$key}_analisa"] = $request->input("{$key}_analisa");
            $payload["{$key}_rtl"] = $request->input("{$key}_rtl");
        }

        return $payload;
    }

    private function countTercapai(IndikatorMutu $mutu): int
    {
        $tercapai = 0;

        foreach (self::DEFINISI as $key => $cfg) {

            $val = $mutu->{"{$key}_capaian"};

            if ($val === null) continue;

            $ok = match ($cfg['op']) {
                '>=' => (float)$val >= $cfg['tv'],
                '>'  => (float)$val > $cfg['tv'],
                '<'  => (float)$val < $cfg['tv'],
                '<=' => (float)$val <= $cfg['tv'],
                default => false,
            };

            if ($ok) $tercapai++;
        }

        return $tercapai;
    }

    private function tahunList(): array
{
    $dbTahun = IndikatorMutu::query()
        ->select('tahun')
        ->distinct()
        ->orderByDesc('tahun')
        ->pluck('tahun')
        ->filter()
        ->map(fn($t) => (int) $t)
        ->toArray();

    // FIX: range harus dari kecil ke besar, lalu di-reverse
    $defaultRange = array_reverse(range(2020, (int) date('Y')));

    $merged = array_unique(array_merge($dbTahun, $defaultRange));
    rsort($merged);

    return array_values($merged);
}
}