<?php

namespace App\Models;

use App\Models\SeedLot;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Productor extends Authenticatable implements JWTSubject
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
        'profile'

    ];


    public function seedLots()
    {
        return $this->hasMany(SeedLot::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

}
