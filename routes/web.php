<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\ClientAuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DetallePagosClasesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\empleadoCRUD_Controller;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\HistorialPrestamosController;
use App\Http\Controllers\oferta_actividadesController;
use App\Http\Controllers\PagosClasesController;
use App\Http\Controllers\PagosPrestamosEquiposController;

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

Route::get('/cliente',[ClienteController::class,'indexClient'])->middleware('auth:client');

Route::get('/cliente/clases/clase','App\Http\Controllers\oferta_actividadesClientesController@orderByClase')->middleware('auth:client');

Route::get('/cliente/clases/dia', 'App\Http\Controllers\oferta_actividadesClientesController@orderByDia')->middleware('auth:client');

Route::get('/cliente/clases/maestro', 'App\Http\Controllers\oferta_actividadesClientesController@orderByMaestro')->middleware('auth:client');

Route::get('/cliente/clases/search', 'App\Http\Controllers\oferta_actividadesClientesController@busquedaPatron')->middleware('auth:client');

Route::get('/cliente/clases/maestro/search', 'App\Http\Controllers\oferta_actividadesClientesController@busquedaPatronMaestro')->middleware('auth:client');

Route::get('/cliente/clases/dia/search', 'App\Http\Controllers\oferta_actividadesClientesController@busquedaPatronDia')->middleware('auth:client');

Route::get('/cliente/clases/clase/search', 'App\Http\Controllers\oferta_actividadesClientesController@busquedaPatronClase')->middleware('auth:client');

Route::resource('/cliente/clases', 'App\Http\Controllers\oferta_actividadesClientesController')->middleware('auth:client');

Route::get('/cliente/login', [ClientAuthController::class, 'login']);

Route::post('/cliente/login', [ClientAuthController::class, 'handleLogin']);


Route::get('/empleado/login', function(){
    return view('auth/login');
});

Route::resource('/empleado/clase',ClaseController::class)->middleware('auth');

Route::get('/empleado/cliente/search',[ClienteController::class,'search'])->middleware('auth');

Route::resource('/empleado/cliente',ClienteController::class)->middleware('auth');

Route::get('/empleado/cliente/{id}/edit/password',[ClienteController::class,'editPassword'])->middleware('auth');

Route::patch('/empleado/cliente/{id}/edit/password',[ClienteController::class,'updatePassword'])->middleware('auth');

Route::get('/empleadoCRUD/{id}/edit/password',[empleadoCRUD_Controller::class,'editPassword'])->middleware('auth');

Route::patch('/empleadoCRUD/{id}/edit/password',[empleadoCRUD_Controller::class,'updatePassword'])->middleware('auth');

Route::resource('/empleado/pago',PagosController::class)->middleware('auth');

Route::get('/empleado/searchPago', 'App\Http\Controllers\PagosController@search')->middleware('auth');

Route::get('/empleado/oferta_actividades/clase', [oferta_actividadesController::class, 'orderByClase'])->middleware('auth');

Route::get('/empleado/oferta_actividades/dia', [oferta_actividadesController::class, 'orderByDia'])->middleware('auth');

Route::get('/empleado/oferta_actividades/maestro', [oferta_actividadesController::class, 'orderByMaestro'])->middleware('auth');

Route::get('/empleado/oferta_actividades/search', [oferta_actividadesController::class, 'busquedaPatron'])->middleware('auth');

Route::get('/empleado/oferta_actividades/maestro/search', [oferta_actividadesController::class, 'busquedaPatronMaestro'])->middleware('auth');

Route::get('/empleado/oferta_actividades/dia/search', [oferta_actividadesController::class, 'busquedaPatronDia'])->middleware('auth');

Route::get('/empleado/oferta_actividades/clase/search', [oferta_actividadesController::class, 'busquedaPatronClase'])->middleware('auth');

Route::get('/empleado/oferta_actividades/{id}', [oferta_actividadesController::class, 'show'])->middleware('auth');

Route::resource('/empleado/oferta_actividades', oferta_actividadesController::class)->middleware('auth')->except('show');

Route::resource('/empleado/equipos',EquiposController::class)->middleware('auth');

Route::get('/empleado/prestamosEquipos',[HistorialPrestamosController::class,'index'])->middleware('auth');

Route::resource('/empleado/PagosMembresias',PagosController::class)->middleware('auth');

Route::resource('/empleado/PagosEquipos',PagosPrestamosEquiposController::class)->middleware('auth');

Route::resource('/empleado/PagosClases',PagosClasesController::class)->except('destroy','update','edit','show')->middleware('auth');

Route::get('/empleado/detallePagoClases/{id}',[DetallePagosClasesController::class,'index'])->middleware('auth');

Route::post('/empleado/PagosClases/validarDatos',[PagosClasesController::class,'validarDatos'])->middleware('auth');

Route::post('/empleado/PagosClases/quitar/{id}',[PagosClasesController::class,'quitarPagoLista'])->middleware('auth');

Route::resource('/empleado',EmpleadoController::class)->middleware('auth');

Route::resource('/empleado/agenda', AgendaController::class)->middleware('auth');

Route::get('/searchPago', 'App\Http\Controllers\PagosController@search')->middleware('auth');
Route::get('/pagosJson', 'App\Http\Controllers\PagosController@toJson')->middleware('auth');

Route::resource('/empleadoCRUD',empleadoCRUD_Controller::class)->middleware('auth');
Route::get('/searchEmpleado', 'App\Http\Controllers\empleadoCRUD_Controller@search')->middleware('auth');
Route::get('/empleadoCRUD/{id}/delete', 'App\Http\Controllers\empleadoCRUD_Controller@destroy')->middleware('auth');

Route::get('/email', 'App\Http\Controllers\MailController@index')->middleware('auth');
Route::post('/send-email', 'App\Http\Controllers\MailController@sendEmail')->middleware('auth');

Route::resource('/membresia', 'App\Http\Controllers\MembresiaController')->middleware('auth');
Route::get('/membresia/{id}/delete', 'App\Http\Controllers\MembresiaController@destroy')->middleware('auth');
Route::get('/membresiaJson', 'App\Http\Controllers\MembresiaController@toJson')->middleware('auth');

Route::get('/equiposJson', 'App\Http\Controllers\EquiposController@toJson')->middleware('auth');

Route::get('/clasesJson', 'App\Http\Controllers\ClaseController@toJson')->middleware('auth');

Route::get('/ofertasJson', 'App\Http\Controllers\oferta_actividadesController@toJson')->middleware('auth');


//Route::resource('/cliente/agenda', AgendaController::class)->middleware('auth');
//Route::get('/cliente/agenda/search', [AgendaController::class, 'busquedaPatron'])->middleware('auth');
//Route::get('/cliente/agendaSearch', 'App\Http\Controllers\AgendaController@search')->middleware('auth');
//Route::resource('/cliente', 'App\Http\Controllers\ClientAuthController');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
