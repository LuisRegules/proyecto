@extends('maquinados.principalModificaciones')
@section('contenido')
<!-- MAIN CONTENT-->

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row" style="height: 1000px;">
                <div class="col-md-6 offset-md-3 mr-auto ml-auto">
                    <section class="card">
                        <div class="card-body text-secondary">
                         @if(session()->has('msj'))
                           <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
											{{ session('msj') }}
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
										</button>
							</div>
                            @else
                        @endif
                            <div class="card-header">Maquinados y construcciones</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Modifica usuario</h3>
                                </div>
                                <form action =  "{{route('guardamodificausuario')}}"  method = "POST" enctype='multipart/form-data' >   
                                {{csrf_field()}}
                                    <div class="form-group">
                                    @if($errors->first('id_usuario')) 
                                    <i> {{ $errors->first('id_usuario') }} </i> 
                                    @endif
                                        <label for="cc-payment" class="control-label mb-1">Clave usuario</label>
                                        <input id="cc-pament" name="id_usuario" type="text" class="form-control"
                                            aria-required="true" aria-invalid="false" value="{{$usuario->id_usuario}}" readonly ='readonly'>
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Nombre usuario</label>
                                        <br>
                                        @if($errors->first('nombre_usuario')) 
                                    <i style="color:rgb(255,0,0);" > {{ $errors->first('nombre_usuario') }} </i> 
                                    @endif
                                        <input id="cc-pament" name="nombre_usuario" type="text" class="form-control"
                                            aria-required="true" aria-invalid="false" value="{{$usuario->nombre_usuario}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Correo electrónico</label>
                                        <br>
                                        @if($errors->first('correo_electronico')) 
                                    <i style="color:rgb(255,0,0);" > {{ $errors->first('correo_electronico') }} </i> 
                                    @endif
                                        <input id="cc-pament" name="correo_electronico" type="text" class="form-control"
                                            aria-required="true" aria-invalid="false" value="{{$usuario->correo_electronico}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Contraseña</label>
                                        <br>
                                        @if($errors->first('contraseña')) 
                                    <i style="color:rgb(255,0,0);" > {{ $errors->first('contraseña') }} </i> 
                                    @endif
                                        <input id="cc-pament" name="contraseña" type="text" class="form-control"
                                            aria-required="true" aria-invalid="false" value="{{$usuario->contraseña}}">
                                    </div>


                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Foto de perfil</label>
                                        <br>
                                        @if($errors->first('foto_perfil')) 
                                        <i style="color:rgb(255,0,0);"> {{ $errors->first('foto_perfil') }} </i> 
                                        @endif
                                        <img src = "{{asset('archivos/'.$usuario->foto_perfil)}}"
                                                height =100 width=100>
                                        <br>
                                        <input id="cc-pament" type='file' name ='foto_perfil' class="form-control"
                                            aria-required="true" aria-invalid="false" value="{{$usuario->foto_perfil}}">
                                        <BR>
                                    </div>

                                       <div class="form-group">
                                        
                                        @if($usuario->activo=='SI') 
                                        <label for="cc-payment" class="control-label mb-1">Activo </label>
                                        <br>
                                        <input type = 'radio' name = 'activo' value = 'Si' checked>Si
                                        <input type = 'radio' name = 'activo' value = 'No'> No
                                        <br>
                                        @else
                                        <label for="cc-payment" class="control-label mb-1">Activo </label>
                                        <br>
                                        <input type = 'radio' name = 'activo' value = 'Si' >Si
                                        <input type = 'radio' name = 'activo' value = 'No'checked> No
                                        <br>
                                        @endif
                                    </div>
                                    <div>
                                    <input type = 'submit' value = 'Guardar' 
                                    id="payment-button" type="submit" 
                                    class="btn btn-lg btn-info btn-block">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
@stop