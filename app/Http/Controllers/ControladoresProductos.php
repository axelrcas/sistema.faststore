<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* Adjuntadas adicionalmente para el consumo del API */
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
use Image;

class ControladoresProductos extends Controller
{
    public function productos() {

        $client = new Client([
            'base_uri' => 'http://backendmarket.herokuapp.com/api/'
        ]);

        $response = $client->request('GET','productos');

        $array = json_decode($response->getBody()->getContents(),true);

        $data = $array['res'];

        $client = new Client([
            'base_uri' => 'http://backendmarket.herokuapp.com/api/productos/'
        ]);

        $response = $client->request('GET','cat');

        $array2 = json_decode($response->getBody()->getContents(),true);

        $data2 = $array2['res'];

        return view('productos', compact('data'), compact('data2'));
    }

    public function crearproducto(Request $request) {

        $tempname = str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789".uniqid());
        $nuevonombre = $tempname.".png";
        $ruta = public_path('img/productos'); 
        $imagenOriginal = $request->file('imagen');
        $imagenOriginal->move($ruta,$nuevonombre); 

        $client = new Client([
            'base_uri' => 'https://backendmarket.herokuapp.com/api/productos/'
        ]);

        $dato = [
            'idemp' => $request->session()->get('id_general'),
            'idcat' => $request->idcat,
            'token' => $nuevonombre,
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

        sleep(2);

        $response = $client->request('POST','token', [
            'form_params' => $dato
        ]);

        return redirect('/home');
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

    public function crearcategoria(Request $request) {
        
        $client = new Client([
            'base_uri' => 'https://backendmarket.herokuapp.com/api/productos/'
        ]);

        $dato = [
            'categoria' => $request->nuevacategoria
        ]; 

        $response = $client->request('POST','cat', [
            'form_params' => $dato
        ]);

        return redirect('/lista-productos');
        // json_decode($response->getBody()->getContents(),true);
    }

    public function eliminarcategoria(Request $request) {

        $id = $request->idcat;

        $client = new Client([
            'base_uri' => 'https://backendmarket.herokuapp.com/api/productos/delete/categoria/'
        ]);

        $response = $client->delete('https://backendmarket.herokuapp.com/api/productos/delete/categoria/'.$id);
    
        //return json_decode($response->getBody()->getContents(),true);

        return redirect('/lista-productos');
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

    public function borrarproducto(Request $request) {

        $id = $request->idproducto;

        $client = new Client([
            'base_uri' => 'https://backendmarket.herokuapp.com/'
        ]);

        $response = $client->delete('https://backendmarket.herokuapp.com/api/productos/delete/'.$id);
    
        //return json_decode($response->getBody()->getContents(),true);

        return redirect('/lista-productos');
    }
}