<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Course\CourseRepositoryInterface;
use App\Repository\Course\EloquentCourseRepository;
use App\Repository\Lesson\EloquentLessonRepository;
use App\Repository\Lesson\LessonRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CourseRepositoryInterface::class, EloquentCourseRepository::class);
        $this->app->bind(LessonRepositoryInterface::class, EloquentLessonRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
