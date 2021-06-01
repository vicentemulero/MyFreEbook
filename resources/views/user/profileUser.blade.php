@extends('layouts.app')
@section('titulo', 'MyfreEbook - Mi perfil')
@section('content')
    <br>
    <div class="container">
        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <button  class="btn btn-secondary" style="float: right;" onclick="return confirm('¿Desea eliminar su cuenta?')">Eliminar mi cuenta</button>
        </form>
        <div class="container" id="profileUserContainer">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div class="form-group row">
                        <input type='hidden' class="form-control" name='id' value="{{ $user['id'] }}" /><br />
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                        <div class="col-md-6">
                            <input id="text" type="text" readonly class="form-control" name="name"
                                value="{{ $user['name'] }}">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" readonly class="form-control" name="email"
                                value="{{ $user['email'] }}">

                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <a href="{{ route('user.edit', $user->id) }}">
                                <button type="submit" class="btn btn-primary">
                                    Editar perfil
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br> <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3>Libros descargados</h3>
                </div>
            </div>
            <div class="table-responsive-sm">
                <table class="table ">
                    <tbody>
                        <tr>
                            @forelse ($books as $book)
                                <td>
                                    <div class="divBooksDowloadsCovers">
                                        <h6 style="color:#3490dc">{{ $book['title'] }}</h6>
                                        <a href="{{ route('book.showBook', $book) }}">
                                            <img src="/{{ $book['cover_link'] }}" class="booksDownloadsCovers">
                                        </a>
                                    </div>
                                </td>
                            @empty
                        <tr>
                            <td>No has descargado ningún libro</td>
                        </tr>
                        @endforelse
                        </tr>
                </table>
                {{ $books->links() }}
            </div>
        </div>
    </div>
@endsection
