@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{-- Mi codigo comienza aqui --}}

                    {{-- Control de errores --}}
                    @can('crear-rol')
                     <a class="btn btn-warning" href="{{ route('roles.create') }}">Nuevo</a>                         
                    @endcan

                    <table class="table table-striped mt-2">
                      <thead style="background-color: #5e72eb">
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
                                      {!! Form::open(['method'=>'DELETE', 'route'=>['roles.destroy',$role->id], 'style'=>'display:inline']) !!}
                                      {!!Form::submit('Eliminar', ['class'=> 'btn btn-danger']) !!} 
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
                    <div class="pagination justify-content-end">
                    {!! $roles->links() !!}
                    </div>
                    {{-- Mi codigo termina aqui --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
