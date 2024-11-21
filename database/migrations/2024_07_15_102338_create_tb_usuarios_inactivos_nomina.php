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
        Schema::create('tb_usuarios_inactivos_nomina', function (Blueprint $table) {
            $table->id();
            $table->string('ln_rfc',13);
            $table->string('ln_curp',20)->nullable();
            $table->text('ln_unidad')->nullable();
            $table->text('ln_puesto')->nullable();
            $table->string('ln_nombre',120)->nullable();
            $table->string('ln_plaza',120)->nullable();
            $table->date('dtm_fecha_captura')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_usuarios_inactivos_nomina');
    }
};
