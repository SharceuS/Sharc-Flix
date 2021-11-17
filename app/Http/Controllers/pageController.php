<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class pageController extends Controller
{
    function index() {
        return view('authentication/login');
    }

    function loginAuth(Request $req) {
        $user = new User;
        $user->email = $req->email;
        $user->password = $req->password;

        $getUser = User::where('email',$user->email)->get();

        if(count($getUser) == 0) {
            dd("Account does not exist in our system!");
        } else {
            Auth::login($user);
        }
    }

    function adminCreateUser(Request $req) {
        $user = new User;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->name = $req->name;

        $req->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|same:confirm_password|min:7',
            'confirm_password' => 'required'
        ]);

        $getUser = User::where('email',$user->email)->get();

        if(count($getUser) != 0) {
            dd("Account already exists in the system!");
        } else {
            $user->save();
        }
    }

    function adminCreateUserView() {
        return view('admin.createUser');
    }
}
