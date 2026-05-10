<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    // LIST ARTIKEL
    public function index(Request $request)
    {
        $query = Artikel::query();

        // Search
        if ($request->search) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        // Filter kategori
        if ($request->kategori) {
            $query->where('kategori', $request->kategori);
        }

        $artikelList = $query->latest()->paginate(6);

        return view('artikel', compact('artikelList'));
    }

    // DETAIL ARTIKEL
    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);

        // Artikel terkait
        $artikelTerkait = Artikel::where('id', '!=', $id)
            ->latest()
            ->take(4)
            ->get();

        return view('artikel', compact('artikel', 'artikelTerkait'));
    }
}