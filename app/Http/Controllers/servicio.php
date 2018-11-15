<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\servicios;

class servicio extends Controller
{
  
    public function altaservicio()
    {
		 
	   $clavequesigue = servicios::orderBy('id_servicio','desc')
								->take(1)
								->get();
     $id_servicios = $clavequesigue[0]->id_servicio+1;
     return view ("maquinados.altaservicio")
			->with('id_servicios',$id_servicios);
    }
    
    public function guardaservicio(Request $request)
    {
        $id_servicio =  $request->id_servicio;
        $descripcion = $request->descripcion;
        $activo = $request->activo;
        
		 $this->validate($request,[
	     'id_servicio'=>'required',
         'descripcion'=>'required',
         'activo'=>'required'
	     ]);
	
            $servi = new servicios;
			$servi->id_servicio = $request->id_servicio;
			$servi->descripcion = $request->descripcion;
			$servi->activo =$request->activo;
		    if($servi->save()){
				return back()->with('msj','Datos guardados');
			}else{
				return back();
			}
        
    }
    
    
}





