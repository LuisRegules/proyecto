<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class clientes extends Model
{
   use SoftDeletes;
   protected $primaryKey = 'id_cliente';
   protected $fillable=['id_cliente','nombre_cliente','apellido_paterno_cliente',
                        'apellido_materno_cliente','empresa','calle','num','localidad',
                        'activo'];
   protected $date=['deleted_at'];
}
