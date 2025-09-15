<?php

namespace Tests;

use Fitpal\User\Domain\UserRepository;
use Fitpal\User\Infra\Persistence\InMemoryUserRepository;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->app->bind(UserRepository::class, InMemoryUserRepository::class);

        $this->withHeaders([
            'Accept' => 'application/json'
        ]);
    }
}
