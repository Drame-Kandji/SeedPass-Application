<?php

namespace App\Models;

use App\Models\SeedLot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Productor extends Authenticatable
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


    public function seedLots()
    {
        return $this->hasMany(SeedLot::class);
    }

}
