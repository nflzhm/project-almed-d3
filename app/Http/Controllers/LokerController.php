<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use Illuminate\Http\Request;

class LokerController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->search;

        $lokers = Loker::when($keyword, function ($query, $keyword) {
            return $query->where('judul', 'like', "%$keyword%")
                         ->orWhere('deskripsi', 'like', "%$keyword%");
        })
        ->latest()
        ->get();

        return view('karir', [
            'lokers' => $lokers,
            'keyword' => $keyword
        ]);
    }

    public function show($id)
{
    $loker = Loker::findOrFail($id);
    $lokerLain = Loker::where('id', '!=', $id)->latest()->get();

    return view('loker-detail', compact('loker', 'lokerLain'));
}
}