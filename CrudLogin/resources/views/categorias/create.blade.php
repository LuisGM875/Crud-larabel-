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

    <title>Agregar categoria</title>
</head>
<body class="bg-info">

<br>
<div class="container card bg-light">
    <h1 class="text-center">Agregar Categoría</h1>
<form method="POST" action="{{ route('categorias.store') }}">
    @csrf

    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>

    <div class="form-group">
        <label for="descripcion_corta">Descripción Corta:</label>
        <textarea class="form-control" id="descripcion_corta" name="descripcion_corta" rows="3" required></textarea>
    </div>

    <div class="form-group">
        <label for="descripcion_larga">Descripción Larga:</label>
        <textarea class="form-control" id="descripcion_larga" name="descripcion_larga" rows="5" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <br>
</form>
</div>
</body>
</html>


