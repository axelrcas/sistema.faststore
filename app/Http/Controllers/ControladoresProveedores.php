<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* Adjuntadas adicionalmente para el consumo del API */
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
use Image;

class ControladoresProveedores extends Controller
{
    public function proveedores() {

        $client = new Client([
            'base_uri' => 'http://backendmarket.herokuapp.com/api/productos/obteniendo/'
        ]);

        $response = $client->request('GET','proveedores');

        $array = json_decode($response->getBody()->getContents(),true);

        $data = $array['res'];

        return view('administrador', compact('data'));/* , compact('data2')); */
    }

    public function crearproveedor(Request $request) {

        $client = new Client([
            'base_uri' => 'https://backendmarket.herokuapp.com/api/productos/'
        ]);

        $dato = [
            'name' => $request->nombre,
            'secname' => $request->apellido,
            'correo' => $request->correo,
            'tel' => $request->telefono,
            'nit' => $request->nit
        ]; 

        $response = $client->request('POST','proveedor', [
            'form_params' => $dato
        ]);

        return redirect('/lista-proveedores');
        //return json_decode($response->getBody()->getContents(),true);

    }

    public function borrarproveedor(Request $request) {

        $id = $request->idproveedor;

        $client = new Client([
            'base_uri' => 'https://backendmarket.herokuapp.com/api/productos/proveedores/'
        ]);

        $response = $client->delete('https://backendmarket.herokuapp.com/api/productos/proveedores/'.$id);
    
        return redirect('/lista-proveedores');
    }
}