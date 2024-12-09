<?php

namespace App\Repository\Course;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CategoryCourse;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class EloquentCourseRepository implements CourseRepositoryInterface {
    protected $model;

    public function __construct()
    {
        $this->model = new Course();
    }

    public function courseSearchAndFilter(Request $request) 
    {
        $course = $this->model::with("categories")
        ->when($request->category, function ($query, $categoryIds) {
            $query->whereHas('categories', function ($query) use ($categoryIds) {
                $query->where('category_id', $categoryIds);
            });
        })
        ->when($request->search, function($query, $search) {
            $query->where("title", "LIKE", "%".$search."%");
        })
        ->paginate(10);

        return $course;
    }

    public function courseWhere($condition1, $condition2, $perPage = null) 
    {
        $query = $this->model->query()->where($condition1, $condition2);
        if($perPage === null) {
            $query = $query->get();
        } else {
            $query = $query->paginate($perPage);
        }

        return $query;
    }

    private function saveImage($request) 
    {
        //Generacion del nombre de la imagen
        $extension = $request->image_uri->getClientOriginalExtension();
        $imageName = md5(uniqid(rand(), true)).".". $extension;

        //Leer y guardar la imagen en el archiuvo
        $manager = new ImageManager(Driver::class);
        $image = $manager->read($request->image_uri->getRealPath());
        $image->cover(306, 204);
        $image->save(storage_path("app/public/images/". $imageName));

        return $imageName;
    }

    private function createImage($request) 
    {
        if($request->image_uri) {
            $imageName = $this->saveImage($request);
            return $imageName;
        }
    }

    public function createCourse(CourseRequest $request)
    {
        //Guardar Imagen
        $imageName = $this->createImage($request);
        $url = md5(uniqid(rand(), true));

        $course = Course::create([
            "title" => $request->title,
            "description" => $request->description,
            "image_uri" => $imageName,
            "url" => $url,
            "price" => $request->price,
            "user_id" => Auth::user()->id
        ]);
        
        $idCategory = explode(",", $request->category_id);
        $course->categories()->attach($idCategory);

        return $course;

    }

    private function verifiedIfThePreviousImageExists(Course $course) 
    {
        if(Storage::disk('public')->exists("images/".$course->image_uri)) {
            Storage::disk('public')->delete("images/".$course->image_uri);
        }
    }

    private function updateImage($request, Course $course) 
    {
        if($request->image_uri) {
            //Eliminar la imagen previa si existe
            $this->verifiedIfThePreviousImageExists($course);

            $imageName = $this->saveImage($request);

        } else {
            $imageName = $course->image_uri;
        }
        return $imageName;
    }

    private function attachCategoriesToCourse(Request $request, $course) 
    {
        $rtrimIdCategory = rtrim($request->category_id, ",");
        $idCategory = explode(",", $rtrimIdCategory);
        CategoryCourse::where('course_id', $course->id)->delete();
        foreach ($idCategory as $key => $value) {
            CategoryCourse::create([
                "category_id" => $value,
                "course_id" => $course->id
            ]);
        }
    }

    public function updateCourse(CourseRequest $request, $course) 
    {
        $imageName = $this->updateImage($request, $course);

        $course->title = $request->title;
        $course->description = $request->description;
        $course->price = $request->price;
        $course->image_uri = $imageName;
        $course->save();

        $this->attachCategoriesToCourse($request, $course);
    }

    public function deleteCourse(Course $course)
    {
        $this->verifiedIfThePreviousImageExists($course);
        $course->categories()->detach();
        $course->delete();
    }

    public function findSpecifiedCourse($condition1, $condition2, $id)
    {
        $course = Course::find($id)->where($condition1, $condition2)->get();
        return $course;
    }
}