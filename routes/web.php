<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Inertia\Inertia;

//Route::inertia('/','Home',['users' => User::paginate(5)])->name('home');

 Route::get('/', function(Request $request){
     return inertia('Home', [
         'users'=>User::when($request->search, function ($query) use
         ($request){
         $query
         ->where('name', 'like', '%' . $request->search . '%');
         //->orWhere('email', 'like', '%' . $request->search . '%');
     })->paginate(5)-> withQueryString(),
     'searchTerm' => $request->search

      ]);
 })->name('home');

//for Authenticated user
Route::middleware('auth')->group(function(){
Route::inertia('/dashboard','Dashboard')->name('dashboard');
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
});
//for guest user
Route::middleware('guest')->group(function(){
Route::inertia('register','Auth/Register')->name('register');
Route::post('/register',[AuthController::class, 'register']);
Route::inertia('login','Auth/Login')->name('login');
Route::post('/login',[AuthController::class, 'login']);
});





//Route::inertia('/about', 'About', ['user'=>'mike']);

