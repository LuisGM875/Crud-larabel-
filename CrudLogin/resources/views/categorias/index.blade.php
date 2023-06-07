<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inicio</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
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

</head>

<body class="bg-info">
<div class="bg-light border border-black">
    <a class="">Crud productos Usuario @auth
            {{Auth::user()->name}}
        @endauth</a>
    <a href="{{ route('logout') }}">
        <button type="button" class="btn btn-danger ">Salir</button>
    </a>
</div>
<div class="container">
    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">Mensajes:
            {{ Session::get('mensaje')}}
            @endif
        </div>
</div>
<br>
<div class="card container">
    <br>
    <h1 class="text-center text-warning">Listado de Categorías</h1>
    <br>
    <a href="{{ route('categorias.create') }}" class="btn btn-success">Agregar Categoría</a>

    <table class="table mt-4">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción Corta</th>
            <th>Descripción Larga</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nombre }}</td>
                <td>{{ $categoria->descripcion_corta }}</td>
                <td>{{ $categoria->descripcion_larga }}</td>
                <td>
                    <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-primary">Editar</a>
                    <a href="{{ route('productos/index', ['categorias_id' => $categoria->id]) }}" class="btn btn-info">Ver
                        Productos</a>
                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                                onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">Eliminar
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>


</html>
