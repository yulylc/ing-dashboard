@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')
    <div class="card">
        {{-- Mi codigo comienza aqui --}}
        <div class="card-body">
            {{-- Control de errores --}}
            @can('crear-rol')
                <a class="btn btn-info" href="{{ route('roles.create') }}"> <i class ="fas fa-plus"></i></a>
            @endcan

            <table class="table table-striped mt-2">
                <thead style="background-color: white">
                    <th>Rol</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>

                            <td>
                                @can('editar-rol')
                                    <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Editar</a>
                                @endcan

                                @can('borrar-rol')
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}

                                    {{-- <form action="/delete" method="POST">
                                        @csrf
                                        <a class="btn btn-danger" href="{{ route('roles.destroy', $role->id) }}">Eliminar</a>
                                    </form> --}}
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="pagination justify-content-end">
                {!! $roles->links() !!}
            </div>
        </div>
    </div>
    {{-- Mi codigo termina aqui --}}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
