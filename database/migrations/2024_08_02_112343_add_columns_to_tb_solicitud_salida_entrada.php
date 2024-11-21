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
        Schema::table('tb_solicitud_salida_entrada', function (Blueprint $table) {
            $table->unsignedInteger('fk13_ur_receptor')->nullable()->after('fk12_usuario_entrada');
            $table->foreign('fk13_ur_receptor')->references('Ur')->on('ssunidad_respons');
            $table->unsignedBigInteger('fk14_usuario_receptor')->nullable()->after('fk13_ur_receptor');
            $table->foreign('fk14_usuario_receptor')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_solicitud_salida_entrada', function (Blueprint $table) {
            $table->dropColumn(['fk13_ur_receptor', 'fk14_usuario_receptor']);

        });
    }
};
