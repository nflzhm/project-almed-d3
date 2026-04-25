<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use Illuminate\Http\Request;

class LokerController extends Controller
{
    /**
     * Menampilkan data loker + fitur search
     */
    public function index(Request $request)
    {
        // ambil input search dari URL (?search=...)
        $keyword = $request->search;

        // query database
        $lokers = Loker::when($keyword, function ($query, $keyword) {
            return $query->where('judul', 'like', "%$keyword%")
                         ->orWhere('deskripsi', 'like', "%$keyword%");
        })
        ->latest()
        ->get();

        // kirim ke view
        return view('karir', [
            'lokers' => $lokers,
            'keyword' => $keyword
        ]);
    }
}