<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDpersonalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dpersonales', function (Blueprint $table) {
            $table->increments('id'); // El id es un autonumérico.
            $table->integer('child_id')->unsigned()->unique()->nullable(false);
            $table->string('sexo');
            $table->double('peso');
            $table->double('altura');
            $table->timestamp('fnacimiento');
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
        Schema::dropIfExists('dpersonales');
    }
}
