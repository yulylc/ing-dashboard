@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Llenar solicitud</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- Mi codigo comienza aqui --}}

            {{-- Validation ponerla por campos--}}

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
    {{-- Revisar creo que si pongo el files true, no tengo que agregar el enctype --}}
            {!! Form::open(['route' => 'candidatos.store', 'method' => 'POST', 'files' => true]) !!}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="">Nivel de escolaridad</label>
                        {{-- {!! Form::select('grado_id[]', null, ['class' => 'form-control']) !!}  --}}
                         {!! Form::select('grados[]', $grados->pluck('name'),[], array('class'=>'form-control', 'placeholder'=>'Seleccione su nivel de escolaridad')) !!} 
                    </div> 
                </div>


            </div>
            <div class="row">
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
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="telefono1">Movil</label>
                        {!! Form::text('telefono1', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="telefono2">Teléfono Casa</label>
                        {!! Form::text('telefono2', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="escolaridad">Grado</label>
                        {!! Form::select('escolaridad[]', $candidato, [], ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="fechagraduacion">Año de graduado</label>
                        {!! Form::text('fechagraduacion', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="resumen">Resumen</label>
                        {!! Form::textarea('resumen', null, ['class' => 'form-control input', 'cols' => 20, 'rows' => 4, 'required' => '', 'maxlength' => '250']) !!}
                    </div>
                </div>
{{-- CURRICULUM VITAE --}}
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="cv">Subir CV</label>
                        {!! Form::file('cv', ['class' => 'form-control']) !!}
                    </div>
                </div> 
                <div class="col-xs-12 col-sm-12 col-md-12">
                    </br>
                    <div class="form-group">
                        <label for="">Skills & Techs</label>
                        </br>
                        {{-- Shows only skills and techs, wanna add chose the experience too --}}
                        @foreach ($tecnologias as $value)
                            <label>{!! Form::checkbox('tecnologias[]', $value->id, false, ['class' => 'mr-1']) !!}
                                {{ $value->name }}</label>
                            {{-- @if (isset($_POST['tecnologias'])) --}}
                          {{--    <label> {!!Form::select('experiencia', ['1','2','3','4'],  null, ['placeholder' => 'Años de experiencia...'])!!}
                            </label> --}}
                           {{-- // @endif --}}
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
