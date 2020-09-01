<?php

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

/*
 * RUTAS A LAS VISTAS
 */

Route::get('/', function (Request $request) {
    $usuario = $request->session()->get('id_general');

    if (!$usuario) {
        return redirect('/login');
    } else {
        return redirect('/home');
    }
});

Route::get('/login', function (Request $request) {

    $usuario = $request->session()->get('id_general');

    if (!$usuario) {
        return view('index');
    } else {
        return redirect('/home');
    }
});

/* Route::get('/home', function (Request $request) {
    $usuario = $request->session()->get('id_general');

    if (!$usuario) {
        return redirect('/login');
    } else {
        return view('home');
    }
});
 */
Route::get('/empleados', function (Request $request) {
    $usuario = $request->session()->get('id_general');

    if (!$usuario) {
        return redirect('/login');
    } else {
        return view('empleados');
    }
});

Route::get('/productos', function (Request $request) {
    $usuario = $request->session()->get('id_general');

    if (!$usuario) {
        return redirect('/login');
    } else {
        return redirect('/lista-productos');
    }
});

Route::get('/info-producto', function (Request $request) {
    $usuario = $request->session()->get('id_general');

    if (!$usuario) {
        return redirect('/login');
    } else {
        return redirect('/infor-producto');
    }
});

Route::get('/administrativo', function (Request $request) {
    $usuario = $request->session()->get('id_general');

    if (!$usuario) {
        return redirect('/login');
    } else {
        return redirect('/lista-proveedores');
    }
});

Route::get('/clientes', function (Request $request) {
    $usuario = $request->session()->get('id_general');

    if (!$usuario) {
        return redirect('/login');
    } else {
        return redirect('/lista-clientes');
    }
});

Route::get('/empleados', function (Request $request) {
    $usuario = $request->session()->get('id_general');

    if (!$usuario) {
        return redirect('/login');
    } else {
        return redirect('/lista-empleados');
    }
});

Route::get('/ventas', function (Request $request) {
    $usuario = $request->session()->get('id_general');

    if (!$usuario) {
        return redirect('/login');
    } else {
        return redirect('/proceso-ventas');
    }
});


/*
 * RUTAS A LOS CONTROLADORES
 */


//          LOGUEO DE EMPLEADOS AL SISTEMA
Route::get('/cerrar','ControladoresLogueo@cerrar_sesion');
Route::post('/iniciar', 'ControladoresLogueo@iniciar_sesion');
Route::get('/home', 'ControladoresLogueo@home');
Route::get('/usuariosfrontend','ControladoresLogueo@ver');

//              CONTROLADORES PRODUCTOS
Route::get('/lista-productos','ControladoresProductos@productos');
Route::post('/insertar-producto','ControladoresProductos@crearproducto');
Route::get('/info-producto','ControladoresProductos@infoproducto');
Route::post('/crear-categoria','ControladoresProductos@crearcategoria');
Route::delete('/eliminar-categoria','ControladoresProductos@eliminarcategoria');
Route::post('/ingreso-producto','ControladoresProductos@ingresoproducto');
Route::post('/eliminar-producto','ControladoresProductos@eliminarproducto');
Route::delete('/borrar-producto','ControladoresProductos@borrarproducto');

//              CONTROLADORES PROVEEDORES
Route::get('/lista-proveedores','ControladoresProveedores@proveedores');
Route::post('/crear-proveedor','ControladoresProveedores@crearproveedor');
Route::delete('/borrar-proveedor','ControladoresProveedores@borrarproveedor');

//              CONTROLADORES CLIENTES
Route::get('/lista-clientes','ControladoresClientes@clientes');
Route::post('/crear-tipocliente','ControladoresClientes@creartipocliente');
Route::post('/crear-cliente','ControladoresClientes@crearcliente');
Route::delete('/borrar-cliente','ControladoresClientes@borrarcliente');
Route::delete('/eliminar-tipocliente','ControladoresClientes@eliminartipocliente');

//              CONTROLADORES EMPLEADOS
Route::get('/lista-empleados','ControladoresEmpleados@empleados');
Route::post('/crear-empresa','ControladoresEmpleados@crearempresa');
Route::post('/crear-empleado','ControladoresEmpleados@crearempleado');
Route::delete('/borrar-empleado','ControladoresEmpleados@borrarempleado');

//              CONTROLADORES VENTAS
Route::get('/proceso-ventas','ControladoresVentas@ventas');
Route::post('/insertar-venta','ControladoresVentas@insertarventas');
