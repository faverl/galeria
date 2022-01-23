<form method="post" action="{{route('comentarios.store')}}">
    @csrf
    <input type="hidden" name="comentario_id" value="{{$modelo->getId()}}">
    <input type="hidden" name="comentario_type" value="{{$type}}">
    <div class="form-group text-sm-left">
        <label for="comentario">Agregar Comentario:</label>
        <textarea class="form-control form-control-sm" name="comentario" id="comentario"
                  rows="3"></textarea>
        <!-- Muestra errores generado al intentar agregar un comentario -->
        @foreach ($errors->get('comentario') as $error)
            <div class="alert-danger alert-dismissible">
                {{ $error}}
            </div>
        @endforeach
    </div>
    <input type="submit" class="btn btn-sm btn-outline-primary" value="Comentar">
</form>
