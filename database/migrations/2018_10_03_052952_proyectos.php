<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Proyectos extends Migration
{
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id_proyecto');
            $table->string('nombre_proyecto',40);
            $table->string('descripcion',250);
            $table->date('fecha_inicio');
            $table->date('fecha_entrega');
            $table->integer('costo');
            $table->rememberToken();
            $table->timestamps();
}); 
    }
    public function down()
    {
        Schema::drop('proyectos');
    }
}
