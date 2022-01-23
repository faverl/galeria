<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Electiva</title>

    <!-- Styles -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/modified.bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/album.css')}}" rel="stylesheet">
    <link href="{{asset('css/RegistrarUsuario.css')}}" rel="stylesheet" >
</head>

<body>
    @include("ViewsGaleria.plantillas.navbar")
        <!--Se quita container para quitar padding predetermindo-->
        <div class="contentcenter  m-b-md">

            <div>
                @yield("cuerpo")
            </div>

        </div>

    <footer class="text-muted contentcenter">
            <div class="contentcenter">
                <p>Created by &copy; Faver Alonso López - Carlos Andrés Ortíz</p>
            </div>
        </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>

</html>
