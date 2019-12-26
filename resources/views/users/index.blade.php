@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{route('home')}}" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Volver</a>
                        </div>
                        <div class="col-md-10 text-right">
                            Usuarios
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $index => $user)
                            <tr>
                                <th scope="row">{{$index+1}}</th>
                                <td><h5>{{ $user->name }}</h5><h6>{{ $user->username }}<br>{{ $user->email }}</h6></td>
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="3">{{$users->links()}}</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
