<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildActividadfavoritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_actividadfavorita', function (Blueprint $table) {
            $table->integer('child_id')->unsigned();
            $table->integer('actividadfavorita_id')->unsigned();
            $table->timestamps();

            $table->foreign('child_id')->references('id')->on('child')->onDelete('cascade');
            $table->foreign('actividadfavorita_id')->references('id')->on('actividadfavorita')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('child_actividadfavorita');
    }
}
