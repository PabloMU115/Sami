<!DOCTYPE html>
<html lang="en">

<head>
    <title>SAMI</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 450px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }

            .row.content {
                height: auto;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">SAMI</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Route::has('login'))
                        @auth
                            <li><a href="{{ url('/admin') }}"><span class="glyphicon glyphicon-log-in"></span> Volver al
                                    Menú</a></li>
                        @else
                            <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Iniciar
                                    Sesion</a></li>
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}"><span
                                            class="glyphicon glyphicon-new-window"></span>Crear Cuenta</a></li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="col-sm-2">

    </div>
    <div class="col-sm-8 text-left">
        <h1 class="text-center">¿Que significa S.A.M.I?</h1>
        <h3 class="text-center">"S.A.M.I" vendrian a ser las siglas que conforman el nombre de nuestra aplicación, las
            cuales
            significan respectivamente lo siguiente:
        </h3 class="text-center">
        <br>
        <h4 class="text-center">S = Sistema</h4>
        <h4 class="text-center">A = Administrativo</h4>
        <h4 class="text-center">Para</h4>
        <h4 class="text-center">M = Medicos</h4>
        <h4 class="text-center">I = Independientes</h4>
        <br>
        <h3 class="text-center">
            Estas siglas de forma acertada describen exactamente nuestro público meta, el cual estaria conformado
            por médicos que cuentan con un cosultorio independiente, además de resumir en forma simple la utilidad
            de nuestro software. La cual recae en cumplir como una ayuda en cuanto a automatización de las tareas
            administrativas del médico entre las cuales se tiene la gestión de pacientes, diagnosticos, recetas, entre
            otras...
        </h3>
        <hr>
    </div>
    <div class="col-sm-2">
    </div>
    {{-- <footer class="container-fluid text-center">
        <p>Footer Text</p>
    </footer> --}}

</body>

</html>
