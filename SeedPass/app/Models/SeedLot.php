<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeedLot extends Model
{
    use HasFactory;

    protected $fillable = [
        'variety',
        'geographicOrigin',
        'yearOfHarvest',
        'processing',
        'certification',
        'germinationQuality',
        'productionSplot',
        'quantityProduced',
        'growingConditions',
        'isCertified',
        'certification_body_id',

    ];

    public function certification_body(){
        return $this->belongsTo(CertificationBody::class);
    }

    public function productor()
    {
        return $this->belongsTo(Productor::class);
    }

    public function alerts()
    {
      return $this->hasMany(Alert::class);
    }

}
