<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_product_list(): void
    {
        Product::factory(7)->create();

        $this->getJson(route('products.index'))
            ->assertSuccessful()
            ->assertJsonStructure(['*' => ['name', 'color', 'image', 'price']]);
    }
}
