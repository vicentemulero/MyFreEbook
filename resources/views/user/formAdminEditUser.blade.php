@extends('layouts.app')
@section('titulo', 'MyfreEbook - Editar usuario')
@section('content')

    <div class="container" id="formUserBox">
        <a href="{{ route('AdminUser.index') }}" style="float: right" name="volverBoton"><input type="button" class="btn btn-secondary" value="Volver"/></a>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('AdminUser.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for='id' class="col-md-4 col-form-label text-md-right">Id: {{ $user->id }} </label>
                        <input type='hidden' class="form-control" name='id' value="{{ $user->id }}" /><br />
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                        <div class="col-md-6">
                            <input id="text" type="text" class="form-control" name="name" value="{{ $user['name'] }}">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $user['email'] }}">

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password"
                                value="{{ $user['password'] }}">

                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Editar usuario
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
