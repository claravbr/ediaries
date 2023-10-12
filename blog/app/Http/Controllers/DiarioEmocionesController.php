<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\DiarioEmociones;
use Illuminate\Http\Request;
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

    // Buscar todos los objetos en BBDD de un Child id dado
    public function getAllDiarioEmocionesForChild($childId)
    {
        $child = Child::find($childId);

        if (!$child) {
            return response()->json(['message' => 'Child not found'], 404);
        }

        $diarioEmociones = $child->diarioEmociones;

        return response()->json($diarioEmociones, 200);
    }

    // Introducir objeto en la BBDD
    public function store(Request $request)
    {
        // Hacer la validación
        $input = $request->all();
        $validator = Validator::make($input, [
            'child_id' => 'required|integer',
            'fecha' => 'required|date',
            'emocion' => 'required|string|max:20',
            'descripcion' => 'required|string|max:50',
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

    // Borrar objeto de la BBDD
    public function destroy(DiarioEmociones $diarioEmocion)
    {
        $diarioEmocion->delete();

        return response()->json(null, 204); // 204: No content
    }

    // Actualizar objeto de la BBDD
    public function update(Request $request, DiarioEmociones $diarioEmocion)
    {
        // Hacer la validación de que los datos que vienen en la petición son válidos.
        $input = $request->all();
        $validator = Validator::make($input, [
            'child_id' => 'required|integer',
            'fecha' => 'required|date',
            'emocion' => 'required|string|max:20',
            'descripcion' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $diarioEmocion->update($request->all());

        return response()->json($diarioEmocion, 200); // Código 200: OK
    }
}
