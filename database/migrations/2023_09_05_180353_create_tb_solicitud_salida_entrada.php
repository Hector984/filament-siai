<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_solicitud_salida_entrada', function (Blueprint $table) {
            $table->id('id_solicitud_salida_entrada');
            $table->string('ln_folio_salida',120)->nullable();
            $table->string('ln_folio_entrada',120)->nullable();
            $table->unsignedInteger('fk01_id_inmueble_origen')->nullable();
            $table->foreign('fk01_id_inmueble_origen')->references('IdInmueble')->on('rm_inmueble');
            $table->unsignedInteger('fk02_id_inmueble_destino')->nullable();
            $table->foreign('fk02_id_inmueble_destino')->references('IdInmueble')->on('rm_inmueble');

            $table->string('ln_tipo_persona_origen',10);
            $table->string('ln_nombre_portador_origen',120)->nullable();
            $table->string('ln_rfc_portador_origen',13)->nullable();
            $table->string('ln_area_portador_origen',120)->nullable();
            $table->unsignedInteger('fk03_piso_portador_origen')->nullable();
            $table->foreign('fk03_piso_portador_origen')->references('IdNivel')->on('rm_niveles');
            $table->string('ln_telefono_portador_origen',15)->nullable();
            $table->string('ln_extension_portador_origen',8)->nullable();

            $table->string('ln_tipo_persona_destino',10);
            $table->string('ln_nombre_portador_destino',120)->nullable();
            $table->string('ln_rfc_portador_destino',13)->nullable();
            $table->string('ln_area_portador_destino',120)->nullable();
            $table->unsignedInteger('fk04_piso_portador_destino')->nullable();
            $table->foreign('fk04_piso_portador_destino')->references('IdNivel')->on('rm_niveles');
            $table->string('ln_telefono_portador_destino',15)->nullable();
            $table->string('ln_extension_portador_destino',8)->nullable();

            $table->string('ln_nombre_primer_autoriza_origen',120)->nullable();
            $table->string('ln_rfc_primer_autoriza_origen',13)->nullable();
            $table->string('ln_area_primer_autoriza_origen',120)->nullable();
            $table->unsignedInteger('fk05_piso_primer_aut_origen')->nullable();
            $table->foreign('fk05_piso_primer_aut_origen')->references('IdNivel')->on('rm_niveles');
            $table->string('ln_telefono_primer_autoriza_origen',15)->nullable();
            $table->string('ln_extension_primer_autoriza_origen',8)->nullable();

            $table->string('ln_nombre_segundo_autoriza_origen',120)->nullable();
            $table->string('ln_rfc_segundo_autoriza_origen',13)->nullable();
            $table->string('ln_area_segundo_autoriza_origen',120)->nullable();
            $table->unsignedInteger('fk06_piso_segundo_aut_origen')->nullable();
            $table->foreign('fk06_piso_segundo_aut_origen')->references('IdNivel')->on('rm_niveles');
            $table->string('ln_telefono_segundo_autoriza_origen',15)->nullable();
            $table->string('ln_extension_segundo_autoriza_origen',8)->nullable();

            $table->string('ln_nombre_primer_autoriza_destino',120)->nullable();
            $table->string('ln_rfc_primer_autoriza_destino',13)->nullable();
            $table->string('ln_area_primer_autoriza_destino',120)->nullable();
            $table->unsignedInteger('fk07_piso_primer_aut_destino')->nullable();
            $table->foreign('fk07_piso_primer_aut_destino')->references('IdNivel')->on('rm_niveles');
            $table->string('ln_telefono_primer_autoriza_destino',15)->nullable();
            $table->string('ln_extension_primer_autoriza_destino',8)->nullable();

            $table->string('ln_nombre_segundo_autoriza_destino',120)->nullable();
            $table->string('ln_rfc_segundo_autoriza_destino',13)->nullable();
            $table->string('ln_area_segundo_autoriza_destino',120)->nullable();
            $table->unsignedInteger('fk08_piso_segundo_aut_desti')->nullable();
            $table->foreign('fk08_piso_segundo_aut_desti')->references('IdNivel')->on('rm_niveles');
            $table->string('ln_telefono_segundo_autoriza_destino',15)->nullable();
            $table->string('ln_extension_segundo_autoriza_destino',8)->nullable();

            $table->text('ln_justificacion_salida')->nullable();
            $table->text('ln_justificacion_entrada')->nullable();
            $table->text('ln_accesorios_salida')->nullable();
            $table->text('ln_accesorios_entrada')->nullable();
            $table->unsignedInteger('clave_ur_salida')->nullable();
            $table->foreign('clave_ur_salida')->references('Ur')->on('ssunidad_respons');
            $table->unsignedInteger('clave_ur_entrada')->nullable();
            $table->foreign('clave_ur_entrada')->references('Ur')->on('ssunidad_respons');
            $table->string('sn_operacion_salida',20);
            $table->string('sn_operacion_entrada',20);
            $table->timestamp('dtm_fecha_captura_salida')->nullable();
            $table->timestamp('dtm_fecha_captura_entrada')->nullable();
            $table->string('fk09_almacen_salida', 4)->nullable();
            $table->foreign('fk09_almacen_salida')->references('Almacen')->on('rm_almacenes');
            $table->string('fk10_almacen_entrada', 4)->nullable();
            $table->foreign('fk10_almacen_entrada')->references('Almacen')->on('rm_almacenes');
            $table->integer('ind_actualiza_resguardo_salida')->nullable();
            $table->integer('ind_actualiza_resguardo_entrada')->nullable();
            $table->unsignedBigInteger('fk11_usuario_salida')->nullable();
            $table->foreign('fk11_usuario_salida')->references('id')->on('users');
            $table->unsignedBigInteger('fk12_usuario_entrada')->nullable();
            $table->foreign('fk12_usuario_entrada')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_solicitud_salida_entrada');
    }
};
