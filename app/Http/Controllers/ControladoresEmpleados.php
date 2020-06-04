<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* Adjuntadas adicionalmente para el consumo del API */
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
use Image;

class ControladoresEmpleados extends Controller
{
    public function empleados() {

        $client = new Client([
            'base_uri' => 'http://backendmarket.herokuapp.com/api/'
        ]);

        $response = $client->request('GET','empleados');

        $array = json_decode($response->getBody()->getContents(),true);

        $data = $array['res'];

        $client = new Client([
            'base_uri' => 'https://backendmarket.herokuapp.com/api/empleados/'
        ]);

        $response = $client->request('GET','empresa');

        $data2 = json_decode($response->getBody()->getContents(),true);

       /*  $data2 = $array2['res']; */

        return view('empleados', compact('data'), compact('data2'));
    }

    public function crearempleado(Request $request) {

        $client = new Client([
            'base_uri' => 'https://backendmarket.herokuapp.com/api/'
        ]);

        $dato = [
            'tipo' => $request->tipo,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $request->correo,
            'pass' => $request->pass,
            'tel' => $request->telefono,
            'nit' => $request->nit,
            'residencia' => $request->residencia,
            'tipoEmpleado' => $request->tipoempleado
        ]; 

        sleep(2);

        $response = $client->request('POST','empleados', [
            'form_params' => $dato
        ]);

        return redirect('/lista-empleados');
        //return json_decode($response->getBody()->getContents(),true);

    }

    public function infoproducto(Request $request) {

        $usuario = $request->session()->get('id_general');

        if (!$usuario) {
            return redirect('/login');
        } else {
            $client = new Client([
                'base_uri' => 'http://backendmarket.herokuapp.com/api/productos/'
            ]);
    
            $response = $client->request('GET','cat');
    
            $array = json_decode($response->getBody()->getContents(),true);
    
            $data = $array['res'];
    
            return view('nuevoproducto', compact('data'));
        } 
    }

    public function crearempresa(Request $request) {
      
        $client = new Client([
            'base_uri' => 'https://backendmarket.herokuapp.com/api/empleados/'
        ]);

        $dato = [
            'nombre' => $request->nombre,
            'slogan' => $request->slogan,
            'logo' => 'none',
            'address' => $request->direccion,
            'email' => $request->email
        ]; 

        $response = $client->request('POST','empresa', [
            'form_params' => $dato
        ]);

        return json_decode($response->getBody()->getContents(),true);
        return redirect('/lista-empleados');
        
    }

    public function eliminartipocliente(Request $request) {

        $id = $request->idtipo;

        $client = new Client([
            'base_uri' => 'https://backendmarket.herokuapp.com/api/clientes/tipo/'
        ]);

        $response = $client->delete('https://backendmarket.herokuapp.com/api/clientes/tipo/'.$id);
    
        //return json_decode($response->getBody()->getContents(),true);

        return redirect('/lista-clientes');
    }

    public function ingresoproducto(Request $request) {

        $client = new Client([
            'base_uri' => 'https://backendmarket.herokuapp.com/api/productos/existencia/'
        ]);

        $dato = [
            'product' => $request->productoExistente,
            'cantidad' => $request->cantidadIngreso
        ]; 

        $response = $client->request('POST','add', [
            'form_params' => $dato
        ]);

        //return json_decode($response->getBody()->getContents(),true);
        
        return redirect('/lista-productos');
    }

    public function eliminarproducto(Request $request) {

        $client = new Client([
            'base_uri' => 'https://backendmarket.herokuapp.com/api/productos/existencia/'
        ]);

        $dato = [
            'product' => $request->nombre,
            'cantidad' => $request->cantidad
        ]; 

        $response = $client->request('POST','del', [
            'form_params' => $dato
        ]);
        
        return redirect('/lista-productos');
    }

    public function borrarempleado(Request $request) {

        $id = $request->idempleado;

        $client = new Client([
            'base_uri' => 'https://backendmarket.herokuapp.com/'
        ]);

        $response = $client->delete('https://backendmarket.herokuapp.com/api/empleados/'.$id);
    
        //return json_decode($response->getBody()->getContents(),true);

        return redirect('/lista-empleados');
    }
}