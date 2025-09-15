<?php

namespace Fitpal\Course\Application\DTO;

class GetCoursesInput
{
    public function __construct(public int $page) {}
}
