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
        Schema::create('tb_cat_folio_consecutivo_inmueble', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('fk01_id_inmueble')->nullable();
            $table->foreign('fk01_id_inmueble')->references('IdInmueble')->on('rm_inmueble');
            $table->integer('ind_salida')->default(0);
            $table->integer('ind_entrada')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_cat_folio_consecutivo_inmueble');
    }
};
