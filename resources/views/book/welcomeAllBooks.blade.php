@extends('layouts/app')
@section('titulo', 'MyFreEbook - Todos los libros')
@section('ScriptJS')
    <script src="{{ asset('js/SortBooksRest.js') }}" defer></script>
@endsection
@section('content')
    <div class="container" id="contentBooks">
        <a href="{{ URL::previous() }}"><i class="fas fa-long-arrow-alt-left"></i></a>
        <br>
        <br>
        <div class="row" id="rowSortsBooks">
            <div class="col-12 col-md-8">
                <h4 id="newBooks">Todos los libros</h4>

            </div>
            <div class="col-12 col-md-4">
                <div class="row">
                    <div class="col-5">
                        <label for="orderBy" style="float: right;">Ordenar por: </label>
                    </div>
                    <div class="col-7">
                        <form class="form-inline" id="formSortBooks" action="{{ route('index.sortBooks') }}" method="GET">
                            <select class="form-control" name="orderBy" id="orderBy">
                                <option class="sortOptions" value="name">Nombre</option>
                                <option class="sortOptions" value="latestBooks">Novedades</option>
                                <option class="sortOptions" value="mostReadBooks">Los más leídos</option>
                                <option class="sortOptions" value="bestsBooks">Mejor valorados</option>
                            </select>
                            @if (isset($option))
                                <input type="hidden" id="optionHidden" name="optionHidden" value="{{ $option }}">
                            @else
                                <input type="hidden" id="optionHidden" name="optionHidden" value="0">
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row" id="rowOrderedBooks">
            @forelse ($books as $book )
                <div class="col-12 col-md-4">
                    <div class="media border">
                        <a class="pull-left" href="{{ route('book.showBook', $book->id) }}">
                            <img src="/{{ $book->cover_link }}" class="cardCovers">
                        </a>
                        <div class="media-body">
                            @if (isset($defaultOption))
                                <a href="{{ route('book.showBook', $book) }}">
                                    <h5 class="media-heading">{{ $book->title }}</h5> <a>
                                    @else
                                        <a href="{{ route('book.showBook', $book->id) }}">
                                            <h5 class="media-heading">{{ $book->title }}</h5> <a>
                            @endif
                            @if (isset($defaultOption))
                                <a href="{{ route('search.searchBooksAuthor', $book->author_id) }}">{{ $book->authors->name }}
                                </a>
                            @else
                                <a href="{{ route('search.searchBooksAuthor', $book->author_id) }}">{{ $book->name }}
                                </a>
                            @endif
                            <span hidden class="average_rating">{{ $book->average_rating }}</span>
                            <div class="rating"></div>
                            <p class="card-text">{{ $book->synopsis }} </p>
                        </div>
                    </div>
                </div>
            @empty
                <p> No hay libros que mostrar</p>
            @endforelse
            {{ $books->links() }}
        </div>
        <br>
    </div>
    @endsection
