<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type'=>$this->faker->userName(),
            'path'=>function () {
                return 'https://via.placeholder.com/300x200';
            },
            'alt_text'=>$this->faker->text(100)
        ];
    }
}
