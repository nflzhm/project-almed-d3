<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengadaan;

class PengadaanController extends Controller
{
    
    public function index()
    {
        $data = Pengadaan::latest()->get();
        return view('pengadaan', compact('data'));
    }

    
    public function create()
    {
        return view('pengadaan.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|max:150',
            'jumlah' => 'required|numeric',
            'periode' => 'required|max:100',
        ]);

        Pengadaan::create([
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'periode' => $request->periode,
        ]);

        return redirect('/pengadaan')->with('success', 'Data berhasil ditambahkan');
    }

    
    public function edit($id)
    {
        $item = Pengadaan::findOrFail($id);
        return view('pengadaan.edit', compact('item'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|max:150',
            'jumlah' => 'required|numeric',
            'periode' => 'required|max:100',
        ]);

        $item = Pengadaan::findOrFail($id);

        $item->update([
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'periode' => $request->periode,
        ]);

        return redirect('/pengadaan')->with('success', 'Data berhasil diupdate');
    }

    
    public function destroy($id)
    {
        $item = Pengadaan::findOrFail($id);
        $item->delete();

        return redirect('/pengadaan')->with('success', 'Data berhasil dihapus');
    }
}