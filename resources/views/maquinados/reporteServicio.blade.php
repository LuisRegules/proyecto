@extends('maquinados.principal')
@section('contenido')
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row m-t-30">
                            <div class="col-md-12">
                            @if(session()->has('msj'))
                            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                            {{ session('msj') }}
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
                            @else
                        @endif
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Clave servicio</th>
                                                <th>Descripción</th>
                                                <th>Foto</th>
                                                <th>Activo</th>
                                                <th>Operaciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($servicios as $serv)
                                            <tr>
                                                <td>{{$serv->id_servicio}}</td>
                                                <td>{{$serv->descripcion}}</td>
                                                <td><img src = "{{asset('archivos/'.$serv->foto_servicio)}}"
                                                height =100 width=100>
                                               </td>
                                                <td>{{$serv->activo}}</td>
                                                <td>

                                                    <div class="table-data-feature">
                                                @if($serv->deleted_at=="")
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                                                            <a href="{{URL::action('ControladorServicio@modificaservicio',['id_servicio'=>$serv->id_servicio])}}" class="zmdi zmdi-edit"> 
                                                </a>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Inhabiltar">
                                                        <a href="{{URL::action('ControladorServicio@eliminaservicio',['id_servicio'=>$serv->id_servicio])}}" class="zmdi zmdi-power"> 
                                                </a> 
                                                        </button>
                                                        @else
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="restaurar">
                                                        <a href="{{URL::action('ControladorServicio@restauraservicio',['id_servicio'=>$serv->id_servicio])}}" class="zmdi zmdi-refresh"> 
                                                </a> 
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                                        <a href="{{URL::action('ControladorServicio@efisicaservicio',['id_servicio'=>$serv->id_servicio])}}" class="zmdi zmdi-delete"> 
                                                </a> 
                                                        </button>
                                                        @endif
                                                    </div>   
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                                <!-- END DATA TABLE-->
                    </div>
                </div>
            </div>
        </div>

    </div>
            <!-- END HEADER DESKTOP-->
                                @stop