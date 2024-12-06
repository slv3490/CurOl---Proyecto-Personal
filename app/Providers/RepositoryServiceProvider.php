<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Course\CourseRepositoryInterface;
use App\Repository\Course\EloquentCourseRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CourseRepositoryInterface::class, EloquentCourseRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
