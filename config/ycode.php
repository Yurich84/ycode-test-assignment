<?php

return [

    'url' => env('YCODE_API_URL', 'https://app.ycode.com/api/v1/'),

    'token' => env('YCODE_API_TOKEN'),


    'collections' => [
        'products' => env('YCODE_PRODUCTS_COLLECTION', '63f52cf7b1c03'),
        'orders' => env('YCODE_ORDERS_COLLECTION', '63f52de51fbf4'),
        'order_items' => env('YCODE_ORDER_ITEMS_COLLECTION', '63f52df2283b1'),
    ],


];
