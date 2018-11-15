<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class usuarios extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id_usuario';  
    protected $fillable=['id_usuario','nombre_usuario','corre_electronico','contraseña','foto_perfil','activo'];
    protected $date=['deleted_at'];
}