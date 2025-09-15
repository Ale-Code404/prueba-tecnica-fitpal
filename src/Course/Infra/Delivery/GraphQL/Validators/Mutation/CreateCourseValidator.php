<?php

namespace Fitpal\Course\Infra\Delivery\GraphQL\Validators\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

class CreateCourseValidator extends Validator
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:5', 'max:100'],
            'description' => ['required', 'string', 'min:10', 'max:200'],
            'duration' => ['required', 'integer'],
            'startsAt' => ['required', 'date', 'after:now'],
        ];
    }
}
