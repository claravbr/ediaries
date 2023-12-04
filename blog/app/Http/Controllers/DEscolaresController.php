<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DEscolares;
use Illuminate\Support\Facades\Validator;

class DEscolaresController extends Controller
{
    // Buscar todos los descolares en la base de datos
    public function index()
    {
        return DEscolares::all();
    }

    // Buscar descolares por ID
    public function show($id)
    {
        return DEscolares::findOrFail($id);
    }

    // Crear nuevos descolares en BBDD
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'child_id' => 'required|integer',
            'nivelAcademico' => 'required|string|max:30',
            'centroEducativo' => 'required|string|max:50',
            'repetidor' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $descolares = DEscolares::create($request->all());

        return response()->json($descolares, 200);
    }

    // Actualizar descolares por ID
    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'child_id' => 'required|integer',
            'nivelAcademico' => 'required|string|max:30',
            'centroEducativo' => 'required|string|max:50',
            'repetidor' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $descolares = DEscolares::findOrFail($id);

        if (!$descolares) {
            return response()->json(['message' => 'Datos no encontrados'], 404);
        }

        $descolares->update($request->all());

        return response()->json($descolares, 200);
    }

    // Eliminar descolares por ID
    public function destroy($id)
    {
        $descolares = DEscolares::findOrFail($id);

        if (!$descolares) {
            return response()->json(['message' => 'Datos no encontrados'], 404);
        }

        $descolares->delete();

        return response()->json(null, 204);
    }
}
