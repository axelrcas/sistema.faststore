<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* Adjuntadas adicionalmente para el consumo del API */
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;

class ControladoresProductos extends Controller
{
    public function productos() {

        $client = new Client([
            'base_uri' => 'http://backendmarket.herokuapp.com/api/'
        ]);

        $response = $client->request('GET','productos');

        $array = json_decode($response->getBody()->getContents(),true);

        $data = $array['res'];

        return view('productos', compact('data'));
    }

    public function crearproducto(Request $request) {

        $nuevonombre = str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789".uniqid());


        $file = $request->file('img');
        $nombre = $file->getClientOriginalName();
        $file->move(public_path('img/'),$nuevonombre.".png");

        return $nombre;

        /* $client = new Client([
            'base_uri' => 'https://backendmarket.herokuapp.com/api/'
        ]);

        $dato = [
            'idemp' => $request->session()->get('id_general'),
            'idcat' => $request->idcat,
            'img' => $request->img,
            'producto' => $request->producto,
            'precio' => $request->precio,
            'costo' => $request->costo,
            'marca' => $request->marca,
            'descripcion' => $request->descripcion,
            'cantidad' => $request->cantidad,
            'vencidos' => $request->vencidos,
            'presentacion' => $request->presentacion,
            'unidadMedida' => $request->unidadMedida
        ]; 

        $response = $client->request('POST','productos', [
            'form_params' => $dato
        ]);

        return json_decode($response->getBody()->getContents(),true); */

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
}