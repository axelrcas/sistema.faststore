<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Personaje;

class MisControladores extends Controller
{
    public function ver_usuarios (Request $request)
    {
        /* if ($request->isJson()) 
        { */
            $users = Usuario::all();

            return response()->json($users, 200);
       /*  }
        
        return response()->json(['error'=>'No Autorizado'], 401, []); */
    }
    
    public function crear_usuario(Request $request) 
    {
        if ($request->isJson()) 
        {
            $dato = $request->json()->all();

            $correo = Usuario::where('correo', "=", $request->correo)->first();
            $usuario = Usuario::where('usuario', "=", $request->usuario)->first();


            if ($correo != null || $usuario != null) {
                return response()->json(['error'=>'Correo o Usuario Duplicado'], 401, []);
            } else {
               
                $user = Usuario::create([
                    'correo' => $dato['correo'],
                    'usuario' => $dato['usuario'],
                    'nombre' => $dato['nombre'],
                    'apellido' => $dato['apellido'],
                    'contrasenia' => $dato['contrasenia']
                ]);

                return response()->json($user, 201); 
            }
        } 
        
        return response()->json(['error'=>'No Autorizado'], 401, []); 
    }

    public function inicio_sesion(Request $request)
    {
        /* if ($request->isJson()) 
        { */
            $dato = $request->json()->all();

            //return $dato['contrasenia'];

            $correo = Usuario::where('correo',$dato['correo'])->first();

            //if ($correo && ($dato['contrasenia'] == $correo->contrasenia)) {
            if ($correo && ($dato['contrasenia'] == $correo->contrasenia)) {
                return response()->json($correo, 200);
            } else {
                return response()->json(['error'=>'Usuario NO encontrado'], 401, []);
            } 

        /* } 
        
        return response()->json(['error'=>'No Autorizado'], 401, []); */
    }

    public function ver_personaje (Request $request)
    {
        if ($request->isJson()) 
        {
            $users = Personaje::all();

            return response()->json($users, 200);
        }
        
        return response()->json(['error'=>'No Autorizado'], 401, []);
    }
}
