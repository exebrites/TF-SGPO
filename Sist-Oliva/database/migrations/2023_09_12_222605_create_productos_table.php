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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->float('precio');

            $table->string('image');
            $table->mediumText('description');

            /**
             * Violacion de integridad 
            */
            $table->unsignedBigInteger('idCategoria');//FK de categoria -- Producto * a 1 Categoria
            $table->foreign('idCategoria')->references('id')->on('categorias')->onDelete('cascade');


            
                        //FALTA RELACIONAR

            // $table->unsignedBigInteger('idPedido')->unique();
            // $table->foreign('idPedido')->references('id')->on('Pedido')->onDelete('cascade');

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
        Schema::dropIfExists('productos');
    }
};
