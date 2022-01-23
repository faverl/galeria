<!-- Button to Open the Modal Agregar -->
@auth
    <button type="submit" class="btn btn-sm btn-outline-dark"
            data-toggle="modal" data-target="{{'#'."agregar".$modelo->getId()}}">Agregar
    </button>
    <div class="container">
        <!-- The Modal -->
        <div class="modal" id="{{"agregar".$modelo->getId()}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Seleccione Album Destino</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body contentcenter">
                        <form action="{{route("agregar",$modelo)}}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="album_id">Mis Albumes</label>
                                </div>
                                <select class="custom-select" name="album_id" id="album_id" required="true">
                                    <option></option>
                                    @foreach(auth()->user()->MisAlbumes as $album)
                                        <option value={{$album->getId()}}>{{$album->getTitulo()}}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                            <button type="submit" class="btn btn-sm btn-success">Agregar</button>
                        </form>
                        <button type="button" class="btn btn-sm btn-info" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endauth
