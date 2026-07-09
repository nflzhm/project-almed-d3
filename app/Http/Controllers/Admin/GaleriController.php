<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::latest()->paginate(12);

        $totalGaleri  = Galeri::count();
        $totalFasilitas = Galeri::where('kategori', 'Fasilitas')->count();
        $totalKegiatan  = Galeri::where('kategori', 'Kegiatan')->count();
        $totalEvent     = Galeri::where('kategori', 'Event')->count();

        return view('admin.galeri', compact(
            'galeri', 'totalGaleri', 'totalFasilitas', 'totalKegiatan', 'totalEvent'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:150',
            'kategori'  => 'required|string',
            'deskripsi' => 'nullable|string',
            'gambar'    => 'required|image|mimes:jpeg,png,webp|max:5120',
        ]);

        $file = time() . '_' . uniqid() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('uploads/galeri'), $file);

        Galeri::create([
            'judul'     => $request->judul,
            'kategori'  => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'gambar'    => $file,
        ]);

        return redirect()->back()->with('success', 'Foto berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'     => 'required|string|max:150',
            'kategori'  => 'required|string',
            'deskripsi' => 'nullable|string',
            'gambar'    => 'nullable|image|mimes:jpeg,png,webp|max:5120',
        ]);

        $galeri = Galeri::findOrFail($id);
        $file   = $galeri->gambar;

        if ($request->hasFile('gambar')) {
            $file = time() . '_' . uniqid() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads/galeri'), $file);
        }

        $galeri->update([
            'judul'     => $request->judul,
            'kategori'  => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'gambar'    => $file,
        ]);

        return redirect()->back()->with('success', 'Foto berhasil diperbarui');
    }

    public function destroy($id)
    {
        Galeri::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Foto berhasil dihapus');
    }
}