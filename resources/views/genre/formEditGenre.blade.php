@extends('layouts.app')
@section('titulo', 'MyfreEbook - Editar género')
@section('content')


<div class="container" id="formGenreBox">
    <a href="{{route('AdminGenre.index')}}" style="float: right" name="volverBoton"><input type="button"class="btn btn-secondary"" value="Volver" /></a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('AdminGenre.update', $genre['cod'] ) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="cod" class="col-md-4 col-form-label text-md-right">Código</label>
                    <div class="col-md-6">
                        <input id="text" type="text" class="form-control" name="cod" value="{{ $genre['cod'] }}">

                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                    <div class="col-md-6">
                        <input id="text" type="text" class="form-control" name="name" value="{{ $genre['name'] }}">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Editar género
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>


@endsection
