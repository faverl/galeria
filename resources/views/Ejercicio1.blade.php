@extends("plantillas.ejercicios")

@section("cabecera")
@endsection

@section("cuerpo")
<section class="general">
    <?php
        $ini = "Hola";
        $fin = " a Todos";
        $todo = $ini.$fin;
        echo $todo;
    ?>
</section>
@endsection
