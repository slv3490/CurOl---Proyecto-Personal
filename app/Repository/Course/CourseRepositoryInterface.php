<?php

namespace App\Repository\Course;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Requests\CourseRequest;
use Illuminate\Pagination\LengthAwarePaginator;

interface CourseRepositoryInterface {

    /**
     * It is responsible for filtering by categories or by a search engine.
     * 
     * @param Request $request The request can be category ids or a title
     * @return LengthAwarePaginator The paginated or filtered course.
     */
    public function courseSearchAndFilter(Request $request): LengthAwarePaginator;

    /**
     * Gets a list of courses filtered by a specific condition.
     *
     * @param string $condition1 The name of the column to apply the filter to.
     * @param string|int $condition2 The value to compare in the condition.
     * @param int|null $perPage Number of results per page for pagination. If null, all results are returned.
     *
     * @return LengthAwarePaginator A complete collection of results or a pagination, depending on the value of $perPage.
     */

    public function courseWhere(string $condition1, string|int $condition2, ?int $perPage): Collection|LengthAwarePaginator;

    /**
     * It is responsible for creating a course and adding the corresponding categories to the course.
     * 
     * @param CourseRequest $request The information needed to create the request, such as its title, description, price, image, etc.
     * @return Course Course information.
     */
    public function createCourse(CourseRequest $request): Course;

    /**
     * Updates the image associated with the given course.
     *
     * If a new image is provided in the request, the previous image (if any) will be deleted
     * and the new image will be saved. Otherwise, the existing image URI is retained.
     *
     * @param Request $request The HTTP request containing the new image (optional).
     * @param Course $course  The course model to update the image for.
     *
     * @return string The name or path of the image to be stored in the database.
     */

    public function updateCourse(CourseRequest $request, $course): void;

    /**
     * Deletes the given course from the database.
     *
     * This method performs the following actions:
     * - Deletes the associated image file if it exists.
     * - Detaches all related categories.
     * - Deletes the course record.
     *
     * @param Course $course The course model instance to be deleted.
     *
     * @return void
     */

    public function deleteCourse(Course $course): void;

}