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
        Schema::table('rm_dcomodatos', function (Blueprint $table) {
            $table->string('Num_Contrato')->nullable()->after('Msserie');
            $table->timestamp('Fecha_Vigencia')->nullable()->after('Num_Contrato');
            $table->timestamp('Fecha_Finiquito')->nullable()->after('Fecha_Vigencia');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rm_dcomodatos', function (Blueprint $table) {
            //
        });
    }
};
