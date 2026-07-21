<?php
// Lokasi file: app/Http/Controllers/Admin/AdminDokterController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminDataDokter;

class AdminDokterController extends Controller
{
    public function index()
    {
        $dokter = AdminDataDokter::latest()->paginate(10);

        return view('admin.dokter', compact('dokter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:100',
            'spesialis' => 'required|string',
            'foto'      => 'nullable|image|mimes:jpeg,png,webp|max:5120',
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {
            $foto = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads/dokter'), $foto);
        }

        AdminDataDokter::create([
            'nama'      => $request->nama,
            'spesialis' => $request->spesialis,
            'foto'      => $foto,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->back()->with('success', 'Dokter berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'      => 'required|string|max:100',
            'spesialis' => 'required|string',
            'foto'      => 'nullable|image|mimes:jpeg,png,webp|max:5120',
        ]);

        $dokter = AdminDataDokter::findOrFail($id);
        $foto   = $dokter->foto;

        if ($request->hasFile('foto')) {
            // Ada foto baru diupload -> hapus foto lama (kalau ada), simpan yang baru
            if ($foto && file_exists(public_path('uploads/dokter/' . $foto))) {
                unlink(public_path('uploads/dokter/' . $foto));
            }
            $foto = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads/dokter'), $foto);

        } elseif ($request->hapus_gambar == '1') {
            // User klik "Hapus" foto tanpa upload foto baru
            if ($foto && file_exists(public_path('uploads/dokter/' . $foto))) {
                unlink(public_path('uploads/dokter/' . $foto));
            }
            $foto = null;
        }

        $dokter->update([
            'nama'      => $request->nama,
            'spesialis' => $request->spesialis,
            'foto'      => $foto,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->back()->with('success', 'Dokter berhasil diupdate');
    }

    public function destroy($id)
    {
        $dokter = AdminDataDokter::findOrFail($id);

        if ($dokter->foto && file_exists(public_path('uploads/dokter/' . $dokter->foto))) {
            unlink(public_path('uploads/dokter/' . $dokter->foto));
        }

        $dokter->delete();

        return redirect()->back()->with('success', 'Dokter berhasil dihapus');
    }
    
}