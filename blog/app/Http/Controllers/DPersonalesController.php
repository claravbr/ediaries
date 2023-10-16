<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DPersonales;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class DPersonalesController extends Controller
{
    // Buscar todos los registros de dpersonales en la base de datos
    public function index()
    {
        return DPersonales::all();
    }

    // Buscar un registro de dpersonales por su ID
    public function show($id)
    {
        return DPersonales::findOrFail($id);
    }

    // Crear un nuevo registro de dpersonales en la base de datos
    public function store(Request $request)
    {
        $request['fnacimiento'] = Carbon::createFromFormat('d/m/Y', $request->fnacimiento); // Convierte la fecha a un objeto Carbon.
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'child_id' => 'required|integer|exists:child,id',
            'sexo' => 'required|string|max:10',
            'peso' => 'required|numeric',
            'altura' => 'required|numeric',
            'fnacimiento' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $dpersonales = DPersonales::create($request->all());

        return response()->json($dpersonales, 200);
    }

    // Eliminar un registro de dpersonales de la base de datos
    public function destroy($id)
    {
        // Busca el registro de dpersonales por su ID
        $dpersonales = DPersonales::find($id);

        // Verifica si se encontró el registro
        if (!$dpersonales) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        // Elimina el registro
        $dpersonales->delete();

        return response()->json(['message' => 'Registro eliminado'], 204);
    }

    // Actualizar un registro de dpersonales en la base de datos
    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'sexo' => 'required|string|max:10',
            'peso' => 'required|numeric',
            'altura' => 'required|numeric',
            'fnacimiento' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Buscar el registro de dpersonales por su ID
        $dpersonales = DPersonales::find($id);

        if (!$dpersonales) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        // Actualizar los datos del registro de dpersonales
        $dpersonales->update($request->all());

        return response()->json($dpersonales, 200); // Código 200: OK
    }
}
