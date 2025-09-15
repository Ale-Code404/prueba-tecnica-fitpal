<?php

namespace Fitpal\Course\Domain;

use Fitpal\Shared\Domain\StringValueObject;
use InvalidArgumentException;

class CourseName extends StringValueObject
{
    public function __construct(string $value)
    {
        if (strlen($value) < 5 || strlen($value) > 100) {
            throw new InvalidArgumentException('Course name must be between 5 and 100 characters');
        }

        parent::__construct($value);
    }
}
