<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child', function (Blueprint $table) {
            $table->increments('id'); // El id es un autonumérico.
            $table->unsignedInteger('usuario_id'); // Agregar columna para la clave foránea
            $table->timestamps();

            $table->foreign('usuario_id') // Definir relación de la clave foránea
            ->references('id')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('child');
    }
}
