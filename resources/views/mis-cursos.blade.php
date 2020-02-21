@extends("layout.plantilla")

@section("herramientas_del_head")
    
    <title>Principal</title>
    
    <link rel="stylesheet" href="{{asset('css-local/portada-general.css')}}">
    <link rel="stylesheet" href="{{asset('css-local/home.css')}}">
@endsection

@section("contenido")

    <div id="HeroBanner2">
        <div class="hero-content2">
            <img src="{{asset('img/cbplogo.png')}}" class="logo-portada2">
            <h1>Cursos asignados</h1>
            <!-- <p><a href="" style="text-decoration:none;">Inicio</a> / Mis Cursos</p>
            <a href="#" class="hero-cta">Get Started</a> -->
        </div>
    </div>

    <div class="carpeta">
        <div class="contenedor">
    @foreach ($data as $dato)

    <div class="tarjeta">
        <a href="/grado-guia"> <button style="width:100%; height:100%; background:none; border:none; outline:none;">
            <h4><b>{{$dato->nivel}}</b></h4>
            <p></p>
        </button> </a>
    </div>
    @endforeach
</div>
</div>

@endsection