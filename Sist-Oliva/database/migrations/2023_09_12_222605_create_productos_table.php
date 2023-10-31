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
        //cambiar el nombre de los atributos
        Schema::create('productos', function (Blueprint $table) {
               
     
                $table->id();
                //crear una FK y la asocia con su tabla 
                // $table->foreignId('pedido_id')->constrained('pedidos');

                $table->string('name');
                $table->string('slug')->unique();
                
                $table->double('price');
               
                $table->text('description');
                $table->integer('category_id')->nullalble();
             
                $table->string('image_path');
                $table->string('alias');
       
                // $table->id();
                // $table->string('name')->unique();
                // $table->string('slug')->unique();
                // $table->string('details')->nullable(); 
                // $table->double('price');
                // $table->double('shipping_cost');
                // $table->text('description');
                // $table->integer('category_id');
                // $table->unsignedInteger('brand_id')->unsigned();
                // $table->string('image_path');
                // $table->timestamps();
    
    

            /**
             * Violacion de integridad 
            */
            // $table->unsignedBigInteger('categoria_id');//FK de categoria -- Producto * a 1 Categoria
            // $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');


            
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
