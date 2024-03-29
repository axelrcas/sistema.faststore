<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* Adjuntadas adicionalmente para el consumo del API */
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;

class ControladoresLogueo extends Controller
{
    public function ver() {
      $client = new Client([
          'base_uri' => 'localhost:8000/api/'
      ]);

      $response = $client->request('GET','users');

      return json_decode($response->getBody()->getContents(),true);
    }


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

        if (count($data) == 1){
            $request->session()->put('error_sesion','true');
            return redirect('/');
        } else {
            $request->session()->forget('error_sesion');
            $request->session()->put('id_general',$data['Id_Empleado']);
            $request->session()->put('nombre_general',$data['NombreEmpleado']);
            $request->session()->put('apellido_general',$data['ApellidoEmpleado']);
        }

        return redirect('/home');
    }

    public function home(Request $request) {
        $usuario = $request->session()->get('id_general');

        if (!$usuario) {
            return redirect('/login');
        } else {
            // GET A PRODUCTOS
            $client = new Client([
                'base_uri' => 'https://backendmarket.herokuapp.com/api/productos/'
            ]);

            $response = $client->request('GET','count');

            $productos = json_decode($response->getBody()->getContents(),true);

            $productoDash = $productos['numero'];

            // GET A PROVEEDORES
            $client = new Client([
                'base_uri' => 'https://backendmarket.herokuapp.com/api/productos/proveedores/'
            ]);

            $response = $client->request('GET','count');

            $proveedores = json_decode($response->getBody()->getContents(),true);

            $proveedoresDash = $proveedores['numero'];

            // GET A CLIENTES
            $client = new Client([
                'base_uri' => 'https://backendmarket.herokuapp.com/api/clientes/'
            ]);

            $response = $client->request('GET','countCliente');

            $clientes = json_decode($response->getBody()->getContents(),true);

            $clientesDash = $clientes['numero'];

            // GET A EMPLEADOS
            $client = new Client([
                'base_uri' => 'https://backendmarket.herokuapp.com/api/empleados/'
            ]);

            $response = $client->request('GET','countEmpleados');

            $empleados = json_decode($response->getBody()->getContents(),true);

            $empleadosDash = $empleados['numero'];

            return view('home')->with(['productoDash'=>$productoDash, 'proveedoresDash'=>$proveedoresDash, 'clientesDash'=>$clientesDash, 'empleadosDash'=>$empleadosDash]);
        }
    }

    public function cerrar_sesion(Request $request) {
        $request->session()->forget('id_general');
        $request->session()->forget('nombre_general');
        $request->session()->forget('apellido_general');
        $request->session()->forget('dash_empleados');
        $request->session()->forget('dash_clientes');
        $request->session()->forget('dash_proveedores');
        $request->session()->forget('dash_productos');
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
