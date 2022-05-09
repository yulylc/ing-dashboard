@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   
                    {{-- Mi codigo comienza aqui --}}
                    <a class="btn btn-warning" href="{{ route('usuarios.create') }}">Nuevo</a>

                    <table class="table table-striped mt-4">
                        <thead style="background-color:#5e72eb">
                            <th>ID</th>
                            <th>Nombre y apellidos</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acciones</th>

                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{$usuario->id}}</td>
                                    <td>{{$usuario->name}}</td>
                                    <td>{{$usuario->email}}</td>

                                    <td>
                                        @if(!empty($usuario->getRoleNames()))
                                            @foreach($usuario->getRoleNames() as $rolName)
                                                <h5><span class="badge badge-dark">{{$rolName}}</span></h5>
                                            @endforeach
                                        @endif
                                    </td>

                                    <td>
                                        <a class="btn btn-info" href="{{ route('usuarios.edit', $usuario->id)}}">Editar</a>
                                        {{-- <form action="/delete" method="POST">
                                            @@csrf;
                                        </form> --}}
                                        {{-- Lo mismo usando Form action --}}

                                        {!! Form::open(['method'=>'DELETE', 'route'=>['usuarios.destroy',$usuario->id], 'style'=>'display:inline']) !!}
                                            {!!Form::submit('Eliminar', ['class'=> 'btn btn-danger']) !!} 
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-end">
                    {!! $usuarios->links() !!}
                    </div>
                    {{-- Mi codigo termina aqui --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
