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
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalCrearCategoria" style="width:20%;">
            Crear Categoría
            </button>   

            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminarCategoria" style="width:20%;">
            Eliminar Categoría
            </button> 

            
        </div>

        <!-- Modal crear Categoria -->
        <div class="modal fade" id="modalCrearCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Categoría</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('/crear-categoria')}}" method="POST">
                    {{csrf_field()}}
                <div class="modal-body">
                    <input type="text" class="inputFormu form-control mr-sm-2" name="nuevacategoria" placeholder="Nombre de la Nueva Categoría" autocomplete="off" required>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-success" value="Crear Categoría">
                </div>
                </form>
                </div>
            </div>
        </div>

        <!-- Modal Eliminar Categoria -->
        <div class="modal fade" id="modalEliminarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Categoría</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/eliminar-categoria" method="POST">
                    {{csrf_field()}}
                    @method('DELETE')
                <div class="modal-body">
                            <select class="custom-select d-block w-100" id="country" name="idcat" required onclick="categoria()">
                                @foreach ($data2 as $dato)
                                    <option value="{{ $dato['Id_CategoriaProducto'] }}">{{ $dato['NombreCategoria'] }}</option>
                                @endforeach
                            </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-danger" value="Eliminar Categoría">
                </div>
                </form>
                </div>
            </div>
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
                <span style="display:none;">{{ $contador = 1 }}</span>
                @foreach ($data as $dato)
                <form action="/borrar-producto" method="POST">
                {{csrf_field()}}
                    @method('DELETE')
                <tbody>
                    <td>{{ $contador++ }}</th>
                    <td>
                        {{ $dato['Id_Producto'] }}
                        <input type="text" style="display:none;" name="idproducto" value="{{ $dato['Id_Producto'] }}">
                    </td>
                    <td>
                        {{ $dato['NombreProducto'] }}
                    </td>
                    <td>Q {{ number_format(intval($dato['Precio']), 2, '.', ',') }}</td>
                    <td>Q {{ number_format(intval($dato['Costo']), 2, '.', ',') }}</td>
                    <td>{{ $dato['MarcaProducto'] }}</td>
                    <td> {{ $dato['ExistenciaProducto']}} </td>
                    <td> <img width="50px" src="{{ asset('img/productos/'.$dato['Imagen']) }}" alt=""> </td>
                    <td style="width:9vh;"> <input type="submit" class="btn btn-danger btn-sm" value="Borrar Producto"> </td>    
                </tbody>
                </form>
                @endforeach    
        </table>
        </div>
        <br>

        <div class="container">
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminarProductos" style="margin-left:1%; width:20%; float:right;">
                Dar Baja a Productos
            </button> 

            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalMasProducto" style="width:20%; float:right;">
                Dar Ingreso a Productos
            </button> 
        </div>

    </div>

        <!-- Modal Agregar Productos -->
        <div class="modal fade" id="modalMasProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingreso de Productos Existentes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('/ingreso-producto')}}" method="POST">
                    {{csrf_field()}}
                <div class="modal-body">
                            <select class="custom-select d-block w-100" id="country" name="productoExistente" required onclick="categoria()">
                                @foreach ($data as $dato)
                                    <option value="{{ $dato['NombreProducto'] }}">{{ $dato['NombreProducto'] }}</option>
                                @endforeach
                            </select> <br>

                    <input type="text" class="inputFormu form-control mr-sm-2" name="cantidadIngreso" placeholder="Cantidad a dar ingreso" onkeypress="return check(event)" autocomplete="off" required>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-success" value="Dar Ingreso a Productos">
                </div>
                </form>
                </div>
            </div>
        </div>

        <!-- Modal Eliminar Productos -->
        <div class="modal fade" id="modalEliminarProductos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dar de Baja Productos Existentes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('/eliminar-producto')}}" method="POST">
                    {{csrf_field()}}
                <div class="modal-body">
                            <select class="custom-select d-block w-100" id="country" name="nombre" required onclick="categoria()">
                                @foreach ($data as $dato)
                                    <option value="{{ $dato['NombreProducto'] }}">{{ $dato['NombreProducto'] }}</option>
                                @endforeach
                            </select> <br>

                    <input type="text" class="inputFormu form-control mr-sm-2" name="cantidad" placeholder="Cantidad a dar de baja" onkeypress="return check(event)" autocomplete="off" required>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-danger" value="Dar Baja a Productos">
                </div>
                </form>
                </div>
            </div>
        </div>


    <script>

        function check(e) {
            tecla = (document.all) ? e.keyCode : e.which;

            //Tecla de retroceso para borrar, siempre la permite
            if (tecla == 8) {
                return true;
            }

            // Patron de entrada, en este caso solo acepta numeros y letras
            patron = /[0-9]/;
            tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
        }

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
                    <td>
                        {{ $dato['ExistenciaProducto']}}
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
                        </tbody> 
                `;
            }
        })
    }
}
    </script>



@endsection