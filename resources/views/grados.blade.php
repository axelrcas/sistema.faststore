@extends("layout.plantilla")

@section("herramientas_del_head")
    
    <title>Grados</title>
    
    <link rel="stylesheet" href="{{asset('css-local/portada-general.css')}}">
    <link rel="stylesheet" href="{{asset('css-local/home-grados.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet"> 

@endsection

@section("contenido")

    <div id="HeroBanner2">
        <div class="hero-content2">
            <img src="{{asset('img/cbplogo.png')}}" class="logo-portada2">
            <h1>Grados</h1>
            <!-- <p><a href="" style="text-decoration:none;">Inicio</a> / Mis Cursos</p>
            <a href="#" class="hero-cta">Get Started</a> -->
        </div>
    </div>

    <div class="carpeta">

        <h1 class="titulo" onclick="mostrarPreprimaria();">Nivel Preprimario</h1>

        <div class="contenedor" id="mostrarPreprimaria">

            <div class="tarjeta">
                <a href="/grado-guia"> <button style="width:100%; height:100%; background:none; border:none; outline:none;">
                    <img src="{{asset('img/paneles.png')}}">
                    <h4><b>Kinder</b></h4>
                    <p>Nivel Preprimario</p>
                </button> </a>
            </div>

            <div class="tarjeta">
                <a href="/grado-guia"> <button style="width:100%; height:100%; background:none; border:none; outline:none;">
                    <img src="{{asset('img/paneles.png')}}">
                    <h4><b>Párvulos</b></h4>
                    <p>Nivel Preprimario</p>
                </button> </a>
            </div>

            <div class="tarjeta">
                <a href="/grado-guia"> <button style="width:100%; height:100%; background:none; border:none; outline:none;">
                    <img src="{{asset('img/paneles.png')}}">
                    <h4><b>Preparatoria</b></h4>
                    <p>Nivel Preprimario</p>
                </button> </a>
            </div>
        </div>

        <h1 class="titulo" onclick="mostrarPrimaria();">Nivel Primario</h1>

        <div class="contenedor" id="mostrarPrimaria">

            <div class="tarjeta">
                <a href="/grado-guia"> <button style="width:100%; height:100%; background:none; border:none; outline:none;">
                    <img src="{{asset('img/paneles.png')}}">
                    <h4><b>Primer Grado</b></h4>
                    <p>Nivel Primario</p>
                </button> </a>
            </div>

            <div class="tarjeta">
                <a href="/grado-guia"> <button style="width:100%; height:100%; background:none; border:none; outline:none;">
                    <img src="{{asset('img/paneles.png')}}">
                    <h4><b>Segundo Grado</b></h4>
                    <p>Nivel Primario</p>
                </button> </a>
            </div>

            <div class="tarjeta">
                <a href="/grado-guia"> <button style="width:100%; height:100%; background:none; border:none; outline:none;">
                    <img src="{{asset('img/paneles.png')}}">
                    <h4><b>Tercer Grado</b></h4>
                    <p>Nivel Primario</p>
                </button> </a>
            </div>

            <div class="tarjeta">
                <a href="/grado-guia"> <button style="width:100%; height:100%; background:none; border:none; outline:none;">
                    <img src="{{asset('img/paneles.png')}}">
                    <h4><b>Cuarto Grado</b></h4>
                    <p>Nivel Primario</p>
                </button> </a>
            </div>

            <div class="tarjeta">
                <a href="/grado-guia"> <button style="width:100%; height:100%; background:none; border:none; outline:none;">
                    <img src="{{asset('img/paneles.png')}}">
                    <h4><b>Quinto Grado</b></h4>
                    <p>Nivel Primario</p>
                </button> </a>
            </div>

            <div class="tarjeta">
                <a href="/grado-guia"> <button style="width:100%; height:100%; background:none; border:none; outline:none;">
                    <img src="{{asset('img/paneles.png')}}">
                    <h4><b>Sexto Grado</b></h4>
                    <p>Nivel Primario</p>
                </button> </a>
            </div>

        </div>

        <h1 class="titulo" onclick="mostrarBasico();">Nivel Básico</h1>

        <div class="contenedor" id="mostrarBasico">

            <div class="tarjeta">
                <a href="https://docs.google.com/document/d/1T-EQFwj2qZBhdM4vwYQKUn7fxWCrgbGZ3k4to79PRw0/edit"> <button style="width:100%; height:100%; background:none; border:none; outline:none;">
                    <img src="{{asset('img/paneles.png')}}">
                    <h4><b>Primer Grado</b></h4>
                    <p>Nivel Básico</p>
                </button> </a>
            </div>

            <div class="tarjeta">
                <a href="https://docs.google.com/document/d/1EVG8tkttwZzPuofupi9VxpOIhcAmWKdpPMZZb0tJvDs/edit"> <button style="width:100%; height:100%; background:none; border:none; outline:none;">
                    <img src="{{asset('img/paneles.png')}}">
                    <h4><b>Segundo Grado</b></h4>
                    <p>Nivel Básico</p>
                </button> </a>
            </div>

            <div class="tarjeta">
                <a href="https://docs.google.com/document/d/1wwfgNLqxeRgfc4wAiAsxiVL9SA750omPZkDDx6bxYZk/edit"> <button style="width:100%; height:100%; background:none; border:none; outline:none;">
                    <img src="{{asset('img/paneles.png')}}">
                    <h4><b>Tercer Grado</b></h4>
                    <p>Nivel Básico</p>
                </button> </a>
            </div>
        </div>

        <h1 class="titulo" onclick="mostrarDiversificado();">Nivel Diversificado</h1>

        <div class="contenedor" id="mostrarDiversificado">

            <div class="tarjeta">
                <a href="https://docs.google.com/document/d/1zhW5qtkNt7cgftPVlMMUN4dnx9mOojjAfxCW7gKXLQQ/edit"> <button style="width:100%; height:100%; background:none; border:none; outline:none;">
                    <img src="{{asset('img/paneles.png')}}">
                    <h4><b>Cuarto Grado</b></h4>
                    <p>Bach. en Computación</p>
                </button> </a>
            </div>

            <div class="tarjeta">
                <a href="https://docs.google.com/document/d/1HiLl7g_xIRXVdby7cQVd-dl0iPRF3NeATIJArhk_4jA/edit"> <button style="width:100%; height:100%; background:none; border:none; outline:none;">
                    <img src="{{asset('img/paneles.png')}}">
                    <h4><b>Quinto Grado</b></h4>
                    <p>Bach. en Computación</p>
                </button> </a>
            </div>

            <div class="tarjeta">
                <a href="https://docs.google.com/document/d/1O7rvOAMKVe8Heh0tqPwXfFipaxScgvqVFWwjVraWLDE/edit"> <button style="width:100%; height:100%; background:none; border:none; outline:none;">
                    <img src="{{asset('img/paneles.png')}}">
                    <h4><b>Cuarto Grado</b></h4>
                    <p>Bach. en Ciencia Biológicas Sección "A"</p>
                </button> </a>
            </div>

            <div class="tarjeta">
                <a href="https://docs.google.com/document/d/1g1LtleSRU5T5zbjO93GdhUhiS6-3fOHsKDktXOxVT0M/edit"> <button style="width:100%; height:100%; background:none; border:none; outline:none;">
                    <img src="{{asset('img/paneles.png')}}">
                    <h4><b>Cuarto Grado</b></h4>
                    <p>Bach. en Ciencia Biológicas Sección "B"</p>
                </button> </a>
            </div>

            <div class="tarjeta">
                <a href="https://docs.google.com/document/d/1ss8bbJOcHcnR3yrmNcuUwqxQn8Ezs5eUGIi49yB9UPE/edit#"> <button style="width:100%; height:100%; background:none; border:none; outline:none;">
                    <img src="{{asset('img/paneles.png')}}">
                    <h4><b>Quinto Grado</b></h4>
                    <p>Bach. en Ciencias y Letras Sección "A"</p>
                </button> </a>
            </div>

            <div class="tarjeta">
                <a href="https://docs.google.com/document/d/1upyj3ldkVtro0UU9MxgJCWFbJg19vdU8zwCmXyx8dyA/edit#"> <button style="width:100%; height:100%; background:none; border:none; outline:none;">
                    <img src="{{asset('img/paneles.png')}}">
                    <h4><b>Quinto Grado</b></h4>
                    <p>Bach. en Ciencias y Letras Sección "B"</p>
                </button> </a>
            </div>

        </div>

        
    </div>



@endsection

