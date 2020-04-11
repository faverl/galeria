<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaginaWeb\Imagen;
use App\Galeria;


class EjerciciosController extends Controller{

    public function Ejercicio1(){
        return view('Ejercicio1');
    }

    public function Ejercicio2 (){

        $num1=5;
        $num2=10;
        return view('Ejercicio2',compact("num1","num2"));
    }

    public function Ejercicio3(){
      return view('Ejercicio3');
    }

    public function Ejercicio4(){
      return view('Ejercicio4');
    }

    public function Ejercicio5(){
      return view('Ejercicio5');
    }

    public function Ejercicio6(){
      return view('Ejercicio6');
    }

    public function Ejercicio7(){

      return view('Ejercicio7');
    }

    public function Ejercicio8(){
      return view('Ejercicio8');
    }

    public function Ejercicio9(){
      return view('Ejercicio9');
    }

    pUblic function EjercicioImagen(){

      $title="Ejercicio Imagen";

      $ruta1="https://www.65ymas.com/uploads/s1/90/95/9/los-mejores-atardereceres-del-mundo-puskcar-bigstock_1_621x621.jpeg";
      $imagen1 = new Imagen("Atardecer","Imagen de un atardecer", $ruta1);

      $ruta2="https://www.colombiamegusta.com/wp-content/uploads/VolcanoRuiz-750.jpg.webp";
      $imagen2 = new Imagen("Montañas","Imagen de las montañas", $ruta2);

      $ruta3="https://previews.123rf.com/images/nopparats/nopparats1504/nopparats150400134/39523656-sendero-en-un-jard%C3%ADn-bot%C3%A1nico-con-orqu%C3%ADdeas-bordean-el-camino-.jpg";
      $imagen3 = new Imagen("Jardin de Orquideas", "Pasaje de jardin, con arco de orquideas",$ruta3);

      $imagenes = [$imagen1,$imagen2,$imagen3];

      return view('EjercicioImagen',compact("imagenes","title"));
    }

    public function Galeria(){

      $title="Galeria";
      $imagenes = array();

      foreach($datosdb=Galeria::all() as $dato){
        $imagenes[] = new Imagen($dato->nombre,$dato->descripcion,$dato->ruta);
      }
      
      return view('Galeria',compact("imagenes","title"));
    }


}
