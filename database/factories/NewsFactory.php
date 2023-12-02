<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'image' => $this->faker->imageUrl(),
            'link' => $this->faker->url() . $this->faker->uuid(),
            'description' => $this->faker->text(100),
            'published_at' => $this->faker->dateTimeBetween('-1 Week', '+1 week'),
        ];
    }
}