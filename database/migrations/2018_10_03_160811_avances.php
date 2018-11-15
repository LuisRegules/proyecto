<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Avances extends Migration
{
    public function up()
    {
        Schema::create('avances', function (Blueprint $table) {
            $table->increments('id_avance');
            $table->date('fecha');
            $table->string('avance',100);
			$table->integer('id_proyecto')->unsigned();
		    $table->foreign('id_proyecto')->references('id_proyecto')->on('proyectos');
            $table->rememberToken();
            $table->timestamps();
}); 
    }
    public function down()
    {
        Schema::drop('avances');
    }
}
