<?php

namespace App\Http\Controllers;

use App\Models\Dokter;

class DokterController extends Controller
{
    public function index()
    {
        $dokter = Dokter::with('jadwal')->get();

        return view('jadwaldokter', compact('dokter'));
    }
}