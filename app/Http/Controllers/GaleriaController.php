<?php

namespace App\Http\Controllers;

use App\ModeloGaleria\Album;
use App\ModeloGaleria\Imagen;
use Illuminate\Http\Request;
use App\ModeloGaleria\Avatar;
use App\ModeloGaleria\Persona;
use App\ModeloGaleria\Usuario;
use Illuminate\Support\Facades\Auth;

class GaleriaController extends Controller
{

    public function home()
    {
        return view('ViewsGaleria/home');
    }

    public function RegistroUser(Request $request)
    {
        $persona = new Persona();
        $usuario = new Usuario();

        $request->validate([
            'cedula' => 'required|unique:persona',
            'nombre' => 'required',
            'nickName' => 'required|unique:usuario',
            'password' => 'required',
            'avatar_id' => 'required'
        ]);

        $persona->setCedula($request->input('cedula'));
        $persona->setNombre($request->input('nombre'));
        $persona->CrearPersona($persona);

        $usuario->setPersonaId($persona);
        $usuario->setNickName($request->input('nickName'));
        $usuario->setPassword($request->input('password'));
        $usuario->setAvatarId($request->input('avatar_id'));
        $usuario->CrearUsuario($usuario);

        $logueo = $request->only('nickName','password');

        Auth::attempt($logueo);
        return redirect()->route('home')->with('mensaje', "Su Usuario fue creado");
    }

    public function RegistrarUsuario()
    {
        $avatares = new Avatar();
        $avatares = $avatares->ListarAvateres();
        return view('ViewsGaleria/RegistrarUsuario', compact("avatares"));
    }

    public function Agregar(Request $request, Imagen $imagen)
    {
        $request->validate([
            'album_id' => 'required|numeric'
        ]);

        $album = new Album();
        $album = $album->ConsultarAlbum($request->input('album_id'));
        $resultado = $imagen->RelacionarAlbum($imagen, $album,1);
        if ($resultado) {
            return back()->with('actualizacion', "Se agrego la imagen " . $imagen->getTitulo() . "al album " . $album->getTitulo());
        } else {
            return back()->with('actualizacion', "La imagen " . $imagen->getTitulo() . " ya pertenece al album " . $album->getTitulo());
        }
    }

    public function CambiarPosicion(Request $request, Album $album, Imagen $imagen, $mover)
    {
        $mensaje = $album->CambiarPosicion($imagen, $mover);
        return back()->with('actualizacion', $mensaje . $imagen->getTitulo());

    }

    public function Desvincular(Request $request, Album $album, Imagen $imagen)
    {
        $mensaje = $album->Desvincular($album, $imagen);
        return back()->with('actualizacion', $mensaje . $imagen->getTitulo());

    }
}
