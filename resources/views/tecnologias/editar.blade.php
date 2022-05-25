@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Tecnologías & Habilidades</h1>
@stop

@section('content')
{!! Form::model($tecnologia, ['method' => 'PUT', 'route' => ['tecnologias.update', $tecnologia->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="name">Tecnología</label>
            {!! Form::text('name', null, array('class'=>'form-control')) !!}
        </div>
    </div>
 
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</div>
{!! Form::close() !!}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop