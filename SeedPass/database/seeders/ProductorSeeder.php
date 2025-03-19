<?php

namespace Database\Seeders;

use App\Models\Productor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Créer 10 producteurs
        Productor::factory()->count(10)->create();
    }
}
