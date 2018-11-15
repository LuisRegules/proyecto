<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', function () {
    echo "hola Mundo -- tic 71";
});

Route::get('/areatriangulo', function () {
    $base= 10;
    $altura = 40;
    $area = ($base *$altura)/2;
    echo "El area es" . $area;
});


Route::get('/areatriangulo2/{base}/{altura}',
 function ($base,$altura) {
    $area = ($base *$altura)/2;
    echo "El area es" . $area;
});


Route::get('/mensajito','curso@mensaje');
Route::get('/at','curso@areatriangulo');
Route::get('/ac/{lado}','curso@areacuadrado');
Route::get('/ventas/costos/{cant}/{costo}','curso@total');

Route::get('/altamaestro','curso@altamaestro');
Route::POST('/guardamaestro','curso@guardamaestro')->name('guardamaestro');
Route::get('/reportemaestros','curso@reportemaestros');
Route::get('/modificam/{idm}','curso@modificam')->name('modificam');
Route::POST('/guardamodificam','curso@guardamodificam')->name('guardamodificam');
Route::get('/eliminam/{idm}','curso@eliminam')->name('eliminam');

Route::get('/altaservicio','ControladorServicio@altaservicio');
Route::POST('/guardaservicio','ControladorServicio@guardaservicio')->name('guardaservicio');
Route::get('/reporteservicios','ControladorServicio@reporteservicios');
Route::get('/modificaservicio/{id_servicio}','ControladorServicio@modificaservicio')->name('modificaservicio');
Route::POST('/guardamodificaservicio','ControladorServicio@guardamodificaservicio')->name('guardamodificaservicio');
Route::get('/eliminaservicio/{id_servicio}','ControladorServicio@eliminaservicio')->name('eliminaservicio');
Route::get('/restauraservicio/{id_servicio}','ControladorServicio@restauraservicio')->name('restauraservicio');
Route::get('/efisicaservicio/{id_servicio}','ControladorServicio@efisicaservicio')->name('efisicaservicio');

Route::get('/altacliente','ControladorCliente@altacliente');
Route::POST('/guardacliente','ControladorCliente@guardacliente')->name('guardacliente');
Route::get('/reporteclientes','ControladorCliente@reporteclientes');
Route::get('/modificacliente/{id_cliente}','ControladorCliente@modificacliente')->name('modificacliente');
Route::POST('/guardamodificacliente','ControladorCliente@guardamodificacliente')->name('guardamodificacliente');
Route::get('/eliminacliente/{id_cliente}','ControladorCliente@eliminacliente')->name('eliminacliente');
Route::get('/restauracliente/{id_cliente}','ControladorCliente@restauracliente')->name('restauracliente');
Route::get('/efisicacliente/{id_cliente}','ControladorCliente@efisicacliente')->name('efisicacliente');

Route::get('/altaempleado','ControladorEmpleado@altaempleado');
Route::POST('/guardaempleado','ControladorEmpleado@guardaempleado')->name('guardaempleado');
Route::get('/reporteempleados','ControladorEmpleado@reporteempleados');
Route::get('/modificaempleado/{id_empleado}','ControladorEmpleado@modificaempleado')->name('modificaempleado');
Route::POST('/guardamodificaempleado','ControladorEmpleado@guardamodificaempleado')->name('guardamodificaempleado');
Route::get('/eliminaempleado/{id_empleado}','ControladorEmpleado@eliminaempleado')->name('eliminaempleado');
Route::get('/restauraempleado/{id_empleado}','ControladorEmpleado@restauraempleado')->name('restauraempleado');
Route::get('/efisicaempleado/{id_empleado}','ControladorEmpleado@efisicaempleado')->name('efisicaempleado');

Route::get('/altamaterial','ControladorMaterial@altamaterial');
Route::POST('/guardamaterial','ControladorMaterial@guardamaterial')->name('guardamaterial');
Route::get('/reportematerial','ControladorMaterial@reportematerial');
Route::get('/modificamaterial/{id_material}','ControladorMaterial@modificamaterial')->name('modificamaterial');
Route::POST('/guardamodificamaterial','ControladorMaterial@guardamodificamaterial')->name('guardamodificamaterial');
Route::get('/eliminamaterial/{id_material}','ControladorMaterial@eliminamaterial')->name('eliminamaterial');
Route::get('/restauramaterial/{id_material}','ControladorMaterial@restauramaterial')->name('restauramaterial');
Route::get('/efisicamaterial/{id_material}','ControladorMaterial@efisicamaterial')->name('efisicamaterial');

Route::get('/altaproveedor','ControladorProveedor@altaproveedor');
Route::POST('/guardaproveedor','ControladorProveedor@guardaproveedor')->name('guardaproveedor');
Route::get('/reporteproveedor','ControladorProveedor@reporteproveedor');
Route::get('/modificaproveedor/{id_proveedor}','ControladorProveedor@modificaproveedor')->name('modificaproveedor');
Route::POST('/guardamodificaproveedor','ControladorProveedor@guardamodificaproveedor')->name('guardamodificaproveedor');
Route::get('/eliminaproveedor/{id_proveedor}','ControladorProveedor@eliminaproveedor')->name('eliminaproveedor');
Route::get('/restauraproveedor/{id_proveedor}','ControladorProveedor@restauraproveedor')->name('restauraproveedor');
Route::get('/efisicaproveedor/{id_proveedor}','ControladorProveedor@efisicaproveedor')->name('efisicaproveedor');

Route::get('/altausuario','ControladorUsuario@altausuario');
Route::POST('/guardausuario','ControladorUsuario@guardausuario')->name('guardausuario');
Route::get('/reporteusuario','ControladorUsuario@reporteusuario');
Route::get('/modificausuario/{id_usuario}','ControladorUsuario@modificausuario')->name('modificausuario');
Route::POST('/guardamodificausuario','Controladorusuario@guardamodificausuario')->name('guardamodificausuario');
Route::get('/eliminausuario/{id_usuario}','ControladorUsuario@eliminausuario')->name('eliminausuario');
Route::get('/restaurausuario/{id_usuario}','ControladorUsuario@restaurausuario')->name('restaurausuario');
Route::get('/efisicausuario/{id_usuario}','ControladorUsuario@efisicausuario')->name('efisicausuario');