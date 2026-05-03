<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\banneradmin; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banner = banneradmin::latest()->paginate(6); 

        $totalActive = banneradmin::where('status', 'active')->count();
        $totalInactive = banneradmin::where('status', 'inactive')->count();
        $sliderSpeed = 5;

        return view('admin.banner', compact(
            'banner',
            'totalActive',
            'totalInactive',
            'sliderSpeed'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:100',
            'caption' => 'nullable|max:200',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:3072',
            'link' => 'nullable|url',
            'urutan' => 'required|integer',
            'status' => 'required|in:active,inactive',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $path = $request->file('gambar')->store('banner', 'public');

        banneradmin::create([
            'judul' => $request->judul,
            'caption' => $request->caption,
            'gambar' => $path,
            'link' => $request->link,
            'urutan' => $request->urutan,
            'status' => $request->status,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);

        return redirect()->back()->with('success', 'Banner berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $banner = banneradmin::findOrFail($id);

        $request->validate([
            'judul' => 'required|max:100',
            'caption' => 'nullable|max:200',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'link' => 'nullable|url',
            'urutan' => 'required|integer',
            'status' => 'required|in:active,inactive',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        if ($request->hasFile('gambar')) {
            if ($banner->gambar && Storage::disk('public')->exists($banner->gambar)) {
                Storage::disk('public')->delete($banner->gambar);
            }

            $banner->gambar = $request->file('gambar')->store('banner', 'public');
        }

        $banner->update([
            'judul' => $request->judul,
            'caption' => $request->caption,
            'link' => $request->link,
            'urutan' => $request->urutan,
            'status' => $request->status,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);

        return redirect()->back()->with('success', 'Banner berhasil diupdate');
    }

    public function destroy($id)
    {
        $banner = banneradmin::findOrFail($id);

        if ($banner->gambar && Storage::disk('public')->exists($banner->gambar)) {
            Storage::disk('public')->delete($banner->gambar);
        }

        $banner->delete();

        return redirect()->back()->with('success', 'Banner berhasil dihapus');
    }

    public function toggle($id)
    {
        $banner = banneradmin::findOrFail($id);

        $banner->status = $banner->status === 'active' ? 'inactive' : 'active';
        $banner->save();

        return redirect()->back()->with('success', 'Status banner berhasil diubah');
    }
}