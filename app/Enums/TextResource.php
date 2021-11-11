<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class TextResource extends Enum implements LocalizedEnum
{
    public const TEST = 'test';
    public const ANOTHER = 'another';

    public function toArray()
    {
        return $this;
    }
}
