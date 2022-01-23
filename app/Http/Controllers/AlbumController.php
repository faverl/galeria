<?php

namespace App\Http\Controllers;

use App\ModeloGaleria\Album;
use App\ModeloGaleria\Imagen;
use App\ModeloGaleria\Usuario;
use Illuminate\Http\Request;
use App\ModeloGaleria\Comentario;
use App\ModeloGaleria\Avatar;

class AlbumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy','MyAlbumes']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albumes = Album::all();
        return view('ViewsGaleria/IndexAlbum', compact("albumes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ViewsGaleria/CrearAlbum');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosAlbum = $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
        ]);

        $album = new Album();
        $album->setTitulo($request->input('titulo'));
        $album->setDescripcion($request->input('descripcion'));
        $album->setUsuarioId(auth()->user());
        $album->CrearAlbum($album);

        return redirect()->route('album.index')->with('mensaje', $album->getTitulo() . " Creado ");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ModeloGaleria\Album $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        $comentarios = $album->ConsultarComentarios();
        return view('ViewsGaleria/MostrarAlbum', compact('album', 'comentarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ModeloGaleria\Album $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('ViewsGaleria/EditarAlbum', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ModeloGaleria\Album $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $datosAlbum = $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
        ]);

        $album->setTitulo($request->input('titulo'));
        $album->setDescripcion($request->input('descripcion'));
        $album->ActualizarAlbum($album);

        return redirect()->route('album.show', $album->id)->with('mensaje', $album->titulo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ModeloGaleria\Album $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {

        $album->EliminarAlbum($album);

        return redirect()->route('album.index')
            ->with('mensaje', $album->getTitulo() . " Eliminado ");
    }

    public function MyAlbumes()
    {
        $usuario = new Usuario();
        $usuario = $usuario->getUsuario(auth()->user()->getAuthIdentifier());
        $albumes = $usuario->album;

        return view('ViewsGaleria/IndexAlbum', compact("albumes"));
    }
}
