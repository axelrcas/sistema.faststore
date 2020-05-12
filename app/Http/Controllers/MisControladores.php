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
        $client = new Client([
            'base_uri' => 'https://backendmarket.herokuapp.com/api/empleados/'
        ]);

        $dato = [
            'correo' => $request->usuario,
            'pass' => $request->contrasenia
        ]; 

        $response = $client->request('POST','login', [
            'form_params' => $dato
        ]);

        $data = json_decode($response->getBody()->getContents(),true);

        
        if ($data == "Vuelva intentarlo"){ 
            $request->session()->put('error_sesion','true');
            return redirect('/');
        } else {
            $request->session()->forget('error_sesion');
            $request->session()->put('id_general',$data['Id_Empleado']);
            $request->session()->put('nombre_general',$data['NombreEmpleado']);
        }

        return redirect('/home');
        
    }

    public function cerrar_sesion(Request $request) {
        $request->session()->forget('id_general');
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