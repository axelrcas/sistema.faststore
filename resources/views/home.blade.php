@extends("layout.plantilla")

@section("herramientas_del_head")
    
    <title>Principal</title>
    

@endsection

@section("contenido")

    <div class="contenedor"><p>Bienvenido {{Session::get('nombre_general')}} {{Session::get('apellido_general')}}</p></div>

@endsection