<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminDataDokter extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'spesialis',
        'foto',
        'deskripsi'
    ];
}