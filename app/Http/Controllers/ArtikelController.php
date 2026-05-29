<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    // LIST ARTIKEL
    public function index(Request $request)
    {
        $query = Artikel::where('status', 'published');

        // Filter pencarian judul
        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        // Filter kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        $artikelList = $query->latest()->paginate(12);

        // FIX: ambil semua kategori yang tersedia untuk dropdown filter
        $kategoriList = Artikel::where('status', 'published')
            ->whereNotNull('kategori')
            ->distinct()
            ->pluck('kategori');

        return view('artikel', compact('artikelList', 'kategoriList'));
    }

    // DETAIL ARTIKEL
    public function show($id)
    {
        $artikel = Artikel::where('status', 'published')
                          ->findOrFail($id);

        // Tambah views hanya saat dibuka user
        $artikel->increment('views');

        // Artikel terkait berdasarkan kategori yang sama
        $artikelTerkait = Artikel::where('status', 'published')
            ->where('id', '!=', $id)
            // FIX: prioritaskan artikel dengan kategori sama jika ada
            ->when($artikel->kategori, function ($q) use ($artikel) {
                $q->where('kategori', $artikel->kategori);
            })
            ->latest()
            ->take(4)
            ->get();

        // Jika artikel terkait kurang dari 4, tambah dari artikel lain
        if ($artikelTerkait->count() < 4) {
            $idSudahAda = $artikelTerkait->pluck('id')->push($id);
            $tambahan = Artikel::where('status', 'published')
                ->whereNotIn('id', $idSudahAda)
                ->latest()
                ->take(4 - $artikelTerkait->count())
                ->get();
            $artikelTerkait = $artikelTerkait->merge($tambahan);
        }

        return view('artikel', compact('artikel', 'artikelTerkait'));
    }
}