<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Enums\Emocion;
use Carbon\Carbon;

class DiarioEmocionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        // Obtener todos los ids de childs de la tabla child
        $children = DB::table('child')->pluck('id');

        foreach ($children as $child) {
            //Se crea una entrada al diario de los últimos 5 días para cada niño, con una emoción aleatoria
            for ($i = 1; $i <= 5; $i++) {
                $fecha = Carbon::now()->subDays($i);
                $emocion = Emocion::getRandomValue();

                DB::table('diarioemociones')-> insert([
                    'child_id' => $child,
                    'fecha' => $fecha,
                    'emocion' => Emocion::getDescription($emocion),
                    'descripcion' => $this->getDescripcionEmocion($emocion),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }

    /**
     * Get the description for the given emotion.
     *
     * @param int $emocion
     * @return string
     * @throws \Exception
     */
    private function getDescripcionEmocion(int $emocion): string
    {
        switch ($emocion) {
            case Emocion::Enfadado:
                return 'Me han regañado.';
            case Emocion::Triste:
                return 'He suspendido un examen.';
            case Emocion::Cansado:
                return 'He tenido muchos deberes en el cole.';
            case Emocion::Contento:
                return 'He ido a jugar con un amigo.';
            case Emocion::Emocionado:
                return 'Mañana tengo una excursión.';
            default:
                throw new \Exception('Emoción no definida');
        }
    }
}
