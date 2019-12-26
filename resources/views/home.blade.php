@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12">
                                Dashboard
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(Auth::user()->admin)
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{route('categories')}}">Categorías</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{route('users')}}">Usuarios</a>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h4>Bienvenido {{ Auth::user()->name }} ({{Auth::user()->username}}) </h4>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
