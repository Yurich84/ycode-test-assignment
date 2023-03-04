<?php

namespace Database\Seeders;

use App\DTOs\OrderItemDTO;
use App\Models\OrderItem;
use App\Services\Ycode\OrderItemsData;
use Illuminate\Database\Seeder;

class OrderItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order_items_data = (new OrderItemsData())->list();

        foreach ($order_items_data->data as $order_item) {
            $order_item_collection = collect(OrderItemDTO::fromYcode($order_item)->toArray())
                ->except('product', 'order')->toArray();
            OrderItem::create($order_item_collection);
        }
    }
}
