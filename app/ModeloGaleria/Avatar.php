<?php

namespace App\ModeloGaleria;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{

    protected $table = "avatar";
    protected $fillable = ["rutaImagen"];

    public function AvatarDefault()
    {
        $avatarDefault = Avatar::all()->where('rutaImagen', 'ghost.png');
        return $avatarDefault[0]->id;
    }

    public function GuardarAvatares()
    {

        if ($gestor = opendir('imagenes/avatars')) {

            $bandera = 1;

            while (false !== ($archivo = readdir($gestor))) {
                if ($archivo != "." && $archivo != "..") {
                    if ($bandera == 5) {
                        $bandera = 0;
                    }
                    $bandera++;
                    Avatar::create(["rutaImagen" => $archivo]);
                }
            }
            closedir($gestor);
        }
        return "Imagenes Agregadas";
    }

    public function ListarAvateres()
    {
        return Avatar::all()->except($this->AvatarDefault());
    }

    public function getRutaImagen()
    {
        return $this->rutaImagen;
    }

    public function getId()
    {
        return $this->id;
    }
}
