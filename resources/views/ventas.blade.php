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

             

        
        <center>

        <div class="position-static" tabindex="-1" role="dialog">
            <div class="modal-dialog position-static">
                <div class="modal-content position-static">
                <div class="modal-header position-static">
                    <h5 class="modal-title">Crear Nueva Venta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    
                    </button>
                </div>
                <form id="formulario" class="position-static">
                    {{csrf_field()}}
                <div class="modal-body position-static">
                            
                            <select class="custom-select d-block w-100" id="country" name="cliente" required onclick="categoria()">
                                @foreach ($data2 as $dato)
                                        <option value="{{ $dato['Id_Cliente'] }}">{{ $dato['NombreCliente'] }} {{ $dato['ApellidoCliente'] }}</option>
                                
                                @endforeach
                            </select> <br>

                                

                            <select class="custom-select d-block w-100" name="credito">
                                <option value="">Con Crédito</option>
                                <option value="0">Sin Crédito</option>
                            </select> <br>
                    
                            <div class="row position-static">
                                <div class="col position-static">
                                <input type="text" class="form-control" name="idfactura" placeholder="Id Factura" autocomplete="off" required>
                                </div>
                                <div class="col position-static">
                                <input type="text" class="form-control" name="seriefactura" placeholder="Serie Factura" autocomplete="off" required>
                                </div>
                            </div> <br>

                            <select class="custom-select d-block w-100" id="country" name="producto[]" required onclick="categoria()">
                                @foreach ($data as $dato)
                                        <option value="{{ $dato['Id_Producto'] }}">{{ $dato['NombreProducto'] }} - Q<span name="precio[]">{{ number_format(intval($dato['Precio']), 2, '.', ',') }}</span> </option>

                                @endforeach
                            </select> <br>

                            

                            <input type="text" class="form-control" name="cantidad[]" placeholder="Cantidad a Comprar" autocomplete="off" onkeypress="return check(event)" required>
                                
                     
                </div>
                <div class="modal-footer">
                    <a href="/clientes" class="btn btn-secondary" style="color:white;">Regresar</a>
                    <button type="submit" class="btn btn-success" id="btnenvio">Generar Venta</button>
                </div>
                </form>
                </div>
            </div>
        </div>

        </center>

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

        <!-- Modal Crear Venta -->
        <div class="modal fade" id="modalEliminarProductos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Venta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('/eliminar-producto')}}" method="POST">
                    {{csrf_field()}}
                <div class="modal-body">
                            

                            <select class="custom-select d-block w-100" name="credito">
                                <option>Seleccionar Opcion</option>
                                <option value="0">Sin Crédito</option>
                                <option value="">Con Crédito</option>
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

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

        <script>
        $(() => {

            $('#btnenvio').click(() => {
                //Inputs array del detalle Venta:
                var producto = $('input[name="producto[]"]').serializeArray();
                var cantidad = $('input[name="cantidad[]"]').serializeArray();
                var precio = $('input[name="precio[]"]').serializeArray();
                var total_detalle = $('input[name="total_detalle[]"]').serializeArray();
                var detalleVenta = new Array();//Array de objetos
                var fila = new Object(); //Objeto fila del detalle.
                //Rellenar detalle venta :
                for (i = 0; i < id_producto.length; i++) {
                    fila.id_producto = producto[i].value;
                    fila.cantidad = cantidad[i].value;
                    fila.precio = precio[i].value;
                    fila.total_detalle = cantidad[i].value * precio[i].value;
                    detalleVenta.push(fila);
                }

                console.log(detalleVenta);

                fetch('https://backendmarket.herokuapp.com/api/ventas/', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    //JSON xd
                    body: JSON.stringify({
                        "id_cliente": cliente.value,
                        "credito": credito.value,
                        "productos_vendidos": cantidad.value,
                        "total": 0,
                        "id_factura": idfactura.value,
                        "serie_factura": seriefactura.value,
                        "detalleVenta": detalleVenta
                    })
                }).then(res => res.json())
                    .catch(error => console.error('Error:', error))
                    .then(response => console.log('Success:', response));
            })
        })
        </script>
    



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