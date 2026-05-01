<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;

class DokterController extends Controller
{
    public function index(Request $request)
    {
        $hari = $request->hari;

        $dokter = Dokter::with(['jadwal' => function ($query) use ($hari) {
            if ($hari && $hari != 'Semua') {
                $query->where('hari', $hari);
            }
        }])->get();

        return view('jadwaldokter', compact('dokter', 'hari'));
    }
}