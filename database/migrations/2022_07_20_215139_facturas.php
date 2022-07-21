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
        Schema::create('facturas', function (Blueprint $table) {
        
            $table->id();
            $table->string('id_tenant',6)->index();
            $table->string('id_cliente',6);
            $table->string('nombre_cliente',50);
            $table->string('numero_factura',30);
            $table->integer('total');
            $table->string('fecha',40);
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
        //
    }
};
