<?php

namespace App\Http\Controllers;

use App\Models\Loker;

class LokerController extends Controller
{
    public function index()
    {
        $lokers = Loker::latest()->get();
        return view('karir', compact('lokers'));
    }

    public function show($id)
    {
        $loker = Loker::findOrFail($id);
        $lokerLain = Loker::where('id', '!=', $id)->latest()->get();
        return view('detail-loker', compact('loker', 'lokerLain'));
    }
}