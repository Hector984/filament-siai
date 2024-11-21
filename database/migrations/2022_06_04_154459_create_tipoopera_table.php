<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipooperaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rm_tipoopera', function (Blueprint $table) {
            $table->increments('Id_To');
            $table->string('Documento', 2);
            $table->string('Descripcion', 55);
            $table->char('Movimiento', 1);
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
        Schema::dropIfExists('rm_tipoopera');
    }
}
