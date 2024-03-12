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
        $typeOptions = ['banner', 'cover', 'widget'];
        $type = $this->faker->unique()->randomElement($typeOptions);
            return [
                'type' => $type,
                'path' => function () use($type) {
                    if ($type == "banner") {return 'https://placehold.co/1440x500';}
                    else                   {return 'https://placehold.co/250x250';}},
                'alt_text' => $this->faker->text(100),
            ];
    }
}
