<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Livewire\Forms\UserForm;
use App\Jobs\SendVerificationEmail;
use Illuminate\Support\Facades\Auth;

class CreateUser extends Component
{

    public UserForm $user;

    public function create()
    {
        $this->validate();
        
        $user = User::create($this->user->all());
        $user->givePermissionTo("user");
        $user->assignRole("user");
        Auth::login($user);
        $token = $user->createToken("API TOKEN")->plainTextToken;
        session(['api_token' => $token]);
        
        SendVerificationEmail::dispatch($user)->onQueue("emails");

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.create-user');
    }
}
