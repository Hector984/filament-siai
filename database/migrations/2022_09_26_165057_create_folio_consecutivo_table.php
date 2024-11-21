<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFolioConsecutivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folio_consecutivo', function (Blueprint $table) {
            $table->string('Almacen', 3)->primary();
            $table->integer('Inst_Aa')->default(0);
            $table->integer('Inst_Noinv')->default(0);
            $table->integer('Inst_Notasd')->default(0);
            $table->integer('Inst_Notasc')->default(0);
            $table->integer('Inst_Remisionese')->default(0);
            $table->integer('Inst_Remisioness')->default(0);
            $table->integer('Cons_Aa')->default(0);
            $table->integer('Cons_Noinv')->default(0);
            $table->integer('Cons_Notasd')->default(0);
            $table->integer('Cons_Notasc')->default(0);
            $table->integer('Cons_Remisionese')->default(0);
            $table->integer('Cons_Remisioness')->default(0);
            $table->integer('Cons_Valesalida')->default(0);
            $table->integer('Inst_Comodatos')->default(0);
            $table->integer('Cons_Comodatos')->default(0);
            $table->integer('Inst_Inventariocm')->default(0);
            $table->integer('Com_Remisionese')->default(0);
            $table->integer('Com_Remisioness')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('folio_consecutivo');
    }
}
