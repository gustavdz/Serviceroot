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
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $index => $category)
                            <tr>
                                <th scope="row">{{$index+1}}</th>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <form method="post" action="{{url('categories/'.$category->id.'/delete')}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <a href="{{url('categories/'.$category->id.'/services')}}" class="btn btn-primary" data-toggle="tooltip" title="Listar sus Servicio">
                                            <i class="fas fa-sitemap"></i>
                                        </a>
                                        <a href="{{url('categories/'.$category->id.'/edit')}}" class="btn btn-success" data-toggle="tooltip" title="Editar Categoría">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger" data-toggle="tooltip" title="Eliminar Categoría">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
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
