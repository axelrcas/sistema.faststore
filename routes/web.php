<?php

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

/*
 * RUTAS A LAS VISTAS
 */

Route::get('/', function (Request $request) {
    $usuario = $request->session()->get('usuario_general');

    if (!$usuario) {
        return redirect('/login');
    } else {
        return redirect('/home');
    }  
});

Route::get('/login', function (Request $request) {
    
    $usuario = $request->session()->get('usuario_general');

    if (!$usuario) {
        return view('index');
    } else {
        return redirect('/home');
    }
});

Route::get('/home', function (Request $request) {
    $usuario = $request->session()->get('usuario_general');

    if (!$usuario) {
        return redirect('/login');
    } else {
        return view('home');
    } 
});

Route::get('/grados', function (Request $request) {
    $usuario = $request->session()->get('usuario_general');

    if (!$usuario) {
        return redirect('/login');
    } else {
        return view('grados');
    } 
});

Route::get('/mis-cursos', function (Request $request) {
    $usuario = $request->session()->get('usuario_general');

    if (!$usuario) {
        return redirect('/login');
    } else {
        return view('mis-cursos');
    } 
});





/*
 * RUTAS A LOS CONTROLADORES
 */

Route::get('/cerrar','MisControladores@cerrar_sesion');
Route::post('/iniciar', 'MisControladores@iniciar_sesion');
Route::get('/get-mis-cursos/{id}','MisControladores@mis_cursos');
