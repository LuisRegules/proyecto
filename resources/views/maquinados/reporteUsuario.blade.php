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
                                                <th>Clave usuario</th>
                                                <th>Nombre(s)</th>
                                                <th>Correo electrónico</th>
                                                <th>Contraseña</th>
                                                <th>Foto</th>
                                                <th>Activo</th>
                                                <th>Operaciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($usuarios as $usua)
                                            <tr>
                                                <td>{{$usua->id_usuario}}</td>
                                                <td>{{$usua->nombre_usuario}}</td>
                                                <td>{{$usua->correo_electronico}}</td>
                                                <td>{{$usua->contraseña}}</td>
                                                <td><img src = "{{asset('archivos/'.$usua->foto_perfil)}}"
                                                height =100 width=100>
                                               </td>
                                                <td>{{$usua->activo}}</td>
                                                <td>
                                                <div class="table-data-feature">
                                                @if($usua->deleted_at=="")
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                                                            <a href="{{URL::action('ControladorUsuario@modificausuario',['id_usuario'=>$usua->id_usuario])}}" class="zmdi zmdi-edit"> 
                                                </a>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Inhabiltar">
                                                        <a href="{{URL::action('ControladorUsuario@eliminausuario',['id_usuario'=>$usua->id_usuario])}}" class="zmdi zmdi-power"> 
                                                </a> 
                                                        </button>
                                                        @else
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="restaurar">
                                                        <a href="{{URL::action('ControladorUsuario@restaurausuario',['id_usuario'=>$usua->id_usuario])}}" class="zmdi zmdi-refresh"> 
                                                </a> 
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                                        <a href="{{URL::action('ControladorUsuario@efisicausuario',['id_usuario'=>$usua->id_usuario])}}" class="zmdi zmdi-delete"> 
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