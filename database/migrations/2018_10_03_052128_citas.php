<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Citas extends Migration
{
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id_cita');
            $table->string('persona_atiende',40);
            $table->date('fecha');
            $table->time('hora');
            $table->string('lugar_de_cita',100);
			$table->integer('id_cliente')->unsigned();
		    $table->foreign('id_cliente')->references('id_cliente')->on('clientes');
            $table->rememberToken();
            $table->timestamps();
}); 
    }
    public function down()
    {
        Schema::drop('citas');
    }
}
