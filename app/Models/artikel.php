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
        'dokter_id',
        'views',
        'status',
    ];

    protected $casts = [
        'views'     => 'integer',
        'dokter_id' => 'integer',
    ];

    protected $attributes = [
        'status' => 'published',
        'views'  => 0,
    ];

    // Relasi ke dokter
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }

    // Scope: hanya artikel published
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    // Accessor: URL gambar lengkap
    public function getGambarUrlAttribute(): ?string
    {
        return $this->gambar
            ? asset('storage/' . $this->gambar)
            : null;
    }
}