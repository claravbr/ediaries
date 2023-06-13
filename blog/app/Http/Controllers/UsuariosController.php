<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Validator;

class UsuariosController extends Controller
{
    // Buscar todos los objetos en BBDD
    public function index()
    {
        return Usuario::all();
    }

    // Buscar objeto en la BBDD por id
    public function show($id)
    {
        return Usuario::findOrFail($id);
    }

    // Introducir objeto en la BBDD
    public function store(Request $request)
    {
        // Hacer la validación
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|max:100',
            'type' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $usuario= Usuario::create($request->all());

        return response()->json($usuario, 201); // Código 201: created.
    }

    // Borrar objeto de la BBDD
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return response()->json(null, 204); // 204: No content
    }

    public function update(Request $request, Usuario $usuario)
    {
        // Hacer la validación de que los datos que vienen en la petición son válidos.
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|max:100',
            'type' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $usuario->update($request->all());

        return response()->json($usuario, 200);
    }
}
