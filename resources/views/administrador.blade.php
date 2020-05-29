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

    <br>


            <h1 style="float:left; margin-left:2.5%; margin-top:1.5%;">Proveedores</h1>
<br>
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalNuevoProveedor" style="width:20%; float:right;  margin-right:5%;">
                Crear Nuevo Proveedor
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
                <th scope="col">nit</th>
                </tr>
            </thead>
                <span style="display:none;">{{ $contador = 1 }}</span>
                @foreach ($data as $dato)
                <form action="/borrar-proveedor" method="POST">
                {{csrf_field()}}
                    @method('DELETE')
                <tbody>
                    <td>{{ $contador++ }}</th>
                    <td>
                        {{ $dato['Id_Proveedor'] }}
                        <input type="text" style="display:none;" name="idproveedor" value="{{ $dato['Id_Proveedor'] }}">
                    </td>
                    <td>
                        {{ $dato['NombreProveedor'] }}
                    </td>
                    <td>{{ $dato['ApellidoProveedor'] }}</td>
                    <td>{{ $dato['CorreoProveedor'] }}</td>
                    <td>{{ $dato['TelefonoProveedor'] }}</td>
                    <td> {{ $dato['NitProveedor'] }}</td>
                    <td style="width:9vh;"> <input type="submit" class="btn btn-danger btn-sm" value="Borrar Producto"> </td>    
                </tbody>
                </form>
                @endforeach    
        </table>
        </div>
        <br>

    </div>

        <!-- Modal Agregar Productos -->
        <div class="modal fade" id="modalNuevoProveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingreso de Productos Existentes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('/crear-proveedor')}}" method="POST">
                    {{csrf_field()}}
                <div class="modal-body">
                            
                    <input type="text" class="inputFormu form-control mr-sm-2" name="nombre" placeholder="Ingrese el nombre del Proveedor"  autocomplete="off" required> <br>
                    <input type="text" class="inputFormu form-control mr-sm-2" name="apellido" placeholder="Ingrese el apellido del Proveedor"  autocomplete="off" required> <br>
                    <input type="text" class="inputFormu form-control mr-sm-2" name="correo" placeholder="Ingrese el correo electrónico del Proveedor" autocomplete="off" required> <br>
                    <input type="text" class="inputFormu form-control mr-sm-2" name="telefono" placeholder="Ingrese el telefono del Proveedor"  autocomplete="off" required> <br>
                    <input type="text" class="inputFormu form-control mr-sm-2" name="nit" placeholder="Ingrese el NIT del Proveedor"  autocomplete="off" required> <br>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-success" value="Crear Proveedor">
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
                                    <option value="{{ $dato['NombreProveedor'] }}">{{ $dato['NombreProveedor'] }}</option>
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

    </script>



@endsection