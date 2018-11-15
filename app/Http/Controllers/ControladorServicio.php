<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\servicios;

class ControladorServicio extends Controller
{
    public function altaservicio()
    {
     	 //select * from carreras     all()
		 //select * from carreras where activo = 'si'
	 //  group by nombre asc
		 
	   $clavequesigue = servicios::orderBy('id_servicio','desc')
								->take(1)
								->get();
     $idServicios = $clavequesigue[0]->id_servicio+1;
	 
	/* $carreras = carreras::where('activo','=','SI')
	                      ->orderBy('nombre','asc')
						  ->get();*/
	 //return $carreras;
     return view ("maquinados.altaservicio")
	        //->with('carreras',$carreras)
			->with('idServicios',$idServicios);
    }
    
    public function guardaservicio(Request $request)
    {
        $id_servicio =  $request->id_servicio;
        $descripcion = $request->descripcion;
        $activo = $request->activo;
        
		 $this->validate($request,[
			'id_servicio'=>'required',
			'descripcion'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú,1,2,3,4,5,6,7,8,9]+$/',
			'foto_servicio'=>'image|mimes:jpeg,png,gif',
            'activo'=>'required'
		 ]);
		 
		 $file = $request->file('foto_servicio');
		 if($file!="")
		 {	 
		 $ldate = date('Ymd_His_');
		 $img = $file->getClientOriginalName();
		 $img2 = $ldate.$img;
		 \Storage::disk('local')->put($img2, \File::get($file));
		 }
		 else
		 {
		 $img2= 'sinfoto.png';
		 }
            $servi = new servicios;
			$servi->id_servicio = $request->id_servicio;
			$servi->descripcion = $request->descripcion;
			$servi->foto_servicio = $img2;
			$servi->activo =$request->activo;
		    if($servi->save()){
				return back()->with('msj','Servicio guardado correctamente');
			}else{
				return back();
			}
        
    }
    public function reporteservicios()
	{
	$servicios=servicios::withTrashed()->orderBy('id_servicio','asc')
	          ->get();
	  return view('maquinados.reporteServicio')
	  ->with('servicios',$servicios);                  
	}
	public function modificaservicio($id_servicio)
	{
		$servicio = servicios::where('id_servicio','=',$id_servicio)
		                     ->get();
	/*	$idc = $maestro[0]->idc;
		$carrera = carreras::where('idc','=',$idc)->get();
		
		$otrascarreras = carreras::where('idc','!=',$idc)
		                 ->get();*/
		//return $carrera;
		//return $maestro;
		return view ('maquinados.modificaservicio')
		->with('servicio',$servicio[0]);
	    //->with('idc',$idc)
	   // ->with('carrera',$carrera[0]->nombre)
		//->with('otrascarreras',$otrascarreras);
	
	}
    public function guardamodificaservicio(Request $request)
	{
		$id_servicio =  $request->id_servicio;
        $descripcion = $request->descripcion;
        $activo = $request->activo;
        
		 $this->validate($request,[
			'id_servicio'=>'required',
			'descripcion'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú,1,2,3,4,5,6,7,8,9]+$/',
			'foto_servicio'=>'image|mimes:jpeg,png,gif',
            'activo'=>'required'
		 ]);
		 
		 $file = $request->file('foto_servicio');
		 if($file!="")
		 {	 
		 $ldate = date('Ymd_His_');
		 $img = $file->getClientOriginalName();
		 $img2 = $ldate.$img;
		 \Storage::disk('local')->put($img2, \File::get($file));
		 }
		 else
		 {
		 $img2= 'sinfoto.png';
		 }

	        $servi = servicios::find($id_servicio);
	        $servi->id_servicio = $request->id_servicio;
			$servi->descripcion = $request->descripcion;
			if($file!="")
	        {	
			$servi->foto_servicio = $img2;
	        }
			$servi->activo =$request->activo;
			if($servi->save()){
				return redirect('http://www.maquinados-y-construcciones.com/public/reporteservicios')
				->with('msj','Servicio modificado correctamente');
			}else{
				return back();
			}
	 
	 
	 
	 
	 
		 echo "Listo para modificar";
	}
	
	public function eliminaservicio($id_servicio)
	{
			if(servicios::find($id_servicio)->delete()){
				return back()->with('msj','Cliente inhabilitado correctamente');
			}else{
				return back();
            }
            
    }
    
    public function restauraservicio($id_servicio)
	{

	if(servicios::withTrashed()->where('id_servicio',$id_servicio)->restore()){
		return back()->with('msj','Cliente restaurado correctamente');
	}else{
		return back();
	}
}
     public function efisicaservicio($id_servicio)
	{
		if(servicios::withTrashed()->where('id_servicio',$id_servicio)->forceDelete()){
			return back()->with('msj','Cliente eliminado permanentemente');
		}else{
			return back();
		}
	}

}
