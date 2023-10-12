<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChildrenController;
use App\Http\Controllers\DiarioEmocionesController;
use App\Http\Controllers\TareaDiariaController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Http\Request;
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

Route::resource('usuario/', UsuariosController::class);
Route::resource('child/', ChildrenController::class);
Route::resource('diario-emociones/', DiarioEmocionesController::class);
Route::resource('tarea-diaria', TareaDiariaController::class);


// -- DIARIO EMOCIONES --
Route::get('diario-emociones/child/{childId}', [DiarioEmocionesController::class, 'getAllDiarioEmocionesForChild']);
Route::post('diario-emociones/new', [DiarioEmocionesController::class, 'store']);

// -- TAREAS DIARIAS --
Route::post('tarea-diaria/new', [TareaDiariaController::class, 'store']);
Route::put('tarea-diaria/update/{idTarea}', [TareaDiariaController::class, 'update']);






