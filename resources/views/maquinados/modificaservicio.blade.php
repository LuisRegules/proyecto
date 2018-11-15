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
                                    <h3 class="text-center title-2">Modifica servicio</h3>
                                </div>
                                <form action =  "{{route('guardamodificaservicio')}}"  method = "POST" enctype='multipart/form-data' >   
                                {{csrf_field()}}
                                    <div class="form-group">
                                    @if($errors->first('id_servicio')) 
                                    <i> {{ $errors->first('id_servicio') }} </i> 
                                    @endif
                                        <label for="cc-payment" class="control-label mb-1">Clave servicio</label>
                                        <input id="cc-pament" name="id_servicio" type="text" class="form-control"
                                            aria-required="true" aria-invalid="false" value="{{$servicio->id_servicio}}" readonly ='readonly'>
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Descripción</label>
                                        <br>
                                        @if($errors->first('descripcion')) 
                                    <i style="color:rgb(255,0,0);" > {{ $errors->first('descripcion') }} </i> 
                                    @endif
                                        <input id="cc-pament" name="descripcion" type="text" class="form-control" placeholder="Inserta la descripción"
                                            aria-required="true" aria-invalid="false" value="{{$servicio->descripcion}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Foto del servicio</label>
                                        <br>
                                        @if($errors->first('foto_servicio')) 
                                        <i style="color:rgb(255,0,0);"> {{ $errors->first('foto_servicio') }} </i> 
                                        @endif
                                        <img src = "{{asset('archivos/'.$servicio->foto_servicio)}}"
                                                height =100 width=100>
                                        <br>
                                        <input id="cc-pament" type='file' name ='foto_servicio' class="form-control"
                                            aria-required="true" aria-invalid="false" value="{{$servicio->foto_servicio}}">
                                        <BR>
                                    </div>
                                    <div class="form-group">
                                        
                                        @if($servicio->activo=='SI') 
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