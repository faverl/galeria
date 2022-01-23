<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Authenticatable;
use App\ModeloGaleria\Usuario;


class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest',['only' => ['login','loguear']]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nickName' => 'required|string',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        } else {
            return back()->with('mensaje', "Usuario o Contraseña no son correctos");
        }
    }

    public function loguear()
    {
        return view('ViewsGaleria/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
