@extends("layout.plantilla")

@section("herramientas_del_head")
    
    <title>Principal</title>
    <link rel="stylesheet" href="{{asset('css-local/estilo_home.css')}}">

@endsection

@section("contenido")

    <div class="conten">
        
        <div class="barra_superior">
            <img src="{{asset('img/logo.png')}}">
            <span>Sistema FastStore</span>
        </div>




        <h1 class="titulo" onclick="mostrarPreprimaria();">Nivel Preprimario</h1>

        <div class="carpeta">
            
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
                </div><div class="tarjeta">
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

        </div>
    
    </div>

@endsection