<?php

namespace Database\Seeders;

use App\DTOs\OrderDTO;
use App\Models\Order;
use App\Services\Ycode\OrdersData;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders_data = (new OrdersData())->list();

        foreach ($orders_data->data as $order) {
            OrderDTO::fromYcode($order)->toModel(Order::class)->save();
        }
    }
}
