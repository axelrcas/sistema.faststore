<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    @yield("herramientas_del_head")
    <link rel="stylesheet" href="{{asset('css-local/estilos.css')}}">
    <link rel="stylesheet" href="{{asset('css-local/iconos.css')}}">
    <link rel="icon" type="image/png" href="{{asset('img/logo.png')}}"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <?php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    ?>

  </head>
  <body style="background-color: #222222; color:white;">

    <header style="background-color: #222222;">
      <div class="menu_bar">
        <a href="#" class="bt-menu"><span class="icon-th-menu"></span><img src="{{asset('img/cbplogo2.png')}}" width="20%"> Consolidados</a>
      </div>
  
      <nav>
        <ul>
          <li><a href="/home"><span class="icon-home3"></span>Inicio</a></li>
          @if (Session::get('cargo_general') != "administrativo")
            <li><a href="/get-mis-cursos/{{Session::get('usuario_general')}}"><span class="icon-notebook"></span>Mis Cursos</a></li>
          @endif
          @if (Session::get('gradoguia_general'))
            <li><a href="/grado-guia"><span class="icon-key"></span>Grado Guía</a></li>
          @endif
          @if (Session::get('cargo_general') == "administrativo" || Session::get('cargo_general') == "developer")
            <li><a href="/verificacion"><span class="icon-user-tie"></span>Verificación</a></li>
          @endif
          <a href="/cerrar" class="cerrar btn btn-outline-danger" >Cerrar Sesión</a>
        </ul>
      </nav>
    </header>

      @yield("contenido")

    <center> 
    <div class="contenedor-footer">
        <br>
        <a href="https://www.cbp.edu.gt" style="color: red; text-decoration: none;">
          <b>CBP</b>
        </a> 
        &copy; 2020 by. Axel Castillo</p>

        <a style="text-decoration:none;" href="https://cbp.edu.gt/" target="_blank"><span class="icon-earth enlaces-s"> Website</span></a> 
        <a style="text-decoration:none;" href="https://www.facebook.com/ColegioBlaisePascal/" target="_blank"><span class="icon-facebook enlaces-s"> Facebook</span></a> 
        <a style="text-decoration:none;" href="https://twitter.com/ColegioBlaise" target="_blank"><span class="icon-twitter enlaces-s"> Twitter</span></a> 
        <a style="text-decoration:none;" href="https://www.instagram.com/colegio_blaisepascal/" target="_blank"><span class="icon-instagram enlaces-s"> Instagram</span></a>
        <br> <br> <br>
    </div>
    </center>

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