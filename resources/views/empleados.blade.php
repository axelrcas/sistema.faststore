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
            Crear Registro de Empresa
            </button>   

            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEliminarTipo" style="width:20%;">
            Ver Registro de Empresa
            </button> 

            
        </div>

        <!-- Modal crear Categoria -->
        <div class="modal fade" id="modalCrearCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Registro de Empresa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('/crear-empresa')}}" method="POST">
                    {{csrf_field()}}
                <div class="modal-body">

                    <input type="text" class="inputFormu form-control mr-sm-2" name="nombre" placeholder="Nombre de la Empresa" autocomplete="off" required> <br>
                    <input type="text" class="inputFormu form-control mr-sm-2" name="slogan" placeholder="Slogan de la Empresa" autocomplete="off" required> <br>
                    <input type="text" class="inputFormu form-control mr-sm-2" name="direccion" placeholder="Direccion de la Empresa" autocomplete="off" required> <br>
                    <input type="text" class="inputFormu form-control mr-sm-2" name="email" placeholder="Correo de la Empresa" autocomplete="off" required> <br>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-success" value="Crear Registro">
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
                    <h5 class="modal-title" id="exampleModalLabel">Registro de Empresa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="POST">
                    {{csrf_field()}}
                    @method('DELETE')
                <div class="modal-body">
                            <select class="custom-select d-block w-100" id="country" name="idempresa" required onclick="categoria()">
                                @foreach ($data2 as $dato)
                                    @if ($dato['EliminarDatosEmpresa'] == 0)
                                    <option value="{{ $dato['Id_DatoEmpresa'] }}">{{ $dato['NombreEmpresa'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <!-- <input type="submit" class="btn btn-danger" value="Eliminar Registro"> -->
                </div>
                </form>
                </div>
            </div>
        </div>


        




        <h1 style="float:left; margin-left:2.5%; margin-top:1.5%;">Clientes</h1>
 <br>
        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalCrearCliente" style="width:20%; float:right; margin-right:5%;">
            Crear Nuevo Empleado
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
                <th scope="col">Residencia</th>
                <th scope="col">Tipo de Empleado</th>                
                </tr>
            </thead>
                <span style="display:none;">{{ $contador = 1 }}</span>
                @foreach ($data as $dato)
                <form action="/borrar-empleado" method="POST">
                {{csrf_field()}}
                    @method('DELETE')
                <tbody>
                    <td>{{ $contador++ }}</th>
                    <td>
                        {{ $dato['Id_Empleado'] }}
                        <input type="text" style="display:none;" name="idempleado" value="{{ $dato['Id_Empleado'] }}">
                    </td>
                    <td>
                        {{ $dato['NombreEmpleado'] }}
                    </td>
                    <td>{{ $dato['ApellidoEmpleado'] }}</td>
                    <td>{{ $dato['CorreoEmpleado'] }}</td>
                    <td>{{ $dato['TelefonoEmpleado'] }}</td>
                    <td>{{ $dato['NitEmpleado'] }} </td>
                    <td>{{ $dato['Residencia'] }} </td>
                    <td>{{ $dato['TipoEmpleado'] }} </td>
                    <td style="width:9vh;"> <input type="submit" class="btn btn-danger btn-sm" value="Borrar Cliente"> </td>    
                </tbody>
                </form>
                @endforeach    
        </table>
        </div>
        <br>



    </div>

        <!-- Modal Crear Cliente -->
        <div class="modal fade" id="modalCrearCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Empleado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('/crear-empleado')}}" method="POST">
                    {{csrf_field()}}
                <div class="modal-body">
                   
                            

                    <input type="text" class="inputFormu form-control mr-sm-2" name="nombre" placeholder="Ingrese el nombre del Empleado"  autocomplete="off" required> <br>
                    <input type="text" class="inputFormu form-control mr-sm-2" name="apellido" placeholder="Ingrese el apellido del Empleado"  autocomplete="off" required> <br>
                    <input type="text" class="inputFormu form-control mr-sm-2" name="correo" placeholder="Ingrese el correo electrónico del Empleado" autocomplete="off" required> <br>
                    <input type="password" class="inputFormu form-control mr-sm-2" name="pass" placeholder="Ingrese la contraseña del Empleado" autocomplete="off" required> <br>
                    <input type="text" class="inputFormu form-control mr-sm-2" name="telefono" placeholder="Ingrese el telefono del Empleado"  autocomplete="off" required> <br>
                    <input type="text" class="inputFormu form-control mr-sm-2" name="nit" placeholder="Ingrese el NIT del Empleado"  autocomplete="off" required> <br>
                    <input type="text" class="inputFormu form-control mr-sm-2" name="residencia" placeholder="Ingrese la residencia del Empleado" autocomplete="off" required> <br>
                    <input type="text" class="inputFormu form-control mr-sm-2" name="tipoempleado" placeholder="Ingrese el tipo de Empleado"  autocomplete="off" required> 
                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-success" value="Crear Nuevo Empleado">
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