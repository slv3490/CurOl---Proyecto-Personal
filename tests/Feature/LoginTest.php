<?php

namespace Tests\Feature;

use App\Livewire\LogIn;
use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Livewire\StartSession;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_can_see_login_page(): void
    {
        $response = $this->get(route("iniciar-session"));
        $response->assertStatus(200);
        $response->assertViewIs("user.session");
    }

    public function test_to_log_in(): void
    {
        //Asegurarse que este usuario existe
        $user = User::where('email', 'admin@admin.com')->first();
        if(!$user) {
            User::create([
                "name" => "admin",
                "email" => "admin@admin.com",
                "password" => "12345"
            ]);
        }
        Livewire::test(LogIn::class)
            ->set('session.email', $user->email)
            ->set('session.password', "123123")
            ->call('login')
            ->assertRedirect(route("dashboard"));

        // Verificar que el usuario esté autenticado
        $this->assertAuthenticatedAs($user);
    }

    public function test_incorrect_log_in(): void 
    {
        Livewire::test(LogIn::class)
            ->set('session.email', "55353")
            ->set('session.password', "41")
            ->call('login')
            ->assertHasErrors(["session.email", "session.password"]);

        // Verificar que el usuario no esté autenticado
        $this->assertGuest();
    }
}
