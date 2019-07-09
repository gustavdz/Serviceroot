@extends('layouts.app')

@section('content')
    <b-container>
        <b-row align-h="center">
            <b-col cols="8">

                <b-card header="{{ __('Iniciar Sesión') }}">
                    @if ($errors->any())
                        <b-alert show variant="danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </b-alert>
                    @else
                        <b-alert show>
                            Por favor ingresa tus datos:
                        </b-alert>
                    @endif
                    <b-card-text>
                        <b-form method="POST" action="{{ route('login') }}">
                            @csrf

                            <b-form-group label="{{ __('Username or Email') }}" label-for="email" description="ServiceRoot no comparte los datos con ningún tercer.">
                                <b-form-input type="text"
                                    id="email" name="email"
                                    value="{{ old('email') }}" required autofocus
                                    placeholder="example@tudominio.com"
                                ></b-form-input>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </b-form-group>

                            <b-form-group label="{{ __('Password') }}" label-for="password">

                                <b-form-input type="password"
                                  id="password" name="password"
                                  value="{{ old('password') }}" required>
                                </b-form-input>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </b-form-group>

                            <b-form-group>
                                <b-form-checkbox id="remember" name="remember" {{ old('remember')?'checked="true"':'' }}>
                                    {{ __('Recordarme') }}
                                </b-form-checkbox>
                            </b-form-group>

                            <b-button type="submit" variant="primary">
                                {{ __('Ingresar') }}
                            </b-button>
                            @if (Route::has('password.request'))
                            <b-button href="{{ route('password.request') }}" variant="link">
                                {{ __('¿Olvidó su contraseña?') }}
                            </b-button>
                            @endif

                        </b-form>
                    </b-card-text>
                </b-card>
            </b-col>

        </b-row>
    </b-container>
@endsection
