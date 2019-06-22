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
                            Categorías <a href="{{route('create_category')}}" class="btn btn-primary" data-toggle="tooltip" title="Crear una Categoría"><i class="fas fa-plus"></i></a>
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
                        @foreach($categories as $index => $category)
                            <tr>
                                <th scope="row">{{$category->id}}</th>
                                <td>{{$category->id}} - {{ $category->name }}</td>
                                <td>
                                    <a href="{{url('categories/'.$category->id.'/services')}}" class="btn btn-primary" data-toggle="tooltip" title="Crear un Servicio">
                                        <i class="fas fa-sitemap"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="3">{{$categories->links()}}</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
