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
            Crear Nuevo Tipo de Cliente
            </button>   

            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminarTipo" style="width:20%;">
            Eliminar Tipo de Cliente
            </button> 

            
        </div>

        <!-- Modal crear Categoria -->
        <div class="modal fade" id="modalCrearCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Tipo de Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('/crear-tipocliente')}}" method="POST">
                    {{csrf_field()}}
                <div class="modal-body">
                    <input type="text" class="inputFormu form-control mr-sm-2" name="nuevatipo" placeholder="Tipo de Cliente" autocomplete="off" required>
                    
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
        <div class="modal fade" id="modalEliminarTipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Tipo de Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/eliminar-tipocliente" method="POST">
                    {{csrf_field()}}
                    @method('DELETE')
                <div class="modal-body">
                            <select class="custom-select d-block w-100" id="country" name="idtipo" required onclick="categoria()">
                                @foreach ($data2 as $dato)
                                    @if ($dato['EliminarTipoCliente'] == 0)
                                    <option value="{{ $dato['Id_TipoCliente'] }}">{{ $dato['TipoDeCliente'] }}</option>
                                    @endif
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


        




        <h1 style="float:left; margin-left:2.5%; margin-top:1.5%;">Clientes</h1>
 <br>
        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalCrearCliente" style="width:20%; float:right; margin-right:5%;">
            Crear Nuevo Cliente
            </button> 
        <br><br><br>

        <div class="mitabla" style="border-style:solid; border-color:#586995;">
        <table class="table table-bordered" id="resultado">
            <thead style="background-color:#586995; color:white;">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
                <th scope="col">NIT</th>
                </tr>
            </thead>
                <span style="display:none;">{{ $contador = 1 }}</span>
                @foreach ($data as $dato)
                <form action="/borrar-cliente" method="POST">
                {{csrf_field()}}
                    @method('DELETE')
                <tbody>
                    <td>{{ $contador++ }}</th>
                    <td>
                        {{ $dato['Id_Cliente'] }}
                        <input type="text" style="display:none;" name="idcliente" value="{{ $dato['Id_Cliente'] }}">
                    </td>
                    <td>
                        {{ $dato['NombreCliente'] }}
                    </td>
                    <td>{{ $dato['ApellidoCliente'] }}</td>
                    <td>{{ $dato['CorreoCliente'] }}</td>
                    <td>{{ $dato['TelefonoCliente'] }}</td>
                    <td> {{ $dato['NitCliente']}} </td>
                    <td style="width:9vh;"> <input type="submit" class="btn btn-danger btn-sm" value="Borrar Cliente"> </td>    
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

        <!-- Modal Crear Cliente -->
        <div class="modal fade" id="modalCrearCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('/crear-cliente')}}" method="POST">
                    {{csrf_field()}}
                <div class="modal-body">
                   
                            <select class="custom-select d-block w-100" id="country" name="tipo" required onclick="categoria()">
                                @foreach ($data2 as $dato)
                                    @if ($dato['EliminarTipoCliente'] == 0)
                                        <option value="{{ $dato['Id_TipoCliente'] }}">{{ $dato['TipoDeCliente'] }}</option>
                                    @endif 
                                @endforeach
                            </select> <br>

                    <input type="text" class="inputFormu form-control mr-sm-2" name="nombre" placeholder="Ingrese el nombre del Cliente"  autocomplete="off" required> <br>
                    <input type="text" class="inputFormu form-control mr-sm-2" name="apellido" placeholder="Ingrese el apellido del Cliente"  autocomplete="off" required> <br>
                    <input type="text" class="inputFormu form-control mr-sm-2" name="correo" placeholder="Ingrese el correo electrónico del Cliente" autocomplete="off" required> <br>
                    <input type="password" class="inputFormu form-control mr-sm-2" name="pass" placeholder="Ingrese la contraseña del Cliente" autocomplete="off" required> <br>
                    <input type="text" class="inputFormu form-control mr-sm-2" name="telefono" placeholder="Ingrese el telefono del Cliente"  autocomplete="off" required> <br>
                    <input type="text" class="inputFormu form-control mr-sm-2" name="nit" placeholder="Ingrese el NIT del Cliente"  autocomplete="off" required> <br>
                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-success" value="Crear Nuevo Cliente">
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
                                    <option value="{{ $dato['NombreCliente'] }}">{{ $dato['NombreCliente'] }}</option>
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
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
                <th scope="col">NIT</th>
                </tr>
            </thead>
                @foreach ($data as $dato)
                <tbody >
                    <td>1</th>
                    <td>{{ $dato['Id_Cliente'] }}</td>
                    <td>{{ $dato['NombreCliente'] }}</td>
                    <td>{{ $dato['ApellidoCliente'] }}</td>
                    <td>{{ $dato['CorreoCliente'] }}</td>
                    <td>{{ $dato['TelefonoCliente'] }}</td>
                    <td>
                        {{ $dato['NitCliente']}}
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
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">NIT</th>
                    </tr>
                </thead>
            `;

            for (let dato of datos) {
                resultado.innerHTML += `
                        <tbody>
                                    <td>1</th>
                                    <td>${dato.Id_Cliente}</th>
                                    <td>${dato.NombreCliente}</td>
                                    <td>${dato.ApellidoCliente}</td>
                                    <td>${dato.CorreoCliente}</td>
                                    <td>${dato.TelefonoCliente}</td>
                                    <td>${dato.NitCliente}</td>
                        </tbody> 
                `;
            }
        })
    }
}
    </script>



@endsection