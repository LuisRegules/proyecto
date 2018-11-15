<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clientes extends Migration
{
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id_cliente');
            $table->string('nombre_cliente',40);
            $table->string('apellido_paterno_cliente',40);
            $table->string('apellido_materno_cliente',40);
            $table->string('empresa',50);
            $table->string('calle',40);
            $table->integer('num');
            $table->string('localidad',40);
            $table->string('activo',2);
            $table->rememberToken();
            $table->timestamps();
});
    }

    public function down()
    {
        Schema::drop('clientes');
    }
}
