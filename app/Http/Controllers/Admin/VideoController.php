<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $video = Video::latest()->paginate(9);

        $totalFeatured = Video::where('featured', true)->count();
        $totalViews = Video::sum('views');
        $totalKategori = Video::select('kategori')->distinct()->count();

        return view('admin.video', compact(
            'video',
            'totalFeatured',
            'totalViews',
            'totalKategori'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'youtube_url' => 'required',
            'kategori' => 'required',
        ]);

        Video::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'youtube_url' => $request->youtube_url,
            'youtube_id' => $request->youtube_id,
            'kategori' => $request->kategori,
            'durasi' => $request->durasi,
            'featured' => $request->featured ?? false,
            'views' => 0,
        ]);

        return redirect()->back()->with('success', 'Video berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        $video->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'youtube_url' => $request->youtube_url,
            'youtube_id' => $request->youtube_id,
            'kategori' => $request->kategori,
            'durasi' => $request->durasi,
            'featured' => $request->featured ?? false,
        ]);

        return redirect()->back()->with('success', 'Video berhasil diupdate');
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        return redirect()->back()->with('success', 'Video berhasil dihapus');
    }
}