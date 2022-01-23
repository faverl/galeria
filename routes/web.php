<?php

use Illuminate\Support\Facades\Route;
use App\ModeloGaleria\Imagen;
Use App\ModeloGaleria\Comentario;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|Se registran las rutas web|
*/

//Ruta a la pagina Welcom de Laravel
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

//Ruta del Inicio del Proyecto Galeria
Route::get('/', 'GaleriaController@home')->name('home');
Route::get('/home', 'GaleriaController@home')->name('home');

//Rutas para ImagenControlller
Route::resource('imagen','ImagenController');
Route::get('/MisImagenes','ImagenController@MyImagenes')->name('imagen.misimagenes');

//Rutas para AlbumControlller
Route::resource('album','AlbumController');
Route::get('/MisAlbumes','AlbumController@MyAlbumes')->name('album.misalbumes');

//Rutas para ComentarioController
Route::resource('comentarios','ComentarioController');

//RUtas para RespuestaController
Route::resource('respuestas','RespuestaController');

//Rutas de los links de la galeria de imagenes
Route::get('/RegistrarUsuario','GaleriaController@RegistrarUsuario')->name('registrar');
Route::post('/RegistroUser','GaleriaController@RegistroUser');
Route::post('/agregar/{imagen}', 'GaleriaController@Agregar')->name('agregar');
Route::post('/CambiarPosicion/{album?}/{imagen?}/{mover?}', 'GaleriaController@CambiarPosicion')->name('CambiarPosicion');
Route::post('/Desvincular/{album?}/{imagen?}', 'GaleriaController@Desvincular')->name('Desvincular');

//Rutas para LoguinController
Route::get('/login', 'LoginController@loguear')->name('login');
Route::post('/login','LoginController@login')->name('login');
Route::get('/logout','LoginController@logout')->name('logout');

//Rutas de pruebas Pruebas no tener en cuenta
Route::get('/ComentarioImagen','GaleriaController@comentario');
