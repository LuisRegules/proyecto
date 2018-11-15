<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Servicios extends Migration
{
    
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->increments('id_servicio');
            $table->string('descripcion',60);
            $table->string('foto_servicio',300);
            $table->string('activo',2);
            $table->rememberToken();
            $table->timestamps();
});
    }

    public function down()
    {
        Schema::drop('servicios');
    }
}
