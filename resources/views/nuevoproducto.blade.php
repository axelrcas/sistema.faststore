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
        <br>
        <div class="mitabla2">

            <div class="col-md-8 order-md-1 position-static" >
                <h1 class="">Crear Nuevo Producto</h1>
                
                <form action="{{url('/insertar-producto')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-5 mb-3 position-static">
                            <label for="country">Categoria</label>
                            <select class="custom-select d-block w-100" id="country" name="idcat" required onclick="categoria()">
                                @foreach ($data as $dato)
                                    <option value="{{ $dato['Id_CategoriaProducto'] }}">{{ $dato['NombreCategoria'] }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                            Please select a valid country.
                            </div>
                        </div>

                        <div class="col-md-5 mb-3 position-static"> 
                        <label for="country">Subir Imagen</label>
                            <div class="input-group mb-3 position-static">
                                <input type="file" name="imagen" class="btn btn-light btn-sm" required> 
                            </div>
                        </div>

                    </div>

                    <div class="mb-3 position-static">
                        <label for="firstName">Nombre del Producto</label>
                        <input type="text" onkeyup="validar()" class="inputFormu form-control mr-sm-2" name="producto" autocomplete="off" placeholder="Producto" aria-label="Search" required>
                        <div class="invalid-feedback">
                        Valid first name is required.
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col position-static">
                            <label for="country">Precio</label>
                            <input type="text" onkeyup="validar()" class="inputFormu form-control mr-sm-2" name="precio" autocomplete="off" placeholder="Q" onkeypress="return check(event)" required>

                        </div>

                        <div class="col position-static"> 
                            <label for="country">Costo</label>
                            <input type="text" onkeyup="validar()" class="inputFormu form-control mr-sm-2" name="costo" autocomplete="off" placeholder="Q" onkeypress="return check(event)" required>
                            
                        </div>
                    </div> <br>

                    <div class="mb-3 position-static">
                        <label for="firstName">Marca del Producto</label>
                        <input type="text" onkeyup="validar()" class="inputFormu form-control mr-sm-2" name="marca" autocomplete="off" placeholder="Producto" aria-label="Search" required>
                        <div class="invalid-feedback">
                        Valid first name is required.
                        </div>
                    </div>

                    <div class="mb-3 position-static">
                        <label for="firstName">Descripción del Producto</label>
                        <input type="text" onkeyup="validar()" class="inputFormu form-control mr-sm-2" name="descripcion" autocomplete="off" placeholder="Producto" aria-label="Search" required>
                        <div class="invalid-feedback">
                        Valid first name is required.
                        </div>
                    </div>

                    <div class="row">
                        <div class="col position-static">
                            <label for="country">Cantidad</label>
                            <input type="text" onkeyup="validar()" class="inputFormu form-control mr-sm-2" name="cantidad" autocomplete="off" placeholder="00" onkeypress="return check(event)" required>

                        </div>

                        <div class="col position-static"> 
                            <label for="country">Vencidos</label>
                            <input type="text" onkeyup="validar()" class="inputFormu form-control mr-sm-2" name="vencidos" autocomplete="off" placeholder="00" onkeypress="return check(event)" required>
                            
                        </div>
                    </div> <br>

                    <div class="row">
                        <div class="col position-static">
                            <label for="country">Presentación</label>
                            <input type="text" onkeyup="validar()" class="inputFormu form-control mr-sm-2" name="presentacion" autocomplete="off" placeholder="---" required>

                        </div>

                        <div class="col position-static"> 
                            <label for="country">Unidad de Medida</label>
                            <input type="text" onkeyup="validar()" class="inputFormu form-control mr-sm-2" name="unidadMedida" autocomplete="off" placeholder="---" required>
                            
                        </div>
                    </div> <br>

                    <hr class="mb-4">

                    <input id="boton" type="submit" class="btn btn-success btn-block" value="Crear Nuevo Producto" data-toggle="modal" data-target="#exampleModal" disabled>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    @if (empty($_FILES['imagen']))
                                    <h5 class="modal-title" id="exampleModalLabel">¡GUARDADO!</h5>
                                    @else
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    @endif
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                        <div class="alert alert-success text-center" role="alert">
                                        DATOS INGRESADOS CORRECTAMENTE
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Continuar</button>
                                        </div>
                                </div>
                                </div>
                            </div>
                            </div>

                    </form>
                </div>
            </div>
            <br>
        </div>
    </div>

    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script>

        function validar(){
            var validado = true;
            elementos = document.getElementsByClassName("inputFormu");
            for(i=0;i<elementos.length;i++){
                if(elementos[i].value == "" || elementos[i].value == null){
                validado = false
                }
            }
            if(validado){
            document.getElementById("boton").disabled = false;
            
            }else{
                document.getElementById("boton").disabled = true;
            //Salta un alert cada vez que escribes y hay un campo vacio
            //alert("Hay campos vacios")   
            }
        }

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