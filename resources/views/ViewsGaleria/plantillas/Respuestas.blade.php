<!-- Se comienza a mostrar las Respuesta -->
<hr>
<div class="btn-group mt-2">
    <a class="btn btn-sm btn-outline-primary" data-toggle="collapse" href="{{'#ListaRespuestas'.$comentario->getId()}}"
       aria-expanded="false" aria-controls="collapseSubirImagen">Respuestas ({{$comentario->ContarRespuestas()}})</a>
</div>
<div class="collapse" id="{{'ListaRespuestas'.$comentario->getId()}}">
    <div class="col-lg-10">
        @foreach($comentario->getRespuesta() as $respuesta)
            <div class="card mt-2 w-75 text-left">
                <div class="card-header bg-info p-1 align-items-lg-center d-flex justify-content-between">
                    <div>
                        <img class="img-fluid"
                             src="{{asset('imagenes/avatars/'.$respuesta->getUsuario()->getAvatar()->getRutaImagen())}}"
                             heigth="30px" width="30px">
                        <small class="text-white">{{$respuesta->getUsuario()->getNickName()}}</small>
                    </div>
                    <div class="bg-light rounded">
                        <small>
                            <!--Modal para eliminar la respuesta-->
                            @include("ViewsGaleria.plantillas.ModalEliminar", array('modelo' => $respuesta, 'route'=>"respuestas"))
                        </small>
                    </div>
                </div>
                <div class="card-body sm-text-left p-1">
                    <p class="card-text">{{$respuesta->getRespuesta()}}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
