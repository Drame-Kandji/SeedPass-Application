<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    /** @use HasFactory<\Database\Factories\AlertFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'date'


    ];

    public function famer()
    {
       return $this->belongsTo(Famer::class);
    }
    public function seed_lot()
    {
        return $this->belongsTo(SeedLot::class);
    }
}
