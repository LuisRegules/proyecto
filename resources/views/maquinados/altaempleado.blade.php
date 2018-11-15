@extends('maquinados.principal')
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
                                    <h3 class="text-center title-2">Alta empleado</h3>
                                </div>
                                <form action =  "{{route('guardaempleado')}}" method = "POST" enctype='multipart/form-data' >  
                                {{csrf_field()}}
                                    <div class="form-group">
                                    @if($errors->first('id_empleado')) 
                                    <i> {{ $errors->first('id_empleado') }} </i> 
                                    @endif
                                        <label for="cc-payment" class="control-label mb-1">Clave empleado</label>
                                        <input id="cc-pament" name="id_empleado" type="text" class="form-control"
                                            aria-required="true" aria-invalid="false" value="{{$idEmpleados}}" readonly ='readonly'>
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Nombre(s)</label>
                                        <br>
                                        @if($errors->first('nombre_empleado')) 
                                    <i style="color:rgb(255,0,0);" > {{ $errors->first('nombre_empleado') }} </i> 
                                    @endif
                                        <input id="cc-pament" name="nombre_empleado" type="text" class="form-control"  placeholder="Inserta el nombre"
                                            aria-required="true" aria-invalid="false" value="{{old('nombre_empleado')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Apellido materno</label>
                                        <br>
                                        @if($errors->first('apellido_materno_empleado')) 
                                    <i style="color:rgb(255,0,0);" > {{ $errors->first('apellido_materno_empleado') }} </i> 
                                    @endif
                                        <input id="cc-pament" name="apellido_materno_empleado" type="text" class="form-control" placeholder="Inserta el apellido materno"
                                            aria-required="true" aria-invalid="false" value="{{old('apellido_materno_empleado')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Apellido paterno</label>
                                        <br>
                                        @if($errors->first('apellido_paterno_empleado')) 
                                    <i style="color:rgb(255,0,0);" > {{ $errors->first('apellido_paterno_empleado') }} </i> 
                                    @endif
                                        <input id="cc-pament" name="apellido_paterno_empleado" type="text" class="form-control"  placeholder="Inserta el apellido materno"
                                            aria-required="true" aria-invalid="false" value="{{old('apellido_paterno_empleado')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Edad</label>
                                        <br>
                                        @if($errors->first('edad')) 
                                    <i style="color:rgb(255,0,0);" > {{ $errors->first('edad') }} </i> 
                                    @endif
                                        <input id="cc-pament" name="edad" type="text" class="form-control"  placeholder="Inserta la edad"
                                            aria-required="true" aria-invalid="false" value="{{old('edad')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">CURP</label>
                                        <br>
                                        @if($errors->first('curp')) 
                                    <i style="color:rgb(255,0,0);" > {{ $errors->first('curp') }} </i> 
                                    @endif
                                        <input id="cc-pament" name="curp" type="text" class="form-control" onkeyup="this.value=this.value.toUpperCase() "  placeholder="Inserta el CURP"
                                            aria-required="true" aria-invalid="false" value="{{old('curp')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">NSS</label>
                                        <br>
                                        @if($errors->first('NSS')) 
                                    <i style="color:rgb(255,0,0);" > {{ $errors->first('NSS') }} </i> 
                                    @endif
                                        <input id="cc-pament" name="NSS" type="text" class="form-control" placeholder="Inserta el número de seguro social"
                                            aria-required="true" aria-invalid="false" value="{{old('NSS')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Fecha de ingreso</label>
                                        <br>
                                        @if($errors->first('fecha_ingreso')) 
                                    <i style="color:rgb(255,0,0);" > {{ $errors->first('fecha_ingreso') }} </i> 
                                    @endif
                                        <input id="cc-pament" name="fecha_ingreso" type="text" class="form-control" placeholder="Inserta la fecha de ingreso (AAAA-MM-DD)"
                                            aria-required="true" aria-invalid="false" value="{{old('fecha_ingreso')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Puesto</label>
                                        <br>
                                        @if($errors->first('puesto')) 
                                    <i style="color:rgb(255,0,0);" > {{ $errors->first('puesto') }} </i> 
                                    @endif
                                        <input id="cc-pament" name="puesto" type="text" class="form-control" placeholder="Inserta el puesto"
                                            aria-required="true" aria-invalid="false" value="{{old('puesto')}}">
                                    </div>
                                    <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Activo </label>
                                    <br>
                                    <input type = 'radio' name = 'activo' value = 'Si' checked>Si
                                    <input type = 'radio' name = 'activo' value = 'No'>No
                                    <br>
                                    </div>
                                    <div>
                                    <input type = 'submit' value = 'Guardar' 
                                    id="payment-button"
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