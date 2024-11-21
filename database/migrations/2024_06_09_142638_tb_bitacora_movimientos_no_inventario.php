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
        Schema::create('tb_bitacora_movimientos_no_inventario', function (Blueprint $table) {
            $table->id();
            $table->string('Id_Docto', 13);
            $table->string('No_Inventario', 21);
            $table->string('Tipo_Movimiento', 30)->nullable();
            $table->string('Id_Almacen_O', 4)->nullable();
            $table->string('Id_Almacen_D', 4)->nullable();
            $table->string('Dia',2);
            $table->string('Mes',2);
            $table->integer('Ano');
            $table->dateTime('Fecha_Registro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_bitacora_movimientos_no_inventario');
    }
};
