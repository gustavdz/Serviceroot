@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{route('categories')}}" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Volver</a>
                        </div>
                        <div class="col-md-5 text-center">
                            {{$category->name}}
                        </div>
                        <div class="col-md-5 text-right">
                            <a href="{{url('categories/'.$category->id.'/services/create')}}" class="btn btn-primary" data-toggle="tooltip" title="Crear un Servicio"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($services as $index => $service)
                            <tr>
                                <th scope="row">{{$service->id}}</th>
                                <td>{{ $service->name }}</td>
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="3">{{$services->links()}}</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
