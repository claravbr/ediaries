<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\DiarioEmociones;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class DiarioEmocionesController extends Controller
{

    // Buscar todos los objetos en BBDD
    public function index()
    {
        return DiarioEmociones::all();
    }

    // Buscar objeto en la BBDD por id
    public function show($id)
    {
        return DiarioEmociones::findOrFail($id);
    }

    // Introducir entrada del diario en la BBDD
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request['fecha'] = Carbon::now();
        $validator = Validator::make($request->all(), [
            'child_id' => 'required|integer',
            'emocion' => 'required|string|max:20',
            'descripcion' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $diarioEmocion = DiarioEmociones::create([
            'child_id' =>  $request->child_id,
            'fecha' => $request->fecha,
            'emocion' => $request->emocion,
            'descripcion' => $request->descripcion,
        ]);

        return response()->json($diarioEmocion, 200);
    }

    // Borrar objeto de la BBDD por ID
    public function destroy($id)
    {
        $diarioEmocion = DiarioEmociones::findOrFail($id);

        if (!$diarioEmocion) {
            return response()->json(['message' => 'Entrada no encontrada'], 404);
        }

        $diarioEmocion->delete();

        return response()->json(null, 204);
    }

}
