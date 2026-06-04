<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminDataDokter extends Model
{
    use HasFactory;

    protected $table = 'admin_data_dokters';

    protected $fillable = [
        'nama',
        'spesialis',
        'foto',
        'deskripsi',
    ];

    /**
     * Accessor: URL foto dokter
     * Otomatis handle null & path storage
     */
    public function getFotoUrlAttribute(): ?string
    {
        if (!$this->foto) {
            return null;
        }

        return asset('storage/' . $this->foto);
    }
}