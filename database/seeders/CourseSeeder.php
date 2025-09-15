<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Database\Factories\CourseFactory;
use Illuminate\Database\Seeder;

use Fitpal\Course\Application\{
    DTO\CreateCourseInput,
    CreateCourse
};

class CourseSeeder extends Seeder
{
    public function __construct(private CreateCourse $createCourse) {}

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (CourseFactory::times(100)->raw() as $data) {
            $this->createCourse->__invoke(
                CreateCourseInput::fromPrimitives(
                    id: $data['id'],
                    name: $data['title'],
                    description: $data['description'],
                    duration: $data['duration'],
                    startsAt: Carbon::parse($data['starts_at'])->toImmutable(),
                    createdBy: $data['created_by']
                )
            );
        }
    }
}
