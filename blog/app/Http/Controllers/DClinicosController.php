<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DClinicos;
use Illuminate\Support\Facades\Validator;

class DClinicosController extends Controller
{
    // Buscar todos los registros de historias clínicas en la base de datos
    public function index()
    {
        return DClinicos::all();
    }

    // Buscar una historia clínica por su ID
    public function show($id)
    {
        return DClinicos::findOrFail($id);
    }

    // Crear una nueva historia clínica en la base de datos
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $input = $request->all();
        $validator = Validator::make($input, [
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

        $clinicos = DClinicos::create($request->all());

        return response()->json($clinicos, 200); // Código 201: Created
    }

    // Actualizar una historia clínica en la base de datos por su ID
    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $input = $request->all();
        $validator = Validator::make($input, [
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

        $clinicos = DClinicos::findOrFail($id);
        $clinicos->update($request->all());

        return response()->json($clinicos, 200); // Código 200: OK
    }

    // Eliminar una historia clínica de la base de datos por su ID
    public function destroy($id)
    {
        $clinicos = DClinicos::findOrFail($id);
        $clinicos->delete();

        return response()->json(null, 204); // Código 204: No Content
    }
}
