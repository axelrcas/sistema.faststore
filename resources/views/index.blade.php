<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="{{asset('css-local/main.css')}}">
    <link rel="icon" type="image/png" href="{{asset('img/cuaderno.png')}}"/>
    <link rel="stylesheet" href="{{asset('css-local/iconos.css')}}">
    <link rel="stylesheet" href="{{asset('css-local/estilos.css')}}">
    <!-- GOOGLE FONTs -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <!-- BOOSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    
    <?php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    ?>
  </head>
<body style="background:#222222; color:#ffffff; font-family: 'Quicksand', sans-serif;">

    <div class="content">
<br>
        <center>
            <img src="{{asset('img/cbplogo.png')}}" width="150px"> <br>
            <b><span style="font-size: 2.5em; ">Consolidados</span></b>
        </center> <br>

        <div class="contact-wrapper animated bounceInUp" >
            <div class="contact-form">
                <center><h2>Inicio de Sesión para Docentes</h2></center>
                <form action="{{url('/iniciar')}}" method="post">
                    {{csrf_field()}}
                    <p class="block">
                        <label>Usuario</label>
                        <input type="text" name="usuario" placeholder="Ingresa tu usuario de docente" required>
                    </p>
                    <p class="block">
                        <label>Contraseña</label>
                        <input type="password" name="contrasenia" placeholder="Ingresa tu contraseña" required>
                    </p>
                    <p class="block" style="background:none; border:none;">
                        <button class="btn btn-danger btn-block" style="width:50%; font-size:80%; float:right;">Iniciar Sesión</button>
                    </p>
                </form>
                @if (Session::get('error_sesion') == "true")
                    <center><span style="color:yellow;"><b>Usuario y/o contraseña incorrecta</b></span></center>
                    {{Session::forget('error_sesion')}}
                @endif
            </div>
        </div>
    </div> 

    <center> 
    <div class="contenedor-footer">
        <a href="https://www.cbp.edu.gt" style="color: red; text-decoration: none;">
          <b>CBP</b>
        </a> 
        &copy; 2020 by. Axel Castillo</p>  

        <a style="text-decoration:none;" href="https://cbp.edu.gt/"><span class="icon-earth enlaces-s"> Website</span></a> 
        <a style="text-decoration:none;" href="https://www.facebook.com/ColegioBlaisePascal/"><span class="icon-facebook enlaces-s"> Facebook</span></a> 
        <a style="text-decoration:none;" href="https://twitter.com/ColegioBlaise"><span class="icon-twitter enlaces-s"> Twitter</span></a> 
        <a style="text-decoration:none;" href="https://www.instagram.com/colegio_blaisepascal/"><span class="icon-instagram enlaces-s"> Instagram</span></a>
        <br> <br> 
    </div>
    </center>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

</body>
</html>
