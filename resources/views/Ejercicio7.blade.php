@extends("plantillas.ejercicios")

@section("cabecera")
@endsection

@section("cuerpo")
    <h1 class="titulo">Imágenes</h1>
    <section class="general tabla" >

      @if ($gestor = opendir('fotos'))
        <table border=2>
            <tr>
              @php($i=0)

              @while(false !== ($archivo = readdir($gestor)))
                  @if($archivo!="." && $archivo!="..")
                      @if($i==4)
                        @php($i=0)
                        </tr>
                        <tr>
                      @endif
                      @php($i++)
                      <td>
                        <a href="fotos/{{$archivo}}"><img src="fotos/{{$archivo}}" width="300" height="200"></a>
                      </td>
                  @endif
              @endwhile
            </tr>
        </table>
        @php(closedir($gestor))
      @endif
    </section>
@endsection
