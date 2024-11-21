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
        Schema::table('rm_cresguardos', function (Blueprint $table) {
           
            $table->foreignId('fk01_user_id')->after('Estatus')->nullable()->constrained('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rm_cresguardos', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
};
