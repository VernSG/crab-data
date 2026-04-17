<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatchRecord extends Model
{
    protected $fillable = [
        'tanggal_masehi',
        'tanggal_jawa',
        'lokasi_blok',
        'hasil_kg',
    ];

    protected $casts = [
        'tanggal_masehi' => 'date',
        'hasil_kg' => 'decimal:2',
    ];
}
