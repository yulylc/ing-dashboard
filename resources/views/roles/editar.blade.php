@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Insertar Rol</h1>
@stop

@section('content')
                    {{-- Mi codigo comienza aqui --}}
                  
                    {{-- Validation --}}
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Ops!</strong> Hay un problema en sus datos.<br/>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    {{-- HTML Collective methods --}}
                    {!! Form::model($role, ['method' => 'PUT', 'route' => ['roles.update', $role->id]]) !!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="name">Nombre del Rol</label>
                                {!! Form::text('name', null, array('class'=>'form-control')) !!}
                            </div>
                        </div>
                     
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group mt-2">
                                <strong>Permisos para este Rol</strong>
                                <br/>
                                @foreach($permission as $value)
                                    <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                    {{ $value->name }}</label>
                                <br/>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    {{-- Mi codigo termina aqui --}}
@stop

