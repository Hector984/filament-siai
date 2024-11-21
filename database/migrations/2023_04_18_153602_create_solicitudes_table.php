<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_solicitud', function (Blueprint $table) {
            $table->id('id_solicitud');
            $table->string('ln_nombre',50);
            $table->string('sn_rfc',13);

            $table->string('fk01_id_almacen', 4)->nullable();
            $table->foreign('fk01_id_almacen')->references('Almacen')->on('rm_almacenes');

            $table->string('fk02_ur', 50)->nullable();
            $table->string('sn_clave_ue', 10)->nullable();

            $table->unsignedInteger('fk03_id_propinmueble')->nullable();
            $table->foreign('fk03_id_propinmueble')->references('Id_Propinmueble')->on('rm_propinmuebles');

            $table->string('sn_estatus', 1)->default('C');
            $table->timestamp('dt_fecha_captura');
            $table->timestamp('dt_fecha_atencion')->nullable();
            $table->timestamps();

            //Indices
            $table->index('fk02_ur','idx_01_ur');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_solicitud');
    }
}
