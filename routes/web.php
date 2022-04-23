<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ClaseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\oferta_actividadesController;
use App\Http\Controllers\OfertaActividadesController;
//use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Models\oferta_actividades;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

//Route::POST('/login',[LoginController::class, 'validar']);

Route::resource('/empleado',EmpleadoController::class)->middleware('auth');

Route::resource('/clase',ClaseController::class)->middleware('auth');

Route::resource('/agenda', AgendaController::class)->middleware('auth');

Route::get('/oferta_actividades/clase', [oferta_actividadesController::class, 'orderByClase'])->middleware('auth');

Route::get('/oferta_actividades/dia', [oferta_actividadesController::class, 'orderByDia'])->middleware('auth');

Route::get('/oferta_actividades/search', [oferta_actividadesController::class, 'busquedaPatron'])->middleware('auth');

Route::resource('/oferta_actividades', oferta_actividadesController::class)->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
