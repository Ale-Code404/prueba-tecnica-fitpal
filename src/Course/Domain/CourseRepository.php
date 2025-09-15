<?php

namespace Fitpal\Course\Domain;

use Fitpal\Shared\Domain\PaginatedResult;

interface CourseRepository
{
    public function list(int $page): PaginatedResult;

    public function save(Course $course): void;
}
