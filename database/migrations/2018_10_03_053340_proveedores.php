<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Proveedores extends Migration
{

    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->increments('id_proveedor');
            $table->string('nom_proveedor',40);
            $table->string('ap_proveedor',40);
            $table->string('am_proveedor',40);
            $table->string('empresa',50);
            $table->string('activo',2);
            $table->rememberToken();
            $table->timestamps();
});
    }
    public function down()
    {
        Schema::drop('proveedores');
    }
}
