<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRmSubgrupoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rm_subgrupo', function (Blueprint $table) {
            $table->string('Subgrupo', 3)->primary();
            $table->unsignedInteger('Ctmayor');
            $table->foreign('Ctmayor')->references('Ctmayor')->on('rm_cuentas_mayor');
            $table->string('Descripcion', 50);
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
        Schema::dropIfExists('rm_subgrupo');
    }
}