@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Subir nueva imagen</div>
                <div class="card-body">
                    <form action="{{ route('image.save') }}" enctype="multipart/form-data" method="post">
                        @csrf
    
                        <div class="form-group row">
                            <label for="image_path" class="col-form-label col-md-3 text-md-right  {{ $errors->first('image_path') ? 'is-invalid' : ' ' }}">Imagen</label>
                            <div class="col-md-7">
                                <input type="file" name="image_path" id="image_path" class="form-control" required>

                                @if($errors->has('image_path'))
                                    <span class="invalid-feeback" role="alert">
                                        <strong>{{ $errors->first('image_path') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image_path" class="col-form-label col-md-3 text-md-right">Descripcion</label>
                            <div class="col-md-7">
                                <textarea name="description" id="description" class="form-control  {{ $errors->first('description') ? 'is-invalid' : '' }}" required></textarea>

                                @if($errors->has('description'))
                                    <span class="invalid-feeback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3">
                                <input type="submit" name="enviar" class="btn btn-primary" value="subir imagen">
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
