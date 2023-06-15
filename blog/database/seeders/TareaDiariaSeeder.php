<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TareaDiaria;

class TareaDiariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tareas = [
            [
                'child_id' => 1,
                'categoria_id' => 1,
                'nombre' => 'Hacer los deberes de matemáticas',
                'fechaIntroduccion' => now(),
                'fechaLimite' => now()->addDays(1),
                'prioridad' => 'Alta',
                'duracion' => 60,
            ],
            [
                'child_id' => 1,
                'categoria_id' => 2,
                'nombre' => 'Ordenar la habitación',
                'fechaIntroduccion' => now(),
                'fechaLimite' => now()->addDays(1),
                'prioridad' => 'Media',
                'duracion' => 30,
            ],
            [
                'child_id' => 2,
                'categoria_id' => 5,
                'nombre' => 'Hacer deporte',
                'fechaIntroduccion' => now(),
                'fechaLimite' => now()->addDays(1),
                'prioridad' => 'Baja',
                'duracion' => 20,
            ],
            [
                'child_id' => 1,
                'categoria_id' => 1,
                'nombre' => 'Estudiar para el examen de historia',
                'fechaIntroduccion' => now(),
                'fechaLimite' => now()->addDays(2),
                'prioridad' => 'Media',
                'duracion' => 120,
            ],
            [
                'child_id' => 2,
                'categoria_id' => 2,
                'nombre' => 'Preparar el almuerzo',
                'fechaIntroduccion' => now(),
                'fechaLimite' => now()->addDays(1),
                'prioridad' => 'Alta',
                'duracion' => 45,
            ],
            [
                'child_id' => 3,
                'categoria_id' => 4,
                'nombre' => 'Ir a ballet',
                'fechaIntroduccion' => now(),
                'fechaLimite' => now()->addDays(1),
                'prioridad' => 'Baja',
                'duracion' => 60,
            ],
            [
                'child_id' => 1,
                'categoria_id' => 1,
                'nombre' => 'Leer un libro',
                'fechaIntroduccion' => now(),
                'fechaLimite' => now()->addDays(3),
                'prioridad' => 'Baja',
                'duracion' => 30,
            ],
            [
                'child_id' => 5,
                'categoria_id' => 2,
                'nombre' => 'Ayudar a hacer la cena',
                'fechaIntroduccion' => now(),
                'fechaLimite' => now()->addDays(1),
                'prioridad' => 'Alta',
                'duracion' => 10,
            ],
            [
                'child_id' => 3,
                'categoria_id' => 3,
                'nombre' => 'Ir a un cumpleaños',
                'fechaIntroduccion' => now(),
                'fechaLimite' => now()->addDays(7),
                'prioridad' => 'Baja',
            ],
            [
                'child_id' => 4,
                'categoria_id' => 1,
                'nombre' => 'Estudiar para el examen de matemáticas',
                'fechaIntroduccion' => now(),
                'fechaLimite' => now()->addDays(2),
                'prioridad' => 'Alta',
                'duracion' => 90,
            ],
            [
                'child_id' => 4,
                'categoria_id' => 2,
                'nombre' => 'Limpiar el baño',
                'fechaIntroduccion' => now(),
                'fechaLimite' => now()->addDays(2),
                'prioridad' => 'Media',
                'duracion' => 45,
            ],
        ];

        foreach ($tareas as $tarea) {
            TareaDiaria::create($tarea);
        }
    }
}
