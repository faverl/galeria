<!-- Se comienza a mostrar los comentarios -->
<div class="btn-group mt-2">
    <a class="btn btn-sm btn-outline-primary" data-toggle="collapse" href="#ListaComentarios"
       aria-expanded="false" aria-controls="collapseSubirImagen">Comentarios ({{$modelo->ContarComentarios()}})</a>
</div>
<div class="collapse" id="ListaComentarios">
    @foreach($modelo->ComentarioOrdenado() as $comentario)
        <div class="card mt-2">
            <div class="card-header bg-primary text-left p-1 align-items-lg-center d-flex justify-content-between">
                <div>
                    <img class="img-fluid"
                         src="{{asset('imagenes/avatars/'.$comentario->getUsuario()->getAvatar()->getRutaImagen())}}"
                         heigth="30px" width="30px">
                    <small class="text-white">{{$comentario->getUsuario()->getNickName()}}</small>
                </div>
                <div class="bg-light rounded">
                    <small>
                        <!--Modal para eliminar el Comentario-->
                        @include("ViewsGaleria.plantillas.ModalEliminar", array('modelo' => $comentario, 'route'=>"comentarios"))
                    </small>
                </div>
            </div>
            <div class="card-body sm-text-left">
                <p class="card-text">{{$comentario->getComentario()}}</p>
            </div>
            <div class="card-footer text-sm-right bg-light rounded">
                <!-- Se incluye plantilla del formulario de respuesta -->
                @include("ViewsGaleria.plantillas.FormRespuesta")
                @include("ViewsGaleria.plantillas.Respuestas")
            </div>
        </div>
    @endforeach
</div>

