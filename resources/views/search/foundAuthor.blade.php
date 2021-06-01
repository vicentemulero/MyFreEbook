@extends('layouts.app')
@section('titulo', 'MyfreEbook - Búsqueda por autor')
@section('content')
    <div class="container">
        <a href="{{ URL::previous() }}"><i class="fas fa-long-arrow-alt-left"></i></a>
        <br>
        <br>
        <h4> <i class="fas fa-search"></i> : <span id="spanInitial">{{ $initialLetter }} </span></h4>
        <br>

        <ul class="list-group">
            @forelse ($authors as $author)
                <li class="list-group-item"><a
                        href="{{ route('search.searchBooksAuthor', $author) }}">{{ $author->name }}</a></li>
            @empty
                <li> No hay autores con la inicial seleccionada</li>
            @endforelse
        </ul>
        <br>
        {{ $authors->links() }}
    </div>
@endsection
