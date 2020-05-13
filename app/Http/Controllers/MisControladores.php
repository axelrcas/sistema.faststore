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
        // POST LOGUEO
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
            $request->session()->put('apellido_general',$data['ApellidoEmpleado']);
        }

        // GET A PROVEEDORES
        $client = new Client([
            'base_uri' => 'https://backendmarket.herokuapp.com/api/productos/proveedores/'
        ]);

        $response = $client->request('GET','count');

        $proveedores = json_decode($response->getBody()->getContents(),true);

        if ($proveedores>=0) {
            $request->session()->put('dash_proveedores',$proveedores['numero']);
        }

        // GET A CLIENTES
        $client = new Client([
            'base_uri' => 'https://backendmarket.herokuapp.com/api/clientes/'
        ]);

        $response = $client->request('GET','countCliente');

        $clientes = json_decode($response->getBody()->getContents(),true);

        if ($clientes>=0) {
            $request->session()->put('dash_clientes',$clientes['numero']);
        }

        // GET A PRODUCTOS
        $client = new Client([
            'base_uri' => 'https://backendmarket.herokuapp.com/api/productos/'
        ]);

        $response = $client->request('GET','count');

        $productos = json_decode($response->getBody()->getContents(),true);

        if ($productos>=0) {
            $request->session()->put('dash_productos',$productos['numero']);
        }

        // GET A EMPLEADOS
        $client = new Client([
            'base_uri' => 'https://backendmarket.herokuapp.com/api/empleados/'
        ]);

        $response = $client->request('GET','countEmpleados');

        $empleados = json_decode($response->getBody()->getContents(),true);

        if ($empleados>=0) {
            $request->session()->put('dash_empleados',$empleados['numero']);
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