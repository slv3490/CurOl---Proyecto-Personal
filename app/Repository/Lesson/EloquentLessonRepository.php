<?php

namespace App\Repository\Lesson;

use App\Models\Course;
use App\Models\Lesson;
use App\Http\Requests\LessonRequest;
use Illuminate\Database\Eloquent\Collection;
use App\Repository\BaseRepository\BaseRepository;

class EloquentLessonRepository extends BaseRepository implements LessonRepositoryInterface {

    public function __construct(Lesson $lesson)
    {
        parent::__construct($lesson);
    }

    public function getByCourseId(int $id): Collection {
        return Lesson::where("course_id", $id)->get();
    }

    private function getUrlContent(LessonRequest $request): string {
        return str_replace("youtu.be/", "youtube.com/embed/", $request->content_uri);
    }

    public function createLesson(LessonRequest $request, Course $course): Lesson {
        $urlContent = $this->getUrlContent($request);

        $lesson = Lesson::create([
            "title" => $request->title,
            "description" => $request->description,
            "content_uri" => $urlContent,
            "course_id" => $course->id
        ]);

        return $lesson;
    }

    public function updateLesson(LessonRequest $request, Course $course): Lesson {
        $urlContent = $this->getUrlContent($request);

        $lesson = Lesson::create([
            "title" => $request->title,
            "description" => $request->description,
            "content_uri" => $urlContent,
            "course_id" => $course->id
        ]);

        return $lesson;
    }

    public function find(int $id): Lesson
    {
        return Lesson::findOrFail($id);
    }
}