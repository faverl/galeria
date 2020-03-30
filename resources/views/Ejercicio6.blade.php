@extends("plantillas.ejercicios")

@section("cabecera")
@endsection

@section("cuerpo")
    <h1 class="titulo">Función</h1>
    <section class="general tabla" >
        <table width="30%" border=2>
            <?php
              define("TAM",4);
            ?>
            @php
              function potencia($v1, $v2){
                  $rdo= pow($v1, $v2);
                  return $rdo;
              }
            @endphp
            @for ($n1 = 1; $n1 <= TAM; $n1++)
                <tr>
                  @for($n2 = 1; $n2 <= TAM; $n2++)
                      <td>
                        @php
                          echo potencia($n1,$n2);
                        @endphp
                      </td>
                  @endfor
                </tr>
            @endfor
        </table>
    </section>
@endsection
