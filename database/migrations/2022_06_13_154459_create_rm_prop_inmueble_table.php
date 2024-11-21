<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRmPropinmuebleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rm_propinmuebles', function (Blueprint $table) {
            $table->increments('Id_Propinmueble');

            $table->string('Almacen', 4);
            $table->foreign('Almacen')->references('Almacen')->on('rm_almacenes');

            $table->unsignedInteger('IdInmueble');
            $table->foreign('IdInmueble')->references('IdInmueble')->on('rm_inmueble');

            $table->unsignedInteger('IdNivel');
            $table->foreign('IdNivel')->references('IdNivel')->on('rm_niveles');

            $table->unsignedInteger('Id_Seccion');
            $table->foreign('Id_Seccion')->references('Id_Seccion')->on('rm_secciones');

            $table->string('Resp_Nivel', 50);
            $table->string('Resp_Seccion', 50);
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
        Schema::dropIfExists('rm_propinmuebles');
    }
}