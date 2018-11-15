<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProyectoDetalles extends Migration
{
    public function up()
    {
    
        Schema::create('proyecto_detalles', function (Blueprint $table) {
            $table->increments('id_proyecto_detalle');
			$table->integer('id_proyecto')->unsigned();
		    $table->foreign('id_proyecto')->references('id_proyecto')->on('proyectos');
			$table->integer('id_empleado')->unsigned();
            $table->foreign('id_empleado')->references('id_empleado')->on('empleados');
            $table->string('giro',40);
            $table->rememberToken();
            $table->timestamps();
}); 
    }
    public function down()
    {
        Schema::drop('proyecto_detalles');
    }
}
