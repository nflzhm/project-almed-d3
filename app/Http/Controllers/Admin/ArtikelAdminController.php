<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Artikel;

class ArtikelAdminController extends Controller
{
    public function index()
    {
        $artikel = Artikel::latest()->paginate(10);

        $totalPublished = Artikel::where('status', 'published')->count();
        $totalDraft     = Artikel::where('status', 'draft')->count();
        $totalViews     = Artikel::sum('views');
        $totalKategori  = Artikel::whereNotNull('kategori')
                                 ->distinct('kategori')
                                 ->count('kategori');

        return view('admin.artikeladmin', compact(
            'artikel',
            'totalPublished',
            'totalDraft',
            'totalViews',
            'totalKategori'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:200',
            'deskripsi' => 'required|string',
            'gambar'    => 'nullable|image|mimes:jpeg,png,webp|max:3072',
            'kategori'  => 'nullable|string|max:100',
            'status'    => 'nullable|in:published,draft',
        ]);

        $gambarPath = null;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('artikel', 'public');
        }

        // FIX: pakai $request->deskripsi, bukan $request->isi
        Artikel::create([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar'    => $gambarPath,
            'kategori'  => $request->kategori,
            'status'    => $request->filled('status') ? $request->status : 'published',
            'views'     => 0,
        ]);

        return redirect()->route('admin.artikel.index')
                         ->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'        => 'required|string|max:200',
            'deskripsi'    => 'required|string',
            'gambar'       => 'nullable|image|mimes:jpeg,png,webp|max:3072',
            'kategori'     => 'nullable|string|max:100',
            'status'       => 'nullable|in:published,draft',
            'hapus_gambar' => 'nullable|in:0,1',
        ]);

        $artikel = Artikel::findOrFail($id);

        $gambarPath = $artikel->gambar;

        // Hapus gambar lama jika diminta
        if ($request->hapus_gambar == '1') {
            if ($artikel->gambar) {
                Storage::disk('public')->delete($artikel->gambar);
            }
            $gambarPath = null;
        }

        // Upload gambar baru (hapus lama dulu jika ada)
        if ($request->hasFile('gambar')) {
            if ($artikel->gambar) {
                Storage::disk('public')->delete($artikel->gambar);
            }
            $gambarPath = $request->file('gambar')->store('artikel', 'public');
        }

        $artikel->update([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar'    => $gambarPath,
            'kategori'  => $request->kategori,
            // FIX: gunakan filled() agar tidak overwrite dengan string kosong
            'status'    => $request->filled('status') ? $request->status : $artikel->status,
        ]);

        return redirect()->route('admin.artikel.index')
                         ->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        if ($artikel->gambar) {
            Storage::disk('public')->delete($artikel->gambar);
        }

        $artikel->delete();

        return redirect()->route('admin.artikel.index')
                         ->with('success', 'Artikel berhasil dihapus.');
    }
}