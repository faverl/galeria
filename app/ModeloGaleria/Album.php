<?php

namespace App\ModeloGaleria;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\ModeloGaleria\Comentario;
use App\ModeloGaleria\Usuario;
use phpDocumentor\Reflection\Types\This;
use test\Mockery\ReturnTypeObjectTypeHint;
use function GuzzleHttp\Promise\iter_for;

class Album extends Model
{
    protected $table = "album";
    protected $fillable = ["titulo", "descripcion", "usuario_id"];

    //Relaciones

    public function comentarios()
    {
        return $this->morphMany('App\ModeloGaleria\Comentario', 'comentario');
    }

    public function usuario()
    {
        return $this->belongsTo('App\ModeloGaleria\Usuario');
    }

    public function modelo()
    {
        return "App\ModeloGaleria\Album";
    }

    public function imagen()
    {
        return $this->belongsToMany('App\ModeloGaleria\Imagen')->withPivot('id', 'numeroOrden');
    }

    public function CrearAlbum($album)
    {
        $album->save();
    }

    public function ActualizarAlbum(Album $album)
    {
        $album->save();
    }

    public function EliminarAlbum(Album $album)
    {
        //Elimina los comentarios
        foreach ($album->ConsultarComentarios() as $comentario) {
            $comentario->EliminarComentario($comentario);
        }
        //Elimina la Relacion con todas las Imagenes
        $album->imagen()->detach();
        //Elimina El album
        $album->delete();
    }

    public function ConsultarComentarios()
    {
        return $this->comentarios;
    }

    public function ConsultarAlbum($album_id)
    {
        return $this->find($album_id);
    }

    // Funciones Getter and Setter

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function setUsuarioId(Usuario $usuario)
    {
        $this->usuario_id = $usuario->getId();
    }

    public function getImagenes()
    {
        return $this->imagenes;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getFechaCreacion()
    {
        return $this->created_at;
    }

    public function ComentarioOrdenado()
    {
        $comentarios = $this->comentarios;

        $ordenados = $comentarios->sortByDesc('id');
        return $ordenados->values()->all();
    }

    public function ContarComentarios()
    {
        $resultado = count($this->ConsultarComentarios());
        return $resultado;
    }

    public function ActualizarPosicion($numeroOrden)
    {
        $imagenes = $this->imagen;

        foreach ($imagenes as $imagen) {
            $orden = $imagen->pivot->numeroOrden;
            if ($orden >= $numeroOrden) {
                $this->imagen()->sync([$imagen->getId() => ['numeroOrden' => $orden + 1]], false);
            }
        }
    }

    public function CambiarPosicion(Imagen $imagen, $mover)
    {

        $imagen = $this->imagen->where('id', $imagen->getId())->first();
        $ordenActual = $imagen->pivot->numeroOrden;
        $mensaje = "";
        switch ($mover) {

            case "up":
                if ($ordenActual == count($this->imagen)) {
                    $mensaje = "No se puede mover la imagen";
                } else {
                    //Consulto la siguiente al orden actual
                    foreach ($this->imagen as $newImagen) {
                        if ($newImagen->pivot->numeroOrden == $ordenActual + 1) {
                            $this->imagen()->sync([$newImagen->getId() => ['numeroOrden' => $ordenActual]], false);
                            $this->imagen()->sync([$imagen->getId() => ['numeroOrden' => $ordenActual + 1]], false);
                        }
                    }
                    $mensaje = "Se actuliza orden de imagen";
                }
                break;

            case"down":

                if ($ordenActual == 1) {
                    $mensaje = "No se puede mover la imagen";
                } else {
                    //Consulto la siguiente al orden actual
                    foreach ($this->imagen as $newImagen) {
                        if ($newImagen->pivot->numeroOrden == $ordenActual - 1) {
                            $this->imagen()->sync([$newImagen->getId() => ['numeroOrden' => $ordenActual]], false);
                            $this->imagen()->sync([$imagen->getId() => ['numeroOrden' => $ordenActual - 1]], false);
                        }
                    }
                    $mensaje = "Se actualiza imagen";
                }
                break;
        }
        return $mensaje;
    }

    public function Desvincular($album, $imagen)
    {
        $imagen = $this->imagen->where('id', $imagen->getId())->first();
        $orden = $imagen->pivot->numeroOrden;
        foreach ($this->imagen as $newImagen) {
            $newOrden = $newImagen->pivot->numeroOrden;
            if ($newOrden>$orden) {
                $this->imagen()->sync([$newImagen->getId() => ['numeroOrden' => $newOrden - 1]], false);
            }
        }
        $album->imagen()->detach($imagen->getId());

        return " Se desvincula imagen. ";
    }
}
