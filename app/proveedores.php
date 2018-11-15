<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class proveedores extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id_proveedor';  
    protected $fillable=['id_material','nom_proveedir','ap_proveedor','am_proveedor','empresa','activo'];
    protected $date=['deleted_at'];
}
