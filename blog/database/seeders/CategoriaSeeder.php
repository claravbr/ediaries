<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            [
                'nombre' => 'Deberes',
                'descripcion' => 'Tareas escolares que deben realizarse en casa. Incluye en esta categoría tareas como deberes, trabajos, estudio...'
            ],
            [
                'nombre' => 'Casa',
                'descripcion' => 'Tareas que deben realizarse en casa. Incluye en esta categoría tareas como ordenar la habitación, ayudar a limpiar...'
            ],
            [
                'nombre' => 'Amigos',
                'descripcion' => 'Tareas relacionadas con tus amigos. Incluye en esta categoría tareas como devolver algo a un amigo...'
            ],
            [
                'nombre' => 'Extraescolares',
                'descripcion' => 'Tareas relacionadas con tus actividades extraescolares. Incluye en esta categoría tareas como ir a baloncesto, terminar dibujo de clases de pintura...'
            ],
            [
                'nombre' => 'Deportes',
                'descripcion' => 'Tareas relacionadas con actividades de deporte. Incluye en esta categoría tareas como jugar baloncesto, jugar fútbol...'
            ]
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
