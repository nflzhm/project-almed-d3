<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loker;
use Illuminate\Http\Request;

class LokerController extends Controller
{
    public function index()
    {
        // WAJIB: samakan dengan Blade ($loker)
        $loker = Loker::latest()->paginate(12);

        return view('admin.loker', compact('loker'));
    }

    public function create()
    {
        return view('admin.loker.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $gambar = $request->file('gambar')->store('loker', 'public');

        Loker::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar
        ]);

        return redirect()
            ->route('admin.loker.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $loker = Loker::findOrFail($id);

        return view('admin.loker.edit', compact('loker'));
    }

    public function update(Request $request, $id)
    {
        $loker = Loker::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('loker', 'public');
            $loker->gambar = $gambar;
        }

        $loker->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $loker->gambar
        ]);

        return redirect()
            ->route('admin.loker.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $loker = Loker::findOrFail($id);
        $loker->delete();

        return redirect()
            ->route('admin.loker.index')
            ->with('success', 'Data berhasil dihapus');
    }
}