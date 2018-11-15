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
                                    <h3 class="text-center title-2">Modifica proveedor</h3>
                                </div>
                                <form action =  "{{route('guardamodificaproveedor')}}"  method = "POST" enctype='multipart/form-data' >   
                                {{csrf_field()}}
                                    <div class="form-group">
                                    @if($errors->first('id_proveedor')) 
                                    <i> {{ $errors->first('id_proveedor') }} </i> 
                                    @endif
                                        <label for="cc-payment" class="control-label mb-1">Clave proveedor</label>
                                        <input id="cc-pament" name="id_proveedor" type="text" class="form-control"
                                            aria-required="true" aria-invalid="false" value="{{$proveedor->id_proveedor}}" readonly ='readonly'>
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Nombre(s)</label>
                                        <br>
                                        @if($errors->first('nom_proveedor')) 
                                    <i style="color:rgb(255,0,0);" > {{ $errors->first('nom_proveedor') }} </i> 
                                    @endif
                                        <input id="cc-pament" name="nom_proveedor" type="text" class="form-control"
                                            aria-required="true" aria-invalid="false" value="{{$proveedor->nom_proveedor}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Apellido paterno</label>
                                        <br>
                                        @if($errors->first('ap_proveedor')) 
                                    <i style="color:rgb(255,0,0);" > {{ $errors->first('ap_proveedor') }} </i> 
                                    @endif
                                        <input id="cc-pament" name="ap_proveedor" type="text" class="form-control"
                                            aria-required="true" aria-invalid="false" value="{{$proveedor->ap_proveedor}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Apellido materno</label>
                                        <br>
                                        @if($errors->first('am_proveedor')) 
                                    <i style="color:rgb(255,0,0);" > {{ $errors->first('am_proveedor') }} </i> 
                                    @endif
                                        <input id="cc-pament" name="am_proveedor" type="text" class="form-control"
                                            aria-required="true" aria-invalid="false" value="{{$proveedor->am_proveedor}}">
                                    </div>


                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Empresa</label>
                                        <br>
                                        @if($errors->first('empresa')) 
                                    <i style="color:rgb(255,0,0);" > {{ $errors->first('empresar') }} </i> 
                                    @endif
                                        <input id="cc-pament" name="empresa" type="text" class="form-control"
                                            aria-required="true" aria-invalid="false" value="{{$proveedor->empresa}}">
                                    </div>

                                       <div class="form-group">
                                        
                                        @if($proveedor->activo=='SI') 
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