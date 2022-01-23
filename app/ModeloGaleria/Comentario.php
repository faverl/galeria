<?php

namespace App\ModeloGaleria;

use Illuminate\Database\Eloquent\Model;
use App\ModeloGaleria\Imagen;
use App\ModeloGaleria\Respuesta;
use App\ModeloGaleria\Usuario;

class Comentario extends Model
{

    protected $fillable = ["comentario", "comentario_id", "comentario_type", "usuario_id"];

    public function comentario()
    {
        return $this->morphTo();
    }

    public function usuario()
    {
        return $this->belongsTo('App\ModeloGaleria\Usuario');
    }

    public function respuesta()
    {
        return $this->hasMany('App\ModeloGaleria\Respuesta');
    }

    public function CrearComentario($comentario)
    {
        $comentario->save();
    }

    //Comienza metodos getter an setter

    public function setComentarioType($comentarioType)
    {
        $this->comentario_type = $comentarioType;
    }

    public function setUsuarioId($usuarioId)
    {
        $this->usuario_id = $usuarioId;
    }

    public function setComentarioId($comentarioId)
    {
        $this->comentario_id = $comentarioId;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    }

    public function getComentario()
    {
        $comentarios = $this->comentario;
        return $comentarios;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getRespuesta()
    {
        return $this->respuesta;
    }

    //Metodos del modelo

    public function ContarRespuestas()
    {
        $resultado = count($this->getRespuesta());
        return $resultado;
    }

    public function ValidarModelo($nombreModelo)
    {
        if ($nombreModelo == "imagen") {
            return "App\ModeloGaleria\Imagen";
        } elseif ($nombreModelo == "album") {
            return "App\ModeloGaleria\Album";
        }
    }

    public function EliminarComentario(Comentario $comentario)
    {
        foreach ($this->getRespuesta() as $respuesta) {
            $respuesta->EliminarRespuesta($respuesta);
        }
        $comentario->delete();
    }
}
