@extends('layouts.app')
@section('titulo', 'MyfreEbook - Contacto')
@section('content')
    <br><br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Formulario de contacto</div>

                    <div class="card-body">
                        <form action="#">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nombre *</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail *</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="reason" class="col-md-4 col-form-label text-md-right" required>Motivo de
                                    contacto *</label>

                                <div class="col-11 col-md-6">
                                    <select class="form-control" id="reasonSelect">
                                        <option value="0" disabled selected>Selecciona un motivo</option>
                                        <option disabled></option>
                                        <option value="1">Reestablecer contraseña</option>
                                        <option value="2">Otro</option>
                                    </select>
                                </div>
                            </div>

                            <div id="divSubmitContact" class="form-group-row">
                                <div class="form-group row">
                                    <label for="contactText" class="col-md-4 col-form-label text-md-right">Mensaje *</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" id="contactText" rows="4"
                                            placeholder="Déjanos tu mensaje ..." required></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 d-none d-md-block"></div>
                                    <div class=" col-12 col-md-5">
                                    <input type="checkbox" id="checkPolicy" required>
                                    <label for="checkPolicy">Acepto la política de
                                        privacidad</label>
                                    </div>
                                        <div class="col-md-3 d-none d-md-block"></div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Enviar
                                    </button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
