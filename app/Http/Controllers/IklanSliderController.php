<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\banneradmin;

class IklanSliderController extends Controller
{
    public function index()
    {
        $banners = banneradmin::where('status', 'active')
            ->orderBy('urutan', 'asc')
            ->get();

        return view('beranda', compact('banners'));
    }
}