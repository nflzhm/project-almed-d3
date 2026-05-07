<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DownloadPengadaan;
use Illuminate\Support\Facades\Storage;

class DownloadPengadaanController extends Controller
{

    public function index()
    {
        $pengadaan = DownloadPengadaan::latest()->paginate(9);

        $totalDownload = DownloadPengadaan::sum('download_count');
        $totalUkuran = round(DownloadPengadaan::sum('ukuran') / 1024 / 1024, 1);
        $totalKategori = DownloadPengadaan::distinct('kategori')->count('kategori');

        return view('admin.downloadadmin', compact(
            'pengadaan',
            'totalDownload',
            'totalUkuran',
            'totalKategori'
        ));
    }


    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:120',
            'kategori' => 'required',
            'periode' => 'required',
            'deskripsi' => 'required|max:300',
            'file' => 'required|mimes:pdf|max:10240'
        ]);

        $file = $request->file('file');
        $path = $file->store('pengadaan', 'public');

        DownloadPengadaan::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'periode' => $request->periode,
            'deskripsi' => $request->deskripsi,
            'file' => $path,
            'ukuran' => $file->getSize(),
            'download_count' => 0,
            'tanggal_upload' => now()
        ]);

        return back()->with('success', 'Dokumen berhasil ditambahkan');
    }


    public function update(Request $request, $id)
    {
        $data = DownloadPengadaan::findOrFail($id);

        $request->validate([
            'judul' => 'required|max:120',
            'kategori' => 'required',
            'periode' => 'required',
            'deskripsi' => 'required|max:300',
            'file' => 'nullable|mimes:pdf|max:10240'
        ]);

        if ($request->hasFile('file')) {
            if ($data->file) {
                Storage::disk('public')->delete($data->file);
            }

            $file = $request->file('file');
            $path = $file->store('pengadaan', 'public');

            $data->file = $path;
            $data->ukuran = $file->getSize();
        }

        $data->update([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'periode' => $request->periode,
            'deskripsi' => $request->deskripsi,
        ]);

        return back()->with('success', 'Dokumen berhasil diupdate');
    }


    public function destroy($id)
    {
        $data = DownloadPengadaan::findOrFail($id);

        if ($data->file) {
            Storage::disk('public')->delete($data->file);
        }

        $data->delete();

        return back()->with('success', 'Dokumen berhasil dihapus');
    }


    public function download($id)
    {
        $data = DownloadPengadaan::findOrFail($id);

        if (!$data->file) {
            return back()->with('error', 'File tidak ditemukan');
        }

        // tambah jumlah download
        $data->increment('download_count');

        return Storage::disk('public')->download($data->file);
    }
}