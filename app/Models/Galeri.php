<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeris';

    protected $fillable = [
        'judul',
        'deskripsi',
        'kategori',
    ];

    public function fotos()
    {
        return $this->hasMany(GaleriFoto::class)->orderBy('urutan');
    }

    public function getCoverFotoAttribute(): ?string
    {
        $first = $this->fotos->first();
        return $first ? asset('uploads/galeri/' . $first->gambar) : null;
    }
}