<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Enums\TipoTDAH;
use App\Enums\DificultadAprendizaje;

class DclinicosSeeder extends Seeder
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
            $tdah = $this->hasTDAH();
            $tdahTipo = null;
            $tdahEdad = null;

            if($tdah){ //Solo deben estar informados si $tdah = true
                $tdahTipo = TipoTDAH::getDescription(TipoTDAH::getRandomValue());
                $tdahEdad = $this->getTDAHEdad();
            }

            $dificultad = null;
            if($this->getDificultadAprendizaje()){
                $dificultad = DificultadAprendizaje::getDescription(DificultadAprendizaje::getRandomValue());
            }

            $medicacion = $this->hasMedicacion();
            $medicacionAntiguedad = null;
            $medicacionInfo = null;

            if($medicacion){ //Solo deben estar informados si $medicacion = true
                $medicacionAntiguedad = $this->getMedicacionAntiguedad();
                $medicacionInfo = $this->getMedicacionInfo();
            }

            $intervencion = $this->needsIntervencion();

            DB::table('dclinicos')-> insert([
                'child_id' => $child,
                'enfermedad' => $this->getEnfermedad(),
                'tdah' => $tdah,
                'tdahTipo' => $tdahTipo,
                'tdahEdad' => $tdahEdad,
                'dificultad' => $dificultad,
                'medicacion' => $medicacion,
                'medicacionAntiguedad' => $medicacionAntiguedad,
                'medicacionInfo' => $medicacionInfo,
                'intervencion' => $intervencion,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }

    /**
     * Get a random enfermedad.
     *
     * @return string|null
     */
    private function getEnfermedad(): ?string
    {
        $enfermedades = ['Enfermedad A', 'Enfermedad B', null];
        return $enfermedades[array_rand($enfermedades)];
    }

    /**
     * Determine if the child has TDAH.
     *
     * @return bool
     */
    private function hasTDAH(): bool
    {
        $tdah = rand(0, 1);
        return (bool)$tdah;
    }

    /**
     * Get a random TDAH edad.
     *
     * @return int
     */
    private function getTDAHEdad(): int
    {
        return rand(0, 17);
    }

    /**
     * Get a random dificultad de aprendizaje.
     *
     * @return string|null
     */
    private function getDificultadAprendizaje(): ?string
    {
        $dificultadaprendizaje = rand(0,1);
        return (bool)$dificultadaprendizaje;
    }

    /**
     * Determine if the child takes medication.
     *
     * @return bool
     */
    private function hasMedicacion(): bool
    {
        $medicacion = rand(0, 1);
        return (bool)$medicacion;
    }

    /**
     * Get a random medication antiguedad.
     *
     * @return string
     */
    private function getMedicacionAntiguedad(): string
    {
        $antiguedades = ['Menos de un año', '1-3 años', 'Más de 3 años'];
        return $antiguedades[array_rand($antiguedades)];
    }

    /**
     * Get a random medication info.
     *
     * @return string
     */
    private function getMedicacionInfo(): string
    {
        return 'Información de la medicación';
    }

    /**
     * Determine if the child needs intervention.
     *
     * @return bool|null
     */
    private function needsIntervencion(): ?bool
    {
        $intervencion = rand(0, 1);
        return (bool)$intervencion;
    }
}
