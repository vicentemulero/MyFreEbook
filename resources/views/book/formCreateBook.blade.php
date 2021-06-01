@extends('layouts.app')
@section('titulo', 'MyfreEbook - Añadir libro')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('AdminBook.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="cover_link" class="col-md-4 col-form-label text-md-right">Carátula</label>

                    <div class="col-md-6">
                        <input type="file" name="cover_link" accept="image/*" required >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-right">Título</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control" name="title" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="author" class="col-md-4 col-form-label text-md-right">Autor</label>

                    <div class="col-md-6">
                        <select name="author_id" class="form-control" required>
                            <option value="0" selected></option>
                            @forelse ($authors as $author)
                                <option value="{{$author->id}}">{{$author->name}}</option>
                                @empty
                                <option value="Vacío">Vacío</option>
                            @endforelse
                            </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="genre_id" class="col-md-4 col-form-label text-md-right">Género</label>

                    <div class="col-md-6">
                        <select name="genre_id" class="form-control" required>
                            <option value="0" selected></option>
                            @forelse ($genres as $genre)
                                <option value="{{$genre->cod}}">{{$genre->name}}</option>
                                @empty
                                <option value="Vacío">Vacío</option>
                            @endforelse
                            </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="synopsis" class="col-md-4 col-form-label text-md-right">Sinopsis</label>

                    <div class="col-md-6">
                        <textarea  type="textarea" cols="100" class="form-control" name="synopsis" required autofocus></textarea>
                    </div>
                    <input id="average_rating" type="number" class="form-control" name="average_rating" value="0" hidden>
                </div>
                <div class="form-group row">
                    <label for="download_link" class="col-md-4 col-form-label text-md-right">Pdf</label>

                    <div class="col-md-6">
                        <input  type="file"  name="download_link" accept="application/pdf" autofocus>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Añadir libro
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
