<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'alamat', 'wajib_pajak', 'telepon', 'lat', 'lng', 'foto', 'status'];

    protected $casts = [
        'wajib_pajak' => 'boolean',
    ];
}
