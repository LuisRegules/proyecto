<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\clientes;
use Session;

class ControladorCliente extends Controller
{
    public function altacliente()
    {
         $clavequesigue = clientes::orderBy('id_cliente','desc')
         ->take(1)
         ->get();
     $idClientes = $clavequesigue[0]->id_cliente+1;
     return view ("maquinados.altacliente")
			->with('idClientes',$idClientes);
    }
    
    public function guardacliente(Request $request)
    {
        $id_cliente =  $request->id_cliente;
        $nombre_cliente = $request->nombre_cliente;
        $apellido_materno_cliente = $request->apellido_materno_cliente;
        $apellido_paterno_cliente = $request->apellido_paterno_cliente;
        $empresa = $request->empresa;
        $calle = $request->calle;
        $num = $request->num;
        $localidad = $request->localidad;
        $activo = $request->activo;

		 $this->validate($request,[
            'id_cliente'=>'required',
             'nombre_cliente'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'apellido_materno_cliente'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'apellido_paterno_cliente'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'empresa'=>'required|regex:/^[A-Z,a-z, ,ñ,é,ó,á,í,ú,1,2,3,4,5,6,7,8,9]+$/',
             'calle'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'num'=>'required|numeric',
             'localidad'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'activo'=>'required'
	     ]);
	 
            $client = new clientes;
            $client->id_cliente =  $request->id_cliente;
            $client->nombre_cliente = $request->nombre_cliente;
            $client->apellido_materno_cliente = $request->apellido_materno_cliente;
            $client->apellido_paterno_cliente = $request->apellido_paterno_cliente;
            $client->empresa = $request->empresa;
            $client->calle = $request->calle;
            $client->num = $request->num;
            $client->localidad = $request->localidad;
            $client->activo = $request->activo;
		    if($client->save()){
				return back()->with('msj','Servicio guardado correctamente');
			}else{
				return back();
			}
    }
    public function reporteclientes()
	{
	$clientes=clientes::withTrashed()->orderBy('id_cliente','asc')
	          ->get();
	  return view('maquinados.reporteCliente')
	  ->with('clientes',$clientes);                  
    }
    public function modificacliente($id_cliente)
	{
		$cliente = clientes::where('id_cliente','=',$id_cliente)
		                     ->get();
		return view ('maquinados.modificacliente')
		->with('cliente',$cliente[0]);
	}
    public function guardamodificacliente(Request $request)
	{
        $id_cliente =  $request->id_cliente;
        $nombre_cliente = $request->nombre_cliente;
        $apellido_materno_cliente = $request->apellido_materno_cliente;
        $apellido_paterno_cliente = $request->apellido_paterno_cliente;
        $empresa = $request->empresa;
        $calle = $request->calle;
        $num = $request->num;
        $localidad = $request->localidad;
        $activo = $request->activo;
        
		 $this->validate($request,[
            'id_cliente'=>'required',
             'nombre_cliente'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'apellido_materno_cliente'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'apellido_paterno_cliente'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'empresa'=>'required|regex:/^[A-Z,a-z, ,ñ,é,ó,á,í,ú,1,2,3,4,5,6,7,8,9]+$/',
             'calle'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'num'=>'required|numeric',
             'localidad'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'activo'=>'required'
	     ]);
	        $client = clientes::find($id_cliente);
            $client->id_cliente =  $request->id_cliente;
            $client->nombre_cliente = $request->nombre_cliente;
            $client->apellido_materno_cliente = $request->apellido_materno_cliente;
            $client->apellido_paterno_cliente = $request->apellido_paterno_cliente;
            $client->empresa = $request->empresa;
            $client->calle = $request->calle;
            $client->num = $request->num;
            $client->localidad = $request->localidad;
            $client->activo = $request->activo;
			if($client->save()){
                return redirect('http://www.maquinados-y-construcciones.com/public/reporteclientes')
                ->with('msj','Cliente modificado correctamente');
			}else{
				return back();
			}
		 echo "Listo para modificar";
	}
	public function eliminacliente($id_cliente)
	{
			if(clientes::find($id_cliente)->delete()){
				return back()->with('msj','Cliente inhabilitado correctamente');
			}else{
				return back();
            }
            
    }
    
    public function restauracliente($id_cliente)
	{

	if(clientes::withTrashed()->where('id_cliente',$id_cliente)->restore()){
		return back()->with('msj','Cliente restaurado correctamente');
	}else{
		return back();
	}
}
     public function efisicacliente($id_cliente)
	{
		if(clientes::withTrashed()->where('id_cliente',$id_cliente)->forceDelete()){
			return back()->with('msj','Cliente eliminado permanentemente');
		}else{
			return back();
		}
	}
}
