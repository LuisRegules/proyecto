<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\proveedores;

class ControladorProveedor extends Controller
{
    public function altaproveedor()
    {
	   $clavequesigue = proveedores::orderBy('id_proveedor','desc')
								->take(1)
								->get();
     $idProveedor = $clavequesigue[0]->id_proveedor+1;
     return view ("maquinados.altaproveedor")
			->with('idProveedor',$idProveedor);
    }
    public function guardaproveedor(Request $request)
    {
        $id_proveedor =  $request->id_proveedor;
        $nom_proveedor = $request->nom_proveedor;
        $ap_proveedor = $request->ap_proveedor;
        $am_proveedor = $request->am_proveedor;
        $empresa = $request->empresa;
        $activo = $request->activo;
        
		 $this->validate($request,[
	     'id_proveedor'=>'required',
         'nom_proveedor'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
         'ap_proveedor'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
         'am_proveedor'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
         'empresa'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
         'activo'=>'required'
	     ]);
            $pro = new proveedores;
			$pro->id_proveedor = $request->id_proveedor;
			$pro->nom_proveedor = $request->nom_proveedor;
			$pro->ap_proveedor = $request->ap_proveedor;
			$pro->am_proveedor = $request->am_proveedor;
			$pro->empresa = $request->empresa;
			$pro->activo =$request->activo;
		    if($pro->save()){
				return back()->with('msj','Proveedor guardado correctamente');
			}else{
				return back();
			}
        
    }
    public function reporteproveedor()
	{
	$proveedores=proveedores::withTrashed()->orderBy('id_proveedor','asc')
	          ->get();
	  return view('maquinados.reporteProveedor')
	  ->with('proveedores',$proveedores);                  
	}
	public function modificaproveedor($id_proveedor)
	{
		$proveedor = proveedores::where('id_proveedor','=',$id_proveedor)
		                     ->get();
		return view ('maquinados.modificaproveedor')
		->with('proveedor',$proveedor[0]);
	}
    public function guardamodificaproveedor(Request $request)
	{
		$id_proveedor =  $request->id_proveedor;
        $nom_proveedor = $request->nom_proveedor;
        $ap_proveedor = $request->ap_proveedor;
        $am_proveedor = $request->am_proveedor;
        $empresa = $request->empresa;
        $activo = $request->activo;
        
		 $this->validate($request,[
			'id_proveedor'=>'required',
			'nom_proveedor'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
			'ap_proveedor'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
			'am_proveedor'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
			'empresa'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
			'activo'=>'required'
	     ]);
	        $pro = proveedores::find($id_proveedor);
	        $pro->id_proveedor = $request->id_proveedor;
			$pro->nom_proveedor = $request->nom_proveedor;
			$pro->ap_proveedor = $request->ap_proveedor;
			$pro->am_proveedor = $request->am_proveedor;
			$pro->empresa = $request->empresa;
			$pro->activo =$request->activo;
			if($pro->save()){
				return redirect('http://www.maquinados-y-construcciones.com/public/reporteproveedor')
				->with('msj','Proveedor modificado correctamente');
			}else{
				return back();
			}
	  echo "Listo para modificar";
	}
	public function eliminaproveedor($id_proveedor)
	{
			if(proveedores::find($id_proveedor)->delete()){
				return back()->with('msj','Proveedor inhabilitado correctamente');
			}else{
				return back();
			}
	}
	public function restauraproveedor($id_proveedor)
	{

	if(proveedores::withTrashed()->where('id_proveedor',$id_proveedor)->restore()){
		return back()->with('msj','Proveedor restaurado correctamente');
	}else{
		return back();
	}
}
     public function efisicaproveedor($id_proveedor)
	{
		if(proveedores::withTrashed()->where('id_proveedor',$id_proveedor)->forceDelete()){
			return back()->with('msj','Proveedor eliminado permanentemente');
		}else{
			return back();
		}
	}
}
