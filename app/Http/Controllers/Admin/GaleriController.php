<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\GaleriFoto;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::withCount('fotos')->with('fotos')->latest()->paginate(12);

        $totalGaleri    = Galeri::count();
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
            'gambar'    => 'required|array|min:1',
            'gambar.*'  => 'image|mimes:jpeg,png,webp|max:5120',
        ]);

        $galeri = Galeri::create($request->only('judul', 'kategori', 'deskripsi'));

        foreach ($request->file('gambar') as $i => $file) {
            $filename = time() . '_' . uniqid() . '.' . $file->extension();
            $file->move(public_path('uploads/galeri'), $filename);

            GaleriFoto::create([
                'galeri_id' => $galeri->id,
                'gambar'    => $filename,
                'urutan'    => $i,
            ]);
        }

        return redirect()->back()->with('success', 'Album berhasil ditambahkan (' . count($request->file('gambar')) . ' foto)');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'         => 'required|string|max:150',
            'kategori'      => 'required|string',
            'deskripsi'     => 'nullable|string',
            'gambar'        => 'nullable|array',
            'gambar.*'      => 'image|mimes:jpeg,png,webp|max:5120',
            'hapus_foto'    => 'nullable|array',
            'hapus_foto.*'  => 'integer|exists:galeri_fotos,id',
        ]);

        $galeri = Galeri::findOrFail($id);
        $galeri->update($request->only('judul', 'kategori', 'deskripsi'));

        if ($request->filled('hapus_foto')) {
            $fotos = GaleriFoto::where('galeri_id', $galeri->id)
                ->whereIn('id', $request->hapus_foto)
                ->get();

            foreach ($fotos as $foto) {
                $path = public_path('uploads/galeri/' . $foto->gambar);
                if (file_exists($path)) unlink($path);
                $foto->delete();
            }
        }

        if ($request->hasFile('gambar')) {
            $urutanAwal = (int) $galeri->fotos()->max('urutan') + 1;

            foreach ($request->file('gambar') as $i => $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->extension();
                $file->move(public_path('uploads/galeri'), $filename);

                GaleriFoto::create([
                    'galeri_id' => $galeri->id,
                    'gambar'    => $filename,
                    'urutan'    => $urutanAwal + $i,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Album berhasil diperbarui');
    }

    public function destroy($id)
    {
        $galeri = Galeri::with('fotos')->findOrFail($id);

        foreach ($galeri->fotos as $foto) {
            $path = public_path('uploads/galeri/' . $foto->gambar);
            if (file_exists($path)) unlink($path);
        }

        $galeri->delete();

        return redirect()->back()->with('success', 'Album berhasil dihapus');
    }
}