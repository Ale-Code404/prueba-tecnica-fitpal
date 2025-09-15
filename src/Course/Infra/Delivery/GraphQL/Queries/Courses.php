<?php

namespace Fitpal\Course\Infra\Delivery\GraphQL\Queries;

use Fitpal\Course\Domain\{
    Course,
    CourseRepository
};

class Courses
{
    public function __construct(private CourseRepository $courseRepository) {}

    public function __invoke(mixed $root, array $args): array
    {
        $courses = $this->courseRepository->list(
            $args['page']
        );

        return array_map(
            fn(Course $course) => $course->toPrimitives(),
            $courses->items
        );
    }
}
