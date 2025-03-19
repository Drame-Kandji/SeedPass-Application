<?php

namespace Database\Seeders;

use App\Models\Famer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FamerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Créer 10 famers
        Famer::factory()->count(10)->create();
    }
}
