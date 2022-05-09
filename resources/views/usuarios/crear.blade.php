@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Adicionar Usuario') }}</div>

                <div class="card-body">
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

                    {{-- <form action="/store" method="POST">
                    @csrf
                        <button type="submit">Guardar</button>
                    </form> --}}

                    {{-- Formulario con Form Action --}}

                    {!! Form::open(array('route'=>'usuarios.store', 'method'=>'POST')) !!}
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
                                <label for="">Rol</label>
                                {!! Form::select('roles[]', $roles,[], array('class'=>'form-control')) !!}
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>                   
                    {!! Form::close() !!}
                    {{-- Mi codigo termina aqui --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
