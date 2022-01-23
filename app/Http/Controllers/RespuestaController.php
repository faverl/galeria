<?php

namespace App\Http\Controllers;

use App\ModeloGaleria\Respuesta;
use Illuminate\Http\Request;
use function Illuminate\Support\Facades\App;

class RespuestaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['store', 'edit']]);
    }

    //Metodo no utlizado
    public function index()
    {
        //
    }

    //Metodo no utlizado
    public function create()
    {
        //
    }

    /**
     * Metodo para crear comentarios.
     */
    public function store(Request $request)
    {
        $request->validate([
            'respuesta' => 'required|string'
        ]);

        $respuesta = new Respuesta();
        $respuesta->setRespuesta(trim($request->input('respuesta')));
        $respuesta->setComentarioId($request->input('comentario'));
        $respuesta->setUsuarioId(auth()->user()->id);
        $respuesta->CrearRespuesta($respuesta);
        return back();
    }

    /**
     * Metodo no utilizado
     */
    public function show(Respuesta $respuesta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ModeloGaleria\Respuesta $respuesta
     * @return \Illuminate\Http\Response
     */
    public function edit(Respuesta $respuesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ModeloGaleria\Respuesta $respuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Respuesta $respuesta)
    {
        //
    }

    /**
     * Metodo de Eliminacion de Respuestas
     */
    public function destroy(Respuesta $respuesta)
    {
        $respuesta->EliminarRespuesta($respuesta);
        return back();
    }
}

