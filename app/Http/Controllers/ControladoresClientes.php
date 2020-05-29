<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* Adjuntadas adicionalmente para el consumo del API */
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
use Image;

class ControladoresClientes extends Controller
{
    public function clientes() {

        $client = new Client([
            'base_uri' => 'http://backendmarket.herokuapp.com/api/'
        ]);

        $response = $client->request('GET','clientes');

        $array = json_decode($response->getBody()->getContents(),true);

        $data = $array['res'];

        $client = new Client([
            'base_uri' => 'https://backendmarket.herokuapp.com/api/clientes/'
        ]);

        $response = $client->request('GET','tipos');

        $array2 = json_decode($response->getBody()->getContents(),true);

        $data2 = $array2['res'];

        return view('clientes', compact('data'), compact('data2'));
    }

    public function crearcliente(Request $request) {

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
            'nit' => $request->nit
        ]; 

        sleep(2);

        $response = $client->request('POST','clientes', [
            'form_params' => $dato
        ]);

        return redirect('/lista-clientes');
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

    public function creartipocliente(Request $request) {
      

        $client = new Client([
            'base_uri' => 'https://backendmarket.herokuapp.com/api/clientes/'
        ]);

        $dato = [
            'tipo' => $request->nuevatipo
        ]; 

        $response = $client->request('POST','tipo', [
            'form_params' => $dato
        ]);

        return redirect('/lista-clientes');
        // json_decode($response->getBody()->getContents(),true);
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

    public function borrarcliente(Request $request) {

        $id = $request->idcliente;

        $client = new Client([
            'base_uri' => 'https://backendmarket.herokuapp.com/'
        ]);

        $response = $client->delete('https://backendmarket.herokuapp.com/api/clientes/'.$id);
    
        //return json_decode($response->getBody()->getContents(),true);

        return redirect('/lista-clientes');
    }
}