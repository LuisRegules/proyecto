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
                                    <h3 class="text-center title-2">Modifica cliente</h3>
                                </div>
                                <form action =  "{{route('guardamodificacliente')}}"  method = "POST" enctype='multipart/form-data' >   
                                {{csrf_field()}}
                                    <div class="form-group">
                                    @if($errors->first('id_cliente')) 
                                    <i> {{ $errors->first('id_cliente') }} </i> 
                                    @endif
                                        <label for="cc-payment" class="control-label mb-1">Clave cliente</label>
                                        <input id="cc-pament" name="id_cliente" type="text" class="form-control"
                                            aria-required="true" aria-invalid="false" value="{{$cliente->id_cliente}}" readonly ='readonly'>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Nombre(s)</label>
                                        <br>
                                        @if($errors->first('nombre_cliente')) 
                                    <i style="color:rgb(255,0,0);" > {{ $errors->first('nombre_cliente') }} </i> 
                                    @endif
                                        <input id="cc-pament" name="nombre_cliente" type="text" class="form-control" placeholder="Inserta el nombre"
                                            aria-required="true" aria-invalid="false" value="{{$cliente->nombre_cliente}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Apellido materno</label>
                                        <br>
                                        @if($errors->first('apellido_materno_cliente')) 
                                    <i style="color:rgb(255,0,0);" > {{ $errors->first('apellido_materno_cliente') }} </i> 
                                    @endif
                                        <input id="cc-pament" name="apellido_materno_cliente" type="text" class="form-control" placeholder="Inserta el apellido materno"
                                            aria-required="true" aria-invalid="false" value="{{$cliente->apellido_materno_cliente}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Apellido paterno</label>
                                        <br>
                                        @if($errors->first('apellido_paterno_cliente')) 
                                    <i style="color:rgb(255,0,0);" > {{ $errors->first('apellido_paterno_cliente') }} </i> 
                                    @endif
                                        <input id="cc-pament" name="apellido_paterno_cliente" type="text" class="form-control" placeholder="Inserta el apellido paterno"
                                            aria-required="true" aria-invalid="false" value="{{$cliente->apellido_paterno_cliente}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Empresa</label>
                                        <br>
                                        @if($errors->first('empresa')) 
                                    <i style="color:rgb(255,0,0);" > {{ $errors->first('empresa') }} </i> 
                                    @endif
                                        <input id="cc-pament" name="empresa" type="text" class="form-control" placeholder="Inserta la empresa"
                                            aria-required="true" aria-invalid="false" value="{{$cliente->empresa}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Calle</label>
                                        <br>
                                        @if($errors->first('calle')) 
                                    <i style="color:rgb(255,0,0);" > {{ $errors->first('calle') }} </i> 
                                    @endif
                                        <input id="cc-pament" name="calle" type="text" class="form-control" placeholder="Inserta la calle"
                                            aria-required="true" aria-invalid="false" value="{{$cliente->calle}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Número</label>
                                        <br>
                                        @if($errors->first('num')) 
                                    <i style="color:rgb(255,0,0);" > {{ $errors->first('num') }} </i> 
                                    @endif
                                        <input id="cc-pament" name="num" type="text" class="form-control" placeholder="Inserta el número"
                                            aria-required="true" aria-invalid="false" value="{{$cliente->num}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Localidad</label>
                                        <br>
                                        @if($errors->first('localidad')) 
                                    <i style="color:rgb(255,0,0);" > {{ $errors->first('localidad') }} </i> 
                                    @endif
                                        <input id="cc-pament" name="localidad" type="text" class="form-control" placeholder="Inserta la localidad"
                                            aria-required="true" aria-invalid="false" value="{{$cliente->localidad}}">
                                    </div>
                                    <div class="form-group">
                                        
                                        @if($cliente->activo=='SI') 
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