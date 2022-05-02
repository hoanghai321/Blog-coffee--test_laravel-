<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text,
            'image' => $this->faker->imageUrl(),
            'short_desc' => $this->faker->text,
            'desc' => $this->faker->text,
            'post_category_id' => $this->faker->randomNumber(1),
        ];
    }
}
