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
                                <span style="">{{ $contador = 0 }}</span>
                                @foreach ($data as $dato)
                                    <option value="{{ $contador+1 }}">{{ $dato['NombreCategoria'] }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                            Please select a valid country.
                            </div>
                        </div>

                        <div class="col-md-5 mb-3 position-static"> 
                        <label for="country">Subir Imagen</label>
                            <div class="input-group mb-3 position-static">
                                <input type="file" id="" name="img" class="btn btn-light btn-sm" require> 
                            </div>
                        </div>

                    </div>

                    <div class="mb-3 position-static">
                        <label for="firstName">Nombre del Producto</label>
                        <input type="text" class="form-control mr-sm-2" name="producto" placeholder="Producto" aria-label="Search" required>
                        <div class="invalid-feedback">
                        Valid first name is required.
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col position-static">
                            <label for="country">Precio</label>
                            <input type="text" class="form-control mr-sm-2" name="precio" placeholder="Q" onkeypress="return check(event)" aria-label="Search" required>

                        </div>

                        <div class="col position-static"> 
                            <label for="country">Costo</label>
                            <input type="text" class="form-control mr-sm-2" name="costo" placeholder="Q" onkeypress="return check(event)" aria-label="Search" required>
                            
                        </div>
                    </div> <br>

                    <div class="mb-3 position-static">
                        <label for="firstName">Marca del Producto</label>
                        <input type="text" class="form-control mr-sm-2" name="marca" placeholder="Producto" aria-label="Search" required>
                        <div class="invalid-feedback">
                        Valid first name is required.
                        </div>
                    </div>

                    <div class="mb-3 position-static">
                        <label for="firstName">Descripción del Producto</label>
                        <input type="text" class="form-control mr-sm-2" name="descripcion" placeholder="Producto" aria-label="Search" required>
                        <div class="invalid-feedback">
                        Valid first name is required.
                        </div>
                    </div>

                    <div class="row">
                        <div class="col position-static">
                            <label for="country">Cantidad</label>
                            <input type="text" class="form-control mr-sm-2" name="cantidad" placeholder="00" onkeypress="return check(event)" aria-label="Search" required>

                        </div>

                        <div class="col position-static"> 
                            <label for="country">Vencidos</label>
                            <input type="text" class="form-control mr-sm-2" name="vencidos" placeholder="00" onkeypress="return check(event)" aria-label="Search" required>
                            
                        </div>
                    </div> <br>

                    <div class="row">
                        <div class="col position-static">
                            <label for="country">Presentación</label>
                            <input type="text" class="form-control mr-sm-2" name="presentacion" placeholder="---" aria-label="Search" required>

                        </div>

                        <div class="col position-static"> 
                            <label for="country">Unidad de Medida</label>
                            <input type="text" class="form-control mr-sm-2" name="unidadMedida" placeholder="---" aria-label="Search" required>
                            
                        </div>
                    </div> <br>

                    <hr class="mb-4">
                    <input type="submit" class="btn btn-success btn-lg btn-block" value="Crear Nuevo Producto">
                </form>
                </div>
            </div>
            <br>
        
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