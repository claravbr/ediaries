<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiarioemocionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diarioemociones', function (Blueprint $table) {
            $table->increments('id'); // El id es un autonumérico.
            $table->integer('child_id')->unsigned();
            $table->timestamp('fecha');
            $table->string('emocion');
            $table->string('descripcion');
            $table->timestamps();

            $table->foreign('child_id')->references('id')->on('child')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diarioemociones');
    }
}
