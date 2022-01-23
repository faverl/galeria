<?php

namespace App\ModeloGaleria;

use Illuminate\Database\Eloquent\Model;
use App\ModeloGaleria\Usuario;

class Persona extends Model
{
    protected $table = "persona";
    protected $fillable = ["cedula", "nombre"];

    public function usuario()
    {
        return $this->hasOne('App\ModeloGaleria\Usuario');
    }

    public function CrearPersona(Persona $persona)
    {
        $persona->save();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }

    public function getCedula()
    {
        return $this->cedula;
    }

    public function setNombre($nombre)
    {
        return $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
}
