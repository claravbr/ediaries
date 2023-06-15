<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChildActividadFavoritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener los child_ids y actividadfavorita_ids de las respectivas tablas
        $childIds = DB::table('child')->pluck('id');
        $actividadFavoritaIds = DB::table('actividadfavorita')->pluck('id');

        // Asignar actividades favoritas a los children de forma aleatoria
        foreach ($childIds as $childId) {

            // Generar una cantidad aleatoria de posibles actividades favoritas de entre las actividades posibles
            $randomIndexes = array_rand($actividadFavoritaIds->toArray(), rand(1, 3));

            // Convertir en array si se obtiene solo una actividad favorita
            if (!is_array($randomIndexes)) {
                $randomIndexes = [$randomIndexes];
            }

            // Asignar las actividades favoritas al child
            foreach ($randomIndexes as $index) {
                DB::table('child_actividadfavorita')->insert([
                    'child_id' => $childId,
                    'actividadfavorita_id' => $actividadFavoritaIds[$index],
                ]);
            }
        }
    }
}


