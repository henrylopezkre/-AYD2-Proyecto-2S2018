@extends('layouts.master')
@section('contenido')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Realizar Publicacion</h4>
            </div>

            <div class="alert alert-success" id="success" style="display:none"></div> 
            <div class="alert alert-danger" id="fail" style="display:none"></div>
            @if (\Session::has('success'))
                <div class="alert alert-success" id="success">{!! \Session::get('success') !!}</div>
            @endif
            @if (\Session::has('fail'))
                <div class="alert alert-danger" id="fail" >{!! \Session::get('fail') !!}</div>
            @endif
            
            <div class="card-body">
                {!! Form::open(array('url'=> '/mypublications/insert',  'method'=>'POST', 'autocomplete'=>'off', 'enctype'=>'multipart/form-data', 'id'=>'casasola')) !!}
                {{ Form::token() }}
                    <div class="row">

                        <div class="col-md-12 pr-1">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Publicacion de Imagen</label>
                                <input type="file" class="form-control-file" id="file" name="file" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 pr-1">
                            <div class="form-group">
                                <label>Comentario</label>
                                <textarea class="form-control" id="comment" name="comment" maxlength="128" rows="5" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 pr-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Etiquetas</label>
                                <input type="text" class="form-control" data-role="tagsinput" id="hashtag" name="hashtag" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Nuevo</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection