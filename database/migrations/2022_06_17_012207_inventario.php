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
        Schema::create('inventarios', function (Blueprint $table) {
            $table->string('id_producto',3)->primary();
            $table->string('id_tenant',6)->index();
            $table->string('proveedor',40);
            $table->string('nombre_producto',40);
            $table->integer('cantidad',false,true);
            $table->integer('precio',false,true);
            $table->integer('tipo',false,true);
            $table->string('descripcion',200);
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
