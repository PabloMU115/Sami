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
        Schema::create('expedientes', function (Blueprint $table) {
            $table->string('id_expediente',12)->primary();
            $table->string('id_tenant',6)->index();
            $table->string('cedula',12);
            $table->string('nombre',50);
            $table->string('apellidos',50);
            $table->integer('edad',false,true);
            $table->string('genero',1);
            $table->string('alergias',50);
            $table->string('tipo_sangre',1);
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
