<?php

namespace Fitpal\Course\Domain;

use Fitpal\Shared\Domain\StringValueObject;
use InvalidArgumentException;

class CourseDescription extends StringValueObject
{
    public function __construct(string $value)
    {
        if (strlen($value) < 10 || strlen($value) > 200) {
            throw new InvalidArgumentException('Course description must be between 10 and 200 characters');
        }

        parent::__construct($value);
    }
}
