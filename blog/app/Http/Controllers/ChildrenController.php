<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChildrenController extends Controller
{
    // Buscar todos los objetos en BBDD
    public function index()
    {
        return Child::with('usuario')->get();
    }

    // Buscar objeto en la BBDD por id
    public function show($id)
    {
        return Child::findOrFail($id)::with('usuario')->get();
    }

    // Introducir objeto en la BBDD
    public function store(Request $request)
    {
        // Hacer la validación
        $input = $request->all();
        $validator = Validator::make($input, [
            'usuario_id' => 'required|exists:usuarios,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $child = Child::create($request->all());

        return response()->json($child, 201); // Código 201: created.
    }

    // Borrar objeto de la BBDD
    public function destroy(Child $child)
    {
        $child->delete();

        return response()->json(null, 204); // 204: No content
    }

    public function update(Request $request, Child $child)
    {
        // Hacer la validación de que los datos que vienen en la petición son válidos.
        $input = $request->all();
        $validator = Validator::make($input, [
            'usuario_id' => 'required|exists:usuarios,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $child->update($request->all());

        return response()->json($child, 200); //Código 200: OK
    }


}
