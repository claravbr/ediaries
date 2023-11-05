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
            $table->increments('id'); // El id es un autonumérico.
            $table->integer('child_id')->unsigned()->unique()->nullable(false);
            $table->string('enfermedad')->nullable();
            $table->boolean('tdah')->default(false);
            $table->string('tdahTipo')->nullable();
            $table->integer('tdahEdad')->nullable();
            $table->string('dificultad')->nullable();
            $table->boolean('medicacion')->default(false);
            $table->string('medicacionAntiguedad')->nullable();
            $table->string('medicacionInfo')->nullable();
            $table->boolean('intervencion')->nullable()->default(false);
            $table->timestamps();

            $table->foreign('child_id')->references('id')->on('child')->onDelete('cascade');
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
