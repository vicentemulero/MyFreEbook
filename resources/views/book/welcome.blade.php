@extends('layouts/app')
@section('titulo', 'MyFreEbook')
@section('content')
    <div class="container" id="contentBooks">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2"
                aria-controls="navbarSupportedContent2" aria-expanded="false" id="buttonSearchPlus"
                aria-label="{{ __('Toggle navigation') }}">
                <i class="fas fa-search-plus"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent2">

                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Autores
                        </a>
                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                            <ul class="navbar-nav" id="authorsInitials">

                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'A') }}">A</a> </li>
                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'B') }}">B</a> </li>
                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'C') }}">C</a> </li>
                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'D') }}">D</a> </li>
                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'E') }}">E</a> </li>
                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'F') }}">F</a> </li>
                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'G') }}">G</a> </li>
                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'H') }}">H</a> </li>
                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'I') }}">I</a> </li>
                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'J') }}">J</a> </li>
                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'K') }}">K</a> </li>
                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'L') }}">L</a> </li>
                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'M') }}">M</a> </li>
                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'N') }}">N</a> </li>
                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'Ñ') }}">Ñ</a> </li>
                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'O') }}">O</a> </li>
                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'P') }}">P</a> </li>
                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'Q') }}">Q</a> </li>
                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'R') }}">R</a> </li>
                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'S') }}">S</a> </li>
                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'T') }}">T</a> </li>
                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'U') }}">U</a> </li>
                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'V') }}">V</a> </li>
                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'W') }}">W</a> </li>
                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'X') }}">X</a> </li>
                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'Y') }}">Y</a> </li>
                                <li class="li-initials"> <a class="nav-link"
                                        href="{{ route('search.searchAuthor', 'Z') }}">Z</a> </li>

                            </ul>
                            <table id="authorsTableInitials">
                                <tr>
                                    <td><a class="nav-lin" href="{{ route('search.searchAuthor', 'A') }}">A</a></td>
                                    <td><a class="nav-lin" href="{{ route('search.searchAuthor', 'B') }}">B</a></td>
                                    <td><a class="nav-lin" href="{{ route('search.searchAuthor', 'C') }}">C</a></td>
                                    <td><a class="nav-lin" href="{{ route('search.searchAuthor', 'D') }}">D</a></td>
                                    <td><a class="nav-lin" href="{{ route('search.searchAuthor', 'E') }}">E</a></td>
                                    <td><a class="nav-lin" href="{{ route('search.searchAuthor', 'F') }}">F</a></td>
                                    <td><a class="nav-lin" href="{{ route('search.searchAuthor', 'G') }}">G</a></td>
                                    <td><a class="nav-lin" href="{{ route('search.searchAuthor', 'H') }}">H</a></td>
                                    <td><a class="nav-lin" href="{{ route('search.searchAuthor', 'I') }}">I</a></td>
                                    <td><a class="nav-lin" href="{{ route('search.searchAuthor', 'J') }}">J</a></td>
                                    <td><a class="nav-lin" href="{{ route('search.searchAuthor', 'K') }}">K</a></td>
                                    <td><a class="nav-lin" href="{{ route('search.searchAuthor', 'L') }}">L</a></td>
                                </tr>
                                <tr>
                                    <td><a class="nav-lin" href="{{ route('search.searchAuthor', 'M') }}">M</a></td>
                                    <td><a class="nav-lin" href="{{ route('search.searchAuthor', 'N') }}">N</a></td>
                                    <td><a class="nav-lin" href="{{ route('search.searchAuthor', 'Ñ') }}">Ñ</a></td>
                                    <td><a class="nav-lin" href="{{ route('search.searchAuthor', 'O') }}">O</a></td>
                                    <td><a class="nav-lin" href="{{ route('search.searchAuthor', 'P') }}">P</a></td>
                                    <td><a class="nav-lin" href="{{ route('search.searchAuthor', 'Q') }}">Q</a></td>
                                    <td><a class="nav-lin" href="{{ route('search.searchAuthor', 'R') }}">R</a></td>
                                    <td><a class="nav-lin" href="{{ route('search.searchAuthor', 'S') }}">S</a></td>
                                    <td><a class="nav-lin" href="{{ route('search.searchAuthor', 'T') }}">T</a></td>
                                    <td><a class="nav-lin" href="{{ route('search.searchAuthor', 'U') }}">U</a></td>
                                    <td><a class="nav-lin" href="{{ route('search.searchAuthor', 'W') }}">W</a></td>
                                    <td><a class="nav-lin" href="{{ route('search.searchAuthor', 'X') }}">X</a></td>
                                    <td><a class="nav-lin" href="{{ route('search.searchAuthor', 'Y') }}">Y</a></td>
                                    <td><a class="nav-lin" href="{{ route('search.searchAuthor', 'Z') }}">Z</a></td>
                                </tr>

                            </table>
                        </div>
                    </li>
                </ul>

                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Géneros
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <ul>
                                <div class="row">
                                    @forelse  ($genres as $genre)
                                        <div class="col-12 col-md-3">
                                            <li><a class="nav-link"
                                                    href="{{ route('search.searchBooksGenre', $genre->cod) }}">
                                                    {{ $genre->name }} </a></li>
                                        </div>
                                    @empty
                                        <p class="nav-item">No hay géneros</p>
                                    @endforelse
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <br>

        <div class="row">
            <div class="col-12">
                <div id="buttonShowAll">
                    <a href="{{ route('index.allBooks') }}"> <button class="btn btn-secondary btn-lg">Ver
                            todos</button></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h4 class="titlesIndex">Novedades</h4>
            </div>
        </div>
        <br>
        <div class="row">
            @forelse ($latestBooks as $lBook )
                <div class="col-12 col-md-4">
                    <div class="media border">
                        <a class="pull-left" href="{{ route('book.showBook', $lBook) }}">
                            <img src="{!! asset($lBook->cover_link) !!}" class="cardCovers">
                        </a>
                        <div class="media-body">
                            <a href="{{ route('book.showBook', $lBook) }}">
                                <h5 class="media-heading">{{ $lBook->title }}</h5> <a>
                                    <a href="{{ route('search.searchBooksAuthor', $lBook->author_id) }}">{{ $lBook->authors->name }}
                                    </a>
                                    <span hidden class="average_rating">{{ $lBook->average_rating }}</span>
                                    <div class="rating"></div>
                                    <p class="card-text">{{ $lBook->synopsis }} </p>
                        </div>
                    </div>
                </div>
            @empty
                <p> No hay novedades</p>
            @endforelse
        </div>
        <br>
        <div class="container">
            <div class="row" style="float: right">
                <div class="col-12">
                    <i id="iconColsValues" class="fas fa-minus"></i>
                </div>
            </div>
        </div>
        <div class="container" id="divInfoWeb">
            <div class="row" id="colsValues">
                <div class="col-4" id="colCountBooks" style="border-right: solid 1px; border-color: #3490dc">
                    <h5 class="valuesInfoWeb">{{ $countBooks }}</h5>
                    <h6 class="titleValues">Libros</h6>

                </div>
                <div class="col-4" id="colCounDownloads" style="border-right: solid 1px; border-color: #3490dc">
                    <h5 class="valuesInfoWeb">{{ $countDownloads }}</h5>
                    <h6 class="titleValues">Descargas</h6>
                </div>
                <div class="col-4" id="colCountRatings">
                    <h5 class="valuesInfoWeb">{{ $countRatings }}</h5>
                    <h6 class="titleValues">Valoraciones</h6>
                </div>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <h4 class="titlesIndex">Los más leídos</h4>
            </div>
        </div>
        <br>
        <div class="row">
            @forelse ($mostReadBooks as $book )
                <div class="col-12 col-md-4">
                    <div class="media border">
                        <a class="pull-left" href="{{ route('book.showBook', $book->id) }}">
                            <img src="/{{ $book->cover_link }}" class="cardCovers">
                        </a>
                        <div class="media-body">
                            <a href="{{ route('book.showBook', $book->id) }}">
                                <h5 class="media-heading">{{ $book->title }}</h5> <a>
                                    <a href="{{ route('search.searchBooksAuthor', $book->author_id) }}">{{ $book->name }}
                                    </a>
                                    <span hidden class="average_rating">{{ $book->average_rating }}</span>
                                    <div class="rating"></div>
                                    <p class="card-text">{{ $book->synopsis }} </p>
                        </div>
                    </div>
                </div>
            @empty
                <p> No hay libros leídos</p>
            @endforelse
        </div>

        <br>
        <div class="row">
            <div class="col-12">
                <h4 class="titlesIndex">Mejor valorados</h4>
            </div>
        </div>
        <br>
        <div class="row">
            @forelse ($bestsBooks as $bBook )
                <div class="col-12 col-md-4">
                    <div class="media border">
                        <a class="pull-left" href="{{ route('book.showBook', $bBook->id) }}">
                            <img src="/{{ $bBook->cover_link }}" class="cardCovers">
                        </a>
                        <div class="media-body">
                            <a href="{{ route('book.showBook', $bBook->id) }}">
                                <h5 class="media-heading">{{ $bBook->title }}</h5> <a>
                                    <a href="{{ route('search.searchBooksAuthor', $bBook->author_id) }}">{{ $bBook->name }}
                                    </a>
                                    <span hidden class="average_rating">{{ $bBook->average_rating }}</span>
                                    <div class="rating"></div>
                                    <p class="card-text">{{ $bBook->synopsis }} </p>
                        </div>
                    </div>
                </div>
            @empty
                <p> No hay libros valorados</p>
            @endforelse
        </div>


    </div>
@endsection
