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
        Schema::create('tb_bitacora_correccion_numeros_inventario', function (Blueprint $table) {
            $table->id();
            $table->string('ln_no_inventario',21);
            $table->string('ln_folio_afectado',90);
            $table->text('ln_justificacion');
            $table->integer('id_usuario_afecta');
            $table->string('ln_nombre_afecta',150);
            $table->timestamp('dtm_fecha_accion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_bitacora_correccion_numeros_inventario');
    }
};
