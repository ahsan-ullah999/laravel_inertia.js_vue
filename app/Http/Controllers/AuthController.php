<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request){
        //validation
        $validation = $request->validate([
            'name'=>['required','max:255'],
            'email'=>['required','email','max:255','unique:users'],
            'password'=>['required','confirmed'],

        ]);
        //register
        $user = User::create($validation);
        //login
        Auth:('$user');
        //redirect
        return redirect()->route('home');
    }
}
