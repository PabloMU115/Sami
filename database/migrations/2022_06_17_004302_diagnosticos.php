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
        Schema::create('diagnosticos', function (Blueprint $table) {
            $table->string('id_diagnostico',3)->primary();
            $table->string('id_expediente',12)->index();
            $table->string('id_tenant',6)->index();
            $table->string('descripcion',200);
            $table->string('categoria',20);
            $table->date('fecha_emision');
            $table->string('nombre_medico',30);
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
