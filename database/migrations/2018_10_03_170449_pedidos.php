<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pedidos extends Migration
{
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id_pedido');
			$table->integer('id_proveedor')->unsigned();
		    $table->foreign('id_proveedor')->references('id_proveedor')->on('proveedores');
			$table->integer('id_material')->unsigned();
		    $table->foreign('id_material')->references('id_material')->on('materiales');
            $table->integer('costo');
            $table->rememberToken();
            $table->timestamps();
}); 
    }

    public function down()
    {
        Schema::drop('pedidos');
    }
}
