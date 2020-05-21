@extends("layout.plantilla")

@section("herramientas_del_head")
    
    <title>Productos</title>
    <link rel="stylesheet" href="{{asset('css-local/estilo_home.css')}}">
        
@endsection

@section("contenido")

    <div class="conten">
        
        <div class="barra_superior">
            <img src="{{asset('img/logo.png')}}">
            <span>Sistema FastStore</span>
        </div>

        <span style="visibility:hidden;"> {{ $total = count($data) }} </span>

        <div class="container">

            <a href="" class="btn btn-info btn-sm" style="width:20%;">Crear Categoria</a>

        </div>

        <h1 style="float:left; margin-left:2.5%; margin-top:1.5%;">Productos</h1>

        <div style="margin:1.5%; margin-right: 2%;"> 
        <a href="/info-producto" class="btn btn-success" style="float:right;">Nuevo</a>
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar Producto" aria-label="Search" name="dato"
                style="width:20%; float:right;" oninput="obtener(this.value)"> </div>
        <br><br><br>

        <div class="mitabla" style="border-style:solid; border-color:#586995;">
        <table class="table table-bordered" id="resultado">
            <thead style="background-color:#586995; color:white;">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Código</th>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Costo</th>
                <th scope="col">Marca</th>
                <th scope="col">Existencia</th>
                </tr>
            </thead>
                @foreach ($data as $dato)
                <tbody >
                    <td>1</th>
                    <td>{{ $dato['Id_Producto'] }}</td>
                    <td>{{ $dato['NombreProducto'] }}</td>
                    <td>Q {{ number_format(intval($dato['Precio']), 2, '.', ',') }}</td>
                    <td>Q {{ number_format(intval($dato['Costo']), 2, '.', ',') }}</td>
                    <td>{{ $dato['MarcaProducto'] }}</td>
                    <td>{{ $dato['ExistenciaProducto']}}</td>
                    <td style="width:22vh;"> 
                        <a href="" class="btn btn-success" style="width:9vh;">Editar</a> 
                        <a href="" class="btn btn-danger" style="width:9vh;">Borrar</a> 
                    </td>
                </tbody>
                @endforeach        
        </table>
        </div>
        <br>

    </div>

    <script>

function obtener(variable) {

    console.log(variable);
    
    if (variable.length == 0) {
        
            var resultado = document.getElementById('resultado');
            resultado.innerHTML = '';

            resultado.innerHTML = `
            <thead style="background-color:#586995; color:white;">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Código</th>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Costo</th>
                <th scope="col">Marca</th>
                <th scope="col">Existencia</th>
                </tr>
            </thead>
                @foreach ($data as $dato)
                <tbody >
                    <td>1</th>
                    <td>{{ $dato['Id_Producto'] }}</td>
                    <td>{{ $dato['NombreProducto'] }}</td>
                    <td>{{ $dato['Precio'] }}</td>
                    <td>{{ $dato['Costo'] }}</td>
                    <td>{{ $dato['MarcaProducto'] }}</td>
                    <td>{{ $dato['ExistenciaProducto']}}</td>
                    <td style="width:22vh;"> 
                        <a href="" class="btn btn-success" style="width:9vh;">Editar</a> 
                        <a href="" class="btn btn-danger" style="width:9vh;">Borrar</a> 
                    </td>
                </tbody>
                @endforeach  
            `;
    }else{
        fetch('https://backendmarket.herokuapp.com/api/productos/'+variable)
        .then(datos=>datos.json())
        .then(datos=>{
            var resultado = document.getElementById('resultado');
            resultado.innerHTML = '';

            resultado.innerHTML = `
                <thead style="background-color:#586995; color:white;">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Código</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Existencia</th>
                    </tr>
                </thead>
            `;

            for (let dato of datos) {
                resultado.innerHTML += `
                        <tbody>
                                    <td>1</th>
                                    <td>${dato.Id_Producto}</th>
                                    <td>${dato.NombreProducto}</td>
                                    <td>${dato.Precio}</td>
                                    <td>${dato.Costo}</td>
                                    <td>${dato.MarcaProducto}</td>
                                    <td>${dato.ExistenciaProducto}</td>
                                    <td style="width:22vh;"> 
                                        <a href="" class="btn btn-success" style="width:9vh;">Editar</a> 
                                        <a href="" class="btn btn-danger" style="width:9vh;">Borrar</a> 
                                    </td>
                        </tbody> 
                `;
            }
        })
    }
}
    </script>



@endsection