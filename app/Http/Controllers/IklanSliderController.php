<?php

namespace App\Http\Controllers;

use App\Models\IklanSlider;
use Illuminate\Http\Request;

class IklanSliderController extends Controller
{
    public function index()
    {
        $iklan = IklanSlider::all();
        return view('beranda', compact('iklan'));
    }
}