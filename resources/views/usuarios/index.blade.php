@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    {{-- Mi codigo comienza aqui --}}
    <div class="card">
        <div class="card-header">
            <input class="form-control" placeholder="Ingrese el nombre o correo del un usuario">
        </div>
        <div class="card-body">
            <a class="btn btn-primary" href="{{ route('usuarios.create') }}">Insertar usuario</a>

            <table class="table table-striped mt-4">
                <thead style="background-color:white">
                    <th style="display:none">ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>

                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td style="display:none">{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>

                            <td>
                                @if (!empty($usuario->getRoleNames()))
                                    @foreach ($usuario->getRoleNames() as $rolName)
                                        <h5><span class="badge badge-dark">{{ $rolName }}</span></h5>
                                    @endforeach
                                @endif
                            </td>

                            <td>
                                <a class="btn btn-info" href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>

                                {!! Form::open(['method' => 'DELETE', 'route' => ['usuarios.destroy', $usuario->id], 'style' => 'display:inline']) !!}
                                {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination justify-content-end">
            {!! $usuarios->links() !!}
        </div>
    </div>
    {{-- Mi codigo termina aqui --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        //console.log('Hi!');
    </script>
@stop
