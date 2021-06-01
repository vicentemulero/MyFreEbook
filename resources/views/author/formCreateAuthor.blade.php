@extends('layouts.app')
@section('titulo', 'MyfreEbook - Añadir autor')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('AdminAuthor.store') }}" method="POST">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                        <div class="col-md-6">
                            <input id="text" type="text" class="form-control" name="name" required autofocus>

                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Añadir autor
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
