<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Agiles</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            body{
                background-image: url('../images/fondo-inicio.jpg');
                background-position: top left;  
                background-size: 100%;  
                background-repeat: repeat;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}" /> 
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Agiles
                </div>

                <div class="py-5" style="">
                    <div class="container">
                      <div class="row">
                        <div class="p-4 col-lg-6">
                          <h4 class="mb-3 text-left ml-4"><b>Registrarse como Alumno</b></h4>
                          <ul class="text-left">
                            <li class="my-1">Gratis, siempre!</li>
                            <li class="my-1">Te permite obtener información en tiempo real de los profesores utilizando un mapa</li>
                            <li class="my-1">Podes realizar consultas a tu profesor en tiempo real</li>
                          </ul><a class="btn btn-primary float-left ml-4" href="register/student">Registrarse</a>
                        </div>
                        <div class="p-4 col-lg-6 text-center">
                          <h4 class="mb-3 text-left ml-4"><b>Registrarse como Profesor</b></h4>
                          <ul class="text-left">
                            <li class="my-1">Plan que mas se ajuste a tus necesidades</li>
                            <li class="my-1">Mapa interactivo por zona</li>
                            <li class="my-1">Destacá entre los demas profesores, con las asignaturas mas requeridas entre los estudiantes<br></li>
                          </ul><a class="btn btn-primary float-left ml-4" href="register/teacher" style="">Registrarse<br></a>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </body>
    <script src="{{ mix('js/app.js') }}"></script>
</html>
