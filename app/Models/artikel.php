<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikels';

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'kategori',
        'views',
        'status',
    ];

    protected $casts = [
        'views' => 'integer',
    ];

    protected $attributes = [
        'status' => 'published',
        'views'  => 0,
    ];

    // Many-to-many ke dokter
    public function dokters()
    {
        return $this->belongsToMany(Dokter::class, 'artikel_dokter', 'artikel_id', 'dokter_id');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function getGambarUrlAttribute(): ?string
    {
        return $this->gambar
            ? asset('storage/' . $this->gambar)
            : null;
    }
}