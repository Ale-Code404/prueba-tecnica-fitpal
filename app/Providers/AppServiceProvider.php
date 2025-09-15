<?php

namespace App\Providers;

use Fitpal\Auth\Domain\AuthManager;
use Fitpal\Auth\Infra\Persistence\PassportAuthManager;
use Fitpal\Course\Domain\CourseRepository;
use Fitpal\Course\Infra\Persistence\EloquentCourseRepository;
use Fitpal\User\Domain\UserRepository;
use Fitpal\User\Infra\Persistence\EloquentUserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(CourseRepository::class, EloquentCourseRepository::class);
        $this->app->bind(AuthManager::class, PassportAuthManager::class);
    }
}
