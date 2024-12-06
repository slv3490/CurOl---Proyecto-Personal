<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Http\Requests\CourseRequest;
use App\Repository\Course\CourseRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function __construct(private CourseRepositoryInterface $repository)
    {
    }

    public function index() {
        $user = Auth::user();
        $courses = $this->repository->courseWhere("user_id", $user->id, 10);

        return view("user.dashboard.courses.index", [
            "title" => "Courses",
            "courses" => $courses
        ]);
    }

    public function createCourses() {
        return view("user.dashboard.courses.create-courses", [
            "title" => "Courses"
        ]);
    }

    public function storeCourses(CourseRequest $request) {
        //Save the image and create the course
        $course = $this->repository->createCourse($request);

        if($course) {
            return redirect()->route("course.index");
        }
    }

    public function showCourses(Course $course) {
        return view("user.dashboard.courses.update-courses", [
            "course" => $course,
            "title" => "Course"
        ]);
    }

    public function updateCourses(CourseRequest $request, Course $course) {
        if($course) {
            //Update the image and the course
            $this->repository->updateCourse($request, $course);

            return redirect()->route("course.index");
        }
    }

    public function deleteCourses(Course $course) {
        
        $this->repository->deleteCourse($course);

        return redirect()->route("course.index");
    }

    // public function course($url, $id) {
    //     $course = $this->repository->findSpecifiedCourse("url", $url, $id);
    //     // $course = Course::find($id)->where("url", $url)->get();
    //     $lessons = Lesson::where("course_id", $course[0]->id)->get();

    //     return view("user.dashboard.courses.show-course", [
    //         "title" => "Courses",
    //         "lessons" => $lessons,
    //         "course" => $course[0]
    //     ]);
    // }
    public function watchCourse($courseUrl, $lesson) {
        $course = $this->repository->courseWhere("url", $courseUrl, null);
        $lessonVideo = Lesson::find($lesson);
        return view("user.overview-courses", [
            "course" => $course[0],
            "lessonVideo" => $lessonVideo
        ]);
    }
}
