<?php

namespace App\Http\Controllers;

use App\DTOs\OrderDTO;
use Illuminate\Http\Request;
class OrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $orderDTO = OrderDTO::fromRequest($request);
    }
}

