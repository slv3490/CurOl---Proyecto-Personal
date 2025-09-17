<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\LessonRequest;
use App\Repository\Course\CourseRepositoryInterface;
use App\Repository\Lesson\LessonRepositoryInterface;
use Illuminate\Http\RedirectResponse;

class LessonController extends Controller
{
    public function __construct(
        private LessonRepositoryInterface $lessonRepository,
        private CourseRepositoryInterface $courseRepository    
    ){}

    public function lesson(string $url): View
    {
        $course = $this->courseRepository->findByUrl($url);
        $lessons = $this->lessonRepository->getByCourseId($course->id);

        return view("user.dashboard.lessons.show-lesson", [
            "title" => "Courses",
            "lessons" => $lessons,
            "course" => $course
        ]);
    }

    public function createLessons(int $id): View
    {
        $course = $this->courseRepository->find($id);

        return view("user.dashboard.lessons.create-lessons", [
            "title" => "Courses",
            "course" => $course
        ]);
    }

    public function storeLessons(LessonRequest $request, int $courseId): RedirectResponse
    {
        $course = $this->courseRepository->find($courseId);
        $lesson = $this->lessonRepository->createLesson($request, $course);

        if(!$lesson) {
            abort(404, "No se pudo encontrar la leccion buscada");
        }
        return redirect()->route("lesson.lesson", $course->url);
    }

    public function showLessons($courseUrl, $id) {
        $course = $this->courseRepository->findByUrl($courseUrl);
        $lesson = Lesson::find($id);

        return view("user.dashboard.lessons.update-lesson", [
            "title" => "Courses",
            "lesson" => $lesson,
            "course" => $course
        ]);
    }

    public function updateLessons(LessonRequest $request, $courseUrl, $id) {
        $lesson = Lesson::find($id);
        $course = $this->courseRepository->findByUrl($courseUrl);

        $urlContent = str_replace("youtu.be/", "youtube.com/embed/", $request->content_uri);
        
        if($lesson) {
            $lesson->title = $request->title;
            $lesson->description = $request->description;
            $lesson->content_uri = $urlContent;
            $lesson->save();

            return redirect()->route("lesson.lesson", $course->url);
        }
    }

    public function deleteLessons($courseUrl, $id) {
        $lesson = Lesson::find($id);
        $course = $this->courseRepository->findByUrl($courseUrl);
        $lesson->delete();

        return redirect()->route("lesson.lesson", $course->url);
    }

    
}
