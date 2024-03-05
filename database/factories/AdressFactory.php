<?php

namespace Database\Factories;

use App\Models\Adress;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Adress>
 */
class AdressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'adress'=>$this->faker->address(),
            'zip_code'=>$this->faker->postcode(),
            'users_id'=>User::all()->random()->id,
        ];
    }
}
