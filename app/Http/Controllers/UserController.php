<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRolesRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view("user.dashboard.users.index", [
            "title" => "Users",
            "users" => $users
        ]);
    }

    public function session() 
    {
        return view("user.session");
    }

    public function create() 
    {
        return view("user.create");
    }

    public function remember() 
    {
        return view("user.remember");
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route("index");
    }
    public function showUsersRoles($id) {
        $user = User::find($id);
        $roleAll = Role::all();
        return view("user.dashboard.users.update-users", [
            "title" => "Users",
            "user" => $user,
            "roles" => $roleAll
        ]);
    }
    public function updateUsersRoles(Request $request, $id) {
        //Usuario que tengo que actualizar
        $user = User::find($id);
        //Rol que hay que agregarle al usuario
        $role = Role::find($request->role_user);

        if($user && $role) {
            $user->syncRoles($role->name);

            return redirect()->route("users.index");
        }
    }

    //About User Account
    public function userProfile() {
        return view("user.profile.profile");
    }

    public function updateUserInfoAccount(Request $request) {
        dd($request);
    }

    public function deleteUserAccount($id) {
        $user = User::find($id);
        $user->delete();
        return redirect()->route("index");
    }
}
