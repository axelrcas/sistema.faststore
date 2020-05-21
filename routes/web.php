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

Route::get('/home', function (Request $request) {
    $usuario = $request->session()->get('id_general');

    if (!$usuario) {
        return redirect('/login');
    } else {
        return view('home');
    } 
});

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




/*
 * RUTAS A LOS CONTROLADORES
 */


//          LOGUEO DE EMPLEADOS AL SISTEMA
Route::get('/cerrar','ControladoresLogueo@cerrar_sesion');
Route::post('/iniciar', 'ControladoresLogueo@iniciar_sesion');

//              CONTROLADORES PRODUCTOS
Route::get('/lista-productos','ControladoresProductos@productos');   
Route::post('/insertar-producto','ControladoresProductos@crearproducto'); 
Route::get('/info-producto','ControladoresProductos@infoproducto'); 