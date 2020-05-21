@extends("layout.plantilla")

@section("herramientas_del_head")
    
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('css-local/estilo_home.css')}}">

@endsection

@section("contenido")

    <div class="conten">
        
        <div class="barra_superior">
            <img src="{{asset('img/logo.png')}}">
            <span>Sistema FastStore</span>
        </div>

        <div class="carpeta">
            
            <div class="contenedor" id="mostrarPreprimaria">

                <div class="tarjeta">
                    <h4>Productos Registrados</h4>
                    <p><span class="icon-shopping-bag" style="padding-right:5%;"></span>{{Session::get('dash_empleados')}}</p>
                    <div class="precio">Registrados</div>
                </div>

                <div class="tarjeta">
                    <h4>Clientes Registrados</h4>
                    <p><span class="icon-users" style="padding-right:5%;"></span>{{Session::get('dash_clientes')}}</p>
                    <div class="precio">Registrados</div>
                </div>

                <div class="tarjeta">
                    <h4>Empleados Registrados</h4>
                    <p><span class="icon-briefcase" style="padding-right:5%;"></span>{{Session::get('dash_empleados')}}</p>
                    <div class="precio">Registrados</div>
                </div>

                <div class="tarjeta">
                    <h4>Proveedores Registrados</h4>
                    <p><span class="icon-lock" style="padding-right:5%;"></span>{{Session::get('dash_proveedores')}}</p>
                    <div class="precio">Registrados</div>
                </div>
               
            </div>

        </div>
    
    </div>

@endsection