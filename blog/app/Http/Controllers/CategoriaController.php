<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    // Buscar todas las categorías en la base de datos
    public function index()
    {
        return Categoria::all();
    }

    // Buscar una categoría por su ID
    public function show($id)
    {
        return Categoria::findOrFail($id);
    }

    // Crear una nueva categoría en la base de datos
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:20',
            'descripcion' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Crear una nueva categoría
        $categoria = Categoria::create($request->all());

        return response()->json($categoria, 201); // Código 201: Creado exitosamente
    }

    // Eliminar una categoría de la base de datos
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return response()->json(null, 204); // Código 204: Sin contenido
    }

    // Actualizar una categoría en la base de datos
    public function update(Request $request, Categoria $categoria)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:20',
            'descripcion' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Actualizar los datos de la categoría
        $categoria->update($request->all());

        return response()->json($categoria, 200); // Código 200: OK
    }
}
