<?php

namespace App\DTOs;

use App\Models\Order;
use App\Models\Product;

class OrderItemDTO extends YcodeDTO
{
    const KEY_MAPPING = [
        'id' => 'ID',
        'ycode_id' => '_ycode_id',
        'name' => 'Name',
        'slug' => 'Slug',
        'created_at' => 'Created date',
        'updated_at' => 'Updated date',
        'product' => 'Product',
        'quantity' => 'Quantity',
        'order' => 'Order',
    ];

    /**
     * Defines the validation rules for the DTO.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'id' => ['required', 'string'],
            'ycode_id' => ['required', 'string'],
            'name' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'created_at' => ['required', 'string'],
            'updated_at' => ['required', 'string'],
            'product' => ['required', 'string'],
            'quantity' => ['required', 'numeric'],
            'order' => ['required', 'string'],
        ];
    }

    /**
     * Defines the default values for the properties of the DTO.
     *
     * @return array
     */
    protected function defaults(): array
    {
        return [
            'product_id' => Product::where('ycode_id', $this->product)->first()->id,
            'order_id' => Order::where('ycode_id', $this->order)->first()->id
        ];
    }

    /**
     * Defines the type casting for the properties of the DTO.
     *
     * @return array
     */
    protected function casts(): array
    {
        return [];
    }

    /**
     * Defines the custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [];
    }

    /**
     * Defines the custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [];
    }
}
