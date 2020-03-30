@extends("plantillas.ejercicios")

@section("cabecera")
@endsection

@section("cuerpo")
    <h1 class="titulo">Números</h1>
    <section class="general tabla" >
        <table width="30%" border=2>
            @php($n=1)
            <?php
              define("TAM",10);
            ?>
            @for ($n1 = 1; $n1 <= TAM; $n1++)
                @if($n1 % 2 == 0)
                    <tr bgcolor=#bdc3d6>
                @else
                    <tr>
                @endif
                    @for($n2 = 1; $n2 <= TAM; $n2++)
                        <td> {{$n}} </td>
                        @php($n=$n+1)
                    @endfor
                    </tr>
            @endfor
        </table>
    </section>
@endsection
