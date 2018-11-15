<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Materiales extends Migration
{
    public function up()
    {
        Schema::create('materiales', function (Blueprint $table) {
            $table->increments('id_material');
            $table->string('nombre',60);
            $table->string('activo',2);
            $table->rememberToken();
            $table->timestamps();
});
    }
    public function down()
    {
        Schema::drop('materiales');
    }
}
