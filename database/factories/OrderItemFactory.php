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
        $book = Book::factory()->create();
        return [
            'id'=>fake()->uuid(),
            'order_id'=>Order::all()->random()->id,
            'quantity' => fake()->numberBetween(1,50),
            'price_wt' => $book->price_wt,
            'title'=>$book->title,
        ];
    }
}
