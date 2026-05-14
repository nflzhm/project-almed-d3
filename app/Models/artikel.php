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

    // FIX: casting tipe data agar views selalu integer dan status string
    protected $casts = [
        'views' => 'integer',
    ];

    // FIX: default value agar status tidak pernah null di DB
    protected $attributes = [
        'status' => 'published',
        'views'  => 0,
    ];

    // Scope helper: hanya artikel published
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    // Accessor: URL gambar lengkap (siap pakai di blade)
    public function getGambarUrlAttribute(): ?string
    {
        return $this->gambar
            ? asset('storage/' . $this->gambar)
            : null;
    }
}