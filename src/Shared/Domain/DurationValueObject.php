<?php

namespace Fitpal\Shared\Domain;

use DateInterval;

class DurationValueObject
{
    protected int $seconds;

    public function __construct(int $seconds)
    {
        $this->seconds = $seconds;
    }

    public static function fromSeconds(int $seconds): self
    {
        return new self($seconds);
    }

    public static function fromMinutes(int $minutes): self
    {
        return new self($minutes * 60);
    }

    public static function fromDays(int $days): self
    {
        return new self($days * 86400);
    }

    public function value(): int
    {
        return $this->seconds;
    }

    public function toDateInterval(): DateInterval
    {
        return new DateInterval('PT' . $this->seconds . 'S');
    }
}
