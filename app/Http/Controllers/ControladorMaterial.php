<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\materiales;

class ControladorMaterial extends Controller
{
    public function altamaterial()
    {
	   $clavequesigue = materiales::orderBy('id_material','desc')
								->take(1)
								->get();
     $idMaterial = $clavequesigue[0]->id_material+1;
     return view ("maquinados.altamaterial")
			->with('idMaterial',$idMaterial);
    }
    public function guardamaterial(Request $request)
    {
        $id_material =  $request->id_material;
        $nombre = $request->nombre;
        $activo = $request->activo;
        
		 $this->validate($request,[
	     'id_material'=>'required',
         'nombre'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
         'activo'=>'required'
	     ]);
            $mate = new materiales;
			$mate->id_material = $request->id_material;
			$mate->nombre = $request->nombre;
			$mate->activo =$request->activo;
		    if($mate->save()){
				return back()->with('msj','Material guardado correctamente');
			}else{
				return back();
			}
        
    }
    public function reportematerial()
	{
	$materiales=materiales::withTrashed()->orderBy('id_material','asc')
	          ->get();
	  return view('maquinados.reporteMaterial')
	  ->with('materiales',$materiales);                  
	}
	public function modificamaterial($id_material)
	{
		$material = materiales::where('id_material','=',$id_material)
		                     ->get();
		return view ('maquinados.modificamaterial')
		->with('material',$material[0]);
	}
    public function guardamodificamaterial(Request $request)
	{
		$id_material =  $request->id_material;
        $nombre = $request->nombre;
        $activo = $request->activo;
        
		 $this->validate($request,[
			'id_material'=>'required',
			'nombre'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
			'activo'=>'required'
	     ]);
	        $mate = materiales::find($id_material);
	        $mate->id_material = $request->id_material;
			$mate->nombre = $request->nombre;
			$mate->activo =$request->activo;
			if($mate->save()){
				return redirect('http://www.maquinados-y-construcciones.com/public/reportematerial')
				->with('msj','Material modificado correctamente');
			}else{
				return back();
			}
	  echo "Listo para modificar";
	}
	public function eliminamaterial($id_material)
	{
			if(materiales::find($id_material)->delete()){
				return back()->with('msj','Material inhabilitado correctamente');
			}else{
				return back();
			}
	}
	public function restauramaterial($id_material)
	{

	if(materiales::withTrashed()->where('id_material',$id_material)->restore()){
		return back()->with('msj','Material restaurado correctamente');
	}else{
		return back();
	}
}
     public function efisicamaterial($id_material)
	{
		if(materiales::withTrashed()->where('id_material',$id_material)->forceDelete()){
			return back()->with('msj','Material eliminado permanentemente');
		}else{
			return back();
		}
	}
}
