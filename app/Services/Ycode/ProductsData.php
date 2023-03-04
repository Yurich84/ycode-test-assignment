<?php

namespace App\Services\Ycode;

class ProductsData extends ItemDataAbstract
{
    public function __construct()
    {
        parent::__construct();
        $this->collection_id = config('ycode.collections.products');
    }
}
