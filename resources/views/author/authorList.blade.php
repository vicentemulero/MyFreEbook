@extends('layouts.app')
@section('titulo', 'MyfreEbook - Listado de autores')
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
                <input class="form-control text-center" id="inputSearchAuthor" type="search" name="search"
                    placeholder="Buscar autor ( Nombre - ID )" aria-label="Search">
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
        <table class="table table-striped ">
            <thead class="thead">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                <tr id="new_Tr">
                    <td class="new_Td"></td>
                    <td class="new_Td"></td>
                    <td>
                        <form id="formDeleteAuthor" method="POST">
                            <a class="btn btn-primary" id="linkEditAuthor">Editar</a>
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('¿Quieres eliminar este autor y todos sus libros?')">Borrar</button>
                        </form>
                    </td>
                </tr>
                @forelse ($authors as $author)
                    <tr>
                        <th scope="row">{{ $author->id }}</th>
                        <td>{{ $author->name }}</td>
                        <td>
                            <form action="{{ route('AdminAuthor.destroy', $author['id']) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('AdminAuthor.edit', $author->id) }}">Editar</a>
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('¿Quieres eliminar este autor y todos sus libros?')">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>No se han encontrado autores</td>
                    </tr>
                @endforelse
        </table>
        <br>
        {{ $authors->links() }}
    </div>
</div>
@endsection
