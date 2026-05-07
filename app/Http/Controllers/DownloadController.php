<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\DownloadPengadaan;

class DownloadController extends Controller
{
    public function index()
    {
        $data = DownloadPengadaan::latest()->get();

        return view('download', compact('data'));
    }

    public function download($id)
    {
        $item = DownloadPengadaan::findOrFail($id);

        $item->increment('download_count');

        return Storage::download('public/' . $item->file);
    }
}