<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Enums\NivelAcademico;

class DescolaresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener todos los ids de childs de la tabla child
        $children = DB::table('child')->pluck('id');

        foreach ($children as $child) {
            $repetidor = $this->isRepetidor();

            DB::table('descolares')-> insert([
                'child_id' => $child,
                'nivelAcademico' => NivelAcademico::getDescription(NivelAcademico::getRandomValue()),
                'centroEducativo' => $this->getCentroEducativo(),
                'repetidor' => $repetidor,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }

    /**
     * Get a random centro educativo.
     *
     * @return string
     */
    private function getCentroEducativo(): string
    {
        $centros = ['Colegio A', 'Colegio B', 'Colegio C', 'Colegio D'];
        return $centros[array_rand($centros)];
    }

    /**
     * Determine if the child is repetidor.
     *
     * @return bool
     */
    private function isRepetidor(): bool
    {
        $repetidor = rand(0, 1);
        return (bool)$repetidor;
    }
}
