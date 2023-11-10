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
        Schema::create('proveedores', function (Blueprint $table) {

            // id integer pk
            // nombre_empresa string
            // nombre_contacto string
            // cuit string
            // telefono string
            // correo string

            $table->id();
            $table->string('nombre_empresa')->nullable();
            $table->string('nombre_contacto');
            $table->string('cuit');
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();

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
        Schema::dropIfExists('proveedores');
    }
};
