@extends("layout.plantilla")

@section("herramientas_del_head")
    
    <title>Principal</title>
    
    <link rel="stylesheet" href="{{asset('css-local/home.css')}}">

@endsection

@section("contenido")

    <div id="HeroBanner">
        <div class="hero-content">
            <img src="{{asset('img/cbplogo.png')}}" class="logo-portada">
            <h1>Bienvenido <br> {{Session::get('nombre_general')}} {{Session::get('apellido_general')}}</h1>
            <p>Consolidados Bimestrales</p>
            <!-- <a href="#" class="hero-cta">Get Started</a> -->
        </div>
    </div>

    <div class="carpeta">
      <h1 class="titulo">Opciones del Sistema</h1>

        <div class="contenedor">
            
            @if (Session::get('cargo_general') != "administrativo")
                <div class="tarjeta">
                    <a href="/get-mis-cursos/{{Session::get('usuario_general')}}"> <button style="width:100%; height:100%; background:none; border:none; outline:none;">
                        <img src="{{asset('img/cuaderno.png')}}">
                        <h4><b>Mis Cursos</b></h4>
                        <p>Cursos asignados para el docente</p>
                    </button> </a>
                </div>
            @endif
            @if (Session::get('gradoguia_general'))
                <div class="tarjeta">
                    <a href="/grado-guia"> <button style="width:100%; height:100%; background:none; border:none; outline:none;">
                        <img src="{{asset('img/paneles.png')}}">
                        <h4><b>Grado Asignado</b></h4>
                        <p>Consolidado de grado asignado</p>
                    </button> </a>
                </div>
            @endif 
            @if (Session::get('cargo_general') == "administrativo" || Session::get('cargo_general') == "developer")
                <div class="tarjeta">
                    <a href="/verificacion"> <button style="width:100%; height:100%; background:none; border:none; outline:none;">
                        <img src="{{asset('img/admin.png')}}">
                        <h4><b>Verificación</b></h4>
                        <p>Acceso a todos los consolidados</p>
                    </button> </a>
                </div>
            @endif            
        </div>
    </div>

@endsection