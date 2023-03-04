<?php

namespace App\Contracts;

use stdClass;

interface ToYcode
{
    const KEY_MAPPING = [];

    public function toYcode(): array;

    public static function fromYcode(stdClass $data): self;
}
