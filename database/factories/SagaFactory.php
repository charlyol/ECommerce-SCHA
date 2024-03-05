<?php

namespace Database\Factories;

use App\Models\Saga;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Saga>
 */
class SagaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>$this->faker->title(),
            'description'=>$this->faker->paragraph()
        ];
    }
}
