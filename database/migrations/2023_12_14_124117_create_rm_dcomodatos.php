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
        Schema::create('rm_dcomodatos', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->string('Id_Docto', 12);
            $table->foreign('Id_Docto')->references('Id_Docto')->on('rm_ccomodatos');
            $table->string('Id_Cabms_Historico', 100)->nullable();
            $table->string('Id_Cabms', 100);
            $table->foreign('Id_Cabms')->references('IdCabms')->on('rm_cabmses');
            $table->unsignedInteger('Id_Clase')->nullable();
            $table->foreign('Id_Clase')->references('Id_Clase')->on('rm_clase');
            $table->integer('Consec')->nullable();
            $table->string('Id_Almacen', 4)->nullable();
            $table->foreign('Id_Almacen')->references('Almacen')->on('rm_almacenes');
            $table->string('No_Inventario_Historico', 21)->nullable();
            $table->string('No_Inventario', 21)->nullable();
            $table->integer('No_Inv7')->nullable();
            $table->string('Marca', 100);
            $table->string('Modelo', 50);
            $table->string('Serie', 50);
            $table->timestamp('Fecha_Ingreso')->nullable();
            $table->text('Especificacion');
            $table->double('Total', 12, 2)->nullable();
            $table->string('Estdr', 1)->nullable();
            $table->smallInteger('Enajenacion')->default(0);
            $table->string('Status_Imp', 1)->default('N');
            $table->string('Ejercicio', 8)->nullable();
            $table->unsignedInteger('Id_Propinmueble')->nullable();
            $table->foreign('Id_Propinmueble')->references('Id_Propinmueble')->on('rm_propinmuebles');
            $table->unsignedInteger('Cve_Edif')->nullable();
            $table->foreign('Cve_Edif')->references('IdInmueble')->on('rm_inmueble');
            $table->unsignedInteger('Piso')->nullable();
            $table->foreign('Piso')->references('IdNivel')->on('rm_niveles');
            $table->unsignedInteger('Ala')->nullable();
            $table->foreign('Ala')->references('Id_Seccion')->on('rm_secciones');
            $table->string('Estatus_Cv', 1)->nullable();
            $table->unsignedInteger('Id_Cuenta_Mayor')->nullable();
            $table->foreign('Id_Cuenta_Mayor')->references('Ctmayor')->on('rm_cuentas_mayor');
            $table->string('Id_Subgrupo', 3)->nullable();
            $table->foreign('Id_Subgrupo')->references('Subgrupo')->on('rm_subgrupo');
            $table->string('Id_Tclase', 5)->nullable();
            $table->unsignedBigInteger('Id_Marca')->nullable();
            $table->foreign('Id_Marca')->references('marca_id')->on('rm_marcas');
            $table->string('Mmarca', 50)->nullable();
            $table->string('Mmodelo', 50)->nullable();
            $table->string('Mserie', 50)->nullable();
            $table->string('Tmarca', 50)->nullable();
            $table->string('Tmodelo', 50)->nullable();
            $table->string('Tserie', 50)->nullable();
            $table->string('Msmarca', 50)->nullable();
            $table->string('Msmodelo', 50)->nullable();
            $table->string('Msserie', 50)->nullable();
            $table->integer('Ccop')->nullable();
            $table->string('Pcontable', 9)->nullable();
            $table->timestamps();

            //Indices
            $table->index(['No_Inventario','Estdr','Id_Almacen']);
            $table->index('Id_Docto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rm_dcomodatos');
    }
};
