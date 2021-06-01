@extends('layouts.app')
@section('titulo', 'MyfreEbook - Añadir género')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('AdminGenre.store') }}" method="POST">
                    @csrf

                    <div class="form-group row">
                        <label for="cod" class="col-md-4 col-form-label text-md-right">Código</label>

                        <div class="col-md-6">
                            <input id="text" type="text" class="form-control" name="cod" required autofocus>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                        <div class="col-md-6">
                            <input id="text" type="text" class="form-control" name="name" required autofocus>

                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Crear género
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
