<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRmInmuebleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rm_inmueble', function (Blueprint $table) {
            $table->increments('IdInmueble');
            $table->string('Id_Almacen', 4)->nullable();
            $table->foreign('Id_Almacen')->references('Almacen')->on('rm_almacenes');
            $table->string('Inmueble', 100)->nullable();
            $table->integer('ind_central')->nullable();
            $table->string('Telefono', 50)->nullable();
            $table->string('ln_nombre_primer_responsable',150)->nullable();
            $table->string('ln_nombre_segundo_responsable',150)->nullable();
            $table->longText('Direccion')->nullable();
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
        Schema::dropIfExists('rm_inmueble');
    }
}
