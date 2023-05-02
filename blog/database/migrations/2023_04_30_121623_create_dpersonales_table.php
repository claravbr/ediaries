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
            $table->string('sexo');
            $table->double('peso');
            $table->double('altura');
            $table->timestamp('fnacimiento');
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
        Schema::dropIfExists('dpersonales');
    }
}
