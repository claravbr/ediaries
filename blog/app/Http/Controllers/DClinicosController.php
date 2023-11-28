<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DClinicos;
use Illuminate\Support\Facades\Validator;

class DClinicosController extends Controller
{
    // Buscar todos los dclinicos en la base de datos
    public function index()
    {
        return DClinicos::all();
    }

    // Buscar dclinicos por ID
    public function show($id)
    {
        return DClinicos::findOrFail($id);
    }

    // Crear nuevos dclinicos
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'child_id' => 'required|integer',
            'enfermedad' => 'nullable|string',
            'tdah' => 'boolean',
            'tdahTipo' => 'nullable|string',
            'tdahEdad' => 'nullable|integer',
            'dificultad' => 'nullable|string',
            'medicacion' => 'boolean',
            'medicacionAntiguedad' => 'nullable|string',
            'medicacionInfo' => 'nullable|string',
            'intervencion' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $dclinicos = DClinicos::create($request->all());

        return response()->json($dclinicos, 200);
    }

    // Actualizar dclinicos por su ID
    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'child_id' => 'required|integer',
            'enfermedad' => 'nullable|string|max:20',
            'tdah' => 'boolean',
            'tdahTipo' => 'nullable|string|max:20',
            'tdahEdad' => 'nullable|integer',
            'dificultad' => 'nullable|string|max:50',
            'medicacion' => 'boolean',
            'medicacionAntiguedad' => 'nullable|string|max:20',
            'medicacionInfo' => 'nullable|string|max:50',
            'intervencion' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $dclinicos = DClinicos::findOrFail($id);

        if (!$dclinicos) {
            return response()->json(['message' => 'Datos no encontrados'], 404);
        }

        $dclinicos->update($request->all());

        return response()->json($dclinicos, 200);
    }

    // Eliminar dclinicos por ID
    public function destroy($id)
    {
        // Busca el registro de dclinicos por su ID
        $dclinicos = DClinicos::findOrFail($id);

        // Verifica si se encontró el registro
        if(!$dclinicos){
            return response()->json(['message' => 'Datos no encontrados'], 404);
        }

        // Elimina el registro
        $dclinicos->delete();

        return response()->json(null, 204);
    }
}
