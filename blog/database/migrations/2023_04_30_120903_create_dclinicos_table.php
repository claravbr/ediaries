<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDclinicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dclinicos', function (Blueprint $table) {
            $table->id();
            $table->string('enfermedad');
            $table->boolean('tdah')->default('false');
            $table->string('tdahTipo')->nullable();
            $table->integer('tdahEdad')->nullable();
            $table->string('dificultad')->nullable();
            $table->string('medicacion')->nullable();
            $table->string('medicacionAntiguedad')->nullable();
            $table->boolean('intervencion')->nullable()->default('false');
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
        Schema::dropIfExists('dclinicos');
    }
}
