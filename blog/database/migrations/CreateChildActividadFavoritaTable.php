<?php

class CreateChildActividadFavoritaTable
{
    public function up(){
        Schema::create('child_actividadfavorita', function (Blueprint $table) {

            $table->string('child_id')->unsigned();
            $table->string('actividadfavorita_id')->unsigned();
            $table->foreign('child_id')->references('email')->on('child')
                ->onDelete('cascade');
            $table->foreign('actividadfavorita_id')->references('nombre')->on('actividadfavorita')
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
        Schema::dropIfExists('child_actividadfavorita');
    }
}