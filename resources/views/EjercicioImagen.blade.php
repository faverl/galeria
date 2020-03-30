@extends("plantillas.ejercicios")


@section("cabecera")
@endsection

@section("cuerpo")
  <div class="imagenes">
    <ul>
      @foreach($imagenes as $imagen)
        <li>
          <img src="{{$imagen->getRuta()}}"  width="100" height="100">
          <h3>{{$imagen->getNombre()}}</h3>
          <p>{{$imagen->getDescripcion()}}</p>
        </li>
      @endforeach
    </ul>
  </div>
@endsection
