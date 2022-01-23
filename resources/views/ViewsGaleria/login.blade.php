@extends("ViewsGaleria.plantillas.plantilla")

@section("cuerpo")
<div class="container">
    <div class="row justify-content-center mt-4 pt-4">
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Login</h1>
                    <p class="text-danger small pt-1 mt-1">*Todos los Campos son Obligatorios</p>
                </div>
                <hr class="bg-info">
                <div class="panel-body">
                    @if(session('mensaje'))
                        <div class="alert alert-danger">
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

                    <form method="post" action="{{route('login')}}">
                        @csrf
                        <div class="form-group">
                            <label for="nickName" class="col-form-label">NickName</label><br>
                            <input type="text" name="nickName" id="nickName" class="form-control"
                                   value="{{old('nickName')}}" placeholder="Ingrese su nickname">
                        </div>
                        <div class="form-group">
                            <label for="clave" class="col-form-label">Contraseña</label><br>
                            <input type="password" name="password" id="password"
                                   class="form-control" placeholder="Ingrese su contraseña">
                        </div>
                        <hr class="bg-info">
                        <div class="row form-group text-center">
                            <button type="submit" name="ingresar" id="ingresar" class="btn btn-primary btn-block">
                                Ingresar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
