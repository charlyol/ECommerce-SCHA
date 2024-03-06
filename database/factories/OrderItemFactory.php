<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $price = Book::all()->random()->price_wt;
        return [
            'id'=>fake()->uuid(),
            'order_id'=>Order::all()->random()->id,
            'quantity' => fake()->numberBetween(1,50),
            'price_wt' => $price,
            'title' => Book::where('price_wt', $price)->first()->title,
        ];
    }
}
