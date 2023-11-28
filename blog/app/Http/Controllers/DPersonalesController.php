<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DPersonales;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class DPersonalesController extends Controller
{
    // Buscar todos los dpersonales en la base de datos
    public function index()
    {
        return DPersonales::all();
    }

    // Buscar dpersonales por ID
    public function show($id)
    {
        return DPersonales::findOrFail($id);
    }

    // Crear un nuevos dpersonales
    public function store(Request $request)
    {
        // Convierte la fecha a un objeto Carbon.
        $request['fnacimiento'] = Carbon::createFromFormat('d/m/Y', $request->fnacimiento);
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
            return response()->json(['message' => 'Datos no encontrados'], 404);
        }

        // Elimina el registro
        $dpersonales->delete();

        return response()->json(null, 204);
    }

    // Actualizar dpersonales por ID
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

        // Buscar dpersonales por ID
        $dpersonales = DPersonales::findOrFail($id);

        if (!$dpersonales) {
            return response()->json(['message' => 'Datos no encontrados'], 404);
        }

        // Actualizar los datos
        $dpersonales->update($request->all());

        return response()->json($dpersonales, 200); // Código 200: OK
    }
}
