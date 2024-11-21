<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_r_detalle_solicitudes', function (Blueprint $table) {
            $table->id('id_detalle_solicitud');
            $table->unsignedBigInteger('fk01_id_solicitud');
            $table->foreign('fk01_id_solicitud')->references('id_solicitud')->on('tb_solicitud');
            $table->string('ln_no_inventario', 21);
            $table->text('txt_descripcion');
            $table->integer('sn_estatus');
            $table->text('txt_observaciones');
            $table->timestamp('dt_fecha_captura');
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
        Schema::dropIfExists('detalle_solicitudes');
    }
}
