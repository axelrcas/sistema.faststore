<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">

    @yield("herramientas_del_head")
    
    <link rel="stylesheet" href="{{asset('css-local/iconos-menu.css')}}">
    <link rel="stylesheet" href="{{asset('css-local/estilo_menu.css')}}">

    <link rel="icon" type="image/png" href="{{asset('img/logo.png')}}"/>
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

    <div id="fondo-principal2"></div>

    <div class="hero-content">
      <header style="background-color: rgba(45, 0,0, 1);">
        <div class="menu_bar">
          <a href="#" class="bt-menu"><span class="icon-menu"></span>Opciones</a>
        </div>
  
        <nav>
          <ul>

          <div class="menu_bar">
            <a href="#" class="bt-menu" style="float:right;"><span class="icon-menu rotar"></span></a>
          </div>

          <a href="/cerrar" class="cerrar" title="Cerrar Sesión"><span class="espacio icon-switch"></span><br>{{Session::get('nombre_general')}} {{Session::get('apellido_general')}} <br> 
                <span style="font-size:15px;">Cerrar Sesión</span>
          </a>
          

            <li><a href="/home"><span class="icon-home3"></span>Dashboard</a></li>

              <li><a href="/administrativo"><span class="icon-lock"></span>Proveedores</a></li>
              <li><a href="/empleados"><span class="icon-briefcase"></span>Empleados</a></li>
              <li><a href="/clientes"><span class="icon-users"></span>Clientes</a></li>
              <li><a href="/productos"><span class="icon-shopping-bag"></span>Productos</a></li>

            
            </ul>
        </nav>
      </header>


      <div class="contenedor">
        @yield("contenido")
      </div>

    </div>

    <div class="footer">
      <div class="der">&copy Desarrollado por:  Masters Developers</div>
    </div>

    
    <!-- Java Script
    ================================================== -->
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    
    <!-- ANIMACION BARRA RESPINSIVE -->
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


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  </body>
</html>