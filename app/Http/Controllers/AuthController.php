<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request){


        //validation
        $validation = $request->validate([
            // 'avatar'=>['file', 'nullable', 'max:3000'],
            'name'=>['required','max:255'],
            'email'=>['required','email','max:255','unique:users'],
            'password'=>['required','confirmed'],

        ]);
        // if($request->hasFile('avatar')){
        //    $validation['avatar'] = Storage::disk('public')->put('avatars', $request->avatar);
        //     }
        //register
        $user = User::create($validation);
        //login
        Auth::login($user);
        //redirect
        return redirect()
        ->route('dashboard')
        ->with('message', 'Welcome to Laravel Inertia Vue app');

    }
    public function login(Request $request){
        $validation = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($validation, $request->remember)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');

    }


}
