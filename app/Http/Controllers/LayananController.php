<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;

class LayananController extends Controller
{
    public function index()
    {
        $layananData = Layanan::latest()
            ->get()
            ->map(function ($item) {
                return [
                    'id'        => $item->id,
                    'poli'      => $item->poli,
                    'kategori'  => $item->kategori ?? 'poli',
                    'deskripsi' => $item->deskripsi ?? '',
                    'no_hp'     => $item->no_hp ?? '',
                    'no_wa'     => $item->no_wa ?? '',
                    'status'    => $item->status,
                    'gambar'    => $item->gambar
                                    ? asset('storage/' . $item->gambar)
                                    : null,
                ];
            });

        return view('layanan', compact('layananData'));
    }
}