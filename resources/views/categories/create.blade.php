@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            Nueva Categoría
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" role="form" action="{{route('store_category')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-sm-2 col-form-label">Categoría</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Escriba el nombre de la categoría">
                                        @if ($errors->has('name'))<span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>@endif
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary">
                                            Guardar
                                        </button>
                                        <a href="{{ url()->previous() }}" class="btn btn-danger">
                                            Cancelar
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
