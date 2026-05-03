<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;

class BeritaAdminController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->paginate(6);

        return view('admin.beritaadmin', compact('berita'));
    }
}