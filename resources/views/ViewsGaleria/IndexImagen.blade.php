@extends("ViewsGaleria.plantillas.plantilla")

@section("cuerpo")
    @if(session('mensaje'))
        <div class="alert alert-success">
            <hr class="bg-info">
            {{session('mensaje')}}
            <hr class="bg-info">
        </div>
    @endif
    <div class="p-5">
        <div class="row mt-4 p-2">
            @foreach($imagenes as $imagen)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-lg-2">
                    <div class="card float-left h-100">
                        <div class="card-header">
                            <img class="img-fluid m-1"
                                 src="{{asset('imagenes/avatars/'.$imagen->getUsuario()->getAvatar()->getRutaImagen())}}"
                                 heigth="30px" width="30px">
                            <small class="text-muted">{{$imagen->getUsuario()->nickName}}</small>
                            <small class="text-muted">{{$imagen->getFechaCreacion()}}</small>
                        </div>
                        <a href="{{ route('imagen.show',$imagen->getId())}}">
                            <img class="card-img-top h-100" src="{{asset('imagenes/'.$imagen->getImagen())}}">
                        </a>
                        <div class="card-body">
                            <h6 class="card-subtitle">{{$imagen->getTitulo()}}</h6>
                            <p class="card-text">{{$imagen->getDescripcion()}}</p>
                        </div>
                        <div class="card-footer d-flex">
                            <small class="text-muted">
                                <a class="btn btn-sm btn-outline-secondary"
                                   href="{{ route('imagen.show',$imagen->getId())}}">Comentar</a>
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
