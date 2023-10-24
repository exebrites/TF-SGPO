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
        Schema::create('disenios', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->boolean('disenio_estado');
            // $table->unsignedBigInteger('pedidos_id')->unique();

            // $table->foreign('pedidos_id')->references('id')->on('pedidos')->onDelete('cascade');
            // // //FALTA RELACIONAR

            // $table->unsignedBigInteger('idProducto')->unique();
            // $table->foreign('idProducto')->references('id')->on('productos')->onDelete('cascade');

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
        Schema::dropIfExists('disenios');
    }
};
