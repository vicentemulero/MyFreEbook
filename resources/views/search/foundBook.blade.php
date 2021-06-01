@extends('layouts.app')
@section('titulo', 'MyfreEbook - Libros encontrados')
@section('content')
<div class="container">
    <a href="{{ URL::previous() }}"><i class="fas fa-long-arrow-alt-left"></i></a>
    <br>
    <br>
    <h3><i class="fas fa-search"></i> :<span id="spanSearch"> {{ $search }}</span></h3>
    <br>
    <div class="row">
        @forelse ($books as $book )
            <div class="col-12 col-md-4">
                <div class="media border">
                    <a class="pull-left" href="{{ route('book.showBook', $book) }}">
                        <img src="/{{ $book->cover_link }}" class="cardCovers">
                    </a>
                    <div class="media-body">
                        <a href="{{ route('book.showBook', $book) }}">
                            <h5 class="media-heading">{{ $book->title }}</h5> <a>
                                <a href="{{ route('search.searchBooksAuthor', $book->author_id) }}">{{ $book->authors->name }}
                                </a>
                                <span hidden class="average_rating">{{ $book->average_rating }}</span>
                                <div class="rating"></div>
                                <p class="card-text">{{ $book->synopsis }} </p>

                    </div>
                </div>
            </div>
        @empty
            <p>No se han encontrado libros</p>
        @endforelse
    </div>
</div>
@endsection
