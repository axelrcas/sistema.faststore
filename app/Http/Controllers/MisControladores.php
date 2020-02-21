<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* Adjuntadas adicionalmente para el consumo del API */
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;

class MisControladores extends Controller
{
    public function iniciar_sesion(Request $request)
    {
        $client = new Client();

        $dato = [
            'usuario' => $request['usuario'],
            'contrasenia' => $request['contrasenia']
        ]; 

        $response = $client->post('https://api-consolidadoscbp.herokuapp.com/login', [
            'json' => $dato
        ]);

        $var = json_decode($response->getBody()->getContents());

        if ($var == 'No Existe'){ 
            $request->session()->put('error_sesion','true');
            return redirect('/');
        } else {
            $request->session()->forget('error_sesion');
            $request->session()->put('usuario_general',$var[0]->usuario);
            $request->session()->put('nombre_general',$var[0]->nombre);
            $request->session()->put('apellido_general',$var[0]->apellido);
            $request->session()->put('cargo_general',$var[0]->cargo);
            $request->session()->put('gradoguia_general',$var[0]->grado_guia);
        }

        return redirect('/home');
    }

    public function cerrar_sesion(Request $request) {
        $request->session()->forget('usuario_general');
        $request->session()->forget('nombre_general');
        $request->session()->forget('apellido_general');
        $request->session()->forget('cargo_general');
        $request->session()->forget('gradoguia_general');
        return redirect('/');
    }

    public function mis_cursos($id, Request $request) {

        if ($id == $request->session()->get('usuario_general')) {
            $client = new Client([
                'base_uri' => 'localhost:3000/mis-cursos/'
            ]);

            $response = $client->request('GET',$id);

            $data = json_decode($response->getBody()->getContents());

            return view('mis-cursos', compact('data'));
        }
    }
}