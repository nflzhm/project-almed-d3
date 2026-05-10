<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;

class DokterController extends Controller
{
    public function index(Request $request)
    {
        $hari   = $request->hari;
        $search = $request->search;

        $dokter = Dokter::with(['jadwal' => function ($query) use ($hari) {

            if ($hari && $hari != 'Semua') {
                $query->where('hari', $hari);
            }

        }])

        ->when($search, function ($query) use ($search) {

            $query->where(function ($q) use ($search) {

                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('spesialis', 'like', '%' . $search . '%');

            });

        })

        ->get();

        return view('jadwaldokter', compact(
            'dokter',
            'hari',
            'search'
        ));
    }
}