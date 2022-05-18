@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Candidatos</h1>
@stop

@section('content')
    {{-- Mi codigo comienza aqui --}}
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <input class="form-control" placeholder="Ingrese el nombre o correo del un usuario">
        </div>
        <div class="card-body">
            <a class="btn btn-primary" href="{{ route('candidatos.create') }}">Llenar solicitud</a>
            {{-- Esta opcion no va a aqui, solo probando --}}
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="display:none">Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Skills</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($candidates as $candidate)
                        <tr>
                            <td style="display:none">{{ $candidate->id }}</td>
                            <td>{{ $candidate->name }}</td>
                            <td>{{ $candidate->email }}</td>
                            <td>
                                {{-- {{ $candidate->technologies->pluck('name')}} --}}
                                @foreach ($candidate->technologies as $tecnologia)
                                    {{ $tecnologia->name }}
                                @endforeach
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ route('candidatos.edit', $candidate->id) }}">Editar</a>

                                @can('Eliminar candidato')
                                {!! Form::open(['method' => 'DELETE', 'route' => ['candidatos.destroy', $candidate->id], 'style' => 'display:inline']) !!}
                                {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                @endcan
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="pagination justify-content-end">
            {!! $candidates->links() !!}
        </div>
    </div>

@stop
