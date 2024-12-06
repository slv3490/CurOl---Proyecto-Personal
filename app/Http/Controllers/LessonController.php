<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Http\Requests\LessonRequest;
use App\Models\Course;

class LessonController extends Controller
{
    public function lesson($url) {
        $course = Course::where("url", $url)->get();
        $lessons = Lesson::where("course_id", $course[0]->id)->get();

        return view("user.dashboard.lessons.show-lesson", [
            "title" => "Courses",
            "lessons" => $lessons,
            "course" => $course[0]
        ]);
    }

    public function createLessons($id)
    {
        $courseId = Course::find($id);

        return view("user.dashboard.lessons.create-lessons", [
            "title" => "Courses",
            "course" => $courseId
        ]);
    }

    public function storeLessons(LessonRequest $request, $courseId) 
    {
        $courseId = Course::find($courseId);
        $urlContent = str_replace("youtu.be/", "youtube.com/embed/", $request->content_uri);

        $lesson = Lesson::create([
            "title" => $request->title,
            "description" => $request->description,
            "content_uri" => $urlContent,
            "course_id" => $courseId->id
        ]);

        if($lesson) {
            return redirect()->route("lesson.lesson", $courseId->url);
        }
    }

    public function showLessons($courseUrl, $id) {
        $course = Course::where("url", $courseUrl)->get();
        $lesson = Lesson::find($id);

        return view("user.dashboard.lessons.update-lesson", [
            "title" => "Courses",
            "lesson" => $lesson,
            "course" => $course[0]
        ]);
    }

    public function updateLessons(Request $request, $courseUrl, $id) {
        $request->validate([
            "title" => ["required", "max:150"],
            "description" => ["nullable", "max:400"],
            "content_uri" => ["required", "max:255"]
        ]);

        $lesson = Lesson::find($id);
        $course = Course::where("url", $courseUrl)->get();

        $urlContent = str_replace("youtu.be/", "youtube.com/embed/", $request->content_uri);
        
        if($lesson) {
            $lesson->title = $request->title;
            $lesson->description = $request->description;
            $lesson->content_uri = $urlContent;
            $lesson->save();

            return redirect()->route("lesson.lesson", $course[0]->url);
        }
    }

    public function deleteLessons($courseUrl, $id) {
        $lesson = Lesson::find($id);
        $course = Course::where("url", $courseUrl)->get();
        $lesson->delete();

        return redirect()->route("lesson.lesson", $course[0]->url);
    }

    
}
