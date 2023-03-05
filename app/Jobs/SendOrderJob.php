<?php

namespace App\Jobs;

use App\DTOs\OrderDTO;
use App\DTOs\OrderItemDTO;
use App\Models\Order;
use App\Models\OrderItem;
use App\Services\Ycode\OrderItemsData;
use App\Services\Ycode\OrdersData;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendOrderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private Order $order)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $responseOrder = (new OrdersData())->create(OrderDTO::fromModel($this->order)->toYcode());
        $this->order->forceFill(['ycode_id' => $responseOrder->_ycode_id])->save();

        foreach ($this->order->items as $orderItem) {
            $responseOrderItem = (new OrderItemsData())->create(OrderItemDTO::fromModel($orderItem)->toYcode());
            $orderItem->forceFill(['ycode_id' => $responseOrderItem->_ycode_id])->save();
        }
    }
}
