<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModeloGaleria\Avatar;
use App\ModeloGaleria\Person;
use App\ModeloGaleria\User;

class GaleriaController extends Controller
{
    public function CargarUsuario()
    {

        return Person::find(1)->user;
    }

    public function CargarAvatar()
    {

        if ($gestor = opendir('imagenes/avatars')) {

            $i = 1;

            while (false !== ($archivo = readdir($gestor))) {
                if ($archivo != "." && $archivo != "..") {
                    if ($i == 5) {
                        $i = 0;
                    }
                    $i++;
                    Avatar::create(["rutaImagen" => $archivo]);
                }
            }

            closedir($gestor);
        }

        return "Imagenes Agregadas";
    }

    public function RegistroUser(Request $request)
    {
        $ghost = 1;

        $request->validate([
            'cedula' => 'required',
            'nombre' => 'required',
            'nickName' => 'required',
            'clave' => 'required'
        ]);

        User::create([
            "person_id" => Person::create([
                "cedula" => $request->cedula,
                "nombre" => $request->nombre
            ])->id,
            "nickName" => $request->nickName,
            "clave" => $request->clave,
            "avatar_id" => (is_null($request->avatar_id) ? $ghost : $request->avatar_id)
        ]);

        return back()->with('mensaje', "Su Usuario fue creado");
    }

    public function RegistrarUsuario()
    {
        $avatars = Avatar::all()->except(1);
        return view('ViewsGaleria/RegistrarUsuario', compact("avatars"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
