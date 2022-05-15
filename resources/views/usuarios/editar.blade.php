@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
                    {{-- Mi codigo comienza aqui --}}
                  
                    {{-- Validation --}}
                    @if ($errors->any())
                    <div class="alert alert-dark alert-dissmisible fade-show" role="alert">
                        <strong>Revise los datos</strong>
                        @foreach ($errors->all() as $error)
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                        </button>                           
                        @endforeach
                    </div>
                    @endif
                    
                    {{-- HTML Collective methods --}}
                    {!! Form::model($user, ['method' => 'PUT', 'route' => ['usuarios.update', $user->id]]) !!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                {!! Form::text('name', null, array('class'=>'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                {!! Form::text('email', null, array('class'=>'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                {!! Form::password('password', array('class'=>'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="confirm-password">Confirmar contraseña</label>
                                {!! Form::password('confirm-password', array('class'=>'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Roles</label>
                                {!! Form::select('roles[]', $roles,[], array('class'=>'form-control')) !!}
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>                   
                    {!! Form::close() !!}
                    {{-- Mi codigo termina aqui --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
