<?php

namespace App\DTOs;

class OrderDTO extends YcodeDTO
{
    const KEY_MAPPING = [
        'id' => 'ID',
        'ycode_id' => '_ycode_id',
        'name' => 'Name',
        'slug' => 'Slug',
        'created_at' => 'Created date',
        'updated_at' => 'Updated date',
        'subtotal' => 'Subtotal',
        'shipping' => 'Shipping',
        'customer_name' => 'Customer name',
        'email' => 'Email',
        'phone' => 'Phone',
        'address1' => 'Address line 1',
        'address2' => 'Address line 2',
        'city' => 'City',
        'country' => 'Country',
        'state' => 'State',
        'zip' => 'ZIP',
        'total' => 'Total',
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
            'subtotal' => ['required', 'string'],
            'shipping' => ['string'],
            'customer_name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'address1' => ['required', 'string'],
            'address2' => ['string'],
            'city' => ['required', 'string'],
            'country' => ['required', 'string'],
            'state' => ['required', 'string'],
            'zip' => ['required', 'string'],
            'total' => ['required', 'string'],
        ];
    }

    /**
     * Defines the default values for the properties of the DTO.
     *
     * @return array
     */
    protected function defaults(): array
    {
        return [];
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
