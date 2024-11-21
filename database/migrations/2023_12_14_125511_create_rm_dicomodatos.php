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
        Schema::create('rm_dicomodatos', function (Blueprint $table) {
            $table->bigIncrements('Id');

            $table->string('Id_Res',14);
            $table->foreign('Id_Res')->references('Id_Res')->on('rm_cicomodatos');
            $table->string('No_Inventario', 21)->nullable();
            $table->timestamp('Fecha_Ingreso')->nullable();
            $table->double('Total', 12, 2)->nullable();
            $table->string('Docto_Ent_Sal',12)->default('');
            $table->string('Oficio',30)->nullable();
            $table->timestamps();

            //Indices
            $table->index('Id_Res');
            $table->index('No_Inventario');
            $table->index('Docto_Ent_Sal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rm_dicomodatos');
    }
};
