<?php

namespace App\Http\Controllers;

use App\Models\ChildActividadFavorita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChildActividadFavoritaController extends Controller
{

    // Crear una Actividad Favorita de un Child en la base de datos
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'child_id' => 'required|integer|exists:child,id',
            'actividadfavorita_id' => 'required|integer|exists:actividadfavorita,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $childActividadFavorita = ChildActividadFavorita::create($request->all());

        return response()->json($childActividadFavorita, 200);
    }

    // Crear varias Actividades Favoritas de un mismo Child en la base de datos
    public function createActividadesFavoritas(Request $request)
    {
        $child_id = $request->input('child_id');
        $actividadfavorita_ids = $request->input('actividadfavorita_ids');

        // Validar el child_id y la lista de actividadfavorita_ids
        $validator = Validator::make($request->all(), [
            'child_id' => 'required|integer|exists:child,id',
            'actividadfavorita_ids' => 'required|array',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Recorre la lista de actividadfavorita_ids y crea las relaciones
        foreach ($actividadfavorita_ids as $actividadfavorita_id) {
            $childActividadFavorita = new ChildActividadFavorita();
            $childActividadFavorita->child_id = $child_id;
            $childActividadFavorita->actividadfavorita_id = $actividadfavorita_id;
            $childActividadFavorita->save();
        }

        return response()->json(null, 204);
    }
}
