<?php

namespace Database\Factories;

use App\Models\Famer;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Famer>
 */
class FamerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Famer::class;

    public function definition()
    {
        return [
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'cni' => $this->faker->randomNumber(8),
            'email' => $this->faker->unique()->safeEmail,
            'organisation' => $this->faker->company,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'identificationNumber' => Str::random(10),
            'password' => Hash::make('password'),
            'isAcceptedCondition' => $this->faker->boolean,
            'isAcceptedBiometric' => $this->faker->boolean,
        ];
    }
}
