<?php

namespace Fitpal\Course\Application;

use Fitpal\Course\Application\DTO\GetCoursesInput;
use Fitpal\Course\Domain\CourseRepository;
use Fitpal\Shared\Domain\PaginatedResult;

class GetCourses
{
    public function __construct(private CourseRepository $courseRepository) {}

    public function __invoke(GetCoursesInput $input): PaginatedResult
    {
        return $this->courseRepository->list($input->page);
    }
}
