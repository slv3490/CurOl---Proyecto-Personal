<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use App\Repository\Course\CourseRepositoryInterface;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct(private CourseRepositoryInterface $repository)
    {
        
    }

    public function index()
    {
        $courses = Course::limit(9)->get();
        return view("index", [
            "inicio" => true,
            "mostrar" => true,
            "courses" => $courses
        ]);
    }

    public function cursos(Request $request)
    {
        $categories = Category::all();

        $courses = $this->repository->courseSearchAndFilter($request);

        return view("cursos", [
            "courses" => $courses,
            "categories" => $categories,
        ]);
    }
}
