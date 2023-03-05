<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class OrderFactory extends Factory
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
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'address1' => $this->faker->streetAddress,
            'address2' => (string) $this->faker->numberBetween(1, 99),
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'state' => $this->faker->word,
            'zip' => $this->faker->word,
            'shipping' => 5,
            'subtotal' => 15,
            'total' => 15 + 5,
        ];
    }
}
