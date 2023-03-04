<?php

namespace App\Services\Ycode;

class OrderItemsData extends ItemDataAbstract
{
    public function __construct()
    {
        parent::__construct();
        $this->collection_id = config('ycode.collections.order_items');
    }
}
