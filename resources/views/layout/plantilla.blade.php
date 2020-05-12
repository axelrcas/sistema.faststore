<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">

    @yield("herramientas_del_head")
    
    <link rel="stylesheet" href="{{asset('css-local/iconos-menu.css')}}">
    <link rel="stylesheet" href="{{asset('css-local/estilo_menu.css')}}">

    <link rel="icon" type="image/png" href="{{asset('img/cuaderno.png')}}"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Baloo+2&display=swap" rel="stylesheet"> 
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <?php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    ?>

  </head>
  <body class="no-seleccionable">

  <div id="fondo-principal">  
  <div class="hero-content">
    <header style="background-color: rgba(45, 0,0, 1);">
      <div class="menu_bar">
        <a href="#" class="bt-menu"><span class="icon-menu"></span>Opciones</a>
      </div>
  
      <nav>
        <ul>
          <li><a href="/home"><span class="icon-home3"></span>Dashboard</a></li>

            <li><a href="/grados"><span class="icon-lock"></span>Administrativo</a></li>
            <li><a href="/grados"><span class="icon-briefcase"></span>Empleados</a></li>
            <li><a href="/grado-guia"><span class="icon-users"></span>Clientes</a></li>
            <li><a href="/verificacion"><span class="icon-shopping-bag"></span>Productos</a></li>

          
          <a href="/cerrar" class="cerrar" title="Cerrar Sesión"><span class="espacio icon-switch"></span>{{Session::get('nombre_general')}} {{Session::get('apellido_general')}}</a>
        </ul>
      </nav>
    </header>


    <div class="contenedor">
      @yield("contenido")
    </div>

    </div>
    </div>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- Java Script
    ================================================== -->
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script>
$(document).ready(main);
 
var contador = 1;
 
function main(){
	$('.menu_bar').click(function(){
		// $('nav').toggle(); 
 
		if(contador == 1){
			$('nav').animate({
				left: '0'
			});
			contador = 0;
		} else {
			contador = 1;
			$('nav').animate({
				left: '-100%'
			});
		}
 
	});
 
};
    
    </script>


  </body>
</html>