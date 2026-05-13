<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Artikel;

class ArtikelAdminController extends Controller
{
    /**
     * Tampilkan semua artikel
     */
    public function index()
    {
        $artikel       = Artikel::latest()->paginate(10);
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

    /**
     * Simpan artikel baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'   => 'required|string|max:200',
            'isi'     => 'required|string',
            'gambar'  => 'nullable|image|mimes:jpeg,png,webp|max:3072', // max 3 MB
            'kategori'=> 'nullable|string|max:100',
            'status'  => 'nullable|in:published,draft',
        ]);

        // ---- Proses upload gambar ----
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            // Simpan ke storage/app/public/artikel/
            $gambarPath = $request->file('gambar')->store('artikel', 'public');
        }

        Artikel::create([
            'judul'    => $request->judul,
            'isi'      => $request->isi,
            'gambar'   => $gambarPath,           // path relatif dari storage/public
            'kategori' => $request->kategori,
            'status'   => $request->status ?? 'published',
            'views'    => 0,
        ]);

        return redirect()->route('admin.artikel.index')
                         ->with('success', 'Artikel berhasil ditambahkan.');
    }

    /**
     * Update artikel
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'        => 'required|string|max:200',
            'isi'          => 'required|string',
            'gambar'       => 'nullable|image|mimes:jpeg,png,webp|max:3072',
            'kategori'     => 'nullable|string|max:100',
            'status'       => 'nullable|in:published,draft',
            'hapus_gambar' => 'nullable|in:0,1',
        ]);

        $artikel = Artikel::findOrFail($id);

        $gambarPath = $artikel->gambar; // default: tetap pakai gambar lama

        // ---- Hapus gambar (admin klik tombol Hapus di modal) ----
        if ($request->hapus_gambar == '1') {
            if ($artikel->gambar) {
                Storage::disk('public')->delete($artikel->gambar);
            }
            $gambarPath = null;
        }

        // ---- Ganti gambar (admin upload file baru) ----
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama terlebih dahulu
            if ($artikel->gambar) {
                Storage::disk('public')->delete($artikel->gambar);
            }
            // Simpan gambar baru
            $gambarPath = $request->file('gambar')->store('artikel', 'public');
        }

        $artikel->update([
            'judul'    => $request->judul,
            'isi'      => $request->isi,
            'gambar'   => $gambarPath,
            'kategori' => $request->kategori,
            'status'   => $request->status ?? $artikel->status,
        ]);

        return redirect()->route('admin.artikel.index')
                         ->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Hapus artikel
     */
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        // Hapus file gambar dari storage jika ada
        if ($artikel->gambar) {
            Storage::disk('public')->delete($artikel->gambar);
        }

        $artikel->delete();

        return redirect()->route('admin.artikel.index')
                         ->with('success', 'Artikel berhasil dihapus.');
    }
}
