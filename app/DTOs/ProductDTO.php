<?php

namespace App\DTOs;

use WendellAdriel\ValidatedDTO\Casting\IntegerCast;

class ProductDTO extends YcodeDTO
{
    const KEY_MAPPING = [
        'id' => 'ID',
        'ycode_id' => '_ycode_id',
        'name' => 'Name',
        'slug' => 'Slug',
        'created_at' => 'Created date',
        'updated_at' => 'Updated date',
        'color' => 'Color',
        'price' => 'Price',
        'image' => 'Image',
    ];

    /**
     * Defines the validation rules for the DTO.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'id' => ['required'],
            'ycode_id' => ['required'],
            'name' => ['required'],
            'slug' => ['string'],
            'color' => ['string'],
            'image' => ['string'],
            'price' => ['required'],
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
        return [
            'price' => new IntegerCast(),
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
