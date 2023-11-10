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
        $request['terminada'] = 0;
        $request['fechaLimite'] = Carbon::createFromFormat('d/m/Y', $request->fechaLimite); // Convierte la fecha a un objeto Carbon.
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

    // Marcar una tarea como terminada
    public function tareaTerminada($id)
    {
        // Buscar la tarea diaria por su ID
        $tareaDiaria = TareaDiaria::find($id);

        // Verificar si se encontró la tarea
        if (!$tareaDiaria) {
            return response()->json(['message' => 'Tarea diaria no encontrada'], 404);
        }

        try {
            $tareaDiaria->terminada = true;
            $tareaDiaria->save();

            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al marcar la tarea como terminada', 'error' => $e->getMessage()], 500);
        }
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
        $request['fechaLimite'] = Carbon::createFromFormat('d/m/Y', $request->fechaLimite); // Convierte la fecha a un objeto Carbon.
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
