<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChildActividadFavoritaController;
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

Route::post('usuario/register', [UsuariosController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('datos-personales/', [DPersonalesController::class, 'store']);
Route::post('datos-clinicos/', [DClinicosController::class, 'store']);
Route::post('datos-escolares/', [DEscolaresController::class, 'store']);
// -- ACTIVIDADES FAVORITAS --
Route::post('actividades-favoritas/', [ChildActividadFavoritaController::class, 'createActividadesFavoritas']);

Route::middleware('auth:api')->group(function () {
    Route::get('get-user', [AuthController::class, 'usuarioInfo']);

    // -- TAREAS DIARIAS --
    Route::post('tarea-diaria/new', [TareaDiariaController::class, 'store']);
    Route::get('tarea-diaria/get-tareas/{childId}', [TareaDiariaController::class, 'getTareasByChildId']);
    Route::put('tarea-diaria/{tareaId}/done', [TareaDiariaController::class, 'tareaTerminada']);
    Route::delete('tarea-diaria/{tareaId}', [TareaDiariaController::class, 'destroy']);
    Route::put('tarea-diaria/update/{idTarea}', [TareaDiariaController::class, 'update']);

    // -- DIARIO EMOCIONES --
    Route::post('diario-emociones/new', [DiarioEmocionesController::class, 'store']);


});
