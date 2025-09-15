<?php

namespace Fitpal\Course\Infra\Persistence;

use App\Models\Course as EloquentCourseModel;
use Carbon\Carbon;
use Fitpal\Shared\Domain\PaginatedResult;

use Fitpal\Course\Domain\{
    Course,
    CourseRepository
};

class EloquentCourseRepository implements CourseRepository
{
    /**
     * @return Course[]
     */
    public function list(int $page): PaginatedResult
    {
        $items =  EloquentCourseModel::query()
            ->paginate(10, ['*'], 'page', $page);

        $courses = array_map(
            fn(EloquentCourseModel $model) => $this->toEntity($model),
            $items->items()
        );

        return new PaginatedResult(
            $courses,
            $items->currentPage(),
            $items->lastPage(),
            $items->total()
        );
    }

    public function save(Course $course): void
    {
        EloquentCourseModel::query()->create([
            'id' => $course->id()->value(),
            'title' => $course->name()->value(),
            'description' => $course->description()->value(),
            'duration' => $course->duration()->value(),
            'starts_at' => $course->startsAt(),
            'created_by' => $course->createdBy()->value()
        ]);
    }

    private function toEntity(EloquentCourseModel $model): Course
    {
        return Course::fromPrimitives(
            $model->id,
            $model->title,
            $model->description,
            $model->duration,
            Carbon::parse($model->starts_at)->toImmutable(),
            $model->created_by
        );
    }
}
