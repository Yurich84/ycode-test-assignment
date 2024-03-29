<?php

namespace App\DTOs;

use App\Models\Order;
use App\Models\Product;
use WendellAdriel\ValidatedDTO\Casting\IntegerCast;

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
        $rules = [
            'quantity' => ['required', 'numeric'],
        ];

        if ($this->comeFromYcode) {
            $rules = [
                ...$rules,
                'id' => ['required', 'string'],
                'ycode_id' => ['required', 'string'],
                'slug' => ['required', 'string'],
                'name' => ['required', 'string'],
                'product' => ['required', 'string'],
                'order' => ['required', 'string'],
                'created_at' => ['required', 'string'],
                'updated_at' => ['required', 'string'],
            ];
        } else {
            $rules = [
                ...$rules,
                'product_id' => ['required', 'numeric'],
                'order_id' => ['required', 'numeric'],
            ];
        }

        return $rules;
    }

    /**
     * Defines the default values for the properties of the DTO.
     *
     * @return array
     */
    protected function defaults(): array
    {
        return [
            'product_id' => $this->product_id ?? Product::where('ycode_id', $this->product)->first()->id,
            'order_id' => $this->order_id ?? Order::where('ycode_id', $this->order)->first()->id,
            'product' => $this->product ?? Product::find($this->product_id)->ycode_id,
            'order' => $this->order ?? Order::find($this->order_id)->ycode_id
        ];
    }

    /**
     * Defines the type casting for the properties of the DTO.
     *
     * @return array
     */
    protected function casts(): array
    {
        return [
            'id' => new IntegerCast(),
        ];
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
