<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\ClientAuthController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\empleadoCRUD_Controller;
use App\Http\Controllers\oferta_actividadesController;
use App\Http\Controllers\OfertaActividadesController;
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
    return view('welcome');
});

Route::get('/cliente/login', [ClientAuthController::class, 'login']);

Route::post('/cliente/login', [ClientAuthController::class, 'handleLogin']);

Route::get('/empleado/login', function(){
    return view('auth/login');
});

Route::resource('/empleado/clase',ClaseController::class)->middleware('auth');

Route::resource('/empleado/cliente',ClienteController::class)->middleware('auth');

Route::resource('/empleado/pago',PagosController::class)->middleware('auth');

Route::get('/empleado/searchPago', 'App\Http\Controllers\PagosController@search')->middleware('auth');

Route::get('/empleado/oferta_actividades/clase', [oferta_actividadesController::class, 'orderByClase'])->middleware('auth');

Route::get('/empleado/oferta_actividades/dia', [oferta_actividadesController::class, 'orderByDia'])->middleware('auth');

Route::get('/empleado/oferta_actividades/maestro', [oferta_actividadesController::class, 'orderByMaestro'])->middleware('auth');

Route::get('/empleado/oferta_actividades/search', [oferta_actividadesController::class, 'busquedaPatron'])->middleware('auth');

Route::get('/empleado/oferta_actividades/maestro/search', [oferta_actividadesController::class, 'busquedaPatronMaestro'])->middleware('auth');

Route::get('/empleado/oferta_actividades/dia/search', [oferta_actividadesController::class, 'busquedaPatronDia'])->middleware('auth');

Route::get('/empleado/oferta_actividades/clase/search', [oferta_actividadesController::class, 'busquedaPatronClase'])->middleware('auth');

Route::resource('/empleado/oferta_actividades', oferta_actividadesController::class)->middleware('auth')->except('show');

Route::resource('/empleado',EmpleadoController::class)->middleware('auth');

Route::resource('/empleado/agenda', AgendaController::class)->middleware('auth');

Route::resource('/seePagos',PagosController::class)->middleware('auth');
Route::get('/searchPago', 'App\Http\Controllers\PagosController@search')->middleware('auth');

Route::resource('/empleadoCRUD',empleadoCRUD_Controller::class)->middleware('auth');
Route::get('/searchEmpleado', 'App\Http\Controllers\empleadoCRUD_Controller@search')->middleware('auth');
Route::get('/empleadoCRUD/{id}/delete', 'App\Http\Controllers\empleadoCRUD_Controller@destroy')->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
