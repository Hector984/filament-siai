<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRmNoparteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rm_noparte', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Id_Noparte', 15);
            $table->string('IdCabms', 100)->nullable();
            $table->foreign('IdCabms')->references('IdCabms')->on('rm_cabmses');
            $table->string('Descripcion', 40)->nullable();
            $table->string('Especificaciones', 80);
            $table->tinyInteger('Familia')->nullable();
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
        Schema::dropIfExists('rm_noparte');
    }
}
