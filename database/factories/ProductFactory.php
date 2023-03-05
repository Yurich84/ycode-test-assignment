<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ycode_id' => $this->faker->uuid,
            'name' => $this->faker->word,
            'color' => $this->faker->colorName,
            'price' => $this->faker->numberBetween(20, 50),
            'image' => $this->faker->imageUrl,
        ];
    }
}
