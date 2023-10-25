<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChildSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener todos los ids de usuarios de la tabla usuarios
        $usuarios = DB::table('usuarios')->pluck('id');

        foreach ($usuarios as $usuario) {
            DB::table('child')->insert([
                'usuario_id' => $usuario,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
