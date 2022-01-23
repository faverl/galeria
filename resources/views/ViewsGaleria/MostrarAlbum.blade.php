@extends("ViewsGaleria.plantillas.plantilla")

@section("cuerpo")

    @if(session('mensaje'))
        <div class="alert alert-success mt-4 pt-4 alert-dismissible fade show" role="alert">
            Álbum: <a href="#" class="alert-link">{{session('mensaje')}}</a> de forma correcta.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <main role="main">
        <div class="album bg-light">
            <div class="container">
                <div class="row mt-4 pt-4">
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow border-dark">
                            <img class="card-img-top" src="{{asset('imagenes/default.png')}}"
                                 data-holder-rendered="true">
                            <div class="card-body">
                                <div class="card-img-overlay text-white"><br>
                                    <h5 class="card-title">{{$album->getTitulo()}}</h5>
                                    <div class="card-text">{{$album->getDescripcion()}}</div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    @auth()
                                        @if($album->getUsuario()->getId() == auth()->user()->getId())
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-outline-secondary"
                                                   href="{{ route('album.edit',$album->getId())}}" role="button">Editar</a>
                                            </div>
                                            <div class="btn-group">
                                                <small class="text-muted">
                                                    <!--Modal para eliminar la album-->
                                                    @include("ViewsGaleria.plantillas.ModalEliminar", array('modelo' => $album, 'route'=>"album"))
                                                </small>
                                            </div>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                            <div class="card-footer">
                                <img class="img-fluid m-1"
                                     src="{{asset('imagenes/avatars/'.$album->getUsuario()->getAvatar()->getRutaImagen())}}"
                                     heigth="30" width="30px">
                                <small class="text-muted">{{$album->usuario->nickName}}</small>
                                <small class="text-mutedjustify-content-center">{{$album->created_at}}</small>
                            </div>
                        </div>
                    </div>

                    <!-- Comienza la seccion de Comentarios-->
                    <div class="col-md-8">
                        <div class="card mb-4 scrollcomentarios square scrollbar-cyan bordered-cyan">
                            <div class="card-header">
                                <!-- Se incluye formulario para agregar Comentarios -->
                                @include("ViewsGaleria.plantillas.FormComentario",array('modelo' => $album, 'type'=>"album"))
                            </div>
                            <div class="card-body pt-1 text-justify">
                                <!-- Se incluye plantilla que muestra los Comentarios, se envia modelo para ordenar-->
                                @include("ViewsGaleria.plantillas.Comentarios", array('modelo'=>$album))
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <hr>

    <div class="container">
        <h2>Imagenes del Album {{$album->getTitulo()}}</h2>
        <hr>
        <div class="btn-group">
            <a class="btn btn-sm btn-outline-primary" data-toggle="collapse" href="#collapseSubirImagen"
               aria-expanded="false" aria-controls="collapseSubirImagen">Subir Imagen</a>
        </div>
        <div class="collapse" id="collapseSubirImagen">
            <div class="container">
                <div class="row justify-content-center mt-4 pt-4">
                    <div class="col-md-7">
                        <h1 class="display-4">Subir Imagen</h1>
                        <hr class="bg-info">
                        <p class="text-danger small pt-0 mt-0">*Todos los Campos son Obligatorios</p>
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{$error}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">X</span>
                                </button>
                            </div>
                        @endforeach

                        <form method="post" action="{{route('imagen.store')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="album_id" id="album_id" value="{{$album->getId()}}">
                            <div class="row form-group">
                                <label for="nroorden" class="col-form-label col-md-4">Número Orden</label><br>
                                <select class="form-control col-md-2" name="numeroOrden" id="numeroOrden">
                                    @php
                                        $orden=1;
                                    @endphp
                                    @foreach($album->imagen as $imagen)
                                        <option>{{$orden++}}</option>
                                    @endforeach
                                    <option>{{$orden++}}</option>
                                </select>
                            </div>
                            <div class="row form-group">
                                <label for="titulo" class="col-form-label col-md-4">Título</label><br>
                                <div class="col-md-8">
                                    <input type="text" name="titulo" id="titulo" class="form-control" autofocus="true"
                                           value="{{old('titulo')}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="descripcion" class="col-form-label col-md-4">Descripción</label><br>
                                <div class="col-md-8">
                                    <input type="text" name="descripcion" id="descripcion" class="form-control"
                                           value="{{old('descripcion')}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="imagen" class="col-form-label col-md-4">Imagen</label><br>
                                <div class="col-md-8">
                                    <input type="file" name="imagen" id="imagen" class="form-control-sm">
                                </div>
                            </div>
                            <hr class="bg-info">
                            <div class="row form-group text-center">
                                <div class="col-md-6">
                                    <button type="submit" name="subir" id="subir"
                                            class="btn btn-sm btn-primary btn-responsive">
                                        Subir
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="reset" name="reset" id="reset"
                                            class="btn btn-sm btn-danger btn-responsive">
                                        Limpiar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="container">
        <div class="row justify-content-center mt-3 pt-3">
            @foreach($album->imagen()->orderBy('numeroOrden')->get() as $imagen)
                <div class="col-md-3">
                    <div class="card border border-success">

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group btn-group-sm">
                                <form action="{{ route('CambiarPosicion',['album' => $album, 'imagen' => $imagen, 'mover' => 'down'])}}" method="POST">
                                    @csrf
                                    <input type="submit" class="btn btn-sm btn-outline-success" value="Bajar">
                                </form>
                            </div>
                            <div>
                                {{$imagen->pivot->numeroOrden}}
                            </div>
                            <div class="btn-group btn-group-sm">
                                <form action="{{ route('CambiarPosicion',['album' => $album, 'imagen' => $imagen, 'mover' => 'up'])}}" method="POST">
                                    @csrf
                                    <input type="submit" class="btn btn-sm btn-outline-success" value="Subir">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 border border-dark">
                        <img class="card-img-top " src="{{asset('imagenes/'.$imagen->getImagen())}}">
                        <div class="card-body">
                            <div class="card-img-overlay text-white"><br>
                                <h5 class="card-title">{{$imagen->getTitulo()}}</h5>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-outline-primary"
                                       href="{{ route('imagen.show',$imagen->getId())}}">Ver</a>
                                </div>
                                <div class="btn-group">
                                    <form action="{{ route('Desvincular',['album' => $album, 'imagen' => $imagen])}}" method="POST">
                                        @csrf
                                        <input type="submit" class="btn btn-sm btn-outline-danger" value="Desvincular">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
