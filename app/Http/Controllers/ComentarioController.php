<?php

namespace App\Http\Controllers;

use App\ModeloGaleria\Comentario;
use Illuminate\Http\Request;
use PhpParser\Node\Scalar\String_;

class ComentarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['only' => ['store','edit','destroy']]);
    }

    //Metodo no utlizado
    public function index()
    {
        //
    }

    //Metodo No utlizado
    public function create()
    {
        //
    }

    /**
     * Metodo para agregar comentarios, Se recibe datos del formulario de comentario de una imagen
     * o un album y se crea el comentario en la base de datos, se retorna a la vista anterior.
     */
    public function store(Request $request)
    {
        $request->validate([
            'comentario' => 'required|string'
        ]);

        $comentario = new Comentario();
        $comentario->setComentario(trim($request->input('comentario')));
        $comentario->setComentarioId($request->input('comentario_id'));
        $comentario->setComentarioType($comentario->ValidarModelo($request->input('comentario_type')));
        $comentario->setUsuarioId(auth()->user()->id);
        $comentario->CrearComentario($comentario);

        return back();
    }


     //Metodo no utilizado
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        $comentario->EliminarComentario($comentario);
        return back();
    }
}
