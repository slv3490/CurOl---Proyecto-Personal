<?php

namespace Tests\Feature;

use App\Models\Category;
use Tests\TestCase;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CoursesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_can_see_courses_page(): void
    {
        $response = $this->get(route("cursos"));

        $response->assertViewIs("cursos");
        $response->assertStatus(200);
    }

    public function test_can_filter_a_course_with_a_search(): void
    {
        Storage::fake('public');
        $file = UploadedFile::fake()->image('test-image.jpg')->size(15);
        $filePath = $file->store("images", "public");
        $user = User::factory()->create();
        $idCategory = [
            0 => "1",
            1 => "2",
            2 => "3",
            3 => "7"
        ];
        
        $course = Course::create([
            "title" => "Curso sobre Model View Controller",
            "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit",
            "image_uri" => basename($filePath),
            "url" => md5(uniqid(rand(), true)),
            "price" => 90,
            "user_id" => $user->id,
        ]);
        $course->categories()->attach($idCategory);

        $response = $this->get("/cursos?search=curso");

        $response->assertViewIs("cursos");
        $response->assertDontSeeText("No se ha podido encontrar el curso que buscas.");
        $response->assertViewHasAll([
            "courses",
            "categories"
        ]);
        $response->assertStatus(200);

        $course->delete();
        $user->delete();
    }
    public function test_can_filter_a_course_that_does_not_exist_with_the_search(): void
    {
        Storage::fake('public');
        $file = UploadedFile::fake()->image('test-image.jpg')->size(15);
        $filePath = $file->store("images", "public");
        $user = User::factory()->create();
        $idCategory = [
            0 => "1",
            1 => "2",
            2 => "3",
            3 => "7"
        ];
        
        $course = Course::create([
            "title" => "Curso sobre Model View Controller",
            "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit",
            "image_uri" => basename($filePath),
            "url" => md5(uniqid(rand(), true)),
            "price" => 90,
            "user_id" => $user->id,
        ]);
        $course->categories()->attach($idCategory);

        $response = $this->get("/cursos?search=course+that+does+not+exist");

        $response->assertViewIs("cursos");
        $response->assertSeeText("No se ha podido encontrar el curso que buscas.");
        $response->assertStatus(200);
        $course->delete();
        $user->delete();
    }

    public function test_can_filter_by_categories_checkbox() :void
    {
        //Ensure that the category exists in the test database

        //NO HACER ESTO
        if(Category::find(7) && Category::find(8)) {
            Category::find(7)->delete();
            Category::find(8)->delete();
        }
        ///////////////
        Category::create([
            "id" => 7,
            "name" => "rights"
        ]);
        Category::create([
            "id" => 8,
            "name" => "rights"
        ]);

        $response = $this->get("/cursos?category%5B%5D=7&category%5B%5D=8");

        $response->assertViewIs("cursos");
        $response->assertDontSeeText("No se ha podido encontrar el curso que buscas.");
        $response->assertStatus(200);
    }
    
    public function test_cannot_be_filtered_by_categories_because_there_are_no_courses_with_that_category_associated() :void
    {
        $response = $this->get("/cursos?category%5B%5D=200&category%5B%5D=500");

        $response->assertViewIs("cursos");
        $response->assertSeeText("No se ha podido encontrar el curso que buscas.");
        $response->assertStatus(200);
    }
}