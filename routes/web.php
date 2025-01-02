<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    sleep(1);
    return Inertia::render('Home');
})->name('home');
Route::get('/about', function () {
    sleep(1);
    return Inertia::render('About',['user'=>'mike']);
})->name('about');


//Route::inertia('/about', 'About', ['user'=>'mike']);

