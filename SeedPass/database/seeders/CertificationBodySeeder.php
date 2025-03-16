<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CertificationBody;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CertificationBodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Créer 10 organismes de certification
        CertificationBody::factory()->count(10)->create();
    }
}
