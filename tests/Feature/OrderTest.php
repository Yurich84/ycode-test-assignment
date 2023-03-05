<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class OrderTest extends TestCase
{
    public function test_order_sending(): void
    {
        Http::fake(fn () => Http::response(['_ycode_id' => 123]));

        $products = Product::factory(2)->create()->map(function ($product) {
            $product->count = 2;
            $product->total = $product->count * $product->price;

            return $product;
        });

        $data = [
            'products' => $products,
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'email' => fake()->email,
            'phone' => fake()->phoneNumber,
            'address1' => fake()->streetAddress,
            'address2' => (string) fake()->numberBetween(1, 99),
            'city' => fake()->city,
            'country' => fake()->country,
            'state' => fake()->word,
            'zip' => fake()->word,
            'shipping' => 5,
            'subtotal' => $products->sum(fn($p) => $p->price),
            'total' => $products->sum(fn($p) => $p->price) + 5,
        ];

        $this->postJson(route('orders.store'), $data)
            ->assertSuccessful();
    }
}
