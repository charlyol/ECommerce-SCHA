<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AgeClass;
use App\Models\Saga;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'age_class_id'=>AgeClass::all()->random()->id,
            'saga_id'=>Saga::all()->random()->id,
            'title' =>$this->faker->sentence(6, true),
            'description'=>$this->faker->sentences(4, true),
            'summary'=>$this->faker->sentences(2, true),
            'size'=>$this->faker->numberBetween(1,3),
            'page_quantity'=>$this->faker->numberBetween(20,350),
            'price_wt'=>$this->faker->numberBetween(10, 50),
            'weight'=>$this->faker->numberBetween(1, 5),
            'stock'=>$this->faker->numberBetween(0, 500),
        ];
    }
}
