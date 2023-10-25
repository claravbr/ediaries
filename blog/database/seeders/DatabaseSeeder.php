<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Eliminar todos los datos de las tablas
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('usuarios')->truncate();
        DB::table('child')->truncate();
        DB::table('actividadfavorita')->truncate();
        DB::table('child_actividadfavorita')->truncate();
        DB::table('diarioemociones')->truncate();
        DB::table('dpersonales')->truncate();
        DB::table('descolares')->truncate();
        DB::table('dclinicos')->truncate();
        DB::table('categoria')->truncate();
        DB::table('tareadiaria')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        //Las llamadas a los Seeders de cada clase se hacen en orden a como se crearía la BBDD
        $this->call(UsuarioSeeder::class);
        $this->call(ChildSeeder::class);
        $this->call(ActividadFavoritaSeeder::class);
        $this->call(ChildActividadFavoritaSeeder::class);
        $this->call(DiarioEmocionesSeeder::class);
        $this->call(DpersonalesSeeder::class);
        $this->call(DescolaresSeeder::class);
        $this->call(DclinicosSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(TareaDiariaSeeder::class);

    }
}
