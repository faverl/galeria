@extends("plantillas.ejercicios")

@section("cabecera")
@endsection

@section("cuerpo")

<section class="general">
    <table width="40%" border="1">
      <tr>
        <td>Primer Número</td>
        <td>{{$num1}}</td>
      </tr>
      <tr>
        <td>Segundo Número</td>
        <td>{{$num2}}</td>
      </tr>
      <tr>
        <td>Resultado Suma</td>
        <td>
          @php
            $suma=$num1+$num2;
            echo $suma;
          @endphp
        </td>
      </tr>
    </table>
</section>

@endsection
