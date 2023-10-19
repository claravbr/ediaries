<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActividadFavorita;
use Illuminate\Support\Facades\Validator;

class ActividadFavoritaController extends Controller
{
    // Buscar todas las actividades favoritas en la base de datos
    public function index()
    {
        return ActividadFavorita::all();
    }

    // Buscar una actividad favorita por su ID
    public function show($id)
    {
        $actividadFavorita = ActividadFavorita::findOrFail($id);

        return $actividadFavorita;
    }

    // Crear una nueva actividad favorita en la base de datos
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $actividadFavorita = ActividadFavorita::create($request->all());

        return response()->json($actividadFavorita, 201); // Código 201: Created
    }

    // Actualizar una actividad favorita en la base de datos
    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $actividadFavorita = ActividadFavorita::find($id);

        if (!$actividadFavorita) {
            return response()->json(['message' => 'Actividad favorita no encontrada'], 404);
        }

        $actividadFavorita->update($request->all());

        return response()->json($actividadFavorita, 200); // Código 200: OK
    }

    // Eliminar una actividad favorita de la base de datos
    public function destroy($id)
    {
        $actividadFavorita = ActividadFavorita::find($id);

        if (!$actividadFavorita) {
            return response()->json(['message' => 'Actividad favorita no encontrada'], 404);
        }

        $actividadFavorita->delete();

        return response()->json(['message' => 'Actividad favorita eliminada'], 204); // Código 204: No Content
    }
}
