<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\banneradmin;
use App\Models\Berita;
use App\Models\AdminDataDokter;

class IklanSliderController extends Controller
{
    public function index()
    {
        $banners = banneradmin::where('status', 'active')
            ->orderBy('urutan', 'asc')
            ->get();

        $beritaTerbaru = Berita::where('status', 'published')
            ->latest()
            ->take(4)
            ->get();

        $dokter = AdminDataDokter::latest()->get();

        return view('beranda', compact(
            'banners',
            'beritaTerbaru',
            'dokter'
        ));
    }
}