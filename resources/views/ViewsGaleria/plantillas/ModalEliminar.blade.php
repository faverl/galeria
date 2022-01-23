<!-- Button to Open the Modal Eliminacion -->
@auth
    @if(isset($imagen))
        @php($contenedor=$imagen)
    @elseif(isset($album))
        @php($contenedor=$album)
    @endif
    @if($modelo->getUsuario()->getId() == auth()->user()->getId() || $contenedor->getUsuario()->getId() == auth()->user()->getId())
        <button type="submit" class="btn btn-sm btn-outline-danger"
                data-toggle="modal" data-target="{{'#'.$route.$modelo->getId()}}">Eliminar
        </button>
        <div class="container">
            <!-- The Modal -->
            <div class="modal" id="{{$route.$modelo->getId()}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Confirme la eliminacion</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body contentcenter">
                            @if ($route != "")
                                Desea eliminar
                                @if ($route == "album")
                                    el Album: <span style='color:#0000ff'>{{$modelo->titulo}}</span>?<br>
                                    Se eliminara el Album y todo su contenido relacionado
                                @elseif ($route == "imagen")
                                    la Imagen: <span style='color:blue'>{{$modelo->titulo}}</span>?<br>
                                    Se eliminaran todos los Comentarios y Respuestas Relacionadas
                                @elseif ($route == "comentarios")
                                    el Comentario: <span style='color:blue'>{{$modelo->comentario}}</span>?<br>
                                    Se eliminaran todas las Respuestas Relacionadas
                                @elseif ($route == "respuestas")
                                    la Respuesta: <span style='color:blue'>{{$modelo->respuesta}}</span>?<br>
                                @endif
                            @else
                                No hay Datos para Eliminar
                            @endif
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <form action="{{ route("$route".".destroy",$modelo->getId()) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>

                            <button type="button" class="btn btn-sm btn-info" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endauth
