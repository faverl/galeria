<?php

namespace App\ModeloGaleria;

use App\ModeloGaleria\Avatar;
use App\ModeloGaleria\Persona;
use Illuminate\Database\Eloquent\Model;
use App\ModeloGaleria\Comentario;
use App\ModeloGaleria\Respuesta;
use App\ModeloGaleria\Album;
use App\ModeloGaleria\Imagen;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;


class Usuario extends Authenticatable
{

    protected $table = "usuario";

    protected $fillable = [
        'persona_id', 'nickName', 'password', 'avatar_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relaciones con otros modelos

    public function imagen()
    {
        return $this->hasMany('App\ModeloGaleria\Imagen');
    }

    public function album()
    {
        return $this->hasMany('App\ModeloGaleria\Album');
    }

    public function persona()
    {
        return $this->belongsTo('App\ModeloGaleria\Persona');
    }

    public function comentario()
    {
        return $this->hasMany('App\ModeloGaleria\Comentario');
    }

    public function respuesta()
    {
        return $this->hasMany('App\ModeloGaleria\Respuesta');
    }

    public function avatar()
    {
        return $this->belongsTo('App\ModeloGaleria\Avatar');
    }

    //Manejo de consultas a base de datos

    public function CrearUsuario(Usuario $usuario)
    {
        $usuario->save();
    }

    public function MisAlbumes()
    {
        return $this->album();
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    //Getter and Setter

    public function getId()
    {
        return $this->id;
    }

    public function setPersonaId(Persona $persona)
    {
        $this->persona_id = $persona->getId();
    }

    public function setAvatarId($avatarId)
    {
        $this->avatar_id = $avatarId;
    }

    public function setNickName($nickname)
    {
        $this->nickName = $nickname;
    }

    public function getNickName()
    {
        return $this->nickName;
    }

    public function setPassword($password)
    {
        $this->password = Hash::make($password);
    }

    public function getUsuario($id)
    {
        $usuario = new Usuario();
        $usuario = $this->find($id);

        return $usuario;
    }
}
