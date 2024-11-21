<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBitacoraDocumentoNotaCredito extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_bitacora_documento_nota_credito', function (Blueprint $table) {
            $table->id();
            $table->integer('id_usuario_afecta');
            $table->string('ln_nombre_afecta',100);
            $table->text('txt_accion');
            $table->timestamp('dtm_fecha_accion');
            $table->string('sn_almacen_afectado');
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
        Schema::dropIfExists('tb_bitacora_documento_nota_credito');
    }
}
