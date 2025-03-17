<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Famer extends Authenticatable implements JWTSubject
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
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    //Relation entre agriculteur et alerte(Signaler plusieurs alertes)

    public function alerts()
    {
        return $this->hasMany(Alert::class);
    }


}
