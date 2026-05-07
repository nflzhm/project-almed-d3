<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaAdminController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->paginate(6);
        return view('admin.beritaadmin', compact('berita'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'required',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'    => 'required|in:published,draft',
        ]);

        $gambarPath = $request->file('gambar')?->store('berita', 'public');

        $slug = Str::slug($request->judul);
        $count = Berita::where('slug', 'LIKE', "$slug%")->count();
        $slug = $count ? $slug . '-' . $count : $slug;

        Berita::create([
            'judul'     => $request->judul,
            'slug'      => $slug,
            'deskripsi' => $request->deskripsi,
            'gambar'    => $gambarPath,
            'status'    => $request->status,
        ]);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'required',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'    => 'required|in:published,draft',
        ]);

        $berita = Berita::findOrFail($id);

        $slug = Str::slug($request->judul);
        $count = Berita::where('slug', 'LIKE', "$slug%")
            ->where('id', '!=', $id)
            ->count();
        $slug = $count ? $slug . '-' . $count : $slug;

        $data = [
            'judul'     => $request->judul,
            'slug'      => $slug,
            'deskripsi' => $request->deskripsi,
            'status'    => $request->status,
        ];

        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diupdate');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus');
    }
}