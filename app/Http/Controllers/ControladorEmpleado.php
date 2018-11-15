<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\empleados;

class ControladorEmpleado extends Controller
{
    public function altaempleado()
    {
         $clavequesigue = empleados::orderBy('id_empleado','desc')
         ->take(1)
         ->get();
     $idEmpleados = $clavequesigue[0]->id_empleado+1;
     return view ("maquinados.altaempleado")
			->with('idEmpleados',$idEmpleados);
    }
    public function guardaempleado(Request $request)
    {
        $id_empleado =  $request->id_empleado;
        $nombre_empleado = $request->nombre_empleado;
        $apellido_materno_empleado = $request->apellido_materno_empleado;
        $apellido_paterno_empleado = $request->apellido_paterno_empleado;
        $edad = $request->edad;
        $curp = $request->curp;
        $NSS = $request->NSS;
        $fecha_ingreso = $request->fecha_ingreso;
        $puesto = $request->puesto;
        $activo = $request->activo;

		 $this->validate($request,[
             'id_empleado'=>'required',
             'nombre_empleado'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'apellido_materno_empleado'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'apellido_paterno_empleado'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'edad'=>'required|integer|min:15',
             'curp'=>'required|regex:/^[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}+$/',
             'fecha_ingreso'=>'required|regex:/^[0-9]{4}[-]{1}[0-9]{2}[-][0-9]{2}/',
             'NSS'=>['regex:/^[0-9]{11}/'],
             'puesto'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'activo'=>'required'
	     ]);
	 
            $emplead = new empleados;
            $emplead->id_empleado =  $request->id_empleado;
            $emplead->nombre_empleado = $request->nombre_empleado;
            $emplead->apellido_materno_empleado = $request->apellido_materno_empleado;
            $emplead->apellido_paterno_empleado = $request->apellido_paterno_empleado;
            $emplead->edad = $request->edad;
            $emplead->curp = $request->curp;
            $emplead->NSS = $request->NSS;
            $emplead->fecha_ingreso = $request->fecha_ingreso;
            $emplead->puesto = $request->puesto;
            $emplead->activo = $request->activo;
		    if($emplead->save()){
				return back()->with('msj','Servicio guardado correctamente');
			}else{
				return back();
			}
    }

    public function reporteempleados()
	{
	$empleados=empleados::withTrashed()->orderBy('id_empleado','asc')
	          ->get();
	  return view('maquinados.reporteEmpleado')
	  ->with('empleados',$empleados);                  
    }
    public function modificaempleado($id_empleado)
	{
		$empleado = empleados::where('id_empleado','=',$id_empleado)
		                     ->get();
		return view ('maquinados.modificaempleado')
		->with('empleado',$empleado[0]);
	}
    public function guardamodificaempleado(Request $request)
	{
        $id_empleado =  $request->id_empleado;
        $nombre_empleado = $request->nombre_empleado;
        $apellido_materno_empleado = $request->apellido_materno_empleado;
        $apellido_paterno_empleado = $request->apellido_paterno_empleado;
        $edad = $request->edad;
        $curp = $request->curp;
        $NSS = $request->NSS;
        $fecha_ingreso = $request->fecha_ingreso;
        $puesto = $request->puesto;
        $activo = $request->activo;
        
		$this->validate($request,[
            'id_empleado'=>'required',
             'nombre_empleado'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'apellido_materno_empleado'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'apellido_paterno_empleado'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'edad'=>'required|integer|min:15',
             'curp'=>'required|regex:/^[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}+$/',
             'fecha_ingreso'=>'required|regex:/^[0-9]{4}[-]{1}[0-9]{2}[-][0-9]{2}/',
             'NSS'=>['regex:/^[0-9]{11}/'],
             'puesto'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'activo'=>'required'
        ]);
            $emplead = empleados::find($id_empleado);
	        $emplead->id_empleado =  $request->id_empleado;
            $emplead->nombre_empleado = $request->nombre_empleado;
            $emplead->apellido_materno_empleado = $request->apellido_materno_empleado;
            $emplead->apellido_paterno_empleado = $request->apellido_paterno_empleado;
            $emplead->edad = $request->edad;
            $emplead->curp = $request->curp;
            $emplead->NSS = $request->NSS;
            $emplead->fecha_ingreso = $request->fecha_ingreso;
            $emplead->puesto = $request->puesto;
            $emplead->activo = $request->activo;
			if($emplead->save()){
				return redirect('http://www.maquinados-y-construcciones.com/public/reporteempleados')
            ->with('msj','empleado modificado correctamente');
			}else{
				return back();
			}
		 echo "Listo para modificar";
	}
	public function eliminaempleado($id_empleado)
	{
			if(empleados::find($id_empleado)->delete()){
				return back()->with('msj','Cliente inhabilitado correctamente');
			}else{
				return back();
            }
            
    }
    
    public function restauraempleado($id_empleado)
	{

	if(empleados::withTrashed()->where('id_empleado',$id_empleado)->restore()){
		return back()->with('msj','Cliente restaurado correctamente');
	}else{
		return back();
	}
}
     public function efisicaempleado($id_empleado)
	{
		if(empleados::withTrashed()->where('id_empleado',$id_empleado)->forceDelete()){
			return back()->with('msj','Cliente eliminado permanentemente');
		}else{
			return back();
		}
	}

}
