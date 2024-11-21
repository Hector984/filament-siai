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
        Schema::create('tb_r_solicitud_salida_entrada', function (Blueprint $table) {
            $table->id('id_r_solicitud_salida_entrada');
            $table->unsignedBigInteger('fk01_solicitud_e_s')->nullable();
            $table->foreign('fk01_solicitud_e_s')->references('id_solicitud_salida_entrada')->on('tb_solicitud_salida_entrada');
            $table->string('ln_no_inventario',21)->nullable();
            $table->char('ind_estatus')->nullable();
            $table->char('ind_movimiento')->nullable();
            $table->string('id_cabms',20)->nullable();
            $table->char('ind_regresa')->nullable();
            $table->integer('nu_dias')->nullable();
            $table->string('ln_especificaciones',80)->nullable();
            $table->string('ln_marca',60)->nullable();
            $table->string('ln_serie',40)->nullable();
            $table->string('ln_modelo',60)->nullable();
            $table->double('atm_total',15, 2)->nullable();
            $table->unsignedInteger('fk02_id_material')->nullable();
            $table->foreign('fk02_id_material')->references('id_material')->on('tb_cat_clasificacion_materiales');
            $table->double('amt_peso', 15, 2)->nullable();
            $table->integer('amt_unidad')->nullable();
            $table->string('fk03_almacen', 4)->nullable();
            $table->foreign('fk03_almacen')->references('Almacen')->on('rm_almacenes');
            $table->timestamp('dt_fecha_captura');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_r_solicitud_salida_entrada');
    }
};
