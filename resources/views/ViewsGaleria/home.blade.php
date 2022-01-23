@extends('ViewsGaleria.plantillas.plantilla')

@section('cuerpo')
<div class="card">
    <div id="carouselBienvenidos" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselBienvenidos" data-slide-to="0" class="active"></li>
            <li data-target="#carouselBienvenidos" data-slide-to="1"></li>
            <li data-target="#carouselBienvenidos" data-slide-to="2"></li>
            <li data-target="#carouselBienvenidos" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('imagenes/slider01.jpg')}}" class="d-block w-100" alt="">
                <div class="carousel-caption d-none d-md-block">
                    <h2>BIENVENIDOS</h2>
                    <p>Proyecto Galeria de Imágenes.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('imagenes/slider02.jpg')}}" class="d-block w-100" alt="">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Crea Álbumes</h2>
                    <p>Crea los Álbumes que desees y organiza tus Imágenes como más te guste.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('imagenes/slider03.jpg')}}" class="d-block w-100" alt="">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Sube Imágenes</h2>
                    <p>Puedes subir imágenes, guardalas en uno o varios Álbum y ordenalas como prefieras.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('imagenes/slider04.jpg')}}" class="d-block w-100" alt="">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Comentarios y Respuestas</h2>
                    <p>Realiza Comentarios de los Álbumes e Imágenes, y responde a los Comentarios</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselBienvenidos" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselBienvenidos" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
@endsection
