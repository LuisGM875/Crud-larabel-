<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0
.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min
.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/p
opper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.
min.js"></script>
    <title>Producto</title>
</head>
<body class="bg-info">
<div >
@if ( !empty ( $productos->id) )
    <br>
    <div class="container card bg-light">
        <h1 class="text-center">Editar</h1>
    <div class="form-group">
        <label for="nombre" class="negrita">Nombre:</label>
        <div>
            <input class="form-control bg-body bg-gray-500" placeholder="Nombre" required="required" name="nombre" type="text" id="nombre" value="{{ $productos->nombre }}">
        </div>
    </div>

    <div class="form-group">
        <label for="descripcion" class="negrita">Descripcion:</label>
        <div>
            <input class="form-control" placeholder="Descripcion" required="required" name="descripcion" type="text" id="descripcion" value="{{ $productos->descripcion }}">
        </div>
    </div>

    <div class="form-group">
        <label for="precio" class="negrita">Precio:</label>
        <div>
            <input class="form-control" placeholder="Precio" required="required" name="precio" type="number" id="precio" value="{{ $productos->precio }}">
        </div>
    </div>

    <div class="form-group">
        <label for="stock" class="negrita">Stock:</label>
        <div>
            <input class="form-control" placeholder="Stock de productos" required="required" name="stock" type="number" id="stock" value="{{ $productos->stock }}">
        </div>
    </div>

    <div class="form-group">
        <label for="categoria_id" class="negrita">Numero de categoria:</label>
        <div>
            <input class="form-control" placeholder="No Categoria" required="required" name="categorias_id" type="number" id="categorias_id" value="{{$productos->categorias_id}}"  disabled>
        </div>
    </div>

    <div class="form-group">
        <label for="img" class="negrita">Selecciona imagen(es):</label>
        <div>
            <input name="img[]" type="file" id="img" multiple="multiple">
            <br>
            <br>

            @if ( !empty ( $productos->imagenes) )

                <span>Imagenes: </span>
                <br>

                @if(Session::has('message'))
                    <div role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
                @foreach($imagenes as $imag)
                    <img src="{{ url('/storage/imagenes/imagenes/' . $imag->nombre) }}" width="200" alt="">

                    <a href="{{ route('productos/eliminarimagen', ['id' => $imag->id, 'bid' => $productos->id,'categorias_id' => $categorias_id]) }}" onclick="return confirmarEliminar();">Eliminar</a>
                @endforeach
            @else
                No se a caragado la imagen
            @endif

        </div>

    </div>
        <br>
        <button type="submit" class="btn btn-info">Guardar</button>
        <br>
        <a href="{{ route('productos/index', ['categorias_id' => $categorias_id])}}" class="btn btn-warning">Cancelar</a>
        <br>
    </div>
@else
    <div class="">
    <div class="form-group">
        <label for="nombre" class="negrita">Nombre:</label>
        <div>
            <input class="form-control" placeholder="Nombre" required="required" name="nombre" type="text" id="nombre">
        </div>
    </div>


    <div class="form-group">
        <label for="precio" class="negrita">Precio:</label>
        <div>
            <input class="form-control" placeholder="Precio" required="required" name="precio" type="number" id="precio">
        </div>
    </div>

    <div class="form-group">
        <label for="descripcion" class="negrita">Descripcion:</label>
        <div>
            <input class="form-control" placeholder="Descripcion" required="required" name="descripcion" type="text" id="descripcion">
        </div>
    </div>

    <div class="form-group">
        <label for="stock" class="negrita">Stock:</label>
        <div>
            <input class="form-control" placeholder="Stock de productos" required="required" name="stock" type="number" id="stock">
        </div>
    </div>

    <div class="form-group">
        <label for="categoria_id" class="negrita">Numero de categoria:</label>
        <div>
            <input class="form-control" placeholder="No Categoria" required="required" name="categorias_id" type="number" id="categorias_id" value="{{ $categorias_id }}"  disabled>
        </div>
    </div>

    <div class="form-group">
        <label for="img" class="negrita">Selecciona una imagen:</label>
        <div>
            <input name="img[]" type="file" id="img" multiple="multiple">
        </div>
    </div>
        <br>
        <button type="submit" class="btn btn-info">Guardar</button>
    <br>
        <a href="{{ route('productos/index', ['categorias_id' => $categorias_id])}}" class="btn btn-warning">Cancelar</a>
        <br>
    </div>
@endif
    </div>
</body>
</html>



