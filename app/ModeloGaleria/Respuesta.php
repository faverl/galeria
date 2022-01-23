<?php

namespace App\ModeloGaleria;

use Illuminate\Database\Eloquent\Model;
use App\ModeloGaleria\Usuario;
use App\ModeloGaleria\Comentario;

class Respuesta extends Model
{
    protected $fillable = ["respuesta", "comentario_id", "usuario_id"];

    public function usuario()
    {
        return $this->belongsTo('App\ModeloGaleria\Usuario');
    }

    public function comentario()
    {
        return $this->belongsTo('App\ModeloGaleria\Comentario');
    }

    public function CrearRespuesta($respuesta)
    {
        $respuesta->save();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRespuesta()
    {
        return $this->respuesta;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function EliminarRespuesta(Respuesta $respuesta)
    {
        $respuesta->delete();
    }

    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id=$usuario_id;
    }

    public function setRespuesta($respuesta)
    {
        $this->respuesta=$respuesta;
    }

    public function setComentarioId($comentario_id)
    {
        $this->comentario_id = $comentario_id;
    }

}
