<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChildrenController;
use App\Http\Controllers\DClinicosController;
use App\Http\Controllers\DEscolaresController;
use App\Http\Controllers\DiarioEmocionesController;
use App\Http\Controllers\DPersonalesController;
use App\Http\Controllers\TareaDiariaController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('get-user', [AuthController::class, 'userInfo']);
});

// -- DATOS DE USUARIO --
Route::resource('usuario/', UsuariosController::class);
Route::resource('usuario/datos-personales/', DPersonalesController::class);
Route::resource('usuario/datos-clinicos/', DClinicosController::class);
Route::resource('usuario/datos-escolares/', DEscolaresController::class);

// -- DATOS DE USO DE APLICACIÓN --
Route::resource('child/', ChildrenController::class);
Route::resource('child/diario-emociones/', DiarioEmocionesController::class);
Route::resource('child/tarea-diaria/', TareaDiariaController::class);


// -- DIARIO EMOCIONES --
Route::get('child/diario-emociones/{childId}', [DiarioEmocionesController::class, 'getAllDiarioEmocionesForChild']);
Route::post('child/diario-emociones/new', [DiarioEmocionesController::class, 'store']);

// -- TAREAS DIARIAS --
Route::post('child/tarea-diaria/new', [TareaDiariaController::class, 'store']);
Route::put('child/tarea-diaria/update/{idTarea}', [TareaDiariaController::class, 'update']);






