@extends("ViewsGaleria.plantillas.plantilla")

@section("cuerpo")
    <div class="container">
        <div class="row justify-content-center mt-4 pt-4">
            <div class="col-md-7">
                <h1 class="display-4">Registrar Usuario</h1>
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
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endforeach

                <form method="post" action="RegistroUser">
                    @csrf
                    <div class="row form-group">
                        <label for="cedula" class="col-form-label col-md-4">Cedula</label><br>
                        <div class="col-md-8">
                            <input type="text" name="cedula" id="cedula" class="form-control" autofocus="true" value="{{old('cedula')}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="nombre" class="col-form-label col-md-4">Nombre</label><br>
                        <div class="col-md-8">
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="nickName" class="col-form-label col-md-4">NickName</label><br>
                        <div class="col-md-8">
                            <input type="text" name="nickName" id="nickName" class="form-control" value="{{old('nickName')}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="password" class="col-form-label col-md-4">Password</label><br>
                        <div class="col-md-8">
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-form-label col-md-4">Seleccione un Avatar</label><br>
                        <div class="col-md-8" >
                            @foreach($avatares as $avatar)
                                <input class="InactivaRadio seleccionRadio" type="radio" name="avatar_id" id="{{$avatar->getId()}}" value="{{$avatar->getId()}}">
                                <label class="labelAvatar" for="{{$avatar->getId()}}">
                                    <img src="imagenes\avatars\{{$avatar->rutaImagen}}" width="75px" height="75px" >
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <hr class="bg-info">
                    <div class="row form-group text-center">
                        <div class="col-md-6">
                            <button type="submit" name="enviar" id="enviar" class="btn btn-info btn-responsive">
                                Registrar
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
