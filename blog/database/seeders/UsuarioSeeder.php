<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = [
            [
                'nombre' => 'María',
                'apellidos' => 'García López',
                'email' => 'maria@gmail.com',
                'password' => 'password123',
                'fotoPath' => null,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'David',
                'apellidos' => 'Martínez Rodríguez',
                'email' => 'david@example.com',
                'password' => 'password456',
                'fotoPath' => null,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Laura',
                'apellidos' => 'Fernández Pérez',
                'email' => 'laura@example.com',
                'password' => 'password789',
                'fotoPath' => null,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Javier',
                'apellidos' => 'Sánchez Gómez',
                'email' => 'javier@example.com',
                'password' => 'password321',
                'fotoPath' => null,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Ana',
                'apellidos' => 'Torres Navarro',
                'email' => 'ana@example.com',
                'password' => 'password654',
                'fotoPath' => null,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('usuarios')->insert($usuarios);
    }
}
