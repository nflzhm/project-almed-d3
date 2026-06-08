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
        $layanan            = Layanan::latest()->paginate(20);
        $totalAktif         = Layanan::where('status', 'aktif')->count();
        $totalDenganGambar  = Layanan::whereNotNull('gambar')->where('gambar', '!=', '')->count();
        $totalDenganHp      = Layanan::whereNotNull('no_hp')->where('no_hp', '!=', '')->count();

        return view('admin.layananadmin', compact(
            'layanan',
            'totalAktif',
            'totalDenganGambar',
            'totalDenganHp'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'poli'      => 'required|string|max:100',
            'kategori'  => 'nullable|in:poli,igd,rawat,penunjang',
            'deskripsi' => 'required|string|max:500',
            'no_hp'     => 'nullable|string|max:20',
            'no_wa'     => 'nullable|string|max:20',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:7168',
            'status'    => 'required|in:aktif,nonaktif',
        ]);

        $data = [
            'poli'      => $request->poli,
            'kategori'  => $request->input('kategori', 'poli'),
            'deskripsi' => $request->deskripsi,
            'no_hp'     => $request->no_hp,
            'no_wa'     => $request->no_wa,
            'status'    => $request->status,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('layanan', 'public');
        }

        Layanan::create($data);

        return back()->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'poli'         => 'required|string|max:100',
            'kategori'     => 'nullable|in:poli,igd,rawat,penunjang',
            'deskripsi'    => 'required|string|max:500',
            'no_hp'        => 'nullable|string|max:20',
            'no_wa'        => 'nullable|string|max:20',
            'gambar'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:7168',
            'status'       => 'required|in:aktif,nonaktif',
            'hapus_gambar' => 'nullable|in:0,1',
        ]);

        $layanan = Layanan::findOrFail($id);

        $data = [
            'poli'      => $request->poli,
            'kategori'  => $request->input('kategori', $layanan->kategori ?? 'poli'),
            'deskripsi' => $request->deskripsi,
            'no_hp'     => $request->no_hp,
            'no_wa'     => $request->no_wa,
            'status'    => $request->status,
        ];

        // Hapus gambar jika diminta
        if ($request->hapus_gambar == '1' && $layanan->gambar) {
            Storage::disk('public')->delete($layanan->gambar);
            $data['gambar'] = null;
        }

        // Upload gambar baru
        if ($request->hasFile('gambar')) {
            if ($layanan->gambar) {
                Storage::disk('public')->delete($layanan->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('layanan', 'public');
        }

        $layanan->update($data);

        return back()->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);

        if ($layanan->gambar) {
            Storage::disk('public')->delete($layanan->gambar);
        }

        $layanan->delete();

        return back()->with('success', 'Layanan berhasil dihapus.');
    }
}