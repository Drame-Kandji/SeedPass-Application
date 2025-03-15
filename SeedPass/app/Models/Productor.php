<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productor extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstName',
        'lastName',
        'cni',
        'email',
        'organisation',
        'address',
        'phone',
        'identificationNumber',
        'password',
        'isAcceptedCondition',
        'isAcceptedBiometric',
    ];

    public function seed_lots()
    {
       return $this->hasMany(SeedLot::class);
    }
}
