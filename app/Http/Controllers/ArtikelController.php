<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\AdminDataDokter;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $query = Artikel::with('dokters')
            ->where('status', 'published');

        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        $artikelList = $query->latest()->paginate(12);

        $kategoriList = Artikel::where('status', 'published')
            ->whereNotNull('kategori')
            ->distinct()
            ->pluck('kategori');

        $dokterList = AdminDataDokter::select('id', 'nama', 'spesialis', 'foto')
            ->orderBy('nama')
            ->get();

        return view('artikel', compact(
            'artikelList',
            'kategoriList',
            'dokterList'
        ));
    }

    public function show($id)
    {
        $artikel = Artikel::with('dokters')
            ->where('status', 'published')
            ->findOrFail($id);

        $artikel->increment('views');

        $artikelTerkait = Artikel::with('dokters')
            ->where('status', 'published')
            ->where('id', '!=', $id)
            ->when($artikel->kategori, function ($q) use ($artikel) {
                $q->where('kategori', $artikel->kategori);
            })
            ->latest()
            ->take(4)
            ->get();

        if ($artikelTerkait->count() < 4) {
            $idSudahAda = $artikelTerkait->pluck('id')->push($id);

            $tambahan = Artikel::with('dokters')
                ->where('status', 'published')
                ->whereNotIn('id', $idSudahAda)
                ->latest()
                ->take(4 - $artikelTerkait->count())
                ->get();

            $artikelTerkait = $artikelTerkait->merge($tambahan);
        }

        return view('artikel', compact(
            'artikel',
            'artikelTerkait'
        ));
    }
}