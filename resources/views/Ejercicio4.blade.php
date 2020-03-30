@extends("plantillas.ejercicios")

@section("cabecera")

@endsection

@section("cuerpo")
    <h1 class="titulo">Números</h1>
    <section class="general tabla" >
        <table width="30%" border=2>
            @php($n=1)
            @for ($n1 = 1; $n1 <= 10; $n1++)
                <tr>
                  @for($n2 = 1; $n2 <= 10; $n2++)
                      <td> {{$n}} </td>
                      @php($n=$n+1)
                  @endfor
                </tr>
            @endfor
        </table>
    </section>
@endsection
