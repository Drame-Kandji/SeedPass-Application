<?php

namespace App\Models;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Distributor extends Authenticatable implements JWTSubject
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

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

}
