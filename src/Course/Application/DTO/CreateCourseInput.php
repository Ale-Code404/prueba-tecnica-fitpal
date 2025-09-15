<?php

namespace Fitpal\Course\Application\DTO;

use DateTimeImmutable;
use Fitpal\User\Domain\UserId;

use Fitpal\Course\Domain\{
    CourseDescription,
    CourseDuration,
    CourseId,
    CourseName
};

class CreateCourseInput
{
    public function __construct(
        public readonly CourseId $id,
        public readonly CourseName $name,
        public readonly CourseDescription $description,
        public readonly CourseDuration $duration,
        public readonly DateTimeImmutable $startsAt,
        public readonly UserId $createdBy
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
}
