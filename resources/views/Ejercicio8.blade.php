@extends("plantillas.ejercicios")

@section("cabecera")
@endsection

@section("cuerpo")
    <h1 class="titulo">Imágenes</h1>
    <section class="general tabla" >

      @php
        function validar_foto($archivo){
          $rdo=0;
          //Divide la ruta en array donde alla un punto (.)
          $array = explode(".",$archivo);
          foreach ($array as $datos) {
              $extension = end($array);

              if($extension=="png"||$extension=="jpg"||$extension=="bmp"){
                $rdo=1;
              }
          }

          return $rdo;
        }
      @endphp

      @if ($gestor = opendir('fotos'))
        <table border=2>
            <tr>
              @php($i=1)

              @while(false !== ($archivo = readdir($gestor)))
                  @if($archivo!="." && $archivo!=".." && validar_foto($archivo))
                      @if($i==5)
                        @php($i=0)
                        </tr>
                        <tr>
                      @endif
                      @php($i++)
                      <td>
                        <a href="fotos/{{$archivo}}"><img src="fotos/{{$archivo}}" width="100" height="100"></a>
                      </td>
                  @endif
              @endwhile
            </tr>
        </table>
        @php(closedir($gestor))
      @endif
    </section>
@endsection
