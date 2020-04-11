@extends("plantillas.ejercicios")


@section("cabecera")
@endsection

@section("cuerpo")
  <div>
    <ul>
      @foreach($imagenes as $imagen)
        <li>
          <img src="{{$imagen->getImagen()}}"  width="100" height="100">
        </li>
      @endforeach
    </ul>
  </div>
@endsection
