<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class materiales extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id_material';  
    protected $fillable=['id_material','nombre','activo'];
    protected $date=['deleted_at'];
}
