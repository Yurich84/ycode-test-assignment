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
        $rules = [
            'email' => ['required', 'string'],
            'phone' => ['sometimes'],
            'address1' => ['required', 'string'],
            'address2' => ['required', 'string'],
            'city' => ['required', 'string'],
            'country' => ['required', 'string'],
            'state' => ['required', 'string'],
            'zip' => ['required'],
            'shipping' => ['required'],
            'subtotal' => ['required'],
            'total' => ['required'],
        ];

        if ($this->comeFromRequest) {
            $rules = [
                ...$rules,
                'first_name' => ['required', 'string'],
                'last_name' => ['required', 'string'],
            ];
        } elseif ($this->comeFromYcode) {
            $rules = [
                ...$rules,
                'id' => ['string'],
                'ycode_id' => ['string'],
                'customer_name' => ['string'],
                'name' => ['string'],
                'slug' => ['string'],
                'created_at' => ['string'],
                'updated_at' => ['string'],
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
            'customer_name' => $this->customer_name ?? $this->data['customer_name'] ?? ($this->first_name.' '.$this->last_name),
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
