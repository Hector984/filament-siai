<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRmDresguardosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rm_dresguardos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Rfc',13);
            $table->foreign('Rfc')->references('Rfc')->on('rm_cresguardos');
            $table->smallInteger('Clave_Ur')->nullable();
            $table->string('No_Inventario',22);
            $table->smallInteger('verificado')->nullable();
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
        Schema::dropIfExists('rm_dresguardos');
    }
}
