<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DEscolares;
use Illuminate\Support\Facades\Validator;

class DEscolaresController extends Controller
{
    // Buscar todos los registros de datos escolares en la base de datos
    public function index()
    {
        return DEscolares::all();
    }

    // Buscar un registro de datos escolares por su ID
    public function show($id)
    {
        return DEscolares::findOrFail($id);
    }

    // Crear un nuevo registro de datos escolares en la base de datos
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $input = $request->all();
        $validator = Validator::make($input, [
            'child_id' => 'required|integer',
            'nivelAcademico' => 'required|string|max:30',
            'centroEducativo' => 'required|string|max:50',
            'repetidor' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $escolares = DEscolares::create($request->all());

        return response()->json($escolares, 200);
    }

    // Actualizar un registro de datos escolares en la base de datos por su ID
    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $input = $request->all();
        $validator = Validator::make($input, [
            'child_id' => 'required|integer',
            'nivelAcademico' => 'required|string|max:30',
            'centroEducativo' => 'required|string|max:50',
            'repetidor' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $escolares = DEscolares::findOrFail($id);
        $escolares->update($request->all());

        return response()->json($escolares, 200); // Código 200: OK
    }

    // Eliminar un registro de datos escolares de la base de datos por su ID
    public function destroy($id)
    {
        $escolares = DEscolares::findOrFail($id);
        $escolares->delete();

        return response()->json(null, 204); // Código 204: No Content
    }
}
