@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Adicionar Tecnología</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- Mi codigo comienza aqui --}}

            {{-- Validation --}}

            {!! Form::open(['route' => 'tecnologias.store', 'method' => 'POST']) !!}
           
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la tecnología']) !!}
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
            
            
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}

        </div>
    </div>
@stop

