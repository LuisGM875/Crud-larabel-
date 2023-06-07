<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <title>Editar categoria</title>
</head>
<body class="bg-info">
<br>
<div >
<div class="card container">

<h1>Editar Categoría</h1>

<form method="POST" action="{{ route('categorias.update', $categoria->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $categoria->nombre }}" required>
    </div>

    <div class="form-group">
        <label for="descripcion_corta">Descripción Corta:</label>
        <textarea class="form-control" id="descripcion_corta" name="descripcion_corta" rows="3" required>{{ $categoria->descripcion_corta }}</textarea>
    </div>

    <div class="form-group">
        <label for="descripcion_larga">Descripción Larga:</label>
        <textarea class="form-control" id="descripcion_larga" name="descripcion_larga" rows="5" required>{{ $categoria->descripcion_larga }}</textarea>
    </div>
    <div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Regresar</a>
    </div>
        <br>

</form>
</div>
</div>
</body>
</html>
