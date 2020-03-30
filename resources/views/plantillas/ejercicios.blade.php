<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
        
        @if(isset($title))
            {{$title}}
        @else
            {{$title="Electiva PHP"}}
        @endif
        
        </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
        <!-- Styles -->

        <style>

            .general {
                font-size: 70px;
                text-align: center;
                font-family: 'Nunito', sans-serif;
                font-weight: 150;
                height: 70vh;
                margin: 0 ;
                top: 160px;
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .tabla{

                font-size: 20px;

            }

            .titulo{
                height: 20vh;
              font-size: 70px;
              text-align: center;
              font-family: 'Nunito', sans-serif;
              align-items: center;
              display: flex;
              justify-content: center;

            }

            * {margin: 0; padding: 0;}

            div {
            margin: 20px;
            }

            ul {
            list-style-type: none;
            width: 500px;
            }

            h3 {
            font: bold 20px/1.5 Helvetica, Verdana, sans-serif;
            }

            li img {
            float: left;
            margin: 0 15px 0 0;
            }

            li p {
            font: 200 12px/1.5 Georgia, Times New Roman, serif;
            }

            li {
            padding: 10px;
            overflow: auto;
            }

            li:hover {
            background: #eee;
            cursor: pointer;
            }
            

        </style>

    </head>

    <body>

        @include("plantillas.barranavegacion")
        @yield("cabecera")


        @yield("cuerpo")

    </body>
</html>
