<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/','Home')->name('home');
Route::inertia('register','Auth/Register')->name('register');



//Route::inertia('/about', 'About', ['user'=>'mike']);

