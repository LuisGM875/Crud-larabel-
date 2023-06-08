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
    <title>Productos por categoria</title>
</head>
<body class="bg-info">
<div>
    <div class="container">
    <a href="{{ route('productos/crear', ['categorias_id'=>$categorias_id]) }}" class="btn btn-success mt-4 ml-3 border-black">Agregar</a>
    <a href="{{ route('categorias.index') }}" class="btn btn-primary mt-4 ml-3">Volver a Categorías</a>
    </div>
        <br>
        <div class="container card">
            <br>
            <h3 class="text-primary text-center">Productos de esta categoria</h3>
            @if(Session::has('message'))
                <div role="alert" class="btn btn-primary">
                    {{ Session::get('message') }}
                </div>
            @endif
    <section class="example mt-4">
        <div class="table-responsive">

            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($productos as $produc)
                    <tr>
                        <td class="v-align-middle">{{$produc->nombre}}</td>
                        <td class="">{{$produc->descripcion}}</td>
                        <td class="v-align-middle">{{$produc->precio}}</td>
                        <td class="v-align-middle">{{$produc->stock}}</td>

                        <td class="v-align-middle">
                            <!-- Mostrar preview de la primera imagen si existe -->
                            @if( optional($produc->imagenesproductos()->first())->nombre)
                                <img src="{{ url('/storage/imagenes/imagenes/'.$produc->imagenesproductos()->first()->nombre) }}" width="30" class="img-responsive" alt="Imagen">
                            @endif
                        </td>
                        <td class="v-align-middle">
                            <form action="{{ route('productos/eliminar', ['categorias_id' => $categorias_id,'id' => $produc->id]) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button onclick="location.href='{{ route('productos.detalles', ['categorias_id' => $produc->id , 'id' => $produc->id]) }}'" href="" type="button" class="btn btn-dark">Ver</button>

                                <a href="{{ route('productos/actualizar',['categorias_id' => $categorias_id,'id' => $produc->id]) }}" class="btn btn-primary">Editar</a>

                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </section>
        </div>
    <script type="text/javascript">

        function confirmarEliminar() {
            var x = confirm("Estas seguro de Eliminar?");
            if (x)
                return true;
            else
                return false;
        }

    </script>
</div>

</body>
</html>
