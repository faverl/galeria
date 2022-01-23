@extends("ViewsGaleria.plantillas.plantilla")

@section("cabecera")

@endsection

@section("cuerpo")
    <div class="container">
        <div class="row justify-content-center mt-4 pt-4">
            <div class="col-md-7">
                <h1 class="display-4">Subir Imagen</h1>
                <hr class="bg-info">
                <p class="text-danger small pt-0 mt-0">*Todos los Campos son Obligatorios</p>
                @if(session('mensaje'))
                    <div class="alert alert-success">
                        {{session('mensaje')}}
                    </div>
                @endif
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
                    <div class="row form-group">
                        <label for="titulo" class="col-form-label col-md-4">Titulo</label><br>
                        <div class="col-md-8">
                            <input type="text" name="titulo" id="titulo" class="form-control" autofocus="true" value="{{old('titulo')}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="descripcion" class="col-form-label col-md-4">Descripcion</label><br>
                        <div class="col-md-8">
                            <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{old('descripcion')}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="imagen" class="col-form-label col-md-4">Imagen</label><br>
                        <div class="col-md-8">
                            <input type="file" name="imagen" id="imagen" class="form-control">
                        </div>
                    </div>
                    <hr class="bg-info">
                    <div class="row form-group text-center">
                        <div class="col-md-6">
                            <button type="submit" name="subir" id="subir" class="btn btn-info btn-responsive">
                                Subir
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button type="reset" name="reset" id="reset" class="btn btn-info btn-responsive">
                                Limpiar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section("pie")
@endsection
