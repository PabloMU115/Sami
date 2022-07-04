<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recetas', function (Blueprint $table) {
            $table->string('id_receta',3)->primary();
            $table->string('id_expediente',12)->index();
            $table->string('id_tenant',6)->index();
            $table->string('indicaciones',200);
            $table->string('nombre_medico',30);
            $table->date('fecha_emision');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
