<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
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
    <title>Detalles</title>
</head>
<body class="bg-info">
@if ( !empty ( $productos->id) )
    <br>
    <div class="container card">
        <div>
            <br>
            <div class="">
                <h2 class="text-danger">Producto {{ $productos->nombre }}</h2>
            </div>
        </div>
        <br>
        <div>
            <strong>Descripcion:</strong>
            <div class="form-control">{{ $productos->descripcion }}</div>
            <br>
            <br>

            <strong>Precio:</strong>
            <div class="form-control">{{ $productos->precio }}</div>
            <br>
            <br>

            <strong>Stock:</strong>
            <div class="form-control">{{ $productos->stock }}</div>
            <br>
            <br>

            <strong>Creado:</strong>
            <div class="form-control">{{ $productos->created_at }}</div>
            <br>
            <br>

            <strong>Actualizado:</strong>
            <div class="form-control">{{ $productos->updated_at }}</div>
            <br>
            <br>

            <div class="form-group">
                <label for="categoria_id" class="negrita">Numero de categoria:</label>
                <div>
                    <input class="form-control" placeholder="No Categoria" required="required" name="categorias_id" type="number" id="categorias_id" value="{{$productos->categorias_id}}"  disabled>
                </div>
            </div>
        </div>
            <div>Galería de Imágenes:</div>
            <br>
            @foreach($imagenes as $imagen)
                    <img src="{{ asset('storage/imagenes/' . $imagen->nombre) }}" width="200" alt="" class="img-responsive">
            @endforeach
            <br>
        <a href="{{ route('productos/index', ['categorias_id' => $productos->categorias_id])}}" class="btn btn-warning flex align-content-between">Cancelar</a>
        <br>
    </div>
@endif
<br>
</body>
</html>
