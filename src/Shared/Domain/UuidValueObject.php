<?php

namespace Fitpal\Shared\Domain;

use Illuminate\Support\Str;

class UuidValueObject extends StringValueObject
{
    public static function generate(): string
    {
        return Str::uuid()->toString();
    }
}
