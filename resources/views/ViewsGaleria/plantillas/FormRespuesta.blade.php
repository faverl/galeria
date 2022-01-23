<hr>
<div class="col-lg-10">
    <form class="form-inline" method="post" action="{{route('respuestas.store')}}">
        @csrf
        <input type="hidden" name="comentario" value="{{$comentario->getId()}}">
        <div class="form-group ml-1 w-75">
            <textarea class="form-control form-control-sm w-100" name="respuesta" id="respuesta"
                      rows="1" placeholder="Escriba aquí su respuesta"></textarea>
            <!-- Muestra errores generados al intentar agregar una respuesta -->
            @foreach ($errors->get('respuesta') as $error)
                <div class="alert-danger alert-dismissible">
                    {{$error}}
                </div>
            @endforeach
        </div>
        <div class="form-group">
            <input type="submit" class="ml-1 btn btn-sm btn-success" value="Enviar">
        </div>
    </form>
</div>



