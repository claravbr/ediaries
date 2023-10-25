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

        // Validar el child_id y la lista de actividadfavorita_ids (puedes agregar más validaciones según tus necesidades)
        $validator = Validator::make($request->all(), [
            'child_id' => 'required|integer|exists:child,id',
            'actividadfavorita_ids' => 'required|array',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Recorre la lista de actividadfavorita_ids y crea relaciones en la base de datos
        foreach ($actividadfavorita_ids as $actividadfavorita_id) {
            $childActividadFavorita = new ChildActividadFavorita();
            $childActividadFavorita->child_id = $child_id;
            $childActividadFavorita->actividadfavorita_id = $actividadfavorita_id;
            $childActividadFavorita->save();
        }

        return response()->json(null, 204);
    }

    // Eliminar una relación Child - Actividad Favorita de la base de datos
    public function destroy($child_id, $actividadfavorita_id)
    {
        // Encuentra la relación Child - Actividad Favorita por los IDs proporcionados
        $childActividadFavorita = ChildActividadFavorita::where('child_id', $child_id)
            ->where('actividadfavorita_id', $actividadfavorita_id)
            ->first();

        if (!$childActividadFavorita) {
            return response()->json(['message' => 'Relación Child - Actividad Favorita no encontrada'], 404);
        }

        $childActividadFavorita->delete();

        return response()->json(null, 204); // Código 204: No Content
    }
}
