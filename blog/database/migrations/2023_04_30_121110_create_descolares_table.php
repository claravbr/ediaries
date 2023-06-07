<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescolaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descolares', function (Blueprint $table) {
            $table->increments('id'); // El id es un autonumérico.
            $table->integer('child_id')->unsigned()->unique()->nullable(false);
            $table->string('nivelAcademico');
            $table->string('centroEducativo');
            $table->boolean('repetidor')->default(false);
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
        Schema::dropIfExists('descolares');
    }
}
