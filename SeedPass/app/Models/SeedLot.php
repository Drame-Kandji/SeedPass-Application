<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'productor_id',
        'lot_number',
        'image',
        'qr_code'

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


    public static function generateUniqueLotNumber()
    {
        do {
            $lotNumber = 'LOT-' . strtoupper(Str::random(8)); // Exemple : LOT-AB12CD34
        } while (self::where('lot_number', $lotNumber)->exists());

        return $lotNumber;
    }


}
