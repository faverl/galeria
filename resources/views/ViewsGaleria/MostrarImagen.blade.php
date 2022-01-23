@extends("ViewsGaleria.plantillas.plantilla")

@section("cuerpo")
    <div class="container">
        <!--Boton de regresar-->
        <div class="text-left">
            <a href="{{ route('imagen.index') }}" class="btn btn-info btn-sm mt-4">
                Regresar
            </a>
        </div>
        <div class="row justify-content-center mt-2 pt-md-2">
            <div class="row flex-center">
                <div class="card col-lg-10">
                    <!-- Comienza card que muestra la imagen y su información -->
                    <div class="card-header m-1">
                        <img class="img-fluid m-1"
                            src="{{asset('imagenes/avatars/'.$imagen->getUsuario()->getAvatar()->getRutaImagen())}}"
                            heigth="30" width="30px">
                        <small class="text-muted">{{$imagen->getUsuario()->nickName}}</small><br>
                        <small class="text-muted">{{$imagen->ContarDias()}}</small>
                    </div>
                    <div class="card-body text-left">
                        <img class="card-img mb-3" src="{{asset('storage/'.$imagen->getImagen())}}">
                        <h6 class="card-subtitle">{{$imagen->getTitulo()}}</h6>
                        <hr class="bg-info">
                        <p class="card-text">{{$imagen->getDescripcion()}}</p>
                    </div>
                    <!-- Pie de la card donde estan los botones para Agregar, Editar o Eliminar la imagen -->
                    <div class="card-footer p-2 mb-2">
                        {{--Se agrega mensajes de error--}}
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{$error}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endforeach
                        <div class="d-flex justify-content-between align-items-center pb-2">
                            @auth()
                                <small class="text-muted">
                                    <!--Modal para agregar imagen a otro album-->
                                    @include("ViewsGaleria.plantillas.ModalAgregar", array('modelo' => $imagen))
                                </small>
                                @if($imagen->getUsuario()->getId() == auth()->user()->getId())
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-outline-secondary"
                                            href="{{ route('imagen.edit',$imagen->getId())}}" role="button">Editar</a>
                                    </div>
                                    <small class="text-muted">
                                        <!--Modal para eliminar la imagen-->
                                        @include("ViewsGaleria.plantillas.ModalEliminar", array('modelo' => $imagen, 'route'=>"imagen"))
                                    </small>
                                @endif
                            @endauth
                        </div>
                        <!-- Muestra mensaje cuando se actualiza información de la imagen -->
                        @if(session('actualizacion'))
                            <div class="alert alert-success">
                                {{session('actualizacion')}}
                            </div>
                        @endif
                    </div>
                </div>
                &nbsp;<!-- Comienza la seccion de comnetarios de la imagen-->
                <div class="card col-lg-10">
                    <div class="card-header mt-4 pt-1">
                        <!-- Se incluye formulario para agregar Comentarios -->
                        @include("ViewsGaleria.plantillas.FormComentario",array('modelo' => $imagen, 'type'=>"imagen"))
                    </div>
                    <div class="card-body pt-1 text-left">
                        <!-- Se incluye plantilla que muestra los comentarios-->
                        @include("ViewsGaleria.plantillas.Comentarios",array('modelo'=>$imagen))
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
