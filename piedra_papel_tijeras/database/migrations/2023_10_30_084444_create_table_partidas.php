<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_partidas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jugador'); 
            $table->unsignedBigInteger('id_jugador2');  
            $table->unsignedBigInteger('ganador');                      
            $table->timestamps();            
            $table->foreign('id_jugador')->references('id')->on('table_usuarios');
            $table->foreign('id_jugador2')->references('id')->on('table_usuarios');
            $table->foreign('ganador')->references('id')->on('table_usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_partidas');
    }
};
