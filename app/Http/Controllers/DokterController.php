<?php

namespace App\Http\Controllers;

use App\Models\Dokter;

class DokterController extends Controller
{
    public function index()
    {
        $dokter = Dokter::all();

        return view('jadwaldokter', compact('dokter'));
    }
}