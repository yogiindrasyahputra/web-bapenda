<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;

    protected $fillable = ['hotel_id', 'status', 'catatan', 'waktu'];

    protected $casts = ['waktu' => 'datetime'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
