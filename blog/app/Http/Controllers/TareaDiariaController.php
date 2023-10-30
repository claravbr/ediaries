<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TareaDiaria;
use Illuminate\Support\Carbon;
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
        return TareaDiaria::findOrFail($id)::with('categoria')->get();
    }

    // Buscar todas las tareas de un child
    public function getTareasByChildId($child_id)
    {
        $tareaDiarias = TareaDiaria::where('child_id', $child_id)->with('categoria')->get();

        return response()->json($tareaDiarias, 200);
    }

    // Crear una nueva tarea diaria en la base de datos
    public function store(Request $request)
    {
        $request['fechaIntroduccion'] = Carbon::now();
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'child_id' => 'required|integer|exists:child,id',
            'categoria_id' => 'required|integer|exists:categoria,id',
            'nombre' => 'required|string|max:50',
            'fechaLimite' => 'required|date|after_or_equal:fechaIntroduccion',
            'prioridad' => 'required|string|max:10',
            'duracion' => 'nullable|integer'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $tareaDiaria = TareaDiaria::create($request->all());

        return response()->json($tareaDiaria, 200);
    }

    // Eliminar una tarea diaria de la base de datos
    public function destroy($id)
    {
        // Busca la tarea diaria por su ID
        $tareaDiaria = TareaDiaria::find($id);

        // Verifica si se encontró la tarea
        if (!$tareaDiaria) {
            return response()->json(['message' => 'Tarea diaria no encontrada'], 404);
        }

        // Elimina la tarea
        $tareaDiaria->delete();

        return response()->json(['message' => 'Tarea diaria eliminada'], 204);
    }

    // Actualizar una tarea diaria en la base de datos
    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'categoria_id' => 'required|integer',
            'nombre' => 'required|string|max:50',
            'fechaLimite' => 'required|date|after_or_equal:fechaIntroduccion',
            'prioridad' => 'required|string|max:10',
            'duracion' => 'nullable|integer'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Buscar la tarea diaria por su ID
        $tareaDiaria = TareaDiaria::find($id);

        if (!$tareaDiaria) {
            return response()->json(['message' => 'Tarea diaria no encontrada'], 404);
        }

        // Actualizar los datos de la tarea diaria
        $tareaDiaria->update($request->all());

        return response()->json($tareaDiaria, 200); // Código 200: OK
    }
}
