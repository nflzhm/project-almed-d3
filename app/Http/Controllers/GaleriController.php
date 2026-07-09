<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->kategori;

        $galeri = Galeri::when($kategori && $kategori != 'Semua', function ($q) use ($kategori) {
                $q->where('kategori', $kategori);
            })
            ->latest()
            ->get();

        return view('galeri', compact('galeri', 'kategori'));
    }
}