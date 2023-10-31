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
        Schema::create('entregas', function (Blueprint $table) {
            $table->id();
            // table entrega {
            //     id integer [PK]
            // pedido_id string fk
            //     direccion string
            //     telefono char
            //     recepcion string
            //     nota string
            //     local boolean
            //   }
            $table->unsignedBigInteger('pedido_id')->unique();

            $table->string('direccion');
            $table->char('telefono');
            $table->string('recepcion');
            $table->string('nota');
            $table->boolean('local');

            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');


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
        Schema::dropIfExists('entregas');
    }
};