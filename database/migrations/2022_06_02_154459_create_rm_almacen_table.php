<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRmAlmacenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rm_almacenes', function (Blueprint $table) {
            $table->string('Almacen', 4)->primary();
            $table->string('Cuenta', 8);
            $table->string('Descripcion', 50);
            $table->string('Almacenista', 50)->nullable();
            $table->string('Puesto_Alm', 50)->nullable();
            $table->string('Direccion', 200)->nullable();
            $table->string('Telefono', 25)->nullable();
            $table->string('Email', 80)->nullable();
            $table->string('Responsable_C', 50)->nullable();
            $table->string('Puesto_Resp_C', 50)->nullable();
            $table->string('Responsable_I', 50)->nullable();
            $table->string('Puesto_Resp_I', 50)->nullable();

            $table->unsignedInteger('Ur')->nullable();
            $table->foreign('Ur')->references('Ur')->on('ssunidad_respons');
            $table->unsignedInteger('Ue')->nullable();
            $table->foreign('Ue')->references('Ue')->on('ssunidad_ejecuts');

            $table->unsignedInteger('Dependencia')->nullable();
            $table->foreign('Dependencia')->references('id_dependencia')->on('tb_cat_dependencias');

            $table->tinyInteger('Accesoif');
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
        Schema::dropIfExists('rm_almacenes');
    }
}
