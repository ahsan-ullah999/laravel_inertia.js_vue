<?php

use App\Http\Controllers\AuthController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/','Home')->name('home');
Route::inertia('register','Auth/Register')->name('register');
Route::post('/register',[AuthController::class, 'register']);



//Route::inertia('/about', 'About', ['user'=>'mike']);

