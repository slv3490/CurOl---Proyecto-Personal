<?php

namespace App\Repository\Lesson;

use App\Models\Course;
use App\Models\Lesson;
use App\Http\Requests\LessonRequest;
use Illuminate\Database\Eloquent\Collection;

interface LessonRepositoryInterface {

    /**
     * 
     * 
     */
    public function getByCourseId(int $id): Collection;

    /**
     * 
     * 
     */
    public function createLesson(LessonRequest $request, Course $course): Lesson;

    public function find(int $id): Lesson;
}