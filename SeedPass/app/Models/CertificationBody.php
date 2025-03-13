<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificationBody extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'location',
        'identificationNumber',
        'emailAddress',
        'phoneNumber',
        'password'

    ];

    public function seed_lots()
    {
        return $this->hasMany(SeedLot::class);
    }
}
