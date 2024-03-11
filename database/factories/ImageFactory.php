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
        $typeOptions=['banner', 'cover', 'widget'];
        return [
            'type'=>$this->faker->randomElement($typeOptions),
            'path'=>function () {
                return 'https://placehold.co/250x300';
            },
            'alt_text'=>$this->faker->text(100)
        ];
    }
}
