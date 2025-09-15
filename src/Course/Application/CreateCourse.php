<?php

namespace Fitpal\Course\Application;

use Fitpal\Course\Application\DTO\CreateCourseInput;

use Fitpal\Course\Domain\{
    Course,
    CourseRepository
};

class CreateCourse
{
    public function __construct(private CourseRepository $repository) {}

    public function __invoke(CreateCourseInput $input): Course
    {
        $course = new Course(
            id: $input->id,
            name: $input->name,
            description: $input->description,
            duration: $input->duration,
            startsAt: $input->startsAt,
            createdBy: $input->createdBy
        );

        $this->repository->save($course);

        return $course;
    }
}
