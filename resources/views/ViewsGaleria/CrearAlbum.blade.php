@extends("ViewsGaleria.plantillas.plantilla")

@section("cuerpo")
<div class="container">
    <div class="row justify-content-center mt-4 pt-4">
        <div class="col-md-7">
            <h1 class="display-4">Crear Album</h1>
            <hr class="bg-info">
            <p class="text-danger small pt-0 mt-0">*Todos los Campos son Obligatorios</p>
            @if(session('mensaje'))
                <div class="alert alert-success" role="alert">
                    {{session('mensaje')}}
                </div>
            @endif

            @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{$error}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endforeach

            <form method="post" action="{{route('album.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="titulo" class="col-form-label col-md-4">Titulo</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" autofocus="true"
                        value="{{old('titulo')}}">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="3"
                        value="{{old('descripcion')}}"></textarea>
                </div>
                <hr class="bg-info">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="submit" name="save" id="save" class="btn btn-sm btn-outline-primary btn-responsive">
                            Guardar
                        </button>
                    </div>
                    <small class="text-muted">
                        <a class="btn btn-sm btn-outline-danger" href="{{ route('album.index') }}"
                            role="button">Cancelar</a>
                    </small>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
