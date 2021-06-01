@extends('layouts.app')
@section('titulo', 'MyfreEbook - Editar autor')
@section('content')


<div class="container" id="formauthorBox">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{route('AdminAuthor.index')}}" style="float: right" name="backListAuthors"><input type="button"class="btn btn-secondary " value="Volver" /></a>
            <form action="{{ route('AdminAuthor.update', $author['id'] ) }}" method="POST">
                @csrf
                @method('PUT')
                <input type='hidden' class="form-control" name='id' value="{{ $author->id }}" />

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                    <div class="col-md-6">
                        <input id="text" type="text" class="form-control" name="name" value="{{ $author['name'] }}">

                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Editar autor
                        </button>


                    </div>

                </div>
            </form>

        </div>

    </div>
</div>


@endsection
