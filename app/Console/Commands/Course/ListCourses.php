<?php

namespace App\Console\Commands\Course;

use Fitpal\Course\Domain\Course;
use Illuminate\Console\Command;

use Fitpal\Course\Application\{
    DTO\GetCoursesInput,
    GetCourses
};

class ListCourses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:course';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Paginate and list all courses';

    /**
     * Execute the console command.
     */
    public function handle(GetCourses $getCourses)
    {
        $page = 1;
        $courses = $getCourses->__invoke(
            new GetCoursesInput($page)
        );

        $this->info("There is {$courses->total} courses in total.");

        while ($courses->lastPage >= $page) {
            $this->table(
                ['ID', 'Title'],
                array_map(fn(Course $course) => [
                    'ID' => $course->id()->value(),
                    'Title' => $course->name()->value()
                ], $courses->items)
            );

            if ($courses->lastPage === $page) {
                break;
            }

            if (! $this->confirm('Do you want to see the next page?')) {
                break;
            }

            $page++;
            $courses = $getCourses->__invoke(
                new GetCoursesInput($page)
            );
        }
    }
}
