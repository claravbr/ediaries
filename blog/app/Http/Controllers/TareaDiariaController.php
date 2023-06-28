<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TareaDiaria;
use Illuminate\Support\Facades\Validator;

class TareaDiariaController extends Controller
{
    // Buscar todas las tareas diarias en la base de datos con su categoria
    public function index()
    {
        return TareaDiaria::with('categoria')->get();
    }

    // Buscar una tarea diaria por su ID
    public function show($id)
    {
        return TareaDiaria::findOrFail($id);
    }

    // Crear una nueva tarea diaria en la base de datos
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'child_id' => 'required|integer|exists:child,id',
            'categoria_id' => 'required|integer|exists:categoria,id',
            'nombre' => 'required|string|max:50',
            'fechaIntroduccion' => 'required|date',
            'fechaLimite' => 'required|date',
            'prioridad' => 'required|string|max:10',
            'duracion' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Crear una nueva tarea diaria
        $tareaDiaria = TareaDiaria::create($request->all());

        return response()->json($tareaDiaria, 201); // Código 201: Creado exitosamente
    }

    // Eliminar una tarea diaria de la base de datos
    public function destroy(TareaDiaria $tareaDiaria)
    {
        $tareaDiaria->delete();

        return response()->json(null, 204); // Código 204: Sin contenido
    }

    // Actualizar una tarea diaria en la base de datos
    public function update(Request $request, TareaDiaria $tareaDiaria)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'child_id' => 'required|integer',
            'categoria_id' => 'required|integer',
            'nombre' => 'required|string|max:50',
            'fechaIntroduccion' => 'required|date',
            'fechaLimite' => 'required|date',
            'prioridad' => 'required|string|max:10',
            'duracion' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Actualizar los datos de la tarea diaria
        $tareaDiaria->update($request->all());

        return response()->json($tareaDiaria, 200); // Código 200: OK
    }
}
