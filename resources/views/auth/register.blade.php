@extends('layouts.app')

@section('content')
    <b-container>
        <b-row align-h="center">
            <b-col cols="8">

                <b-card header="{{ __('Registro de Usuario') }}">
                    <b-alert show>
                        Por favor ingresa tus datos:
                    </b-alert>
                    <b-alert show variant="danger">
                        <ul class="mb-0">
                            <li>Error 1</li>
                            <li>Error 2</li>
                        </ul>
                    </b-alert>
                    <b-card-text>
                        <b-form method="POST" action="{{ route('register') }}">
                            @csrf

                            <b-form-group label="{{ __('Nombre') }}" label-for="name">
                                <b-form-input type="text"
                                              id="name" name="name"
                                              value="{{ old('name') }}" required autofocus
                                              placeholder="Juan Pérez">
                                </b-form-input>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </b-form-group>

                            <b-form-group label="{{ __('Username') }}" label-for="username">
                                <b-form-input type="text"
                                              id="username" name="username"
                                              value="{{ old('username') }}" required
                                              placeholder="nickname">
                                </b-form-input>
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </b-form-group>

                            <b-form-group label="{{ __('Email') }}" label-for="email">
                                <b-form-input type="text"
                                              id="email" name="email"
                                              value="{{ old('email') }}" required
                                              placeholder="example@tudominio.com">
                                </b-form-input>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </b-form-group>

                            <b-form-group label="{{ __('Password') }}" label-for="password">

                                <b-form-input type="password"
                                              id="password" name="password" required>
                                </b-form-input>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </b-form-group>

                            <b-form-group label="{{ __('Confirmar Contraseña') }}" label-for="password-confirm">
                                <b-form-input type="password"
                                              id="password-confirm" name="password_confirmation" required>
                                </b-form-input>
                            </b-form-group>

                            <b-form-group>
                                <b-form-checkbox id="supplier" name="supplier"  {{ old('supplier')?'checked="on"':'' }}>
                                    {{ __('Proveedor') }}
                                </b-form-checkbox>
                            </b-form-group>

                            <b-form-group>
                                <b-form-checkbox id="admin" name="admin" {{ old('admin')?'checked="on"':'' }}>
                                    {{ __('Administrador') }}
                                </b-form-checkbox>
                            </b-form-group>

                            <b-button type="submit" variant="primary">
                                {{ __('Registrar') }}
                            </b-button>

                            <b-button href="{{ route('login') }}" variant="link">
                                {{ __('¿Ya te has registrado?') }}
                            </b-button>


                        </b-form>
                    </b-card-text>
                </b-card>
            </b-col>

        </b-row>
    </b-container>
@endsection

