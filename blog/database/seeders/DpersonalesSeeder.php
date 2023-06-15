<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Enums\Sexo;
use Carbon\Carbon;

class DpersonalesSeeder extends Seeder
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
            DB::table('dpersonales')-> insert([
                'child_id' => $child,
                'sexo' => Sexo::getDescription(Sexo::getRandomValue()),
                'peso' => rand(0, 55), //En kg
                'altura' => rand(100, 180)/100, //En m
                'fnacimiento' => $this->getRandomFechaNacimiento(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }

    /**
     * Get a random birthdate for the child.
     *
     * @return \Carbon\Carbon
     */
    private function getRandomFechaNacimiento(): Carbon
    {
        return Carbon::now()->subYears(rand(1, 17))->subMonths(rand(0, 11))->subDays(rand(0, 30))->startOfDay();
    }
}
