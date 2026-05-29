<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    // 🔹 LIST BERITA (USER)
    public function index()
    {
        $berita = Berita::where('status', 'published')
            ->latest()
            ->paginate(12);

        return view('berita', compact('berita'));
    }

    // 🔹 DETAIL BERITA (USER)
    public function show($slug)
    {
        $berita = Berita::where('status', 'published')
            ->where('slug', $slug)
            ->firstOrFail();

        $beritaLainnya = Berita::where('status', 'published')
            ->where('id', '!=', $berita->id)
            ->latest()
            ->take(5)
            ->get();

        return view('berita-detail', compact('berita', 'beritaLainnya'));
    }
}