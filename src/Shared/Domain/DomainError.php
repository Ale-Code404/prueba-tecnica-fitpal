<?php

namespace Fitpal\Shared\Domain;

use RuntimeException;

abstract class DomainError extends RuntimeException
{
    abstract public function code(): string;
}
