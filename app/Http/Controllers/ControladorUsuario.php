<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\usuarios;
class ControladorUsuario extends Controller
{
    public function altausuario()
    {
	   $clavequesigue = usuarios::orderBy('id_usuario','desc')
								->take(1)
								->get();
     $idUsuario = $clavequesigue[0]->id_usuario+1;
     return view ("maquinados.altausuario")
			->with('idUsuario',$idUsuario);
    }
    public function guardausuario(Request $request)
    {
        $id_usuario =  $request->id_usuario;
        $nombre_usuario = $request->nombre_usuario;
        $correo_electronico = $request->correo_electroninco;
        $contraseña = $request->contraseña;
        $activo = $request->activo;
        
		 $this->validate($request,[
			'id_usuario'=>'required',
			'nombre_usuario'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
			'correo_electronico'=>'required|email',
			'contraseña'=>'required',
			'foto_perfil'=>'image|mimes:jpeg,png,gif',
			'activo'=>'required'
		 ]);
		 $file = $request->file('foto_perfil');
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
            $usua = new usuarios;
			$usua->id_usuario = $request->id_usuario;
			$usua->nombre_usuario = $request->nombre_usuario;
			$usua->correo_electronico = $request->correo_electronico;
			$usua->contraseña = $request->contraseña;
			$usua->foto_perfil = $img2;
			$usua->activo =$request->activo;
		    if($usua->save()){
				return back()->with('msj','Usuario guardado correctamente');
			}else{
				return back();
			}
        
    }
    public function reporteusuario()
	{
	$usuarios=usuarios::withTrashed()->orderBy('id_usuario','asc')
	          ->get();
	  return view('maquinados.reporteUsuario')
	  ->with('usuarios',$usuarios);                  
	}
	public function modificausuario($id_usuario)
	{
		$usuario = usuarios::where('id_usuario','=',$id_usuario)
		                     ->get();
		return view ('maquinados.modificausuario')
		->with('usuario',$usuario[0]);
	}
    public function guardamodificausuario(Request $request)
	{
		$id_usuario =  $request->id_usuario;
        $nombre_usuario = $request->nombre_usuario;
        $correo_electronico = $request->correo_electroninco;
        $contraseña = $request->contraseña;
        $activo = $request->activo;
        
		 $this->validate($request,[
			'id_usuario'=>'required',
			'nombre_usuario'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
			'correo_electronico'=>'required|email',
			'contraseña'=>'required',
			'foto_perfil'=>'image|mimes:jpeg,png,gif',
			'activo'=>'required'
		 ]);
		 $file = $request->file('foto_perfil');
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
	        $usua = usuarios::find($id_usuario);
			$usua->id_usuario = $request->id_usuario;
			$usua->nombre_usuario = $request->nombre_usuario;
			$usua->correo_electronico = $request->correo_electronico;
			$usua->contraseña = $request->contraseña;
			if($file!="")
	        {	
			$usua->foto_perfil = $img2;
	        }
			$usua->activo =$request->activo;
			if($usua->save()){
				return redirect('http://www.maquinados-y-construcciones.com/public/reporteempleados')
				->with('msj','Usuario modificado correctamente');
			}else{
				return back();
			}
	  echo "Listo para modificar";
	}
	public function eliminausuario($id_usuario)
	{
			if(usuarios::find($id_usuario)->delete()){
				return back()->with('msj','Usuario inhabilitado correctamente');
			}else{
				return back();
			}
	}
	public function restaurausuario($id_usuario)
	{

	if(usuarios::withTrashed()->where('id_usuario',$id_usuario)->restore()){
		return back()->with('msj','Usuario restaurado correctamente');
	}else{
		return back();
	}
}
     public function efisicausuario($id_usuario)
	{
		if(usuarios::withTrashed()->where('id_usuario',$id_usuario)->forceDelete()){
			return back()->with('msj','Usuario eliminado permanentemente');
		}else{
			return back();
		}
	}
}
