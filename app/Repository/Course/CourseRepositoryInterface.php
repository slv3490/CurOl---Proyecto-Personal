<?php

namespace App\Repository\Course;

use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
use App\Models\Course;

interface CourseRepositoryInterface {
    public function courseSearchAndFilter(Request $request);

    public function courseWhere(string $condition1, string|int $condition2, $perPage);

    public function createCourse(CourseRequest $request);

    public function updateCourse(CourseRequest $request, $course);

    public function deleteCourse(Course $course);

    public function findSpecifiedCourse($condition1, $condition2, $id);
}