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
            // id integer [PK]
            // clientes_id integer 
       
            // entrega_id integer
            // fecha_inicio date
            // fecha_entrega date
            // estado string 
          





            $table->id();
            $table->unsignedBigInteger('clientes_id');          
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_entrega')->nullable();
            $table->string('estado');
           

            $table->foreign('clientes_id')->references('id')->on('clientes')->onDelete('cascade');
           




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
