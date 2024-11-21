<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rm_cabmses', function (Blueprint $table) {
            $table->string('IdCabms', 100)->primary();
            $table->string('Descripcion', 100)->nullable();
            $table->integer('Nivel')->nullable();
            $table->integer('Partida1')->nullable();
            $table->integer('Partida2')->nullable();
            $table->integer('Estatus')->nullable()->default(0);
            $table->integer('Ccop')->nullable();
            $table->string('Pcontable', 100)->nullable();
            $table->string('Descpartida', 100)->nullable();
            $table->string('Historico_Clave_Cabm', 100)->nullable();
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
        Schema::dropIfExists('rm_cabmses');
    }
}
