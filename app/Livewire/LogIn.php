<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Forms\LogInForm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LogIn extends Component
{
    public LogInForm $session;
    public $spectator;

    public function login()
    {
        if($this->spectator) {
            if(Auth::attempt(["email" => "espectador@espectador.com", "password" => "espectador"])) {
                $user = User::where("email", "espectador@espectador.com")->first();
                $token = $user->createToken("API TOKEN")->plainTextToken;
                session(['api_token' => $token]);
                return redirect()->route("dashboard");
            }
        }
        $this->validate();

        if(Auth::attempt(['email' => $this->session->email, 'password' => $this->session->password])) {
            $user = User::where("email", $this->session->email)->first();
            $token = $user->createToken("API TOKEN")->plainTextToken;
            session(['api_token' => $token]);

            return redirect()->route('dashboard');
        } else {
            session()->flash('errors', 'Los datos no coinciden con nuestras credenciales.');
        }
    }
    public function render()
    {
        return view('livewire.log-in');
    }
}
