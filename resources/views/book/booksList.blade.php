@extends('layouts.app')
@section('titulo', 'MyfreEbook - Listado de libros')
@section('ScriptJS')
    <script src="{{ asset('js/searchInTables.js') }}" defer></script>
@endsection
@section('content')
<div class="container">
    <div class="container" id="divInput">
        <div class="row ">
            <div class="col-12 col-md-4 .d-none">
            </div>
            <div class="col-12 col-md-4">
                <input class="form-control text-center" id="inputSearchBook" type="search" name="search"
                    placeholder="Buscar libro ( Título - ID )" aria-label="Search">
            </div>
            <div class="col-12 col-md-4 .d-none">
            </div>
        </div>
    </div>
    <br>
    <div id='divNoFound'>
        <p><strong>No se ha encontrado coincidencias en la búsqueda</strong></p>
    </div>
    <br>
    <div class="table-responsive-sm">
        <table class="table table-striped">
            <thead class="thead">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Carátula</th>
                    <th scope="col">Título</th>
                    <th scope="col">ID Autor</th>
                    <th scope="col">Género</th>
                    <th scope="col">Sinopsis</th>
                    <th scope="col">Link descarga</th>
                    <th scope="col">Creado</th>
                    <th scope="col">Actualizado</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                <tr id="new_Tr">
                    <td class="new_Td"></td>
                    <td class="new_Td"></td>
                    <td class="new_Td"></td>
                    <td class="new_Td"></td>
                    <td class="new_Td"></td>
                    <td class="new_Td"></td>
                    <td class="new_Td"></td>
                    <td class="new_Td"></td>
                    <td class="new_Td"></td>
                    <td class="new_Td">
                        <form id="formDeleteBook" method='POST'>
                            <a class="btn btn-primary" id="linkEditBook">Editar</a>
                            @method('DELETE')
                            @csrf
                            <br><br>
                            <button class="btn btn-danger"  onclick="return confirm('¿Quieres eliminar este libro?')" >Borrar</button>
                        </form>
                    </td>
                </tr>
                @forelse ($books as $book)
                    <tr>
                        <th scope="row">{{ $book->id }}</th>
                        <td><img src="{!! asset($book->cover_link) !!}" class="adminListCovers"></td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author_id }} - {{ $book->authors->name }}</td>
                        <td>{{ $book->genre_id }} - {{ $book->genres->name }}</td>
                        <td>
                            <div>
                                <p class="pSynopsis">{{ $book->synopsis }}</p>
                            </div>
                        </td>
                        <td>{{ $book->download_link }}</td>
                        <td>{{ $book->created_at }}</td>
                        <td>{{ $book->updated_at }}</td>
                        <td>
                            <form action="{{ route('AdminBook.destroy', $book['id']) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('AdminBook.edit', $book->id) }}">Editar</a>
                                @method('DELETE')
                                @csrf
                                <br><br>
                                <button class="btn btn-danger" onclick="return confirm('¿Quieres eliminar este libro?')">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>No se han encontrado Libros</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <br>
        {{ $books->links() }}
    </div>
</div>
@endsection
