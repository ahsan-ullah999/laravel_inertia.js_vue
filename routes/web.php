<?php

use App\Http\Controllers\AuthController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/','Home')->name('home');
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

