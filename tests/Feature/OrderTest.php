<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Order;
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

        $data = Order::factory()->make()->toArray();

        $data['products'] = $products;
        $data['first_name'] = fake()->firstName;
        $data['last_name'] = fake()->lastName;

        $this->postJson(route('orders.store'), $data)
            ->assertSuccessful();

        unset($data['products']);
        unset($data['first_name']);
        unset($data['last_name']);

        $this->assertDatabaseHas('orders', $data);
    }

    public function test_order_sending_validation_error(): void
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
            'phone' => fake()->phoneNumber,
            'address1' => fake()->streetAddress,
            'address2' => (string) fake()->numberBetween(1, 99),
            'city' => fake()->city,
            'country' => fake()->country,
        ];

        $this->postJson(route('orders.store'), $data)
            ->assertStatus(422)
            ->assertJsonValidationErrorFor('email')
            ->assertJsonValidationErrorFor('subtotal')
            ->assertJsonValidationErrorFor('total')
            ->assertJsonFragment(['email' => ['The email field is required.']]);

        unset($data['products']);
        unset($data['first_name']);
        unset($data['last_name']);

        $this->assertDatabaseMissing('orders', $data);
    }
}
