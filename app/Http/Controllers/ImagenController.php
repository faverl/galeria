<?php

namespace App\Http\Controllers;

use App\ModeloGaleria\Album;
use App\ModeloGaleria\Imagen;
use Illuminate\Http\Request;
use App\ModeloGaleria\Usuario;
use App\ModeloGaleria\Comentario;
use App\ModeloGaleria\Avatar;
use phpDocumentor\Reflection\Types\Self_;


class ImagenController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy','MyImagenes']]);
    }

    /**
     * Muestra las imagenes que se han subido al sitio web
     */
    public function index()
    {
        $imagenes = Imagen::all();
        return view('ViewsGaleria/IndexImagen', compact("imagenes"));
    }

    /**
     * Llama a la vista que contiene el formulario para subir una nueva imagen
     */
    public function create()
    {
        return view('ViewsGaleria/SubirImagen');
    }

    /**
     * Recibe los datos del formulario para subir foto, guarda la imagen en una variable,
     * los datos y la imagen se envian al modelo para crearla en la db.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image',
        ]);

        $imagen = new Imagen();
        $imagen->usuario_id = auth()->user()->id;
        $imagen->setTitulo($request->input('titulo'));
        $imagen->setDescripcion($request->input('descripcion'));
        $imagen->setImagen($imagen->ProcesarImagen($request->file('imagen')));
        $imagen->CrearImagen($imagen);

        //Validación al crear una imagen desde un album -- para asociar
        if (!empty($album_id = $request->input('album_id'))) {
            $album = new Album();
            $album = $album->find($album_id);
            $album->ActualizarPosicion($request->input('numeroOrden'));
            $imagen->RelacionarAlbum($imagen,$album, $request->input('numeroOrden'));
                return back()->with('mensaje', " Imagen " . $imagen->getTitulo() . " se subio en el album");
        } else {
            return redirect()->route('imagen.index')
                ->with('mensaje', "Se subio imagen " . $imagen->getTitulo() . " de forma correcta sin album");
        }
    }

    /**
     * Recibe una imagen, consulta los comentarios y llama la vista y poder trabajar con ella
     */
    public function show(Imagen $imagen)
    {
        return view('ViewsGaleria/MostrarImagen', compact('imagen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Imagen $imagen)
    {
        return view('ViewsGaleria/EditarImagen', compact('imagen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Imagen $imagen)
    {
        $datosImagen = $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
        ]);

        $imagen->ActualizarImagen($datosImagen, $imagen);

        return redirect()->route('imagen.show', $imagen->getId())
            ->with('actualizacion', "Se actualizo imagen de forma correcta");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Imagen $imagen)
    {
        $imagen->EliminarImagen($imagen);

        return redirect()->route('imagen.index')
            ->with('mensaje', "Se elimino imagen de forma correcta");
    }

    public function MyImagenes()
    {
        $usuario = new Usuario();
        $usuario = $usuario->getUsuario(auth()->user()->getAuthIdentifier());
        $imagenes = $usuario->imagen;

        return view('ViewsGaleria/IndexImagen', compact("imagenes"));
    }
}
