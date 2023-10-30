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
        Schema::create('table_usuarios', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");             
            $table->string("password");
            $table->integer("partidas_jugadas");
            $table->integer("partidas_ganadas");
            $table->integer("rol");
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
        Schema::dropIfExists('table_usuarios');
    }
};
