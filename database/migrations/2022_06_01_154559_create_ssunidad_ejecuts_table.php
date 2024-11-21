<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSsunidadEjecutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ssunidad_ejecuts', function (Blueprint $table) {
            $table->increments('Ue');
            $table->unsignedInteger('Ur')->nullable();
            $table->foreign('Ur')->references('Ur')->on('ssunidad_respons');
            $table->string('Clave',5)->nullable();
            $table->string('Descripcion', 100)->nullable();
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
        Schema::dropIfExists('ssunidad_ejecuts');
    }
}
