<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio de Sesión</title>
    <link href="https://fonts.googleapis.com/css?family=Baloo+2&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="{{asset('css-local/estilo_login.css')}}">
    <meta name="viewport" content="width=device-width, user-scalable=no">

    <?php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    ?>
</head>
<body>
    
    <div id="fondo-principal">
        <div class="hero-content">
            
            <div class="contact-wrapper animated bounceInUp" >
                <div class="contact-form">
                <center>
                <img src="{{asset('img/logo.png')}}" width="150px"> 
            </center>
                    <center><h2>Inicio de Sesión al Sistema</h2></center>
                    <form action="{{url('/iniciar')}}" method="post">
                        {{csrf_field()}}
                        <p class="block">
                            <label>Usuario</label>
                            <input type="text" name="usuario" placeholder="Ingresa tu usuario de acceso" autocomplete="off" required>
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
                        <center>
                            <span style="color: rgb(205, 50, 50); background: rgb(253, 238, 70); 
                                            padding-left: 15%; padding-right: 15%; border-radius: 10px">
                                <b>Usuario y/o contraseña incorrecta</b>
                            </span>
                        </center>
                        {{Session::forget('error_sesion')}}
                    @endif
                </div>
            </div> 
        </div>
    </div>

</body>
</html>