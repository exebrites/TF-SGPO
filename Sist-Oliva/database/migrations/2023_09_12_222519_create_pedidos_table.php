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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clientes_id');
            $table->unsignedBigInteger('productos_id');
            //clientes_id
            //productos_id
            $table->date('fecha_inicio');
            $table->date('fecha_entrega');
            $table->boolean('estado');
            $table->boolean('disenio_estado');
            //FALTA RELACIONAR

            // $table->unsignedBigInteger('idSistema')->unique();
            // $table->foreign('idSistema')->references('id')->on('SistOliva')->onDelete('cascade');

            $table->foreign('clientes_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('productos_id')->references('id')->on('productos')->onDelete('cascade');

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
        Schema::dropIfExists('pedidos');
    }
};
