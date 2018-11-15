@extends('maquinados.principal')
@section('contenido')
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row m-t-30">
                            <div class="col-md-12">
                            @if(session()->has('msj'))
                           <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
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
                                                <th>Clave empleado</th>
                                                <th>Nombre(s)</th>
                                                <th>Apellido paterno</th>
                                                <th>Apellido materno</th>
                                                <th>Edad</th>
                                                <th>CURP</th>
                                                <th>NSS</th>
                                                <th>Fecha de ingreso</th>
                                                <th>puesto</th>
                                                <th>Activo</th>
                                                <th>Operaciones</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($empleados as $emplead)
                                            <tr>
                                                <td>{{$emplead->id_empleado}}</td>
                                                <td>{{$emplead->nombre_empleado}}</td>
                                                <td>{{$emplead->apellido_paterno_empleado}}</td>
                                                <td>{{$emplead->apellido_materno_empleado}}</td>
                                                <td>{{$emplead->edad}}</td>
                                                <td>{{$emplead->curp}}</td>
                                                <td>{{$emplead->NSS}}</td>
                                                <td>{{$emplead->fecha_ingreso}}</td>
                                                <td>{{$emplead->puesto}}</td>
                                                <td>{{$emplead->activo}}</td>
                                                <td>
                                                <div class="table-data-feature">
                                                @if($emplead->deleted_at=="")
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                                                            <a href="{{URL::action('ControladorEmpleado@modificaempleado',['id_empleado'=>$emplead->id_empleado])}}" class="zmdi zmdi-edit"> 
                                                </a>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Inhabiltar">
                                                        <a href="{{URL::action('ControladorEmpleado@eliminaempleado',['id_empleado'=>$emplead->id_empleado])}}" class="zmdi zmdi-power"> 
                                                </a> 
                                                        </button>
                                                        @else
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="restaurar">
                                                        <a href="{{URL::action('ControladorEmpleado@restauraempleado',['id_empleado'=>$emplead->id_empleado])}}" class="zmdi zmdi-refresh"> 
                                                </a> 
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                                        <a href="{{URL::action('ControladorEmpleado@efisicaempleado',['id_empleado'=>$emplead->id_empleado])}}" class="zmdi zmdi-delete"> 
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