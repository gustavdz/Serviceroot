<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ServiceRoot') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

</head>
<body>
<div id="app">

    <b-navbar toggleable="lg" type="dark" variant="info">

        @guest
            <b-navbar-brand href="{{ url('/') }}">{{ config('app.name', 'ServiceRoot') }}</b-navbar-brand>
        @else
            <b-navbar-brand href="{{ route('home') }}">{{ config('app.name', 'ServiceRoot') }}</b-navbar-brand>
        @endguest

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>


            <!-- Right aligned nav items -->
            <b-navbar-nav class="ml-auto">
                @guest
                    <b-nav-item href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</b-nav-item>
                @else
                    <b-nav-form>
                        <b-form-input size="sm" class="mr-sm-2" placeholder="Search"></b-form-input>
                        <b-button size="sm" class="my-2 my-sm-0" type="submit">Search</b-button>
                    </b-nav-form>
                    <b-nav-item-dropdown right>
                        <!-- Using 'button-content' slot -->
                        <template slot="button-content">{{ Auth::user()->name }}</template>
                        <b-dropdown-item href="#">{{ __('Perfil') }}</b-dropdown-item>
                        <b-dropdown-item href="#" @click="logout">
                            {{ __('Cerrar Sesión') }}
                        </b-dropdown-item>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </b-nav-item-dropdown>
                    @if(Auth::user()->admin)
                        <b-nav-item href="{{ route('register') }}">{{ __(' Nuevo Usuario') }}</b-nav-item>
                    @endif
                @endguest
            </b-navbar-nav>
        </b-collapse>
    </b-navbar>
    <main class="py-4">
        @yield('content')
    </main>
</div>
<!-- Scripts -->
<script src="https://kit.fontawesome.com/633271d208.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
