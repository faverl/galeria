@extends("ViewsGaleria.plantillas.plantilla")
@section("cuerpo")

@if(session('mensaje'))
    <div class="alert alert-success mt-4 pt-4 alert-dismissible fade show" role="alert">
        Album: <a href="#" class="alert-link">{{session('mensaje')}}</a> de forma correcta.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<main role="main">
    <div class="album bg-light">
        <div class="container">
            <div class="row mt-4 pt-4">
                @foreach($albumes as $album)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow border-primary">
                        <img class="card-img-top" src="{{asset('imagenes/default.png')}}" data-holder-rendered="true">
                        <div class="card-body">
                            <div class="card-img-overlay text-white">
                                <br><br><br>
                                <h5 class="card-title">{{$album->titulo}}</h5>
                            </div>
                            <p class="card-text">{{$album->descripcion}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-outline-primary" href="{{ route('album.show',$album->id)}}" role="button">Ver</a>
                                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('album.edit',$album->id)}}" role="button">Editar</a>
                                </div>
                                <div class="btn-group">
                                    <form action="{{ route('album.destroy',$album->getId()) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection
