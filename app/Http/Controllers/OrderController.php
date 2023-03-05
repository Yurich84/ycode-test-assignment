<?php

namespace App\Http\Controllers;

use App\DTOs\OrderDTO;
use App\DTOs\OrderItemDTO;
use App\Jobs\SendOrderJob;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
class OrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $orderDTO = OrderDTO::fromRequest($request);
        $order = $orderDTO->toModel(Order::class);
        $order->customer_name = ucfirst($orderDTO->first_name).' '.ucfirst($orderDTO->last_name);
        $order->save();

        foreach ($orderDTO->data['products'] as $orderItem) {
            $orderItemDTO = new OrderItemDTO([
                'product_id' => $orderItem['id'],
                'order_id' => $order->id,
                'quantity' => $orderItem['count'],
            ]);
            $orderItemDTO->toModel(OrderItem::class)->save();
        }

        SendOrderJob::dispatch($order);
    }
}
