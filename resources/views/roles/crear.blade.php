@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Rol</h1>
@stop

@section('content')
                    {{-- Mi codigo comienza aqui --}}

                    {{-- Validation --}}
                    @if ($errors->any())
                    <div class="alert alert-dark alert-dismissible fade show" role="alert">
                        <strong>Revise los datos</strong>
                         @foreach ($errors->all() as $error)
                            <span class="badge badge-danger">{{ $error }}</span>
                         @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>                         
                    </div>
                    @endif

                    {{-- <form action="/store" method="POST">
                    @csrf
                        <button type="submit">Guardar</button>
                    </form> --}}

                    {{-- Formulario con Form Action --}}

                    {!! Form::open(array('route'=>'roles.store', 'method'=>'POST')) !!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Nombre del Rol</label>
                                {!! Form::text('name', null, array('class'=>'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Permisos del Rol</label>
                            <br/>
                                {{-- En el front Select all --}}
                            @foreach ($permission as $value)
                                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class'=> 'name'))}}
                                {{ $value->name }}</label> 
                            <br/>
                            @endforeach
                            </div>
                        </div>

                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>                   
                    {!! Form::close() !!}
                    {{-- Mi codigo termina aqui --}}
@stop



