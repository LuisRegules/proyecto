<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class servicios extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id_servicio';  
    protected $fillable=['id_servicio','descripcion','foto_servicio','activo'];
    protected $date=['deleted_at'];
    
}
