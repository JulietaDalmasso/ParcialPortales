<?php

use Illuminate\Support\Facades\Route;



//home
Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
//servicios
Route::get('/servicios', [App\Http\Controllers\ServiciosController::class, 'index'])->name('servicios');
//blog
Route::get('/blog', [App\Http\Controllers\NovedadesController::class, 'blog'])->name('blog');
//contacto
Route::get('/contacto', [App\Http\Controllers\HomeController::class, 'contacto'])->name('contacto');

//detalle del blog
Route::get('/novedades/{id}', [App\Http\Controllers\NovedadesController::class, 'detalle'] )
->name('novedades.detalle')
->whereNumber('id');

//rutas para login
Route::get('/ingresar', [App\Http\Controllers\AuthController::class, 'showLogin'])
->name('auth.showLogin');

Route::post('/ingresar', [App\Http\Controllers\AuthController::class, 'doLogin'])
->name('auth.doLogin');

//cerrar sesion
Route::post('/cerrar-sesion', [App\Http\Controllers\AuthController::class, 'doLogout'])
->name('auth.doLogout');

//ruta para crear un nuevo blog
Route::middleware('auth')->group(function(){
    Route::get('/novedades/nuevo', [App\Http\Controllers\NovedadesController::class, 'crear'] )->name('novedades.crear');

    //ruta para crear un nuevo blog
    Route::post('/novedades/nuevo', [App\Http\Controllers\NovedadesController::class, 'store'] )->name('novedades.store');

    //ruta para editar un blog
    Route::get('/novedades/{id}/editar', [App\Http\Controllers\NovedadesController::class, 'editar'] )->name('novedades.editar');

    //ruta para editar un blog
    Route::post('/novedades/{id}/editar', [App\Http\Controllers\NovedadesController::class, 'actualizar'] )->name('novedades.actualizar');

    //ruta para eliminar un blog
    Route::get('/novedades/{id}/eliminar', [App\Http\Controllers\NovedadesController::class, 'eliminar'] )->name('novedades.eliminar');

    //ruta para eliminar un blog
    Route::post('/novedades/{id}/eliminar', [App\Http\Controllers\NovedadesController::class, 'destruir'] )->name('novedades.destruir');

});




