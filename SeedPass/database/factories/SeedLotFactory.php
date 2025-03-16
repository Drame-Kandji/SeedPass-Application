<?php

namespace Database\Factories;

use App\Models\SeedLot;
use App\Models\Productor;
use App\Models\CertificationBody;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SeedLot>
 */
class SeedLotFactory extends Factory
{
    protected $model = SeedLot::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'variety' => $this->faker->word,
            'geographicOrigin' => $this->faker->country,
            'yearOfHarvest' => $this->faker->year,
            'processing' => $this->faker->word,
            'certification' => $this->faker->word,
            'germinationQuality' => $this->faker->word,
            'productionSplot' => $this->faker->word,
            'quantityProduced' => $this->faker->numberBetween(100, 1000),
            'growingConditions' => $this->faker->sentence,
            'isCertified' => false,
            'certification_body_id' => CertificationBody::factory(),
            'productor_id' => Productor::factory(),
            'lot_number' => SeedLot::generateUniqueLotNumber(),
            'image' => $this->faker->imageUrl,
            'qr_code' => $this->faker->url,
        ];
    }
}
