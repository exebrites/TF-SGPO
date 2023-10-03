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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();//DNI como PK (?
            $table->string('dni');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono');
            $table->string('correo');
          

            //FALTA RELACIONAR
            // $table->unsignedBigInteger('idSistema');
            // $table->foreign('idSistema')->references('id')->on('sist_olivas')->onDelete('cascade');

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
        Schema::dropIfExists('clientes');
    }
};
