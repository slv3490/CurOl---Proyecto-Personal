<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\Auth;
use App\Repository\Course\CourseRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function __construct(private CourseRepositoryInterface $repository) {}
    
    public function cursos(Request $request): View
    {
        $categories = Category::all();

        $courses = $this->repository->courseSearchAndFilter($request);

        return view("cursos", [
            "courses" => $courses,
            "categories" => $categories,
        ]);
    }

    public function index(): View {
        $user = Auth::user();
        $courses = $this->repository->whereWithPerPage("user_id", $user->id, 10);

        return view("user.dashboard.courses.index", [
            "title" => "Courses",
            "courses" => $courses
        ]);
    }

    public function createCourses(): View {
        return view("user.dashboard.courses.create-courses", [
            "title" => "Courses"
        ]);
    }

    public function storeCourses(CourseRequest $request): RedirectResponse {
        //Save the image and create the course
        $course = $this->repository->createCourse($request);

        if($course) {
            return redirect()->route("course.index");
        }

        return redirect()->back()->withInput()->withErrors("Failed to create the course.");
    }

    public function showCourses(Course $course): View {
        return view("user.dashboard.courses.update-courses", [
            "course" => $course,
            "title" => "Course"
        ]);
    }

    public function updateCourses(CourseRequest $request, Course $course): RedirectResponse {
        if($course) {
            //Update the image and the course
            $this->repository->updateCourse($request, $course);

            return redirect()->route("course.index");
        }
        return redirect()->back()->withInput()->withErrors("Failed to update the course.");
    }

    //TODO: it is necessary to do the in case of error
    public function deleteCourses(Course $course): RedirectResponse {
        
        $this->repository->deleteCourse($course);

        return redirect()->route("course.index");
    }

    public function watchCourse($courseUrl, $lesson): View {

        $course = $this->repository->whereWithPerPage("url", $courseUrl);
        $lessonVideo = Lesson::find($lesson);

        return view("user.overview-courses", [
            "course" => $course[0],
            "lessonVideo" => $lessonVideo
        ]);
    }
}
