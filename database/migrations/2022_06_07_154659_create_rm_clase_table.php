<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRmClaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rm_clase', function (Blueprint $table) {
            $table->increments('Id_Clase');
            $table->string('Subgrupo', 3);
            $table->foreign('Subgrupo')->references('Subgrupo')->on('rm_subgrupo');
            $table->integer('Clase');
            $table->string('Descripcion', 100);
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
        Schema::dropIfExists('rm_clase');
    }
}