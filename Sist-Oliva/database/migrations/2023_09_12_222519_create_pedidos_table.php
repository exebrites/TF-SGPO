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
            $table->unsignedBigInteger('disenios_id');
            //clientes_id
            //productos_id
            $table->date('fecha_inicio');
            $table->date('fecha_entrega');
            $table->string('estado');
            $table->boolean('disenio_estado');
            $table->integer('cantidad');
            $table->float('subtotal');

            $table->foreign('clientes_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('productos_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('disenios_id')->references('id')->on('disenios')->onDelete('cascade');



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
