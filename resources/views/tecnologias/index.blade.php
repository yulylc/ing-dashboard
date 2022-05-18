@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tecnologías & Habilidades</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <input class="form-control" placeholder="Ingrese el nombre de la tecnología o habilidad">
        </div>
        <div class="card-body">

            <a class="btn btn-primary" href="{{ route('tecnologias.create') }}">Nueva tecnología</a>
            {{-- Esta opcion no va a aqui, solo probando --}}
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="display:none">Id</th>
                        <th> </th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tecnologias as $tecnologia)
                        <tr>
                            <td style="display:none">{{ $tecnologia->id }}</td>
                            <td><a href=" {{ route('tecnologias.show', $tecnologia->id) }}">{{ $tecnologia->name }} </a></td>
                            {{-- puedo pasar solo el id --}}

                            <td>
                                <a class="btn btn-info" href="{{ route('tecnologias.edit', $tecnologia->id) }}">Editar</a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['tecnologias.destroy', $tecnologia->id], 'style' => 'display:inline']) !!}
                                {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
