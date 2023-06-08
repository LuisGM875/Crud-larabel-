<!Doctype html>
<html>
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
    <title>Registro</title>
</head>
<body class="bg-info">
<section class="h-screen">

    <br>
    <br>
    <div class="container h-full px-6 py-24 card">
        <h1 class="text-center">Registrate aqui</h1>
        <br>
        <div class="row justify-content-between align-items-center">
            <div class="col-md-8 col-lg-6 mb-4 mb-md-0">
                <img src="https://tecdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="w-100" alt="Phone image" />
            </div>
            <div class="col-md-4 col-lg-5">
                <form method="POST" action="{{route('validarRegistro')}}">
                    @csrf
                    <div class="mb-3">
                        <input type="email" class="form-control" id="emailInput" placeholder="Email address" name="email" required autocomplete="disable"/>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Password" required/>
                    </div>
                    <div class="mb-3">
                        <label for="userInput" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="userInput" name="name" required autocomplete="disable">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                </form>
                <br>
            </div>
        </div>
    </div>
</section>
</body>
</html>
