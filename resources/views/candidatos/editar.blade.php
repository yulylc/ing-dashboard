@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar solicitud</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {{-- Mi codigo comienza aqui --}}
            {{-- Validation --}}
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Ops!</strong> Revise los datos introducidos.<br />
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::model($candidato, ['route' => ['candidatos.update', $candidato->id], 'method' => 'PUT', 'files' => true]) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="grado_id">Nivel de escolaridad</label>
                        {!! Form::select('grado_id', $grados->toArray(), old('grado_id', $candidato->grado_id), ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Seleccione su nivel de escolaridad']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="password">Password</label>
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="confirm-password">Confirmar contraseña</label>
                        {!! Form::password('confirm-password', ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="text">Resumen</label>
                        {!! Form::textarea('resumen', null, ['class' => 'form-control input', 'cols' => 20, 'rows' => 4, 'required' => '', 'maxlength' => '250']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="cv">Subir CV</label>
                        {!! Form::file('cv', ['class' => 'form-control']) !!}
                    </div>
                </div>
                </br>
                <div class="form-group">
                    <label for="tecnologias">Tecnologias y Habilidades</label>
                    </br>
                    {{-- Esto lo arreglo con js --}}
                    @foreach ($tecnologias as $value)
                        <label>{!! Form::checkbox('tecnologias[]', $value->id, in_array($value->id, $candidatoskills) ? true : false, ['class' => 'name']) !!}
                            {{ $value->name }}</label>
                        <br />
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                {{-- <button type="submit" class="btn btn-primary">Guardar</button> --}}
                {!! Form::submit('Actualizar Solicitud', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    </div>
@stop
