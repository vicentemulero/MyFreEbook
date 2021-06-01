@extends('layouts.app')
@section('titulo', 'MyfreEbook - Editar libro')
@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('AdminBook.index') }}" style="float: right;" name="volverBoton"><input type="button" class="btn btn-secondary" value="Volver" /></a>
                <form action="{{ route('AdminBook.update', $book['id']) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <input type='hidden' class="form-control" name='id' value="{{ $book->id }}" />
                        <label for="cover_link" class="col-md-4 col-form-label text-md-right">Carátula</label>

                        <div class="col-md-6">
                            <img src="/{{ $book->cover_link }}" width="150" height="180" alt="">
                            <input type="file" name="cover_link" accept="image/*">

                            <input type="hidden" value="{{ $book->cover_link }}" name="old_cover_link">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">Título</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" value="{{ $book->title }}"
                                autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="author" class="col-md-4 col-form-label text-md-right">Autor</label>

                        <div class="col-md-6">
                                <select name="author_id" class="form-control">
                                    <option value="{{ $book->authors->id }}" selected>{{ $book->authors->name }}</option>
                                    @forelse ($authors as $author)
                                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @empty
                                        <option value="Vacío">Vacío</option>
                                    @endforelse
                                </select>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="genre_id" class="col-md-4 col-form-label text-md-right">Género</label>

                        <div class="col-md-6">
                            <select name="genre_id" class="form-control">
                                <option value="{{ $book->genre_id }}" selected>{{ $book->genres->name }}</option>
                                @forelse ($genres as $genre)
                                    <option value="{{ $genre->cod }}">{{ $genre->name }}</option>
                                @empty
                                    <option value="Vacío">Vacío</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="synopsis" class="col-md-4 col-form-label text-md-right">Sinopsis</label>

                        <div class="col-md-6">
                            <textarea type="textarea" cols="100" class="form-control" name="synopsis"
                                autofocus>{{ $book->synopsis }}</textarea>
                        </div>
                    </div>
                    <input id="average_rating" type="number" class="form-control" name="average_rating" value="0" hidden>
                    <div class="form-group row">
                        <label for="download_link" class="col-md-4 col-form-label text-md-right">Pdf</label>

                        <div class="col-md-6">
                            <input type="file" accept="application/pdf" name="download_link" autofocus>
                            <input type="hidden" name="old_download_link" value="{{ $book->download_link }}">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Editar libro
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
