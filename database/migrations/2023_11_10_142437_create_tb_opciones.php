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
        Schema::create('tb_opciones', function (Blueprint $table) {
            $table->id('id_opcion');
            $table->unsignedInteger('fk01_id_dependencia');
            $table->foreign('fk01_id_dependencia')->references('id_dependencia')->on('tb_cat_dependencias');
            $table->string('ln_descripcion_opcion',80);
            $table->integer('ind_tipo_opcion');
            $table->text('ln_texto_opcion')->nullable();
            $table->unsignedBigInteger('fk02_id_usuario')->nullable();
            $table->foreign('fk02_id_usuario')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_opciones');
    }
};
