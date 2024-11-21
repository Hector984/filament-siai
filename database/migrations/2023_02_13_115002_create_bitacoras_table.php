<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitacorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_bitacora', function (Blueprint $table) {
            $table->bigIncrements('id_bitacora');
            $table->foreignId('fk01_usuario_afecta')->constrained('users');
            $table->string('sn_ur_origen');
            $table->string('ln_nombre_usuario_afecta');
            $table->string('ln_rfc_usuario_afectado', 13);
            $table->string('sn_ur_destino');
            $table->string('ln_nombre_usuario_afectado');
            $table->string('ln_no_inventario');
            $table->string('ln_accion');
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
        Schema::dropIfExists('bitacoras');
    }
}
