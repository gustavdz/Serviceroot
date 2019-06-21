@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{route('categories')}}">Categorias</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            You are logged in!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
