<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\IndikatorMutu;
use Illuminate\Http\Request;

class MutuController extends Controller
{
    public function index(Request $request)
    {
        $periodeList = IndikatorMutu::orderBy('tahun', 'desc')
            ->orderBy('bulan', 'desc')
            ->get(['id', 'bulan', 'tahun']);

        $tahun = $request->get('tahun');
        $bulan = $request->get('bulan');

        if ($tahun && $bulan) {
            $data = IndikatorMutu::where('tahun', $tahun)
                ->where('bulan', $bulan)
                ->first();
        } else {
            $data = IndikatorMutu::orderBy('tahun', 'desc')
                ->orderBy('bulan', 'desc')
                ->first();
        }

        $latest = IndikatorMutu::orderBy('tahun', 'desc')
            ->orderBy('bulan', 'desc')
            ->first();

        $definisi = IndikatorMutu::definisiIndikator();

        $trendData = IndikatorMutu::orderBy('tahun', 'desc')
            ->orderBy('bulan', 'desc')
            ->limit(12)
            ->get()
            ->sortBy(fn ($r) => $r->tahun * 100 + $r->bulan)
            ->values();

        return view('mutu', compact(
            'data',
            'periodeList',
            'latest',
            'definisi',
            'trendData'
        ));
    }
}