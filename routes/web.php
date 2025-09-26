<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/servicios', function () {
    return view('servicios');
})->name('servicios');


Route::get('/blog', function () {
    return view('blog');
})->name('blog');


Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');
