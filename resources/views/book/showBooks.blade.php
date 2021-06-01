@extends('layouts/app')
@section('titulo', 'MyFreEbook - Libro')
@section('ScriptJS')
    <script src="{{ asset('js/qualifyBook.js') }}" defer></script>
@endsection
@section('content')
<br><br>
<div class="container">
    <a href="{{ URL::previous() }}"><i class="fas fa-long-arrow-alt-left"></i></a>
    <br>
    <br>
    <div class="row" >
        <div class="col-12" id="divInfoBook">
            <div class="row" >
                <div class="col-12 col-md-3" id="divImgCover">
                    <img src="{!! asset($book->cover_link) !!}" id="imgCoverBook">
                </div>
                <div class="col-12 col-md-9">
                    <div class="row">
                        <div class="col-12" >
                            <h3 id="bookTitle" class="infoBook">{{ $book->title }}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" >
                            <h5 id="bookTitle" class="genreBook">{{ $book->genres->name }}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" >
                            <a href="{{ route('search.searchBooksAuthor', $book->author_id) }}">
                                <span id="spanAuthorName">{{ $book->authors->name }}</span>
                            </a>
                        </div>
                    </div>

                    <div class="row ">
                        <div class="col-12 col-md-8">
                            <p id="synopsisArea">{{ $book->synopsis }}</p>
                        </div>
                        <div class="col-12 col-md-4 " id="colRatings">
                            <h5>Valoraciones: <span id="ratingsNumber"> {{ $usersRate }}</span></h5>
                            <span><span id="averageRate">{{ $averageRate }}</span>/5</span>

                            @if (Auth::check())
                                <div id="divStars">
                                </div>
                                <div id="divStarsNoUsers" hidden>
                                </div>
                            @else
                                <div id="divStars" hidden>
                                </div>
                                <div id="divStarsNoUsers">
                                </div>
                            @endif
                            <form action="{{ route('book.setQualify') }}" method="POST">
                                @csrf
                                <input type="hidden" name="qualify" id="inputStar">
                                <input type="hidden" id="inputbookId" name="book_id" value="{{ $book->id }}">
                                @if (Auth::check())
                                    <input type="hidden" id="inputUserId" name="user_id" value="{{ Auth::user()->id }}">
                                    <a href="#" id="showImputCommentary">Añade un comentario</a> <br>
                                    <input type="text" name="commentary" class="form-control" id="commentary" hidden
                                        minlength="5" maxlength="50"> <br>
                                    <button type="submit" class="btn btn-primary"> Calificar</button>
                                @endif
                            </form>
                        </div>
                    </div>
                    <br>
                    @if (Auth::check())
                        <div class="row">
                            <div class="col-12 col-md-8" id="divImgDownload">
                                <a href="{{ route('downloadBook.userDownloadBook', $book->id) }}">
                                    <img src="{!! asset('resourcesApp/pdf.png') !!}"></a>
                            </div>
                        </div>
                        <br>
                    @else
                        <div class="row">
                            <div class="col-12 col-md-8" id="divNoUserInfo">
                                <p><a href="{{ route('register') }}"> Regístrate</a> o <a href="{{ route('login') }}">
                                        Inicia sesión</a> para descargar y valorar este libro </p>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-12 col-md-6" style="border-right: solid 1px; border-color: #3490dc">
            <h4>Libros relacionados</h4>
            @forelse ($othersBooks as $oBook )
                <a href="{{ route('book.showBook', $oBook->id) }}">
                    <img src="/{{ $oBook->cover_link }}" class="imgOthersBooks">
                </a>
            @empty
                <p>Por el momento, no disponemos de más libros con este género</p>
            @endforelse
            <br>
            {{ $othersBooks->links() }}
        </div>
        <div class="col-12 col-md-6">
            <h4>Comentarios</h4>
            <div class="table-responsive-sm">
                <table class="table table-striped ">
                    <tbody>
            @if (Auth::check())
            <tr>
            @forelse ($ownComments as $ownCommentary)
           <td><span style="color: rgb(112, 194, 19)">Mi comentario: </span><span id="spanUserCommentary">{{ $ownCommentary->commentary }}</span>  <button id="buttonDeleteCommentary"><i class="far fa-trash-alt"></i></button> <button id="buttonEditCommentary"><i class="fas fa-edit"></i>
        </button><button id="buttonSendCommentary"><i class="fas fa-share-square"></i></button></td>
                <hr style="color:#3490dc">
                @empty
            <span> No has comentado este libro </span>
                @endforelse
            </tr>
            @endif
            @forelse ($comments as $commentary)
            <tr><td><span style="color:#3490dc">{{ $commentary->name }}: </span><span>{{ $commentary->commentary }}</span><td></tr>
            @empty
                <tr><td><span> No hay comentarios</span></td></tr>
            @endforelse
        </tbody>
    </table>
            </div>
            {{ $comments->links()}}
        </div>
    </div>
</div>
@endsection
