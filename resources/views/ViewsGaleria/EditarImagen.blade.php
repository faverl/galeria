@extends("ViewsGaleria.plantillas.plantilla")

@section("cuerpo")
    @if(session('mensaje'))
        <div class="alert alert-success">
            <hr class="bg-info">
            {{session('mensaje')}}
            <hr class="bg-info">
        </div>
    @endif
    <div class="container">
        <div class="col-lg-12 mb-md-4">
            <h1 class="display-4">Editar Imagen</h1>
        </div>

        <div class="d-lg-flex w-100">
            <div class="w-50">
                <div class="card mb-5">

                    <div class="card-body">
                        <img class="card-img mb-2" src="{{asset('imagenes/'.$imagen->imagen)}}">
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">{{$imagen->created_at}}</small>
                        <small class="text-muted">{{$imagen->usuario->nickName}}</small>
                    </div>
                </div>
            </div>
            <div class="w-50">
                <form method="post" action="{{route('imagen.update', $imagen->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method ('PUT')
                    <div class="row form-group">
                        <label for="titulo" class="col-form-label col-md-4">Titulo</label><br>
                        <div class="col-md-6">
                            <input type="text" name="titulo" id="titulo" class="form-control"
                                   value="{{$imagen->titulo}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="descripcion" class="col-form-label col-md-4">Descripcion</label><br>
                        <div class="col-md-6">
                            <textarea name="descripcion"
                                      id="descripcion"
                                      class="form-control"
                                      rows="5">{{$imagen->descripcion}}</textarea>
                        </div>
                    </div>
                    <hr class="bg-info">
                    <div class="row form-group text-center">
                        <div class="col-md-6">
                            <button type="submit" name="actualizar" id="actualizar" class="btn btn-info btn-responsive">
                                Actualizar
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button type="reset" name="regresar" id="regresar" class="btn btn-info btn-responsive">
                                Regresar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
