<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Layanan;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::latest()->paginate(10);

        return view('admin.layananadmin', compact('layanan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'poli' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'no_hp' => 'nullable|string|max:20',
            'no_wa' => 'nullable|string|max:20',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $data = [
            'poli' => $request->poli,
            'deskripsi' => $request->deskripsi,
            'no_hp' => $request->no_hp,
            'no_wa' => $request->no_wa,
            'status' => $request->status,
        ];

        // upload gambar
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('layanan', 'public');
        }

        Layanan::create($data);

        return back()->with('success', 'Layanan berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'poli' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'no_hp' => 'nullable|string|max:20',
            'no_wa' => 'nullable|string|max:20',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:aktif,nonaktif',
            'hapus_gambar' => 'nullable|in:0,1',
        ]);

        $layanan = Layanan::findOrFail($id);

        $data = [
            'poli' => $request->poli,
            'deskripsi' => $request->deskripsi,
            'no_hp' => $request->no_hp,
            'no_wa' => $request->no_wa,
            'status' => $request->status,
        ];

        // =========================
        // HAPUS GAMBAR (OPTIONAL)
        // =========================
        if ($request->hapus_gambar == 1 && $layanan->gambar) {
            Storage::disk('public')->delete($layanan->gambar);
            $data['gambar'] = null;
        }

        // =========================
        // UPLOAD GAMBAR BARU
        // =========================
        if ($request->hasFile('gambar')) {

            // hapus lama dulu
            if ($layanan->gambar) {
                Storage::disk('public')->delete($layanan->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('layanan', 'public');
        }

        $layanan->update($data);

        return back()->with('success', 'Layanan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);

        // hapus file gambar kalau ada
        if ($layanan->gambar) {
            Storage::disk('public')->delete($layanan->gambar);
        }

        $layanan->delete();

        return back()->with('success', 'Layanan berhasil dihapus');
    }
}