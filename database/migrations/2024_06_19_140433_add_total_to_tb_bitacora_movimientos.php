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
        Schema::table('tb_bitacora_movimientos_no_inventario', function (Blueprint $table) {
            $table->double('Total', 15, 2)->nullable()->after('No_Inventario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_bitacora_movimientos_no_inventario', function (Blueprint $table) {
            $table->dropColumn('Total');
        });
    }
};
