<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class empleados extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id_empleado';
    protected $fillable=['id_empleado','nombre_empleado','apellido_paterno_empleado',
                         'apellido_materno_empleado','edad','curp','NSS','puesto',
                         'fecha_ingreso'];
    protected $date=['deleted_at'];
}
