<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChildActividadFavoritaController;
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

Route::post('usuario/register', [UsuariosController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);

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
Route::resource('tarea-diaria/', TareaDiariaController::class);

// -- TAREAS DIARIAS --
Route::post('tarea-diaria/new', [TareaDiariaController::class, 'store']);
Route::get('tarea-diaria/get-tareas/{childId}', [TareaDiariaController::class, 'getTareasByChildId']);
Route::put('tarea-diaria/{tareaId}/done', [TareaDiariaController::class, 'tareaTerminada']);
Route::delete('tarea-diaria/{tareaId}', [TareaDiariaController::class, 'destroy']);

// -- DIARIO EMOCIONES --
Route::post('diario-emociones/new', [DiarioEmocionesController::class, 'store']);









Route::get('usuario/get-child/{usuarioId}', [ChildrenController::class, 'getChildByIdUsuario']);

Route::post('usuario/check-email', [UsuariosController::class, 'checkEmail']);

Route::post('usuario/actividades-favoritas', [ChildActividadFavoritaController::class, 'createActividadesFavoritas']);


Route::get('child/diario-emociones/{childId}', [DiarioEmocionesController::class, 'getAllDiarioEmocionesForChild']);




Route::put('tarea-diaria/update/{idTarea}', [TareaDiariaController::class, 'update']);






