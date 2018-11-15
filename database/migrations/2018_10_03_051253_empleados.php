<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Empleados extends Migration
{
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id_empleado');
            $table->string('nombre_empleado',40);
            $table->string('apellido_paterno_empleado',40);
            $table->string('apellido_materno_empleado',40);
            $table->integer('edad');
            $table->string('curp',100);
            $table->string('NSS',100);
            $table->date('fecha_ingreso');
            $table->string('puesto',60);
            $table->string('activo',2);
            $table->rememberToken();
            $table->timestamps();
}); 
    }
    public function down()
    {
        Schema::drop('empleados');
    }
}
