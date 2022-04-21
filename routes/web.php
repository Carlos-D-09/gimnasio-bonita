<?php

use App\Http\Controllers\ClaseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
//use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;

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

Route::resource('/clase',ClaseController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
