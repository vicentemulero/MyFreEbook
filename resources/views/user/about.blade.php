@extends('layouts.app')
@section('titulo', 'MyfreEbook - Sobre nosotros')
@section('content')
    <br><br><br>
    <div class="container" id="divAbout">
        <div class="card" id="cardAbout">
            <div class="card-body">
                <h4 class="card-title">Sobre nosotros</h4>
                <p class="card-text text-justify"><strong><i>MyFreEbook</i></strong> es una web con contenido gratuito
                    dedicada a fomentar la lectura clásica facilitando la descarga de libros en formato electrónico. <br>
                    Nuestro objetivo es lograr que sobre todo, los más jóvenes, se conviertan en lectores de futuro,
                    apasionados, habituales, competentes y críticos, pero antes de eso hay que captar permanentemente su
                    atención, despertar su curiosidad, hacer que escuchen la llamada de los libros y motivar a los jóvenes a
                    leer.
                    <br><br>
                    Queremos mejorar día tras día y ofrecer más contenido, si quieres contribuir con más libros (sin licencia) ponte en contacto con nosotros a través de nuestro formulario de
                    <a href="{{ route('index.contact') }}" class="card-link">Contacto</a>.
                </p>

            </div>
        </div>

    </div>
@endsection
