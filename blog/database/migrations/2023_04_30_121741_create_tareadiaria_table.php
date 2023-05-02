<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareadiariaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareadiaria', function (Blueprint $table) {
            $table->increments('id'); // El id es un autonumérico.
            $table->string('nombre');
            $table->timestamp('fechaIntroduccion');
            $table->timestamp('fechaLimite');
            $table->string('prioridad');
            $table->integer('duracion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tareadiaria');
    }
}
