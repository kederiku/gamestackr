<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Source>
 */
class SourceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'link' => $this->faker->url(),
            'link_rss' => $this->faker->url(),
            'icon' => $this->faker->imageUrl(),
            'is_activated' => $this->faker->boolean(10)

        ];
    }
}