@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Llenar solicitud</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- Mi codigo comienza aqui --}}

            {{-- Validation --}}

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Ops!</strong> Revise los datos por favor.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::open(['route' => 'candidatos.store', 'method' => 'POST']) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="apellido1">Apellidos</label>
                        {!! Form::text('apellido', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
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
                        <label for="">Enviar Curriculum Vitae</label>
                        {!! Form::file('CV', ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    </br>
                    <div class="form-group">
                        <label for="">Skills & Techs</label>
                        </br>
                        @foreach ($tecnologias as $value)
                            <label>{{ Form::checkbox('tecnologias[]', $value->id, false, ['class' => 'name']) }}
                                {{ $value->name }}</label>
                            </br>
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
            {!! Form::close() !!}

        </div>

    </div>
@stop
