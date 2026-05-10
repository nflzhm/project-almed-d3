<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelAdminController extends Controller
{
    /**
     * Tampilkan semua artikel
     */
    public function index()
    {
        $artikel = Artikel::latest()->paginate(10);
        return view('admin.artikeladmin', compact('artikel'));
    }

    /**
     * Form tambah artikel
     */
    public function create()
    {
        return view('admin.artikel.create');
    }

    /**
     * Simpan artikel baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi'   => 'required',
        ]);

        Artikel::create([
            'judul' => $request->judul,
            'isi'   => $request->isi,
        ]);

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil ditambahkan');
    }

    /**
     * Form edit artikel
     */
    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.edit', compact('artikel'));
    }

    /**
     * Update artikel
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'isi'   => 'required',
        ]);

        $artikel = Artikel::findOrFail($id);
        $artikel->update([
            'judul' => $request->judul,
            'isi'   => $request->isi,
        ]);

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil diupdate');
    }

    /**
     * Hapus artikel
     */
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil dihapus');
    }
}