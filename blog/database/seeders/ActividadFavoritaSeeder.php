<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActividadFavoritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actividades = [
            'Jugar al fútbol',
            'Pintar y dibujar',
            'Bailar',
            'Leer libros',
            'Jugar videojuegos',
            'Hacer manualidades',
            'Montar en bicicleta',
            'Cantar',
            'Ver películas',
            'Hacer deportes acuáticos',
        ];

        foreach ($actividades as $actividad) {
            DB::table('actividadfavorita')->insert([
                'nombre' => $actividad,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
