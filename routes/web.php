<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Ruta del homre del sitio web
Route::get('/', function () {
    return view('welcome');
});

//Rutas de los links de los Ejercicios del portal home
Route::get('/Ejercicio1','EjerciciosController@Ejercicio1');
Route::get('/Ejercicio2','EjerciciosController@Ejercicio2');
Route::get('/Ejercicio3','EjerciciosController@Ejercicio3');
Route::get('/Ejercicio4','EjerciciosController@Ejercicio4');
Route::get('/Ejercicio5','EjerciciosController@Ejercicio5');
Route::get('/Ejercicio6','EjerciciosController@Ejercicio6');
Route::get('/Ejercicio7','EjerciciosController@Ejercicio7');
Route::get('/Ejercicio8','EjerciciosController@Ejercicio8');
Route::get('/Ejercicio9','EjerciciosController@Ejercicio9');
Route::get('/EjercicioImagen','EjerciciosController@EjercicioImagen');
Route::get('/Galeria','EjerciciosController@Galeria');
