@extends('layouts.app')
@section('titulo', 'MyfreEbook - Listado de usuarios')
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
                <input class="form-control text-center" id="inputSearchUser" type="search" name="search"
                    placeholder="Buscar usuario ( Nombre - ID - Email )" aria-label="Search">
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
                    <th scope="col">Email</th>
                    <th scope="col">Rol</th>
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
                    <td>
                        <form id="formDeleteUser" method="POST">
                            <a class="btn btn-primary" id="linkEditUser">Editar</a>
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('¿Quieres eliminar este usuario?')">Borrar</button>
                        </form>
                    </td>
                </tr>
                @forelse ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roles()->first()->name }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>

                        <td>
                            <form action="{{ route('AdminUser.destroy', $user['id']) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('AdminUser.edit', $user->id) }}">Editar</a>
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('¿Quieres eliminar este usuario?')">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>No se han encontrado usuarios</td>

                    </tr>
                @endforelse
        </table>
    </div>
</div>

@endsection
