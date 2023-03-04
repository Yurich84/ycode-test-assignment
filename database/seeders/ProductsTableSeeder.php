<?php

namespace Database\Seeders;

use App\DTOs\ProductDTO;
use App\Models\Product;
use App\Services\Ycode\ProductsData;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products_data = (new ProductsData)->list();

        foreach ($products_data->data as $product) {
            ProductDTO::fromYcode($product)->toModel(Product::class)->save();
        }
    }
}
