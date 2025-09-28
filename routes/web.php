<?php

use Illuminate\Support\Facades\Route;



//home
Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
//servicios
Route::get('/servicios', [App\Http\Controllers\ServiciosController::class, 'index'])->name('servicios');
//blog
Route::get('/blog', [App\Http\Controllers\HomeController::class, 'blog'])->name('blog');
//contacto
Route::get('/contacto', [App\Http\Controllers\HomeController::class, 'contacto'])->name('contacto');

//detalle del servicio
Route::get('/servicios/{id}', [App\Http\Controllers\ServiciosController::class, 'detalle'] )
->name('servicios.detalle')
->whereNumber('id');

//ruta para crear un nuevo servicio
Route::get('/servicios/nuevo', [App\Http\Controllers\ServiciosController::class, 'crear'] )->name('servicios.crear');

//ruta para crear un nuevo servicio
Route::post('/servicios/nuevo', [App\Http\Controllers\ServiciosController::class, 'store'] )->name('servicios.store');