<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Address'=>$this->faker->address(),
            'zip_code'=>$this->faker->postcode(),
            'users_id'=>User::all()->random()->id,
        ];
    }
}
