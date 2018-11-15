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
                                                <th>Clave cliente</th>
                                                <th>Nombre(s)</th>
                                                <th>Apellido materno</th>
                                                <th>Apellido paterno</th>
                                                <th>Empresa</th>
                                                <th>Calle</th>
                                                <th>Número</th>
                                                <th>Localidad</th>
                                                <th>Activo</th>
                                                <th>Operaciones</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($clientes as $client)
                                            <tr>
                                                <td>{{$client->id_cliente}}</td>
                                                <td>{{$client->nombre_cliente}}</td>
                                                <td>{{$client->apellido_materno_cliente}}</td>
                                                <td>{{$client->apellido_paterno_cliente}}</td>
                                                <td>{{$client->empresa}}</td>
                                                <td>{{$client->calle}}</td>
                                                <td>{{$client->num}}</td>
                                                <td>{{$client->localidad}}</td>
                                                <td>{{$client->activo}}</td>
                                                <td>
                                                    
                                                <div class="table-data-feature">
                                                @if($client->deleted_at=="")
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                                                            <a href="{{URL::action('ControladorCliente@modificacliente',['id_cliente'=>$client->id_cliente])}}" class="zmdi zmdi-edit"> 
                                                </a>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Inhabiltar">
                                                        <a href="{{URL::action('ControladorCliente@eliminacliente',['id_cliente'=>$client->id_cliente])}}" class="zmdi zmdi-power"> 
                                                </a> 
                                                        </button>
                                                        @else
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="restaurar">
                                                        <a href="{{URL::action('ControladorCliente@restauracliente',['id_cliente'=>$client->id_cliente])}}" class="zmdi zmdi-refresh"> 
                                                </a> 
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                                        <a href="{{URL::action('ControladorCliente@efisicacliente',['id_cliente'=>$client->id_cliente])}}" class="zmdi zmdi-delete"> 
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