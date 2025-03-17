<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\CertificationBody;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CertificationBody>
 */
class CertificationBodyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = CertificationBody::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->sentence,
            'location' => $this->faker->address,
            'identificationNumber' => Str::random(10),
            'emailAddress' => $this->faker->unique()->safeEmail,
            'phoneNumber' => $this->faker->phoneNumber,
            'password' => Hash::make('password')
        ];
    }
}
