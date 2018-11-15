<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuarios extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->string('nombre_usuario',40);
            $table->string('correo_electronico',40)->unique();
            $table->string('contraseña',40);
            $table->string('foto_perfil',300);
            $table->string('activo',2);
            $table->rememberToken();
            $table->timestamps();
});
    }
    public function down()
    {
        Schema::drop('usuarios');
    }
}
