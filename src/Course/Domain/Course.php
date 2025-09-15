<?php

namespace Fitpal\Course\Domain;

use DateTimeImmutable;
use Fitpal\User\Domain\UserId;

class Course
{
    public function __construct(
        private CourseId $id,
        private CourseName $name,
        private CourseDescription $description,
        private CourseDuration $duration,
        private DateTimeImmutable $startsAt,
        private UserId $createdBy
    ) {}

    public static function fromPrimitives(
        string $id,
        string $name,
        string $description,
        int $duration,
        DateTimeImmutable $startsAt,
        string $createdBy
    ): self {
        return new self(
            new CourseId($id),
            new CourseName($name),
            new CourseDescription($description),
            new CourseDuration($duration),
            $startsAt,
            new UserId($createdBy)
        );
    }

    public function id(): CourseId
    {
        return $this->id;
    }

    public function name(): CourseName
    {
        return $this->name;
    }

    public function description(): CourseDescription
    {
        return $this->description;
    }

    public function duration(): CourseDuration
    {
        return $this->duration;
    }

    public function startsAt(): DateTimeImmutable
    {
        return $this->startsAt;
    }

    public function createdBy(): UserId
    {
        return $this->createdBy;
    }

    public function toPrimitives(): array
    {
        return [
            'id' => $this->id->value(),
            'name' => $this->name->value(),
            'description' => $this->description->value(),
            'duration' => $this->duration->value(),
            'startsAt' => $this->startsAt->format('Y-m-d H:i:s'),
            'createdBy' => $this->createdBy->value()
        ];
    }
}
