<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* Adjuntadas adicionalmente para el consumo del API */
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
use Image;

class ControladoresVentas extends Controller
{
    public function ventas() {

        $client = new Client([
            'base_uri' => 'http://backendmarket.herokuapp.com/api/'
        ]);

        $response = $client->request('GET','productos');

        $array = json_decode($response->getBody()->getContents(),true);

        $data = $array['res'];

        $client = new Client([
            'base_uri' => 'http://backendmarket.herokuapp.com/api/'
        ]);

        $response = $client->request('GET','clientes');

        $array2 = json_decode($response->getBody()->getContents(),true);

        $data2 = $array2['res'];

        return view('ventas', compact('data'), compact('data2'));
    }

    public function insertarventas(Request $request) {

        $client = new Client([
            'base_uri' => 'http://backendmarket.herokuapp.com/api/'
        ]);

        $response = $client->request('GET','productos');

        $array = json_decode($response->getBody()->getContents(),true);

        $producto = $array['res'];
        
        foreach ($producto as $prod) {
            if ($prod['Id_Producto'] == $request->producto){
                $precio = $prod['Precio'];
            }
        }

        $total = $precio * $request->cantidad;


        $client = new Client([
            'base_uri' => 'https://backendmarket.herokuapp.com/api/'
        ]);

        $detalletventa = [
            'id_producto' => intval($request->producto),
            'cantidad' => intval($request->cantidad),
            'precio_u' => $precio,
            'total_detalle' => $total
        ];

        $dato = [
            'id_cliente' => intval($request->cliente),
            'credito' => intval($request->credito),
            'productos_vendidos' => intval($request->cantidad),
            'total' => $total,
            'id_factura' => intval($request->idfactura),
            'serie_factura' => intval($request->seriefactura),
            'detalleVenta' => [$detalletventa, $detalletventa, $detalletventa]
        ]; 

        return $dato;
        
        $response = $client->request('POST','ventas', [
            'form_params' => $dato
        ]);

        return json_decode($response->getBody()->getContents(),true);
        return redirect('/insertar-venta');
        

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