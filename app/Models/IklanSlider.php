<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IklanSlider extends Model
{
    protected $table = 'iklan_sliders';

    protected $fillable = [
        'gambar',
    ];
}
