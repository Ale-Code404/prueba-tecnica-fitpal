<?php

namespace Fitpal\Course\Infra\Delivery\GraphQL\Mutations;

use Carbon\Carbon;
use Fitpal\Auth\Application\GetCurrentUser;
use Fitpal\Course\Domain\CourseId;

use Fitpal\Course\Application\{
    DTO\CreateCourseInput,
    CreateCourse as CreateCourseAction
};

class CreateCourse
{
    public function __construct(private CreateCourseAction $createCourse, private GetCurrentUser $getCurrentUser) {}

    public function __invoke($root, array $args): array
    {
        $user = $this->getCurrentUser->__invoke();

        $course = $this->createCourse->__invoke(
            CreateCourseInput::fromPrimitives(
                id: CourseId::generate(),
                name: $args['name'],
                description: $args['description'],
                duration: $args['duration'],
                startsAt: Carbon::parse($args['startsAt'])->toImmutable(),
                createdBy: $user->id()->value(),
            )
        );

        return $course->toPrimitives();
    }
}
