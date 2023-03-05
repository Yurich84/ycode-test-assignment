<?php

namespace App\DTOs;

use App\Contracts\ToYcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use WendellAdriel\ValidatedDTO\Exceptions\CastTargetException;
use WendellAdriel\ValidatedDTO\Exceptions\MissingCastTypeException;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

abstract class YcodeDTO extends ValidatedDTO implements ToYcode
{
    public function __construct(
        array $data,
        public bool $comeFromYcode = false,
        public bool $comeFromRequest = false,
    )
    {
        parent::__construct($data);
    }

    /**
     * Returns the DTO validated data in Ycode format.
     *
     * @return array
     */
    public function toYcode(): array
    {
        $ycode_data = [];

        foreach (static::KEY_MAPPING as $model_key => $ycode_key) {
            if (isset($this->validatedData[$model_key])) {
                $ycode_data[$ycode_key] = $this->validatedData[$model_key];
            }
        }
        return $ycode_data;
    }

    /**
     * Creates a DTO instance from a valid Ycode data.
     *
     * @param  \stdClass  $data
     * @return static
     * @throws \Illuminate\Validation\ValidationException
     * @throws \WendellAdriel\ValidatedDTO\Exceptions\CastTargetException
     * @throws \WendellAdriel\ValidatedDTO\Exceptions\MissingCastTypeException
     */
    public static function fromYcode(\stdClass $data): self
    {
        $new_data = [];

        foreach (static::KEY_MAPPING as $model_key => $ycode_key) {
            $new_data[$model_key] = $data->{$ycode_key};
        }

        return new static($new_data, true);
    }

    /**
     * Creates a DTO instance from a Request.
     *
     * @param  Request  $request
     * @return $this
     *
     * @throws ValidationException|MissingCastTypeException|CastTargetException
     */
    public static function fromRequest(Request $request): self
    {
        return new static($request->all(), false, true);
    }
}
