@extends('layouts.app')
@section('titulo', 'MyfreEbook - Listado de géneros')
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
                    <input class="form-control text-center" id="inputSearchGenre" type="search" name="search"
                        placeholder="Buscar género ( Nombre - Código )" aria-label="Search">
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
                        <th scope="col">Código</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="new_Tr">
                        <td class="new_Td"></td>
                        <td class="new_Td"></td>
                        <td>
                            <form id="formDeleteGenre" method="POST">
                                <a class="btn btn-primary" id="linkEditGenre">Editar</a>
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('¿Quieres eliminar este género y todos sus libros relacionados?')">Borrar</button>
                            </form>
                        </td>
                    </tr>
                    @forelse ($genres as $genre)
                        <tr>
                            <th scope="row">{{ $genre->cod }}</th>
                            <td>{{ $genre->name }}</td>
                            <td>
                                <form action="{{ route('AdminGenre.destroy', $genre['cod']) }}" method="POST">
                                    <a class="btn btn-primary"
                                        href="{{ route('AdminGenre.edit', $genre->cod) }}">Editar</a>
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" onclick="return confirm('¿Quieres eliminar este género y todos sus libros relacionados?')">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No se han encontrado géneros</td>
                        </tr>
                    @endforelse
            </table>
            <br>
            {{ $genres->links() }}
        </div>
    </div>
@endsection
