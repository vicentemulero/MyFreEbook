@extends('layouts.app')
@section('titulo', 'MyfreEbook - Editar perfil')
@section('content')
  <br>
    <div class="container" id="formUserBox">
        <a href="{{ route('user.showProfile') }}" style="float: right" name="volverBoton"><input type="button"class="btn btn-secondary" value="Volver" /></a>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type='hidden' class="form-control" name='id' value="{{ $user->id }}" /><br />
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
                            <input id="newPassword" type="password" class="form-control" name="newPassword"
                            placeholder="Introducir nueva contraseña">
                            <input id="password" type="hidden" class="form-control" name="password"
                            value="{{ $user['password'] }}">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <a href="{{ route('user.update', $user->id) }}">
                                <button type="submit" class="btn btn-primary">
                                    Editar perfil
                                </button>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
      <br>
        <br>
@endsection
