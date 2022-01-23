<?php

namespace App\ModeloGaleria;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\ModeloGaleria\Comentario;
use App\ModeloGaleria\Usuario;
use phpDocumentor\Reflection\Types\This;

class Imagen extends Model
{

    protected $table = "imagen";
    protected $fillable = ["titulo", "imagen", "descripcion", "usuario_id"];

    //Relaciones entre modelos

    public function album()
    {
        return $this->belongsToMany('App\ModeloGaleria\Album')->withPivot('id', 'numeroOrden')->withTimestamps();
    }

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
        return "App\ModeloGaleria\Imagen";
    }

    // Funciones del modelo

    public function CrearImagen(Imagen $imagen)
    {
        $imagen->save();
    }

    public function ActualizarImagen($datosImagen, $imagen)
    {
        $imagen->titulo = $datosImagen['titulo'];
        $imagen->descripcion = $datosImagen['descripcion'];
        $imagen->save();
    }

    public function EliminarImagen(Imagen $imagen)
    {
        foreach ($this->ConsultarComentarios() as $comentario) {
            $comentario->EliminarComentario($comentario);
        }

        //Elimina la Relacion con todos los Album
        $imagen->album()->detach();
        $imagen->delete();

        $files = glob('storage/' . $imagen->getImagen());
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            } // delete file
        }
    }

    public function ConsultarComentarios()
    {
        return $this->comentarios;
    }

    public function RelacionarAlbum(Imagen $imagen, Album $album, $numeroPosicion)
    {
        $asociado = false;
        $albumes = $imagen->album;
        foreach ($albumes as $newAlbum) {

            if ($newAlbum->getId() == $album->getId()) {
                $asociado = true;
            }
        }
        if (!$asociado) {
            $album->ActualizarPosicion($numeroPosicion);
            $imagen->album()->attach($album->getId(), ['numeroOrden' => $numeroPosicion]);
            return true;
        } else {
            return false;
        }
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

    public function ContarDias()
    {
        $fechaActual = Carbon::now();
        $fechaActual = $fechaActual->format('d-m-Y');
        $fechaCreacion = $this->getFechaCreacion();
        $fechaCreacion = $fechaCreacion->format('d-m-Y');
        $cantidad = Carbon::parse("$fechaCreacion")->diffAsCarbonInterval("$fechaActual");
        return $cantidad;
    }

    // Funciones Getter and Setter

    public function getId()
    {
        return $this->id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getImagen()
    {
        return $this->imagen;
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

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function setAlbumId($album_id)
    {
        $this->album_id = $album_id;
    }

    public function setNumeroOrden($numeroOrden)
    {
        $this->numeroOrden = $numeroOrden;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function ProcesarImagen($imagenFile)
    {
        $date = Carbon::now();
        $nuevoNombreImagen = "IMG-" . $date->year . $date->month . $date->day . $date->hour . $date->minute . $date->second .
            $date->milliseconds . "." . $imagenFile->getClientOriginalExtension();
        $imagenFile->move('storage', $nuevoNombreImagen);
        return $nuevoNombreImagen;
    }
}
