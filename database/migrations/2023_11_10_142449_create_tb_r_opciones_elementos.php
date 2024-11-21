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
        Schema::create('tb_r_opciones_elementos', function (Blueprint $table) {
            $table->id('id_elemento');
            $table->unsignedBigInteger('fk01_id_opcion')->nullable();
            $table->foreign('fk01_id_opcion')->references('id_opcion')->on('tb_opciones')->onDelete('cascade');
            $table->string('ln_elemento', 80);
            $table->mediumText('ln_descripcion_elemento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_r_opciones_elementos');
    }
};
