<?php

namespace Fitpal\Shared\Domain;

abstract class StringValueObject
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(StringValueObject $other): bool
    {
        return $this->value === $other->value();
    }
}
