<?php

use App\Http\Middleware\CheckRol;
use Illuminate\Support\Facades\Route;

//home
Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
//servicios
Route::get('/servicios', [App\Http\Controllers\ServiciosController::class, 'index'])->name('servicios');
//blog
Route::get('/blog', [App\Http\Controllers\NovedadesController::class, 'blog'])->name('blog');

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

//admin
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])
->middleware(['auth', CheckRol::class . ':admin'])
->name('admin');

Route::middleware('auth')->group(function() {
    //ruta para contratar un servicio
    Route::post('/servicios/{id}/contratar', [App\Http\Controllers\ServicioController::class, 'contratar'])->name('servicios.contratar');
});

// Perfil propio (solo auth)
Route::get('/perfil', [App\Http\Controllers\UserController::class, 'myProfile'])
    ->middleware('auth')
    ->name('user.profile');

// Perfil de usuario por id (solo admin puede ver otros perfiles)
Route::get('/usuarios/{user}', [App\Http\Controllers\UserController::class, 'show'])
    ->middleware(['auth', CheckRol::class . ':admin']) 
    ->name('user.show');

//ruta para crear un nuevo blog
Route::middleware(['auth', CheckRol::class . ':admin'])
    ->controller(App\Http\Controllers\NovedadesController::class)
    ->group(function(){
    Route::get('/novedades/nuevo', 'crear')->name('novedades.crear');

    //ruta para crear un nuevo blog
    Route::post('/novedades/nuevo', 'store')->name('novedades.store');

    //ruta para editar un blog
    Route::get('/novedades/{id}/editar', 'editar')->name('novedades.editar');

    //ruta para editar un blog
    Route::post('/novedades/{id}/editar', 'actualizar')->name('novedades.actualizar');

    //ruta para eliminar un blog
    Route::get('/novedades/{id}/eliminar', 'eliminar')->name('novedades.eliminar');

    //ruta para eliminar un blog
    Route::post('/novedades/{id}/eliminar', 'destruir')->name('novedades.destruir');

});

//ruta para reigstrarse
Route::get('registro', [App\Http\Controllers\RegisterController::class, 'showRegister'])->name('auth.showRegister');

Route::post('registro', [App\Http\Controllers\RegisterController::class, 'doRegister'])->name('auth.doRegister');

Route::get('/mp-test', [App\Http\Controllers\MercadoPagoController::class, 'index'])->name('mp.test');

Route::get('/mp-test/success', [App\Http\Controllers\MercadoPagoController::class, 'success'])->name('mp.test.success');

Route::get('/mp-test/failure', [App\Http\Controllers\MercadoPagoController::class, 'failure'])->name('mp.test.failure');

Route::get('/mp-test/pending', [App\Http\Controllers\MercadoPagoController::class, 'pending'])->name('mp.test.pending');

Route::post('/servicios/{id}/cancelar', [App\Http\Controllers\ServicioController::class, 'cancelar'])->name('servicios.cancelar');


